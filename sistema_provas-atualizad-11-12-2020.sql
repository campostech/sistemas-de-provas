-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Dez-2020 às 19:05
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_provas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `impressoes`
--

CREATE TABLE `impressoes` (
  `ID` int(11) NOT NULL,
  `ID_TIPO_IMPRESSOES` int(11) NOT NULL,
  `CURSO` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DISCIPLINA` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `QUANTIDADE` int(3) DEFAULT NULL,
  `FRENTE_VERSO` tinyint(1) DEFAULT NULL,
  `STATUS` int(2) DEFAULT 1,
  `FILE` text COLLATE utf8_unicode_ci NOT NULL,
  `DATA_SOLICITACAO` datetime NOT NULL,
  `ID_PROFESSOR` int(11) NOT NULL,
  `OBS` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `impressoes`
--

INSERT INTO `impressoes` (`ID`, `ID_TIPO_IMPRESSOES`, `CURSO`, `DISCIPLINA`, `QUANTIDADE`, `FRENTE_VERSO`, `STATUS`, `FILE`, `DATA_SOLICITACAO`, `ID_PROFESSOR`, `OBS`) VALUES
(1, 4, 'Sistemas da Informação', 'Regras de Negócio', 87, 1, 3, '1606774791.pdf', '2020-11-30 07:11:51', 2, 'Quantidade excede o limite de impressoes permitidas para frente verso.'),
(3, 1, 'Engenharia da Computacao', 'Sistemas Operacionais', 100, 1, 2, '1607257271.pdf', '2020-12-06 09:12:11', 3, ''),
(2, 7, 'Ciência da Computação', 'Física Geral', 40, 1, 2, '1606876081.pdf', '2020-12-01 11:12:01', 2, ''),
(4, 3, 'Sistema da Informação', 'Fisica', 10, 1, 1, '1607257777.pdf', '2020-12-06 09:12:37', 3, ''),
(5, 5, 'Ciência da Computação', 'Redes e Arquitetura', 10, 1, 3, '1607550203.pdf', '2020-12-09 06:12:23', 2, 'Não está sendo possível imprimir arquivos devido ao COVID'),
(6, 6, 'Engenharia de Softwares', 'Arduino', 10, 1, 4, '1607639092.pdf', '2020-12-10 07:12:52', 2, ''),
(7, 1, 'Engenharia Mecânica', 'Cálculo', 20, 1, 4, '1607640459.pdf', '2020-12-10 07:12:39', 2, ''),
(8, 5, 'Ciência da Computação', 'Redes e Arquitetura', 25, 2, 4, '1607721421.pdf', '2020-12-11 06:12:01', 2, ''),
(9, 5, 'Ciência da Computação', 'Redes e Arquitetura', 100, 2, 4, '1607723760.pdf', '2020-12-11 06:12:01', 2, ''),
(10, 5, 'Ciência da Computação', 'Redes e Arquitetura', 20, 2, 1, '1607724045.pdf', '2020-12-11 07:12:45', 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

CREATE TABLE `perfis` (
  `ID` int(11) NOT NULL,
  `DESCRICAO` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfis`
--

INSERT INTO `perfis` (`ID`, `DESCRICAO`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'PROFESSOR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_status`
--

CREATE TABLE `solicitacao_status` (
  `ID` int(11) NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `solicitacao_status`
--

INSERT INTO `solicitacao_status` (`ID`, `STATUS`, `color`) VALUES
(1, 'Pendente', '#ffcc33'),
(2, 'Resolvida', '#20d638'),
(3, 'Recusada', '#DB3340'),
(4, 'Cancelado', '#ff3333');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_impressoes`
--

CREATE TABLE `tipos_impressoes` (
  `ID` int(11) NOT NULL,
  `DESCRICAO` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos_impressoes`
--

INSERT INTO `tipos_impressoes` (`ID`, `DESCRICAO`) VALUES
(1, 'OFICIAL 1'),
(2, 'OFICIAL 2'),
(3, 'PARCIAL 1'),
(4, 'PARCIAL 2'),
(5, 'EXAME FINAL'),
(6, 'SUBSTITUITIVA'),
(7, 'OUTROS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SENHA` varchar(100) NOT NULL,
  `ID_PERFIL` int(11) NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `STATUS_USER` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID`, `NOME`, `EMAIL`, `SENHA`, `ID_PERFIL`, `CPF`, `STATUS_USER`) VALUES
(1, 'Lucas Admin', 'lucasadm@techadm.com', '25f9e794323b453885f5181f1b624d0b', 1, '76197263068', 1),
(2, 'João Victor', 'joaovictor@professor.com', '25f9e794323b453885f5181f1b624d0b', 2, '93477704002', 1),
(3, 'Eduardo Professsor', 'eduardo@eduardo.com', '25f9e794323b453885f5181f1b624d0b', 2, '98149934090', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(1, 'Ativo'),
(2, 'Inativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `impressoes`
--
ALTER TABLE `impressoes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_tipo_impressoes` (`ID_TIPO_IMPRESSOES`),
  ADD KEY `fk_l_id` (`STATUS`),
  ADD KEY `ID_PROFESSOR` (`ID_PROFESSOR`);

--
-- Índices para tabela `perfis`
--
ALTER TABLE `perfis`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `solicitacao_status`
--
ALTER TABLE `solicitacao_status`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `tipos_impressoes`
--
ALTER TABLE `tipos_impressoes`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `STATUS_USER` (`STATUS_USER`);

--
-- Índices para tabela `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `impressoes`
--
ALTER TABLE `impressoes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `perfis`
--
ALTER TABLE `perfis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `solicitacao_status`
--
ALTER TABLE `solicitacao_status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipos_impressoes`
--
ALTER TABLE `tipos_impressoes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `STATUS_USER` FOREIGN KEY (`STATUS_USER`) REFERENCES `user_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
