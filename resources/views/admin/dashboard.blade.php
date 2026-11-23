<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Eksekutif & Manajemen PKL - PKL.ID</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    /* Scrollbar halus khusus area konten */
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

    <!-- SIDEBAR TETAP DIAM (TIDAK IKUT SCROLL) -->
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

          <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg bg-[#1E3F73] text-white font-bold shadow-sm">
            <i class="fa-solid fa-table-cells-large w-4 text-center text-sky-300"></i>
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

    <!-- AREA KANAN (TOPBAR + KONTEN YANG BISA DI-SCROLL) -->
    <div class="flex-1 h-screen overflow-y-auto content-scroll bg-[#F4F7FB]">

      <!-- TOPBAR -->
      <header class="sticky top-0 z-20 bg-white/95 backdrop-blur border-b border-slate-200/90 px-5 py-2.5 flex items-center justify-between gap-4">
        <div class="relative w-full max-w-md">
          <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
          <input
            type="text"
            placeholder="Cari siswa, mitra industri, atau tugas..."
            class="w-full pl-9 pr-4 py-1.5 bg-slate-100/80 hover:bg-slate-100 focus:bg-white border border-slate-200 rounded-lg text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition"
          >
        </div>

        <div class="flex items-center gap-2.5 shrink-0">
          <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-sky-50 border border-sky-200/80 text-sky-700 text-[10px] font-bold">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            TA 2026/2027 Genap
          </span>

          <span class="hidden md:inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 border border-slate-200 text-slate-600 text-[10px] font-bold">
            <i class="fa-solid fa-shield-halved text-slate-400"></i>
            8+i SMK
          </span>

          <button type="button" onclick="alert('Tidak ada notifikasi baru.')" class="relative w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-600 transition">
            <i class="fa-regular fa-bell text-xs"></i>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-rose-500"></span>
          </button>

          <div class="flex items-center gap-2 pl-2 border-l border-slate-200">
            <div class="w-8 h-8 rounded-full bg-[#13294B] text-white text-[11px] font-extrabold flex items-center justify-center">
              RP
            </div>
            <div class="hidden lg:block leading-tight">
              <div class="text-[11px] font-extrabold text-slate-800">{{ auth()->user()->name ?? 'Rizky Pratama' }}</div>
              <div class="text-[9px] font-semibold text-slate-400">Grup PKL / Admin</div>
            </div>
          </div>
        </div>
      </header>

      <!-- KONTEN UTAMA -->
      <main class="p-5 sm:p-6 space-y-5 max-w-[1440px] mx-auto">

        <!-- 1. HERO / HEADER EKSEKUTIF + BADGE PORTAL HUBIN -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-start">
          <!-- Badge Kiri -->
          <div class="lg:col-span-3 bg-white rounded-2xl border border-slate-200/90 p-3.5 shadow-xs flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-[#13294B] text-white flex flex-col items-center justify-center text-center shrink-0 leading-none px-1">
              <span class="text-[7px] font-bold tracking-wider text-sky-300 uppercase">PORTAL</span>
              <span class="text-[8px] font-black uppercase mt-0.5">HUBIN &amp;</span>
              <span class="text-[7px] font-extrabold uppercase">KEPSEK</span>
            </div>
            <div class="text-[10px] leading-snug text-slate-600">
              <div class="font-extrabold text-slate-800">SMK PK</div>
              <div>Mandiri</div>
              <div>Berprestasi</div>
            </div>
          </div>

          <!-- Judul & Kontrol Kanan -->
          <div class="lg:col-span-9 space-y-3">
            <div>
              <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
                Dashboard Eksekutif &amp; Manajemen PKL
              </h1>
              <p class="text-[11px] text-slate-500 mt-1 max-w-2xl leading-relaxed">
                Rekapitulasi komprehensif penempatan 1.250 siswa magang, kemitraan industri strategis, serta evaluasi ketercapaian link &amp; match berbasis kurikulum vokasi.
              </p>
            </div>

            <div class="flex flex-wrap items-center gap-2.5">
              <select class="px-3 py-2 bg-white border border-slate-200 rounded-lg text-[11px] font-semibold text-slate-700 focus:outline-none focus:border-sky-500">
                <option>Semua Konsentrasi Keahlian</option>
                <option>PPLG (Rekayasa Perangkat Lunak)</option>
                <option>TJKT (Teknik Jaringan &amp; Telekomunikasi)</option>
                <option>TE (Teknik Elektronika &amp; Otomasi)</option>
                <option>DKV (Desain Komunikasi Visual)</option>
                <option>MPLB (Manajemen Logistik &amp; Perkantoran)</option>
              </select>

              <button type="button" onclick="alert('Mengunduh rekap laporan PKL (PDF / XLSX)...')" class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-lg text-[11px] font-bold text-slate-700 flex items-center gap-1.5 transition">
                <i class="fa-solid fa-file-export text-slate-500 text-xs"></i>
                <span>Ekspor Laporan (PDF/XLS)</span>
              </button>

              <button type="button" onclick="alert('Membuka form tambah mitra DUDI baru...')" class="px-3.5 py-2 bg-[#13294B] hover:bg-[#1C3B6B] text-white rounded-lg text-[11px] font-bold flex items-center gap-1.5 shadow-xs transition">
                <i class="fa-solid fa-plus text-xs"></i>
                <span>Tambah Mitra DUDI</span>
              </button>
            </div>
          </div>
        </div>

        <!-- 2. 5 KARTU STATISTIK UTAMA -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3.5">
          <!-- KPI 1 -->
          <div class="bg-white rounded-xl border border-slate-200/90 border-t-4 border-t-sky-600 p-4 shadow-xs flex flex-col justify-between">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-600 leading-tight">Total Siswa Aktif PKL</span>
              <span class="w-7 h-7 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center text-xs shrink-0">
                <i class="fa-solid fa-users"></i>
              </span>
            </div>
            <div class="my-2">
              <div class="text-2xl font-black text-slate-900 tracking-tight">1.250</div>
              <div class="text-[10px] font-bold text-emerald-600 mt-0.5">
                <i class="fa-solid fa-circle-check mr-0.5"></i> 100% Terdistribusi di Jurusan
              </div>
            </div>
          </div>

          <!-- KPI 2 -->
          <div class="bg-white rounded-xl border border-slate-200/90 border-t-4 border-t-indigo-600 p-4 shadow-xs flex flex-col justify-between">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-600 leading-tight">Mitra DUDI Terverifikasi</span>
              <span class="w-7 h-7 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center text-xs shrink-0">
                <i class="fa-solid fa-industry"></i>
              </span>
            </div>
            <div class="my-2">
              <div class="text-2xl font-black text-slate-900 tracking-tight">342</div>
              <div class="text-[10px] font-bold text-indigo-600 mt-0.5">
                <i class="fa-solid fa-arrow-trend-up mr-0.5"></i> +38 MoU Baru Tahun Ajaran Ini
              </div>
            </div>
          </div>

          <!-- KPI 3 -->
          <div class="bg-white rounded-xl border border-slate-200/90 border-t-4 border-t-emerald-500 p-4 shadow-xs flex flex-col justify-between">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-600 leading-tight">Rata-rata Presensi Siswa</span>
              <span class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-xs shrink-0">
                <i class="fa-solid fa-user-check"></i>
              </span>
            </div>
            <div class="my-2">
              <div class="text-2xl font-black text-slate-900 tracking-tight">97.8%</div>
              <div class="text-[10px] font-bold text-emerald-600 mt-0.5">
                <i class="fa-solid fa-shield-check mr-0.5"></i> Tingkat kedisiplinan prima
              </div>
            </div>
          </div>

          <!-- KPI 4 -->
          <div class="bg-white rounded-xl border border-slate-200/90 border-t-4 border-t-cyan-600 p-4 shadow-xs flex flex-col justify-between">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-600 leading-tight">Guru Pembimbing Ditugaskan</span>
              <span class="w-7 h-7 rounded-lg bg-cyan-50 text-cyan-600 flex items-center justify-center text-xs shrink-0">
                <i class="fa-solid fa-chalkboard-user"></i>
              </span>
            </div>
            <div class="my-2">
              <div class="text-2xl font-black text-slate-900 tracking-tight">48</div>
              <div class="text-[10px] font-semibold text-slate-500 mt-0.5">
                Rasio rata-rata 26 siswa/guru
              </div>
            </div>
          </div>

          <!-- KPI 5 -->
          <div class="bg-white rounded-xl border border-slate-200/90 border-t-4 border-t-amber-500 p-4 shadow-xs flex flex-col justify-between">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[11px] font-bold text-slate-600 leading-tight">Kesiapan Sertifikasi Industri</span>
              <span class="w-7 h-7 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center text-xs shrink-0">
                <i class="fa-solid fa-certificate"></i>
              </span>
            </div>
            <div class="my-2">
              <div class="text-2xl font-black text-slate-900 tracking-tight">84.5%</div>
              <div class="text-[10px] font-bold text-amber-600 mt-0.5">
                <i class="fa-solid fa-book-open mr-0.5"></i> 1.056 Logbook Terverifikasi
              </div>
            </div>
          </div>
        </div>

        <!-- 3. GRID UTAMA (KIRI 7 KOLOM | KANAN 5 KOLOM) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-start">

          <!-- KOLOM KIRI (7/12) -->
          <div class="lg:col-span-7 space-y-5">

            <!-- Distribusi Penempatan Berdasarkan Program Keahlian -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <h2 class="text-sm font-extrabold text-slate-900">Distribusi Penempatan Berdasarkan Program Keahlian</h2>
                  <p class="text-[11px] text-slate-500 mt-0.5">Tingkat serapan industri dan pemetaan vokasi semester berjalan</p>
                </div>
                <span class="px-2.5 py-1 rounded-md bg-sky-50 border border-sky-200 text-sky-700 text-[10px] font-extrabold shrink-0">
                  KAPASITAS 100%
                </span>
              </div>

              <div class="space-y-3.5 text-xs">
                <!-- PPLG -->
                <div class="space-y-1">
                  <div class="flex items-center justify-between">
                    <span class="font-bold text-slate-800">Pengembangan Perangkat Lunak &amp; Gim (PPLG)</span>
                    <span class="font-extrabold text-slate-900">280 Siswa <span class="text-slate-400 font-semibold">(100%)</span></span>
                  </div>
                  <div class="w-full h-2 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-sky-600" style="width: 100%"></div>
                  </div>
                  <div class="flex items-center justify-between text-[10px] text-slate-400">
                    <span>Mitra Utama: Software House, Nagoya Digital Park &amp; Batam Hub</span>
                    <span class="font-bold text-sky-600">82 Industri</span>
                  </div>
                </div>

                <!-- TJKT -->
                <div class="space-y-1">
                  <div class="flex items-center justify-between">
                    <span class="font-bold text-slate-800">Teknik Jaringan Komputer &amp; Telekomunikasi (TJKT)</span>
                    <span class="font-extrabold text-slate-900">260 Siswa <span class="text-slate-400 font-semibold">(100%)</span></span>
                  </div>
                  <div class="w-full h-2 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-teal-600" style="width: 100%"></div>
                  </div>
                  <div class="flex items-center justify-between text-[10px] text-slate-400">
                    <span>Mitra Utama: Data Center, ISP Nasional, Fiber Provider</span>
                    <span class="font-bold text-teal-600">78 Industri</span>
                  </div>
                </div>

                <!-- TE -->
                <div class="space-y-1">
                  <div class="flex items-center justify-between">
                    <span class="font-bold text-slate-800">Teknik Mekatronika &amp; Otomasi Manufaktur</span>
                    <span class="font-extrabold text-slate-900">240 Siswa <span class="text-slate-400 font-semibold">(100%)</span></span>
                  </div>
                  <div class="w-full h-2 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-indigo-600" style="width: 100%"></div>
                  </div>
                  <div class="flex items-center justify-between text-[10px] text-slate-400">
                    <span>Mitra Utama: Kawasan Industri Batamindo &amp; Kabil Industrial Estate</span>
                    <span class="font-bold text-indigo-600">71 Industri</span>
                  </div>
                </div>

                <!-- DKV -->
                <div class="space-y-1">
                  <div class="flex items-center justify-between">
                    <span class="font-bold text-slate-800">Desain Komunikasi Visual (DKV)</span>
                    <span class="font-extrabold text-slate-900">210 Siswa <span class="text-slate-400 font-semibold">(100%)</span></span>
                  </div>
                  <div class="w-full h-2 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-amber-500" style="width: 100%"></div>
                  </div>
                  <div class="flex items-center justify-between text-[10px] text-slate-400">
                    <span>Mitra Utama: Studio Animasi, Media Kreatif, Creative Agencies</span>
                    <span class="font-bold text-amber-600">59 Industri</span>
                  </div>
                </div>

                <!-- MPLB -->
                <div class="space-y-1">
                  <div class="flex items-center justify-between">
                    <span class="font-bold text-slate-800">Manajemen Logistik &amp; Layanan Perkantoran</span>
                    <span class="font-extrabold text-slate-900">260 Siswa <span class="text-slate-400 font-semibold">(100%)</span></span>
                  </div>
                  <div class="w-full h-2 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-emerald-600" style="width: 100%"></div>
                  </div>
                  <div class="flex items-center justify-between text-[10px] text-slate-400">
                    <span>Mitra Utama: Pelabuhan/Kargo Udara, Forwarding &amp; Pergudangan Terpadu</span>
                    <span class="font-bold text-emerald-600">52 Industri</span>
                  </div>
                </div>
              </div>
            </section>

            <!-- Sebaran Mitra Industri Berdasarkan Klaster Sektor -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <h2 class="text-sm font-extrabold text-slate-900">Sebaran Mitra Industri Berdasarkan Klaster Sektor</h2>
                  <p class="text-[11px] text-slate-500 mt-0.5">Diversifikasi DUDI mitra di dunia usaha &amp; dunia kerja (DUDI)</p>
                </div>
                <span class="px-2.5 py-1 rounded-md bg-slate-100 border border-slate-200 text-slate-600 text-[10px] font-bold shrink-0">
                  <i class="fa-solid fa-rotate mr-1"></i> Sinkronisasi BKK 2026
                </span>
              </div>

              <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <div class="p-3.5 rounded-xl bg-slate-50/90 border border-slate-200/80 space-y-1">
                  <div class="text-sky-600 text-sm"><i class="fa-solid fa-code"></i></div>
                  <div class="text-lg font-black text-slate-900">32%</div>
                  <div class="text-[11px] font-bold text-slate-800 leading-tight">Teknologi &amp; Software</div>
                  <div class="text-[10px] text-slate-400">109 Perusahaan Terkait</div>
                </div>

                <div class="p-3.5 rounded-xl bg-slate-50/90 border border-slate-200/80 space-y-1">
                  <div class="text-teal-600 text-sm"><i class="fa-solid fa-gears"></i></div>
                  <div class="text-lg font-black text-slate-900">28%</div>
                  <div class="text-[11px] font-bold text-slate-800 leading-tight">Manufaktur &amp; Otomasi</div>
                  <div class="text-[10px] text-slate-400">96 Pabrik &amp; Fasilitas</div>
                </div>

                <div class="p-3.5 rounded-xl bg-slate-50/90 border border-slate-200/80 space-y-1">
                  <div class="text-amber-600 text-sm"><i class="fa-solid fa-photo-film"></i></div>
                  <div class="text-lg font-black text-slate-900">20%</div>
                  <div class="text-[11px] font-bold text-slate-800 leading-tight">Multimedia Kreatif</div>
                  <div class="text-[10px] text-slate-400">68 Studio &amp; Agensi</div>
                </div>

                <div class="p-3.5 rounded-xl bg-slate-50/90 border border-slate-200/80 space-y-1">
                  <div class="text-emerald-600 text-sm"><i class="fa-solid fa-ship"></i></div>
                  <div class="text-lg font-black text-slate-900">20%</div>
                  <div class="text-[11px] font-bold text-slate-800 leading-tight">Logistik, Niaga &amp; Jasa</div>
                  <div class="text-[10px] text-slate-400">69 Korporasi &amp; BUMN</div>
                </div>
              </div>
            </section>

            <!-- Mitra Industri Prioritas & Serapan Terbesar -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <h2 class="text-sm font-extrabold text-slate-900">Mitra Industri Prioritas &amp; Serapan Terbesar</h2>
                  <p class="text-[11px] text-slate-500 mt-0.5">Perusahaan dengan kapasitas kuota terbanyak dan indeks performa kinerja tertinggi</p>
                </div>
                <a href="#" class="text-[11px] font-bold text-sky-600 hover:underline shrink-0">
                  Lihat Seluruh 342 Mitra &rsaquo;
                </a>
              </div>

              <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                  <thead>
                    <tr class="border-b border-slate-200/80 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
                      <th class="py-2.5 pr-3">PERUSAHAAN MITRA</th>
                      <th class="py-2.5 px-3">KLASTER KEJURUAN</th>
                      <th class="py-2.5 px-3">KUOTA DITEMPATKAN</th>
                      <th class="py-2.5 pl-3 text-right">INDEKS DUDI</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50/70">
                      <td class="py-3 pr-3">
                        <div class="flex items-center gap-2.5">
                          <span class="w-7 h-7 rounded-lg bg-sky-100 text-sky-700 font-black text-[10px] flex items-center justify-center shrink-0">STN</span>
                          <div>
                            <div class="font-extrabold text-slate-900">PT Solusi Teknologi Nusantara</div>
                            <div class="text-[10px] text-slate-400">Nagoya Digital Park, Batam</div>
                          </div>
                        </div>
                      </td>
                      <td class="py-3 px-3 text-slate-600 font-medium">PPLG &amp; Web Eng.</td>
                      <td class="py-3 px-3 font-extrabold text-slate-800">48 Siswa</td>
                      <td class="py-3 pl-3 text-right">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">
                          &#9733; 4.95
                        </span>
                      </td>
                    </tr>

                    <tr class="hover:bg-slate-50/70">
                      <td class="py-3 pr-3">
                        <div class="flex items-center gap-2.5">
                          <span class="w-7 h-7 rounded-lg bg-rose-100 text-rose-700 font-black text-[10px] flex items-center justify-center shrink-0">TLK</span>
                          <div>
                            <div class="font-extrabold text-slate-900">PT Telkom Indonesia (Persero) Tbk</div>
                            <div class="text-[10px] text-slate-400">Kantor Perwakilan Riau</div>
                          </div>
                        </div>
                      </td>
                      <td class="py-3 px-3 text-slate-600 font-medium">TJKT &amp; Transmisi</td>
                      <td class="py-3 px-3 font-extrabold text-slate-800">42 Siswa</td>
                      <td class="py-3 pl-3 text-right">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">
                          &#9733; 4.88
                        </span>
                      </td>
                    </tr>

                    <tr class="hover:bg-slate-50/70">
                      <td class="py-3 pr-3">
                        <div class="flex items-center gap-2.5">
                          <span class="w-7 h-7 rounded-lg bg-teal-100 text-teal-700 font-black text-[10px] flex items-center justify-center shrink-0">CTT</span>
                          <div>
                            <div class="font-extrabold text-slate-900">PT Citra Tubindo Tbk</div>
                            <div class="text-[10px] text-slate-400">Kaw. Industri Kabil</div>
                          </div>
                        </div>
                      </td>
                      <td class="py-3 px-3 text-slate-600 font-medium">Mekatronika Industri</td>
                      <td class="py-3 px-3 font-extrabold text-slate-800">36 Siswa</td>
                      <td class="py-3 pl-3 text-right">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">
                          &#9733; 4.92
                        </span>
                      </td>
                    </tr>

                    <tr class="hover:bg-slate-50/70">
                      <td class="py-3 pr-3">
                        <div class="flex items-center gap-2.5">
                          <span class="w-7 h-7 rounded-lg bg-indigo-100 text-indigo-700 font-black text-[10px] flex items-center justify-center shrink-0">BFH</span>
                          <div>
                            <div class="font-extrabold text-slate-900">Batam Fast Ferry &amp; Logistics Hub</div>
                            <div class="text-[10px] text-slate-400">Sekupang Ferry Terminal</div>
                          </div>
                        </div>
                      </td>
                      <td class="py-3 px-3 text-slate-600 font-medium">Manajemen Logistik</td>
                      <td class="py-3 px-3 font-extrabold text-slate-800">32 Siswa</td>
                      <td class="py-3 pl-3 text-right">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">
                          &#9733; 4.78
                        </span>
                      </td>
                    </tr>

                    <tr class="hover:bg-slate-50/70">
                      <td class="py-3 pr-3">
                        <div class="flex items-center gap-2.5">
                          <span class="w-7 h-7 rounded-lg bg-cyan-100 text-cyan-700 font-black text-[10px] flex items-center justify-center shrink-0">KSM</span>
                          <div>
                            <div class="font-extrabold text-slate-900">Kinema Systrans Multimedia (Infinite)</div>
                            <div class="text-[10px] text-slate-400">Nongsa Animation Valley</div>
                          </div>
                        </div>
                      </td>
                      <td class="py-3 px-3 text-slate-600 font-medium">DKV &amp; Animasi 3D</td>
                      <td class="py-3 px-3 font-extrabold text-slate-800">28 Siswa</td>
                      <td class="py-3 pl-3 text-right">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">
                          &#9733; 4.91
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>

          </div>

          <!-- KOLOM KANAN (5/12) -->
          <div class="lg:col-span-5 space-y-5">

            <!-- Pusat Eskalasi & Tindak Lanjut -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3.5">
              <div class="flex items-start justify-between gap-2">
                <div>
                  <h2 class="text-sm font-extrabold text-slate-900">Pusat Eskalasi &amp; Tindak Lanjut</h2>
                  <p class="text-[11px] text-slate-500 mt-0.5">Deteksi anomali kehadiran, keterlambatan pembimbingan, dan evaluasi khusus</p>
                </div>
                <span class="px-2.5 py-0.5 rounded-full bg-rose-50 border border-rose-200 text-rose-600 text-[10px] font-extrabold shrink-0">
                  3 Perhatian Segera
                </span>
              </div>

              <!-- Item 1 -->
              <div class="p-3.5 rounded-xl bg-rose-50/50 border border-rose-200/80 space-y-2.5">
                <div class="flex items-start justify-between gap-2">
                  <div class="flex items-start gap-2.5">
                    <span class="w-7 h-7 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center text-xs shrink-0 mt-0.5">
                      <i class="fa-solid fa-kit-medical"></i>
                    </span>
                    <div>
                      <div class="text-xs font-extrabold text-slate-900">5 Siswa Butuh Penanganan Medis</div>
                      <div class="text-[10px] text-slate-600 mt-0.5">Riwayat medis &amp; pergantian shift kerja di DUDI</div>
                    </div>
                  </div>
                  <span class="text-[10px] font-bold text-rose-600 shrink-0">Harian &#8226; 4</span>
                </div>
                <div class="flex items-center gap-2 pl-9">
                  <button type="button" onclick="alert('Menugaskan BP/BK untuk tindak lanjut...')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-rose-50 border border-rose-200 text-rose-700 text-[10px] font-bold transition">
                    Delegasikan BP/BK
                  </button>
                  <button type="button" onclick="alert('Membuka berkas medis siswa...')" class="px-3 py-1.5 rounded-lg bg-[#13294B] hover:bg-[#1E3F73] text-white text-[10px] font-bold transition">
                    Lihat Berkas Medis
                  </button>
                </div>
              </div>

              <!-- Item 2 -->
              <div class="p-3.5 rounded-xl bg-amber-50/50 border border-amber-200/80 space-y-2.5">
                <div class="flex items-start justify-between gap-2">
                  <div class="flex items-start gap-2.5">
                    <span class="w-7 h-7 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center text-xs shrink-0 mt-0.5">
                      <i class="fa-solid fa-clock-rotate-left"></i>
                    </span>
                    <div>
                      <div class="text-xs font-extrabold text-slate-900">12 Jurnal Tertunda Validasi</div>
                      <div class="text-[10px] text-slate-600 mt-0.5">Guru pembimbing konsentrasi TJKT belum menyetujui</div>
                    </div>
                  </div>
                  <span class="text-[10px] font-bold text-amber-700 shrink-0">&gt; 2 Hari</span>
                </div>
                <div class="pl-9">
                  <button type="button" onclick="alert('Notifikasi pengingat telah dikirim ke pembimbing TJKT.')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-amber-50 border border-amber-300 text-amber-800 text-[10px] font-bold transition">
                    Kirim Notifikasi Pengingat
                  </button>
                </div>
              </div>

              <!-- Item 3 -->
              <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2">
                <div class="flex items-start justify-between gap-2">
                  <div class="flex items-start gap-2.5">
                    <span class="w-7 h-7 rounded-lg bg-sky-100 text-sky-700 flex items-center justify-center text-xs shrink-0 mt-0.5">
                      <i class="fa-solid fa-clipboard-user"></i>
                    </span>
                    <div>
                      <div class="text-xs font-extrabold text-slate-900">Monitoring Periode 1 - 38/48 Guru</div>
                      <div class="text-[10px] text-slate-500 mt-0.5">Sisa 10 guru pembimbing dijadwalkan selesai sebelum 15 November</div>
                    </div>
                  </div>
                  <span class="text-[10px] font-extrabold text-sky-700 shrink-0">79.1%</span>
                </div>
                <div class="w-full h-1.5 rounded-full bg-slate-200 overflow-hidden">
                  <div class="h-full rounded-full bg-sky-600" style="width: 79.1%"></div>
                </div>
              </div>
            </section>

            <!-- Agenda Strategis Pokja PKL & BKK -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3.5">
              <div class="flex items-center justify-between">
                <h2 class="text-sm font-extrabold text-slate-900">Agenda Strategis Pokja PKL &amp; BKK</h2>
                <a href="#" class="text-[11px] font-bold text-sky-600 hover:underline">Kelola Agenda</a>
              </div>

              <div class="space-y-3">
                <!-- Agenda 1 -->
                <div class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition">
                  <div class="w-11 h-12 rounded-xl bg-sky-50 border border-sky-200 flex flex-col items-center justify-center shrink-0 leading-none">
                    <span class="text-sm font-black text-sky-700">28</span>
                    <span class="text-[9px] font-bold uppercase text-sky-600 mt-0.5">OKT</span>
                  </div>
                  <div class="space-y-1 min-w-0">
                    <span class="inline-block px-2 py-0.5 rounded bg-sky-100 text-sky-800 text-[9px] font-extrabold">
                      Sinkronisasi Vokasi
                    </span>
                    <div class="text-xs font-extrabold text-slate-900 leading-snug">
                      Penyelarasan Kurikulum Bersama APINDO &amp; KADIN
                    </div>
                    <div class="text-[10px] text-slate-400">
                      Aula Graha Utama Lantai 3 &bull; 09:00 - 15:30 WIB
                    </div>
                  </div>
                </div>

                <!-- Agenda 2 -->
                <div class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition">
                  <div class="w-11 h-12 rounded-xl bg-indigo-50 border border-indigo-200 flex flex-col items-center justify-center shrink-0 leading-none">
                    <span class="text-sm font-black text-indigo-700">10</span>
                    <span class="text-[9px] font-bold uppercase text-indigo-600 mt-0.5">NOV</span>
                  </div>
                  <div class="space-y-1 min-w-0">
                    <span class="inline-block px-2 py-0.5 rounded bg-indigo-100 text-indigo-800 text-[9px] font-extrabold">
                      Audit Kinerja
                    </span>
                    <div class="text-xs font-extrabold text-slate-900 leading-snug">
                      Monitoring Gabungan Dinas Pendidikan Provinsi Kepri
                    </div>
                    <div class="text-[10px] text-slate-400">
                      Inspeksi langsung ke 8 lokasi magang Kawasan Muka Kuning
                    </div>
                  </div>
                </div>

                <!-- Agenda 3 -->
                <div class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition">
                  <div class="w-11 h-12 rounded-xl bg-emerald-50 border border-emerald-200 flex flex-col items-center justify-center shrink-0 leading-none">
                    <span class="text-sm font-black text-emerald-700">20</span>
                    <span class="text-[9px] font-bold uppercase text-emerald-600 mt-0.5">DES</span>
                  </div>
                  <div class="space-y-1 min-w-0">
                    <span class="inline-block px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 text-[9px] font-extrabold">
                      Akhir Gelombang
                    </span>
                    <div class="text-xs font-extrabold text-slate-900 leading-snug">
                      Penarikan Resmi Peserta PKL Gelombang I
                    </div>
                    <div class="text-[10px] text-slate-400">
                      Sidang Pleno &amp; Penyerahan Portofolio Sertifikat DUDI
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!-- Dokumen Resmi & Akreditasi -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
              <div class="flex items-center justify-between">
                <div>
                  <h2 class="text-sm font-extrabold text-slate-900">Dokumen Resmi &amp; Akreditasi</h2>
                  <p class="text-[11px] text-slate-500 mt-0.5">Format baku standar Kemendikbudristek &amp; Dapodik</p>
                </div>
                <i class="fa-solid fa-folder-open text-slate-400 text-sm"></i>
              </div>

              <div class="space-y-2 text-xs">
                <a href="#" onclick="alert('Mengunduh Rekapitulasi Data Siswa PKL (.XLSX)...')" class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/70 transition">
                  <div class="flex items-center gap-2.5 min-w-0">
                    <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                      <i class="fa-solid fa-file-excel"></i>
                    </span>
                    <div class="min-w-0">
                      <div class="font-bold text-slate-800 truncate">Rekapitulasi Data Siswa PKL (Dapodik)</div>
                      <div class="text-[10px] text-slate-400">Format .XLSX &bull; Diperbarui 3 jam lalu</div>
                    </div>
                  </div>
                  <i class="fa-solid fa-download text-slate-400 text-xs shrink-0 ml-2"></i>
                </a>

                <a href="#" onclick="alert('Mengunduh SK Penetapan Guru Pembimbing & Surat Tugas (.PDF)...')" class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/70 transition">
                  <div class="flex items-center gap-2.5 min-w-0">
                    <span class="w-8 h-8 rounded-lg bg-rose-100 text-rose-700 flex items-center justify-center shrink-0">
                      <i class="fa-solid fa-file-pdf"></i>
                    </span>
                    <div class="min-w-0">
                      <div class="font-bold text-slate-800 truncate">SK Penetapan Guru Pembimbing &amp; Surat Tugas</div>
                      <div class="text-[10px] text-slate-400">Format .PDF &bull; Ditandatangani Kepala Sekolah</div>
                    </div>
                  </div>
                  <i class="fa-solid fa-download text-slate-400 text-xs shrink-0 ml-2"></i>
                </a>

                <a href="#" onclick="alert('Mengunduh Blanko Penilaian Industri & Sertifikat Kompetensi...')" class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/70 transition">
                  <div class="flex items-center gap-2.5 min-w-0">
                    <span class="w-8 h-8 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center shrink-0">
                      <i class="fa-solid fa-award"></i>
                    </span>
                    <div class="min-w-0">
                      <div class="font-bold text-slate-800 truncate">Blanko Penilaian Industri &amp; Sertifikat Kompetensi</div>
                      <div class="text-[10px] text-slate-400">Template Resmi Terbitan BKK Vokasi</div>
                    </div>
                  </div>
                  <i class="fa-solid fa-download text-slate-400 text-xs shrink-0 ml-2"></i>
                </a>
              </div>
            </section>

          </div>
        </div>

        <!-- 4. BANNER BAWAH KETERCAPAIAN LINK & MATCH INDUSTRI -->
        <section class="rounded-2xl bg-[#13294B] text-white p-4 sm:px-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-xs">
          <div class="flex items-start sm:items-center gap-3.5">
            <div class="w-10 h-10 rounded-xl bg-white/10 text-sky-300 flex items-center justify-center text-base shrink-0">
              <i class="fa-solid fa-link"></i>
            </div>
            <div>
              <h3 class="text-xs sm:text-sm font-extrabold">Ketercapaian Link &amp; Match Industri (8+i Vokasi)</h3>
              <p class="text-[11px] text-slate-300 mt-0.5">
                Sistem terintegrasi langsung dengan database PKL Hubungan Industri, Dapodik Kepri, dan Portal Penilaian DUDI Standar Nasional.
              </p>
            </div>
          </div>

          <div class="flex items-center gap-3 shrink-0">
            <span class="hidden xl:inline text-[10px] text-slate-300">
              Sinkron Terakhir: Hari ini, 09:42 WIB
            </span>
            <button type="button" onclick="alert('Menjalankan verifikasi serentak data PKL & DUDI...')" class="px-4 py-2 rounded-lg bg-white hover:bg-slate-100 text-[#13294B] text-[11px] font-extrabold transition">
              Verifikasi Serentak
            </button>
          </div>
        </section>

      </main>
    </div>

  </div>

</body>
</html>