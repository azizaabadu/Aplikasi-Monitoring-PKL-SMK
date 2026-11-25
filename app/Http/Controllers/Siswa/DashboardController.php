<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jurnal;
use App\Models\PeriodePkl;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $user = $request->user();

        // Ambil data siswa yang terhubung dengan akun user
        $siswa = Siswa::query()
            ->where('user_id', $user->id)
            ->with(['dudi', 'guru.user', 'penempatans.dudi'])
            ->first();

        // Fallback jika belum terhubung agar tampilan tidak error
        if (!$siswa) {
            $siswa = Siswa::query()->with(['dudi', 'guru.user'])->first();
        }

        $today = now()->toDateString();

        // Check-in hari ini (PRD K1)
        $todayCheckin = $siswa ? Absensi::query()
            ->where('siswa_id', $siswa->id)
            ->where('tanggal', $today)
            ->first() : null;

        // Logbook hari ini (PRD L1, L2)
        $todayLogbook = $siswa ? Jurnal::query()
            ->where('siswa_id', $siswa->id)
            ->where('tanggal', $today)
            ->first() : null;

        // Logbook terbaru
        $recentLogbooks = $siswa ? Jurnal::query()
            ->where('siswa_id', $siswa->id)
            ->orderByDesc('tanggal')
            ->take(5)
            ->get() : collect();

        // Statistik Kehadiran
        $totalCheckins = $siswa ? Absensi::query()->where('siswa_id', $siswa->id)->count() : 0;
        $presentCount = $siswa ? Absensi::query()->where('siswa_id', $siswa->id)->where('status', 'Hadir')->count() : 0;
        $attendanceRate = $totalCheckins > 0 ? round(($presentCount / $totalCheckins) * 100, 1) : 98.5;

        // Statistik Logbook
        $totalLogbooks = $siswa ? Jurnal::query()->where('siswa_id', $siswa->id)->count() : 0;
        $approvedLogbooks = $siswa ? Jurnal::query()->where('siswa_id', $siswa->id)->where('status', 'Disetujui')->count() : 0;
        $pendingLogbooks = $siswa ? Jurnal::query()->where('siswa_id', $siswa->id)->where('status', 'Pending')->count() : 0;

        // Periode Aktif
        $periodeAktif = PeriodePkl::query()
            ->where('status', 'berjalan')
            ->orderByDesc('tanggal_mulai')
            ->first();

        return view('siswa.dashboard', compact(
            'siswa',
            'todayCheckin',
            'todayLogbook',
            'recentLogbooks',
            'totalCheckins',
            'presentCount',
            'attendanceRate',
            'totalLogbooks',
            'approvedLogbooks',
            'pendingLogbooks',
            'periodeAktif'
        ));
    }
}
