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
  `nome` varchar(50) DEFAULT NULL,
  `cpf` char(14) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

insert  into `cliente`(`id_cliente`,`nome`,`cpf`,`telefone`,`status`) values (2,'Robson Formigão Gomes','460.706.578-17','(14) 99742-5938','A'),(3,'Roberto da Silva','283.292.990-80','(14) 3657-3839','A'),(6,'Roberta Maria ','178.190.180-10','(19) 3647-2920','A'),(23,'nhjhjhu','454','54454','I');

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
  `valor` decimal(8,2) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `periodo` */

insert  into `periodo`(`id_periodo`,`periodo`,`valor`,`status`) values (1,'00:10:00','2.00','A'),(2,'00:15:00','3.00','A'),(3,'00:20:00','4.00','A'),(4,'00:25:00','5.00','A'),(5,'00:30:00','6.00','A'),(6,'00:35:00','7.00','A'),(7,'00:40:00','8.00','A'),(8,'00:45:00','9.00','A'),(9,'00:00:10','10.00','I');

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
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`),
  KEY `pessoa_FKTipo` (`id_tipo`),
  CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `pessoa` */

insert  into `pessoa`(`id_pessoa`,`nome`,`cpf`,`cel`,`tel`,`logradouro`,`bairro`,`cep`,`cidade`,`uf`,`usuario`,`senha`,`id_tipo`,`status`) values (2,'Maria dos Santos','497.793.130-74','(14) 99746-1367','(14) 3624-8514','Rua Luiz Augusto 679','Jardim Odette','16470-670','Jau','SP','maria','maria123',2,'A'),(5,'bulinar','asasa','as','as','as','as','as','as','as','jaq','as',1,'I'),(12,'Robson Formigão Gomes','178.190.200-10','(14) 9983-9083','(14) 3674-9080','13289-000','Rua Pachedo Soares 123','Centro','Jaú','SP','rob','rob123',2,'A'),(13,'oi','oi','oi','oi','oi','oi','oi','oi','oi','oi','oi',1,'I');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

/* Procedure structure for procedure `alterarPeriodos` */

/*!50003 DROP PROCEDURE IF EXISTS  `alterarPeriodos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `alterarPeriodos`(in id int, p time, v DECIMAL(8,2))
begin
	if (p = "") then
		SELECT "Preencha o periodo. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
	else
		if (v = "") then
			SELECT "Preencha o valor. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
		else
			UPDATE periodo SET periodo = p, valor = v WHERE id_periodo = id;
		end if;
	end if;
end */$$
DELIMITER ;

/* Procedure structure for procedure `alterarPessoas` */

/*!50003 DROP PROCEDURE IF EXISTS  `alterarPessoas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `alterarPessoas`(in id int , nome varchar(50), cpf char(14),
cel char(15), tel char(14), logradouro varchar(50), bairro varchar (50), 
cep char(9), cidade varchar(30), uf char(2), usuario varchar (10), senha varchar(8), tipo int)
begin
	if( nome = "") then
		SELECT "Preencha o nome. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
	else 
		if(cpf = "") then
			SELECT "Preencha o CPF. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
		else 
			if(cel = "") then
				SELECT "Preencha o celular. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
			else 
				if (tel = "") then
					SELECT "Preencha o telefone. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
				else 
					if(logradouro = "")then
						SELECT "Preencha o logradouro. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
					else
						if(bairro = "") then
							SELECT "Preencha o bairro. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
						else
							if(cep = "") then
								SELECT "Preencha o CEP. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
							ELSE
								IF(cidade = "") THEN
									SELECT "Preencha a cidade. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
								else 
									if(uf = "") then
										SELECT "Preencha a UF. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
									else 
										if(usuario = "") then
											SELECT "Preencha o usuário. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
										else
											if(senha = "") then
												SELECT "Preencha a senha. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
											else 
												UPDATE pessoa SET nome = nome, cpf = cpf,cel=cel, tel=tel, logradouro = logradouro, bairro=bairro,cep=cep, cidade=cidade,uf=uf,usuario=usuario,senha=senha,id_tipo = tipo WHERE id_pessoa = id;
											end if;
										end if;
									end if;
								END IF;
							end if;
						end if;
					end if;
				end if;
			end if;
		end if;
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
		UPDATE cliente SET status = "I" WHERE id_cliente = id;
	end if;
end */$$
DELIMITER ;

