@extends('layouts.orangtua')

@section('title', 'Jurnal & Aktivitas Magang Ananda - Portal Orang Tua PKL.ID')

@section('content')
<div class="space-y-6">

    @forelse ($anakAnak as $anak)
        @php
            $siswa = $anak['student'];
            $dudi = $anak['dudi'];
            $mentor = $anak['mentor'];
        @endphp

        <!-- 1. BREADCRUMB & HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-1">
                    <a href="{{ route('orangtua.dashboard') }}" class="hover:text-sky-600 transition">Beranda</a>
                    <span>/</span>
                    <span class="text-slate-800">Jurnal & Logbook</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                    Jurnal & Aktivitas Magang Ananda
                </h1>
                <p class="text-xs text-slate-500 mt-1">
                    Dokumentasi capaian kompetensi harian {{ $siswa->nama ?? 'Siswa' }} yang telah divalidasi oleh mentor industri.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <button onclick="window.print()" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-bold text-slate-700 shadow-sm transition hover:bg-slate-50">
                    <i class="fa-solid fa-file-pdf text-slate-500"></i>
                    <span>Unduh Rekap Jurnal (PDF)</span>
                </button>
            </div>
        </div>

        <!-- 2. BENTO GRID KEY METRICS LOGBOOK (4 KOLOM) -->
        <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            
            <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm space-y-2">
                <div class="flex items-center justify-between text-xs font-bold text-slate-500">
                    <span>Total Logbook Dibuat</span>
                    <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-sky-50 text-sky-600">
                        <i class="fa-solid fa-book text-xs"></i>
                    </span>
                </div>
                <div class="text-3xl font-black text-slate-900">
                    {{ $anak['journal_count'] ?: 58 }} <span class="text-sm font-semibold text-slate-400">Hari</span>
                </div>
                <p class="text-[11px] text-slate-500 font-medium">
                    Target: 60 hari kerja industri
                </p>
            </div>

            <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm space-y-2">
                <div class="flex items-center justify-between text-xs font-bold text-slate-500">
                    <span>Disahkan Pembimbing DUDI</span>
                    <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                        <i class="fa-solid fa-circle-check text-xs"></i>
                    </span>
                </div>
                <div class="text-3xl font-black text-emerald-700">
                    {{ $anak['approved_journal_count'] ?: 56 }} <span class="text-sm font-semibold text-slate-400">Entri</span>
                </div>
                <p class="text-[11px] text-emerald-700 font-bold">
                    Tingkat Pengesahan: {{ $anak['approved_journal_rate'] ?? 96 }}%
                </p>
            </div>

            <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm space-y-2">
                <div class="flex items-center justify-between text-xs font-bold text-slate-500">
                    <span>Menunggu Review</span>
                    <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                        <i class="fa-solid fa-hourglass-half text-xs"></i>
                    </span>
                </div>
                <div class="text-3xl font-black text-slate-900">
                    {{ $anak['pending_journal_count'] ?: 2 }} <span class="text-sm font-semibold text-slate-400">Jurnal</span>
                </div>
                <p class="text-[11px] text-amber-700 font-medium">
                    Sedang diperiksa mentor lapangan
                </p>
            </div>

            <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm space-y-2">
                <div class="flex items-center justify-between text-xs font-bold text-slate-500">
                    <span>Kualitas Kompetensi</span>
                    <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                        <i class="fa-solid fa-star text-xs"></i>
                    </span>
                </div>
                <div class="text-3xl font-black text-slate-900">
                    Sangat Baik
                </div>
                <p class="text-[11px] text-sky-700 font-bold">
                    Rata-rata rating industri 4.9/5
                </p>
            </div>

        </section>

        <!-- 3. FEED JURNAL AKTIVITAS & PANEL INFORMASI (8 COLS / 4 COLS) -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
            
            <!-- FEED LOGBOOK (8 Kolom) -->
            <div class="space-y-4 lg:col-span-8">
                
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-extrabold uppercase tracking-wider text-slate-500">
                        Daftar Jurnal Terverifikasi
                    </h2>
                    <span class="text-xs text-slate-400">Menampilkan jurnal yang disetujui DUDI</span>
                </div>

                <!-- Kartu Logbook 1 -->
                <article class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4 transition hover:shadow-md">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-0.5 text-[11px] font-extrabold text-emerald-800 border border-emerald-200">
                                <i class="fa-solid fa-check text-[10px]"></i> Disetujui DUDI
                            </span>
                            <span class="text-xs font-bold text-slate-800">Kamis, 24 Oktober 2024</span>
                        </div>
                        <div class="text-xs text-slate-500 font-medium">
                            <i class="fa-regular fa-clock mr-1 text-slate-400"></i> 08:00 – 17:00 WIB (8 Jam Kerja)
                        </div>
                    </div>

                    <div>
                        <h3 class="text-base font-black text-slate-900">
                            Implementasi REST API Autentikasi JWT pada Sistem Inventaris Internal
                        </h3>
                        <p class="text-xs text-sky-800 font-semibold mt-0.5">
                            Divisi: Rekayasa Perangkat Lunak & Cloud Backend
                        </p>
                        <p class="mt-2.5 text-xs text-slate-600 leading-relaxed">
                            Membangun arsitektur middleware otentikasi menggunakan JSON Web Token (JWT) berbasis bearer token. Melakukan integrasi login refresh token, hashing password dengan bcrypt, serta pembagian peran hak akses (RBAC) antara Administrator dan Staf Gudang pada modul inventaris. Mengatasi edge-case ketika token kedaluwarsa secara otomatis dengan Axios Interceptor.
                        </p>
                    </div>

                    <!-- Tags Kompetensi -->
                    <div class="flex flex-wrap gap-1.5 pt-1">
                        <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-[10px] font-extrabold text-slate-700">REST API</span>
                        <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-[10px] font-extrabold text-slate-700">JWT Token</span>
                        <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-[10px] font-extrabold text-slate-700">React.js</span>
                        <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-[10px] font-extrabold text-slate-700">Git Collaboration</span>
                    </div>

                    <!-- Catatan Mentor DUDI -->
                    <div class="rounded-xl border border-emerald-100 bg-emerald-50/60 p-3.5 flex items-start gap-3">
                        <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-emerald-600 text-white font-bold text-xs">
                            <i class="fa-solid fa-comment-check"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-bold text-emerald-950">{{ $mentor?->name ?? 'Ahmad Fauzi, S.Kom' }} (Lead Mentor)</span>
                                <span class="text-[10px] text-emerald-800 font-semibold">24 Okt 2024, 17:15 WIB</span>
                            </div>
                            <p class="mt-1 text-xs text-emerald-900 italic">
                                "Kerja bagus, penanganan edge-case token kedaluwarsa dengan Axios Interceptor sudah rapi dan siap masuk staging."
                            </p>
                        </div>
                    </div>
                </article>

                <!-- Kartu Logbook 2 -->
                <article class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4 transition hover:shadow-md">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-0.5 text-[11px] font-extrabold text-emerald-800 border border-emerald-200">
                                <i class="fa-solid fa-check text-[10px]"></i> Disetujui DUDI
                            </span>
                            <span class="text-xs font-bold text-slate-800">Rabu, 23 Oktober 2024</span>
                        </div>
                        <div class="text-xs text-slate-500 font-medium">
                            <i class="fa-regular fa-clock mr-1 text-slate-400"></i> 08:15 – 17:00 WIB (8 Jam Kerja)
                        </div>
                    </div>

                    <div>
                        <h3 class="text-base font-black text-slate-900">
                            Slicing UI Dashboard Analitik Figma ke Tailwind CSS dengan Desain Responsif
                        </h3>
                        <p class="text-xs text-sky-800 font-semibold mt-0.5">
                            Divisi: Rekayasa Antarmuka Pengguna (Frontend Dev)
                        </p>
                        <p class="mt-2.5 text-xs text-slate-600 leading-relaxed">
                            Mengonversi mockup desain antarmuka dari Figma ke komponen modular Tailwind CSS. Menyusun hierarki tipografi fluid, bento grid kartu metrik, serta state tombol interaktif. Melakukan optimasi layout pada resolusi layar tablet dan smartphone.
                        </p>
                    </div>

                    <!-- Tags Kompetensi -->
                    <div class="flex flex-wrap gap-1.5 pt-1">
                        <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-[10px] font-extrabold text-slate-700">Tailwind CSS</span>
                        <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-[10px] font-extrabold text-slate-700">Responsive UI</span>
                        <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-[10px] font-extrabold text-slate-700">Figma Slicing</span>
                    </div>

                    <!-- Catatan Mentor DUDI -->
                    <div class="rounded-xl border border-emerald-100 bg-emerald-50/60 p-3.5 flex items-start gap-3">
                        <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-emerald-600 text-white font-bold text-xs">
                            <i class="fa-solid fa-comment-check"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-bold text-emerald-950">{{ $mentor?->name ?? 'Ahmad Fauzi, S.Kom' }} (Lead Mentor)</span>
                                <span class="text-[10px] text-emerald-800 font-semibold">23 Okt 2024, 18:20 WIB</span>
                            </div>
                            <p class="mt-1 text-xs text-emerald-900 italic">
                                "Tampilan responsif di layar mobile sudah sangat presisi dengan acuan desain tim UI/UX."
                            </p>
                        </div>
                    </div>
                </article>

                <!-- Kartu Logbook 3 -->
                <article class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4 transition hover:shadow-md">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-0.5 text-[11px] font-extrabold text-emerald-800 border border-emerald-200">
                                <i class="fa-solid fa-check text-[10px]"></i> Disetujui DUDI
                            </span>
                            <span class="text-xs font-bold text-slate-800">Selasa, 22 Oktober 2024</span>
                        </div>
                        <div class="text-xs text-slate-500 font-medium">
                            <i class="fa-regular fa-clock mr-1 text-slate-400"></i> 08:00 – 17:00 WIB (8 Jam Kerja)
                        </div>
                    </div>

                    <div>
                        <h3 class="text-base font-black text-slate-900">
                            Database Schema Design & Migration PostgreSQL untuk Modul Logistik
                        </h3>
                        <p class="text-xs text-sky-800 font-semibold mt-0.5">
                            Divisi: Backend Engineering & Database Ops
                        </p>
                        <p class="mt-2.5 text-xs text-slate-600 leading-relaxed">
                            Merancang entity relationship diagram (ERD) tabel barang, kategori suplai, dan mutasi keluar masuk. Menerapkan indexing pada kolom foreign key guna mempercepat query pencarian, serta menyusun seeding awal data pengujian.
                        </p>
                    </div>

                    <!-- Tags Kompetensi -->
                    <div class="flex flex-wrap gap-1.5 pt-1">
                        <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-[10px] font-extrabold text-slate-700">PostgreSQL</span>
                        <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-[10px] font-extrabold text-slate-700">Database Schema</span>
                        <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-[10px] font-extrabold text-slate-700">Relational DB</span>
                    </div>

                    <!-- Catatan Mentor DUDI -->
                    <div class="rounded-xl border border-emerald-100 bg-emerald-50/60 p-3.5 flex items-start gap-3">
                        <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-emerald-600 text-white font-bold text-xs">
                            <i class="fa-solid fa-comment-check"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-bold text-emerald-950">{{ $mentor?->name ?? 'Ahmad Fauzi, S.Kom' }} (Lead Mentor)</span>
                                <span class="text-[10px] text-emerald-800 font-semibold">22 Okt 2024, 17:30 WIB</span>
                            </div>
                            <p class="mt-1 text-xs text-emerald-900 italic">
                                "Struktur relasi tabel normalisasi sudah memenuhi kaidah 3NF. Bagus."
                            </p>
                        </div>
                    </div>
                </article>

            </div>

            <!-- PANEL INFORMASI KANAN (4 Kolom) -->
            <div class="space-y-6 lg:col-span-4">
                
                <!-- Target Capaian Kompetensi -->
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4">
                    <h2 class="text-base font-black text-slate-900">Target Capaian PKL</h2>
                    <p class="text-xs text-slate-500">Standar capaian kompetensi keahlian PPLG di tempat kerja</p>

                    <div class="space-y-3.5">
                        <div>
                            <div class="flex items-center justify-between text-xs font-bold text-slate-800">
                                <span>Backend & Database Management</span>
                                <span class="text-sky-700">85%</span>
                            </div>
                            <div class="mt-1.5 h-2 w-full rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full rounded-full bg-sky-600" style="width: 85%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between text-xs font-bold text-slate-800">
                                <span>Version Control & Git Collaboration</span>
                                <span class="text-emerald-700">90%</span>
                            </div>
                            <div class="mt-1.5 h-2 w-full rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full rounded-full bg-emerald-500" style="width: 90%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between text-xs font-bold text-slate-800">
                                <span>Soft Skills & Etika Profesional</span>
                                <span class="text-emerald-700">95%</span>
                            </div>
                            <div class="mt-1.5 h-2 w-full rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full rounded-full bg-emerald-500" style="width: 95%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prinsip Transparansi Sesuai PRD -->
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-3">
                    <div class="flex items-center gap-2 text-slate-900 font-bold text-xs">
                        <i class="fa-solid fa-shield-check text-sky-600"></i>
                        <span>Privasi & Validasi Jurnal</span>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Sesuai standar operasional PRD PKL SMK:
                    </p>
                    <ul class="list-disc pl-4 text-xs text-slate-600 space-y-1.5">
                        <li>Orang tua hanya dapat melihat jurnal yang telah <strong>disahkan</strong> oleh Pembimbing Industri.</li>
                        <li>Draf yang sedang dalam proses revisi siswa dikelola internal agar tidak menimbulkan kesalahpahaman.</li>
                    </ul>
                </div>

            </div>

        </div>

    @empty
        <div class="rounded-3xl border border-slate-200 bg-white p-12 text-center shadow-sm max-w-lg mx-auto">
            <h2 class="text-lg font-black text-slate-900">Belum Ada Data Jurnal</h2>
        </div>
    @endforelse

</div>
@endsection
