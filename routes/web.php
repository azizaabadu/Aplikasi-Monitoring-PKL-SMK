<?php

use App\Http\Controllers\Admin\DudiController;
use App\Http\Controllers\Admin\DudiKuotaController;
use App\Http\Controllers\Admin\PenempatanController;
use App\Http\Controllers\Admin\PeriodePklController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Siswa\PilihanMitraController;
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
});

Route::middleware(['auth', 'role:siswa,guru,pembimbing_dudi,orang_tua,kepala_sekolah,admin'])->group(function (): void {
    Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', function (Request $request) {
        return response()->json([
            'user' => $request->user()->only(['id', 'name', 'username', 'peran']),
            'message' => 'Autentikasi berhasil.',
        ]);
    })->name('dashboard');

    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function (): void {
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

    Route::prefix('guru')->name('guru.')->middleware('role:guru')->group(function (): void {
        Route::get('/dashboard', fn (Request $request) => response()->json([
            'user' => $request->user()->only(['id', 'name', 'peran']),
        ]))->name('dashboard');
    });

    Route::prefix('dudi')->name('dudi.')->middleware('role:pembimbing_dudi')->group(function (): void {
        Route::get('/dashboard', fn (Request $request) => response()->json([
            'dudi' => Dudi::query()->where('user_id', $request->user()->id)->firstOrFail(),
        ]))->name('dashboard');
    });

    Route::prefix('siswa')->name('siswa.')->middleware('role:siswa')->group(function (): void {
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
        Route::get('/dashboard', fn (Request $request) => response()->json([
            'anak' => $request->user()->orangTua()->with('siswa')->firstOrFail()->siswa,
        ]))->name('dashboard');
    });
});
