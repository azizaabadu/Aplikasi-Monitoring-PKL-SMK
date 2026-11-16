<!-- SIDEBAR (Tema Dark Navy sesuai referensi gambar + Logo Geometris PKL.ID) -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-[#172B4D] text-white flex flex-col justify-between transition-transform duration-300 -translate-x-full lg:translate-x-0">
      <div>
        <!-- Brand Header & Custom Geometric SVG Logo -->
        <div class="p-5 flex items-center gap-3 border-b border-white/10">
          <!-- Custom SVG Logo terinspirasi logo 3D geometris PKL -->
          <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-[#1E3A6D] to-[#0F1E38] border border-sky-400/30 flex items-center justify-center shadow-inner shrink-0">
            <svg viewBox="0 0 64 64" class="w-8 h-8" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M32 6L56 30L32 54L8 30L32 6Z" stroke="#38BDF8" stroke-width="3.5" stroke-linejoin="round"/>
              <path d="M32 14L48 30L32 46L16 30L32 14Z" stroke="#93C5FD" stroke-width="2" stroke-opacity="0.7"/>
              <text x="32" y="35" text-anchor="middle" fill="#FFFFFF" font-size="14" font-weight="800" font-family="Plus Jakarta Sans, sans-serif" letter-spacing="0.5">PKL</text>
            </svg>
          </div>
          <div>
            <div class="font-extrabold text-lg tracking-tight leading-none text-white">PKL.ID</div>
            <div class="text-[10px] font-semibold tracking-widest text-sky-300/80 uppercase mt-1 leading-tight">
              Platform<br>Monitoring Vokasi
            </div>
          </div>
        </div>

        <!-- Label Navigasi -->
        <div class="px-5 pt-5 pb-2">
          <div class="bg-white/5 rounded-md px-3 py-1.5 text-[10px] font-bold tracking-wider text-slate-400 uppercase">
            Navigasi Siswa
          </div>
        </div>

        <!-- Menu Navigasi (Disesuaikan 100% dengan Daftar Halaman Siswa di PRD Bagian 8) -->
        <nav class="px-3 space-y-1 text-sm">
          <!-- Menu Aktif (Aksen Cyan sesuai gambar) -->
          <a href="#dashboard" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl bg-[#7DD3FC] text-[#0F172A] font-bold shadow-sm">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
              <rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/>
            </svg>
            <span>Beranda / Dashboard</span>
          </a>

          <a href="#checkin" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-medium transition">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Check-in Kondisi Harian</span>
          </a>

          <a href="#logbook" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-medium transition">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            <span>Logbook Harian</span>
            <span class="ml-auto bg-rose-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">1</span>
          </a>

          <a href="#mitra" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-medium transition">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
            <span>Penempatan & Mitra</span>
          </a>

          <a href="#umpan-balik" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-medium transition">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
            </svg>
            <span>Umpan Balik DUDI</span>
          </a>

          <a href="#nilai" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-medium transition">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
            </svg>
            <span>Nilai Akhir PKL</span>
          </a>
        </nav>
      </div>

      <!-- Footer Sekolah di Bawah Sidebar (sesuai referensi gambar) -->
      <div class="p-4 border-t border-white/10">
        <div class="flex items-center gap-2.5 text-xs text-slate-300 bg-white/5 px-3 py-2.5 rounded-xl">
          <svg class="w-4 h-4 text-sky-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
          </svg>
          <span class="font-semibold truncate">SMK Negeri 1 Batam</span>
        </div>
      </div>
    </aside>