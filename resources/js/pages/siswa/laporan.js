function openLapModal(id) { document.getElementById(id).classList.remove('hidden'); }
  function closeLapModal(id) { document.getElementById(id).classList.add('hidden'); }

  function kirimPengingatDudi() {
    document.getElementById('statusPengingat').textContent = 'Terkirim barusan';
    document.getElementById('statusPengingat').className = 'text-emerald-600 font-bold';
    lapToast('Pengingat tanda tangan digital dikirim ke Hendrawan Saputra, S.Kom.');
  }

  function tambahVersiLaporan(e) {
    e.preventDefault();
    const versi = document.getElementById('versiBaru').value;
    const namaFile = document.getElementById('fileBaru').value;

    document.getElementById('namaFileUtama').textContent = namaFile;
    document.getElementById('badgeVersiAktif').textContent = versi;

    const tbody = document.getElementById('tabelVersiBody');
    const tr = document.createElement('tr');
    tr.className = 'bg-sky-50/40 hover:bg-slate-50/80';
    tr.innerHTML = `
      <td class="versi-nomor py-4 pr-4 whitespace-nowrap font-extrabold text-slate-900"></td>
      <td class="versi-nama-file py-4 px-3 font-bold text-slate-800"></td>
      <td class="py-4 px-3 whitespace-nowrap text-emerald-600 font-semibold">Baru saja</td>
      <td class="py-4 px-3 whitespace-nowrap text-slate-600">5.0 MB</td>
      <td class="py-4 px-3 whitespace-nowrap"><span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 text-[10px] font-extrabold">• Menunggu Telaah</span></td>
      <td class="py-4 pl-3 text-right whitespace-nowrap"><button type="button" class="versi-unduh font-bold text-sky-600 hover:underline">Unduh</button></td>
    `;
    tr.querySelector('.versi-nomor').textContent = versi;
    tr.querySelector('.versi-nama-file').textContent = namaFile;
    tr.querySelector('.versi-unduh').addEventListener('click', () => {
      lapToast(`Mengunduh ${namaFile}`);
    });
    tbody.prepend(tr);

    e.target.reset();
    closeLapModal('modalUnggahDraf');
    lapToast(`Versi ${versi} berhasil diunggah ke riwayat laporan.`);
  }

  function lapToast(msg) {
    const el = document.getElementById('lapToast');
    document.getElementById('lapToastText').textContent = msg;
    el.classList.remove('hidden');
    clearTimeout(window._lt);
    window._lt = setTimeout(() => el.classList.add('hidden'), 3000);
  }

Object.assign(window, { openLapModal, closeLapModal, kirimPengingatDudi, tambahVersiLaporan, lapToast });

