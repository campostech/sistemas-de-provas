-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Set-2020 às 23:58
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
  `CURSO` varchar(100) DEFAULT NULL,
  `DISCIPLINA` varchar(100) DEFAULT NULL,
  `QUANTIDADE` int(3) DEFAULT NULL,
  `FRENTE_VERSO` tinyint(1) DEFAULT NULL,
  `STATUS` int(2) DEFAULT 1,
  `B64FILE` longtext DEFAULT NULL,
  `DATA_SOLICITACAO` date NOT NULL,
  `ID_PROFESSOR` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(2, 'Resolvida', '#00b300'),
(3, 'Recusada', '#c90000'),
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
  `CPF` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID`, `NOME`, `EMAIL`, `SENHA`, `ID_PERFIL`, `CPF`) VALUES
(1, 'Eduardo Cha', 'eduardo@eduardo.com', '25f9e794323b453885f5181f1b624d0b', 2, '27320052075');

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
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `impressoes`
--
ALTER TABLE `impressoes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
