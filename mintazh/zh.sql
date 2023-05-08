-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema mintazh
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mintazh
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mintazh` DEFAULT CHARACTER SET utf8mb4 ;
USE `mintazh` ;

-- -----------------------------------------------------
-- Table `mintazh`.`Gondozo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mintazh`.`Gondozo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nev` VARCHAR(45) NOT NULL,
  `kor` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mintazh`.`Allat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mintazh`.`Allat` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nev` VARCHAR(45) NOT NULL,
  `fajta` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mintazh`.`Gondoz`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mintazh`.`Gondoz` (
  `Gondozo_id` INT NOT NULL,
  `Allat_id` INT NOT NULL,
  PRIMARY KEY (`Gondozo_id`, `Allat_id`),
  INDEX `fk_Gondozo_has_Allat_Allat1_idx` (`Allat_id` ASC) ,
  INDEX `fk_Gondozo_has_Allat_Gondozo_idx` (`Gondozo_id` ASC) ,
  CONSTRAINT `fk_Gondozo_has_Allat_Gondozo`
    FOREIGN KEY (`Gondozo_id`)
    REFERENCES `mintazh`.`Gondozo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Gondozo_has_Allat_Allat1`
    FOREIGN KEY (`Allat_id`)
    REFERENCES `mintazh`.`Allat` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
