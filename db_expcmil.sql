-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2019 at 01:09 PM
-- Server version: 10.2.23-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_expcmil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_concurso`
--

CREATE TABLE IF NOT EXISTS `tb_concurso` (
  `id_concurso` int(11) NOT NULL,
  `desc_concurso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_materia`
--

CREATE TABLE IF NOT EXISTS `tb_materia` (
  `id_materia` int(11) NOT NULL,
  `desc_materia` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_materia`
--

INSERT INTO `tb_materia` (`id_materia`, `desc_materia`) VALUES
(1, 'Legislação');

-- --------------------------------------------------------

--
-- Table structure for table `tb_professores`
--

CREATE TABLE IF NOT EXISTS `tb_professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel_acesso` int(11) NOT NULL,
  `tb_materia_id_materia` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_professores`
--

INSERT INTO `tb_professores` (`id`, `nome`, `telefone`, `senha`, `email`, `nivel_acesso`, `tb_materia_id_materia`) VALUES
(1, 'Pedro Costa', '31991654825', 'c6cc8094c2dc07b700ffcc36d64e2138', 'pedro@gmail.com', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_questoes`
--

CREATE TABLE IF NOT EXISTS `tb_questoes` (
  `id_questoes` int(11) NOT NULL,
  `enunciado` varchar(100) NOT NULL,
  `alternativa_a` varchar(400) NOT NULL,
  `alternativa_b` varchar(400) NOT NULL,
  `alternativa_c` varchar(400) NOT NULL,
  `alternativa_d` varchar(400) NOT NULL,
  `resposta` varchar(100) NOT NULL,
  `explicacao` varchar(400) NOT NULL,
  `tb_materia_id_materia` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_questoes`
--

INSERT INTO `tb_questoes` (`id_questoes`, `enunciado`, `alternativa_a`, `alternativa_b`, `alternativa_c`, `alternativa_d`, `resposta`, `explicacao`, `tb_materia_id_materia`) VALUES
(1, 'x', 'a', 'b', 'c', 'd', 'alternativa_d', 'alternativa D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel_acesso` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `nome`, `telefone`, `senha`, `email`, `nivel_acesso`) VALUES
(1, 'Caio Duarte', '31991952952', '973d692fc82f85d82420c2a8325881da', 'caio@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario_has_tb_concurso`
--

CREATE TABLE IF NOT EXISTS `tb_usuario_has_tb_concurso` (
  `tb_usuario_id` int(11) NOT NULL,
  `tb_concurso_id_concurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_concurso`
--
ALTER TABLE `tb_concurso`
  ADD PRIMARY KEY (`id_concurso`);

--
-- Indexes for table `tb_materia`
--
ALTER TABLE `tb_materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indexes for table `tb_professores`
--
ALTER TABLE `tb_professores`
  ADD PRIMARY KEY (`id`,`tb_materia_id_materia`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_tb_professores_tb_materia1_idx` (`tb_materia_id_materia`);

--
-- Indexes for table `tb_questoes`
--
ALTER TABLE `tb_questoes`
  ADD PRIMARY KEY (`id_questoes`),
  ADD KEY `fk_tb_questoes_tb_materia1_idx` (`tb_materia_id_materia`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usuario_has_tb_concurso`
--
ALTER TABLE `tb_usuario_has_tb_concurso`
  ADD PRIMARY KEY (`tb_usuario_id`,`tb_concurso_id_concurso`),
  ADD KEY `fk_tb_usuario_has_tb_concurso_tb_concurso1_idx` (`tb_concurso_id_concurso`),
  ADD KEY `fk_tb_usuario_has_tb_concurso_tb_usuario_idx` (`tb_usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_concurso`
--
ALTER TABLE `tb_concurso`
  MODIFY `id_concurso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_materia`
--
ALTER TABLE `tb_materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_professores`
--
ALTER TABLE `tb_professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_questoes`
--
ALTER TABLE `tb_questoes`
  MODIFY `id_questoes` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_professores`
--
ALTER TABLE `tb_professores`
  ADD CONSTRAINT `fk_tb_professores_tb_materia1` FOREIGN KEY (`tb_materia_id_materia`) REFERENCES `tb_materia` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_questoes`
--
ALTER TABLE `tb_questoes`
  ADD CONSTRAINT `fk_tb_questoes_tb_materia1` FOREIGN KEY (`tb_materia_id_materia`) REFERENCES `tb_materia` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_usuario_has_tb_concurso`
--
ALTER TABLE `tb_usuario_has_tb_concurso`
  ADD CONSTRAINT `fk_tb_usuario_has_tb_concurso_tb_concurso1` FOREIGN KEY (`tb_concurso_id_concurso`) REFERENCES `tb_concurso` (`id_concurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_usuario_has_tb_concurso_tb_usuario` FOREIGN KEY (`tb_usuario_id`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
