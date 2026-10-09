<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'TasksController::index');
$routes->get('/about', 'TasksController::about');
$routes->get('/tasks', 'TasksController::listAll');
$routes->get('/profile', 'TasksController::profile');

$routes->get('/customers', 'Customers::index');
$routes->get('/users', 'Users::index');