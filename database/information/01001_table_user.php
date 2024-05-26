<?php

use App\Model\DatabaseManager\Database;
use App\Common\CommandLine\Required\Interaction;

return new class extends Interaction
{
    /**
     * Informações a serem inseridas na tabela
     */
    private array $informations = [
        [
            'name'          => 'Gustavo Gualda',
            'email'         => 'gualda@email.com',
            'admin_access'  => false,
            'image'         => 'user-default.webp',
            'password_hash' => '$2y$10$mUsr/jxR6XXs8lgXeaukPu/zkkOTIsX2dUus43h9sDBCuDu/upY/e' // admin
        ],
        [
            'name'          => 'Gustavo Sachetto',
            'email'         => 'sachetto@email.com',
            'admin_access'  => true,
            'image'         => 'user-default.webp',
            'password_hash' => '$2y$10$R4iNbyE5R7WY7rB592SpRe8fpdoCpqNbU1sAR16o9gaA6GmFfdUri' // default
        ],
        [
            'name'          => 'Patrick Felix',
            'email'         => 'patrick@email.com',
            'admin_access'  => true,
            'image'         => 'user-default.webp',
            'password_hash' => '$2y$10$R4iNbyE5R7WY7rB592SpRe8fpdoCpqNbU1sAR16o9gaA6GmFfdUri' // default
        ],
        [
            'name'          => 'João Vitor',
            'email'         => 'João@email.com',
            'admin_access'  => true,
            'image'         => 'user-default.webp',
            'password_hash' => '$2y$10$R4iNbyE5R7WY7rB592SpRe8fpdoCpqNbU1sAR16o9gaA6GmFfdUri' // default
        ]
    ];

    /** 
     * Método responsável por subir a infomação no banco de dados.
    */
    public function up(): void
    {
        foreach ($this->informations as $information) {
            (new Database('user'))->insert($information);
        }
    }

    /** 
     * Método responsável por descer a infomação no banco de dados.
    */
    public function down(): void
    {
        (new Database('user'))->securityDelete('id <= 2');
    }
};
