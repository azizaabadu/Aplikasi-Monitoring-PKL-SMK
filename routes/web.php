<?php

use App\Http\Controllers\Admin\DudiController;
use App\Http\Controllers\Admin\DudiKuotaController;
use App\Http\Controllers\Admin\MitraDudiController;
use App\Http\Controllers\Admin\PenempatanController;
use App\Http\Controllers\Admin\PeriodePklController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Siswa\PilihanMitraController;
use App\Http\Controllers\OrangTua\DashboardController as OrangTuaDashboardController;
use App\Models\Dudi;
use App\Models\PeriodePkl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

    Route::get('/auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])
        ->whereIn('provider', ['google', 'belajarid'])
        ->name('oauth.redirect');

    Route::get('/auth/{provider}/callback', [SocialLoginController::class, 'callback'])
        ->whereIn('provider', ['google', 'belajarid'])
        ->name('oauth.callback');
});

Route::middleware(['auth', 'role:siswa,guru,pembimbing_dudi,orang_tua,kepala_sekolah,admin'])->group(function (): void {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', function (Request $request) {
        return match ($request->user()->peran) {
            'siswa' => redirect()->route('siswa.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            'guru' => redirect()->route('guru.dashboard'),
            'pembimbing_dudi' => redirect()->route('dudi.dashboard'),
            'orang_tua' => redirect()->route('orangtua.dashboard'),
            default => response()->json([
                'user' => $request->user()->only(['id', 'name', 'username', 'peran']),
                'message' => 'Autentikasi berhasil.',
            ]),
        };
    })->name('dashboard');

    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function (): void {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        Route::get('/kemitraan-dudi', [MitraDudiController::class, 'index'])->name('dudi-mou');
        Route::post('/kemitraan-dudi', [MitraDudiController::class, 'store'])->name('dudi-mou.store');
        Route::view('/monitoring-pembimbing', 'admin.monitoring-pembimbing')->name('monitoring-pembimbing');
        Route::view('/manajemen-siswa', 'admin.manajemen-siswa')->name('manajemen-siswa');
        Route::view('/rekapitulasi-nilai', 'admin.rekapitulasi-nilai')->name('rekapitulasi-nilai');
        Route::view('/pengaturan-akun', 'admin.pengaturan-akun')->name('pengaturan-akun');

        Route::apiResource('dudis', DudiController::class);

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::put('/users/{user}/profile', [UserController::class, 'linkProfile'])->name('users.profile.update');

        Route::get('/periode-pkl', [PeriodePklController::class, 'index'])->name('periode-pkl.index');
        Route::post('/periode-pkl', [PeriodePklController::class, 'store'])->name('periode-pkl.store');
        Route::get('/periode-pkl/{periodePkl}', [PeriodePklController::class, 'show'])->name('periode-pkl.show');
        Route::patch('/periode-pkl/{periodePkl}', [PeriodePklController::class, 'update'])->name('periode-pkl.update');

        Route::get('/dudis/{dudi}/periode/{periodePkl}/kuota', [DudiKuotaController::class, 'show'])
            ->name('dudis.kuota.show');
        Route::put('/dudis/{dudi}/periode/{periodePkl}/kuota', [DudiKuotaController::class, 'update'])
            ->name('dudis.kuota.update');
        Route::get('/periode-pkl/{periodePkl}/penempatan', [PenempatanController::class, 'index'])
            ->name('penempatan.index');
        Route::post('/periode-pkl/{periodePkl}/penempatan', [PenempatanController::class, 'store'])
            ->name('penempatan.store');
    });

    // RUTE LENGKAP DASHBOARD & MENU GURU PEMBIMBING
    Route::prefix('guru')->name('guru.')->middleware('role:guru')->group(function (): void {
        Route::view('/dashboard', 'guru.dashboard')->name('dashboard');
        Route::view('/presensi', 'guru.presensi')->name('presensi');
        Route::view('/logbook', 'guru.logbook')->name('logbook');
        Route::view('/siswa-dudi', 'guru.siswa-dudi')->name('siswa-dudi');
        Route::view('/penilaian', 'guru.penilaian')->name('penilaian');
        Route::view('/laporan', 'guru.laporan')->name('laporan');
        Route::view('/pengaturan', 'guru.pengaturan')->name('pengaturan');
    });

    // RUTE DASHBOARD PEMBIMBING DUDI
    Route::prefix('dudi')->name('dudi.')->middleware('role:pembimbing_dudi')->group(function (): void {
        Route::view('/dashboard', 'dudi.dashboard')->name('dashboard');
    });

    Route::prefix('siswa')->name('siswa.')->middleware('role:siswa')->group(function (): void {
        Route::view('/dashboard', 'siswa.dashboard')->name('dashboard');
        Route::view('/checkin', 'siswa.checkin')->name('checkin');
        Route::view('/logbook', 'siswa.logbook')->name('logbook');
        Route::view('/penempatan', 'siswa.penempatan')->name('penempatan');
        Route::view('/penilaian', 'siswa.penilaian')->name('penilaian');
        Route::view('/laporan', 'siswa.laporan')->name('laporan');
        Route::view('/pengaturan', 'siswa.pengaturan')->name('pengaturan');

        Route::get('/periode/{periodePkl}/pilihan-mitra', [PilihanMitraController::class, 'index'])
            ->name('pilihan-mitra.index');
        Route::put('/periode/{periodePkl}/pilihan-mitra', [PilihanMitraController::class, 'update'])
            ->name('pilihan-mitra.update');

        Route::get('/periode/{periodePkl}/dudis', function (PeriodePkl $periodePkl) {
            $dudis = Dudi::query()
                ->where('aktif', true)
                ->whereHas('kuotas', fn ($query) => $query
                    ->where('periode_pkl_id', $periodePkl->id)
                    ->where('kuota', '>', 0))
                ->with(['kuotas' => fn ($query) => $query->where('periode_pkl_id', $periodePkl->id)])
                ->orderBy('nama_dudi')
                ->paginate(20);

            return response()->json($dudis);
        })->name('dudis.index');
    });

    Route::prefix('orangtua')->name('orangtua.')->middleware('role:orang_tua')->group(function (): void {
        Route::get('/dashboard', [OrangTuaDashboardController::class, 'index'])->name('dashboard');
        Route::get('/kehadiran', [OrangTuaDashboardController::class, 'kehadiran'])->name('kehadiran');
        Route::get('/logbook', [OrangTuaDashboardController::class, 'logbook'])->name('logbook');
        Route::get('/penilaian', [OrangTuaDashboardController::class, 'penilaian'])->name('penilaian');
        Route::get('/mitra', [OrangTuaDashboardController::class, 'mitra'])->name('mitra');
        Route::get('/pengaturan', [OrangTuaDashboardController::class, 'pengaturan'])->name('pengaturan');
        Route::post('/pengaturan/password', [OrangTuaDashboardController::class, 'updatePassword'])->name('pengaturan.password');
    });
});
