-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Out-2020 às 18:52
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
(1, 'Eduardo Cha', 't@t.com', '25d55ad283aa400af464c76d713c07ad', 2, '87250104098', 1),
(2, 'Sauer', 'professor@p.com', '25d55ad283aa400af464c76d713c07ad', 2, '54033999094', 1),
(3, 'Cristiano', 'professor2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2, '63915459011', 1),
(4, 'Lucas Campos Lucas', 'lucassamumtz@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, '14550043679', 1),
(5, 'robinho siqueira', 'borrinho@email.com', '25f9e794323b453885f5181f1b624d0b', 2, '78876297057', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `STATUS_USER` (`STATUS_USER`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
