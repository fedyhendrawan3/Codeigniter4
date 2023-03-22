<?php

namespace Config;

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
//VIEW
$routes->get('/', 'Home::index');
$routes->get('/Berita', 'Berita::index');
$routes->get('/Daerah', 'Daerah::index');
$routes->get('/Pengguna', 'Pengguna::index');
$routes->get('/Kategori', 'Kategori::index');

//UPDATE VIEW
$routes->get('/Berita/update/(:num)', 'Berita::update/$1');
$routes->get('/Daerah/update/(:num)', 'Daerah::update/$1');
$routes->get('/Pengguna/update/(:num)', 'Pengguna::update/$1');
$routes->get('/Kategori/update/(:num)', 'Kategori::update/$1');

//EDIT
$routes->post('/Berita/edit', 'Berita::edit/$1');
$routes->post('/Daerah/edit', 'Daerah::edit/$1');
$routes->post('/Pengguna/edit', 'Pengguna::edit/$1');
$routes->post('/Kategori/edit', 'Kategori::edit/$1');

//INSERT VIEW
$routes->add('/Berita/input', 'Berita::input');
$routes->add('/Daerah/input', 'Daerah::input');
$routes->add('/Pengguna/input', 'Pengguna::input');
$routes->add('/Kategori/input', 'Kategori::input');


//INSERT
$routes->post('/Berita/insert', 'Berita::insert');
$routes->post('/Daerah/insert', 'Daerah::insert');
$routes->post('/Pengguna/insert', 'Pengguna::insert');
$routes->post('/Kategori/insert', 'Kategori::insert');

//DELETE
$routes->add('/Berita/delete/(:num)', 'Berita::delete/$1');
$routes->add('/Daerah/delete/(:num)', 'Daerah::delete/$1');
$routes->add('/Pengguna/delete/(:num)', 'Pengguna::delete/$1');
$routes->add('/Kategori/delete/(:num)', 'Kategori::delete/$1');


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
