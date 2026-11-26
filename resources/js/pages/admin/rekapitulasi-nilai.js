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

Object.assign(window, { filterNilaiTable, exportLedgerNilai, terbitkanSertifikatTerpilih });

