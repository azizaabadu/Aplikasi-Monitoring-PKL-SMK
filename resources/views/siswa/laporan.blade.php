@extends('layouts.student')

@section('title', 'Laporan Akhir & Rekapitulasi PKL — PKL.ID')

@section('content')
<div class="space-y-6">

  <!-- Header & Tombol Aksi -->
  <section class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
    <div class="space-y-1.5">
      <div class="flex items-center gap-1.5 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
        <a href="{{ route('siswa.dashboard') }}" class="hover:text-slate-600"><i class="fa-solid fa-house mr-1"></i>Beranda</a>
        <span>/</span>
        <span class="text-slate-700">Laporan & Rekapitulasi</span>
      </div>

      <div class="flex flex-wrap items-center gap-2.5">
        <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Laporan Akhir & Rekapitulasi PKL</h1>
        <span class="px-3 py-1 rounded-full bg-sky-100 text-sky-700 text-[11px] font-extrabold">TA 2024/2025</span>
      </div>

      <p class="text-xs text-slate-500 max-w-2xl">
        Pusat validasi berkas final, alur pengesahan bertingkat, serta penarikan rekapitulasi kumulatif siswa praktik kerja industri.
      </p>
    </div>

    <div class="flex flex-wrap items-center gap-2.5 self-start lg:self-center">
      <button type="button" onclick="openLapModal('modalPanduan')" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-xs font-bold shadow-2xs transition">
        <i class="fa-regular fa-file-lines text-slate-500"></i>
        <span>Panduan Penyusunan (Pedoman 2024)</span>
      </button>

      <button type="button" onclick="openLapModal('modalUnggahDraf')" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#0F2442] hover:bg-[#193763] text-white text-xs font-bold shadow-sm transition">
        <i class="fa-solid fa-cloud-arrow-up text-sky-300"></i>
        <span>+ Unggah Draf Laporan Baru</span>
      </button>
    </div>
  </section>

  <!-- WORKFLOW VALIDASI: STATUS ALUR PENGESAHAN BERKAS AKHIR -->
  <section class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-sm space-y-5">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
      <div>
        <div class="text-[10px] font-extrabold tracking-wider uppercase text-amber-500 flex items-center gap-1.5">
          <span>Workflow Validasi</span>
          <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
        </div>
        <h2 class="text-base font-extrabold text-slate-900 mt-0.5">Status Alur Pengesahan Berkas Akhir</h2>
      </div>
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-700 text-[11px] font-bold self-start sm:self-auto">
        <i class="fa-solid fa-arrow-trend-up text-indigo-500"></i>
        <span>Progres Pengesahan: <strong id="tahapLabel">Tahap 3 dari 4</strong></span>
      </span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
      <!-- Tahap 1 -->
      <div class="p-4 rounded-2xl bg-emerald-50/40 border border-emerald-200/80 flex flex-col justify-between space-y-4">
        <div class="space-y-2.5">
          <div class="flex items-center justify-between">
            <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs">
              <i class="fa-regular fa-circle-check"></i>
            </span>
            <span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-extrabold">• Selesai</span>
          </div>
          <div>
            <div class="text-[9px] font-extrabold uppercase tracking-wider text-emerald-600">Tahap 1</div>
            <h3 class="text-xs font-extrabold text-slate-900 mt-0.5">Penyusunan Bab I - V</h3>
            <p class="text-[11px] text-slate-500 mt-1 leading-relaxed">Draf naskah lengkap telah disusun dan lolos uji orisinalitas.</p>
          </div>
        </div>
        <div class="space-y-1.5 pt-2 border-t border-emerald-200/60">
          <div class="flex justify-between text-[10px] font-bold">
            <span class="text-slate-500">Kelengkapan</span>
            <span class="text-emerald-700 font-extrabold">100%</span>
          </div>
          <div class="w-full h-1.5 rounded-full bg-emerald-100 overflow-hidden">
            <div class="h-full bg-emerald-500 rounded-full w-full"></div>
          </div>
        </div>
      </div>

      <!-- Tahap 2 -->
      <div class="p-4 rounded-2xl bg-emerald-50/40 border border-emerald-200/80 flex flex-col justify-between space-y-4">
        <div class="space-y-2.5">
          <div class="flex items-center justify-between">
            <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs">
              <i class="fa-regular fa-circle-check"></i>
            </span>
            <span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-extrabold">• Disetujui</span>
          </div>
          <div>
            <div class="text-[9px] font-extrabold uppercase tracking-wider text-emerald-600">Tahap 2</div>
            <h3 class="text-xs font-extrabold text-slate-900 mt-0.5">Bimbingan Guru</h3>
            <p class="text-[11px] font-bold text-slate-700 mt-0.5">Dra. Sri Wahyuni, M.Pd</p>
            <p class="text-[10px] text-slate-400">NIP. 19780412 200501 2 008</p>
          </div>
        </div>
        <div class="pt-2 border-t border-emerald-200/60 flex items-center gap-1.5 text-[10px] font-bold text-emerald-700">
          <i class="fa-regular fa-circle-check"></i>
          <span>Revisi 2x • Selesai 24 Okt</span>
        </div>
      </div>

      <!-- Tahap 3 (Berjalan) -->
      <div class="p-4 rounded-2xl bg-indigo-50/50 border-2 border-indigo-400/70 flex flex-col justify-between space-y-4 shadow-2xs">
        <div class="space-y-2.5">
          <div class="flex items-center justify-between">
            <span class="w-7 h-7 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center text-xs">
              <i class="fa-solid fa-file-signature"></i>
            </span>
            <span class="px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-700 text-[10px] font-extrabold">• Menunggu TTD</span>
          </div>
          <div>
            <div class="text-[9px] font-extrabold uppercase tracking-wider text-indigo-600">Tahap 3 • Berjalan</div>
            <h3 class="text-xs font-extrabold text-slate-900 mt-0.5">Pengesahan DUDI</h3>
            <p class="text-[11px] font-bold text-slate-800 mt-0.5">Hendrawan Saputra, S.Kom</p>
            <p class="text-[10px] text-slate-500">Lead Engineer • PT Solusi Teknologi Nusantara</p>
          </div>
        </div>
        <div class="pt-2 border-t border-indigo-200/70 flex items-center justify-between gap-2 text-[10px]">
          <button type="button" id="btnKirimPengingat" onclick="kirimPengingatDudi()" class="font-extrabold text-indigo-600 hover:text-indigo-800 flex items-center gap-1">
            <i class="fa-regular fa-paper-plane"></i>
            <span>Kirim Pengingat</span>
          </button>
          <span id="statusPengingat" class="text-slate-400 font-medium">Terkirim 25 Okt</span>
        </div>
      </div>

      <!-- Tahap 4 -->
      <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 flex flex-col justify-between space-y-4">
        <div class="space-y-2.5">
          <div class="flex items-center justify-between">
            <span class="w-7 h-7 rounded-lg bg-slate-200/70 text-slate-500 flex items-center justify-center text-xs">
              <i class="fa-regular fa-id-badge"></i>
            </span>
            <span class="px-2.5 py-0.5 rounded-full bg-slate-200/80 text-slate-600 text-[10px] font-bold">Terjadwal</span>
          </div>
          <div>
            <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">Tahap 4</div>
            <h3 class="text-xs font-extrabold text-slate-800 mt-0.5">Sidang & Presentasi</h3>
            <p class="text-[11px] text-slate-500 mt-1 leading-relaxed">Ujian komprehensif di depan dewan penguji kejuruan PPLG.</p>
          </div>
        </div>
        <div class="pt-2 border-t border-slate-200/70">
          <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 text-[10px] font-extrabold">
            <i class="fa-regular fa-calendar"></i>
            <span>15 November 2024</span>
          </span>
        </div>
      </div>
    </div>
  </section>

  <!-- GRID TENGAH: BERKAS LAPORAN & LAMPIRAN (KIRI 7 COL) + REKAPITULASI KINERJA (KANAN 5 COL) -->
  <section class="grid grid-cols-1 xl:grid-cols-12 gap-6 items-start">

    <!-- KOLOM KIRI (7 COL) -->
    <div class="xl:col-span-7 space-y-6">

      <!-- Berkas Laporan Terdaftar -->
      <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-sm space-y-5">
        <div class="flex items-center justify-between gap-2">
          <div class="flex items-center gap-2.5">
            <i class="fa-regular fa-file-lines text-slate-700"></i>
            <h2 class="text-base font-extrabold text-slate-900">Berkas Laporan Terdaftar</h2>
          </div>
          <span id="badgeVersiAktif" class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-[10px] font-extrabold">
            Versi 2.1 (Revisi Akhir)
          </span>
        </div>

        <!-- Kotak File PDF -->
        <div class="p-4 rounded-2xl bg-slate-50/90 border border-slate-200/80 flex items-start gap-4">
          <div class="w-12 h-14 rounded-xl bg-rose-50 border border-rose-200 text-rose-600 flex flex-col items-center justify-center shrink-0 font-extrabold">
            <i class="fa-regular fa-file-pdf text-lg"></i>
            <span class="text-[9px] mt-0.5">PDF</span>
          </div>

          <div class="min-w-0 flex-1 space-y-2">
            <h3 id="namaFileUtama" class="text-xs sm:text-sm font-extrabold text-slate-900 truncate">
              Laporan_PKL_RizkyPratama_PPLG_PT_Solusi_Teknologi.pdf
            </h3>

            <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] text-slate-500">
              <span><i class="fa-solid fa-hard-drive mr-1 text-slate-400"></i>Ukuran: <strong id="ukuranFileUtama" class="text-slate-700">4.8 MB</strong></span>
              <span><i class="fa-regular fa-clock mr-1 text-slate-400"></i>Diperbarui: <strong id="tglFileUtama" class="text-slate-700">25 Okt 2024, 09:30 WIB</strong></span>
            </div>

            <div class="flex flex-wrap items-center gap-2 pt-0.5">
              <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold">
                <i class="fa-solid fa-link text-[9px]"></i> Checksum Valid
              </span>
              <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold">
                ✓ Siap Verifikasi Industri
              </span>
              <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-600 text-[10px] font-bold">
                <i class="fa-regular fa-file text-[9px]"></i> 94 Halaman
              </span>
              <span class="px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-600 text-[10px] font-mono font-bold">
                # PPLG-SMKN1-2024-089
              </span>
            </div>
          </div>
        </div>

        <!-- 3 Tombol Aksi Berkas -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
          <button type="button" onclick="openLapModal('modalPratinjau')" class="py-2.5 px-3.5 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-slate-800 text-xs font-bold flex items-center justify-center gap-2 transition">
            <i class="fa-regular fa-eye text-slate-600"></i>
            <span>Lihat Pratinjau</span>
          </button>

          <button type="button" onclick="openLapModal('modalUnggahDraf')" class="py-2.5 px-3.5 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-slate-800 text-xs font-bold flex items-center justify-center gap-2 transition">
            <i class="fa-solid fa-rotate text-slate-600"></i>
            <span>Ganti File</span>
          </button>

          <button type="button" onclick="lapToast('Mengunduh Lembar Pengesahan Resmi PDF...')" class="py-2.5 px-3.5 rounded-xl bg-[#0F2442] hover:bg-[#193763] text-white text-xs font-bold flex items-center justify-center gap-2 shadow-sm transition">
            <i class="fa-solid fa-download text-sky-300"></i>
            <span>Unduh Lembar Resmi</span>
          </button>
        </div>

        <!-- Catatan Terakhir Guru Pembimbing -->
        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/70 space-y-2">
          <div class="flex items-center justify-between text-[11px]">
            <span class="font-extrabold text-slate-800 flex items-center gap-1.5">
              <i class="fa-regular fa-comment-dots text-indigo-600"></i>
              Catatan Terakhir Guru Pembimbing
            </span>
            <span class="text-slate-400">24 Okt, 14:15 WIB</span>
          </div>
          <p class="text-xs italic text-slate-600 leading-relaxed">
            "Bab IV bagian implementasi arsitektur database PostgreSQL di DUDI sudah disempurnakan dengan baik. Format diagram UML sudah sesuai standar industri. Silakan ajukan ke Pak Hendrawan untuk tanda tangan digital lembar pengesahan."
          </p>
          <div class="flex items-center gap-2 pt-1 text-[11px]">
            <span class="w-5 h-5 rounded-full bg-indigo-900 text-white text-[9px] font-extrabold flex items-center justify-center">SW</span>
            <span class="font-bold text-slate-800">Dra. Sri Wahyuni, M.Pd</span>
            <span class="text-slate-400">— Pembimbing Internal SMK</span>
          </div>
        </div>
      </div>

      <!-- Lampiran Pendukung Wajib -->
      <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex flex-wrap items-center justify-between gap-2">
          <div>
            <h2 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-paperclip text-slate-600 text-sm"></i>
              <span>Lampiran Pendukung Wajib</span>
            </h2>
            <p class="text-[11px] text-slate-400 mt-0.5">Komponen pelengkap portofolio sebelum pendaftaran sidang PKL</p>
          </div>
          <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[11px] font-extrabold">
            3 Terunggah • Lengkap
          </span>
        </div>

        <div class="divide-y divide-slate-100">
          <div class="py-3.5 flex items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
              <div class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center shrink-0">
                <i class="fa-regular fa-file-word"></i>
              </div>
              <div class="min-w-0">
                <div class="flex flex-wrap items-center gap-2">
                  <span class="text-xs font-extrabold text-slate-900 truncate">Surat Keterangan Selesai PKL (DUDI)</span>
                  <span class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold">Terverifikasi</span>
                </div>
                <p class="text-[11px] text-slate-400 truncate mt-0.5">No. Ref: 104/HRD-STN/PKL/X/2024 • Bertanda tangan HR Director</p>
              </div>
            </div>
            <button type="button" onclick="lapToast('Mengunduh Surat Keterangan Selesai PKL...')" class="w-8 h-8 rounded-lg hover:bg-slate-100 text-slate-500 flex items-center justify-center shrink-0">
              <i class="fa-solid fa-download text-xs"></i>
            </button>
          </div>

          <div class="py-3.5 flex items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
              <div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                <i class="fa-regular fa-file-lines"></i>
              </div>
              <div class="min-w-0">
                <div class="flex flex-wrap items-center gap-2">
                  <span class="text-xs font-extrabold text-slate-900 truncate">Lembar Penilaian Resmi Mitra Industri</span>
                  <span class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold">Nilai: 94.6 (A)</span>
                </div>
                <p class="text-[11px] text-slate-400 truncate mt-0.5">Format F-PKL-04 terdistribusi dari Mentor Teknis</p>
              </div>
            </div>
            <button type="button" onclick="lapToast('Mengunduh Lembar Penilaian Resmi Mitra Industri...')" class="w-8 h-8 rounded-lg hover:bg-slate-100 text-slate-500 flex items-center justify-center shrink-0">
              <i class="fa-solid fa-download text-xs"></i>
            </button>
          </div>

          <div class="py-3.5 flex items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
              <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                <i class="fa-regular fa-images"></i>
              </div>
              <div class="min-w-0">
                <div class="flex flex-wrap items-center gap-2">
                  <span class="text-xs font-extrabold text-slate-900 truncate">Dokumentasi Proyek & Artefak Produk</span>
                  <span class="px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 text-[10px] font-bold">12 Lampiran Foto</span>
                </div>
                <p class="text-[11px] text-slate-400 truncate mt-0.5">Screencap aplikasi kasir retail, deployment server, & daily sprint</p>
              </div>
            </div>
            <button type="button" onclick="lapToast('Mengunduh arsip 12 lampiran dokumentasi proyek...')" class="w-8 h-8 rounded-lg hover:bg-slate-100 text-slate-500 flex items-center justify-center shrink-0">
              <i class="fa-solid fa-download text-xs"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- KOLOM KANAN (5 COL): REKAPITULASI KINERJA SISWA + BUNDLING + MITRA -->
    <div class="xl:col-span-5 space-y-6">

      <!-- Rekapitulasi Kinerja Siswa -->
      <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-sm space-y-5">
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-2">
            <i class="fa-solid fa-chart-simple text-slate-700"></i>
            <h2 class="text-base font-extrabold text-slate-900">Rekapitulasi Kinerja Siswa</h2>
          </div>
          <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-500 text-[10px] font-bold">Kumulatif Periode</span>
        </div>

        <!-- Akumulasi Jam Kerja Efektif -->
        <div class="p-4 rounded-2xl bg-slate-50/90 border border-slate-100 space-y-2.5">
          <div class="flex items-start justify-between gap-2">
            <div>
              <div class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">Akumulasi Jam Kerja Efektif</div>
              <div class="text-2xl font-extrabold text-slate-900 mt-1">480 <span class="text-xs font-semibold text-slate-400">/ 800 Jam</span></div>
            </div>
            <span class="px-2.5 py-1 rounded-xl bg-sky-100 text-sky-700 text-[10px] font-extrabold text-center leading-tight">
              60% Target<br>Tercapai
            </span>
          </div>

          <div class="w-full h-2 rounded-full bg-slate-200 overflow-hidden">
            <div class="h-full bg-[#172B4D] rounded-full" style="width: 60%"></div>
          </div>

          <div class="flex items-center justify-between text-[10px] pt-0.5">
            <span class="text-slate-400">Sisa: 320 Jam (8 Pekan Operasional)</span>
            <span class="font-extrabold text-slate-800">Standar Ditjen Vokasi</span>
          </div>
        </div>

        <!-- Grid Presensi & Logbook Harian -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
          <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-100 space-y-2.5 text-[11px]">
            <div class="flex items-center justify-between text-[10px] font-extrabold uppercase text-slate-400">
              <span>Presensi</span>
              <i class="fa-solid fa-shield-check text-emerald-500 text-xs"></i>
            </div>
            <div>
              <div class="text-2xl font-extrabold text-slate-900">59</div>
              <div class="text-slate-400">Hari Hadir Terekam</div>
            </div>
            <div class="space-y-1 pt-2 border-t border-slate-200/70">
              <div class="flex justify-between"><span class="text-slate-500">Tepat Waktu:</span><span class="font-extrabold text-emerald-600">56 hari</span></div>
              <div class="flex justify-between"><span class="text-slate-500">Terlambat:</span><span class="font-extrabold text-amber-500">1 hari</span></div>
              <div class="flex justify-between"><span class="text-slate-500">Tanpa Keterangan:</span><span class="font-extrabold text-emerald-600">0 (Nihil)</span></div>
            </div>
          </div>

          <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-100 space-y-2.5 text-[11px]">
            <div class="flex items-center justify-between text-[10px] font-extrabold uppercase text-slate-400">
              <span>Logbook Harian</span>
              <i class="fa-regular fa-file-lines text-slate-500 text-xs"></i>
            </div>
            <div>
              <div class="text-2xl font-extrabold text-slate-900">59 <span class="text-xs font-semibold text-slate-400">/ 59</span></div>
              <div class="text-slate-400">Jurnal Disetujui</div>
            </div>
            <div class="space-y-1 pt-2 border-t border-slate-200/70">
              <div class="flex justify-between"><span class="text-slate-500">Revisi:</span><span class="font-extrabold text-slate-800">3</span></div>
              <div class="flex justify-between"><span class="text-slate-500">Logbook:</span><span class="font-extrabold text-slate-800">dituntaskan</span></div>
              <div class="flex justify-between"><span class="text-slate-500">Lampiran Foto:</span><span class="font-extrabold text-sky-600">12 berkas</span></div>
              <div class="flex justify-between"><span class="text-slate-500">Rata Nilai:</span><span class="font-extrabold text-emerald-600">95.4 / 100</span></div>
            </div>
          </div>
        </div>

        <!-- Card Bundling Berkas Cetak (Biru Gelap) -->
        <div class="rounded-2xl bg-gradient-to-br from-[#0F2442] to-[#1A3B68] text-white p-5 space-y-3.5 shadow-md">
          <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-white/10 text-sky-300 flex items-center justify-center shrink-0">
              <i class="fa-solid fa-layer-group text-xs"></i>
            </div>
            <h3 class="text-sm font-extrabold">Bundling Berkas Cetak</h3>
          </div>

          <p class="text-[11px] text-slate-200/90 leading-relaxed">
            Satukan naskah laporan, lembar pengesahan resmi, logbook lengkap, dan lembar nilai ke dalam 1 file PDF berstandar cetak offset / hard-cover.
          </p>

          <button type="button" onclick="lapToast('Menyiapkan paket bundling PDF (~14.2 MB)...')" class="w-full py-3 px-4 rounded-xl bg-sky-100 hover:bg-white text-[#0F2442] font-extrabold text-xs flex items-center justify-center gap-2 shadow-sm transition">
            <i class="fa-solid fa-download"></i>
            <span>Cetak Buku Laporan Lengkap (PDF)</span>
          </button>

          <div class="text-center text-[10px] text-slate-300/80">
            Sesuai Format Buku Kurikulum Merdeka • Perkiraan ± 14.2 MB
          </div>
        </div>
      </div>

      <!-- Mitra Industri Penyelenggara -->
      <div class="bg-white rounded-3xl border border-slate-200/80 p-5 shadow-sm flex items-center justify-between gap-3">
        <div class="flex items-center gap-3 min-w-0">
          <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center shrink-0">
            <i class="fa-regular fa-building"></i>
          </div>
          <div class="min-w-0">
            <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">Mitra Industri Penyelenggara</div>
            <div class="text-xs font-extrabold text-slate-900 truncate mt-0.5">PT Solusi Teknologi Nusantara</div>
            <div class="text-[10px] text-slate-400 truncate">Batam Digital Park, Nongsa, Kota Batam</div>
          </div>
        </div>
        <i class="fa-solid fa-circle-check text-emerald-500 text-sm shrink-0"></i>
      </div>
    </div>
  </section>

  <!-- RIWAYAT REVISI & DRAF UNGGAHAN -->
  <section class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-sm space-y-4">
    <div class="flex items-center justify-between gap-2">
      <div>
        <h2 class="text-base font-extrabold text-slate-900">Riwayat Revisi & Draf Unggahan</h2>
        <p class="text-[11px] text-slate-400 mt-0.5">Audit trail perubahan dokumen laporan akhir PKL siswa yang tercatat oleh sistem.</p>
      </div>
      <span id="totalVersiLabel" class="text-xs font-semibold text-slate-500">Total: 3 Versi Berkas</span>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="border-b border-slate-100 text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">
            <th class="py-3 pr-4">Versi</th>
            <th class="py-3 px-3">Nama File</th>
            <th class="py-3 px-3">Tanggal Diunggah</th>
            <th class="py-3 px-3">Ukuran</th>
            <th class="py-3 px-3">Status Telaah</th>
            <th class="py-3 pl-3 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody id="tabelVersiBody" class="divide-y divide-slate-100 text-xs">
          <tr class="hover:bg-slate-50/80">
            <td class="py-4 pr-4 whitespace-nowrap"><div class="font-extrabold text-slate-900">v2.1</div><div class="text-[10px] text-slate-400">(Final)</div></td>
            <td class="py-4 px-3 font-bold text-slate-800">Laporan_PKL_RizkyPratama_PPLG_PT_Solusi_Teknologi.pdf</td>
            <td class="py-4 px-3 whitespace-nowrap text-slate-500">25 Okt 2024, 09:30</td>
            <td class="py-4 px-3 whitespace-nowrap text-slate-600">4.8 MB</td>
            <td class="py-4 px-3 whitespace-nowrap">
              <span class="inline-block px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 text-[10px] font-extrabold leading-tight text-center">
                • Menunggu<br>TTD Industri
              </span>
            </td>
            <td class="py-4 pl-3 text-right whitespace-nowrap">
              <button type="button" onclick="lapToast('Mengunduh Laporan_PKL_RizkyPratama_PPLG_PT_Solusi_Teknologi.pdf')" class="font-bold text-sky-600 hover:underline">Unduh</button>
            </td>
          </tr>

          <tr class="hover:bg-slate-50/80">
            <td class="py-4 pr-4 whitespace-nowrap font-bold text-slate-700">v2.0</td>
            <td class="py-4 px-3 text-slate-600">Laporan_PKL_RizkyPratama_Revisi2.pdf</td>
            <td class="py-4 px-3 whitespace-nowrap text-slate-500">23 Okt 2024, 16:40</td>
            <td class="py-4 px-3 whitespace-nowrap text-slate-600">4.5 MB</td>
            <td class="py-4 px-3 whitespace-nowrap">
              <span class="inline-block px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold leading-tight text-center">
                Revisi<br>Diterima Guru
              </span>
            </td>
            <td class="py-4 pl-3 text-right whitespace-nowrap text-slate-400 font-semibold">Arsip</td>
          </tr>

          <tr class="hover:bg-slate-50/80">
            <td class="py-4 pr-4 whitespace-nowrap"><div class="font-bold text-slate-700">v1.0</div><div class="text-[10px] text-slate-400">(Draf Awal)</div></td>
            <td class="py-4 px-3 text-slate-600">Draf_Awal_Laporan_PKL_Rizky.pdf</td>
            <td class="py-4 px-3 whitespace-nowrap text-slate-500">18 Okt 2024, 11:12</td>
            <td class="py-4 px-3 whitespace-nowrap text-slate-600">3.9 MB</td>
            <td class="py-4 px-3 whitespace-nowrap">
              <span class="inline-block px-2.5 py-1 rounded-full bg-indigo-50 text-indigo-700 text-[10px] font-bold leading-tight text-center">
                Diperbaiki<br>(2 Catatan)
              </span>
            </td>
            <td class="py-4 pl-3 text-right whitespace-nowrap text-slate-400 font-semibold">Arsip</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Modal Unggah Draf Laporan Baru -->
  <div id="modalUnggahDraf" class="hidden fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl border border-slate-200 space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-base font-extrabold text-slate-900">Unggah Draf Laporan Baru</h3>
        <button type="button" onclick="closeLapModal('modalUnggahDraf')" class="text-slate-400 hover:text-slate-700 font-bold">✕</button>
      </div>
      <form onsubmit="tambahVersiLaporan(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Nomor Versi</label>
          <input type="text" id="versiBaru" value="v2.2 (Revisi Final)" required class="w-full rounded-xl border border-slate-300 px-3 py-2.5 font-semibold" />
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Nama File PDF</label>
          <input type="text" id="fileBaru" value="Laporan_PKL_RizkyPratama_v2.2.pdf" required class="w-full rounded-xl border border-slate-300 px-3 py-2.5" />
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Catatan Perubahan</label>
          <textarea rows="2" required placeholder="Ringkasan bagian yang diperbarui..." class="w-full rounded-xl border border-slate-300 px-3 py-2.5"></textarea>
        </div>
        <div class="flex justify-end gap-2 pt-2">
          <button type="button" onclick="closeLapModal('modalUnggahDraf')" class="px-4 py-2.5 rounded-xl bg-slate-100 text-slate-700 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2.5 rounded-xl bg-[#0F2442] text-white font-bold">Simpan Versi</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Pratinjau & Panduan -->
  <div id="modalPratinjau" class="hidden fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-lg w-full p-6 shadow-2xl border border-slate-200 space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-base font-extrabold text-slate-900">Pratinjau Dokumen Laporan Akhir</h3>
        <button type="button" onclick="closeLapModal('modalPratinjau')" class="text-slate-400 hover:text-slate-700 font-bold">✕</button>
      </div>
      <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 text-xs space-y-2">
        <div class="font-extrabold text-slate-800">BAB IV — IMPLEMENTASI SISTEM & PENGUJIAN DI DUDI</div>
        <p class="text-slate-600 leading-relaxed">
          Perancangan skema relasional PostgreSQL, autentikasi JWT, serta dokumentasi alur kerja tim pengembangan di PT Solusi Teknologi Nusantara.
        </p>
      </div>
      <div class="flex justify-end">
        <button type="button" onclick="closeLapModal('modalPratinjau')" class="px-4 py-2 rounded-xl bg-[#0F2442] text-white text-xs font-bold">Tutup</button>
      </div>
    </div>
  </div>

  <div id="modalPanduan" class="hidden fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl border border-slate-200 space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-base font-extrabold text-slate-900">Pedoman Penyusunan Laporan PKL 2024</h3>
        <button type="button" onclick="closeLapModal('modalPanduan')" class="text-slate-400 hover:text-slate-700 font-bold">✕</button>
      </div>
      <ul class="text-xs text-slate-600 space-y-2 list-disc pl-4">
        <li>Format berkas wajib PDF dengan ukuran maksimal 25 MB.</li>
        <li>Sertakan lembar persetujuan pembimbing sekolah dan mentor DUDI.</li>
        <li>Lampirkan rekap logbook aktivitas harian yang telah divalidasi.</li>
      </ul>
      <div class="flex justify-end">
        <button type="button" onclick="closeLapModal('modalPanduan')" class="px-4 py-2 rounded-xl bg-[#0F2442] text-white text-xs font-bold">Mengerti</button>
      </div>
    </div>
  </div>

  <div id="lapToast" class="hidden fixed bottom-5 right-5 z-50 bg-[#0F2442] text-white px-4 py-3 rounded-2xl shadow-xl text-xs font-semibold">
    <span id="lapToastText"></span>
  </div>
