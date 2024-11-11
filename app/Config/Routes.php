<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
// $routes->get('/dashboard', 'Login::index'); // Add this line to redirect to the login page

// $routes->get('/register', 'Register::index'); 
$routes->get('/medicaments', 'medicaments\medicaments::index'); 
 
$routes->setAutoRoute(true); // Enable automatic route discovery en francais : Activer la découverte automatique des routes
$routes->setAutoRoute('improved');
