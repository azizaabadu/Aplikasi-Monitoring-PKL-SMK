@extends('layouts.guru')

@section('title', 'Laporan & Rekapitulasi - PKL.ID')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-xl font-black text-slate-900">Laporan &amp; Rekapitulasi Pembimbingan</h1>
        <p class="text-xs text-slate-500">Pusat unduh arsip logbook, rekap kehadiran, berita acara kunjungan, dan leger nilai siswa bimbingan.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <!-- Card 1: Arsip Logbook PDF -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-start justify-between gap-4">
            <div class="space-y-1.5">
                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>
                <h3 class="font-black text-sm text-slate-900">Arsip Logbook Disahkan (PDF)</h3>
                <p class="text-xs text-slate-500">Mencetak seluruh logbook harian siswa bimbingan yang sudah disahkan oleh pembimbing DUDI[cite: 21].</p>
            </div>
            <button class="px-3.5 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold shrink-0 transition">
                Unduh PDF
            </button>
        </div>

        <!-- Card 2: Rekap Nilai Excel -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-start justify-between gap-4">
            <div class="space-y-1.5">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-file-excel"></i>
                </div>
                <h3 class="font-black text-sm text-slate-900">Rekap Nilai Akhir Per Jurusan (Excel)</h3>
                <p class="text-xs text-slate-500">Berisi rincian komponen nilai DUDI dan sekolah serta nilai akhir untuk keperluan rapor[cite: 24].</p>
            </div>
            <button class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-500 text-white rounded-xl text-xs font-bold shrink-0 transition">
                Ekspor Excel
            </button>
        </div>

        <!-- Card 3: Berita Acara Kunjungan -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-start justify-between gap-4">
            <div class="space-y-1.5">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-clipboard-check"></i>
                </div>
                <h3 class="font-black text-sm text-slate-900">Catatan Kunjungan Monitoring</h3>
                <p class="text-xs text-slate-500">Rekapitulasi bukti fisik pembinaan dan hasil kunjungan guru pembimbing ke lokasi industri[cite: 22].</p>
            </div>
            <button class="px-3.5 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-xl text-xs font-bold shrink-0 transition">
                Cetak Rekap
            </button>
        </div>

        <!-- Card 4: Rekap Kehadiran -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-start justify-between gap-4">
            <div class="space-y-1.5">
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
                <h3 class="font-black text-sm text-slate-900">Rekapitulasi Kehadiran &amp; Check-in</h3>
                <p class="text-xs text-slate-500">Akumulasi total kehadiran, sakit, izin, dan catatan kedisiplinan siswa bimbingan.</p>
            </div>
            <button class="px-3.5 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold shrink-0 transition">
                Unduh Rekap
            </button>
        </div>
    </div>
</div>
@endsection