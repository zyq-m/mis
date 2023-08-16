<?php

namespace Config;

use App\Controllers\PatientController;
use App\Controllers\ImageController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->post('/login', 'Login::login');

// $routes->get('/register', 'Register::index');

// $routes->get('/login', 'Login::index');

$routes->get('urine_test', 'UrineTest::index');
$routes->post('urine_test', 'UrineTest::submitForm');

$routes->get('image_repo', 'ImageRepo::index');
$routes->post('image_repo/upload', 'ImageRepo::upload');

// $routes->get('/dashboard', 'Dashboard::index');

// $routes->get('/', 'Login::index');

$routes->get('dashboard', 'Dashboard::index');

$routes->get('user', 'UserController::index');
$routes->get('user/edit/(:segment)', 'UserController::edit/$1');
$routes->post('user/update', 'UserController::update');
$routes->get('user/add', 'UserController::add');
$routes->post('user/add', 'UserController::store');

$routes->get('profile', 'UserController::profile');
$routes->post('profile', 'UserController::updateprofile');
$routes->get('profile/password', 'UserController::password');
$routes->post('profile/password', 'UserController::updatepassword');

$routes->get('community', 'CommunityController::index');

$routes->get('hospital', 'HospitalController::index');

$routes->get('registration', 'RegisterController::index');
$routes->get('registration/add', 'RegisterController::add');

// $routes->get('logout', 'AuthController::logouthandler', ['as' => 'admin.logout']);


// $routes->get('login', 'Login::index', ['as' => 'admin.login.form']);
// $routes->post('login', 'AuthController::loginhandler');

$routes->get('patient/(:num)', [PatientController::class, 'viewPatient']);
$routes->get('patient', 'PatientController::index');
$routes->get('patient/register', 'PatientController::addPatient');
$routes->post('patient/register', 'PatientController::addPatient');

/**
 * REST API
 */
$routes->get('image/(:segment)/(:segment)', [ImageController::class, 'index']);

/**
 * this route is used for testing & development purposes
 * plesase remove later
 */
$routes->get('patient/fake', 'PatientController::fakePatient');
$routes->get('patient/fake/generate/(:num)', [PatientController::class, 'onFakePatient']);

service('auth')->routes($routes);
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
