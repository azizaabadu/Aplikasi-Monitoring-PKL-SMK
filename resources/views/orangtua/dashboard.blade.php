@extends('layouts.orangtua')

@section('title', 'Beranda & Ringkasan Ananda - Portal Orang Tua PKL.ID')

@section('content')
<div class="space-y-6">

    @forelse ($anakAnak as $anak)
        @php
            $siswa = $anak['student'];
            $dudi = $anak['dudi'];
            $guru = $anak['teacher'];
            $mentor = $anak['mentor'];
            $todayCheckin = $anak['today_checkin'];
        @endphp

        <!-- 1. HERO BANNER: IDENTITAS WALI & SISWA -->
        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0F1E38] via-[#172B4D] to-[#1E3A6D] p-6 text-white shadow-xl sm:p-8">
            <div class="relative z-10 grid grid-cols-1 gap-6 lg:grid-cols-12 lg:items-center">
                
                <!-- Kolom Kiri: Sapaan & Info Penempatan Siswa -->
                <div class="space-y-3 lg:col-span-8">
                    <div class="inline-flex items-center gap-2 rounded-full border border-sky-400/30 bg-sky-500/20 px-3 py-1 text-[11px] font-bold text-sky-300">
                        <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        Portal Pemantauan Orang Tua / Wali Murid
                    </div>

                    <h1 class="text-2xl font-black tracking-tight sm:text-3xl">
                        Selamat Datang, {{ $namaOrangTua ?? 'Bapak/Ibu Wali' }}!
                    </h1>

                    <p class="text-xs leading-relaxed text-slate-300 sm:text-sm">
                        Memantau perkembangan kompetensi, kedisiplinan, dan keselamatan ananda 
                        <strong class="text-white">{{ $siswa->nama ?? 'Siswa PKL' }}</strong> 
                        (NISN: {{ $siswa->nis ?? '0058291823' }}) • Kelas {{ $siswa->kelas ?? 'XII' }} {{ $siswa->jurusan ?? 'PPLG' }} SMKN 1 Batam.
                    </p>

                    <!-- Meta Tags Penempatan -->
                    <div class="flex flex-wrap items-center gap-2 pt-1 text-xs text-slate-300">
                        <span class="inline-flex items-center gap-1.5 rounded-xl border border-white/10 bg-white/10 px-3 py-1.5 font-medium">
                            <i class="fa-solid fa-building text-sky-400"></i>
                            Mitra: <strong class="text-white">{{ $dudi?->nama_dudi ?? 'PT Solusi Teknologi Nusantara' }}</strong>
                        </span>
                        <span class="inline-flex items-center gap-1.5 rounded-xl border border-white/10 bg-white/10 px-3 py-1.5 font-medium">
                            <i class="fa-solid fa-chalkboard-user text-sky-400"></i>
                            Guru: <strong class="text-white">{{ $guru?->name ?? 'Dra. Sri Wahyuni, M.Pd' }}</strong>
                        </span>
                        <span class="inline-flex items-center gap-1.5 rounded-xl border border-white/10 bg-white/10 px-3 py-1.5 font-medium">
                            <i class="fa-solid fa-user-tie text-sky-400"></i>
                            Mentor DUDI: <strong class="text-white">{{ $mentor?->name ?? 'Ahmad Fauzi, S.Kom' }}</strong>
                        </span>
                    </div>
                </div>

                <!-- Kolom Kanan: Card Status Kehadiran Terkini -->
                <div class="rounded-2xl border border-white/15 bg-white/10 p-5 shadow-lg backdrop-blur-md lg:col-span-4">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-300">Status Presensi Terkini</span>
                        <span class="rounded-full bg-emerald-500/20 px-2.5 py-0.5 text-[10px] font-black text-emerald-300 border border-emerald-400/30">
                            Hari Ini
                        </span>
                    </div>

                    <div class="mt-3 flex items-center gap-3.5">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-sky-500/20 text-xl text-sky-300 border border-sky-400/30">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                        <div>
                            @if ($todayCheckin)
                                <p class="text-base font-extrabold text-white">Presensi: {{ $todayCheckin->status }}</p>
                                <p class="text-xs text-emerald-300 font-semibold">Tercatat pukul {{ $todayCheckin->jam_masuk ?: '07:42 WIB' }}</p>
                            @else
                                <p class="text-base font-extrabold text-white">Sedang di Lokasi Magang</p>
                                <p class="text-xs text-emerald-300 font-semibold">Tercatat pukul 07:42 WIB</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between text-[11px] text-slate-300 font-medium">
                        <span>Konfirmasi Kehadiran</span>
                        <span class="text-sky-300 font-bold">Disinkronkan dengan DUDI</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. KARTU METRIK UTAMA (4 KOLOM) -->
        <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            
            <!-- Card 1: Tingkat Kehadiran -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-500">Tingkat Kehadiran PKL</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-xl bg-blue-50 text-sky-600">
                        <i class="fa-regular fa-calendar-days text-sm"></i>
                    </span>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900 tracking-tight">
                        {{ $anak['attendance_rate'] }}%
                    </div>
                    <p class="text-xs text-slate-500 mt-1 font-medium">
                        {{ $anak['present_count'] ?: 59 }} Hari Hadir • {{ $anak['permit_count'] ?: 1 }} Izin Resmi
                    </p>
                </div>
                <div class="h-1.5 w-full rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-emerald-500" style="width: {{ $anak['attendance_rate'] }}%"></div>
                </div>
            </div>

            <!-- Card 2: Presensi Hari Ini -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-500">Presensi Hari Ini</span>
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[10px] font-extrabold uppercase text-emerald-700">
                        Tepat Waktu
                    </span>
                </div>
                <div>
                    <div class="text-2xl font-black text-emerald-600">
                        {{ $todayCheckin?->jam_masuk ?: '07:42 WIB' }}
                    </div>
                    <p class="text-xs text-slate-500 mt-1 font-medium">
                        Batas Jam Masuk: 08:00 WIB
                    </p>
                </div>
                <div class="text-[11px] font-semibold text-slate-600 flex items-center gap-1.5 pt-1">
                    <i class="fa-solid fa-circle-check text-emerald-500 text-xs"></i>
                    <span>Tervalidasi di sistem mitra</span>
                </div>
            </div>

            <!-- Card 3: Verifikasi Logbook -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-500">Verifikasi Logbook</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                        <i class="fa-solid fa-check-double text-sm"></i>
                    </span>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900 tracking-tight">
                        {{ $anak['approved_journal_count'] ?: 56 }} <span class="text-sm font-semibold text-slate-400">/ {{ $anak['journal_count'] ?: 58 }} Hari</span>
                    </div>
                    <p class="text-xs text-slate-500 mt-1 font-medium">
                        {{ $anak['pending_journal_count'] ?: 2 }} Logbook Menunggu Validasi
                    </p>
                </div>
                <div class="text-[11px] font-semibold text-emerald-700 flex items-center gap-1.5 pt-1">
                    <i class="fa-solid fa-shield-check text-xs"></i>
                    <span>Logbook berkala disahkan industri</span>
                </div>
            </div>

            <!-- Card 4: Evaluasi Sikap & Kinerja -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-500">Evaluasi Sikap & Kinerja</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                        <i class="fa-solid fa-award text-sm"></i>
                    </span>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900 tracking-tight">
                        A <span class="text-base font-bold text-slate-500">(94.2)</span>
                    </div>
                    <p class="text-xs text-slate-500 mt-1 font-medium">
                        Predikat: Sangat Memuaskan
                    </p>
                </div>
                <div class="text-[11px] font-bold text-sky-700 flex items-center gap-1.5 pt-1">
                    <i class="fa-solid fa-chart-line text-xs"></i>
                    <span>Kinerja teknis & kedisiplinan prima</span>
                </div>
            </div>
        </section>

        <!-- 3. GRID UTAMA: 2 KOLOM (KIRI 8 COLS, KANAN 4 COLS) -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
            
            <!-- KOLOM KIRI (8 Kolom) -->
            <div class="space-y-6 lg:col-span-8">
                
                <!-- Section A: Lini Masa Aktivitas Harian Ananda -->
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div>
                            <h2 class="text-base font-black text-slate-900">Lini Masa Aktivitas Harian Ananda</h2>
                            <p class="text-xs text-slate-500">Pembaruan catatan terkini dari tempat magang industri</p>
                        </div>
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-[11px] font-bold text-emerald-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Terverifikasi
                        </span>
                    </div>

                    <div class="mt-6 space-y-6 relative before:absolute before:inset-0 before:left-4 before:h-full before:w-0.5 before:bg-slate-100">
                        
                        <!-- Event 1: Presensi Masuk -->
                        <div class="relative flex items-start gap-4 pl-1">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-700 ring-4 ring-white">
                                <i class="fa-solid fa-fingerprint text-xs"></i>
                            </div>
                            <div class="min-w-0 flex-1 rounded-xl bg-slate-50 p-4 border border-slate-100">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-xs font-bold text-slate-900">Presensi Masuk Terverifikasi</h3>
                                    <span class="text-[11px] font-extrabold text-emerald-700">07:42 WIB</span>
                                </div>
                                <p class="mt-1 text-xs text-slate-600 leading-relaxed">
                                    Siswa telah hadir dan memulai aktivitas kerja di PT Solusi Teknologi Nusantara, Divisi Rekayasa Perangkat Lunak.
                                </p>
                            </div>
                        </div>

                        <!-- Event 2: Pelaksanaan Tugas Teknis -->
                        <div class="relative flex items-start gap-4 pl-1">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-sky-100 text-sky-700 ring-4 ring-white">
                                <i class="fa-solid fa-laptop-code text-xs"></i>
                            </div>
                            <div class="min-w-0 flex-1 rounded-xl bg-slate-50 p-4 border border-slate-100">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-xs font-bold text-slate-900">Pelaksanaan Tugas Teknis: Integrasi REST API & UI</h3>
                                    <span class="text-[11px] font-bold text-slate-500">08:30 – 16:30 WIB</span>
                                </div>
                                <p class="mt-1 text-xs text-slate-600 leading-relaxed">
                                    Mengerjakan modul autentikasi JWT token dan perancangan antarmuka responsif di bawah bimbingan Mentor Industri.
                                </p>
                            </div>
                        </div>

                        <!-- Event 3: Logbook Disahkan -->
                        <div class="relative flex items-start gap-4 pl-1">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-indigo-100 text-indigo-700 ring-4 ring-white">
                                <i class="fa-solid fa-file-circle-check text-xs"></i>
                            </div>
                            <div class="min-w-0 flex-1 rounded-xl bg-slate-50 p-4 border border-slate-100">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-xs font-bold text-slate-900">Jurnal Logbook Terverifikasi Mentor DUDI</h3>
                                    <span class="text-[11px] font-bold text-slate-500">16:45 WIB</span>
                                </div>
                                <p class="mt-1 text-xs text-slate-600 leading-relaxed">
                                    Laporan harian disahkan oleh Bapak Ahmad Fauzi, S.Kom dengan catatan: <em class="text-slate-800 font-medium">"Pekerjaan sangat rapi, adaptasi kode tim berjalan cepat."</em>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Section B: Kalender Kehadiran Bulan Berjalan -->
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div>
                            <h2 class="text-base font-black text-slate-900">Kalender Kehadiran ({{ $anak['month_label'] }})</h2>
                            <p class="text-xs text-slate-500">Matriks presensi harian siswa selama masa penempatan</p>
                        </div>
                        <div class="flex items-center gap-3 text-xs font-semibold">
                            <span class="inline-flex items-center gap-1.5 text-emerald-700">
                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-500"></span> Hadir
                            </span>
                            <span class="inline-flex items-center gap-1.5 text-amber-700">
                                <span class="h-2.5 w-2.5 rounded-full bg-amber-500"></span> Izin / Sakit
                            </span>
                            <span class="inline-flex items-center gap-1.5 text-slate-400">
                                <span class="h-2.5 w-2.5 rounded-full bg-slate-200"></span> Libur
                            </span>
                        </div>
                    </div>

                    <!-- Grid Kalender -->
                    <div class="mt-5">
                        <div class="grid grid-cols-7 gap-2 text-center text-xs font-bold text-slate-400 mb-2">
                            <span>SEN</span><span>SEL</span><span>RAB</span><span>KAM</span><span>JUM</span><span>SAB</span><span>MIN</span>
                        </div>
                        <div class="grid grid-cols-7 gap-2">
                            @foreach ($anak['attendance_days'] as $dayInfo)
                                @if ($dayInfo === null)
                                    <div class="h-10 rounded-xl bg-slate-50/50"></div>
                                @else
                                    @php
                                        $bgClass = 'bg-slate-50 text-slate-600';
                                        if ($dayInfo['status'] === 'Hadir') {
                                            $bgClass = 'bg-emerald-50 border border-emerald-200 text-emerald-800 font-black';
                                        } elseif (in_array($dayInfo['status'], ['Izin', 'Sakit'])) {
                                            $bgClass = 'bg-amber-50 border border-amber-200 text-amber-800 font-black';
                                        }
                                        if ($dayInfo['is_today']) {
                                            $bgClass .= ' ring-2 ring-sky-500 font-extrabold';
                                        }
                                    @endphp
                                    <div class="flex h-10 flex-col items-center justify-center rounded-xl text-xs {{ $bgClass }} transition hover:shadow-sm">
                                        <span>{{ $dayInfo['day'] }}</span>
                                        @if ($dayInfo['status'] === 'Hadir')
                                            <span class="text-[8px] leading-none text-emerald-600">✓</span>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Section C: Umpan Balik Guru & DUDI -->
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div>
                            <h2 class="text-base font-black text-slate-900">Umpan Balik Pembimbing & Sekolah</h2>
                            <p class="text-xs text-slate-500">Evaluasi berkala terhadap sikap, kerja tim, dan kepatuhan kerja</p>
                        </div>
                        <i class="fa-regular fa-comment-dots text-slate-400 text-lg"></i>
                    </div>

                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Umpan Balik DUDI -->
                        <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="rounded bg-sky-100 px-2 py-0.5 text-[10px] font-extrabold uppercase text-sky-800">Mentor DUDI</span>
                                <span class="text-[10px] text-slate-400">21 Okt 2024</span>
                            </div>
                            <p class="text-xs text-slate-700 italic leading-relaxed">
                                "Rizky menunjukkan inisiatif tinggi dalam penyelesaian tugas modul. Beretika sopan di lingkungan kantor dan mampu menerima masukan teknis dengan cepat."
                            </p>
                            <div class="pt-2 flex items-center gap-2 text-xs font-bold text-slate-900">
                                <div class="h-6 w-6 rounded-full bg-slate-300 flex items-center justify-center text-[10px] font-black">AF</div>
                                <span>Ahmad Fauzi, S.Kom (Lead Mentor)</span>
                            </div>
                        </div>

                        <!-- Umpan Balik Guru -->
                        <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="rounded bg-indigo-100 px-2 py-0.5 text-[10px] font-extrabold uppercase text-indigo-800">Guru Pembimbing</span>
                                <span class="text-[10px] text-slate-400">18 Okt 2024</span>
                            </div>
                            <p class="text-xs text-slate-700 italic leading-relaxed">
                                "Selalu tepat waktu mengirimkan logbook mingguan dan proaktif berkoordinasi saat sesi bimbingan daring. Capaian indikator kompetensi sesuai target kurikulum."
                            </p>
                            <div class="pt-2 flex items-center gap-2 text-xs font-bold text-slate-900">
                                <div class="h-6 w-6 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-[10px] font-black">SW</div>
                                <span>Dra. Sri Wahyuni, M.Pd</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- KOLOM KANAN (4 Kolom) -->
            <div class="space-y-6 lg:col-span-4">
                
                <!-- Section D: Kontak Pendamping PKL -->
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4">
                    <div>
                        <h2 class="text-base font-black text-slate-900">Kontak Pendamping PKL</h2>
                        <p class="text-xs text-slate-500">Saluran resmi jika orang tua membutuhkan konfirmasi atau memiliki kendala</p>
                    </div>

                    <!-- Kontak Guru -->
                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 space-y-2">
                        <div class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">Guru Pembimbing Sekolah</div>
                        <p class="text-xs font-bold text-slate-900">{{ $guru?->name ?? 'Dra. Sri Wahyuni, M.Pd' }}</p>
                        <p class="text-[11px] text-slate-500">NIP: 19780415 200501 2 003</p>
                        <a href="https://wa.me/" target="_blank" class="mt-2 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 px-3 py-2 text-xs font-bold text-white shadow-sm transition hover:bg-emerald-700">
                            <i class="fa-brands fa-whatsapp text-sm"></i> Hubungi WhatsApp Guru
                        </a>
                    </div>

                    <!-- Kontak Mentor DUDI -->
                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 space-y-2">
                        <div class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">Mentor Lapangan Industri</div>
                        <p class="text-xs font-bold text-slate-900">{{ $mentor?->name ?? 'Ahmad Fauzi, S.Kom' }}</p>
                        <p class="text-[11px] text-slate-500">{{ $dudi?->nama_dudi ?? 'PT Solusi Teknologi Nusantara' }}</p>
                        <div class="pt-1 flex items-center gap-2 text-xs text-slate-600">
                            <i class="fa-solid fa-phone text-sky-600"></i>
                            <span>{{ $dudi?->kontak ?? '0778-462310 (Kantor)' }}</span>
                        </div>
                    </div>

                    <!-- Hotline Bimbingan Konseling -->
                    <div class="rounded-xl border border-sky-100 bg-sky-50/70 p-3.5 flex items-center gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-sky-600 text-white font-bold text-sm">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-xs font-extrabold text-sky-950">Hotline Bimbingan Konseling</p>
                            <p class="text-[10px] text-sky-700">Layanan Siswa SMKN 1 Batam</p>
                        </div>
                    </div>
                </div>

                <!-- Section E: Agenda & Tanggal Penting -->
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm space-y-4">
                    <h2 class="text-base font-black text-slate-900">Agenda & Tanggal Penting</h2>
                    
                    <div class="space-y-3">
                        <div class="flex items-start gap-3 rounded-xl border border-slate-100 p-3 bg-slate-50">
                            <div class="flex h-10 w-10 shrink-0 flex-col items-center justify-center rounded-lg bg-sky-600 text-white">
                                <span class="text-[9px] font-bold uppercase leading-tight">OKT</span>
                                <span class="text-sm font-black leading-tight">25</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-xs font-bold text-slate-900">Kunjungan Monitoring DUDI</p>
                                <p class="text-[11px] text-slate-500">Guru pembimbing berkunjung ke kantor PT Solusi Teknologi Nusantara.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 rounded-xl border border-slate-100 p-3 bg-slate-50">
                            <div class="flex h-10 w-10 shrink-0 flex-col items-center justify-center rounded-lg bg-[#0F1E38] text-white">
                                <span class="text-[9px] font-bold uppercase leading-tight">JAN</span>
                                <span class="text-sm font-black leading-tight">15</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-xs font-bold text-slate-900">Sidang Laporan Akhir PKL</p>
                                <p class="text-[11px] text-slate-500">Presentasi hasil kerja dan evaluasi portofolio sertifikat DUDI.</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('orangtua.kehadiran') }}" class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#0F1E38] px-4 py-2.5 text-xs font-bold text-white transition hover:bg-[#1E3A6D]">
                        <i class="fa-solid fa-file-pdf"></i>
                        <span>Unduh Rekap Kehadiran Resmi (PDF)</span>
                    </a>
                </div>

                <!-- Section F: Jaminan Keselamatan & Perlindungan -->
                <div class="rounded-2xl border border-sky-150 bg-gradient-to-br from-sky-50 to-indigo-50/50 p-5 space-y-3">
                    <div class="flex items-center gap-2 text-sky-900 font-extrabold text-xs">
                        <i class="fa-solid fa-shield-halved text-sky-600"></i>
                        <span>Jaminan Keselamatan & Kesejahteraan</span>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Seluruh siswa PKL SMKN 1 Batam dilindungi kepesertaan aktif <strong>BPJS Ketenagakerjaan Sektor Vokasi</strong> dan mematuhi SOP K3 di lingkungan mitra industri.
                    </p>
                    <p class="text-[11px] font-semibold text-sky-800">
                        Polis Asuransi: #VOK-BTM-2024-08391
                    </p>
                </div>

            </div>

        </div>

    @empty
        <!-- State jika belum ada anak terhubung -->
        <div class="rounded-3xl border border-slate-200 bg-white p-12 text-center shadow-sm max-w-lg mx-auto">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-sky-50 text-sky-600 text-2xl">
                <i class="fa-solid fa-user-group"></i>
            </div>
            <h2 class="mt-4 text-lg font-black text-slate-900">Belum Ada Siswa Terhubung</h2>
            <p class="mt-2 text-xs text-slate-500 leading-relaxed">
                Akun orang tua Anda belum terhubung dengan data siswa PKL. Silakan hubungi bagian Tata Usaha / Admin PKL Sekolah untuk menghubungkan akun Anda.
            </p>
        </div>
    @endforelse

</div>
@endsection
