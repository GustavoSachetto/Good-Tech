<?php

namespace App\Controller\Pages\Common;

use App\Utils\View;
use App\Controller\Page;

class HomeController extends Page
{
    /**
     * Método responsável por pegar o conteúdo da página home
     */
    public static function get(): string
    {
        $title = 'Good tech | Bem vindo ao nosso Blog sobre Acessibilidade Digital';
        $content = View::render('pages/common/home');
        
        return parent::getPage($title, $content);
    }
}
