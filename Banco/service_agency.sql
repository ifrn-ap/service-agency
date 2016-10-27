-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema service_agency
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema service_agency
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `service_agency` DEFAULT CHARACTER SET utf8 ;
USE `service_agency` ;

-- -----------------------------------------------------
-- Table `service_agency`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `service_agency`.`usuario` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `service_agency`.`cidadao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `service_agency`.`cidadao` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `rua` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `usuario_id` BIGINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cidadao_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_cidadao_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `service_agency`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `service_agency`.`area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `service_agency`.`area` (
  `codigo` BIGINT NOT NULL AUTO_INCREMENT,
  `area` VARCHAR(255) NULL,
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `service_agency`.`agente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `service_agency`.`agente` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `rua` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `setor_de_atuacao` VARCHAR(45) NOT NULL,
  `area_codigo` BIGINT NOT NULL,
  `usuario_id` BIGINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_agente_area1_idx` (`area_codigo` ASC),
  INDEX `fk_agente_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_agente_area1`
    FOREIGN KEY (`area_codigo`)
    REFERENCES `service_agency`.`area` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agente_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `service_agency`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `service_agency`.`agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `service_agency`.`agendamento` (
  `codigo` BIGINT NOT NULL AUTO_INCREMENT,
  `data` DATE NULL,
  `localidade` VARCHAR(255) NULL,
  `tipo_solicitacao` VARCHAR(255) NULL,
  `solicitacao` VARCHAR(255) NULL,
  `cidadao_id` BIGINT NOT NULL,
  `data_cadastro` DATE NULL,
  `status` VARCHAR(45) NOT NULL,
  `agente_id` BIGINT NULL,
  PRIMARY KEY (`codigo`),
  INDEX `fk_agendamento_cidadao1_idx` (`cidadao_id` ASC),
  INDEX `fk_agendamento_agente1_idx` (`agente_id` ASC),
  CONSTRAINT `fk_agendamento_cidadao1`
    FOREIGN KEY (`cidadao_id`)
    REFERENCES `service_agency`.`cidadao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agendamento_agente1`
    FOREIGN KEY (`agente_id`)
    REFERENCES `service_agency`.`agente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `service_agency`.`observacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `service_agency`.`observacoes` (
  `idObservacao` BIGINT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(300) NULL,
  `dt_alteracao` DATE NOT NULL,
  `status` VARCHAR(45) NULL,
  `agendamento_codigo` BIGINT NOT NULL,
  PRIMARY KEY (`idObservacao`),
  INDEX `fk_Observacoes_agendamento1_idx` (`agendamento_codigo` ASC),
  CONSTRAINT `fk_Observacoes_agendamento1`
    FOREIGN KEY (`agendamento_codigo`)
    REFERENCES `service_agency`.`agendamento` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
