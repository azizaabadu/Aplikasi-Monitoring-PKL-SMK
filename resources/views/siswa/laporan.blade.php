@extends('layouts.student')

@section('title', 'Laporan Akhir & Rekapitulasi PKL - Portal PKL.ID')

@section('content')
<div class="space-y-6">

  <!-- 1. HEADER & TOMBOL AKSI ATAS -->
  <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
    <div>
      <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
        <span>Beranda</span>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Laporan & Rekapitulasi</span>
      </div>
      <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Laporan Akhir & Rekapitulasi PKL</h1>
      <p class="text-xs text-slate-500 mt-1">Pusat validasi berkas final, alur pengesahan bertingkat, serta penarikan rekapitulasi kumulatif siswa praktik kerja industri.</p>
    </div>
    <div class="flex items-center gap-2.5">
      <button onclick="alert('Membuka panduan penyusunan laporan (Pedoman 2024)...')" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-book text-slate-500"></i>
        Panduan Penyusunan (Pedoman 2024)
      </button>
      <button onclick="alert('Membuka form unggah draf laporan baru...')" class="px-4 py-2.5 bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-cloud-arrow-up text-sky-400"></i>
        + Unggah Draf Laporan Baru
      </button>
    </div>
  </div>

  <!-- 2. WORKFLOW VALIDASI: STATUS ALUR PENGESAHAN BERKAS AKHIR (4 TAHAP) -->
  <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-5">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-4 border-b border-slate-100">
      <div>
        <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Workflow Validasi</span>
        <h3 class="text-base font-extrabold text-slate-900">Status Alur Pengesahan Berkas Akhir</h3>
      </div>
      <span class="px-3 py-1 rounded-full bg-sky-50 text-sky-700 border border-sky-200 text-xs font-extrabold">
        Progses Pengesahan: Tahap 3 dari 4
      </span>
    </div>

    <!-- Grid 4 Tahap Validasi -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
      
      <!-- Tahap 1: Penyusunan Bab I - V -->
      <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3 relative">
        <div class="flex items-center justify-between">
          <span class="text-[10px] font-extrabold text-slate-400 uppercase">Tahap 1</span>
          <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 text-[10px] font-bold">✓ Selesai</span>
        </div>
        <div>
          <div class="text-xs font-extrabold text-slate-900">Penyusunan Bab I - V</div>
          <div class="text-[11px] text-slate-500 mt-0.5">Draf naskah lengkap telah disusun dan lolos uji orisinalitas.</div>
        </div>
        <div class="pt-2 border-t border-slate-200/60 flex items-center justify-between text-xs">
          <span class="text-slate-500 font-medium">Kelengkapan</span>
          <strong class="text-emerald-700 font-black">100%</strong>
        </div>
      </div>

      <!-- Tahap 2: Bimbingan Guru -->
      <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3 relative">
        <div class="flex items-center justify-between">
          <span class="text-[10px] font-extrabold text-slate-400 uppercase">Tahap 2</span>
          <span class="px-2 py-0.5 rounded bg-sky-100 text-sky-800 text-[10px] font-bold">● Disetujui</span>
        </div>
        <div>
          <div class="text-xs font-extrabold text-slate-900">Bimbingan Guru</div>
          <div class="text-[11px] text-slate-500 mt-0.5">Dra. Sri Wahyuni, M.Pd<br><span class="text-[10px]">NIP. 19780412 200901 2 008</span></div>
        </div>
        <div class="pt-2 border-t border-slate-200/60 flex items-center justify-between text-xs">
          <span class="text-slate-500 font-medium">Status</span>
          <strong class="text-sky-700 font-bold">Revisi 2x • Selesai 24 Okt.</strong>
        </div>
      </div>

      <!-- Tahap 3: Pengesahan DUDI (Sedang Berjalan) -->
      <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200 space-y-3 relative shadow-sm">
        <div class="flex items-center justify-between">
          <span class="text-[10px] font-extrabold text-amber-700 uppercase">Tahap 3 • Berjalan</span>
          <span class="px-2 py-0.5 rounded bg-amber-200 text-amber-900 text-[10px] font-bold">⏳ Menunggu TTD</span>
        </div>
        <div>
          <div class="text-xs font-extrabold text-slate-900">Pengesahan DUDI</div>
          <div class="text-[11px] text-slate-600 mt-0.5">Hendrawan Saputra, S.Kom<br><span class="text-[10px] text-slate-500">Lead Engineer • PT Solusi Teknologi Nusantara</span></div>
        </div>
        <div class="pt-2 border-t border-amber-200/80 flex items-center justify-between text-xs">
          <button onclick="alert('Mengirim pengingat ke mentor DUDI...')" class="text-amber-800 font-bold hover:underline flex items-center gap-1">
            <i class="fa-solid fa-paper-plane text-[10px]"></i> Kirim Pengingat
          </button>
          <span class="text-[10px] text-slate-500">Terkirim 25 Okt</span>
        </div>
      </div>

      <!-- Tahap 4: Sidang & Presentasi -->
      <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3 relative opacity-75">
        <div class="flex items-center justify-between">
          <span class="text-[10px] font-extrabold text-slate-400 uppercase">Tahap 4</span>
          <span class="px-2 py-0.5 rounded bg-slate-200 text-slate-700 text-[10px] font-bold">📅 Terjadwal</span>
        </div>
        <div>
          <div class="text-xs font-extrabold text-slate-900">Sidang & Presentasi</div>
          <div class="text-[11px] text-slate-500 mt-0.5">Ujian komprehensif di depan dewan penguji kejuruan PPLG.</div>
        </div>
        <div class="pt-2 border-t border-slate-200/60 flex items-center justify-center">
          <span class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-800 text-[11px] font-extrabold shadow-sm">
            <i class="fa-regular fa-calendar mr-1 text-sky-600"></i> 15 November 2024
          </span>
        </div>
      </div>

    </div>
  </div>

  <!-- 3. GRID TENGAH (KIRI: BERKAS LAPORAN & CATATAN GURU | KANAN: REKAPITULASI KINERJA SISWA) -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Bagian Kiri (7 Kolom): Berkas Laporan Terdaftar & Catatan Guru -->
    <div class="lg:col-span-7 space-y-6">
      
      <!-- Berkas Laporan Terdaftar -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-5">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <div>
            <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-file-pdf text-rose-500"></i>
              Berkas Laporan Terdaftar
            </h3>
          </div>
          <span class="px-2.5 py-1 rounded-full bg-sky-50 text-sky-700 border border-sky-200 text-[10px] font-extrabold">
            Versi 2.1 (Revisi Akhir)
          </span>
        </div>

        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/60 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
          <div class="flex items-start gap-3.5">
            <div class="w-12 h-14 rounded-xl bg-rose-100 text-rose-600 font-extrabold flex flex-col items-center justify-center text-xs shrink-0 shadow-sm border border-rose-200">
              <i class="fa-solid fa-file-pdf text-xl mb-0.5"></i>
              <span class="text-[9px]">PDF</span>
            </div>
            <div class="space-y-1">
              <div class="text-xs font-extrabold text-slate-900">Laporan_PKL_RizkyPratama_PPLG_PT_Solusi_Teknologi.pdf</div>
              <div class="text-[11px] text-slate-500 flex flex-wrap items-center gap-3">
                <span>Ukuran: 4.8 MB</span>
                <span>•</span>
                <span>Diperbarui: 25 Okt 2024, 09:30 WIB</span>
              </div>
              <div class="flex items-center gap-2 pt-1 flex-wrap">
                <span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">
                  <i class="fa-solid fa-shield-check"></i> Checksum Valid
                </span>
                <span class="inline-flex items-center gap-1 text-[10px] font-bold text-sky-700 bg-sky-50 px-2 py-0.5 rounded border border-sky-200">
                  Siap Verifikasi Industri
                </span>
                <span class="text-[10px] text-slate-500">94 Halaman</span>
                <span class="text-[10px] text-slate-400 font-mono">#PPLG-SMKN1-2024-089</span>
              </div>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5 pt-1">
          <button onclick="alert('Membuka pratinjau dokumen PDF...')" class="py-2.5 px-3 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 text-xs font-bold transition flex items-center justify-center gap-2 shadow-sm">
            <i class="fa-solid fa-eye text-sky-600"></i> Lihat Pratinjau
          </button>
          <button onclick="alert('Mengunggah file revisi baru...')" class="py-2.5 px-3 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 text-xs font-bold transition flex items-center justify-center gap-2 shadow-sm">
            <i class="fa-solid fa-cloud-arrow-up text-amber-600"></i> Ganti File
          </button>
          <button onclick="alert('Mengunduh lembar pengesahan resmi...')" class="py-2.5 px-3 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold transition flex items-center justify-center gap-2 shadow-sm">
            <i class="fa-solid fa-download text-sky-400"></i> Unduh Lembar Resmi
          </button>
        </div>

        <!-- Catatan Terakhir Guru Pembimbing -->
        <div class="p-4 rounded-xl bg-amber-50/50 border border-amber-200/80 space-y-2 text-xs">
          <div class="flex items-center justify-between font-bold text-slate-800">
            <span class="text-amber-900 flex items-center gap-1.5">
              <i class="fa-solid fa-comment-dots text-amber-600"></i> Catatan Terakhir Guru Pembimbing
            </span>
            <span class="text-[10px] text-slate-400">24 Okt, 14:15 WIB</span>
          </div>
          <p class="text-slate-600 italic leading-relaxed">
            "Bab IV bagian implementasi arsitektur database PostgreSQL di DUDI sudah disempurnakan dengan baik. Format diagram UML sudah sesuai standar industri. Silakan ajukan ke Pak Hendrawan untuk tanda tangan digital lembar pengesahan."
          </p>
          <div class="text-[10px] text-slate-400 pt-1">✍️ Dra. Sri Wahyuni, M.Pd — Pembimbing Internal SMK</div>
        </div>
      </div>

      <!-- Lampiran Pendukung Wajib -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <div>
            <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-paperclip text-sky-600"></i>
              Lampiran Pendukung Wajib
            </h3>
            <p class="text-xs text-slate-500">Komponen pelengkap portofolio sebelum pendaftaran sidang PKL.</p>
          </div>
          <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-extrabold text-[10px] border border-emerald-200">
            3 Terunggah • Lengkap
          </span>
        </div>

        <div class="space-y-2.5 text-xs">
          <!-- Lampiran 1 -->
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-file-contract"></i>
              </div>
              <div>
                <div class="font-extrabold text-slate-900">Surat Keterangan Selesai PKL (DUDI) <span class="ml-1 px-1.5 py-0.5 rounded bg-emerald-100 text-emerald-800 text-[9px] font-bold">Terverifikasi</span></div>
                <div class="text-[11px] text-slate-500">No. Ref: 104/HRD-STN/PKL/X/2024 • Bertanda tangan HR Director</div>
              </div>
            </div>
            <button class="p-2 rounded-lg bg-white border border-slate-200 text-slate-600 hover:bg-slate-100"><i class="fa-solid fa-download"></i></button>
          </div>

          <!-- Lampiran 2 -->
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-award"></i>
              </div>
              <div>
                <div class="font-extrabold text-slate-900">Lembar Penilaian Resmi Mitra Industri <span class="ml-1 px-1.5 py-0.5 rounded bg-sky-100 text-sky-800 text-[9px] font-bold">Nilai: 94.6 (A)</span></div>
                <div class="text-[11px] text-slate-500">Format F-PKL-04 terdistribusi dari Mentor Teknis</div>
              </div>
            </div>
            <button class="p-2 rounded-lg bg-white border border-slate-200 text-slate-600 hover:bg-slate-100"><i class="fa-solid fa-download"></i></button>
          </div>

          <!-- Lampiran 3 -->
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-images"></i>
              </div>
              <div>
                <div class="font-extrabold text-slate-900">Dokumentasi Proyek & Artefak Produk <span class="ml-1 px-1.5 py-0.5 rounded bg-slate-200 text-slate-700 text-[9px] font-bold">12 Lampiran Foto</span></div>
                <div class="text-[11px] text-slate-500">Screencap aplikasi kasir retail, deployment server, & daily sprint</div>
              </div>
            </div>
            <button class="p-2 rounded-lg bg-white border border-slate-200 text-slate-600 hover:bg-slate-100"><i class="fa-solid fa-download"></i></button>
          </div>
        </div>
      </div>

    </div>

    <!-- Bagian Kanan (5 Kolom): Rekapitulasi Kinerja Siswa & Bundling Berkas Cetak -->
    <div class="lg:col-span-5 space-y-6">
      
      <!-- Kartu Rekapitulasi Kinerja Siswa -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-5">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-chart-pie text-sky-600"></i>
            Rekapitulasi Kinerja Siswa
          </h3>
          <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 text-[10px] font-bold">Kumulatif Periode</span>
        </div>

        <!-- Akumulasi Jam Kerja Efektif -->
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
          <div class="flex items-center justify-between">
            <span class="text-[10px] font-bold text-slate-400 uppercase">Akumulasi Jam Kerja Efektif</span>
            <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 text-[10px] font-extrabold">60% Target Tercapai</span>
          </div>
          <div class="flex items-baseline gap-1">
            <span class="text-3xl font-black text-slate-900">480</span>
            <span class="text-xs text-slate-500">/ 800 Jam</span>
          </div>
          <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
            <div class="bg-sky-600 h-full rounded-full" style="width: 60%"></div>
          </div>
          <div class="flex items-center justify-between text-[10px] text-slate-500 pt-1">
            <span>Sisa: 320 Jam (8 Pekan Operasional)</span>
            <span class="font-bold text-slate-700">Standar Ditjen Vokasi</span>
          </div>
        </div>

        <!-- Grid Presensi & Logbook Harian -->
        <div class="grid grid-cols-2 gap-3 text-xs">
          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
            <div class="flex items-center justify-between font-bold text-slate-800">
              <span>Presensi</span>
              <i class="fa-solid fa-calendar-check text-emerald-600"></i>
            </div>
            <div class="text-xl font-black text-slate-900">59 <span class="text-[11px] font-normal text-slate-500">Hari Hadir</span></div>
            <div class="space-y-0.5 text-[10px] text-slate-500 pt-1 border-t border-slate-200/60">
              <div class="flex justify-between"><span>Tepat Waktu:</span><strong class="text-slate-800">58 hari</strong></div>
              <div class="flex justify-between"><span>Terlambat:</span><strong class="text-amber-600">1 hari</strong></div>
              <div class="flex justify-between"><span>Tanpa:</span><strong class="text-slate-800">0</strong></div>
              <div class="flex justify-between"><span>Keterangan:</span><strong class="text-emerald-600">(Nihil)</strong></div>
            </div>
          </div>

          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
            <div class="flex items-center justify-between font-bold text-slate-800">
              <span>Logbook Harian</span>
              <i class="fa-solid fa-book-open text-sky-600"></i>
            </div>
            <div class="text-xl font-black text-slate-900">59 / 59 <span class="text-[10px] font-normal text-slate-500">Disetujui</span></div>
            <div class="space-y-0.5 text-[10px] text-slate-500 pt-1 border-t border-slate-200/60">
              <div class="flex justify-between"><span>Revisi:</span><strong class="text-slate-800">2</strong></div>
              <div class="flex justify-between"><span>Logbook:</span><strong class="text-slate-800">di-diskusikan</strong></div>
              <div class="flex justify-between"><span>Lampiran Foto:</span><strong class="text-sky-700 font-bold">12 berkas</strong></div>
              <div class="flex justify-between"><span>Rata Nilai:</span><strong class="text-emerald-600 font-bold">95.4 /</strong></div>
              <div class="flex justify-between"><span>Harian:</span><strong class="text-slate-800">100</strong></div>
            </div>
          </div>
        </div>

        <!-- Kartu Bundling Berkas Cetak -->
        <div class="p-4 rounded-xl bg-sky-900 text-white space-y-3 shadow-md">
          <div class="flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-sky-500/20 text-sky-300 flex items-center justify-center shrink-0 border border-sky-400/30">
              <i class="fa-solid fa-print text-lg"></i>
            </div>
            <div>
              <div class="text-xs font-extrabold text-white">Bundling Berkas Cetak</div>
              <p class="text-[11px] text-slate-300 mt-0.5 leading-snug">
                Satukan naskah laporan, lembar pengesahan resmi, logbook lengkap, dan lembar nilai ke dalam 1 file PDF berstandar cetak offset / hard-cover.
              </p>
            </div>
          </div>
          <button onclick="alert('Mencetak buku laporan lengkap format PDF...')" class="w-full py-2.5 rounded-xl bg-sky-400 hover:bg-sky-300 text-slate-950 font-extrabold text-xs transition flex items-center justify-center gap-2 shadow">
            <i class="fa-solid fa-file-arrow-down"></i> Cetak Buku Laporan Lengkap (PDF)
          </button>
          <div class="text-[10px] text-slate-400 text-center">Sesuai format Baku Kurikulum Merdeka. Perkiraan: ~14.2 MB</div>
        </div>

        <!-- Mitra Industri Penyelenggara -->
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between text-xs">
          <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-slate-200 text-slate-700 flex items-center justify-center font-bold">
              <i class="fa-solid fa-building"></i>
            </div>
            <div>
              <div class="text-[10px] font-bold text-slate-400 uppercase">Mitra Industri Penyelenggara</div>
              <div class="font-extrabold text-slate-900">PT Solusi Teknologi Nusantara</div>
              <div class="text-[10px] text-slate-500">Batam Digital Park, Nongsa, Kota Batam</div>
            </div>
          </div>
          <i class="fa-solid fa-circle-check text-sky-600" title="Terverifikasi"></i>
        </div>

      </div>

    </div>

  </div>

  <!-- 4. TABEL RIWAYAT REVISI & DRAF UNGGAHAN -->
  <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
    
    <!-- Header Tabel -->
    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
      <div>
        <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-clock-rotate-left text-sky-600"></i>
          Riwayat Revisi & Draf Unggahan
        </h3>
        <p class="text-xs text-slate-500 mt-0.5">Audit trail perubahan dokumen laporan akhir PKL siswa yang tercatat oleh sistem.</p>
      </div>
      <span class="text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-xl border border-slate-200">
        Total: 3 Versi Berkas
      </span>
    </div>

    <!-- Tabel Data Riwayat -->
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse text-xs">
        <thead>
          <tr class="bg-slate-50/70 border-b border-slate-200/80 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">
            <th class="py-3.5 px-6">Versi</th>
            <th class="py-3.5 px-4">Nama File</th>
            <th class="py-3.5 px-4">Tanggal Diunggah</th>
            <th class="py-3.5 px-4">Ukuran</th>
            <th class="py-3.5 px-4">Status Telaah</th>
            <th class="py-3.5 px-6 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
          
          <!-- Baris 1: v2.1 -->
          <tr class="hover:bg-slate-50/50 transition">
            <td class="py-4 px-6 font-bold text-slate-900">
              v2.1 <span class="block text-[10px] font-extrabold text-emerald-600">(Final)</span>
            </td>
            <td class="py-4 px-4 font-bold text-slate-800">
              Laporan_PKL_RizkyPratama_PPLG_PT_Solusi_Teknologi.pdf
            </td>
            <td class="py-4 px-4 text-slate-600">25 Okt 2024, 09:30</td>
            <td class="py-4 px-4 text-slate-600">4.8 MB</td>
            <td class="py-4 px-4">
              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-amber-50 text-amber-800 border border-amber-200">
                ● Menunggu TTD Industri
              </span>
            </td>
            <td class="py-4 px-6 text-right">
              <button onclick="alert('Mengunduh versi v2.1...')" class="text-sky-600 hover:underline font-bold">Unduh</button>
            </td>
          </tr>

          <!-- Baris 2: v2.0 -->
          <tr class="hover:bg-slate-50/50 transition">
            <td class="py-4 px-6 font-bold text-slate-900">v2.0</td>
            <td class="py-4 px-4 font-medium text-slate-700">
              Laporan_PKL_RizkyPratama_Revisi1.pdf
            </td>
            <td class="py-4 px-4 text-slate-600">23 Okt 2024, 16:40</td>
            <td class="py-4 px-4 text-slate-600">4.5 MB</td>
            <td class="py-4 px-4">
              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
                ● Revisi Diterima Guru
              </span>
            </td>
            <td class="py-4 px-6 text-right">
              <button onclick="alert('Mengarsip file v2.0...')" class="text-slate-400 hover:text-slate-600 font-semibold">Arsip</button>
            </td>
          </tr>

          <!-- Baris 3: v1.0 -->
          <tr class="hover:bg-slate-50/50 transition">
            <td class="py-4 px-6 font-bold text-slate-900">v1.0 <span class="block text-[10px] font-normal text-slate-500">(Draf Awal)</span></td>
            <td class="py-4 px-4 font-medium text-slate-700">
              Draf_Awal_Laporan_PKL_Rizky.pdf
            </td>
            <td class="py-4 px-4 text-slate-600">18 Okt 2024, 11:12</td>
            <td class="py-4 px-4 text-slate-600">3.9 MB</td>
            <td class="py-4 px-4">
              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-rose-50 text-rose-700 border border-rose-200">
                ● Diperbaiki (2 Catatan)
              </span>
            </td>
            <td class="py-4 px-6 text-right">
              <button onclick="alert('Mengarsip file v1.0...')" class="text-slate-400 hover:text-slate-600 font-semibold">Arsip</button>
            </td>
          </tr>

        </tbody>
      </table>
    </div>

  </div>

</div>
@endsection