<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Distribusi &amp; Monitoring Kinerja Guru Pembimbing PKL - Portal PKL.ID</title>
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

          <!-- Menu Aktif: Monitoring & Pembimbing -->
          <a href="{{ route('admin.monitoring-pembimbing') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg bg-[#1E3F73] text-white font-bold shadow-sm">
            <i class="fa-solid fa-clipboard-check w-4 text-center text-sky-300"></i>
            <span>Monitoring &amp; Pembimbing</span>
          </a>

          <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-white/5 hover:text-white transition">
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

        <!-- 1. BREADCRUMB & BADGE SUPERVISI -->
        <div class="flex flex-wrap items-center justify-between gap-3">
          <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
              <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
              <span>Beranda</span>
            </a>
            <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
            <span class="font-bold text-slate-800">Monitoring &amp; Guru Pembimbing</span>
          </div>

          <div class="flex flex-wrap items-center gap-3">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold tracking-wide">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
              SUPERVISI LAPANGAN AKTIF: PEKAN KE-14
            </span>
            <span class="text-[11px] text-slate-400 font-medium">
              Sinkronisasi Terakhir: 10 Menit Lalu
            </span>
          </div>
        </div>

        <!-- 2. HERO HEADER & TOMBOL AKSI -->
        <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
          <div class="space-y-2.5 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-sky-50 border border-sky-200/80 text-sky-700 text-[10px] font-extrabold uppercase tracking-wider">
              <i class="fa-solid fa-user-check text-[10px]"></i>
              PORTAL HUBIN &amp; MONEV VOKASI
            </span>

            <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
              Distribusi &amp; Monitoring Kinerja Guru Pembimbing PKL
            </h1>

            <p class="text-xs text-slate-500 leading-relaxed">
              Alokasi guru pembimbing sekolah, supervisi jadwal visitasi lapangan, validasi SPPD/SPT monev, serta pemantauan keaktifan verifikasi jurnal siswa secara real-time.
            </p>
          </div>

          <div class="flex flex-col sm:flex-row lg:flex-col items-stretch gap-2 shrink-0 min-w-[210px]">
            <button type="button" onclick="alert('Membuka kalender jadwal visitasi lapangan terpadu...')" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
              <i class="fa-regular fa-calendar-plus text-slate-500"></i>
              <span>Jadwal Visitasi Terpadu</span>
            </button>

            <button type="button" onclick="alert('Mengunduh rekapitulasi monitoring & evaluasi (Monev)...')" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
              <i class="fa-solid fa-file-arrow-down text-slate-500"></i>
              <span>Unduh Rekap Monev</span>
            </button>

            <button type="button" onclick="alert('Membuka form tambah penugasan guru pembimbing...')" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center justify-center gap-2 shadow-xs transition">
              <i class="fa-solid fa-user-plus text-xs"></i>
              <span>+ Tambah Penugasan Guru</span>
            </button>
          </div>
        </div>

        <!-- 3. 4 KARTU METRIK UTAMA -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <!-- KPI 1 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-600 leading-snug">Guru Pembimbing Ditugaskan</span>
              <span class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm shrink-0">
                <i class="fa-solid fa-chalkboard-user"></i>
              </span>
            </div>
            <div class="flex items-baseline gap-2">
              <span class="text-3xl font-black text-slate-900 tracking-tight">18</span>
              <span class="text-xs font-semibold text-slate-400">Guru Produktif</span>
            </div>
            <div class="space-y-2">
              <div class="flex items-center justify-between gap-2 text-[10px]">
                <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-extrabold">
                  <i class="fa-solid fa-circle-check mr-0.5"></i> Rasio Ideal
                </span>
                <span class="text-slate-400 font-medium">1 : 22.4 Siswa PKL</span>
              </div>
              <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                <div class="h-full rounded-full bg-[#13294B]" style="width: 100%"></div>
              </div>
            </div>
          </div>

          <!-- KPI 2 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-600 leading-snug">Total Sesi Visitasi DUDI</span>
              <span class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-sm shrink-0">
                <i class="fa-solid fa-route"></i>
              </span>
            </div>
            <div class="flex items-baseline gap-1.5">
              <span class="text-3xl font-black text-slate-900 tracking-tight">92</span>
              <span class="text-xs font-semibold text-slate-400">/ 128 Sesi Target</span>
            </div>
            <div class="space-y-2">
              <div class="flex items-center justify-between gap-2 text-[10px]">
                <span class="px-2 py-0.5 rounded-full bg-teal-50 text-teal-700 font-extrabold">
                  71.8% Tercapai
                </span>
                <span class="text-slate-400 font-medium">Semester Berjalan</span>
              </div>
              <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                <div class="h-full rounded-full bg-teal-600" style="width: 71.8%"></div>
              </div>
            </div>
          </div>

          <!-- KPI 3 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-600 leading-snug">Logbook Siswa Terevaluasi</span>
              <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm shrink-0">
                <i class="fa-regular fa-clock"></i>
              </span>
            </div>
            <div class="flex items-baseline gap-2">
              <span class="text-3xl font-black text-slate-900 tracking-tight">94.2%</span>
              <span class="text-xs font-extrabold text-emerald-600">Respon Kilat</span>
            </div>
            <div class="space-y-2">
              <div class="flex items-center justify-between gap-2 text-[10px]">
                <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-extrabold">
                  &rarr; +4.8% Hari Ini
                </span>
                <span class="text-slate-400 font-medium">1.842 Entri Jurnal</span>
              </div>
              <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                <div class="h-full rounded-full bg-emerald-500" style="width: 94.2%"></div>
              </div>
            </div>
          </div>

          <!-- KPI 4 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-600 leading-snug">Anggaran SPT &amp; Monev</span>
              <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-sm shrink-0">
                <i class="fa-solid fa-wallet"></i>
              </span>
            </div>
            <div class="flex items-baseline gap-2">
              <span class="text-3xl font-black text-slate-900 tracking-tight">78%</span>
              <span class="text-xs font-semibold text-slate-400">Terserap Efisien</span>
            </div>
            <div class="space-y-2">
              <div class="flex items-center justify-between gap-2 text-[10px]">
                <span class="px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 font-extrabold">
                  Terverifikasi
                </span>
                <span class="text-slate-400 font-medium">Bendahara Hubin SMKN 1</span>
              </div>
              <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                <div class="h-full rounded-full bg-amber-500" style="width: 78%"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- 4. FILTER JURUSAN & PENCARIAN GURU -->
        <div class="bg-white rounded-2xl border border-slate-200/90 p-3.5 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-3">
          <div class="relative flex-1">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
            <input
              type="text"
              placeholder="Cari nama guru, NIP, atau nama mitra..."
              class="w-full pl-9 pr-4 py-2 bg-slate-50 focus:bg-white border border-slate-200 rounded-xl text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:border-sky-500 transition"
            >
          </div>

          <div class="flex flex-wrap items-center gap-2 text-[11px]">
            <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 mr-1">JURUSAN:</span>
            <button type="button" class="px-3 py-1.5 rounded-lg bg-[#13294B] text-white font-bold">Semua</button>
            <button type="button" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition">PPLG</button>
            <button type="button" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition">TJKT</button>
            <button type="button" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition">DKV</button>
            <button type="button" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition">Animasi</button>

            <div class="h-5 w-px bg-slate-200 mx-1 hidden sm:block"></div>

            <button type="button" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 font-bold flex items-center gap-1.5 transition">
              <i class="fa-solid fa-filter text-[10px] text-slate-400"></i>
              <span>Status Kunjungan: Semua</span>
              <i class="fa-solid fa-chevron-down text-[9px] text-slate-400"></i>
            </button>

            <button type="button" onclick="alert('Menampilkan tampilan ringkas matriks pembimbing...')" class="w-8 h-8 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-600 flex items-center justify-center transition">
              <i class="fa-solid fa-table-cells text-xs"></i>
            </button>
          </div>
        </div>

        <!-- 5. TABEL BEBAN BIMBINGAN & PROGRES VISITASI LAPANGAN -->
        <section class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
          <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div class="flex items-start gap-3">
              <span class="w-8 h-8 rounded-lg bg-sky-50 text-sky-700 flex items-center justify-center text-sm shrink-0 mt-0.5">
                <i class="fa-solid fa-clipboard-list"></i>
              </span>
              <div>
                <h2 class="text-sm font-black text-slate-900">Beban Bimbingan &amp; Progres Visitasi Lapangan</h2>
                <p class="text-[11px] text-slate-500 mt-0.5">Daftar 18 guru pembimbing teknis terdaftar T.A. 2024/2025 Genap</p>
              </div>
            </div>

            <div class="flex flex-wrap items-center gap-2 text-[10px] font-extrabold">
              <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                16 Guru Aktif Normal
              </span>
              <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-700">
                <i class="fa-solid fa-triangle-exclamation text-[9px]"></i>
                2 Butuh Konfirmasi SPT
              </span>
            </div>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
              <thead>
                <tr class="bg-slate-50/90 border-b border-slate-200/80 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
                  <th class="py-3 px-4">FOTO &amp; NAMA GURU / NIP</th>
                  <th class="py-3 px-3">JURUSAN BINAAN</th>
                  <th class="py-3 px-3">SISWA PKL</th>
                  <th class="py-3 px-3">MITRA DUDI NAUNGAN</th>
                  <th class="py-3 px-3">PROGRES VISITASI LAPANGAN</th>
                  <th class="py-3 px-3">VALIDASI JURNAL</th>
                  <th class="py-3 px-3">STATUS SPT</th>
                  <th class="py-3 px-4 text-right">AKSI</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">

                <!-- ROW 1: Dra. Sri Wahyuni, M.Pd -->
                <tr class="hover:bg-slate-50/70 align-top">
                  <td class="py-4 px-4">
                    <div class="flex items-start gap-2.5">
                      <div class="relative shrink-0">
                        <img src="https://ui-avatars.com/api/?name=Sri+Wahyuni&background=E0F2FE&color=0369A1&bold=true" alt="Dra. Sri Wahyuni" class="w-9 h-9 rounded-full object-cover">
                        <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 ring-2 ring-white"></span>
                      </div>
                      <div>
                        <div class="font-extrabold text-slate-900 leading-snug">Dra. Sri Wahyuni, M.Pd</div>
                        <div class="text-[10px] text-slate-400 mt-0.5">NIP. 19780412 200501 2 004</div>
                      </div>
                    </div>
                  </td>
                  <td class="py-4 px-3">
                    <span class="inline-block px-2 py-0.5 rounded bg-sky-100 text-sky-800 text-[10px] font-extrabold">PPLG</span>
                    <div class="text-[10px] text-slate-400 mt-1">XII PPLG 1 &amp; 2</div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="text-sm font-black text-slate-900">28 <span class="text-[11px] font-semibold text-slate-500">Siswa</span></div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="font-extrabold text-slate-800">6 Mitra Industri</div>
                    <div class="text-[10px] text-slate-500 mt-0.5">PT STN, Telkom, Infinite, Cyber Media</div>
                  </td>
                  <td class="py-4 px-3 min-w-[165px]">
                    <div class="flex items-center justify-between text-[11px] font-extrabold">
                      <span class="text-slate-800">5 / 6 Mitra</span>
                      <span class="text-emerald-600">83.3%</span>
                    </div>
                    <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden my-1.5">
                      <div class="h-full rounded-full bg-emerald-500" style="width: 83.3%"></div>
                    </div>
                    <div class="text-[10px] font-bold text-emerald-600 flex items-center gap-1">
                      <i class="fa-regular fa-circle-check text-[9px]"></i>
                      <span>On Track &bull; Jadwal Visitasi 21</span>
                    </div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="text-xs font-black text-slate-900">96% Tepat Waktu</div>
                    <div class="text-[10px] text-slate-400 mt-0.5">Rata-rata respons 1.2 jam</div>
                  </td>
                  <td class="py-4 px-3">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold whitespace-nowrap">
                      <i class="fa-solid fa-circle-check text-[9px]"></i>
                      SPT Terverifikasi
                    </span>
                  </td>
                  <td class="py-4 px-4 text-right">
                    <button type="button" onclick="alert('Membuka detail beban bimbingan Dra. Sri Wahyuni, M.Pd...')" class="p-1.5 rounded-lg hover:bg-slate-100 text-slate-500 transition">
                      <i class="fa-solid fa-ellipsis-vertical text-xs"></i>
                    </button>
                  </td>
                </tr>

                <!-- ROW 2: Drs. Budi Haryono -->
                <tr class="hover:bg-slate-50/70 align-top">
                  <td class="py-4 px-4">
                    <div class="flex items-start gap-2.5">
                      <div class="relative shrink-0">
                        <img src="https://ui-avatars.com/api/?name=Budi+Haryono&background=CCFBF1&color=0F766E&bold=true" alt="Drs. Budi Haryono" class="w-9 h-9 rounded-full object-cover">
                        <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 ring-2 ring-white"></span>
                      </div>
                      <div>
                        <div class="font-extrabold text-slate-900 leading-snug">Drs. Budi Haryono</div>
                        <div class="text-[10px] text-slate-400 mt-0.5">NIP. 19740915 200604 1 006</div>
                      </div>
                    </div>
                  </td>
                  <td class="py-4 px-3">
                    <span class="inline-block px-2 py-0.5 rounded bg-teal-100 text-teal-800 text-[10px] font-extrabold">TJKT</span>
                    <div class="text-[10px] text-slate-400 mt-1">XII TJKT 1 &amp; 2</div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="text-sm font-black text-slate-900">26 <span class="text-[11px] font-semibold text-slate-500">Siswa</span></div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="font-extrabold text-slate-800">6 Mitra Industri</div>
                    <div class="text-[10px] text-slate-500 mt-0.5">Sektor Migas &amp; Telco Batam</div>
                  </td>
                  <td class="py-4 px-3 min-w-[165px]">
                    <div class="flex items-center justify-between text-[11px] font-extrabold">
                      <span class="text-slate-800">4 / 6 Mitra</span>
                      <span class="text-sky-600">66.7%</span>
                    </div>
                    <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden my-1.5">
                      <div class="h-full rounded-full bg-sky-600" style="width: 66.7%"></div>
                    </div>
                    <div class="text-[10px] font-bold text-slate-500 flex items-center gap-1">
                      <i class="fa-regular fa-clock text-[9px] text-sky-600"></i>
                      <span>Sesuai Rencana Monev</span>
                    </div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="text-xs font-black text-slate-900">91% Tepat Waktu</div>
                    <div class="text-[10px] text-slate-400 mt-0.5">Rata-rata respons 3.4 jam</div>
                  </td>
                  <td class="py-4 px-3">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold whitespace-nowrap">
                      <i class="fa-solid fa-circle-check text-[9px]"></i>
                      SPT Terverifikasi
                    </span>
                  </td>
                  <td class="py-4 px-4 text-right">
                    <button type="button" onclick="alert('Membuka detail beban bimbingan Drs. Budi Haryono...')" class="p-1.5 rounded-lg hover:bg-slate-100 text-slate-500 transition">
                      <i class="fa-solid fa-ellipsis-vertical text-xs"></i>
                    </button>
                  </td>
                </tr>

                <!-- ROW 3: Maya Kusuma, S.Sn., M.Ds -->
                <tr class="hover:bg-slate-50/70 align-top">
                  <td class="py-4 px-4">
                    <div class="flex items-start gap-2.5">
                      <div class="relative shrink-0">
                        <img src="https://ui-avatars.com/api/?name=Maya+Kusuma&background=FEF3C7&color=B45309&bold=true" alt="Maya Kusuma, S.Sn., M.Ds" class="w-9 h-9 rounded-full object-cover">
                        <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 ring-2 ring-white"></span>
                      </div>
                      <div>
                        <div class="font-extrabold text-slate-900 leading-snug">Maya Kusuma, S.Sn., M.Ds</div>
                        <div class="text-[10px] text-slate-400 mt-0.5">NIP. 19861124 201101 2 016</div>
                      </div>
                    </div>
                  </td>
                  <td class="py-4 px-3">
                    <span class="inline-block px-2 py-0.5 rounded bg-amber-100 text-amber-800 text-[10px] font-extrabold">DKV</span>
                    <div class="text-[10px] text-slate-400 mt-1">XII DKV 1 &amp; 2</div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="text-sm font-black text-slate-900">24 <span class="text-[11px] font-semibold text-slate-500">Siswa</span></div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="font-extrabold text-slate-800">5 Agensi Kreatif</div>
                    <div class="text-[10px] text-slate-500 mt-0.5">Advertising &amp; Studio Media Nugraha</div>
                  </td>
                  <td class="py-4 px-3 min-w-[165px]">
                    <div class="flex items-center justify-between text-[11px] font-extrabold">
                      <span class="text-slate-800">4 / 5 Mitra</span>
                      <span class="text-emerald-600">80.0%</span>
                    </div>
                    <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden my-1.5">
                      <div class="h-full rounded-full bg-emerald-500" style="width: 80%"></div>
                    </div>
                    <div class="text-[10px] font-bold text-emerald-600 flex items-center gap-1">
                      <i class="fa-solid fa-sparkles text-[9px]"></i>
                      <span>Unggul (Hampir Tuntas)</span>
                    </div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="text-xs font-black text-slate-900">98% Sangat Aktif</div>
                    <div class="text-[10px] text-slate-400 mt-0.5">Rata-rata respons 0.8 jam</div>
                  </td>
                  <td class="py-4 px-3">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold whitespace-nowrap">
                      <i class="fa-solid fa-circle-check text-[9px]"></i>
                      SPT Terverifikasi
                    </span>
                  </td>
                  <td class="py-4 px-4 text-right">
                    <button type="button" onclick="alert('Membuka detail beban bimbingan Maya Kusuma, S.Sn., M.Ds...')" class="p-1.5 rounded-lg hover:bg-slate-100 text-slate-500 transition">
                      <i class="fa-solid fa-ellipsis-vertical text-xs"></i>
                    </button>
                  </td>
                </tr>

                <!-- ROW 4: Hendra Saputra, S.T., M.Kom -->
                <tr class="hover:bg-slate-50/70 align-top">
                  <td class="py-4 px-4">
                    <div class="flex items-start gap-2.5">
                      <div class="relative shrink-0">
                        <img src="https://ui-avatars.com/api/?name=Hendra+Saputra&background=E0E7FF&color=3730A3&bold=true" alt="Hendra Saputra, S.T., M.Kom" class="w-9 h-9 rounded-full object-cover">
                        <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-amber-500 ring-2 ring-white"></span>
                      </div>
                      <div>
                        <div class="font-extrabold text-slate-900 leading-snug">Hendra Saputra, S.T., M.Kom</div>
                        <div class="text-[10px] text-slate-400 mt-0.5">NIP. 19890814 201505 1 002</div>
                      </div>
                    </div>
                  </td>
                  <td class="py-4 px-3">
                    <span class="inline-block px-2 py-0.5 rounded bg-indigo-100 text-indigo-800 text-[10px] font-extrabold">PPLG &amp; GIM</span>
                    <div class="text-[10px] text-slate-400 mt-1">XII RPLB</div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="text-sm font-black text-slate-900">22 <span class="text-[11px] font-semibold text-slate-500">Siswa</span></div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="font-extrabold text-slate-800">4 Startup DUDI</div>
                    <div class="text-[10px] text-slate-500 mt-0.5">Software House Batam Center</div>
                  </td>
                  <td class="py-4 px-3 min-w-[165px]">
                    <div class="flex items-center justify-between text-[11px] font-extrabold">
                      <span class="text-slate-800">2 / 4 Mitra</span>
                      <span class="text-amber-600">50.0%</span>
                    </div>
                    <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden my-1.5">
                      <div class="h-full rounded-full bg-amber-500" style="width: 50%"></div>
                    </div>
                    <div class="text-[10px] font-bold text-amber-600 flex items-center gap-1">
                      <i class="fa-solid fa-triangle-exclamation text-[9px]"></i>
                      <span>Jadwal Gelombang 2</span>
                    </div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="text-xs font-black text-slate-900">86% Review</div>
                    <div class="text-[10px] text-slate-400 mt-0.5">Rata-rata respons 6.0 jam</div>
                  </td>
                  <td class="py-4 px-3">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-700 text-[10px] font-extrabold whitespace-nowrap">
                      <i class="fa-solid fa-triangle-exclamation text-[9px]"></i>
                      Revisi SPT Monev
                    </span>
                  </td>
                  <td class="py-4 px-4 text-right">
                    <button type="button" onclick="alert('Membuka detail beban bimbingan Hendra Saputra, S.T., M.Kom...')" class="p-1.5 rounded-lg hover:bg-slate-100 text-slate-500 transition">
                      <i class="fa-solid fa-ellipsis-vertical text-xs"></i>
                    </button>
                  </td>
                </tr>

                <!-- ROW 5: Ir. Bambang Sujatmiko -->
                <tr class="hover:bg-slate-50/70 align-top">
                  <td class="py-4 px-4">
                    <div class="flex items-start gap-2.5">
                      <div class="relative shrink-0">
                        <img src="https://ui-avatars.com/api/?name=Bambang+Sujatmiko&background=CFFAFE&color=0E7490&bold=true" alt="Ir. Bambang Sujatmiko" class="w-9 h-9 rounded-full object-cover">
                        <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 ring-2 ring-white"></span>
                      </div>
                      <div>
                        <div class="font-extrabold text-slate-900 leading-snug">Ir. Bambang Sujatmiko</div>
                        <div class="text-[10px] text-slate-400 mt-0.5">NIP. 19710420 200003 1 005</div>
                      </div>
                    </div>
                  </td>
                  <td class="py-4 px-3">
                    <span class="inline-block px-2 py-0.5 rounded bg-cyan-100 text-cyan-800 text-[10px] font-extrabold">Animasi</span>
                    <div class="text-[10px] text-slate-400 mt-1">XII Animasi 1 &amp; 2</div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="text-sm font-black text-slate-900">25 <span class="text-[11px] font-semibold text-slate-500">Siswa</span></div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="font-extrabold text-slate-800">5 Studio Animasi</div>
                    <div class="text-[10px] text-slate-500 mt-0.5">Kawasan Industri Nongsa Digital Park</div>
                  </td>
                  <td class="py-4 px-3 min-w-[165px]">
                    <div class="flex items-center justify-between text-[11px] font-extrabold">
                      <span class="text-slate-800">3 / 4 Mitra</span>
                      <span class="text-emerald-600">75.0%</span>
                    </div>
                    <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden my-1.5">
                      <div class="h-full rounded-full bg-emerald-500" style="width: 75%"></div>
                    </div>
                    <div class="text-[10px] font-bold text-emerald-600 flex items-center gap-1">
                      <i class="fa-regular fa-calendar-check text-[9px]"></i>
                      <span>Visitasi Terjadwal Pekan Ini</span>
                    </div>
                  </td>
                  <td class="py-4 px-3">
                    <div class="text-xs font-black text-slate-900">93% Tepat Waktu</div>
                    <div class="text-[10px] text-slate-400 mt-0.5">Rata-rata respons 2.1 jam</div>
                  </td>
                  <td class="py-4 px-3">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold whitespace-nowrap">
                      <i class="fa-solid fa-circle-check text-[9px]"></i>
                      SPT Terverifikasi
                    </span>
                  </td>
                  <td class="py-4 px-4 text-right">
                    <button type="button" onclick="alert('Membuka detail beban bimbingan Ir. Bambang Sujatmiko...')" class="p-1.5 rounded-lg hover:bg-slate-100 text-slate-500 transition">
                      <i class="fa-solid fa-ellipsis-vertical text-xs"></i>
                    </button>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

          <!-- PAGINATION -->
          <div class="px-5 py-3.5 bg-slate-50/70 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3 text-[11px]">
            <span class="text-slate-500">
              Menampilkan <strong class="text-slate-800">5</strong> dari <strong class="text-slate-800">18</strong> Guru Pembimbing Terdaftar
            </span>
            <div class="flex items-center gap-1.5">
              <button type="button" class="px-3 py-1 rounded-lg bg-white border border-slate-200 text-slate-400 font-bold cursor-not-allowed">
                Sebelumnya
              </button>
              <button type="button" class="w-7 h-7 rounded-lg bg-[#13294B] text-white font-extrabold">1</button>
              <button type="button" class="w-7 h-7 rounded-lg bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-bold">2</button>
              <button type="button" class="w-7 h-7 rounded-lg bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-bold">3</button>
              <button type="button" class="px-3 py-1 rounded-lg bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-bold">
                Selanjutnya
              </button>
            </div>
          </div>
        </section>

        <!-- 6. GRID BAWAH: JADWAL VISITASI LAPANGAN TERPADU & AKTIVITAS SISTEM -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-stretch">

          <!-- Kiri (7 Kolom): Jadwal Visitasi Lapangan Terpadu -->
          <section class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-4">
            <div class="space-y-4">
              <div class="flex flex-wrap items-center justify-between gap-3">
                <div class="flex items-start gap-2.5">
                  <span class="w-8 h-8 rounded-lg bg-sky-50 text-sky-700 flex items-center justify-center text-sm shrink-0">
                    <i class="fa-regular fa-calendar-check"></i>
                  </span>
                  <div>
                    <h2 class="text-sm font-black text-slate-900">Jadwal Visitasi Lapangan Terpadu</h2>
                    <p class="text-[11px] text-slate-500 mt-0.5">Periode: 28 Oktober - 02 November 2024 (Pekan Monev Sentral)</p>
                  </div>
                </div>

                <button type="button" onclick="alert('Membuka formulir ajukan jadwal kunjungan baru...')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold transition">
                  + Ajukan Jadwal Kunjungan
                </button>
              </div>

              <!-- 3 Kolom Jadwal Hari -->
              <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5">
                <!-- Senin, 28 Okt -->
                <div class="rounded-xl bg-slate-50/90 border border-slate-200/80 p-3.5 space-y-3">
                  <div class="flex items-center justify-between gap-1">
                    <span class="text-[11px] font-black text-slate-800">Senin, 28 Okt</span>
                    <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-700 text-[9px] font-extrabold">2 Sesi Selesai</span>
                  </div>

                  <div class="p-3 rounded-xl bg-white border border-slate-200/80 space-y-1">
                    <div class="text-[11px] font-extrabold text-slate-900">PT Infineon Diskon Nongsa</div>
                    <div class="text-[10px] font-bold text-sky-700">Ir. Bambang Sujatmiko</div>
                    <div class="text-[10px] text-slate-400">Evaluasi Portofolio 3D &amp; Rhas</div>
                  </div>

                  <div class="p-3 rounded-xl bg-white border border-slate-200/80 space-y-1">
                    <div class="text-[11px] font-extrabold text-slate-900">PT Schneider Electric Batam</div>
                    <div class="text-[10px] font-bold text-sky-700">Drs. Budi Haryono</div>
                    <div class="text-[10px] text-slate-400">Supervisi K3 &amp; Otomasi Jaringan</div>
                  </div>
                </div>

                <!-- Rabu, 30 Okt (Hari Ini) -->
                <div class="rounded-xl bg-sky-50/60 border border-sky-200/90 p-3.5 space-y-3">
                  <div class="flex items-center justify-between gap-1">
                    <span class="text-[11px] font-black text-slate-900">Rabu, 30 Okt (Hari Ini)</span>
                    <span class="px-2 py-0.5 rounded bg-sky-600 text-white text-[9px] font-extrabold">Berlangsung</span>
                  </div>

                  <div class="p-3 rounded-xl bg-white border border-sky-200 space-y-1">
                    <div class="flex items-center justify-between gap-1">
                      <span class="text-[11px] font-extrabold text-slate-900">PT Citra Tubindo Tbk</span>
                      <span class="text-[10px] font-black text-sky-700 shrink-0">09:30 WIB</span>
                    </div>
                    <div class="text-[10px] font-bold text-sky-700">Dra. Sri Wahyuni, M.Pd</div>
                    <div class="text-[10px] text-slate-400">Review Logbook &amp; Sinkronisasi MoU</div>
                  </div>

                  <div class="p-3 rounded-xl bg-white border border-sky-200 space-y-1">
                    <div class="flex items-center justify-between gap-1">
                      <span class="text-[11px] font-extrabold text-slate-900">Kinema Systrans Multimedia</span>
                      <span class="text-[10px] font-black text-sky-700 shrink-0">14:00 WIB</span>
                    </div>
                    <div class="text-[10px] font-bold text-sky-700">Maya Kusuma, S.Sn</div>
                    <div class="text-[10px] text-slate-400">Review Mentoring Industri DKV</div>
                  </div>
                </div>

                <!-- Jumat, 01 Nov -->
                <div class="rounded-xl bg-slate-50/90 border border-slate-200/80 p-3.5 space-y-3">
                  <div class="flex items-center justify-between gap-1">
                    <span class="text-[11px] font-black text-slate-800">Jumat, 01 Nov</span>
                    <span class="px-2 py-0.5 rounded bg-amber-100 text-amber-800 text-[9px] font-extrabold">2 Agenda Terjadwal</span>
                  </div>

                  <div class="p-3 rounded-xl bg-white border border-slate-200/80 space-y-1">
                    <div class="text-[11px] font-extrabold text-slate-900">PT Sat Nusapersada Tbk</div>
                    <div class="text-[10px] font-bold text-sky-700">Hendra Saputra, M.Kom</div>
                    <div class="text-[10px] text-slate-400">Monev Siswa Shift Industri B2A</div>
                  </div>

                  <div class="p-3 rounded-xl bg-white border border-slate-200/80 space-y-1">
                    <div class="text-[11px] font-extrabold text-slate-900">Telkom Witel Batam Center</div>
                    <div class="text-[10px] font-bold text-sky-700">Dra. Sri Wahyuni, M.Pd</div>
                    <div class="text-[10px] text-slate-400">Validasi Kompetensi Cloud Core</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="pt-3 border-t border-slate-100 flex flex-wrap items-center justify-between gap-2 text-[11px]">
              <span class="text-slate-500 flex items-center gap-1.5">
                <i class="fa-solid fa-location-dot text-sky-600"></i>
                <span>Sebaran Wilayah Aktif: Kawasan Industri Batamindo (Mukakuning), Kabil Industrial Estate, &amp; Nongsa Digital Park.</span>
              </span>
              <a href="#" onclick="alert('Membuka peta sebaran kunjungan PKL...')" class="font-extrabold text-sky-700 hover:underline">
                Lihat Peta 64 Kunjungan &rarr;
              </a>
            </div>
          </section>

          <!-- Kanan (5 Kolom): Aktivitas Sistem -->
          <section class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-4">
            <div class="space-y-4">
              <div class="flex items-center justify-between">
                <div>
                  <h2 class="text-sm font-black text-slate-900">Aktivitas Sistem</h2>
                  <p class="text-[11px] text-slate-500 mt-0.5">Audit trail real-time</p>
                </div>
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
              </div>

              <div class="space-y-3.5 text-xs">
                <!-- Log 1 -->
                <div class="flex items-start gap-3">
                  <span class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center text-xs shrink-0 mt-0.5">
                    <i class="fa-solid fa-file-circle-check"></i>
                  </span>
                  <div class="space-y-0.5">
                    <p class="text-[11px] text-slate-700 leading-relaxed">
                      <strong class="font-extrabold text-slate-900">Dra. Sri Wahyuni</strong> telah mengunggah <strong class="font-extrabold text-slate-900">Berita Acara Visitasi</strong> PT Citra Tubindo Tbk.
                    </p>
                    <div class="text-[10px] text-slate-400">14 Menit yang lalu &bull; Dokumen SPPD Valid</div>
                  </div>
                </div>

                <!-- Log 2 -->
                <div class="flex items-start gap-3 p-2.5 rounded-xl bg-amber-50/60 border border-amber-200/70">
                  <span class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center text-xs shrink-0 mt-0.5">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                  </span>
                  <div class="space-y-0.5">
                    <p class="text-[11px] text-slate-800 leading-relaxed">
                      <strong class="font-extrabold text-amber-800">Peringatan sistem:</strong> 2 guru pembimbing belum menyerahkan laporan monev tengah semester.
                    </p>
                    <div class="text-[10px] font-bold text-amber-700">2 Jam yang lalu &bull; Tindakan Kurikulum Dibutuhkan</div>
                  </div>
                </div>

                <!-- Log 3 -->
                <div class="flex items-start gap-3">
                  <span class="w-8 h-8 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center text-xs shrink-0 mt-0.5">
                    <i class="fa-solid fa-check-double"></i>
                  </span>
                  <div class="space-y-0.5">
                    <p class="text-[11px] text-slate-700 leading-relaxed">
                      <strong class="font-extrabold text-slate-900">Maya Kusuma, M.Ds</strong> memvalidasi 24 logbook mingguan siswa DKV di Infinite Studios.
                    </p>
                    <div class="text-[10px] text-slate-400">4 Jam yang lalu &bull; Skor Rata-rata 89.4</div>
                  </div>
                </div>

                <!-- Log 4 -->
                <div class="flex items-start gap-3">
                  <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center text-xs shrink-0 mt-0.5">
                    <i class="fa-solid fa-receipt"></i>
                  </span>
                  <div class="space-y-0.5">
                    <p class="text-[11px] text-slate-700 leading-relaxed">
                      Bendahara Hubin menyetujui klaim transportasi supervisi regional Nongsa &amp; Batu Ampar.
                    </p>
                    <div class="text-[10px] text-slate-400">Kemarin, 16:42 WIB &bull; Rp 3.250.000</div>
                  </div>
                </div>
              </div>
            </div>

            <button type="button" onclick="alert('Membuka seluruh riwayat supervisi (64 log)...')" class="w-full py-2.5 px-4 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-800 text-[11px] font-extrabold flex items-center justify-center gap-2 transition">
              <span>Buka Semua Riwayat Supervisi (64 Log)</span>
              <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-slate-500"></i>
            </button>
          </section>

        </div>

      </main>
    </div>

  </div>

</body>
</html>