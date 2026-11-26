@extends('layouts.admin')

@section('title', 'Monitoring Guru Pembimbing & Kunjungan - Portal PKL.ID')

@section('content')
  <!-- 1. Breadcrumb & Status -->
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
      <a href="{{ route('admin.dashboard') }}" class="hover:text-slate-800 flex items-center gap-1">
        <i class="fa-solid fa-house text-[10px] text-slate-400"></i>
        <span>Beranda</span>
      </a>
      <i class="fa-solid fa-chevron-right text-[9px] text-slate-400"></i>
      <span class="font-bold text-slate-800">Monitoring Guru Pembimbing</span>
    </div>

    <div class="flex flex-wrap items-center gap-2">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold tracking-wide">
        <i class="fa-solid fa-circle text-[7px] text-emerald-500"></i>
        BATAS MAKSIMAL BIMBINGAN: 30 SISWA / GURU
      </span>
    </div>
  </div>

  <!-- 2. Hero Header & Tombol Aksi -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
    <div class="space-y-2 max-w-2xl">
      <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-sky-50 border border-sky-200/80 text-sky-700 text-[10px] font-extrabold uppercase tracking-wider">
        <i class="fa-solid fa-chalkboard-user text-[10px]"></i>
        PEMANTAUAN PEMBIMBINGAN &amp; KUNJUNGAN
      </span>

      <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-snug">
        Monitoring Guru Pembimbing, Kunjungan &amp; Umpan Balik
      </h1>

      <p class="text-xs text-slate-500 leading-relaxed">
        Pantau beban bimbingan guru (maks_siswa), catatan hasil kunjungan monitoring lapangan, pemantauan logbook siswa, serta tindak lanjut laporan pelanggaran dari pembimbing DUDI.
      </p>
    </div>

    <div class="flex flex-col sm:flex-row lg:flex-col items-stretch gap-2 shrink-0 min-w-[215px]">
      <button type="button" onclick="openModal('modalBatasGuru')" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
        <i class="fa-solid fa-sliders text-sky-600"></i>
        <span>Atur Batas Siswa per Guru</span>
      </button>

      <button type="button" onclick="downloadRekapMonev()" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-700 flex items-center justify-center gap-2 transition">
        <i class="fa-solid fa-file-arrow-down text-slate-500"></i>
        <span>Unduh Rekap Kunjungan</span>
      </button>

      <button type="button" onclick="openModal('modalTambahGuru')" class="px-4 py-2.5 bg-[#13294B] hover:bg-[#1E3F73] text-white rounded-xl text-[11px] font-extrabold flex items-center justify-center gap-2 shadow-xs transition">
        <i class="fa-solid fa-user-plus text-xs"></i>
        <span>Tambah Profil Guru Pembimbing</span>
      </button>
    </div>
  </div>

  <!-- 3. 4 Kartu Metrik Utama -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-2.5">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-600">Guru Pembimbing Aktif</span>
        <span class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-sm">
          <i class="fa-solid fa-chalkboard-user"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-2">
        <span id="kpiTotalGuru" class="text-3xl font-black text-slate-900">18</span>
        <span class="text-xs font-semibold text-slate-400">Guru</span>
      </div>
      <div class="text-[10px] text-slate-500">Rata-rata bimbingan: <strong class="text-slate-800">22.1 siswa</strong></div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-2.5">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-600">Catatan Kunjungan Monitoring</span>
        <span class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-sm">
          <i class="fa-solid fa-route"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-1.5">
        <span class="text-3xl font-black text-slate-900">92</span>
        <span class="text-xs font-semibold text-slate-400">Laporan Kunjungan</span>
      </div>
      <div class="text-[10px] text-teal-700 font-bold">Termasuk catatan internal sekolah</div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-2.5">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-600">Logbook Belum Diisi (&ge; 2 Hari)</span>
        <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-sm">
          <i class="fa-solid fa-book-open"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-amber-600">4</span>
        <span class="text-xs font-bold text-slate-500">Siswa Terdeteksi</span>
      </div>
      <div class="text-[10px] text-slate-500">Otomatis masuk daftar perlu perhatian</div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-2.5">
      <div class="flex items-start justify-between gap-2">
        <span class="text-[11px] font-bold text-slate-600">Tindak Lanjut Umpan Balik</span>
        <span class="w-9 h-9 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-sm">
          <i class="fa-solid fa-comments"></i>
        </span>
      </div>
      <div class="flex items-baseline gap-2">
        <span class="text-3xl font-black text-slate-900">3</span>
        <span class="text-xs font-bold text-rose-600">Status: Baru</span>
      </div>
      <div class="text-[10px] text-slate-500">Sedang ditindaklanjuti: <strong>4</strong> &bull; Selesai: <strong>19</strong></div>
    </div>
  </div>

  <!-- 4. Filter & Pencarian Guru -->
  <div class="bg-white rounded-2xl border border-slate-200/90 p-3.5 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-3">
    <div class="relative flex-1">
      <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
      <input
        id="guruSearchInput"
        oninput="filterGuruTable()"
        type="text"
        placeholder="Cari nama guru pembimbing atau NIP..."
        class="w-full pl-9 pr-4 py-2 bg-slate-50 focus:bg-white border border-slate-200 rounded-xl text-xs text-slate-700 placeholder:text-slate-400 focus:outline-none focus:border-sky-500 transition"
      >
    </div>

    <div class="flex flex-wrap items-center gap-2 text-[11px]">
      <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 mr-1">JURUSAN:</span>
      <button type="button" onclick="selectGuruJurusan(this, '')" class="jurusan-btn px-3 py-1.5 rounded-lg bg-[#13294B] text-white font-bold">Semua</button>
      <button type="button" onclick="selectGuruJurusan(this, 'PPLG')" class="jurusan-btn px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition">PPLG</button>
      <button type="button" onclick="selectGuruJurusan(this, 'TJKT')" class="jurusan-btn px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition">TJKT</button>
      <button type="button" onclick="selectGuruJurusan(this, 'DKV')" class="jurusan-btn px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition">DKV</button>
      <button type="button" onclick="selectGuruJurusan(this, 'Animasi')" class="jurusan-btn px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition">Animasi</button>
    </div>
  </div>

  <!-- 5. Tabel Beban Bimbingan Guru -->
  <section class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
    <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
      <div class="flex items-start gap-3">
        <span class="w-8 h-8 rounded-lg bg-sky-50 text-sky-700 flex items-center justify-center text-sm shrink-0 mt-0.5">
          <i class="fa-solid fa-clipboard-list"></i>
        </span>
        <div>
          <h2 class="text-sm font-black text-slate-900">Daftar Guru Pembimbing &amp; Kuota Bimbingan</h2>
          <p class="text-[11px] text-slate-500 mt-0.5">Monitoring kepatuhan logbook, catatan kunjungan, dan umpan balik siswa bimbingan</p>
        </div>
      </div>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse text-xs">
        <thead>
          <tr class="bg-slate-50/90 border-b border-slate-200/80 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
            <th class="py-3 px-4">NAMA GURU &amp; NIP</th>
            <th class="py-3 px-3">JURUSAN</th>
            <th class="py-3 px-3">SISWA BIMBINGAN</th>
            <th class="py-3 px-3">KUNJUNGAN TERCATAT</th>
            <th class="py-3 px-3">PERLU PERHATIAN</th>
            <th class="py-3 px-3">UMPAN BALIK BARU</th>
            <th class="py-3 px-4 text-right">AKSI</th>
          </tr>
        </thead>
        <tbody id="guruTableBody" class="divide-y divide-slate-100">
          <tr class="guru-row hover:bg-slate-50/70 align-middle">
            <td class="py-4 px-4">
              <div class="font-extrabold text-slate-900">Dra. Sri Wahyuni, M.Pd</div>
              <div class="text-[10px] text-slate-400 mt-0.5">NIP. 19780412 200501 2 004</div>
            </td>
            <td class="py-4 px-3">
              <span class="inline-block px-2 py-0.5 rounded bg-sky-100 text-sky-800 text-[10px] font-extrabold">PPLG</span>
            </td>
            <td class="py-4 px-3 font-black text-slate-900">28 / 30 <span class="text-[11px] font-semibold text-slate-500">Siswa</span></td>
            <td class="py-4 px-3 font-extrabold text-emerald-600">12 Kunjungan</td>
            <td class="py-4 px-3">
              <span class="px-2 py-0.5 rounded-full bg-amber-50 border border-amber-200 text-amber-800 text-[10px] font-extrabold">2 Siswa</span>
            </td>
            <td class="py-4 px-3">
              <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[10px] font-bold">0 Baru</span>
            </td>
            <td class="py-4 px-4 text-right">
              <button type="button" onclick="openInfoModal('Detail Bimbingan Guru', 'Dra. Sri Wahyuni, M.Pd membimbing 28 siswa PPLG. Siswa perlu perhatian: Nadia Putri (logbook >2 hari) & Dimas Setiawan (check-in ada kendala).')" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-[10px] font-bold text-slate-700">Detail Bimbingan</button>
            </td>
          </tr>

          <tr class="guru-row hover:bg-slate-50/70 align-middle">
            <td class="py-4 px-4">
              <div class="font-extrabold text-slate-900">Drs. Budi Haryono</div>
              <div class="text-[10px] text-slate-400 mt-0.5">NIP. 19750319 200212 1 003</div>
            </td>
            <td class="py-4 px-3">
              <span class="inline-block px-2 py-0.5 rounded bg-teal-100 text-teal-800 text-[10px] font-extrabold">TJKT</span>
            </td>
            <td class="py-4 px-3 font-black text-slate-900">21 / 30 <span class="text-[11px] font-semibold text-slate-500">Siswa</span></td>
            <td class="py-4 px-3 font-extrabold text-emerald-600">9 Kunjungan</td>
            <td class="py-4 px-3">
              <span class="px-2 py-0.5 rounded-full bg-rose-50 border border-rose-200 text-rose-700 text-[10px] font-extrabold">1 Pelanggaran Berat</span>
            </td>
            <td class="py-4 px-3">
              <span class="px-2 py-0.5 rounded-full bg-rose-600 text-white text-[10px] font-extrabold">1 Baru</span>
            </td>
            <td class="py-4 px-4 text-right">
              <button type="button" onclick="openInfoModal('Detail Bimbingan Guru', 'Drs. Budi Haryono membimbing 21 siswa TJKT. Terdapat 1 laporan pelanggaran tingkat berat untuk Bagas Saputra yang menunggu tindak lanjut.')" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-[10px] font-bold text-slate-700">Detail Bimbingan</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- 6. Catatan Kunjungan Terbaru & Umpan Balik DUDI -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
    <section class="lg:col-span-6 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3.5">
      <div class="flex items-center justify-between">
        <h2 class="text-sm font-black text-slate-900">Catatan Kunjungan Monitoring Terbaru (K3 &amp; K5)</h2>
        <span class="text-[10px] font-bold text-slate-400">Terlihat oleh Sekolah</span>
      </div>

      <div class="space-y-2.5 text-xs">
        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1">
          <div class="flex items-center justify-between">
            <span class="font-extrabold text-slate-900">PT Solusi Teknologi Nusantara</span>
            <span class="px-2 py-0.5 rounded bg-slate-200 text-slate-700 text-[9px] font-extrabold"><i class="fa-solid fa-eye-slash mr-1"></i>Catatan Internal</span>
          </div>
          <div class="text-[11px] text-slate-600">Kondisi Siswa: Baik &bull; Kondisi Tempat Kerja: Kondusif</div>
          <div class="text-[10px] text-slate-400">Oleh: Dra. Sri Wahyuni, M.Pd &bull; Tindak Lanjut: Penyesuaian jam kerja shift siang</div>
        </div>
      </div>
    </section>

    <section class="lg:col-span-6 bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs space-y-3.5">
      <div class="flex items-center justify-between">
        <h2 class="text-sm font-black text-slate-900">Umpan Balik &amp; Masukan dari Mitra DUDI (U1–U4)</h2>
        <span class="text-[10px] font-bold text-sky-700">4 Jenis Umpan Balik</span>
      </div>

      <div class="space-y-2.5 text-xs">
        <div class="p-3 rounded-xl bg-rose-50/60 border border-rose-200 space-y-1">
          <div class="flex items-center justify-between">
            <span class="font-extrabold text-rose-800"><i class="fa-solid fa-circle-exclamation mr-1"></i>Pelanggaran (Berat) &mdash; Bagas Saputra</span>
            <span class="px-2 py-0.5 rounded bg-rose-600 text-white text-[9px] font-extrabold">BARU</span>
          </div>
          <p class="text-[11px] text-slate-700">Tidak masuk kerja tanpa keterangan selama 2 hari berturut-turut.</p>
        </div>

        <div class="p-3 rounded-xl bg-sky-50/60 border border-sky-200 space-y-1">
          <div class="flex items-center justify-between">
            <span class="font-extrabold text-sky-900"><i class="fa-solid fa-lightbulb mr-1"></i>Masukan untuk Sekolah &mdash; PT Cyber Media Utama</span>
            <span class="px-2 py-0.5 rounded bg-sky-100 text-sky-800 text-[9px] font-extrabold">SUDAH DIBACA</span>
          </div>
          <p class="text-[11px] text-slate-700">Disarankan materi version control Git &amp; dasar REST API diperkuat sebelum keberangkatan PKL tahun depan.</p>
        </div>
      </div>
    </section>
  </div>

  <!-- Modal Tambah Profil Guru Pembimbing -->
  <div id="modalTambahGuru" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-md w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Tambah Profil Guru Pembimbing</h3>
        <button type="button" onclick="closeModal('modalTambahGuru')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <form onsubmit="handleTambahGuru(event)" class="space-y-3 text-xs">
        <div>
          <label class="block font-bold text-slate-700 mb-1">Nama Guru &amp; Gelar</label>
          <input id="inputNamaGuru" type="text" required placeholder="Contoh: Rina Marlina, S.Kom" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-bold text-slate-700 mb-1">NIP</label>
            <input id="inputNipGuru" type="text" required placeholder="19900101 201903 2 005" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
          </div>
          <div>
            <label class="block font-bold text-slate-700 mb-1">Maksimal Siswa</label>
            <input id="inputMaksSiswa" type="number" min="1" value="30" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
          </div>
        </div>
        <div class="flex justify-end gap-2 pt-2">
          <button type="button" onclick="closeModal('modalTambahGuru')" class="px-3.5 py-2 rounded-xl border border-slate-200 font-bold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Batas Siswa per Guru -->
  <div id="modalBatasGuru" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
    <div class="bg-white rounded-2xl border border-slate-200 max-w-sm w-full p-5 shadow-xl space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-slate-900">Atur Batas Siswa per Guru (T4)</h3>
        <button type="button" onclick="closeModal('modalBatasGuru')" class="text-slate-400 hover:text-slate-700"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="space-y-2 text-xs">
        <label class="block font-bold text-slate-700">Maksimal Siswa Bimbingan per Guru</label>
        <input type="number" min="1" value="30" class="w-full px-3 py-2 border border-slate-200 rounded-xl font-bold">
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeModal('modalBatasGuru')" class="px-3.5 py-2 rounded-xl border border-slate-200 text-xs font-bold">Batal</button>
        <button type="button" onclick="closeModal('modalBatasGuru'); showToast('Batas maksimal siswa per guru diperbarui.')" class="px-4 py-2 rounded-xl bg-[#13294B] text-white text-xs font-extrabold">Simpan</button>
      </div>
    </div>
  </div>
@endsection
