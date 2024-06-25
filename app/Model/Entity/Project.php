<?php

namespace App\Model\Entity;

use PDOStatement;
use App\Model\DatabaseManager\Database;

class Project
{
    public int $id;
    
    public string $title;
    public string $description;
    public string|null $image = null;
    public string|null $access_link = null;
    public string $created_at;
    
    public int $user_id;
    public string $user_name;

    public bool $deleted = false;

    private static $fields = 'project.*, user.name as user_name';

    /**
     * Método responsável por cadastrar a instância atual no banco de dados
     */
    public function create(): bool
    {
        $this->id = (new Database('project'))->insert([
            'title'       => $this->title,
            'description' => $this->description,
            'image'       => $this->image,
            'access_link' => $this->access_link,
            'user_id'     => $this->user_id,
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
            'description' => $this->description,
            'image'       => $this->image,
            'access_link' => $this->access_link,
            'created_at'  => $this->created_at,
            'user_id'     => $this->user_id,
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
    public static function getProjects(
        string $where = null, 
        string $order = null, 
        string $limit = null, 
        string $fields = null
        ): PDOStatement
    {
        $DBProject = new Database('project');
        $DBProject->join('user', 'project.user_id = user.id');

        return $DBProject->select($where, $order, $limit, $fields ?? self::$fields);
    }

    /**
     * Método reponsável por retornar um dado com base no seu ID
     */
    public static function getProjectById(int $id): Project|string
    {
        return self::getProjects("id = {$id}")->fetchObject(self::class);
    }

    /**
     * Método reponsável por retornar um dado com base no seu titulo
     */
    public static function getProjectByTitle(string $title): Project|string
    {
        return self::getProjects("title = '{$title}'")->fetchObject(self::class);
    }
}
