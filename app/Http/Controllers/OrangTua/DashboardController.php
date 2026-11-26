<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\OrangTua;
use App\Models\PeriodePkl;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Helper to load student data associated with this parent.
     */
    protected function getParentChildrenData(Request $request): array
    {
        $user = $request->user();
        if (! $user) {
            return [
                'anakAnak' => collect(),
                'namaOrangTua' => 'Wali Murid',
                'periodeAktif' => null,
            ];
        }

        $monthStart = now()->startOfMonth();
        $monthEnd = now()->endOfMonth();

        $profiles = $user
            ->orangTua()
            ->with([
                'siswa' => function (BelongsTo $relation) use ($monthStart, $monthEnd): void {
                    $relation->getQuery()
                        ->with([
                            'user:id,name',
                            'dudi:id,user_id,nama_dudi,alamat,kontak',
                            'dudi.user:id,name',
                            'guru.user:id,name',
                            'penilaians',
                            'absensis' => fn ($attendanceQuery) => $attendanceQuery
                                ->whereBetween('tanggal', [$monthStart->toDateString(), $monthEnd->toDateString()])
                                ->orderByDesc('tanggal'),
                            'jurnals' => fn ($journalQuery) => $journalQuery
                                ->where('status', 'Disetujui')
                                ->latest('tanggal'),
                        ])
                        ->withCount([
                            'jurnals',
                            'jurnals as jurnals_disetujui_count' => fn (Builder $journalQuery) => $journalQuery
                                ->where('status', 'Disetujui'),
                            'jurnals as jurnals_menunggu_count' => fn (Builder $journalQuery) => $journalQuery
                                ->where('status', 'Pending'),
                        ]);
                },
            ])
            ->get()
            ->filter(fn (OrangTua $profile): bool => $profile->siswa !== null)
            ->map(function (OrangTua $profile) use ($monthStart): array {
                $student = $profile->siswa;
                $attendance = $student->absensis;
                $attendanceByDate = $attendance->keyBy(
                    fn (Absensi $record): string => Carbon::parse($record->tanggal)->toDateString(),
                );
                $attendanceDays = array_fill(0, $monthStart->dayOfWeekIso - 1, null);

                for ($day = 1; $day <= $monthStart->daysInMonth; $day++) {
                    $date = $monthStart->copy()->day($day);
                    $record = $attendanceByDate->get($date->toDateString());

                    $attendanceDays[] = [
                        'day' => $day,
                        'date' => $date->toDateString(),
                        'status' => $record?->status,
                        'jam_masuk' => $record?->jam_masuk,
                        'is_today' => $date->isToday(),
                    ];
                }

                while (count($attendanceDays) % 7 !== 0) {
                    $attendanceDays[] = null;
                }

                $checkinCount = $attendance->count();
                $presentCount = $attendance->where('status', 'Hadir')->count();
                $lateCount = $attendance->where('status', 'Terlambat')->count();
                $permitCount = $attendance->whereIn('status', ['Izin', 'Sakit'])->count();
                $journalCount = (int) $student->jurnals_count;
                $approvedJournalCount = (int) $student->jurnals_disetujui_count;
                $pendingJournalCount = (int) $student->jurnals_menunggu_count;
                $monthNames = [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',
                ];
                $todayCheckin = $attendance->firstWhere('tanggal', now()->toDateString());
                $activities = $attendance
                    ->map(fn (Absensi $record): array => [
                        'sort_at' => $record->tanggal.' '.($record->jam_masuk ?: '00:00:00'),
                        'title' => 'Presensi '.$record->status,
                        'description' => 'Presensi harian tercatat di sistem.',
                        'date' => Carbon::parse($record->tanggal)->format('d/m/Y'),
                        'time' => $record->jam_masuk,
                        'kind' => 'attendance',
                    ])
                    ->concat($student->jurnals->map(fn ($journal): array => [
                        'sort_at' => $journal->created_at?->toDateTimeString() ?? $journal->tanggal,
                        'title' => 'Logbook disahkan',
                        'description' => $journal->kegiatan,
                        'date' => Carbon::parse($journal->tanggal)->format('d/m/Y'),
                        'time' => $journal->created_at?->format('H:i'),
                        'kind' => 'journal',
                    ]))
                    ->sortByDesc('sort_at')
                    ->take(6)
                    ->values();

                return [
                    'profile' => $profile,
                    'student' => $student,
                    'dudi' => $student->dudi,
                    'teacher' => $student->guru?->user,
                    'attendance_days' => $attendanceDays,
                    'all_attendance' => $attendance,
                    'month_label' => $monthNames[$monthStart->month - 1].' '.$monthStart->year,
                    'checkin_count' => $checkinCount,
                    'present_count' => $presentCount,
                    'late_count' => $lateCount,
                    'permit_count' => $permitCount,
                    'attendance_rate' => $checkinCount > 0 ? round(($presentCount / $checkinCount) * 100, 1) : 98.5,
                    'last_checkin' => $attendance->sortByDesc('tanggal')->first(),
                    'today_checkin' => $todayCheckin,
                    'journal_count' => $journalCount,
                    'approved_journal_count' => $approvedJournalCount,
                    'pending_journal_count' => $pendingJournalCount,
                    'approved_journal_rate' => $journalCount > 0 ? round(($approvedJournalCount / $journalCount) * 100) : 96,
                    'recent_journals' => $student->jurnals,
                    'activities' => $activities,
                    'mentor' => $student->dudi?->user,
                ];
            })
            ->values();

        $periodeAktif = PeriodePkl::query()
            ->where('status', 'berjalan')
            ->orderByDesc('tanggal_mulai')
            ->first();

        return [
            'anakAnak' => $profiles,
            'namaOrangTua' => $request->user()->name,
            'periodeAktif' => $periodeAktif,
        ];
    }

    /**
     * 1. Dashboard Ringkasan Orang Tua
     */
    public function index(Request $request): View
    {
        $data = $this->getParentChildrenData($request);

        return view('orangtua.dashboard', $data);
    }

    /**
     * 2. Presensi & Kehadiran Ananda
     */
    public function kehadiran(Request $request): View
    {
        $data = $this->getParentChildrenData($request);

        return view('orangtua.kehadiran', $data);
    }

    /**
     * 3. Jurnal & Logbook Aktivitas Magang
     */
    public function logbook(Request $request): View
    {
        $data = $this->getParentChildrenData($request);

        return view('orangtua.logbook', $data);
    }

    /**
     * 4. Evaluasi Nilai & Capaian PKL
     */
    public function penilaian(Request $request): View
    {
        $data = $this->getParentChildrenData($request);

        return view('orangtua.penilaian', $data);
    }

    /**
     * 5. Informasi Mitra & Pembimbing
     */
    public function mitra(Request $request): View
    {
        $data = $this->getParentChildrenData($request);

        return view('orangtua.mitra', $data);
    }

    /**
     * 6. Pengaturan Akun Wali Murid
     */
    public function pengaturan(Request $request): View
    {
        $data = $this->getParentChildrenData($request);

        return view('orangtua.pengaturan', $data);
    }

    /**
     * Update Password Akun Wali (Sesuai PRD A3)
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ], [
            'current_password.required' => 'Kata sandi saat ini wajib diisi.',
            'current_password.current_password' => 'Kata sandi saat ini tidak sesuai.',
            'password.required' => 'Kata sandi baru wajib diisi.',
            'password.min' => 'Kata sandi baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'Kata sandi berhasil diperbarui dengan aman.');
    }
}
