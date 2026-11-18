<header class="sticky top-0 z-30 bg-white border-b border-slate-200/80 px-4 sm:px-8 h-16 flex items-center justify-between gap-4">
  <div class="flex items-center gap-3 flex-1 max-w-md">
    <!-- Tombol Hamburger Mobile -->
    <button onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')" class="lg:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    <!-- Search Input -->
    <div class="relative w-full hidden sm:block">
      <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
      </svg>
      <input type="text" placeholder="Cari riwayat logbook atau umpan balik..." class="w-full bg-slate-100/80 border border-slate-200/80 rounded-xl pl-10 pr-4 py-2 text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:bg-white focus:border-sky-400 transition" />
    </div>
  </div>

  <!-- Right Controls -->
  <div class="flex items-center gap-3 sm:gap-4">
    <div class="hidden md:flex items-center gap-2 bg-sky-50 border border-sky-200/80 text-[#172B4D] px-3 py-1.5 rounded-lg text-xs font-semibold">
      <svg class="w-3.5 h-3.5 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
      </svg>
      <span>TA 2026/2027 • Periode PKL</span>
    </div>

    <!-- Notifikasi -->
    <button class="relative p-2 text-slate-500 hover:bg-slate-100 rounded-full transition" title="Notifikasi">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
      </svg>
      <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-rose-500 rounded-full ring-2 ring-white"></span>
    </button>

    <!-- Profil Siswa -->
    <div class="flex items-center gap-2.5 pl-3 border-l border-slate-200">
      <div class="text-right">
        <div class="text-xs font-bold text-slate-800">Rizky Pratama</div>
        <span class="inline-block bg-sky-100 text-sky-800 text-[10px] font-bold px-2 py-0.5 rounded">
          Siswa PPLG
        </span>
      </div>
      <div class="w-9 h-9 rounded-full bg-[#172B4D] text-white font-bold text-xs flex items-center justify-center">
        RP
      </div>
    </div>
  </div>
</header>