-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema caodocao
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema caodocao
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `caodocao` DEFAULT CHARACTER SET latin1 ;
USE `caodocao` ;

-- -----------------------------------------------------
-- Table `caodocao`.`statusdoacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`statusdoacao` (
  `cod_status` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(300) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_status`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `caodocao`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`estado` (
  `cod_esta` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(20) NULL DEFAULT NULL,
  `sigla` VARCHAR(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_esta`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `caodocao`.`cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`cidade` (
  `cod_cida` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(20) NULL DEFAULT NULL,
  `cod_esta` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_cida`),
  INDEX `cod_esta` (`cod_esta` ASC),
  CONSTRAINT `cidade_ibfk_1`
    FOREIGN KEY (`cod_esta`)
    REFERENCES `caodocao`.`estado` (`cod_esta`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `caodocao`.`tip_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`tip_user` (
  `desc_tipuser` VARCHAR(80) NULL DEFAULT NULL,
  `cd_tipuser` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cd_tipuser`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `caodocao`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`usuario` (
  `nome` VARCHAR(20) NULL DEFAULT NULL,
  `email` VARCHAR(80) NULL DEFAULT NULL,
  `cod_usu` INT(11) NOT NULL AUTO_INCREMENT,
  `cnpj` VARCHAR(20) NULL DEFAULT NULL,
  `senha` VARCHAR(20) NULL DEFAULT NULL,
  `telefone` VARCHAR(11) NULL DEFAULT NULL,
  `cod_cida` INT(11) NULL DEFAULT NULL,
  `cd_tipuser` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_usu`),
  INDEX `cod_cida` (`cod_cida` ASC),
  INDEX `cd_tipuser` (`cd_tipuser` ASC),
  CONSTRAINT `usuario_ibfk_1`
    FOREIGN KEY (`cod_cida`)
    REFERENCES `caodocao`.`cidade` (`cod_cida`),
  CONSTRAINT `usuario_ibfk_2`
    FOREIGN KEY (`cd_tipuser`)
    REFERENCES `caodocao`.`tip_user` (`cd_tipuser`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `caodocao`.`doacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`doacao` (
  `cod_doacao` INT(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` DATE NULL DEFAULT NULL,
  `data_doacao` DATE NULL DEFAULT NULL,
  `cod_status` INT(11) NULL DEFAULT NULL,
  `cod_usu` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_doacao`),
  INDEX `cod_status` (`cod_status` ASC),
  INDEX `cod_usu` (`cod_usu` ASC),
  CONSTRAINT `doacao_ibfk_1`
    FOREIGN KEY (`cod_status`)
    REFERENCES `caodocao`.`statusdoacao` (`cod_status`),
  CONSTRAINT `doacao_ibfk_2`
    FOREIGN KEY (`cod_usu`)
    REFERENCES `caodocao`.`usuario` (`cod_usu`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `caodocao`.`especie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`especie` (
  `descricao` VARCHAR(300) NULL DEFAULT NULL,
  `cod_especie` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cod_especie`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `caodocao`.`raca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`raca` (
  `descricao` VARCHAR(300) NULL DEFAULT NULL,
  `cod_raca` INT(11) NOT NULL AUTO_INCREMENT,
  `cod_especie` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_raca`),
  INDEX `cod_especie` (`cod_especie` ASC),
  CONSTRAINT `raca_ibfk_1`
    FOREIGN KEY (`cod_especie`)
    REFERENCES `caodocao`.`especie` (`cod_especie`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `caodocao`.`animal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`animal` (
  `nome` VARCHAR(20) NULL DEFAULT NULL,
  `datanascimento` DATE NULL DEFAULT NULL,
  `cod_animal` INT(11) NOT NULL AUTO_INCREMENT,
  `foto_perfil` TINYTEXT NULL DEFAULT NULL,
  `cod_doacao` INT(11) NULL DEFAULT NULL,
  `cod_raca` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_animal`),
  INDEX `cod_doacao` (`cod_doacao` ASC),
  INDEX `cod_raca` (`cod_raca` ASC),
  CONSTRAINT `animal_ibfk_1`
    FOREIGN KEY (`cod_doacao`)
    REFERENCES `caodocao`.`doacao` (`cod_doacao`),
  CONSTRAINT `animal_ibfk_2`
    FOREIGN KEY (`cod_raca`)
    REFERENCES `caodocao`.`raca` (`cod_raca`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `caodocao`.`sessao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`sessao` (
  `idsessao` INT(11) NOT NULL AUTO_INCREMENT,
  `dti` DATE NULL DEFAULT NULL,
  `dtf` DATE NULL DEFAULT NULL,
  `cod_usu` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idsessao`),
  INDEX `cod_usu` (`cod_usu` ASC),
  CONSTRAINT `sessao_ibfk_1`
    FOREIGN KEY (`cod_usu`)
    REFERENCES `caodocao`.`usuario` (`cod_usu`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `caodocao`.`chat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`chat` (
  `idsessao` INT(11) NULL DEFAULT NULL,
  `cod_usuE` INT(11) NULL DEFAULT NULL,
  `texto` VARCHAR(300) NULL DEFAULT NULL,
  `dth` DATE NULL DEFAULT NULL,
  `cod_usuR` INT(11) NULL DEFAULT NULL,
  INDEX `idsessao` (`idsessao` ASC),
  INDEX `cod_usuE` (`cod_usuE` ASC),
  INDEX `cod_usuR` (`cod_usuR` ASC),
  CONSTRAINT `chat_ibfk_1`
    FOREIGN KEY (`idsessao`)
    REFERENCES `caodocao`.`sessao` (`idsessao`),
  CONSTRAINT `chat_ibfk_2`
    FOREIGN KEY (`cod_usuE`)
    REFERENCES `caodocao`.`usuario` (`cod_usu`),
  CONSTRAINT `chat_ibfk_3`
    FOREIGN KEY (`cod_usuR`)
    REFERENCES `caodocao`.`usuario` (`cod_usu`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `caodocao`.`comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`comentario` (
  `cod_doacao` INT(11) NULL DEFAULT NULL,
  `cod_usu` INT(11) NULL DEFAULT NULL,
  `texto` VARCHAR(300) NULL DEFAULT NULL,
  `dt_coment` VARCHAR(300) NULL DEFAULT NULL,
  INDEX `cod_doacao` (`cod_doacao` ASC),
  INDEX `cod_usu` (`cod_usu` ASC),
  CONSTRAINT `comentario_ibfk_1`
    FOREIGN KEY (`cod_doacao`)
    REFERENCES `caodocao`.`doacao` (`cod_doacao`),
  CONSTRAINT `comentario_ibfk_2`
    FOREIGN KEY (`cod_usu`)
    REFERENCES `caodocao`.`usuario` (`cod_usu`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `caodocao`.`fotosanimal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caodocao`.`fotosanimal` (
  `cod_foto` INT(11) NOT NULL AUTO_INCREMENT,
  `legenda` VARCHAR(300) NULL DEFAULT NULL,
  `foto` TINYTEXT NULL DEFAULT NULL,
  `cod_animal` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cod_foto`),
  INDEX `cod_animal` (`cod_animal` ASC),
  CONSTRAINT `fotosanimal_ibfk_1`
    FOREIGN KEY (`cod_animal`)
    REFERENCES `caodocao`.`animal` (`cod_animal`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
