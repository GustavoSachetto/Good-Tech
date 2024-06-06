<?php

use App\Http\Response;
use App\Controller\Pages;

// Modelo á ser seguido na definição de rotas das páginas da aplicação

$obRouter->get('/register', [
    'middlewares' => [
        'cache'
    ],
    function ($request) {
        return new Response(200, Pages\RegisterController::get($request));
    }
]);

$obRouter->post('/register', [
    'middlewares' => [
        'cache'
    ],
    function ($request) {
        return new Response(200, Pages\RegisterController::setRegister($request));
    }
]);


