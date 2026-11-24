<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Guru Pembimbing - PKL.ID')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 font-sans antialiased text-slate-900">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Guru Pembimbing -->
        <aside class="w-64 bg-slate-900 text-slate-300 hidden md:flex flex-col justify-between border-r border-slate-800">
            <div class="p-5 space-y-6">
                <!-- Brand / Logo -->
                <div class="flex items-center gap-3 px-2">
                    <div class="w-9 h-9 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-black text-lg shadow-md">
                        P
                    </div>
                    <div>
                        <div class="font-black text-white text-sm tracking-tight">PKL.ID GURU</div>
                        <div class="text-[10px] text-slate-400 font-medium">Monitoring Vokasi</div>
                    </div>
                </div>

                <!-- Navigasi Menu Sesuai Desain -->
               <nav class="space-y-1 text-xs font-semibold">
                    <a href="{{ route('guru.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('guru.dashboard') ? 'bg-indigo-600 text-white shadow-sm' : 'hover:bg-slate-800 text-slate-300' }}">
                        <i class="fa-solid fa-chart-pie w-4 text-center"></i>
                        <span>Beranda / Dashboard</span>
                    </a>
                    <a href="{{ route('guru.presensi') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('guru.presensi') ? 'bg-indigo-600 text-white shadow-sm' : 'hover:bg-slate-800 text-slate-300' }}">
                        <i class="fa-solid fa-clipboard-user w-4 text-center"></i>
                        <span>Presensi &amp; Kehadiran</span>
                    </a>
                    <a href="{{ route('guru.logbook') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('guru.logbook') ? 'bg-indigo-600 text-white shadow-sm' : 'hover:bg-slate-800 text-slate-300' }}">
                        <i class="fa-solid fa-book-open w-4 text-center"></i>
                        <span>Jurnal &amp; Logbook</span>
                    </a>
                    <a href="{{ route('guru.siswa-dudi') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('guru.siswa-dudi') ? 'bg-indigo-600 text-white shadow-sm' : 'hover:bg-slate-800 text-slate-300' }}">
                        <i class="fa-solid fa-users-rectangle w-4 text-center"></i>
                        <span>Data Siswa &amp; DUDI</span>
                    </a>
                    <a href="{{ route('guru.penilaian') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('guru.penilaian') ? 'bg-indigo-600 text-white shadow-sm' : 'hover:bg-slate-800 text-slate-300' }}">
                        <i class="fa-solid fa-award w-4 text-center"></i>
                        <span>Penilaian &amp; Sertifikat</span>
                    </a>
                    <a href="{{ route('guru.laporan') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('guru.laporan') ? 'bg-indigo-600 text-white shadow-sm' : 'hover:bg-slate-800 text-slate-300' }}">
                        <i class="fa-solid fa-file-lines w-4 text-center"></i>
                        <span>Laporan &amp; Rekapitulasi</span>
                    </a>
                    <a href="{{ route('guru.pengaturan') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('guru.pengaturan') ? 'bg-indigo-600 text-white shadow-sm' : 'hover:bg-slate-800 text-slate-300' }}">
                        <i class="fa-solid fa-gear w-4 text-center"></i>
                        <span>Pengaturan</span>
                    </a>
                </nav>
            </div>

            <!-- Footer Sidebar & Logout -->
            <div class="p-4 border-t border-slate-800 space-y-3">
                <div class="px-2 text-[11px] text-slate-400">
                    <div class="font-bold text-slate-300">SMK Negeri 1 Batam</div>
                    <div>NPSN: 10403902 • Terekred</div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-3.5 py-2 rounded-xl bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 text-xs font-bold transition">
                        <i class="fa-solid fa-right-from-bracket w-4 text-center"></i>
                        <span>Keluar / Log Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
            <!-- Topbar -->
            <header class="bg-white border-b border-slate-200 px-6 py-3 flex items-center justify-between sticky top-0 z-20 shadow-xs">
                <div class="w-1/3">
                    <div class="relative">
                        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-2.5 text-slate-400 text-xs"></i>
                        <input type="text" placeholder="Cari siswa, mitra industri, atau tugas..." class="w-full bg-slate-100 text-xs rounded-xl pl-9 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 border border-slate-200">
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full border border-indigo-100">
                        <i class="fa-solid fa-calendar-days mr-1.5"></i> TA 2024/2025 Genap
                    </span>
                    <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 text-xs font-bold cursor-pointer hover:bg-slate-200">
                        <i class="fa-regular fa-bell"></i>
                    </div>
                    <div class="flex items-center gap-3 border-l pl-4 border-slate-200">
                        <div class="text-right">
                            <div class="text-xs font-black text-slate-900">{{ auth()->user()->name ?? 'Guru Pembimbing' }}</div>
                            <div class="text-[10px] text-slate-400">Guru PPLG</div>
                        </div>
                        <div class="w-9 h-9 rounded-full bg-indigo-100 text-indigo-700 font-bold flex items-center justify-center text-xs">
                            {{ substr(auth()->user()->name ?? 'G', 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/pkl-dashboard.js') }}"></script>

</body>
</html>