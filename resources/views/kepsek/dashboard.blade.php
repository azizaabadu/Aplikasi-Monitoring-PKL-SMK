@extends('layouts.kepsek')

@section('title', 'Dashboard Eksekutif - Portal Kepala Sekolah')

@section('content')
<div class="space-y-6">

    <!-- 1. HERO BANNER EKSEKUTIF -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0F1E38] via-[#172B4D] to-[#1E3A6D] p-6 text-white shadow-xl sm:p-8">
        <div class="relative z-10 flex flex-col justify-between gap-6 md:flex-row md:items-center">
            <div class="space-y-2">
                <span class="inline-flex items-center gap-2 rounded-full bg-sky-400/20 px-3 py-1 text-xs font-bold text-sky-300 border border-sky-400/30">
                    <i class="fa-solid fa-shield-halved"></i>
                    Panel Pimpinan Satuan Pendidikan
                </span>
                <h1 class="text-2xl font-black tracking-tight sm:text-3xl">
                    Selamat Datang, {{ auth()->user()->name ?? 'Bapak Kepala Sekolah' }}
                </h1>
                <p class="max-w-2xl text-xs text-slate-300 sm:text-sm leading-relaxed">
                    Ringkasan eksekutif pemantauan Praktik Kerja Lapangan (PKL) seluruh kompetensi keahlian SMKN 1 Batam periode <strong class="text-white">{{ $periodeAktif->tahun_ajaran ?? '2024/2025 Genap' }}</strong>.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('kepsek.penempatan') }}" class="flex items-center gap-2 rounded-xl bg-sky-400 px-4 py-3 text-xs font-black text-slate-950 shadow-lg shadow-sky-400/20 transition hover:bg-sky-300">
                    <i class="fa-solid fa-stamp"></i>
                    <span>Pengesahan Penempatan (T6)</span>
                </a>
            </div>
        </div>
    </div>

    @if (session('status'))
        <div role="status" class="flex items-center gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold shadow-sm">
            <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <!-- 2. BANNER ALERT: PERSYARATAN T6 (Jika ada penempatan menunggu persetujuan) -->
    @if ($penempatanMenunggu > 0)
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-5 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 shadow-sm">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-500 text-white flex items-center justify-center text-lg shrink-0 shadow-md">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div>
                    <h3 class="text-sm font-extrabold text-slate-900">Perhatian: {{ $penempatanMenunggu }} Penempatan Siswa Menunggu Pengesahan Anda</h3>
                    <p class="text-xs text-amber-800 mt-0.5">Sesuai PRD Bagian 5 (T6), siswa baru dapat melihat informasi mitra penempatan setelah disetujui secara resmi oleh Kepala Sekolah.</p>
                </div>
            </div>
            <a href="{{ route('kepsek.penempatan') }}" class="px-4 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-extrabold text-xs shadow transition text-center shrink-0">
                Sahkan Penempatan Sekarang &rsaquo;
            </a>
        </div>
    @endif

    <!-- 3. KARTU STATISTIK MAKRO SEKOLAH -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total Siswa -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-2">
            <div class="flex items-center justify-between text-slate-400 text-xs font-bold uppercase tracking-wider">
                <span>Total Siswa PKL</span>
                <i class="fa-solid fa-users text-sky-600 text-base"></i>
            </div>
            <div class="text-3xl font-black text-slate-900">{{ $totalSiswa }}</div>
            <div class="text-[11px] text-slate-500 font-medium">Terdaftar pada periode aktif</div>
        </div>

        <!-- Penempatan Disetujui -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-2">
            <div class="flex items-center justify-between text-slate-400 text-xs font-bold uppercase tracking-wider">
                <span>Penempatan Resmi</span>
                <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
            </div>
            <div class="text-3xl font-black text-emerald-700">{{ $penempatanDisetujui }}</div>
            <div class="text-[11px] text-emerald-700 font-bold">Telah disahkan Kepala Sekolah</div>
        </div>

        <!-- Mitra DUDI Aktif -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-2">
            <div class="flex items-center justify-between text-slate-400 text-xs font-bold uppercase tracking-wider">
                <span>Mitra Industri Aktif</span>
                <i class="fa-solid fa-building text-indigo-600 text-base"></i>
            </div>
            <div class="text-3xl font-black text-slate-900">{{ $totalDudi }}</div>
            <div class="text-[11px] text-slate-500 font-medium">Total Daya Tampung: {{ $totalKuotaDudi }} Siswa</div>
        </div>

        <!-- Kendala Hari Ini -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-2">
            <div class="flex items-center justify-between text-slate-400 text-xs font-bold uppercase tracking-wider">
                <span>Laporan Kendala Hari Ini</span>
                <i class="fa-solid fa-triangle-exclamation text-rose-600 text-base"></i>
            </div>
            <div class="text-3xl font-black {{ $kendalaToday->count() > 0 ? 'text-rose-600' : 'text-slate-900' }}">
                {{ $kendalaToday->count() }}
            </div>
            <div class="text-[11px] text-slate-500 font-medium">Siswa sakit / kendala lapangan</div>
        </div>
    </div>

    <!-- 4. REKAPITULASI PENEMPATAN PER JURUSAN & KEHADIRAN HARI INI -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- Kiri (7 Kolom): Sebaran Ketercapaian Penempatan per Jurusan -->
        <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-chart-column text-amber-600"></i>
                    Ketercapaian Penempatan per Jurusan
                </h3>
                <span class="text-xs text-slate-400 font-bold uppercase">Target 100%</span>
            </div>

            <div class="space-y-4 pt-1">
                @forelse ($rekapJurusan as $jur)
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between text-xs">
                            <span class="font-bold text-slate-800">{{ $jur['nama'] }}</span>
                            <span class="font-extrabold text-slate-900">{{ $jur['ditempatkan'] }} / {{ $jur['total_siswa'] }} Siswa ({{ $jur['persen'] }}%)</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                            <div class="bg-[#0B1527] h-full rounded-full transition-all duration-300" style="width: {{ min(100, $jur['persen']) }}%"></div>
                        </div>
                    </div>
                @empty
                    <p class="text-center py-6 text-xs text-slate-400">Belum ada data jurusan yang tercatat.</p>
                @endforelse
            </div>
        </div>

        <!-- Kanan (5 Kolom): Ringkasan Kehadiran Hari Ini (PRD K1) -->
        <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-calendar-day text-sky-600"></i>
                    Presensi Siswa Hari Ini
                </h3>
                <span class="text-xs font-bold text-slate-500">{{ now()->translatedFormat('d M Y') }}</span>
            </div>

            <div class="grid grid-cols-3 gap-3 text-center">
                <div class="p-3 rounded-xl bg-emerald-50 border border-emerald-100">
                    <span class="text-[10px] font-bold text-emerald-800 uppercase block">Hadir</span>
                    <span class="text-2xl font-black text-emerald-700">{{ $hadirToday }}</span>
                </div>
                <div class="p-3 rounded-xl bg-amber-50 border border-amber-100">
                    <span class="text-[10px] font-bold text-amber-800 uppercase block">Izin</span>
                    <span class="text-2xl font-black text-amber-700">{{ $izinToday }}</span>
                </div>
                <div class="p-3 rounded-xl bg-rose-50 border border-rose-100">
                    <span class="text-[10px] font-bold text-rose-800 uppercase block">Sakit</span>
                    <span class="text-2xl font-black text-rose-700">{{ $sakitToday }}</span>
                </div>
            </div>

            <!-- Monitoring Siswa dengan Kendala Lapangan -->
            <div class="space-y-2 pt-2 border-t border-slate-100">
                <span class="text-xs font-bold text-slate-700 block">Siswa Butuh Perhatian Khusus:</span>
                @forelse ($kendalaToday as $absen)
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 text-xs space-y-1">
                        <div class="flex items-center justify-between font-bold">
                            <span class="text-slate-900">{{ $absen->siswa->nama ?? 'Siswa' }}</span>
                            <span class="px-2 py-0.5 rounded text-[10px] font-extrabold {{ $absen->kondisi === 'ada_kendala' ? 'bg-rose-100 text-rose-800' : 'bg-amber-100 text-amber-800' }}">
                                {{ ucfirst(str_replace('_', ' ', $absen->kondisi)) }}
                            </span>
                        </div>
                        <p class="text-[11px] text-slate-500">{{ $absen->siswa->dudi->nama_dudi ?? 'Mitra PKL' }} • Catatan: {{ $absen->catatan ?? '-' }}</p>
                    </div>
                @empty
                    <div class="p-4 rounded-xl bg-emerald-50/60 border border-emerald-200 text-center text-xs text-emerald-800 font-semibold">
                        <i class="fa-solid fa-circle-check text-emerald-600 mr-1"></i> Seluruh siswa yang hadir hari ini dalam kondisi sehat dan siap kerja.
                    </div>
                @endforelse
            </div>
        </div>

    </div>

    <!-- 5. DAFTAR PENETAPAN PENEMPATAN TERAKHIR -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-list-check text-slate-700"></i>
                    Daftar Penempatan Terbaru
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">Penetapan siswa ke mitra industri PKL.</p>
            </div>
            <a href="{{ route('kepsek.penempatan') }}" class="text-xs font-bold text-amber-600 hover:underline">
                Lihat Semua Penempatan &rsaquo;
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-slate-500 font-bold uppercase text-[10px] tracking-wider">
                        <th class="py-3 px-4">Nama Siswa</th>
                        <th class="py-3 px-4">Jurusan</th>
                        <th class="py-3 px-4">Mitra DUDI</th>
                        <th class="py-3 px-4">Status Persetujuan (T6)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse ($recentPenempatans as $pen)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">{{ $pen->siswa->nama ?? 'Siswa' }}</td>
                            <td class="py-3.5 px-4 font-semibold text-slate-600">{{ $pen->siswa->jurusan ?? 'PPLG' }}</td>
                            <td class="py-3.5 px-4 font-medium text-slate-800">{{ $pen->dudi->nama_dudi ?? 'Mitra DUDI' }}</td>
                            <td class="py-3.5 px-4">
                                @if ($pen->status === 'disetujui')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <i class="fa-solid fa-check text-[9px]"></i> Disahkan Kepala Sekolah
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-amber-50 text-amber-800 border border-amber-200">
                                        <i class="fa-solid fa-clock text-[9px]"></i> Menunggu Persetujuan
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-8 text-slate-400 font-medium">Belum ada data penempatan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
