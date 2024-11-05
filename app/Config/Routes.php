<?php

use CodeIgniter\Router\RouteCollection;

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
$routes->get('edit', 'Admin::edit');
$routes->get('tambahrp', 'Admin::tambahrp');
$routes->get('editrp', 'Admin::editrp');
$routes->get('profil', 'Admin::profil');
$routes->get('notif', 'Admin::notif');

// $routes->get('/dosen', 'dosen::index');
// $routes->get('/gpm', 'gpm::index');


