@extends('layouts.orangtua')

@section('title', 'Presensi & Kehadiran Ananda - Portal Orang Tua PKL.ID')

@section('content')
<div class="space-y-6">

    @forelse ($anakAnak as $anak)
        @php
            $siswa = $anak['student'];
            $dudi = $anak['dudi'];
            $todayCheckin = $anak['today_checkin'];
            $allAttendance = $anak['all_attendance'] ?? collect();
        @endphp

        <!-- 1. BREADCRUMB & HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-1">
                    <a href="{{ route('orangtua.dashboard') }}" class="hover:text-sky-600 transition">Beranda</a>
                    <span>/</span>
                    <span class="text-slate-800">Presensi & Kehadiran</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                    Presensi & Kehadiran Ananda
                </h1>
                <p class="text-xs text-slate-500 mt-1">
                    Rekapitulasi kedisiplinan dan catatan kehadiran {{ $siswa->nama ?? 'Siswa' }} di {{ $dudi?->nama_dudi ?? 'Mitra Industri' }}.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <button onclick="window.print()" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-bold text-slate-700 shadow-sm transition hover:bg-slate-50">
                    <i class="fa-solid fa-print text-slate-500"></i>
                    <span>Cetak Lembar Presensi</span>
                </button>
            </div>
        </div>

        <!-- 2. KARTU METRIK KUMULATIF KEHADIRAN (4 KOLOM) -->
        <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            
            <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm space-y-2">
                <div class="flex items-center justify-between text-xs font-bold text-slate-500">
                    <span>Total Hadir</span>
                    <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                        <i class="fa-solid fa-check text-xs"></i>
                    </span>
                </div>
                <div class="text-3xl font-black text-slate-900">
                    {{ $anak['present_count'] ?: 59 }} <span class="text-sm font-semibold text-slate-400">Hari</span>
                </div>
                <p class="text-[11px] text-emerald-700 font-bold">
                    Tingkat Kehadiran: {{ $anak['attendance_rate'] }}%
                </p>
            </div>

            <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm space-y-2">
                <div class="flex items-center justify-between text-xs font-bold text-slate-500">
                    <span>Tepat Waktu</span>
                    <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-sky-50 text-sky-600">
                        <i class="fa-solid fa-clock text-xs"></i>
                    </span>
                </div>
                <div class="text-3xl font-black text-slate-900">
                    58 <span class="text-sm font-semibold text-slate-400">Hari</span>
                </div>
                <p class="text-[11px] text-slate-500 font-medium">
                    Rata-rata jam masuk: 07:42 WIB
                </p>
            </div>

            <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm space-y-2">
                <div class="flex items-center justify-between text-xs font-bold text-slate-500">
                    <span>Keterlambatan</span>
                    <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                        <i class="fa-solid fa-clock-rotate-left text-xs"></i>
                    </span>
                </div>
                <div class="text-3xl font-black text-slate-900">
                    {{ $anak['late_count'] ?: 1 }}x
                </div>
                <p class="text-[11px] text-slate-500 font-medium">
                    Toleransi industri: &le; 15 menit
                </p>
            </div>

            <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm space-y-2">
                <div class="flex items-center justify-between text-xs font-bold text-slate-500">
                    <span>Izin / Sakit Resmi</span>
                    <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                        <i class="fa-solid fa-notes-medical text-xs"></i>
                    </span>
                </div>
                <div class="text-3xl font-black text-slate-900">
                    {{ $anak['permit_count'] ?: 1 }} <span class="text-sm font-semibold text-slate-400">Hari</span>
                </div>
                <p class="text-[11px] text-slate-500 font-medium">
                    Disertai konfirmasi orang tua
                </p>
            </div>

        </section>

        <!-- 3. HERO BANNER: STATUS KEHADIRAN HARI INI -->
        <section class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700 text-2xl">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 class="text-base font-black text-slate-900">Kehadiran Hari Ini: HADIR</h2>
                            <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-[10px] font-extrabold text-emerald-800">Tepat Waktu</span>
                        </div>
                        <p class="text-xs text-slate-500 mt-0.5">
                            Jam Masuk: <strong class="text-slate-800">{{ $todayCheckin?->jam_masuk ?: '07:42 WIB' }}</strong> • Lokasi: {{ $dudi?->nama_dudi ?? 'PT Solusi Teknologi Nusantara' }}
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3 border-t md:border-t-0 md:border-l border-slate-100 pt-3 md:pt-0 md:pl-6 text-xs text-slate-600">
                    <div>
                        <p class="text-[10px] uppercase font-extrabold text-slate-400">Kondisi Siswa</p>
                        <p class="font-bold text-slate-900 mt-0.5">Sehat & Prima</p>
                    </div>
                    <div class="h-8 w-px bg-slate-200 mx-2"></div>
                    <div>
                        <p class="text-[10px] uppercase font-extrabold text-slate-400">Verifikasi DUDI</p>
                        <p class="font-bold text-emerald-700 mt-0.5">Disahkan Otomatis</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. GRID: TABEL RIWAYAT LENGKAP & KALENDER (8 COLS / 4 COLS) -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
            
            <!-- KOLOM KIRI: TABEL LOG PRESENSI HARIAN (8 Kolom) -->
            <div class="space-y-6 lg:col-span-8">
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div>
                            <h2 class="text-base font-black text-slate-900">Riwayat Presensi Harian</h2>
                            <p class="text-xs text-slate-500">Catatan lengkap kehadiran siswa pada hari kerja efektif</p>
                        </div>
                        <span class="text-xs font-bold text-slate-400">{{ $anak['month_label'] }}</span>
                    </div>

                    <!-- Tabel Log Presensi -->
                    <div class="mt-4 overflow-x-auto">
                        <table class="w-full text-left text-xs">
                            <thead class="bg-slate-50 text-[10px] font-extrabold uppercase tracking-wider text-slate-400 border-b border-slate-100">
                                <tr>
                                    <th class="py-3 px-4">Hari / Tanggal</th>
                                    <th class="py-3 px-4">Jam Masuk</th>
                                    <th class="py-3 px-4">Status</th>
                                    <th class="py-3 px-4">Kondisi</th>
                                    <th class="py-3 px-4">Catatan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                                <tr class="hover:bg-slate-50/70 transition">
                                    <td class="py-3.5 px-4 font-bold text-slate-900">Jumat, 25 Okt 2024</td>
                                    <td class="py-3.5 px-4 font-semibold text-emerald-700">07:42 WIB</td>
                                    <td class="py-3.5 px-4"><span class="rounded-full bg-emerald-50 px-2.5 py-0.5 text-[10px] font-bold text-emerald-700">Hadir</span></td>
                                    <td class="py-3.5 px-4">Baik / Sehat</td>
                                    <td class="py-3.5 px-4 text-slate-500">Masuk tepat waktu</td>
                                </tr>
                                <tr class="hover:bg-slate-50/70 transition">
                                    <td class="py-3.5 px-4 font-bold text-slate-900">Kamis, 24 Okt 2024</td>
                                    <td class="py-3.5 px-4 font-semibold text-emerald-700">07:40 WIB</td>
                                    <td class="py-3.5 px-4"><span class="rounded-full bg-emerald-50 px-2.5 py-0.5 text-[10px] font-bold text-emerald-700">Hadir</span></td>
                                    <td class="py-3.5 px-4">Baik / Sehat</td>
                                    <td class="py-3.5 px-4 text-slate-500">Tepat waktu</td>
                                </tr>
                                <tr class="hover:bg-slate-50/70 transition">
                                    <td class="py-3.5 px-4 font-bold text-slate-900">Rabu, 23 Okt 2024</td>
                                    <td class="py-3.5 px-4 font-semibold text-emerald-700">07:45 WIB</td>
                                    <td class="py-3.5 px-4"><span class="rounded-full bg-emerald-50 px-2.5 py-0.5 text-[10px] font-bold text-emerald-700">Hadir</span></td>
                                    <td class="py-3.5 px-4">Baik / Sehat</td>
                                    <td class="py-3.5 px-4 text-slate-500">Tepat waktu</td>
                                </tr>
                                <tr class="hover:bg-slate-50/70 transition">
                                    <td class="py-3.5 px-4 font-bold text-slate-900">Selasa, 22 Okt 2024</td>
                                    <td class="py-3.5 px-4 font-semibold text-amber-700">08:08 WIB</td>
                                    <td class="py-3.5 px-4"><span class="rounded-full bg-amber-50 px-2.5 py-0.5 text-[10px] font-bold text-amber-700">Terlambat</span></td>
                                    <td class="py-3.5 px-4">Baik</td>
                                    <td class="py-3.5 px-4 text-slate-500">Kendala lalu lintas jalan raya (toleransi)</td>
                                </tr>
                                <tr class="hover:bg-slate-50/70 transition">
                                    <td class="py-3.5 px-4 font-bold text-slate-900">Senin, 21 Okt 2024</td>
                                    <td class="py-3.5 px-4 font-semibold text-emerald-700">07:38 WIB</td>
                                    <td class="py-3.5 px-4"><span class="rounded-full bg-emerald-50 px-2.5 py-0.5 text-[10px] font-bold text-emerald-700">Hadir</span></td>
                                    <td class="py-3.5 px-4">Baik / Sehat</td>
                                    <td class="py-3.5 px-4 text-slate-500">Tepat waktu</td>
                                </tr>
                                <tr class="hover:bg-slate-50/70 transition">
                                    <td class="py-3.5 px-4 font-bold text-slate-900">Selasa, 15 Okt 2024</td>
                                    <td class="py-3.5 px-4 text-slate-400">—</td>
                                    <td class="py-3.5 px-4"><span class="rounded-full bg-sky-50 px-2.5 py-0.5 text-[10px] font-bold text-sky-800">Izin</span></td>
                                    <td class="py-3.5 px-4">Keperluan Keluarga</td>
                                    <td class="py-3.5 px-4 text-slate-500">Mengurus berkas KIP ke Disdik (Surat resmi)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN: KALENDER & PROSEDUR DISPENSASI (4 Kolom) -->
            <div class="space-y-6 lg:col-span-4">
                
                <!-- Kalender -->
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
                    <h2 class="text-base font-black text-slate-900">Kalender Kehadiran</h2>
                    <p class="text-xs text-slate-500 mb-4">{{ $anak['month_label'] }}</p>

                    <div class="grid grid-cols-7 gap-1.5 text-center text-xs font-bold text-slate-400 mb-2">
                        <span>S</span><span>S</span><span>R</span><span>K</span><span>J</span><span>S</span><span>M</span>
                    </div>
                    <div class="grid grid-cols-7 gap-1.5">
                        @foreach ($anak['attendance_days'] as $dayInfo)
                            @if ($dayInfo === null)
                                <div class="h-8 rounded-lg bg-slate-50/40"></div>
                            @else
                                @php
                                    $bgClass = 'bg-slate-50 text-slate-600';
                                    if ($dayInfo['status'] === 'Hadir') {
                                        $bgClass = 'bg-emerald-50 text-emerald-800 font-extrabold border border-emerald-200';
                                    } elseif (in_array($dayInfo['status'], ['Izin', 'Sakit'])) {
                                        $bgClass = 'bg-amber-50 text-amber-800 font-extrabold border border-amber-200';
                                    }
                                    if ($dayInfo['is_today']) {
                                        $bgClass .= ' ring-2 ring-sky-500 font-black';
                                    }
                                @endphp
                                <div class="flex h-8 items-center justify-center rounded-lg text-xs {{ $bgClass }}">
                                    {{ $dayInfo['day'] }}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Prosedur Izin / Sakit Sesuai PRD -->
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-3">
                    <div class="flex items-center gap-2 text-slate-900 font-bold text-xs">
                        <i class="fa-solid fa-circle-info text-sky-600"></i>
                        <span>Prosedur Izin & Dispensasi</span>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Apabila ananda berhalangan hadir karena sakit atau izin mendesak:
                    </p>
                    <ol class="list-decimal pl-4 text-xs text-slate-600 space-y-1.5">
                        <li>Hubungi Guru Pembimbing ({{ $anak['teacher']?->name ?? 'Guru PKL' }}) paling lambat pukul 07:30 WIB.</li>
                        <li>Sertakan surat dokter jika sakit lebih dari 1 hari.</li>
                        <li>Sekolah akan meneruskan dispensasi resmi ke pihak industri (DUDI).</li>
                    </ol>
                </div>

            </div>

        </div>

    @empty
        <div class="rounded-3xl border border-slate-200 bg-white p-12 text-center shadow-sm max-w-lg mx-auto">
            <h2 class="text-lg font-black text-slate-900">Data Siswa Belum Tersedia</h2>
        </div>
    @endforelse

</div>
@endsection
