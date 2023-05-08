-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema b_csoport
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema b_csoport
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `b_csoport` DEFAULT CHARACTER SET utf8mb4 ;
USE `b_csoport` ;

-- -----------------------------------------------------
-- Table `b_csoport`.`kisbolt`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b_csoport`.`kisbolt` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cim` VARCHAR(45) NULL,
  `terulet` VARCHAR(10) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `b_csoport`.`elado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b_csoport`.`elado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nev` VARCHAR(45) NOT NULL,
  `fizetes` INT UNSIGNED NOT NULL,
  `kisbolt_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_elado_kisbolt1_idx` (`kisbolt_id` ASC) ,
  CONSTRAINT `fk_elado_kisbolt1`
    FOREIGN KEY (`kisbolt_id`)
    REFERENCES `b_csoport`.`kisbolt` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `b_csoport`.`arufeltolto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `b_csoport`.`arufeltolto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nev` VARCHAR(45) NOT NULL,
  `fizetes` INT UNSIGNED NOT NULL,
  `kisbolt_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_arufeltolto_kisbolt1_idx` (`kisbolt_id` ASC) ,
  CONSTRAINT `fk_arufeltolto_kisbolt1`
    FOREIGN KEY (`kisbolt_id`)
    REFERENCES `b_csoport`.`kisbolt` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
