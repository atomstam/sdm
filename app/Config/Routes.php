<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Admin routes
$routes->group("admin", ["filter" => "authAdmin"], function ($routes) {
    require APPPATH . 'Router/routes_admin.php';
});

// Allready Logged in
$routes->group("", ["filter" => "alreadyLoggedin"], function ($routes) {
    $routes->get('/login', 'Login::index');
    $routes->get('/register', 'Register::index');
});

//$routes->get('/', 'Pages::index');
$routes->get('/', 'Login::index');
//$routes->get('/item9_detail/(:any)/(:any)/(:any)', 'Pages::Item9_detail/$1/$2/$3');
//$routes->get('/item10_detail/(:any)/(:any)/(:any)', 'Pages::Item10_detail/$1/$2/$3');
//$routes->get('/complaint', 'Pages::Complaint');
//$routes->post('/saveComm', 'Pages::SaveComm');
//$routes->get('/chat', 'Pages::Chat');
//$routes->post('/saveChat', 'Pages::SaveChat');
//$routes->get('/ajax_chat', 'Pages::Ajax_Chat');

$routes->get('/users', 'Users::index');

$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');

$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');

$routes->get('/forgotPassword', 'ForgotPassword::index');
$routes->post('/forgot', 'ForgotPassword::forgot');
$routes->get('/reset_password/(:any)/(:any)', 'ForgotPassword::reset_password/$1/$2');
$routes->post('/saveNewPassword', 'ForgotPassword::saveNewPassword');

$routes->get('/logout', 'Login::logout');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

//Item
require APPPATH . 'Router/routes_events.php';
require APPPATH . 'Router/routes_eventscate.php';
require APPPATH . 'Router/routes_eventstype.php';
require APPPATH . 'Router/routes_item.php';
require APPPATH . 'Router/routes_itemcat.php';
require APPPATH . 'Router/routes_itemmain.php';
require APPPATH . 'Router/routes_itemsub.php';
require APPPATH . 'Router/routes_itemup.php';

//$routes->get('(:any)', 'Pages::view/$1');
$routes->get(':any', 'Login::index');

//CkEditor Upload Image
$routes->post('/uploadimg', 'CkUploadImgController::store');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
