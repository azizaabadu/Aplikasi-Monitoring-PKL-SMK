@extends('layouts.kepsek')

@section('title', 'Monitoring Presensi & Kendala Siswa - Portal Kepala Sekolah')

@section('content')
<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
                <span>Beranda Eksekutif</span>
                <span>/</span>
                <span class="text-slate-800 font-semibold">Monitoring Kehadiran</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Monitoring Presensi & Laporan Kendala Lapangan</h1>
            <p class="text-xs text-slate-500 mt-1">Pemantauan kedisiplinan dan deteksi dini masalah siswa PKL di seluruh mitra industri (PRD K1).</p>
        </div>
        <div class="text-right">
            <span class="text-xs font-bold text-slate-500 block">Hari Ini</span>
            <span class="text-sm font-black text-slate-900">{{ now()->translatedFormat('l, d F Y') }}</span>
        </div>
    </div>

    <!-- 4 KARTU STATISTIK KEHADIRAN -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Total Laporan Hari Ini</span>
            <div class="text-2xl font-black text-slate-900">{{ $stats['total_absen'] }}</div>
            <span class="text-[11px] text-slate-500 font-medium">Check-in mandiri tercatat</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
            <span class="text-[10px] font-bold text-emerald-700 uppercase tracking-wider block">Hadir di Lokasi PKL</span>
            <div class="text-2xl font-black text-emerald-700">{{ $stats['hadir'] }}</div>
            <span class="text-[11px] text-emerald-600 font-bold">Kondisi aktif di industri</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
            <span class="text-[10px] font-bold text-amber-700 uppercase tracking-wider block">Izin / Sakit Resmi</span>
            <div class="text-2xl font-black text-amber-700">{{ $stats['izin'] + $stats['sakit'] }}</div>
            <span class="text-[11px] text-amber-600 font-medium">{{ $stats['izin'] }} Izin • {{ $stats['sakit'] }} Sakit</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
            <span class="text-[10px] font-bold text-rose-700 uppercase tracking-wider block">Laporan Ada Kendala</span>
            <div class="text-2xl font-black text-rose-600">{{ $stats['kendala'] }}</div>
            <span class="text-[11px] text-rose-600 font-medium">Memerlukan atensi sekolah</span>
        </div>
    </div>

    <!-- DAFTAR SISWA BUTUH ATENSI (KENDALA / SAKIT) -->
    @if ($kendalaList->count() > 0)
        <div class="bg-rose-50/60 border border-rose-200 rounded-2xl p-5 shadow-sm space-y-3">
            <div class="flex items-center gap-2 text-rose-800 font-extrabold text-sm">
                <i class="fa-solid fa-triangle-exclamation text-rose-600"></i>
                <span>Atensi Khusus Pimpinan: Siswa Melaporkan Sakit atau Kendala di Lapangan Hari Ini</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 pt-1">
                @foreach ($kendalaList as $item)
                    <div class="bg-white p-4 rounded-xl border border-rose-100 shadow-xs space-y-2 text-xs">
                        <div class="flex items-center justify-between">
                            <span class="font-extrabold text-slate-900">{{ $item->siswa->nama ?? 'Siswa' }}</span>
                            <span class="px-2 py-0.5 rounded text-[10px] font-extrabold {{ $item->kondisi === 'ada_kendala' ? 'bg-rose-100 text-rose-800' : 'bg-amber-100 text-amber-800' }}">
                                {{ ucfirst(str_replace('_', ' ', $item->kondisi)) }}
                            </span>
                        </div>
                        <p class="text-slate-600 text-[11px] font-medium leading-relaxed">
                            <strong>Mitra:</strong> {{ $item->siswa->dudi->nama_dudi ?? '-' }}<br>
                            <strong>Guru Pembimbing:</strong> {{ $item->siswa->guru->nama ?? '-' }}<br>
                            <strong>Catatan:</strong> {{ $item->catatan ?? 'Tidak ada catatan tambahan.' }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- TABEL LOG PRESENSI HARI INI -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-list-check text-slate-700"></i>
                Log Presensi Siswa Terkini
            </h3>
            <span class="text-xs font-semibold text-slate-500">Total {{ $absensis->total() }} Catatan</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase text-[10px] tracking-wider">
                        <th class="py-3 px-4">Nama Siswa</th>
                        <th class="py-3 px-4">Jurusan</th>
                        <th class="py-3 px-4">Mitra DUDI</th>
                        <th class="py-3 px-4">Jam Masuk</th>
                        <th class="py-3 px-4">Kehadiran</th>
                        <th class="py-3 px-4">Kondisi</th>
                        <th class="py-3 px-4">Catatan Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse ($absensis as $record)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">{{ $record->siswa->nama ?? 'Siswa' }}</td>
                            <td class="py-3.5 px-4 font-semibold text-slate-600">{{ $record->siswa->jurusan ?? 'PPLG' }}</td>
                            <td class="py-3.5 px-4 font-medium text-slate-800">{{ $record->siswa->dudi->nama_dudi ?? 'Mitra DUDI' }}</td>
                            <td class="py-3.5 px-4 text-slate-600 font-medium">
                                {{ $record->jam_masuk ? substr($record->jam_masuk, 0, 5) . ' WIB' : '-' }}
                            </td>
                            <td class="py-3.5 px-4">
                                @if ($record->status === 'Hadir')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <i class="fa-solid fa-check text-[9px]"></i> Hadir
                                    </span>
                                @elseif ($record->status === 'Izin')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-amber-50 text-amber-700 border border-amber-200">
                                        <i class="fa-solid fa-clock text-[9px]"></i> Izin
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-rose-50 text-rose-700 border border-rose-200">
                                        <i class="fa-solid fa-heart-pulse text-[9px]"></i> Sakit
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 font-semibold">
                                @if ($record->kondisi === 'baik')
                                    <span class="text-emerald-700">Baik</span>
                                @elseif ($record->kondisi === 'kurang_sehat')
                                    <span class="text-amber-700">Kurang Sehat</span>
                                @else
                                    <span class="text-rose-700">Ada Kendala</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-slate-500 max-w-xs truncate">{{ $record->catatan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-8 text-slate-400 font-medium">Belum ada data presensi siswa yang tercatat hari ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $absensis->links() }}
        </div>
    </div>

</div>
@endsection
