SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `sitap`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sitap`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `senha` VARCHAR(16) NULL ,
  `email` VARCHAR(45) NULL ,
  `foto` VARCHAR(45) NULL ,
  `telefone` INT NULL ,
  `email` VARCHAR(45) NULL ,
  PRIMARY KEY (`idUsuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`Artigo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sitap`.`Artigo` (
  `idArtigo` INT NOT NULL AUTO_INCREMENT ,
  `idUsuario` INT NOT NULL ,
  `titulo` VARCHAR(45) NULL ,
  `texto` TEXT NULL ,
  `data` DATETIME NULL ,
  `like` INT NULL COMMENT 'Quantidade de curtidas que o artigo recebe.' ,
  PRIMARY KEY (`idArtigo`) ,
  INDEX `fk_Artigo_Usuario1` (`idUsuario` ASC) ,
  CONSTRAINT `fk_Artigo_Usuario1`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `sitap`.`Usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`Comentario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sitap`.`Comentario` (
  `idComentario` INT NOT NULL AUTO_INCREMENT ,
  `idUsuario` INT NOT NULL ,
  `idArtigo` INT NOT NULL ,
  `texto` VARCHAR(45) NULL ,
  `data` DATETIME NULL ,
  PRIMARY KEY (`idComentario`) ,
  INDEX `fk_Comentario_Usuario` (`idUsuario` ASC) ,
  INDEX `fk_Comentario_Artigo1` (`idArtigo` ASC) ,
  CONSTRAINT `fk_Comentario_Usuario`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `sitap`.`Usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentario_Artigo1`
    FOREIGN KEY (`idArtigo` )
    REFERENCES `sitap`.`Artigo` (`idArtigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`Fotos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sitap`.`Fotos` (
  `idFotos` INT NOT NULL AUTO_INCREMENT ,
  `idArtigo` INT NOT NULL ,
  `arquivo` VARCHAR(45) NULL ,
  PRIMARY KEY (`idFotos`) ,
  INDEX `fk_Fotos_Artigo1` (`idArtigo` ASC) ,
  CONSTRAINT `fk_Fotos_Artigo1`
    FOREIGN KEY (`idArtigo` )
    REFERENCES `sitap`.`Artigo` (`idArtigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`Categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sitap`.`Categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `descricao` VARCHAR(100) NULL ,
  PRIMARY KEY (`idCategoria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`Categoria_has_Artigo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sitap`.`Categoria_has_Artigo` (
  `idCategoria` INT NOT NULL ,
  `idArtigo` INT NOT NULL ,
  PRIMARY KEY (`idCategoria`, `idArtigo`) ,
  INDEX `fk_Categoria_has_Artigo_Artigo1` (`idArtigo` ASC) ,
  INDEX `fk_Categoria_has_Artigo_Categoria1` (`idCategoria` ASC) ,
  CONSTRAINT `fk_Categoria_has_Artigo_Categoria1`
    FOREIGN KEY (`idCategoria` )
    REFERENCES `sitap`.`Categoria` (`idCategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Categoria_has_Artigo_Artigo1`
    FOREIGN KEY (`idArtigo` )
    REFERENCES `sitap`.`Artigo` (`idArtigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
