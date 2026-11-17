@extends('layouts.student')

@section('title', 'Dashboard Siswa - PKL.ID')

@section('content')
       <!-- NAVIGATION TABS -->
<div class="flex items-center gap-2 overflow-x-auto pb-2 border-b border-slate-200">
  <button onclick="switchTab('tab-dashboard')" id="btn-tab-dashboard" class="tab-btn px-4 py-2 rounded-xl text-xs font-extrabold bg-[#172B4D] text-white transition shrink-0">
    📊 Ringkasan Dashboard
  </button>
  <button onclick="switchTab('tab-checkin')" id="btn-tab-checkin" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold bg-white text-slate-600 hover:bg-slate-100 transition shrink-0">
    📍 Check-in Harian (K1)
  </button>
  <button onclick="switchTab('tab-logbook')" id="btn-tab-logbook" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold bg-white text-slate-600 hover:bg-slate-100 transition shrink-0">
    📖 Logbook Harian (L1 & L2)
  </button>
  <button onclick="switchTab('tab-mitra')" id="btn-tab-mitra" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold bg-white text-slate-600 hover:bg-slate-100 transition shrink-0">
    🏢 Info Mitra & Pembimbing (T7)
  </button>
</div>
        <!-- ================= TAB 1: RINGKASAN DASHBOARD ================= -->
        <div id="tab-dashboard" class="tab-content space-y-6">
          <!-- Banner -->
          <section class="bg-gradient-to-r from-[#0F1E38] via-[#172B4D] to-[#1E3A6D] rounded-3xl p-6 sm:p-8 text-white shadow-xl relative overflow-hidden">
            <div class="relative z-10 space-y-2 max-w-2xl">
              <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-xs font-semibold">
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                Penempatan Disetujui & Terkunci
              </span>
              <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Halo, Rizky Pratama! 👋</h1>
              <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                Selamat datang di sistem monitoring PKL. Pantau kehadiran, isi logbook, dan lihat umpan balik DUDI di PT Solusi Teknologi Nusantara.
              </p>
            </div>
          </section>

          <!-- 4 Kartu Statistik -->
          <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm">
              <div class="text-xs font-semibold text-slate-400 uppercase">Progres Periode</div>
              <div class="mt-2 text-2xl font-extrabold text-slate-900">Hari ke-24 <span class="text-xs text-slate-500">/ 90 hari</span></div>
              <div class="w-full bg-slate-100 h-2 rounded-full mt-3 overflow-hidden"><div class="bg-[#172B4D] h-full" style="width: 27%"></div></div>
            </div>
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm">
              <div class="text-xs font-semibold text-slate-400 uppercase">Check-in Hari Ini</div>
              <div class="mt-2 text-lg font-extrabold text-slate-900">Senin, 16 Nov 2026</div>
              <p class="text-xs text-amber-600 font-bold mt-1">Belum Diisi</p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm">
              <div class="text-xs font-semibold text-slate-400 uppercase">Logbook Harian</div>
              <div class="mt-2 text-lg font-extrabold text-slate-900">22 Disahkan</div>
              <p class="text-xs text-rose-600 font-bold mt-1">1 Perlu Revisi</p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm">
              <div class="text-xs font-semibold text-slate-400 uppercase">Nilai Akhir PKL</div>
              <div class="mt-2 text-lg font-extrabold text-slate-400">Menunggu Rilis</div>
              <p class="text-xs text-slate-500 mt-1">Belum dirilis admin</p>
            </div>
          </section>
        </div>

        <!-- ================= TAB 2: CHECK-IN HARIAN (K1) ================= -->
        <div id="tab-checkin" class="tab-content hidden space-y-6">
          <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4 max-w-2xl">
            <div>
              <span class="text-[11px] font-bold uppercase tracking-wider text-sky-700">Modul K1 (Check-in Harian)</span>
              <h2 class="text-lg font-extrabold text-slate-900">Form Kehadiran & Kondisi Siswa</h2>
            </div>
            <form class="space-y-4 text-xs">
              <div>
                <label class="block font-bold text-slate-700 mb-2">Status Kehadiran</label>
                <div class="grid grid-cols-3 gap-2">
                  <label class="cursor-pointer"><input type="radio" name="kehadiran" checked class="peer sr-only"><div class="p-3 rounded-xl border text-center font-bold peer-checked:bg-emerald-50 peer-checked:border-emerald-500 peer-checked:text-emerald-700">Hadir</div></label>
                  <label class="cursor-pointer"><input type="radio" name="kehadiran" class="peer sr-only"><div class="p-3 rounded-xl border text-center font-bold peer-checked:bg-amber-50 peer-checked:border-amber-500 peer-checked:text-amber-700">Sakit</div></label>
                  <label class="cursor-pointer"><input type="radio" name="kehadiran" class="peer sr-only"><div class="p-3 rounded-xl border text-center font-bold peer-checked:bg-sky-50 peer-checked:border-sky-500 peer-checked:text-sky-700">Izin</div></label>
                </div>
              </div>
              <div>
                <label class="block font-bold text-slate-700 mb-2">Kondisi Umum</label>
                <select class="w-full rounded-xl border border-slate-200 px-3 py-2.5 font-medium focus:outline-none">
                  <option>Baik / Sehat</option>
                  <option>Kurang Sehat</option>
                  <option>Ada Kendala di Lapangan</option>
                </select>
              </div>
              <button type="button" class="px-5 py-2.5 bg-[#172B4D] text-white font-bold rounded-xl">Kirim Check-in</button>
            </form>
          </div>
        </div>

        <!-- ================= TAB 3: LOGBOOK HARIAN (L1 & L2) ================= -->
        <div id="tab-logbook" class="tab-content hidden space-y-6">
          <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4">
            <div class="flex items-center justify-between pb-3 border-b">
              <h2 class="text-base font-extrabold text-slate-900">Jurnal & Logbook Harian Siswa</h2>
              <button class="px-4 py-2 bg-[#172B4D] text-white text-xs font-bold rounded-xl">+ Buat Logbook</button>
            </div>
            <div class="space-y-3 text-xs">
              <div class="p-4 rounded-xl border border-rose-200 bg-rose-50/30 space-y-1">
                <div class="flex justify-between font-bold text-slate-800">
                  <span>Jumat, 13 Nov 2026</span>
                  <span class="text-rose-600">Perlu Revisi[cite: 16]</span>
                </div>
                <p class="text-slate-600">Membuat skema database relasional...</p>
                <p class="text-[11px] text-rose-700 bg-white p-2 rounded border border-rose-100 mt-1">
                  <strong>Catatan DUDI:</strong> Perjelas langkah migrasi tabel.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- ================= TAB 4: INFO MITRA & PEMBIMBING (T7) ================= -->
        <div id="tab-mitra" class="tab-content hidden space-y-6">
          <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm space-y-4 max-w-xl">
            <h2 class="text-base font-extrabold text-slate-900">Informasi Penempatan PKL (T7)</h2>
            <div class="p-4 rounded-xl bg-slate-50 border space-y-2 text-xs">
              <div><span class="text-slate-400">Mitra Industri (DUDI)</span><div class="font-extrabold text-sm text-slate-900">PT Solusi Teknologi Nusantara</div></div>
              <div class="grid grid-cols-2 gap-2 pt-2 border-t">
                <div><span class="text-slate-400">Pembimbing DUDI</span><div class="font-bold text-slate-800">Budi Santoso, S.Kom</div></div>
                <div><span class="text-slate-400">Guru Pembimbing</span><div class="font-bold text-slate-800">Siti Aminah, M.Pd</div></div>
              </div>
            </div>
          </div>
        </div>

       <script>
  function switchTab(tabId) {
    // Sembunyikan semua elemen konten tab
    document.querySelectorAll('.tab-content').forEach(el => {
      el.classList.add('hidden');
    });

    // Tampilkan tab yang diklik
    const targetTab = document.getElementById(tabId);
    if (targetTab) {
      targetTab.classList.remove('hidden');
    }
    
    // Nonaktifkan semua gaya tombol tab atas
    document.querySelectorAll('.tab-btn').forEach(btn => {
      btn.classList.remove('bg-[#172B4D]', 'text-white');
      btn.classList.add('bg-white', 'text-slate-600');
    });
    
    // Berikan gaya aktif ke tombol tab yang sedang dipilih (jika diklik dari tab atas)
    const activeBtn = document.getElementById('btn-' + tabId);
    if (activeBtn) {
      activeBtn.classList.remove('bg-white', 'text-slate-600');
      activeBtn.classList.add('bg-[#172B4D]', 'text-white');
    }
  }
</script>
@endsection