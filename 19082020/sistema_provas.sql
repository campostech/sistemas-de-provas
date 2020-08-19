-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 19-Ago-2020 às 21:46
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `CPF_PROFESSOR` bigint(20) NOT NULL,
  `ID_TIPO_IMPRESSOES` int(11) NOT NULL,
  `CURSO` varchar(100) DEFAULT NULL,
  `DISCPLINA` varchar(100) DEFAULT NULL,
  `QUANTIDADE` int(3) DEFAULT NULL,
  `FRENTE_VERSO` tinyint(1) DEFAULT NULL,
  `STATUS` int(2) DEFAULT '1',
  `LINK` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_professor` (`CPF_PROFESSOR`),
  KEY `fk_tipo_impressoes` (`ID_TIPO_IMPRESSOES`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `CPF` bigint(20) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SENHA` varchar(100) NOT NULL,
  `ID_PERFIL` int(11) NOT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`CPF`, `NOME`, `EMAIL`, `SENHA`, `ID_PERFIL`) VALUES
(145200145365, 'Lucas Samuel', 'lucas@campos.com', '12341234', 0),
(145300145365, 'Rodrigo Lemos', 'rodrigo@email.com', '12341234', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
