SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `sitap` DEFAULT CHARACTER SET utf8 ;
USE `sitap` ;

-- -----------------------------------------------------
-- Table `sitap`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sitap`.`usuario` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL DEFAULT NULL ,
  `senha` VARCHAR(16) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `foto` VARCHAR(45) NULL DEFAULT NULL ,
  `telefone` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`idUsuario`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sitap`.`artigo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sitap`.`artigo` (
  `idArtigo` INT(11) NOT NULL AUTO_INCREMENT ,
  `idUsuario` INT(11) NOT NULL ,
  `titulo` VARCHAR(45) NULL DEFAULT NULL ,
  `texto` TEXT NULL DEFAULT NULL ,
  `data` DATETIME NULL DEFAULT NULL ,
  `like` INT(11) NULL DEFAULT NULL COMMENT 'Quantidade de curtidas que o artigo recebe.' ,
  PRIMARY KEY (`idArtigo`) ,
  INDEX `fk_Artigo_Usuario1` (`idUsuario` ASC) ,
  CONSTRAINT `fk_Artigo_Usuario1`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `sitap`.`usuario` (`idUsuario` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sitap`.`categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sitap`.`categoria` (
  `idCategoria` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL DEFAULT NULL ,
  `descricao` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`idCategoria`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sitap`.`categoria_has_artigo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sitap`.`categoria_has_artigo` (
  `idCategoria` INT(11) NOT NULL ,
  `idArtigo` INT(11) NOT NULL ,
  PRIMARY KEY (`idCategoria`, `idArtigo`) ,
  INDEX `fk_Categoria_has_Artigo_Artigo1` (`idArtigo` ASC) ,
  INDEX `fk_Categoria_has_Artigo_Categoria1` (`idCategoria` ASC) ,
  CONSTRAINT `fk_Categoria_has_Artigo_Categoria1`
    FOREIGN KEY (`idCategoria` )
    REFERENCES `sitap`.`categoria` (`idCategoria` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Categoria_has_Artigo_Artigo1`
    FOREIGN KEY (`idArtigo` )
    REFERENCES `sitap`.`artigo` (`idArtigo` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sitap`.`comentario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sitap`.`comentario` (
  `idComentario` INT(11) NOT NULL AUTO_INCREMENT ,
  `idUsuario` INT(11) NOT NULL ,
  `idArtigo` INT(11) NOT NULL ,
  `texto` VARCHAR(45) NULL DEFAULT NULL ,
  `data` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`idComentario`) ,
  INDEX `fk_Comentario_Usuario` (`idUsuario` ASC) ,
  INDEX `fk_Comentario_Artigo1` (`idArtigo` ASC) ,
  CONSTRAINT `fk_Comentario_Usuario`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `sitap`.`usuario` (`idUsuario` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentario_Artigo1`
    FOREIGN KEY (`idArtigo` )
    REFERENCES `sitap`.`artigo` (`idArtigo` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sitap`.`fotos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sitap`.`fotos` (
  `idFotos` INT(11) NOT NULL AUTO_INCREMENT ,
  `idArtigo` INT(11) NOT NULL ,
  `arquivo` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`idFotos`) ,
  INDEX `fk_Fotos_Artigo1` (`idArtigo` ASC) ,
  CONSTRAINT `fk_Fotos_Artigo1`
    FOREIGN KEY (`idArtigo` )
    REFERENCES `sitap`.`artigo` (`idArtigo` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
