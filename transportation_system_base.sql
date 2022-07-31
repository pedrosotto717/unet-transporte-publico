SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema unet_transporte
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema unet_transporte
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `unet_transporte` DEFAULT CHARACTER SET utf8 ;
USE `unet_transporte` ;

-- -----------------------------------------------------
-- Table `unet_transporte`.`business`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unet_transporte`.`business` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unet_transporte`.`places`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unet_transporte`.`places` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `street` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unet_transporte`.`routes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unet_transporte`.`routes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `price` DECIMAL NOT NULL,
  `business_id` INT NOT NULL,
  `start` INT NOT NULL,
  `finish` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_routes_business_idx` (`business_id` ASC),
  INDEX `fk_routes_places1_idx` (`start` ASC),
  INDEX `fk_routes_places2_idx` (`finish` ASC),
  CONSTRAINT `fk_routes_business`
    FOREIGN KEY (`business_id`)
    REFERENCES `unet_transporte`.`business` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_routes_places1`
    FOREIGN KEY (`start`)
    REFERENCES `unet_transporte`.`places` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_routes_places2`
    FOREIGN KEY (`finish`)
    REFERENCES `unet_transporte`.`places` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unet_transporte`.`user_suggest`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unet_transporte`.`user_suggest` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comment` VARCHAR(300) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(11) NOT NULL,
  `business_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_suggest_business1_idx` (`business_id` ASC),
  CONSTRAINT `fk_user_suggest_business1`
    FOREIGN KEY (`business_id`)
    REFERENCES `unet_transporte`.`business` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unet_transporte`.`places_on_the_route`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unet_transporte`.`places_on_the_route` (
  `id` VARCHAR(45) NOT NULL,
  `places_id` INT NOT NULL,
  `routes_id` INT NOT NULL,
  PRIMARY KEY (`id`, `places_id`, `routes_id`),
  INDEX `fk_places_has_routes_routes1_idx` (`routes_id` ASC),
  INDEX `fk_places_has_routes_places1_idx` (`places_id` ASC),
  CONSTRAINT `fk_places_has_routes_places1`
    FOREIGN KEY (`places_id`)
    REFERENCES `unet_transporte`.`places` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_places_has_routes_routes1`
    FOREIGN KEY (`routes_id`)
    REFERENCES `unet_transporte`.`routes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unet_transporte`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unet_transporte`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('ADMIN', 'EMPLOYEE') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


INSERT INTO `unet_transporte`.`users` (`id`, `name`, `email`, `password`, `role`) VALUES (1, 'ADMIN', 'admin@alcaldia.com', '$2y$10$tubV6F3UYqCz1JyMmaRTW.j3q0bDLDZs.5WE7F1wYklhfR4xolvKu', 'ADMIN');