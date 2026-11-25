@extends('layouts.guru')

@section('title', 'Presensi & Kehadiran Siswa - PKL.ID')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-black text-slate-900">Presensi &amp; Kondisi Harian Siswa</h1>
            <p class="text-xs text-slate-500">Pemantauan check-in harian kerja serta pencatatan kunjungan monitoring lapangan.</p>
        </div>
        <div class="flex items-center gap-2">
            <input type="date" value="{{ date('Y-m-d') }}" class="bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs font-semibold text-slate-700">
            <select class="bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs font-semibold text-slate-700">
                <option value="">Semua Kondisi</option>
                <option value="baik">Baik</option>
                <option value="kurang_sehat">Kurang Sehat</option>
                <option value="ada_kendala">Ada Kendala (Perlu Perhatian)</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Tabel Check-in Harian Siswa (Sesuai K1 & K2) -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="p-4 border-b border-slate-100 flex items-center justify-between">
                <h2 class="font-black text-sm text-slate-900">Log Check-in Hari Ini</h2>
                <span class="text-[11px] font-semibold text-slate-400">Sesuai aturan privasi: tanpa rekam medis</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] font-bold border-b border-slate-100">
                        <tr>
                            <th class="px-4 py-3">Siswa &amp; Mitra</th>
                            <th class="px-4 py-3">Kehadiran</th>
                            <th class="px-4 py-3">Kondisi Umum</th>
                            <th class="px-4 py-3">Catatan Singkat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr>
                            <td class="px-4 py-3">
                                <div class="font-bold text-slate-900">Rizky Pratama</div>
                                <div class="text-[10px] text-slate-400">PT Solusi Teknologi Nusantara</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">Hadir</span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-emerald-600 font-semibold"><i class="fa-solid fa-face-smile mr-1"></i> Baik</span>
                            </td>
                            <td class="px-4 py-3 text-slate-500">Mulai mengerjakan modul API.</td>
                        </tr>
                        <tr class="bg-amber-50/40">
                            <td class="px-4 py-3">
                                <div class="font-bold text-slate-900">Bagus Setiawan</div>
                                <div class="text-[10px] text-slate-400">PT Cyber Media Utama</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">Hadir</span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-amber-600 font-bold"><i class="fa-solid fa-circle-exclamation mr-1"></i> Ada Kendala</span>
                            </td>
                            <td class="px-4 py-3 text-slate-600">Kesulitan akses server staging kantor.</td>
                        </tr>
                        <tr class="bg-rose-50/40">
                            <td class="px-4 py-3">
                                <div class="font-bold text-slate-900">Dimas Pratama</div>
                                <div class="text-[10px] text-slate-400">PT Nusa Inovasi</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-2.5 py-1 rounded-full bg-rose-100 text-rose-700 font-bold text-[10px]">Belum Check-in (2 Hari)</span>
                            </td>
                            <td class="px-4 py-3 text-slate-400">-</td>
                            <td class="px-4 py-3 text-rose-600 font-semibold">Otomatis masuk daftar Perlu Perhatian</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Form Catatan Kunjungan Monitoring (Sesuai K3 & K5) -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs p-5 space-y-4">
            <div class="border-b border-slate-100 pb-3">
                <h2 class="font-black text-sm text-slate-900">Form Kunjungan Monitoring</h2>
                <p class="text-[11px] text-slate-400">Catat bukti pembinaan saat berkunjung ke mitra DUDI.</p>
            </div>

            <form action="#" method="POST" class="space-y-3 text-xs">
                @csrf
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Pilih Siswa Bimbingan</label>
                    <select name="penempatan_id" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2">
                        <option>Dimas Pratama - PT Nusa Inovasi</option>
                        <option>Rizky Pratama - PT Solusi Teknologi Nusantara</option>
                        <option>Bagus Setiawan - PT Cyber Media Utama</option>
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Tanggal Kunjungan</label>
                    <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Kondisi Siswa di Lapangan</label>
                    <textarea name="kondisi_siswa" rows="2" placeholder="Contoh: Siswa kooperatif, namun butuh pendampingan adaptasi..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2"></textarea>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Kondisi Tempat Kerja / DUDI</label>
                    <textarea name="kondisi_tempat" rows="2" placeholder="Contoh: Fasilitas komputer memadai, pembimbing aktif..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2"></textarea>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Rencana Tindak Lanjut</label>
                    <textarea name="tindak_lanjut" rows="2" placeholder="Langkah pembinaan yang disepakati..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2"></textarea>
                </div>
                <label class="flex items-start gap-2 p-2.5 rounded-xl bg-amber-50 border border-amber-100 cursor-pointer">
                    <input type="checkbox" name="internal" value="1" class="mt-0.5 rounded text-indigo-600">
                    <span class="text-[11px] text-amber-800">
                        <strong>Tandai sebagai Catatan Internal</strong><br>
                        Hanya terlihat oleh Guru, Kepala Sekolah, dan Admin (disembunyikan dari Orang Tua).
                    </span>
                </label>
                <button type="submit" class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition">
                    Simpan Catatan Kunjungan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection