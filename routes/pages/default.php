<?php

use App\Http\Response;
use App\Controller\Pages\Default;

// Rota da página home
$obRouter->get('/', [
    'middlewares' => [
        'cache'
    ],
    function () {
        return new Response(200, Default\HomeController::get());
    }
]);

// Rota da página sobre
$obRouter->get('/sobre', [
    'middlewares' => [
        'cache'
    ],
    function () {
        return new Response(200, Default\AboutController::get());
    }
]);