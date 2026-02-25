<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/panel', 'Panel::index');
$routes->get('/panel/index', 'Panel::index');
$routes->get('/panel/nuevo', 'Panel::nuevo');
$routes->get('/paises', 'Paises::index');
$routes->get('/paises/listar', 'Paises::listar');


//zonas
$routes->get('/zonas', 'Zonas::index');
$routes->get('/zonas/nuevo', 'Zonas::nuevo');
$routes->post('/zonas/guardar', 'Zonas::guardar');
$routes->get('/zonas/borrar/(:num)', 'Zonas::borrar/$1');
$routes->get('/zonas/editar/(:num)', 'Zonas::editar/$1');
$routes->post('/zonas/actualizar/(:num)', 'Zonas::actualizar/$1');

//usuarios
$routes->get('/usuarios', 'Usuarios::index');
$routes->get('/usuarios/nuevo', 'Usuarios::nuevo');
$routes->post('/usuarios/guardar', 'Usuarios::guardar');
$routes->get('/usuarios/borrar/(:num)', 'Usuarios::borrar/$1');
$routes->get('/usuarios/editar/(:num)', 'Usuarios::editar/$1');
$routes->post('/usuarios/actualizar/(:num)', 'Usuarios::actualizar/$1');

//autos
$routes->get('/autos', 'Autos::index');
$routes->get('/autos/nuevo', 'Autos::nuevo');
$routes->post('/autos/guardar', 'Autos::guardar');
$routes->get('/autos/borrar/(:num)', 'Autos::borrar/$1');
$routes->get('/autos/editar/(:num)', 'Autos::editar/$1');
$routes->post('/autos/actualizar/(:num)', 'Autos::actualizar/$1');
$routes->get('/autos/autos_por_cliente', 'Autos::autos_por_cliente');

//clientes
$routes->get('/clientes', 'Clientes::index');
$routes->get('/clientes/nuevo', 'Clientes::nuevo');
$routes->post('/clientes/guardar', 'Clientes::guardar');
$routes->get('/clientes/borrar/(:num)', 'Clientes::borrar/$1');
$routes->get('/clientes/editar/(:num)', 'Clientes::editar/$1');
$routes->post('/clientes/actualizar/(:num)', 'Clientes::actualizar/$1');

//repuestos
$routes->get('/repuestos', 'Repuestos::index');
$routes->get('/repuestos/nuevo', 'Repuestos::nuevo');
$routes->post('/repuestos/guardar', 'Repuestos::guardar');
$routes->get('/repuestos/borrar/(:num)', 'Repuestos::borrar/$1');
$routes->get('/repuestos/editar/(:num)', 'Repuestos::editar/$1');
$routes->post('/repuestos/actualizar/(:num)', 'Repuestos::actualizar/$1');

//proveedores
$routes->get('/proveedores', 'Proveedores::index');
$routes->get('/proveedores/nuevo', 'Proveedores::nuevo');
$routes->post('/proveedores/guardar', 'Proveedores::guardar');
$routes->get('/proveedores/borrar/(:num)', 'Proveedores::borrar/$1');
$routes->get('/proveedores/editar/(:num)', 'Proveedores::editar/$1');
$routes->post('/proveedores/actualizar/(:num)', 'Proveedores::actualizar/$1');

//movimientosproveedores
$routes->get('/movimientosproveedores', 'MovimientosProveedores::index');
$routes->get('/movimientosproveedores/index/(:num)', 'MovimientosProveedores::index/$1');
$routes->get('/movimientosproveedores/nuevo', 'MovimientosProveedores::nuevo');
$routes->post('/movimientosproveedores/guardar', 'MovimientosProveedores::guardar');
$routes->get('/movimientosproveedores/pagar/(:num)', 'MovimientosProveedores::pagar/$1');
$routes->post('/movimientosproveedores/confirmar_pago', 'MovimientosProveedores::confirmar_pago');
$routes->get('/movimientosproveedores/imprimir/(:num)', 'MovimientosProveedores::imprimir/$1');

