<?php

namespace App\Controller\Pages\Public;

use App\Utils\View;
use App\Http\Request;
use App\Utils\Examiner;
use App\Controller\Page;
use App\Model\Entity\User as EntityUser;
use App\Controller\Components\AlertController;
use App\Session\Login\User as SessionLoginUser;

class LoginController extends Page
{
    /**
     * Método responsável por pegar o conteúdo da página login
     */
    public static function getFormLogin(Request $request, string $errorMessage = null): string
    {
        $alert = !is_null($errorMessage) ? AlertController::get('danger', $errorMessage) : '';

        $title = 'Good tech | Entre agora na sua conta';
        $content = View::render('pages/public/login/form-login', [
            'alert' => $alert
        ]);
        
        return parent::getPage($title, $content);
    }

    /**
     * Método responsável por setar o login do usuário
     */
    public static function setLogin(Request $request): string
    {
        $vars = $request->getPostVars();

        try {
            Examiner::checkRequiredFields([
                'email'    => $vars['email'] ?? null,
                'password' => $vars['password'] ?? null
            ]);
            $obUser = EntityUser::getUserByEmail($vars['email']);
            Examiner::checkObjectNotExiste($obUser, EntityUser::class);
            Examiner::checkUserPassword($vars['password'], $obUser);
        } catch (\Throwable) {
            return self::getFormLogin($request, 'E-mail ou Senha inválidos!');
        }

        SessionLoginUser::login($obUser);
        $request->getRouter()->redirect('/conta/dados');
    }   

    /**
     * Método responsável por pegar o conteúdo da página de cadastro
     */
    public static function getFormRegister(Request $request, string $errorMessage = null): string
    {
        $alert = !is_null($errorMessage) ? AlertController::get('danger', $errorMessage) : '';

        $title = 'Good tech | Cadastre-se agora no nosso site';
        $content = View::render('pages/public/login/form-register', [
            'alert' => $alert
        ]);
        
        return parent::getPage($title, $content);
    }   

    /**
     * Método responsável por cadastrar um novo login
     */
    public static function setRegister(Request $request): string
    {
        $vars = $request->getPostVars();

        try {
            Examiner::checkRequiredFields([
                'name'     => $vars['name'] ?? null,
                'email'    => $vars['email'] ?? null,
                'password' => $vars['password'] ?? null
            ]);

            $obUser = EntityUser::getUserByEmail($vars['email']);
            Examiner::checkObjectAlReadyExists($obUser, EntityUser::class);
            Examiner::checkPassword($vars['password']);

            $obUser = new EntityUser;
            $obUser->name            = $vars['name'];
            $obUser->email           = $vars['email'];
            $obUser->password_hash   = password_hash($vars['password'], PASSWORD_DEFAULT);
            $obUser->create();

        } catch (\Throwable $th) {
            return self::getFormRegister($request, $th->getMessage());
        }

        SessionLoginUser::login($obUser);
        $request->getRouter()->redirect('/conta/dados');
    }   
}
