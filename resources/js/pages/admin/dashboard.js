function syncDashboardData() {
    showToast('Angka statistik dashboard sekolah berhasil dihitung ulang.');
  }

  function exportDashboardReport() {
    triggerDownload('ringkasan-dashboard-pkl.csv', "Metrik,Nilai\nPenempatan Disetujui,398 / 420 Siswa\nKuota Mitra Terisi,398 / 445 Kursi\nKehadiran Hari Ini,95.2%\nKepatuhan Logbook,91.4%\nSiswa Perlu Perhatian,7\n", 'text/csv;charset=utf-8;');
    showToast('Ringkasan PKL berhasil diunduh.');
  }

  function handleKirimNotifikasi(e) {
    e.preventDefault();
    e.target.reset();
    closeModal('modalNotifikasiSekolah');
    showToast('Pemberitahuan berhasil dikirim ke penerima terpilih.');
  }

Object.assign(window, { syncDashboardData, exportDashboardReport, handleKirimNotifikasi });

