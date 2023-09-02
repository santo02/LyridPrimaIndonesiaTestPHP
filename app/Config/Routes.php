<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/', 'LoginController::index');
$routes->post('/login', 'LoginController::Login');
$routes->get('/logout', 'LoginController::logout');


//user
$routes->get('/users/all', 'UsersController::index');
$routes->get('/users/edit/(:any)', 'UsersController::edit/$1');
$routes->get('/users/delete/(:any)', 'UsersController::delete/$1');
$routes->post('/users/update', 'UsersController::update');
$routes->get('/users/add', 'AddUsersController::index');
$routes->post('/users/add/store', 'AddUsersController::store');

// Pegawai
$routes->get('/pegawai/all', 'PegawaiController::index');
$routes->get('/pegawai/add', 'AddPegawaiController::index');
$routes->post('/pegawai/add/store', 'AddPegawaiController::store');
$routes->get('/pegawai/delete/(:any)', 'PegawaiController::delete/$1');
$routes->get('/pegawai/edit/(:any)', 'PegawaiController::edit/$1');
$routes->post('/pegawai/update', 'PegawaiController::update');






