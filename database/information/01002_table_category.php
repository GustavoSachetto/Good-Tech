<?php

use App\Model\DatabaseManager\Database;
use App\Common\CommandLine\Required\Interaction;

return new class extends Interaction
{
    /**
     * Informações a serem inseridas na tabela
     */
    private array $informations = [
        ['name' => 'Visual'],
        ['name' => 'Auditiva'],
        ['name' => 'Motora'],
        ['name' => 'Cognitiva'],
        ['name' => 'Adaptativa'],
        ['name' => 'Escopo'],
        ['name' => 'Matriz'],
        ['name' => 'Diagrama'],
        ['name' => 'Sensitiva']
    ];

    /** 
     * Método responsável por subir a infomação no banco de dados.
    */
    public function up(): void
    {
        foreach ($this->informations as $information) {
            (new Database('category'))->insert($information);
        }
    }

    /** 
     * Método responsável por descer a infomação no banco de dados.
    */
    public function down(): void
    {
        (new Database('category'))->securityDelete('id <= 6');
    }
};
