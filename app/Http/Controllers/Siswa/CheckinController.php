<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class CheckinController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $siswa = Siswa::query()
            ->where('user_id', $user->id)
            ->with(['dudi', 'guru.user'])
            ->first();
    feature/member-1-backend

        if (!$siswa) {
            session()->flash('warning', 'Akun Anda belum terhubung dengan data profil siswa. Silakan hubungi Administrator sekolah.');
        }
    
     main

        $today = now()->toDateString();
        $todayCheckin = $siswa ? Absensi::query()
            ->where('siswa_id', $siswa->id)
            ->where('tanggal', $today)
            ->first() : null;

        $monthStart = now()->startOfMonth();
        $attendance = $siswa ? Absensi::query()
            ->where('siswa_id', $siswa->id)
            ->orderByDesc('tanggal')
            ->get() : collect();

        // Kalender
        $attendanceByDate = $attendance->keyBy(
            fn (Absensi $r): string => Carbon::parse($r->tanggal)->toDateString()
        );
        $attendanceDays = array_fill(0, $monthStart->dayOfWeekIso - 1, null);

        for ($day = 1; $day <= $monthStart->daysInMonth; $day++) {
            $date = $monthStart->copy()->day($day);
            $record = $attendanceByDate->get($date->toDateString());

            $attendanceDays[] = [
                'day' => $day,
                'date' => $date->toDateString(),
                'status' => $record?->status,
                'kondisi' => $record?->kondisi,
                'jam_masuk' => $record?->jam_masuk,
                'is_today' => $date->isToday(),
            ];
        }

        while (count($attendanceDays) % 7 !== 0) {
            $attendanceDays[] = null;
        }

        $presentCount = $attendance->where('status', 'Hadir')->count();
        $permitCount = $attendance->whereIn('status', ['Izin', 'Sakit'])->count();
        $totalDays = $attendance->count();
        $attendanceRate = $totalDays > 0 ? round(($presentCount / $totalDays) * 100, 1) : 0;

        return view('siswa.checkin', compact(
            'siswa',
            'todayCheckin',
            'attendance',
            'attendanceDays',
            'presentCount',
            'permitCount',
            'totalDays',
            'attendanceRate'
        ));
    }

    /**
     * Simpan Check-in Harian Siswa (PRD K1)
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:Hadir,Izin,Sakit'],
            'kondisi' => ['required', 'in:baik,kurang_sehat,ada_kendala'],
            'catatan' => ['nullable', 'string', 'max:500'],
        ], [
            'status.required' => 'Pilih status kehadiran Anda hari ini.',
            'kondisi.required' => 'Pilih kondisi fisik/keadaan Anda hari ini.',
        ]);

        $user = $request->user();
        $siswa = Siswa::query()->where('user_id', $user->id)->first();

     feature/member-1-backend
        if (!$siswa) {
            return back()->with('error', 'Profil siswa tidak ditemukan atau belum terhubung dengan akun Anda.');
    
        if (! $siswa) {
            return back()->with('error', 'Profil siswa tidak ditemukan.');
     main
        }

        $today = now()->toDateString();
        $nowTime = now()->format('H:i:s');

        Absensi::updateOrCreate(
            [
                'siswa_id' => $siswa->id,
                'tanggal' => $today,
            ],
            [
                'jam_masuk' => $nowTime,
                'status' => $validated['status'],
                'kondisi' => $validated['kondisi'],
                'catatan' => $validated['catatan'],
                'lokasi' => $siswa->dudi?->nama_dudi ?? 'Lokasi PKL',
            ]
        );

        return back()->with('status', 'Check-in kehadiran dan kondisi hari ini berhasil dicatat.');
    }
}
