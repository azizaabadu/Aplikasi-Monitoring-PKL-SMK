<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Kepala Sekolah - PKL.ID')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 text-slate-900 antialiased selection:bg-sky-500 selection:text-white">
    <div class="min-h-screen lg:flex lg:h-screen lg:overflow-hidden">
        
        <!-- SIDEBAR DESKTOP -->
        <aside class="hidden w-72 shrink-0 flex-col justify-between border-r border-slate-800 bg-[#0B1527] text-slate-300 lg:sticky lg:top-0 lg:flex lg:h-screen lg:overflow-y-auto">
            <div class="space-y-6 p-6">
                <!-- Brand Header -->
                <a href="{{ route('kepsek.dashboard') }}" class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-tr from-amber-500 to-amber-600 text-white shadow-md shadow-amber-500/20">
                        <i class="fa-solid fa-building-columns text-lg"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-lg font-black tracking-wider text-white">PKL.ID</span>
                            <span class="rounded bg-amber-500/20 px-1.5 py-0.5 text-[9px] font-extrabold uppercase text-amber-400">Eksekutif</span>
                        </div>
                        <p class="text-[10px] font-semibold text-slate-400">Portal Kepala Sekolah</p>
                    </div>
                </a>

                <!-- Nav Menu -->
                <div class="space-y-1.5">
                    <p class="px-3 text-[10px] font-bold uppercase tracking-wider text-slate-400">Menu Eksekutif</p>

                    <!-- 1. Beranda Eksekutif -->
                    <a href="{{ route('kepsek.dashboard') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-bold transition-all duration-150 {{ request()->routeIs('kepsek.dashboard') ? 'bg-amber-600 text-white shadow-lg shadow-amber-600/30 font-extrabold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-chart-pie w-4 text-center {{ request()->routeIs('kepsek.dashboard') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Dashboard Eksekutif</span>
                    </a>

                    <!-- 2. Persetujuan Penempatan (PRD T6) -->
                    <a href="{{ route('kepsek.penempatan') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-bold transition-all duration-150 {{ request()->routeIs('kepsek.penempatan') ? 'bg-amber-600 text-white shadow-lg shadow-amber-600/30 font-extrabold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-stamp w-4 text-center {{ request()->routeIs('kepsek.penempatan') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Persetujuan Penempatan</span>
                    </a>

                    <!-- 3. Monitoring Presensi & Kendala -->
                    <a href="{{ route('kepsek.monitoring') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-bold transition-all duration-150 {{ request()->routeIs('kepsek.monitoring') ? 'bg-amber-600 text-white shadow-lg shadow-amber-600/30 font-extrabold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-clipboard-check w-4 text-center {{ request()->routeIs('kepsek.monitoring') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Monitoring Kehadiran</span>
                    </a>

                    <!-- 4. Rekapitulasi Nilai PKL (PRD N6) -->
                    <a href="{{ route('kepsek.penilaian') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-bold transition-all duration-150 {{ request()->routeIs('kepsek.penilaian') ? 'bg-amber-600 text-white shadow-lg shadow-amber-600/30 font-extrabold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-award w-4 text-center {{ request()->routeIs('kepsek.penilaian') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Rekapitulasi Nilai</span>
                    </a>

                    <!-- 5. Direktori Mitra DUDI -->
                    <a href="{{ route('kepsek.mitra') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-bold transition-all duration-150 {{ request()->routeIs('kepsek.mitra') ? 'bg-amber-600 text-white shadow-lg shadow-amber-600/30 font-extrabold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-handshake w-4 text-center {{ request()->routeIs('kepsek.mitra') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Mitra DUDI & Kuota</span>
                    </a>

                    <p class="pt-4 px-3 text-[10px] font-bold uppercase tracking-wider text-slate-400">Pengaturan</p>

                    <!-- 6. Pengaturan Profil & Keamanan -->
                    <a href="{{ route('kepsek.pengaturan') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-bold transition-all duration-150 {{ request()->routeIs('kepsek.pengaturan') ? 'bg-amber-600 text-white shadow-lg shadow-amber-600/30 font-extrabold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-gear w-4 text-center {{ request()->routeIs('kepsek.pengaturan') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Pengaturan Akun</span>
                    </a>
                </div>
            </div>

            <!-- Footer Sidebar: Profil & Logout -->
            <div class="border-t border-slate-800 p-4 space-y-3">
                <div class="flex items-center gap-3 px-2">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-amber-500/20 text-amber-300 font-extrabold text-xs">
                        KS
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-xs font-extrabold text-white">{{ auth()->user()->name ?? 'Kepala Sekolah' }}</p>
                        <p class="text-[10px] text-slate-400">Pimpinan Satuan Pendidikan</p>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-white/5 px-3 py-2 text-xs font-bold text-slate-300 transition hover:bg-rose-500/20 hover:text-rose-300">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Keluar Sistem</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- KONTEN UTAMA -->
        <div class="flex flex-1 flex-col lg:h-screen lg:overflow-y-auto">
            <!-- Header Mobile / Topbar -->
            <header class="sticky top-0 z-20 flex h-16 items-center justify-between border-b border-slate-200 bg-white/95 px-4 backdrop-blur-md sm:px-8">
                <div class="flex items-center gap-3">
                    <button type="button" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 text-slate-600 lg:hidden">
                        <i class="fa-solid fa-bars text-sm"></i>
                    </button>
                    <div>
                        <span class="text-xs font-black tracking-wider text-slate-900 uppercase">SMKN 1 BATAM</span>
                        <span class="hidden sm:inline-block ml-2 text-[10px] font-bold text-slate-400">| Panel Pengawasan Mutu & Kemitraan Vokasi</span>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-[11px] font-bold text-emerald-700">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        T.A 2024/2025 Genap
                    </span>
                    <div class="hidden sm:flex items-center gap-2 pl-3 border-l border-slate-200">
                        <span class="text-xs font-bold text-slate-700">{{ auth()->user()->name ?? 'Drs. H. Sudirman, M.Pd' }}</span>
                    </div>
                </div>
            </header>

            <!-- Menu Mobile Dropdown -->
            <div id="mobileMenu" class="hidden border-b border-slate-200 bg-[#0B1527] p-4 text-slate-300 lg:hidden space-y-2 text-xs font-bold">
                <a href="{{ route('kepsek.dashboard') }}" class="block px-3 py-2 rounded-lg hover:bg-white/10">Dashboard Eksekutif</a>
                <a href="{{ route('kepsek.penempatan') }}" class="block px-3 py-2 rounded-lg hover:bg-white/10">Persetujuan Penempatan (T6)</a>
                <a href="{{ route('kepsek.monitoring') }}" class="block px-3 py-2 rounded-lg hover:bg-white/10">Monitoring Kehadiran</a>
                <a href="{{ route('kepsek.penilaian') }}" class="block px-3 py-2 rounded-lg hover:bg-white/10">Rekapitulasi Nilai</a>
                <a href="{{ route('kepsek.mitra') }}" class="block px-3 py-2 rounded-lg hover:bg-white/10">Mitra DUDI & Kuota</a>
                <a href="{{ route('kepsek.pengaturan') }}" class="block px-3 py-2 rounded-lg hover:bg-white/10">Pengaturan Akun</a>
                <form action="{{ route('logout') }}" method="POST" class="pt-2 border-t border-slate-700">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 text-rose-400">Keluar</button>
                </form>
            </div>

            <!-- Area Isi Halaman -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                @yield('content')
            </main>
        </div>

    </div>
</body>
</html>
