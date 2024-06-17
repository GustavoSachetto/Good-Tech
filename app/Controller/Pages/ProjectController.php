<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Http\Request;
use App\Controller\Page;
use App\Model\Entity\Project as EntityProject;
use App\Session\login\User as SessionLoginUser;
use App\Controller\Component\CategoryController;
use App\Utils\Examiner;
use App\Utils\ImageManager;

class ProjectController extends Page
{
    /**
     * Método responsável por retornar o conteúdo da página pesquisa
     */
    public static function get(): string
    {
        $results = EntityProject::getProject('project.deleted = false', 'project.id DESC');
        $itens = '';

        while($obProject = $results->fetchObject(EntityProject::class)) {
            $itens .= View::render('pages/project/component/card', [
                'id'         => $obProject->id,
                'image'      => $obProject->image,
                'title'      => $obProject->title,
                'subtitle'   => $obProject->subtitle,
                'category'   => $obProject->category_name,
                'user_name'  => $obProject->user_name,
                'created_at' => $obProject->created_at,
            ]);
        }

        $title = 'Good tech | Os projetos realizadas';
        $content = View::render('pages/project/posts', [
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
        $content = View::render('pages/project/new', [
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

        $obProject = EntityProject::getProjectById($id);
        Examiner::checkObjectExists($obProject, EntityProject::class);

        $title = 'Good tech | '.$obProject->title;
        $content = View::render('pages/project/view', [
            'id'         => $obProject->id,
            'image'      => $obProject->image,
            'title'      => $obProject->title,
            'subtitle'   => $obProject->subtitle,
            'category'   => $obProject->category_name,
            'content'    => $obProject->content,
            'user_name'  => $obProject->user_name,
            'created_at' => $obProject->created_at
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

        $obProject = EntityProject::getProjectByTitle($vars['title']);
        Examiner::checkObjectNotExists($obProject, EntityProject::class);
        $image = ImageManager::saveImageProject($files['image'] ?? null, $user['id']);

        $obProject = new EntityProject;

        $obProject->title       = $vars['title'];
        $obProject->subtitle    = $vars['subtitle'];
        $obProject->content     = $vars['content'];
        $obProject->user_id     = $user['id'];
        $obProject->image       = $image ?? null;
        $obProject->category_id = $vars['category_id'];

        $obProject->create();
        return self::getForm();
    }   
}
