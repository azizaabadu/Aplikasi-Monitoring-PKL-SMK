<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jurnal;
use App\Models\Penilaian;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Dashboard Guru Pembimbing (PRD 5.8)
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        $guru = Guru::query()->where('user_id', $user->id)->first();

        if (!$guru) {
            abort(403, 'Profil guru pembimbing tidak ditemukan atau belum terhubung dengan akun Anda.');
        }

        $siswas = Siswa::query()
            ->where('guru_id', $guru->id)
            ->with(['dudi', 'penilaians' => fn ($q) => $q->where('penilai', 'Guru')])
            ->get();

        return view('guru.dashboard', compact('guru', 'siswas'));
    }

    /**
     * Tinjau Logbook Siswa Bimbingan (PRD L4)
     */
    public function logbook(Request $request): View
    {
        $user = $request->user();
        $guru = Guru::query()->where('user_id', $user->id)->first();

        if (!$guru) {
            abort(403, 'Profil guru pembimbing tidak ditemukan.');
        }

        $siswas = Siswa::query()->where('guru_id', $guru->id)->get();
        $siswaIds = $siswas->pluck('id');

        // Batasan server: hanya mengambil logbook siswa bimbingan guru ini
        $logbooks = Jurnal::query()
            ->whereIn('siswa_id', $siswaIds)
            ->where('is_draft', false)
            ->with(['siswa.dudi'])
            ->orderByDesc('tanggal')
            ->orderByDesc('created_at')
            ->get();

        return view('guru.logbook', compact('guru', 'logbooks', 'siswas'));
    }

    /**
     * Berikan Komentar Pembinaan pada Logbook Siswa (PRD L4)
     */
    public function komentarLogbook(Request $request, Jurnal $jurnal): RedirectResponse
    {
        $user = $request->user();
        $guru = Guru::query()->where('user_id', $user->id)->first();

        // Batasan server: guru hanya boleh mengomentari logbook siswa bimbingannya
        if (!$guru || $jurnal->siswa->guru_id !== $guru->id) {
            abort(403, 'Akses ditolak! Anda hanya berhak memberikan catatan pembinaan pada siswa bimbingan Anda.');
        }

        $validated = $request->validate([
            'komentar_guru' => ['required', 'string', 'min:3', 'max:1000'],
        ], [
            'komentar_guru.required' => 'Tulis komentar pembinaan sebelum mengirim.',
            'komentar_guru.min' => 'Komentar pembinaan minimal 3 karakter.',
        ]);

        $jurnal->catatan_guru = $validated['komentar_guru'];
        $jurnal->save();

        return back()->with('status', 'Komentar pembinaan untuk logbook ' . $jurnal->siswa->nama . ' berhasil disimpan.');
    }

    /**
     * Halaman Penilaian Siswa Bimbingan (PRD N3, N4)
     */
    public function penilaian(Request $request): View
    {
        $user = $request->user();
        $guru = Guru::query()->where('user_id', $user->id)->first();

        if (!$guru) {
            abort(403, 'Profil guru pembimbing tidak ditemukan.');
        }

        // Ambil siswa bimbingan beserta riwayat penilaian DUDI dan Guru
        $siswas = Siswa::query()
            ->where('guru_id', $guru->id)
            ->with(['dudi', 'penilaians'])
            ->get();

        return view('guru.penilaian', compact('guru', 'siswas'));
    }

    /**
     * Simpan Nilai Guru Pembimbing (PRD N3, N4)
     */
    public function storePenilaian(Request $request, Siswa $siswa): RedirectResponse
    {
        $user = $request->user();
        $guru = Guru::query()->where('user_id', $user->id)->first();

        // Batasan server: guru hanya boleh menilai siswa bimbingannya
        if (!$guru || $siswa->guru_id !== $guru->id) {
            abort(403, 'Akses ditolak! Anda hanya berhak memberikan penilaian pada siswa bimbingan Anda.');
        }

        $validated = $request->validate([
            'nilai_teknis' => ['required', 'numeric', 'min:0', 'max:100'],
            'nilai_non_teknis' => ['required', 'numeric', 'min:0', 'max:100'],
            'catatan' => ['nullable', 'string', 'max:1000'],
        ], [
            'nilai_teknis.required' => 'Nilai aspek laporan/teknis wajib diisi.',
            'nilai_non_teknis.required' => 'Nilai aspek bimbingan wajib diisi.',
        ]);

        Penilaian::updateOrCreate(
            [
                'siswa_id' => $siswa->id,
                'penilai' => 'Guru',
            ],
            [
                'nilai_teknis' => round($validated['nilai_teknis']),
                'nilai_non_teknis' => round($validated['nilai_non_teknis']),
                'catatan' => $validated['catatan'] ?? null,
            ]
        );

        return back()->with('status', 'Penilaian untuk siswa ' . $siswa->nama . ' berhasil disimpan.');
    }
}
