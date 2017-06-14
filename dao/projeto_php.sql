-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema projeto_php
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projeto_php
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projeto_php` DEFAULT CHARACTER SET utf8 ;
USE `projeto_php` ;

-- -----------------------------------------------------
-- Table `projeto_php`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_php`.`usuario` (
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `idade` INT(11) NOT NULL,
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 48
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projeto_php`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_php`.`produto` (
  `idproduto` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `tipo` VARCHAR(45) NULL DEFAULT NULL,
  `valor` DOUBLE NULL DEFAULT NULL,
  `qtd` INT(11) NULL DEFAULT NULL,
  `usuario_id` INT(11) NOT NULL,
  PRIMARY KEY (`idproduto`),
  INDEX `fk_produto_usuario_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_produto_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `projeto_php`.`usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
