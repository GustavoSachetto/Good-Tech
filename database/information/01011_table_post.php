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
            'title'       => 'Pilares da Acessibilidade Digital',
            'subtitle'    => 'Os Princípios da Acessibilidade e sua Aplicação no Meio Digital',
            'content'     => 'A acessibilidade digital garante que todos, independentemente de suas habilidades ou tecnologias de acesso, possam utilizar websites, aplicativos e outros recursos digitais. Ela é fundamental para construir um mundo digital mais justo e inclusivo, permitindo que pessoas com deficiência, idosos e pessoas com diferentes tecnologias de acesso usufruam de todos os benefícios da internet.<br>            <br>            Os Quatro Princípios da Acessibilidade<br>            <br>            Perceptível: A informação e os elementos da interface devem ser perceptíveis por todos os sentidos, inclusive por pessoas com deficiência visual ou auditiva.<br>            <br>            Operável: Todos os elementos da interface devem ser operáveis por diferentes mecanismos de interação, como teclado, mouse ou toque.<br>            <br>            Compreensível: A informação e a linguagem utilizadas devem ser claras, concisas e fáceis de entender por pessoas com diferentes níveis de conhecimento e habilidades cognitivas.<br>            <br>            Robusta: O conteúdo deve ser compatível com diferentes tecnologias assistivas e navegadores, garantindo o acesso a todos os usuários.',
            'image'       => 'user-1/acessibilidade-digital.webp',
            'user_id'     => '1',
            'category_id' => '6'
        ],
        [
            'title'       => 'Desenho acessibilidade',
            'subtitle'    => 'Viabilidade técnica organizacional e humana',
            'content'     => 'O DU consiste em uma filosofia de design que visa criar ambientes e produtos que sejam intrinsecamente inclusivos, atendendo às necessidades de uma ampla gama de usuários, independentemente de suas habilidades, características ou contexto. No âmbito educacional, o DU assume um papel fundamental na construção de um sistema educacional mais justo e equitativo.',
            'image'       => 'user-2/desenho-acessibilidade.jpg',
            'user_id'     => '2',
            'category_id' => '4'
        ],
        [
            'title'       => 'O Que é uma Pessoa com Deficiência ou Mobilidade Reduzida.',
            'subtitle'    => 'Confira tudo no texto abaixo.',
            'content'     => 'Pessoas portadora de mobilidade reduzida são aqueles indivíduos que por algum motivo aparente apresenta alguma dificuldade de movimentação<br>permanente ou temporária, como consequência a redução efetiva da mobilidade, flexibilidade, percepção<br>ou coordenação motora acontece.',
            'image'       => 'user-1/mobilidade.jpg',
            'user_id'     => '1',
            'category_id' => '5'
        ],
        [
            'title'       => 'Viabilidade técnica organizacional e humana',
            'subtitle'    => 'Conheça a viabilidade técnica',
            'content'     => 'O estudo da viabilidade técnica usada e nada mais que o resumo de tudo que vai ser construído no nosso projeto, desde a parte humana a parte técnica e tecnológica.<br>Tecnológica consiste em três pilares, são os mecanismos que usamos para construir o nosso projeto. As linguagens e seus derivados que usaremos para montar o nosso projeto será as seguintes tecnológicas: HTML, PHP, CSS, Java script e MySQL. Que será amplamente desenvolvida no projeto. Os ambientes de desenvolvimento que serão usados no nosso projeto são os: VSCode, Apache, Canva para design, PHPMyAdmin e MySQL WorkBeach.  Esse projeto será executado localmente, não tendo a intenção de rodar em servidores online. Indo pela parte de hardware das maquinas atuaremos com 3 PCs, sendo que não estamos contando com o PCs disponibilizados pela escola. I5-10400F com RX550 4gb tendo 16 Gb de Ram. pc de vocês<br>Organizacional contem toda a filosofia do projeto e os motivos desse conjunto de trabalhos acontecer e a organizado do mesmo. O âmbito desse projeto se dá unicamente pelo o aprendizado e a evolução sobre os conhecimentos sobre acessibilidade digital e também pelos novos desafios e conhecimentos sobre as respectivas linguagens de programação. Será no estilo de blog, onde terá um sistema para inserção de nova matérias, será desenvolvido totalmente em HTML, CSS, JS e PHP.<br> Viabilidade humana se dá pelas nossas relações pessoais e por nossas características e habilidades em suas melhores áreas de atuação. As pessoas que efetuarão o projeto será o Gustavo Gualda, Gustavo Sachetto e João Victor. Sendo que o Gustavo Gualda e Gustavo Sachetto tem familiaridade em cenários de programação e elaboração de códigos, já o João Victor tem facilidade em criação de design e layout. Sendo escolhido para ser o Scrum Master, Sachetto o representará, porém o Gualda também tem habilidades para dialogos e conversas.',
            'image'       => 'user-1/viabilidade-e-organizacional.png',
            'user_id'     => '1',
            'category_id' => '4'
        ],
        [
            'title'       => 'Ciclo de vida',
            'subtitle'    => 'Confira sobre o nosso ciclo de vida implementada no projeto',
            'content'     => 'O ciclo de vida de um software é uma estrutura que indica processos e atividades envolvidas no desenvolvimento, operação e manutenção de um software, abrangendo de fato toda a vida do sistema. Neste ciclo, existem modelos que definem como o software será desenvolvido, lançado, aprimorado e finalizado. A escolha desse modelo, que definirá a sequência de etapas das atividades, é feita entre o cliente e a equipe de desenvolvimento e várias coisas podem impactá-la, como negócio, tempo disponível, custo, equipe etc. A ordem das fases é que vai definir o ciclo de vida do seu software.',
            'image'       => 'user-1/ciclo-de-vida-incremental.webp',
            'user_id'     => '4',
            'category_id' => '5'
        ],
        [
            'title'       => 'Escopo do projeto',
            'subtitle'    => 'Confira mais sobre o escopo',
            'content'     => 'O Escopo do Projeto é todo o trabalho necessário para obter um produto, serviço ou resultado. Ele reúne informações relevantes sobre o projeto, como: objetivos específicos, entregas, tarefas, responsabilidades, prazos e custos. Além disso, estabelece os limites do projeto e os critérios de validação e aceitação das entregas.',
            'image'       => 'user-1/escopo-do-projeto.jpg',
            'user_id'     => '4',
            'category_id' => '5'
        ],
        [
            'title'       => 'Elencar praticas NVDA para Sistema Operacional',
            'subtitle'    => 'Veja o que é o NVDA',
            'content'     => 'Há diversas praticas aonde o NVDA é essencial no cotidiano de pessoas com baixa visão ou cegas, como: A navegação na WEB, edição de documentos, navegação no sistema operacional, acesso a e-mails, compatibilidade com IDEs para programação e diversas outras tarefas. Mas para isso tudo acontecer, antes o programador tinha que preparar o seu ambiente desktop para aceitar os benefícios que o NVDA tem! Na mesma maneira que há na criação do site com HTML o sistema operacional também. Concluindo, a uma grande gama de atividades e tarefas que normalmente são fáceis para gente, porém, graças ao NVDA também são fáceis para pessoas com baixa visão ou cegueira, com a vinda da tecnologia, certamente diversos tópicos entraram no meio, <br>',
            'image'       => 'user-1/maxresdefault.jpg',
            'user_id'     => '1',
            'category_id' => '1'
        ],
        [
            'title'       => 'O que é acessibilidade web',
            'subtitle'    => 'Confira tudo no texto abaixo.',
            'content'     => 'A ideia da acessibilidade digital é eliminar barreiras físicas que dificultam a navegação a internet, como pessoas que tenha alguma deficiência. No Brasil foi na década 80 que a acessibilidade virou lei, que visa garantir os direitos sociais e individuais das pessoas no Brasil, inclusive os das pessoas com deficiência. Porem foi em 2016 que foi promulgada a lei de acessibilidade digital, tornando obrigatório para todo site a criação de ferramentas que facilitem a navegação por parte de pessoas com deficiência, seja ela visual<br>',
            'image'       => 'user-1/images.jpg',
            'user_id'     => '1',
            'category_id' => '3'
        ],
        [
            'title'       => 'NVDA para Website',
            'subtitle'    => 'Confira tudo no texto abaixo.',
            'content'     => 'Preparar seu site para tecnologia NVDA é fundamental para uma boa navegabilidade dos visitantes que utilizam leitores de tela. Por tanto o principal fator é a ordem DOM do seu site é a ordem em que os leitores de tela e a tecla Tab destacam e/ou \"leem\" o conteúdo na sua página. Para isso precisamos organizar nosso site de forma lógica, por exemplo, o menu do site deve vir primeiro, seguido pelo resto dos elementos no cabeçalho, depois o título da página, o conteúdo da página etc. Se a ordem do DOM estiver incorreta, isso pode fazer com que o leitor de tela/tecla Tab pule uma parte ou percorra o conteúdo da sua página de forma indesejada.',
            'image'       => 'user-2/hq720.jpg',
            'user_id'     => '2',
            'category_id' => '2'
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
        (new Database('post'))->securityDelete('id <= 9');
    }
};
