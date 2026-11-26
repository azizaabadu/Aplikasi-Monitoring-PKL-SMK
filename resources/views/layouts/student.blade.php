<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal PKL.ID - Vokasi Nasional')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome CDN (Icon Lengkap) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-900 antialiased">

  <div class="flex min-h-screen">

    <!-- SIDEBAR NAVIGASI KIRI (TETAP DIAM SAAT KONTEN DI-SCROLL) -->
    <aside class="sticky top-0 h-screen w-64 bg-[#0F1E38] text-slate-300 flex flex-col justify-between hidden lg:flex shrink-0 border-r border-slate-800 z-30 self-start">
      <div class="min-h-0 flex-1 p-6 space-y-6 overflow-y-auto">
        <!-- Logo Portal -->
        @include('layouts.partials.brand', ['href' => route('siswa.dashboard'), 'caption' => 'Portal Monitoring Vokasi'])

        <!-- Menu Navigasi -->
        <nav class="space-y-1.5 text-xs font-semibold">
          <div class="text-[10px] uppercase tracking-wider text-slate-500 font-bold px-3 pb-1">Navigasi Siswa</div>

          <a href="{{ route('siswa.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('siswa.dashboard') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-house w-4 text-center"></i> Beranda / Dashboard
          </a>
          <a href="{{ route('siswa.checkin') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('siswa.checkin') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-fingerprint w-4 text-center"></i> Presensi & Kehadiran
          </a>
          <a href="{{ route('siswa.logbook') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('siswa.logbook') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-book-open w-4 text-center"></i> Jurnal & Logbook
          </a>
          <a href="{{ route('siswa.penempatan') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('siswa.penempatan') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-building w-4 text-center"></i> Data Siswa & DUDI
          </a>
          <a href="{{ route('siswa.penilaian') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('siswa.penilaian') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-award w-4 text-center"></i> Penilaian & Sertifikat
          </a>
          <a href="{{ route('siswa.laporan') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('siswa.laporan') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-file-pdf w-4 text-center"></i> Laporan & Rekapitulasi
          </a>
          <a href="{{ route('siswa.pengaturan') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('siswa.pengaturan') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-gear w-4 text-center"></i> Pengaturan
          </a>
        </nav>
      </div>

      <!-- Footer Sidebar (Info Sekolah & Tombol Keluar) -->
      <div class="p-6 space-y-4 border-t border-slate-800 bg-[#0A1527] shrink-0">
        <div class="text-xs">
          <div class="font-extrabold text-white">SMK Negeri 1 Batam</div>
          <div class="text-[10px] text-slate-400">NPSN: 10403982 • Terakreditasi</div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 border border-rose-500/20 font-bold text-xs transition flex items-center justify-center gap-2">
            <i class="fa-solid fa-right-from-bracket"></i> Keluar / Log Out
          </button>
        </form>
      </div>
    </aside>

    <!-- KONTEN UTAMA (TERMASUK HEADER DINAMIS) -->
    <div class="flex min-h-screen min-w-0 flex-1 flex-col">

      <!-- HEADER UTAMA -->
      <header class="bg-white border-b border-slate-200/80 shrink-0 z-30 px-6 py-3.5 flex items-center justify-between gap-4 shadow-sm">

        <!-- 1. Kotak Pencarian Global -->
        <div class="relative flex-1 max-w-md">
          <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
            <i class="fa-solid fa-magnifying-glass text-xs"></i>
          </span>
          <input type="text" placeholder="Cari riwayat logbook, umpan balik, atau tugas PKL..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium focus:outline-none focus:border-sky-500 focus:bg-white transition" onkeyup="handleGlobalSearch(event)" />
        </div>

        <!-- 2. Navigasi Kanan Header -->
        <div class="flex items-center gap-3 shrink-0">

          <!-- Indikator Tahun Ajaran / Periode PKL -->
          <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-xl bg-sky-50 border border-sky-200 text-sky-800 text-xs font-extrabold">
            <i class="fa-regular fa-calendar-days text-sky-600"></i>
            <span>TA 2026/2027 Genap</span>
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse ml-0.5" title="Periode Aktif"></span>
          </div>

          <!-- Tombol Dropdown Notifikasi Real-Time -->
          <div class="relative" x-data="{ openNotif: false }">
            <button @click="openNotif = !openNotif" class="relative w-10 h-10 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-600 flex items-center justify-center transition focus:outline-none">
              <i class="fa-regular fa-bell"></i>
              <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-rose-500 text-white font-black text-[10px] flex items-center justify-center border-2 border-white shadow-sm">
                3
              </span>
            </button>

            <div x-show="openNotif" @click.away="openNotif = false" class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-200 p-3 space-y-2.5 z-50 text-xs" style="display: none;">
              <div class="flex items-center justify-between pb-2 border-b border-slate-100 font-extrabold text-slate-900">
                <span>Notifikasi Masuk</span>
                <span class="text-[10px] text-sky-600 cursor-pointer hover:underline">Tandai sudah dibaca</span>
              </div>
              <div class="space-y-2">
                <a href="{{ route('siswa.logbook') }}" class="block p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 transition space-y-1">
                  <div class="font-bold text-slate-800 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Logbook Disahkan DUDI
                  </div>
                  <p class="text-[11px] text-slate-500 truncate">Mentor DUDI (Ahmad Fauzi) telah mengesahkan jurnal harian...</p>
                  <div class="text-[9px] text-slate-400">10 menit yang lalu</div>
                </a>
                <a href="{{ route('siswa.laporan') }}" class="block p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 transition space-y-1">
                  <div class="font-bold text-slate-800 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-amber-500"></span> Catatan Revisi Laporan
                  </div>
                  <p class="text-[11px] text-slate-500 truncate">Guru Pembimbing (Dra. Sri) meninggalkan catatan pada Bab IV...</p>
                  <div class="text-[9px] text-slate-400">2 jam yang lalu</div>
                </a>
              </div>
            </div>
          </div>

          <!-- Profil Pengguna / Siswa -->
          <a href="{{ route('siswa.penempatan') }}" class="flex items-center gap-2.5 pl-2 py-1 rounded-xl hover:bg-slate-50 transition border border-transparent hover:border-slate-200">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-sky-600 to-[#0F1E38] text-white font-black text-xs flex items-center justify-center shadow-sm">
              RP
            </div>
            <div class="hidden md:block text-left">
              <div class="text-xs font-extrabold text-slate-900 leading-tight">Rizky Pratama</div>
              <div class="text-[10px] font-bold text-sky-700">Siswa PPLG</div>
            </div>
          </a>

        </div>
      </header>

      <!-- KONTEN UTAMA HALAMAN -->
      <main class="min-w-0 flex-1 p-6 sm:p-8">
        @yield('content')
      </main>

    </div>
  </div>

  <!-- AlpineJS untuk interaktivitas dropdown notifikasi -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  @stack('scripts')
  @vite('resources/js/app.js')
</body>
</html>
