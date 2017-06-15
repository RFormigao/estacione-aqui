/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.1.22-MariaDB : Database - estacione_aqui
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
  `vaga` int(10) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `alocacao` */

insert  into `alocacao`(`id_alocacao`,`vaga`,`hora_entrada`,`hora_saida`,`dataa`,`valor`,`id_periodo`,`id_veiculo`) values (1,2,'13:00:00','13:20:00','2017-06-11',NULL,NULL,1);

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cpf` char(14) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

insert  into `cliente`(`id_cliente`,`nome`,`cpf`,`telefone`) values (1,'Jaqueline Paschoal','465.212.504-98','(14) 3646-3263'),(2,'Robson Gomes','460.706.578-17','(14) 99742-5938'),(3,'Roberto da Silva','283.292.990-80','(14) 3657-3839'),(6,'Roberta Maria ','178.190.200-10','(19) 3647-2920'),(7,'Marinalva dos Santos','188.390.309-98','(14) 3674-9080'),(14,'Mariano de Souza','178.290.290-98','(14) 3647-3839'),(15,'hyh','45','4556');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `periodo` */

insert  into `periodo`(`id_periodo`,`periodo`,`valor`) values (1,'00:10:00',2),(2,'00:15:00',3),(3,'00:20:00',4),(4,'00:25:00',5),(5,'00:30:00',6),(6,'00:35:00',7),(7,'00:40:00',8);

/*Table structure for table `pessoa` */

DROP TABLE IF EXISTS `pessoa`;

CREATE TABLE `pessoa` (
  `id_pessoa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `cpf` char(14) DEFAULT NULL,
  `cel` char(15) DEFAULT NULL,
  `tel` char(14) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pessoa` */

insert  into `pessoa`(`id_pessoa`,`nome`,`cpf`,`cel`,`tel`,`logradouro`,`bairro`,`cep`,`cidade`,`uf`,`usuario`,`senha`,`id_tipo`) values (1,'Alberto da Rocha','374.485.485-94','(14) 98394-9035','(14) 3647-7865','Rua Deodorico de Souza 289','Centro','15367-000','Jau','SP','admin','admin',1),(2,'Maria dos Santos','497.793.130-74','(14) 99746-1367','(14) 3624-8514','Rua Luiz Augusto 679','Jardim Odette','16470-670','Jau','SP','maria','maria123',2);

/*Table structure for table `tipo` */

DROP TABLE IF EXISTS `tipo`;

CREATE TABLE `tipo` (
  `id_tipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipo` */

insert  into `tipo`(`id_tipo`,`descritivo`) values (1,'Administrador'),(2,'Funcionario');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `veiculo` */

insert  into `veiculo`(`id_veiculo`,`placa`,`modelo`,`id_cliente`) values (1,'FND-1226','Palio',3),(2,'FGB-4679','Fiesta',2);

/* Procedure structure for procedure `alterarClientes` */

/*!50003 DROP PROCEDURE IF EXISTS  `alterarClientes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `alterarClientes`(IN id INT, proprietario VARCHAR(50), c CHAR(14), t VARCHAR(15))
begin 
	if (proprietario = "" ) then
		select "Preencha o nome. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
	else
		IF (c = "") THEN
			SELECT "Preencha o CPF. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
		else
			IF(t = "") THEN
				SELECT "Preencha o telefone. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
			else
				UPDATE cliente SET nome = proprietario, cpf = c, telefone = t WHERE id_cliente = id;
			END IF;
		END IF;
	end if;
end */$$
DELIMITER ;

/* Procedure structure for procedure `excluirClientes` */

/*!50003 DROP PROCEDURE IF EXISTS  `excluirClientes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `excluirClientes`(in id int)
begin 
	if exists ( select id_cliente from veiculo where id_cliente = id) then
		select "Este cliente não pode ser excluido, exclua o seu veículo primeiro." msg;
	else 
		delete from cliente where id_cliente = id;
	end if;
end */$$
DELIMITER ;

/* Procedure structure for procedure `inserirClientes` */

/*!50003 DROP PROCEDURE IF EXISTS  `inserirClientes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirClientes`(IN nome VARCHAR(50), cpf CHAR(14) ,telefone VARCHAR(15))
BEGIN
	if(nome = "") then
		select "Preencha o nome. (Atenção: Todos os campos devem ser preenchidos!)" msg;
	else 
		if (cpf = "") then
			select "Preencha o CPF. (Atenção: Todos os campos devem ser preenchidos!)" msg;
		else 
			if(telefone = "") then
				SELECT "Preencha o telefone. (Atenção: Todos os campos devem ser preenchidos!)" msg;
			else
				INSERT INTO cliente (nome,cpf,telefone) VALUES ( nome,cpf,telefone);
			end if;
		end if;
	end if;
END */$$
DELIMITER ;

/* Procedure structure for procedure `inserirPrecos` */

