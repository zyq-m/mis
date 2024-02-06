<?php

namespace Config;

use App\Controllers\PatientController;
use App\Controllers\ImageController;
use App\Controllers\ImageRepo;
use App\Controllers\UrineTest;

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

// Auth user
$routes->group('profile', static function ($routes) {
    $routes->get('', 'ProfileController::profile');
    $routes->get('password', 'ProfileController::password');
});

// Admin routes
$routes->group('', ['filter' => 'group:admin'], static function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    $routes->group('urine_test', static function ($routes) {
        $routes->get('', [UrineTest::class, 'index']);
        $routes->post('', [UrineTest::class, 'submitForm']);
        $routes->get('patient', [UrineTest::class, 'searchPatient']);
    });

    $routes->group('image_repo', static function ($routes) {
        $routes->get('', [ImageRepo::class, 'index']);
        $routes->get('form', [ImageRepo::class, 'form']);
        $routes->get('patient', [ImageRepo::class, 'searchPatient']);
        $routes->post('download/(:segment)', [ImageRepo::class, 'downloadImages']);
        $routes->post('upload', [ImageRepo::class, 'upload']);
        $routes->get('patient/(:segment)', [ImageRepo::class, 'searchFile']);
        $routes->get('patient/(:segment)/(:segment)', [ImageRepo::class, 'searchFile']);
    });

    $routes->group('patient', static function ($routes) {
        $routes->get('', [PatientController::class, 'index']);
        $routes->get('(:num)', [PatientController::class, 'viewPatient']);
        $routes->get('register', [PatientController::class, 'addPatient']);
        $routes->post('register', [PatientController::class, 'addPatient']);
        $routes->get('edit/(:num)', [PatientController::class, 'editPatient']);
        $routes->post('edit/(:num)', [PatientController::class, 'editPatient']);
    });
});

// User routes
$routes->group('', ['filter' => 'group:user'], static function ($routes) {
    $routes->get('home', 'Dashboard::userHome');
});

/**
 * REST API
 */
$routes->get('image/(:segment)', [ImageController::class, 'index']);

/**
 * this route is used for testing & development purposes
 * plesase remove later
 */
$routes->cli('patient/fake', 'PatientController::fakePatient');
$routes->cli('patient/fake/generate/(:num)', [PatientController::class, 'onFakePatient']);

$routes->cli('image_repo/fake', [ImageRepo::class, 'fakeImageRepo']);
$routes->cli('image_repo/fake/(:num)', [ImageRepo::class, 'onFakeImageRepo']);

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
