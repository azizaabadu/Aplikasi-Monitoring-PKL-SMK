<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Orang Tua - PKL.ID')</title>
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
        <aside class="hidden w-72 shrink-0 flex-col justify-between border-r border-slate-800 bg-[#0F1E38] text-slate-300 lg:sticky lg:top-0 lg:flex lg:h-screen lg:overflow-y-auto">
            <div class="space-y-6 p-6">
                <!-- Brand Header -->
                <a href="{{ route('orangtua.dashboard') }}" class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-tr from-sky-500 to-blue-600 text-white shadow-md shadow-sky-500/20">
                        <i class="fa-solid fa-graduation-cap text-lg"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-lg font-black tracking-wider text-white">PKL.ID</span>
                            <span class="rounded bg-sky-500/20 px-1.5 py-0.5 text-[9px] font-extrabold uppercase text-sky-400">Vokasi</span>
                        </div>
                        <p class="text-[10px] font-semibold text-slate-400">Portal Pemantauan Orang Tua</p>
                    </div>
                </a>

                <!-- Nav Menu -->
                <div class="space-y-1.5">
                    <p class="px-3 text-[10px] font-bold uppercase tracking-wider text-slate-400">Navigasi Utama</p>

                    <!-- 1. Beranda / Ringkasan -->
                    <a href="{{ route('orangtua.dashboard') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-bold transition-all duration-150 {{ request()->routeIs('orangtua.dashboard') ? 'bg-sky-600 text-white shadow-lg shadow-sky-600/30 font-extrabold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-house w-4 text-center {{ request()->routeIs('orangtua.dashboard') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Beranda & Ringkasan</span>
                    </a>

                    <!-- 2. Presensi & Kehadiran Ananda -->
                    <a href="{{ route('orangtua.kehadiran') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-bold transition-all duration-150 {{ request()->routeIs('orangtua.kehadiran') ? 'bg-sky-600 text-white shadow-lg shadow-sky-600/30 font-extrabold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-regular fa-calendar-check w-4 text-center {{ request()->routeIs('orangtua.kehadiran') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Presensi & Kehadiran</span>
                    </a>

                    <!-- 3. Jurnal & Logbook Aktivitas -->
                    <a href="{{ route('orangtua.logbook') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-bold transition-all duration-150 {{ request()->routeIs('orangtua.logbook') ? 'bg-sky-600 text-white shadow-lg shadow-sky-600/30 font-extrabold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-book-open w-4 text-center {{ request()->routeIs('orangtua.logbook') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Jurnal & Logbook</span>
                    </a>

                    <!-- 4. Evaluasi Nilai & Sertifikasi -->
                    <a href="{{ route('orangtua.penilaian') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-bold transition-all duration-150 {{ request()->routeIs('orangtua.penilaian') ? 'bg-sky-600 text-white shadow-lg shadow-sky-600/30 font-extrabold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-award w-4 text-center {{ request()->routeIs('orangtua.penilaian') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Evaluasi & Nilai</span>
                    </a>

                    <!-- 5. Informasi Mitra & Pembimbing -->
                    <a href="{{ route('orangtua.mitra') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-bold transition-all duration-150 {{ request()->routeIs('orangtua.mitra') ? 'bg-sky-600 text-white shadow-lg shadow-sky-600/30 font-extrabold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-building-user w-4 text-center {{ request()->routeIs('orangtua.mitra') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Informasi Mitra & Pembimbing</span>
                    </a>

                    <!-- 6. Pengaturan Akun Wali -->
                    <a href="{{ route('orangtua.pengaturan') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-bold transition-all duration-150 {{ request()->routeIs('orangtua.pengaturan') ? 'bg-sky-600 text-white shadow-lg shadow-sky-600/30 font-extrabold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-gear w-4 text-center {{ request()->routeIs('orangtua.pengaturan') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Pengaturan Akun Wali</span>
                    </a>
                </div>
            </div>

            <!-- Footer Sidebar Instansi -->
            <div class="space-y-4 border-t border-slate-800 bg-[#0B172E] p-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10 text-white">
                        <i class="fa-solid fa-school text-xs text-sky-400"></i>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-xs font-bold text-white">SMK Negeri 1 Batam</p>
                        <p class="text-[10px] text-slate-400">NPSN: 10403982 • Terakreditasi A</p>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl border border-rose-500/20 bg-rose-500/10 px-3 py-2 text-xs font-bold text-rose-300 transition hover:bg-rose-500/20">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>Keluar Sistem</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- MAIN VIEWPORT WRAPPER -->
        <div class="flex min-h-screen min-w-0 flex-1 flex-col lg:h-screen lg:min-h-0">
            
            <!-- TOP NAVBAR -->
            <header class="sticky top-0 z-30 flex min-h-[70px] items-center justify-between gap-4 border-b border-slate-200 bg-white px-4 py-3 shadow-sm sm:px-6 lg:px-8">
                <!-- Mobile Brand -->
                <a href="{{ route('orangtua.dashboard') }}" class="flex items-center gap-2.5 lg:hidden">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#0F1E38] text-white">
                        <i class="fa-solid fa-graduation-cap text-xs text-sky-400"></i>
                    </div>
                    <span class="text-sm font-black text-[#0F1E38]">PKL.ID</span>
                </a>

                <!-- Current Context Tag -->
                <div class="hidden items-center gap-2.5 text-xs text-slate-500 sm:flex">
                    <span class="inline-flex items-center gap-1.5 rounded-lg bg-slate-100 px-3 py-1.5 font-bold text-slate-700">
                        <i class="fa-solid fa-shield-halved text-sky-600"></i>
                        Portal Orang Tua / Wali
                    </span>
                    @if (isset($periodeAktif) && $periodeAktif)
                        <span class="inline-flex items-center gap-1.5 rounded-lg bg-sky-50 px-3 py-1.5 font-extrabold text-sky-800 border border-sky-150">
                            <i class="fa-regular fa-calendar-days text-sky-600"></i>
                            TA {{ $periodeAktif->tahun_ajaran }}
                        </span>
                    @endif
                </div>

                <!-- Right Profile / User -->
                <div class="ml-auto flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-tr from-[#0F1E38] to-[#1E3A6D] text-xs font-black text-white shadow-sm ring-2 ring-slate-100">
                        {{ collect(explode(' ', auth()->user()->name ?? 'Orang Tua'))->filter()->take(2)->map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)))->implode('') }}
                    </div>
                    <div class="text-left">
                        <p class="text-xs font-extrabold leading-tight text-slate-900">{{ auth()->user()->name ?? 'Bapak Hendra Pratama' }}</p>
                        <p class="text-[10px] font-semibold text-sky-700">Wali Murid Terverifikasi</p>
                    </div>
                </div>
            </header>

            <!-- MOBILE HORIZONTAL SCROLL NAV -->
            <nav class="flex gap-1.5 overflow-x-auto border-b border-slate-200 bg-white px-3 py-2 lg:hidden">
                <a href="{{ route('orangtua.dashboard') }}"
                   class="whitespace-nowrap rounded-lg px-3 py-1.5 text-[11px] font-bold transition {{ request()->routeIs('orangtua.dashboard') ? 'bg-[#0F1E38] text-white' : 'bg-slate-100 text-slate-600' }}">
                    Ringkasan
                </a>
                <a href="{{ route('orangtua.kehadiran') }}"
                   class="whitespace-nowrap rounded-lg px-3 py-1.5 text-[11px] font-bold transition {{ request()->routeIs('orangtua.kehadiran') ? 'bg-[#0F1E38] text-white' : 'bg-slate-100 text-slate-600' }}">
                    Presensi
                </a>
                <a href="{{ route('orangtua.logbook') }}"
                   class="whitespace-nowrap rounded-lg px-3 py-1.5 text-[11px] font-bold transition {{ request()->routeIs('orangtua.logbook') ? 'bg-[#0F1E38] text-white' : 'bg-slate-100 text-slate-600' }}">
                    Logbook
                </a>
                <a href="{{ route('orangtua.penilaian') }}"
                   class="whitespace-nowrap rounded-lg px-3 py-1.5 text-[11px] font-bold transition {{ request()->routeIs('orangtua.penilaian') ? 'bg-[#0F1E38] text-white' : 'bg-slate-100 text-slate-600' }}">
                    Evaluasi & Nilai
                </a>
                <a href="{{ route('orangtua.mitra') }}"
                   class="whitespace-nowrap rounded-lg px-3 py-1.5 text-[11px] font-bold transition {{ request()->routeIs('orangtua.mitra') ? 'bg-[#0F1E38] text-white' : 'bg-slate-100 text-slate-600' }}">
                    Mitra & Pembimbing
                </a>
                <a href="{{ route('orangtua.pengaturan') }}"
                   class="whitespace-nowrap rounded-lg px-3 py-1.5 text-[11px] font-bold transition {{ request()->routeIs('orangtua.pengaturan') ? 'bg-[#0F1E38] text-white' : 'bg-slate-100 text-slate-600' }}">
                    Pengaturan
                </a>
            </nav>

            <!-- MAIN CONTENT AREA -->
            <main class="flex-1 overflow-y-auto bg-slate-50 p-4 sm:p-6 lg:p-8">
                @if (session('status'))
                    <div class="mb-6 flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-xs font-bold text-emerald-800 shadow-sm">
                        <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>

        </div>
    </div>
</body>
</html>
