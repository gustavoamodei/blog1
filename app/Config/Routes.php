<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->get('main', 'Home::main');
$routes->get('listar_users','User_controller::index');
$routes->get('edit_user/(:num)','User_controller::edit/$1');
$routes->get('cadastro_usuario',"User_controller::create");
$routes->get('deslogar',"Home::deslogar");
$routes->post('salvar_user','User_controller::store');
//$routes->post('salvar_user','User_controller::store');
$routes->post('delete','User_controller::delete');
$routes->get('cadastro_noticia','Noticia_controller::create');
$routes->post('salvar_noticia','Noticia_controller::store');
$routes->get('edit_noticia/(:num)','Noticia_controller::edit/$1');
$routes->get('listar_noticias','Noticia_controller::index');
$routes->post('delete_noticia','Noticia_controller::delete');

//$route['ca'] = "Oessencial_controller/create";
/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
