-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Dez-2022 às 00:23
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `urna_votacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_user`
--

CREATE TABLE `admin_user` (
  `id_admin` int(11) NOT NULL,
  `user_admin` varchar(50) DEFAULT NULL,
  `password_admin` varchar(50) DEFAULT NULL,
  `admin_id_login` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `admin_user`
--

INSERT INTO `admin_user` (`id_admin`, `user_admin`, `password_admin`, `admin_id_login`) VALUES
(1, 'William', '12345', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(100) DEFAULT NULL,
  `matricula` int(11) DEFAULT NULL,
  `auth_votos` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome_aluno`, `matricula`, `auth_votos`) VALUES
(12, 'sousa', 15, 1),
(14, 'teste', 20, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chapa`
--

CREATE TABLE `chapa` (
  `id_chapa` int(11) NOT NULL,
  `nome_chapa` varchar(100) DEFAULT NULL,
  `num_chapa` int(11) NOT NULL,
  `votos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `chapa`
--

INSERT INTO `chapa` (`id_chapa`, `nome_chapa`, `num_chapa`, `votos`) VALUES
(17, 'chapa1', 10, 8),
(20, 'chapa nova', 20, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `page_result`
--

CREATE TABLE `page_result` (
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `page_result`
--

INSERT INTO `page_result` (`status`) VALUES
(0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `user_admin` (`user_admin`),
  ADD UNIQUE KEY `admin_id_login` (`admin_id_login`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Índices para tabela `chapa`
--
ALTER TABLE `chapa`
  ADD PRIMARY KEY (`id_chapa`),
  ADD UNIQUE KEY `num_chapa` (`num_chapa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `chapa`
--
ALTER TABLE `chapa`
  MODIFY `id_chapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
