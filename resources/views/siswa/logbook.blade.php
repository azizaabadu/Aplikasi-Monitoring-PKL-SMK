@extends('layouts.student')

@section('title', 'Jurnal Aktivitas & Logbook Harian - Portal PKL.ID')

@section('content')
<div class="space-y-6">

  <!-- 1. HEADER & TOMBOL AKSI ATAS -->
  <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
    <div>
      <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
        <span>Beranda</span>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Jurnal & Logbook</span>
      </div>
      <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Jurnal Aktivitas & Logbook Harian</h1>
      <p class="text-xs text-slate-500 mt-1">Pencatatan rekapitulasi capaian kompetensi industri dan validasi berkala mentor DUDI.</p>
    </div>
    <div class="flex flex-wrap items-center gap-2.5">
      <button type="button" onclick="exportLogbookPdf()" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-file-arrow-down text-slate-500"></i>
        Ekspor Buku Logbook (PDF)
      </button>
      <button type="button" onclick="openCreateModal()" class="px-4 py-2.5 bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-plus text-sky-400"></i>
        Tulis Jurnal Hari Ini
      </button>
    </div>
  </div>

  <!-- 2. KARTU STATISTIK RINGKASAN LOGBOOK -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">

    <!-- Kotak Kiri: Capaian Durasi PKL (7 Kolom) -->
    <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4 flex flex-col justify-between">
      <div class="flex items-center justify-between gap-2 flex-wrap">
        <span class="px-2.5 py-1 rounded-lg bg-amber-50 text-amber-800 border border-amber-200 text-[11px] font-extrabold">
          <i class="fa-regular fa-clock mr-1"></i> Batas Pengisian Hari Ini: 18:00 WIB
        </span>
        <i class="fa-solid fa-shield-halved text-sky-600 text-lg"></i>
      </div>

      <div class="flex items-baseline gap-2">
        <span id="statHariAktif" class="text-3xl sm:text-4xl font-black text-slate-900">59</span>
        <span class="text-sm font-semibold text-slate-500">/ 60 Hari Aktif</span>
      </div>

      <div class="space-y-1.5">
        <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
          <div id="statProgressBar" class="bg-sky-600 h-full rounded-full transition-all duration-300" style="width: 98.3%"></div>
        </div>
        <div class="flex items-center justify-between text-[11px] text-slate-500 font-medium">
          <span id="statSisaHari">Tersisa 1 Hari Menuju Penutupan Praktik</span>
          <span id="statPersen" class="text-emerald-600 font-extrabold">98.3% Selesai</span>
        </div>
      </div>
    </div>

    <!-- Kotak Tengah: Disetujui DUDI (3 Kolom) -->
    <div class="lg:col-span-3 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-3 flex flex-col justify-between">
      <div class="flex items-center justify-between">
        <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Disetujui DUDI</span>
        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
      </div>
      <div>
        <div id="statDisetujui" class="text-3xl font-black text-slate-900">57</div>
        <div class="text-[11px] text-slate-500 font-medium mt-0.5">Entri Valid</div>
      </div>
      <div class="pt-2 border-t border-slate-100 flex items-center gap-1.5 text-[11px] font-bold text-emerald-700">
        <i class="fa-solid fa-circle-check"></i> Diverifikasi Mentor
      </div>
    </div>

    <!-- Kotak Kanan: Menunggu Review (2 Kolom) -->
    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-3 flex flex-col justify-between">
      <div class="flex items-center justify-between">
        <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Review</span>
        <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
      </div>
      <div>
        <div id="statReview" class="text-3xl font-black text-slate-900">2</div>
        <div class="text-[11px] text-slate-500 font-medium mt-0.5">Sedang Ditinjau</div>
      </div>
      <div class="pt-2 border-t border-slate-100 flex items-center gap-1.5 text-[11px] font-bold text-sky-700">
        <i class="fa-solid fa-user-clock"></i> Guru Pembimbing
      </div>
    </div>

  </div>

  <!-- 3. FILTER TAB & PENCARIAN -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
    <div id="filterTabs" class="flex flex-wrap items-center gap-2 text-xs font-bold">
      <button type="button" data-filter="all" onclick="setFilterTab('all')" class="filter-btn px-4 py-2 rounded-xl bg-sky-600 text-white shadow-sm transition">
        Semua Jurnal (<span id="countAll">59</span>)
      </button>
      <button type="button" data-filter="disetujui" onclick="setFilterTab('disetujui')" class="filter-btn px-4 py-2 rounded-xl text-slate-600 hover:bg-slate-100 transition">
        Disetujui (<span id="countDisetujui">57</span>)
      </button>
      <button type="button" data-filter="review" onclick="setFilterTab('review')" class="filter-btn px-4 py-2 rounded-xl text-slate-600 hover:bg-slate-100 transition">
        Menunggu Verifikasi (<span id="countReview">2</span>)
      </button>
      <button type="button" data-filter="revisi" onclick="setFilterTab('revisi')" class="filter-btn px-4 py-2 rounded-xl text-slate-600 hover:bg-slate-100 transition">
        Perlu Revisi (<span id="countRevisi">0</span>)
      </button>
    </div>

    <div class="relative w-full sm:w-72">
      <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
        <i class="fa-solid fa-magnifying-glass"></i>
      </span>
      <input id="searchLogbook" type="text" oninput="applyFilters(1)" placeholder="Filter kompetensi atau judul..." class="w-full pl-9 pr-14 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:border-sky-500" />
      <button type="button" id="btnClearSearch" onclick="resetFilters()" title="Reset filter" class="hidden absolute inset-y-0 right-8 px-1.5 text-slate-400 hover:text-slate-700 text-xs">
        <i class="fa-solid fa-xmark"></i>
      </button>
      <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
        <i class="fa-solid fa-sliders"></i>
      </span>
    </div>
  </div>

  <!-- 4. DAFTAR KARTU JURNAL HARIAN -->
  <div id="logbookList" class="space-y-4">

    <!-- Item Jurnal 1 -->
    <div data-id="1" data-status="disetujui" data-title="Implementasi REST API autentikasi JWT pada sistem inventaris internal" data-division="Divisi: Frontend Engineering & UI Development" data-date="Kamis, 24 Oktober 2024" data-time="08:00 - 17:00 WIB (8 Jam Kerja)" data-desc="Membuat arsitektur middleware otentikasi menggunakan JSON Web Token (JWT) berbasis bearer token. Melakukan integrasi login refresh token, hashing password, serta pembagian peran hak akses (RBAC) antara Administrator dan Staf Gudang pada modul inventaris. Mengatasi edge case ketika token kedaluwarsa secara otomatis dengan Axios Interceptor." data-tags="PPLG : REST API, React.js, Tailwind CSS, Git Versioning" data-file="commit_hash_7ffc2a.png" class="logbook-item bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-3">
        <div class="flex items-center gap-2 flex-wrap">
          <span class="status-badge px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-extrabold">
            ● DISETUJUI DUDI & SEKOLAH
          </span>
          <span class="item-date text-xs font-bold text-slate-700"><i class="fa-regular fa-calendar mr-1"></i> Kamis, 24 Oktober 2024</span>
          <span class="text-xs text-slate-400">•</span>
          <span class="item-time text-xs font-medium text-slate-500"><i class="fa-regular fa-clock mr-1"></i> 08:00 - 17:00 WIB (8 Jam Kerja)</span>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <div class="lg:col-span-8 space-y-3">
          <h3 class="item-title text-base font-extrabold text-slate-900 leading-snug">
            Implementasi REST API autentikasi JWT pada sistem inventaris internal
          </h3>
          <div class="item-division flex items-center gap-1.5 text-xs text-sky-700 font-semibold">
            <i class="fa-solid fa-code-branch"></i> Divisi: Frontend Engineering & UI Development
          </div>
          <p class="item-desc text-xs text-slate-600 leading-relaxed">
            Membuat arsitektur middleware otentikasi menggunakan JSON Web Token (JWT) berbasis bearer token. Melakukan integrasi login refresh token, hashing password, serta pembagian peran hak akses (RBAC) antara Administrator dan Staf Gudang pada modul inventaris. Mengatasi edge case ketika token kedaluwarsa secara otomatis dengan Axios Interceptor.
          </p>

          <div class="item-tags flex flex-wrap gap-2 pt-1">
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">PPLG : REST API</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">React.js</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Tailwind CSS</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Git Versioning</span>
          </div>

          <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5 text-xs">
            <div class="flex items-center gap-2">
              <div class="w-7 h-7 rounded-full bg-sky-900 text-white font-bold flex items-center justify-center text-[10px]">HW</div>
              <div>
                <span class="font-bold text-slate-900">Hendro Wicaksono</span>
                <span class="text-[10px] text-slate-500 ml-1">Senior Frontend Lead (Mentor DUDI)</span>
              </div>
            </div>
            <p class="text-slate-600 italic pl-9">
              "Kerja bagus, perancangan edge-case token kedaluwarsa dengan auto-refresh token via Axios interceptor sudah sangat rapi. Struktur clean architecture terjaga dengan baik."
            </p>
          </div>
        </div>

        <div class="lg:col-span-4 space-y-3 bg-slate-50/50 p-4 rounded-2xl border border-slate-200/60">
          <button type="button" onclick="openDetailModal(1)" class="w-full text-left rounded-xl overflow-hidden border border-slate-200 bg-white shadow-sm group">
            <div class="h-32 bg-slate-900 flex items-center justify-center text-slate-400 text-xs group-hover:bg-slate-800 transition">
              <i class="fa-solid fa-image text-2xl"></i>
            </div>
            <div class="p-2.5 flex items-center justify-between text-[11px] bg-white">
              <span class="font-bold text-slate-700 truncate">commit_hash_7ffc2a.png</span>
              <span class="text-slate-400 font-semibold shrink-0">+2 Lainnya</span>
            </div>
          </button>

          <div class="grid grid-cols-3 gap-2">
            <button type="button" onclick="openDetailModal(1)" class="col-span-2 py-2 px-3 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow-sm">
              <i class="fa-solid fa-eye text-sky-400"></i> Detail
            </button>
            <button type="button" onclick="downloadAttachment('commit_hash_7ffc2a.png')" class="py-2 px-3 rounded-xl bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-bold transition flex items-center justify-center shadow-sm" title="Unduh lampiran">
              <i class="fa-solid fa-download"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Item Jurnal 2 -->
    <div data-id="2" data-status="review" data-title="Slicing UI dashboard analitik Figma ke Tailwind CSS dengan pendekatan Responsive Grid" data-division="Divisi: Frontend Engineering & UI Development" data-date="Rabu, 23 Oktober 2024" data-time="08:15 - 17:00 WIB (8 Jam Kerja)" data-desc="Mengonversi mock-up desain sistem dari Figma ke komponen React Tailwind yang modular. Menyusun hierarki tipografi fluid, bento grid kartu metrik, serta state tombol interaktif. Melakukan optimasi layout pada resolusi layar tablet dan mobile." data-tags="Tailwind CSS, Responsive Design, Figma Slicing" data-file="dashboard_mockup_v2.png (1.8 MB)" class="logbook-item bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-3">
        <div class="flex items-center gap-2 flex-wrap">
          <span class="status-badge px-3 py-1 rounded-full bg-amber-50 text-amber-800 border border-amber-200 text-[10px] font-extrabold">
            ● MENUNGGU GURU PEMBIMBING
          </span>
          <span class="item-date text-xs font-bold text-slate-700"><i class="fa-regular fa-calendar mr-1"></i> Rabu, 23 Oktober 2024</span>
          <span class="text-xs text-slate-400">•</span>
          <span class="item-time text-xs font-medium text-slate-500"><i class="fa-regular fa-clock mr-1"></i> 08:15 - 17:00 WIB (8 Jam Kerja)</span>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <div class="lg:col-span-8 space-y-3">
          <h3 class="item-title text-base font-extrabold text-slate-900 leading-snug">
            Slicing UI dashboard analitik Figma ke Tailwind CSS dengan pendekatan Responsive Grid
          </h3>
          <div class="item-division flex items-center gap-1.5 text-xs text-sky-700 font-semibold">
            <i class="fa-solid fa-code-branch"></i> Divisi: Frontend Engineering & UI Development
          </div>
          <p class="item-desc text-xs text-slate-600 leading-relaxed">
            Mengonversi mock-up desain sistem dari Figma ke komponen React Tailwind yang modular. Menyusun hierarki tipografi fluid, bento grid kartu metrik, serta state tombol interaktif. Melakukan optimasi layout pada resolusi layar tablet dan mobile.
          </p>

          <div class="item-tags flex flex-wrap gap-2 pt-1">
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Tailwind CSS</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Responsive Design</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Figma Slicing</span>
          </div>

          <div class="p-3 rounded-xl bg-amber-50/60 border border-amber-200 text-xs flex flex-wrap items-center justify-between gap-2 text-amber-900">
            <div>
              <i class="fa-solid fa-circle-check text-emerald-600 mr-1.5"></i> Divalidasi Mentor Industri: <strong>Budi Prakoso, S.Kom</strong> (23 Okt, 18:20)
            </div>
            <span class="px-2 py-0.5 rounded bg-amber-200 text-amber-900 font-extrabold text-[10px]">Pending Approval Guru</span>
          </div>
        </div>

        <div class="lg:col-span-4 space-y-3 bg-slate-50/50 p-4 rounded-2xl border border-slate-200/60">
          <button type="button" onclick="openDetailModal(2)" class="w-full text-left rounded-xl overflow-hidden border border-slate-200 bg-white shadow-sm group">
            <div class="h-32 bg-slate-900 flex items-center justify-center text-slate-400 text-xs group-hover:bg-slate-800 transition">
              <i class="fa-solid fa-image text-2xl"></i>
            </div>
            <div class="p-2.5 flex items-center justify-between text-[11px] bg-white">
              <span class="font-bold text-slate-700 truncate">dashboard_mockup_v2.png</span>
              <span class="text-slate-400 font-semibold shrink-0">1.8 MB</span>
            </div>
          </button>

          <div class="grid grid-cols-2 gap-2">
            <button type="button" onclick="openEditModal(2)" class="py-2 px-3 rounded-xl bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-bold transition flex items-center justify-center gap-1.5 shadow-sm">
              <i class="fa-solid fa-pen-to-square text-sky-600"></i> Sunting
            </button>
            <button type="button" onclick="downloadAttachment('dashboard_mockup_v2.png')" class="py-2 px-3 rounded-xl bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-bold transition flex items-center justify-center shadow-sm" title="Unduh lampiran">
              <i class="fa-solid fa-download"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Item Jurnal 3 -->
    <div data-id="3" data-status="disetujui" data-title="Database Schema Design & Migration PostgreSQL untuk Modul Logistik" data-division="Divisi: Backend Engineering & Database Ops" data-date="Selasa, 22 Oktober 2024" data-time="08:00 - 17:00 WIB (8 Jam Kerja)" data-desc="Merancang entity relationship diagram (ERD) tabel barang, kategori suplai, dan mutasi keluar masuk. Menerapkan indexing pada kolom foreign key guna mempercepat query pencarian, serta menyusun seeding script awal menggunakan Prisma ORM." data-tags="PostgreSQL, Database Schema, Prisma ORM" data-obstacle="Terjadi foreign-key constraint violation saat migrasi data logistik lama. Diselesaikan dengan membuat sequence migrasi berjenjang (parent tables terlebih dahulu)." data-file="erd_schema_v1.png (840 KB)" class="logbook-item bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-3">
        <div class="flex items-center gap-2 flex-wrap">
          <span class="status-badge px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-extrabold">
            ● DISETUJUI DUDI & SEKOLAH
          </span>
          <span class="item-date text-xs font-bold text-slate-700"><i class="fa-regular fa-calendar mr-1"></i> Selasa, 22 Oktober 2024</span>
          <span class="text-xs text-slate-400">•</span>
          <span class="item-time text-xs font-medium text-slate-500"><i class="fa-regular fa-clock mr-1"></i> 08:00 - 17:00 WIB (8 Jam Kerja)</span>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <div class="lg:col-span-8 space-y-3">
          <h3 class="item-title text-base font-extrabold text-slate-900 leading-snug">
            Database Schema Design & Migration PostgreSQL untuk Modul Logistik
          </h3>
          <div class="item-division flex items-center gap-1.5 text-xs text-sky-700 font-semibold">
            <i class="fa-solid fa-code-branch"></i> Divisi: Backend Engineering & Database Ops
          </div>
          <p class="item-desc text-xs text-slate-600 leading-relaxed">
            Merancang entity relationship diagram (ERD) tabel barang, kategori suplai, dan mutasi keluar masuk. Menerapkan indexing pada kolom foreign key guna mempercepat query pencarian, serta menyusun seeding script awal menggunakan Prisma ORM.
          </p>

          <div class="item-tags flex flex-wrap gap-2 pt-1">
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">PostgreSQL</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Database Schema</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Prisma ORM</span>
          </div>

          <div class="item-obstacle-box p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1 text-xs">
            <div class="font-bold text-slate-800"><i class="fa-solid fa-triangle-exclamation text-amber-600 mr-1"></i> KENDALA & SOLUSI TEKNIS:</div>
            <p class="item-obstacle text-slate-600">Terjadi foreign-key constraint violation saat migrasi data logistik lama. Diselesaikan dengan membuat sequence migrasi berjenjang (parent tables terlebih dahulu).</p>
          </div>
        </div>

        <div class="lg:col-span-4 space-y-3 bg-slate-50/50 p-4 rounded-2xl border border-slate-200/60">
          <button type="button" onclick="openDetailModal(3)" class="w-full text-left rounded-xl overflow-hidden border border-slate-200 bg-white shadow-sm group">
            <div class="h-32 bg-slate-900 flex items-center justify-center text-slate-400 text-xs group-hover:bg-slate-800 transition">
              <i class="fa-solid fa-image text-2xl"></i>
            </div>
            <div class="p-2.5 flex items-center justify-between text-[11px] bg-white">
              <span class="font-bold text-slate-700 truncate">erd_schema_v1.png</span>
              <span class="text-slate-400 font-semibold shrink-0">840 KB</span>
            </div>
          </button>

          <div class="grid grid-cols-3 gap-2">
            <button type="button" onclick="openDetailModal(3)" class="col-span-2 py-2 px-3 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow-sm">
              <i class="fa-solid fa-eye text-sky-400"></i> Detail
            </button>
            <button type="button" onclick="downloadAttachment('erd_schema_v1.png')" class="py-2 px-3 rounded-xl bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-bold transition flex items-center justify-center shadow-sm" title="Unduh lampiran">
              <i class="fa-solid fa-download"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Empty State jika tidak ada hasil filter -->
  <div id="emptyState" class="hidden bg-white rounded-2xl border border-dashed border-slate-300 p-10 text-center space-y-2">
    <div class="w-11 h-11 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">
      <i class="fa-solid fa-magnifying-glass text-lg"></i>
    </div>
    <h3 class="text-sm font-extrabold text-slate-800">Tidak ada catatan logbook yang cocok</h3>
    <p class="text-xs text-slate-500">Coba kata kunci lain atau pilih tab status yang berbeda.</p>
    <button type="button" onclick="resetFilters()" class="mt-2 px-4 py-2 rounded-xl bg-[#0F1E38] text-white text-xs font-bold hover:bg-[#1E3A6D] transition">
      Tampilkan Semua Jurnal
    </button>
  </div>

  <!-- 5. FOOTER PAGINATION -->
  <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4 text-xs text-slate-500 font-medium">
    <div id="paginationInfo">Menampilkan 1 - 3 dari 59 total catatan logbook</div>
    <div id="paginationControls" class="flex items-center gap-1">
      <button type="button" id="btnPrevPage" onclick="changePage(currentPage - 1)" class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white text-slate-400 cursor-not-allowed">
        <i class="fa-solid fa-chevron-left"></i>
      </button>
      <button type="button" data-page="1" onclick="changePage(1)" class="page-btn px-3.5 py-1.5 rounded-lg border border-sky-500 bg-sky-600 text-white font-bold shadow-sm">1</button>
      <button type="button" data-page="2" onclick="changePage(2)" class="page-btn px-3.5 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700">2</button>
      <button type="button" data-page="3" onclick="changePage(3)" class="page-btn px-3.5 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700">3</button>
      <span class="px-2 text-slate-400">...</span>
      <button type="button" data-page="20" onclick="changePage(20)" class="page-btn px-3.5 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700">20</button>
      <button type="button" id="btnNextPage" onclick="changePage(currentPage + 1)" class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700">
        <i class="fa-solid fa-chevron-right"></i>
      </button>
    </div>
  </div>

