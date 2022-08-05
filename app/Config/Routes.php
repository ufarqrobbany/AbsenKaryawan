<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home/login', 'Home::login');
$routes->get('/auth/valid_login', 'Auth::valid_login');
$routes->post('/auth/valid_login', 'Auth::valid_login');

$routes->get('/user', 'User::index');
$routes->get('/user/myprofile', 'User::myprofile');
$routes->get('/user/editprofile/(:segment)', 'User::editprofile/$1');
$routes->post('/user/update/(:segment)', 'User::update/$1');
$routes->post('/user/updatepass/(:segment)', 'User::updatepass/$1');

$routes->get('/admin', 'Admin::index');
$routes->post('/admin/absensi/(:segment)', 'Admin::absensi/$1');
$routes->get('/admin/users', 'Admin::users');
$routes->get('/admin/create', 'Admin::create');
$routes->get('/admin/edit/(:segment)', 'Admin::edit/$1');
$routes->post('/admin/update/(:segment)', 'Admin::update/$1');
$routes->post('/admin/save', 'Admin::save');
$routes->delete('/admin/(:num)', 'Admin::delete/$1');
$routes->get('/admin/myprofile', 'Admin::myprofile');
$routes->get('/admin/editprofile/(:segment)', 'Admin::editprofile/$1');
$routes->post('/admin/updatepass/(:segment)', 'Admin::updatepass/$1');

$routes->get('/auth/logout', 'Auth::logout');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
