<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal DUDI - PKL.ID')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-900 antialiased">
    <div class="flex min-h-screen">
        <aside class="hidden h-screen w-64 shrink-0 flex-col justify-between border-r border-slate-800 bg-[#0F1E38] text-slate-300 md:flex">
            <div class="flex min-h-0 flex-1 flex-col p-5">
                @include('layouts.partials.brand', ['href' => route('dudi.dashboard'), 'caption' => 'Portal Monitoring Vokasi'])

                <div class="mt-7 min-h-0 flex-1 overflow-y-auto">
                    <p class="mb-2 px-3 text-[10px] font-bold uppercase tracking-wider text-slate-500">Menu Pembimbing DUDI</p>
                    <nav class="space-y-1.5 text-xs font-semibold">
                        @foreach ([
                            ['dudi.dashboard', 'Beranda / Dashboard', 'fa-house'],
                            ['dudi.logbook', 'Pengesahan Logbook', 'fa-book-open'],
                            ['dudi.feedback', 'Umpan Balik & Masalah', 'fa-triangle-exclamation'],
                            ['dudi.penilaian', 'Penilaian Lapangan', 'fa-award'],
                            ['dudi.pengaturan', 'Pengaturan', 'fa-gear'],
                        ] as [$routeName, $label, $icon])
                            <a href="{{ route($routeName) }}" class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 transition {{ request()->routeIs($routeName) ? 'bg-sky-600 text-white shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                                <i class="fa-solid {{ $icon }} w-4 text-center" aria-hidden="true"></i>
                                <span>{{ $label }}</span>
                            </a>
                        @endforeach
                    </nav>
                </div>
            </div>
            <div class="shrink-0 space-y-3 border-t border-slate-800 p-4">
                <div class="px-2 text-xs">
                    <p class="truncate font-bold text-white">{{ auth()->user()->dudi?->nama_dudi ?? 'Mitra DUDI' }}</p>
                    <p class="text-[10px] text-slate-400">Pembimbing Lapangan</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-3 rounded-xl bg-rose-500/10 px-3.5 py-2.5 text-xs font-bold text-rose-300 transition hover:bg-rose-500/20">
                        <i class="fa-solid fa-right-from-bracket w-4 text-center" aria-hidden="true"></i> Keluar Aplikasi
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex h-screen min-h-0 min-w-0 flex-1 flex-col overflow-y-auto">
            <header class="sticky top-0 z-20 flex items-center justify-between gap-4 border-b border-slate-200 bg-white px-4 py-3.5 sm:px-6">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-sky-50 text-sky-700 md:hidden"><i class="fa-solid fa-graduation-cap"></i></div>
                    <div>
                        <p class="text-xs font-bold text-slate-800">Portal Penilaian &amp; Monitoring PKL</p>
                        <p class="text-[10px] text-slate-500">{{ auth()->user()->dudi?->nama_dudi ?? 'Pembimbing DUDI' }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2.5">
                    <div class="text-right">
                        <p class="text-xs font-extrabold text-slate-900">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] text-slate-500">Pembimbing DUDI</p>
                    </div>
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-sky-100 text-xs font-bold text-sky-800">
                        {{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </div>
            </header>

            <nav class="flex gap-1 overflow-x-auto border-b border-slate-200 bg-white px-3 py-2 md:hidden" aria-label="Navigasi Pembimbing DUDI">
                @foreach ([
                    ['dudi.dashboard', 'Beranda'],
                    ['dudi.logbook', 'Logbook'],
                    ['dudi.feedback', 'Umpan Balik'],
                    ['dudi.penilaian', 'Penilaian'],
                    ['dudi.pengaturan', 'Pengaturan'],
                ] as [$routeName, $label])
                    <a href="{{ route($routeName) }}" class="shrink-0 rounded-lg px-3 py-2 text-[11px] font-bold {{ request()->routeIs($routeName) ? 'bg-sky-700 text-white' : 'text-slate-600 hover:bg-slate-100' }}">{{ $label }}</a>
                @endforeach
            </nav>

            <main class="w-full flex-1 p-4 sm:p-6 lg:p-8">
                @if (session('status'))
                    <div class="mb-5 flex items-center gap-2 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800" role="status">
                        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>{{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="mb-5 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800" role="alert">
                        <p class="font-bold">Periksa kembali data yang diisi.</p>
                        <ul class="mt-1 list-inside list-disc">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>
