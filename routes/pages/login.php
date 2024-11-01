<?php

use App\Http\Request;
use App\Http\Response;
use App\Controller\Pages\Public;

// Rota da página de login
$obRouter->get('/conta/login', [
    'middlewares' => [
        'require-logout'
    ],
    function (Request $request) {
        return new Response(200, Public\LoginController::getFormLogin($request));
    }
]);

// Rota da página de envio de login
$obRouter->post('/conta/login', [
    'middlewares' => [
        'require-logout'
    ],
    function (Request $request) {
        return new Response(200, Public\LoginController::setLogin($request));
    }
]);

// Rota da página de cadastro de login
$obRouter->get('/conta/cadastrar', [
    'middlewares' => [
        'require-logout'
    ],
    function (Request $request) {
        return new Response(200, Public\LoginController::getFormRegister($request));
    }
]);

// Rota da página de envio de cadastro de login
$obRouter->post('/conta/cadastrar', [
    'middlewares' => [
        'require-logout'
    ],
    function (Request $request) {
        return new Response(200, Public\LoginController::setRegister($request));
    }
]);