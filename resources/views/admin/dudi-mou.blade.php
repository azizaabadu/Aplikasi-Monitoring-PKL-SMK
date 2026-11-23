<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kemitraan DUDI &amp; MoU - Portal PKL.ID</title>
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

          <!-- Menu Aktif: Kemitraan DUDI & MoU -->
          <a href="{{ route('admin.dudi-mou') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg bg-[#1E3F73] text-white font-bold shadow-sm">
            <i class="fa-solid fa-building w-4 text-center text-sky-300"></i>
            <span>Kemitraan DUDI &amp; MoU</span>
          </a>

          <a href="{{ route('admin.monitoring-pembimbing') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-white/5 hover:text-white transition">
            <i class="fa-solid fa-clipboard-check w-4 text-center text-slate-400"></i>
            <span>Monitoring &amp; Pembimbing</span>
          </a>

          <a href="{{ route('admin.rekapitulasi-nilai') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-white/5 hover:text-white transition">
            <i class="fa-solid fa-user-graduate w-4 text-center text-slate-400"></i>
            <span>Manajemen Siswa &amp; Penempatan</span>
          </a>

          <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-white/5 hover:text-white transition">
            <i class="fa-solid fa-award w-4 text-center text-slate-400"></i>
            <span>Rekapitulasi Nilai &amp; Sertifikat</span>
          </a>

          <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-white/5 hover:text-white transition">
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
            <div class="text-[9px] text-slate-300/80 truncate">NPSN: 10403982 • Terakreditasi</div>
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
    <div class="flex-1 h-screen overflow-y-auto content-scroll bg-[#F4F7FB]">

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

        <!-- 1. BREADCRUMB & STATUS SINKRONISASI -->
        <div class="flex flex-wrap items-center justify-between gap-3">
          <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
              <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
              <span>Beranda</span>
            </a>
            <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
            <span class="font-bold text-slate-800">Kemitraan DUDI &amp; MoU</span>
          </div>

          <div class="flex flex-wrap items-center gap-2">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-slate-700 text-[10px] font-extrabold tracking-wide">
              <i class="fa-solid fa-shield-halved text-sky-600"></i>
              KEMITRAAN DUDI MANDATORI 2026
            </span>
            <button type="button" onclick="alert('Menyinkronkan data DUDI dengan pangkalan data Kemendikbudristek...')" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold tracking-wide transition">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
              SINKRON DUDI KEMENDIKBUD
            </button>
          </div>
        </div>

        <!-- 2. HEADER HALAMAN & TOMBOL AKSI UTAMA -->
        <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
          <div class="flex items-start gap-3.5 max-w-2xl">
            <div class="w-1.5 h-14 rounded-full bg-[#13294B] shrink-0 mt-1"></div>
            <div>
              <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
                Kemitraan Dunia Usaha &amp; Industri (DUDI) dan MoU
              </h1>
              <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">
                Pengelolaan data korporasi mitra vokasi, status berlaku dokumen MoU/hukum kerja sama, kuota tampung pemagangan, serta akreditasi industri berstandar Ditjen Pendidikan Vokasi.
              </p>
            </div>
          </div>

          <div class="flex flex-wrap lg:flex-col items-stretch sm:items-center lg:items-stretch gap-2 shrink-0 min-w-[200px]">
            <button type="button" onclick="alert('Membuka galeri template dokumen MoU resmi...')" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
              <i class="fa-regular fa-file-lines text-slate-500"></i>
              <span>Template Dokumen MoU</span>
            </button>

            <button type="button" onclick="alert('Mengekspor rekap kemitraan DUDI ke PDF...')" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
              <i class="fa-solid fa-download text-slate-500"></i>
              <span>Ekspor PDF</span>
            </button>

            <button type="button" onclick="alert('Membuka formulir tambah mitra DUDI baru...')" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center justify-center gap-2 shadow-xs transition">
              <i class="fa-solid fa-plus text-xs"></i>
              <span>Tambah Mitra DUDI Baru</span>
            </button>
          </div>
        </div>

        <!-- 3. 4 KARTU RINGKASAN KPI -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <!-- KPI 1 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 leading-snug">
                TOTAL MITRA DUDI AKTIF
              </span>
              <span class="w-9 h-9 rounded-xl bg-slate-100 text-[#13294B] flex items-center justify-center text-sm shrink-0">
                <i class="fa-solid fa-building"></i>
              </span>
            </div>
            <div class="text-3xl font-black text-slate-900 tracking-tight">64</div>
            <div class="text-[11px] text-slate-500">
              Tier 1: <strong class="text-slate-800">18</strong> &bull; Tier 2: <strong class="text-slate-800">32</strong> &bull; Startup: <strong class="text-slate-800">14</strong>
            </div>
          </div>

          <!-- KPI 2 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 leading-snug">
                DOKUMEN MOU BERLAKU
              </span>
              <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm shrink-0">
                <i class="fa-regular fa-circle-check"></i>
              </span>
            </div>
            <div class="text-3xl font-black text-slate-900 tracking-tight">58</div>
            <div class="flex items-center gap-2 text-[11px]">
              <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 font-extrabold text-[10px]">90,6%</span>
              <span class="text-slate-500 truncate">Status legal aktif &amp; sah</span>
            </div>
          </div>

          <!-- KPI 3 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 leading-snug">
                MOU MENDEKATI KADALUARSA
              </span>
              <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-sm shrink-0">
                <i class="fa-solid fa-triangle-exclamation"></i>
              </span>
            </div>
            <div class="flex items-baseline gap-2">
              <span class="text-3xl font-black text-slate-900 tracking-tight">6</span>
              <span class="text-xs font-bold text-amber-600">&lt; 60 Hari</span>
            </div>
            <div class="flex items-center justify-between text-[11px]">
              <span class="text-amber-600 font-bold">Perlu perpanjangan segera</span>
              <a href="#" class="font-extrabold text-slate-800 hover:underline">Lihat Semua</a>
            </div>
          </div>

          <!-- KPI 4 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 leading-snug">
                TOTAL KUOTA MAGANG
              </span>
              <span class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-sm shrink-0">
                <i class="fa-solid fa-briefcase"></i>
              </span>
            </div>
            <div class="flex items-baseline gap-2">
              <span class="text-3xl font-black text-slate-900 tracking-tight">445</span>
              <span class="text-xs font-semibold text-slate-400">Kursi Siswa</span>
            </div>
            <div class="space-y-1.5">
              <div class="flex items-center justify-between text-[10px]">
                <span class="text-slate-500">Terisi: <strong class="text-slate-800">398</strong> (89,4%)</span>
                <span class="px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-700 font-extrabold">Sisa 47 Kursi</span>
              </div>
              <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                <div class="h-full rounded-full bg-teal-600" style="width: 89.4%"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- 4. BAR PENCARIAN & FILTER -->
        <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-xs space-y-3">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-3">
            <div class="lg:col-span-6 relative">
              <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
              <input
                type="text"
                placeholder="Cari nama perusahaan, bidang usaha, nomor MoU resmi..."
                class="w-full pl-9 pr-4 py-2 bg-slate-50 focus:bg-white border border-slate-200 rounded-xl text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:border-sky-500 transition"
              >
            </div>

            <div class="lg:col-span-2">
              <select class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-sky-500">
                <option>Semua Sektor Industri</option>
                <option>Tech Industry</option>
                <option>Manufaktur &amp; Energi</option>
                <option>BUMN Telekomunikasi</option>
                <option>Ekonomi Kreatif Digital</option>
              </select>
            </div>

            <div class="lg:col-span-2">
              <select class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-sky-500">
                <option>Semua Status MoU</option>
                <option>MoU Aktif Legal</option>
                <option>Mendekati Kadaluarsa</option>
              </select>
            </div>

            <div class="lg:col-span-2">
              <select class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-sky-500">
                <option>Seluruh Konsentrasi</option>
                <option>PPLG</option>
                <option>TJKT</option>
                <option>DKV</option>
                <option>Mekatronika</option>
              </select>
            </div>
          </div>

          <div class="flex flex-wrap items-center gap-2 pt-1 text-[11px]">
            <span class="text-slate-400 font-semibold">Filter Aktif:</span>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-bold text-[10px]">
              Kota Batam (Kepri)
              <button type="button" class="hover:text-sky-950">&times;</button>
            </span>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-bold text-[10px]">
              Kurikulum Merdeka Vokasi 2024
              <button type="button" class="hover:text-sky-950">&times;</button>
            </span>
            <button type="button" class="text-amber-600 hover:underline font-bold text-[10px] ml-1">
              Reset Filter
            </button>
          </div>
        </div>

        <!-- 5. HEADER DAFTAR MITRA -->
        <div class="flex flex-wrap items-center justify-between gap-2 px-1">
          <h2 class="text-xs font-extrabold text-slate-800">
            Menampilkan 5 dari 64 Korporasi Mitra DUDI Terverifikasi
          </h2>
          <span class="text-[11px] text-slate-400">
            Diperbarui real-time via Vokasi Cloud
          </span>
        </div>

        <!-- 6. DAFTAR 5 KARTU MITRA DUDI & MOU -->
        <div class="space-y-4">

          <!-- KARTU 1: PT Solusi Teknologi Nusantara -->
          <article class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
            <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-4">
              <div class="flex items-start gap-3.5">
                <div class="w-11 h-11 rounded-xl bg-sky-50 border border-sky-200/80 text-sky-600 flex items-center justify-center text-base shrink-0">
                  <i class="fa-solid fa-microchip"></i>
                </div>
                <div class="space-y-1">
                  <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-black text-slate-900">PT Solusi Teknologi Nusantara</h3>
                    <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-600 text-[9px] font-extrabold uppercase tracking-wider">
                      TIER 1 - TECH INDUSTRY
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
                      <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                      MoU Aktif Legal
                    </span>
                  </div>
                  <p class="text-xs text-slate-600">Software Development, Cloud Infrastructure &amp; AI Center</p>
                  <p class="text-[11px] text-slate-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-location-dot text-slate-400"></i>
                    <span>Batam Center Industrial Park Blok C-12, Kota Batam</span>
                  </p>
                </div>
              </div>

              <!-- Box Nomor Registrasi MoU -->
              <div class="lg:text-right bg-slate-50 border border-slate-200/80 rounded-xl px-3.5 py-2.5 shrink-0">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">NOMOR REGISTRASI MOU</div>
                <div class="text-[11px] font-black text-slate-800 mt-0.5">421.5/SMKN1-BTM/PKS-DUDI/2024/102</div>
                <div class="text-[10px] font-bold text-emerald-600 mt-0.5 flex items-center lg:justify-end gap-1">
                  <i class="fa-regular fa-calendar-check"></i>
                  <span>Berlaku Hingga: 14 Desember 2026</span>
                </div>
              </div>
            </div>

            <!-- Tengah: Siswa & Fasilitas -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 pt-3 border-t border-slate-100">
              <div class="lg:col-span-4 space-y-1">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">SISWA &amp; JURUSAN REKOMENDASI</div>
                <div class="text-xs font-extrabold text-slate-900">14 Siswa Terdaftar <span class="font-semibold text-slate-500">(PPLG &amp; DKV)</span></div>
                <div class="text-[11px] text-slate-500 flex items-center gap-1.5">
                  <i class="fa-solid fa-user-tie text-slate-400"></i>
                  <span>3 Lead Mentor Industri Khusus</span>
                </div>
              </div>

              <div class="lg:col-span-8 space-y-1.5">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">FASILITAS DISEDIAKAN PERUSAHAAN</div>
                <div class="flex flex-wrap gap-1.5 text-[10px] font-bold">
                  <span class="px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 border border-sky-200/70"><i class="fa-solid fa-wallet mr-1"></i> Uang Saku Harian</span>
                  <span class="px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 border border-sky-200/70"><i class="fa-solid fa-certificate mr-1"></i> Sertifikat BNSP</span>
                  <span class="px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 border border-sky-200/70"><i class="fa-solid fa-cloud mr-1"></i> Akses Server Cloud AWS</span>
                  <span class="px-2.5 py-1 rounded-lg bg-sky-50 text-sky-700 border border-sky-200/70"><i class="fa-solid fa-shield-heart mr-1"></i> Asuransi K3 Lengkap</span>
                </div>
              </div>
            </div>

            <!-- Footer Kartu -->
            <div class="pt-3 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
              <div class="flex items-center gap-2.5 text-xs">
                <span class="w-7 h-7 rounded-full bg-slate-200 text-slate-700 font-extrabold text-[10px] flex items-center justify-center shrink-0">AF</span>
                <span class="text-slate-500">PIC DUDI: <strong class="text-slate-800">Ahmad Fauzi, S.Kom</strong> <span class="text-slate-400">(Head of People)</span></span>
              </div>

              <div class="flex flex-wrap items-center gap-2">
                <button type="button" onclick="alert('Menghubungi Ahmad Fauzi, S.Kom...')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-phone text-[10px] text-slate-400"></i>
                  <span>Hubungi PIC</span>
                </button>
                <button type="button" onclick="alert('Menampilkan daftar 14 siswa magang...')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-users text-[10px] text-slate-400"></i>
                  <span>Lihat Siswa Magang (14)</span>
                </button>
                <button type="button" onclick="alert('Membuka pengelola dokumen MoU PT Solusi Teknologi Nusantara...')" class="px-3.5 py-1.5 rounded-lg bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-bold flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-file-contract text-[10px]"></i>
                  <span>Kelola Dokumen MoU</span>
                </button>
              </div>
            </div>
          </article>

          <!-- KARTU 2: PT Citra Tubindo Tbk -->
          <article class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
            <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-4">
              <div class="flex items-start gap-3.5">
                <div class="w-11 h-11 rounded-xl bg-teal-50 border border-teal-200/80 text-teal-600 flex items-center justify-center text-base shrink-0">
                  <i class="fa-solid fa-industry"></i>
                </div>
                <div class="space-y-1">
                  <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-black text-slate-900">PT Citra Tubindo Tbk</h3>
                    <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-600 text-[9px] font-extrabold uppercase tracking-wider">
                      TIER 1 - MANUFAKTUR &amp; ENERGI
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
                      <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                      MoU Aktif Legal
                    </span>
                  </div>
                  <p class="text-xs text-slate-600">Oil Country Tubular Goods, Precision Engineering &amp; Logistics</p>
                  <p class="text-[11px] text-slate-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-location-dot text-slate-400"></i>
                    <span>Kawasan Industri Kabil, Nongsa, Batam</span>
                  </p>
                </div>
              </div>

              <div class="lg:text-right bg-slate-50 border border-slate-200/80 rounded-xl px-3.5 py-2.5 shrink-0">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">NOMOR REGISTRASI MOU</div>
                <div class="text-[11px] font-black text-slate-800 mt-0.5">421.5/SMKN1-BTM/PKS-DUDI/2024/088</div>
                <div class="text-[10px] font-bold text-emerald-600 mt-0.5 flex items-center lg:justify-end gap-1">
                  <i class="fa-regular fa-calendar-check"></i>
                  <span>Berlaku Hingga: 30 Januari 2026</span>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 pt-3 border-t border-slate-100">
              <div class="lg:col-span-4 space-y-1">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">SISWA &amp; JURUSAN REKOMENDASI</div>
                <div class="text-xs font-extrabold text-slate-900">22 Siswa Terdaftar <span class="font-semibold text-slate-500">(TJKT &amp; Mekatronika)</span></div>
                <div class="text-[11px] text-slate-500 flex items-center gap-1.5">
                  <i class="fa-solid fa-user-tie text-slate-400"></i>
                  <span>4 Mentor Senior Tersertifikasi</span>
                </div>
              </div>

              <div class="lg:col-span-8 space-y-1.5">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">FASILITAS DISEDIAKAN PERUSAHAAN</div>
                <div class="flex flex-wrap gap-1.5 text-[10px] font-bold">
                  <span class="px-2.5 py-1 rounded-lg bg-teal-50 text-teal-700 border border-teal-200/70"><i class="fa-solid fa-bus mr-1"></i> Transportasi Bus Jemputan</span>
                  <span class="px-2.5 py-1 rounded-lg bg-teal-50 text-teal-700 border border-teal-200/70"><i class="fa-solid fa-utensils mr-1"></i> Makan Siang Standar K3</span>
                  <span class="px-2.5 py-1 rounded-lg bg-teal-50 text-teal-700 border border-teal-200/70"><i class="fa-solid fa-helmet-safety mr-1"></i> Full Paket APD Standar Migas</span>
                </div>
              </div>
            </div>

            <div class="pt-3 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
              <div class="flex items-center gap-2.5 text-xs">
                <span class="w-7 h-7 rounded-full bg-teal-100 text-teal-800 font-extrabold text-[10px] flex items-center justify-center shrink-0">DW</span>
                <span class="text-slate-500">PIC DUDI: <strong class="text-slate-800">Dewi Anggraini, S.T.</strong> <span class="text-slate-400">(Senior HR Operations)</span></span>
              </div>

              <div class="flex flex-wrap items-center gap-2">
                <button type="button" onclick="alert('Menghubungi Dewi Anggraini, S.T....')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-phone text-[10px] text-slate-400"></i>
                  <span>Hubungi PIC</span>
                </button>
                <button type="button" onclick="alert('Menampilkan daftar 22 siswa magang...')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-users text-[10px] text-slate-400"></i>
                  <span>Lihat Siswa Magang (22)</span>
                </button>
                <button type="button" onclick="alert('Membuka pengelola dokumen MoU PT Citra Tubindo Tbk...')" class="px-3.5 py-1.5 rounded-lg bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-bold flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-file-contract text-[10px]"></i>
                  <span>Kelola Dokumen MoU</span>
                </button>
              </div>
            </div>
          </article>

          <!-- KARTU 3: Telkom Corp Digital Lab -->
          <article class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
            <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-4">
              <div class="flex items-start gap-3.5">
                <div class="w-11 h-11 rounded-xl bg-indigo-50 border border-indigo-200/80 text-indigo-600 flex items-center justify-center text-base shrink-0">
                  <i class="fa-solid fa-tower-broadcast"></i>
                </div>
                <div class="space-y-1">
                  <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-black text-slate-900">Telkom Corp Digital Lab</h3>
                    <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-600 text-[9px] font-extrabold uppercase tracking-wider">
                      TIER 1 - BUMN TELEKOMUNIKASI
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
                      <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                      MoU Aktif Legal
                    </span>
                  </div>
                  <p class="text-xs text-slate-600">Telekomunikasi, Core Infrastructure &amp; Fiber Optic Laboratory</p>
                  <p class="text-[11px] text-slate-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-location-dot text-slate-400"></i>
                    <span>Ruko Masai Putri Lt. 4, Sekupang, Kota Batam</span>
                  </p>
                </div>
              </div>

              <div class="lg:text-right bg-slate-50 border border-slate-200/80 rounded-xl px-3.5 py-2.5 shrink-0">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">NOMOR REGISTRASI MOU</div>
                <div class="text-[11px] font-black text-slate-800 mt-0.5">421.5/SMKN1-BTM/PKS-DUDI/2024/095</div>
                <div class="text-[10px] font-bold text-emerald-600 mt-0.5 flex items-center lg:justify-end gap-1">
                  <i class="fa-regular fa-calendar-check"></i>
                  <span>Berlaku Hingga: 15 Mei 2027</span>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 pt-3 border-t border-slate-100">
              <div class="lg:col-span-4 space-y-1">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">SISWA &amp; JURUSAN REKOMENDASI</div>
                <div class="text-xs font-extrabold text-slate-900">18 Siswa Terdaftar <span class="font-semibold text-slate-500">(PPLG &amp; TJKT)</span></div>
                <div class="text-[11px] text-slate-500 flex items-center gap-1.5">
                  <i class="fa-solid fa-user-tie text-slate-400"></i>
                  <span>2 Mentor Senior Network Architect</span>
                </div>
              </div>

              <div class="lg:col-span-8 space-y-1.5">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">FASILITAS DISEDIAKAN PERUSAHAAN</div>
                <div class="flex flex-wrap gap-1.5 text-[10px] font-bold">
                  <span class="px-2.5 py-1 rounded-lg bg-indigo-50 text-indigo-700 border border-indigo-200/70"><i class="fa-solid fa-award mr-1"></i> Sertifikasi Mikro-kredensial</span>
                  <span class="px-2.5 py-1 rounded-lg bg-indigo-50 text-indigo-700 border border-indigo-200/70"><i class="fa-solid fa-desktop mr-1"></i> Ruang Kerja Ergonomik Digital</span>
                  <span class="px-2.5 py-1 rounded-lg bg-indigo-50 text-indigo-700 border border-indigo-200/70"><i class="fa-solid fa-wifi mr-1"></i> Unlimited High-Speed Fiber Net</span>
                </div>
              </div>
            </div>

            <div class="pt-3 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
              <div class="flex items-center gap-2.5 text-xs">
                <span class="w-7 h-7 rounded-full bg-indigo-100 text-indigo-800 font-extrabold text-[10px] flex items-center justify-center shrink-0">BS</span>
                <span class="text-slate-500">PIC DUDI: <strong class="text-slate-800">Bambang Susanto, M.T.</strong> <span class="text-slate-400">(General Manager)</span></span>
              </div>

              <div class="flex flex-wrap items-center gap-2">
                <button type="button" onclick="alert('Menghubungi Bambang Susanto, M.T....')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-phone text-[10px] text-slate-400"></i>
                  <span>Hubungi PIC</span>
                </button>
                <button type="button" onclick="alert('Menampilkan daftar 18 siswa magang...')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-users text-[10px] text-slate-400"></i>
                  <span>Lihat Siswa Magang (18)</span>
                </button>
                <button type="button" onclick="alert('Membuka pengelola dokumen MoU Telkom Corp Digital Lab...')" class="px-3.5 py-1.5 rounded-lg bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-bold flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-file-contract text-[10px]"></i>
                  <span>Kelola Dokumen MoU</span>
                </button>
              </div>
            </div>
          </article>

          <!-- KARTU 4: PT Cyber Media Utama (Highlight Warning Kadaluarsa) -->
          <article class="bg-white rounded-2xl border-2 border-amber-300/90 p-5 shadow-xs space-y-4">
            <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-4">
              <div class="flex items-start gap-3.5">
                <div class="w-11 h-11 rounded-xl bg-amber-50 border border-amber-200 text-amber-600 flex items-center justify-center text-base shrink-0">
                  <i class="fa-solid fa-bullhorn"></i>
                </div>
                <div class="space-y-1">
                  <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-black text-slate-900">PT Cyber Media Utama</h3>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-amber-50 border border-amber-300 text-amber-800 text-[10px] font-extrabold">
                      <i class="fa-solid fa-clock text-amber-600"></i>
                      MoU Mendekati Kadaluarsa: 28 Hari Tersisa
                    </span>
                  </div>
                  <p class="text-xs text-slate-600">Digital Creative Agency, Web Production &amp; UI/UX Branding</p>
                  <p class="text-[11px] text-slate-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-location-dot text-slate-400"></i>
                    <span>Bengkong Harapan, Kota Batam</span>
                  </p>
                </div>
              </div>

              <div class="lg:text-right bg-amber-50/70 border border-amber-200 rounded-xl px-3.5 py-2.5 shrink-0">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-amber-700">PERINGATAN KADALUARSA</div>
                <div class="text-[11px] font-black text-slate-900 mt-0.5">421.5/SMKN1-BTM/PKS-DUDI/2022/134</div>
                <div class="text-[10px] font-extrabold text-rose-600 mt-0.5 flex items-center lg:justify-end gap-1">
                  <i class="fa-regular fa-calendar-xmark"></i>
                  <span>Berakhir: 11 Juni 2026</span>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 pt-3 border-t border-amber-100">
              <div class="lg:col-span-5 space-y-1">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">SISWA BERSTATUS AKTIF</div>
                <div class="text-xs font-extrabold text-amber-700">8 Siswa Sedang Magang <span class="font-semibold text-slate-500">(PPLG &amp; DKV)</span></div>
                <div class="text-[11px] font-bold text-rose-600 flex items-center gap-1.5">
                  <i class="fa-solid fa-circle-exclamation"></i>
                  <span>Wajib perpanjang agar sertifikat diakui Ditjen.</span>
                </div>
              </div>

              <div class="lg:col-span-7 space-y-1">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">CATATAN HUMAS &amp; BKK</div>
                <p class="text-[11px] text-slate-600 leading-relaxed">
                  Draft Adendum MoU Perpanjangan 3 Tahun telah dikirim ke Bagian Legal PT Cyber Media Utama. Menunggu tanda tangan direksi/Direktur.
                </p>
              </div>
            </div>

            <div class="pt-3 border-t border-amber-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
              <div class="flex items-center gap-2.5 text-xs">
                <span class="w-7 h-7 rounded-full bg-amber-100 text-amber-800 font-extrabold text-[10px] flex items-center justify-center shrink-0">RK</span>
                <span class="text-slate-500">Direktur HR: <strong class="text-slate-800">Rian Kusuma, S.Ds.</strong></span>
              </div>

              <div class="flex flex-wrap items-center gap-2">
                <button type="button" onclick="alert('Menghubungi Rian Kusuma, S.Ds....')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-phone text-[10px] text-slate-400"></i>
                  <span>Kontak Cepat HR</span>
                </button>
                <button type="button" onclick="alert('Membuka pengajuan perpanjangan MoU PT Cyber Media Utama...')" class="px-3.5 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-white text-[11px] font-extrabold flex items-center gap-1.5 shadow-xs transition">
                  <i class="fa-solid fa-rotate text-[10px]"></i>
                  <span>Ajukan Perpanjangan MoU Segera</span>
                </button>
              </div>
            </div>
          </article>

          <!-- KARTU 5: Studio Animasi Kreatif Batam -->
          <article class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
            <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-4">
              <div class="flex items-start gap-3.5">
                <div class="w-11 h-11 rounded-xl bg-cyan-50 border border-cyan-200/80 text-cyan-600 flex items-center justify-center text-base shrink-0">
                  <i class="fa-solid fa-clapperboard"></i>
                </div>
                <div class="space-y-1">
                  <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-black text-slate-900">Studio Animasi Kreatif Batam</h3>
                    <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-600 text-[9px] font-extrabold uppercase tracking-wider">
                      TIER 2 - EKONOMI KREATIF DIGITAL
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
                      <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                      MoU Aktif Legal
                    </span>
                  </div>
                  <p class="text-xs text-slate-600">3D Animation, Motion Graphic &amp; Metaverse Asset Production</p>
                  <p class="text-[11px] text-slate-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-location-dot text-slate-400"></i>
                    <span>Nongsa Digital Park (NDP) Gedung Kinema, Nongsa, Batam</span>
                  </p>
                </div>
              </div>

              <div class="lg:text-right bg-slate-50 border border-slate-200/80 rounded-xl px-3.5 py-2.5 shrink-0">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">NOMOR REGISTRASI MOU</div>
                <div class="text-[11px] font-black text-slate-800 mt-0.5">421.5/SMKN1-BTM/PKS-DUDI/2024/118</div>
                <div class="text-[10px] font-bold text-emerald-600 mt-0.5 flex items-center lg:justify-end gap-1">
                  <i class="fa-regular fa-calendar-check"></i>
                  <span>Berlaku Hingga: 24 Oktober 2026</span>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 pt-3 border-t border-slate-100">
              <div class="lg:col-span-4 space-y-1">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">SISWA &amp; JURUSAN REKOMENDASI</div>
                <div class="text-xs font-extrabold text-slate-900">12 Siswa Diterima <span class="font-semibold text-slate-500">(Khusus Jurusan DKV)</span></div>
                <div class="text-[11px] text-slate-500 flex items-center gap-1.5">
                  <i class="fa-solid fa-user-tie text-slate-400"></i>
                  <span>3 Technical CGI Supervisor</span>
                </div>
              </div>

              <div class="lg:col-span-8 space-y-1.5">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">FASILITAS DISEDIAKAN PERUSAHAAN</div>
                <div class="flex flex-wrap gap-1.5 text-[10px] font-bold">
                  <span class="px-2.5 py-1 rounded-lg bg-cyan-50 text-cyan-700 border border-cyan-200/70"><i class="fa-solid fa-microchip mr-1"></i> Render Farm &amp; Workstation RTX</span>
                  <span class="px-2.5 py-1 rounded-lg bg-cyan-50 text-cyan-700 border border-cyan-200/70"><i class="fa-solid fa-bed mr-1"></i> Akses Fasilitas Asrama PKL</span>
                  <span class="px-2.5 py-1 rounded-lg bg-cyan-50 text-cyan-700 border border-cyan-200/70"><i class="fa-solid fa-mug-hot mr-1"></i> Subsidi Makan &amp; Internet</span>
                </div>
              </div>
            </div>

            <div class="pt-3 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
              <div class="flex items-center gap-2.5 text-xs">
                <span class="w-7 h-7 rounded-full bg-cyan-100 text-cyan-800 font-extrabold text-[10px] flex items-center justify-center shrink-0">FT</span>
                <span class="text-slate-500">Lead Studio: <strong class="text-slate-800">Fajar Trianto, S.Sn.</strong></span>
              </div>

              <div class="flex flex-wrap items-center gap-2">
                <button type="button" onclick="alert('Menampilkan daftar 12 siswa magang...')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-users text-[10px] text-slate-400"></i>
                  <span>Lihat Siswa Magang (12)</span>
                </button>
                <button type="button" onclick="alert('Membuka pengelola dokumen MoU Studio Animasi Kreatif Batam...')" class="px-3.5 py-1.5 rounded-lg bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-bold flex items-center gap-1.5 transition">
                  <i class="fa-solid fa-file-contract text-[10px]"></i>
                  <span>Kelola Dokumen MoU</span>
                </button>
              </div>
            </div>
          </article>

        </div>

        <!-- 7. BAGIAN BAWAH: PROSEDUR STANDAR & ARSIP DOKUMEN KERJA SAMA -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-stretch">

          <!-- Kiri (7 Kolom): Prosedur Standar Perpanjangan & Validasi MoU -->
          <section class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-4">
            <div class="flex flex-wrap items-center justify-between gap-2">
              <div class="flex items-center gap-2">
                <i class="fa-solid fa-scale-balanced text-[#13294B]"></i>
                <h2 class="text-sm font-black text-slate-900">Prosedur Standar Perpanjangan &amp; Validasi MoU</h2>
              </div>
              <span class="px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 text-[9px] font-extrabold">
                SOP Ditjen Pendidikan Vokasi Kemendikbudristek
              </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5">
              <!-- Step 1 -->
              <div class="p-4 rounded-xl bg-slate-50/90 border border-slate-200/80 space-y-2.5">
                <div class="flex items-center justify-between">
                  <span class="w-6 h-6 rounded-full bg-[#13294B] text-white text-[11px] font-black flex items-center justify-center">1</span>
                  <span class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">7-60 HARI</span>
                </div>
                <h3 class="text-xs font-extrabold text-slate-900">Audit Evaluasi Mitra</h3>
                <p class="text-[11px] text-slate-500 leading-relaxed">
                  Hubin mengkaji laporan kompetensi siswa, kesesuaian fasilitas industri serta rekomendasi guru pembimbing PKL.
                </p>
              </div>

              <!-- Step 2 -->
              <div class="p-4 rounded-xl bg-slate-50/90 border border-slate-200/80 space-y-2.5">
                <div class="flex items-center justify-between">
                  <span class="w-6 h-6 rounded-full bg-[#13294B] text-white text-[11px] font-black flex items-center justify-center">2</span>
                  <span class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">1-30 HARI</span>
                </div>
                <h3 class="text-xs font-extrabold text-slate-900">Penerbitan Draft Adendum</h3>
                <p class="text-[11px] text-slate-500 leading-relaxed">
                  Generate naskah PKS digital melalui sistem PKL.ID, penyesuaian kuota siswa per konsentrasi keahlian, dan sinkronisasi hak kewajiban industri.
                </p>
              </div>

              <!-- Step 3 -->
              <div class="p-4 rounded-xl bg-slate-50/90 border border-slate-200/80 space-y-2.5">
                <div class="flex items-center justify-between">
                  <span class="w-6 h-6 rounded-full bg-[#13294B] text-white text-[11px] font-black flex items-center justify-center">3</span>
                  <span class="text-[9px] font-extrabold uppercase tracking-wider text-emerald-600">LEGALISASI</span>
                </div>
                <h3 class="text-xs font-extrabold text-slate-900">TTD Digital &amp; Sinkron Dapodik</h3>
                <p class="text-[11px] text-slate-500 leading-relaxed">
                  Tanda tangan Kepala SMK &amp; Direktur DUDI bertimbal balik secara elektronik, otomatis terdata di pangkalan data Ditjen Vokasi.
                </p>
              </div>
            </div>
          </section>

          <!-- Kanan (5 Kolom): Arsip Dokumen Kerja Sama -->
          <section class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3.5">
            <div class="space-y-3">
              <div>
                <h2 class="text-sm font-black text-slate-900 flex items-center gap-2">
                  <i class="fa-regular fa-folder-open text-[#13294B]"></i>
                  <span>Arsip Dokumen Kerja Sama</span>
                </h2>
                <p class="text-[11px] text-slate-500 mt-0.5">Unduh berkas resmi legalitas DUDI &amp; Sekolah.</p>
              </div>

              <div class="space-y-2 text-xs">
                <a href="#" onclick="alert('Mengunduh Format Standar PKS 2026 (.PDF)...')" class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/80 transition">
                  <div class="flex items-center gap-2.5 min-w-0">
                    <span class="w-8 h-8 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center shrink-0">
                      <i class="fa-solid fa-file-pdf"></i>
                    </span>
                    <div class="min-w-0">
                      <div class="font-extrabold text-slate-800 truncate">Format Standar PKS 2026</div>
                      <div class="text-[10px] text-slate-400">PDF &bull; 1.4 MB &bull; Versi Resmi Hubin</div>
                    </div>
                  </div>
                  <i class="fa-solid fa-download text-slate-400 text-xs shrink-0 ml-2"></i>
                </a>

                <a href="#" onclick="alert('Mengunduh Template Nota Kesepahaman (.DOCX)...')" class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/80 transition">
                  <div class="flex items-center gap-2.5 min-w-0">
                    <span class="w-8 h-8 rounded-lg bg-sky-100 text-sky-600 flex items-center justify-center shrink-0">
                      <i class="fa-solid fa-file-word"></i>
                    </span>
                    <div class="min-w-0">
                      <div class="font-extrabold text-slate-800 truncate">Template Nota Kesepahaman</div>
                      <div class="text-[10px] text-slate-400">DOCX &bull; 820 KB &bull; Editable Field</div>
                    </div>
                  </div>
                  <i class="fa-solid fa-download text-slate-400 text-xs shrink-0 ml-2"></i>
                </a>

                <a href="#" onclick="alert('Mengunduh Panduan Asuransi Siswa PKL (.PDF)...')" class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/80 transition">
                  <div class="flex items-center gap-2.5 min-w-0">
                    <span class="w-8 h-8 rounded-lg bg-teal-100 text-teal-600 flex items-center justify-center shrink-0">
                      <i class="fa-solid fa-shield-halved"></i>
                    </span>
                    <div class="min-w-0">
                      <div class="font-extrabold text-slate-800 truncate">Panduan Asuransi Siswa PKL</div>
                      <div class="text-[10px] text-slate-400">PDF &bull; 680 KB &bull; Regulasi BPJS Ketenagakerjaan</div>
                    </div>
                  </div>
                  <i class="fa-solid fa-download text-slate-400 text-xs shrink-0 ml-2"></i>
                </a>
              </div>
            </div>

            <button type="button" onclick="alert('Mengunduh seluruh bundel dokumen kerja sama (.ZIP)...')" class="w-full py-2.5 px-4 rounded-xl bg-slate-100 hover:bg-slate-200/80 border border-slate-200 text-slate-800 text-[11px] font-extrabold flex items-center justify-center gap-2 transition">
              <i class="fa-solid fa-box-archive text-slate-600"></i>
              <span>Unduh Seluruh Bundel Dokumen (.ZIP)</span>
            </button>
          </section>

        </div>

      </main>
    </div>

  </div>

</body>
</html>