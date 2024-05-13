<?php

use App\Http\Response;
use App\Controller\Pages;

// Modelo á ser seguido na definição de rotas das páginas da aplicação

$obRouter->get('/', [
    'middlewares' => [
        'cache'
    ],
    function ($request) {
        return new Response(200, Pages\HomeController::get());
    }
]);

$obRouter->get('/pesquisa', [
    'middlewares' => [
        'cache'
    ],
    function ($request) {
        return new Response(200, Pages\PesquisaController::get());
    }
]);

$obRouter->get('/sobre', [
    'middlewares' => [
        'cache'
    ],
    function ($request) {
        return new Response(200, Pages\SobreController::get());
    }
]);

$obRouter->get('/projetos', [
    'middlewares' => [
        'cache'
    ],
    function ($request) {
        return new Response(200, Pages\ProjetoController::get());
    }
]);





// $obRouter->post('/', [
//     function ($request) {
//         return new Response(200, Pages\HomeController::set($request));
//     }
// ]);

// $obRouter->put('/{id}', [
//     function ($request, $id) {
//         return new Response(200, Pages\HomeController::edit($request, $id));
//     }
// ]);

// $obRouter->delete('/{id}', [
//     function ($request, $id) {
//         return new Response(200, Pages\HomeController::delete($request, $id));
//     }
// ]);