//facturas
$routes->get('/facturas', 'Facturas::index');
$routes->get('/facturas/index/(:num)', 'Facturas::index/$1');
$routes->get('/facturas/nuevo', 'Facturas::nuevo');
$routes->post('/facturas/guardar', 'Facturas::guardar');
$routes->get('/facturas/pagar/(:num)', 'Facturas::pagar/$1');
$routes->post('/facturas/confirmar_pago/', 'Facturas::confirmar_pago');
$routes->get('/facturas/imprimir/(:num)', 'Facturas::imprimir/$1');

//reparaciones
$routes->get('/reparaciones', 'Reparaciones::index');
$routes->get('/reparaciones/nuevo', 'Reparaciones::nuevo');
$routes->post('/reparaciones/guardar', 'Reparaciones::guardar');
$routes->get('/reparaciones/borrar/(:num)', 'Reparaciones::borrar/$1');
$routes->get('/reparaciones/editar/(:num)', 'Reparaciones::editar/$1');
$routes->get('/reparaciones/repuestos/(:num)', 'Reparaciones::repuestos/$1');
$routes->get('/reparaciones/por_auto', 'Reparaciones::por_auto');
$routes->post('/reparaciones/guardarRepuesto/(:num)', 'Reparaciones::guardarRepuesto/$1');
$routes->post('/reparaciones/actualizar/(:num)', 'Reparaciones::actualizar/$1');

//socios
$routes->get('/socios', 'Socios::index');
$routes->get('/socios/nuevo', 'Socios::nuevo');
$routes->post('/socios/guardar', 'Socios::guardar');
$routes->get('/socios/borrar/(:num)', 'Socios::borrar/$1');
$routes->get('/socios/editar/(:num)', 'Socios::editar/$1');
$routes->post('/socios/actualizar/(:num)', 'Socios::actualizar/$1');

//cajas
$routes->get('/cajas', 'Caja::index');
$routes->get('/cajas/nuevo', 'Caja::nuevo');
$routes->post('/cajas/guardar', 'Caja::guardar');
$routes->get('/cajas/borrar/(:num)', 'Caja::borrar/$1');
$routes->get('/cajas/editar/(:num)', 'Caja::editar/$1');
$routes->post('/cajas/actualizar/(:num)', 'Caja::actualizar/$1');

//recaudadores
$routes->get('/recaudadores', 'Recaudadores::index');
$routes->get('/recaudadores/nuevo', 'Recaudadores::nuevo');
$routes->post('/recaudadores/guardar', 'Recaudadores::guardar');
$routes->get('/recaudadores/borrar/(:num)', 'Recaudadores::borrar/$1');
$routes->get('/recaudadores/editar/(:num)', 'Recaudadores::editar/$1');
$routes->post('/recaudadores/actualizar/(:num)', 'Recaudadores::actualizar/$1');

$routes->get('/liquidaciones', 'Liquidaciones::index');
$routes->get('/liquidaciones/nuevo', 'Liquidaciones::nuevo');
$routes->post('/liquidaciones/guardar', 'Liquidaciones::guardar');
$routes->get('/liquidaciones/borrar/(:num)', 'Liquidaciones::borrar/$1');
$routes->get('/liquidaciones/editar/(:num)', 'Liquidaciones::editar/$1');
$routes->post('/liquidaciones/actualizar/(:num)', 'Liquidaciones::actualizar/$1');
$routes->get('/liquidaciones/listado_socio/(:num)', 'Liquidaciones::listado_socio/$1');


//login
$routes->get('/login', 'Login::index');
$routes->post('/login/validar', 'Login::validar');
$routes->get('/login/logout', 'Login::logout');

//Pagos
$routes->get('/pagos/nuevo/(:num)/(:num)', 'Pagos::nuevo/$1/$2');
$routes->post('/pagos/guardar', 'Pagos::guardar');
