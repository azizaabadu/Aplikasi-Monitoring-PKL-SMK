@extends('layouts.kepsek')

@section('title', 'Pengaturan Akun & Profil - Portal Kepala Sekolah')

@section('content')
<div class="space-y-6 max-w-4xl">

    <!-- HEADER -->
    <div>
        <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
            <span>Beranda Eksekutif</span>
            <span>/</span>
            <span class="text-slate-800 font-semibold">Pengaturan Akun</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Pengaturan Profil & Keamanan</h1>
        <p class="text-xs text-slate-500 mt-1">Kelola data kredensial akses pimpinan satuan pendidikan.</p>
    </div>

    @if (session('status'))
        <div role="status" class="flex items-center gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold shadow-sm">
            <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    @if (isset($errors) && $errors->any())
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

    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

        <!-- KARTU KIRI: INFORMASI PROFIL (5 Kolom) -->
        <div class="md:col-span-5 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-5">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-user-tie text-amber-600"></i>
                    Profil Kepala Sekolah
                </h3>
                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-50 text-amber-800 border border-amber-200">
                    Pimpinan
                </span>
            </div>

            <div class="flex flex-col items-center text-center py-2 space-y-2">
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-tr from-[#0B1527] to-[#1E3A6D] text-amber-400 flex items-center justify-center text-2xl font-black shadow-lg">
                    KS
                </div>
                <div>
                    <h4 class="font-extrabold text-slate-900 text-sm">{{ $user->name ?? 'Drs. H. Sudirman, M.Pd' }}</h4>
                    <p class="text-xs text-slate-500 font-medium">Kepala SMKN 1 Batam</p>
                </div>
            </div>

            <div class="space-y-3 pt-3 border-t border-slate-100 text-xs">
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase block">Username Akun</span>
                    <span class="font-bold text-slate-800">{{ $user->username ?? 'kepsek1' }}</span>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase block">Email Resmi</span>
                    <span class="font-medium text-slate-700">{{ $user->email ?? 'kepala.sekolah@smkn1batam.sch.id' }}</span>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase block">Peran Sistem</span>
                    <span class="font-bold text-amber-700">Kepala Sekolah (Akses Penuh Pengesahan)</span>
                </div>
            </div>
        </div>

        <!-- KARTU KANAN: FORM UBAH KATA SANDI (7 Kolom) -->
        <div class="md:col-span-7 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-5">
            <div class="border-b border-slate-100 pb-3">
                <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
                    <i class="fa-solid fa-key text-slate-700"></i>
                    Perbarui Kata Sandi
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">Disarankan memperbarui kata sandi secara berkala demi keamanan data sekolah.</p>
            </div>

            <form action="{{ route('kepsek.pengaturan.password') }}" method="POST" class="space-y-4 text-xs">
                @csrf

                <div>
                    <label class="block font-bold text-slate-700 mb-1">Kata Sandi Saat Ini</label>
                    <input type="password" name="current_password" required placeholder="••••••••••••" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-amber-500 font-medium text-slate-800" />
                </div>

                <div>
                    <label class="block font-bold text-slate-700 mb-1">Kata Sandi Baru</label>
                    <input type="password" name="password" required placeholder="Minimal 8 karakter..." class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-amber-500 font-medium text-slate-800" />
                </div>

                <div>
                    <label class="block font-bold text-slate-700 mb-1">Konfirmasi Kata Sandi Baru</label>
                    <input type="password" name="password_confirmation" required placeholder="Ulangi kata sandi baru..." class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-amber-500 font-medium text-slate-800" />
                </div>

                <div class="pt-2">
                    <button type="submit" class="px-5 py-3 rounded-xl bg-[#0B1527] hover:bg-[#1E3A6D] text-white font-bold text-xs shadow transition flex items-center gap-2">
                        <i class="fa-solid fa-shield-halved text-amber-400"></i>
                        <span>Simpan Kata Sandi Baru</span>
                    </button>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection
