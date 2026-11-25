@extends('layouts.orangtua')

@section('title', 'Informasi Mitra & Pembimbing Ananda - Portal Orang Tua PKL.ID')

@section('content')
<div class="space-y-6">

    @forelse ($anakAnak as $anak)
        @php
            $siswa = $anak['student'];
            $dudi = $anak['dudi'];
            $guru = $anak['teacher'];
            $mentor = $anak['mentor'];
        @endphp

        <!-- 1. BREADCRUMB & HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-1">
                    <a href="{{ route('orangtua.dashboard') }}" class="hover:text-sky-600 transition">Beranda</a>
                    <span>/</span>
                    <span class="text-slate-800">Informasi Mitra & Pembimbing</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                    Informasi Mitra & Pembimbing
                </h1>
                <p class="text-xs text-slate-500 mt-1">
                    Profil lengkap instansi penempatan dan saluran komunikasi resmi pembimbing PKL ananda {{ $siswa->nama ?? 'Siswa' }}.
                </p>
            </div>

            <div class="flex items-center gap-2.5">
                <a href="https://wa.me/" target="_blank" class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-xs font-bold text-white shadow-sm transition hover:bg-emerald-700">
                    <i class="fa-brands fa-whatsapp text-sm"></i>
                    <span>Kontak WhatsApp Sekolah</span>
                </a>
            </div>
        </div>

        <!-- 2. HERO BENTO CARD: PROFIL MITRA INDUSTRI (DUDI) -->
        <section class="rounded-3xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-sm space-y-6">
            <div class="flex flex-col md:flex-row md:items-start justify-between gap-4 border-b border-slate-100 pb-6">
                <div class="flex items-start gap-4">
                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-tr from-[#0F1E38] to-[#1E3A6D] text-white text-2xl shadow-md">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <div>
                        <div class="flex flex-wrap items-center gap-2">
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900">
                                {{ $dudi?->nama_dudi ?? 'PT Solusi Teknologi Nusantara' }}
                            </h2>
                            <span class="rounded-full bg-emerald-50 px-3 py-0.5 text-[10px] font-extrabold uppercase text-emerald-700 border border-emerald-200">
                                Mitra Resmi MoU
                            </span>
                        </div>
                        <p class="text-xs text-slate-500 mt-1">
                            Bidang Industri: <strong class="text-slate-700">{{ $dudi?->bidang_usaha ?? 'Teknologi Informasi, Rekayasa Perangkat Lunak & Cloud Service' }}</strong>
                        </p>
                    </div>
                </div>

                <div class="rounded-xl bg-slate-50 border border-slate-100 px-4 py-2 text-right">
                    <span class="text-[10px] font-extrabold uppercase text-slate-400">Kerja Sama Sekolah</span>
                    <p class="text-xs font-black text-slate-800 mt-0.5">MoU Berlaku s.d 2026</p>
                </div>
            </div>

            <!-- Detail Kontak & Lokasi Magang -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-xs">
                
                <div class="space-y-1.5">
                    <p class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 flex items-center gap-1.5">
                        <i class="fa-solid fa-location-dot text-sky-600"></i> Alamat Kantor / Penempatan
                    </p>
                    <p class="font-bold text-slate-800 leading-relaxed">
                        {{ $dudi?->alamat ?? 'Nongsa Digital Park, Gedung Cyber Tower Lt. 3, Jl. Hang Lekiu KM 2, Sambau, Batam, Kepulauan Riau' }}
                    </p>
                </div>

                <div class="space-y-1.5">
                    <p class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 flex items-center gap-1.5">
                        <i class="fa-solid fa-phone text-sky-600"></i> Narahubung & Telepon Kantor
                    </p>
                    <p class="font-bold text-slate-800">
                        {{ $dudi?->kontak ?? '0778-462310 / 0811-7700-101' }}
                    </p>
                    <p class="text-[11px] text-slate-500">Email: hr-vokasi@solusiteknologi.co.id</p>
                </div>

                <div class="space-y-1.5">
                    <p class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 flex items-center gap-1.5">
                        <i class="fa-regular fa-clock text-sky-600"></i> Jam Operasional Magang
                    </p>
                    <p class="font-bold text-slate-800">
                        Senin – Jumat (08:00 – 17:00 WIB)
                    </p>
                    <p class="text-[11px] text-slate-500">Istirahat: 12:00 – 13:00 WIB (Sabtu-Minggu Libur)</p>
                </div>

            </div>
        </section>

        <!-- 3. KARTU PENDAMPING RESMI (2 KOLOM: GURU & MENTOR INDUSTRI) -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Card 1: Guru Pembimbing Sekolah -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-700 text-lg">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">Sekolah (SMKN 1 Batam)</span>
                            <h3 class="text-sm font-black text-slate-900">{{ $guru?->name ?? 'Dra. Sri Wahyuni, M.Pd' }}</h3>
                        </div>
                    </div>
                    <span class="rounded-full bg-indigo-50 px-2.5 py-0.5 text-[10px] font-bold text-indigo-700">Guru Pembimbing</span>
                </div>

                <div class="space-y-2 text-xs text-slate-600">
                    <div class="flex items-center justify-between py-1 border-b border-slate-50">
                        <span class="text-slate-400">NIP</span>
                        <span class="font-bold text-slate-800">19780415 200501 2 003</span>
                    </div>
                    <div class="flex items-center justify-between py-1 border-b border-slate-50">
                        <span class="text-slate-400">Kompetensi Keahlian</span>
                        <span class="font-bold text-slate-800">Pengembangan Perangkat Lunak (PPLG)</span>
                    </div>
                    <div class="flex items-center justify-between py-1 border-b border-slate-50">
                        <span class="text-slate-400">Jadwal Visitasi Monitoring</span>
                        <span class="font-bold text-slate-800">Setiap 2 Minggu Sekali</span>
                    </div>
                </div>

                <a href="https://wa.me/" target="_blank" class="flex w-full items-center justify-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-slate-800">
                    <i class="fa-brands fa-whatsapp text-emerald-400"></i>
                    <span>Konsultasi Daring Guru Pembimbing</span>
                </a>
            </div>

            <!-- Card 2: Mentor Lapangan DUDI -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-50 text-sky-700 text-lg">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">Mitra Industri</span>
                            <h3 class="text-sm font-black text-slate-900">{{ $mentor?->name ?? 'Ahmad Fauzi, S.Kom' }}</h3>
                        </div>
                    </div>
                    <span class="rounded-full bg-sky-50 px-2.5 py-0.5 text-[10px] font-bold text-sky-700">Mentor Lapangan</span>
                </div>

                <div class="space-y-2 text-xs text-slate-600">
                    <div class="flex items-center justify-between py-1 border-b border-slate-50">
                        <span class="text-slate-400">Jabatan di Perusahaan</span>
                        <span class="font-bold text-slate-800">Senior Lead Software Engineer</span>
                    </div>
                    <div class="flex items-center justify-between py-1 border-b border-slate-50">
                        <span class="text-slate-400">Divisi Penugasan</span>
                        <span class="font-bold text-slate-800">Engineering & Cloud Architecture</span>
                    </div>
                    <div class="flex items-center justify-between py-1 border-b border-slate-50">
                        <span class="text-slate-400">Kapasitas Pembimbingan</span>
                        <span class="font-bold text-slate-800">6 Siswa Magang</span>
                    </div>
                </div>

                <a href="tel:{{ $dudi?->kontak ?? '0778462310' }}" class="flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-bold text-slate-700 transition hover:bg-slate-50">
                    <i class="fa-solid fa-phone text-sky-600"></i>
                    <span>Hubungi Saluran Telepon Kantor</span>
                </a>
            </div>

        </section>

        <!-- 4. JAMINAN KESELAMATAN & PROTOKOL TANGGAP DARURAT -->
        <section class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved text-sky-600 text-lg"></i>
                    <h2 class="text-base font-black text-slate-900">Perlindungan Keselamatan Kerja & Jaminan Siswa</h2>
                </div>
                <span class="rounded-full bg-emerald-50 px-2.5 py-0.5 text-[10px] font-bold text-emerald-700">BPJS Ketenagakerjaan Aktif</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-1">
                
                <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 space-y-2">
                    <p class="text-xs font-bold text-slate-900 flex items-center gap-1.5">
                        <i class="fa-solid fa-heart-pulse text-rose-500"></i> Jaminan Kecelakaan Kerja (JKK)
                    </p>
                    <p class="text-[11px] text-slate-600 leading-relaxed">
                        Menjamin penanganan medis penuh selama perjalanan berangkat, beraktivitas di lokasi kerja industri, hingga perjalanan pulang.
                    </p>
                </div>

                <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 space-y-2">
                    <p class="text-xs font-bold text-slate-900 flex items-center gap-1.5">
                        <i class="fa-solid fa-helmet-safety text-amber-500"></i> Kepatuhan SOP K3 Industri
                    </p>
                    <p class="text-[11px] text-slate-600 leading-relaxed">
                        Siswa telah dibekali induksi Keselamatan & Kesehatan Kerja (K3) serta wajib menggunakan perlengkapan kerja sesuai standar mitra.
                    </p>
                </div>

                <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 space-y-2">
                    <p class="text-xs font-bold text-slate-900 flex items-center gap-1.5">
                        <i class="fa-solid fa-truck-medical text-sky-600"></i> SOP Tanggap Darurat 24 Jam
                    </p>
                    <p class="text-[11px] text-slate-600 leading-relaxed">
                        Jika terjadi insiden darurat di tempat kerja, pihak DUDI langsung mengabarkan ke tim Hubin Sekolah dan orang tua dalam waktu &le; 30 menit.
                    </p>
                </div>

            </div>
        </section>

    @empty
        <div class="rounded-3xl border border-slate-200 bg-white p-12 text-center shadow-sm max-w-lg mx-auto">
            <h2 class="text-lg font-black text-slate-900">Belum Ada Informasi Mitra</h2>
        </div>
    @endforelse

</div>
@endsection
