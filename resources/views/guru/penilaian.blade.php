@extends('layouts.guru')

@section('title', 'Penilaian & Sertifikat PKL - PKL.ID')

@section('content')
<div class="space-y-6">
    <!-- Header Halaman -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-black text-slate-900">Penilaian Akhir &amp; Komponen Nilai PKL</h1>
            <p class="text-xs text-slate-500">Kelola komponen nilai sekolah, isi nilai aspek bimbingan, dan kunci nilai akhir sebelum dirilis[cite: 24, 29].</p>
        </div>
        <div class="flex items-center gap-2">
            <button class="px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white rounded-xl text-xs font-bold flex items-center gap-2 shadow-xs transition">
                <i class="fa-solid fa-file-excel"></i> Ekspor Rekap Nilai (Excel)[cite: 24]
            </button>
        </div>
    </div>

    <!-- Informasi Bobot Sesuai Aturan PRD -->
    <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-4 flex flex-wrap items-center justify-between gap-3 text-xs text-indigo-900">
        <div class="font-semibold flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-indigo-600 text-white flex items-center justify-center shrink-0">
                <i class="fa-solid fa-calculator"></i>
            </div>
            <div>
                <span>Komponen Aktif (Total Bobot 100%): </span>
                <strong>Sikap &amp; Etika DUDI (30%)</strong> + <strong>Keterampilan Teknis DUDI (50%)</strong> + <strong>Logbook &amp; Laporan Guru (20%)[cite: 24]</strong>
            </div>
        </div>
        <span class="text-[11px] text-indigo-700 bg-white px-3 py-1 rounded-lg border border-indigo-200">
            <i class="fa-solid fa-lock text-indigo-600 mr-1"></i> Nilai terkunci bersifat final[cite: 24].
        </span>
    </div>

    <!-- Tabel Daftar Penilaian Siswa Bimbingan -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="p-4 border-b border-slate-100 flex items-center justify-between">
            <h2 class="font-black text-sm text-slate-900">Daftar Nilai Siswa Bimbingan Kejuruan</h2>
            <span class="text-xs font-bold text-slate-400">Total: 28 Siswa</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] font-bold border-b border-slate-100">
                    <tr>
                        <th class="px-4 py-3">Siswa &amp; Mitra DUDI</th>
                        <th class="px-4 py-3">Sikap DUDI (30%)</th>
                        <th class="px-4 py-3">Teknis DUDI (50%)</th>
                        <th class="px-4 py-3">Logbook &amp; Laporan (20%)[cite: 24]</th>
                        <th class="px-4 py-3">Nilai Akhir[cite: 24]</th>
                        <th class="px-4 py-3 text-right">Aksi &amp; Status</th>
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
                                    <div class="text-[10px] text-slate-400">PT Solusi Teknologi Nusantara</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="font-bold text-slate-800">85</span> <span class="text-[10px] text-slate-400">(DUDI)</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="font-bold text-slate-800">80</span> <span class="text-[10px] text-slate-400">(DUDI)</span>
                        </td>
                        <td class="px-4 py-3">
                            <input type="number" min="0" max="100" value="90" class="w-20 bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1 font-bold text-slate-900 focus:ring-2 focus:ring-indigo-500/20">
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2.5 py-1 rounded-lg bg-indigo-50 text-indigo-700 font-black text-sm">83,50[cite: 24]</span>
                        </td>
                        <td class="px-4 py-3 text-right space-x-1">
                            <button class="px-3 py-1.5 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg font-bold text-[11px] transition">Simpan</button>
                            <button class="px-3 py-1.5 bg-slate-900 hover:bg-slate-800 text-white rounded-lg font-bold text-[11px] transition shadow-xs">
                                <i class="fa-solid fa-lock mr-1"></i> Kunci[cite: 24]
                            </button>
                        </td>
                    </tr>

                    <!-- Baris 2 -->
                    <tr class="hover:bg-slate-50/50">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-sky-100 text-sky-700 font-bold flex items-center justify-center text-xs">SN</div>
                                <div>
                                    <div class="font-bold text-slate-900">Siti Nurhaliza</div>
                                    <div class="text-[10px] text-slate-400">Telkom Corp Digital Lab</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="font-bold text-slate-800">92</span> <span class="text-[10px] text-slate-400">(DUDI)</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="font-bold text-slate-800">90</span> <span class="text-[10px] text-slate-400">(DUDI)</span>
                        </td>
                        <td class="px-4 py-3">
                            <input type="number" min="0" max="100" value="95" class="w-20 bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1 font-bold text-slate-900">
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-black text-sm">91,60</span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-slate-100 text-slate-600 font-bold text-[11px]">
                                <i class="fa-solid fa-lock text-emerald-600"></i> Terkunci[cite: 24]
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection