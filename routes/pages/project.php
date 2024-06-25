<?php

use App\Http\Request;
use App\Http\Response;
use App\Controller\Pages\Admin;

// Rota da página de projetos
$obRouter->get('/projetos', [
    'middlewares' => [
      'require-login'
    ],
    function (Request $request) {
        return new Response(200, Admin\ProjectController::get());
    }
]);

// Rota da página de cadastrar projetos
$obRouter->get('/projetos/cadastrar', [
    'middlewares' => [
      'require-login'
    ],
    function (Request $request) {
        return new Response(200, Admin\ProjectController::getFormCreate($request));
    }
]);

// Rota de cadastro de projetos
$obRouter->post('/projetos/cadastrar', [
    'middlewares' => [
      'require-login'
    ],
    function (Request $request) {
        return new Response(201, Admin\ProjectController::setCreate($request));
    }
]);