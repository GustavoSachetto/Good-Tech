<?php

use App\Http\Request;
use App\Http\Response;
use App\Controller\Pages\Admin;

// Rota da página de pesquisas
$obRouter->get('/pesquisas', [
    function () {
        return new Response(200, Admin\PostController::get());
    }
]);

// Rota da página de visualização das pesquisas
$obRouter->get('/pesquisas/visualizar/{id}', [
    function (Request $request, string $id) {
        return new Response(200, Admin\PostController::fetch($request, $id));
    }
]);

// Rota da página cadastro de pesquisa
$obRouter->get('/pesquisas/cadastrar', [
    'middlewares' => [
        'require-login'
    ],
    function (Request $request) {
        return new Response(200, Admin\PostController::getFormCreate($request));
    }
]);

// Rota de cadastro de pesquisa
$obRouter->post('/pesquisas/cadastrar', [
    'middlewares' => [
        'require-login'
    ],
    function (Request $request) {
        return new Response(201, Admin\PostController::setCreate($request));
    }
]);