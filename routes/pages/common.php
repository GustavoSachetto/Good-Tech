<?php

use App\Http\Response;
use App\Controller\Pages\Common;

// Rota da página home
$obRouter->get('/', [
    'middlewares' => [
        'cache'
    ],
    function () {
        return new Response(200, Common\HomeController::get());
    }
]);

// Rota da página sobre
$obRouter->get('/sobre', [
    'middlewares' => [
        'cache'
    ],
    function () {
        return new Response(200, Common\AboutController::get());
    }
]);