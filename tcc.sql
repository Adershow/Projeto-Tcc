-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 19/10/2018 às 16:28
-- Versão do servidor: 10.1.32-MariaDB
-- Versão do PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `nomeAula` varchar(45) COLLATE utf8_bin NOT NULL,
  `data` datetime NOT NULL,
  `dataFinal` datetime NOT NULL,
  `descricao` text COLLATE utf8_bin NOT NULL,
  `professor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `aulas`
--

INSERT INTO `aulas` (`id`, `nomeAula`, `data`, `dataFinal`, `descricao`, `professor_id`) VALUES
(1, 'Aula de reforço', '2018-10-23 12:15:00', '2018-10-23 13:15:00', 'Hoje eu irei à aula.', 1),
(2, 'Aula Enem', '2018-10-26 16:20:00', '2018-10-26 18:20:00', 'djhsljk fgskgjf', 1),
(3, 'Aula de reforço ', '2018-10-27 18:30:00', '2018-10-27 19:30:00', 'asasdasdasd', 2),
(4, 'Aula de Enem ', '2018-10-27 19:30:00', '2018-10-27 20:30:00', 'asasdasdasd', 2),
(41, 'Aderson', '2232-03-22 22:11:00', '2321-02-23 21:23:00', 'saasasasdssssssssss', 1),
(42, 'Aderson', '2019-03-22 10:00:00', '2019-04-22 11:00:00', 'sdffffffffffffdf', 1),
(44, 'Matriz', '2018-10-23 17:00:00', '2018-10-23 19:00:00', 'Aulona de matriz', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `aulas_has_materias`
--

CREATE TABLE `aulas_has_materias` (
  `aula_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `aulas_has_materias`
--

INSERT INTO `aulas_has_materias` (`aula_id`, `materia_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 2),
(42, 1),
(42, 2),
(44, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `nome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `chat_has_usuario_professor`
--

CREATE TABLE `chat_has_usuario_professor` (
  `usuario_id` int(11) NOT NULL DEFAULT '0',
  `chat_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `conteudo` varchar(200) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL DEFAULT '0',
  `usuario_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nomes` varchar(45) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `materias`
--

INSERT INTO `materias` (`id`, `nomes`, `descricao`) VALUES
(1, 'Matemática', 'Matéria de matemática'),
(2, 'Física', 'asas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `imagem1` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `senha`, `email`, `cpf`, `uf`, `cidade`, `descricao`, `endereco`, `imagem`, `imagem1`) VALUES
(1, 'Adersons', '22', 'adersonrs@gmail.com', '04144021341', 'RS', 'Bage', 'addsa', 'padre Abilio', '199e9dce8a0bd85004271b3fcceb520d.png', NULL),
(2, 'Emanuel', '22', 'emanuel@gmail.com', '43342432', 'RS', 'Bage', 'sdfsdfdsfds', 'padre Abilio Sponchiado', 'assasas', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor_has_materias`
--

CREATE TABLE `professor_has_materias` (
  `professor_id` int(11) NOT NULL,
  `materias_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `professor_has_materias`
--

INSERT INTO `professor_has_materias` (`professor_id`, `materias_id`) VALUES
(1, 1),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `imagem1` varchar(500) NOT NULL,
  `adm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `cpf`, `uf`, `cidade`, `imagem`, `imagem1`, `adm`) VALUES
(1, 'Emanuel Alderete', 'emanuel@gmail.com', '22', '04111940041', 'RS', 'Bage', 'marque.jpg', '', 0),
(2, 'Áderson', 'adersonrs@gmail.com', '22', '43342432', 'RS', 'Bagé', 'saassa', '', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_has_aulas`
--

CREATE TABLE `usuario_has_aulas` (
  `aulas_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `usuario_has_aulas`
--

INSERT INTO `usuario_has_aulas` (`aulas_id`, `usuario_id`) VALUES
(2, 1),
(1, 2),
(4, 2),
(3, 1),
(4, 1),
(42, 1),
(42, 2),
(44, 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fk_professor` (`professor_id`);

--
-- Índices de tabela `aulas_has_materias`
--
ALTER TABLE `aulas_has_materias`
  ADD KEY `id_fk_aulas` (`aula_id`),
  ADD KEY `id_fk_matetiras` (`materia_id`);

--
-- Índices de tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `chat_has_usuario_professor`
--
ALTER TABLE `chat_has_usuario_professor`
  ADD PRIMARY KEY (`usuario_id`,`chat_id`,`professor_id`),
  ADD KEY `fk_professor_id` (`professor_id`),
  ADD KEY `fk_chat)_id` (`chat_id`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`,`chat_id`,`professor_id`,`usuario_id`),
  ADD KEY `fk_professor` (`professor_id`),
  ADD KEY `fk_chat` (`chat_id`),
  ADD KEY `fk_usuario` (`usuario_id`);

--
-- Índices de tabela `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professor_has_materias`
--
ALTER TABLE `professor_has_materias`
  ADD PRIMARY KEY (`professor_id`,`materias_id`),
  ADD KEY `materias_id` (`materias_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario_has_aulas`
--
ALTER TABLE `usuario_has_aulas`
  ADD KEY `id_fk_aula` (`aulas_id`),
  ADD KEY `id_fk_usuario` (`usuario_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `id_fk_professor` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`);

--
-- Restrições para tabelas `aulas_has_materias`
--
ALTER TABLE `aulas_has_materias`
  ADD CONSTRAINT `id_fk_aulas` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`id`),
  ADD CONSTRAINT `id_fk_matetiras` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);

--
-- Restrições para tabelas `chat_has_usuario_professor`
--
ALTER TABLE `chat_has_usuario_professor`
  ADD CONSTRAINT `fk_chat)_id` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`),
  ADD CONSTRAINT `fk_professor_id` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`),
  ADD CONSTRAINT `fk_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_chat` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`),
  ADD CONSTRAINT `fk_professor` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `professor_has_materias`
--
ALTER TABLE `professor_has_materias`
  ADD CONSTRAINT `materias_id` FOREIGN KEY (`materias_id`) REFERENCES `materias` (`id`),
  ADD CONSTRAINT `professor_id` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`);

--
-- Restrições para tabelas `usuario_has_aulas`
--
ALTER TABLE `usuario_has_aulas`
  ADD CONSTRAINT `id_fk_aula` FOREIGN KEY (`aulas_id`) REFERENCES `aulas` (`id`),
  ADD CONSTRAINT `id_fk_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
