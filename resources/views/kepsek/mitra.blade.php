@extends('layouts.kepsek')

@section('title', 'Direktori Mitra DUDI & Daya Tampung - Portal Kepala Sekolah')

@section('content')
<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
                <span>Beranda Eksekutif</span>
                <span>/</span>
                <span class="text-slate-800 font-semibold">Mitra Industri (DUDI)</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Kemitraan Dunia Usaha & Industri (DUDI)</h1>
            <p class="text-xs text-slate-500 mt-1">Pemetaan daya tampung kuota, sebaran penempatan, dan keaktifan mitra vokasi sekolah.</p>
        </div>
    </div>

    <!-- 4 KARTU STATISTIK KEMITRAAN -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Total Mitra Terdaftar</span>
            <div class="text-2xl font-black text-slate-900">{{ $stats['total_mitra'] }}</div>
            <span class="text-[11px] text-slate-500 font-medium">Perusahaan / instansi</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
            <span class="text-[10px] font-bold text-emerald-700 uppercase tracking-wider block">Mitra Aktif PKL</span>
            <div class="text-2xl font-black text-emerald-700">{{ $stats['mitra_aktif'] }}</div>
            <span class="text-[11px] text-emerald-600 font-bold">Siap menerima siswa</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
            <span class="text-[10px] font-bold text-sky-700 uppercase tracking-wider block">Total Daya Tampung</span>
            <div class="text-2xl font-black text-sky-700">{{ $stats['total_daya_tampung'] }}</div>
            <span class="text-[11px] text-slate-500 font-medium">Kapasitas kuota maksimal</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-1">
            <span class="text-[10px] font-bold text-amber-700 uppercase tracking-wider block">Siswa Ditempatkan</span>
            <div class="text-2xl font-black text-amber-700">{{ $stats['total_terisi'] }}</div>
            <span class="text-[11px] text-amber-600 font-medium">Kuota terisi saat ini</span>
        </div>
    </div>

    <!-- GRID KARTU MITRA INDUSTRI -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($dudis as $dudi)
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4 flex flex-col justify-between hover:border-slate-300 transition">
                <div class="space-y-3">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center font-black text-sm">
                                <i class="fa-solid fa-building"></i>
                            </div>
                            <div>
                                <h3 class="font-extrabold text-slate-900 text-sm leading-snug">{{ $dudi->nama_dudi }}</h3>
                                <span class="text-[10px] font-semibold text-slate-400">Pimpinan: {{ $dudi->pimpinan ?? '-' }}</span>
                            </div>
                        </div>
                        <span class="px-2 py-0.5 rounded text-[10px] font-extrabold {{ $dudi->aktif ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-500' }}">
                            {{ $dudi->aktif ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>

                    <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed">
                        <i class="fa-solid fa-location-dot text-slate-400 mr-1"></i>
                        {{ $dudi->alamat ?? 'Alamat kantor / pabrik belum dicatat.' }}
                    </p>
                </div>

                <div class="pt-3 border-t border-slate-100 space-y-2 text-xs">
                    <div class="flex items-center justify-between text-slate-600">
                        <span>Kontak / Narahubung:</span>
                        <span class="font-bold text-slate-900">{{ $dudi->kontak ?? '-' }}</span>
                    </div>
                    <div class="flex items-center justify-between text-slate-600">
                        <span>Daya Tampung Kuota:</span>
                        <span class="font-extrabold text-slate-900">{{ $dudi->kuota }} Siswa</span>
                    </div>
                    <div class="flex items-center justify-between text-slate-600">
                        <span>Siswa Terdaftar:</span>
                        <span class="font-extrabold text-sky-700">{{ $dudi->siswas_count ?? 0 }} Siswa</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 bg-white p-12 rounded-2xl border border-slate-200/80 text-center text-slate-400 text-xs">
                Belum ada data mitra DUDI yang terdaftar.
            </div>
        @endforelse
    </div>

    <div>
        {{ $dudis->links() }}
    </div>

</div>
@endsection
