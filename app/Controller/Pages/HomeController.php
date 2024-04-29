<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Http\Request;
use App\Controller\Page;

class HomeController extends Page
{
    /**
     * Método responsável por pegar o conteúdo da página home
     */
    public static function get(): string
    {
        $title = 'Good tech | Bem vindo ao nosso Blog sobre Acessibilidade Digital';
        $content = View::render('pages/home');
        
        return parent::getPage($title, $content);
    }
    
    /**
     * Método responsável por pegar um conteúdo específico da página home
     */
    public static function fetch(int|string $id): void
    {
        // código a ser criado
    }

    /**
     * Método responsável por setar um novo conteúdo da página home
     */
    public static function set(Request $request): void
    {
        // código a ser criado
    }   
    
    /**
     * Método responsável por editar um conteúdo da página home
     */
    public static function edit(Request $request, int|string $id): void
    {
        // código a ser criado
    }
    
    /**
     * Método responsável por deletar um conteúdo da página home
     */
    public static function delete(Request $request, int|string $id): void
    {
        // código a ser criado
    }
}
