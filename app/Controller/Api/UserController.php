<?php

namespace App\Controller\Api;

use App\Controller\Api;
use App\Http\Request;
use App\Model\Entity\User as EntityUser;

class UserController extends Api
{
    /**
     * Método responsável por retornar os usuários existentes
     */
    public static function get(): array
    {   
        $results = EntityUser::getUsers(null, 'id ASC');

        while($obUser = $results->fetchObject(EntityUser::class)) {
            $itens[] = [
                'id' => $obUser->id,
                'name' => $obUser->name,
                'email' => $obUser->email,
                'admin_access' => $obUser->admin_access
            ];
        }

        return $itens;
    }

    /**
     * Método responsável por retornar os detalhes da api
     */
    public static function details(Request $request): array
    {
        return parent::getDetails();
    }
}
