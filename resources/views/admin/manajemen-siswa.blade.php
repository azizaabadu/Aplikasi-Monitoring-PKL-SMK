@extends('layouts.admin')

@section('title', 'Kelola Periode & Penempatan Siswa PKL - Portal PKL.ID')

@section('content')
  <!-- 1. Breadcrumb & Masa Pengajuan (PRD T1) -->
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
        <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
        <span>Beranda</span>
      </a>
      <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Kelola Periode &amp; Penempatan</span>
    </div>

    <div class="flex flex-wrap items-center gap-2.5 text-[11px]">
      <span id="badgeMasaPengajuan" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
        <i class="fa-solid fa-lock-open text-[9px]"></i>
        <span>Masa Pengajuan Pilihan Mitra: DIBUKA</span>
      </span>
      <button type="button" onclick="toggleMasaPengajuan()" class="px-3 py-1 rounded-full bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-[10px] font-extrabold transition">
        Ubah Status Pengajuan
      </button>
    </div>
  </div>

  <!-- 2. Header & Tombol Aksi -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
    <div class="flex items-start gap-3.5 max-w-2xl">
      <span class="w-9 h-9 rounded-xl bg-slate-100 text-[#13294B] flex items-center justify-center text-sm shrink-0 mt-0.5">
        <i class="fa-solid fa-sitemap"></i>
      </span>
      <div>
        <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
          Kelola Periode &amp; Penempatan Siswa PKL
        </h1>
        <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">
          Atur masa pengajuan pilihan mitra siswa (maks. 3 pilihan), bagi penempatan siswa sesuai kuota jurusan, dan tetapkan guru pembimbing sebelum persetujuan akhir Kepala Sekolah.
        </p>
      </div>
    </div>

    <div class="flex flex-wrap items-center gap-2.5 shrink-0">
      <button type="button" onclick="runSaranOtomatis()" class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center gap-1.5 transition">
        <i class="fa-solid fa-wand-magic-sparkles text-sky-600 text-xs"></i>
        <span>Saran Pembagian Otomatis</span>
      </button>

      <button type="button" onclick="exportSiswaRekap()" class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center gap-1.5 transition">
        <i class="fa-solid fa-file-excel text-emerald-600 text-xs"></i>
        <span>Ekspor Penempatan</span>
      </button>

      <button type="button" onclick="openModal('modalPlottingMasal')" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center gap-1.5 shadow-xs transition">
        <i class="fa-solid fa-user-plus text-xs"></i>
        <span>Bagi Siswa ke Mitra</span>
      </button>
    </div>
  </div>

  <!-- 3. 4 KPI Status Penempatan (PRD 6.1) -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-2.5">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Belum Ditempatkan</span>
        <span class="w-9 h-9 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-sm"><i class="fa-solid fa-user-clock"></i></span>
      </div>
      <div class="text-3xl font-black text-rose-600">8</div>
      <div class="text-[11px] text-slate-500">Termasuk siswa ditolak DUDI</div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-2.5">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Menunggu Konfirmasi DUDI</span>
        <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-sm"><i class="fa-solid fa-building-circle-exclamation"></i></span>
      </div>
      <div class="text-3xl font-black text-amber-500">9</div>
      <div class="text-[11px] text-slate-500">Menunggu respon pembimbing DUDI</div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-2.5">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Menunggu Kepala Sekolah</span>
        <span class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm"><i class="fa-solid fa-file-signature"></i></span>
      </div>
      <div class="text-3xl font-black text-sky-700">5</div>
      <div class="text-[11px] text-slate-500">Sudah diterima DUDI, siap disahkan</div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-2.5">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-500">Disetujui &amp; Terkunci</span>
        <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm"><i class="fa-solid fa-lock"></i></span>
      </div>
      <div class="text-3xl font-black text-emerald-600">398</div>
      <div class="text-[11px] text-slate-500">Tampil ke siswa &amp; orang tua (T7)</div>
    </div>
  </div>

  <!-- 4. Filter -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-xs grid grid-cols-1 lg:grid-cols-12 gap-3">
    <div class="lg:col-span-5 relative">
      <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
      <input id="siswaSearchInput" oninput="filterSiswaTable()" type="text" placeholder="Cari nama siswa, NIS, atau mitra DUDI..." class="w-full pl-9 pr-4 py-2 bg-slate-50 focus:bg-white border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-sky-500">
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
      <select id="siswaStatusSelect" onchange="filterSiswaTable()" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-700">
        <option value="">Semua Status</option>
        <option value="Belum ditempatkan">Belum ditempatkan</option>
        <option value="Menunggu DUDI">Menunggu DUDI</option>
        <option value="Menunggu kepala sekolah">Menunggu kepala sekolah</option>
        <option value="Disetujui dan terkunci">Disetujui dan terkunci</option>
      </select>
    </div>
    <div class="lg:col-span-2">
      <button type="button" onclick="resetSiswaFilter()" class="w-full px-3 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-600 flex items-center justify-center gap-1.5">
        <i class="fa-solid fa-rotate-left text-[10px]"></i>
        <span>Reset</span>
      </button>
    </div>
  </div>

  <!-- 5. Tabel Penempatan -->
  <section class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
    <div class="px-4 py-3 border-b border-slate-100 flex flex-wrap items-center justify-between gap-3">
      <label class="inline-flex items-center gap-2.5 text-xs font-bold text-slate-700 cursor-pointer">
        <input id="selectAllSiswa" onchange="toggleAllSiswa(this)" type="checkbox" class="w-4 h-4 rounded border-slate-300 text-[#13294B]">
        <span>Pilih Semua Siswa</span>
      </label>

      <div class="flex flex-wrap items-center gap-2">
        <button type="button" onclick="openModal('modalTetapkanGuru')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-bold text-slate-700 flex items-center gap-1.5">
          <i class="fa-solid fa-chalkboard-user text-sky-600 text-[10px]"></i>
          <span>Tetapkan Guru Pembimbing</span>
        </button>
        <button type="button" onclick="openModal('modalPindahMitra')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-slate-50 border border-slate-200 text-[11px] font-bold text-slate-700 flex items-center gap-1.5">
          <i class="fa-solid fa-right-left text-amber-600 text-[10px]"></i>
          <span>Ubah / Pindah Mitra</span>
        </button>
      </div>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse text-xs">
        <thead>
          <tr class="bg-slate-50/90 border-b border-slate-200/80 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
            <th class="py-3 pl-4 pr-2 w-8">#</th>
            <th class="py-3 px-3">SISWA &amp; JURUSAN</th>
            <th class="py-3 px-3">PILIHAN MITRA SISWA (T2)</th>
            <th class="py-3 px-3">MITRA PENEMPATAN</th>
            <th class="py-3 px-3">GURU PEMBIMBING</th>
            <th class="py-3 px-3">STATUS PENEMPATAN</th>
          </tr>
        </thead>
        <tbody id="siswaTableBody" class="divide-y divide-slate-100">
          <tr class="siswa-row hover:bg-slate-50/70 align-top" data-locked="true">
            <td class="py-3.5 pl-4 pr-2"><input type="checkbox" class="siswa-check w-3.5 h-3.5 rounded border-slate-300 mt-1"></td>
            <td class="py-3.5 px-3">
              <div class="font-extrabold text-slate-900">Rizky Pratama</div>
              <div class="text-[10px] text-slate-400">NIS: 20241001 &bull; XII PPLG 1</div>
            </td>
            <td class="py-3.5 px-3 text-[11px] text-slate-600">
              <div>1. PT Solusi Teknologi Nusantara</div>
              <div class="text-[10px] text-slate-400">2. PT Cyber Media Utama</div>
            </td>
            <td class="py-3.5 px-3 mitra-cell">
              <div class="font-extrabold text-slate-800">PT Solusi Teknologi Nusantara</div>
              <div class="text-[10px] text-slate-400">DUDI: Ahmad Fauzi, S.Kom</div>
            </td>
            <td class="py-3.5 px-3 guru-cell font-bold text-slate-800">Dra. Sri Wahyuni, M.Pd</td>
            <td class="py-3.5 px-3">
              <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold">
                <i class="fa-solid fa-lock text-[9px]"></i> Disetujui dan terkunci
              </span>
            </td>
          </tr>

          <tr class="siswa-row hover:bg-slate-50/70 align-top" data-locked="false">
            <td class="py-3.5 pl-4 pr-2"><input type="checkbox" class="siswa-check w-3.5 h-3.5 rounded border-slate-300 mt-1"></td>
            <td class="py-3.5 px-3">
              <div class="font-extrabold text-slate-900">Siti Nurhaliza</div>
              <div class="text-[10px] text-slate-400">NIS: 20241002 &bull; XII PPLG 2</div>
            </td>
            <td class="py-3.5 px-3 text-[11px] text-slate-600">
              <div>1. PT Cyber Media Utama</div>
              <div class="text-[10px] text-slate-400">2. PT Solusi Teknologi Nusantara</div>
            </td>
            <td class="py-3.5 px-3 mitra-cell">
              <div class="font-extrabold text-slate-800">PT Cyber Media Utama</div>
              <div class="text-[10px] text-slate-400">DUDI: Rian Kusuma, S.Ds.</div>
            </td>
            <td class="py-3.5 px-3 guru-cell font-bold text-slate-800">Dra. Sri Wahyuni, M.Pd</td>
            <td class="py-3.5 px-3">
              <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 text-[10px] font-extrabold">
                <i class="fa-solid fa-file-signature text-[9px]"></i> Menunggu kepala sekolah
              </span>
            </td>
          </tr>

          <tr class="siswa-row bg-rose-50/30 hover:bg-rose-50/60 align-top" data-locked="false">
            <td class="py-3.5 pl-4 pr-2"><input type="checkbox" class="siswa-check w-3.5 h-3.5 rounded border-slate-300 mt-1"></td>
            <td class="py-3.5 px-3">
              <div class="font-extrabold text-slate-900">Fadhil Rahman</div>
              <div class="text-[10px] text-slate-400">NIS: 20241045 &bull; XII TJKT 1</div>
            </td>
            <td class="py-3.5 px-3 text-[11px] text-slate-600">
              <div>1. PT Citra Tubindo Tbk</div>
            </td>
            <td class="py-3.5 px-3 mitra-cell">
              <div class="font-bold text-rose-600">Belum ada mitra</div>
              <div class="text-[10px] text-rose-500">Alasan tolak DUDI: Kuota shift malam penuh</div>
            </td>
            <td class="py-3.5 px-3 guru-cell font-bold text-slate-800">Drs. Budi Haryono</td>
            <td class="py-3.5 px-3">
              <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-rose-50 border border-rose-200 text-rose-700 text-[10px] font-extrabold">
                <i class="fa-solid fa-user-clock text-[9px]"></i> Belum ditempatkan
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Modal Bagi Siswa ke Mitra (PRD T3) -->
  <div id="modalPlottingMasal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Bagi Siswa ke Mitra DUDI</h3>
        <button type="button" onclick="closeModal('modalPlottingMasal')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handlePlottingMasal(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Pilih Siswa (Belum Ditempatkan)</label>
          <input id="inputNamaSiswa" type="text" required value="Fadhil Rahman (XII TJKT 1)" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Mitra DUDI Tujuan (Sisa Kuota Ditampilkan)</label>
          <select id="inputMitraSiswa" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
            <option value="PT Solusi Teknologi Nusantara">PT Solusi Teknologi Nusantara (Sisa Kuota PPLG: 2)</option>
            <option value="PT Cyber Media Utama">PT Cyber Media Utama (Sisa Kuota PPLG: 2)</option>
            <option value="PT Batamindo Investment">PT Batamindo Investment (Sisa Kuota TJKT: 4)</option>
          </select>
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Guru Pembimbing</label>
          <select id="inputGuruSiswa" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
            <option>Dra. Sri Wahyuni, M.Pd (28/30 Siswa)</option>
            <option>Drs. Budi Haryono (21/30 Siswa)</option>
          </select>
        </div>
        <div class="flex justify-end gap-2 pt-2">
          <button type="button" onclick="closeModal('modalPlottingMasal')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Kirim ke DUDI</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Pindah Mitra (PRD T6: Wajib Alasan Jika Sudah Disetujui/Terkunci) -->
  <div id="modalPindahMitra" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Ubah / Pindah Mitra Penempatan</h3>
        <button type="button" onclick="closeModal('modalPindahMitra')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handlePindahMitra(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Mitra DUDI Baru</label>
          <input id="inputMitraBaruKolektif" type="text" required placeholder="Contoh: PT Batam Cloud Systems" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Alasan Perubahan (Wajib Tercatat di Log Audit)</label>
          <textarea id="inputAlasanPindah" rows="2" required placeholder="Contoh: Penyesuaian jarak domisili siswa atau perubahan operasional mitra..." class="w-full px-3 py-2 border border-slate-200 rounded-xl"></textarea>
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modalPindahMitra')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Tetapkan Guru Pembimbing (PRD T4) -->
  <div id="modalTetapkanGuru" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Tetapkan Guru Pembimbing</h3>
        <button type="button" onclick="closeModal('modalTetapkanGuru')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handleTetapkanGuru(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Pilih Guru Pembimbing (Batas Maks. 30 Siswa)</label>
          <select id="selectGuruPembimbingBaru" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
            <option value="Dra. Sri Wahyuni, M.Pd">Dra. Sri Wahyuni, M.Pd (28/30 Siswa)</option>
            <option value="Hendra Saputra, S.T., M.Kom">Hendra Saputra, S.T., M.Kom (22/30 Siswa)</option>
            <option value="Drs. Budi Haryono">Drs. Budi Haryono (21/30 Siswa)</option>
          </select>
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modalTetapkanGuru')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Terapkan</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  let masaPengajuanBuka = true;

  function toggleMasaPengajuan() {
    masaPengajuanBuka = !masaPengajuanBuka;
    const badge = document.getElementById('badgeMasaPengajuan');
    if (masaPengajuanBuka) {
      badge.className = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold';
      badge.innerHTML = '<i class="fa-solid fa-lock-open text-[9px]"></i><span>Masa Pengajuan Pilihan Mitra: DIBUKA</span>';
      showToast('Masa pengajuan pilihan mitra oleh siswa DIBUKA.');
    } else {
      badge.className = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-50 border border-rose-200 text-rose-700 text-[10px] font-extrabold';
      badge.innerHTML = '<i class="fa-solid fa-lock text-[9px]"></i><span>Masa Pengajuan Pilihan Mitra: DITUTUP</span>';
      showToast('Masa pengajuan ditutup. Siswa tidak dapat mengubah pilihan.');
    }
  }

  function runSaranOtomatis() {
    showToast('Saran pembagian otomatis untuk 8 siswa belum ditempatkan telah disiapkan berdasarkan pilihan & sisa kuota.');
  }

  function toggleAllSiswa(master) {
    document.querySelectorAll('.siswa-check').forEach(cb => cb.checked = master.checked);
  }

  function filterSiswaTable() {
    const q = (document.getElementById('siswaSearchInput').value || '').toLowerCase();
    const jur = (document.getElementById('siswaJurusanSelect').value || '').toLowerCase();
    const stat = (document.getElementById('siswaStatusSelect').value || '').toLowerCase();

    document.querySelectorAll('.siswa-row').forEach(row => {
      const text = row.innerText.toLowerCase();
      const match = (!q || text.includes(q)) && (!jur || text.includes(jur)) && (!stat || text.includes(stat));
      row.classList.toggle('hidden', !match);
    });
  }

  function resetSiswaFilter() {
    document.getElementById('siswaSearchInput').value = '';
    document.getElementById('siswaJurusanSelect').value = '';
    document.getElementById('siswaStatusSelect').value = '';
    filterSiswaTable();
    showToast('Filter penempatan siswa direset.');
  }

  function exportSiswaRekap() {
    triggerDownload('rekap-penempatan-pkl.csv', "Nama Siswa,Jurusan,Mitra Penempatan,Status\nRizky Pratama,PPLG,PT Solusi Teknologi Nusantara,Disetujui dan terkunci\nSiti Nurhaliza,PPLG,PT Cyber Media Utama,Menunggu kepala sekolah\n", 'text/csv;charset=utf-8;');
    showToast('Data penempatan PKL berhasil diekspor.');
  }

  function handlePlottingMasal(e) {
    e.preventDefault();
    const nama = document.getElementById('inputNamaSiswa').value.trim();
    const mitra = document.getElementById('inputMitraSiswa').value;
    closeModal('modalPlottingMasal');
    showToast(`${nama} dialokasikan ke ${mitra} (Status: Menunggu DUDI).`);
  }

  function handlePindahMitra(e) {
    e.preventDefault();
    const mitraBaru = document.getElementById('inputMitraBaruKolektif').value.trim();
    const alasan = document.getElementById('inputAlasanPindah').value.trim();
    const checked = document.querySelectorAll('.siswa-check:checked');
    if (checked.length === 0) {
      showToast('Centang siswa yang ingin diubah mitranya terlebih dahulu.');
      return;
    }
    checked.forEach(cb => {
      const cell = cb.closest('tr').querySelector('.mitra-cell');
      if (cell) cell.innerHTML = `<div class="font-extrabold text-slate-900">${mitraBaru}</div><div class="text-[10px] text-amber-700 font-bold">Diubah (Alasan tercatat di Log Audit)</div>`;
    });
    e.target.reset();
    closeModal('modalPindahMitra');
    showToast(`${checked.length} siswa dipindahkan ke ${mitraBaru}. Alasan "${alasan}" dicatat ke Log Audit.`);
  }

  function handleTetapkanGuru(e) {
    e.preventDefault();
    const guru = document.getElementById('selectGuruPembimbingBaru').value;
    const checked = document.querySelectorAll('.siswa-check:checked');
    if (checked.length === 0) {
      showToast('Pilih minimal satu siswa terlebih dahulu.');
      return;
    }
    checked.forEach(cb => {
      const cell = cb.closest('tr').querySelector('.guru-cell');
      if (cell) cell.textContent = guru;
    });
    closeModal('modalTetapkanGuru');
    showToast(`Guru pembimbing ${guru} ditetapkan untuk ${checked.length} siswa.`);
  }
</script>
@endpush