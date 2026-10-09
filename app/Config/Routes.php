<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'TaskController::welcome');       // Welcome page[cite: 1]
$routes->get('/tasks', 'TaskController::index');     // Full task list[cite: 1]
$routes->get('/profile', 'UserController::profile'); // Profile page[cite: 1]
$routes->get('/about', 'PageController::about');     // About page[cite: 1]

$routes->get('/login', 'AuthController::login');
$routes->post('/login/process', 'AuthController::processLogin');
$routes->get('/logout', 'AuthController::logout');

// Protected Task Management Routes (requires login)
$routes->group('tasks', ['filter' => 'auth'], function($routes) {
    $routes->get('new', 'TaskController::new');
    $routes->post('create', 'TaskController::create');
    $routes->get('edit/(:num)', 'TaskController::edit/$1');
    $routes->post('update/(:num)', 'TaskController::update/$1');
    $routes->get('delete/(:num)', 'TaskController::delete/$1');
});