</div>
@endsection

@push('scripts')
<script>
  function openLapModal(id) { document.getElementById(id).classList.remove('hidden'); }
  function closeLapModal(id) { document.getElementById(id).classList.add('hidden'); }

  function kirimPengingatDudi() {
    document.getElementById('statusPengingat').textContent = 'Terkirim barusan';
    document.getElementById('statusPengingat').className = 'text-emerald-600 font-bold';
    lapToast('Pengingat tanda tangan digital dikirim ke Hendrawan Saputra, S.Kom.');
  }

  function tambahVersiLaporan(e) {
    e.preventDefault();
    const versi = document.getElementById('versiBaru').value;
    const namaFile = document.getElementById('fileBaru').value;

    document.getElementById('namaFileUtama').textContent = namaFile;
    document.getElementById('badgeVersiAktif').textContent = versi;

    const tbody = document.getElementById('tabelVersiBody');
    const tr = document.createElement('tr');
    tr.className = 'bg-sky-50/40 hover:bg-slate-50/80';
    tr.innerHTML = `
      <td class="py-4 pr-4 whitespace-nowrap font-extrabold text-slate-900">${versi}</td>
      <td class="py-4 px-3 font-bold text-slate-800">${namaFile}</td>
      <td class="py-4 px-3 whitespace-nowrap text-emerald-600 font-semibold">Baru saja</td>
      <td class="py-4 px-3 whitespace-nowrap text-slate-600">5.0 MB</td>
      <td class="py-4 px-3 whitespace-nowrap"><span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 text-[10px] font-extrabold">• Menunggu Telaah</span></td>
      <td class="py-4 pl-3 text-right whitespace-nowrap"><button type="button" onclick="lapToast('Mengunduh ${namaFile}')" class="font-bold text-sky-600 hover:underline">Unduh</button></td>
    `;
    tbody.prepend(tr);

    e.target.reset();
    closeLapModal('modalUnggahDraf');
    lapToast(`Versi ${versi} berhasil diunggah ke riwayat laporan.`);
  }

  function lapToast(msg) {
    const el = document.getElementById('lapToast');
    document.getElementById('lapToastText').textContent = msg;
    el.classList.remove('hidden');
    clearTimeout(window._lt);
    window._lt = setTimeout(() => el.classList.add('hidden'), 3000);
  }
</script>
@endpush