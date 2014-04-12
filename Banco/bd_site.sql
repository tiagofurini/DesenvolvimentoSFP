SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bd_site
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_site` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bd_site` ;

-- -----------------------------------------------------
-- Table `bd_site`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_site`.`usuarios` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(100) NOT NULL,
  `user_login` VARCHAR(40) NOT NULL,
  `user_senha` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_site`.`noticias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_site`.`noticias` (
  `not_id` INT NOT NULL AUTO_INCREMENT,
  `not_titulo` VARCHAR(80) NOT NULL,
  `not_subtitulo` VARCHAR(100) NOT NULL,
  `not_descricao` LONGTEXT NOT NULL,
  `not_foto` VARCHAR(20) NULL,
  `not_data` DATE NOT NULL,
  PRIMARY KEY (`not_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_site`.`banners`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_site`.`banners` (
  `ban_id` INT NOT NULL AUTO_INCREMENT,
  `ban_foto` VARCHAR(20) NOT NULL,
  `ban_descricao` VARCHAR(50) NOT NULL,
  `ban_status` TINYINT(1) NOT NULL,
  PRIMARY KEY (`ban_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_site`.`eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_site`.`eventos` (
  `eve_id` INT NOT NULL AUTO_INCREMENT,
  `eve_titulo` VARCHAR(80) NOT NULL,
  `eve_descricao` LONGTEXT NOT NULL,
  `eve_foto` VARCHAR(20) NULL,
  `eve_data` DATE NOT NULL,
  PRIMARY KEY (`eve_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_site`.`videos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_site`.`videos` (
  `vid_id` INT NOT NULL AUTO_INCREMENT,
  `vid_titulo` VARCHAR(45) NOT NULL,
  `vid_url` VARCHAR(100) NOT NULL,
  `vid_date` DATE NOT NULL,
  PRIMARY KEY (`vid_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_site`.`instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_site`.`instituicao` (
  `inst_id` INT NOT NULL AUTO_INCREMENT,
  `inst_nome` VARCHAR(100) NOT NULL,
  `inst_rua` VARCHAR(100) NOT NULL,
  `inst_numero` INT NOT NULL,
  `inst_bairro` VARCHAR(100) NOT NULL,
  `inst_cidade` VARCHAR(100) NOT NULL,
  `int_cep` VARCHAR(9) NULL,
  `inst_site` VARCHAR(100) NULL,
  `inst_email` VARCHAR(100) NULL,
  `inst_facebook` VARCHAR(100) NULL,
  `inst_youtube` VARCHAR(100) NULL,
  `inst_twitter` VARCHAR(100) NULL,
  `inst_fone1` VARCHAR(15) NULL,
  `inst_fone2` VARCHAR(15) NULL,
  PRIMARY KEY (`inst_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_site`.`nossa_instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_site`.`nossa_instituicao` (
  `ni_id` INT NOT NULL AUTO_INCREMENT,
  `ni_titulo` VARCHAR(20) NOT NULL,
  `ni_descricao` LONGTEXT NOT NULL,
  `ni_foto` VARCHAR(20) NULL,
  PRIMARY KEY (`ni_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_site`.`padroeiro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_site`.`padroeiro` (
  `pad_id` INT NOT NULL AUTO_INCREMENT,
  `pad_titulo` VARCHAR(100) NOT NULL,
  `pad_descricao` LONGTEXT NOT NULL,
  `pad_foto` VARCHAR(20) NULL,
  PRIMARY KEY (`pad_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
