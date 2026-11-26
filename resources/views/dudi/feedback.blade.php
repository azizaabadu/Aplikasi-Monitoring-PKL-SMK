@extends('layouts.dudi')

@section('title', 'Umpan Balik & Masalah - PKL.ID')

@section('content')
    <div class="mx-auto max-w-7xl space-y-5">
        <div><p class="text-xs font-semibold text-slate-500">DUDI <span class="px-1">/</span> Umpan Balik</p><h1 class="mt-1 text-2xl font-black text-slate-900">Umpan Balik &amp; Masalah</h1><p class="mt-1 text-sm text-slate-500">Catat apresiasi, kendala, atau pelanggaran terkait siswa bimbingan.</p></div>
        <div class="grid gap-5 xl:grid-cols-5">
            <section class="h-fit rounded-2xl border border-slate-200 bg-white p-5 shadow-sm xl:col-span-2">
                <h2 class="text-sm font-black text-slate-900">Buat catatan baru</h2>
                <form method="POST" action="{{ route('dudi.feedback.store') }}" data-disable-on-submit class="mt-4 space-y-4">
                    @csrf
                    <div><label for="siswa_id" class="mb-1.5 block text-xs font-bold text-slate-700">Siswa</label><select id="siswa_id" name="siswa_id" required class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-xs"><option value="">Pilih siswa</option>@foreach ($siswas as $siswa)<option value="{{ $siswa->id }}" @selected(old('siswa_id') == $siswa->id)>{{ $siswa->nama ?: $siswa->user?->name }} · {{ $siswa->kelas }}</option>@endforeach</select></div>
                    <div><label for="kategori" class="mb-1.5 block text-xs font-bold text-slate-700">Jenis catatan</label><select id="kategori" name="kategori" required class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-xs"><option value="">Pilih jenis</option>@foreach (['Apresiasi', 'Kendala', 'Pelanggaran'] as $kategori)<option value="{{ $kategori }}" @selected(old('kategori') === $kategori)>{{ $kategori }}</option>@endforeach</select></div>
                    <div><label for="judul" class="mb-1.5 block text-xs font-bold text-slate-700">Judul</label><input id="judul" name="judul" value="{{ old('judul') }}" required maxlength="150" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-xs" placeholder="Ringkasan umpan balik"></div>
                    <div><label for="deskripsi" class="mb-1.5 block text-xs font-bold text-slate-700">Detail catatan</label><textarea id="deskripsi" name="deskripsi" required minlength="10" maxlength="3000" rows="5" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-xs" placeholder="Jelaskan situasi, waktu, dan tindak lanjut yang disarankan.">{{ old('deskripsi') }}</textarea></div>
                    <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#0F1E38] px-4 py-2.5 text-xs font-extrabold text-white hover:bg-sky-800"><i class="fa-solid fa-paper-plane" aria-hidden="true"></i>Simpan catatan</button>
                </form>
            </section>

            <section class="space-y-3 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm xl:col-span-3">
                <div><h2 class="text-sm font-black text-slate-900">Riwayat umpan balik</h2><p class="mt-1 text-[11px] text-slate-500">Catatan yang pernah dibuat oleh akun DUDI ini.</p></div>
                @forelse ($feedbacks as $feedback)
                    <article class="rounded-xl border border-slate-200 p-4">
                        <div class="flex flex-wrap items-start justify-between gap-2"><div><span class="rounded-full px-2.5 py-1 text-[10px] font-bold {{ $feedback->kategori === 'Pelanggaran' ? 'bg-rose-100 text-rose-800' : ($feedback->kategori === 'Kendala' ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800') }}">{{ $feedback->kategori }}</span><h3 class="mt-2 text-xs font-extrabold text-slate-900">{{ $feedback->judul }}</h3></div><time class="text-[10px] text-slate-500">{{ $feedback->created_at->translatedFormat('d M Y, H:i') }}</time></div>
                        <p class="mt-2 text-[11px] text-slate-600">Siswa: <strong>{{ $feedback->siswa?->nama ?? 'Siswa' }}</strong></p><p class="mt-2 whitespace-pre-line text-xs leading-relaxed text-slate-700">{{ $feedback->deskripsi }}</p>
                    </article>
                @empty
                    <div class="rounded-xl border border-dashed border-slate-300 px-4 py-10 text-center text-xs text-slate-500">Belum ada umpan balik yang tercatat.</div>
                @endforelse
                <div>{{ $feedbacks->links() }}</div>
            </section>
        </div>
    </div>
@endsection
