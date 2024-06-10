<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Controller\Page;
use App\Model\Entity\Post as EntityPost;

class HomeController extends Page
{
    /**
     * Método responsável por pegar o conteúdo da página home
     */
    public static function get(): string
    {
        $results = EntityPost::getPosts('post.deleted = false', 'post.id DESC');
        $itens = '';

        for ($i=0; $i < 2; $i++) { 
            $obPost = $results->fetchObject(EntityPost::class);
            $itens .= View::render('pages/home/components/post', [
                'id'         => $obPost->id,
                'image'      => $obPost->image,
                'title'      => $obPost->title,
                'subtitle'   => $obPost->subtitle,
                'category'   => $obPost->category_name,
                'user_name'  => $obPost->user_name,
                'created_at' => $obPost->created_at,
            ]);
        }       

        $title = 'Good tech | Bem vindo ao nosso Blog sobre Acessibilidade Digital';
        $content = View::render('pages/home/home',[
            'recentsPost' => $itens
        ]);
        
        return parent::getPage($title, $content);
    }

}
