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
-- -----------------------------------------------------
-- Data for table `sitap`.`Usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitap`;
INSERT INTO `sitap`.`Usuario` (`idUsuario`, `nome`, `senha`, `email`, `foto`, `telefone`) VALUES (2, 'Gilberson Silva dos Santos', '1234', 'gilber@hotmail.com', 'http://lorempixel.com/output/people-q-c-330-330-4.jpg', 33504547);
INSERT INTO `sitap`.`Usuario` (`idUsuario`, `nome`, `senha`, `email`, `foto`, `telefone`) VALUES (0, 'Anonimo', '', 'anonimo@anonimo.com.br', NULL, 33504777);
INSERT INTO `sitap`.`Usuario` (`idUsuario`, `nome`, `senha`, `email`, `foto`, `telefone`) VALUES (1, 'admin', '1234', 'admin@hotmail.com', NULL, 34498456);
INSERT INTO `sitap`.`Usuario` (`idUsuario`, `nome`, `senha`, `email`, `foto`, `telefone`) VALUES (3, 'Cacildas da Conceição', '1234', 'concei@hotmail.com', 'http://lorempixel.com/output/people-q-c-330-330-6.jpg', 33254700);

COMMIT;

-- -----------------------------------------------------
-- Data for table `sitap`.`Artigo`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitap`;
INSERT INTO `sitap`.`Artigo` (`idArtigo`, `idUsuario`, `titulo`, `texto`, `data`, `like`) VALUES (1, 2, 'A pizza nossa de cada dia', '<p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>', '2014-10-27 16:42:13', 15);
INSERT INTO `sitap`.`Artigo` (`idArtigo`, `idUsuario`, `titulo`, `texto`, `data`, `like`) VALUES (2, 3, 'O Bacon faz mal ao corpo', '<p>Bacon ipsum dolor amet spare ribs shankle drumstick venison ham hock boudin, ground round short loin t-bone tongue shoulder brisket strip steak rump. Cow hamburger salami doner shank, andouille frankfurter ground round. Shankle biltong ground round short ribs porchetta bacon tri-tip filet mignon venison flank sausage. Ribeye kevin salami kielbasa andouille. Sausage drumstick pig, shank chicken beef strip steak bacon pork loin flank sirloin corned beef tenderloin salami brisket. Tenderloin pork shank, rump pork loin pork chop sausage corned beef turducken tri-tip andouille hamburger capicola.</p>', '2014-10-27 16:44:35', 10);

COMMIT;

-- -----------------------------------------------------
-- Data for table `sitap`.`Comentario`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitap`;
INSERT INTO `sitap`.`Comentario` (`idComentario`, `idUsuario`, `idArtigo`, `texto`, `data`) VALUES (1, 0, 1, 'Alo ha isso é um comentario do anônimo', '2014-10-27 16:48:15');
INSERT INTO `sitap`.`Comentario` (`idComentario`, `idUsuario`, `idArtigo`, `texto`, `data`) VALUES (2, 3, 1, 'Alo ha Cacildas aqui', '2014-10-28 8:56:15');

COMMIT;

-- -----------------------------------------------------
-- Data for table `sitap`.`Fotos`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitap`;
INSERT INTO `sitap`.`Fotos` (`idFotos`, `idArtigo`, `arquivo`) VALUES (1, 1, 'http://lorempizza.com/i/714/300');
INSERT INTO `sitap`.`Fotos` (`idFotos`, `idArtigo`, `arquivo`) VALUES (2, 1, 'http://lorempizza.com/i/514/300');
INSERT INTO `sitap`.`Fotos` (`idFotos`, `idArtigo`, `arquivo`) VALUES (3, 2, 'http://baconmockup.com/300/200');
INSERT INTO `sitap`.`Fotos` (`idFotos`, `idArtigo`, `arquivo`) VALUES (4, 2, 'http://baconmockup.com/714/300');

COMMIT;

-- -----------------------------------------------------
-- Data for table `sitap`.`Categoria`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitap`;
INSERT INTO `sitap`.`Categoria` (`idCategoria`, `nome`, `descricao`) VALUES (1, 'Pizza', 'Categoria que fala sobre pizzas');
INSERT INTO `sitap`.`Categoria` (`idCategoria`, `nome`, `descricao`) VALUES (2, 'Jogos', 'Categoria sobre jogos');

COMMIT;

-- -----------------------------------------------------
-- Data for table `sitap`.`Categoria_has_Artigo`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitap`;
INSERT INTO `sitap`.`Categoria_has_Artigo` (`idCategoria`, `idArtigo`) VALUES (1, 1);
INSERT INTO `sitap`.`Categoria_has_Artigo` (`idCategoria`, `idArtigo`) VALUES (2, 2);

COMMIT;
