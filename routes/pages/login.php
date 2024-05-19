<?php

use App\Http\Response;
use App\Controller\Pages;

// Modelo á ser seguido na definição de rotas das páginas da aplicação

$obRouter->get('/login', [
    'middlewares' => [
        'require-logout'
    ],
    function ($request) {
        return new Response(200, Pages\LoginController::get($request));
    }
]);

$obRouter->post('/login', [
    'middlewares' => [
        'require-logout'
    ],
    function ($request) {
        return new Response(200, Pages\LoginController::setLogin($request));
    }
]);

$obRouter->get('/logout', [
    'middlewares' => [
        'require-login'
    ],
    function ($request) {
        return new Response(200, Pages\LoginController::getLogout($request));
    }
]);

$obRouter->post('/logout', [
    'middlewares' => [
        'require-login'
    ],
    function ($request) {
        return new Response(200, Pages\LoginController::setLogout($request));
    }
]);