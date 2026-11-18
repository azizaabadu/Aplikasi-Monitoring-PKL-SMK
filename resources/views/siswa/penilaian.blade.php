@extends('layouts.student')

@section('title', 'Penilaian Kinerja PKL & Sertifikasi - Portal PKL.ID')

@section('content')
<div class="space-y-6">

  <!-- 1. HEADER & TOMBOL AKSI ATAS -->
  <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
    <div>
      <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
        <span>Beranda</span>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Penilaian & Sertifikat</span>
      </div>
      <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Penilaian Kinerja PKL & Sertifikasi</h1>
      <p class="text-xs text-slate-500 mt-1">Rekapitulasi bugarku kompetensi magang industri, penilaian guru sekolah, DUDI, dan sertifikat kompetensi berstandar nasional.</p>
    </div>
    <div class="flex items-center gap-2.5">
      <button onclick="alert('Membuka verifikasi QR sertifikat...')" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-qrcode text-slate-500"></i>
        Verifikasi QR
      </button>
      <button onclick="alert('Mengunduh transkrip nilai resmi (PDF)...')" class="px-4 py-2.5 bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-file-arrow-down text-sky-400"></i>
        Unduh Transkrip Nilai (PDF)
      </button>
    </div>
  </div>

  <!-- 2. KARTU RINGKASAN SKOR AKHIR & STATUS EVALUASI (PRD N4 & N5) -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Kotak Kiri: Skor Akhir Kumulatif (5 Kolom) -->
    <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-5 flex flex-col justify-between">
      <div class="flex items-center justify-between">
        <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Kurikulum Merdeka Vokasi 2024</span>
        <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-extrabold flex items-center gap-1.5">
          <i class="fa-solid fa-lock"></i> Terverifikasi Mentor
        </span>
      </div>

      <div class="flex items-baseline gap-3">
        <div class="text-4xl sm:text-5xl font-black text-slate-900 tracking-tight">91.5</div>
        <div class="text-sm font-bold text-slate-400">/ 100 <span class="ml-2 px-2 py-0.5 rounded bg-emerald-100 text-emerald-900 text-xs font-extrabold">Predikat: Sangat Baik (A)</span></div>
      </div>

      <p class="text-xs text-slate-600 leading-relaxed">
        Nilai dihitung berdasarkan bobot teknis (80%) dan sikap kerja (20%) di ruang kerja DUDI, disahkan sesuai rubrik standar industri.
      </p>

      <div class="grid grid-cols-2 gap-3 pt-3 border-t border-slate-100 text-xs">
        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60">
          <div class="text-[10px] font-bold text-slate-400 uppercase">Skor Kinerja DUDI (80%)</div>
          <div class="text-lg font-black text-slate-900 mt-0.5">90.0 <span class="text-[10px] text-emerald-600 font-bold">Teknis</span></div>
        </div>
        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60">
          <div class="text-[10px] font-bold text-slate-400 uppercase">Skor Sikap Kerja (20%)</div>
          <div class="text-lg font-black text-slate-900 mt-0.5">94.0 <span class="text-[10px] text-sky-600 font-bold">Soft Skills</span></div>
        </div>
      </div>
    </div>

    <!-- Kotak Tengah: Status Evaluasi Berkala (4 Kolom) -->
    <div class="lg:col-span-4 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4 flex flex-col justify-between">
      <div class="flex items-center justify-between">
        <h3 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider flex items-center gap-1.5">
          <i class="fa-solid fa-chart-line text-sky-600"></i> Status Evaluasi Berkala
        </h3>
        <span class="text-[11px] font-bold text-slate-500">Total: 24 Minggu</span>
      </div>

      <div class="space-y-3 text-xs">
        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
          <div class="flex items-center gap-2.5">
            <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs">✓</span>
            <div>
              <div class="font-bold text-slate-800">Evaluasi Tengah Periode</div>
              <div class="text-[10px] text-slate-500">Minggu ke-12 • Nilai Resmi: 91.4</div>
            </div>
          </div>
          <span class="text-emerald-600 font-bold text-[10px]">Selesai</span>
        </div>

        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
          <div class="flex items-center gap-2.5">
            <span class="w-7 h-7 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center font-bold text-xs">⏳</span>
            <div>
              <div class="font-bold text-slate-800">Evaluasi Akhir DUDI</div>
              <div class="text-[10px] text-slate-500">Menunggu rentang laporan & validasi insidentil</div>
            </div>
          </div>
          <span class="text-amber-600 font-bold text-[10px]">Proses</span>
        </div>

        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between">
          <div class="flex items-center gap-2.5">
            <span class="w-7 h-7 rounded-lg bg-slate-200 text-slate-600 flex items-center justify-center font-bold text-xs">🔒</span>
            <div>
              <div class="font-bold text-slate-800">Penerbitan Sertifikat</div>
              <div class="text-[10px] text-slate-500">Verifikasi Lembar Kelulusan & Arsip</div>
            </div>
          </div>
          <span class="text-slate-400 font-bold text-[10px]">Terkunci</span>
        </div>
      </div>

      <div class="text-[10px] text-slate-500 flex items-center justify-between pt-2 border-t border-slate-100">
        <span>Partisipasi Kehadiran (24 Pekan)</span>
        <strong class="text-emerald-600">98.3% Berhasil</strong>
      </div>
    </div>

    <!-- Kotak Kanan: Mitra Industri Penilai (3 Kolom) -->
    <div class="lg:col-span-3 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4 flex flex-col justify-between">
      <div>
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">Mitra Industri Penilai</span>
        <div class="flex items-center gap-3 mt-3">
          <div class="w-10 h-10 rounded-xl bg-[#0F1E38] text-white font-extrabold flex items-center justify-center text-xs shrink-0">
            STN
          </div>
          <div>
            <div class="text-xs font-extrabold text-slate-900">PT Solusi Teknologi Nusantara</div>
            <div class="text-[10px] text-slate-500">Software Engineering</div>
          </div>
        </div>
      </div>

      <div class="space-y-1.5 text-xs pt-3 border-t border-slate-100">
        <div class="flex justify-between text-slate-600">
          <span class="text-[11px]">Penilai Lapangan:</span>
          <span class="font-bold text-slate-800">Ahmad Fauzi, S.Kom</span>
        </div>
        <div class="flex justify-between text-slate-600">
          <span class="text-[11px]">Posisi / Divisi:</span>
          <span class="font-bold text-slate-800">Lead Web & API</span>
        </div>
      </div>

      <div class="p-2.5 rounded-xl bg-emerald-50 border border-emerald-200 text-center">
        <span class="text-[11px] font-bold text-emerald-800 flex items-center justify-center gap-1.5">
          <i class="fa-solid fa-circle-check"></i> Akreditasi DUDI (Terakreditasi)
        </span>
      </div>
    </div>

  </div>

  <!-- 3. RINCIAN KOMPONEN PENILAIAN (ASPEK TEKNIS & SIKAP KERJA) -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    
    <!-- Aspek Teknis (Hard Skills) - Bobot 80% -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-5">
      <div class="flex items-center justify-between pb-3 border-b border-slate-100">
        <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-laptop-code text-sky-600"></i>
          1. Aspek Teknis (Hard Skills)
        </h3>
        <span class="px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 font-extrabold text-xs border border-sky-200">Bobot 80%</span>
      </div>
      <p class="text-xs text-slate-500">Kompetensi esensial sesuai SOP & standar industri perangkat lunak.</p>

      <div class="space-y-4 text-xs">
        <!-- Item 1 -->
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
          <div class="flex justify-between font-bold text-slate-800">
            <span>Kemampuan Analisis Masalah & Algoritma</span>
            <span class="text-sky-700 text-sm font-black">92 <span class="text-[10px] font-normal text-slate-500">Skor (80%)</span></span>
          </div>
          <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
            <div class="bg-sky-600 h-full rounded-full" style="width: 92%"></div>
          </div>
          <div class="text-[11px] text-slate-500 italic">Rubrik: Logika kuat, debugging optimal, efisien kode. • Bobot DUDI: 20% / 100</div>
        </div>

        <!-- Item 2 -->
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
          <div class="flex justify-between font-bold text-slate-800">
            <span>Kualitas Kode & Implementasi Fitur</span>
            <span class="text-sky-700 text-sm font-black">89 <span class="text-[10px] font-normal text-slate-500">Skor (80%)</span></span>
          </div>
          <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
            <div class="bg-sky-600 h-full rounded-full" style="width: 89%"></div>
          </div>
          <div class="text-[11px] text-slate-500 italic">Rubrik: Clean architecture, modular backend, unit testing. • Bobot DUDI: 20% / 100</div>
        </div>

        <!-- Item 3 -->
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
          <div class="flex justify-between font-bold text-slate-800">
            <span>Pemahaman Git, CI/CD & Protokol REST</span>
            <span class="text-sky-700 text-sm font-black">90 <span class="text-[10px] font-normal text-slate-500">Skor (80%)</span></span>
          </div>
          <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
            <div class="bg-sky-600 h-full rounded-full" style="width: 90%"></div>
          </div>
          <div class="text-[11px] text-slate-500 italic">Rubrik: Skuad deployment, branching, API documentation. • Bobot DUDI: 20% / 100</div>
        </div>

        <!-- Item 4 -->
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
          <div class="flex justify-between font-bold text-slate-800">
            <span>Dokumentasi Teknis & Standar Commit (Git)</span>
            <span class="text-sky-700 text-sm font-black">88 <span class="text-[10px] font-normal text-slate-500">Skor (80%)</span></span>
          </div>
          <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
            <div class="bg-sky-600 h-full rounded-full" style="width: 88%"></div>
          </div>
          <div class="text-[11px] text-slate-500 italic">Rubrik: Pull request rapi, semantic logging. • Bobot DUDI: 20% / 100</div>
        </div>
      </div>
    </div>

    <!-- Aspek Sikap Kerja (Soft Skills) - Bobot 20% -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-5">
      <div class="flex items-center justify-between pb-3 border-b border-slate-100">
        <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-users-rectangle text-emerald-600"></i>
          2. Aspek Sikap Kerja (Soft Skills)
        </h3>
        <span class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-extrabold text-xs border border-emerald-200">Bobot 20%</span>
      </div>
      <p class="text-xs text-slate-500">Kedisiplinan, etika profesional, dan kolaborasi tim di lingkungan kerja.</p>

      <div class="space-y-4 text-xs">
        <!-- Item 1 -->
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
          <div class="flex justify-between font-bold text-slate-800">
            <span>Disiplin Kerja & Ketepatan Waktu Presensi</span>
            <span class="text-emerald-700 text-sm font-black">95 <span class="text-[10px] font-normal text-slate-500">Skor (20%)</span></span>
          </div>
          <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
            <div class="bg-emerald-500 h-full rounded-full" style="width: 95%"></div>
          </div>
          <div class="text-[11px] text-slate-500 italic">Rubrik: Presensi tepat waktu, taat SOP DUDI. • Bobot Sekolah: 5% / 100</div>
        </div>

        <!-- Item 2 -->
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
          <div class="flex justify-between font-bold text-slate-800">
            <span>Kerjasama Tim & Komunikasi Profesional</span>
            <span class="text-emerald-700 text-sm font-black">94 <span class="text-[10px] font-normal text-slate-500">Skor (20%)</span></span>
          </div>
          <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
            <div class="bg-emerald-500 h-full rounded-full" style="width: 94%"></div>
          </div>
          <div class="text-[11px] text-slate-500 italic">Rubrik: Aktif koordinasi, daily standup, respon konstruktif. • Bobot Sekolah: 5% / 100</div>
        </div>

        <!-- Item 3 -->
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
          <div class="flex justify-between font-bold text-slate-800">
            <span>Inisiatif & Adaptabilitas Terhadap Teknologi Baru</span>
            <span class="text-emerald-700 text-sm font-black">92 <span class="text-[10px] font-normal text-slate-500">Skor (20%)</span></span>
          </div>
          <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
            <div class="bg-emerald-500 h-full rounded-full" style="width: 92%"></div>
          </div>
          <div class="text-[11px] text-slate-500 italic">Rubrik: Cepat adaptasi toolkit, proaktif diskusi mandiri. • Bobot Sekolah: 5% / 100</div>
        </div>

        <!-- Item 4 -->
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 space-y-2">
          <div class="flex justify-between font-bold text-slate-800">
            <span>Pematuhan K3 dan Etika Profesional (KOH)</span>
            <span class="text-emerald-700 text-sm font-black">95 <span class="text-[10px] font-normal text-slate-500">Skor (20%)</span></span>
          </div>
          <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
            <div class="bg-emerald-500 h-full rounded-full" style="width: 95%"></div>
          </div>
          <div class="text-[11px] text-slate-500 italic">Rubrik: Patuh SOP K3 gedung, kerahasiaan data DUDI. • Bobot Sekolah: 5% / 100</div>
        </div>
      </div>
    </div>

  </div>

  <!-- 4. REKOMENDASI PEREKRUTAN / CATATAN KHUSUS DUDI -->
  <div class="bg-gradient-to-r from-[#0F1E38] via-[#172B4D] to-[#1E3A6D] rounded-3xl p-6 sm:p-8 text-white shadow-xl relative overflow-hidden space-y-4">
    <div class="flex items-center justify-between pb-3 border-b border-white/10">
      <div class="flex items-center gap-2 text-xs font-semibold text-sky-300">
        <i class="fa-solid fa-award text-sky-400"></i> Catatan Evaluasi Komprehensif Komptensi Industri
      </div>
      <span class="px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-[10px] font-extrabold">
        Rekomendasi Perekrutan Prioritas (PRP)
      </span>
    </div>

    <div class="space-y-3">
      <h3 class="text-base sm:text-lg font-extrabold text-white">Rekomendasi Perekrutan Kader Vokasi</h3>
      <p class="text-xs sm:text-sm text-slate-300 leading-relaxed italic">
        "Rizky memiliki dedikasi luar biasa dan sangat cepat beradaptasi dengan alur kerja modern tim backend kami. Ia mampu menyunting 2 modul microservice internal dengan pengujian unit test yang rapi. Memiliki etos kerja matang, komunikatif, dan sangat potensial untuk langsung direkrut sebagai Junior Software Engineer setelah menyelesaikan studi di SMK Negeri 1 Batam."
      </p>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-2 text-xs">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-full bg-sky-500 text-[#0F1E38] font-black flex items-center justify-center text-sm">
          AF
        </div>
        <div>
          <div class="font-bold text-white">Ahmad Fauzi, S.Kom</div>
          <div class="text-[11px] text-slate-300">Lead Engineering di PT Solusi Teknologi Nusantara</div>
        </div>
      </div>
      <div class="text-[11px] text-emerald-300 font-semibold flex items-center gap-1.5">
        <i class="fa-solid fa-circle-check"></i> Ditandatangani secara digital & tersimpan di arsip pusat
      </div>
    </div>
  </div>

  <!-- 5. SERTIFIKAT RESMI PRAKTIK KERJA LAPANGAN (PRD Lampiran / N5) -->
  <div class="bg-white rounded-2xl border border-slate-200/80 p-6 sm:p-8 shadow-sm space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-slate-100">
      <div>
        <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-certificate text-sky-600"></i>
          Sertifikat Resmi Praktik Kerja Lapangan (PKL)
        </h3>
        <p class="text-xs text-slate-500 mt-0.5">Dokumen resmi berlogo kelulusan praktisi industri tersertifikasi standar Badan Standardisasi Nasional • Portal PKL.ID & KEMENDIKBUDRISTEK RI.</p>
      </div>
      <div class="flex items-center gap-2">
        <button onclick="alert('Pratinjau sertifikat diperbesar...')" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
          <i class="fa-solid fa-eye text-slate-500"></i> Pratinjau Layar Penuh
        </button>
        <button onclick="alert('Mengunduh sertifikat resolusi tinggi (PDF)...')" class="px-4 py-2.5 bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
          <i class="fa-solid fa-file-pdf text-rose-400"></i> Unduh Sertifikat Resolusi Tinggi (PDF)
        </button>
      </div>
    </div>

    <!-- PREVIEW TAMPILAN SERTIFIKAT DIGITAL -->
    <div class="relative bg-slate-900 rounded-2xl p-6 sm:p-12 text-slate-100 border-4 border-slate-200 shadow-2xl overflow-hidden space-y-8">
      <!-- Watermark Background -->
      <div class="absolute inset-0 opacity-5 flex items-center justify-center pointer-events-none">
        <i class="fa-solid fa-graduation-cap text-9k text-white text-[250px]"></i>
      </div>

      <!-- Header Sertifikat -->
      <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left relative z-10">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-xl bg-white text-slate-900 font-black flex items-center justify-center text-lg shadow">
            SMK
          </div>
          <div class="text-xs">
            <div class="text-[9px] uppercase tracking-widest text-slate-400">Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi</div>
            <div class="font-black text-white text-sm">SMK NEGERI 1 BATAM</div>
          </div>
        </div>
        <div class="text-center sm:text-right text-xs">
          <div class="text-[9px] uppercase tracking-widest text-slate-400">Mitra Industri Terverifikasi</div>
          <div class="font-black text-sky-400 text-sm">PT Solusi Teknologi Nusantara</div>
        </div>
      </div>

      <!-- Judul & Nomor Sertifikat -->
      <div class="text-center space-y-2 relative z-10 py-2">
        <span class="px-3 py-1 rounded-full bg-sky-500/20 text-sky-300 text-[10px] font-extrabold uppercase tracking-widest border border-sky-400/30">
          Sertifikasi Kompetensi Industri
        </span>
        <h2 class="text-2xl sm:text-4xl font-black text-white tracking-wider">PRAKTIK KERJA LAPANGAN</h2>
        <div class="text-xs text-slate-400 font-mono">No. Sertifikat : PKL-2026/SMKN1-BTM/PKL.ID/26642-IT</div>
      </div>

      <!-- Penerima Sertifikat -->
      <div class="text-center space-y-2 relative z-10">
        <p class="text-xs text-slate-400">Diberikan dengan bangga dan penghargaan kepada:</p>
        <div class="text-2xl sm:text-3xl font-black text-amber-300 uppercase tracking-wide">RIZKY PRATAMA</div>
        <div class="text-xs text-slate-300">NISN: 0058291823 • Kompetensi Keahlian: Rekayasa Perangkat Lunak & Gim</div>
        <p class="text-xs text-slate-300 max-w-2xl mx-auto pt-2 leading-relaxed">
          Telah berhasil menyelesaikan rangkaian Praktik Kerja Lapangan di dunia usaha/industri berstandar global terhitung sejak <strong>06 Januari 2026</strong> sampai dengan <strong>06 Juni 2026</strong> dengan capaian kualifikasi <strong>91.50 (Predikat: Sangat Baik/A)</strong>.
        </p>
      </div>

      <!-- Tanda Tangan Pejabat (Kepala Sekolah & Pimpinan DUDI) -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 pt-8 border-t border-slate-800 text-center relative z-10 text-xs">
        <div class="space-y-6">
          <div class="text-slate-400">Mengetahui,<br>Kepala SMK Negeri 1 Batam</div>
          <div class="h-12 flex items-end justify-center font-serif italic text-slate-300 text-base">
            (Tanda Tangan Digital & Cap Resmi)
          </div>
          <div>
            <div class="font-bold text-white text-sm">Dr. Ir. Dwi Santoso, M.T.</div>
            <div class="text-[11px] text-slate-400">NIP. 19680312 199403 1 002</div>
          </div>
        </div>

        <div class="space-y-6">
          <div class="text-slate-400">Pimpinan Mitra Industri,<br>PT Solusi Teknologi Nusantara</div>
          <div class="h-12 flex items-end justify-center font-serif italic text-slate-300 text-base">
            (Tanda Tangan Pimpinan & Stempel DUDI)
          </div>
          <div>
            <div class="font-bold text-white text-sm">Dr. Hendra Gunawan</div>
            <div class="text-[11px] text-slate-400">Direktur Utama & CTO</div>
          </div>
        </div>
      </div>

      <!-- Badge QR Verifikasi Bawah -->
      <div class="pt-4 flex items-center justify-between text-[11px] text-slate-400 border-t border-slate-800 relative z-10">
        <div class="flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
          <span>STATUS: Sertifikat Resmi & Valid</span>
        </div>
        <div class="font-mono text-sky-400">ID: QR-VERIFY-PKL2026-BTM</div>
      </div>
    </div>

    <!-- 4 Keterangan Status Dokumen -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs pt-2">
      <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center gap-2.5">
        <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
        <div>
          <div class="font-extrabold text-slate-800">Status Kelulusan</div>
          <div class="text-[10px] text-slate-500">Sertifikasi Resmi</div>
        </div>
      </div>
      <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center gap-2.5">
        <i class="fa-solid fa-graduation-cap text-sky-600 text-base"></i>
        <div>
          <div class="font-extrabold text-slate-800">Standar Kompetensi</div>
          <div class="text-[10px] text-slate-500">SKKNI Vokasi RPL</div>
        </div>
      </div>
      <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center gap-2.5">
        <i class="fa-solid fa-file-contract text-sky-600 text-base"></i>
        <div>
          <div class="font-extrabold text-slate-800">Total Jam Magang Aktif</div>
          <div class="text-[10px] text-slate-500">PTC, 960 Jam Praktik DUDI</div>
        </div>
      </div>
      <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center gap-2.5">
        <i class="fa-solid fa-shield-halved text-emerald-600 text-base"></i>
        <div>
          <div class="font-extrabold text-slate-800">Pemeriksaan Otomatis</div>
          <div class="text-[10px] text-slate-500">Buku Tuntas PKL.ID</div>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection