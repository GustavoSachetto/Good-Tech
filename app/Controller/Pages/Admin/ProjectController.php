<?php

namespace App\Controller\Pages\Admin;

use App\Utils\View;
use App\Http\Request;
use App\Utils\Examiner;
use App\Controller\Page;
use App\Utils\Manager\Image;
use App\Controller\Components\CardController;
use App\Controller\Components\AlertController;
use App\Model\Entity\Project as EntityProject;
use App\Session\Login\User as SessionLoginUser;

class ProjectController extends Page
{
    /**
     * Método responsável por retornar o conteúdo da página projetos
     */
    public static function get(): string
    {
        $results = EntityProject::getProjects('project.deleted = false', 'project.id DESC');
        $itens = '';

        while($obProject = $results->fetchObject(EntityProject::class)) {
            $itens .= CardController::getProject($obProject);
        }

        $title = 'Good tech | Buscar projetos';
        $content = View::render('pages/admin/project/search', [
            'cards' => $itens
        ]);

        return parent::getPage($title, $content);
    }

    /**
     * Método responsável por retornar o conteúdo da página cadastrar projeto
     */
    public static function getFormCreate(Request $request, string $errorMessage = null): string
    {
        $alert = !is_null($errorMessage) ? AlertController::get('danger', $errorMessage) : '';

        $title = 'Good tech | Cadastrar novo projeto';
        $content = View::render('pages/admin/project/form-create', [
            'alert' => $alert,
        ]);
        
        return parent::getPage($title, $content);
    }

    /**
     * Método responsável por cadastrar um novo projeto
     */
    public static function setCreate(Request $request): string
    {
        $vars = $request->getPostVars();
        $files = $request->getFileVars();
        $user = SessionLoginUser::getLogged();

        try {
            Examiner::checkRequiredFields([
                'title'       => $vars['title'] ?? null,
                'description' => $vars['description'] ?? null,
                'access_link' => $vars['access_link'] ?? null,
            ]);

            $obProject = EntityProject::getProjectByTitle($vars['title']);
            Examiner::checkObjectAlReadyExists($obProject, EntityProject::class);

            $image = Image::save($files['image'] ?? null, 'project', $user['id']);

            $obProject = new EntityProject;
            $obProject->title       = $vars['title'];
            $obProject->image       = $image ?? null;
            $obProject->description = $vars['description'];
            $obProject->access_link = $vars['access_link'];
            $obProject->user_id     = $user['id'];

            $obProject->create();
        } catch (\Throwable $th) {
            return self::getFormCreate($request, $th->getMessage());
        }

        return self::getFormCreate($request);
    }   
}