/* Procedure structure for procedure `excluirPeriodos` */

/*!50003 DROP PROCEDURE IF EXISTS  `excluirPeriodos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `excluirPeriodos`(in id int)
begin
	IF EXISTS ( SELECT id_periodo FROM alocacao WHERE id_periodo = id) THEN
		SELECT "Este periodo não pode ser excluido, pois possui alocações pendentes a ela." msg;
	ELSE 
		UPDATE periodo SET STATUS = "I" WHERE id_periodo = id;
	END IF;
end */$$
DELIMITER ;

/* Procedure structure for procedure `excluirPessoas` */

/*!50003 DROP PROCEDURE IF EXISTS  `excluirPessoas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `excluirPessoas`(in id int)
begin
	update pessoa set status = "I" where id_pessoa = id;
end */$$
DELIMITER ;

/* Procedure structure for procedure `inserirClientes` */

/*!50003 DROP PROCEDURE IF EXISTS  `inserirClientes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirClientes`(IN nome VARCHAR(50), cpf CHAR(14) ,telefone VARCHAR(15), st char(1))
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
				INSERT INTO cliente  (nome,cpf,telefone,status) VALUES (nome,cpf,telefone,st);
			end if;
		end if;
	end if;
END */$$
DELIMITER ;

/* Procedure structure for procedure `inserirPeriodos` */

/*!50003 DROP PROCEDURE IF EXISTS  `inserirPeriodos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirPeriodos`(in periodo time, valor float, st char(1))
BEGIN
	if(periodo = "") then
		SELECT "Preencha o periodo. (Atenção: Todos os campos devem ser preenchidos!)" msg;
	else
		if(valor = "") then
			SELECT "Preencha o valor. (Atenção: Todos os campos devem ser preenchidos!)" msg;
		else
			INSERT INTO periodo (periodo,valor,STATUS) VALUES (periodo,valor,st);
		end if;
	end if;
	
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

/* Procedure structure for procedure `inserirPessoas` */

/*!50003 DROP PROCEDURE IF EXISTS  `inserirPessoas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirPessoas`(in nome varchar(50), cpf char(14),
cel char(15), tel char(14), logradouro varchar(50), bairro varchar (50), 
cep char(9), cidade varchar(30), uf char(2), usuario varchar (10), senha varchar(8), tipo int , st char(1))
begin
	if( nome = "") then
		SELECT "Preencha o nome. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
	else 
		if(cpf = "") then
			SELECT "Preencha o CPF. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
		else 
			if(cel = "") then
				SELECT "Preencha o celular. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
			else 
				if (tel = "") then
					SELECT "Preencha o telefone. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
				else 
					if(logradouro = "")then
						SELECT "Preencha o logradouro. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
					else
						if(bairro = "") then
							SELECT "Preencha o bairro. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
						else
							if(cep = "") then
								SELECT "Preencha o CEP. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
							ELSE
								IF(cidade = "") THEN
									SELECT "Preencha a cidade. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
								else 
									if(uf = "") then
										SELECT "Preencha a UF. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
									else 
										if(usuario = "") then
											SELECT "Preencha o usuário. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
										else
											if(senha = "") then
												SELECT "Preencha a senha. (Atenção:Todos os campos precisam ser preenchidos!)" msg;
											else 
												INSERT INTO pessoa (nome,cpf,cel,tel,logradouro,bairro,cep,cidade,uf,usuario,senha,id_tipo,status) VALUES (nome,cpf,cel,tel,logradouro,bairro,cep,cidade,uf,usuario,senha,tipo,st);
											end if;
										end if;
									end if;
								END IF;
							end if;
						end if;
					end if;
				end if;
			end if;
		end if;
	end if;
end */$$
DELIMITER ;

