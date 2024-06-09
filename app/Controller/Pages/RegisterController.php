<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Http\Request;
use App\Utils\Examiner;
use App\Controller\Page;
use App\Controller\Component\AlertController;
use App\Model\Entity\User as EntityUser;

class RegisterController extends Page
{
    /**
     * Método responsável por carregar a página Register
     */
    public static function get(Request $request, array $message = null): string
    {
        $alert = !is_null($message) ? AlertController::get($message['type'], $message['message']) : '';

        $title = 'Good tech | Criar conta';
        $content = View::render('pages/register', [
            'alert' => $alert
        ]);

        return parent::getPage($title, $content);
    }

    /**
     * Método responsável pegar os valores e criar conta
     */
    public static function setRegister(Request $request)
    {
        $vars = $request->getPostVars();

        $verifyInput = Examiner::checkRequiredFields([
            'email'    => $vars['email'] ?? null,
            'password' => $vars['password'] ?? null,
            'name'     => $vars['name'] ?? null
        ]);
        if ($verifyInput) {
            return self::get($request, [
                'message' => $verifyInput,
                'type'    => 'danger'
            ]);
        }

        
        $verifyEmail = EntityUser::getUserByEmail($vars['email']);
        if ($verifyEmail) {
            return self::get($request, [
                'message' => 'Email já em uso',
                'type'    => 'danger'
            ]  
        );
        }

        $obUser = new EntityUser;

        $obUser->name            = $vars['name'];
        $obUser->email           = $vars['email'];
        $obUser->password_hash   = password_hash($vars['password'], PASSWORD_DEFAULT);
        $obUser->admin_access    = 0;       //false
        $obUser->deleted         = 0;       //false

        $obUser->create();
        return self::get($request, [
            'message' => 'Conta criada com sucesso',
            'type'    => 'success'
        ]);  
    }
}
