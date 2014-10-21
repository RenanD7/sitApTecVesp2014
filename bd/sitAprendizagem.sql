SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `idUsuario` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `senha` VARCHAR(16) NULL ,
  `email` VARCHAR(45) NULL ,
  `foto` VARCHAR(45) NULL ,
  `telefone` INT NULL ,
  `email` VARCHAR(45) NULL ,
  PRIMARY KEY (`idUsuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Artigo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Artigo` (
  `idArtigo` INT NOT NULL ,
  `idUsuario` INT NOT NULL ,
  `titulo` VARCHAR(45) NULL ,
  `texto` TEXT NULL ,
  `data` DATETIME NULL ,
  PRIMARY KEY (`idArtigo`) ,
  INDEX `fk_Artigo_Usuario1` (`idUsuario` ASC) ,
  CONSTRAINT `fk_Artigo_Usuario1`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `mydb`.`Usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Comentario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Comentario` (
  `idComentario` INT NOT NULL ,
  `idUsuario` INT NOT NULL ,
  `texto` TEXT NULL ,
  `idArtigo` INT NOT NULL ,
  `data` DATETIME NULL ,
  PRIMARY KEY (`idComentario`) ,
  INDEX `fk_Comentario_Usuario` (`idUsuario` ASC) ,
  INDEX `fk_Comentario_Artigo1` (`idArtigo` ASC) ,
  CONSTRAINT `fk_Comentario_Usuario`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `mydb`.`Usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentario_Artigo1`
    FOREIGN KEY (`idArtigo` )
    REFERENCES `mydb`.`Artigo` (`idArtigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Fotos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Fotos` (
  `idFotos` INT NOT NULL ,
  `idArtigo` INT NOT NULL ,
  `arquivo` VARCHAR(45) NULL ,
  PRIMARY KEY (`idFotos`) ,
  INDEX `fk_Fotos_Artigo1` (`idArtigo` ASC) ,
  CONSTRAINT `fk_Fotos_Artigo1`
    FOREIGN KEY (`idArtigo` )
    REFERENCES `mydb`.`Artigo` (`idArtigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Categoria` (
  `idCategoria` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `descricao` VARCHAR(100) NULL ,
  PRIMARY KEY (`idCategoria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Categoria_has_Artigo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Categoria_has_Artigo` (
  `idCategoria` INT NOT NULL ,
  `idArtigo` INT NOT NULL ,
  PRIMARY KEY (`idCategoria`, `idArtigo`) ,
  INDEX `fk_Categoria_has_Artigo_Artigo1` (`idArtigo` ASC) ,
  INDEX `fk_Categoria_has_Artigo_Categoria1` (`idCategoria` ASC) ,
  CONSTRAINT `fk_Categoria_has_Artigo_Categoria1`
    FOREIGN KEY (`idCategoria` )
    REFERENCES `mydb`.`Categoria` (`idCategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Categoria_has_Artigo_Artigo1`
    FOREIGN KEY (`idArtigo` )
    REFERENCES `mydb`.`Artigo` (`idArtigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