/*Table structure for table `vw_listarclientes` */

DROP TABLE IF EXISTS `vw_listarclientes`;

/*!50001 DROP VIEW IF EXISTS `vw_listarclientes` */;
/*!50001 DROP TABLE IF EXISTS `vw_listarclientes` */;

/*!50001 CREATE TABLE `vw_listarclientes` (
  `id_cliente` int(10) unsigned NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
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
  `valor` varchar(48) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_listartipo` */

DROP TABLE IF EXISTS `vw_listartipo`;

/*!50001 DROP VIEW IF EXISTS `vw_listartipo` */;
/*!50001 DROP TABLE IF EXISTS `vw_listartipo` */;

/*!50001 CREATE TABLE `vw_listartipo` (
  `id_tipo` int(10) unsigned NOT NULL,
  `descritivo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_listarveiculos` */

DROP TABLE IF EXISTS `vw_listarveiculos`;

/*!50001 DROP VIEW IF EXISTS `vw_listarveiculos` */;
/*!50001 DROP TABLE IF EXISTS `vw_listarveiculos` */;

/*!50001 CREATE TABLE `vw_listarveiculos` (
  `id_veiculo` int(10) unsigned NOT NULL,
  `placa` char(8) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*View structure for view vw_listarclientes */

/*!50001 DROP TABLE IF EXISTS `vw_listarclientes` */;
/*!50001 DROP VIEW IF EXISTS `vw_listarclientes` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listarclientes` AS select `cliente`.`id_cliente` AS `id_cliente`,`cliente`.`nome` AS `nome`,`cliente`.`cpf` AS `cpf`,`cliente`.`telefone` AS `telefone` from `cliente` where (`cliente`.`status` = 'A') */;

/*View structure for view vw_listarfuncionarios */

/*!50001 DROP TABLE IF EXISTS `vw_listarfuncionarios` */;
/*!50001 DROP VIEW IF EXISTS `vw_listarfuncionarios` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listarfuncionarios` AS select `p`.`id_pessoa` AS `id_pessoa`,`p`.`nome` AS `nome`,`p`.`cpf` AS `cpf`,`p`.`cel` AS `cel`,`p`.`tel` AS `tel`,`p`.`logradouro` AS `logradouro`,`p`.`bairro` AS `bairro`,`p`.`cep` AS `cep`,`p`.`cidade` AS `cidade`,`p`.`uf` AS `uf`,`p`.`usuario` AS `usuario`,`p`.`senha` AS `senha`,`t`.`descritivo` AS `descritivo` from (`pessoa` `p` join `tipo` `t` on((`t`.`id_tipo` = `p`.`id_tipo`))) where (`p`.`status` = 'A') */;

/*View structure for view vw_listarprecos */

/*!50001 DROP TABLE IF EXISTS `vw_listarprecos` */;
/*!50001 DROP VIEW IF EXISTS `vw_listarprecos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listarprecos` AS select `periodo`.`id_periodo` AS `id_periodo`,`periodo`.`periodo` AS `periodo`,concat('R$',format(`periodo`.`valor`,2,'de_DE')) AS `valor` from `periodo` where (`periodo`.`status` = 'A') */;

/*View structure for view vw_listartipo */

/*!50001 DROP TABLE IF EXISTS `vw_listartipo` */;
/*!50001 DROP VIEW IF EXISTS `vw_listartipo` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listartipo` AS select `tipo`.`id_tipo` AS `id_tipo`,`tipo`.`descritivo` AS `descritivo` from `tipo` */;

/*View structure for view vw_listarveiculos */

/*!50001 DROP TABLE IF EXISTS `vw_listarveiculos` */;
/*!50001 DROP VIEW IF EXISTS `vw_listarveiculos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listarveiculos` AS select `v`.`id_veiculo` AS `id_veiculo`,`v`.`placa` AS `placa`,`v`.`modelo` AS `modelo`,`c`.`nome` AS `nome` from (`veiculo` `v` join `cliente` `c` on((`c`.`id_cliente` = `v`.`id_cliente`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
