import './shared/ui.js';

const pageModules = {
    '/admin/dashboard': () => import('./pages/admin/dashboard.js'),
    '/admin/kemitraan-dudi': () => import('./pages/admin/dudi-mou.js'),
    '/admin/manajemen-siswa': () => import('./pages/admin/manajemen-siswa.js'),
    '/admin/monitoring-pembimbing': () => import('./pages/admin/monitoring-pembimbing.js'),
    '/admin/pengaturan-akun': () => import('./pages/admin/pengaturan-akun.js'),
    '/admin/rekapitulasi-nilai': () => import('./pages/admin/rekapitulasi-nilai.js'),
    '/dudi/dashboard': () => import('./pages/dudi/dashboard.js'),
    '/siswa/laporan': () => import('./pages/siswa/laporan.js'),
    '/siswa/logbook': () => import('./pages/siswa/logbook.js'),
};

const currentPath = window.location.pathname.replace(/\/$/, '');
const loadPageModule = pageModules[currentPath];

if (loadPageModule) {
    loadPageModule().catch((error) => {
        console.error(`Gagal memuat interaksi halaman ${currentPath}.`, error);
    });
}
