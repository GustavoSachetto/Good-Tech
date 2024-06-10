<?php

use App\Http\Response;
use App\Controller\Pages;

// Modelo á ser seguido na definição de rotas das páginas da aplicação

$obRouter->get('/', [
    'middlewares' => [
        'cache'
    ],
    function ($request) {
        return new Response(200, Pages\HomeController::get($request));
    }
]);

$obRouter->get('/sobre', [
    'middlewares' => [
        'cache'
    ],
    function ($request) {
        return new Response(200, Pages\AboutController::get($request));
    }
]);
