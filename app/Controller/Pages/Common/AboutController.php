<?php

namespace App\Controller\Pages\Common;

use App\Utils\View;
use App\Controller\Page;

class AboutController extends Page
{
    /**
     * Método responsável por pegar o conteúdo da página sobre
     */
    public static function get(): string
    {
        $title = 'Good tech | Sobre o projeto';
        $content = View::render('pages/common/about');
        
        return parent::getPage($title, $content);
    }
}
