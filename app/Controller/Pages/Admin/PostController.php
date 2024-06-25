<?php

namespace App\Controller\Pages\Admin;

use App\Utils\View;
use App\Http\Request;
use App\Utils\Examiner;
use App\Controller\Page;
use App\Utils\Manager\Image;
use App\Model\Entity\Post as EntityPost;
use App\Controller\Components\CardController;
use App\Controller\Components\AlertController;
use App\Controller\Components\SelectController;
use App\Session\login\User as SessionLoginUser;
use App\Utils\Manager\DateFormatter;

class PostController extends Page
{
    /**
     * Método responsável por retornar o conteúdo da página pesquisa
     */
    public static function get(): string
    {
        $results = EntityPost::getPosts('post.deleted = false', 'post.id DESC');
        $itens = '';

        while($obPost = $results->fetchObject(EntityPost::class)) {
            $itens .= CardController::getPost($obPost);
        }

        $title = 'Good tech | Buscar pesquisas';
        $content = View::render('pages/default/post/search', [
            'cards' => $itens
        ]);

        return parent::getPage($title, $content);
    }

    /**
     * Método responsável por pegar o conteúdo da página de visualização da pesquisa
     */
    public static function fetch(Request $request, int|string $id): string
    {
        try {
            Examiner::checkId($id);
            $obPost = EntityPost::getPostById($id);
            Examiner::checkObjectNotExiste($obPost, EntityPost::class);
        } catch (\Throwable) {
            $request->getRouter()->redirect('/pesquisas');
        }

        $title = 'Good tech | '.$obPost->title;
        $content = View::render('pages/default/post/view', [
            'id'         => $obPost->id,
            'image'      => $obPost->image,
            'title'      => $obPost->title,
            'subtitle'   => $obPost->subtitle,
            'category'   => $obPost->category_name,
            'content'    => $obPost->content,
            'user_name'  => $obPost->user_name,
            'created_at' => DateFormatter::format($obPost->created_at),
        ]);
        
        return parent::getPage($title, $content);
    }

    /**
     * Método responsável por retornar o conteúdo da página cadastrar pesquisa
     */
    public static function getFormCreate(Request $request, string $errorMessage = null): string
    {
        $alert = !is_null($errorMessage) ? AlertController::get('danger', $errorMessage) : '';

        $title = 'Good tech | Cadastrar nova pesquisa';
        $content = View::render('pages/admin/post/form-create', [
            'alert'           => $alert,
            'select_category' => SelectController::getCategories(),
        ]);
        
        return parent::getPage($title, $content);
    }

    /**
     * Método responsável por cadastrar uma nova pesquisa
     */
    public static function setCreate(Request $request): string
    {
        $vars = $request->getPostVars();
        $files = $request->getFileVars();
        $user = SessionLoginUser::getLogged();

        try {
            Examiner::checkRequiredFields([
                'title'       => $vars['title'] ?? null,
                'subtitle'    => $vars['subtitle'] ?? null,
                'content'     => $vars['content'] ?? null,
                'category_id' => $vars['category_id'] ?? null,
            ]);

            $obPost = EntityPost::getPostByTitle($vars['title']);
            Examiner::checkObjectAlReadyExists($obPost, EntityPost::class);

            $image = Image::save($files['image'] ?? null, 'post', $user['id']);

            $obPost = new EntityPost;
            $obPost->title       = $vars['title'];
            $obPost->subtitle    = $vars['subtitle'];
            $obPost->content     = $vars['content'];
            $obPost->user_id     = $user['id'];
            $obPost->image       = $image ?? null;
            $obPost->category_id = $vars['category_id'];

            $obPost->create();
        } catch (\Throwable $th) {
            return self::getFormCreate($request, $th->getMessage());
        }

        return self::getFormCreate($request);
    }   
}
