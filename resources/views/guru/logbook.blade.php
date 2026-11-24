@extends('layouts.guru')

@section('title', 'Jurnal & Logbook Siswa - PKL.ID')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-black text-slate-900">Jurnal &amp; Logbook Harian Siswa</h1>
            <p class="text-xs text-slate-500">Pantau pengisian kegiatan harian, tinjau status pengesahan DUDI, dan berikan komentar pembinaan.</p>
        </div>
        <button class="px-4 py-2 bg-rose-600 hover:bg-rose-500 text-white rounded-xl text-xs font-bold flex items-center gap-2 self-start shadow-xs">
            <i class="fa-solid fa-file-pdf"></i> Ekspor Logbook Disahkan (PDF)
        </button>
    </div>

    <!-- Filter Status Logbook Sesuai PRD L4 -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-xs flex flex-wrap items-center justify-between gap-3">
        <div class="flex flex-wrap items-center gap-2 text-xs font-bold">
            <button class="px-3.5 py-1.5 rounded-xl bg-indigo-600 text-white">Semua (28)</button>
            <button class="px-3.5 py-1.5 rounded-xl bg-rose-50 text-rose-700 hover:bg-rose-100">Belum Diisi (3)</button>
            <button class="px-3.5 py-1.5 rounded-xl bg-amber-50 text-amber-700 hover:bg-amber-100">Menunggu Pengesahan (6)</button>
            <button class="px-3.5 py-1.5 rounded-xl bg-orange-50 text-orange-700 hover:bg-orange-100">Perlu Revisi (2)</button>
            <button class="px-3.5 py-1.5 rounded-xl bg-emerald-50 text-emerald-700 hover:bg-emerald-100">Disahkan DUDI (17)</button>
        </div>
        <input type="text" placeholder="Cari nama siswa..." class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-1.5 text-xs">
    </div>

    <!-- Daftar Logbook Siswa -->
    <div class="space-y-4">
        <!-- Item Logbook 1: Disahkan -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs space-y-3">
            <div class="flex flex-wrap items-center justify-between gap-2 border-b border-slate-100 pb-3">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-indigo-100 text-indigo-700 font-bold flex items-center justify-center text-xs">RP</div>
                    <div>
                        <div class="font-bold text-slate-900 text-sm">Rizky Pratama <span class="text-xs font-normal text-slate-400">• PT Solusi Teknologi Nusantara</span></div>
                        <div class="text-[11px] text-slate-500">Selasa, 24 Nov 2026 • Jam Kerja: 08:00 - 16:00 WIB</div>
                    </div>
                </div>
                <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold text-xs border border-emerald-200">
                    <i class="fa-solid fa-circle-check mr-1"></i> Disahkan Pembimbing DUDI
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                <div class="bg-slate-50 p-3 rounded-xl">
                    <div class="font-bold text-slate-700 mb-1">Kegiatan</div>
                    <p class="text-slate-600">Membuat endpoint REST API untuk autentikasi pengguna dan validasi token.</p>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl">
                    <div class="font-bold text-slate-700 mb-1">Hasil / Hal yang Dipelajari</div>
                    <p class="text-slate-600">Memahami penerapan middleware dan pengujian response JSON menggunakan Postman.</p>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl">
                    <div class="font-bold text-slate-700 mb-1">Kendala</div>
                    <p class="text-slate-600">Tidak ada kendala berarti.</p>
                </div>
            </div>

            <!-- Komentar Guru Pembimbing (Sesuai PRD L4) -->
            <form action="#" method="POST" class="flex items-center gap-2 pt-1">
                @csrf
                <input type="text" name="komentar_guru" placeholder="Tulis komentar pembinaan guru untuk catatan logbook ini..." class="flex-1 bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs">
                <button type="submit" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold">
                    Kirim Komentar
                </button>
            </form>
        </div>

        <!-- Item Logbook 2: Perlu Revisi & Terlambat -->
        <div class="bg-white p-5 rounded-2xl border border-amber-200 shadow-xs space-y-3">
            <div class="flex flex-wrap items-center justify-between gap-2 border-b border-slate-100 pb-3">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-amber-100 text-amber-700 font-bold flex items-center justify-center text-xs">BS</div>
                    <div>
                        <div class="font-bold text-slate-900 text-sm">Bagus Setiawan <span class="text-xs font-normal text-slate-400">• PT Cyber Media Utama</span></div>
                        <div class="text-[11px] text-slate-500">Senin, 23 Nov 2026 • <span class="text-rose-600 font-bold">Diisi Mundur (Terlambat)</span></div>
                    </div>
                </div>
                <span class="px-3 py-1 rounded-full bg-orange-50 text-orange-700 font-bold text-xs border border-orange-200">
                    <i class="fa-solid fa-rotate-left mr-1"></i> Perlu Revisi Siswa
                </span>
            </div>
            <div class="p-3 rounded-xl bg-orange-50/70 border border-orange-100 text-xs text-orange-800">
                <strong>Catatan Revisi dari Pembimbing DUDI:</strong> Uraian kegiatan masih terlalu singkat, tolong jelaskan halaman apa saja yang diperbaiki.
            </div>
        </div>
    </div>
</div>
@endsection