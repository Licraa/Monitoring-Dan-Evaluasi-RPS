<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard/dashboard_Dosen', 'Dashboard::dosen', ['filter' => 'role:dosen']);
$routes->get('/dashboard/dashboard_gpm', 'Dashboard::gpm', ['filter' => 'role:gpm']);

$routes->group('admin', ['filter' => 'role:admin'], function($routes) {
  $routes->get('/', 'Admin::index');
  $routes->get('create', 'Admin::createUser');
  $routes->post('store', 'Admin::storeUser');
  $routes->get('assign-role/(:num)', 'Admin::assignRole/$1');
  $routes->post('store-role/(:num)', 'Admin::storeRole/$1');
});

// $routes->get('/dosen', 'dosen::index');
// $routes->get('/gpm', 'gpm::index');


