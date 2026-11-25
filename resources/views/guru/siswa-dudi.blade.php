@extends('layouts.guru')

@section('title', 'Data Siswa, Mitra DUDI & Umpan Balik - PKL.ID')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-xl font-black text-slate-900">Data Siswa Bimbingan, Mitra DUDI &amp; Umpan Balik</h1>
        <p class="text-xs text-slate-500">Kelola tindak lanjut laporan dari pembimbing DUDI dan lihat daftar mitra industri aktif.</p>
    </div>

    <!-- Bagian 1: Tindak Lanjut Umpan Balik DUDI (Sesuai PRD U2, U3, U4) -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs p-5 space-y-4">
        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
            <div>
                <h2 class="font-black text-sm text-slate-900">Umpan Balik &amp; Laporan Pelanggaran dari DUDI</h2>
                <p class="text-[11px] text-slate-400">Wajib mengisi catatan tindak lanjut saat mengubah status menjadi Selesai.</p>
            </div>
            <span class="bg-rose-50 text-rose-600 font-bold text-xs px-3 py-1 rounded-full">1 Pelanggaran Baru</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs">
            <!-- Kartu Pelanggaran -->
            <div class="p-4 rounded-xl border border-rose-200 bg-rose-50/30 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="px-2.5 py-0.5 rounded bg-rose-600 text-white font-bold text-[10px]">PELANGGARAN • BERAT</span>
                    <span class="text-[10px] font-bold text-rose-600">Status: Baru</span>
                </div>
                <div>
                    <div class="font-bold text-slate-900">Dimas Pratama — PT Nusa Inovasi</div>
                    <p class="text-slate-600 mt-1">"Siswa tidak hadir tanpa keterangan selama 2 hari berturut-turut dan tidak merespons pesan pembimbing lapangan."</p>
                </div>
                <form action="#" method="POST" class="space-y-2 pt-2 border-t border-rose-100">
                    @csrf
                    <div class="flex gap-2">
                        <select name="status" class="bg-white border border-slate-200 rounded-lg px-2.5 py-1.5 font-semibold">
                            <option value="baru">Baru</option>
                            <option value="sedang_ditindaklanjuti" selected>Sedang Ditindaklanjuti</option>
                            <option value="selesai">Selesai</option>
                        </select>
                        <input type="text" name="catatan_tindak_lanjut" placeholder="Catatan tindak lanjut (wajib jika Selesai)..." class="flex-1 bg-white border border-slate-200 rounded-lg px-3 py-1.5">
                    </div>
                    <button type="submit" class="px-3 py-1.5 bg-slate-900 text-white rounded-lg font-bold text-[11px]">
                        Perbarui Tindak Lanjut
                    </button>
                </form>
            </div>

            <!-- Kartu Apresiasi / Masukan Sekolah -->
            <div class="p-4 rounded-xl border border-emerald-200 bg-emerald-50/30 space-y-2">
                <div class="flex items-center justify-between">
                    <span class="px-2.5 py-0.5 rounded bg-emerald-600 text-white font-bold text-[10px]">APRESIASI</span>
                    <span class="text-[10px] font-semibold text-slate-400">Sudah Dibaca</span>
                </div>
                <div class="font-bold text-slate-900">Rizky Pratama — PT Solusi Teknologi Nusantara</div>
                <p class="text-slate-600">"Sangat cepat beradaptasi dengan tim backend dan inisiatif mendokumentasikan API proyek."</p>
            </div>
        </div>
    </div>

    <!-- Bagian 2: Daftar Mitra DUDI & Sisa Kuota (Sesuai PRD D3) -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="p-4 border-b border-slate-100 flex flex-wrap items-center justify-between gap-3">
            <h2 class="font-black text-sm text-slate-900">Direktori Mitra DUDI &amp; Siswa Bimbingan</h2>
            <div class="flex gap-2 text-xs">
                <select class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-1.5">
                    <option>Semua Jurusan</option>
                    <option>PPLG / RPL</option>
                    <option>TJKT</option>
                </select>
                <select class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-1.5">
                    <option>Semua Wilayah</option>
                    <option>Batam Center</option>
                    <option>Sukajadi</option>
                </select>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] font-bold border-b border-slate-100">
                    <tr>
                        <th class="px-4 py-3">Nama Mitra DUDI</th>
                        <th class="px-4 py-3">Wilayah &amp; Kontak</th>
                        <th class="px-4 py-3">Siswa Bimbingan Anda</th>
                        <th class="px-4 py-3">Sisa Kuota Jurusan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr>
                        <td class="px-4 py-3 font-bold text-slate-900">PT Solusi Teknologi Nusantara</td>
                        <td class="px-4 py-3 text-slate-500">Batam Center • 0812-3456-7890</td>
                        <td class="px-4 py-3 font-semibold text-indigo-600">6 Siswa</td>
                        <td class="px-4 py-3"><span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">Tersedia 2 Kuota</span></td>
                    </tr>
                    <tr>
                        <td class="px-4 py-3 font-bold text-slate-900">Telkom Corp Digital Lab</td>
                        <td class="px-4 py-3 text-slate-500">Sukajadi • 0813-9876-5432</td>
                        <td class="px-4 py-3 font-semibold text-indigo-600">5 Siswa</td>
                        <td class="px-4 py-3"><span class="px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-600 font-bold text-[10px]">Penuh (0)</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection