<?php

use CodeIgniter\Router\RouteCollection;
use Kint\Zval\Value;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard/dashboard_Dosen', 'Dashboard::dosen', ['filter' => 'role:dosen']);
$routes->get('/dashboard/dashboard_gpm', 'Dashboard::gpm', ['filter' => 'role:gpm']);
$routes->get('/dashboard/dashboard_admin', 'Dashboard::admin', ['filter' => 'role:admin']);
$routes->get('/dashboard/dashboard_kajur', 'Dashboard::kajur', ['filter' => 'role:kajur']);

$routes->get('/admin', 'Admin::index');
$routes->get('akun', 'Admin::akun');
$routes->get('rps', 'Admin::rps');
$routes->get('tambah', 'Admin::tambah');
// $routes->get('edit', 'Admin::edit');
$routes->get('edit/(:num)', 'Admin::edit/$1');
$routes->get('tambahrp', 'Admin::tambahrp');
$routes->post('tambahrp/addrp', 'Admin::addrp');
// $routes->get('editrp', 'Admin::editrp');
$routes->get('editrp/(:num)', 'Admin::editrp/$1');
$routes->post('editrp/updaterp/(:num)', 'Admin::updaterp/$1');
$routes->post('editrp/deleterp/(:num)', 'Admin::deleterp/$1');
$routes->post('tambah/adduser', 'Admin::adduser');
$routes->get('profil', 'Admin::profil');
$routes->get('notif', 'Admin::notif');

// $routes->get('/dosen', 'dosen::index');
// $routes->get('/gpm', 'gpm::index');


