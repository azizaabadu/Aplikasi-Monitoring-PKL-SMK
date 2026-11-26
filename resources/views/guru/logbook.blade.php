@extends('layouts.guru')

@section('title', 'Jurnal & Logbook Siswa - PKL.ID')

@section('content')
<div class="space-y-6">
    <!-- Feedback Alerts -->
    @if (session('status'))
        <div role="status" class="flex items-center gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold shadow-xs">
            <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div role="alert" class="flex items-center gap-3 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold shadow-xs">
            <i class="fa-solid fa-triangle-exclamation text-rose-600 text-base"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div role="alert" class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1">
            <div class="font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-exclamation text-rose-600"></i>
                Terdapat kesalahan dalam pengisian formulir:
            </div>
            <ul class="list-disc list-inside space-y-0.5 text-[11px] pl-4">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-black text-slate-900">Jurnal &amp; Logbook Siswa Bimbingan</h1>
            <p class="text-xs text-slate-500">Pantau pengisian kegiatan harian siswa bimbingan Anda, tinjau status pengesahan DUDI, dan berikan komentar pembinaan sesuai PRD L4.</p>
        </div>
        <div class="px-3.5 py-2 bg-indigo-50 border border-indigo-200 text-indigo-700 rounded-xl text-xs font-bold">
            Guru Pembimbing: {{ $guru->nama ?? auth()->user()->name }}
        </div>
    </div>

    <!-- Ringkasan Status Logbook Sesuai PRD L4 -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-xs flex flex-wrap items-center justify-between gap-3 text-xs font-bold">
        <div class="flex flex-wrap items-center gap-2">
            <span class="px-3.5 py-1.5 rounded-xl bg-indigo-600 text-white">Semua ({{ $logbooks->count() }})</span>
            <span class="px-3.5 py-1.5 rounded-xl bg-amber-50 text-amber-700 border border-amber-200">Menunggu DUDI ({{ $logbooks->where('status', 'Pending')->count() }})</span>
            <span class="px-3.5 py-1.5 rounded-xl bg-orange-50 text-orange-700 border border-orange-200">Perlu Revisi ({{ $logbooks->where('status', 'Ditolak')->count() }})</span>
            <span class="px-3.5 py-1.5 rounded-xl bg-emerald-50 text-emerald-700 border border-emerald-200">Disahkan DUDI ({{ $logbooks->where('status', 'Disetujui')->count() }})</span>
        </div>
        <span class="text-slate-400 font-semibold text-[11px]">Total: {{ $siswas->count() }} Siswa Bimbingan</span>
    </div>

    <!-- Daftar Logbook Siswa -->
    <div class="space-y-4">
        @forelse ($logbooks as $logbook)
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs space-y-3">
                <div class="flex flex-wrap items-center justify-between gap-2 border-b border-slate-100 pb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-indigo-100 text-indigo-700 font-bold flex items-center justify-center text-xs">
                            {{ strtoupper(substr($logbook->siswa->nama, 0, 2)) }}
                        </div>
                        <div>
                            <div class="font-bold text-slate-900 text-sm">
                                {{ $logbook->siswa->nama }} 
                                <span class="text-xs font-normal text-slate-400">&bull; {{ $logbook->siswa->dudi->nama_dudi ?? 'Mitra Industri' }}</span>
                            </div>
                            <div class="text-[11px] text-slate-500">
                                {{ \Carbon\Carbon::parse($logbook->tanggal)->translatedFormat('l, d F Y') }} &bull; Jam Kerja: {{ substr($logbook->jam_mulai, 0, 5) }} - {{ substr($logbook->jam_selesai, 0, 5) }} WIB
                                @if ($logbook->terlambat)
                                    <span class="ml-1 text-rose-600 font-bold">(Diisi Terlambat)</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    @if ($logbook->status === 'Disetujui')
                        <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold text-xs border border-emerald-200">
                            <i class="fa-solid fa-circle-check mr-1"></i> Disahkan Pembimbing DUDI
                        </span>
                    @elseif ($logbook->status === 'Ditolak')
                        <span class="px-3 py-1 rounded-full bg-orange-50 text-orange-700 font-bold text-xs border border-orange-200">
                            <i class="fa-solid fa-rotate-left mr-1"></i> Perlu Revisi Siswa
                        </span>
                    @else
                        <span class="px-3 py-1 rounded-full bg-amber-50 text-amber-700 font-bold text-xs border border-amber-200">
                            <i class="fa-solid fa-clock mr-1"></i> Menunggu Pengesahan DUDI
                        </span>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                    <div class="bg-slate-50 p-3 rounded-xl">
                        <div class="font-bold text-slate-700 mb-1">Kegiatan</div>
                        <p class="text-slate-600 leading-relaxed">{{ $logbook->kegiatan }}</p>
                    </div>
                    <div class="bg-slate-50 p-3 rounded-xl">
                        <div class="font-bold text-slate-700 mb-1">Hasil / Capaian</div>
                        <p class="text-slate-600 leading-relaxed">{{ $logbook->hasil ?? 'Tidak ada catatan.' }}</p>
                    </div>
                    <div class="bg-slate-50 p-3 rounded-xl">
                        <div class="font-bold text-slate-700 mb-1">Kendala &amp; Solusi</div>
                        <p class="text-slate-600 leading-relaxed">{{ $logbook->kendala ?? 'Tidak ada kendala.' }}</p>
                    </div>
                </div>

                @if ($logbook->catatan_pembimbing)
                    <div class="p-3 rounded-xl bg-orange-50/70 border border-orange-100 text-xs text-orange-800">
                        <strong>Catatan dari Pembimbing DUDI:</strong> {{ $logbook->catatan_pembimbing }}
                    </div>
                @endif

                @if ($logbook->catatan_guru)
                    <div class="p-3 rounded-xl bg-sky-50 border border-sky-100 text-xs text-sky-800">
                        <strong>Catatan Pembinaan Guru Saat Ini:</strong> {{ $logbook->catatan_guru }}
                    </div>
                @endif

                <!-- Form Komentar Guru Pembimbing (PRD L4) -->
                <form action="{{ route('guru.logbook.komentar', $logbook) }}" method="POST" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 pt-1">
                    @csrf
                    <input type="text" name="komentar_guru" value="{{ old('komentar_guru', $logbook->catatan_guru) }}" placeholder="Tulis komentar atau arahan pembinaan guru untuk catatan kegiatan ini..." class="flex-1 bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:outline-none focus:border-indigo-500">
                    <button type="submit" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold transition shrink-0">
                        <i class="fa-solid fa-comment-dots mr-1"></i> Simpan Catatan Guru
                    </button>
                </form>
            </div>
        @empty
            <div class="bg-white p-8 rounded-2xl border border-dashed border-slate-200 text-center text-slate-400 space-y-2">
                <i class="fa-solid fa-book-open text-2xl text-slate-300"></i>
                <p class="text-xs font-semibold text-slate-600">Belum ada catatan logbook dari siswa bimbingan Anda.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
