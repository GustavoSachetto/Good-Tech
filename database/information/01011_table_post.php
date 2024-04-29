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
            'title'      => 'Pilares da Acessibilidade Digital',
            'content'    => 'Os Princípios da Acessibilidade e sua Aplicação no Meio Digital
            
            A acessibilidade digital garante que todos, independentemente de suas habilidades ou tecnologias de acesso, possam utilizar websites, aplicativos e outros recursos digitais. Ela é fundamental para construir um mundo digital mais justo e inclusivo, permitindo que pessoas com deficiência, idosos e pessoas com diferentes tecnologias de acesso usufruam de todos os benefícios da internet.
            
            Os Quatro Princípios da Acessibilidade
            
            Perceptível  : A informação e os elementos da interface devem ser perceptíveis por todos os sentidos, inclusive por pessoas com deficiência visual ou auditiva.
            
            Operável     : Todos os elementos da interface devem ser operáveis por diferentes mecanismos de interação, como teclado, mouse ou toque.
            
            Compreensível: A informação e a linguagem utilizadas devem ser claras, concisas e fáceis de entender por pessoas com diferentes níveis de conhecimento e habilidades cognitivas.
            
            Robusta      : O conteúdo deve ser compatível com diferentes tecnologias assistivas e navegadores, garantindo o acesso a todos os usuários.',
            'image'      => 'user-1/acessibilidade-digital.webp',
            'user_id'    => '1',
            'category_id'=> '6'
        ],
        [
            'title'       => 'Desenho acessibilidade',
            'content'     => 'Viabilidade técnica organizacional e humana
            O DU consiste em uma filosofia de design que visa criar ambientes e produtos que sejam intrinsecamente inclusivos, atendendo às necessidades de uma ampla gama de usuários, independentemente de suas habilidades, características ou contexto. No âmbito educacional, o DU assume um papel fundamental na construção de um sistema educacional mais justo e equitativo.',
            'image'       => 'user-2/desenho-acessibilidade.jpg',
            'user_id'     => '2',
            'category_id' => '4'
        ]
    ];

    /** 
     * Método responsável por subir a infomação no banco de dados.
    */
    public function up(): void
    {
        foreach ($this->informations as $information) {
            (new Database('post'))->insert($information);
        }
    }

    /** 
     * Método responsável por descer a infomação no banco de dados.
    */
    public function down(): void
    {
        (new Database('post'))->securityDelete('id <= 2');
    }
};
