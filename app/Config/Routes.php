<?php

use App\Controllers\AuthController;
use App\Controllers\Authors;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->resource('authors');