/*!50003 DROP PROCEDURE IF EXISTS  `inserirPrecos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirPrecos`(in periodo time, valor float)
BEGIN
	INSERT INTO periodo (periodo,valor) VALUES (periodo,valor);
END */$$
DELIMITER ;

/* Procedure structure for procedure `login` */

/*!50003 DROP PROCEDURE IF EXISTS  `login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(in pessoa varchar(10),pass varchar (8))
begin
		SELECT * FROM pessoa WHERE usuario = pessoa AND senha = pass;
end */$$
DELIMITER ;

/*Table structure for table `vw_listarclientes` */

DROP TABLE IF EXISTS `vw_listarclientes`;

/*!50001 DROP VIEW IF EXISTS `vw_listarclientes` */;
/*!50001 DROP TABLE IF EXISTS `vw_listarclientes` */;

/*!50001 CREATE TABLE `vw_listarclientes` (
  `id_cliente` int(10) unsigned NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cpf` char(14) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_listarfuncionarios` */

DROP TABLE IF EXISTS `vw_listarfuncionarios`;

/*!50001 DROP VIEW IF EXISTS `vw_listarfuncionarios` */;
/*!50001 DROP TABLE IF EXISTS `vw_listarfuncionarios` */;

/*!50001 CREATE TABLE `vw_listarfuncionarios` (
  `id_pessoa` int(10) unsigned NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cpf` char(14) DEFAULT NULL,
  `cel` char(15) DEFAULT NULL,
  `tel` char(14) DEFAULT NULL,
  `logradouro` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` char(9) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `senha` varchar(8) DEFAULT NULL,
  `descritivo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_listarprecos` */

DROP TABLE IF EXISTS `vw_listarprecos`;

/*!50001 DROP VIEW IF EXISTS `vw_listarprecos` */;
/*!50001 DROP TABLE IF EXISTS `vw_listarprecos` */;

/*!50001 CREATE TABLE `vw_listarprecos` (
  `id_periodo` int(10) unsigned NOT NULL,
  `periodo` time DEFAULT NULL,
  `valor` varchar(51) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_listarveiculos` */

DROP TABLE IF EXISTS `vw_listarveiculos`;

/*!50001 DROP VIEW IF EXISTS `vw_listarveiculos` */;
/*!50001 DROP TABLE IF EXISTS `vw_listarveiculos` */;

/*!50001 CREATE TABLE `vw_listarveiculos` (
  `id_veiculo` int(10) unsigned NOT NULL,
  `placa` char(8) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `nome` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*View structure for view vw_listarclientes */

/*!50001 DROP TABLE IF EXISTS `vw_listarclientes` */;
/*!50001 DROP VIEW IF EXISTS `vw_listarclientes` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listarclientes` AS select `cliente`.`id_cliente` AS `id_cliente`,`cliente`.`nome` AS `nome`,`cliente`.`cpf` AS `cpf`,`cliente`.`telefone` AS `telefone` from `cliente` */;

/*View structure for view vw_listarfuncionarios */

/*!50001 DROP TABLE IF EXISTS `vw_listarfuncionarios` */;
/*!50001 DROP VIEW IF EXISTS `vw_listarfuncionarios` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listarfuncionarios` AS select `p`.`id_pessoa` AS `id_pessoa`,`p`.`nome` AS `nome`,`p`.`cpf` AS `cpf`,`p`.`cel` AS `cel`,`p`.`tel` AS `tel`,`p`.`logradouro` AS `logradouro`,`p`.`bairro` AS `bairro`,`p`.`cep` AS `cep`,`p`.`cidade` AS `cidade`,`p`.`uf` AS `uf`,`p`.`usuario` AS `usuario`,`p`.`senha` AS `senha`,`t`.`descritivo` AS `descritivo` from (`pessoa` `p` join `tipo` `t` on((`t`.`id_tipo` = `p`.`id_tipo`))) */;

/*View structure for view vw_listarprecos */

/*!50001 DROP TABLE IF EXISTS `vw_listarprecos` */;
/*!50001 DROP VIEW IF EXISTS `vw_listarprecos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listarprecos` AS select `periodo`.`id_periodo` AS `id_periodo`,`periodo`.`periodo` AS `periodo`,concat('R$',format(`periodo`.`valor`,2,'de_DE')) AS `valor` from `periodo` */;

/*View structure for view vw_listarveiculos */

/*!50001 DROP TABLE IF EXISTS `vw_listarveiculos` */;
/*!50001 DROP VIEW IF EXISTS `vw_listarveiculos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listarveiculos` AS select `v`.`id_veiculo` AS `id_veiculo`,`v`.`placa` AS `placa`,`v`.`modelo` AS `modelo`,`c`.`nome` AS `nome` from (`veiculo` `v` join `cliente` `c` on((`c`.`id_cliente` = `v`.`id_cliente`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
