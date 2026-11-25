@extends('layouts.orangtua')

@section('title', 'Pengaturan Akun Wali Murid - Portal Orang Tua PKL.ID')

@section('content')
<div class="space-y-6 max-w-5xl">

    @forelse ($anakAnak as $anak)
        @php
            $siswa = $anak['student'];
            $profile = $anak['profile'];
        @endphp

        <!-- 1. BREADCRUMB & HEADER -->
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-1">
                <a href="{{ route('orangtua.dashboard') }}" class="hover:text-sky-600 transition">Beranda</a>
                <span>/</span>
                <span class="text-slate-800">Pengaturan Akun Wali</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                Pengaturan Akun & Keamanan
            </h1>
            <p class="text-xs text-slate-500 mt-1">
                Kelola data profil wali murid, preferensi notifikasi pemantauan, dan keamanan akun Anda.
            </p>
        </div>

        <!-- 2. STATUS VERIFIKASI AKUN WALI -->
        <div class="rounded-2xl border border-sky-200 bg-sky-50/70 p-5 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-sky-600 text-white text-lg">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <h2 class="text-xs font-extrabold text-sky-950">Status Akun: Wali Terverifikasi</h2>
                        <span class="rounded bg-sky-600 px-2 py-0.5 text-[9px] font-black uppercase text-white">Aktif</span>
                    </div>
                    <p class="text-xs text-sky-800 mt-0.5">
                        Akun ini sah terdaftar atas nama orang tua / wali ananda <strong>{{ $siswa->nama ?? 'Siswa PKL' }}</strong> (NISN: {{ $siswa->nis ?? '0058291823' }}).
                    </p>
                </div>
            </div>
        </div>

        <!-- 3. SECTION IDENTITAS WALI MURID & DATA SISWA ASUHAN -->
        <section class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div>
                    <h2 class="text-sm font-extrabold uppercase tracking-wider text-slate-900">
                        Identitas Wali Murid & Ananda Asuhan
                    </h2>
                    <p class="text-xs text-slate-500">Data resmi yang tercatat pada basis data sekolah</p>
                </div>
                <span class="text-xs text-slate-400 font-semibold">Tercatat di BKK</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                <div>
                    <label class="block text-[11px] font-extrabold text-slate-500 uppercase mb-1">Nama Lengkap Wali</label>
                    <input type="text" readonly value="{{ auth()->user()->name ?? 'Bapak Hendra Pratama' }}" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 font-bold text-slate-800 focus:outline-none">
                </div>

                <div>
                    <label class="block text-[11px] font-extrabold text-slate-500 uppercase mb-1">Username Masuk Akun</label>
                    <input type="text" readonly value="{{ auth()->user()->username ?? 'ortu_0058291823' }}" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 font-bold text-slate-800 focus:outline-none">
                </div>

                <div>
                    <label class="block text-[11px] font-extrabold text-slate-500 uppercase mb-1">Hubungan Keluarga</label>
                    <input type="text" readonly value="{{ $profile?->hubungan ?? 'Orang Tua Kandung / Ayah' }}" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 font-bold text-slate-800 focus:outline-none">
                </div>

                <div>
                    <label class="block text-[11px] font-extrabold text-slate-500 uppercase mb-1">Ananda yang Dipantau</label>
                    <input type="text" readonly value="{{ $siswa->nama ?? 'Rizky Pratama' }} ({{ $siswa->kelas ?? 'XII' }} {{ $siswa->jurusan ?? 'PPLG' }})" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 font-bold text-slate-800 focus:outline-none">
                </div>
            </div>

            <p class="text-[11px] text-slate-400 italic pt-1">
                * Jika terdapat perubahan data hubungan keluarga atau identitas kependudukan, silakan melapor ke Staf Administrasi / Kurikulum SMKN 1 Batam.
            </p>
        </section>

        <!-- 4. SECTION PREFERENSI NOTIFIKASI PEMANTAUAN -->
        <section class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4">
            <div class="border-b border-slate-100 pb-3">
                <h2 class="text-sm font-extrabold uppercase tracking-wider text-slate-900">
                    Preferensi Pemberitahuan Aplikasi
                </h2>
                <p class="text-xs text-slate-500">Pemberitahuan otomatis perkembangan belajar ananda</p>
            </div>

            <div class="space-y-3">
                <label class="flex items-start gap-3 rounded-xl border border-slate-100 p-3.5 bg-slate-50/50 cursor-pointer hover:bg-slate-50 transition">
                    <input type="checkbox" checked class="mt-0.5 rounded text-sky-600 focus:ring-sky-500 h-4 w-4">
                    <div class="text-xs">
                        <p class="font-extrabold text-slate-900">Pemberitahuan Presensi & Keterlambatan</p>
                        <p class="text-slate-500 text-[11px] mt-0.5">Kirimkan notifikasi jika ananda tercatat terlambat atau belum melakukan check-in di hari kerja.</p>
                    </div>
                </label>

                <label class="flex items-start gap-3 rounded-xl border border-slate-100 p-3.5 bg-slate-50/50 cursor-pointer hover:bg-slate-50 transition">
                    <input type="checkbox" checked class="mt-0.5 rounded text-sky-600 focus:ring-sky-500 h-4 w-4">
                    <div class="text-xs">
                        <p class="font-extrabold text-slate-900">Pemberitahuan Logbook Disahkan</p>
                        <p class="text-slate-500 text-[11px] mt-0.5">Kirimkan rangkuman mingguan logbook ananda yang telah divalidasi oleh mentor industri.</p>
                    </div>
                </label>

                <label class="flex items-start gap-3 rounded-xl border border-slate-100 p-3.5 bg-slate-50/50 cursor-pointer hover:bg-slate-50 transition">
                    <input type="checkbox" checked class="mt-0.5 rounded text-sky-600 focus:ring-sky-500 h-4 w-4">
                    <div class="text-xs">
                        <p class="font-extrabold text-slate-900">Pengumuman & Agenda Penting PKL</p>
                        <p class="text-slate-500 text-[11px] mt-0.5">Informasi jadwal visitasi guru pembimbing, sidang magang, dan pengumuman resmi sekolah.</p>
                    </div>
                </label>
            </div>
        </section>

        <!-- 5. SECTION KEAMANAN & GANTI KATA SANDI (SESUAI PRD A3) -->
        <section class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4">
            <div class="border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-lock text-sky-600"></i>
                    <h2 class="text-sm font-extrabold uppercase tracking-wider text-slate-900">
                        Keamanan & Ubah Kata Sandi
                    </h2>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">
                    Sesuai aturan keamanan PRD Bagian 5.1 (A3): Kata sandi lama wajib diisi, dan kata sandi baru minimal 8 karakter.
                </p>
            </div>

            @if (isset($errors) && $errors->any())
                <div class="rounded-xl border border-rose-200 bg-rose-50 p-4 text-xs font-bold text-rose-800 space-y-1">
                    @foreach ($errors->all() as $error)
                        <p><i class="fa-solid fa-triangle-exclamation mr-1"></i> {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('orangtua.pengaturan.password') }}" method="POST" class="space-y-4 max-w-xl">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">
                        Kata Sandi Saat Ini <span class="text-rose-500">*</span>
                    </label>
                    <input type="password" name="current_password" required placeholder="Masukkan kata sandi lama Anda" class="w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-600/20">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">
                        Kata Sandi Baru <span class="text-rose-500">* (Minimal 8 karakter)</span>
                    </label>
                    <input type="password" name="password" required minlength="8" placeholder="Minimal 8 karakter unik" class="w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-600/20">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">
                        Konfirmasi Kata Sandi Baru <span class="text-rose-500">*</span>
                    </label>
                    <input type="password" name="password_confirmation" required minlength="8" placeholder="Ulangi kata sandi baru" class="w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 focus:border-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-600/20">
                </div>

                <div class="pt-2">
                    <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-[#0F1E38] px-5 py-2.5 text-xs font-bold text-white shadow-sm transition hover:bg-[#1E3A6D]">
                        <i class="fa-solid fa-key text-sky-400"></i>
                        <span>Perbarui Kata Sandi</span>
                    </button>
                </div>
            </form>
        </section>

    @empty
        <div class="rounded-3xl border border-slate-200 bg-white p-12 text-center shadow-sm max-w-lg mx-auto">
            <h2 class="text-lg font-black text-slate-900">Belum Ada Profil Wali Terhubung</h2>
        </div>
    @endforelse

</div>
@endsection
