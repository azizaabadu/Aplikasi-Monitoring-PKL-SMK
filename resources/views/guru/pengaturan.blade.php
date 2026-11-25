@extends('layouts.guru')

@section('title', 'Pengaturan Akun - PKL.ID')

@section('content')
<div class="max-w-3xl space-y-6">
    <div>
        <h1 class="text-xl font-black text-slate-900">Pengaturan Akun &amp; Keamanan</h1>
        <p class="text-xs text-slate-500">Kelola informasi profil akun guru pembimbing dan pembaruan kata sandi.</p>
    </div>

    <!-- Informasi Profil -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs space-y-4 text-xs">
        <h2 class="font-black text-sm text-slate-900 border-b border-slate-100 pb-3">Profil Guru Pembimbing</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-bold text-slate-500 mb-1">Nama Lengkap</label>
                <input type="text" value="{{ auth()->user()->name ?? 'Budi Santoso, S.Pd' }}" readonly class="w-full bg-slate-100 border border-slate-200 rounded-xl px-3.5 py-2 font-semibold text-slate-700">
            </div>
            <div>
                <label class="block font-bold text-slate-500 mb-1">Username Login</label>
                <input type="text" value="{{ auth()->user()->username ?? 'guru1' }}" readonly class="w-full bg-slate-100 border border-slate-200 rounded-xl px-3.5 py-2 font-semibold text-slate-700">
            </div>
        </div>
    </div>

    <!-- Form Ganti Kata Sandi (Sesuai PRD A3) -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs space-y-4 text-xs">
        <div class="border-b border-slate-100 pb-3">
            <h2 class="font-black text-sm text-slate-900">Ganti Kata Sandi</h2>
            <p class="text-[11px] text-slate-400">Kata sandi lama wajib diisi. Kata sandi baru minimal 8 karakter[cite: 18].</p>
        </div>

        <form action="#" method="POST" class="space-y-3">
            @csrf
            <div>
                <label class="block font-bold text-slate-700 mb-1">Kata Sandi Lama</label>
                <input type="password" name="current_password" required placeholder="Masukkan kata sandi saat ini" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Kata Sandi Baru</label>
                    <input type="password" name="password" minlength="8" required placeholder="Minimal 8 karakter" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 mb-1">Konfirmasi Kata Sandi Baru</label>
                    <input type="password" name="password_confirmation" minlength="8" required placeholder="Ulangi kata sandi baru" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2">
                </div>
            </div>
            <div class="pt-2">
                <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition shadow-xs">
                    Simpan Kata Sandi Baru
                </button>
            </div>
        </form>
    </div>
</div>
@endsection