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
      if (cell) {
        const companyName = document.createElement('div');
        companyName.className = 'font-extrabold text-slate-900';
        companyName.textContent = mitraBaru;

        const auditNote = document.createElement('div');
        auditNote.className = 'text-[10px] text-amber-700 font-bold';
        auditNote.textContent = 'Diubah (Alasan tercatat di Log Audit)';

        cell.replaceChildren(companyName, auditNote);
      }
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

Object.assign(window, { toggleMasaPengajuan, runSaranOtomatis, toggleAllSiswa, filterSiswaTable, resetSiswaFilter, exportSiswaRekap, handlePlottingMasal, handlePindahMitra, handleTetapkanGuru });

