-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_expcmil
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_expcmil
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_expcmil` DEFAULT CHARACTER SET utf8 ;
USE `db_expcmil` ;

-- -----------------------------------------------------
-- Table `db_expcmil`.`tb_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_expcmil`.`tb_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `nivel_acesso` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_expcmil`.`tb_concurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_expcmil`.`tb_concurso` (
  `id_concurso` INT NOT NULL AUTO_INCREMENT,
  `desc_concurso` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id_concurso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_expcmil`.`tb_materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_expcmil`.`tb_materia` (
  `id_materia` INT NOT NULL AUTO_INCREMENT,
  `desc_materia` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id_materia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_expcmil`.`tb_questoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_expcmil`.`tb_questoes` (
  `id_questoes` INT NOT NULL AUTO_INCREMENT,
  `enunciado` VARCHAR(100) NOT NULL,
  `alternativa_a` VARCHAR(400) NOT NULL,
  `alternativa_b` VARCHAR(400) NOT NULL,
  `alternativa_c` VARCHAR(400) NOT NULL,
  `alternativa_d` VARCHAR(400) NOT NULL,
  `resposta` VARCHAR(100) NOT NULL,
  `explicacao` VARCHAR(400) NOT NULL,
  `tb_materia_id_materia` INT NOT NULL,
  PRIMARY KEY (`id_questoes`),
  INDEX `fk_tb_questoes_tb_materia1_idx` (`tb_materia_id_materia` ASC),
  CONSTRAINT `fk_tb_questoes_tb_materia1`
    FOREIGN KEY (`tb_materia_id_materia`)
    REFERENCES `db_expcmil`.`tb_materia` (`id_materia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_expcmil`.`tb_professores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_expcmil`.`tb_professores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `nivel_acesso` INT NOT NULL,
  `tb_materia_id_materia` INT NOT NULL,
  PRIMARY KEY (`id`, `tb_materia_id_materia`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_tb_professores_tb_materia1_idx` (`tb_materia_id_materia` ASC),
  CONSTRAINT `fk_tb_professores_tb_materia1`
    FOREIGN KEY (`tb_materia_id_materia`)
    REFERENCES `db_expcmil`.`tb_materia` (`id_materia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_expcmil`.`tb_usuario_has_tb_concurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_expcmil`.`tb_usuario_has_tb_concurso` (
  `tb_usuario_id` INT NOT NULL,
  `tb_concurso_id_concurso` INT NOT NULL,
  PRIMARY KEY (`tb_usuario_id`, `tb_concurso_id_concurso`),
  INDEX `fk_tb_usuario_has_tb_concurso_tb_concurso1_idx` (`tb_concurso_id_concurso` ASC),
  INDEX `fk_tb_usuario_has_tb_concurso_tb_usuario_idx` (`tb_usuario_id` ASC),
  CONSTRAINT `fk_tb_usuario_has_tb_concurso_tb_usuario`
    FOREIGN KEY (`tb_usuario_id`)
    REFERENCES `db_expcmil`.`tb_usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_usuario_has_tb_concurso_tb_concurso1`
    FOREIGN KEY (`tb_concurso_id_concurso`)
    REFERENCES `db_expcmil`.`tb_concurso` (`id_concurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
