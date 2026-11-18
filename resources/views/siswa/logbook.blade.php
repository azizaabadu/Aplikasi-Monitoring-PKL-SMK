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
    <div class="flex items-center gap-2.5">
      <button onclick="alert('Mengekspor buku logbook format PDF...')" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-file-arrow-down text-slate-500"></i>
        Ekspor Buku Logbook (PDF)
      </button>
      <button onclick="alert('Membuka form tulis jurnal harian...')" class="px-4 py-2.5 bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-plus text-sky-400"></i>
         Tulis Jurnal Hari Ini
      </button>
    </div>
  </div>

  <!-- 2. KARTU STATISTIK RINGKASAN LOGBOOK -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
    
    <!-- Kotak Kiri: Capaian Durasi PKL (7 Kolom) -->
    <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4 flex flex-col justify-between">
      <div class="flex items-center justify-between">
        <span class="px-2.5 py-1 rounded-lg bg-amber-50 text-amber-800 border border-amber-200 text-[11px] font-extrabold">
          <i class="fa-regular fa-clock mr-1"></i> Batas Pengisian Hari Ini: 18:00 WIB
        </span>
        <i class="fa-solid fa-shield-halved text-sky-600 text-lg"></i>
      </div>

      <div class="flex items-baseline gap-2">
        <span class="text-3xl sm:text-4xl font-black text-slate-900">59</span>
        <span class="text-sm font-semibold text-slate-500">/ 60 Hari Aktif</span>
      </div>

      <div class="space-y-1.5">
        <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
          <div class="bg-sky-600 h-full rounded-full" style="width: 98.3%"></div>
        </div>
        <div class="flex items-center justify-between text-[11px] text-slate-500 font-medium">
          <span>Tersisa 1 Hari Menuju Penutupan Praktik</span>
          <span class="text-emerald-600 font-extrabold">98.3% Selesai</span>
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
        <div class="text-3xl font-black text-slate-900">57</div>
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
        <div class="text-3xl font-black text-slate-900">2</div>
        <div class="text-[11px] text-slate-500 font-medium mt-0.5">Sedang Ditinjau</div>
      </div>
      <div class="pt-2 border-t border-slate-100 flex items-center gap-1.5 text-[11px] font-bold text-sky-700">
        <i class="fa-solid fa-user-clock"></i> Guru Pembimbing
      </div>
    </div>

  </div>

  <!-- 3. FILTER TAB & PENCARIAN -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
    <div class="flex flex-wrap items-center gap-2 text-xs font-bold">
      <button class="px-4 py-2 rounded-xl bg-sky-600 text-white shadow-sm transition">Semua Jurnal (59)</button>
      <button class="px-4 py-2 rounded-xl text-slate-600 hover:bg-slate-100 transition">Disetujui (57)</button>
      <button class="px-4 py-2 rounded-xl text-slate-600 hover:bg-slate-100 transition">Menunggu Verifikasi (2)</button>
      <button class="px-4 py-2 rounded-xl text-slate-600 hover:bg-slate-100 transition">Perlu Revisi (0)</button>
    </div>
    <div class="relative w-full sm:w-72">
      <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
        <i class="fa-solid fa-magnifying-glass"></i>
      </span>
      <input type="text" placeholder="Filter kompetensi atau judul..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:border-sky-500" />
      <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
        <i class="fa-solid fa-sliders"></i>
      </span>
    </div>
  </div>

  <!-- 4. DAFTAR KARTU JURNAL HARIAN -->
  <div class="space-y-4">
    
    <!-- Item Jurnal 1 -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-3">
        <div class="flex items-center gap-2 flex-wrap">
          <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-extrabold">
            ● DISEPANJANG DUDI & SEKOLAH / DISEPANJANG DUDI
          </span>
          <span class="text-xs font-bold text-slate-700"><i class="fa-regular fa-calendar mr-1"></i> Kamis, 24 Oktober 2024</span>
          <span class="text-xs text-slate-400">•</span>
          <span class="text-xs font-medium text-slate-500"><i class="fa-regular fa-clock mr-1"></i> 08:00 - 17:00 WIB (8 Jam Kerja)</span>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <div class="lg:col-span-8 space-y-3">
          <h3 class="text-base font-extrabold text-slate-900 leading-snug">
            Implementasi REST API autentikasi JWT pada sistem inventaris internal
          </h3>
          <div class="flex items-center gap-1.5 text-xs text-sky-700 font-semibold">
            <i class="fa-solid fa-code-branch"></i> Divisi: Frontend Engineering & UI Development
          </div>
          <p class="text-xs text-slate-600 leading-relaxed">
            Membuat arsitektur middleware otentikasi menggunakan JSON Web Token (JWT) berbasis bearer token. Melakukan integrasi login refresh token, hashing password, serta pembagian peran hak akses (RBAC) antara Administrator dan Staf Gudang pada modul inventaris. Mengatasi edge case ketika token kedaluwarsa secara otomatis dengan Axios Interceptor.
          </p>

          <div class="flex flex-wrap gap-2 pt-1">
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">PPLG : REST API</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">React.js</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Tailwind CSS</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Git Versioning</span>
          </div>

          <!-- Komentar Mentor DUDI -->
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

        <!-- Kolom Kanan: Lampiran Gambar & Aksi -->
        <div class="lg:col-span-4 space-y-3 bg-slate-50/50 p-4 rounded-2xl border border-slate-200/60">
          <div class="rounded-xl overflow-hidden border border-slate-200 bg-white shadow-sm">
            <div class="h-32 bg-slate-900 flex items-center justify-center text-slate-400 text-xs">
              <i class="fa-solid fa-image text-2xl"></i>
            </div>
            <div class="p-2.5 flex items-center justify-between text-[11px] bg-white">
              <span class="font-bold text-slate-700 truncate">commit_hash_7ffc2a.png</span>
              <span class="text-slate-400 font-semibold shrink-0">+2 Lainnya</span>
            </div>
          </div>

          <div class="grid grid-cols-3 gap-2">
            <button onclick="alert('Melihat detail jurnal...')" class="col-span-2 py-2 px-3 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow-sm">
              <i class="fa-solid fa-eye text-sky-400"></i> Detail
            </button>
            <button onclick="alert('Mengunduh lampiran...')" class="py-2 px-3 rounded-xl bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-bold transition flex items-center justify-center shadow-sm">
              <i class="fa-solid fa-download"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Item Jurnal 2 -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-3">
        <div class="flex items-center gap-2 flex-wrap">
          <span class="px-3 py-1 rounded-full bg-amber-50 text-amber-800 border border-amber-200 text-[10px] font-extrabold">
            ● MENUNGGU GURU PEMBIMBING
          </span>
          <span class="text-xs font-bold text-slate-700"><i class="fa-regular fa-calendar mr-1"></i> Rabu, 23 Oktober 2024</span>
          <span class="text-xs text-slate-400">•</span>
          <span class="text-xs font-medium text-slate-500"><i class="fa-regular fa-clock mr-1"></i> 08:15 - 17:00 WIB (8 Jam Kerja)</span>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <div class="lg:col-span-8 space-y-3">
          <h3 class="text-base font-extrabold text-slate-900 leading-snug">
            Slicing UI dashboard analitik Figma ke Tailwind CSS dengan pendekatan Responsive Grid
          </h3>
          <div class="flex items-center gap-1.5 text-xs text-sky-700 font-semibold">
            <i class="fa-solid fa-code-branch"></i> Divisi: Frontend Engineering & UI Development
          </div>
          <p class="text-xs text-slate-600 leading-relaxed">
            Mengonversi mock-up desain sistem dari Figma ke komponen React Tailwind yang modular. Menyusun hierarki tipografi fluid, bento grid kartu metrik, serta state tombol interaktif. Melakukan optimasi layout pada resolusi layar tablet dan mobile.
          </p>

          <div class="flex flex-wrap gap-2 pt-1">
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Tailwind CSS</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Responsive Design</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Figma Slicing</span>
          </div>

          <div class="p-3 rounded-xl bg-amber-50/60 border border-amber-200 text-xs flex items-center justify-between text-amber-900">
            <div>
              <i class="fa-solid fa-circle-check text-emerald-600 mr-1.5"></i> Divalidasi Mentor Industri: <strong>Budi Prakoso, S.Kom</strong> (23 Okt, 18:20)
            </div>
            <span class="px-2 py-0.5 rounded bg-amber-200 text-amber-900 font-extrabold text-[10px]">Pending Approval Guru</span>
          </div>
        </div>

        <div class="lg:col-span-4 space-y-3 bg-slate-50/50 p-4 rounded-2xl border border-slate-200/60">
          <div class="rounded-xl overflow-hidden border border-slate-200 bg-white shadow-sm">
            <div class="h-32 bg-slate-900 flex items-center justify-center text-slate-400 text-xs">
              <i class="fa-solid fa-image text-2xl"></i>
            </div>
            <div class="p-2.5 flex items-center justify-between text-[11px] bg-white">
              <span class="font-bold text-slate-700 truncate">dashboard_mockup_v2.png</span>
              <span class="text-slate-400 font-semibold shrink-0">1.8 MB</span>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-2">
            <button onclick="alert('Menyunting jurnal...')" class="py-2 px-3 rounded-xl bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-bold transition flex items-center justify-center gap-1.5 shadow-sm">
              <i class="fa-solid fa-pen-to-square text-sky-600"></i> Sunting
            </button>
            <button onclick="alert('Mengunduh lampiran...')" class="py-2 px-3 rounded-xl bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-bold transition flex items-center justify-center shadow-sm">
              <i class="fa-solid fa-download"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Item Jurnal 3 -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-3">
        <div class="flex items-center gap-2 flex-wrap">
          <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-extrabold">
            ● DISEPANJANG DUDI & SEKOLAH
          </span>
          <span class="text-xs font-bold text-slate-700"><i class="fa-regular fa-calendar mr-1"></i> Selasa, 22 Oktober 2024</span>
          <span class="text-xs text-slate-400">•</span>
          <span class="text-xs font-medium text-slate-500"><i class="fa-regular fa-clock mr-1"></i> 08:00 - 17:00 WIB (8 Jam Kerja)</span>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <div class="lg:col-span-8 space-y-3">
          <h3 class="text-base font-extrabold text-slate-900 leading-snug">
            Database Schema Design & Migration PostgreSQL untuk Modul Logistik
          </h3>
          <div class="flex items-center gap-1.5 text-xs text-sky-700 font-semibold">
            <i class="fa-solid fa-code-branch"></i> Divisi: Backend Engineering & Database Ops
          </div>
          <p class="text-xs text-slate-600 leading-relaxed">
            Merancang entity relationship diagram (ERD) tabel barang, kategori suplai, dan mutasi keluar masuk. Menerapkan indexing pada kolom foreign key guna mempercepat query pencarian, serta menyusun seeding script awal menggunakan Prisma ORM.
          </p>

          <div class="flex flex-wrap gap-2 pt-1">
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">PostgreSQL</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Database Schema</span>
            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-bold">Prisma ORM</span>
          </div>

          <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1 text-xs">
            <div class="font-bold text-slate-800"><i class="fa-solid fa-triangle-exclamation text-amber-600 mr-1"></i> KENDALA & SOLUSI TEKNIS:</div>
            <p class="text-slate-600">Terjadi foreign-key constraint violation saat migrasi data logistik lama. Diselesaikan dengan membuat sequence migrasi berjenjang (parent tables terlebih dahulu).</p>
          </div>
        </div>

        <div class="lg:col-span-4 space-y-3 bg-slate-50/50 p-4 rounded-2xl border border-slate-200/60">
          <div class="rounded-xl overflow-hidden border border-slate-200 bg-white shadow-sm">
            <div class="h-32 bg-slate-900 flex items-center justify-center text-slate-400 text-xs">
              <i class="fa-solid fa-image text-2xl"></i>
            </div>
            <div class="p-2.5 flex items-center justify-between text-[11px] bg-white">
              <span class="font-bold text-slate-700 truncate">erd_schema_v1.png</span>
              <span class="text-slate-400 font-semibold shrink-0">840 KB</span>
            </div>
          </div>

          <div class="grid grid-cols-3 gap-2">
            <button onclick="alert('Melihat detail jurnal...')" class="col-span-2 py-2 px-3 rounded-xl bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow-sm">
              <i class="fa-solid fa-eye text-sky-400"></i> Detail
            </button>
            <button onclick="alert('Mengunduh lampiran...')" class="py-2 px-3 rounded-xl bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-bold transition flex items-center justify-center shadow-sm">
              <i class="fa-solid fa-download"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- 5. FOOTER PAGINATION -->
  <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4 text-xs text-slate-500 font-medium">
    <div>Menampilkan 1 - 3 dari 59 total catatan logbook</div>
    <div class="flex items-center gap-1">
      <button class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white text-slate-400 cursor-not-allowed"><i class="fa-solid fa-chevron-left"></i></button>
      <button class="px-3.5 py-1.5 rounded-lg border border-sky-500 bg-sky-600 text-white font-bold shadow-sm">1</button>
      <button class="px-3.5 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700">2</button>
      <button class="px-3.5 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700">3</button>
      <span class="px-2 text-slate-400">...</span>
      <button class="px-3.5 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700">20</button>
      <button class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700"><i class="fa-solid fa-chevron-right"></i></button>
    </div>
  </div>

</div>
@endsection