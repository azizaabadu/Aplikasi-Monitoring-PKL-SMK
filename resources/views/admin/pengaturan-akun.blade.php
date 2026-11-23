<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaturan Sekolah, Sinkronisasi Sistem &amp; Akun Administrator - Portal PKL.ID</title>
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

          <a href="{{ route('admin.rekapitulasi-nilai') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-slate-300 hover:bg-white/5 hover:text-white transition">
            <i class="fa-solid fa-award w-4 text-center text-slate-400"></i>
            <span>Rekapitulasi Nilai &amp; Sertifikat</span>
          </a>

          <!-- Menu Aktif: Pengaturan Sekolah & Akun -->
          <a href="{{ route('admin.pengaturan-akun') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg bg-[#1E3F73] text-white font-bold shadow-sm">
            <i class="fa-solid fa-gear w-4 text-center text-sky-300"></i>
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

        <!-- 1. BREADCRUMB & STATUS SINKRONISASI -->
        <div class="flex flex-wrap items-center justify-between gap-3">
          <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
              <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
              <span>Beranda</span>
            </a>
            <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
            <span class="font-bold text-slate-800">Pengaturan Sekolah &amp; Akun</span>
          </div>

          <div class="flex flex-wrap items-center gap-2.5 text-[11px]">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold tracking-wide">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
              SINKRONISASI AKTIF: 14 MENIT LALU
            </span>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">
              ID UNIT: SMKN1-BTM-HUBIN
            </span>
          </div>
        </div>

        <!-- 2. HERO HEADER & TOMBOL AKSI UTAMA -->
        <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
          <div class="space-y-2.5 max-w-2xl">
            <div class="flex flex-wrap items-center gap-2">
              <span class="px-2.5 py-0.5 rounded bg-slate-100 border border-slate-200 text-slate-700 text-[9px] font-extrabold uppercase tracking-wider">
                SISTEM TATA KELOLA PKL VOKASI
              </span>
              <span class="px-2.5 py-0.5 rounded bg-sky-50 border border-sky-200 text-sky-700 text-[9px] font-extrabold tracking-wider">
                v2.4.8-RELEASE
              </span>
            </div>

            <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
              Pengaturan Sekolah, Sinkronisasi Sistem &amp; Akun Administrator
            </h1>

            <p class="text-xs text-slate-500 leading-relaxed">
              Konfigurasi profil kelembagaan SMK Negeri 1 Batam, manajemen integrasi API Kemendikbudristek/Dapodik/BSrE, parameter periode PKL Tahun Ajaran 2024/2025, serta pengaturan hak akses pengguna.
            </p>
          </div>

          <div class="flex flex-wrap items-center gap-2.5 shrink-0">
            <button type="button" onclick="alert('Membuka riwayat log aktivitas sistem & konfigurasi...')" class="px-4 py-2.5 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center gap-2 transition">
              <i class="fa-solid fa-clock-rotate-left text-slate-500 text-xs"></i>
              <span>Riwayat Log Aktivitas</span>
            </button>

            <button type="button" onclick="alert('Seluruh pengaturan sekolah, sinkronisasi, dan periode PKL berhasil disimpan.')" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center gap-2 shadow-xs transition">
              <i class="fa-regular fa-floppy-disk text-xs text-sky-300"></i>
              <span>Simpan Seluruh Pengaturan</span>
            </button>
          </div>
        </div>

        <!-- 3. TAB NAVIGASI PENGATURAN -->
        <div class="bg-white rounded-2xl border border-slate-200/90 p-2 shadow-xs overflow-x-auto">
          <div class="flex items-center gap-1.5 min-w-max text-xs">
            <button type="button" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold flex items-center gap-2 shadow-2xs">
              <i class="fa-solid fa-school text-[11px] text-sky-300"></i>
              <span>1. Profil Sekolah &amp; Legalitas</span>
            </button>

            <button type="button" onclick="alert('Menampilkan bagian 2: Sinkronisasi API Dapodik & Vokasi di panel kanan.')" class="px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-700 font-bold flex items-center gap-2 transition">
              <i class="fa-solid fa-arrows-rotate text-[11px] text-slate-400"></i>
              <span>2. Sinkronisasi API Dapodik &amp; Vokasi</span>
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            </button>

            <button type="button" onclick="alert('Menampilkan bagian 3: Parameter Periode Pelaksanaan & Bobot Nilai PKL.')" class="px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-700 font-bold flex items-center gap-2 transition">
              <i class="fa-regular fa-calendar-days text-[11px] text-slate-400"></i>
              <span>3. Periode &amp; Bobot Penilaian PKL</span>
            </button>

            <button type="button" onclick="alert('Membuka manajemen akun & hak akses administrator/pembimbing...')" class="px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-700 font-bold flex items-center gap-2 transition">
              <i class="fa-solid fa-users-gear text-[11px] text-slate-400"></i>
              <span>4. Manajemen Akun &amp; Akses</span>
            </button>
          </div>
        </div>

        <!-- 4. GRID KONTEN UTAMA (KIRI 7 KOLOM | KANAN 5 KOLOM) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-start">

          <!-- KOLOM KIRI (7/12): BAGIAN 1 & BAGIAN 3 -->
          <div class="lg:col-span-7 space-y-5">

            <!-- BAGIAN 1: DATA IDENTITAS SATUAN PENDIDIKAN -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-5">
              <div class="flex flex-wrap items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                  <span class="w-9 h-9 rounded-xl bg-sky-50 text-sky-700 flex items-center justify-center text-sm shrink-0 mt-0.5">
                    <i class="fa-solid fa-building-columns"></i>
                  </span>
                  <div>
                    <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">BAGIAN 1</div>
                    <h2 class="text-sm sm:text-base font-black text-slate-900">Data Identitas Satuan Pendidikan</h2>
                  </div>
                </div>

                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold shrink-0">
                  <i class="fa-solid fa-circle-check text-[9px]"></i>
                  TERVERIFIKASI BAN-S/M
                </span>
              </div>

              <!-- Nama Lembaga & NPSN -->
              <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 text-xs">
                <div class="sm:col-span-8 space-y-1.5">
                  <label class="block text-[11px] font-bold text-slate-600">Nama Resmi Lembaga / Satuan Pendidikan</label>
                  <div class="relative">
                    <i class="fa-solid fa-school absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                    <input
                      type="text"
                      value="SMK Negeri 1 Batam"
                      class="w-full pl-9 pr-4 py-2.5 bg-slate-50/80 border border-slate-200 rounded-xl text-xs font-extrabold text-slate-900 focus:bg-white focus:outline-none focus:border-sky-500"
                    >
                  </div>
                </div>

                <div class="sm:col-span-4 space-y-1.5">
                  <label class="block text-[11px] font-bold text-slate-600">NPSN (Nomor Pokok)</label>
                  <div class="relative">
                    <i class="fa-regular fa-id-card absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                    <input
                      type="text"
                      value="10403982"
                      class="w-full pl-9 pr-4 py-2.5 bg-slate-50/80 border border-slate-200 rounded-xl text-xs font-extrabold text-slate-900 focus:bg-white focus:outline-none focus:border-sky-500"
                    >
                  </div>
                </div>
              </div>

              <!-- Bentuk Pendidikan & Status Akreditasi -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                <div class="space-y-1.5">
                  <label class="block text-[11px] font-bold text-slate-600">Bentuk Pendidikan</label>
                  <select class="w-full px-3.5 py-2.5 bg-slate-50/80 border border-slate-200 rounded-xl text-xs font-bold text-slate-800 focus:bg-white focus:outline-none focus:border-sky-500">
                    <option selected>Sekolah Menengah Kejuruan (SMK)</option>
                    <option>Madrasah Aliyah Kejuruan (MAK)</option>
                  </select>
                </div>

                <div class="space-y-1.5">
                  <label class="block text-[11px] font-bold text-slate-600">Status Akreditasi &amp; No. SK</label>
                  <div class="px-3.5 py-2.5 rounded-xl bg-emerald-50/70 border border-emerald-200/80 text-emerald-800 text-[11px] font-extrabold flex items-center gap-2">
                    <i class="fa-solid fa-award text-emerald-600 shrink-0"></i>
                    <span>Terakreditasi A (Unggul) &bull; 1347/BAN-SM/SK/2021</span>
                  </div>
                </div>
              </div>

              <!-- Kepala Sekolah & Koordinator Hubin -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                <div class="p-3.5 rounded-xl bg-slate-50/80 border border-slate-200/80 space-y-1">
                  <div class="flex items-center justify-between text-[9px] font-extrabold uppercase tracking-wider text-slate-400">
                    <span>KEPALA SEKOLAH</span>
                    <i class="fa-solid fa-user-tie text-slate-400 text-xs"></i>
                  </div>
                  <div class="text-xs font-black text-slate-900">Dr. Ir. Dwi Santoso, M.T.</div>
                  <div class="text-[10px] text-slate-500 font-medium">NIP. 19740912 199803 1 002</div>
                </div>

                <div class="p-3.5 rounded-xl bg-slate-50/80 border border-slate-200/80 space-y-1">
                  <div class="flex items-center justify-between text-[9px] font-extrabold uppercase tracking-wider text-slate-400">
                    <span>KOORDINATOR HUBIN &amp; KERJASAMA</span>
                    <i class="fa-solid fa-handshake text-sky-600 text-xs"></i>
                  </div>
                  <div class="text-xs font-black text-slate-900">Drs. H. Mulyadi, M.T.</div>
                  <div class="text-[10px] text-slate-500 font-medium">NIP. 19710404 199702 1 001</div>
                </div>
              </div>

              <!-- Alamat Domisili Kampus -->
              <div class="space-y-1.5 text-xs">
                <label class="block text-[11px] font-bold text-slate-600">Alamat Domisili Kampus</label>
                <div class="relative">
                  <i class="fa-solid fa-location-dot absolute left-3.5 top-3 text-slate-400 text-xs"></i>
                  <textarea
                    rows="2"
                    class="w-full pl-9 pr-4 py-2 bg-slate-50/80 border border-slate-200 rounded-xl text-xs font-semibold text-slate-700 focus:bg-white focus:outline-none focus:border-sky-500"
                  >Jl. Prof. Dr. Hamka No. 1, Kibing, Batu Aji, Kota Batam, Kepulauan Riau 29422</textarea>
                </div>
              </div>

              <!-- Kontak Sekolah: Telepon, Email, Portal -->
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
                <div class="p-3 rounded-xl bg-slate-50/80 border border-slate-200/80 flex items-center gap-2.5 min-w-0">
                  <i class="fa-solid fa-phone text-slate-400 text-xs shrink-0"></i>
                  <div class="min-w-0">
                    <div class="text-[9px] font-bold text-slate-400">Telepon Resmi</div>
                    <div class="text-[11px] font-extrabold text-slate-800 truncate">(0778) 365939</div>
                  </div>
                </div>

                <div class="p-3 rounded-xl bg-slate-50/80 border border-slate-200/80 flex items-center gap-2.5 min-w-0">
                  <i class="fa-regular fa-envelope text-slate-400 text-xs shrink-0"></i>
                  <div class="min-w-0">
                    <div class="text-[9px] font-bold text-slate-400">Email Korespondensi</div>
                    <div class="text-[11px] font-extrabold text-slate-800 truncate">info@smkn1btm.sch.id</div>
                  </div>
                </div>

                <div class="p-3 rounded-xl bg-slate-50/80 border border-slate-200/80 flex items-center gap-2.5 min-w-0">
                  <i class="fa-solid fa-globe text-slate-400 text-xs shrink-0"></i>
                  <div class="min-w-0">
                    <div class="text-[9px] font-bold text-slate-400">Portal Domain</div>
                    <div class="text-[11px] font-extrabold text-slate-800 truncate">www.smkn1btm.sch.id</div>
                  </div>
                </div>
              </div>
            </section>

            <!-- BAGIAN 3: PARAMETER PERIODE PELAKSANAAN & BOBOT NILAI -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-5">
              <div class="flex flex-wrap items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                  <span class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-700 flex items-center justify-center text-sm shrink-0 mt-0.5">
                    <i class="fa-regular fa-calendar-check"></i>
                  </span>
                  <div>
                    <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">BAGIAN 3</div>
                    <h2 class="text-sm sm:text-base font-black text-slate-900">Parameter Periode Pelaksanaan &amp; Bobot Nilai</h2>
                  </div>
                </div>

                <span class="px-3 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-800 text-[10px] font-extrabold shrink-0">
                  SEMESTER GENAP T.A. 2024/2025
                </span>
              </div>

              <!-- 3 Box Tanggal & Durasi -->
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5 text-xs">
                <div class="p-3.5 rounded-xl bg-slate-50/80 border border-slate-200/80 space-y-1">
                  <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">TANGGAL MULAI PKL</div>
                  <div class="text-xs font-black text-slate-900 flex items-center gap-1.5 pt-0.5">
                    <i class="fa-regular fa-calendar text-sky-600 text-xs"></i>
                    <span>02 Januari 2025</span>
                  </div>
                  <div class="text-[10px] text-slate-400">Penempatan Serentak Tahap I</div>
                </div>

                <div class="p-3.5 rounded-xl bg-slate-50/80 border border-slate-200/80 space-y-1">
                  <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">TANGGAL SELESAI PKL</div>
                  <div class="text-xs font-black text-slate-900 flex items-center gap-1.5 pt-0.5">
                    <i class="fa-regular fa-calendar text-sky-600 text-xs"></i>
                    <span>24 Juni 2025</span>
                  </div>
                  <div class="text-[10px] text-slate-400">Penarikan &amp; Sidang Laporan</div>
                </div>

                <div class="p-3.5 rounded-xl bg-teal-50/70 border border-teal-200/80 space-y-1">
                  <div class="text-[9px] font-extrabold uppercase tracking-wider text-teal-700">TOTAL DURASI KALENDER</div>
                  <div class="text-sm font-black text-teal-900 flex items-center gap-1.5 pt-0.5">
                    <i class="fa-regular fa-clock text-teal-600 text-xs"></i>
                    <span>6 Bulan</span>
                  </div>
                  <div class="text-[10px] font-bold text-teal-700">24 Pekan / 120 Hari Kerja</div>
                </div>
              </div>

              <!-- Beban Jam Kerja Efektif & KKM -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                <div class="p-4 rounded-xl bg-slate-50/80 border border-slate-200/80 flex items-center justify-between gap-3">
                  <div class="space-y-1">
                    <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">BEBAN JAM KERJA EFEKTIF</div>
                    <div class="flex items-baseline gap-1.5">
                      <span class="text-2xl font-black text-slate-900">800</span>
                      <span class="text-[11px] font-bold text-slate-600">Jam Pelajaran (JP)</span>
                    </div>
                    <div class="text-[10px] text-slate-400">Sesuai Permendikbudristek No. 50/2020</div>
                  </div>
                  <span class="w-9 h-9 rounded-full bg-white border border-slate-200 text-slate-500 flex items-center justify-center text-xs shrink-0">
                    <i class="fa-regular fa-clock"></i>
                  </span>
                </div>

                <div class="p-4 rounded-xl bg-slate-50/80 border border-slate-200/80 flex items-center justify-between gap-3">
                  <div class="space-y-1">
                    <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">KRITERIA KELULUSAN MINIMAL (KKM)</div>
                    <div class="flex items-baseline gap-1">
                      <span class="text-2xl font-black text-emerald-600">75.00</span>
                      <span class="text-[11px] font-semibold text-slate-400">/ 100.00</span>
                    </div>
                    <div class="text-[10px] text-slate-400">Nilai Gabungan DUDI + Penguji</div>
                  </div>
                  <span class="w-9 h-9 rounded-full bg-white border border-slate-200 text-amber-500 flex items-center justify-center text-xs shrink-0">
                    <i class="fa-solid fa-star"></i>
                  </span>
                </div>
              </div>

              <!-- Formula Pembobotan Skor Sertifikasi -->
              <div class="p-4 rounded-xl bg-slate-50/90 border border-slate-200/80 space-y-3 text-xs">
                <div class="flex flex-wrap items-center justify-between gap-2">
                  <span class="text-xs font-black text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-sliders text-sky-700 text-xs"></i>
                    <span>Formula Pembobotan Skor Sertifikasi</span>
                  </span>
                  <span class="text-[10px] font-mono font-bold text-slate-500">
                    Formula: (N.DUDI &times; 0.6) + (N.SEKOLAH &times; 0.4)
                  </span>
                </div>

                <div class="grid grid-cols-2 gap-2">
                  <div class="px-3 py-2 rounded-lg bg-[#13294B] text-white flex items-center justify-between text-[11px] font-extrabold">
                    <span class="truncate">Evaluasi Mitra DUDI</span>
                    <span class="ml-2 shrink-0">60%</span>
                  </div>
                  <div class="px-3 py-2 rounded-lg bg-sky-100 border border-sky-200 text-sky-900 flex items-center justify-between text-[11px] font-extrabold">
                    <span class="truncate">Evaluasi Guru &amp; Laporan</span>
                    <span class="ml-2 shrink-0">40%</span>
                  </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                  <div class="p-3 rounded-xl bg-white border border-slate-200/80 space-y-1">
                    <div class="text-[10px] font-extrabold text-slate-800">Komponen Penilaian DUDI</div>
                    <div class="text-[10px] text-slate-500 leading-relaxed">
                      Etika Kerja, Keahlian Teknis, Tanggung Jawab
                    </div>
                  </div>

                  <div class="p-3 rounded-xl bg-white border border-slate-200/80 space-y-1">
                    <div class="text-[10px] font-extrabold text-slate-800">Komponen Penilaian Sekolah</div>
                    <div class="text-[10px] text-slate-500 leading-relaxed">
                      Jurnal Logbook, Sidang PKL, Soft Skills
                    </div>
                  </div>
                </div>
              </div>
            </section>

          </div>

          <!-- KOLOM KANAN (5/12): BAGIAN 2, BAGIAN 4, AKTIVITAS SESI ADMIN -->
          <div class="lg:col-span-5 space-y-5">

            <!-- BAGIAN 2: API DAPODIK & DITJEN VOKASI -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-4">
              <div class="flex items-start justify-between gap-2">
                <div class="flex items-start gap-3">
                  <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-sm shrink-0 mt-0.5">
                    <i class="fa-solid fa-server"></i>
                  </span>
                  <div>
                    <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">BAGIAN 2</div>
                    <h2 class="text-sm sm:text-base font-black text-slate-900">API Dapodik &amp; Ditjen Vokasi</h2>
                  </div>
                </div>

                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold shrink-0">
                  <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                  TERHUBUNG AKTIF
                </span>
              </div>

              <div class="space-y-3 text-xs">
                <!-- Server Host API -->
                <div class="space-y-1">
                  <label class="block text-[10px] font-bold text-slate-500">Dapodik Server Host API</label>
                  <div class="flex items-center justify-between px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 font-mono text-[11px] font-bold text-slate-700">
                    <span class="truncate">https://api.vokasi.kemdikbud.go.id/v2</span>
                    <button type="button" onclick="alert('Endpoint API disalin.')" class="text-slate-400 hover:text-slate-700 ml-2 shrink-0">
                      <i class="fa-regular fa-copy"></i>
                    </button>
                  </div>
                </div>

                <!-- Client Secret -->
                <div class="space-y-1">
                  <div class="flex items-center justify-between text-[10px]">
                    <label class="font-bold text-slate-500">Client Secret &amp; Auth Token</label>
                    <span class="font-extrabold text-emerald-600">Enkripsi SHA-256</span>
                  </div>
                  <div class="flex items-center justify-between px-3 py-2 rounded-xl bg-slate-50 border border-slate-200 font-mono text-[11px] font-bold text-slate-700">
                    <span class="truncate">dapodik_live_sec_993481026...</span>
                    <button type="button" onclick="alert('Token terenkripsi demi keamanan sistem.')" class="text-slate-400 hover:text-slate-700 ml-2 shrink-0">
                      <i class="fa-regular fa-eye"></i>
                    </button>
                  </div>
                </div>

                <!-- Frekuensi Sinkron Otomatis -->
                <div class="p-3.5 rounded-xl bg-slate-50/90 border border-slate-200/80 flex items-center justify-between gap-3">
                  <div class="flex items-start gap-2.5">
                    <span class="w-7 h-7 rounded-lg bg-sky-100 text-sky-700 flex items-center justify-center text-xs shrink-0 mt-0.5">
                      <i class="fa-solid fa-rotate"></i>
                    </span>
                    <div>
                      <div class="text-xs font-extrabold text-slate-900">Frekuensi Sinkron Otomatis</div>
                      <div class="text-[10px] text-slate-500 leading-snug">Presensi harian, rombel, dan transkrip akhir</div>
                    </div>
                  </div>
                  <span class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-[10px] font-extrabold text-slate-800 shrink-0">
                    Setiap 6 Jam
                  </span>
                </div>
              </div>

              <!-- Tombol Uji Koneksi & Tarik Rombel -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 pt-1">
                <button type="button" onclick="alert('Koneksi ke API Dapodik & Ditjen Vokasi sukses (Latency: 42ms).')" class="px-3 py-2 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-bold text-slate-700 flex items-center justify-center gap-1.5 transition">
                  <i class="fa-solid fa-wave-square text-sky-600 text-xs"></i>
                  <span>Uji Koneksi API</span>
                </button>

                <button type="button" onclick="alert('Menarik data rombel & guru pembimbing terbaru...')" class="px-3 py-2 rounded-xl bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-extrabold flex items-center justify-center gap-1.5 transition">
                  <i class="fa-solid fa-download text-xs"></i>
                  <span>Tarik Rombel &amp; Guru</span>
                </button>
              </div>
            </section>

            <!-- BAGIAN 4: TANDA TANGAN ELEKTRONIK & BSRE -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs space-y-4">
              <div class="flex items-start justify-between gap-2">
                <div class="flex items-start gap-3">
                  <span class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-700 flex items-center justify-center text-sm shrink-0 mt-0.5">
                    <i class="fa-solid fa-file-signature"></i>
                  </span>
                  <div>
                    <div class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400">BAGIAN 4</div>
                    <h2 class="text-sm sm:text-base font-black text-slate-900">Tanda Tangan Elektronik &amp; BSRE</h2>
                  </div>
                </div>

                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold shrink-0">
                  <i class="fa-solid fa-shield-check text-[9px]"></i>
                  SERTIFIKAT VALID
                </span>
              </div>

              <!-- Info Sertifikat BSrE -->
              <div class="p-3.5 rounded-xl bg-slate-50/90 border border-slate-200/80 space-y-2 text-xs">
                <div class="flex items-start justify-between gap-2">
                  <div>
                    <div class="text-xs font-black text-slate-900">Balai Sertifikasi Elektronik (BSrE - BSSN)</div>
                    <div class="text-[10px] text-slate-500 mt-0.5 leading-snug">
                      Otoritas penerbit sertifikat digital untuk sertifikat PKL &amp; transkrip nilai terverifikasi.
                    </div>
                  </div>
                  <span class="px-2 py-0.5 rounded bg-indigo-100 text-indigo-800 text-[9px] font-extrabold shrink-0">
                    X.509 v3
                  </span>
                </div>

                <div class="pt-2 border-t border-slate-200/70 flex flex-wrap items-center justify-between gap-2 text-[10px]">
                  <span class="font-mono font-bold text-slate-700">Serial: 9021-TTE-BSRE-SMK1</span>
                  <span class="font-bold text-emerald-700">&bull; Masa Berlaku: 31 Des 2026</span>
                </div>
              </div>

              <!-- Pratinjau Spesimen Stempel & QR -->
              <div class="p-3.5 rounded-xl bg-slate-50/70 border border-slate-200/80 space-y-2.5 text-xs">
                <div class="flex items-center justify-between text-[10px]">
                  <span class="font-bold text-slate-500">Pratinjau Spesimen Stempel &amp; Tanda Tangan Resmi</span>
                  <span class="font-extrabold text-sky-700">QR Verification Ready</span>
                </div>

                <div class="p-3 rounded-xl bg-white border border-slate-200/90 flex items-center justify-between gap-3">
                  <div class="w-11 h-11 rounded-full border-2 border-dashed border-sky-700/50 text-sky-900 flex flex-col items-center justify-center text-[7px] font-black uppercase leading-none text-center shrink-0">
                    <span>SMKN 1</span>
                    <span class="mt-0.5">BATAM</span>
                  </div>

                  <div class="text-center min-w-0">
                    <div class="font-serif italic text-base text-slate-800 leading-none">Dwi Santoso</div>
                    <div class="text-[10px] font-black text-slate-900 mt-1 truncate">Dr. Ir. Dwi Santoso, M.T.</div>
                    <div class="text-[9px] text-slate-400 truncate">NIP. 19740912 199803 1 002</div>
                  </div>

                  <div class="text-center shrink-0">
                    <div class="w-10 h-10 rounded-lg bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-800 text-lg mx-auto">
                      <i class="fa-solid fa-qrcode"></i>
                    </div>
                    <div class="text-[8px] font-bold text-slate-400 mt-0.5">SCAN + VALID</div>
                  </div>
                </div>
              </div>

              <!-- Tombol Perbarui Sertifikat -->
              <div class="space-y-1.5">
                <button type="button" onclick="alert('Membuka unggah sertifikat digital BSrE (.p12 / .crt)...')" class="w-full py-2.5 px-4 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-extrabold text-slate-800 flex items-center justify-center gap-2 transition">
                  <i class="fa-solid fa-file-shield text-sky-700 text-xs"></i>
                  <span>Perbarui Sertifikat Digital BSrE (.p12 / .crt)</span>
                </button>
                <p class="text-[10px] text-slate-400 text-center">
                  Sertifikat digunakan otomatis saat mencetak Sertifikat PKL Digital bertanda tangan sah hukum.
                </p>
              </div>
            </section>

            <!-- AKTIVITAS SESI ADMIN SAAT INI -->
            <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3 text-xs">
              <div class="flex items-center justify-between">
                <h2 class="text-xs font-black text-slate-900 flex items-center gap-2">
                  <i class="fa-solid fa-shield-halved text-emerald-600"></i>
                  <span>Aktivitas Sesi Admin Saat Ini</span>
                </h2>
                <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 text-[10px] font-extrabold">
                  Aman
                </span>
              </div>

              <div class="space-y-2 text-[11px]">
                <div class="flex items-center justify-between gap-2 py-1 border-b border-slate-100">
                  <span class="text-slate-400">Alamat IP Akses:</span>
                  <span class="font-mono font-extrabold text-slate-800">103.164.172.82 (Batam Gateway)</span>
                </div>
                <div class="flex items-center justify-between gap-2 py-1 border-b border-slate-100">
                  <span class="text-slate-400">Perangkat:</span>
                  <span class="font-bold text-slate-800">macOS Sonoma / Chrome 134.0 Enterprise</span>
                </div>
                <div class="flex items-center justify-between gap-2 py-1">
                  <span class="text-slate-400">Masa Berlaku Token Sesi:</span>
                  <span class="font-extrabold text-slate-800">05 Jam 42 Menit</span>
                </div>
              </div>
            </section>

          </div>
        </div>

        <!-- 5. BANNER BAWAH SMKN 1 BATAM ENTERPRISE HUB -->
        <section class="rounded-2xl bg-[#13294B] text-white p-4 sm:px-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-xs">
          <div class="flex items-start sm:items-center gap-3.5">
            <div class="w-10 h-10 rounded-xl bg-white/10 text-sky-300 flex items-center justify-center text-base shrink-0">
              <i class="fa-solid fa-diagram-project"></i>
            </div>
            <div>
              <h3 class="text-xs sm:text-sm font-extrabold">SMKN 1 Batam Enterprise Hub</h3>
              <p class="text-[11px] text-slate-300 mt-0.5">
                Terhubung dengan 142 Mitra Industri Multinasional &amp; Galangan Kapal Batu Ampar &bull; Mukakuning
              </p>
            </div>
          </div>

          <div class="sm:text-right shrink-0">
            <div class="text-xl font-black tracking-tight text-white leading-none">872</div>
            <div class="text-[9px] font-extrabold uppercase tracking-wider text-sky-300 mt-1">
              SISWA AKTIF TERPLOT
            </div>
          </div>
        </section>

      </main>
    </div>

  </div>

</body>
</html>