@extends('layouts.student')

@section('title', 'Pengaturan Akun & Preferensi - Portal PKL.ID')

@section('content')
<div class="space-y-6">

  <!-- 1. HEADER & BREADCRUMB -->
  <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
    <div>
      <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-1">
        <span>Beranda</span>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Pengaturan</span>
      </div>
      <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Pengaturan Akun & Preferensi</h1>
      <p class="text-xs text-slate-500 mt-1">Kelola keamanan kredensial akun, preferensi notifikasi harian, dan sinkronisasi data operasional portal PKL.</p>
    </div>
    <div class="flex items-center gap-2.5">
      <button onclick="alert('Pengaturan berhasil disimpan ke sistem!')" class="px-4 py-2.5 bg-[#0F1E38] hover:bg-[#1E3A6D] text-white text-xs font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class="fa-solid fa-floppy-disk text-sky-400"></i>
        Simpan Perubahan
      </button>
    </div>
  </div>

  <!-- 2. GRID UTAMA PENGATURAN -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- KOLOM KIRI: KEAMANAN AKUN & KATA SANDI (Sesuai PRD A1, A3, & Non-Fungsional Keamanan) -->
    <div class="lg:col-span-7 space-y-6">
      
      <!-- Kartu Ganti Kata Sandi -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-5">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <div>
            <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-shield-halved text-sky-600"></i>
              Keamanan & Kata Sandi Akun
            </h3>
            <p class="text-xs text-slate-500">Aturan enkripsi Bcrypt/Argon2 sesuai standar non-fungsional PRD.</p>
          </div>
          <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-extrabold">
            <i class="fa-solid fa-lock"></i> HTTPS Secure
          </span>
        </div>

        <form class="space-y-4 text-xs" onsubmit="event.preventDefault(); alert('Kata sandi berhasil diperbarui!');">
          <div class="space-y-1.5">
            <label class="font-bold text-slate-700 block">Kata Sandi Lama</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                <i class="fa-solid fa-key"></i>
              </span>
              <input type="password" required placeholder="Masukkan kata sandi saat ini" class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-sky-500 font-medium text-slate-800" />
            </div>
          </div>

          <div class="space-y-1.5">
            <label class="font-bold text-slate-700 block">Kata Sandi Baru (Minimal 8 Karakter)</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                <i class="fa-solid fa-lock"></i>
              </span>
              <input type="password" required placeholder="Minimal 8 karakter, kombinasi huruf & angka" class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-sky-500 font-medium text-slate-800" />
            </div>
          </div>

          <div class="space-y-1.5">
            <label class="font-bold text-slate-700 block">Konfirmasi Kata Sandi Baru</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                <i class="fa-solid fa-lock"></i>
              </span>
              <input type="password" required placeholder="Ulangi kata sandi baru" class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-sky-500 font-medium text-slate-800" />
            </div>
          </div>

          <div class="pt-2">
            <button type="submit" class="px-4 py-2.5 rounded-xl bg-sky-600 hover:bg-sky-700 text-white font-bold transition shadow-sm flex items-center gap-2">
              <i class="fa-solid fa-check"></i> Perbarui Kata Sandi
            </button>
          </div>
        </form>
      </div>

      <!-- Kartu Sesi Login & Perangkat Terhubung -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <div>
            <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-laptop-code text-sky-600"></i>
              Sesi Aktif & Perangkat
            </h3>
            <p class="text-xs text-slate-500">Sesi login berakhir otomatis setelah tidak aktif untuk menjaga privasi.</p>
          </div>
          <span class="px-2.5 py-1 rounded-full bg-sky-50 text-sky-700 border border-sky-200 text-[10px] font-extrabold">
            1 Perangkat Aktif
          </span>
        </div>

        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60 flex items-center justify-between text-xs">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center shrink-0">
              <i class="fa-solid fa-desktop"></i>
            </div>
            <div>
              <div class="font-extrabold text-slate-900">Windows Chrome • Batam, Indonesia</div>
              <div class="text-[11px] text-slate-500">IP: 36.75.12.90 • Aktif Sekarang (Sesi Utama)</div>
            </div>
          </div>
          <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 text-[10px] font-bold">Saat Ini</span>
        </div>
      </div>

    </div>

    <!-- KOLOM KANAN: PREFERENSI NOTIFIKASI & INFORMASI SISTEM -->
    <div class="lg:col-span-5 space-y-6">
      
      <!-- Kartu Preferensi Notifikasi & Pengingat (Sesuai PRD B1 & B2) -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-bell text-sky-600"></i>
            Preferensi Notifikasi & Pengingat
          </h3>
          <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Modul Notifikasi</span>
        </div>

        <div class="space-y-3 text-xs">
          <!-- Toggle 1 -->
          <label class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200/60 cursor-pointer hover:bg-slate-100/50 transition">
            <div class="space-y-0.5">
              <span class="font-extrabold text-slate-900 block">Pengingat Logbook Harian</span>
              <span class="text-[11px] text-slate-500 block">Kirim pengingat WhatsApp/Email jika belum mengisi pukul 17:00 WIB.</span>
            </div>
            <input type="checkbox" checked class="w-4 h-4 text-sky-600 rounded border-slate-300 focus:ring-sky-500" />
          </label>

          <!-- Toggle 2 -->
          <label class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200/60 cursor-pointer hover:bg-slate-100/50 transition">
            <div class="space-y-0.5">
              <span class="font-extrabold text-slate-900 block">Notifikasi Validasi Mentor DUDI</span>
              <span class="text-[11px] text-slate-500 block">Pemberitahuan instan saat logbook disetujui atau direvisi.</span>
            </div>
            <input type="checkbox" checked class="w-4 h-4 text-sky-600 rounded border-slate-300 focus:ring-sky-500" />
          </label>

          <!-- Toggle 3 -->
          <label class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200/60 cursor-pointer hover:bg-slate-100/50 transition">
            <div class="space-y-0.5">
              <span class="font-extrabold text-slate-900 block">Jadwal Kunjungan Guru Pembimbing</span>
              <span class="text-[11px] text-slate-500 block">Pemberitahuan jadwal visitasi on-site dan monitoring berkala.</span>
            </div>
            <input type="checkbox" checked class="w-4 h-4 text-sky-600 rounded border-slate-300 focus:ring-sky-500" />
          </label>
        </div>
      </div>

      <!-- Kartu Informasi Sistem & Bantuan Vokasi -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
          <h3 class="text-sm font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-circle-info text-sky-600"></i>
            Informasi Portal & Bantuan
          </h3>
        </div>

        <div class="space-y-2.5 text-xs text-slate-600">
          <div class="flex justify-between py-1.5 border-b border-slate-100">
            <span class="text-slate-500 font-medium">Versi Aplikasi</span>
            <strong class="text-slate-900">v2.4.0-Production (MVP P1)</strong>
          </div>
          <div class="flex justify-between py-1.5 border-b border-slate-100">
            <span class="text-slate-500 font-medium">Tahun Ajaran Aktif</span>
            <strong class="text-slate-900">2026/2027 Genap</strong>
          </div>
          <div class="flex justify-between py-1.5">
            <span class="text-slate-500 font-medium">Pusat Layanan Vokasi</span>
            <strong class="text-sky-600 hover:underline cursor-pointer" onclick="alert('Menghubungkan ke admin pusat...')">Hubungi Admin Sekolah</strong>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
@endsection