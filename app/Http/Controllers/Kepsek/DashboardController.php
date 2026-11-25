<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Dudi;
use App\Models\Jurnal;
use App\Models\Jurusan;
use App\Models\Penempatan;
use App\Models\PeriodePkl;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Dashboard Eksekutif Kepala Sekolah (PRD Bagian 5.8)
     */
    public function dashboard(Request $request): View
    {
        $periodeAktif = PeriodePkl::query()
            ->where('status', 'berjalan')
            ->orderByDesc('tanggal_mulai')
            ->first() ?? PeriodePkl::first();

        $totalSiswa = Siswa::count();
        $totalPenempatan = Penempatan::count();
        $penempatanDisetujui = Penempatan::where('status', 'disetujui')->count();
        $penempatanMenunggu = Penempatan::where('status', 'menunggu_persetujuan')->count();
        $siswaBelumPenempatan = max(0, $totalSiswa - $totalPenempatan);

        $totalDudi = Dudi::where('aktif', true)->count();
        $totalKuotaDudi = Dudi::where('aktif', true)->sum('kuota');

        // Rekapitulasi Presensi Hari Ini (PRD K1)
        $today = now()->toDateString();
        $todayAbsensis = Absensi::where('tanggal', $today)->get();
        $hadirToday = $todayAbsensis->where('status', 'Hadir')->count();
        $izinToday = $todayAbsensis->where('status', 'Izin')->count();
        $sakitToday = $todayAbsensis->where('status', 'Sakit')->count();

        // Siswa yang melaporkan kendala atau sakit hari ini (PRD K1 monitoring)
        $kendalaToday = Absensi::with(['siswa.dudi', 'siswa.guru'])
            ->where('tanggal', $today)
            ->whereIn('kondisi', ['kurang_sehat', 'ada_kendala'])
            ->get();

        // Rekap per jurusan
        $jurusanList = Jurusan::all();
        $rekapJurusan = [];
        foreach ($jurusanList as $jur) {
            $countSiswaJur = Siswa::where('jurusan', $jur->nama_jurusan)->count();
            $countPlacedJur = Siswa::where('jurusan', $jur->nama_jurusan)->has('penempatans')->count();
            $rekapJurusan[] = [
                'nama' => $jur->nama_jurusan,
                'total_siswa' => $countSiswaJur,
                'ditempatkan' => $countPlacedJur,
                'persen' => $countSiswaJur > 0 ? round(($countPlacedJur / $countSiswaJur) * 100, 1) : 0,
            ];
        }

        // 5 Penempatan Terbaru
        $recentPenempatans = Penempatan::with(['siswa', 'dudi'])
            ->latest()
            ->take(5)
            ->get();

        return view('kepsek.dashboard', compact(
            'periodeAktif',
            'totalSiswa',
            'totalPenempatan',
            'penempatanDisetujui',
            'penempatanMenunggu',
            'siswaBelumPenempatan',
            'totalDudi',
            'totalKuotaDudi',
            'todayAbsensis',
            'hadirToday',
            'izinToday',
            'sakitToday',
            'kendalaToday',
            'rekapJurusan',
            'recentPenempatans'
        ));
    }

    /**
     * Halaman Persetujuan Penempatan Siswa (PRD T6)
     */
    public function penempatan(Request $request): View
    {
        $jurusanFilter = $request->query('jurusan');
        $statusFilter = $request->query('status'); // semua, disetujui, menunggu_persetujuan

        $query = Penempatan::with(['siswa.guru', 'dudi', 'periodePkl']);

        if ($jurusanFilter) {
            $query->whereHas('siswa', fn ($q) => $q->where('jurusan', $jurusanFilter));
        }

        if ($statusFilter && in_array($statusFilter, ['disetujui', 'menunggu_persetujuan'])) {
            $query->where('status', $statusFilter);
        }

        $penempatans = $query->latest()->paginate(15)->withQueryString();

        $stats = [
            'total' => Penempatan::count(),
            'disetujui' => Penempatan::where('status', 'disetujui')->count(),
            'menunggu' => Penempatan::where('status', 'menunggu_persetujuan')->count(),
        ];

        $jurusanList = Jurusan::pluck('nama_jurusan');

        return view('kepsek.penempatan', compact('penempatans', 'stats', 'jurusanList', 'jurusanFilter', 'statusFilter'));
    }

    /**
     * Aksi Pengesahan / Persetujuan Penempatan oleh Kepala Sekolah (PRD T6)
     */
    public function setujuiPenempatan(Request $request): RedirectResponse
    {
        $penempatanId = $request->input('penempatan_id');
        $action = $request->input('action'); // 'single' atau 'all'

        if ($action === 'all') {
            Penempatan::where('status', 'menunggu_persetujuan')->update([
                'status' => 'disetujui',
                'disetujui_pada' => now(),
            ]);

            return back()->with('status', 'Seluruh daftar akhir penempatan siswa PKL berhasil disahkan oleh Kepala Sekolah.');
        }

        if ($penempatanId) {
            $penempatan = Penempatan::findOrFail($penempatanId);
            $penempatan->update([
                'status' => 'disetujui',
                'disetujui_pada' => now(),
            ]);

            return back()->with('status', "Penempatan siswa {$penempatan->siswa?->nama} di {$penempatan->dudi?->nama_dudi} berhasil disahkan.");
        }

        return back()->with('error', 'Pilih penempatan yang ingin disahkan.');
    }

    /**
     * Monitoring Presensi & Kendala Harian Sekolah (PRD K1)
     */
    public function monitoring(Request $request): View
    {
        $today = now()->toDateString();
        $absensis = Absensi::with(['siswa.dudi', 'siswa.guru'])
            ->where('tanggal', $today)
            ->latest('jam_masuk')
            ->paginate(15);

        $kendalaList = Absensi::with(['siswa.dudi', 'siswa.guru'])
            ->where('tanggal', $today)
            ->whereIn('kondisi', ['kurang_sehat', 'ada_kendala'])
            ->get();

        $stats = [
            'total_absen' => Absensi::where('tanggal', $today)->count(),
            'hadir' => Absensi::where('tanggal', $today)->where('status', 'Hadir')->count(),
            'izin' => Absensi::where('tanggal', $today)->where('status', 'Izin')->count(),
            'sakit' => Absensi::where('tanggal', $today)->where('status', 'Sakit')->count(),
            'kendala' => $kendalaList->count(),
        ];

        return view('kepsek.monitoring', compact('absensis', 'kendalaList', 'stats'));
    }

    /**
     * Rekapitulasi Nilai PKL Siswa (PRD N6)
     */
    public function penilaian(Request $request): View
    {
        $jurusanFilter = $request->query('jurusan');

        $query = Siswa::with(['dudi', 'guru']);

        if ($jurusanFilter) {
            $query->where('jurusan', $jurusanFilter);
        }

        $siswas = $query->paginate(15)->withQueryString();
        $jurusanList = Jurusan::pluck('nama_jurusan');

        return view('kepsek.penilaian', compact('siswas', 'jurusanList', 'jurusanFilter'));
    }

    /**
     * Direktori Mitra DUDI & Daya Tampung (PRD 5.1)
     */
    public function mitra(Request $request): View
    {
        $dudis = Dudi::withCount('siswas')
            ->orderBy('nama_dudi')
            ->paginate(12);

        $stats = [
            'total_mitra' => Dudi::count(),
            'mitra_aktif' => Dudi::where('aktif', true)->count(),
            'total_daya_tampung' => Dudi::where('aktif', true)->sum('kuota'),
            'total_terisi' => Penempatan::count(),
        ];

        return view('kepsek.mitra', compact('dudis', 'stats'));
    }

    /**
     * Pengaturan Profil Kepala Sekolah
     */
    public function pengaturan(Request $request): View
    {
        $user = $request->user();
        return view('kepsek.pengaturan', compact('user'));
    }

    /**
     * Update Password Kepala Sekolah
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ], [
            'current_password.current_password' => 'Kata sandi saat ini tidak sesuai.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'Kata sandi berhasil diperbarui.');
    }
}
