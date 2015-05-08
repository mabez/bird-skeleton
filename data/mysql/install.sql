SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bird_skeleton` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bird_skeleton` ;

-- -----------------------------------------------------
-- Table `bird_skeleton`.`site`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bird_skeleton`.`site` (
  `nome` VARCHAR(30) NOT NULL,
  `intro` MEDIUMTEXT NULL,
  `logo` VARCHAR(256) NULL,
  PRIMARY KEY (`nome`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bird_skeleton`.`anuncio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bird_skeleton`.`anuncio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(60) NULL,
  `imagem` VARCHAR(256) NULL,
  `descricao` TEXT NULL,
  `preco` DOUBLE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `bird_skeleton`.`site` (`nome`, `intro`, `logo`) VALUES ('Bird Skeleton Alpha', 'Confira abaixo os anúncios disponíveis para você.', 'site/bird_skeleton_alpha.jpg');

INSERT INTO `bird_skeleton`.`anuncio` (`titulo`, `imagem`, `descricao`, `preco`) VALUES ('Corvo', 'anuncio/Corvo.jpg', 'In interdum dui eu nisl mollis, ut tincidunt felis placerat. Nulla egestas nunc tortor, in tristique neque malesuada vel. Pellentesque faucibus massa in ipsum convallis, eu euismod arcu auctor. Aenean ornare erat vel pulvinar mollis. Donec mollis eu amet.', '100');
INSERT INTO `bird_skeleton`.`anuncio` (`titulo`, `imagem`, `descricao`, `preco`) VALUES ('Chupim', 'anuncio/Chupim.jpg', 'Proin sed mauris sem. Curabitur a tellus sed sapien aliquam dignissim eu eu mauris. Sed et ante leo. Pellentesque pulvinar auctor quam, sit amet viverra augue rutrum ac. Nam volutpat ultrices finibus. Curabitur egestas orci eu vulputate ultricies posuere. ', '250');
INSERT INTO `bird_skeleton`.`anuncio` (`titulo`, `imagem`, `descricao`, `preco`) VALUES ('Pomba', 'anuncio/Pomba.jpg', 'Nulla eu hendrerit ipsum, non ornare neque. Sed molestie ex euismod condimentum pharetra. Vivamus congue tortor vitae lorem pellentesque, id blandit nibh aliquam. Duis venenatis sem in posuere efficitur. Nunc convallis est at purus maximus, non cras amet. ', '500');
INSERT INTO `bird_skeleton`.`anuncio` (`titulo`, `imagem`, `descricao`, `preco`) VALUES ('Urubu', 'anuncio/Urubu.jpg', 'Donec ligula dolor, congue sit amet purus sed, tincidunt faucibus orci. Cras vitae libero gravida tellus mattis sagittis. Praesent eget orci sed libero hendrerit viverra non et tortor. Pellentesque neque nibh, dapibus vitae ipsum eget, blandit massa nunc. ', '1000');


-- -----------------------------------------------------
-- Adicionando informação de copyright ao banco.
-- -----------------------------------------------------
ALTER TABLE `bird_skeleton`.`site` 
ADD COLUMN `copyright` VARCHAR(128) NULL AFTER `logo`;
UPDATE `bird_skeleton`.`site` SET `copyright`='2015 by Marcel Bezerra da Silva. Todos os direitos reservados.' WHERE `nome`='Bird Skeleton Alpha';


