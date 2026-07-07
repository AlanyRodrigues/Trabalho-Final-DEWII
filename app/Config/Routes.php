<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --------------------------------------------------------------------
// ROTA PRINCIPAL (TELA INICIAL)
// --------------------------------------------------------------------
$routes->get('/', 'Home::index');

// Dashboard
$routes->get('dashboard', 'Dashboard::index');

// Passagens
$routes->get('passagens/detalhes/(:num)', 'Passagens::detalhes/$1');

// Ajax API
$routes->get('ajax/destinos-por-origem', 'AjaxController::destinosPorOrigem');$routes->get('ajax/buscar-voos', 'AjaxController::buscarVoos');
$routes->get('ajax/assentos/(:num)', 'AjaxController::assentos/$1');
$routes->get('ajax/verificar-assento/(:num)', 'AjaxController::verificarAssento/$1');
$routes->get('ajax/passageiros', 'AjaxController::passageiros');

// Telas ADM
$routes->get('perfil', 'Perfil::index');
$routes->get('usuarios', 'Usuarios::index');

// ROTAS DE AUTENTICAÇÃO
// --------------------------------------------------------------------
$routes->get('login', '\App\Controllers\Auth\Login::index');
$routes->post('auth/login', '\App\Controllers\Auth\Login::autenticar');
$routes->get('logout', '\App\Controllers\Auth\Login::logout');

// --------------------------------------------------------------------
// ROTAS ANTIGAS DESATIVADAS
// --------------------------------------------------------------------
/*
$routes->get('clientes', 'Clientes::index');
$routes->get('clientes/novo', 'Clientes::create');
$routes->post('clientes/cadastro', 'Clientes::cadastro');
$routes->get('clientes/edit/(:num)', 'Clientes::edit/$1');
$routes->post('clientes/update/(:num)', 'Clientes::update/$1');
$routes->post('clientes/delete/(:num)', 'Clientes::delete/$1');
 
$routes->get('municipios/estado/(:num)', 'Municipios::getByEstado/$1');
*/
