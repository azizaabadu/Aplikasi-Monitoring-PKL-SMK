<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Pembimbing DUDI - PKL.ID')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 font-sans antialiased text-slate-900">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Pembimbing DUDI -->
        <aside class="w-64 bg-slate-900 text-slate-300 hidden md:flex flex-col justify-between border-r border-slate-800">
            <div class="p-5 space-y-6">
                <!-- Brand / Logo -->
                <div class="flex items-center gap-3 px-2">
                    <div class="w-9 h-9 rounded-xl bg-sky-600 flex items-center justify-center text-white font-black text-lg shadow-md">
                        P
                    </div>
                    <div>
                        <div class="font-black text-white text-sm tracking-tight">PKL.ID DUDI</div>
                        <div class="text-[10px] text-slate-400 font-medium">Pembimbing Lapangan</div>
                    </div>
                </div>

                <!-- Navigasi Menu Sesuai PRD -->
                <nav class="space-y-1 text-xs font-semibold">
                    <a href="{{ route('dudi.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl bg-sky-600 text-white shadow-sm">
                        <i class="fa-solid fa-chart-pie w-4 text-center"></i>
                        <span>Dashboard Utama</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl hover:bg-slate-800 text-slate-300 transition">
                        <i class="fa-solid fa-book-open w-4 text-center"></i>
                        <span>Pengesahan Logbook</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl hover:bg-slate-800 text-slate-300 transition">
                        <i class="fa-solid fa-triangle-exclamation w-4 text-center"></i>
                        <span>Umpan Balik &amp; Masalah</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl hover:bg-slate-800 text-slate-300 transition">
                        <i class="fa-solid fa-award w-4 text-center"></i>
                        <span>Penilaian Lapangan</span>
                    </a>
                </nav>
            </div>

            <!-- Tombol Keluar (Logout) -->
            <div class="p-4 border-t border-slate-800">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-3.5 py-2 rounded-xl bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 text-xs font-bold transition">
                        <i class="fa-solid fa-right-from-bracket w-4 text-center"></i>
                        <span>Keluar Aplikasi</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
            <!-- Topbar -->
            <header class="bg-white border-b border-slate-200 px-6 py-3.5 flex items-center justify-between sticky top-0 z-20 shadow-xs">
                <div class="text-xs font-bold text-slate-600">
                    Portal Penilaian &amp; Monitoring Siswa PKL
                </div>
                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <div class="text-xs font-black text-slate-900">{{ auth()->user()->name ?? 'Pembimbing DUDI' }}</div>
                        <div class="text-[10px] text-slate-400">Mitra Industri</div>
                    </div>
                    <div class="w-9 h-9 rounded-full bg-sky-100 text-sky-700 font-bold flex items-center justify-center text-xs">
                        {{ substr(auth()->user()->name ?? 'D', 0, 1) }}
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>