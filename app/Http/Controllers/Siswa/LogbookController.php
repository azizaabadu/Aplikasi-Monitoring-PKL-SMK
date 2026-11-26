<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class LogbookController extends Controller
{
    /**
     * Tampilkan halaman Logbook Harian Siswa
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        $siswa = Siswa::query()
            ->where('user_id', $user->id)
            ->with(['dudi', 'guru.user'])
            ->first();

        if (!$siswa) {
            session()->flash('warning', 'Akun Anda belum terhubung dengan data profil siswa. Silakan hubungi Administrator sekolah.');
        }

        $statusFilter = $request->query('status'); // all, disetujui, pending, ditolak, draft

        $query = $siswa ? Jurnal::query()->where('siswa_id', $siswa->id) : Jurnal::query()->whereRaw('1 = 0');

        if ($statusFilter === 'draft') {
            $query->where('is_draft', true);
        } elseif ($statusFilter === 'pending') {
            $query->where('is_draft', false)->where('status', 'Pending');
        } elseif ($statusFilter === 'disetujui') {
            $query->where('is_draft', false)->where('status', 'Disetujui');
        } elseif ($statusFilter === 'ditolak') {
            $query->where('is_draft', false)->where('status', 'Ditolak');
        }

        $logbooks = $query->orderByDesc('tanggal')->orderByDesc('created_at')->paginate(10)->withQueryString();

        $allLogbooks = $siswa ? Jurnal::query()->where('siswa_id', $siswa->id)->get() : collect();
        $stats = [
            'total' => $allLogbooks->count(),
            'disetujui' => $allLogbooks->where('is_draft', false)->where('status', 'Disetujui')->count(),
            'pending' => $allLogbooks->where('is_draft', false)->where('status', 'Pending')->count(),
            'ditolak' => $allLogbooks->where('is_draft', false)->where('status', 'Ditolak')->count(),
            'draft' => $allLogbooks->where('is_draft', true)->count(),
        ];

        $today = now()->toDateString();
        $todayLogbook = $allLogbooks->firstWhere('tanggal', $today);

        return view('siswa.logbook', compact('siswa', 'logbooks', 'stats', 'todayLogbook', 'statusFilter'));
    }

    /**
     * Simpan entri logbook baru (PRD L1, L2, L3)
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tanggal' => ['required', 'date', 'before_or_equal:today'],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
            'kegiatan' => ['required', 'string', 'min:10', 'max:2000'],
            'hasil' => ['nullable', 'string', 'max:2000'],
            'kendala' => ['nullable', 'string', 'max:2000'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'action' => ['required', 'in:draft,submit'],
        ], [
            'tanggal.required' => 'Tanggal kegiatan wajib diisi.',
            'tanggal.before_or_equal' => 'Tanggal kegiatan tidak boleh di masa depan.',
            'jam_mulai.required' => 'Jam mulai kegiatan wajib diisi.',
            'jam_selesai.required' => 'Jam selesai kegiatan wajib diisi.',
            'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',
            'kegiatan.required' => 'Deskripsi pekerjaan/kegiatan wajib diisi minimal 10 karakter.',
            'foto.max' => 'Ukuran foto dokumentasi maksimal 2MB (2048 KB).',
        ]);

        $user = $request->user();
        $siswa = Siswa::query()->where('user_id', $user->id)->first();

        if (!$siswa) {
            return back()->with('error', 'Profil siswa tidak ditemukan atau belum terhubung dengan akun Anda.');
        }

        // PRD: Batasan satu entri logbook per siswa per tanggal
        $existingLogbook = Jurnal::query()
            ->where('siswa_id', $siswa->id)
            ->whereDate('tanggal', $validated['tanggal'])
            ->first();

        if ($existingLogbook) {
            return back()
                ->withInput()
                ->withErrors([
                    'tanggal' => 'Anda sudah memiliki entri logbook untuk tanggal ' . Carbon::parse($validated['tanggal'])->translatedFormat('d F Y') . '. Setiap siswa hanya dapat membuat 1 entri logbook per hari. Silakan sunting draf atau entri yang sudah ada jika memerlukan perubahan.',
                ]);
        }

        $tanggalInput = Carbon::parse($validated['tanggal'])->startOfDay();
        $hariIni = now()->startOfDay();
        $terlambat = $tanggalInput->lt($hariIni);
        $isDraft = $validated['action'] === 'draft';

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('logbook', 'public');
        }

        Jurnal::create([
            'siswa_id' => $siswa->id,
            'tanggal' => $validated['tanggal'],
            'jam_mulai' => $validated['jam_mulai'],
            'jam_selesai' => $validated['jam_selesai'],
            'kegiatan' => $validated['kegiatan'],
            'hasil' => $validated['hasil'] ?? null,
            'kendala' => $validated['kendala'] ?? null,
            'foto' => $fotoPath,
            'status' => 'Pending',
            'terlambat' => $terlambat,
            'is_draft' => $isDraft,
        ]);

        $pesan = $isDraft 
            ? 'Draf logbook berhasil disimpan. Belum diajukan ke pembimbing.'
            : ($terlambat ? 'Logbook berhasil dikirim untuk pengesahan (dicatat terlambat karena tanggal lampau).' : 'Logbook berhasil dikirim untuk pengesahan pembimbing.');

        return redirect()->route('siswa.logbook')->with('status', $pesan);
    }

    /**
     * Update logbook jika masih Draft atau Ditolak (PRD L6)
     */
    public function update(Request $request, Jurnal $jurnal): RedirectResponse
    {
        $user = $request->user();
        $siswa = Siswa::query()->where('user_id', $user->id)->first();

        if (!$siswa || $jurnal->siswa_id !== $siswa->id) {
            abort(403, 'Anda tidak berhak melihat atau mengubah logbook ini.');
        }

        if (!$jurnal->is_draft && $jurnal->status === 'Disetujui') {
            return back()->with('error', 'Logbook yang telah disetujui pembimbing tidak dapat diubah.');
        }

        $validated = $request->validate([
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
            'kegiatan' => ['required', 'string', 'min:10', 'max:2000'],
            'hasil' => ['nullable', 'string', 'max:2000'],
            'kendala' => ['nullable', 'string', 'max:2000'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'action' => ['required', 'in:draft,submit'],
        ]);

        if ($request->hasFile('foto')) {
            if ($jurnal->foto && Storage::disk('public')->exists($jurnal->foto)) {
                Storage::disk('public')->delete($jurnal->foto);
            }
            $jurnal->foto = $request->file('foto')->store('logbook', 'public');
        }

        $jurnal->jam_mulai = $validated['jam_mulai'];
        $jurnal->jam_selesai = $validated['jam_selesai'];
        $jurnal->kegiatan = $validated['kegiatan'];
        $jurnal->hasil = $validated['hasil'] ?? null;
        $jurnal->kendala = $validated['kendala'] ?? null;
        $jurnal->is_draft = ($validated['action'] === 'draft');
        if (!$jurnal->is_draft) {
            $jurnal->status = 'Pending'; // Kembalikan ke Pending jika diajukan ulang
        }
        $jurnal->save();

        return redirect()->route('siswa.logbook')->with('status', 'Logbook berhasil diperbarui.');
    }
}
