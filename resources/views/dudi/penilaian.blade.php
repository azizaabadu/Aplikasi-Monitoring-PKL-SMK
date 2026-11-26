@extends('layouts.dudi')

@section('title', 'Penilaian Lapangan - PKL.ID')

@section('content')
    <div class="mx-auto max-w-7xl space-y-5">
        <div><p class="text-xs font-semibold text-slate-500">DUDI <span class="px-1">/</span> Penilaian Lapangan</p><h1 class="mt-1 text-2xl font-black text-slate-900">Penilaian Lapangan</h1><p class="mt-1 text-sm text-slate-500">Isi nilai kompetensi teknis dan nonteknis siswa. Rentang nilai setiap komponen adalah 0–100.</p></div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div class="rounded-2xl border border-slate-200 bg-white p-4"><p class="text-xs font-bold text-slate-500">Siswa dalam daftar</p><p class="mt-2 text-2xl font-black text-slate-900">{{ $siswas->total() }}</p></div>
            <div class="rounded-2xl border border-slate-200 bg-white p-4"><p class="text-xs font-bold text-slate-500">Sudah dinilai pihak industri</p><p class="mt-2 text-2xl font-black text-sky-700">{{ $siswas->getCollection()->filter(fn ($siswa) => $siswa->penilaians->isNotEmpty())->count() }}<span class="ml-1 text-sm font-semibold text-slate-400">di halaman ini</span></p></div>
        </div>

        <section class="space-y-4">
            @forelse ($siswas as $siswa)
                @php($assessment = $siswa->penilaians->first())
                <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div><h2 class="text-sm font-extrabold text-slate-900">{{ $siswa->nama ?: $siswa->user?->name }}</h2><p class="mt-1 text-xs text-slate-500">{{ $siswa->nis }} · {{ $siswa->kelas }} · {{ $siswa->jurusan }}</p></div>
                        <span class="rounded-full px-3 py-1 text-[10px] font-bold {{ $assessment ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">{{ $assessment ? 'Sudah dinilai' : 'Belum dinilai' }}</span>
                    </div>
                    <form method="POST" action="{{ route('dudi.penilaian.update', $siswa) }}" data-disable-on-submit class="mt-4 grid gap-3 md:grid-cols-2 xl:grid-cols-4">
                        @csrf @method('PUT')
                        <div><label for="teknis-{{ $siswa->id }}" class="mb-1.5 block text-[11px] font-bold text-slate-700">Nilai teknis</label><input id="teknis-{{ $siswa->id }}" name="nilai_teknis" type="number" min="0" max="100" step="1" required value="{{ old('nilai_teknis', $assessment?->nilai_teknis) }}" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm"></div>
                        <div><label for="nonteknis-{{ $siswa->id }}" class="mb-1.5 block text-[11px] font-bold text-slate-700">Nilai nonteknis</label><input id="nonteknis-{{ $siswa->id }}" name="nilai_non_teknis" type="number" min="0" max="100" step="1" required value="{{ old('nilai_non_teknis', $assessment?->nilai_non_teknis) }}" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm"></div>
                        <div class="md:col-span-2"><label for="catatan-{{ $siswa->id }}" class="mb-1.5 block text-[11px] font-bold text-slate-700">Catatan pembimbing <span class="font-normal text-slate-400">(opsional)</span></label><input id="catatan-{{ $siswa->id }}" name="catatan" maxlength="2000" value="{{ old('catatan', $assessment?->catatan) }}" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm" placeholder="Catatan perkembangan dan saran untuk siswa"></div>
                        <div class="md:col-span-2 xl:col-span-4"><button type="submit" class="rounded-xl bg-[#0F1E38] px-4 py-2.5 text-xs font-extrabold text-white hover:bg-sky-800"><i class="fa-solid fa-floppy-disk mr-1.5" aria-hidden="true"></i>{{ $assessment ? 'Perbarui penilaian' : 'Simpan penilaian' }}</button></div>
                    </form>
                </article>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-5 py-12 text-center"><i class="fa-solid fa-user-graduate text-3xl text-slate-400" aria-hidden="true"></i><p class="mt-3 text-sm font-bold text-slate-700">Belum ada siswa untuk dinilai</p><p class="mt-1 text-xs text-slate-500">Siswa yang ditempatkan di DUDI Anda akan tampil di sini.</p></div>
            @endforelse
        </section>
        <div>{{ $siswas->links() }}</div>
    </div>
@endsection
