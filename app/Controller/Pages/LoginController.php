<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Http\Request;
use App\Utils\Examiner;
use App\Controller\Page;
use App\Controller\Component\AlertController;
use App\Model\Entity\User as EntityUser;
use App\Session\login\User as SessionLoginUser;

class LoginController extends Page
{
    /**
     * Método responsável por pegar o conteúdo da página login
     */
    public static function get(Request $request, string $errorMessage = null): string
    {
        $alert = !is_null($errorMessage) ? AlertController::get('danger', $errorMessage) : '';

        $title = 'Good tech | Formulario de login';
        $content = View::render('pages/login', [
            'alert' => $alert
        ]);
        
        return parent::getPage($title, $content);
    }
    
    /**
     * Método responsável por definir o login do usuário
     */
    public static function setLogin(Request $request): string
    {
        $vars = $request->getPostVars();

        Examiner::checkRequiredFields([
            'email'    => $vars['email'] ?? null,
            'password' => $vars['password'] ?? null
        ]);

        $obUser = EntityUser::getUserByEmail($vars['email']);

        if (!$obUser instanceof EntityUser) {
            return self::get($request, 'E-mail ou Senha inválidos!');
        }

        if (!password_verify($vars['password'], $obUser->password_hash)) {
            return self::get($request, 'E-mail ou Senha inválidos!');
        }

        SessionLoginUser::login($obUser);
        $request->getRouter()->redirect('/');
    }   

    /**
     * Método responsável por pegar o conteúdo da página login
     */
    public static function getLogout(): string
    {
        $user = SessionLoginUser::getLogged();

        $title = 'Good tech | Informações da conta';
        $content = View::render('pages/logout', [
            'user'  => $user['name'],
            'email' => $user['email'],
        ]);
        
        return parent::getPage($title, $content);
    }

    /**
     * Método responsável por deslogar o usuário
     */
    public static function setLogout(Request $request): void
    {
        SessionLoginUser::logout();
        $request->getRouter()->redirect('/login');
    }   
}
