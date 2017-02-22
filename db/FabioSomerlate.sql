-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 20/02/2017 às 16:59
-- Versão do servidor: 5.7.17-0ubuntu0.16.10.1
-- Versão do PHP: 7.0.8-3ubuntu3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `FabioSomerlate`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `teCategoria`
--

CREATE TABLE `teCategoria` (
  `idCategoria` int(11) NOT NULL,
  `cpNome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `teCategoria`
--

INSERT INTO `teCategoria` (`idCategoria`, `cpNome`) VALUES
(1, 'Aluguel'),
(3, 'ManutenÃ§Ã£o'),
(7, 'Venda');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tsUsuario`
--

CREATE TABLE `tsUsuario` (
  `idUsuario` int(11) NOT NULL,
  `cpNome` varchar(255) NOT NULL,
  `cpSenha` varchar(41) NOT NULL,
  `cpStatus` char(1) NOT NULL DEFAULT 'A',
  `cpNivelAcesso` char(1) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tsUsuario`
--

INSERT INTO `tsUsuario` (`idUsuario`, `cpNome`, `cpSenha`, `cpStatus`, `cpNivelAcesso`) VALUES
(5, 'Amanda', '7b52009b64fd0a2a49e6d8a939753077792b0554', 'A', 'C'),
(8, 'Fabio', '7b52009b64fd0a2a49e6d8a939753077792b0554', 'A', 'A'),
(9, 'Joao', '7b52009b64fd0a2a49e6d8a939753077792b0554', 'B', 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tuCliente`
--

CREATE TABLE `tuCliente` (
  `idCliente` int(11) NOT NULL,
  `cpNome` varchar(255) NOT NULL,
  `cpSobreNome` varchar(100) NOT NULL,
  `cpSexo` varchar(10) NOT NULL,
  `cpEmail` varchar(255) NOT NULL,
  `cpTelefone` varchar(15) NOT NULL,
  `cpDataNascimento` varchar(10) NOT NULL DEFAULT '00-00-0000',
  `cpCep` varchar(13) NOT NULL,
  `cpLogradouro` varchar(100) NOT NULL,
  `cpBairro` varchar(255) NOT NULL,
  `cpCidade` varchar(150) NOT NULL,
  `cpUf` char(2) NOT NULL,
  `cpObservacao` text NOT NULL,
  `cpNumero` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tuCliente`
--

INSERT INTO `tuCliente` (`idCliente`, `cpNome`, `cpSobreNome`, `cpSexo`, `cpEmail`, `cpTelefone`, `cpDataNascimento`, `cpCep`, `cpLogradouro`, `cpBairro`, `cpCidade`, `cpUf`, `cpObservacao`, `cpNumero`) VALUES
(15, 'Fabio', ' Somerlate', 'Masculino', 'fsomerlat@gmail.com', '(31) 3396-4172 ', '2017-20-02', '32241-150', 'Rua PÃ©gaso', 'Jardim Riacho das Pedras', 'Contagem', 'MG', 'Casa', 276),
(16, 'Amanda', 'Somerlate', 'Feminino', 'amanda@gmail.com', '(31) 3396-4172 ', '2017-01-02', '32241-150', 'Rua PÃ©gaso', 'Jardim Riacho das Pedras', 'Contagem', 'MG', 'Casa', 276);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tuProduto`
--

CREATE TABLE `tuProduto` (
  `idProduto` int(11) NOT NULL,
  `teCategoria_idCategoria` int(11) NOT NULL,
  `cpNome` varchar(100) NOT NULL,
  `cpQtd` float NOT NULL,
  `cpValor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `teCategoria`
--
ALTER TABLE `teCategoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices de tabela `tsUsuario`
--
ALTER TABLE `tsUsuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices de tabela `tuCliente`
--
ALTER TABLE `tuCliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices de tabela `tuProduto`
--
ALTER TABLE `tuProduto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `teCategoria`
--
ALTER TABLE `teCategoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `tsUsuario`
--
ALTER TABLE `tsUsuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `tuCliente`
--
ALTER TABLE `tuCliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `tuProduto`
--
ALTER TABLE `tuProduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
