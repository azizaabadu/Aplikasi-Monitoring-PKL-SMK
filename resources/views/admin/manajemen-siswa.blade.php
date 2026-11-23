<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Alokasi &amp; Penempatan Siswa PKL - Portal PKL.ID</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .content-scroll::-webkit-scrollbar {
      width: 7px;
      height: 7px;
    }
    .content-scroll::-webkit-scrollbar-track {
      background: #f1f5f9;
    }
    .content-scroll::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 9999px;
    }
    .content-scroll::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }
  </style>
</head>
<body class="bg-[#F4F7FB] text-slate-800 antialiased overflow-hidden">

  <div class="flex h-screen w-full overflow-hidden">

    <!-- SIDEBAR ADMIN: Tetap diam & memenuhi tinggi layar -->
    <aside class="w-64 shrink-0 bg-[#13294B] text-white flex flex-col justify-between h-screen overflow-y-auto select-none border-r border-[#1E3A66]">
      <div>
        <!-- Brand Header -->
        <div class="px-5 py-4 border-b border-white/10 flex items-center gap-3">
          <div class="w-9 h-9 rounded-lg bg-[#1D4ED8] flex items-center justify-center font-black text-sm tracking-tight shadow-inner">
            PK
          </div>
          <div>
            <div class="text-base font-black tracking-tight leading-none">PKL.ID</div>
            <div class="text-[9px] font-bold tracking-[0.16em] text-sky-300/90 uppercase mt-1 leading-none">
              PLATFORM VOKASI
            </div>
          </div>
        </div>

        <!-- Navigasi Sistem -->
        <nav class="p-3 space-y-1 text-[11px] font-semibold">
          <div class="px-3 py-2 text-[9px] font-extrabold uppercase tracking-[0.14em] text-slate-400">
            NAVIGASI SISTEM
          </div>

          <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-white/5 hover:text-white transition">
            <i class="fa-solid fa-table-cells-large w-4 text-center text-slate-400"></i>
            <span>Beranda / Dashboard</span>
          </a>

          <a href="{{ route('admin.dudi-mou') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-white/5 hover:text-white transition">
            <i class="fa-solid fa-building w-4 text-center text-slate-400"></i>
            <span>Kemitraan DUDI &amp; MoU</span>
          </a>

          <a href="{{ route('admin.monitoring-pembimbing') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-white/5 hover:text-white transition">
            <i class="fa-solid fa-clipboard-check w-4 text-center text-slate-400"></i>
            <span>Monitoring &amp; Pembimbing</span>
          </a>

          <!-- Menu Aktif: Manajemen Siswa & Penempatan -->
          <a href="{{ route('admin.manajemen-siswa') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg bg-[#1E3F73] text-white font-bold shadow-sm">
            <i class="fa-solid fa-user-graduate w-4 text-center text-sky-300"></i>
            <span>Manajemen Siswa &amp; Penempatan</span>
          </a>

          <a href="{{ route('admin.rekapitulasi-nilai') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-white/5 hover:text-white transition">
            <i class="fa-solid fa-award w-4 text-center text-slate-400"></i>
            <span>Rekapitulasi Nilai &amp; Sertifikat</span>
          </a>

          <a href="{{ route('admin.pengaturan-akun') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-white/5 hover:text-white transition">
            <i class="fa-solid fa-gear w-4 text-center text-slate-400"></i>
            <span>Pengaturan Sekolah &amp; Akun</span>
          </a>
        </nav>
      </div>

      <!-- Bagian Bawah Sidebar -->
      <div class="p-3 space-y-2 border-t border-white/10">
        <div class="px-3 py-2.5 rounded-lg bg-[#1B3661] border border-white/10 flex items-center gap-2.5">
          <div class="w-7 h-7 rounded-md bg-sky-500/20 text-sky-300 flex items-center justify-center text-xs shrink-0">
            <i class="fa-solid fa-graduation-cap"></i>
          </div>
          <div class="min-w-0">
            <div class="text-[11px] font-bold text-white truncate">SMK Negeri Teladan</div>
            <div class="text-[9px] text-slate-300/80 truncate">NPSN: 10403982 &bull; Terakreditasi</div>
          </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full px-3 py-2 rounded-lg bg-[#3B1D38] hover:bg-[#4E244A] border border-rose-400/20 text-rose-200 text-[11px] font-bold flex items-center justify-center gap-2 transition">
            <i class="fa-solid fa-arrow-right-from-bracket text-xs"></i>
            <span>Keluar Sistem</span>
          </button>
        </form>
      </div>
    </aside>

    <!-- AREA KANAN: Topbar + Konten Utama (Hanya bagian ini yang bergerak/scroll) -->
    <div class="flex-1 h-screen overflow-y-auto content-scroll bg-[#F4F7FB] pb-12">

      <!-- TOPBAR ADMIN -->
      <header class="sticky top-0 z-20 bg-white/95 backdrop-blur border-b border-slate-200/90 px-5 py-2.5 flex items-center justify-between gap-4">
        <div class="relative w-full max-w-md">
          <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
          <input
            type="text"
            placeholder="Cari NISN, nama siswa, ID mitra..."
            class="w-full pl-9 pr-4 py-1.5 bg-slate-100/80 hover:bg-slate-100 focus:bg-white border border-slate-200 rounded-lg text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition"
          >
        </div>

        <div class="flex items-center gap-2.5 shrink-0">
          <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200/80 text-emerald-700 text-[10px] font-extrabold tracking-wide">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            DAPODIK SINKRON
          </span>

          <div class="hidden md:inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-white border border-slate-200 text-slate-700 text-[10px] font-bold">
            <i class="fa-regular fa-calendar text-slate-400"></i>
            <span>T.A. 2024/2025 Genap</span>
            <i class="fa-solid fa-chevron-down text-[9px] text-slate-400 ml-0.5"></i>
          </div>

          <button type="button" onclick="alert('Tidak ada notifikasi baru.')" class="relative w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-600 transition">
            <i class="fa-regular fa-bell text-xs"></i>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-rose-500"></span>
          </button>

          <div class="flex items-center gap-2.5 pl-2.5 border-l border-slate-200">
            <div class="text-right hidden lg:block leading-tight">
              <div class="text-[11px] font-extrabold text-slate-800">{{ auth()->user()->name ?? 'Drs. H. Mulyadi, M.T.' }}</div>
              <div class="text-[9px] font-semibold text-slate-400">Koordinator Hubin &amp; Kurikulum</div>
            </div>
            <div class="w-8 h-8 rounded-full bg-[#13294B] text-white text-[11px] font-extrabold flex items-center justify-center">
              HM
            </div>
          </div>
        </div>
      </header>

      <!-- KONTEN UTAMA -->
      <main class="p-5 sm:p-6 space-y-5 max-w-[1440px] mx-auto">

        <!-- 1. BREADCRUMB & STATUS DAPODIK -->
        <div class="flex flex-wrap items-center justify-between gap-3">
          <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
              <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
              <span>Beranda</span>
            </a>
            <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
            <span class="font-bold text-slate-800">Manajemen Siswa &amp; Penempatan</span>
          </div>

          <div class="flex flex-wrap items-center gap-2.5 text-[11px]">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
              Dapodik v2024.e Terhubung
            </span>
            <span class="text-slate-400">|</span>
            <span class="text-slate-500 font-medium">Pembaruan: Hari ini, 08:30 WIB</span>
          </div>
        </div>

        <!-- 2. HEADER HALAMAN & TOMBOL AKSI -->
        <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
          <div class="flex items-start gap-3.5 max-w-2xl">
            <span class="w-9 h-9 rounded-xl bg-slate-100 text-[#13294B] flex items-center justify-center text-sm shrink-0 mt-0.5">
              <i class="fa-solid fa-id-card-clip"></i>
            </span>
            <div>
              <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
                Manajemen Alokasi &amp; Penempatan Siswa PKL
              </h1>
              <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">
                Kelola pemetaan 420 siswa tingkat akhir ke 64 mitra DUDI terakreditasi, sinkronisasi rombel Dapodik, dan penerbitan Surat Perintah Tugas (SPT) penempatan secara otomatis.
              </p>
            </div>
          </div>

          <div class="flex flex-wrap items-center gap-2.5 shrink-0">
            <button type="button" onclick="alert('Menarik data rombel & siswa terbaru dari Dapodik...')" class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center gap-1.5 transition">
              <i class="fa-solid fa-rotate text-slate-500 text-xs"></i>
              <span>Tarik Data Dapodik</span>
            </button>

            <button type="button" onclick="alert('Mengunduh rekap alokasi & penempatan siswa PKL (.XLSX)...')" class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center gap-1.5 transition">
              <i class="fa-solid fa-file-excel text-emerald-600 text-xs"></i>
              <span>Unduh Rekap Excel</span>
            </button>

            <button type="button" onclick="alert('Membuka wizard plotting penempatan siswa masal...')" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center gap-1.5 shadow-xs transition">
              <i class="fa-solid fa-user-group text-xs"></i>
              <span>+ Plotting Siswa Masal</span>
            </button>
          </div>
        </div>

        <!-- 3. 4 KARTU KPI RINGKASAN -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <!-- KPI 1 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-500 leading-snug">Total Siswa Tingkat Akhir</span>
              <span class="w-9 h-9 rounded-xl bg-slate-100 text-[#13294B] flex items-center justify-center text-sm shrink-0">
                <i class="fa-solid fa-graduation-cap"></i>
              </span>
            </div>
            <div class="text-3xl font-black text-slate-900 tracking-tight">420</div>
            <div class="flex items-center gap-2 text-[11px]">
              <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-extrabold text-[10px]">100% Terdata</span>
              <span class="text-slate-400">4 Jurusan: PPLG, TJKT, DKV, Animasi</span>
            </div>
          </div>

          <!-- KPI 2 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-500 leading-snug">Sudah Ditempatkan</span>
              <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm shrink-0">
                <i class="fa-regular fa-id-badge"></i>
              </span>
            </div>
            <div class="text-3xl font-black text-emerald-600 tracking-tight">398</div>
            <div class="flex items-center gap-2 text-[11px]">
              <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-extrabold text-[10px]">94.8% Kuota</span>
              <span class="text-slate-400">Ter konfirmasi MoU DUDI</span>
            </div>
          </div>

          <!-- KPI 3 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-500 leading-snug">Menunggu Penempatan</span>
              <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-sm shrink-0">
                <i class="fa-regular fa-clipboard"></i>
              </span>
            </div>
            <div class="text-3xl font-black text-amber-500 tracking-tight">22</div>
            <div class="flex flex-wrap items-center justify-between gap-1 text-[10px]">
              <div class="flex items-center gap-1 font-bold">
                <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700">PPLG: 8</span>
                <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700">TJKT: 6</span>
                <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700">DKV: 8</span>
              </div>
              <span class="text-slate-400">Matching DUDI</span>
            </div>
          </div>

          <!-- KPI 4 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-500 leading-snug">Penerbitan SPT &amp; MoU</span>
              <span class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm shrink-0">
                <i class="fa-solid fa-file-shield"></i>
              </span>
            </div>
            <div class="flex items-baseline gap-1.5">
              <span class="text-3xl font-black text-slate-900 tracking-tight">398</span>
              <span class="text-xs font-semibold text-slate-400">/ 420</span>
            </div>
            <div class="space-y-1.5">
              <div class="flex items-center justify-between text-[10px]">
                <span class="px-2 py-0.5 rounded bg-sky-50 text-sky-700 font-extrabold">Legalitas Otomatis</span>
              </div>
              <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                <div class="h-full rounded-full bg-teal-600" style="width: 94.8%"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- 4. FILTER PENCARIAN & KATEGORI -->
        <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-xs space-y-3">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-3">
            <div class="lg:col-span-5 relative">
              <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
              <input
                type="text"
                placeholder="Cari nama siswa, NISN, atau mitra DI..."
                class="w-full pl-9 pr-4 py-2 bg-slate-50 focus:bg-white border border-slate-200 rounded-xl text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:border-sky-500 transition"
              >
            </div>

            <div class="lg:col-span-4">
              <select class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-sky-500">
                <option>Semua Jurusan</option>
                <option>PPLG</option>
                <option>TJKT</option>
                <option>DKV</option>
                <option>Animasi 3D</option>
              </select>
            </div>

            <div class="lg:col-span-3">
              <select class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-sky-500">
                <option>Semua Status</option>
                <option>Sudah Ditempatkan</option>
                <option>Menunggu Penempatan</option>
              </select>
            </div>
          </div>

          <div class="flex flex-wrap items-center gap-2.5">
            <select class="px-3 py-1.5 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-sky-500">
              <option>Semua Wilayah DUDI</option>
              <option>Nongsa Digital Park</option>
              <option>Batam Center</option>
              <option>Batu Ampar</option>
              <option>Mukakuning</option>
            </select>

            <button type="button" onclick="alert('Filter direset ke kondisi awal.')" class="px-3 py-1.5 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-600 flex items-center gap-1.5 transition">
              <i class="fa-solid fa-rotate-left text-[10px] text-slate-400"></i>
              <span>Reset</span>
            </button>
          </div>
        </div>

        <!-- 5. GRID KONTEN UTAMA (KIRI 8 KOLOM: TABEL ALOKASI | KANAN 4 KOLOM: KUOTA, JALUR CEPAT, PETA) -->
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-5 items-start">

          <!-- KOLOM KIRI (8/12): TABEL SISWA -->
          <section class="xl:col-span-8 bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
            <!-- Toolbar Aksi Masal -->
            <div class="px-4 py-3 border-b border-slate-100 flex flex-wrap items-center justify-between gap-3">
              <label class="inline-flex items-center gap-2.5 text-xs font-bold text-slate-700 cursor-pointer select-none">
                <input type="checkbox" class="w-4 h-4 rounded border-slate-300 text-[#13294B] focus:ring-sky-500">
                <span>Pilih Semua Siswa</span>
              </label>

              <div class="flex flex-wrap items-center gap-2">
                <button type="button" onclick="alert('Mencetak SPT untuk siswa terpilih...')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-bold text-slate-700 flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-print text-slate-500 text-[10px]"></i>
                  <span>Cetak SPT Terpilih</span>
                </button>
                <button type="button" onclick="alert('Membuka dialog pindah mitra kolektif...')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-bold text-slate-700 flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-right-left text-slate-500 text-[10px]"></i>
                  <span>Pindah Mitra Kolektif</span>
                </button>
              </div>
            </div>

            <div class="overflow-x-auto">
              <table class="w-full text-left border-collapse text-xs">
                <thead>
                  <tr class="bg-slate-50/90 border-b border-slate-200/80 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
                    <th class="py-3 pl-4 pr-2 w-8">#</th>
                    <th class="py-3 px-3">SISWA &amp; IDENTITAS</th>
                    <th class="py-3 px-3">KOMPETENSI ROMBEL</th>
                    <th class="py-3 px-3">MITRA INDUSTRI (DUDI)</th>
                    <th class="py-3 px-3">GURU PE...</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">

                  <!-- Siswa 1: Rizky Pratama -->
                  <tr class="hover:bg-slate-50/70 align-top">
                    <td class="py-3.5 pl-4 pr-2">
                      <input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B] mt-1">
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="flex items-start gap-2.5">
                        <img src="https://ui-avatars.com/api/?name=Rizky+Pratama&background=E0F2FE&color=0369A1&bold=true" alt="Rizky Pratama" class="w-8 h-8 rounded-full object-cover shrink-0">
                        <div>
                          <div class="font-extrabold text-slate-900">Rizky Pratama</div>
                          <div class="text-[10px] text-slate-400 mt-0.5">NISN: 0064829174 &bull; XII PPLG 1</div>
                        </div>
                      </div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-extrabold text-slate-800">PPLG</div>
                      <div class="text-[10px] text-slate-400 mt-0.5">Software Eng. &amp; Cloud</div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-extrabold text-slate-800">PT Solusi Teknologi Nusantara</div>
                      <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1">
                        <i class="fa-solid fa-location-dot text-[9px]"></i>
                        <span>Nongsa Digital Park</span>
                      </div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-bold text-slate-800 truncate max-w-[115px]">Dra. Sri W...</div>
                      <div class="text-[10px] text-slate-400 truncate max-w-[115px] mt-0.5">DUDI: Ah... S.Kom</div>
                    </td>
                  </tr>

                  <!-- Siswa 2: Siti Nurhaliza -->
                  <tr class="hover:bg-slate-50/70 align-top">
                    <td class="py-3.5 pl-4 pr-2">
                      <input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B] mt-1">
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="flex items-start gap-2.5">
                        <img src="https://ui-avatars.com/api/?name=Siti+Nurhaliza&background=DCFCE7&color=15803D&bold=true" alt="Siti Nurhaliza" class="w-8 h-8 rounded-full object-cover shrink-0">
                        <div>
                          <div class="font-extrabold text-slate-900">Siti Nurhaliza</div>
                          <div class="text-[10px] text-slate-400 mt-0.5">NISN: 0061928410 &bull; XII PPLG 2</div>
                        </div>
                      </div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-extrabold text-slate-800">PPLG</div>
                      <div class="text-[10px] text-slate-400 mt-0.5">Mobile &amp; Web Dev</div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-extrabold text-slate-800">Telkom Corp Digital Lab</div>
                      <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1">
                        <i class="fa-solid fa-location-dot text-[9px]"></i>
                        <span>Batam Center</span>
                      </div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-bold text-slate-800 truncate max-w-[115px]">Dra. Sri W...</div>
                      <div class="text-[10px] text-slate-400 truncate max-w-[115px] mt-0.5">DUDI: He...</div>
                    </td>
                  </tr>

                  <!-- Siswa 3: Bagus Setiawan -->
                  <tr class="hover:bg-slate-50/70 align-top">
                    <td class="py-3.5 pl-4 pr-2">
                      <input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B] mt-1">
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="flex items-start gap-2.5">
                        <img src="https://ui-avatars.com/api/?name=Bagus+Setiawan&background=E0E7FF&color=3730A3&bold=true" alt="Bagus Setiawan" class="w-8 h-8 rounded-full object-cover shrink-0">
                        <div>
                          <div class="font-extrabold text-slate-900">Bagus Setiawan</div>
                          <div class="text-[10px] text-slate-400 mt-0.5">NISN: 0067241903 &bull; XII PPLG 2</div>
                        </div>
                      </div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-extrabold text-slate-800">PPLG</div>
                      <div class="text-[10px] text-slate-400 mt-0.5">Database &amp; Backend</div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-extrabold text-slate-800">PT Cyber Media Utama</div>
                      <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1">
                        <i class="fa-solid fa-location-dot text-[9px]"></i>
                        <span>Batu Ampar</span>
                      </div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-bold text-slate-800 truncate max-w-[115px]">Drs. Budi ...</div>
                      <div class="text-[10px] text-slate-400 truncate max-w-[115px] mt-0.5">DUDI: Bu...</div>
                    </td>
                  </tr>

                  <!-- Siswa 4: Fadhil Rahman -->
                  <tr class="hover:bg-slate-50/70 align-top">
                    <td class="py-3.5 pl-4 pr-2">
                      <input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B] mt-1">
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="flex items-start gap-2.5">
                        <img src="https://ui-avatars.com/api/?name=Fadhil+Rahman&background=CCFBF1&color=0F766E&bold=true" alt="Fadhil Rahman" class="w-8 h-8 rounded-full object-cover shrink-0">
                        <div>
                          <div class="font-extrabold text-slate-900">Fadhil Rahman</div>
                          <div class="text-[10px] text-slate-400 mt-0.5">NISN: 0065219034 &bull; XII TJKT 1</div>
                        </div>
                      </div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-extrabold text-slate-800">TJKT</div>
                      <div class="text-[10px] text-slate-400 mt-0.5">Fiber Optic &amp; Infra</div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-extrabold text-slate-800">PT Citra Tubindo Tbk</div>
                      <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1">
                        <i class="fa-solid fa-location-dot text-[9px]"></i>
                        <span>Batu Ampar</span>
                      </div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-bold text-slate-800 truncate max-w-[115px]">Dra. Sri W...</div>
                      <div class="text-[10px] text-slate-400 truncate max-w-[115px] mt-0.5">DUDI: Ba...</div>
                    </td>
                  </tr>

                  <!-- Siswa 5: Maya Anggraini -->
                  <tr class="hover:bg-slate-50/70 align-top">
                    <td class="py-3.5 pl-4 pr-2">
                      <input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B] mt-1">
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="flex items-start gap-2.5">
                        <img src="https://ui-avatars.com/api/?name=Maya+Anggraini&background=FEF3C7&color=B45309&bold=true" alt="Maya Anggraini" class="w-8 h-8 rounded-full object-cover shrink-0">
                        <div>
                          <div class="font-extrabold text-slate-900">Maya Anggraini</div>
                          <div class="text-[10px] text-slate-400 mt-0.5">NISN: 0068112045 &bull; XII DKV 2</div>
                        </div>
                      </div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-extrabold text-slate-800">DKV</div>
                      <div class="text-[10px] text-slate-400 mt-0.5">Branding &amp; Ilustrasi</div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-extrabold text-slate-800">Studio Animasi Kreatif</div>
                      <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1">
                        <i class="fa-solid fa-location-dot text-[9px]"></i>
                        <span>Nongsa Digital Park</span>
                      </div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-bold text-slate-800 truncate max-w-[115px]">Dra. Sri W...</div>
                      <div class="text-[10px] text-slate-400 truncate max-w-[115px] mt-0.5">DUDI: Ria...</div>
                    </td>
                  </tr>

                  <!-- Siswa 6: Dimas Pratama -->
                  <tr class="hover:bg-slate-50/70 align-top">
                    <td class="py-3.5 pl-4 pr-2">
                      <input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B] mt-1">
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="flex items-start gap-2.5">
                        <img src="https://ui-avatars.com/api/?name=Dimas+Pratama&background=FCE7F3&color=BE185D&bold=true" alt="Dimas Pratama" class="w-8 h-8 rounded-full object-cover shrink-0">
                        <div>
                          <div class="font-extrabold text-slate-900">Dimas Pratama</div>
                          <div class="text-[10px] text-slate-400 mt-0.5">NISN: 0069018442 &bull; XII PPLG 1</div>
                        </div>
                      </div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-extrabold text-slate-800">PPLG</div>
                      <div class="text-[10px] text-slate-400 mt-0.5">DevOps &amp; QA Testing</div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-extrabold text-slate-800">PT Nusa Inovasi</div>
                      <div class="text-[10px] font-bold text-amber-600 mt-0.5 flex items-center gap-1">
                        <i class="fa-solid fa-triangle-exclamation text-[9px]"></i>
                        <span>Muka Kuning (+18 Km)</span>
                      </div>
                    </td>
                    <td class="py-3.5 px-3">
                      <div class="font-bold text-slate-800 truncate max-w-[115px]">Dra. Sri W...</div>
                      <div class="text-[10px] text-slate-400 truncate max-w-[115px] mt-0.5">DUDI: He...</div>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>

            <!-- Footer Pagination -->
            <div class="px-4 py-3.5 bg-slate-50/70 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3 text-[11px]">
              <span class="text-slate-500">
                Menampilkan <strong class="text-slate-800">1 - 6</strong> dari <strong class="text-slate-800">420</strong> siswa terdaftar
              </span>
              <div class="flex items-center gap-1">
                <button type="button" class="w-7 h-7 rounded-lg bg-white border border-slate-200 text-slate-400 flex items-center justify-center">
                  <i class="fa-solid fa-chevron-left text-[9px]"></i>
                </button>
                <button type="button" class="w-7 h-7 rounded-lg bg-[#13294B] text-white font-extrabold">1</button>
                <button type="button" class="w-7 h-7 rounded-lg bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-bold">2</button>
                <button type="button" class="w-7 h-7 rounded-lg bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-bold">3</button>
                <span class="px-1.5 text-slate-400">...</span>
                <button type="button" class="px-2.5 h-7 rounded-lg bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-bold">70</button>
                <button type="button" class="w-7 h-7 rounded-lg bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 flex items-center justify-center">
                  <i class="fa-solid fa-chevron-right text-[9px]"></i>
                </button>
              </div>
            </div>
          </section>

          <!-- KOLOM KANAN (4/12): KUOTA PER JURUSAN, JALUR CEPAT HUBIN, SEBARAN MITRA DUDI -->
          <div class="xl:col-span-4 space-y-5">

            <!-- Kuota per Jurusan -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
              <div class="flex items-start justify-between gap-2">
                <div class="flex items-center gap-2">
                  <i class="fa-solid fa-chart-pie text-[#13294B] text-sm"></i>
                  <h2 class="text-sm font-black text-slate-900">Kuota per Jurusan</h2>
                </div>
                <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold shrink-0">
                  Target 100%
                </span>
              </div>

              <p class="text-[11px] text-slate-500 leading-relaxed">
                Realisasi plotting kuota industri mitra untuk masa magang 6 bulan semester genap.
              </p>

              <div class="space-y-3.5 text-xs">
                <!-- PPLG -->
                <div class="space-y-1">
                  <div class="flex items-center justify-between font-extrabold">
                    <span class="text-slate-800">PPLG</span>
                    <span class="text-slate-900">120 / 120 (100%)</span>
                  </div>
                  <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-[#13294B]" style="width: 100%"></div>
                  </div>
                  <div class="text-[10px] text-slate-400">Semua siswa siap terjun ke 18 mitra software</div>
                </div>

                <!-- TJKT -->
                <div class="space-y-1">
                  <div class="flex items-center justify-between font-extrabold">
                    <span class="text-slate-800">TJKT</span>
                    <span class="text-slate-900">104 / 110 (94.5%)</span>
                  </div>
                  <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-teal-600" style="width: 94.5%"></div>
                  </div>
                  <div class="text-[10px] text-slate-400">Sisa 6 siswa proses verifikasi data center</div>
                </div>

                <!-- DKV -->
                <div class="space-y-1">
                  <div class="flex items-center justify-between font-extrabold">
                    <span class="text-slate-800">DKV</span>
                    <span class="text-slate-900">92 / 100 (92%)</span>
                  </div>
                  <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-[#13294B]" style="width: 92%"></div>
                  </div>
                  <div class="text-[10px] text-slate-400">Sisa 8 siswa tahap kurasi portofolio</div>
                </div>

                <!-- Animasi 3D -->
                <div class="space-y-1">
                  <div class="flex items-center justify-between font-extrabold">
                    <span class="text-slate-800">Animasi 3D</span>
                    <span class="text-slate-900">82 / 90 (91.1%)</span>
                  </div>
                  <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-amber-500" style="width: 91.1%"></div>
                  </div>
                  <div class="text-[10px] text-slate-400">Sisa 8 siswa jadwal uji karya Kinema</div>
                </div>
              </div>

              <!-- Ringkasan Total Terakomodasi -->
              <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                <div>
                  <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">TOTAL TERAKOMODASI</div>
                  <div class="text-base font-black text-slate-900 mt-0.5">398 / 420</div>
                </div>
                <div class="w-11 h-11 rounded-full border-4 border-emerald-500 flex items-center justify-center text-[10px] font-black text-slate-800">
                  95%
                </div>
              </div>
            </section>

            <!-- Jalur Cepat Hubin -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3.5">
              <div>
                <h2 class="text-sm font-black text-slate-900 flex items-center gap-2">
                  <i class="fa-solid fa-bolt text-sky-600"></i>
                  <span>Jalur Cepat Hubin</span>
                </h2>
                <p class="text-[11px] text-slate-500 mt-0.5">
                  Tindakan masal administratif otomatis terintegrasi gateway sekolah.
                </p>
              </div>

              <div class="space-y-2.5 text-xs">
                <button type="button" onclick="alert('Mengirim broadcast WhatsApp SPT ke nomor siswa & wali...')" class="w-full p-3 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/80 flex items-center justify-between gap-3 text-left transition">
                  <div class="flex items-center gap-3 min-w-0">
                    <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                      <i class="fa-brands fa-whatsapp text-sm"></i>
                    </span>
                    <div class="min-w-0">
                      <div class="font-extrabold text-slate-800 truncate">Broadcast WhatsApp</div>
                      <div class="text-[10px] text-slate-400 truncate">Kirim SPT ke nomor siswa/wali</div>
                    </div>
                  </div>
                  <i class="fa-solid fa-arrow-right text-[10px] text-slate-400 shrink-0"></i>
                </button>

                <button type="button" onclick="alert('Mengekspor data penempatan format Kemendikbud...')" class="w-full p-3 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/80 flex items-center justify-between gap-3 text-left transition">
                  <div class="flex items-center gap-3 min-w-0">
                    <span class="w-8 h-8 rounded-lg bg-sky-100 text-sky-700 flex items-center justify-center shrink-0">
                      <i class="fa-solid fa-file-export text-xs"></i>
                    </span>
                    <div class="min-w-0">
                      <div class="font-extrabold text-slate-800 truncate">Ekspor Format Kemendikbud</div>
                      <div class="text-[10px] text-slate-400 truncate">Format SPT Bimbingan PKL resmi</div>
                    </div>
                  </div>
                  <i class="fa-solid fa-arrow-right text-[10px] text-slate-400 shrink-0"></i>
                </button>

                <button type="button" onclick="alert('Mengirim berkas penempatan ke 64 mitra DUDI...')" class="w-full p-3 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/80 flex items-center justify-between gap-3 text-left transition">
                  <div class="flex items-center gap-3 min-w-0">
                    <span class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-700 flex items-center justify-center shrink-0">
                      <i class="fa-regular fa-paper-plane text-xs"></i>
                    </span>
                    <div class="min-w-0">
                      <div class="font-extrabold text-slate-800 truncate">Kirim Berkas ke DUDI</div>
                      <div class="text-[10px] text-slate-400 truncate">64 Rekap mitra industri</div>
                    </div>
                  </div>
                  <i class="fa-solid fa-arrow-right text-[10px] text-slate-400 shrink-0"></i>
                </button>
              </div>
            </section>

            <!-- Sebaran Mitra DUDI -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3.5">
              <div class="flex items-start justify-between gap-2">
                <div class="flex items-center gap-2">
                  <i class="fa-regular fa-map text-[#13294B] text-sm"></i>
                  <h2 class="text-sm font-black text-slate-900">Sebaran Mitra DUDI</h2>
                </div>
                <span class="text-[10px] font-semibold text-slate-400 text-right">Kota Batam &amp; Riau</span>
              </div>

              <div class="relative rounded-xl overflow-hidden border border-slate-200 bg-emerald-50/70 h-32 p-3 flex flex-col justify-between">
                <!-- Aksen peta sederhana -->
                <div class="flex items-center justify-between text-[9px] font-bold text-slate-500">
                  <span class="px-1.5 py-0.5 rounded bg-white/80">Nongsa Digital Park</span>
                  <span class="px-1.5 py-0.5 rounded bg-white/80">Batam Center</span>
                </div>
                <div class="flex items-center justify-center gap-3 text-emerald-700/70 text-xs">
                  <i class="fa-solid fa-location-dot text-rose-500"></i>
                  <i class="fa-solid fa-location-dot text-sky-600"></i>
                  <i class="fa-solid fa-location-dot text-teal-600"></i>
                </div>
                <div class="flex items-center justify-between bg-white/95 backdrop-blur rounded-lg px-3 py-1.5 border border-slate-200/80 shadow-2xs">
                  <span class="text-[11px] font-extrabold text-slate-800 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    64 Titik Industri Aktif
                  </span>
                  <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-slate-400"></i>
                </div>
              </div>

              <div class="grid grid-cols-3 gap-2 text-center pt-1">
                <div class="p-2 rounded-xl bg-slate-50 border border-slate-200/70">
                  <div class="text-[10px] font-extrabold text-slate-800">NDP: 22</div>
                  <div class="text-[9px] text-slate-400">Mitra</div>
                </div>
                <div class="p-2 rounded-xl bg-slate-50 border border-slate-200/70">
                  <div class="text-[10px] font-extrabold text-slate-800">Batu Ampar: 19</div>
                  <div class="text-[9px] text-slate-400">Mitra</div>
                </div>
                <div class="p-2 rounded-xl bg-slate-50 border border-slate-200/70">
                  <div class="text-[10px] font-extrabold text-slate-800">Batam Center: 16</div>
                  <div class="text-[9px] text-slate-400">Mitra</div>
                </div>
              </div>
            </section>

          </div>
        </div>

      </main>

      <!-- TOAST FLOATING BAWAH KANAN -->
      <div class="fixed bottom-4 right-5 z-30 bg-[#13294B] text-white px-4 py-2.5 rounded-xl shadow-lg border border-white/10 flex items-center gap-2 text-[11px] font-bold">
        <i class="fa-regular fa-circle-check text-emerald-400 text-xs"></i>
        <span>Data Dapodik berhasil disinkronkan.</span>
      </div>

    </div>

  </div>

</body>
</html>