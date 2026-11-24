<aside class="w-64 bg-[#0B1E38] text-slate-300 flex flex-col min-h-screen shrink-0 select-none">
  <!-- Brand Header -->
  <div class="p-6 pb-5 border-b border-white/10">
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-xl bg-sky-500/15 border border-sky-400/30 text-sky-400 flex items-center justify-center text-lg">
        <i class="fa-solid fa-graduation-cap"></i>
      </div>
      <div>
        <div class="text-xl font-black text-white tracking-tight leading-none">PKL.ID</div>
        <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-slate-400 mt-1.5">
          PLATFORM MONITORING VOKASI
        </div>
      </div>
    </div>
  </div>

  <!-- Navigasi Admin PKL -->
  <nav class="flex-1 px-4 py-6 space-y-1.5 text-xs font-bold">
    <div class="px-3 pb-2 text-[10px] font-extrabold uppercase tracking-wider text-slate-500">
      NAVIGASI ADMIN PKL
    </div>

    <a href="{{ route('admin.dashboard') }}"
       class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#0284C7] text-white shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
      <i class="fa-solid fa-house w-4 text-center text-sm"></i>
      <span>Beranda / Dashboard</span>
    </a>

    <a href="{{ route('admin.dudi-mou') }}"
       class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dudi-mou') ? 'bg-[#0284C7] text-white shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
      <i class="fa-solid fa-building w-4 text-center text-sm"></i>
      <span>Kelola Mitra &amp; Kuota</span>
    </a>

    <a href="{{ route('admin.manajemen-siswa') }}"
       class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.manajemen-siswa') ? 'bg-[#0284C7] text-white shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
      <i class="fa-solid fa-users-rectangle w-4 text-center text-sm"></i>
      <span>Periode &amp; Penempatan</span>
    </a>

    <a href="{{ route('admin.monitoring-pembimbing') }}"
       class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.monitoring-pembimbing') ? 'bg-[#0284C7] text-white shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
      <i class="fa-solid fa-chalkboard-user w-4 text-center text-sm"></i>
      <span>Monitoring &amp; Pembimbing</span>
    </a>

    <a href="{{ route('admin.rekapitulasi-nilai') }}"
       class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.rekapitulasi-nilai') ? 'bg-[#0284C7] text-white shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
      <i class="fa-solid fa-award w-4 text-center text-sm"></i>
      <span>Kelola Penilaian &amp; Rekap</span>
    </a>

    <a href="{{ route('admin.pengaturan') }}"
       class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.pengaturan') ? 'bg-[#0284C7] text-white shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
      <i class="fa-solid fa-gear w-4 text-center text-sm"></i>
      <span>Pengaturan &amp; Log Audit</span>
    </a>
  </nav>
</aside>