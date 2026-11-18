<aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-[#172B4D] text-white flex flex-col justify-between transition-transform duration-300 -translate-x-full lg:translate-x-0 shadow-lg">
  <div>
    <!-- Brand Header & Logo PKL.ID -->
    <div class="p-5 flex items-center gap-3 border-b border-white/10">
      <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-[#1E3A6D] to-[#0F1E38] border border-sky-400/30 flex items-center justify-center shadow-inner shrink-0">
        <i class="fa-solid fa-graduation-cap text-sky-400 text-lg"></i>
      </div>
      <div>
        <div class="font-extrabold text-lg tracking-tight leading-none text-white">PKL.ID</div>
        <div class="text-[10px] font-semibold tracking-widest text-sky-300/80 uppercase mt-1 leading-tight">
          Platform<br>Monitoring Vokasi
        </div>
      </div>
    </div>

    <!-- Label Navigasi Sistem -->
    <div class="px-5 pt-5 pb-2">
      <div class="bg-white/5 rounded-md px-3 py-1.5 text-[10px] font-bold tracking-wider text-slate-400 uppercase">
        Navigasi Siswa
      </div>
    </div>

    <!-- Menu Navigasi Sesuai PRD dengan Font Awesome -->
    <nav class="px-3 space-y-1.5 text-xs font-semibold">
      <!-- 1. Beranda / Dashboard -->
      <a href="{{ route('siswa.dashboard') }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl {{ request()->routeIs('siswa.dashboard') ? 'bg-sky-600 text-white shadow-md' : 'text-white hover:bg-white/10' }} transition">
        <i class="fa-solid fa-house text-sky-400 w-4 text-center"></i>
        <span>Beranda / Dashboard</span>
      </a>

      <!-- 2. Presensi & Kehadiran (Check-in K1) -->
      <a href="{{ route('siswa.checkin') }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl {{ request()->routeIs('siswa.checkin') ? 'bg-sky-600 text-white shadow-md' : 'text-white hover:bg-white/10' }} transition">
        <i class="fa-solid fa-clipboard-user text-sky-400 w-4 text-center"></i>
        <span>Presensi & Kehadiran</span>
      </a>

      <!-- 3. Jurnal & Logbook (L1 & L2) -->
      <a href="{{ route('siswa.logbook') }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl {{ request()->routeIs('siswa.logbook') ? 'bg-sky-600 text-white shadow-md' : 'text-white hover:bg-white/10' }} transition">
        <i class="fa-solid fa-book-open text-sky-400 w-4 text-center"></i>
        <span>Jurnal & Logbook</span>
      </a>

      <!-- 4. Data Siswa & DUDI -->
      <a href="{{ route('siswa.penempatan') }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl {{ request()->routeIs('siswa.penempatan') ? 'bg-sky-600 text-white shadow-md' : 'text-white hover:bg-white/10' }} transition">
        <i class="fa-solid fa-building-user text-sky-400 w-4 text-center"></i>
        <span>Data Siswa & DUDI</span>
      </a>

      <!-- 5. Penilaian & Sertifikat -->
      <a href="{{ route('siswa.penilaian') }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl {{ request()->routeIs('siswa.penilaian') ? 'bg-sky-600 text-white shadow-md' : 'text-white hover:bg-white/10' }} transition">
        <i class="fa-solid fa-award text-sky-400 w-4 text-center"></i>
        <span>Penilaian & Sertifikat</span>
      </a>

      <!-- 6. Laporan & Rekapitulasi -->
      <a href="{{ route('siswa.laporan') }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl {{ request()->routeIs('siswa.laporan') ? 'bg-sky-600 text-white shadow-md' : 'text-white hover:bg-white/10' }} transition">
        <i class="fa-solid fa-file-lines text-sky-400 w-4 text-center"></i>
        <span>Laporan & Rekapitulasi</span>
      </a>

      <!-- 7. Pengaturan -->
      <a href="{{ route('siswa.pengaturan') }}" class="flex items-center gap-3 px-3.5 py-3 rounded-xl {{ request()->routeIs('siswa.pengaturan') ? 'bg-sky-600 text-white shadow-md' : 'text-white hover:bg-white/10' }} transition">
        <i class="fa-solid fa-gear text-sky-400 w-4 text-center"></i>
        <span>Pengaturan</span>
      </a>
    </nav>
  </div>

  <!-- Footer Sekolah & Tombol Keluar -->
  <div class="p-4 border-t border-white/10 space-y-3">
    <div class="flex items-center gap-2.5 text-xs text-slate-300 bg-white/5 px-3 py-2.5 rounded-xl">
      <i class="fa-solid fa-school text-sky-400"></i>
      <span class="font-semibold truncate">SMK Negeri 1 Batam</span>
    </div>

    <!-- Tombol Keluar / Logout -->
   <form action="{{ route('logout') }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 border border-rose-500/20 font-bold text-xs transition flex items-center justify-center gap-2">
        <i class="fa-solid fa-right-from-bracket"></i> Keluar / Log Out
    </button>
</form>
  </div>
</aside>