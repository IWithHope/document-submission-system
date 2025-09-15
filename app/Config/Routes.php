<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default Route
$routes->get('/', 'Home::index');



$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginSubmit', 'Auth::loginSubmit');
$routes->get('/dashboard', 'Auth::dashboard');
$routes->get('/adminPage', 'Auth::adminPage');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/profile', 'DashboardController::profile');
$routes->get('/profile', 'ProfileController::index');
$routes->get('/editProfile', 'ProfileController::editProfile');
$routes->post('/editProfile', 'ProfileController::updateProfile');

$routes->get('/adminPage', 'AdminController::index');
$routes->get('/adminPage/addUser', 'AdminController::addUser');
$routes->post('/user/save', 'AdminController::saveUser');
$routes->get('/adminPage/removeUser', 'AdminController::removeUser');
$routes->post('/user/remove', 'AdminController::deleteUser');
$routes->get('/adminPage/addDocType', 'AdminController::addDocType');

