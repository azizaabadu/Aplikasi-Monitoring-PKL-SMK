<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Portal Admin - PKL.ID')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .content-scroll::-webkit-scrollbar {
      width: 7px;
      height: 7px;
    }
    .content-scroll::-webkit-scrollbar-track {
      background: #f1f5f9;
    }
    .content-scroll::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 9999px;
    }
    .content-scroll::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }
  </style>
</head>
<body class="bg-[#F4F7FB] text-slate-800 antialiased overflow-hidden">

  <div class="flex h-screen w-full overflow-hidden">

    <!-- SIDEBAR ADMIN: Tetap diam & memenuhi tinggi layar -->
    <aside class="w-64 shrink-0 bg-[#13294B] text-white flex flex-col justify-between h-screen overflow-y-auto select-none border-r border-[#1E3A66]">
      <div>
        <!-- Brand Header -->
        <div class="px-5 py-4 border-b border-white/10 flex items-center gap-3">
          <div class="w-9 h-9 rounded-lg bg-[#1D4ED8] flex items-center justify-center font-black text-sm tracking-tight shadow-inner">
            PK
          </div>
          <div>
            <div class="text-base font-black tracking-tight leading-none">PKL.ID</div>
            <div class="text-[9px] font-bold tracking-[0.16em] text-sky-300/90 uppercase mt-1 leading-none">
              PLATFORM VOKASI
            </div>
          </div>
        </div>

        <!-- Navigasi Sistem -->
        <nav class="p-3 space-y-1 text-[11px] font-semibold">
          <div class="px-3 py-2 text-[9px] font-extrabold uppercase tracking-[0.14em] text-slate-400">
            NAVIGASI SISTEM
          </div>

          <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-[#1E3F73] text-white font-bold shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} transition">
            <i class="fa-solid fa-table-cells-large w-4 text-center {{ request()->routeIs('admin.dashboard') ? 'text-sky-300' : 'text-slate-400' }}"></i>
            <span>Beranda / Dashboard</span>
          </a>

          <a href="{{ route('admin.dudi-mou') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.dudi-mou') ? 'bg-[#1E3F73] text-white font-bold shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} transition">
            <i class="fa-solid fa-building w-4 text-center {{ request()->routeIs('admin.dudi-mou') ? 'text-sky-300' : 'text-slate-400' }}"></i>
            <span>Kemitraan DUDI &amp; MoU</span>
          </a>

          <a href="{{ route('admin.monitoring-pembimbing') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.monitoring-pembimbing') ? 'bg-[#1E3F73] text-white font-bold shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} transition">
            <i class="fa-solid fa-clipboard-check w-4 text-center {{ request()->routeIs('admin.monitoring-pembimbing') ? 'text-sky-300' : 'text-slate-400' }}"></i>
            <span>Monitoring &amp; Pembimbing</span>
          </a>

          <a href="{{ route('admin.manajemen-siswa') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.manajemen-siswa') ? 'bg-[#1E3F73] text-white font-bold shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} transition">
            <i class="fa-solid fa-user-graduate w-4 text-center {{ request()->routeIs('admin.manajemen-siswa') ? 'text-sky-300' : 'text-slate-400' }}"></i>
            <span>Manajemen Siswa &amp; Penempatan</span>
          </a>

          <a href="{{ route('admin.rekapitulasi-nilai') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.rekapitulasi-nilai') ? 'bg-[#1E3F73] text-white font-bold shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} transition">
            <i class="fa-solid fa-award w-4 text-center {{ request()->routeIs('admin.rekapitulasi-nilai') ? 'text-sky-300' : 'text-slate-400' }}"></i>
            <span>Rekapitulasi Nilai &amp; Sertifikat</span>
          </a>

          <a href="{{ route('admin.pengaturan-akun') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.pengaturan-akun') ? 'bg-[#1E3F73] text-white font-bold shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} transition">
            <i class="fa-solid fa-gear w-4 text-center {{ request()->routeIs('admin.pengaturan-akun') ? 'text-sky-300' : 'text-slate-400' }}"></i>
            <span>Pengaturan Sekolah &amp; Akun</span>
          </a>
        </nav>
      </div>

      <!-- Bagian Bawah Sidebar -->
      <div class="p-3 space-y-2 border-t border-white/10">
        <div class="px-3 py-2.5 rounded-lg bg-[#1B3661] border border-white/10 flex items-center gap-2.5">
          <div class="w-7 h-7 rounded-md bg-sky-500/20 text-sky-300 flex items-center justify-center text-xs shrink-0">
            <i class="fa-solid fa-graduation-cap"></i>
          </div>
          <div class="min-w-0">
            <div class="text-[11px] font-bold text-white truncate">SMK Negeri Teladan</div>
            <div class="text-[9px] text-slate-300/80 truncate">NPSN: 10403982 &bull; Terakreditasi</div>
          </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full px-3 py-2 rounded-lg bg-[#3B1D38] hover:bg-[#4E244A] border border-rose-400/20 text-rose-200 text-[11px] font-bold flex items-center justify-center gap-2 transition">
            <i class="fa-solid fa-arrow-right-from-bracket text-xs"></i>
            <span>Keluar Sistem</span>
          </button>
        </form>
      </div>
    </aside>

    <!-- AREA KANAN: Topbar + Konten Utama (Hanya bagian ini yang bergerak/scroll) -->
    <div class="flex-1 h-screen overflow-y-auto content-scroll bg-[#F4F7FB]">

      <!-- TOPBAR ADMIN -->
      <header class="sticky top-0 z-20 bg-white/95 backdrop-blur border-b border-slate-200/90 px-5 py-2.5 flex items-center justify-between gap-4">
        <div class="relative w-full max-w-md">
          <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
          <input
            id="globalSearchInput"
            type="text"
            placeholder="Cari NISN, nama siswa, ID mitra..."
            class="w-full pl-9 pr-4 py-1.5 bg-slate-100/80 hover:bg-slate-100 focus:bg-white border border-slate-200 rounded-lg text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition"
          >
        </div>

        <div class="flex items-center gap-2.5 shrink-0">
          <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200/80 text-emerald-700 text-[10px] font-extrabold tracking-wide">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            DAPODIK SINKRON
          </span>

          <div class="hidden md:inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-white border border-slate-200 text-slate-700 text-[10px] font-bold">
            <i class="fa-regular fa-calendar text-slate-400"></i>
            <span>T.A. 2024/2025 Genap</span>
            <i class="fa-solid fa-chevron-down text-[9px] text-slate-400 ml-0.5"></i>
          </div>

          <button type="button" onclick="openInfoModal('Notifikasi Sistem PKL.ID', 'Semua layanan sinkronisasi Dapodik, E-Rapor, dan BSrE berjalan normal tanpa gangguan.')" class="relative w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-600 transition">
            <i class="fa-regular fa-bell text-xs"></i>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-rose-500"></span>
          </button>

          <div class="flex items-center gap-2.5 pl-2.5 border-l border-slate-200">
            <div class="text-right hidden lg:block leading-tight">
              <div class="text-[11px] font-extrabold text-slate-800">{{ auth()->user()->name ?? 'Drs. H. Mulyadi, M.T.' }}</div>
              <div class="text-[9px] font-semibold text-slate-400">Koordinator Hubin &amp; Kurikulum</div>
            </div>
            <div class="w-8 h-8 rounded-full bg-[#13294B] text-white text-[11px] font-extrabold flex items-center justify-center">
              HM
            </div>
          </div>
        </div>
      </header>

      <!-- KONTEN UTAMA -->
      <main class="p-5 sm:p-6 space-y-5 max-w-[1440px] mx-auto">
        @yield('content')
      </main>
    </div>

  </div>

  <!-- MODAL INFORMASI UMUM (Pengganti alert biasa) -->
  <div id="infoModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-3">
      <div class="flex items-center justify-between gap-2">
        <h3 id="infoModalTitle" class="text-sm font-black text-slate-900">Informasi</h3>
        <button type="button" onclick="closeModal('infoModal')" class="text-slate-400 hover:text-slate-700">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
      <p id="infoModalBody" class="text-xs text-slate-600 leading-relaxed"></p>
      <div class="flex justify-end pt-2">
        <button type="button" onclick="closeModal('infoModal')" class="px-4 py-2 rounded-xl bg-[#13294B] text-white text-xs font-extrabold">Mengerti</button>
      </div>
    </div>
  </div>

  <!-- TOAST NOTIFIKASI DI DALAM HALAMAN -->
  <div id="uiToast" class="fixed bottom-4 right-5 z-50 hidden bg-[#13294B] text-white px-4 py-2.5 rounded-xl shadow-lg border border-white/10 items-center gap-2 text-[11px] font-bold">
    <i class="fa-solid fa-circle-check text-emerald-400 text-xs"></i>
    <span id="uiToastText">Berhasil diproses.</span>
  </div>

  <script>
    function showToast(message) {
      const toast = document.getElementById('uiToast');
      const text = document.getElementById('uiToastText');
      text.textContent = message;
      toast.classList.remove('hidden');
      toast.classList.add('flex');
      clearTimeout(window.toastTimer);
      window.toastTimer = setTimeout(() => {
        toast.classList.add('hidden');
        toast.classList.remove('flex');
      }, 3000);
    }

    function openModal(id) {
      const el = document.getElementById(id);
      if (!el) return;
      el.classList.remove('hidden');
      el.classList.add('flex');
    }

    function closeModal(id) {
      const el = document.getElementById(id);
      if (!el) return;
      el.classList.add('hidden');
      el.classList.remove('flex');
    }

    function openInfoModal(title, body) {
      document.getElementById('infoModalTitle').textContent = title;
      document.getElementById('infoModalBody').textContent = body;
      openModal('infoModal');
    }

    function triggerDownload(filename, content, mimeType = 'text/plain;charset=utf-8;') {
      const blob = new Blob([content], { type: mimeType });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = filename;
      a.click();
      URL.revokeObjectURL(url);
    }
  </script>

  @stack('scripts')
</body>
</html>