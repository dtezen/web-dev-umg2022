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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

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
//---------------------------------------RUTA DE LOS EUIPOS-------------------------------------------------------
// $routes->get('Listar', 'Equipos::index');// primero
$routes->get('listar', 'Equipos::index');
$routes->get('crearEquipo', 'Equipos::crearEquipos');
$routes->post('guardar', 'Equipos::guardar');
$routes->get('borrarEquipo/(:num)', 'Equipos::borrarEquipos/$1');
$routes->get('editarEquipos/(:num)', 'Equipos::editarEquipos/$1');
$routes->post('actualizarEquipo', 'Equipos::actualizarEquipo');

// ---------------------------------------RUTA DE LO JUGADORES--------------------------------------------------------
$routes->get('listarJugador', 'Jugadores::index');
$routes->get('crearJugador', 'Jugadores::crearJugador');
$routes->post('guardarJugador', 'Jugadores::guardarJugador');
$routes->get('borrarJugador/(:num)', 'Jugadores::borrarJugador/$1');
$routes->get('editarJugador/(:num)', 'Jugadores::editarJugador/$1');
$routes->post('actualizarJugador', 'Jugadores::actualizarJugador');


// --------------------------------------RUTA DE GOLES-----------------------------------------------------------------
$routes->get('listarGoles', 'Goles::index');
$routes->get('crearGol', 'Goles::crearGol');
$routes->post('guardarGol', 'Goles::guardarGol');
$routes->get('borrarGol/(:num)', 'Goles::borrarGol/$1');
$routes->get('editarGol/(:num)', 'Goles::editarGol/$1');
$routes->post('actualizarGol', 'Goles::actualizarGol');


//--------------------------------------RUTA INCIDENCIAS------------------------------------------------------------------
$routes->get('listartIncidencias', 'Incidencias::index');
$routes->get('crearInci', 'Incidencias::crearInci');
$routes->post('guardarInci', 'Incidencias::guardarInci');
$routes->get('borrarInci/(:num)', 'Incidencias::borrarInci/$1');
$routes->get('editarInci/(:num)', 'Incidencias::editarInci/$1');
$routes->post('actualizarInci', 'Incidencias::actualizarInci');

//--------------------------------------Reportes------------------------------------------------------------------
$routes->get('golPDF', 'Goles::demoPDF');
$routes->get('jugadorPDF', 'Jugadores::demoPDF');
$routes->get('reporteIncidencia', 'Incidencias::demoPDF');
