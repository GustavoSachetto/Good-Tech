<?php

namespace App\Controller\Component;

use App\Utils\View;

class AlertController
{
    /**
     * Método responsável por retornar um component de alert
     */
    public static function get(string $type, string $message): string
    {
        return View::render('pages/form/alert', [
            'type'=> $type,
            'message'=> $message
        ]);
    }
}
