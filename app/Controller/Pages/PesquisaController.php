<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Http\Request;
use App\Controller\Page;

class PesquisaController extends Page
{
    /**
     * Método responsável por pegar o conteúdo da página home
     */
    public static function get(): string
    {
        $title = 'Good Tech | Pesquisas';
        $content = View::render('pages/pesquisa');
        $data = [
            'title'   => $title,
            'content' => $content,
        ];
        
        return parent::getPage($data);
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