</div>

<!-- MODAL: TULIS / SUNTING JURNAL -->
<div id="formModal" class="hidden fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-xs flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-xl max-h-[90vh] overflow-y-auto p-6 space-y-4">
    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
      <h3 id="formModalTitle" class="text-base font-extrabold text-slate-900">Tulis Jurnal Hari Ini</h3>
      <button type="button" onclick="closeFormModal()" class="w-8 h-8 rounded-lg hover:bg-slate-100 text-slate-500 flex items-center justify-center">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <form id="logbookForm" onsubmit="handleFormSubmit(event)" class="space-y-3.5 text-xs">
      <input type="hidden" id="editItemId" />

      <div>
        <label class="block font-bold text-slate-700 mb-1">Judul Aktivitas / Kompetensi</label>
        <input id="inputTitle" type="text" required placeholder="Contoh: Integrasi endpoint API & pengujian unit" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500" />
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Tanggal</label>
          <input id="inputDate" type="text" required value="Jumat, 25 Oktober 2024" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500" />
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Waktu & Durasi</label>
          <input id="inputTime" type="text" required value="08:00 - 17:00 WIB (8 Jam Kerja)" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500" />
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Divisi / Tim</label>
          <input id="inputDivision" type="text" required value="Divisi: Frontend Engineering & UI Development" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500" />
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Status Validasi</label>
          <select id="inputStatus" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500 font-semibold">
            <option value="review">Menunggu Verifikasi / Guru Pembimbing</option>
            <option value="disetujui">Disetujui DUDI & Sekolah</option>
            <option value="revisi">Perlu Revisi</option>
          </select>
        </div>
      </div>

      <div>
        <label class="block font-bold text-slate-700 mb-1">Uraian Kegiatan & Capaian</label>
        <textarea id="inputDesc" rows="3" required placeholder="Jelaskan pekerjaan teknis yang dilakukan hari ini..." class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500"></textarea>
      </div>

      <div>
        <label class="block font-bold text-slate-700 mb-1">Tag Kompetensi (pisahkan dengan koma)</label>
        <input id="inputTags" type="text" placeholder="Laravel, Tailwind CSS, REST API, Git" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500" />
      </div>

      <div>
        <label class="block font-bold text-slate-700 mb-1">Kendala & Solusi Teknis (opsional)</label>
        <textarea id="inputObstacle" rows="2" placeholder="Tuliskan kendala teknis dan cara penyelesaiannya..." class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-sky-500"></textarea>
      </div>

      <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
        <button type="button" onclick="closeFormModal()" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-bold hover:bg-slate-50">
          Batal
        </button>
        <button type="submit" class="px-4 py-2 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white font-bold shadow-sm">
          Simpan Jurnal
        </button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL: DETAIL JURNAL -->
