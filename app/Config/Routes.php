<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->add('login', 'Home::login');
$routes->add('sigin', 'Home::sigin');
$routes->add('main', 'Home::main');
$routes->add('logout', 'Home::logout');

$routes->add('register', 'Auth::register');
$routes->add('forget', 'Auth::forget');
$routes->add('passwd/(:any)', 'Auth::passwd/$1');
$routes->add('zhuce', 'Home::zhuce');
$routes->add('gologin', 'Home::gologin');
$routes->add('agent', 'Home::agent');




$routes->group('upload',function ($routes){
    $routes->add('dofile', 'Comm\Upload::dofile');
    $routes->add('do/(:any)', 'Comm\Upload::do/$1');
});

$routes->add('notices/(:any)', 'Message\Notify::show/$1');
$routes->add('notify/(:any)', 'Message\Notify::message/$1');

$routes->add('search', 'Autocomplete::search');

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
