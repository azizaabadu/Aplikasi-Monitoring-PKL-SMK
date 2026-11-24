<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun Siswa - PKL.ID</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-2">

    <!-- Container Utama: Dikecilkan ukurannya & dirapatkan secara alami -->
    <div class="w-full max-w-[960px] bg-white rounded-xl shadow-lg overflow-hidden flex flex-col lg:flex-row">
        
        <!-- PANEL KIRI: Branding & Informasi Vokasi -->
        <div class="lg:w-[37%] bg-gradient-to-b from-[#0B1E3F] via-[#0F294A] to-[#0A1833] text-white p-5 lg:p-6 flex flex-col justify-between relative overflow-hidden">
            <!-- Background Glow Effects -->
            <div class="absolute -top-20 -left-20 w-60 h-60 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
            
            <!-- Top Badge -->
            <div>
                <div class="inline-flex items-center gap-1.5 bg-white/10 backdrop-blur-md border border-white/15 px-2.5 py-0.5 rounded-full text-[9px] font-medium tracking-wide text-blue-100">
                    <svg class="w-3 h-3 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    KEMENDIKBUDRISTEK REPUBLIK INDONESIA
                </div>
            </div>

            <!-- Center Logo & Platform Info -->
            <div class="my-auto py-5 flex flex-col items-center text-center">
                <!-- Logo Kotak Putih -->
                <div class="w-16 h-16 bg-white rounded-xl shadow-xl flex items-center justify-center p-2.5 mb-3.5">
                    <div class="w-full h-full bg-gradient-to-br from-blue-700 to-blue-900 rounded-lg flex items-center justify-center shadow-inner">
                        <span class="text-white font-extrabold text-sm tracking-wider">PKL</span>
                    </div>
                </div>

                <div class="inline-flex items-center gap-1.5 bg-white/10 backdrop-blur-sm px-2.5 py-0.5 rounded-full text-[9.5px] font-semibold text-blue-200 tracking-wider mb-2 border border-white/10">
                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                    PLATFORM VOKASI NASIONAL
                </div>

                <h1 class="text-xl font-bold tracking-tight text-white mb-1">PKL.ID</h1>
                <p class="text-[11px] text-slate-300 max-w-[230px] leading-relaxed">
                    Menghubungkan Sekolah Menengah Kejuruan dengan Dunia Usaha dan Dunia Industri secara terintegrasi.
                </p>
            </div>

            <!-- Footer Kiri -->
            <div class="pt-3 border-t border-white/10 flex justify-between text-[9.5px] text-slate-400 font-medium">
                <span>Sistem Informasi Terpadu</span>
                <span>Republik Indonesia</span>
            </div>
        </div>

        <!-- PANEL KANAN: Form Pendaftaran -->
        <div class="lg:w-[63%] bg-white p-4 sm:p-5 flex flex-col justify-between">
            
            <div>
                <!-- Header Status & Judul -->
                <div class="flex flex-wrap items-center justify-between gap-2 mb-2.5 pb-2 border-b border-slate-100">
                    <div class="flex items-center gap-1.5 text-slate-800 font-bold text-xs">
                        <div class="w-5 h-5 rounded-md bg-[#0B1E3F] flex items-center justify-center text-white">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
                        </div>
                        <div>
                            <div class="leading-tight">PKL.ID</div>
                            <div class="text-[8.5px] text-slate-400 font-semibold tracking-wider">SISTEM INFORMASI PKL NASIONAL</div>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-1 bg-slate-100 text-slate-700 border border-slate-200/80 px-2 py-0.5 rounded-full text-[10px] font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        Server SMK Terhubung
                    </div>
                </div>

                <!-- Teks Instruksi -->
                <div class="mb-2.5">
                    <h2 class="text-xs font-bold text-slate-900">Pendaftaran Akun Siswa</h2>
                    <p class="text-[10.5px] text-slate-500">Lengkapi data diri Anda sesuai identitas Dapodik SMK untuk membuat akun portal PKL nasional.</p>
                </div>

                <!-- Step Bar Indicator -->
                <div class="grid grid-cols-2 gap-2 mb-2.5">
                    <!-- Step 1 -->
                    <div class="flex items-center gap-2 p-1.5 rounded-lg bg-slate-50 border border-slate-200/60">
                        <div class="w-5 h-5 rounded-full bg-slate-900 text-white flex items-center justify-center text-[10px] font-bold shrink-0">✓</div>
                        <div class="text-[10px] overflow-hidden">
                            <p class="font-bold text-slate-800 leading-tight">Langkah 1</p>
                            <p class="text-[9px] text-slate-500 truncate">Data Kesiswaan & Sekolah</p>
                        </div>
                    </div>
                    <!-- Step 2 -->
                    <div class="flex items-center gap-2 p-1.5 rounded-lg bg-[#0B1E3F] text-white">
                        <div class="w-5 h-5 rounded-full bg-sky-500 text-white flex items-center justify-center text-[10px] font-bold shrink-0">2</div>
                        <div class="text-[10px] overflow-hidden">
                            <p class="font-bold text-white leading-tight">Langkah 2</p>
                            <p class="text-[9px] text-blue-200 truncate">Akun & Kredensial Masuk</p>
                        </div>
                    </div>
                </div>

                <!-- FORM INPUT GRID -->
                <form action="{{ route('register.store') }}" method="POST" class="space-y-2">
                    @csrf
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <!-- NISN -->
                        <div>
                            <div class="flex justify-between items-center mb-0.5">
                                <label class="text-[10px] font-semibold text-slate-700">NISN (10 Digit)</label>
                                <span class="text-[9px] font-semibold text-emerald-600 bg-emerald-50 px-1 py-0.2 rounded">Verifikasi Otomatis</span>
                            </div>
                            <div class="relative flex items-center">
                                <span class="absolute left-2.5 text-slate-400">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>
                                </span>
                                <input type="text" name="nisn" value="{{ old('nisn', '0058291823') }}" class="w-full pl-7 pr-2.5 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-[11px] font-medium text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>

                        <!-- Nama Lengkap -->
                        <div>
                            <label class="block text-[10px] font-semibold text-slate-700 mb-0.5">Nama Lengkap (Sesuai Dapodik)</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-2.5 text-slate-400">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </span>
                                <input type="text" name="nama" value="{{ old('nama', 'Rizky Pratama Wicaksono') }}" class="w-full pl-7 pr-2.5 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-[11px] font-medium text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>

                        <!-- Asal Sekolah (Input Teks, bukan dropdown) -->
                        <div>
                            <label class="block text-[10px] font-semibold text-slate-700 mb-0.5">Asal Sekolah (SMK)</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-2.5 text-slate-400">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </span>
                                <input type="text" name="sekolah" value="{{ old('sekolah', 'MAKN Ende') }}" placeholder="Masukkan nama asal sekolah" class="w-full pl-7 pr-2.5 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-[11px] font-medium text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>

                        <!-- Konsentrasi Keahlian / Jurusan -->
                        <div>
                            <label class="block text-[10px] font-semibold text-slate-700 mb-0.5">Konsentrasi Keahlian / Jurusan</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-2.5 text-slate-400 pointer-events-none">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                </span>
                                <select name="jurusan" class="w-full pl-7 pr-7 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-[11px] font-medium text-slate-700 appearance-none truncate focus:outline-none focus:ring-1 focus:ring-blue-600 cursor-pointer">
                                    <option value="PPLG" selected>PPLG (Pengembangan Perangkat Lunak & Gim)</option>
                                    <option value="TJKT">TJKT (Teknik Jaringan Komputer & Telekomunikasi)</option>
                                    <option value="DKV">DKV (Desain Komunikasi Visual)</option>
                                    <option value="AKL">AKL (Akuntansi dan Keuangan Lembaga)</option>
                                    <option value="MPLB">MPLB (Manajemen Perkantoran & Layanan Bisnis)</option>
                                    <option value="BDP">PM (Pemasaran / Bisnis Digital)</option>
                                    <option value="TO">TO (Teknik Otomotif)</option>
                                    <option value="TE">TE (Teknik Elektronika)</option>
                                </select>
                                <span class="absolute right-2.5 text-slate-400 pointer-events-none">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </span>
                            </div>
                        </div>

                        <!-- Kelas / Rombongan Belajar -->
                        <div>
                            <label class="block text-[10px] font-semibold text-slate-700 mb-0.5">Kelas / Rombongan Belajar</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-2.5 text-slate-400">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </span>
                                <input type="text" name="kelas" value="{{ old('kelas', 'XII PPLG 1') }}" class="w-full pl-7 pr-2.5 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-[11px] font-medium text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>

                        <!-- Nomor WhatsApp Aktif -->
                        <div>
                            <div class="flex justify-between items-center mb-0.5">
                                <label class="text-[10px] font-semibold text-slate-700">Nomor WhatsApp Aktif</label>
                                <span class="text-[9px] text-slate-400">Untuk OTP</span>
                            </div>
                            <div class="flex">
                                <span class="inline-flex items-center px-2 bg-slate-100 border border-r-0 border-slate-200 rounded-l-lg text-[10.5px] font-semibold text-slate-600">+62</span>
                                <input type="text" name="no_wa" value="{{ old('no_wa', '812-9842-1082') }}" class="w-full px-2.5 py-1.5 bg-slate-50 border border-slate-200 rounded-r-lg text-[11px] font-medium text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>

                        <!-- Alamat Email -->
                        <div class="sm:col-span-2">
                            <div class="flex justify-between items-center mb-0.5">
                                <label class="text-[10px] font-semibold text-slate-700">Alamat Email (Belajar.id / Email Pribadi Aktif)</label>
                                <span class="text-[9px] font-semibold text-teal-600">Domain Teridentifikasi</span>
                            </div>
                            <div class="relative flex items-center">
                                <span class="absolute left-2.5 text-slate-400">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                                </span>
                                <input type="email" name="email" value="{{ old('email', 'rizky.pratama@smkn1batam.sch.id') }}" class="w-full pl-7 pr-2.5 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-[11px] font-medium text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>

                        <!-- Kata Sandi Baru -->
                        <div>
                            <label class="block text-[10px] font-semibold text-slate-700 mb-0.5">Kata Sandi Baru</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-2.5 text-slate-400">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                </span>
                                <input type="password" id="password" name="password" value="InovasiVokasi2025#" class="w-full pl-7 pr-7 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-[11px] font-medium text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-600">
                                <button type="button" onclick="togglePass()" class="absolute right-2 text-slate-400 hover:text-slate-600 cursor-pointer">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                        </div>

                        <!-- Konfirmasi Kata Sandi -->
                        <div>
                            <label class="block text-[10px] font-semibold text-slate-700 mb-0.5">Konfirmasi Kata Sandi</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-2.5 text-slate-400">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                </span>
                                <input type="password" id="password_confirmation" name="password_confirmation" value="InovasiVokasi2025#" class="w-full pl-7 pr-7 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-[11px] font-medium text-slate-700 focus:outline-none focus:ring-1 focus:ring-blue-600">
                                <span class="absolute right-2 text-emerald-500">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Indikator Kekuatan Sandi -->
                    <div class="bg-slate-50 border border-slate-200/60 p-2 rounded-lg">
                        <div class="flex justify-between items-center text-[9.5px] font-bold mb-1">
                            <span class="text-slate-500 tracking-wider">KEKUATAN SANDI: <span class="text-emerald-600">SANGAT KUAT</span></span>
                            <span class="text-emerald-600">100%</span>
                        </div>
                        <div class="grid grid-cols-4 gap-1 mb-1">
                            <div class="h-1 bg-emerald-500 rounded-full"></div>
                            <div class="h-1 bg-emerald-500 rounded-full"></div>
                            <div class="h-1 bg-emerald-500 rounded-full"></div>
                            <div class="h-1 bg-emerald-500 rounded-full"></div>
                        </div>
                        <div class="flex flex-wrap gap-x-3 text-[9px] text-emerald-600 font-medium">
                            <span>✓ Min. 8 karakter</span>
                            <span>✓ Angka & Simbol</span>
                            <span>✓ Huruf Besar & Kecil</span>
                        </div>
                    </div>

                    <!-- Checkbox Persetujuan -->
                    <div class="flex items-start gap-1.5">
                        <input type="checkbox" id="terms" checked class="mt-0.5 rounded border-slate-300 text-[#0B1E3F]">
                        <label for="terms" class="text-[9.5px] text-slate-600 leading-tight">
                            Saya menyatakan kebenaran data di atas, menyetujui <a href="#" class="text-slate-900 font-semibold underline">Ketentuan Layanan</a>, <a href="#" class="text-slate-900 font-semibold underline">Kebijakan Privasi</a>, serta bersedia mematuhi <span class="font-semibold text-slate-800">Pakta Integritas PKL</span>.
                        </label>
                    </div>

                    <!-- Tombol Aksi -->
                    <button type="submit" class="w-full bg-[#0B1E3F] hover:bg-slate-900 text-white py-2 px-3 rounded-lg text-[11px] font-bold tracking-wide transition shadow-md flex items-center justify-center gap-1.5 cursor-pointer">
                        Daftar Akun Siswa Sekarang 
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </form>

                <!-- Link Login Alternatif -->
                <div class="text-center mt-2">
                    <p class="text-[10px] text-slate-500">
                        Sudah memiliki akun PKL terverifikasi? <a href="{{ route('login') }}" class="text-slate-900 font-bold underline">Masuk ke Login</a>
                    </p>
                </div>
            </div>

            <!-- Footer Bawah Lengkap Utuh -->
            <div class="mt-2.5 pt-2 border-t border-slate-100 flex flex-col items-center gap-1">
                <div class="flex flex-wrap items-center justify-center gap-2.5 text-[9px] text-slate-500 font-medium">
                    <span class="flex items-center gap-1"><svg class="w-2.5 h-2.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Didukung 5.000+ DUDI</span>
                    <span class="text-slate-300">•</span>
                    <span class="flex items-center gap-1"><svg class="w-2.5 h-2.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg> Enkripsi SSL 256-bit</span>
                    <span class="text-slate-300">•</span>
                    <span class="flex items-center gap-1"><svg class="w-2.5 h-2.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg> Sinkronisasi Dapodik Harian</span>
                </div>

                <div class="text-center text-[8.5px] text-slate-400">
                    <p>© 2025 PKL.ID • Direktorat Sekolah Menengah Kejuruan Kemendikbudristek RI</p>
                    <div class="flex justify-center gap-2 mt-0.5 font-medium">
                        <a href="#" class="hover:underline">Bantuan Pendaftaran</a>
                        <span>•</span>
                        <a href="#" class="hover:underline">Panduan Siswa SMK</a>
                        <span>•</span>
                        <a href="#" class="hover:underline">Call Center Vokasi</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        function togglePass() {
            const p1 = document.getElementById('password');
            const p2 = document.getElementById('password_confirmation');
            const type = p1.type === 'password' ? 'text' : 'password';
            p1.type = type;
            p2.type = type;
        }
    </script>
</body>
</html>