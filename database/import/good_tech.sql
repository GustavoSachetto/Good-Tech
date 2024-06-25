-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/06/2024 às 23:25
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `good_tech`
--

USE good_tech;

-- --------------------------------------------------------

--
-- Estrutura para tabela `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `category`
--

INSERT INTO `category` (`id`, `name`, `deleted`) VALUES
(1, 'Visual', 0),
(2, 'Auditiva', 0),
(3, 'Motora', 0),
(4, 'Cognitiva', 0),
(5, 'Adaptativa', 0),
(6, 'Escopo', 0),
(7, 'Matriz', 0),
(8, 'Diagrama', 0),
(9, 'Sensitiva', 0),
(10, 'Requisitos', 0),
(11, 'Práticas', 0),
(12, 'Web', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(70) NOT NULL,
  `subtitle` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `post`
--

INSERT INTO `post` (`id`, `title`, `subtitle`, `content`, `image`, `created_at`, `user_id`, `category_id`, `deleted`) VALUES
(1, 'Pilares da Acessibilidade Digital', 'Os Princípios da Acessibilidade e sua Aplicação no Meio Digital', 'A acessibilidade digital garante que todos, independentemente de suas habilidades ou tecnologias de acesso, possam utilizar websites, aplicativos e outros recursos digitais. Ela é fundamental para construir um mundo digital mais justo e inclusivo, permitindo que pessoas com deficiência, idosos e pessoas com diferentes tecnologias de acesso usufruam de todos os benefícios da internet.<br>            <br>            Os Quatro Princípios da Acessibilidade<br>            <br>            Perceptível: A informação e os elementos da interface devem ser perceptíveis por todos os sentidos, inclusive por pessoas com deficiência visual ou auditiva.<br>            <br>            Operável: Todos os elementos da interface devem ser operáveis por diferentes mecanismos de interação, como teclado, mouse ou toque.<br>            <br>            Compreensível: A informação e a linguagem utilizadas devem ser claras, concisas e fáceis de entender por pessoas com diferentes níveis de conhecimento e habilidades cognitivas.<br>            <br>            Robusta: O conteúdo deve ser compatível com diferentes tecnologias assistivas e navegadores, garantindo o acesso a todos os usuários.', 'user-1/acessibilidade-digital.webp', '2024-06-21 19:00:49', 1, 6, 0),
(2, 'Desenho acessibilidade', 'Viabilidade técnica organizacional e humana', 'O DU consiste em uma filosofia de design que visa criar ambientes e produtos que sejam intrinsecamente inclusivos, atendendo às necessidades de uma ampla gama de usuários, independentemente de suas habilidades, características ou contexto. No âmbito educacional, o DU assume um papel fundamental na construção de um sistema educacional mais justo e equitativo.', 'user-2/desenho-acessibilidade.jpg', '2024-06-21 19:00:49', 2, 4, 0),
(3, 'O Que é uma Pessoa com Deficiência ou Mobilidade Reduzida.', 'Confira tudo no texto abaixo.', 'Pessoas portadora de mobilidade reduzida são aqueles indivíduos que por algum motivo aparente apresenta alguma dificuldade de movimentação<br>permanente ou temporária, como consequência a redução efetiva da mobilidade, flexibilidade, percepção<br>ou coordenação motora acontece.', 'user-1/mobilidade.jpg', '2024-06-21 19:00:49', 1, 5, 0),
(4, 'Viabilidade técnica organizacional e humana', 'Conheça a viabilidade técnica', 'O estudo da viabilidade técnica usada e nada mais que o resumo de tudo que vai ser construído no nosso projeto, desde a parte humana a parte técnica e tecnológica.<br>Tecnológica consiste em três pilares, são os mecanismos que usamos para construir o nosso projeto. As linguagens e seus derivados que usaremos para montar o nosso projeto será as seguintes tecnológicas: HTML, PHP, CSS, Java script e MySQL. Que será amplamente desenvolvida no projeto. Os ambientes de desenvolvimento que serão usados no nosso projeto são os: VSCode, Apache, Canva para design, PHPMyAdmin e MySQL WorkBeach.  Esse projeto será executado localmente, não tendo a intenção de rodar em servidores online. Indo pela parte de hardware das maquinas atuaremos com 3 PCs, sendo que não estamos contando com o PCs disponibilizados pela escola. I5-10400F com RX550 4gb tendo 16 Gb de Ram. pc de vocês<br>Organizacional contem toda a filosofia do projeto e os motivos desse conjunto de trabalhos acontecer e a organizado do mesmo. O âmbito desse projeto se dá unicamente pelo o aprendizado e a evolução sobre os conhecimentos sobre acessibilidade digital e também pelos novos desafios e conhecimentos sobre as respectivas linguagens de programação. Será no estilo de blog, onde terá um sistema para inserção de nova matérias, será desenvolvido totalmente em HTML, CSS, JS e PHP.<br> Viabilidade humana se dá pelas nossas relações pessoais e por nossas características e habilidades em suas melhores áreas de atuação. As pessoas que efetuarão o projeto será o Gustavo Gualda, Gustavo Sachetto e João Victor. Sendo que o Gustavo Gualda e Gustavo Sachetto tem familiaridade em cenários de programação e elaboração de códigos, já o João Victor tem facilidade em criação de design e layout. Sendo escolhido para ser o Scrum Master, Sachetto o representará, porém o Gualda também tem habilidades para dialogos e conversas.', 'user-1/viabilidade-e-organizacional.png', '2024-06-21 19:00:49', 1, 4, 0),
(5, 'Ciclo de vida', 'Confira sobre o nosso ciclo de vida implementada no projeto', 'O ciclo de vida de um software é uma estrutura que indica processos e atividades envolvidas no desenvolvimento, operação e manutenção de um software, abrangendo de fato toda a vida do sistema. Neste ciclo, existem modelos que definem como o software será desenvolvido, lançado, aprimorado e finalizado. A escolha desse modelo, que definirá a sequência de etapas das atividades, é feita entre o cliente e a equipe de desenvolvimento e várias coisas podem impactá-la, como negócio, tempo disponível, custo, equipe etc. A ordem das fases é que vai definir o ciclo de vida do seu software.', 'user-1/ciclo-de-vida-incremental.webp', '2024-06-21 19:00:49', 4, 5, 0),
(6, 'Escopo do projeto', 'Confira mais sobre o escopo', 'O Escopo do Projeto é todo o trabalho necessário para obter um produto, serviço ou resultado. Ele reúne informações relevantes sobre o projeto, como: objetivos específicos, entregas, tarefas, responsabilidades, prazos e custos. Além disso, estabelece os limites do projeto e os critérios de validação e aceitação das entregas.', 'user-1/escopo-do-projeto.jpg', '2024-06-21 19:00:49', 4, 5, 0),
(7, 'Elencar praticas NVDA para Sistema Operacional', 'Veja o que é o NVDA', 'Há diversas praticas aonde o NVDA é essencial no cotidiano de pessoas com baixa visão ou cegas, como: A navegação na WEB, edição de documentos, navegação no sistema operacional, acesso a e-mails, compatibilidade com IDEs para programação e diversas outras tarefas. Mas para isso tudo acontecer, antes o programador tinha que preparar o seu ambiente desktop para aceitar os benefícios que o NVDA tem! Na mesma maneira que há na criação do site com HTML o sistema operacional também. Concluindo, a uma grande gama de atividades e tarefas que normalmente são fáceis para gente, porém, graças ao NVDA também são fáceis para pessoas com baixa visão ou cegueira, com a vinda da tecnologia, certamente diversos tópicos entraram no meio, <br>', 'user-1/maxresdefault.jpg', '2024-06-21 19:00:49', 1, 1, 0),
(8, 'O que é acessibilidade web', 'Confira tudo no texto abaixo.', 'A ideia da acessibilidade digital é eliminar barreiras físicas que dificultam a navegação a internet, como pessoas que tenha alguma deficiência. No Brasil foi na década 80 que a acessibilidade virou lei, que visa garantir os direitos sociais e individuais das pessoas no Brasil, inclusive os das pessoas com deficiência. Porem foi em 2016 que foi promulgada a lei de acessibilidade digital, tornando obrigatório para todo site a criação de ferramentas que facilitem a navegação por parte de pessoas com deficiência, seja ela visual<br>', 'user-1/images.jpg', '2024-06-21 19:00:49', 1, 3, 0),
(9, 'NVDA para Website', 'Confira tudo no texto abaixo.', 'Preparar seu site para tecnologia NVDA é fundamental para uma boa navegabilidade dos visitantes que utilizam leitores de tela. Por tanto o principal fator é a ordem DOM do seu site é a ordem em que os leitores de tela e a tecla Tab destacam e/ou \\\"leem\\\" o conteúdo na sua página. Para isso precisamos organizar nosso site de forma lógica, por exemplo, o menu do site deve vir primeiro, seguido pelo resto dos elementos no cabeçalho, depois o título da página, o conteúdo da página etc. Se a ordem do DOM estiver incorreta, isso pode fazer com que o leitor de tela/tecla Tab pule uma parte ou percorra o conteúdo da sua página de forma indesejada.', 'user-2/hq720.jpg', '2024-06-21 19:00:49', 2, 2, 0),
(10, 'Estrutura Analitica de Projeto', 'O que é EAP?', 'A EAP (Estrutura Analítica do Projeto), do inglês Work Breakdown Structure (WBS), é uma subdivisão hierárquica do trabalho do projeto em partes menores, mais facilmente gerenciáveis. Seu objetivo primário é organizar o que deve ser feito para produzir as entregas do projeto. <br><br>\r\n\r\nA EAP garante ao gerente de projetos a visibilidade das principais entregas, facilitando o controle de tempo e de custo. Ela faz parte do processo de gerenciamento de escopo do projeto, descrito no Guia PMBOK® (Project Management Body of Knowledge), uma das principais referências em gestão de projetos do mundo. <br><br>\r\n\r\nPara quem ainda não está acostumado, a estrutura analítica de projeto pode parecer uma ferramenta muito difícil e complexa. Mas, uma vez que você adquira prática, vai perceber que ela é simplesmente a base do gerenciamento de projetos. Isso porque a EAP favorece tanto o gerente do projeto e sua equipe como o patrocinador, clientes, fornecedores e outros stakeholders (partes interessadas). <br><br>\r\n\r\n', 'user-4/estrutura-analitica.png', '2024-06-21 19:04:54', 4, 8, 0),
(11, 'Cronograma', 'O que é cronograma? pra que serve?', 'O cronograma é uma ferramenta que serve para organizar as atividades, os recursos e os prazos de um projeto em um único diagrama visual. <br><br>\r\n\r\nOu seja, é um instrumento de organização e planejamento. Ele pode ser feito no papel, em uma planilha ou até em softwares especializados, podendo ser representado graficamente ou não, o importante é que todos os envolvidos tenham uma visão clara sobre os prazos e datas de entrega. <br><br>\r\n\r\nQuanto à etimologia, a origem do termo cronograma vem do grego, onde khronos significa “tempo” e gramma significa “alguma coisa escrita ou desenhada”. <br><br>\r\n\r\nUm cronograma é útil em diversos contextos: tanto para uma família organizar suas atividades diárias, quanto para um mestre de obras que precisa entregar uma edificação dentro de um tempo pré-determinado. Ou seja, o cronograma é uma ferramenta para uso pessoal, profissional e organizacional. <br><br>\r\n\r\nE, por fim, um outro aspecto muito importante sobre o que é cronograma é o tempo, que deve ser sequenciado para que as entregas sejam feitas dentro do prazo estimado. <br><br>\r\n', 'user-4/cronograma.jpeg', '2024-06-21 19:08:24', 4, 6, 0),
(12, 'Matriz de responsabilidade', 'O que é Matriz de Reponsabilidade?', 'Matriz de responsabilidade é uma ferramenta que contribui para que os membros de uma equipe visualizem de forma mais clara os seus papéis e responsabilidades dentro de um determinado projeto. <br><br>\r\n\r\nA ideia é evitar possíveis falhas na distribuição das tarefas ou dúvidas sobre a quem pertence cada atividade. Problemas como esses podem não só comprometer a gestão de pessoal, mas também impactar negativamente no desenvolvimento e na entrega dos resultados. <br><br>\r\n\r\nOutro ponto de contribuição da matriz de responsabilidade é poder melhorar a comunicação entre os profissionais e, assim, evitar desentendimentos. <br><br>\r\n', 'user-4/matriz.png', '2024-06-21 19:12:40', 4, 8, 0),
(13, 'Pesquisa sobre Tecnologia Assistivas ', 'Confira abaixo o que é Tecnologia assistiva', 'Tecnologias Assistivas são dispositivos, equipamentos e sistemas que visam promover a autonomia, independência e qualidade de vida de pessoas com deficiência ou necessidades especiais. Essas tecnologias podem incluir desde simples adaptações até dispositivos complexos, como próteses avançadas, leitores de tela, softwares de reconhecimento de voz e aplicativos de acessibilidade. Elas são projetadas para ajudar pessoas com tipos diferentes de deficiência a superar barreiras físicas, cognitivas e sensoriais, permitindo que elas participem mais plenamente da vida cotidiana, incluindo educação, trabalho, comunicação e lazer.', 'user-3/imagem_destaque_imagem_de_capa.png', '2024-06-21 19:25:17', 3, 5, 0),
(14, 'O que são praticas NVDA', 'Praticas NVDA', 'As práticas NVDA se referem a padrões recomendados e boas práticas para desenvolver software para garantir acessibilidade para usuários com deficiência visual, sobretudo aqueles que dependem de tecnologias assistivas como o NVDA (NonVisual Desktop Access), um leitor de tela para o sistema operacional Windows. Essas práticas incluem garantir que o software seja compatível com leitores de tela, oferecendo descrições adequadas de elementos visuais e usando marcadores semânticos corretamente em código HTML, entre outros.', 'user-4/praticas-nvda.avif', '2024-06-21 19:28:58', 4, 11, 0),
(15, 'Padrão W3C', 'O que é W3C?', 'A W3C (World Wide Web Consortium) é a principal organização que consiste em padronizações de sites, sendo que ele é um consorcio internacional que conta com 450 membros, foi fundado em 1994 por Tim Berners-Lee com o intuito de levar a web ao potencial máximo. Ela cria padrões de recomendação para usar a tecnologia. <br><br>\r\n\r\nNo Brasil, o W3C começou a atuar em 1 de novembro de 2007, É um dever de todo desenvolvedor web respeitar e seguir os padrões de acessibilidade do W3C, pois de outro modo poderá impor barreiras tecnológicas a diversas pessoas, desestimulando e até mesmo impedindo o acesso a suas páginas. Como pessoas com deficiência por exemplo. <br><br>\r\n\r\n', 'user-3/padrao-w3c.jpg', '2024-06-21 19:32:00', 3, 11, 0),
(16, 'Web semântica', 'O que é e como aplicar web semântica?', 'A Web Semântica é uma extensão de World Wide Web que visa tornar o conteúdo da internet mais compreensível tanto para humanos quanto para computadores. Ela envolve a atribuição de significado semântico aos dados da web, permitindo que os computadores interpretem o conteúdo de forma mais precisa. Isso é alcançado por meio de uso de padrões de tecnologias como RDF, OWL e SPARQL. <br><br>\r\n\r\nPara aplicar a Web Semântica:<br><br>\r\nModelagem de Dados: Defina seus dados semanticamente.<br><br>\r\nUso de Padrões: Utilize RDF e OWL.<br><br>\r\nAtribuição de Significado: Atribua significado aos dados com vocabulários controlados.<br><br>\r\nEnriquecimento com Metadados: Adicione metadados semânticos.<br><br>\r\nPublicação e Consulta: Publique os dados na web e use SPARQL para consulta.<br><br>\r\nDesenvolvimento de Aplicações: Desenvolva aplicações que aproveitem os dados semânticos.<br><br>\r\n', 'user-3/web-semantica.jpg', '2024-06-21 19:34:20', 3, 12, 0),
(17, 'O que é UML?', 'Confira abaixo pra que se utilizar UML', 'A Linguagem de Modelagem Unificada (UML) é uma notação gráfica utilizada para representar modelos de software. Ela permite que os desenvolvedores comuniquem de maneira clara e visual as diferentes partes de um sistema, incluindo seus companheiros, funções e relações entre eles. A UML não é uma linguagem de programação em si, mas sim uma ferramenta para modelar e documentar as fases do desenvolvimento de sistemas orientados a objetos.', 'user-3/uml_diagram_example.webp', '2024-06-21 19:41:06', 3, 8, 0),
(18, 'O que são requisitos funcionais', 'Requisitos funcionais', 'Requisitos funcionais são descrições detalhadas das funções ou operações que um sistema, software ou produto deve executar. Descrevem o comportamento específico de um sistema em resposta a entradas específicas, definindo o que o sistema deve fazer. Esses requisitos são geralmente expressos em termos de funcionalidade, como operações de entrada e saída, processamento de dados, interação do usuário e comportamento do sistema em diferentes situações. <br><br>\r\n\r\nPor exemplo, um requisito funcional para um sistema de compras online pode ser “O sistema deve permitir que os usuários adicionem itens aos seus carrinhos de compras”, enquanto outro requisito funcional pode ser “O sistema deve calcular o preço total de compra, incluindo impostos e despesas de envio. \" Esses requisitos descrevem a funcionalidade específica que o sistema deve ter para satisfazer as necessidades do usuário e atingir os objetivos do projeto.\r\n', 'user-4/requisitos.jpg', '2024-06-21 19:48:47', 4, 10, 0),
(19, 'O que são requisitos não funcionais', 'Requisitos não funcionais', 'Os critérios não funcionais são parâmetros ou limitações que determinam as características do sistema que não estão diretamente ligadas às suas funções específicas, mas sim à sua eficácia geral, desempenho, segurança, facilidade de uso e outros elementos. Enquanto as funcionalidades descrevem o que o sistema deve realizar, os critérios não funcionais especificam de que forma o sistema deve se comportar ou quais atributos deve apresentar para cumprir com as expectativas de qualidade estabelecidas. <br><br>\r\n\r\nDiversos casos de exigências não relacionadas à funcionalidade são: <br><br>\r\n\r\nDesempenho: Características referentes à agilidade do sistema, tempos de execução, capacidade de expansão e habilidade de lidar com demandas de trabalho diversas. <br><br>\r\n\r\nFacilidade de uso: Fatores que determinam a praticidade do sistema, abrangendo elementos como interface de usuário amigável, rapidez na execução de atividades e inclusão para diversas categorias de usuários.<br><br>\r\n\r\n', 'user-4/requisitos-não-funcionais.png', '2024-06-21 19:50:29', 4, 10, 0),
(20, 'O que são requisitos de segurança ', 'Requisitos de segurança', 'Os requisitos de segurança são declarações detalhadas que especificam como um sistema ou aplicativo deve se comportar em relação à segurança. Eles podem ser funcionais (relacionados à regra de negócio) ou não funcionais (envolvendo desempenho, blindagem do sistema etc.). A criação e manutenção de um Dicionário de Dados são essenciais para garantir a consistência e a compreensão dos dados em uma organização. Portanto, o Dicionário de Dados atua como uma ponte entre o conhecimento técnico e o acesso à informação, facilitando a navegação no vasto oceano de dados.', 'user-3/requisitos-de-segurança.jpg', '2024-06-21 20:13:55', 3, 10, 0),
(21, 'O que é Diagrama de caso ', 'Diagrama de caso de uso', 'O diagrama de caso de uso é uma ferramenta importante na modelagem de sistemas e é amplamente utilizado na linguagem de modelagem unificada (UML).  <br><br>\r\nO diagrama de caso de uso é uma representação gráfica que descreve como os usuários interagem com um sistema. Ele resume os detalhes dos atores (usuários ou entidades externas) e suas interações com o sistema. Aqui estão os principais elementos do diagrama:', 'user-3/caso-de-uso.png', '2024-06-21 20:13:40', 3, 8, 0),
(22, 'Diagrama de classes', 'O que são diagrama de classes?', 'Um diagrama de classes é uma representação visual das classes em um sistema de software, mostrando seus atributos, métodos e relacionamentos entre si. Ele é uma ferramenta de modelagem utilizada na Programação Orientada a Objetos (OOP) para visualizar a estrutura e o comportamento do sistema. O diagrama de classes ajuda a entender a arquitetura do sistema, as interações entre as classes e a hierarquia de herança, além de fornecer uma visão geral das entidades e de como estão conectadas umas às outras.', 'user-3/classe.png', '2024-06-21 20:13:25', 3, 8, 0),
(23, 'O que é Dicionário de dados ', 'Dicionario de dados', 'Um Dicionário de Dados é um catálogo organizado de todos os elementos de dados relevantes para um sistema, projeto ou banco de dados. Ele contém metadados detalhados sobre cada dado, incluindo descrições, tipos, restrições e relações. A criação e manutenção de um Dicionário de Dados são essenciais para garantir a consistência e a compreensão dos dados em uma organização. Portanto, o Dicionário de Dados atua como uma ponte entre o conhecimento técnico e o acesso à informação, facilitando a navegação no vasto oceano de dados.', 'user-3/dicionario-de-dados.jpg', '2024-06-21 20:02:04', 3, 10, 0),
(24, 'Diagrama de Sequencia', 'O que é diagrama de sequencia?', 'Um diagrama de atividades é uma ferramenta que representa o fluxo de controle de atividades em um sistema ou processo. Essas são as responsabilidades dos principais elementos do esquema: \r\n<br><br>\r\nAtividade: Uma atividade representa uma unidade de trabalho executável no sistema. Isso pode ser algo que um sistema automatizado  ou uma ação manual executada por um usuário. \r\n<br><br>\r\nPontos de decisão: são pontos no diagrama onde o fluxo de controle pode seguir caminhos diferentes com base em condições específicas. Eles são representados por losangos e geralmente contêm uma condição que determina qual caminho será seguido.  \r\n<br><br>\r\nEstados inicial e final: O estado inicial marca o início do fluxo de atividade, enquanto o estado final indica o fim do processo. Eles são representados por círculos sólidos. \r\n<br><br>\r\nFluxos\r\nFork: Usado para dividir o fluxo de controle em múltiplos caminhos paralelos, permitindo que múltiplas tarefas ocorram simultaneamente. É representado por uma linha pontilhada que se divide em duas ou mais linhas.  \r\n<br><br>\r\nJoin: Usado para sincronizar  caminhos paralelos  em um único caminho de controle. É representado por uma linha pontilhada que se funde em uma única linha.  Esses elementos permitem modificar de forma clara e visual o comportamento de um sistema ou processo, mostrando como as atividades são realizadas, como as decisões são tomadas ao longo do caminho e como os caminhos paralelos de execução são coordenados e integrados.', 'user-4/diagrama-sequencia.png', '2024-06-21 20:05:57', 4, 8, 0),
(25, 'Diagrama de Atividade', 'O que são os diagramas de atividade?', 'A Linguagem de modelagem unificada inclui diversos subconjuntos de diagramas, incluindo diagramas de estrutura, de interação e de comportamento. Diagramas de atividade, junto com diagramas de caso de uso e de máquina de estados, são considerados diagramas de comportamento porque descrevem o que é necessário acontecer no sistema sendo modelado. <br><br>\r\n\r\nAs partes interessadas lidam com muitas questões, portanto, é importante se comunicar com clareza e concisão. Diagramas de atividade ajudam a unir as pessoas das áreas de negócios e de desenvolvimento de uma organização para entender o mesmo processo e comportamento. Para criar um diagrama de atividade, é necessário um conjunto de símbolos especiais, incluindo aqueles para dar partida, encerrar, fundir ou receber etapas no fluxo — o qual abordaremos de forma mais aprofundada neste guia de diagramas de atividade. <br><br>', 'user-2/diagrama-atividade.png', '2024-06-21 20:11:05', 2, 8, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `project`
--

CREATE TABLE `project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `access_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `project`
--

INSERT INTO `project` (`id`, `title`, `description`, `image`, `access_link`, `created_at`, `user_id`, `deleted`) VALUES
(1, 'Escopo e Cronograma do projeto', 'Escopo e cronograma desenvolvidos para objetivar todo o percurso do planejamento do projeto.', 'user-2/projeto-escopo.jpg', 'escopo/Escopo.pdf', '2024-06-21 20:25:00', 2, 0),
(2, 'Ciclo de vida ', 'Ciclo de vida utilizado no projeto para facilitar a gestão de tempo com a carga de trabalho diário.', 'user-2/ciclo-de-vida.jpg', 'ciclo-de-vida/Ciclo%20de%20vida.pdf', '2024-06-21 20:31:37', 2, 0),
(3, 'Análise de Requisitos', 'Documento gerado da análise dos seguintes requisitos: de sistemas, funcionais, não funcionais, de dados e de seguraça.', 'user-2/analise-de-requisitos.png', 'analise-de-requisitos/Análise%20de%20Requisitos.pdf', '2024-06-21 20:41:04', 2, 0),
(4, 'Requisitos de Interface gráfica', 'Guia de estilos gerado a partir da análise de requisitos, demonstrando as principais telas do sistema.', 'user-2/requisitos-de-interfaace-grafica.png', 'requisitos-de-interface/Guia%20de%20estilos.pdf', '2024-06-21 20:45:55', 2, 0),
(5, 'Estrutura Análitica de Projeto', 'Estrutura Análitica de Projeto (EAP), criada para demostrar todas as entregas realizadas no projeto.', 'user-2/eap.jpg', 'eap/EAP.png', '2024-06-21 20:50:26', 2, 0),
(6, 'Modelo de Entidade Relacional', 'Modelo de Entidade Relacional (MER), desenvolvido para esquematizar as tabelas no MySQL.', 'user-2/mer.png', 'banco-de-dados/Diagrama.jpg', '2024-06-21 20:55:40', 2, 0),
(7, 'Diagrama de Caso de Uso', 'Diagrama de Caso de Uso, feito com a finalidade de demonstrar o uso dos usuários logados e não logados no site.', 'user-2/caso-de-uso.png', 'diagramas-uml/caso-de-uso/Caso%20de%20Uso.png', '2024-06-21 20:59:21', 2, 0),
(8, 'Diagrama de Atividade', 'Diagrama de Atividade concluído no projeto.', 'user-2/atividade.jpg', 'diagramas-uml/atividade/Atividade.png', '2024-06-21 21:03:01', 2, 0),
(9, 'Diagrama de Classe', 'Diagrama de Classe usado para descrever as principais classes desenvolidas no sistema.', 'user-1/classe.png', 'diagramas-uml/classe/Diagrama%20de%20Classe.png', '2024-06-21 21:06:06', 1, 0),
(10, 'Matriz Responsabilidade das Pesquisas', 'Matriz de responsabilidade das pesquisas realizadas no projeto.', 'user-2/matriz-responsa.png', 'matriz/Matriz%20de%20responsabilidade.PNG', '2024-06-21 21:22:17', 2, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin_access` tinyint(1) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `admin_access`, `password_hash`, `image`, `deleted`) VALUES
(1, 'Gustavo Gualda', 'gualda@email.com', 1, '$2y$10$mUsr/jxR6XXs8lgXeaukPu/zkkOTIsX2dUus43h9sDBCuDu/upY/e', 'user-default.webp', 0),
(2, 'Gustavo Sachetto', 'sachetto@email.com', 1, '$2y$10$mUsr/jxR6XXs8lgXeaukPu/zkkOTIsX2dUus43h9sDBCuDu/upY/e', 'user-default.webp', 0),
(3, 'Patrick Felix', 'patrick@email.com', 1, '$2y$10$R4iNbyE5R7WY7rB592SpRe8fpdoCpqNbU1sAR16o9gaA6GmFfdUri', 'user-default.webp', 0),
(4, 'João Vitor', 'joao@email.com', 1, '$2y$10$R4iNbyE5R7WY7rB592SpRe8fpdoCpqNbU1sAR16o9gaA6GmFfdUri', 'user-default.webp', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Índices de tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Índices de tabela `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `project`
--
ALTER TABLE `project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Restrições para tabelas `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
