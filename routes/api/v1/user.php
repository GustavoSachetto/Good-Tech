<?php

use App\Http\Response;
use App\Controller\Api;

// Rota de detalhes da api
$obRouter->get('/api/v1', [
    function ($request) {
        return new Response(200, Api\UserController::details($request), 'application/json');
    }
]);

// Rota de busca de usuários
$obRouter->get('/api/v1/users', [
    'middlewares' => [
        'cache'
    ],
    function ($request) {
        return new Response(200, Api\UserController::get($request), 'application/json');
    }
]);
