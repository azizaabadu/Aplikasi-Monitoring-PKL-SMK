@extends('layouts.admin')

@section('title', 'Manajemen Alokasi & Penempatan Siswa PKL - Portal PKL.ID')

@section('content')
  <!-- 1. Breadcrumb & Status Dapodik -->
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
        <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
        <span>Beranda</span>
      </a>
      <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Manajemen Siswa &amp; Penempatan</span>
    </div>

    <div class="flex flex-wrap items-center gap-2.5 text-[11px]">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
        Dapodik v2024.e Terhubung
      </span>
      <span class="text-slate-400">|</span>
      <span class="text-slate-500 font-medium">Pembaruan: Hari ini, 08:30 WIB</span>
    </div>
  </div>

  <!-- 2. Header & Tombol Aksi -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
    <div class="flex items-start gap-3.5 max-w-2xl">
      <span class="w-9 h-9 rounded-xl bg-slate-100 text-[#13294B] flex items-center justify-center text-sm shrink-0 mt-0.5">
        <i class="fa-solid fa-id-card-clip"></i>
      </span>
      <div>
        <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
          Manajemen Alokasi &amp; Penempatan Siswa PKL
        </h1>
        <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">
          Kelola pemetaan 420 siswa tingkat akhir ke 64 mitra DUDI terakreditasi, sinkronisasi rombel Dapodik, dan penerbitan Surat Perintah Tugas (SPT) penempatan secara otomatis.
        </p>
      </div>
    </div>

    <div class="flex flex-wrap items-center gap-2.5 shrink-0">
      <button type="button" onclick="showToast('Data siswa & rombel dari Dapodik berhasil disinkronkan.')" class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center gap-1.5 transition">
        <i class="fa-solid fa-rotate text-slate-500 text-xs"></i>
        <span>Tarik Data Dapodik</span>
      </button>

      <button type="button" onclick="exportSiswaRekap()" class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center gap-1.5 transition">
        <i class="fa-solid fa-file-excel text-emerald-600 text-xs"></i>
        <span>Unduh Rekap Excel</span>
      </button>

      <button type="button" onclick="openModal('modalPlottingMasal')" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center gap-1.5 shadow-xs transition">
        <i class="fa-solid fa-user-group text-xs"></i>
        <span>+ Plotting Siswa Masal</span>
      </button>
    </div>
  </div>

  <!-- 3. 4 KPI -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Total Siswa Tingkat Akhir</span>
        <span class="w-9 h-9 rounded-xl bg-slate-100 text-[#13294B] flex items-center justify-center text-sm"><i class="fa-solid fa-graduation-cap"></i></span>
      </div>
      <div class="text-3xl font-black text-slate-900">420</div>
      <div class="flex items-center gap-2 text-[11px]">
        <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-extrabold text-[10px]">100% Terdata</span>
        <span class="text-slate-400">4 Jurusan: PPLG, TJKT, DKV, Animasi</span>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Sudah Ditempatkan</span>
        <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm"><i class="fa-regular fa-id-badge"></i></span>
      </div>
      <div class="text-3xl font-black text-emerald-600">398</div>
      <div class="flex items-center gap-2 text-[11px]">
        <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-extrabold text-[10px]">94.8% Kuota</span>
        <span class="text-slate-400">Terkonfirmasi MoU DUDI</span>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Menunggu Penempatan</span>
        <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-sm"><i class="fa-regular fa-clipboard"></i></span>
      </div>
      <div class="text-3xl font-black text-amber-500">22</div>
      <div class="flex flex-wrap items-center gap-1 text-[10px] font-bold">
        <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700">PPLG: 8</span>
        <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700">TJKT: 6</span>
        <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700">DKV: 8</span>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Penerbitan SPT &amp; MoU</span>
        <span class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm"><i class="fa-solid fa-file-shield"></i></span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">398</span>
        <span class="text-xs font-semibold text-slate-400">/ 420</span>
      </div>
      <div class="w-full h-1.5 rounded-full bg-slate-100 overflow-hidden">
        <div class="h-full rounded-full bg-teal-600" style="width: 94.8%"></div>
      </div>
    </div>
  </div>

  <!-- 4. Filter -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-xs grid grid-cols-1 lg:grid-cols-12 gap-3">
    <div class="lg:col-span-5 relative">
      <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
      <input id="siswaSearchInput" oninput="filterSiswaTable()" type="text" placeholder="Cari nama siswa, NISN, atau mitra DUDI..." class="w-full pl-9 pr-4 py-2 bg-slate-50 focus:bg-white border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-sky-500">
    </div>
    <div class="lg:col-span-3">
      <select id="siswaJurusanSelect" onchange="filterSiswaTable()" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700">
        <option value="">Semua Jurusan</option>
        <option value="PPLG">PPLG</option>
        <option value="TJKT">TJKT</option>
        <option value="DKV">DKV</option>
        <option value="Animasi">Animasi</option>
      </select>
    </div>
    <div class="lg:col-span-2">
      <select id="siswaWilayahSelect" onchange="filterSiswaTable()" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700">
        <option value="">Semua Wilayah</option>
        <option value="Nongsa">Nongsa Digital Park</option>
        <option value="Batam Center">Batam Center</option>
        <option value="Batu Ampar">Batu Ampar</option>
      </select>
    </div>
    <div class="lg:col-span-2">
      <button type="button" onclick="resetSiswaFilter()" class="w-full px-3 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-600 flex items-center justify-center gap-1.5">
        <i class="fa-solid fa-rotate-left text-[10px]"></i>
        <span>Reset</span>
      </button>
    </div>
  </div>

  <!-- 5. Grid Utama -->
  <div class="grid grid-cols-1 xl:grid-cols-12 gap-5 items-start">
    <section class="xl:col-span-8 bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
      <div class="px-4 py-3 border-b border-slate-100 flex flex-wrap items-center justify-between gap-3">
        <label class="inline-flex items-center gap-2.5 text-xs font-bold text-slate-700 cursor-pointer">
          <input id="selectAllSiswa" onchange="toggleAllSiswa(this)" type="checkbox" class="w-4 h-4 rounded border-slate-300 text-[#13294B]">
          <span>Pilih Semua Siswa</span>
        </label>

        <div class="flex flex-wrap items-center gap-2">
          <button type="button" onclick="cetakSptTerpilih()" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-bold text-slate-700 flex items-center gap-1.5">
            <i class="fa-solid fa-print text-slate-500 text-[10px]"></i>
            <span>Cetak SPT Terpilih</span>
          </button>
          <button type="button" onclick="openModal('modalPindahMitra')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-bold text-slate-700 flex items-center gap-1.5">
            <i class="fa-solid fa-right-left text-slate-500 text-[10px]"></i>
            <span>Pindah Mitra Kolektif</span>
          </button>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-xs">
          <thead>
            <tr class="bg-slate-50/90 border-b border-slate-200/80 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
              <th class="py-3 pl-4 pr-2 w-8">#</th>
              <th class="py-3 px-3">SISWA &amp; IDENTITAS</th>
              <th class="py-3 px-3">KOMPETENSI ROMBEL</th>
              <th class="py-3 px-3">MITRA INDUSTRI (DUDI)</th>
              <th class="py-3 px-3">PEMBIMBING</th>
            </tr>
          </thead>
          <tbody id="siswaTableBody" class="divide-y divide-slate-100">
            <tr class="siswa-row hover:bg-slate-50/70 align-top">
              <td class="py-3.5 pl-4 pr-2"><input type="checkbox" class="siswa-check w-3.5 h-3.5 rounded border-slate-300 mt-1"></td>
              <td class="py-3.5 px-3">
                <div class="font-extrabold text-slate-900">Rizky Pratama</div>
                <div class="text-[10px] text-slate-400">NISN: 0064829174 &bull; XII PPLG 1</div>
              </td>
              <td class="py-3.5 px-3">
                <div class="font-extrabold text-slate-800">PPLG</div>
                <div class="text-[10px] text-slate-400">Software Eng. &amp; Cloud</div>
              </td>
              <td class="py-3.5 px-3 mitra-cell">
                <div class="font-extrabold text-slate-800">PT Solusi Teknologi Nusantara</div>
                <div class="text-[10px] text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Nongsa Digital Park</div>
              </td>
              <td class="py-3.5 px-3 font-bold text-slate-800">Dra. Sri Wahyuni, M.Pd</td>
            </tr>

            <tr class="siswa-row hover:bg-slate-50/70 align-top">
              <td class="py-3.5 pl-4 pr-2"><input type="checkbox" class="siswa-check w-3.5 h-3.5 rounded border-slate-300 mt-1"></td>
              <td class="py-3.5 px-3">
                <div class="font-extrabold text-slate-900">Siti Nurhaliza</div>
                <div class="text-[10px] text-slate-400">NISN: 0061928410 &bull; XII PPLG 2</div>
              </td>
              <td class="py-3.5 px-3">
                <div class="font-extrabold text-slate-800">PPLG</div>
                <div class="text-[10px] text-slate-400">Mobile &amp; Web Dev</div>
              </td>
              <td class="py-3.5 px-3 mitra-cell">
                <div class="font-extrabold text-slate-800">Telkom Corp Digital Lab</div>
                <div class="text-[10px] text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Batam Center</div>
              </td>
              <td class="py-3.5 px-3 font-bold text-slate-800">Dra. Sri Wahyuni, M.Pd</td>
            </tr>

            <tr class="siswa-row hover:bg-slate-50/70 align-top">
              <td class="py-3.5 pl-4 pr-2"><input type="checkbox" class="siswa-check w-3.5 h-3.5 rounded border-slate-300 mt-1"></td>
              <td class="py-3.5 px-3">
                <div class="font-extrabold text-slate-900">Fadhil Rahman</div>
                <div class="text-[10px] text-slate-400">NISN: 0065219034 &bull; XII TJKT 1</div>
              </td>
              <td class="py-3.5 px-3">
                <div class="font-extrabold text-slate-800">TJKT</div>
                <div class="text-[10px] text-slate-400">Fiber Optic &amp; Infra</div>
              </td>
              <td class="py-3.5 px-3 mitra-cell">
                <div class="font-extrabold text-slate-800">PT Citra Tubindo Tbk</div>
                <div class="text-[10px] text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i>Batu Ampar</div>
              </td>
              <td class="py-3.5 px-3 font-bold text-slate-800">Drs. Budi Haryono</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <div class="xl:col-span-4 space-y-5">
      <section class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3.5">
        <div>
          <h2 class="text-sm font-black text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-bolt text-sky-600"></i>
            <span>Jalur Cepat Hubin</span>
          </h2>
          <p class="text-[11px] text-slate-500 mt-0.5">Tindakan masal administratif otomatis.</p>
        </div>

        <button type="button" onclick="showToast('Broadcast WhatsApp SPT dijadwalkan untuk siswa terpilih.')" class="w-full p-3 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/80 flex items-center justify-between text-xs font-bold">
          <span>Broadcast WhatsApp SPT</span>
          <i class="fa-solid fa-arrow-right text-[10px] text-slate-400"></i>
        </button>
        <button type="button" onclick="exportSiswaRekap()" class="w-full p-3 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/80 flex items-center justify-between text-xs font-bold">
          <span>Ekspor Format Kemendikbud</span>
          <i class="fa-solid fa-arrow-right text-[10px] text-slate-400"></i>
        </button>
        <button type="button" onclick="showToast('Berkas rekap penempatan dikirim ke 64 mitra DUDI.')" class="w-full p-3 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/80 flex items-center justify-between text-xs font-bold">
          <span>Kirim Berkas ke DUDI</span>
          <i class="fa-solid fa-arrow-right text-[10px] text-slate-400"></i>
        </button>
      </section>
    </div>
  </div>

  <!-- Modal Plotting Masal & Pindah Mitra -->
  <div id="modalPlottingMasal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Plotting Siswa Masal</h3>
        <button type="button" onclick="closeModal('modalPlottingMasal')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handlePlottingMasal(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Nama Siswa</label>
          <input id="inputNamaSiswa" type="text" required placeholder="Contoh: Nabila Azzahra" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Jurusan &amp; Rombel</label>
          <input id="inputRombelSiswa" type="text" required value="PPLG • XII PPLG 1" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Mitra DUDI Tujuan</label>
          <input id="inputMitraSiswa" type="text" required value="PT Solusi Teknologi Nusantara (Nongsa Digital Park)" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modalPlottingMasal')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Terapkan Plotting</button>
        </div>
      </form>
    </div>
  </div>

  <div id="modalPindahMitra" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Pindah Mitra Kolektif</h3>
        <button type="button" onclick="closeModal('modalPindahMitra')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handlePindahMitra(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Mitra DUDI Baru</label>
          <input id="inputMitraBaruKolektif" type="text" required placeholder="Contoh: PT Batam Cloud Systems" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modalPindahMitra')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Pindahkan</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  function toggleAllSiswa(master) {
    document.querySelectorAll('.siswa-check').forEach(cb => cb.checked = master.checked);
  }

  function cetakSptTerpilih() {
    const count = document.querySelectorAll('.siswa-check:checked').length;
    if (count === 0) {
      showToast('Pilih minimal satu siswa terlebih dahulu.');
      return;
    }
    showToast(`SPT penempatan untuk ${count} siswa terpilih siap dicetak.`);
  }

  function filterSiswaTable() {
    const q = (document.getElementById('siswaSearchInput').value || '').toLowerCase();
    const jur = (document.getElementById('siswaJurusanSelect').value || '').toLowerCase();
    const wil = (document.getElementById('siswaWilayahSelect').value || '').toLowerCase();

    document.querySelectorAll('.siswa-row').forEach(row => {
      const text = row.innerText.toLowerCase();
      const match = (!q || text.includes(q)) && (!jur || text.includes(jur)) && (!wil || text.includes(wil));
      row.classList.toggle('hidden', !match);
    });
  }

  function resetSiswaFilter() {
    document.getElementById('siswaSearchInput').value = '';
    document.getElementById('siswaJurusanSelect').value = '';
    document.getElementById('siswaWilayahSelect').value = '';
    filterSiswaTable();
    showToast('Filter penempatan siswa direset.');
  }

  function exportSiswaRekap() {
    triggerDownload('rekap-penempatan-siswa.csv', "Nama Siswa,Kompetensi,Mitra DUDI\nRizky Pratama,PPLG,PT Solusi Teknologi Nusantara\nSiti Nurhaliza,PPLG,Telkom Corp Digital Lab\n", 'text/csv;charset=utf-8;');
    showToast('Rekap penempatan siswa berhasil diunduh.');
  }

  function handlePlottingMasal(e) {
    e.preventDefault();
    const nama = document.getElementById('inputNamaSiswa').value.trim();
    const rombel = document.getElementById('inputRombelSiswa').value.trim();
    const mitra = document.getElementById('inputMitraSiswa').value.trim();

    const tr = document.createElement('tr');
    tr.className = 'siswa-row hover:bg-slate-50/70 align-top bg-sky-50/40';
    tr.innerHTML = `
      <td class="py-3.5 pl-4 pr-2"><input type="checkbox" class="siswa-check w-3.5 h-3.5 rounded border-slate-300 mt-1"></td>
      <td class="py-3.5 px-3"><div class="font-extrabold text-slate-900">${nama}</div><div class="text-[10px] text-emerald-600 font-bold">Baru diplotting</div></td>
      <td class="py-3.5 px-3"><div class="font-extrabold text-slate-800">${rombel}</div></td>
      <td class="py-3.5 px-3 mitra-cell"><div class="font-extrabold text-slate-800">${mitra}</div></td>
      <td class="py-3.5 px-3 font-bold text-slate-800">Dra. Sri Wahyuni, M.Pd</td>
    `;
    document.getElementById('siswaTableBody').prepend(tr);

    e.target.reset();
    closeModal('modalPlottingMasal');
    showToast(`${nama} berhasil diplotting ke ${mitra}.`);
  }

  function handlePindahMitra(e) {
    e.preventDefault();
    const mitraBaru = document.getElementById('inputMitraBaruKolektif').value.trim();
    const checked = document.querySelectorAll('.siswa-check:checked');
    if (checked.length === 0) {
      showToast('Centang siswa yang ingin dipindahkan terlebih dahulu.');
      return;
    }
    checked.forEach(cb => {
      const cell = cb.closest('tr').querySelector('.mitra-cell');
      if (cell) cell.innerHTML = `<div class="font-extrabold text-slate-900">${mitraBaru}</div><div class="text-[10px] text-sky-700 font-bold">Dipindahkan</div>`;
    });
    e.target.reset();
    closeModal('modalPindahMitra');
    showToast(`${checked.length} siswa dipindahkan ke ${mitraBaru}.`);
  }
</script>
@endpush