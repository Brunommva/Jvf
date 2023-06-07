-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jun-2023 às 01:48
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_jvf`
--
DROP DATABASE IF EXISTS `db_jvf`;
CREATE DATABASE IF NOT EXISTS `db_jvf` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_jvf`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `codigo` int(11) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codigo`, `categoria`) VALUES
(3, 'Carro'),
(4, 'Moto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `codigo` int(11) NOT NULL,
  `grupo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`codigo`, `grupo`) VALUES
(1, 'A - Veiculos Economicos'),
(2, 'B - Veiculos Automáticos'),
(3, 'C - Veiculos Utilitarios');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_gestao`
--

CREATE TABLE `login_gestao` (
  `codigo` int(11) NOT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login_gestao`
--

INSERT INTO `login_gestao` (`codigo`, `senha`, `usuario`, `nome`, `tipo`) VALUES
(1, '202cb962ac59075b964b07152d234b70', 'jvf', 'Joao Vasconcelos', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `codigo` int(11) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `placa` varchar(9) DEFAULT NULL,
  `fk_grupo_codigo` int(11) DEFAULT NULL,
  `fk_categoria_codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`codigo`, `marca`, `modelo`, `descricao`, `ano`, `placa`, `fk_grupo_codigo`, `fk_categoria_codigo`) VALUES
(1, 'Fiat', 'Palio', 'Vermelho', 2022, 'jexx8899', 1, 3),
(2, 'Volkwagen', 'Jeta', 'Prata', 2023, 'jxx3344', 2, 3),
(3, 'Honda', 'CG 200', 'vemelho', 2022, 'ttt44332', 1, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `login_gestao`
--
ALTER TABLE `login_gestao`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `FK_veiculo_2` (`fk_grupo_codigo`),
  ADD KEY `FK_veiculo_3` (`fk_categoria_codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `grupo`
--
ALTER TABLE `grupo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `login_gestao`
--
ALTER TABLE `login_gestao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `FK_veiculo_2` FOREIGN KEY (`fk_grupo_codigo`) REFERENCES `grupo` (`codigo`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_veiculo_3` FOREIGN KEY (`fk_categoria_codigo`) REFERENCES `categoria` (`codigo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
