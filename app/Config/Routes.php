<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/forgotPassword', 'Login::forgotPassword');
 
$routes->setAutoRoute(true); // Enable automatic route discovery en francais : Activer la découverte automatique des routes
$routes->setAutoRoute('improved');
