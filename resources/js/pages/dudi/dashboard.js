function handleRevisiLogbook(e) {
    e.preventDefault();
    e.target.reset();
    closeModal('modalRevisiLogbook');
    showToast('Catatan revisi logbook berhasil dikirim ke siswa.');
  }

Object.assign(window, { handleRevisiLogbook });

