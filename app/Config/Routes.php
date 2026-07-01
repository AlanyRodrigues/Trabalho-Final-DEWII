<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --------------------------------------------------------------------
// ROTA PRINCIPAL (TELA INICIAL)
// --------------------------------------------------------------------
// Abre o formulário de cadastro direto na raiz do projeto
$routes->get('/', 'Home::index');

// --------------------------------------------------------------------
// ROTAS DE CLIENTES
// --------------------------------------------------------------------
$routes->get('clientes', 'Clientes::index');          // Listagem de clientes (futuro)
$routes->get('clientes/novo', 'Clientes::create');     // Abrir formulário via Controller Clientes
$routes->post('clientes/cadastro', 'Clientes::cadastro'); // Processar salvamento no Banco
$routes->get('clientes/edit/(:num)', 'Clientes::edit/$1'); // Abrir edição de cliente
$routes->post('clientes/update/(:num)', 'Clientes::update/$1'); // Processar atualização
$routes->post('clientes/delete/(:num)', 'Clientes::delete/$1'); // Deletar cliente

// --------------------------------------------------------------------
// ROTA DO AJAX (CARREGAMENTO DINÂMICO DE CIDADES)
// --------------------------------------------------------------------
// Rota que o JavaScript vai chamar para popular o select de cidades
$routes->get('municipios/estado/(:num)', 'Municipios::getByEstado/$1');