<div id="detailModal" class="hidden fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-xs flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-lg p-6 space-y-4 text-xs">
    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
      <span id="detailBadge" class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-extrabold"></span>
      <button type="button" onclick="closeDetailModal()" class="w-8 h-8 rounded-lg hover:bg-slate-100 text-slate-500 flex items-center justify-center">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <div class="space-y-1">
      <h3 id="detailTitle" class="text-base font-extrabold text-slate-900"></h3>
      <div id="detailMeta" class="text-[11px] text-slate-500 font-medium"></div>
      <div id="detailDivision" class="text-xs text-sky-700 font-semibold pt-0.5"></div>
    </div>

    <p id="detailDesc" class="text-slate-600 leading-relaxed"></p>

    <div id="detailTags" class="flex flex-wrap gap-1.5"></div>

    <div id="detailObstacleWrap" class="hidden p-3 rounded-xl bg-slate-50 border border-slate-200 space-y-1">
      <div class="font-bold text-slate-800"><i class="fa-solid fa-triangle-exclamation text-amber-600 mr-1"></i> KENDALA & SOLUSI TEKNIS:</div>
      <p id="detailObstacle" class="text-slate-600"></p>
    </div>

    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between">
      <span class="font-bold text-slate-700"><i class="fa-solid fa-paperclip mr-1.5 text-slate-400"></i><span id="detailFile"></span></span>
      <button type="button" onclick="downloadAttachment(document.getElementById('detailFile').textContent)" class="px-3 py-1.5 rounded-lg bg-[#0F1E38] text-white font-bold hover:bg-[#1E3A6D]">
        Unduh
      </button>
    </div>

    <div class="flex justify-end pt-1">
      <button type="button" onclick="closeDetailModal()" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold">
        Tutup
      </button>
    </div>
  </div>
