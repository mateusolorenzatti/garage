-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema garage
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema garage
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `garage` DEFAULT CHARACTER SET utf8 ;
USE `garage` ;

-- -----------------------------------------------------
-- Table `garage`.`cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `garage`.`cidade` (
  `idCidade` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `estado` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idCidade`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `garage`.`oficina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `garage`.`oficina` (
  `idOficina` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `endereco` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `senha` VARCHAR(45) NULL DEFAULT NULL,
  `cidade` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idOficina`),
  INDEX `cidadeFK_idx` (`cidade` ASC),
  CONSTRAINT `cidadeFK`
    FOREIGN KEY (`cidade`)
    REFERENCES `garage`.`cidade` (`idCidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `garage`.`proprietario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `garage`.`proprietario` (
  `idProprietario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `telefone` VARCHAR(11) NULL DEFAULT NULL,
  `senha` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idProprietario`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `garage`.`veiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `garage`.`veiculo` (
  `idVeiculo` INT(11) NOT NULL AUTO_INCREMENT,
  `placa` VARCHAR(45) NOT NULL,
  `marca` VARCHAR(45) NULL DEFAULT NULL,
  `modelo` VARCHAR(45) NULL DEFAULT NULL,
  `ano` VARCHAR(4) NULL DEFAULT NULL,
  `renavam` VARCHAR(45) NULL DEFAULT NULL,
  `cor` VARCHAR(45) NULL DEFAULT NULL,
  `proprietario` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idVeiculo`),
  UNIQUE INDEX `placa_UNIQUE` (`placa` ASC),
  INDEX `proprietarioFK_idx` (`proprietario` ASC),
  CONSTRAINT `proprietario`
    FOREIGN KEY (`proprietario`)
    REFERENCES `garage`.`proprietario` (`idProprietario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `garage`.`serviço`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `garage`.`serviço` (
  `idServiço` INT(11) NOT NULL AUTO_INCREMENT,
  `veiculo` INT(11) NULL DEFAULT NULL,
  `oficina` INT(11) NULL DEFAULT NULL,
  `status` VARCHAR(45) NULL DEFAULT NULL,
  `data_entrada` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`idServiço`),
  INDEX `veiculo_idx` (`veiculo` ASC),
  INDEX `oficina_idx` (`oficina` ASC),
  CONSTRAINT `oficina_fk`
    FOREIGN KEY (`oficina`)
    REFERENCES `garage`.`oficina` (`idOficina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `veiculo_fk`
    FOREIGN KEY (`veiculo`)
    REFERENCES `garage`.`veiculo` (`idVeiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `garage`.`item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `garage`.`item` (
  `idItem` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL DEFAULT NULL,
  `valor` DOUBLE NULL DEFAULT NULL,
  `serviço` INT(11) NULL DEFAULT NULL,
  `concluido` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idItem`),
  INDEX `serviço_idx` (`serviço` ASC),
  CONSTRAINT `serviço`
    FOREIGN KEY (`serviço`)
    REFERENCES `garage`.`serviço` (`idServiço`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `garage`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `garage`.`produto` (
  `idProduto` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL DEFAULT NULL,
  `valor` VARCHAR(45) NULL DEFAULT NULL,
  `quatidade` INT(11) NULL DEFAULT NULL,
  `item` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idProduto`),
  INDEX `item_idx` (`item` ASC),
  CONSTRAINT `item`
    FOREIGN KEY (`item`)
    REFERENCES `garage`.`item` (`idItem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `garage`.`telefone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `garage`.`telefone` (
  `idTelefone` INT(11) NOT NULL AUTO_INCREMENT,
  `telefone` VARCHAR(11) NULL DEFAULT NULL,
  `oficina` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idTelefone`),
  INDEX `oficina_idx` (`oficina` ASC),
  CONSTRAINT `oficina`
    FOREIGN KEY (`oficina`)
    REFERENCES `garage`.`oficina` (`idOficina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
