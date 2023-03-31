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
$routes->get('/', 'Home::index');

$routes->get('best_rated_movies', 'Home::top_rated_movies');
$routes->get('trending_movies', 'Home::trending_movies');
$routes->get('movies', 'Home::popular_movies');
$routes->get('movie_info/(:any)', 'Home::movie_info/$1');

$routes->get('tv_shows', 'Home::popular_tv_shows');
$routes->get('best_rated_tv_shows', 'Home::top_rated_tv_shows');
$routes->get('week_trending', 'Home::week_trending');
$routes->get('tv_show_info/(:any)', 'Home::tv_show_info/$1');

$routes->get('search_results/(:any)', 'Home::search_results/$1');

$routes->post('login_form', 'Credentials::login_form');
$routes->post('sign_up_form', 'Credentials::sign_up_form');
$routes->get('login', 'Credentials::login');
$routes->get('log_out', 'Credentials::log_out');

$routes->get('people/(:any)', 'Home::people_info/$1');
$routes->get('sign_up', 'Credentials::sign_up');


$routes->group('', ['filter' => 'routeFilter', 'namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('watchlist', 'User::display_watchlist');
    $routes->get('add_to_watchlist/tvShow/(:any)', 'User::add_tvShow_to_watchlist/$1');
    $routes->get('add_to_watchlist/movie/(:any)', 'User::add_movie_to_watchlist/$1');
    $routes->get('delete/(:any)', 'User::delete_from_watchlist/$1');
});


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
