<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Http\Request;
use App\Controller\Page;
use App\Model\Entity\Post as EntityPost;
use App\Session\login\User as SessionLoginUser;
use App\Controller\Component\CategoryController;
use App\Utils\Examiner;
use App\Utils\ImageManager;

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
            $itens .= View::render('pages/post/component/card', [
                'id'         => $obPost->id,
                'image'      => $obPost->image,
                'title'      => $obPost->title,
                'subtitle'   => $obPost->subtitle,
                'category'   => $obPost->category_name,
                'user_name'  => $obPost->user_name,
                'created_at' => $obPost->created_at,
            ]);
        }

        $title = 'Good tech | Todas pesquisas realizadas';
        $content = View::render('pages/post/posts', [
            'card' => $itens
        ]);
        
        return parent::getPage($title, $content);
    }

    /**
     * Método responsável por retornar o conteúdo da página pesquisa
     */
    public static function getForm(): string
    {
        $title = 'Good tech | Cadastrar nova pesquisa';
        $content = View::render('pages/post/new', [
            'select_category' => CategoryController::getSelect()
        ]);
        
        return parent::getPage($title, $content);
    }
    
    /**
     * Método responsável por pegar um conteúdo específico
     */
    public static function fetch(int|string $id): string
    {
        Examiner::checkId($id);

        $obPost = EntityPost::getPostById($id);
        Examiner::checkObjectExists($obPost, EntityPost::class);

        $title = 'Good tech | '.$obPost->title;
        $content = View::render('pages/post/view', [
            'id'         => $obPost->id,
            'image'      => $obPost->image,
            'title'      => $obPost->title,
            'subtitle'   => $obPost->subtitle,
            'category'   => $obPost->category_name,
            'content'    => $obPost->content,
            'user_name'  => $obPost->user_name,
            'created_at' => $obPost->created_at
        ]);
        
        return parent::getPage($title, $content);
    }

    /**
     * Método responsável por setar um novo conteúdo
     */
    public static function set(Request $request): string
    {
        $vars = $request->getPostVars();
        $files = $request->getFileVars();
        $user = SessionLoginUser::getLogged();

        Examiner::checkRequiredFields([
            'title'       => $vars['title'] ?? null,
            'subtitle'    => $vars['subtitle'] ?? null,
            'content'     => $vars['content'] ?? null,
            'category_id' => $vars['category_id'] ?? null,
        ]);

        $obPost = EntityPost::getPostByTitle($vars['title']);
        Examiner::checkObjectNotExists($obPost, EntityPost::class);
        $image = ImageManager::saveImagePost($files['image'] ?? null, $user['id']);

        $obPost = new EntityPost;

        $obPost->title       = $vars['title'];
        $obPost->subtitle    = $vars['subtitle'];
        $obPost->content     = $vars['content'];
        $obPost->user_id     = $user['id'];
        $obPost->image       = $image ?? null;
        $obPost->category_id = $vars['category_id'];

        $obPost->create();
        return self::getForm();
    }   
}
