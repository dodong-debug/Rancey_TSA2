<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public, read-only pages.
$routes->get('/', 'TasksController::index');
$routes->get('about', 'TasksController::about');
$routes->get('tasks', 'TasksController::listAll');
$routes->get('profile', 'TasksController::profile');
$routes->get('customers', 'Customers::index');
$routes->get('users', 'Users::index');

// Authentication.
$routes->get('login', 'AuthController::loginForm');
$routes->post('login', 'AuthController::login');
$routes->post('logout', 'AuthController::logout', ['filter' => 'auth']);

// Task management actions are available only to authenticated users.
$routes->get('tasks/new', 'TasksController::newTask', ['filter' => 'auth']);
$routes->post('tasks/create', 'TasksController::create', ['filter' => 'auth']);
$routes->get('tasks/(:num)/edit', 'TasksController::edit/$1', ['filter' => 'auth']);
$routes->post('tasks/(:num)/update', 'TasksController::update/$1', ['filter' => 'auth']);
$routes->post('tasks/(:num)/delete', 'TasksController::archive/$1', ['filter' => 'auth']);
