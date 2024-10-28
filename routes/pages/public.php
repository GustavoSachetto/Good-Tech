<?php

use App\Http\Response;
use App\Controller\Pages\Public;

// Rota da página home
$obRouter->get('/', [
    'middlewares' => [
        'cache'
    ],
    function () {
        return new Response(200, Public\HomeController::get());
    }
]);

// Rota da página sobre
$obRouter->get('/sobre', [
    'middlewares' => [
        'cache'
    ],
    function () {
        return new Response(200, Public\AboutController::get());
    }
]);