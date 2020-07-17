-- Copiando estrutura do banco de dados para sistema_provas
CREATE DATABASE IF NOT EXISTS `sistema_provas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistema_provas`;

-- Copiando estrutura para tabela users
CREATE TABLE IF NOT EXISTS `users` (
  `CPF` BIGINT(20) NOT NULL ,
  `NOME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SENHA` varchar(100) NOT NULL,
  `ID_PERFIL` int(11) NOT NULL,

  PRIMARY KEY (`CPF`)
);


-- Copiando estrutura para tabela perfis
CREATE TABLE IF NOT EXISTS `perfis` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(100) NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


-- Inserindo dados na  tabela perfis
INSERT INTO `perfis` (`DESCRICAO`) VALUES('ADMINISTRADOR'),('PROFESSOR');

-- Copiando estrutura para tabela tipos_impressoes
CREATE TABLE IF NOT EXISTS `tipos_impressoes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(100) NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Inserindo dados na tabela tipos_impressoes
INSERT INTO `tipos_impressoes` (`DESCRICAO`) VALUES('OFICIAL 1'),('OFICIAL 2'),('PARCIAL 1'),('PARCIAL 2'),('EXAME FINAL'),('SUBSTITUITIVA'),('OUTROS');
	

-- Copiando estrutura para tabela impressoes
CREATE TABLE IF NOT EXISTS `impressoes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CPF_PROFESSOR` BIGINT(20) NOT NULL,
  `ID_TIPO_IMPRESSOES` INT(11) NOT NULL,
  `CURSO` varchar(100) DEFAULT NULL,
  `DISCPLINA` varchar(100) DEFAULT NULL,
  `QUANTIDADE` INT(3) DEFAULT NULL,
  `FRENTE_VERSO` BOOLEAN DEFAULT NULL,
  `STATUS` INT(2) DEFAULT 1,
  `LINK` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `impressoes` ADD CONSTRAINT `fk_professor` FOREIGN KEY ( `CPF_PROFESSOR` ) REFERENCES `users` ( `CPF` ) ;
ALTER TABLE `impressoes` ADD CONSTRAINT `fk_tipo_impressoes` FOREIGN KEY ( `ID_TIPO_IMPRESSOES` ) REFERENCES `tipos_impressoes` ( `ID` ) ;