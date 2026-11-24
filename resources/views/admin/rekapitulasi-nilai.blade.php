@extends('layouts.admin')

@section('title', 'Rekapitulasi Nilai Akhir PKL & Sertifikasi Industri - Portal PKL.ID')

@section('content')
  <!-- 1. Breadcrumb & Standar -->
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
        <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
        <span>Beranda</span>
      </a>
      <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Rekapitulasi Nilai &amp; Sertifikat</span>
    </div>

    <div class="flex flex-wrap items-center gap-2.5 text-[11px]">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 text-[10px] font-extrabold tracking-wide">
        <i class="fa-solid fa-shield-check text-[10px]"></i>
        STANDAR KURIKULUM MERDEKA VOKASI
      </span>
      <span class="text-slate-400 font-semibold">T.A. 2026/2027</span>
    </div>
  </div>

  <!-- 2. Header & Aksi -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
    <div class="space-y-2 max-w-2xl">
      <div class="text-[10px] font-extrabold uppercase tracking-wider text-sky-700">
        HUBUNGAN INDUSTRI (HUBIN) &bull; PERIODE AKTIF
      </div>
      <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
        Rekapitulasi Nilai Akhir PKL &amp; Sertifikasi Industri
      </h1>
      <p class="text-xs text-slate-500 leading-relaxed">
        Penggabungan nilai kolaboratif (komponen dinamis DUDI &amp; Sekolah), validasi kelulusan magang, ekspor ledger rekap nilai ke Excel, serta penerbitan sertifikat digital resmi sekolah.
      </p>
    </div>

    <div class="flex flex-wrap items-center gap-2.5 shrink-0">
      <button type="button" onclick="showToast('Sinkronisasi data rekap nilai berhasil disiapkan.')" class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-[11px] font-extrabold flex items-center gap-1.5 shadow-2xs transition">
        <i class="fa-solid fa-cloud-arrow-up text-xs"></i>
        <span>Sinkronisasi Data Rekap</span>
      </button>

      <button type="button" onclick="exportLedgerNilai()" class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center gap-1.5 transition">
        <i class="fa-solid fa-file-excel text-emerald-600 text-xs"></i>
        <span>Ekspor Ledger Nilai (Excel)</span>
      </button>

      <button type="button" onclick="terbitkanSertifikatTerpilih()" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center gap-1.5 shadow-xs transition">
        <i class="fa-solid fa-certificate text-xs text-sky-300"></i>
        <span>Terbitkan Sertifikat Masal</span>
      </button>
    </div>
  </div>

  <!-- 3. 4 KPI -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">NILAI TERKUMPUL LENGKAP</span>
        <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm"><i class="fa-solid fa-clipboard-check"></i></span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">382</span>
        <span class="text-xs font-semibold text-slate-400">/ 420 Siswa</span>
      </div>
      <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
        <div class="h-full rounded-full bg-emerald-500" style="width: 90.95%"></div>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">MENUNGGU NILAI / SIDANG</span>
        <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-sm"><i class="fa-solid fa-hourglass-half"></i></span>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-amber-500">38</span>
        <span class="text-xs font-bold text-slate-500">Siswa Tertunda</span>
      </div>
      <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
        <div class="h-full rounded-full bg-amber-400" style="width: 9.1%"></div>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">RATA-RATA NILAI AKHIR</span>
        <span class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm"><i class="fa-solid fa-chart-line"></i></span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">88.6</span>
        <span class="text-xs font-semibold text-slate-400">/ 100</span>
      </div>
      <div class="text-[10px] font-extrabold text-emerald-600">&rarr; +2.4 poin vs semester lalu</div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">SERTIFIKAT DIGITAL DITERBITKAN</span>
        <span class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-sm"><i class="fa-solid fa-stamp"></i></span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span id="kpiSertifikatTerbit" class="text-3xl font-black text-slate-900">350</span>
        <span class="text-xs font-semibold text-slate-400">Lembar Sah</span>
      </div>
      <div class="text-[10px] font-extrabold text-indigo-700">Terverifikasi Sekolah</div>
    </div>
  </div>

  <!-- 4. Banner Informasi Sistem -->
  <section class="rounded-2xl bg-sky-50/80 border border-sky-200/90 p-4 sm:px-5 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
    <div class="flex items-center gap-3.5">
      <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center text-base shrink-0">
        <i class="fa-solid fa-shield-halved"></i>
      </div>
      <div>
        <div class="flex items-center gap-2">
          <h2 class="text-xs sm:text-sm font-black text-slate-900">Modul Penilaian &amp; Sertifikasi Digital Aktif</h2>
          <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 text-[9px] font-extrabold">SIAP CETAK</span>
        </div>
        <p class="text-[11px] text-slate-600">382 data nilai akhir telah sesuai format penilaian Kurikulum Merdeka Vokasi.</p>
      </div>
    </div>

    <div class="flex items-center gap-2 shrink-0">
      <button type="button" onclick="openInfoModal('Riwayat Log Rekapitulasi', 'Sinkronisasi rekap nilai terakhir sukses pada hari ini, 08:15 WIB (382 data nilai terverifikasi).')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-bold">
        Riwayat Log
      </button>
      <button type="button" onclick="showToast('Pengecekan rekap nilai berhasil dijalankan.')" class="px-3.5 py-1.5 rounded-lg bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-extrabold">
        Cek Validasi
      </button>
    </div>
  </section>

  <!-- 5. Filter & Tabel Nilai -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-xs grid grid-cols-1 lg:grid-cols-12 gap-3">
    <div class="lg:col-span-6 relative">
      <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
      <input id="nilaiSearchInput" oninput="filterNilaiTable()" type="text" placeholder="Cari siswa, NISN, atau mitra DUDI..." class="w-full pl-9 pr-4 py-2 bg-slate-50 focus:bg-white border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-sky-500">
    </div>
    <div class="lg:col-span-3">
      <select id="nilaiPredikatSelect" onchange="filterNilaiTable()" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700">
        <option value="">Semua Predikat</option>
        <option value="Amat Baik">Amat Baik (A)</option>
        <option value="Baik">Baik (B)</option>
        <option value="Cukup">Cukup (C)</option>
      </select>
    </div>
    <div class="lg:col-span-3">
      <select id="nilaiSertifikatSelect" onchange="filterNilaiTable()" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700">
        <option value="">Semua Sertifikat</option>
        <option value="Terbit Resmi">Terbit Resmi</option>
        <option value="Menunggu Sertifikat">Menunggu Sertifikat</option>
      </select>
    </div>
  </div>

  <section class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse text-xs">
        <thead>
          <tr class="bg-slate-50/90 border-b border-slate-200/80 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
            <th class="py-3 pl-4 pr-2 w-8"><input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300"></th>
            <th class="py-3 px-3">IDENTITAS SISWA &amp; NISN</th>
            <th class="py-3 px-3">MITRA DUDI &amp; PEMBIMBING</th>
            <th class="py-3 px-3 text-center">DUDI</th>
            <th class="py-3 px-3 text-center">SEKOLAH</th>
            <th class="py-3 px-3 text-center">NILAI AKHIR (NA)</th>
            <th class="py-3 px-3 text-center">PREDIKAT</th>
            <th class="py-3 px-3 text-center">STATUS SERTIFIKAT</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          <tr class="nilai-row hover:bg-slate-50/70 align-middle">
            <td class="py-3.5 pl-4 pr-2"><input type="checkbox" checked class="nilai-check w-3.5 h-3.5 rounded border-slate-300"></td>
            <td class="py-3.5 px-3">
              <div class="font-extrabold text-slate-900">Rizky Pratama</div>
              <div class="text-[10px] text-slate-400">NISN 0064829174 &bull; XII PPLG 1</div>
            </td>
            <td class="py-3.5 px-3">
              <div class="font-extrabold text-slate-800">PT Solusi Teknologi Nusantara</div>
              <div class="text-[10px] text-slate-400">Pembimbing: Hendra Gunawan, S.Kom</div>
            </td>
            <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">92.80</td>
            <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">93.30</td>
            <td class="py-3.5 px-3 text-center"><span class="px-2.5 py-1 rounded-lg bg-sky-50 border border-sky-200 text-sky-800 font-black">93.00</span></td>
            <td class="py-3.5 px-3 text-center"><span class="px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 font-extrabold text-[10px]">Amat Baik (A)</span></td>
            <td class="py-3.5 px-3 text-center"><span class="sert-badge inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-extrabold text-[10px]">Terbit Resmi</span></td>
          </tr>

          <tr class="nilai-row bg-amber-50/35 hover:bg-amber-50/60 align-middle">
            <td class="py-3.5 pl-4 pr-2"><input type="checkbox" class="nilai-check w-3.5 h-3.5 rounded border-slate-300"></td>
            <td class="py-3.5 px-3">
              <div class="font-extrabold text-slate-900">Dimas Setiawan</div>
              <div class="text-[10px] text-slate-400">NISN 0067415880 &bull; XII PPLG 1</div>
            </td>
            <td class="py-3.5 px-3">
              <div class="font-extrabold text-slate-800">PT Solusi Teknologi Nusantara</div>
              <div class="text-[10px] text-slate-400">Pembimbing: Hendra Gunawan, S.Kom</div>
            </td>
            <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">79.60</td>
            <td class="py-3.5 px-3 text-center font-extrabold text-slate-800">80.00</td>
            <td class="py-3.5 px-3 text-center"><span class="px-2.5 py-1 rounded-lg bg-amber-100 border border-amber-300 text-amber-900 font-black">79.80</span></td>
            <td class="py-3.5 px-3 text-center"><span class="px-2.5 py-0.5 rounded-full bg-amber-50 border border-amber-200 text-amber-800 font-extrabold text-[10px]">Cukup (C)</span></td>
            <td class="py-3.5 px-3 text-center"><span class="sert-badge inline-block px-2.5 py-1 rounded-full bg-slate-100 text-slate-500 font-bold text-[10px]">Menunggu Sertifikat</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Generator Sertifikat & Rumus Pembobotan -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
    <section class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-sm font-black text-slate-900">Generator Sertifikat Digital Masal</h2>
        <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">Terverifikasi Sekolah</span>
      </div>
      <p class="text-[11px] text-slate-500">Format nomor seri: <strong class="font-mono text-slate-800">PKL-2026/SEKOLAH/PPLG/0042</strong></p>
      <div class="flex flex-wrap justify-end gap-2 pt-2">
        <button type="button" onclick="openInfoModal('Template Sertifikat PKL', 'Template sertifikat menggunakan format Kurikulum Merdeka Vokasi dengan QR validasi publik.')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-bold text-slate-700">
          Sesuaikan Template
        </button>
        <button type="button" onclick="terbitkanSertifikatTerpilih()" class="px-3.5 py-1.5 rounded-lg bg-[#13294B] hover:bg-[#1E3F73] text-white text-[11px] font-extrabold">
          Proses Terbit Sertifikat Terpilih
        </button>
      </div>
    </section>

    <section class="lg:col-span-5 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <h2 class="text-sm font-black text-slate-900">Rumus Pembobotan Nilai Akhir PKL</h2>
      <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 text-center space-y-1">
        <div class="text-xs font-black text-slate-900">NA = Kumulatif Komponen Dinamis (Bobot 100%)</div>
        <div class="text-[10px] text-slate-500">KKM Kelulusan: <strong>75.00</strong></div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')
