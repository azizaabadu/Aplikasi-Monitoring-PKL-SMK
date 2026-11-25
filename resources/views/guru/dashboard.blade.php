@extends('layouts.guru')

@section('title', 'Dashboard Monitoring Guru Pembimbing - PKL.ID')

@section('content')
<div class="space-y-6">
    <!-- Banner Utama -->
    <div class="bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div class="space-y-1">
            <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-md bg-indigo-500/20 text-indigo-300 text-[10px] font-bold tracking-wider uppercase border border-indigo-500/30">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Sistem Monitoring Terpadu
            </div>
            <h1 class="text-xl font-black tracking-tight">Dashboard Monitoring Guru Pembimbing</h1>
            <p class="text-xs text-slate-300">Pemantauan kehadiran real-time, validasi logbook harian, dan koordinasi mitra DUDI siswa bimbingan kejuruan.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white rounded-xl text-xs font-bold border border-slate-700 transition flex items-center gap-2">
                <i class="fa-solid fa-rotate"></i> Sinkronisasi Data
            </button>
            <button class="px-4 py-2 bg-cyan-500 hover:bg-cyan-400 text-slate-950 rounded-xl text-xs font-black transition flex items-center gap-2 shadow-md">
                <i class="fa-solid fa-check-double"></i> Validasi Massal (6)
            </button>
        </div>
    </div>

    <!-- Statistik Ringkas (4 Kolom) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1 -->
        <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <div class="text-[11px] font-bold text-slate-400 uppercase">Total Bimbingan</div>
                <div class="text-2xl font-black text-slate-900 mt-1">28 <span class="text-xs font-semibold text-slate-500">Siswa</span></div>
                <div class="text-[10px] text-emerald-600 font-semibold mt-1"><i class="fa-solid fa-check mr-1"></i> PPLG 1 &amp; 2 (100% Terdistribusi)</div>
            </div>
            <div class="w-11 h-11 rounded-xl bg-slate-100 flex items-center justify-center text-slate-700 text-base">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <div class="text-[11px] font-bold text-slate-400 uppercase">Kehadiran Hari Ini</div>
                <div class="text-2xl font-black text-slate-900 mt-1">27 <span class="text-xs font-semibold text-emerald-600">96.4%</span></div>
                <div class="text-[10px] text-slate-500 font-medium mt-1">27 Terdata Masuk, <span class="text-rose-600 font-bold">1 Belum Absen</span></div>
            </div>
            <div class="w-11 h-11 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 text-base">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <div class="text-[11px] font-bold text-slate-400 uppercase">Menunggu Validasi</div>
                <div class="text-2xl font-black text-slate-900 mt-1">6 <span class="text-xs font-bold text-amber-600">Urgent</span></div>
                <div class="text-[10px] text-indigo-600 font-semibold mt-1 flex items-center gap-1 cursor-pointer hover:underline">Logbook DUDI <i class="fa-solid fa-arrow-right text-[9px]"></i></div>
            </div>
            <div class="w-11 h-11 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600 text-base">
                <i class="fa-solid fa-clipboard-list"></i>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <div class="text-[11px] font-bold text-slate-400 uppercase">Perlu Perhatian</div>
                <div class="text-2xl font-black text-rose-600 mt-1">2 <span class="text-xs font-semibold text-slate-500">Siswa</span></div>
                <div class="text-[10px] text-rose-600 font-semibold mt-1">Alpha / Terlambat</div>
            </div>
            <div class="w-11 h-11 rounded-xl bg-rose-50 flex items-center justify-center text-rose-600 text-base">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
        </div>
    </div>

    <!-- Layout Utama Bawah: Tabel Aktivitas & Panel Samping -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Kolom Kiri: Tabel Aktivitas Siswa (2 Kolom) -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden flex flex-col">
            <div class="p-4 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="font-black text-sm text-slate-900">Data Aktivitas Siswa Bimbingan</h3>
                    <p class="text-[11px] text-slate-400">Status harian, jam presensi geofence, dan perkembangan logbook industri.</p>
                </div>
                <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-100">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block mr-1"></span> Live Tracker
                </span>
            </div>

            <!-- Tabel Data -->
            <div class="overflow-x-auto flex-1">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] font-bold border-b border-slate-100">
                        <tr>
                            <th class="px-4 py-3">Siswa</th>
                            <th class="px-4 py-3">Tempat DUDI</th>
                            <th class="px-4 py-3">Presensi Hari Ini</th>
                            <th class="px-4 py-3">Status Jurnal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        <!-- Baris 1 -->
                        <tr class="hover:bg-slate-50/50">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 font-bold flex items-center justify-center text-xs">RP</div>
                                    <div>
                                        <div class="font-bold text-slate-900">Rizky Pratama</div>
                                        <div class="text-[10px] text-slate-400">NISN: 0058291623</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="font-bold text-slate-800">PT Solusi Teknologi Nusantara</div>
                                <div class="text-[10px] text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i> Batam Center</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-block px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700 font-bold text-[11px]">
                                    07:42 WIB
                                </span>
                                <div class="text-[10px] text-emerald-600 mt-0.5">Geotag Valid (18m)</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-emerald-700 font-bold flex items-center gap-1">
                                    <i class="fa-solid fa-circle-check"></i> Disetujui DUDI
                                </span>
                                <div class="text-[10px] text-slate-400">Implementasi REST API</div>
                            </td>
                        </tr>

                        <!-- Baris 2 -->
                        <tr class="hover:bg-slate-50/50">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-sky-100 text-sky-700 font-bold flex items-center justify-center text-xs">SN</div>
                                    <div>
                                        <div class="font-bold text-slate-900">Siti Nurhaliza</div>
                                        <div class="text-[10px] text-slate-400">NISN: 0058291601</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="font-bold text-slate-800">Telkom Corp Digital Lab</div>
                                <div class="text-[10px] text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i> Sukajadi</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-block px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700 font-bold text-[11px]">
                                    07:50 WIB
                                </span>
                                <div class="text-[10px] text-emerald-600 mt-0.5">Geotag Valid (12m)</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-emerald-700 font-bold flex items-center gap-1">
                                    <i class="fa-solid fa-circle-check"></i> Disetujui DUDI
                                </span>
                                <div class="text-[10px] text-slate-400">Testing modul pembayaran...</div>
                            </td>
                        </tr>

                        <!-- Baris 3 -->
                        <tr class="hover:bg-slate-50/50">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-700 font-bold flex items-center justify-center text-xs">BS</div>
                                    <div>
                                        <div class="font-bold text-slate-900 flex items-center gap-1.5">
                                            Bagus Setiawan <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                        </div>
                                        <div class="text-[10px] text-slate-400">NISN: 0058292110</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="font-bold text-slate-800">PT Cyber Media Utama</div>
                                <div class="text-[10px] text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i> Bengkong</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-block px-2.5 py-1 rounded-md bg-amber-50 text-amber-700 font-bold text-[11px]">
                                    08:35 WIB
                                </span>
                                <div class="text-[10px] text-amber-600 mt-0.5">Terlambat (Validasi DUDI)</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-amber-600 font-bold">Menunggu anggaran...</span>
                                <div class="text-[10px] text-rose-500">Belum Diisi Siswa</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer Pagination -->
            <div class="p-3 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <div>Menampilkan <span class="font-bold text-slate-700">1 - 5</span> dari <span class="font-bold text-slate-700">28</span> siswa bimbingan</div>
                <div class="flex items-center gap-1">
                    <button class="w-7 h-7 rounded-lg bg-indigo-600 text-white font-bold flex items-center justify-center shadow-xs">1</button>
                    <button class="w-7 h-7 rounded-lg hover:bg-slate-200 font-bold flex items-center justify-center">2</button>
                    <button class="w-7 h-7 rounded-lg hover:bg-slate-200 font-bold flex items-center justify-center">3</button>
                    <button class="w-7 h-7 rounded-lg hover:bg-slate-200 font-bold flex items-center justify-center"><i class="fa-solid fa-chevron-right text-[10px]"></i></button>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Panel Perlu Perhatian & Agenda DUDI -->
        <div class="space-y-6">
            <!-- Panel Perlu Perhatian -->
            <div class="bg-white rounded-2xl border border-rose-100 shadow-xs overflow-hidden p-4 space-y-3">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2.5">
                    <h3 class="font-black text-xs text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation text-rose-500"></i> Panel Perlu Perhatian
                    </h3>
                    <span class="bg-rose-50 text-rose-600 font-black text-[10px] px-2 py-0.5 rounded-full">3 Isu</span>
                </div>

                <!-- Kartu Isu Siswa -->
                <div class="bg-rose-50/50 rounded-xl p-3.5 border border-rose-100/80 space-y-2.5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-rose-100 text-rose-700 font-bold flex items-center justify-center text-xs">DP</div>
                            <div>
                                <div class="font-bold text-slate-900 text-xs">Dimas Pratama</div>
                                <div class="text-[10px] text-slate-400">PT Nusa Inovasi</div>
                            </div>
                        </div>
                        <span class="bg-rose-600 text-white font-bold text-[9px] px-2 py-0.5 rounded-md">Tinggi</span>
                    </div>
                    <p class="text-[11px] text-slate-600 leading-relaxed">
                        Tidak absen &amp; tanpa logbook selama <span class="text-rose-600 font-bold">2 hari berturut-turut</span> di tempat PKL.
                    </p>
                    <div class="flex items-center gap-2 pt-1">
                        <button class="flex-1 py-1.5 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-[11px] font-bold transition flex items-center justify-center gap-1.5 shadow-xs">
                            <i class="fa-solid fa-phone"></i> Hubungi Siswa
                        </button>
                        <button class="flex-1 py-1.5 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 rounded-lg text-[11px] font-bold transition flex items-center justify-center gap-1.5">
                            <i class="fa-solid fa-building"></i> Kontak DUDI
                        </button>
                    </div>
                </div>
            </div>

            <!-- Agenda Monitoring DUDI -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-xs p-4 space-y-3">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2.5">
                    <h3 class="font-black text-xs text-slate-900 flex items-center gap-2">
                        <i class="fa-regular fa-calendar text-indigo-600"></i> Agenda Monitoring DUDI
                    </h3>
                    <i class="fa-solid fa-calendar-days text-slate-400 text-xs"></i>
                </div>

                <div class="space-y-2.5">
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-slate-800 text-xs">PT Solusi Teknologi</span>
                            <span class="bg-indigo-50 text-indigo-700 text-[9px] font-bold px-1.5 py-0.5 rounded">Luring</span>
                        </div>
                        <div class="text-[10px] text-slate-500"><i class="fa-regular fa-clock mr-1"></i> Kamis, 24 Okt • 13:00 WIB</div>
                        <div class="text-[10px] font-semibold text-slate-600"><i class="fa-solid fa-user-group mr-1"></i> 6 Siswa Didatangi</div>
                    </div>
                </div>

                <button class="w-full py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-xl text-xs font-bold transition flex items-center justify-center gap-2 shadow-sm">
                    <i class="fa-solid fa-plus"></i> Jadwalkan Kunjungan DUDI
                </button>
            </div>
        </div>
    </div>
</div>
@endsection