</div>

<!-- TOAST NOTIFIKASI -->
<div id="toast" class="hidden fixed bottom-5 right-5 z-50 bg-[#0F1E38] text-white text-xs font-bold px-4 py-3 rounded-xl shadow-lg flex items-center gap-2.5">
  <i class="fa-solid fa-circle-check text-emerald-400"></i>
  <span id="toastMessage"></span>
</div>
@endsection

@push('scripts')
<script>
  let currentFilter = 'all';
  let currentPage = 1;
  const perPage = 3;

  // Hitungan dasar selain 3 item yang tampil di halaman 1
  const baseCounts = {
    all: 59,
    disetujui: 57,
    review: 2,
    revisi: 0
  };

  function showToast(msg) {
    const toast = document.getElementById('toast');
    document.getElementById('toastMessage').textContent = msg;
    toast.classList.remove('hidden');
    clearTimeout(window.toastTimer);
    window.toastTimer = setTimeout(() => toast.classList.add('hidden'), 2800);
  }

  function exportLogbookPdf() {
    showToast('Menyiapkan buku logbook format PDF...');
  }

  function downloadAttachment(filename) {
    showToast(`Mengunduh lampiran: ${filename}`);
  }

  function getStatusMeta(status) {
    if (status === 'disetujui') {
      return {
        label: '● DISETUJUI DUDI & SEKOLAH',
        cls: 'status-badge px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-extrabold'
      };
    }
    if (status === 'revisi') {
      return {
        label: '● PERLU REVISI',
        cls: 'status-badge px-3 py-1 rounded-full bg-rose-50 text-rose-700 border border-rose-200 text-[10px] font-extrabold'
      };
    }
    return {
      label: '● MENUNGGU GURU PEMBIMBING',
      cls: 'status-badge px-3 py-1 rounded-full bg-amber-50 text-amber-800 border border-amber-200 text-[10px] font-extrabold'
    };
  }

  function updateStatsAndCounts() {
    const items = Array.from(document.querySelectorAll('.logbook-item'));
    const extraTotal = Math.max(0, items.length - 3);

    const extraDisetujui = items.filter(i => i.dataset.status === 'disetujui').length - 2;
    const extraReview = items.filter(i => i.dataset.status === 'review').length - 1;
    const extraRevisi = items.filter(i => i.dataset.status === 'revisi').length;

    const totalAll = baseCounts.all + extraTotal;
    const totalDisetujui = baseCounts.disetujui + Math.max(0, extraDisetujui);
    const totalReview = baseCounts.review + Math.max(0, extraReview);
    const totalRevisi = baseCounts.revisi + extraRevisi;

    document.getElementById('countAll').textContent = totalAll;
    document.getElementById('countDisetujui').textContent = totalDisetujui;
    document.getElementById('countReview').textContent = totalReview;
    document.getElementById('countRevisi').textContent = totalRevisi;

    document.getElementById('statDisetujui').textContent = totalDisetujui;
    document.getElementById('statReview').textContent = totalReview;

    const hariAktif = Math.min(60, 59 + extraTotal);
    const sisaHari = Math.max(0, 60 - hariAktif);
    const persen = ((hariAktif / 60) * 100).toFixed(1);

    document.getElementById('statHariAktif').textContent = hariAktif;
    document.getElementById('statProgressBar').style.width = `${persen}%`;
    document.getElementById('statPersen').textContent = `${persen}% Selesai`;
    document.getElementById('statSisaHari').textContent = sisaHari === 0
      ? 'Target 60 Hari Aktif Terpenuhi'
      : `Tersisa ${sisaHari} Hari Menuju Penutupan Praktik`;
  }

  function setFilterTab(filter) {
    currentFilter = filter;
    document.querySelectorAll('.filter-btn').forEach(btn => {
      const active = btn.dataset.filter === filter;
      btn.className = active
        ? 'filter-btn px-4 py-2 rounded-xl bg-sky-600 text-white shadow-sm transition'
        : 'filter-btn px-4 py-2 rounded-xl text-slate-600 hover:bg-slate-100 transition';
    });
    applyFilters(1);
  }

  function resetFilters() {
    document.getElementById('searchLogbook').value = '';
    setFilterTab('all');
  }

  function applyFilters(page = 1) {
    currentPage = page;
    const query = document.getElementById('searchLogbook').value.trim().toLowerCase();
    document.getElementById('btnClearSearch').classList.toggle('hidden', query.length === 0);

    const items = Array.from(document.querySelectorAll('.logbook-item'));
    const matched = items.filter(item => {
      const matchStatus = currentFilter === 'all' || item.dataset.status === currentFilter;
      const searchable = [
        item.dataset.title || '',
        item.dataset.division || '',
        item.dataset.desc || '',
        item.dataset.tags || '',
        item.dataset.obstacle || ''
      ].join(' ').toLowerCase();
      const matchQuery = !query || searchable.includes(query);
      return matchStatus && matchQuery;
    });

    items.forEach(item => item.classList.add('hidden'));

    const emptyState = document.getElementById('emptyState');
    const paginationInfo = document.getElementById('paginationInfo');
    const totalAll = parseInt(document.getElementById('countAll').textContent, 10);

    if (matched.length === 0) {
      emptyState.classList.remove('hidden');
      paginationInfo.textContent = `Menampilkan 0 dari ${totalAll} total catatan logbook`;
      updatePaginationButtons(1, 1);
      return;
    }

    emptyState.classList.add('hidden');
    const totalPages = Math.max(1, Math.ceil(matched.length / perPage));
    currentPage = Math.min(Math.max(1, page), totalPages);

    const start = (currentPage - 1) * perPage;
    const end = Math.min(start + perPage, matched.length);

    matched.slice(start, end).forEach(item => item.classList.remove('hidden'));

    const isFiltered = currentFilter !== 'all' || query.length > 0;
    paginationInfo.textContent = isFiltered
      ? `Menampilkan ${start + 1} - ${end} dari ${matched.length} catatan sesuai filter`
      : `Menampilkan ${start + 1} - ${Math.max(end, 3)} dari ${totalAll} total catatan logbook`;

    updatePaginationButtons(currentPage, totalPages);
  }

  function updatePaginationButtons(activePage, totalPages) {
    document.querySelectorAll('.page-btn').forEach(btn => {
      const p = parseInt(btn.dataset.page, 10);
      const isCurrent = p === activePage;
      const isDisabled = p > totalPages && p !== 20;

      btn.disabled = isDisabled;
      btn.className = isCurrent
        ? 'page-btn px-3.5 py-1.5 rounded-lg border border-sky-500 bg-sky-600 text-white font-bold shadow-sm'
        : isDisabled
          ? 'page-btn px-3.5 py-1.5 rounded-lg border border-slate-100 bg-slate-50 text-slate-300 cursor-not-allowed'
          : 'page-btn px-3.5 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700';
    });

    const prevBtn = document.getElementById('btnPrevPage');
    const nextBtn = document.getElementById('btnNextPage');
    prevBtn.disabled = activePage <= 1;
    nextBtn.disabled = activePage >= totalPages;
    prevBtn.className = activePage <= 1
      ? 'px-3 py-1.5 rounded-lg border border-slate-200 bg-white text-slate-400 cursor-not-allowed'
      : 'px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700';
    nextBtn.className = activePage >= totalPages
      ? 'px-3 py-1.5 rounded-lg border border-slate-200 bg-white text-slate-400 cursor-not-allowed'
      : 'px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700';
  }

  function changePage(page) {
    if (page === 20) {
      showToast('Menampilkan halaman terakhir (20) — data arsip logbook.');
      return;
    }
    applyFilters(page);
  }

  function openCreateModal() {
    document.getElementById('formModalTitle').textContent = 'Tulis Jurnal Hari Ini';
    document.getElementById('editItemId').value = '';
    document.getElementById('inputTitle').value = '';
    document.getElementById('inputDate').value = 'Jumat, 25 Oktober 2024';
    document.getElementById('inputTime').value = '08:00 - 17:00 WIB (8 Jam Kerja)';
    document.getElementById('inputDivision').value = 'Divisi: Frontend Engineering & UI Development';
    document.getElementById('inputStatus').value = 'review';
    document.getElementById('inputDesc').value = '';
    document.getElementById('inputTags').value = 'PPLG, Tailwind CSS, Git';
    document.getElementById('inputObstacle').value = '';
    document.getElementById('formModal').classList.remove('hidden');
  }

  function openEditModal(id) {
    const item = document.querySelector(`.logbook-item[data-id="${id}"]`);
    if (!item) return;

    document.getElementById('formModalTitle').textContent = 'Sunting Jurnal Harian';
    document.getElementById('editItemId').value = id;
    document.getElementById('inputTitle').value = item.dataset.title || '';
    document.getElementById('inputDate').value = item.dataset.date || '';
    document.getElementById('inputTime').value = item.dataset.time || '';
    document.getElementById('inputDivision').value = item.dataset.division || '';
    document.getElementById('inputStatus').value = item.dataset.status || 'review';
    document.getElementById('inputDesc').value = item.dataset.desc || '';
    document.getElementById('inputTags').value = item.dataset.tags || '';
    document.getElementById('inputObstacle').value = item.dataset.obstacle || '';
    document.getElementById('formModal').classList.remove('hidden');
  }

  function closeFormModal() {
    document.getElementById('formModal').classList.add('hidden');
  }

  function renderTagsHtml(tagsCsv) {
    return tagsCsv
      .split(',')
      .map(t => t.trim())
      .filter(Boolean)
      .map(t => `<span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">${t}</span>`)
      .join('');
  }

  function handleFormSubmit(e) {
    e.preventDefault();
    const editId = document.getElementById('editItemId').value;
    const title = document.getElementById('inputTitle').value.trim();
    const date = document.getElementById('inputDate').value.trim();
    const time = document.getElementById('inputTime').value.trim();
    const division = document.getElementById('inputDivision').value.trim();
    const status = document.getElementById('inputStatus').value;
    const desc = document.getElementById('inputDesc').value.trim();
    const tags = document.getElementById('inputTags').value.trim();
    const obstacle = document.getElementById('inputObstacle').value.trim();
    const meta = getStatusMeta(status);

    if (editId) {
      const item = document.querySelector(`.logbook-item[data-id="${editId}"]`);
      item.dataset.title = title;
      item.dataset.date = date;
      item.dataset.time = time;
      item.dataset.division = division;
      item.dataset.status = status;
      item.dataset.desc = desc;
      item.dataset.tags = tags;
      item.dataset.obstacle = obstacle;

      const badge = item.querySelector('.status-badge');
      badge.className = meta.cls;
      badge.textContent = meta.label;
      item.querySelector('.item-date').innerHTML = `<i class="fa-regular fa-calendar mr-1"></i> ${date}`;
      item.querySelector('.item-time').innerHTML = `<i class="fa-regular fa-clock mr-1"></i> ${time}`;
      item.querySelector('.item-title').textContent = title;
      item.querySelector('.item-division').innerHTML = `<i class="fa-solid fa-code-branch"></i> ${division}`;
      item.querySelector('.item-desc').textContent = desc;
      item.querySelector('.item-tags').innerHTML = renderTagsHtml(tags);

      closeFormModal();
      updateStatsAndCounts();
      applyFilters(currentPage);
      showToast('Jurnal berhasil diperbarui.');
      return;
    }

    const newId = Date.now();
    const container = document.getElementById('logbookList');
    const card = document.createElement('div');
    card.dataset.id = newId;
    card.dataset.status = status;
    card.dataset.title = title;
    card.dataset.division = division;
    card.dataset.date = date;
    card.dataset.time = time;
    card.dataset.desc = desc;
    card.dataset.tags = tags;
    card.dataset.obstacle = obstacle;
    card.dataset.file = 'jurnal_baru_lampiran.png (620 KB)';
    card.className = 'logbook-item bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4';

    const obstacleHtml = obstacle
      ? `<div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1 text-xs">
           <div class="font-bold text-slate-800"><i class="fa-solid fa-triangle-exclamation text-amber-600 mr-1"></i> KENDALA & SOLUSI TEKNIS:</div>
           <p class="text-slate-600">${obstacle}</p>
         </div>`
      : '';

    card.innerHTML = `
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-3">
        <div class="flex items-center gap-2 flex-wrap">
          <span class="${meta.cls}">${meta.label}</span>
          <span class="item-date text-xs font-bold text-slate-700"><i class="fa-regular fa-calendar mr-1"></i> ${date}</span>
          <span class="text-xs text-slate-400">•</span>
          <span class="item-time text-xs font-medium text-slate-500"><i class="fa-regular fa-clock mr-1"></i> ${time}</span>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <div class="lg:col-span-8 space-y-3">
          <h3 class="item-title text-base font-extrabold text-slate-900 leading-snug">${title}</h3>
          <div class="item-division flex items-center gap-1.5 text-xs text-sky-700 font-semibold">
            <i class="fa-solid fa-code-branch"></i> ${division}
          </div>
          <p class="item-desc text-xs text-slate-600 leading-relaxed">${desc}</p>
          <div class="item-tags flex flex-wrap gap-2 pt-1">${renderTagsHtml(tags)}</div>
          ${obstacleHtml}
        </div>

        <div class="lg:col-span-4 space-y-3 bg-slate-50/50 p-4 rounded-2xl border border-slate-200/60">
          <button type="button" onclick="openDetailModal(${newId})" class="w-full text-left rounded-xl overflow-hidden border border-slate-200 bg-white shadow-sm group">
            <div class="h-32 bg-slate-900 flex items-center justify-center text-slate-400 text-xs group-hover:bg-slate-800 transition">
              <i class="fa-solid fa-image text-2xl"></i>
            </div>
            <div class="p-2.5 flex items-center justify-between text-[11px] bg-white">
              <span class="font-bold text-slate-700 truncate">jurnal_baru_lampiran.png</span>
              <span class="text-slate-400 font-semibold shrink-0">620 KB</span>
            </div>
          </button>

          <div class="grid grid-cols-2 gap-2">
            <button type="button" onclick="openEditModal(${newId})" class="py-2 px-3 rounded-xl bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-bold transition flex items-center justify-center gap-1.5 shadow-sm">
              <i class="fa-solid fa-pen-to-square text-sky-600"></i> Sunting
            </button>
            <button type="button" onclick="openDetailModal(${newId})" class="py-2 px-3 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow-sm">
              <i class="fa-solid fa-eye text-sky-400"></i> Detail
            </button>
          </div>
        </div>
      </div>
    `;

    container.prepend(card);
    closeFormModal();
    updateStatsAndCounts();
    applyFilters(1);
    showToast('Jurnal harian baru berhasil ditambahkan.');
  }

  function openDetailModal(id) {
    const item = document.querySelector(`.logbook-item[data-id="${id}"]`);
    if (!item) return;

    const meta = getStatusMeta(item.dataset.status);
    const badge = document.getElementById('detailBadge');
    badge.className = meta.cls;
    badge.textContent = meta.label;

    document.getElementById('detailTitle').textContent = item.dataset.title || '';
    document.getElementById('detailMeta').textContent = `${item.dataset.date || ''} • ${item.dataset.time || ''}`;
    document.getElementById('detailDivision').textContent = item.dataset.division || '';
    document.getElementById('detailDesc').textContent = item.dataset.desc || '';
    document.getElementById('detailTags').innerHTML = renderTagsHtml(item.dataset.tags || '');
    document.getElementById('detailFile').textContent = item.dataset.file || 'lampiran.png';

    const obstacleWrap = document.getElementById('detailObstacleWrap');
    if (item.dataset.obstacle) {
      document.getElementById('detailObstacle').textContent = item.dataset.obstacle;
      obstacleWrap.classList.remove('hidden');
    } else {
      obstacleWrap.classList.add('hidden');
    }

    document.getElementById('detailModal').classList.remove('hidden');
  }

  function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
  }

  document.addEventListener('DOMContentLoaded', () => {
    updateStatsAndCounts();
    applyFilters(1);
  });
</script>
@endpush