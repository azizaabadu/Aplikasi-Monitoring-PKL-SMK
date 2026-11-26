<?php

namespace App\Http\Controllers\Dudi;

use App\Http\Controllers\Controller;
use App\Models\Dudi;
use App\Models\Jurnal;
use App\Models\Penilaian;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
     feature/member-1-backend
    
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
     main
use Illuminate\View\View;

class DashboardController extends Controller
{
     feature/member-1-backend
    /**
     * Dashboard Pembimbing Lapangan DUDI (PRD 5.8, L3, N2)
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        $dudi = Dudi::query()->where('user_id', $user->id)->first();

        if (!$dudi) {
            abort(403, 'Profil mitra DUDI tidak ditemukan atau belum terhubung dengan akun Anda.');
        }

        // Ambil hanya siswa yang ditempatkan di mitra industri ini
        $siswas = Siswa::query()
            ->where('dudi_id', $dudi->id)
            ->with(['penilaians' => fn ($q) => $q->where('penilai', 'Industri')])
            ->get();

        $siswaIds = $siswas->pluck('id');

        // Logbook menunggu validasi/pengesahan (PRD L3) khusus siswa di mitra ini
        $pendingLogbooks = Jurnal::query()
            ->whereIn('siswa_id', $siswaIds)
            ->where('is_draft', false)
            ->where('status', 'Pending')
            ->with('siswa')
            ->orderByDesc('tanggal')
            ->get();

        $totalSiswa = $siswas->count();
        $ratedCount = $siswas->filter(fn ($s) => $s->penilaians->isNotEmpty())->count();

        return view('dudi.dashboard', compact(
            'dudi',
            'siswas',
            'pendingLogbooks',
            'totalSiswa',
            'ratedCount'
        ));
    }

    /**
     * Sahkan Logbook Siswa oleh DUDI (PRD L3)
     */
    public function approveLogbook(Request $request, Jurnal $jurnal): RedirectResponse
    {
        $user = $request->user();
        $dudi = Dudi::query()->where('user_id', $user->id)->first();

        // Batasan server: DUDI hanya boleh mengesahkan logbook siswa di mitranya
        if (!$dudi || $jurnal->siswa->dudi_id !== $dudi->id) {
            abort(403, 'Akses ditolak! Anda hanya berhak mengesahkan logbook siswa magang di mitra perusahaan Anda.');
        }

        $jurnal->status = 'Disetujui';
        if ($request->filled('catatan')) {
            $jurnal->catatan_pembimbing = $request->input('catatan');
        }
        $jurnal->save();

        return back()->with('status', 'Logbook atas nama ' . $jurnal->siswa->nama . ' berhasil disahkan.');
    }

    /**
     * Minta Revisi / Tolak Logbook Siswa oleh DUDI (PRD L3)
     */
    public function rejectLogbook(Request $request, Jurnal $jurnal): RedirectResponse
    {
        $validated = $request->validate([
            'catatan' => ['required', 'string', 'min:5', 'max:1000'],
        ], [
            'catatan.required' => 'Catatan revisi wajib diisi agar siswa mengetahui bagian yang perlu diperbaiki.',
            'catatan.min' => 'Catatan revisi minimal 5 karakter.',
        ]);

        $user = $request->user();
        $dudi = Dudi::query()->where('user_id', $user->id)->first();

        // Batasan server: DUDI hanya boleh meminta revisi logbook siswa di mitranya
        if (!$dudi || $jurnal->siswa->dudi_id !== $dudi->id) {
            abort(403, 'Akses ditolak! Anda hanya berhak memeriksa logbook siswa magang di mitra perusahaan Anda.');
        }

        $jurnal->status = 'Ditolak';
        $jurnal->catatan_pembimbing = $validated['catatan'];
        $jurnal->save();

        return back()->with('status', 'Catatan revisi logbook berhasil dikirim ke siswa.');
    }

