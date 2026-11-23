<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rekapitulasi Nilai Akhir PKL &amp; Sertifikasi Industri - Portal PKL.ID</title>
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

          <a href="{{ route('admin.manajemen-siswa') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-white/5 hover:text-white transition">
            <i class="fa-solid fa-user-graduate w-4 text-center text-slate-400"></i>
            <span>Manajemen Siswa &amp; Penempatan</span>
          </a>

          <!-- Menu Aktif: Rekapitulasi Nilai & Sertifikat -->
          <a href="{{ route('admin.rekapitulasi-nilai') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg bg-[#1E3F73] text-white font-bold shadow-sm">
            <i class="fa-solid fa-award w-4 text-center text-sky-300"></i>
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

        <!-- 1. BREADCRUMB & STANDAR DITJEN VOKASI -->
        <div class="flex flex-wrap items-center justify-between gap-3">
          <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
              <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
              <span>Beranda</span>
            </a>
            <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
            <span class="font-bold text-slate-800">Rekapitulasi Nilai &amp; Sertifikat</span>
          </div>

          <div class="flex flex-wrap items-center gap-2.5 text-[11px]">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 text-[10px] font-extrabold tracking-wide">
              <i class="fa-solid fa-shield-check text-[10px]"></i>
              STANDAR DITJEN PENDIDIKAN VOKASI
            </span>
            <span class="text-slate-400 font-semibold">T.A 2024/2025</span>
          </div>
        </div>

        <!-- 2. HEADER HALAMAN & TOMBOL AKSI UTAMA -->
        <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
          <div class="space-y-2 max-w-2xl">
            <div class="text-[10px] font-extrabold uppercase tracking-wider text-sky-700">
              SMKN 1 BATAM &bull; HUBUNGAN INDUSTRI (HUBIN)
            </div>
            <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
              Rekapitulasi Nilai Akhir PKL &amp; Sertifikasi Industri
            </h1>
            <p class="text-xs text-slate-500 leading-relaxed">
              Penggabungan nilai resmi kolaboratif (DUDI 60% + Sekolah 40%), validasi kelulusan magang Kurikulum Merdeka, sinkronisasi nilai ke E-Rapor Dapodik, dan penerbitan sertifikat digital masal ber-QR BSrE.
            </p>
          </div>

          <div class="flex flex-wrap items-center gap-2.5 shrink-0">
            <button type="button" onclick="alert('Menyinkronkan rekap nilai akhir ke Dapodik Kemendikbud...')" class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-[11px] font-extrabold flex items-center gap-1.5 shadow-2xs transition">
              <i class="fa-solid fa-cloud-arrow-up text-xs"></i>
              <span>Sinkronisasi ke Dapodik Kemendikbud</span>
            </button>

            <button type="button" onclick="alert('Mengekspor Ledger Nilai PKL ke format Excel / E-PKL...')" class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center gap-1.5 transition">
              <i class="fa-solid fa-file-excel text-emerald-600 text-xs"></i>
              <span>Ekspor Ledger Nilai (Excel / E-PKL)</span>
            </button>

            <button type="button" onclick="alert('Membuka proses penerbitan sertifikat digital masal ber-QR BSrE...')" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center gap-1.5 shadow-xs transition">
              <i class="fa-solid fa-certificate text-xs text-sky-300"></i>
              <span>Terbitkan Sertifikat Masal</span>
            </button>
          </div>
        </div>

        <!-- 3. 4 KARTU KPI RINGKASAN -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <!-- KPI 1 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 leading-snug">
                NILAI TERKUMPUL LENGKAP
              </span>
              <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm shrink-0">
                <i class="fa-solid fa-clipboard-check"></i>
              </span>
            </div>
            <div class="flex items-baseline gap-1.5">
              <span class="text-3xl font-black text-slate-900 tracking-tight">382</span>
              <span class="text-xs font-semibold text-slate-400">/ 420 Siswa</span>
            </div>
            <div class="space-y-2">
              <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                <div class="h-full rounded-full bg-emerald-500" style="width: 90.95%"></div>
              </div>
              <div class="flex items-center justify-between gap-2 text-[10px]">
                <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 font-extrabold">90.9% Selesai</span>
                <span class="text-slate-400">Siap Terbit Nilai Akhir</span>
              </div>
            </div>
          </div>

          <!-- KPI 2 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 leading-snug">
                MENUNGGU NILAI / SIDANG
              </span>
              <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-sm shrink-0">
                <i class="fa-regular fa-hourglass-half"></i>
              </span>
            </div>
            <div class="flex items-baseline gap-2">
              <span class="text-3xl font-black text-amber-500 tracking-tight">38</span>
              <span class="text-xs font-bold text-slate-500">Siswa Tertunda</span>
            </div>
            <div class="space-y-2">
              <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                <div class="h-full rounded-full bg-amber-400" style="width: 9.1%"></div>
              </div>
              <div class="flex items-center justify-between gap-2 text-[10px]">
                <span class="px-2 py-0.5 rounded bg-amber-50 text-amber-700 font-extrabold">9.1% Menunggu</span>
                <span class="text-slate-400 truncate">Proses sidang &amp; nilai DUDI</span>
              </div>
            </div>
          </div>

          <!-- KPI 3 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 leading-snug">
                RATA-RATA NILAI AKHIR
              </span>
              <span class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm shrink-0">
                <i class="fa-solid fa-chart-line"></i>
              </span>
            </div>
            <div class="flex items-baseline gap-1.5">
              <span class="text-3xl font-black text-slate-900 tracking-tight">88.6</span>
              <span class="text-xs font-semibold text-slate-400">/ 100</span>
            </div>
            <div class="space-y-2">
              <div class="flex items-center justify-between gap-2 text-[10px]">
                <span class="font-extrabold text-emerald-600">&rarr; +2.4 poin</span>
                <span class="text-slate-400">vs semester lalu</span>
              </div>
              <div class="flex items-center justify-between gap-2 text-[10px]">
                <span class="px-2 py-0.5 rounded bg-sky-50 text-sky-700 font-extrabold">Predikat Amat Baik</span>
                <span class="text-slate-500 font-bold">KKM: 75.00</span>
              </div>
            </div>
          </div>

          <!-- KPI 4 -->
          <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-3">
            <div class="flex items-start justify-between gap-2">
              <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 leading-snug">
                SERTIFIKAT DIGITAL DITERBITKAN
              </span>
              <span class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-sm shrink-0">
                <i class="fa-solid fa-stamp"></i>
              </span>
            </div>
            <div class="flex items-baseline gap-1.5">
              <span class="text-3xl font-black text-slate-900 tracking-tight">350</span>
              <span class="text-xs font-semibold text-slate-400">Lembar Sah</span>
            </div>
            <div class="space-y-2">
              <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
                <div class="h-full rounded-full bg-indigo-600" style="width: 83.3%"></div>
              </div>
              <div class="flex items-center justify-between gap-2 text-[10px]">
                <span class="px-2 py-0.5 rounded bg-indigo-50 text-indigo-700 font-extrabold">BSrE Verified</span>
                <span class="text-slate-400">32 Menunggu TTE</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 4. BANNER KONEKSI SERVER DITJEN VOKASI -->
        <section class="rounded-2xl bg-sky-50/80 border border-sky-200/90 p-4 sm:px-5 flex flex-col lg:flex-row lg:items-center justify-between gap-4 shadow-2xs">
          <div class="flex items-start sm:items-center gap-3.5">
            <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center text-base shrink-0">
              <i class="fa-solid fa-cloud-bolt"></i>
            </div>
            <div class="space-y-0.5">
              <div class="flex flex-wrap items-center gap-2">
                <h2 class="text-xs sm:text-sm font-black text-slate-900">
                  Koneksi Server Ditjen Vokasi Kemendikbudristek Aktif
                </h2>
                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 text-[9px] font-extrabold">
                  <i class="fa-solid fa-circle-check text-[8px]"></i>
                  E-RAPOR READY
                </span>
              </div>
              <p class="text-[11px] text-slate-600">
                382 data nilai akhir telah sesuai format penilaian Kurikulum Merdeka Vokasi 2024. Sinkronisasi terakhir otomatis: <strong class="text-slate-800">Hari ini, 08:15 WIB.</strong>
              </p>
            </div>
          </div>

          <div class="flex flex-wrap items-center gap-2 shrink-0">
            <button type="button" onclick="alert('Menampilkan riwayat log sinkronisasi E-Rapor / Dapodik...')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold flex items-center gap-1.5 transition">
              <i class="fa-solid fa-clock-rotate-left text-slate-500 text-[10px]"></i>
              <span>Riwayat Log Sync</span>
            </button>
            <button type="button" onclick="alert('Menjalankan sinkronisasi nilai ke server Ditjen Vokasi...')" class="px-3.5 py-1.5 rounded-lg bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-extrabold flex items-center gap-1.5 transition">
              <i class="fa-solid fa-rotate text-[10px]"></i>
              <span>Sync Sekarang</span>
            </button>
          </div>
        </section>

        <!-- 5. FILTER PENCARIAN & KATEGORI -->
        <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-xs space-y-3">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-3">
            <div class="lg:col-span-5 relative">
              <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
              <input
                type="text"
                placeholder="Cari siswa, NISN, atau mitra DUDI..."
                class="w-full pl-9 pr-4 py-2 bg-slate-50 focus:bg-white border border-slate-200 rounded-xl text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:border-sky-500 transition"
              >
            </div>

            <div class="lg:col-span-3">
              <select class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-sky-500">
                <option selected>XII PPLG 1 (36 Siswa)</option>
                <option>XII PPLG 2 (36 Siswa)</option>
                <option>XII TJKT 1 (35 Siswa)</option>
                <option>XII DKV 1 (34 Siswa)</option>
                <option>Semua Rombel</option>
              </select>
            </div>

            <div class="lg:col-span-2">
              <select class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-sky-500">
                <option>Semua Predikat</option>
                <option>Amat Baik (A)</option>
                <option>Baik (B)</option>
                <option>Cukup (C)</option>
              </select>
            </div>

            <div class="lg:col-span-2">
              <select class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-sky-500">
                <option>Semua Sertifikat</option>
                <option>Terbit BSrE</option>
                <option>Menunggu TTE</option>
                <option>Perlu Remedial</option>
              </select>
            </div>
          </div>

          <div class="flex flex-wrap items-center justify-between gap-3 pt-1">
            <div class="flex flex-wrap items-center gap-2 text-[11px]">
              <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">FILTER AKTIF:</span>
              <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-bold text-[10px]">
                Rombel: XII PPLG 1 &times;
              </span>
              <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-bold text-[10px]">
                T.A. 2024/2025 Genap &times;
              </span>
              <button type="button" onclick="alert('Filter direset.')" class="text-slate-400 hover:text-slate-700 font-bold text-[10px] underline ml-1">
                Reset Filter
              </button>
            </div>

            <div class="flex flex-wrap items-center gap-2">
              <span class="text-[11px] text-slate-500 mr-1">
                Menampilkan <strong class="text-slate-800">6</strong> dari <strong class="text-slate-800">36</strong> siswa
              </span>
              <button type="button" onclick="alert('Mencetak ledger nilai untuk siswa terpilih...')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-bold text-slate-700 transition">
                Cetak Ledger Terpilih
              </button>
              <button type="button" onclick="alert('Mengirim nilai akhir ke wali siswa terpilih...')" class="px-3 py-1.5 rounded-lg bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-bold transition">
                Kirim Nilai Akhir Wali
              </button>
            </div>
          </div>
        </div>

        <!-- 6. TABEL REKAPITULASI NILAI AKHIR & SERTIFIKASI -->
        <section class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
              <thead>
                <tr class="bg-slate-50/90 border-b border-slate-200/80 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
                  <th class="py-3 pl-4 pr-2 w-8">
                    <input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B]">
                  </th>
                  <th class="py-3 px-3">IDENTITAS SISWA &amp; NISN</th>
                  <th class="py-3 px-3">MITRA DUDI &amp; PEMBIMBING</th>
                  <th class="py-3 px-3 text-center">NILAI DUDI (60%)</th>
                  <th class="py-3 px-3 text-center">NILAI SEKOLAH (40%)</th>
                  <th class="py-3 px-3 text-center">NILAI AKHIR (NA)</th>
                  <th class="py-3 px-3 text-center">PREDIKAT</th>
                  <th class="py-3 px-3 text-center">SIDANG LAPORAN</th>
                  <th class="py-3 px-3 text-center">STATUS SERTIFIKAT</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">

                <!-- Siswa 1: Rizky Pratama -->
                <tr class="hover:bg-slate-50/70 align-middle">
                  <td class="py-3.5 pl-4 pr-2">
                    <input type="checkbox" checked class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B]">
                  </td>
                  <td class="py-3.5 px-3">
                    <div class="flex items-center gap-2.5">
                      <span class="w-8 h-8 rounded-full bg-sky-100 text-sky-700 font-black text-[11px] flex items-center justify-center shrink-0">RP</span>
                      <div>
                        <div class="font-extrabold text-slate-900">Rizky Pratama</div>
                        <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1.5">
                          <span>NISN 0064829174</span>
                          <span>&bull;</span>
                          <span class="px-1.5 py-0.5 rounded bg-sky-50 text-sky-700 font-extrabold text-[9px]">XII PPLG 1</span>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="py-3.5 px-3">
                    <div class="font-extrabold text-slate-800">PT Solusi Teknologi Nusantara</div>
                    <div class="text-[10px] text-slate-400 mt-0.5">Pembimbing: Hendra Gunawan, S.Kom</div>
                  </td>
                  <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">92.80</td>
                  <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">93.30</td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-lg bg-sky-50 border border-sky-200 text-sky-800 font-black text-xs">
                      93.00
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 font-extrabold text-[10px] leading-tight">
                      Amat Baik (A)
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px] leading-tight">
                      Lulus (Skor 94)
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-extrabold text-[10px] whitespace-nowrap">
                      <i class="fa-solid fa-qrcode text-[9px]"></i>
                      Terbit BSrE
                    </span>
                  </td>
                </tr>

                <!-- Siswa 2: Siti Nurhaliza -->
                <tr class="hover:bg-slate-50/70 align-middle">
                  <td class="py-3.5 pl-4 pr-2">
                    <input type="checkbox" checked class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B]">
                  </td>
                  <td class="py-3.5 px-3">
                    <div class="flex items-center gap-2.5">
                      <span class="w-8 h-8 rounded-full bg-teal-100 text-teal-700 font-black text-[11px] flex items-center justify-center shrink-0">SN</span>
                      <div>
                        <div class="font-extrabold text-slate-900">Siti Nurhaliza</div>
                        <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1.5">
                          <span>NISN 0061928410</span>
                          <span>&bull;</span>
                          <span class="px-1.5 py-0.5 rounded bg-sky-50 text-sky-700 font-extrabold text-[9px]">XII PPLG 1</span>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="py-3.5 px-3">
                    <div class="font-extrabold text-slate-800">Telkom Corp Digital Lab</div>
                    <div class="text-[10px] text-slate-400 mt-0.5">Pembimbing: Wahyu Wibowo, S.T.</div>
                  </td>
                  <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">90.80</td>
                  <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">91.00</td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-lg bg-sky-50 border border-sky-200 text-sky-800 font-black text-xs">
                      90.90
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 font-extrabold text-[10px] leading-tight">
                      Amat Baik (A)
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">
                      Lulus Sidang
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-extrabold text-[10px] whitespace-nowrap">
                      <i class="fa-solid fa-qrcode text-[9px]"></i>
                      Terbit BSrE
                    </span>
                  </td>
                </tr>

                <!-- Siswa 3: Bagus Setiawan -->
                <tr class="hover:bg-slate-50/70 align-middle">
                  <td class="py-3.5 pl-4 pr-2">
                    <input type="checkbox" checked class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B]">
                  </td>
                  <td class="py-3.5 px-3">
                    <div class="flex items-center gap-2.5">
                      <span class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 font-black text-[11px] flex items-center justify-center shrink-0">BS</span>
                      <div>
                        <div class="font-extrabold text-slate-900">Bagus Setiawan</div>
                        <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1.5">
                          <span>NISN 0067241903</span>
                          <span>&bull;</span>
                          <span class="px-1.5 py-0.5 rounded bg-sky-50 text-sky-700 font-extrabold text-[9px]">XII PPLG 1</span>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="py-3.5 px-3">
                    <div class="font-extrabold text-slate-800">PT Cyber Media Utama</div>
                    <div class="text-[10px] text-slate-400 mt-0.5">Pembimbing: Bayu Nugroho, M.Cs</div>
                  </td>
                  <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">83.20</td>
                  <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">82.50</td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-lg bg-slate-100 border border-slate-200 text-slate-800 font-black text-xs">
                      82.90
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-extrabold text-[10px]">
                      Baik (B)
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">
                      Lulus Sidang
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-extrabold text-[10px] whitespace-nowrap">
                      <i class="fa-solid fa-qrcode text-[9px]"></i>
                      Terbit BSrE
                    </span>
                  </td>
                </tr>

                <!-- Siswa 4: Dewi Anggraini -->
                <tr class="hover:bg-slate-50/70 align-middle">
                  <td class="py-3.5 pl-4 pr-2">
                    <input type="checkbox" checked class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B]">
                  </td>
                  <td class="py-3.5 px-3">
                    <div class="flex items-center gap-2.5">
                      <span class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-700 font-black text-[11px] flex items-center justify-center shrink-0">DA</span>
                      <div>
                        <div class="font-extrabold text-slate-900">Dewi Anggraini</div>
                        <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1.5">
                          <span>NISN 0065123899</span>
                          <span>&bull;</span>
                          <span class="px-1.5 py-0.5 rounded bg-sky-50 text-sky-700 font-extrabold text-[9px]">XII PPLG 1</span>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="py-3.5 px-3">
                    <div class="font-extrabold text-slate-800">PT Solusi Teknologi Nusantara</div>
                    <div class="text-[10px] text-slate-400 mt-0.5">Pembimbing: Nita Kurnia, S.Sn</div>
                  </td>
                  <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">91.80</td>
                  <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">90.50</td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-lg bg-sky-50 border border-sky-200 text-sky-800 font-black text-xs">
                      91.20
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 font-extrabold text-[10px]">
                      Amat Baik (A)
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">
                      Lulus Sidang
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-extrabold text-[10px] whitespace-nowrap">
                      <i class="fa-solid fa-qrcode text-[9px]"></i>
                      Terbit BSrE
                    </span>
                  </td>
                </tr>

                <!-- Siswa 5: Fani Rahmawati -->
                <tr class="hover:bg-slate-50/70 align-middle">
                  <td class="py-3.5 pl-4 pr-2">
                    <input type="checkbox" checked class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B]">
                  </td>
                  <td class="py-3.5 px-3">
                    <div class="flex items-center gap-2.5">
                      <span class="w-8 h-8 rounded-full bg-cyan-100 text-cyan-700 font-black text-[11px] flex items-center justify-center shrink-0">FR</span>
                      <div>
                        <div class="font-extrabold text-slate-900">Fani Rahmawati</div>
                        <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1.5">
                          <span>NISN 0078942301</span>
                          <span>&bull;</span>
                          <span class="px-1.5 py-0.5 rounded bg-sky-50 text-sky-700 font-extrabold text-[9px]">XII PPLG 1</span>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="py-3.5 px-3">
                    <div class="font-extrabold text-slate-800">PT Solusi Teknologi Nusantara</div>
                    <div class="text-[10px] text-slate-400 mt-0.5">Pembimbing: Hendra Gunawan, S.Kom</div>
                  </td>
                  <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">89.20</td>
                  <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">89.00</td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-lg bg-sky-50 border border-sky-200 text-sky-800 font-black text-xs">
                      89.10
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 font-extrabold text-[10px]">
                      Amat Baik (A)
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">
                      Lulus Sidang
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-extrabold text-[10px] whitespace-nowrap">
                      <i class="fa-solid fa-qrcode text-[9px]"></i>
                      Terbit BSrE
                    </span>
                  </td>
                </tr>

                <!-- Siswa 6: Dimas Setiawan (Highlight Warning Remedial) -->
                <tr class="bg-amber-50/35 hover:bg-amber-50/60 align-middle">
                  <td class="py-3.5 pl-4 pr-2">
                    <input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300 text-[#13294B]">
                  </td>
                  <td class="py-3.5 px-3">
                    <div class="flex items-center gap-2.5">
                      <span class="w-8 h-8 rounded-full bg-amber-100 text-amber-800 font-black text-[11px] flex items-center justify-center shrink-0">DS</span>
                      <div>
                        <div class="font-extrabold text-slate-900">Dimas Setiawan</div>
                        <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1.5">
                          <span>NISN 0067415880</span>
                          <span>&bull;</span>
                          <span class="px-1.5 py-0.5 rounded bg-sky-50 text-sky-700 font-extrabold text-[9px]">XII PPLG 1</span>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="py-3.5 px-3">
                    <div class="font-extrabold text-slate-800">PT Solusi Teknologi Nusantara</div>
                    <div class="text-[10px] text-slate-400 mt-0.5">Pembimbing: Hendra Gunawan, S.Kom</div>
                  </td>
                  <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">79.60</td>
                  <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">80.00</td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-lg bg-amber-100 border border-amber-300 text-amber-900 font-black text-xs">
                      79.80
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-amber-50 border border-amber-200 text-amber-800 font-extrabold text-[10px]">
                      Cukup (C)
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-full bg-rose-50 border border-rose-200 text-rose-700 font-bold text-[10px] leading-tight">
                      Perlu Revisi Bab 4
                    </span>
                  </td>
                  <td class="py-3.5 px-3 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-full bg-slate-100 text-slate-500 font-bold text-[10px] leading-tight">
                      Menunggu Sertifikat
                    </span>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

          <!-- PAGINATION -->
          <div class="px-5 py-3.5 bg-slate-50/70 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3 text-[11px]">
            <span class="text-slate-500">
              Menampilkan data <strong class="text-slate-800">1-6</strong> dari <strong class="text-slate-800">36</strong> siswa rombel XII PPLG 1
            </span>
            <div class="flex items-center gap-1">
              <button type="button" class="w-7 h-7 rounded-lg bg-white border border-slate-200 text-slate-400 flex items-center justify-center">
                <i class="fa-solid fa-chevron-left text-[9px]"></i>
              </button>
              <button type="button" class="w-7 h-7 rounded-lg bg-[#13294B] text-white font-extrabold">1</button>
              <button type="button" class="w-7 h-7 rounded-lg bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-bold">2</button>
              <button type="button" class="w-7 h-7 rounded-lg bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 font-bold">3</button>
              <button type="button" class="w-7 h-7 rounded-lg bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 flex items-center justify-center">
                <i class="fa-solid fa-chevron-right text-[9px]"></i>
              </button>
            </div>
          </div>
        </section>

        <!-- 7. BAGIAN BAWAH: GENERATOR SERTIFIKAT DIGITAL MASAL & RUMUS PEMBOBOTAN -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-stretch">

          <!-- Kiri (7 Kolom): Generator Sertifikat Digital Masal -->
          <section class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-4">
            <div class="space-y-4">
              <div class="flex flex-wrap items-center justify-between gap-2">
                <div class="flex items-center gap-2">
                  <i class="fa-solid fa-award text-sky-700 text-base"></i>
                  <h2 class="text-sm font-black text-slate-900">Generator Sertifikat Digital Masal</h2>
                </div>
                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
                  <i class="fa-solid fa-circle-check text-[9px]"></i>
                  BSrE / BSSN Tersertifikasi
                </span>
              </div>

              <p class="text-[11px] text-slate-500 leading-relaxed">
                Penerbitan otomatis sertifikat kompetensi industri dengan enkripsi QR-Code resmi, nomor seri nasional, dan tanda tangan digital Kepala Sekolah.
              </p>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <!-- Format Nomor Seri -->
                <div class="p-3.5 rounded-xl bg-slate-50/90 border border-slate-200/80 space-y-2">
                  <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">
                    FORMAT NOMOR SERI REGISTRASI
                  </div>
                  <div class="px-2.5 py-1.5 rounded-lg bg-white border border-slate-200 text-[10px] font-mono font-extrabold text-slate-800 truncate">
                    PKL-2025/SMKN1BTM/PPLG/0042
                  </div>
                  <p class="text-[10px] text-slate-400 leading-snug">
                    Generate otomatis sesuai kodefikasi Dapodik SMK
                  </p>
                </div>

                <!-- Spesimen Stempel & QR -->
                <div class="p-3.5 rounded-xl bg-slate-50/90 border border-slate-200/80 flex items-center justify-between gap-3">
                  <div class="space-y-1 min-w-0">
                    <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">
                      SPESIMEN STEMPEL &amp; QR
                    </div>
                    <div class="text-xs font-extrabold text-slate-900">Stempel Resmi SMKN 1 Batam</div>
                    <div class="text-[10px] text-slate-400 truncate">Link validasi publik: pkl.smkn1batam.sch.id/v/...</div>
                  </div>
                  <div class="w-12 h-12 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-800 text-2xl shrink-0">
                    <i class="fa-solid fa-qrcode"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="pt-3 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3">
              <span class="text-[11px] font-bold text-emerald-700 flex items-center gap-1.5">
                <i class="fa-regular fa-circle-check"></i>
                <span>Sertifikat diakui Ditjen Vokasi &amp; KADIN</span>
              </span>

              <div class="flex flex-wrap items-center gap-2">
                <button type="button" onclick="alert('Membuka editor template sertifikat digital PKL...')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-bold text-slate-700 transition">
                  Sesuaikan Template
                </button>
                <button type="button" onclick="alert('Memproses penerbitan 36 lembar sertifikat rombel XII PPLG 1...')" class="px-3.5 py-1.5 rounded-lg bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-extrabold transition">
                  Proses Terbit 36 Lembar Rombel Ini
                </button>
              </div>
            </div>
          </section>

          <!-- Kanan (5 Kolom): Rumus Pembobotan Nilai Akhir PKL -->
          <section class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col justify-between space-y-4">
            <div class="space-y-3.5">
              <div class="flex items-start justify-between gap-2">
                <div class="flex items-center gap-2">
                  <i class="fa-solid fa-calculator text-[#13294B] text-sm"></i>
                  <h2 class="text-sm font-black text-slate-900">Rumus Pembobotan Nilai Akhir PKL</h2>
                </div>
                <span class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400 text-right">
                  PERMENDIKBUDRISTEK NO. 50/2020 &amp; KURIKULUM MERDEKA
                </span>
              </div>

              <!-- Box Formula Utama -->
              <div class="p-4 rounded-xl bg-slate-50/90 border border-slate-200/80 text-center space-y-2">
                <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">
                  FORMULA BAKU VOKASI
                </div>
                <div class="flex flex-wrap items-center justify-center gap-2 text-xs sm:text-sm font-black">
                  <span class="px-2 py-1 rounded bg-white border border-slate-200 text-slate-900">NA</span>
                  <span class="text-slate-400">=</span>
                  <span class="px-2.5 py-1 rounded bg-sky-50 border border-sky-200 text-sky-800">(N.DUDI &times; 60%)</span>
                  <span class="text-slate-400">+</span>
                  <span class="px-2.5 py-1 rounded bg-indigo-50 border border-indigo-200 text-indigo-800">(N.Sekolah &times; 40%)</span>
                </div>
                <div class="text-[10px] font-bold text-slate-500 pt-0.5">
                  Kriteria Ketuntasan Minimal (KKM): <strong class="text-slate-800">75.00</strong>
                </div>
              </div>

              <!-- 2 Kolom Bobot -->
              <div class="grid grid-cols-2 gap-3 text-xs">
                <div class="p-3 rounded-xl bg-sky-50/60 border border-sky-200/70 space-y-1">
                  <div class="text-[10px] font-extrabold text-sky-800 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-sky-600"></span>
                    <span>NILAI DUDI (60%)</span>
                  </div>
                  <p class="text-[10px] text-slate-600 leading-relaxed">
                    Hard skills teknis, etika kerja, kedisiplinan, adaptasi industri.
                  </p>
                </div>

                <div class="p-3 rounded-xl bg-indigo-50/60 border border-indigo-200/70 space-y-1">
                  <div class="text-[10px] font-extrabold text-indigo-800 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                    <span>NILAI SEKOLAH (40%)</span>
                  </div>
                  <p class="text-[10px] text-slate-600 leading-relaxed">
                    Laporan magang, jurnal berkala, dan ujian presentasi sidang PKL.
                  </p>
                </div>
              </div>
            </div>

            <!-- Catatan Kunci Nilai -->
            <div class="p-3 rounded-xl bg-sky-50/80 border border-sky-200/80 flex items-center gap-2.5 text-[11px] text-slate-700">
              <i class="fa-solid fa-circle-info text-sky-700 text-sm shrink-0"></i>
              <span>Nilai yang sudah terbit sertifikat akan terkunci otomatis dari penyesuaian manual.</span>
            </div>
          </section>

        </div>

      </main>
    </div>

  </div>

</body>
</html>