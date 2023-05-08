-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema a_csoport
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema a_csoport
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `a_csoport` DEFAULT CHARACTER SET utf8mb4 ;
USE `a_csoport` ;

-- -----------------------------------------------------
-- Table `a_csoport`.`epulet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `a_csoport`.`epulet` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nev` CHAR(1) NULL,
  `emelet` INT UNSIGNED NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `a_csoport`.`gondnok`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `a_csoport`.`gondnok` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nev` VARCHAR(45) NOT NULL,
  `kor` INT UNSIGNED NOT NULL,
  `epulet_id` INT NOT NULL,
  PRIMARY KEY (`id`, `epulet_id`),
  CONSTRAINT `fk_gondnok_epulet`
    FOREIGN KEY (`epulet_id`)
    REFERENCES `a_csoport`.`epulet` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;




-- -----------------------------------------------------
-- Table `a_csoport`.`takarito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `a_csoport`.`takarito` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nev` VARCHAR(45) NOT NULL,
  `kor` INT UNSIGNED NOT NULL,
  `epulet_id` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_takarito_epulet1`
    FOREIGN KEY (`epulet_id`)
    REFERENCES `a_csoport`.`epulet` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
