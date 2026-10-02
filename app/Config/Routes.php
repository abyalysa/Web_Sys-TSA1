<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'TaskController::welcome');       // Welcome page[cite: 1]
$routes->get('/tasks', 'TaskController::index');     // Full task list[cite: 1]
$routes->get('/profile', 'UserController::profile'); // Profile page[cite: 1]
$routes->get('/about', 'PageController::about');     // About page[cite: 1]
