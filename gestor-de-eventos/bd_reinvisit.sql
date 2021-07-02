-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Set-2019 às 14:11
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_reinvisit`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb1_evento`
--

CREATE TABLE `tb1_evento` (
  `tb1_codevento` int(10) NOT NULL,
  `tb1_nomeevento` varchar(50) NOT NULL,
  `tb1_responevento` varchar(50) NOT NULL,
  `tb1_localevento` varchar(100) NOT NULL,
  `tb1_codfuncionario` int(100) NOT NULL,
  `tb1_data` varchar(50) NOT NULL,
  `tb1_hr_inicio` varchar(40) NOT NULL,
  `tb1_hr_termino` varchar(50) NOT NULL,
  `tb1_observacoes` varchar(100) NOT NULL,
  `tb1_descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb2_subevento`
--

CREATE TABLE `tb2_subevento` (
  `tb2_codsub` int(10) NOT NULL,
  `tb2_nomesub` varchar(50) NOT NULL,
  `tb2_responsub` varchar(50) NOT NULL,
  `tb2_horadatasub` datetime NOT NULL,
  `tb2_codevento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb3_visita`
--

CREATE TABLE `tb3_visita` (
  `tb3_codvisita` int(10) NOT NULL,
  `tb3_nomevisita` varchar(50) NOT NULL,
  `tb3_emailvisita` varchar(50) NOT NULL,
  `tb3_regiaovisita` varchar(50) NOT NULL,
  `tb3_bairrovisita` varchar(50) NOT NULL,
  `tb3_motivovisita` varchar(100) NOT NULL,
  `tb3_codevento` int(100) NOT NULL,
  `tb3_idadevisita` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb4_funcionario`
--

CREATE TABLE `tb4_funcionario` (
  `tb4_codfuncionario` int(10) NOT NULL,
  `tb4_nomefuncionario` varchar(50) NOT NULL,
  `tb4_instifuncionario` varchar(100) NOT NULL,
  `tb4_senhafuncionario` varchar(50) NOT NULL,
  `tb4_sobrenofuncionario` varchar(100) NOT NULL,
  `tb4_emailfuncionario` varchar(100) NOT NULL,
  `tb4_statusfuncionario` varchar(50) NOT NULL,
  `tb4_cpffuncionario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb4_funcionario`
--

INSERT INTO `tb4_funcionario` (`tb4_codfuncionario`, `tb4_nomefuncionario`, `tb4_instifuncionario`, `tb4_senhafuncionario`, `tb4_sobrenofuncionario`, `tb4_emailfuncionario`, `tb4_statusfuncionario`, `tb4_cpffuncionario`) VALUES
(1, 'lucas', '', '827ccb0eea8a706c4c34a16891f84e7b', 'viana', 'viana@viana', '0', '494.377.958-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb5_lembretes`
--

CREATE TABLE `tb5_lembretes` (
  `tb5_codlembrete` int(50) NOT NULL,
  `tb5_nomelembrete` varchar(100) NOT NULL,
  `tb5_datalembrete` varchar(100) NOT NULL,
  `tb5_assuntolembrete` varchar(100) NOT NULL,
  `tb5_codfuncionario` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb5_lembretes`
--

INSERT INTO `tb5_lembretes` (`tb5_codlembrete`, `tb5_nomelembrete`, `tb5_datalembrete`, `tb5_assuntolembrete`, `tb5_codfuncionario`) VALUES
(0, 'fghb', '22/22/2222', 'uihiu', 1),
(0, 'jkhgfjk', '32/22/2222', 'ojhoijh', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb1_evento`
--
ALTER TABLE `tb1_evento`
  ADD PRIMARY KEY (`tb1_codevento`);

--
-- Indexes for table `tb2_subevento`
--
ALTER TABLE `tb2_subevento`
  ADD PRIMARY KEY (`tb2_codsub`);

--
-- Indexes for table `tb4_funcionario`
--
ALTER TABLE `tb4_funcionario`
  ADD PRIMARY KEY (`tb4_codfuncionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb1_evento`
--
ALTER TABLE `tb1_evento`
  MODIFY `tb1_codevento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb2_subevento`
--
ALTER TABLE `tb2_subevento`
  MODIFY `tb2_codsub` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb4_funcionario`
--
ALTER TABLE `tb4_funcionario`
  MODIFY `tb4_codfuncionario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
