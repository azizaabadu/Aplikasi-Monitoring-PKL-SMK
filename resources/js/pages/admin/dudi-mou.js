function exportDudiRekap() {
    triggerDownload('data-mitra-kuota-pkl.csv', "Nama Mitra,Bidang Usaha,Status,Kuota Terisi\nPT Solusi Teknologi Nusantara,Software & Cloud,Aktif,14/16\nPT Cyber Media Utama,Creative Agency,Aktif,9/12\n", 'text/csv;charset=utf-8;');
    showToast('Data mitra & kuota berhasil diekspor.');
  }

  function applyDudiFilter() {
    const q = (document.getElementById('dudiSearchInput').value || '').toLowerCase();
    const jurusan = (document.getElementById('dudiJurusanSelect').value || '').toLowerCase();
    const status = (document.getElementById('dudiStatusSelect').value || '').toLowerCase();

    document.querySelectorAll('.dudi-card').forEach(card => {
      const text = card.innerText.toLowerCase();
      const match = (!q || text.includes(q)) && (!jurusan || text.includes(jurusan)) && (!status || text.includes(status));
      card.classList.toggle('hidden', !match);
    });
  }

  function resetDudiFilter() {
    document.getElementById('dudiSearchInput').value = '';
    document.getElementById('dudiJurusanSelect').value = '';
    document.getElementById('dudiStatusSelect').value = '';
    applyDudiFilter();
    showToast('Filter mitra DUDI direset.');
  }

  function toggleStatusMitra(btn, namaMitra) {
    const card = btn.closest('.dudi-card');
    const badge = card.querySelector('.status-mitra-badge');
    const isCurrentlyActive = badge.textContent.includes('Aktif');

    if (isCurrentlyActive) {
      badge.className = 'status-mitra-badge inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-slate-100 border border-slate-300 text-slate-600 text-[10px] font-extrabold';
      badge.innerHTML = '<i class="fa-solid fa-box-archive text-[9px]"></i> Nonaktif (Arsip)';
      btn.className = 'px-3 py-1.5 rounded-lg bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 text-emerald-700 text-[11px] font-bold flex items-center gap-1.5';
      btn.innerHTML = '<i class="fa-solid fa-rotate-left"></i><span>Aktifkan Kembali</span>';
      showToast(`${namaMitra} dinonaktifkan (riwayat tetap tersimpan).`);
    } else {
      badge.className = 'status-mitra-badge inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold';
      badge.innerHTML = '<i class="fa-solid fa-circle text-[7px] text-emerald-500"></i> Aktif';
      btn.className = 'px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 border border-rose-200 text-rose-700 text-[11px] font-bold flex items-center gap-1.5';
      btn.innerHTML = '<i class="fa-solid fa-box-archive"></i><span>Nonaktifkan</span>';
      showToast(`${namaMitra} kembali aktif untuk penempatan.`);
    }
  }

  function handleTambahMitra(e) {
    e.preventDefault();
    const nama = document.getElementById('inputNamaPerusahaan').value.trim();
    const bidang = document.getElementById('inputBidangUsaha').value.trim();
    const alamat = document.getElementById('inputAlamatMitra').value.trim();
    const kuota = document.getElementById('inputKuotaMitra').value.trim();

    const list = document.getElementById('dudiCardsList');
    const article = document.createElement('article');
    article.className = 'dudi-card bg-white rounded-2xl border border-sky-200 p-5 shadow-xs space-y-3';
    article.innerHTML = `
      <div class="flex flex-wrap items-center justify-between gap-2">
        <div>
          <h3 class="dudi-name text-base font-black text-slate-900"></h3>
          <p class="dudi-field text-xs text-slate-600"></p>
          <p class="dudi-address text-[11px] text-slate-400"><i class="fa-solid fa-location-dot mr-1"></i></p>
        </div>
        <div class="text-right space-y-1">
          <span class="status-mitra-badge inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[10px] font-extrabold"><i class="fa-solid fa-circle text-[7px] text-emerald-500"></i> Aktif</span>
          <div class="dudi-quota text-[10px] font-bold text-sky-700"></div>
        </div>
      </div>
    `;
    article.querySelector('.dudi-name').textContent = nama;
    article.querySelector('.dudi-field').textContent = `Bidang Usaha: ${bidang}`;
    article.querySelector('.dudi-address').append(document.createTextNode(alamat));
    article.querySelector('.dudi-quota').textContent = `Kuota: ${kuota}`;
    list.prepend(article);

    const kpi = document.getElementById('kpiTotalMitra');
    kpi.textContent = String(parseInt(kpi.textContent || '64', 10) + 1);

    e.target.reset();
    closeModal('modalTambahMitra');
    showToast(`Mitra ${nama} berhasil ditambahkan.`);
  }

  function handleTambahPembimbingDudi(e) {
    e.preventDefault();
    e.target.reset();
    closeModal('modalTambahPembimbingDudi');
    showToast('Akun Pembimbing Lapangan DUDI berhasil dibuat.');
  }

Object.assign(window, { exportDudiRekap, applyDudiFilter, resetDudiFilter, toggleStatusMitra, handleTambahMitra, handleTambahPembimbingDudi });

