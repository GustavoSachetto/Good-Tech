<?php

namespace App\Model\Entity;

use PDOStatement;
use App\Model\DatabaseManager\Database;

class Project
{
    public int $id;
    
    public string $title;
    public string $subtitle;
    public string $content;
    public string|null $image = null;
    public string $created_at;

    public int $user_id;
    public string $user_name;

    public int $category_id;
    public string $category_name;

    public bool $deleted = false;

    private static $fields = 'project.*, user.name as user_name, category.name as category_name';

    /**
     * Método responsável por cadastrar a instância atual no banco de dados
     */
    public function create(): bool
    {
        $this->id = (new Database('project'))->insert([
            'title'       => $this->title,
            'subtitle'    => $this->subtitle,
            'content'     => $this->content,
            'image'       => $this->image,
            'user_id'     => $this->user_id,
            'category_id' => $this->category_id,
            'deleted'     => $this->deleted
        ]);

        return true;
    }

    /**
     * Método responsável por atualizar os dados do banco com a instância atual
     */
    public function update(): bool
    {
        return (new Database('project'))->update('id = '.$this->id, [
            'title'       => $this->title,
            'subtitle'    => $this->subtitle,
            'content'     => $this->content,
            'image'       => $this->image,
            'user_id'     => $this->user_id,
            'category_id' => $this->category_id,
            'deleted'     => $this->deleted
        ]);
    }

    /**
     * Método responsável por excluir um dado no banco com a instância atual
     */
    public function delete(): bool
    {
        return (new Database('project'))->securityDelete('id = '.$this->id);
    }

    /**
     * Método que retorna os dados cadastrados no banco
     */
    public static function getProject(
        string $where = null, 
        string $order = null, 
        string $limit = null, 
        string $fields = null
        ): PDOStatement
    {
        $DBPost = new Database('project');

        $DBPost->join('user', 'project.user_id = user.id');
        $DBPost->join('category', 'project.category_id = category.id');

        return $DBPost->select($where, $order, $limit, $fields ?? self::$fields);
    }

    /**
     * Método reponsável por retornar um dado com base no seu ID
     */
    public static function getProjectById(int $id): Project|string
    {
        return self::getProject("project.id = {$id}")->fetchObject(self::class);
    }

    /**
     * Método reponsável por retornar um dado com base no seu título
     */
    public static function getProjectByTitle(string $title): Project|string
    {
        return self::getProject("title = '{$title}'")->fetchObject(self::class);
    }
}
