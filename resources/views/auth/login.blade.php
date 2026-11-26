<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Masuk — PKL.ID Platform Vokasi Nasional</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
  </style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-screen flex items-center justify-center p-4">

  <!-- Kontainer Utama -->
  <div class="w-full max-w-4xl bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col lg:flex-row border border-slate-200/80">

    <!-- SISI KIRI: Branding PKL.ID -->
    <div class="lg:w-5/12 bg-gradient-to-br from-[#0F1E38] via-[#172B4D] to-[#1E3A6D] text-white p-6 sm:p-8 flex flex-col justify-between relative overflow-hidden">
      <div class="absolute -right-20 -top-20 w-60 h-60 bg-sky-500/10 rounded-full blur-2xl pointer-events-none"></div>

      <!-- Header Badge -->
      <div class="relative z-10">
        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-white/10 border border-white/15 text-[9px] sm:text-[10px] font-semibold tracking-wider uppercase backdrop-blur-md">
          <svg class="w-3 h-3 text-sky-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
          Kemendikbudristek RI
        </span>
      </div>

      <!-- Logo yang sama dengan dashboard -->
      <div class="relative z-10 my-auto py-6 flex flex-col items-center text-center">
        <div class="mb-4 flex h-28 w-28 items-center justify-center rounded-3xl bg-gradient-to-br from-sky-500 to-blue-600 text-white shadow-xl shadow-sky-950/30 ring-1 ring-white/20 sm:h-32 sm:w-32">
          <i class="fa-solid fa-graduation-cap text-5xl sm:text-6xl" aria-hidden="true"></i>
        </div>
        <h2 class="text-xl sm:text-2xl font-extrabold tracking-tight">PKL.ID</h2>
        <span class="inline-block mt-1.5 px-2.5 py-0.5 rounded-full bg-sky-400/20 text-sky-300 text-[10px] font-bold tracking-widest uppercase border border-sky-400/30">
          Platform Vokasi Nasional
        </span>
      </div>

      <!-- Footer Keterangan -->
      <div class="relative z-10 pt-3 border-t border-white/10 text-[11px] text-slate-300 leading-snug">
        Menghubungkan SMK dengan Dunia Usaha & Industri secara terintegrasi.
      </div>
    </div>

    <!-- SISI KANAN: Form Masuk -->
    <div class="lg:w-7/12 p-6 sm:p-8 lg:p-10 flex flex-col justify-center bg-white">
      <div class="max-w-sm w-full mx-auto space-y-4">

        <!-- Judul Sambutan -->
        <div class="space-y-1">
          <div class="flex items-center gap-2.5">
            <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-gradient-to-br from-sky-500 to-blue-600 text-white shadow">
              <i class="fa-solid fa-graduation-cap text-xs" aria-hidden="true"></i>
            </div>
            <div>
              <div class="font-extrabold text-slate-900 text-sm leading-none">PKL.ID</div>
              <div class="text-[9px] font-bold text-slate-400 uppercase tracking-wider mt-0.5">Sistem Informasi PKL</div>
            </div>
          </div>
          <h1 class="text-xl font-extrabold text-slate-900 tracking-tight pt-2">Selamat Datang Kembali!</h1>
          <p class="text-[11px] text-slate-500 leading-relaxed">
            Masuk ke portal PKL SMK untuk mengakses presensi dan logbook harian.
          </p>
        </div>

        @php
          $pesanError = session('error')
            ?? $errors->first('oauth')
            ?? $errors->first('username')
            ?? $errors->first('password')
            ?? ($errors->any() ? 'Username atau kata sandi salah.' : null);
        @endphp

        @if ($pesanError)
          <!-- Alert Merah saat login gagal -->
          <div role="alert" class="flex items-start gap-2.5 p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-[11px] font-medium leading-relaxed">
            <svg class="w-4 h-4 text-rose-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
            </svg>
            <div>
              <span class="font-bold block">Login Gagal</span>
              <span>{{ $pesanError }}</span>
            </div>
          </div>
        @else
          <!-- Kotak Peringatan Masuk standar (Kuning) -->
          <div role="note" class="flex items-start gap-2.5 p-3 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 text-[11px] font-medium leading-relaxed">
            <svg class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
            </svg>
            <div>
              <span class="font-bold block">Peringatan Masuk</span>
              <span>Pastikan username dan kata sandi sesuai. Jika salah atau belum terdaftar, login tidak dapat diproses.</span>
            </div>
          </div>
        @endif

        @if (session('status'))
          <div role="status" class="p-3 rounded-xl bg-sky-50 border border-sky-200 text-sky-700 text-[11px] font-medium">
            {{ session('status') }}
          </div>
        @endif

        <!-- Form Login Terhubung ke Controller Laravel -->
        <form action="{{ route('login.store') }}" method="POST" class="space-y-3">
          @csrf
          <!-- Pilihan Peran -->
          <div>
            <label for="loginPeran" class="block text-[11px] font-bold text-slate-700 mb-1">Masuk Sebagai / Peran Akun</label>
            <select id="loginPeran" name="peran" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-xs font-semibold text-slate-800 focus:outline-none focus:border-sky-500 focus:bg-white transition">
              <option value="siswa" {{ old('peran') == 'siswa' ? 'selected' : '' }}>Siswa SMK (Praktik Kerja Lapangan)</option>
              <option value="guru" {{ old('peran') == 'guru' ? 'selected' : '' }}>Guru Pembimbing Sekolah</option>
              <option value="pembimbing_dudi" {{ (old('peran') == 'pembimbing_dudi' || old('peran') == 'dudi') ? 'selected' : '' }}>Pembimbing Lapangan (DUDI)</option>
              <option value="orang_tua" {{ (old('peran') == 'orang_tua' || old('peran') == 'ortu') ? 'selected' : '' }}>Orang Tua / Wali Siswa</option>
              <option value="kepsek" {{ old('peran') == 'kepsek' ? 'selected' : '' }}>Kepala Sekolah</option>
              <option value="admin" {{ old('peran') == 'admin' ? 'selected' : '' }}>Admin PKL / Tata Usaha</option>
            </select>
          </div>

          <!-- NISN / Username -->
          <div>
            <label class="block text-[11px] font-bold text-slate-700 mb-1">NISN / NIP / Username</label>
            <div class="relative">
              <svg class="w-3.5 h-3.5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
              <input type="text" name="username" value="{{ old('username') }}" placeholder="Contoh: siswa2" required class="w-full rounded-xl border border-slate-300 bg-slate-50 pl-9 pr-3 py-2.5 text-xs font-medium text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-sky-500 focus:bg-white transition" />
            </div>
          </div>

          <!-- Kata Sandi -->
          <div>
            <div class="flex items-center justify-between mb-1">
              <label class="text-[11px] font-bold text-slate-700">Kata Sandi</label>
              <a href="#" class="text-[11px] font-semibold text-sky-600 hover:underline">Lupa?</a>
            </div>
            <div class="relative">
              <svg class="w-3.5 h-3.5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002-2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
              <input type="password" name="password" placeholder="••••••••••••" required class="w-full rounded-xl border border-slate-300 bg-slate-50 pl-9 pr-3 py-2.5 text-xs font-medium text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-sky-500 focus:bg-white transition" />
            </div>
          </div>

          <!-- Ingat Saya -->
          <div class="flex items-center pt-0.5">
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" name="remember" class="w-3.5 h-3.5 rounded border-slate-300 text-sky-600 focus:ring-sky-500" />
              <span class="text-[11px] font-medium text-slate-600">Ingat sesi saya di perangkat ini</span>
            </label>
          </div>

          <!-- Tombol Masuk -->
          <button type="submit" class="w-full py-3 rounded-xl bg-[#172B4D] hover:bg-[#1E3A6D] text-white text-xs font-bold shadow transition flex items-center justify-center gap-2 mt-1">
            <span>Masuk ke Dashboard</span>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
          </button>
        </form>

        <!-- Divider -->
        <div class="relative flex py-1 items-center">
          <div class="flex-grow border-t border-slate-200"></div>
          <span class="flex-shrink mx-3 text-[9px] font-bold uppercase tracking-wider text-slate-400">Atau masuk dengan</span>
          <div class="flex-grow border-t border-slate-200"></div>
        </div>

        <!-- Login Alternatif -->
        <div class="grid grid-cols-2 gap-2">
          <a href="{{ route('oauth.redirect', ['provider' => 'google']) }}"
             onclick="this.href = '{{ route('oauth.redirect', ['provider' => 'google']) }}?peran=' + encodeURIComponent(document.getElementById('loginPeran')?.value || 'siswa')"
             class="flex items-center justify-center gap-1.5 py-2 px-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-[11px] font-bold text-slate-700 transition shadow-sm">
            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24"><path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.66-5.17 3.66-9.17z"/><path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.13 0-5.78-2.11-6.73-4.96H1.18v3.15C3.15 21.32 7.23 24 12 24z"/><path fill="#FBBC05" d="M5.27 14.24c-.25-.72-.38-1.49-.38-2.24s.13-1.52.38-2.24V6.61H1.18C.43 8.13 0 9.87 0 11.7s.43 3.57 1.18 5.09l4.09-3.15z"/><path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.23 0 3.15 2.68 1.18 6.61l4.09 3.15c.95-2.85 3.6-4.96 6.73-4.96z"/></svg>
            Google
          </a>
          <a href="{{ route('oauth.redirect', ['provider' => 'belajarid']) }}"
             onclick="this.href = '{{ route('oauth.redirect', ['provider' => 'belajarid']) }}?peran=' + encodeURIComponent(document.getElementById('loginPeran')?.value || 'siswa')"
             class="flex items-center justify-center gap-1.5 py-2 px-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-[11px] font-bold text-slate-700 transition shadow-sm">
            <span class="w-3.5 h-3.5 rounded-full bg-sky-600 text-white font-bold flex items-center justify-center text-[9px]">B</span>
            Belajar.id
          </a>
        </div>

        <!-- Belum punya akun -->
        <div class="text-center pt-1">
          <p class="text-[11px] text-slate-500">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-bold text-sky-600 hover:underline">Daftar siswa baru</a>
          </p>
        </div>

      </div>
    </div>

  </div>
</body>
</html>
