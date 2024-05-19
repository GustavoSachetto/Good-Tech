<?php

use App\Http\Response;
use App\Controller\Pages;

// Modelo á ser seguido na definição de rotas das páginas da aplicação

$obRouter->get('/pesquisa', [
    'middlewares' => [
        'cache'
    ],
    function ($request) {
        return new Response(200, Pages\PostController::get($request));
    }
]);

$obRouter->get('/pesquisa/{id}', [
    'middlewares' => [
        'cache'
    ],
    function ($id) {
        return new Response(200, Pages\PostController::fetch($id));
    }
]);

$obRouter->get('/nova-pesquisa', [
    'middlewares' => [
        'require-login'
    ],
    function ($request) {
        return new Response(200, Pages\PostController::getForm($request));
    }
]);

$obRouter->post('/nova-pesquisa', [
    function ($request) {
        return new Response(200, Pages\PostController::set($request));
    }
]);