let activeGuruJurusan = '';

  function selectGuruJurusan(btn, jurusan) {
    activeGuruJurusan = jurusan;
    document.querySelectorAll('.jurusan-btn').forEach(el => {
      el.className = 'jurusan-btn px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200/70 text-slate-600 font-bold transition';
    });
    btn.className = 'jurusan-btn px-3 py-1.5 rounded-lg bg-[#13294B] text-white font-bold';
    filterGuruTable();
  }

  function filterGuruTable() {
    const q = (document.getElementById('guruSearchInput').value || '').toLowerCase();
    document.querySelectorAll('.guru-row').forEach(row => {
      const text = row.innerText.toLowerCase();
      const match = (!q || text.includes(q)) && (!activeGuruJurusan || text.includes(activeGuruJurusan.toLowerCase()));
      row.classList.toggle('hidden', !match);
    });
  }

  function downloadRekapMonev() {
    triggerDownload('rekap-kunjungan-monitoring.csv', "Nama Guru,Siswa Bimbingan,Kunjungan Tercatat\nDra. Sri Wahyuni M.Pd,28/30,12\nDrs. Budi Haryono,21/30,9\n", 'text/csv;charset=utf-8;');
    showToast('Rekap kunjungan monitoring berhasil diunduh.');
  }

  function handleTambahGuru(e) {
    e.preventDefault();
    const nama = document.getElementById('inputNamaGuru').value.trim();
    const nip = document.getElementById('inputNipGuru').value.trim();
    const maks = document.getElementById('inputMaksSiswa').value;

    const tr = document.createElement('tr');
    tr.className = 'guru-row hover:bg-slate-50/70 align-middle bg-sky-50/40';
    tr.innerHTML = `
      <td class="py-4 px-4"><div class="guru-name font-extrabold text-slate-900"></div><div class="guru-nip text-[10px] text-slate-400 mt-0.5"></div></td>
      <td class="py-4 px-3"><span class="inline-block px-2 py-0.5 rounded bg-sky-100 text-sky-800 text-[10px] font-extrabold">UMUM</span></td>
      <td class="py-4 px-3 font-black text-slate-900">0 / <span class="guru-limit"></span> <span class="text-[11px] font-semibold text-slate-500">Siswa</span></td>
      <td class="py-4 px-3 font-bold text-slate-500">0 Kunjungan</td>
      <td class="py-4 px-3"><span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[10px] font-bold">0 Siswa</span></td>
      <td class="py-4 px-3"><span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[10px] font-bold">0 Baru</span></td>
      <td class="py-4 px-4 text-right"><span class="text-[10px] font-bold text-emerald-600">Aktif</span></td>
    `;
    tr.querySelector('.guru-name').textContent = nama;
    tr.querySelector('.guru-nip').textContent = `NIP. ${nip}`;
    tr.querySelector('.guru-limit').textContent = maks;
    document.getElementById('guruTableBody').prepend(tr);

    const kpi = document.getElementById('kpiTotalGuru');
    kpi.textContent = String(parseInt(kpi.textContent || '18', 10) + 1);

    e.target.reset();
    closeModal('modalTambahGuru');
    showToast(`Profil guru pembimbing ${nama} berhasil ditambahkan.`);
  }

Object.assign(window, { selectGuruJurusan, filterGuruTable, downloadRekapMonev, handleTambahGuru });

