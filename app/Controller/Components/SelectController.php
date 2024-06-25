<?php

namespace App\Controller\Components;

use App\Utils\View;
use App\Model\Entity\Category as EntityCategory;

class SelectController
{
    /**
     * Método responsável por retornar um componente select da categoria
     */
    public static function getCategories(): string
    {
        $results = EntityCategory::getCategories('category.id');
        $itens = '';

        while($obCategory = $results->fetchObject(EntityCategory::class)) {
            $itens .= View::render('components/select/item', [
                'id'     => $obCategory->id,
                'name'   => $obCategory->name,
            ]);
        }

        return View::render('components/select/select', [
            'itens' => $itens,
        ]);
    }
}
