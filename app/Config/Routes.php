<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Index routes
$routes->get('/', 'MainController::index');
$routes->get('/anime', 'MainController::index');
$routes->get('/anime/anime-list', 'MainController::animeList');
$routes->get('/anime/detail/(:num)', 'MainController::detail/$1');
$routes->post('/anime', 'MainController::filter');
$routes->post('/anime/anime-list', 'MainController::sort');

// Dashboard routes
$routes->get('/login', 'DashboardController::login');
$routes->group('/dashboard', ['filter' => 'login'], function ($routes) {
    $routes->get('', 'DashboardController::index');
    $routes->get('manage/data', 'DashboardController::manageData');
    $routes->post('manage/data', 'DashboardController::getTableData');
    $routes->get('logout', 'DashboardController::logout');
    $routes->get('profile', 'DashboardController::profile');
    $routes->get('manage/admin', 'DashboardController::manageAdmin', ['filter' => 'role']);
    $routes->post('manage/admin', 'DashboardController::getTableAdmin');
});

//CRUD routes
$routes->post('/login', 'DashboardController::auth');
$routes->post('/dashboard/manage/create/data', 'DashboardController::createData');
$routes->get('/dashboard/manage/data/delete/(:num)', 'DashboardController::deleteData/$1');
$routes->post('/dashboard/manage/edit/data', 'DashboardController::editData');
$routes->post('/dashboard/profile/edit', 'DashboardController::editProfile');
$routes->post('/dashboard/manage/create/admin', 'DashboardController::createAdmin');
$routes->get('/dashboard/manage/admin/delete/(:num)', 'DashboardController::deleteAdmin/$1');
$routes->post('/dashboard/manage/edit/admin', 'DashboardController::editAdmin');