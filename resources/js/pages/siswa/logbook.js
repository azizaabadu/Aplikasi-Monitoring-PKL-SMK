function openCreateModal() {
    document.getElementById('createModal').classList.remove('hidden');
  }

  function closeCreateModal() {
    document.getElementById('createModal').classList.add('hidden');
  }

  function openEditModal(logbook) {
    const editForm = document.getElementById('editForm');
    editForm.action = `${window.location.pathname}/${encodeURIComponent(logbook.id)}`;

    document.getElementById('editJamMulai').value = logbook.jam_mulai ? logbook.jam_mulai.substring(0, 5) : '08:00';
    document.getElementById('editJamSelesai').value = logbook.jam_selesai ? logbook.jam_selesai.substring(0, 5) : '17:00';
    document.getElementById('editKegiatan').value = logbook.kegiatan || '';
    document.getElementById('editHasil').value = logbook.hasil || '';
    document.getElementById('editKendala').value = logbook.kendala || '';

    document.getElementById('editModal').classList.remove('hidden');
  }

  function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
  }

Object.assign(window, { openCreateModal, closeCreateModal, openEditModal, closeEditModal });

