function switchTabPengaturan(btn, targetId) {
    document.querySelectorAll('.tab-btn').forEach(el => {
      el.className = 'tab-btn px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-700 font-bold flex items-center gap-2 transition';
    });
    btn.className = 'tab-btn px-4 py-2 rounded-xl bg-[#13294B] text-white font-extrabold flex items-center gap-2';

    const panel = document.getElementById(targetId);
    if (panel) {
      panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
  }

  function ubahStatusPeriode(statusBaru) {
    const spanStatus = document.getElementById('spanStatusPeriode');
    const badgeStatus = document.getElementById('badgeStatusPeriode');
    const fields = document.querySelectorAll('.periode-field');
    const isSelesai = statusBaru === 'Selesai';

    if (spanStatus) spanStatus.textContent = statusBaru.toUpperCase();
    if (badgeStatus) {
      badgeStatus.className = `inline-flex items-center gap-1.5 px-3 py-1 rounded-full border text-[10px] font-extrabold ${isSelesai ? 'bg-slate-200 text-slate-800 border-slate-300' : 'bg-sky-50 text-sky-700 border-sky-200'}`;
    }
    fields.forEach(inp => inp.disabled = isSelesai);

    if (isSelesai) {
      showToast('Periode berstatus Selesai: perubahan data periode dikunci.');
    } else {
      showToast(`Status periode diperbarui menjadi ${statusBaru}.`);
    }
  }

  function cekKuotaBaris(row, kodeJurusan) {
    const terisi = parseInt(row.dataset.terisi || '0', 10);
    const input = row.querySelector('.input-kuota');
    const sisaCell = row.querySelector('.sisa-kuota-cell');
    const kuotaBaru = parseInt(input?.value || '0', 10);

    if (kuotaBaru < terisi) {
      showToast(`Kuota ${kodeJurusan} tidak boleh lebih kecil dari jumlah terisi (${terisi}).`);
      if (input) input.value = String(terisi);
      if (sisaCell) sisaCell.textContent = '0';
      return false;
    }

    if (sisaCell) sisaCell.textContent = String(Math.max(0, kuotaBaru - terisi));
    return true;
  }

  function validasiSemuaKuotaJurusan() {
    let valid = true;
    document.querySelectorAll('.jurusan-row').forEach(row => {
      const kode = row.querySelector('td')?.textContent.trim() || 'Jurusan';
      if (!cekKuotaBaris(row, kode)) {
        valid = false;
      }
    });
    if (valid) {
      showToast('Kuota per jurusan pada periode aktif berhasil disimpan.');
    }
    return valid;
  }

  function updateTotalBobotPengaturan() {
    const total = Array.from(document.querySelectorAll('.bobot-pengaturan-input'))
      .reduce((acc, el) => acc + (parseFloat(el.value || '0') || 0), 0);

    const valEl = document.getElementById('totalBobotVal');
    const noteEl = document.getElementById('bobotStatusNote');
    if (valEl) valEl.textContent = String(total);

    if (total === 100) {
      if (noteEl) {
        noteEl.className = 'text-[11px] text-emerald-700 font-semibold';
        noteEl.innerHTML = `Total bobot saat ini: <strong><span id="totalBobotVal">${total}</span>%</strong> (Valid — tepat 100%)`;
      }
      return true;
    } else {
      if (noteEl) {
        noteEl.className = 'text-[11px] text-rose-700 font-bold';
        noteEl.innerHTML = `Total bobot saat ini: <strong><span id="totalBobotVal">${total}</span>%</strong> (Tidak valid — wajib tepat 100%)`;
      }
      return false;
    }
  }

  function simpanBobotPengaturan() {
    if (!updateTotalBobotPengaturan()) {
      showToast('Total bobot penilaian wajib tepat 100% sebelum disimpan.');
      return false;
    }
    showToast('Komponen & bobot penilaian (100%) berhasil disimpan.');
    return true;
  }

  function simpanSemuaPengaturan() {
    if (!validasiSemuaKuotaJurusan()) return;
    if (!simpanBobotPengaturan()) return;
    showToast('Seluruh pengaturan periode, kuota jurusan, dan bobot nilai tersimpan.');
  }

Object.assign(window, { switchTabPengaturan, ubahStatusPeriode, cekKuotaBaris, validasiSemuaKuotaJurusan, updateTotalBobotPengaturan, simpanBobotPengaturan, simpanSemuaPengaturan });

