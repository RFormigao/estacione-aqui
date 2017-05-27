/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.1.16-MariaDB : Database - estacione_aqui
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`estacione_aqui` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `estacione_aqui`;

/*Table structure for table `acesso` */

DROP TABLE IF EXISTS `acesso`;

CREATE TABLE `acesso` (
  `id_acesso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_menu` int(10) unsigned DEFAULT NULL,
  `id_tipo` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_acesso`),
  KEY `acesso_FKTipo` (`id_tipo`),
  KEY `acesso_FKMenu` (`id_menu`),
  CONSTRAINT `acesso_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `acesso_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `acesso` */

/*Table structure for table `alocacao` */

DROP TABLE IF EXISTS `alocacao`;

CREATE TABLE `alocacao` (
  `id_alocacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vaga` int(10) unsigned zerofill DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_saida` time DEFAULT NULL,
  `dataa` date DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `id_periodo` int(10) unsigned DEFAULT NULL,
  `id_veiculo` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_alocacao`),
  KEY `locacao_FKPeriodo` (`id_periodo`),
  KEY `locacao_FKVeiculo` (`id_veiculo`),
  CONSTRAINT `alocacao_ibfk_1` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `alocacao_ibfk_2` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `alocacao` */

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `cpf` char(13) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(50) DEFAULT NULL,
  `link` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

/*Table structure for table `periodo` */

DROP TABLE IF EXISTS `periodo`;

CREATE TABLE `periodo` (
  `id_periodo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `periodo` time DEFAULT NULL,
  `valor` float DEFAULT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `periodo` */

/*Table structure for table `pessoa` */

DROP TABLE IF EXISTS `pessoa`;

CREATE TABLE `pessoa` (
  `id_pessoa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `cpf` char(13) DEFAULT NULL,
  `cel` char(14) DEFAULT NULL,
  `tel` char(13) DEFAULT NULL,
  `logradouro` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` char(9) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `senha` varchar(8) DEFAULT NULL,
  `id_tipo` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`),
  KEY `pessoa_FKTipo` (`id_tipo`),
  CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pessoa` */

insert  into `pessoa`(`id_pessoa`,`nome`,`cpf`,`cel`,`tel`,`logradouro`,`bairro`,`cep`,`cidade`,`uf`,`usuario`,`senha`,`id_tipo`) values (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin','admin',NULL);

/*Table structure for table `tipo` */

DROP TABLE IF EXISTS `tipo`;

CREATE TABLE `tipo` (
  `id_tipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipo` */

/*Table structure for table `veiculo` */

DROP TABLE IF EXISTS `veiculo`;

CREATE TABLE `veiculo` (
  `id_veiculo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `placa` char(8) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `id_cliente` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_veiculo`),
  KEY `veiculo_FKCliente` (`id_cliente`),
  CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `veiculo` */

/* Procedure structure for procedure `login` */

/*!50003 DROP PROCEDURE IF EXISTS  `login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(in person varchar(10), pass varchar(8))
begin
	select usuario, senha from pessoa where usuario = person and senha = pass; 
end */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
