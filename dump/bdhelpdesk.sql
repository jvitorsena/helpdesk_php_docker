-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 07-Jun-2022 às 00:21
-- Versão do servidor: 8.0.28
-- versão do PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdhelpdesk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `codigo_categoria` int NOT NULL,
  `nome_categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbcategoria`
--

INSERT INTO `tbcategoria` (`codigo_categoria`, `nome_categoria`) VALUES
(1, 'Suporte');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbchamados`
--

CREATE TABLE `tbchamados` (
  `codigo_chamado` int NOT NULL,
  `titulo_chamado` varchar(50) NOT NULL,
  `descricao_chamado` varchar(250) NOT NULL,
  `codigo_categoria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbchamados`
--

INSERT INTO `tbchamados` (`codigo_chamado`, `titulo_chamado`, `descricao_chamado`, `codigo_categoria`) VALUES
(1, 'titulo', 'descricao', 1),
(2, 'Um titulo de chamado', 'Descrição de chamado de teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuarios`
--

CREATE TABLE `tbusuarios` (
  `codigo_usuario` int NOT NULL COMMENT 'Código Identificador',
  `nome_usuario` varchar(100) NOT NULL COMMENT 'Nome do usuario',
  `descricao_usuario` varchar(100) NOT NULL COMMENT 'usuário',
  `descricao_senha` varchar(20) NOT NULL,
  `tipo_usuario` varchar(15) NOT NULL COMMENT 'administrador ou comum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbusuarios`
--

INSERT INTO `tbusuarios` (`codigo_usuario`, `nome_usuario`, `descricao_usuario`, `descricao_senha`, `tipo_usuario`) VALUES
(1, 'Priscila Nunes', 'priscila.nunes@doctum.edu.br', '123456', 'administrador'),
(2, 'Alisson Nunes', 'alisson.nunes@doctum.edu.br', '123mudar', 'comum'),
(3, 'Priscila Nunes', 'nunes@gmail.com', '123456', 'administrador');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`codigo_categoria`);

--
-- Índices para tabela `tbchamados`
--
ALTER TABLE `tbchamados`
  ADD PRIMARY KEY (`codigo_chamado`);

--
-- Índices para tabela `tbusuarios`
--
ALTER TABLE `tbusuarios`
  ADD PRIMARY KEY (`codigo_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `codigo_categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbchamados`
--
ALTER TABLE `tbchamados`
  MODIFY `codigo_chamado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbusuarios`
--
ALTER TABLE `tbusuarios`
  MODIFY `codigo_usuario` int NOT NULL AUTO_INCREMENT COMMENT 'Código Identificador', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
