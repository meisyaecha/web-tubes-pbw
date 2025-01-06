<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/companies', 'CompanyController::index');
$routes->get('/companies/add', 'CompanyController::add', ['filter' => 'auth']);
$routes->post('/companies/save', 'CompanyController::save', ['filter' => 'auth']);
$routes->get('/companies/edit/(:num)', 'CompanyController::edit/$1', ['filter' => 'auth']);
$routes->post('/companies/update/(:num)', 'CompanyController::update/$1', ['filter' => 'auth']);
$routes->get('/companies/delete/(:num)', 'CompanyController::delete/$1', ['filter' => 'auth']);
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::attemptLogin');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::attemptRegister');





