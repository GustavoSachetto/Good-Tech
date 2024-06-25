<?php

use App\Http\Request;
use App\Http\Response;
use App\Controller\Pages\Default;

// Rota da página de login
$obRouter->get('/conta/login', [
    'middlewares' => [
        'require-logout'
    ],
    function (Request $request) {
        return new Response(200, Default\LoginController::getFormLogin($request));
    }
]);

// Rota da página de envio de login
$obRouter->post('/conta/login', [
    'middlewares' => [
        'require-logout'
    ],
    function (Request $request) {
        return new Response(200, Default\LoginController::setLogin($request));
    }
]);

// Rota da página de cadastro de login
$obRouter->get('/conta/cadastrar', [
    'middlewares' => [
        'require-logout'
    ],
    function (Request $request) {
        return new Response(200, Default\LoginController::getFormRegister($request));
    }
]);

// Rota da página de envio de cadastro de login
$obRouter->post('/conta/cadastrar', [
    'middlewares' => [
        'require-logout'
    ],
    function (Request $request) {
        return new Response(200, Default\LoginController::setRegister($request));
    }
]);