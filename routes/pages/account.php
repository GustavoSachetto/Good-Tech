<?php

use App\Http\Request;
use App\Http\Response;
use App\Controller\Pages\Admin;

// Rota da página minha conta
$obRouter->get('/conta/dados', [
    'middlewares' => [
        'require-login'
    ],
    function (Request $request) {
        return new Response(200, Admin\AccountController::getAccount($request));
    }
]);

// Rota para deslogar o usuário da conta
$obRouter->get('/conta/logout', [
    'middlewares' => [
        'require-login'
    ],
    function (Request $request) {
        return new Response(200, Admin\AccountController::setLogout($request) . "");
    }
]);