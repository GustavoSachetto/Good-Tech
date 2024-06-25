<?php

namespace App\Controller\Pages\Admin;

use App\Utils\View;
use App\Http\Request;
use App\Controller\Page;
use App\Session\login\User as SessionLoginUser;

class AccountController extends Page
{
    /**
     * Método responsável por pegar o conteúdo da página minha conta
     */
    public static function getAccount(): string
    {
        $user = SessionLoginUser::getLogged();

        $title = 'Good tech | Dados da minha conta';
        $content = View::render('pages/admin/account/view', [
            'name'         => $user['name'],
            'email'        => $user['email'],
            'image'        => $user['image'],
            'admin_access' => $user['admin_access'] ? 'Administrador': 'Usuário comum'
        ]);
        
        return parent::getPage($title, $content);
    }

      /**
     * Método responsável por deslogar o usuário
     */
    public static function setLogout(Request $request): void
    {
        SessionLoginUser::logout();
        $request->getRouter()->redirect('/conta/login');
    }   
}
