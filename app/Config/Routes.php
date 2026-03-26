<?php

use App\Controllers\Authors;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function () {
    return redirect()->to('/authors');
});

$routes->presenter('authors');