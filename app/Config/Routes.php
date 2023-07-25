<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/dashboard', 'Dashboard::index');
//ROUTES LOGIN DAN LOGOUT
$routes->get('login', 'Login::index');
$routes->get('logout', 'Login::logout');
$routes->post('proses_login', 'Login::proses');

$routes->get('/jenis_kas', 'Jenis_Kas::index');
$routes->get('/jurnal_umum/(:any)', 'Jurnal_Umum::index/$1');
$routes->get('/buku_besar/(:any)', 'Buku_Besar::index/$1');
$routes->get('/neraca_saldo/(:any)', 'Neraca_Saldo::index/$1');
$routes->get('/laporan_arus_kas/(:any)', 'Laporan_Arus_Kas::index/$1');
$routes->get('/laporan_pembayaran_gaji/index/(:segment)', 'Laporan_Pembayaran_Gaji::index/$1/false');
$routes->get('/laporan_neraca/(:any)', 'Laporan_neraca::index/$1');

$routes->get('/cetak_jurnal_umum/(:any)', 'Jurnal_Umum::cetak/$1');
$routes->get('/cetak_buku_besar/(:any)', 'Buku_Besar::cetak/$1');
$routes->get('/cetak_neraca_saldo/(:any)', 'Neraca_Saldo::cetak/$1');
$routes->get('/cetak_laporan_arus_kas/(:any)', 'Laporan_Arus_Kas::cetak/$1');
$routes->get('/cetak_laporan_gaji/index/(:segment)', 'Laporan_Pembayaran_Gaji::index/$1/true');
$routes->get('/cetak_laporan_neraca/(:any)', 'Laporan_neraca::cetak/$1');


$routes->get('/akun', 'Akun::index');
$routes->get('/tambah_akun', 'Akun::tambah');
$routes->post('/simpan_akun', 'Akun::simpan');
$routes->get('/edit_akun/(:any)', 'Akun::edit/$1');
$routes->get('/hapus_akun/(:any)', 'Akun::hapus/$1');

$routes->get('/guru_staf', 'Guru_Staf::index');
$routes->get('/tambah_guru', 'Guru_Staf::tambah');
$routes->post('/simpan_guru', 'Guru_Staf::simpan');
$routes->get('/edit_guru/(:any)', 'Guru_Staf::edit/$1');
$routes->get('/hapus_guru/(:any)', 'Guru_Staf::hapus/$1');
$routes->get('/status_guru/(:any)/(:any)', 'Guru_Staf::status/$1/$2');

$routes->get('/kas_masuk', 'Kas_Masuk::index');
$routes->get('/tambah_kas_masuk', 'Kas_Masuk::tambah');
$routes->post('/simpan_kas_masuk', 'Kas_Masuk::simpan');
$routes->get('/edit_kas_masuk/(:any)', 'Kas_Masuk::edit/$1');
$routes->get('/hapus_kas_masuk/(:any)', 'Kas_Masuk::hapus/$1');

$routes->get('/kas_keluar', 'Kas_Keluar::index');
$routes->get('/tambah_kas_keluar', 'Kas_Keluar::tambah');
$routes->post('/simpan_kas_keluar', 'Kas_Keluar::simpan');
$routes->get('/edit_kas_keluar/(:any)', 'Kas_Keluar::edit/$1');
$routes->get('/hapus_kas_keluar/(:any)', 'Kas_Keluar::hapus/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
