<?php

namespace App\Http\Controllers\Dudi;

use App\Http\Controllers\Controller;
use App\Models\Dudi;
use App\Models\Jurnal;
use App\Models\Penilaian;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
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
    }
}