    /**
     * Simpan Nilai Industri oleh Pembimbing DUDI (PRD N2)
     */
    public function storePenilaian(Request $request, Siswa $siswa): RedirectResponse
    {
        $user = $request->user();
        $dudi = Dudi::query()->where('user_id', $user->id)->first();

        // Batasan server: DUDI hanya boleh menilai siswa di mitranya
        if (!$dudi || $siswa->dudi_id !== $dudi->id) {
            abort(403, 'Akses ditolak! Anda hanya dapat menilai siswa yang magang di mitra Anda.');
        }

        $validated = $request->validate([
            'nilai_teknis' => ['required', 'numeric', 'min:0', 'max:100'],
            'nilai_non_teknis' => ['required', 'numeric', 'min:0', 'max:100'],
            'catatan' => ['nullable', 'string', 'max:1000'],
        ], [
            'nilai_teknis.required' => 'Nilai kompetensi teknis wajib diisi.',
            'nilai_non_teknis.required' => 'Nilai sikap/etika kerja wajib diisi.',
        ]);

        Penilaian::updateOrCreate(
            [
                'siswa_id' => $siswa->id,
                'penilai' => 'Industri',
            ],
            [
                'nilai_teknis' => round($validated['nilai_teknis']),
                'nilai_non_teknis' => round($validated['nilai_non_teknis']),
                'catatan' => $validated['catatan'] ?? null,
            ]
        );

        return back()->with('status', 'Nilai industri untuk siswa ' . $siswa->nama . ' berhasil disimpan.');
    
    public function dashboard(Request $request): View
    {
        $dudi = $request->user()->dudi;
        $siswas = $dudi?->siswas()->with('user')->orderBy('nama')->get() ?? collect();
        $logbooks = $dudi
            ? Jurnal::query()->whereHas('siswa', fn ($query) => $query->where('dudi_id', $dudi->id))
                ->where('is_draft', false)->where('status', 'Pending')->with('siswa.user')
                ->latest('tanggal')->take(5)->get()
            : collect();
        $pendingCount = $dudi
            ? Jurnal::query()->whereHas('siswa', fn ($query) => $query->where('dudi_id', $dudi->id))
                ->where('is_draft', false)->where('status', 'Pending')->count()
            : 0;
        $assessedCount = $dudi
            ? Siswa::query()->where('dudi_id', $dudi->id)
                ->whereHas('penilaians', fn ($query) => $query->where('penilai', 'Industri'))->count()
            : 0;
        $attendanceToday = $dudi
            ? Siswa::query()->where('dudi_id', $dudi->id)
                ->whereHas('absensis', fn ($query) => $query->whereDate('tanggal', today())->where('status', 'Hadir'))->count()
            : 0;
        $feedbackCount = $dudi?->feedback()->where('status', 'baru')->count() ?? 0;

        return view('dudi.dashboard', compact('dudi', 'siswas', 'logbooks', 'pendingCount', 'assessedCount', 'attendanceToday', 'feedbackCount'));
    }

    public function logbook(Request $request): View
    {
        $dudi = $this->dudiOrFail($request);
        $status = $request->query('status', 'Pending');
        $logbooks = Jurnal::query()
            ->whereHas('siswa', fn ($query) => $query->where('dudi_id', $dudi->id))
            ->where('is_draft', false)
            ->when(in_array($status, ['Pending', 'Disetujui', 'Ditolak'], true), fn ($query) => $query->where('status', $status))
            ->with('siswa.user')->latest('tanggal')->paginate(10)->withQueryString();

        return view('dudi.logbook', compact('dudi', 'logbooks', 'status'));
    }

    public function feedback(Request $request): View
    {
        $dudi = $this->dudiOrFail($request);
        $feedbacks = $dudi->feedback()->with('siswa.user')->latest()->paginate(10);
        $siswas = $dudi->siswas()->with('user')->orderBy('nama')->get();

        return view('dudi.feedback', compact('dudi', 'feedbacks', 'siswas'));
    }

    public function storeFeedback(Request $request): RedirectResponse
    {
        $dudi = $this->dudiOrFail($request);
        $data = $request->validate([
            'siswa_id' => ['required', Rule::exists('siswas', 'id')->where('dudi_id', $dudi->id)],
            'kategori' => ['required', Rule::in(['Apresiasi', 'Kendala', 'Pelanggaran'])],
            'judul' => ['required', 'string', 'max:150'],
            'deskripsi' => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        $dudi->feedback()->create($data);

        return to_route('dudi.feedback')->with('status', 'Umpan balik berhasil disimpan.');
    }

    public function penilaian(Request $request): View
    {
        $dudi = $this->dudiOrFail($request);
        $siswas = $dudi->siswas()->with(['user', 'penilaians' => fn ($query) => $query->where('penilai', 'Industri')])
            ->orderBy('nama')->paginate(15);

        return view('dudi.penilaian', compact('dudi', 'siswas'));
    }

    public function pengaturan(Request $request): View
    {
        $dudi = $this->dudiOrFail($request);

        return view('dudi.pengaturan', ['dudi' => $dudi, 'user' => $request->user()]);
    }

    public function updatePengaturan(Request $request): RedirectResponse
    {
        $dudi = $this->dudiOrFail($request);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nama_dudi' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:5000'],
            'pimpinan' => ['nullable', 'string', 'max:255'],
            'kontak' => ['nullable', 'string', 'max:50'],
        ]);

        $request->user()->update(['name' => $data['name']]);
        $dudi->update(collect($data)->except('name')->all());

        return to_route('dudi.pengaturan')->with('status', 'Profil DUDI berhasil diperbarui.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $request->user()->update(['password' => Hash::make($data['password'])]);

        return to_route('dudi.pengaturan')->with('status', 'Kata sandi berhasil diperbarui.');
    }

    public function storePenilaian(Request $request, Siswa $siswa): RedirectResponse
    {
        $dudi = $this->dudiOrFail($request);
        abort_unless((int) $siswa->dudi_id === (int) $dudi->id, 404);

        $data = $request->validate([
            'nilai_teknis' => ['required', 'integer', 'between:0,100'],
            'nilai_non_teknis' => ['required', 'integer', 'between:0,100'],
            'catatan' => ['nullable', 'string', 'max:2000'],
        ]);

        $penilaian = Penilaian::query()->firstOrNew([
            'siswa_id' => $siswa->id,
            'penilai' => 'Industri',
        ]);
        $penilaian->siswa_id = $siswa->id;
        $penilaian->penilai = 'Industri';
        $penilaian->nilai_teknis = $data['nilai_teknis'];
        $penilaian->nilai_non_teknis = $data['nilai_non_teknis'];
        $penilaian->catatan = $data['catatan'] ?? null;
        $penilaian->save();

        return to_route('dudi.penilaian')->with('status', 'Penilaian lapangan berhasil disimpan.');
    }

    public function approveLogbook(Request $request, Jurnal $jurnal): RedirectResponse
    {
        $dudi = $this->dudiOrFail($request);
        abort_unless($jurnal->siswa()->where('dudi_id', $dudi->id)->exists(), 404);
        abort_unless($jurnal->status === 'Pending' && ! $jurnal->is_draft, 409);

        $jurnal->update(['status' => 'Disetujui', 'catatan_pembimbing' => null]);

        return back()->with('status', 'Logbook berhasil disahkan.');
    }

    public function requestLogbookRevision(Request $request, Jurnal $jurnal): RedirectResponse
    {
        $dudi = $this->dudiOrFail($request);
        abort_unless($jurnal->siswa()->where('dudi_id', $dudi->id)->exists(), 404);
        abort_unless($jurnal->status === 'Pending' && ! $jurnal->is_draft, 409);
        $data = $request->validate([
            'catatan_pembimbing' => ['required', 'string', 'min:5', 'max:2000'],
        ]);

        $jurnal->update(['status' => 'Ditolak', 'catatan_pembimbing' => $data['catatan_pembimbing']]);

        return back()->with('status', 'Catatan revisi berhasil dikirim kepada siswa.');
    }

    private function dudiOrFail(Request $request): Dudi
    {
        return $request->user()->dudi()->firstOrFail();
     main
    }
}
