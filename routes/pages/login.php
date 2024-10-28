<?php

use App\Http\Request;
use App\Http\Response;
use App\Controller\Pages\Common;

// Rota da página de login
$obRouter->get('/conta/login', [
    'middlewares' => [
        'require-logout'
    ],
    function (Request $request) {
        return new Response(200, Common\LoginController::getFormLogin($request));
    }
]);

// Rota da página de envio de login
$obRouter->post('/conta/login', [
    'middlewares' => [
        'require-logout'
    ],
    function (Request $request) {
        return new Response(200, Common\LoginController::setLogin($request));
    }
]);

// Rota da página de cadastro de login
$obRouter->get('/conta/cadastrar', [
    'middlewares' => [
        'require-logout'
    ],
    function (Request $request) {
        return new Response(200, Common\LoginController::getFormRegister($request));
    }
]);

// Rota da página de envio de cadastro de login
$obRouter->post('/conta/cadastrar', [
    'middlewares' => [
        'require-logout'
    ],
    function (Request $request) {
        return new Response(200, Common\LoginController::setRegister($request));
    }
]);