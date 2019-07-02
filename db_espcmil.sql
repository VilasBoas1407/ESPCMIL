-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2019 at 12:18 AM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_espcmil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_concurso`
--

CREATE TABLE `tb_concurso` (
  `id_concurso` int(11) NOT NULL,
  `desc_concurso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_concurso`
--

INSERT INTO `tb_concurso` (`id_concurso`, `desc_concurso`) VALUES
(1, 'Guarda Municipal'),
(2, 'Procurador de Justiça');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materia`
--

CREATE TABLE `tb_materia` (
  `id_materia` int(11) NOT NULL,
  `desc_materia` varchar(200) NOT NULL,
  `tb_concurso_id_concurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_materia`
--

INSERT INTO `tb_materia` (`id_materia`, `desc_materia`, `tb_concurso_id_concurso`) VALUES
(1, 'Legislação', 1),
(2, 'Informatica', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_professores`
--

CREATE TABLE `tb_professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tb_materia_id_materia` int(11) NOT NULL,
  `nivel_acesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_professores`
--

INSERT INTO `tb_professores` (`id`, `nome`, `telefone`, `senha`, `email`, `tb_materia_id_materia`, `nivel_acesso`) VALUES
(1, 'Pedro Costa', '9999', 'c6cc8094c2dc07b700ffcc36d64e2138', 'pedro@gmail.com', 1, 2),
(2, 'Murilo', '999', '0349e1b82f0e13d8088d6cdfe2b2eb67', 'murilo@gmail.com', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_questoes`
--

CREATE TABLE `tb_questoes` (
  `id_questoes` int(11) NOT NULL,
  `enunciado` varchar(100) NOT NULL,
  `alternativa_a` varchar(400) NOT NULL,
  `alternativa_b` varchar(400) NOT NULL,
  `alternativa_c` varchar(400) NOT NULL,
  `alternativa_d` varchar(400) NOT NULL,
  `resposta` varchar(100) NOT NULL,
  `explicacao` varchar(400) NOT NULL,
  `tb_materia_id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel_acesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `nome`, `telefone`, `senha`, `email`, `nivel_acesso`) VALUES
(1, 'Rafael', '999', '9135d8523ad3da99d8a4eb83afac13d1', 'rafael@gmail.com', 1),
(3, 'Caio Duarte', '999', 'c97e2b57a6c44cb28aa98211dad2811f', 'caio@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario_has_tb_concurso`
--

CREATE TABLE `tb_usuario_has_tb_concurso` (
  `tb_usuario_id` int(11) NOT NULL,
  `tb_concurso_id_concurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_usuario_has_tb_concurso`
--

INSERT INTO `tb_usuario_has_tb_concurso` (`tb_usuario_id`, `tb_concurso_id_concurso`) VALUES
(3, 1);

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
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `fk_tb_materia_tb_concurso1_idx` (`tb_concurso_id_concurso`);

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
  MODIFY `id_concurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_materia`
--
ALTER TABLE `tb_materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_professores`
--
ALTER TABLE `tb_professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_questoes`
--
ALTER TABLE `tb_questoes`
  MODIFY `id_questoes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_materia`
--
ALTER TABLE `tb_materia`
  ADD CONSTRAINT `fk_tb_materia_tb_concurso1` FOREIGN KEY (`tb_concurso_id_concurso`) REFERENCES `tb_concurso` (`id_concurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
