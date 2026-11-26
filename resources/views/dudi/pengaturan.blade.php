@extends('layouts.dudi')

@section('title', 'Pengaturan DUDI - PKL.ID')

@section('content')
    <div class="mx-auto max-w-5xl space-y-5">
        <div><p class="text-xs font-semibold text-slate-500">DUDI <span class="px-1">/</span> Pengaturan</p><h1 class="mt-1 text-2xl font-black text-slate-900">Pengaturan Akun &amp; Mitra</h1><p class="mt-1 text-sm text-slate-500">Perbarui profil pembimbing, informasi tempat PKL, dan keamanan akun.</p></div>

        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
            <div class="mb-5 flex items-center gap-3"><span class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-50 text-sky-700"><i class="fa-solid fa-building-user" aria-hidden="true"></i></span><div><h2 class="text-sm font-black text-slate-900">Profil pembimbing dan mitra</h2><p class="text-xs text-slate-500">Informasi ini digunakan di portal PKL.</p></div></div>
            <form method="POST" action="{{ route('dudi.pengaturan.update') }}" data-disable-on-submit class="grid gap-4 sm:grid-cols-2">
                @csrf @method('PUT')
                <div><label for="name" class="mb-1.5 block text-xs font-bold text-slate-700">Nama pembimbing</label><input id="name" name="name" value="{{ old('name', $user->name) }}" required maxlength="255" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm"></div>
                <div><label for="nama_dudi" class="mb-1.5 block text-xs font-bold text-slate-700">Nama mitra DUDI</label><input id="nama_dudi" name="nama_dudi" value="{{ old('nama_dudi', $dudi->nama_dudi) }}" required maxlength="255" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm"></div>
                <div><label for="pimpinan" class="mb-1.5 block text-xs font-bold text-slate-700">Pimpinan mitra <span class="font-normal text-slate-400">(opsional)</span></label><input id="pimpinan" name="pimpinan" value="{{ old('pimpinan', $dudi->pimpinan) }}" maxlength="255" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm"></div>
                <div><label for="kontak" class="mb-1.5 block text-xs font-bold text-slate-700">Kontak mitra <span class="font-normal text-slate-400">(opsional)</span></label><input id="kontak" name="kontak" value="{{ old('kontak', $dudi->kontak) }}" maxlength="50" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm"></div>
                <div class="sm:col-span-2"><label for="alamat" class="mb-1.5 block text-xs font-bold text-slate-700">Alamat mitra</label><textarea id="alamat" name="alamat" required maxlength="5000" rows="3" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm">{{ old('alamat', $dudi->alamat) }}</textarea></div>
                <div class="sm:col-span-2"><button type="submit" class="rounded-xl bg-[#0F1E38] px-4 py-2.5 text-xs font-extrabold text-white hover:bg-sky-800"><i class="fa-solid fa-floppy-disk mr-1.5" aria-hidden="true"></i>Simpan profil</button></div>
            </form>
        </section>

        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
            <div class="mb-5 flex items-center gap-3"><span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-700"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i></span><div><h2 class="text-sm font-black text-slate-900">Keamanan akun</h2><p class="text-xs text-slate-500">Gunakan kata sandi yang kuat dan tidak dibagikan.</p></div></div>
            <form method="POST" action="{{ route('dudi.pengaturan.password') }}" data-disable-on-submit class="grid gap-4 sm:grid-cols-2">
                @csrf @method('PUT')
                <div class="sm:col-span-2"><label for="current_password" class="mb-1.5 block text-xs font-bold text-slate-700">Kata sandi saat ini</label><input id="current_password" name="current_password" type="password" required autocomplete="current-password" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm sm:max-w-md"></div>
                <div><label for="password" class="mb-1.5 block text-xs font-bold text-slate-700">Kata sandi baru</label><input id="password" name="password" type="password" required minlength="8" autocomplete="new-password" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm"></div>
                <div><label for="password_confirmation" class="mb-1.5 block text-xs font-bold text-slate-700">Konfirmasi kata sandi baru</label><input id="password_confirmation" name="password_confirmation" type="password" required minlength="8" autocomplete="new-password" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm"></div>
                <div class="sm:col-span-2"><button type="submit" class="rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-xs font-bold text-slate-800 hover:bg-slate-50">Perbarui kata sandi</button></div>
            </form>
        </section>
    </div>
@endsection
