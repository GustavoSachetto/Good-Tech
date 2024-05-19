<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Controller\Page;

class AboutController extends Page
{
    /**
     * Método responsável por pegar o conteúdo da página home
     */
    public static function get(): string
    {
        $title = 'Good tech | Sobre';
        $content = View::render('pages/about');
        
        return parent::getPage($title, $content);
    }
}
