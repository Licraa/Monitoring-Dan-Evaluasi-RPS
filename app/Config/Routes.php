<?php

use CodeIgniter\Router\RouteCollection;
use Kint\Zval\Value;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/dashboard/dashboard_gpm', 'Dashboard::gpm', ['filter' => 'role:gpm']);
$routes->get('/dashboard/dashboard_admin', 'Dashboard::admin', ['filter' => 'role:admin']);
$routes->get('/dashboard/dashboard_kajur', 'Dashboard::kajur', ['filter' => 'role:kajur']);


// router admin 
$routes->get('/admin', 'AdminController::index');
$routes->get('akun', 'AdminController::akun');
$routes->get('rps', 'AdminController::rps');

$routes->get('tambah', 'AdminController::tambah');
$routes->post('tambah/adduser', 'AdminController::adduser');

// $routes->get('edit', 'Admin::edit');
$routes->get('edit/(:num)', 'AdminController::edit/$1');
$routes->post('edit/edituser/(:num)', 'AdminController::updateuser/$1');
$routes->post('deleteuser/(:num)', 'AdminController::deleteuser/$1');

$routes->get('tambahrp', 'AdminController::tambahrp');
$routes->post('tambahrp/addrp', 'AdminController::addrp');

// $routes->get('editrp', 'Admin::editrp');
$routes->get('editrp/(:num)', 'AdminController::editrp/$1');
$routes->post('editrp/updaterp/(:num)', 'AdminController::updaterp/$1');
$routes->post('editrp/deleterp/(:num)', 'AdminController::deleterp/$1');

$routes->get('profil', 'AdminController::profil');
$routes->get('notif', 'AdminController::notif');
// $routes->get('/dosen', 'dosen::index');
// $routes->get('/gpm', 'gpm::index');

// route admin selesai

// route dosen
$routes->get('/dosen', 'dosenController::dosen', ['filter' => 'role:dosen']);
$routes->get('dosen/unggah-rps', 'dosenController::unggah_rps');
$routes->get('dosen/linkRPS', 'dosenController::link_rps');
$routes->post('dosen/simpan_rps', 'UnggahRpsController::simpan_rps');
$routes->get('dosen/daftar_upload', 'dosenController::daftar_upload');
$routes->get('dosen/isi_bap', 'dosenController::bap');
$routes->get('dosen/daftar_bap', 'dosenController::daftar_bap');
$routes->get('dosen/feedback', 'dosenController::feedback');
$routes->get('dosen/getMataKuliahByJurusan/(:num)', 'dosenController::getMataKuliahByJurusan/$1');
$routes->delete('dosen/hapus_rps/(:num)', 'dosenController::hapus_rps/$1');
$routes->get('dosen/get_rps/(:num)', 'dosenController::get_rps/$1');
$routes->put('dosen/update_rps/(:num)', 'dosenController::update_rps/$1');
$routes->post('dosen/simpan_bap', 'dosenController::simpan_bap');
$routes->get('dosen/get-bap-details/(:num)', 'Dosen::getBapDetails/$1');
