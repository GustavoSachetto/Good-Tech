<?php

namespace App\Controller\Component;

use App\Utils\View;
use App\Model\Entity\Category as EntityCategory;

class CategoryController
{
    /**
     * Método responsável por retornar o conteúdo
     */
    public static function getSelect(): string
    {
        $results = EntityCategory::getCategories('deleted = false', 'id ASC');
        $itens = '';

        while($obCategory = $results->fetchObject(EntityCategory::class)) {
            $itens .= View::render('pages/post/component/select/item', [
                'id'   => $obCategory->id,
                'name' => $obCategory->name,
            ]);
        }

        return View::render('pages/post/component/select/select', [
            'itens' => $itens
        ]);
    }
}
