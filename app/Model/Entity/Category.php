<?php

namespace App\Model\Entity;

use PDOStatement;
use App\Model\DatabaseManager\Database;

class Category
{
    public int $id;
    
    public string $name;

    public bool $deleted = false;

    /**
     * Método responsável por cadastrar a instância atual no banco de dados
     */
    public function create(): bool
    {
        $this->id = (new Database('category'))->insert([
            'name'    => $this->name,
            'deleted' => $this->deleted
        ]);

        return true;
    }

    /**
     * Método responsável por atualizar os dados do banco com a instância atual
     */
    public function update(): bool
    {
        return (new Database('category'))->update('id = '.$this->id, [
            'name'    => $this->name,
            'deleted' => $this->deleted
        ]);
    }

    /**
     * Método responsável por excluir um dado no banco com a instância atual
     */
    public function delete(): bool
    {
        return (new Database('category'))->securityDelete('id = '.$this->id);
    }

    /**
     * Método que retorna os dados cadastrados no banco
     */
    public static function getCategories(
        string $where = null, 
        string $order = null, 
        string $limit = null, 
        string $fields = '*'
        ): PDOStatement
    {
        return (new Database('category'))->select($where, $order, $limit, $fields);
    }

    /**
     * Método reponsável por retornar um dado com base no seu ID
     */
    public static function getCategoryById(int $id): Category|string
    {
        return self::getCategories("id = {$id}")->fetchObject(self::class);
    }
}
