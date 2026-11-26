<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Kepala Sekolah - PKL.ID')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome CDN (Icon Lengkap) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts Plus Jakarta Sans / Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 font-sans text-slate-900 antialiased overflow-hidden selection:bg-sky-500 selection:text-white">

  <div class="h-screen flex overflow-hidden">

    <!-- SIDEBAR NAVIGASI KIRI (SAMA PERSIS DENGAN ROLE LAINNYA) -->
    <aside class="w-64 h-screen bg-[#0F1E38] text-slate-300 flex flex-col justify-between hidden lg:flex shrink-0 border-r border-slate-800 z-30">
      <div class="p-6 space-y-6 overflow-y-auto">
        <!-- Logo Portal -->
        <div class="space-y-1">
          <a href="{{ route('kepsek.dashboard') }}" class="text-xl font-black tracking-wider text-white flex items-center gap-2">
            <i class="fa-solid fa-graduation-cap text-sky-400"></i> PKL.ID
          </a>
          <div class="text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Platform Monitoring Vokasi</div>
        </div>

        <!-- Menu Navigasi Sesuai PRD -->
        <nav class="space-y-1.5 text-xs font-semibold">
          <div class="text-[10px] uppercase tracking-wider text-slate-500 font-bold px-3 pb-1">Navigasi Kepala Sekolah</div>

          <!-- 1. Beranda / Dashboard -->
          <a href="{{ route('kepsek.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('kepsek.dashboard') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-house w-4 text-center"></i>
            <span>Beranda / Dashboard</span>
          </a>

          <!-- 2. Persetujuan Penempatan (PRD T6) -->
          <a href="{{ route('kepsek.penempatan') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('kepsek.penempatan') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-stamp w-4 text-center"></i>
            <span>Persetujuan Penempatan</span>
          </a>

          <!-- 3. Monitoring Presensi & Kehadiran (PRD K1) -->
          <a href="{{ route('kepsek.monitoring') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('kepsek.monitoring') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-fingerprint w-4 text-center"></i>
            <span>Monitoring Kehadiran</span>
          </a>

          <!-- 4. Rekapitulasi Nilai & Kelulusan (PRD N6) -->
          <a href="{{ route('kepsek.penilaian') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('kepsek.penilaian') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-award w-4 text-center"></i>
            <span>Rekapitulasi Nilai</span>
          </a>

          <!-- 5. Data Mitra & DUDI -->
          <a href="{{ route('kepsek.mitra') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('kepsek.mitra') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-building w-4 text-center"></i>
            <span>Data Mitra & DUDI</span>
          </a>

          <!-- 6. Pengaturan Profil & Keamanan -->
          <a href="{{ route('kepsek.pengaturan') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('kepsek.pengaturan') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-white/5 text-slate-300' }}">
            <i class="fa-solid fa-gear w-4 text-center"></i>
            <span>Pengaturan</span>
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

    <!-- KONTEN UTAMA (TERMASUK HEADER TOPBAR) -->
    <div class="flex-1 flex flex-col h-screen min-w-0 overflow-hidden">

      <!-- HEADER UTAMA -->
      <header class="bg-white border-b border-slate-200/80 shrink-0 z-30 px-6 py-3.5 flex items-center justify-between gap-4 shadow-sm">
        
        <!-- Sisi Kiri: Tombol Mobile Menu & Judul Panel -->
        <div class="flex items-center gap-3">
          <button type="button" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 text-slate-600 lg:hidden">
            <i class="fa-solid fa-bars text-sm"></i>
          </button>
          <div>
            <span class="text-xs font-black tracking-wider text-slate-900 uppercase">SMK NEGERI 1 BATAM</span>
            <span class="hidden sm:inline-block ml-2 text-[10px] font-bold text-slate-400">| Panel Kepala Sekolah</span>
          </div>
        </div>

        <!-- Sisi Kanan: Periode Aktif & User Avatar -->
        <div class="flex items-center gap-3 shrink-0">
          <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-xl bg-sky-50 border border-sky-200 text-sky-800 text-xs font-extrabold">
            <i class="fa-regular fa-calendar-days text-sky-600"></i>
            <span>TA 2024/2025 Genap</span>
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse ml-0.5" title="Periode Aktif"></span>
          </div>

          <div class="flex items-center gap-2.5 pl-3 border-l border-slate-200">
            <div class="w-8 h-8 rounded-xl bg-[#0F1E38] text-white flex items-center justify-center font-bold text-xs shadow-sm">
              KS
            </div>
            <div class="hidden md:block text-left">
              <div class="text-xs font-bold text-slate-800 leading-none">{{ auth()->user()->name ?? 'Drs. H. Sudirman, M.Pd' }}</div>
              <div class="text-[10px] text-slate-400 font-medium mt-0.5">Kepala Sekolah</div>
            </div>
          </div>
        </div>
      </header>

      <!-- Menu Mobile Dropdown -->
      <div id="mobileMenu" class="hidden border-b border-slate-200 bg-[#0F1E38] p-4 text-slate-300 lg:hidden space-y-2 text-xs font-bold">
        <a href="{{ route('kepsek.dashboard') }}" class="block px-3 py-2 rounded-lg hover:bg-white/10">Beranda / Dashboard</a>
        <a href="{{ route('kepsek.penempatan') }}" class="block px-3 py-2 rounded-lg hover:bg-white/10">Persetujuan Penempatan (T6)</a>
        <a href="{{ route('kepsek.monitoring') }}" class="block px-3 py-2 rounded-lg hover:bg-white/10">Monitoring Kehadiran</a>
        <a href="{{ route('kepsek.penilaian') }}" class="block px-3 py-2 rounded-lg hover:bg-white/10">Rekapitulasi Nilai</a>
        <a href="{{ route('kepsek.mitra') }}" class="block px-3 py-2 rounded-lg hover:bg-white/10">Data Mitra & DUDI</a>
        <a href="{{ route('kepsek.pengaturan') }}" class="block px-3 py-2 rounded-lg hover:bg-white/10">Pengaturan</a>
        <form action="{{ route('logout') }}" method="POST" class="pt-2 border-t border-slate-700">
          @csrf
          <button type="submit" class="w-full text-left px-3 py-2 text-rose-400">Keluar / Log Out</button>
        </form>
      </div>

      <!-- Area Konten yang Bisa Di-scroll -->
      <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
        @yield('content')
      </main>

    </div>

  </div>

    @vite('resources/js/app.js')
</body>
</html>
