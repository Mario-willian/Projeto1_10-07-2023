-- MySQL Script generated by MySQL Workbench
-- Fri Jul 21 22:38:44 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema supermercados_paranaiba
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema supermercados_paranaiba
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `supermercados_paranaiba` DEFAULT CHARACTER SET utf8 ;
USE `supermercados_paranaiba` ;

-- -----------------------------------------------------
-- Table `supermercados_paranaiba`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `supermercados_paranaiba`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_completo` VARCHAR(80) NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  `senha` VARCHAR(18) NOT NULL,
  `status` ENUM('Ativo', 'Inativo') NOT NULL,
  `data_criacao` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `supermercados_paranaiba`.`empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `supermercados_paranaiba`.`empresas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cnpj` VARCHAR(18) NOT NULL,
  `nome_loja` VARCHAR(80) NOT NULL,
  `razao_social` VARCHAR(80) NOT NULL,
  `status` ENUM('Ativo', 'Inativo') NOT NULL,
  `data_criacao` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `supermercados_paranaiba`.`funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `supermercados_paranaiba`.`funcionarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(14) NOT NULL,
  `nome_completo` VARCHAR(80) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `salario` DECIMAL(12,2) NOT NULL,
  `nome_pai` VARCHAR(80) NULL,
  `nome_mae` VARCHAR(80) NOT NULL,
  `observacao` TEXT NULL,
  `status` ENUM('Ativo', 'Inativo') NOT NULL,
  `data_criacao` DATETIME NOT NULL,
  `empresas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_funcionarios_empresas1_idx` (`empresas_id` ASC),
  CONSTRAINT `fk_funcionarios_empresas1`
    FOREIGN KEY (`empresas_id`)
    REFERENCES `supermercados_paranaiba`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `supermercados_paranaiba`.`vale_transportes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `supermercados_paranaiba`.`vale_transportes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `valor` DECIMAL(12,2) NOT NULL,
  `data_criacao` DATETIME NOT NULL,
  `funcionarios_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vale_transportes_funcionarios1_idx` (`funcionarios_id` ASC),
  CONSTRAINT `fk_vale_transportes_funcionarios1`
    FOREIGN KEY (`funcionarios_id`)
    REFERENCES `supermercados_paranaiba`.`funcionarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `supermercados_paranaiba`.`recisoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `supermercados_paranaiba`.`recisoes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `exame_demissional` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(15) NOT NULL,
  `data_inicio_aviso` DATE NOT NULL,
  `data_fim_aviso` DATE NOT NULL,
  `motivo` VARCHAR(45) NOT NULL,
  `observacao` TEXT NOT NULL,
  `status` VARCHAR(15) NOT NULL,
  `data_criacao` DATETIME NOT NULL,
  `funcionarios_id` INT NOT NULL,
  `empresas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_recisoes_funcionarios1_idx` (`funcionarios_id` ASC),
  INDEX `fk_recisoes_empresas1_idx` (`empresas_id` ASC),
  CONSTRAINT `fk_recisoes_funcionarios1`
    FOREIGN KEY (`funcionarios_id`)
    REFERENCES `supermercados_paranaiba`.`funcionarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recisoes_empresas1`
    FOREIGN KEY (`empresas_id`)
    REFERENCES `supermercados_paranaiba`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `supermercados_paranaiba`.`ocorrencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `supermercados_paranaiba`.`ocorrencias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `arquivo` VARCHAR(100) NULL,
  `motivo` VARCHAR(45) NOT NULL,
  `valor` VARCHAR(45) NOT NULL,
  `observacao` VARCHAR(45) NULL,
  `status` ENUM('Ativo', 'Inativo') NOT NULL,
  `data_criacao` DATETIME NOT NULL,
  `funcionarios_id` INT NOT NULL,
  `empresas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ocorrencias_funcionarios1_idx` (`funcionarios_id` ASC),
  INDEX `fk_ocorrencias_empresas1_idx` (`empresas_id` ASC),
  CONSTRAINT `fk_ocorrencias_funcionarios1`
    FOREIGN KEY (`funcionarios_id`)
    REFERENCES `supermercados_paranaiba`.`funcionarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ocorrencias_empresas1`
    FOREIGN KEY (`empresas_id`)
    REFERENCES `supermercados_paranaiba`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `supermercados_paranaiba`.`quantidade_faltas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `supermercados_paranaiba`.`quantidade_faltas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_criacao` DATETIME NOT NULL,
  `ocorrencias_id` INT NOT NULL,
  `funcionarios_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_faltas_ocorrencias1_idx` (`ocorrencias_id` ASC),
  INDEX `fk_quantidade_faltas_funcionarios1_idx` (`funcionarios_id` ASC),
  CONSTRAINT `fk_faltas_ocorrencias1`
    FOREIGN KEY (`ocorrencias_id`)
    REFERENCES `supermercados_paranaiba`.`ocorrencias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_quantidade_faltas_funcionarios1`
    FOREIGN KEY (`funcionarios_id`)
    REFERENCES `supermercados_paranaiba`.`funcionarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `supermercados_paranaiba`.`ferias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `supermercados_paranaiba`.`ferias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  `observacao` VARCHAR(45) NULL,
  `data_criacao` DATETIME NOT NULL,
  `funcionarios_id` INT NOT NULL,
  `empresas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ferias_funcionarios1_idx` (`funcionarios_id` ASC),
  INDEX `fk_ferias_empresas1_idx` (`empresas_id` ASC),
  CONSTRAINT `fk_ferias_funcionarios1`
    FOREIGN KEY (`funcionarios_id`)
    REFERENCES `supermercados_paranaiba`.`funcionarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ferias_empresas1`
    FOREIGN KEY (`empresas_id`)
    REFERENCES `supermercados_paranaiba`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `supermercados_paranaiba`.`lembretes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `supermercados_paranaiba`.`lembretes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `anotacao` TEXT NOT NULL,
  `data_desativada` DATE NOT NULL,
  `status` ENUM('Ativo', 'Inativo') NOT NULL,
  `data_criacao` DATETIME NOT NULL,
  `usuarios_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_lembretes_usuarios1_idx` (`usuarios_id` ASC),
  CONSTRAINT `fk_lembretes_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `supermercados_paranaiba`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `supermercados_paranaiba`.`acessos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `supermercados_paranaiba`.`acessos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_criacao` DATETIME NOT NULL,
  `empresas_id` INT NOT NULL,
  `usuarios_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_empresas_has_usuarios_usuarios1_idx` (`usuarios_id` ASC),
  INDEX `fk_empresas_has_usuarios_empresas1_idx` (`empresas_id` ASC),
  CONSTRAINT `fk_empresas_has_usuarios_empresas1`
    FOREIGN KEY (`empresas_id`)
    REFERENCES `supermercados_paranaiba`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_has_usuarios_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `supermercados_paranaiba`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `supermercados_paranaiba`.`setores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `supermercados_paranaiba`.`setores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `setor` VARCHAR(80) NOT NULL,
  `funcao` VARCHAR(100) NOT NULL,
  `data_criacao` DATETIME NOT NULL,
  `funcionarios_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_setores_funcionarios1_idx` (`funcionarios_id` ASC),
  CONSTRAINT `fk_setores_funcionarios1`
    FOREIGN KEY (`funcionarios_id`)
    REFERENCES `supermercados_paranaiba`.`funcionarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
