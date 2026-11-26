@extends('layouts.student')

@section('title', 'Penilaian PKL - PKL.ID')

@section('content')
    <div class="mx-auto max-w-6xl space-y-6">
        <div>
            <p class="text-xs font-medium text-slate-500">Beranda <span class="px-1">/</span> Penilaian</p>
            <h1 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">Penilaian Kinerja PKL</h1>
            <p class="mt-1 text-sm text-slate-500">Nilai yang sudah diinput oleh pembimbing DUDI dan guru pembimbing.</p>
        </div>

        @if ($siswa)
            <section class="rounded-2xl bg-gradient-to-br from-[#0F1E38] to-sky-800 p-6 text-white shadow-lg">
                <p class="text-xs font-bold uppercase tracking-wider text-sky-200">{{ $siswa->dudi?->nama_dudi ?? 'Tempat PKL belum terhubung' }}</p>
                <h2 class="mt-2 text-xl font-black">{{ $siswa->nama ?: auth()->user()->name }}</h2>
                <p class="mt-1 text-xs text-sky-100">{{ $siswa->kelas }} · {{ $siswa->jurusan }} · NIS {{ $siswa->nis }}</p>
                <p class="mt-4 max-w-2xl text-xs leading-relaxed text-sky-100">Data nilai ditampilkan sesuai catatan penilai yang tersimpan. Nilai akhir resmi hanya ditetapkan setelah seluruh komponen penilaian tersedia.</p>
            </section>

            <section class="grid gap-4 sm:grid-cols-2" aria-label="Nilai penilaian">
                @forelse ($penilaians as $penilaian)
                    <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="flex items-center justify-between gap-3">
                            <div><p class="text-[10px] font-extrabold uppercase tracking-wider text-slate-500">Penilai</p><h2 class="mt-1 text-sm font-black text-slate-900">Pembimbing {{ $penilaian->penilai === 'Industri' ? 'DUDI' : 'Sekolah' }}</h2></div>
                            <span class="rounded-full bg-sky-50 px-3 py-1 text-[10px] font-bold text-sky-800">{{ $penilaian->penilai }}</span>
                        </div>
                        <div class="mt-5 grid grid-cols-2 gap-3">
                            <div class="rounded-xl bg-slate-50 p-4"><p class="text-[10px] font-bold text-slate-500">Kompetensi teknis</p><p class="mt-1 text-2xl font-black text-slate-900">{{ $penilaian->nilai_teknis }}<span class="ml-1 text-xs font-semibold text-slate-400">/ 100</span></p></div>
                            <div class="rounded-xl bg-slate-50 p-4"><p class="text-[10px] font-bold text-slate-500">Kompetensi nonteknis</p><p class="mt-1 text-2xl font-black text-slate-900">{{ $penilaian->nilai_non_teknis }}<span class="ml-1 text-xs font-semibold text-slate-400">/ 100</span></p></div>
                        </div>
                        @if ($penilaian->catatan)<p class="mt-4 rounded-xl border border-slate-200 p-3 text-xs leading-relaxed text-slate-700"><strong>Catatan:</strong> {{ $penilaian->catatan }}</p>@endif
                        <p class="mt-3 text-[10px] text-slate-400">Diperbarui {{ $penilaian->updated_at?->translatedFormat('d M Y, H:i') }}</p>
                    </article>
                @empty
                    <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-center sm:col-span-2"><i class="fa-solid fa-hourglass-half text-2xl text-amber-500" aria-hidden="true"></i><p class="mt-2 text-sm font-bold text-slate-700">Belum ada nilai</p><p class="mt-1 text-xs text-slate-500">Penilaian akan tampil setelah pembimbing mengirimkannya.</p></div>
                @endforelse
            </section>
        @else
            <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-10 text-center"><p class="text-sm font-bold text-slate-800">Profil siswa belum terhubung ke akun ini.</p><p class="mt-1 text-xs text-slate-500">Hubungi administrator sekolah untuk memperbaiki data akun.</p></div>
        @endif
    </div>
@endsection
