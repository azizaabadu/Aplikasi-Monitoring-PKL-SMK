@extends('layouts.student')

@section('title', 'Logbook Harian Siswa - PKL.ID')

@section('content')
        <!-- HERO HEADER HALAMAN LOGBOOK -->
        <section class="bg-gradient-to-r from-[#0F1E38] via-[#172B4D] to-[#1E3A6D] rounded-3xl p-6 sm:p-8 text-white shadow-xl relative overflow-hidden">
          <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>
          
          <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="space-y-2 max-w-2xl">
              <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-sky-500/20 border border-sky-400/30 text-sky-300 text-xs font-semibold">
                Modul L1 & L2 • Jurnal Harian PKL
              </span>
              <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                Logbook & Kegiatan Harian
              </h1>
              <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                Catat aktivitas kerja Anda setiap hari kerja[cite: 46]. Logbook yang dikirim akan diperiksa dan disahkan langsung oleh pembimbing DUDI[cite: 46].
              </p>
            </div>

            <!-- Tombol Aksi Buka Form -->
            <div>
              <button onclick="document.getElementById('form-modal-logbook').classList.toggle('hidden')" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-sky-400 hover:bg-sky-300 text-[#0F172A] text-xs font-extrabold shadow-lg transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                + Buat Logbook Baru
              </button>
            </div>
          </div>
        </section>

        <!-- KARTU FILTER STATUS & STATISTIK LOGBOOK -->
        <section class="grid grid-cols-2 sm:grid-cols-4 gap-4">
          <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm text-center">
            <div class="text-xs text-slate-400 font-bold uppercase">Total Terkirim</div>
            <div class="text-2xl font-extrabold text-slate-900 mt-1">24</div>
            <div class="text-[10px] text-slate-500 mt-0.5">Periode PKL Aktif</div>
          </div>
          <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm text-center">
            <div class="text-xs text-emerald-600 font-bold uppercase">Disahkan</div>
            <div class="text-2xl font-extrabold text-emerald-700 mt-1">22</div>
            <div class="text-[10px] text-emerald-600 mt-0.5">Final & Terkunci[cite: 16]</div>
          </div>
          <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm text-center">
            <div class="text-xs text-amber-600 font-bold uppercase">Menunggu</div>
            <div class="text-2xl font-extrabold text-amber-700 mt-1">1</div>
            <div class="text-[10px] text-amber-600 mt-0.5">Review DUDI[cite: 16]</div>
          </div>
          <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm text-center">
            <div class="text-xs text-rose-600 font-bold uppercase">Perlu Revisi</div>
            <div class="text-2xl font-extrabold text-rose-700 mt-1">1</div>
            <div class="text-[10px] text-rose-600 mt-0.5">Butuh perbaikan[cite: 16]</div>
          </div>
        </section>

        <!-- DAFTAR RIWAYAT LOGBOOK SISWA -->
        <section class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
          <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <h3 class="text-base font-extrabold text-slate-900">Riwayat Jurnal Harian</h3>
            <div class="flex items-center gap-2 text-xs">
              <span class="text-slate-500">Filter Status:</span>
              <select class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 font-bold text-slate-700 focus:outline-none">
                <option value="all">Semua Status</option>
                <option value="disahkan">Disahkan</option>
                <option value="menunggu">Menunggu Pengesahan</option>
                <option value="revisi">Perlu Revisi</option>
                <option value="draf">Draf</option>
              </select>
            </div>
          </div>

          <!-- List Data Logbook -->
          <div class="space-y-3">
            
            <!-- Item 1: Status Perlu Revisi (Sesuai Aturan 6.2 PRD) -->
            <div class="p-4 rounded-xl border border-rose-200 bg-rose-50/30 space-y-2">
              <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-xl bg-rose-100 text-rose-700 font-bold flex items-center justify-center text-xs">
                    13 Nov
                  </div>
                  <div>
                    <div class="text-xs font-bold text-slate-800">Jumat, 13 November 2026 • 08:00 - 17:00 WIB</div>
                    <div class="text-xs text-slate-600 mt-0.5">Membuat skema database relasional dan migrasi tabel penempatan.</div>
                  </div>
                </div>
                <span class="px-3 py-1 rounded-full bg-rose-100 text-rose-700 text-xs font-extrabold w-fit">
                  Perlu Revisi[cite: 16]
                </span>
              </div>
              <!-- Catatan Revisi dari Pembimbing DUDI -->
              <div class="p-3 rounded-lg bg-white border border-rose-100 text-xs text-rose-800 space-y-1">
                <div class="font-bold">Catatan dari Pembimbing DUDI (Budi Santoso, S.Kom):</div>
                <p>Tolong perjelas rincian langkah pengujian migrasi tabel pada kolom hasil kegiatan.</p>
              </div>
              <div class="flex justify-end gap-2 pt-1">
                <button class="px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-lg transition">
                  Edit & Kirim Ulang
                </button>
              </div>
            </div>

            <!-- Item 2: Status Menunggu Pengesahan -->
            <div class="p-4 rounded-xl border border-slate-200/80 bg-white space-y-2">
              <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 font-bold flex items-center justify-center text-xs">
                    12 Nov
                  </div>
                  <div>
                    <div class="text-xs font-bold text-slate-800">Kamis, 12 November 2026 • 08:00 - 17:00 WIB</div>
                    <div class="text-xs text-slate-600 mt-0.5">Slicing komponen UI halaman login dan validasi form menggunakan Tailwind CSS.</div>
                  </div>
                </div>
                <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-extrabold w-fit">
                  Menunggu Pengesahan[cite: 16]
                </span>
              </div>
            </div>

            <!-- Item 3: Status Disahkan (Terkunci) -->
            <div class="p-4 rounded-xl border border-slate-200/80 bg-white space-y-2 opacity-90">
              <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 font-bold flex items-center justify-center text-xs">
                    11 Nov
                  </div>
                  <div>
                    <div class="text-xs font-bold text-slate-800">Rabu, 11 November 2026 • 08:00 - 17:00 WIB</div>
                    <div class="text-xs text-slate-600 mt-0.5">Instalasi environment Laravel, konfigurasi Git repository, dan membaca PRD.</div>
                  </div>
                </div>
                <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-extrabold w-fit flex items-center gap-1">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                  Disahkan (Terkunci)[cite: 16]
                </span>
              </div>
            </div>

          </div>
        </section>

        <!-- MODAL FORM INPUT LOGBOOK BARU -->
        <div id="form-modal-logbook" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
          <div class="bg-white rounded-3xl max-w-xl w-full p-6 sm:p-8 shadow-2xl space-y-5 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
              <div>
                <span class="text-[11px] font-bold uppercase tracking-wider text-sky-700">Formulir Jurnal Harian</span>
                <h3 class="text-lg font-extrabold text-slate-900">Tambah Logbook Baru</h3>
              </div>
              <button onclick="document.getElementById('form-modal-logbook').classList.add('hidden')" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold flex items-center justify-center">
                ✕
              </button>
            </div>

            <form class="space-y-4 text-xs">
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                  <label class="block font-bold text-slate-700 mb-1">Tanggal</label>
                  <input type="date" value="2026-11-16" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 font-medium text-slate-700 focus:outline-none focus:border-sky-500" />
                </div>
                <div>
                  <label class="block font-bold text-slate-700 mb-1">Jam Mulai</label>
                  <input type="time" value="08:00" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 font-medium text-slate-700 focus:outline-none focus:border-sky-500" />
                </div>
                <div>
                  <label class="block font-bold text-slate-700 mb-1">Jam Selesai</label>
                  <input type="time" value="17:00" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 font-medium text-slate-700 focus:outline-none focus:border-sky-500" />
                </div>
              </div>

              <div>
                <label class="block font-bold text-slate-700 mb-1">Kegiatan yang Dilakukan</label>
                <textarea rows="3" placeholder="Uraikan pekerjaan atau tugas yang Anda selesaikan hari ini..." class="w-full rounded-xl border border-slate-200 p-3 font-medium text-slate-700 focus:outline-none focus:border-sky-500"></textarea>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                  <label class="block font-bold text-slate-700 mb-1">Hasil / Kompetensi yang Dipelajari</label>
                  <textarea rows="2" placeholder="Hasil atau wawasan baru..." class="w-full rounded-xl border border-slate-200 p-3 font-medium text-slate-700 focus:outline-none focus:border-sky-500"></textarea>
                </div>
                <div>
                  <label class="block font-bold text-slate-700 mb-1">Kendala (Jika ada)</label>
                  <textarea rows="2" placeholder="Hambatan teknis atau non-teknis..." class="w-full rounded-xl border border-slate-200 p-3 font-medium text-slate-700 focus:outline-none focus:border-sky-500"></textarea>
                </div>
              </div>

              <div class="flex items-center justify-end gap-3 pt-3 border-t border-slate-100">
                <button type="button" onclick="document.getElementById('form-modal-logbook').classList.add('hidden')" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl transition">
                  Batal
                </button>
                <button type="button" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-900 text-white font-bold rounded-xl transition">
                  Simpan sebagai Draf[cite: 16]
                </button>
                <button type="button" class="px-5 py-2.5 bg-[#172B4D] hover:bg-[#1E3A6D] text-white font-bold rounded-xl shadow-md transition">
                  Kirim ke DUDI[cite: 16]
                </button>
              </div>
            </form>
          </div>
        </div>
@endsection