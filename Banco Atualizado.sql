-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Out-2020 às 22:13
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

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

DROP TABLE IF EXISTS `impressoes`;
CREATE TABLE IF NOT EXISTS `impressoes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_IMPRESSOES` int(11) NOT NULL,
  `CURSO` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DISCIPLINA` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `QUANTIDADE` int(3) DEFAULT NULL,
  `FRENTE_VERSO` tinyint(1) DEFAULT NULL,
  `STATUS` int(2) DEFAULT '1',
  `FILE` text COLLATE utf8_unicode_ci NOT NULL,
  `DATA_SOLICITACAO` datetime NOT NULL,
  `ID_PROFESSOR` int(11) NOT NULL,
  `OBS` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID`),
  KEY `fk_tipo_impressoes` (`ID_TIPO_IMPRESSOES`),
  KEY `fk_l_id` (`STATUS`),
  KEY `ID_PROFESSOR` (`ID_PROFESSOR`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `impressoes`
--

INSERT INTO `impressoes` (`ID`, `ID_TIPO_IMPRESSOES`, `CURSO`, `DISCIPLINA`, `QUANTIDADE`, `FRENTE_VERSO`, `STATUS`, `FILE`, `DATA_SOLICITACAO`, `ID_PROFESSOR`, `OBS`) VALUES
(1, 1, 'CC', 'Redes', 2, 2, 3, '1603835396.pdf', '2020-10-02 00:00:00', 3, 'asdasd'),
(2, 3, 'Cadastro Teste', 'Gestão de Projetos', 134, 1, 4, '1603835396.pdf', '2020-10-02 00:00:00', 1, ''),
(3, 1, 'Lucas Campos', 'Teste', 1, 1, 4, '1603835396.pdf', '2020-10-16 00:00:00', 3, ''),
(4, 1, 'Lucas Campos', 'Teste', 1, 1, 4, '1603835396.pdf', '2020-10-16 00:00:00', 1, ''),
(5, 1, 'Lucas Campos', 'Teste', 1, 1, 4, '1603835396.pdf', '2020-10-16 00:00:00', 1, ''),
(6, 1, 'aaaa', 'dddd', 222, 1, 4, '1603835396.pdf', '2020-10-16 00:00:00', 1, ''),
(7, 1, 'Lucas Samuel Vieira Tonelli Campos', 'aw2', 2, 1, 2, '1603835396.pdf', '2020-10-16 08:10:30', 1, ''),
(8, 6, 'ddd', 'Teste', 222, 1, 4, '1603835396.pdf', '2020-10-16 08:10:02', 1, ''),
(9, 1, 'ffff', '2', 11, 1, 4, '1603835396.pdf', '2020-10-16 08:10:09', 1, ''),
(10, 1, 'Lucas Campos', 'Teste', 1, 1, 2, '1603835396.pdf', '2020-10-16 08:10:29', 1, ''),
(11, 1, 'Duanni', 'Teste', 333, 1, 2, '1603835396.pdf', '2020-10-16 09:10:10', 1, ''),
(12, 1, 'Duanni', 'Solicitacao Cristiano', 1, 1, 3, '1603835396.pdf', '2020-10-16 09:10:14', 3, 'Falta de Tinta'),
(13, 1, 'CC', 'Redes', 1, 1, 2, '1603835396.pdf', '2020-10-16 09:10:11', 1, ''),
(14, 1, 'Lucas Campos', 'Teste', 11, 1, 4, '1603835396.pdf', '2020-10-16 09:10:23', 6, ''),
(15, 1, 'Lucas Campos', 'Teste', 1, 2, 3, '1603835396.pdf', '2020-10-16 10:10:08', 2, 'Falta de Impressora'),
(16, 1, 'Ciências da Computação', 'Gestão de Projetos', 200, 1, 4, '1603835396.pdf', '2020-10-16 10:10:35', 7, ''),
(17, 2, 'Ciências da Computação', 'Redes', 222, 2, 4, '1603835396.pdf', '2020-10-16 10:10:57', 7, ''),
(18, 1, 'Lucas Campos', 'Displina', 22, 1, 1, '1603835396.pdf', '2020-10-27 09:10:56', 6, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

DROP TABLE IF EXISTS `perfis`;
CREATE TABLE IF NOT EXISTS `perfis` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `solicitacao_status`;
CREATE TABLE IF NOT EXISTS `solicitacao_status` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS` varchar(30) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `tipos_impressoes`;
CREATE TABLE IF NOT EXISTS `tipos_impressoes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SENHA` varchar(100) NOT NULL,
  `ID_PERFIL` int(11) NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `STATUS_USER` int(11) DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `STATUS_USER` (`STATUS_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID`, `NOME`, `EMAIL`, `SENHA`, `ID_PERFIL`, `CPF`, `STATUS_USER`) VALUES
(1, 'Eduardo Cha', 't@t.com', '25d55ad283aa400af464c76d713c07ad', 2, '87250104098', 1),
(2, 'Sauer', 'professor@p.com', '25d55ad283aa400af464c76d713c07ad', 2, '54033999094', 1),
(3, 'Cristiano', 'professor2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2, '63915459011', 1),
(4, 'Lucas Campos Lucas', 'lucassamumtz@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, '14550043679', 1),
(5, 'robinho siqueira', 'borrinho@email.com', '25f9e794323b453885f5181f1b624d0b', 2, '78876297057', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_status`
--

DROP TABLE IF EXISTS `user_status`;
CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(1, 'Ativo'),
(2, 'Inativo');

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
