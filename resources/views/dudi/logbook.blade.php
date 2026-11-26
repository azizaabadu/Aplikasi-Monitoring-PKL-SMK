@extends('layouts.dudi')

@section('title', 'Pengesahan Logbook - PKL.ID')

@section('content')
    <div class="mx-auto max-w-7xl space-y-5">
        <div class="flex flex-wrap items-end justify-between gap-3">
            <div><p class="text-xs font-semibold text-slate-500">DUDI <span class="px-1">/</span> Pengesahan Logbook</p><h1 class="mt-1 text-2xl font-black text-slate-900">Pengesahan Logbook</h1><p class="mt-1 text-sm text-slate-500">Tinjau jurnal kegiatan dan beri persetujuan atau catatan revisi.</p></div>
            <span class="rounded-full border border-sky-200 bg-sky-50 px-3 py-1.5 text-xs font-bold text-sky-800">{{ $dudi->nama_dudi }}</span>
        </div>

        <nav class="flex flex-wrap gap-2" aria-label="Filter status logbook">
            @foreach (['Pending' => 'Menunggu', 'Disetujui' => 'Disetujui', 'Ditolak' => 'Perlu Revisi', 'all' => 'Semua'] as $value => $label)
                <a href="{{ route('dudi.logbook', ['status' => $value]) }}" class="rounded-full border px-3.5 py-2 text-xs font-bold {{ $status === $value ? 'border-sky-700 bg-sky-700 text-white' : 'border-slate-200 bg-white text-slate-600 hover:bg-slate-50' }}">{{ $label }}</a>
            @endforeach
        </nav>

        <div class="space-y-4">
            @forelse ($logbooks as $logbook)
                <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div>
                            <h2 class="text-sm font-extrabold text-slate-900">{{ $logbook->siswa?->nama ?? $logbook->siswa?->user?->name ?? 'Siswa' }}</h2>
                            <p class="mt-1 text-xs text-slate-500">{{ $logbook->siswa?->kelas }} · {{ $logbook->siswa?->jurusan }} <span class="px-1">·</span> {{ $logbook->tanggal?->translatedFormat('l, d F Y') }}</p>
                        </div>
                        <span class="rounded-full px-3 py-1 text-[10px] font-extrabold {{ $logbook->status === 'Disetujui' ? 'bg-emerald-100 text-emerald-800' : ($logbook->status === 'Ditolak' ? 'bg-rose-100 text-rose-800' : 'bg-amber-100 text-amber-800') }}">{{ $logbook->status === 'Ditolak' ? 'Perlu Revisi' : $logbook->status }}</span>
                    </div>
                    <div class="mt-4 grid gap-3 rounded-xl bg-slate-50 p-4 text-xs sm:grid-cols-2">
                        <div><p class="font-bold text-slate-500">Kegiatan</p><p class="mt-1 leading-relaxed text-slate-800">{{ $logbook->kegiatan }}</p></div>
                        <div><p class="font-bold text-slate-500">Hasil kegiatan</p><p class="mt-1 leading-relaxed text-slate-800">{{ $logbook->hasil ?: 'Belum diisi.' }}</p></div>
                        @if ($logbook->kendala)<div><p class="font-bold text-slate-500">Kendala</p><p class="mt-1 leading-relaxed text-slate-800">{{ $logbook->kendala }}</p></div>@endif
                        <div><p class="font-bold text-slate-500">Waktu</p><p class="mt-1 text-slate-800">{{ $logbook->jam_mulai ?: '—' }} – {{ $logbook->jam_selesai ?: '—' }}</p></div>
                    </div>
                    @if ($logbook->catatan_pembimbing && $logbook->status === 'Ditolak')
                        <p class="mt-3 rounded-xl border border-rose-200 bg-rose-50 p-3 text-xs text-rose-800"><strong>Catatan revisi sebelumnya:</strong> {{ $logbook->catatan_pembimbing }}</p>
                    @endif
                    @if ($logbook->status === 'Pending')
                        <div class="mt-4 grid gap-3 lg:grid-cols-2">
                            <form method="POST" action="{{ route('dudi.logbook.revision', $logbook) }}" data-disable-on-submit class="flex flex-col gap-2 rounded-xl border border-rose-100 bg-rose-50/60 p-3 sm:flex-row">
                                @csrf
                                <label class="sr-only" for="catatan-{{ $logbook->id }}">Catatan revisi</label>
                                <textarea id="catatan-{{ $logbook->id }}" name="catatan_pembimbing" required minlength="5" maxlength="2000" rows="2" placeholder="Tuliskan catatan revisi yang jelas..." class="min-w-0 flex-1 rounded-lg border border-rose-200 bg-white px-3 py-2 text-xs focus:border-rose-400 focus:outline-none"></textarea>
                                <button type="submit" class="shrink-0 rounded-lg bg-rose-600 px-3 py-2 text-xs font-bold text-white hover:bg-rose-700">Minta revisi</button>
                            </form>
                            <form method="POST" action="{{ route('dudi.logbook.approve', $logbook) }}" data-disable-on-submit class="flex items-center justify-between gap-3 rounded-xl border border-emerald-100 bg-emerald-50/60 p-3">
                                @csrf
                                <p class="text-xs text-emerald-900">Pastikan kegiatan sudah sesuai sebelum disahkan.</p>
                                <button type="submit" class="shrink-0 rounded-lg bg-emerald-700 px-3 py-2 text-xs font-bold text-white hover:bg-emerald-800"><i class="fa-solid fa-check mr-1" aria-hidden="true"></i>Sahkan</button>
                            </form>
                        </div>
                    @endif
                </article>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-5 py-12 text-center">
                    <i class="fa-regular fa-folder-open text-3xl text-slate-400" aria-hidden="true"></i><p class="mt-3 text-sm font-bold text-slate-700">Belum ada logbook pada filter ini</p><p class="mt-1 text-xs text-slate-500">Logbook yang dikirim siswa akan tampil di sini.</p>
                </div>
            @endforelse
        </div>
        <div>{{ $logbooks->links() }}</div>
    </div>
@endsection
