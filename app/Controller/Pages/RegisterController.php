<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Http\Request;
use App\Utils\Examiner;
use App\Controller\Page;
use App\Controller\Component\AlertController;
use App\Model\Entity\User as EntityUser;
use App\Session\login\User as SessionLoginUser;

class RegisterController extends Page
{
    /**
     * Método responsável por carregar a página Register
     */
    public static function get(Request $request, string $errorMessage = null): string
    {
        $alert = !is_null($errorMessage) ? AlertController::get('danger', $errorMessage) : '';

        $title = 'Good tech | Criar conta';
        $content = View::render('pages/register',[
            'alert' => $alert
        ]);

        return parent::getPage($title, $content);
    }

    /**
     * Método responsável pegar os valores e criar conta
     */
    public static function setRegister(Request $request){

        $vars = $request->getPostVars();

        $verifyInput = Examiner::checkRequiredFields([
            'email'    => $vars['email'] ?? null,
            'password' => $vars['password'] ?? null
        ]);

        if($verifyInput){
            return self::get($request, $verifyInput);
        }
        
        $obUser = EntityUser::getUserByEmail($vars['email']);

        if($obUser){
            return self::get($request, 'Email já em uso');
        }
    }
}
