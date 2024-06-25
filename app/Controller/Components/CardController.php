<?php

namespace App\Controller\Components;

use App\Utils\View;
use App\Utils\Manager\DateFormatter;
use App\Model\Entity\Post as EntityPost;
use App\Model\Entity\Project as EntityProject;

class CardController
{
    /**
     * Método responsável por retornar um componente card das pesquisas
     */
    public static function getPost(EntityPost $obPost): string
    {
        return View::render('components/card/post', [
            'id'         => $obPost->id,
            'image'      => $obPost->image,
            'title'      => $obPost->title,
            'category'   => $obPost->category_name,
            'user_name'  => $obPost->user_name,
            'created_at' => DateFormatter::format($obPost->created_at),
        ]);
    }

    /**
     * Método responsável por retornar um componente card dos projetos
     */
    public static function getProject(EntityProject $obProject): string
    {
        return View::render('components/card/project', [
            'id'          => $obProject->id,
            'title'       => $obProject->title,
            'image'       => $obProject->image,
            'user_name'   => $obProject->user_name,
            'access_link' => $obProject->access_link,
            'description' => $obProject->description,
            'created_at'  => DateFormatter::format($obProject->created_at),
        ]);
    }
}
