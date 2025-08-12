-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/05/2025 às 04:55
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_campus_hope`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cidade`
--

CREATE TABLE `tb_cidade` (
  `cd_cidade` int(11) NOT NULL,
  `nm_cidade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cidade`
--

INSERT INTO `tb_cidade` (`cd_cidade`, `nm_cidade`) VALUES
(1, 'Santos'),
(2, 'São Vicente'),
(3, 'Guarujá'),
(4, 'Praia Grande'),
(5, 'Cubatão'),
(6, 'Bertioga'),
(7, 'Mongaguá'),
(8, 'Itanhaém'),
(9, 'Peruíbe');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_comment`
--

CREATE TABLE `tb_comment` (
  `cd_comment` int(11) NOT NULL,
  `ds_comment` text DEFAULT NULL,
  `dt_comment` datetime NOT NULL,
  `cd_news` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_comment`
--

INSERT INTO `tb_comment` (`cd_comment`, `ds_comment`, `dt_comment`, `cd_news`, `cd_usuario`) VALUES
(1, 'muito bomm', '0000-00-00 00:00:00', 3, 20),
(2, 'uaaau', '0000-00-00 00:00:00', 3, 20);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_curso`
--

CREATE TABLE `tb_curso` (
  `cd_curso` int(11) NOT NULL,
  `nm_curso` varchar(100) NOT NULL,
  `cd_instituicao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_curso`
--

INSERT INTO `tb_curso` (`cd_curso`, `nm_curso`, `cd_instituicao`) VALUES
(4, 'Educação Física', 2),
(5, 'Fisioterapia', 2),
(6, 'Nutrição', 2),
(7, 'Psicologia', 2),
(8, 'Serviço Social', 2),
(9, 'Terapia Ocupacional', 2),
(10, 'Interdisciplinar em Ciência e Tecnologia do Mar', 2),
(11, 'Engenharia Ambiental', 2),
(12, 'Engenharia do Petróleo e Recursos Renováveis', 2),
(13, 'Administração', 4),
(14, 'Arquitetura e Urbanismo', 4),
(15, 'Biomedicina', 4),
(16, 'Ciências Biológicas - Bacharelado', 4),
(17, 'Ciências Contábeis', 4),
(18, 'Direito', 4),
(19, 'Educação Física', 4),
(20, 'Enfermagem', 4),
(21, 'Engenharia Civil', 4),
(22, 'Engenharia de Computação', 4),
(23, 'Engenharia de Produção', 4),
(24, 'Engenharia Elétrica', 4),
(25, 'Engenharia Mecânica', 4),
(26, 'Engenharia Química', 4),
(27, 'Farmácia', 4),
(28, 'Fisioterapia', 4),
(29, 'Jornalismo', 4),
(30, 'Nutrição', 4),
(31, 'Odontologia', 4),
(32, 'Pedagogia', 4),
(33, 'Psicologia', 4),
(34, 'Publicidade e Propaganda', 4),
(35, 'Relações Internacionais', 4),
(36, 'Relações Internacionais & Direito', 4),
(37, 'Sistemas de Informação', 4),
(38, 'Análise e Desenvolvimento de Sistemas', 4),
(39, 'Comércio Exterior', 4),
(40, 'Design Gráfico', 4),
(41, 'Logística', 4),
(42, 'Marketing', 4),
(43, 'Direito', 6),
(44, 'Enfermagem', 6),
(45, 'Psicologia', 6),
(46, 'Análise e Desenvolvimento de Sistemas', 6),
(47, 'Negócios Imobiliários', 6),
(48, 'Comércio Exterior', 6),
(49, 'Gestão de Pessoas', 6),
(50, 'Estética e Cosmética', 6),
(51, 'Pedagogia (EaD)', 6),
(60, 'Análise e Desenvolvimento de Sistemas', 7),
(61, 'Ciência de Dados', 7),
(62, 'Gestão Empresarial', 7),
(63, 'Gestão Portuária', 7),
(64, 'Gestão de Recursos Humanos', 7),
(65, 'Logística', 7),
(66, 'Processos Gerenciais', 7),
(67, 'Sistemas para Internet', 7),
(68, 'Administração', 3),
(69, 'Arquitetura e Urbanismo', 3),
(70, 'Artes Visuais', 3),
(71, 'Biblioteconomia', 3),
(72, 'Ciências Biológicas (Licenciatura)', 3),
(73, 'Ciências Contábeis', 3),
(74, 'Ciências Econômicas', 3),
(75, 'Ciências Sociais', 3),
(76, 'Design de Moda', 3),
(77, 'Educação Especial', 3),
(78, 'Educação Física (Licenciatura)', 3),
(79, 'Educação Física (Bacharelado)', 3),
(80, 'Engenharia Ambiental', 3),
(81, 'Engenharia de Produção', 3),
(82, 'Engenharia de Alimentos', 3),
(83, 'Engenharia da Computação', 3),
(84, 'Engenharia da Produção (Química)', 3),
(85, 'Marketing', 3),
(86, 'Medicina', 3),
(87, 'Medicina Veterinária', 3),
(88, 'Odontologia', 3),
(89, 'Publicidade e Propaganda', 3),
(90, 'Administração', 1),
(91, 'Arquitetura e Urbanismo', 1),
(92, 'Ciência da Computação', 1),
(93, 'Ciências Biológicas (Bacharelado)', 1),
(94, 'Ciências Biológicas (Licenciatura)', 1),
(95, 'Ciências Contábeis', 1),
(96, 'Ciências Econômicas', 1),
(97, 'Cinema e Audiovisual', 1),
(98, 'Engenharia Ambiental', 1),
(99, 'Engenharia Civil', 1),
(100, 'Engenharia de Petróleo', 1),
(101, 'Engenharia de Produção', 1),
(102, 'Engenharia Mecânica', 1),
(103, 'Engenharia Química', 1),
(104, 'Jornalismo', 1),
(105, 'Letras (Português/Inglês)', 1),
(106, 'Matemática', 1),
(107, 'Música', 1),
(108, 'Pedagogia', 1),
(109, 'Produção Multimídia', 1),
(110, 'Publicidade e Propaganda', 1),
(111, 'Química', 1),
(112, 'Química Tecnológica', 1),
(113, 'Relações Internacionais', 1),
(114, 'Relações Públicas', 1),
(115, 'Sistemas de Informação', 1),
(116, 'Tradução e Interpretação', 1),
(117, 'Ciências Biológicas', 5),
(118, 'Ciências Biomédicas', 5),
(119, 'Ecologia', 5),
(120, 'Educação Física', 5),
(121, 'Enfermagem', 5),
(122, 'Engenharia Agronômica', 5),
(123, 'Engenharia de Pesca', 5),
(124, 'Engenharia Florestal', 5),
(125, 'Farmácia', 5),
(126, 'Fisioterapia', 5),
(127, 'Fonoaudiologia', 5),
(128, 'Medicina', 5),
(129, 'Medicina Veterinária', 5),
(130, 'Nutrição', 5),
(131, 'Odontologia', 5),
(132, 'Terapia Ocupacional', 5),
(133, 'Zootecnia', 5),
(134, 'Ciência da Computação', 5),
(135, 'Engenharia Aeronáutica', 5),
(136, 'Engenharia Ambiental', 5),
(137, 'Engenharia Biotecnológica', 5),
(138, 'Engenharia Cartográfica e de Agrimensura', 5),
(139, 'Engenharia Civil', 5),
(140, 'Engenharia de Alimentos', 5),
(141, 'Engenharia de Bioprocessos e Biotecnologia', 5),
(142, 'Engenharia de Biossistemas', 5),
(143, 'Engenharia de Controle e Automação', 5),
(144, 'Engenharia de Energia', 5),
(145, 'Engenharia de Materiais', 5),
(146, 'Engenharia de Produção', 5),
(147, 'Engenharia Eletrônica e de Telecomunicações', 5),
(148, 'Engenharia Elétrica', 5),
(149, 'Engenharia Industrial Madeireira', 5),
(150, 'Engenharia Mecânica', 5),
(151, 'Engenharia Química', 5),
(152, 'Estatística', 5),
(153, 'Física', 5),
(154, 'Física Médica', 5),
(155, 'Geologia', 5),
(156, 'Matemática', 5),
(157, 'Meteorologia', 5),
(158, 'Química', 5),
(159, 'Sistemas de Informação', 5),
(160, 'Administração', 5),
(161, 'Administração Pública', 5),
(162, 'Arquitetura e Urbanismo', 5),
(163, 'Arquivologia', 5),
(164, 'Arte-Teatro e Artes Cênicas', 5),
(165, 'Artes Visuais', 5),
(166, 'Biblioteconomia', 5),
(167, 'Ciências Econômicas', 5),
(168, 'Ciências Sociais', 5),
(169, 'Jornalismo', 5),
(170, 'Comunicação: Rádio, Tv e Internet', 5),
(171, 'Design', 5),
(172, 'Direito', 5),
(173, 'Filosofia', 5),
(174, 'Geografia', 5),
(175, 'História', 5),
(176, 'Letras', 5),
(177, 'Letras – Tradutor', 5),
(178, 'Música', 5),
(179, 'Pedagogia', 5),
(180, 'Psicologia', 5),
(181, 'Relações Internacionais', 5),
(182, 'Relações Públicas', 5),
(183, 'Serviço Social', 5),
(184, 'Turismo', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_instituicao`
--

CREATE TABLE `tb_instituicao` (
  `cd_instituicao` int(11) NOT NULL,
  `nm_instituicao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_instituicao`
--

INSERT INTO `tb_instituicao` (`cd_instituicao`, `nm_instituicao`) VALUES
(1, 'UNISANTOS'),
(2, 'UNIFESP'),
(3, 'UNIMES'),
(4, 'UNISANTA'),
(5, 'UNESP'),
(6, 'UNAERP'),
(7, 'FATEC');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_news`
--

CREATE TABLE `tb_news` (
  `cd_news` int(11) NOT NULL,
  `nm_titulo` varchar(250) NOT NULL,
  `ds_conteudo` text NOT NULL,
  `dt_publicacao` datetime NOT NULL,
  `cd_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_news`
--

INSERT INTO `tb_news` (`cd_news`, `nm_titulo`, `ds_conteudo`, `dt_publicacao`, `cd_usuario`) VALUES
(1, 'Teste', 'teste', '2025-05-16 03:02:04', 20),
(2, 'teste 1', 'conteuuuuudo', '2025-07-31 10:10:10', 20),
(3, 'oi', 'teste 3', '2025-06-26 18:20:13', 20);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_react`
--

CREATE TABLE `tb_react` (
  `cd_react` int(11) NOT NULL,
  `tp_react` enum('curtir','amei','triste','raiva') DEFAULT NULL,
  `dt_react` datetime NOT NULL,
  `cd_news` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_react`
--

INSERT INTO `tb_react` (`cd_react`, `tp_react`, `dt_react`, `cd_news`, `cd_usuario`) VALUES
(1, 'raiva', '2025-05-26 13:52:18', 3, 20),
(2, 'curtir', '0000-00-00 00:00:00', 2, 20);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_rota`
--

CREATE TABLE `tb_rota` (
  `cd_rota` int(11) NOT NULL,
  `nm_rota` varchar(250) NOT NULL,
  `cd_cidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_rota`
--

INSERT INTO `tb_rota` (`cd_rota`, `nm_rota`, `cd_cidade`) VALUES
(3, 'Terminal Rodoviário de Santos - Estação Jaime Rodrigues Estrela Jr.', 1),
(4, 'Terminal Rodoviário de São Vicente - Terminal Barreiros', 2),
(5, 'Rodoviária Municipal de Guarujá - Av. Santos Dumont, 480 – Santo Antônio', 3),
(6, 'Terminal Rodoviário Urbano de Passageiros – Praça das Nações Unidas – Ferry Boat', 3),
(7, 'Terminal Rodoviário Urbano de Passageiros – Vicente de Carvalho – Av. Senador Salgado Filho', 3),
(8, 'Terminal Rodoviário e Urbano Francisco Gomes da Silva – Tatico', 4),
(9, 'Terminal Tude Bastos', 4),
(10, 'Terminal Rodoviário de Cubatão', 5),
(11, 'Terminal Rodoviário de Bertioga', 6),
(12, 'Terminal Rodoviário de Mongaguá', 7),
(13, 'Terminal Rodoviário de Itanhaém', 8),
(14, 'Terminal Rodoviário de Peruíbe', 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cd_usuario` int(11) NOT NULL,
  `nm_usuario` varchar(100) NOT NULL,
  `sn_usuario` varchar(100) NOT NULL,
  `cd_telefone_usuario` varchar(20) NOT NULL,
  `cd_matricula_usuario` int(11) NOT NULL,
  `dt_periodo_usuario` varchar(4) NOT NULL,
  `nm_email_usuario` varchar(250) NOT NULL,
  `nm_senha_usuario` varchar(255) NOT NULL,
  `tp_classe` enum('admin','aluno') NOT NULL,
  `cd_cidade` int(11) NOT NULL,
  `cd_instituicao` int(11) NOT NULL,
  `cd_curso` int(11) NOT NULL,
  `cd_rota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cd_usuario`, `nm_usuario`, `sn_usuario`, `cd_telefone_usuario`, `cd_matricula_usuario`, `dt_periodo_usuario`, `nm_email_usuario`, `nm_senha_usuario`, `tp_classe`, `cd_cidade`, `cd_instituicao`, `cd_curso`, `cd_rota`) VALUES
(18, 'Nenel', 'Primeiro', '1366668888', 25252635, '2/10', 'nenel@gmail.com', '$2y$10$uM4rANZcI/1hla9sDD6Y/.LPb4xm6tZdzbAZf3abF0lNX.u/wXfye', 'aluno', 4, 7, 61, 9),
(20, 'admin', 'lindo', '11982281133', 159512536, '10/10', 'admin@extremo.com', '$2y$10$Zrrju7nCw.z9YLe9Zt8xNO6DtDSt2t3nCDMzuCO0OEoeQUBwvZUl2', 'admin', 4, 3, 85, 9),
(23, 'Maty', 'Segundo', '1311224499', 5965869, '3/10', 'maty@maty.com', '$2y$10$lU96g4UXU3neYWukzqxlruTXWaYdz5EmGqUJ3YF9JIUUH8u3s6O1.', 'aluno', 5, 5, 130, 10),
(24, 'Jorge', 'Do Mal', '13944442222', 563252654, '4/10', 'jorge@jorge.com', '$2y$10$mhlHcKvCeXtwEsLdC9UvKOIyFLS7aAaLAnLmyccQZznh95dXxCVtO', 'aluno', 6, 7, 61, 11),
(25, 'Vava', 'Terceiro', '13911115555', 56985321, '9/10', 'vava@vava.com', '$2y$10$CyG3i.ltKhZWhaHg4hXrbu4nMcWAiymzvqXKMj6/DsnD/YdfBob/u', 'aluno', 9, 3, 85, 14),
(26, 'Estevan', 'Cruz', '13977775555', 2147483647, '3/10', 'estevan@estevan.com', '$2y$10$jQYghMzWWS..QxRXVpxHo.lPx9UAWYCh4CShbx.SX6V.77s42ID6O', 'admin', 4, 4, 33, 8);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD PRIMARY KEY (`cd_cidade`);

--
-- Índices de tabela `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`cd_comment`),
  ADD KEY `fk_comment_usuario` (`cd_usuario`),
  ADD KEY `fk_comment_news` (`cd_news`);

--
-- Índices de tabela `tb_curso`
--
ALTER TABLE `tb_curso`
  ADD PRIMARY KEY (`cd_curso`),
  ADD KEY `fk_curso_instituicao` (`cd_instituicao`);

--
-- Índices de tabela `tb_instituicao`
--
ALTER TABLE `tb_instituicao`
  ADD PRIMARY KEY (`cd_instituicao`);

--
-- Índices de tabela `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`cd_news`),
  ADD KEY `fk_news_usuario` (`cd_usuario`);

--
-- Índices de tabela `tb_react`
--
ALTER TABLE `tb_react`
  ADD PRIMARY KEY (`cd_react`),
  ADD KEY `fk_react_usuario` (`cd_usuario`),
  ADD KEY `fk_react_news` (`cd_news`);

--
-- Índices de tabela `tb_rota`
--
ALTER TABLE `tb_rota`
  ADD PRIMARY KEY (`cd_rota`),
  ADD KEY `fk_rota_cidade` (`cd_cidade`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cd_usuario`),
  ADD UNIQUE KEY `nm_email_aluno` (`nm_email_usuario`),
  ADD UNIQUE KEY `nm_email_usuario` (`nm_email_usuario`),
  ADD KEY `fk_usuario_cidade` (`cd_cidade`),
  ADD KEY `fk_usuario_curso` (`cd_curso`),
  ADD KEY `fk_usuario_instituicao` (`cd_instituicao`),
  ADD KEY `fk_usuario_rota` (`cd_rota`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cidade`
--
ALTER TABLE `tb_cidade`
  MODIFY `cd_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `cd_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_curso`
--
ALTER TABLE `tb_curso`
  MODIFY `cd_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT de tabela `tb_instituicao`
--
ALTER TABLE `tb_instituicao`
  MODIFY `cd_instituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `cd_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_react`
--
ALTER TABLE `tb_react`
  MODIFY `cd_react` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_rota`
--
ALTER TABLE `tb_rota`
  MODIFY `cd_rota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD CONSTRAINT `fk_comment_news` FOREIGN KEY (`cd_news`) REFERENCES `tb_news` (`cd_news`),
  ADD CONSTRAINT `fk_comment_usuario` FOREIGN KEY (`cd_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Restrições para tabelas `tb_curso`
--
ALTER TABLE `tb_curso`
  ADD CONSTRAINT `fk_curso_instituicao` FOREIGN KEY (`cd_instituicao`) REFERENCES `tb_instituicao` (`cd_instituicao`);

--
-- Restrições para tabelas `tb_news`
--
ALTER TABLE `tb_news`
  ADD CONSTRAINT `fk_news_usuario` FOREIGN KEY (`cd_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Restrições para tabelas `tb_react`
--
ALTER TABLE `tb_react`
  ADD CONSTRAINT `fk_react_news` FOREIGN KEY (`cd_news`) REFERENCES `tb_news` (`cd_news`),
  ADD CONSTRAINT `fk_react_usuario` FOREIGN KEY (`cd_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Restrições para tabelas `tb_rota`
--
ALTER TABLE `tb_rota`
  ADD CONSTRAINT `fk_rota_cidade` FOREIGN KEY (`cd_cidade`) REFERENCES `tb_cidade` (`cd_cidade`);

--
-- Restrições para tabelas `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_usuario_cidade` FOREIGN KEY (`cd_cidade`) REFERENCES `tb_cidade` (`cd_cidade`),
  ADD CONSTRAINT `fk_usuario_curso` FOREIGN KEY (`cd_curso`) REFERENCES `tb_curso` (`cd_curso`),
  ADD CONSTRAINT `fk_usuario_instituicao` FOREIGN KEY (`cd_instituicao`) REFERENCES `tb_instituicao` (`cd_instituicao`),
  ADD CONSTRAINT `fk_usuario_rota` FOREIGN KEY (`cd_rota`) REFERENCES `tb_rota` (`cd_rota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
