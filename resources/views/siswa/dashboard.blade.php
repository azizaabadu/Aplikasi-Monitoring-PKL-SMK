@extends('layouts.student')

@section('title', 'Dashboard Siswa - PKL.ID')

@section('content')
        <!-- BANNER / HERO DASHBOARD SISWA -->
        <section class="bg-gradient-to-r from-[#0F1E38] via-[#172B4D] to-[#1E3A6D] rounded-3xl p-6 sm:p-8 text-white shadow-xl relative overflow-hidden">
          <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>
          
          <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="space-y-2 max-w-2xl">
              <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-xs font-semibold">
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                Penempatan Disetujui & Terkunci
              </span>
              <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                Halo, Rizky Pratama! 👋
              </h1>
              <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                Selamat datang di sistem monitoring PKL. Pastikan mengisi check-in harian dan logbook kegiatan tepat waktu di <strong class="text-white">PT Solusi Teknologi Nusantara</strong>.
              </p>
            </div>

            <!-- Pintasan Tombol Aksi Cepat (Sesuai Bagian 8: Logbook & Check-in) -->
            <div class="flex flex-wrap items-center gap-3 shrink-0">
              <a href="#checkin-section" class="inline-flex items-center gap-2 px-4 py-3 rounded-xl bg-sky-400 hover:bg-sky-300 text-[#0F172A] text-xs font-extrabold shadow-lg transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Check-in Hari Ini
              </a>
              <a href="#logbook-section" class="inline-flex items-center gap-2 px-4 py-3 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white text-xs font-bold backdrop-blur-sm transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Isi Logbook
              </a>
            </div>
          </div>
        </section>

        <!-- 4 KARTU RINGKASAN PRIBADI SISWA (PRD 5.8) -->
        <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
          <!-- Card 1: Progres Hari PKL -->
          <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between text-xs font-semibold text-slate-400 uppercase tracking-wider">
              <span>Progres Periode PKL</span>
              <span class="text-sky-600 font-bold">27%</span>
            </div>
            <div class="mt-3 flex items-baseline gap-1.5">
              <span class="text-2xl font-extrabold text-slate-900">Hari ke-24</span>
              <span class="text-xs text-slate-500">/ 90 hari kerja</span>
            </div>
            <div class="w-full bg-slate-100 h-2 rounded-full mt-3 overflow-hidden">
              <div class="bg-[#172B4D] h-full rounded-full" style="width: 27%"></div>
            </div>
          </div>

          <!-- Card 2: Status Check-in Hari Ini (K1) -->
          <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between text-xs font-semibold text-slate-400 uppercase tracking-wider">
              <span>Check-in Hari Ini</span>
              <span class="px-2 py-0.5 rounded-full bg-amber-100 text-amber-700 text-[10px] font-bold">Belum Diisi</span>
            </div>
            <div class="mt-3 text-lg font-extrabold text-slate-900">Senin, 16 Nov 2026</div>
            <p class="text-xs text-slate-500 mt-1">Status: Hadir • Kondisi: Baik</p>
          </div>

          <!-- Card 3: Status Logbook (L1 & L2) -->
          <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between text-xs font-semibold text-slate-400 uppercase tracking-wider">
              <span>Logbook Harian</span>
              <span class="px-2 py-0.5 rounded-full bg-rose-100 text-rose-700 text-[10px] font-bold">1 Perlu Revisi</span>
            </div>
            <div class="mt-3 text-lg font-extrabold text-slate-900">22 Disahkan</div>
            <p class="text-xs text-slate-500 mt-1">Segera perbaiki catatan revisi DUDI</p>
          </div>

          <!-- Card 4: Nilai Akhir (N5 - Tersembunyi sebelum dirilis) -->
          <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between text-xs font-semibold text-slate-400 uppercase tracking-wider">
              <span>Nilai Akhir PKL</span>
              <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[10px] font-bold">Belum Dirilis</span>
            </div>
            <div class="mt-3 text-lg font-extrabold text-slate-400">Menunggu Rilis</div>
            <p class="text-xs text-slate-500 mt-1">Akan muncul setelah dikunci admin</p>
          </div>
        </section>

        <!-- GRID KONTEN UTAMA SISWA -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

          <!-- KOLOM KIRI (7 Kolom): Form Check-in & Form Logbook Harian -->
          <div class="lg:col-span-7 space-y-6">

            <!-- Check-in Harian (Fitur K1) -->
            <div id="checkin-section" class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
              <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div>
                  <span class="text-[11px] font-bold uppercase tracking-wider text-sky-700">Modul K1</span>
                  <h2 class="text-base font-extrabold text-slate-900">Check-in Kondisi Harian</h2>
                </div>
                <span class="text-xs text-slate-400">Senin, 16 Nov 2026</span>
              </div>

              <form class="space-y-4 text-xs">
                <div>
                  <label class="block font-bold text-slate-700 mb-2">Status Kehadiran</label>
                  <div class="grid grid-cols-3 gap-2">
                    <label class="cursor-pointer">
                      <input type="radio" name="kehadiran" class="peer sr-only" checked>
                      <div class="p-2.5 rounded-xl border border-slate-200 text-center font-bold peer-checked:bg-emerald-50 peer-checked:border-emerald-500 peer-checked:text-emerald-700">Hadir</div>
                    </label>
                    <label class="cursor-pointer">
                      <input type="radio" name="kehadiran" class="peer sr-only">
                      <div class="p-2.5 rounded-xl border border-slate-200 text-center font-bold peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-700">Sakit</div>
                    </label>
                    <label class="cursor-pointer">
                      <input type="radio" name="kehadiran" class="peer sr-only">
                      <div class="p-2.5 rounded-xl border border-slate-200 text-center font-bold peer-checked:bg-sky-50 peer-checked:border-sky-500 peer-checked:text-sky-700">Izin</div>
                    </label>
                  </div>
                </div>

                <div>
                  <label class="block font-bold text-slate-700 mb-2">Kondisi Umum (Tanpa data medis)</label>
                  <select class="w-full rounded-xl border border-slate-200 px-3 py-2.5 font-medium text-slate-700 focus:outline-none focus:border-sky-500">
                    <option value="baik">Baik / Sehat</option>
                    <option value="kurang_sehat">Kurang Sehat</option>
                    <option value="ada_kendala">Ada Kendala di Lapangan</option>
                  </select>
                </div>

                <div class="flex gap-2">
                  <input type="text" placeholder="Catatan singkat kondisi (opsional)..." class="flex-1 rounded-xl border border-slate-200 px-3 py-2.5 focus:outline-none focus:border-sky-500" />
                  <button type="button" class="px-4 py-2.5 bg-[#172B4D] hover:bg-[#1E3A6D] text-white font-bold rounded-xl transition">Kirim</button>
                </div>
              </form>
            </div>

            <!-- Form Logbook Harian (Fitur L1 & L2) -->
            <div id="logbook-section" class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
              <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div>
                  <span class="text-[11px] font-bold uppercase tracking-wider text-sky-700">Modul L1 & L2</span>
                  <h2 class="text-base font-extrabold text-slate-900">Form Logbook Harian</h2>
                </div>
                <span class="text-xs text-slate-400">Maks. diisi mundur 3 hari</span>
              </div>

              <form class="space-y-4 text-xs">
                <div class="grid grid-cols-3 gap-2">
                  <div>
                    <label class="block font-bold text-slate-700 mb-1">Tanggal</label>
                    <input type="date" value="2026-11-16" class="w-full rounded-xl border border-slate-200 px-3 py-2 font-medium text-slate-700 focus:outline-none" />
                  </div>
                  <div>
                    <label class="block font-bold text-slate-700 mb-1">Jam Mulai</label>
                    <input type="time" value="08:00" class="w-full rounded-xl border border-slate-200 px-3 py-2 font-medium text-slate-700 focus:outline-none" />
                  </div>
                  <div>
                    <label class="block font-bold text-slate-700 mb-1">Jam Selesai</label>
                    <input type="time" value="17:00" class="w-full rounded-xl border border-slate-200 px-3 py-2 font-medium text-slate-700 focus:outline-none" />
                  </div>
                </div>

                <div>
                  <label class="block font-bold text-slate-700 mb-1">Kegiatan</label>
                  <textarea rows="2" placeholder="Uraikan kegiatan kerja..." class="w-full rounded-xl border border-slate-200 p-3 focus:outline-none focus:border-sky-500"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-2">
                  <div>
                    <label class="block font-bold text-slate-700 mb-1">Hasil / Pelajaran</label>
                    <textarea rows="2" placeholder="Hasil kegiatan..." class="w-full rounded-xl border border-slate-200 p-3 focus:outline-none focus:border-sky-500"></textarea>
                  </div>
                  <div>
                    <label class="block font-bold text-slate-700 mb-1">Kendala (Jika ada)</label>
                    <textarea rows="2" placeholder="Hambatan..." class="w-full rounded-xl border border-slate-200 p-3 focus:outline-none focus:border-sky-500"></textarea>
                  </div>
                </div>

                <div class="flex justify-end gap-2 pt-1">
                  <button type="button" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl transition">Simpan Draf</button>
                  <button type="button" class="px-5 py-2.5 bg-[#172B4D] hover:bg-[#1E3A6D] text-white font-bold rounded-xl transition shadow-sm">Kirim ke DUDI</button>
                </div>
              </form>
            </div>

          </div>

          <!-- KOLOM KANAN (5 Kolom): Info Penempatan, Logbook Terakhir & Umpan Balik -->
          <div class="lg:col-span-5 space-y-6">

            <!-- Informasi Penempatan & Pembimbing (Fitur T7) -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-3">
              <h3 class="text-base font-extrabold text-slate-900">Mitra & Pembimbing Saya</h3>
              <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/70 space-y-2.5 text-xs">
                <div>
                  <span class="text-slate-400 font-medium">Mitra Industri (DUDI)</span>
                  <div class="font-extrabold text-slate-900 text-sm">PT Solusi Teknologi Nusantara</div>
                  <div class="text-slate-500">Jl. Gajah Mada No. 45, Batam</div>
                </div>
                <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-200">
                  <div>
                    <span class="text-slate-400 font-medium">Pembimbing DUDI</span>
                    <div class="font-bold text-slate-800">Budi Santoso, S.Kom</div>
                  </div>
                  <div>
                    <span class="text-slate-400 font-medium">Guru Pembimbing</span>
                    <div class="font-bold text-slate-800">Siti Aminah, M.Pd</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Status Logbook Terbaru -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-3">
              <div class="flex items-center justify-between">
                <h3 class="text-base font-extrabold text-slate-900">Riwayat Logbook</h3>
                <span class="text-xs text-sky-600 font-bold cursor-pointer hover:underline">Lihat Semua</span>
              </div>
              <div class="space-y-2.5 text-xs">
                <div class="p-3 rounded-xl border border-rose-200 bg-rose-50/40 space-y-1">
                  <div class="flex justify-between font-bold text-slate-700">
                    <span>Jumat, 13 Nov 2026</span>
                    <span class="text-rose-600">Perlu Revisi</span>
                  </div>
                  <p class="text-slate-600 line-clamp-1">Membuat skema database relasional...</p>
                  <p class="text-[11px] text-rose-700 bg-white p-2 rounded border border-rose-100">
                    <strong>Catatan DUDI:</strong> Perjelas langkah migrasi tabel.
                  </p>
                </div>
                <div class="p-3 rounded-xl border border-slate-200 space-y-1">
                  <div class="flex justify-between font-bold text-slate-700">
                    <span>Kamis, 12 Nov 2026</span>
                    <span class="text-emerald-600">Disahkan</span>
                  </div>
                  <p class="text-slate-600 line-clamp-1">Slicing halaman layout Tailwind CSS.</p>
                </div>
              </div>
            </div>

            <!-- Umpan Balik DUDI (Fitur U5) -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-3">
              <h3 class="text-base font-extrabold text-slate-900">Umpan Balik DUDI</h3>
              <div class="p-3.5 rounded-xl bg-sky-50 border border-sky-200 space-y-1 text-xs">
                <div class="flex justify-between items-center">
                  <span class="px-2 py-0.5 bg-sky-100 text-sky-800 rounded font-bold text-[10px]">Apresiasi</span>
                  <span class="text-slate-400">10 Nov 2026</span>
                </div>
                <p class="text-slate-700 leading-relaxed">
                  "Rizky menunjukkan inisiatif tinggi dan tepat waktu menyelesaikan tugas sprint mingguan."
                </p>
              </div>
            </div>

          </div>

        </div>
@endsection