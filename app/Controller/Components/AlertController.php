<?php

namespace App\Controller\Components;

use App\Utils\View;

class AlertController
{
    /**
     * Método responsável por pegar um componente de alerta
     */
    public static function get(string $type, string $message): string
    {
        return View::render('components/alert', [
            'type'=> $type,
            'message'=> $message
        ]);
    }
}