<script>
  function filterNilaiTable() {
    const q = (document.getElementById('nilaiSearchInput').value || '').toLowerCase();
    const pred = (document.getElementById('nilaiPredikatSelect').value || '').toLowerCase();
    const sert = (document.getElementById('nilaiSertifikatSelect').value || '').toLowerCase();

    document.querySelectorAll('.nilai-row').forEach(row => {
      const text = row.innerText.toLowerCase();
      const match = (!q || text.includes(q)) && (!pred || text.includes(pred)) && (!sert || text.includes(sert));
      row.classList.toggle('hidden', !match);
    });
  }

  function exportLedgerNilai() {
    triggerDownload('ledger-nilai-pkl.csv', "Nama Siswa,Nilai DUDI,Nilai Sekolah,Nilai Akhir,Predikat\nRizky Pratama,92.80,93.30,93.00,Amat Baik (A)\nDimas Setiawan,79.60,80.00,79.80,Cukup (C)\n", 'text/csv;charset=utf-8;');
    showToast('Ledger nilai PKL berhasil diunduh.');
  }

  function terbitkanSertifikatTerpilih() {
    let updated = 0;
    document.querySelectorAll('.nilai-check:checked').forEach(cb => {
      const badge = cb.closest('tr').querySelector('.sert-badge');
      if (badge && !badge.textContent.includes('Terbit Resmi')) {
        badge.className = 'sert-badge inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 font-extrabold text-[10px]';
        badge.textContent = 'Terbit Resmi';
        updated++;
      }
    });
    if (updated > 0) {
      const kpi = document.getElementById('kpiSertifikatTerbit');
      kpi.textContent = String(parseInt(kpi.textContent || '350', 10) + updated);
      showToast(`${updated} sertifikat digital berhasil diterbitkan.`);
    } else {
      showToast('Sertifikat untuk siswa terpilih sudah berstatus Terbit Resmi.');
    }
  }
</script>
@endpush