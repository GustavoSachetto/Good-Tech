<?php

use App\Http\Response;
use App\Controller\Pages;

// Modelo á ser seguido na definição de rotas das páginas da aplicação

$obRouter->get('/project', [
    'middlewares' => [
        'cache',
        'require-login'
    ],
    function ($request) {
        return new Response(200, Pages\ProjectController::get($request));
    }
]);

$obRouter->get('/project/{id}', [
    'middlewares' => [
        'cache',
        'require-login'
    ],
    function ($id) {
        return new Response(200, Pages\ProjectController::fetch($id));
    }
]);

$obRouter->get('/new-project', [
    'middlewares' => [
        'require-login'
    ],
    function ($request) {
        return new Response(200, Pages\ProjectController::getForm($request));
    }
]);

$obRouter->post('/new-project', [
    'middlewares' => [
        'require-login'
    ],
    function ($request) {
        return new Response(200, Pages\ProjectController::set($request));
    }
]);