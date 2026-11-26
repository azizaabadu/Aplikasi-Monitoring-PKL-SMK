@extends('layouts.dudi')

@section('title', 'Dashboard Pembimbing DUDI - PKL.ID')

@section('content')
    <div class="mx-auto max-w-7xl space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div>
                <p class="text-xs font-semibold text-slate-500">Beranda <span class="px-1">/</span> Dashboard</p>
                <h1 class="mt-1 text-2xl font-black tracking-tight text-slate-900">Dashboard Pembimbing DUDI</h1>
            </div>
            @if ($dudi)
                <span class="inline-flex items-center gap-2 rounded-full border border-sky-200 bg-sky-50 px-3 py-1.5 text-xs font-bold text-sky-800">
                    <i class="fa-solid fa-building" aria-hidden="true"></i>{{ $dudi->nama_dudi }}
                </span>
            @endif
        </div>

        <section class="overflow-hidden rounded-2xl bg-gradient-to-br from-[#0F1E38] via-[#15345E] to-sky-800 p-6 text-white shadow-lg sm:p-8">
            <div class="flex flex-col justify-between gap-6 lg:flex-row lg:items-center">
                <div class="max-w-2xl space-y-3">
                    <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1 text-[10px] font-extrabold uppercase tracking-wider text-sky-100">
                        <i class="fa-solid fa-user-tie" aria-hidden="true"></i> Pembimbing Lapangan
                    </span>
                    <h2 class="text-2xl font-black tracking-tight sm:text-3xl">Selamat datang, {{ auth()->user()->name }}</h2>
                    <p class="max-w-xl text-sm leading-relaxed text-sky-100/90">Pantau kehadiran dan aktivitas siswa, sahkan logbook, sampaikan umpan balik, serta isi penilaian lapangan dari satu tempat.</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('dudi.logbook') }}" class="inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2.5 text-xs font-extrabold text-[#0F1E38] transition hover:bg-sky-50"><i class="fa-solid fa-book-open" aria-hidden="true"></i>Periksa logbook</a>
                    <a href="{{ route('dudi.feedback') }}" class="inline-flex items-center gap-2 rounded-xl border border-white/30 bg-white/10 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-white/20"><i class="fa-solid fa-message" aria-hidden="true"></i>Tulis umpan balik</a>
                </div>
            </div>
        </section>

        <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="Ringkasan PKL">
            @foreach ([
                ['Siswa Bimbingan', $siswas->count(), 'Siswa terdaftar di mitra', 'fa-users', 'sky'],
                ['Logbook Menunggu', $pendingCount, 'Perlu diperiksa', 'fa-clock', 'amber'],
                ['Sudah Dinilai', $assessedCount.' / '.$siswas->count(), 'Penilaian dari pihak industri', 'fa-award', 'indigo'],
                ['Hadir Hari Ini', $attendanceToday, 'Siswa tercatat hadir', 'fa-calendar-check', 'emerald'],
            ] as [$label, $value, $description, $icon, $color])
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <p class="text-xs font-bold text-slate-500">{{ $label }}</p>
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-{{ $color }}-50 text-{{ $color }}-600"><i class="fa-solid {{ $icon }}" aria-hidden="true"></i></span>
                    </div>
                    <p class="mt-3 text-3xl font-black text-slate-900">{{ $value }}</p>
                    <p class="mt-1 text-[11px] text-slate-500">{{ $description }}</p>
                </div>
            @endforeach
        </section>

        <div class="grid grid-cols-1 gap-5 xl:grid-cols-5">
            <section class="space-y-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm xl:col-span-3">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-sm font-black text-slate-900">Logbook Menunggu Pengesahan</h2>
                        <p class="mt-1 text-[11px] text-slate-500">Aktivitas siswa yang menunggu pemeriksaan Anda.</p>
                    </div>
                    <a href="{{ route('dudi.logbook') }}" class="shrink-0 text-xs font-bold text-sky-700 hover:text-sky-900">Lihat semua <i class="fa-solid fa-arrow-right ml-1" aria-hidden="true"></i></a>
                </div>
                <div class="space-y-3">
                    @forelse ($logbooks as $logbook)
                        <article class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                            <div class="flex flex-wrap items-start justify-between gap-2">
                                <div>
                                    <p class="text-xs font-extrabold text-slate-900">{{ $logbook->siswa?->nama ?? $logbook->siswa?->user?->name ?? 'Siswa' }}</p>
                                    <p class="mt-1 text-[10px] text-slate-500">{{ $logbook->tanggal?->translatedFormat('d M Y') }} · {{ $logbook->siswa?->kelas }} {{ $logbook->siswa?->jurusan }}</p>
                                </div>
                                <span class="rounded-full bg-amber-100 px-2.5 py-1 text-[10px] font-bold text-amber-800">Menunggu</span>
                            </div>
                            <p class="mt-3 line-clamp-3 text-xs leading-relaxed text-slate-600">{{ $logbook->kegiatan }}</p>
                        </article>
                    @empty
                        <div class="rounded-xl border border-dashed border-slate-300 px-4 py-8 text-center">
                            <i class="fa-regular fa-circle-check text-2xl text-emerald-500" aria-hidden="true"></i>
                            <p class="mt-2 text-sm font-bold text-slate-700">Tidak ada logbook tertunda</p>
                            <p class="mt-1 text-xs text-slate-500">Logbook baru akan muncul di bagian ini.</p>
                        </div>
                    @endforelse
                </div>
            </section>

            <section class="space-y-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm xl:col-span-2">
                <div>
                    <h2 class="text-sm font-black text-slate-900">Siswa di Mitra</h2>
                    <p class="mt-1 text-[11px] text-slate-500">Daftar siswa yang ditempatkan di {{ $dudi?->nama_dudi ?? 'mitra Anda' }}.</p>
                </div>
                <div class="divide-y divide-slate-100">
                    @forelse ($siswas->take(6) as $siswa)
                        <div class="flex items-center justify-between gap-3 py-3 first:pt-0 last:pb-0">
                            <div class="min-w-0">
                                <p class="truncate text-xs font-extrabold text-slate-800">{{ $siswa->nama ?: $siswa->user?->name }}</p>
                                <p class="mt-1 truncate text-[10px] text-slate-500">{{ $siswa->kelas }} · {{ $siswa->jurusan }}</p>
                            </div>
                            <a href="{{ route('dudi.penilaian') }}" class="shrink-0 rounded-lg border border-slate-200 px-2.5 py-1.5 text-[10px] font-bold text-slate-700 hover:bg-slate-50">Nilai</a>
                        </div>
                    @empty
                        <p class="py-8 text-center text-xs text-slate-500">Belum ada siswa yang terhubung dengan akun DUDI ini.</p>
                    @endforelse
                </div>
                @if ($feedbackCount > 0)
                    <a href="{{ route('dudi.feedback') }}" class="flex items-center justify-between rounded-xl border border-amber-200 bg-amber-50 px-3.5 py-3 text-xs font-bold text-amber-900">
                        <span><i class="fa-solid fa-circle-exclamation mr-2" aria-hidden="true"></i>Umpan balik baru</span><span>{{ $feedbackCount }}</span>
                    </a>
                @endif
            </section>
        </div>
    </div>
@endsection
