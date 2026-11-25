//
/**
 * PKL.ID - Unified Dashboard Script (Admin, Guru, Pembimbing DUDI, Siswa)
 * Selaras dengan aturan bisnis PRD Aplikasi Monitoring PKL SMK
 */
document.addEventListener('DOMContentLoaded', () => {
    // 0. INJEKSI OTOMATIS CONTAINER TOAST & MODAL UNIVERSAL (Tidak perlu copy-paste HTML di tiap layout)
    if (!document.getElementById('pkl-toast-container')) {
        document.body.insertAdjacentHTML('beforeend', `
            <div id="pkl-toast-container" class="fixed bottom-5 right-5 z-50 flex flex-col gap-2 pointer-events-none"></div>
            <div id="pkl-modal-overlay" class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs z-50 hidden items-center justify-center p-4">
                <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl border border-slate-200 space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <h3 id="pkl-modal-title" class="font-black text-sm text-slate-900">Detail Informasi</h3>
                        <button type="button" onclick="closePklModal()" class="w-7 h-7 rounded-lg hover:bg-slate-100 text-slate-500 flex items-center justify-center">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div id="pkl-modal-body" class="text-xs text-slate-600 space-y-3"></div>
                    <div id="pkl-modal-footer" class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                        <button type="button" onclick="closePklModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold">Tutup</button>
                    </div>
                </div>
            </div>
        `);
    }

    // 1. HELPER NOTIFIKASI TOAST & MODAL
    window.showToast = function (message, type = 'success') {
        const container = document.getElementById('pkl-toast-container');
        const colors = {
            success: 'bg-slate-900 text-white border-emerald-500',
            warning: 'bg-amber-600 text-white border-amber-300',
            error: 'bg-rose-600 text-white border-rose-300',
            info: 'bg-indigo-600 text-white border-indigo-300'
        };
        const icons = {
            success: 'fa-circle-check text-emerald-400',
            warning: 'fa-triangle-exclamation text-amber-200',
            error: 'fa-circle-xmark text-rose-200',
            info: 'fa-circle-info text-indigo-200'
        };

        const toast = document.createElement('div');
        toast.className = `pointer-events-auto flex items-center gap-2.5 px-4 py-3 rounded-xl shadow-lg border-l-4 text-xs font-semibold transition-all duration-300 translate-y-2 opacity-0 ${colors[type] || colors.success}`;
        toast.innerHTML = `<i class="fa-solid ${icons[type] || icons.success}"></i><span>${message}</span>`;
        container.appendChild(toast);

        requestAnimationFrame(() => toast.classList.remove('translate-y-2', 'opacity-0'));
        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-2');
            setTimeout(() => toast.remove(), 300);
        }, 3200);
    };

    window.openPklModal = function (title, htmlBody, footerHtml = '') {
        document.getElementById('pkl-modal-title').textContent = title;
        document.getElementById('pkl-modal-body').innerHTML = htmlBody;
        const footer = document.getElementById('pkl-modal-footer');
        footer.innerHTML = footerHtml || `<button type="button" onclick="closePklModal()" class="px-4 py-2 bg-slate-900 text-white rounded-xl text-xs font-bold">Tutup</button>`;
        const overlay = document.getElementById('pkl-modal-overlay');
        overlay.classList.remove('hidden');
        overlay.classList.add('flex');
    };

    window.closePklModal = function () {
        const overlay = document.getElementById('pkl-modal-overlay');
        overlay.classList.add('hidden');
        overlay.classList.remove('flex');
    };

    // 2. PENCARIAN GLOBAL & FILTER TABEL / KARTU (SEMUA ROLE)
    const searchInputs = document.querySelectorAll('header input[type="text"], main input[type="text"][placeholder*="Cari"]');
    searchInputs.forEach(input => {
        input.addEventListener('input', e => {
            const q = e.target.value.toLowerCase().trim();
            document.querySelectorAll('main tbody tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
            document.querySelectorAll('main .space-y-4 > div.bg-white').forEach(card => {
                if (card.querySelector('form') || card.textContent.includes('WIB')) {
                    card.style.display = card.textContent.toLowerCase().includes(q) ? '' : 'none';
                }
            });
        });
    });

    // 3. FILTER DROPDOWN & TAB STATUS LOGBOOK (GURU, DUDI, SISWA, ADMIN)
    document.querySelectorAll('main select').forEach(select => {
        if (select.closest('form')) return;
        select.addEventListener('change', () => {
            const val = select.options[select.selectedIndex].text.toLowerCase();
            if (val.includes('semua')) {
                document.querySelectorAll('main tbody tr').forEach(tr => tr.style.display = '');
                return;
            }
            const keyword = val.split('(')[0].trim();
            document.querySelectorAll('main tbody tr').forEach(tr => {
                tr.style.display = tr.textContent.toLowerCase().includes(keyword) ? '' : 'none';
            });
            showToast(`Filter diterapkan: ${select.options[select.selectedIndex].text}`, 'info');
        });
    });

    const filterButtons = document.querySelectorAll('main .flex-wrap button');
    filterButtons.forEach(btn => {
        const text = btn.textContent.trim();
        if (/^(Semua|Belum Diisi|Menunggu|Perlu Revisi|Disahkan)/i.test(text)) {
            btn.addEventListener('click', () => {
                filterButtons.forEach(b => {
                    if (/^(Semua|Belum Diisi|Menunggu|Perlu Revisi|Disahkan)/i.test(b.textContent.trim())) {
                        b.classList.remove('bg-indigo-600', 'text-white');
                    }
                });
                btn.classList.add('bg-indigo-600', 'text-white');
                const label = text.replace(/\(\d+\)/, '').trim().toLowerCase();
                document.querySelectorAll('main .space-y-4 > div.bg-white').forEach(card => {
                    card.style.display = (label === 'semua' || card.textContent.toLowerCase().includes(label)) ? '' : 'none';
                });
            });
        }
    });

    // 4. KALKULASI NILAI OTOMATIS & VALIDASI RENTANG 0-100 (PRD 6.5, N2, N3)
    document.querySelectorAll('input[type="number"]').forEach(input => {
        const row = input.closest('tr');
        input.addEventListener('input', () => {
            let val = parseFloat(input.value);
            if (isNaN(val)) val = 0;
            if (val < 0) { input.value = 0; val = 0; }
            if (val > 100) {
                input.value = 100;
                val = 100;
                showToast('Nilai maksimal adalah 100 (Aturan PRD N2/N3)', 'warning');
            }
            if (row) {
                const cells = row.querySelectorAll('td');
                if (cells.length >= 5) {
                    const sikap = parseFloat(cells[1].textContent) || 0;
                    const teknis = parseFloat(cells[2].textContent) || 0;
                    const nilaiAkhir = (sikap * 0.30) + (teknis * 0.50) + (val * 0.20);
                    const badgeAkhir = cells[4].querySelector('span');
                    if (badgeAkhir) badgeAkhir.textContent = nilaiAkhir.toFixed(2).replace('.', ',');
                }
            }
        });
    });

    // 5. AKSI TOMBOL UMUM (SINKRONISASI, VALIDASI, KUNCI NILAI, PENGESAHAN DUDI, EKSPOR)
    document.querySelectorAll('main button').forEach(btn => {
        if (btn.type === 'submit') return;
        const label = btn.textContent.trim();

        if (label.includes('Sinkronisasi')) {
            btn.addEventListener('click', () => {
                const icon = btn.querySelector('i');
                if (icon) icon.classList.add('fa-spin');
                setTimeout(() => {
                    if (icon) icon.classList.remove('fa-spin');
                    showToast('Data berhasil disinkronkan!', 'success');
                }, 600);
            });
        } else if (label.includes('Validasi Massal')) {
            btn.addEventListener('click', () => {
                btn.innerHTML = `<i class="fa-solid fa-check"></i> Semua Tervalidasi (0)`;
                showToast('Validasi massal berhasil diproses.', 'success');
            });
        } else if (label === 'Simpan') {
            btn.addEventListener('click', () => showToast('Perubahan berhasil disimpan.', 'success'));
        } else if (label.includes('Kunci')) {
            btn.addEventListener('click', () => {
                const row = btn.closest('tr');
                const input = row?.querySelector('input[type="number"]');
                if (input) {
                    input.setAttribute('readonly', true);
                    input.classList.add('bg-slate-100', 'text-slate-500');
                }
                const tdAksi = btn.closest('td');
                if (tdAksi) {
                    tdAksi.innerHTML = `<span class="inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-slate-100 text-slate-600 font-bold text-[11px]"><i class="fa-solid fa-lock text-emerald-600"></i> Terkunci</span>`;
                }
                showToast('Nilai dikunci permanen (PRD N4).', 'success');
            });
        } else if (label.includes('Sahkan')) {
            // Untuk Pembimbing DUDI mengesahkan logbook (PRD L3)
            btn.addEventListener('click', () => {
                const card = btn.closest('.bg-white') || btn.closest('tr');
                if (card) card.classList.add('border-emerald-300', 'bg-emerald-50/20');
                showToast('Logbook berhasil disahkan dan terkunci untuk siswa (PRD L3).', 'success');
            });
        } else if (label.includes('Revisi')) {
            // Untuk Pembimbing DUDI meminta revisi wajib catatan (PRD L3)
            btn.addEventListener('click', () => {
                openPklModal(
                    'Permintaan Revisi Logbook (Wajib Catatan)',
                    `<textarea id="revisi-note" rows="3" class="w-full border rounded-xl p-3" placeholder="Tuliskan bagian yang harus diperbaiki siswa..."></textarea>`,
                    `<button type="button" onclick="if(!document.getElementById('revisi-note').value.trim()){showToast('Catatan revisi wajib diisi!','error');return;} closePklModal(); showToast('Permintaan revisi terkirim ke siswa.','warning');" class="px-4 py-2 bg-amber-600 text-white rounded-xl text-xs font-bold">Kirim Revisi</button>`
                );
            });
        } else if (label.includes('Hubungi') || label.includes('Kontak DUDI')) {
            btn.addEventListener('click', () => {
                openPklModal(
                    'Informasi Kontak Cepat',
                    `<p><strong>Kontak Terdaftar:</strong> 0812-7788-9900</p>
                     <p class="p-2.5 bg-slate-50 rounded-xl border">Gunakan tombol di bawah untuk koordinasi langsung via WhatsApp.</p>`,
                    `<a href="https://wa.me/6281277889900" target="_blank" class="px-4 py-2 bg-emerald-600 text-white rounded-xl text-xs font-bold"><i class="fa-brands fa-whatsapp mr-1"></i> Chat WhatsApp</a>
                     <button type="button" onclick="closePklModal()" class="px-4 py-2 bg-slate-100 text-slate-700 rounded-xl text-xs font-bold">Tutup</button>`
                );
            });
        } else if (label.includes('Excel') || label.includes('PDF') || label.includes('Rekap')) {
            btn.addEventListener('click', () => {
                const csv = "data:text/csv;charset=utf-8,Nama,Mitra,Status,Nilai_Akhir\nRizky Pratama,PT Solusi Teknologi,Aktif,83.50\n";
                const link = document.createElement("a");
                link.href = encodeURI(csv);
                link.download = `Export_PKL_${new Date().toISOString().slice(0,10)}.csv`;
                document.body.appendChild(link);
                link.click();
                link.remove();
                showToast(`Mengunduh berkas: ${label}`, 'success');
            });
        }
    });

    // 6. VALIDASI FORM TERPUSAT (PRD L1, L3, U3, A3)
    document.querySelectorAll('main form').forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();

            // Validasi PRD L1: Tanggal logbook tidak boleh masa depan
            const dateInput = form.querySelector('input[type="date"]');
            if (dateInput && dateInput.value > new Date().toISOString().split('T')[0]) {
                showToast('Tanggal masa depan ditolak sistem! (PRD L1)', 'error');
                return;
            }

            // Validasi PRD U3: Catatan tindak lanjut wajib jika status Selesai
            const statusSelect = form.querySelector('select[name="status"]');
            const catatanInput = form.querySelector('input[name="catatan_tindak_lanjut"]');
            if (statusSelect && catatanInput && statusSelect.value === 'selesai' && !catatanInput.value.trim()) {
                showToast('Catatan tindak lanjut wajib diisi saat status Selesai! (PRD U3)', 'error');
                catatanInput.focus();
                return;
            }

            // Validasi PRD A3: Ganti kata sandi minimal 8 karakter
            const passInput = form.querySelector('input[name="password"]');
            const confirmInput = form.querySelector('input[name="password_confirmation"]');
            if (passInput && confirmInput) {
                if (passInput.value.length < 8) {
                    showToast('Kata sandi baru minimal 8 karakter! (PRD A3)', 'error');
                    return;
                }
                if (passInput.value !== confirmInput.value) {
                    showToast('Konfirmasi kata sandi tidak cocok!', 'error');
                    return;
                }
                form.reset();
                showToast('Kata sandi berhasil diperbarui.', 'success');
                return;
            }

            showToast('Data berhasil disimpan ke sistem!', 'success');
            form.reset();
        });
    });
});