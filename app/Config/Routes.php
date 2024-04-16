<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Routes For Authentification
$routes->get('/', 'Auth::login');
$routes->get('/dashboard', 'Home::index', ['filter' => 'auth']);
$routes->get('/register', 'Auth::register');
$routes->post('auth/attemptRegister', 'Auth::attemptRegister');
$routes->get('/login', 'Auth::login');
$routes->post('auth/attemptLogin', 'Auth::attemptLogin');
$routes->get('auth/logout', 'Auth::logout');

// Routes Admin
$routes->get('/dashboard/role', 'Role::getAllRole', ['filter' => 'auth']);
$routes->get('/dashboard/role/add', 'Role::renderPageCreateRole', ['filter' => 'auth']);
$routes->post('/role/create', 'Role::createRole', ['filter' => 'auth']);
$routes->get('/role/delete/(:num)', 'Role::deleteRole/$1', ['filter' => 'auth']);
$routes->get('/dashboard/role/update/(:segment)', 'Role::renderPageUpdateRole/$1', ['filter' => 'auth']);
$routes->post('/role/update/(:segment)', 'Role::updateRole/$1', ['filter' => 'auth']);

$routes->get('/dashboard/user', 'User::getAllUser', ['filter' => 'auth']);
$routes->get('/dashboard/user/detail/(:segment)', 'User::getUserById/$1', ['filter' => 'auth']);
$routes->get('/dashboard/user/add', 'User::renderPageCreateUser', ['filter' => 'auth']);
$routes->post('/user/create', 'User::createUser', ['filter' => 'auth']);
$routes->get('/dashboard/user/update/(:segment)', 'User::renderPageUpdateUser/$1', ['filter' => 'auth']);
$routes->post('user/update/(:segment)', 'User::updateUser/$1', ['filter' => 'auth']);
$routes->get('/user/delete/(:num)', 'User::deleteUser/$1', ['filter' => 'auth']);

$routes->get('/dashboard/objective', 'Objective::getAllObject', ['filter' => 'auth']);
$routes->get('/dashboard/objective/add', 'Objective::renderPageCreateObjective', ['filter' => 'auth']);
$routes->post('/objective/create', 'Objective::createObjective', ['filter' => 'auth']);
$routes->get('/objective/delete/(:num)', 'Objective::deleteObjective/$1', ['filter' => 'auth']);

$routes->get('/dashboard/key_result', 'KeyResult::getAllKeyResult', ['filter' => 'auth']);
$routes->get('/dashboard/key_result/add', 'KeyResult::renderPageCreateKeyResult', ['filter' => 'auth']);
$routes->post('/key_result/create', 'KeyResult::createKeyResult', ['filter' => 'auth']);
$routes->get('/key_result/delete/(:num)', 'KeyResult::deleteKeyResult/$1', ['filter' => 'auth']);