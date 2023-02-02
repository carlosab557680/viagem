-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Nov-2021 às 21:04
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `core_app`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_postagem`
--

CREATE TABLE `tb_postagem` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `link` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_postagem`
--

INSERT INTO `tb_postagem` (`id`, `nome`, `link`, `descricao`, `tipo`) VALUES
(1, 'Histórico', 'https://www3.facens.br/historico', 'Consulta e impressão de Histórico de aluno Facens, graduação e Pós graduação', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_postagem`
--
ALTER TABLE `tb_postagem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_postagem`
--
ALTER TABLE `tb_postagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
