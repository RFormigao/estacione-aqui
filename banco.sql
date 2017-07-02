/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.1.22-MariaDB : Database - estacione_aqui
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`estacione_aqui` /*!40100 DEFAULT CHARACTER SET utf8 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `acesso` */

insert  into `acesso`(`id_acesso`,`id_menu`,`id_tipo`) values (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,1,2),(6,4,2);

/*Table structure for table `alocacao` */

DROP TABLE IF EXISTS `alocacao`;

CREATE TABLE `alocacao` (
  `id_alocacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vaga` int(10) DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `dataa` date DEFAULT NULL,
  `id_veiculo` int(10) unsigned DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_alocacao`),
  KEY `locacao_FKVeiculo` (`id_veiculo`),
  CONSTRAINT `alocacao_ibfk_2` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

/*Data for the table `alocacao` */

insert  into `alocacao`(`id_alocacao`,`vaga`,`hora_entrada`,`dataa`,`id_veiculo`,`status`) values (57,1,'16:34:42','2017-07-02',1,'liberar'),(58,2,NULL,NULL,NULL,'alocar'),(59,3,NULL,NULL,NULL,'alocar'),(60,4,NULL,NULL,NULL,'alocar'),(61,5,NULL,NULL,NULL,'alocar'),(62,6,NULL,NULL,NULL,'alocar'),(63,7,NULL,NULL,NULL,'alocar'),(64,8,NULL,NULL,NULL,'alocar'),(65,9,NULL,NULL,NULL,'alocar'),(66,10,NULL,NULL,NULL,'alocar'),(67,11,NULL,NULL,NULL,'alocar'),(68,12,NULL,NULL,NULL,'alocar'),(69,13,NULL,NULL,NULL,'alocar'),(70,14,NULL,NULL,NULL,'alocar'),(71,15,NULL,NULL,NULL,'alocar'),(72,16,NULL,NULL,NULL,'alocar'),(73,17,NULL,NULL,NULL,'alocar'),(74,18,NULL,NULL,NULL,'alocar'),(75,19,NULL,NULL,NULL,'alocar'),(76,20,NULL,NULL,NULL,'alocar');

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `cpf` char(14) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

insert  into `cliente`(`id_cliente`,`nome`,`cpf`,`telefone`,`status`) values (2,'Robson Formigão Gomes','460.706.578-17','(14) 99742-5937','A'),(3,'Roberto da Silva','283.292.990-80','(14) 3657-3839','a'),(6,'Roberta Maria ','178.190.180-10','(19) 3647-2920','A'),(23,'nhjhjhu','454','54454','I'),(24,'Robson Formigão Gomes','460.706.578-11','(14) 99742-5938','I'),(25,'dvf','283.292.990-90','12','I'),(26,'dsdsds','283.292.990-90','(14) 3674-9080','I'),(27,'testee','111111','11111','I'),(28,'Maria','11111','1111','I'),(29,'xuca','1111','1111','A'),(30,'dssdd','44444','4444','I'),(31,'sasas','4444','4444','A'),(32,'dssdd','41114','1000','A'),(33,'dssdd','41114','1000','A'),(34,'dsnjshd','4544','1110','A'),(35,'shduhshu','444','4444','A'),(36,'shduhshu','444','4444','A'),(37,'wsq','as','sas','A');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(50) DEFAULT NULL,
  `link` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`descritivo`,`link`) values (1,'Gerenciar Clientes','cliente.php'),(2,'Gerenciar Funcionários','funcionario.php'),(3,'Gerenciar Preços','periodo.php'),(4,'Gerenciar Veiculos','veiculo.php');

/*Table structure for table `periodo` */

DROP TABLE IF EXISTS `periodo`;

CREATE TABLE `periodo` (
  `id_periodo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `periodo` time DEFAULT NULL,
  `valor` decimal(8,2) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `periodo` */

insert  into `periodo`(`id_periodo`,`periodo`,`valor`,`status`) values (1,'00:10:00','2.00','A'),(2,'00:15:00','3.00','A'),(3,'00:20:00','4.00','A'),(4,'00:25:00','5.00','A'),(5,'00:30:00','6.00','A'),(6,'00:35:00','7.00','A'),(7,'00:40:00','8.00','A'),(8,'00:45:00','9.00','A'),(9,'00:00:10','10.00','I'),(10,'00:45:30','120.00','I'),(11,'12:12:12','12.08','I');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `pessoa` */

insert  into `pessoa`(`id_pessoa`,`nome`,`cpf`,`cel`,`tel`,`logradouro`,`bairro`,`cep`,`cidade`,`uf`,`usuario`,`senha`,`id_tipo`,`status`) values (2,'Maria dos Santos','497.793.130-74','(14) 99746-1367','(14) 3624-8514','Rua Luiz','Jardim Od','16470-670','Jau','SP','maria','maria123',1,'I'),(5,'bulinar','asasa','as','as','as','as','as','as','as','jaq','as',1,'I'),(12,'Robson Formigão Gomes','178.190.200-10','(14) 9983-9083','(14) 3674-9080','Centro','13289-000','Rua Pache','Jaú','SP','rob','rob123',1,'I'),(13,'oi','oi','oi','oi','oi','oi','oi','oi','oi','oi','oi',1,'I'),(14,'jdsjidsj','111','11','11','111','111','11','111','11','1111','1111',1,'I'),(15,'Robson Formigão Gomes','465.212.508-99','(14) 9983-9083','(14) 3674-9080','13289-000','Rua Pache','Deolindo','Jaú','SP','admin','admin',1,'A'),(16,'Roberta da Cruz','132.903.390-00','(14) 9 9080-908','(14) 3443-3454','17304-000','Rua José Alberto 190','Centro','Jaú','SP','robertinha','ro123',2,'A');

/*Table structure for table `registro_alocacao` */

DROP TABLE IF EXISTS `registro_alocacao`;

CREATE TABLE `registro_alocacao` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `vaga` int(11) DEFAULT NULL,
  `dataa` date DEFAULT NULL,
  `horai` time DEFAULT NULL,
  `horaf` time DEFAULT NULL,
  `id_periodo` int(10) unsigned DEFAULT NULL,
  `placa` char(9) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `FK_registro_alocacao` (`id_periodo`),
  CONSTRAINT `FK_registro_alocacao` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `registro_alocacao` */

insert  into `registro_alocacao`(`id_registro`,`vaga`,`dataa`,`horai`,`horaf`,`id_periodo`,`placa`,`modelo`) values (4,3,'2017-06-26','09:15:20','12:25:21',2,'FDI-4593','Cruze LT'),(5,2,'2017-06-30','11:53:00','12:28:06',4,'FND-1226','Palio'),(6,3,'2017-06-26','09:15:20','12:29:43',4,'FDI-4593','Cruze LT'),(7,3,'2017-06-30','12:30:14','12:31:11',5,'FND-1226','Palio'),(8,4,'2017-06-27','08:31:49','12:31:26',7,'FGB-4679','Fiesta'),(9,3,'2017-07-02','15:32:15','15:32:27',1,'FND-1226','Palio');

/*Table structure for table `tipo` */

DROP TABLE IF EXISTS `tipo`;

CREATE TABLE `tipo` (
  `id_tipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipo` */

insert  into `tipo`(`id_tipo`,`descritivo`) values (1,'Administrador'),(2,'Funcionário(a)');

/*Table structure for table `veiculo` */

DROP TABLE IF EXISTS `veiculo`;

CREATE TABLE `veiculo` (
  `id_veiculo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `placa` char(8) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `id_cliente` int(10) unsigned DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_veiculo`),
  KEY `veiculo_FKCliente` (`id_cliente`),
  CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `veiculo` */

insert  into `veiculo`(`id_veiculo`,`placa`,`modelo`,`id_cliente`,`status`) values (1,'FND-1226','Celta',3,'A'),(2,'FGB-4679','Fiesta',2,'A'),(3,'FND-2020','Fusion',2,'A'),(4,'KDL-5930','Uno',6,'I'),(5,'KGK-1493','Fusca',3,'A'),(6,'FDI-4593','Cruze LT',3,'A'),(7,'FND-1226','Fiestaa',2,'I'),(8,'fnd-1921','gol',2,'I'),(9,'TBN-1451','Gol',29,'A'),(10,'TBN-1451','Gol',29,'A');

/* Trigger structure for table `registro_alocacao` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `atualizarAlocacao` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `atualizarAlocacao` AFTER INSERT ON `registro_alocacao` FOR EACH ROW BEGIN
		update alocacao set hora_entrada = null, dataa = null, id_veiculo = null, status = "alocar" where vaga = new.vaga;
	
	END */$$


DELIMITER ;

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
				SELECT "Cliente alterado com sucesso =)" AS msg;
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
			SELECT "Preço alterado com sucesso =)" AS msg;
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
												SELECT "Funcionário alterado com sucesso =)" AS msg;
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

/* Procedure structure for procedure `alterarVeiculos` */

/*!50003 DROP PROCEDURE IF EXISTS  `alterarVeiculos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `alterarVeiculos`(in id int, p char(8), m varchar(20), id_c int)
begin
	if(p = "") then
		SELECT "Preencha a placa do veículo. (Atenção: Todos os campos devem ser preenchidos!)" msg;
	else
		if (m = "") then
			SELECT "Preencha o modelo do veículo. (Atenção: Todos os campos devem ser preenchidos!)" msg;
		else
			if (id_c = "") then
				SELECT "Preencha o proprietário do veículo. (Atenção: Todos os campos devem ser preenchidos!)" msg;
			else
				update veiculo set placa = p, modelo = m, id_cliente = id_c where id_veiculo = id;
				SELECT "Veículo alterado com sucesso =)" AS msg;
			end if;
		end if;
	end if;
end */$$
DELIMITER ;

/* Procedure structure for procedure `buscarAlocacao` */

/*!50003 DROP PROCEDURE IF EXISTS  `buscarAlocacao` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarAlocacao`(in vaga int)
begin
	select c.nome, v.modelo, v.placa, a.dataa, a.hora_entrada, current_time "horaf", TIMEDIFF(CURRENT_TIME, hora_entrada) "diferenca" from alocacao a 
	inner join veiculo v on (v.id_veiculo = a.id_veiculo)
	inner join cliente c on (v.id_cliente = c.id_cliente)
	where a.vaga = vaga and a.status = "liberar";
end */$$
DELIMITER ;

/* Procedure structure for procedure `buscarPermissoes` */

/*!50003 DROP PROCEDURE IF EXISTS  `buscarPermissoes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarPermissoes`(in id int)
begin
	SELECT m.descritivo, m.link
	FROM menu m 
	INNER JOIN acesso a ON (m.id_menu = a.id_menu) 
	WHERE a.id_tipo = id;
end */$$
DELIMITER ;

/* Procedure structure for procedure `buscarValor` */

/*!50003 DROP PROCEDURE IF EXISTS  `buscarValor` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarValor`(in idperiodo int)
begin
	if(idperiodo <= 0 || idperiodo is null )then
		select "Periodo inválido !" as msg;
	else
		select concat("R$", format(valor, 2, "de_DE")) "valor" from periodo where id_periodo = idperiodo;
	end if;
end */$$
DELIMITER ;

/* Procedure structure for procedure `buscarVeiculos` */

/*!50003 DROP PROCEDURE IF EXISTS  `buscarVeiculos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarVeiculos`(in p char(8))
begin
	select c.nome, v.modelo,v.id_veiculo,current_date "datai", current_time "horai" from veiculo v inner join cliente c on (v.id_cliente = c.id_cliente) where v.placa = p and v.status = "A";
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
		SELECT "Cliente excluido com sucesso =)" AS msg;
	end if;
end */$$
DELIMITER ;

/* Procedure structure for procedure `excluirPeriodos` */

/*!50003 DROP PROCEDURE IF EXISTS  `excluirPeriodos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `excluirPeriodos`(in id int)
begin
	UPDATE periodo SET STATUS = "I" WHERE id_periodo = id;
	SELECT "Preço excluído com sucesso =)" AS msg;
end */$$
DELIMITER ;

/* Procedure structure for procedure `excluirPessoas` */

/*!50003 DROP PROCEDURE IF EXISTS  `excluirPessoas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `excluirPessoas`(in id int)
begin
	update pessoa set status = "I" where id_pessoa = id;
	SELECT "Funcionário excluído com sucesso =)" AS msg;
	
end */$$
DELIMITER ;

/* Procedure structure for procedure `excluirVeiculos` */

/*!50003 DROP PROCEDURE IF EXISTS  `excluirVeiculos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `excluirVeiculos`(in id int)
begin
	UPDATE veiculo SET STATUS = "I" WHERE id_veiculo = id;
	SELECT "Veículo excluído com sucesso =)" AS msg;
end */$$
DELIMITER ;

/* Procedure structure for procedure `inserirAlocacao` */

/*!50003 DROP PROCEDURE IF EXISTS  `inserirAlocacao` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirAlocacao`(in v int, horae time, dataa date, idveiculo int)
begin
	if(v = "") then
		SELECT "Preencha a vaga. (Atenção: Todos os campos devem ser preenchidos!)" msg;
	else 
		if(horae = "")then
			SELECT "Preencha a hora de entrada. (Atenção: Todos os campos devem ser preenchidos!)" msg;
		else 
			if(dataa = "")then
				SELECT "Preencha a data. (Atenção: Todos os campos devem ser preenchidos!)" msg;
			else 
				if(idveiculo = "")then
					SELECT "Preencha o veículo. (Atenção: Todos os campos devem ser preenchidos!)" msg;
				else
					UPDATE alocacao SET hora_entrada = horae, dataa = dataa, id_veiculo = idveiculo, status = "liberar" where vaga = v;
				end if;
			end if;
		end if;
	end if;
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
				select "Cliente inserido com sucesso =)" as msg;
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
			SELECT "Preço inserido com sucesso =)" AS msg;
		end if;
	end if;
	
END */$$
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
												SELECT "Funcionário inserido com sucesso =)" AS msg;
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

/* Procedure structure for procedure `inserirRegistro` */

/*!50003 DROP PROCEDURE IF EXISTS  `inserirRegistro` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirRegistro`(in vaga int, dataa date, horai time, horaf time, id_periodo int,placa char(9),modelo varchar(30))
BEGIN
	insert into registro_alocacao (vaga,dataa,horai,horaf,id_periodo,placa,modelo) values (vaga,dataa,horai,current_time,id_periodo,placa,modelo);
END */$$
DELIMITER ;

/* Procedure structure for procedure `inserirVeiculos` */

/*!50003 DROP PROCEDURE IF EXISTS  `inserirVeiculos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirVeiculos`(in p varchar(8), m varchar(20), id_c int, st char(1))
begin
	if(p = "") then
		SELECT "Preencha a placa do veículo. (Atenção: Todos os campos devem ser preenchidos!)" msg;
	else
		if (m = "") then
			SELECT "Preencha o modelo do veículo. (Atenção: Todos os campos devem ser preenchidos!)" msg;
		else
			if (id_c = "") then
				SELECT "Preencha o proprietário do veículo. (Atenção: Todos os campos devem ser preenchidos!)" msg;
			else
				insert into veiculo (placa, modelo, id_cliente, status) values (p, m, id_c, st);
				SELECT "Veículo inserido com sucesso =)" AS msg;
			end if;
		end if;
	end if;
end */$$
DELIMITER ;

/* Procedure structure for procedure `inserir_registro` */

/*!50003 DROP PROCEDURE IF EXISTS  `inserir_registro` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `inserir_registro`(in vaga int, dataa date, horai time, horaf time, id_periodo int,placa char(9),modelo varchar(30))
BEGIN
	insert into registro_alocacao (vaga,dataa,horai,horaf,id_periodo,placa,modelo) values (vaga,dataa,horai,horaf,id_periodo,placa,modelo);
END */$$
DELIMITER ;

/* Procedure structure for procedure `login` */

/*!50003 DROP PROCEDURE IF EXISTS  `login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(in pessoa varchar(10),pass varchar (8))
begin
		SELECT p.id_pessoa, p.nome, p.id_tipo, t.descritivo FROM pessoa p inner join tipo t on (p.id_tipo = t.id_tipo) WHERE usuario = pessoa AND senha = pass and status = "A";
end */$$
DELIMITER ;

/*Table structure for table `vw_contaralocacoes` */

DROP TABLE IF EXISTS `vw_contaralocacoes`;

/*!50001 DROP VIEW IF EXISTS `vw_contaralocacoes` */;
/*!50001 DROP TABLE IF EXISTS `vw_contaralocacoes` */;

/*!50001 CREATE TABLE `vw_contaralocacoes` (
  `contagem` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 */;

/*Table structure for table `vw_listaralocacao` */

DROP TABLE IF EXISTS `vw_listaralocacao`;

/*!50001 DROP VIEW IF EXISTS `vw_listaralocacao` */;
/*!50001 DROP TABLE IF EXISTS `vw_listaralocacao` */;

/*!50001 CREATE TABLE `vw_listaralocacao` (
  `id_alocacao` int(10) unsigned NOT NULL,
  `vaga` int(10) DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `dataa` date DEFAULT NULL,
  `id_veiculo` int(10) unsigned DEFAULT NULL,
  `status` varchar(10) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 */;

/*Table structure for table `vw_listarclientes` */

DROP TABLE IF EXISTS `vw_listarclientes`;

/*!50001 DROP VIEW IF EXISTS `vw_listarclientes` */;
/*!50001 DROP TABLE IF EXISTS `vw_listarclientes` */;

/*!50001 CREATE TABLE `vw_listarclientes` (
  `id_cliente` int(10) unsigned NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `cpf` char(14) CHARACTER SET latin1 DEFAULT NULL,
  `telefone` varchar(15) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 */;

/*Table structure for table `vw_listarfuncionarios` */

DROP TABLE IF EXISTS `vw_listarfuncionarios`;

/*!50001 DROP VIEW IF EXISTS `vw_listarfuncionarios` */;
/*!50001 DROP TABLE IF EXISTS `vw_listarfuncionarios` */;

/*!50001 CREATE TABLE `vw_listarfuncionarios` (
  `id_pessoa` int(10) unsigned NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `cpf` char(14) CHARACTER SET latin1 DEFAULT NULL,
  `cel` char(15) CHARACTER SET latin1 DEFAULT NULL,
  `tel` char(14) CHARACTER SET latin1 DEFAULT NULL,
  `logradouro` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `bairro` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `cep` char(9) CHARACTER SET latin1 DEFAULT NULL,
  `cidade` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `uf` char(2) CHARACTER SET latin1 DEFAULT NULL,
  `usuario` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `senha` varchar(8) CHARACTER SET latin1 DEFAULT NULL,
  `descritivo` varchar(15) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 */;

/*Table structure for table `vw_listarprecos` */

DROP TABLE IF EXISTS `vw_listarprecos`;

/*!50001 DROP VIEW IF EXISTS `vw_listarprecos` */;
/*!50001 DROP TABLE IF EXISTS `vw_listarprecos` */;

/*!50001 CREATE TABLE `vw_listarprecos` (
  `id_periodo` int(10) unsigned NOT NULL,
  `periodo` time DEFAULT NULL,
  `valor` varchar(48) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 */;

/*Table structure for table `vw_listartipo` */

DROP TABLE IF EXISTS `vw_listartipo`;

/*!50001 DROP VIEW IF EXISTS `vw_listartipo` */;
/*!50001 DROP TABLE IF EXISTS `vw_listartipo` */;

/*!50001 CREATE TABLE `vw_listartipo` (
  `id_tipo` int(10) unsigned NOT NULL,
  `descritivo` varchar(15) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 */;

/*Table structure for table `vw_listarveiculos` */

DROP TABLE IF EXISTS `vw_listarveiculos`;

/*!50001 DROP VIEW IF EXISTS `vw_listarveiculos` */;
/*!50001 DROP TABLE IF EXISTS `vw_listarveiculos` */;

/*!50001 CREATE TABLE `vw_listarveiculos` (
  `id_veiculo` int(11) unsigned NOT NULL,
  `placa` char(8) CHARACTER SET latin1 DEFAULT NULL,
  `modelo` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `nome` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 */;

/*View structure for view vw_contaralocacoes */

/*!50001 DROP TABLE IF EXISTS `vw_contaralocacoes` */;
/*!50001 DROP VIEW IF EXISTS `vw_contaralocacoes` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_contaralocacoes` AS select count(`alocacao`.`status`) AS `contagem` from `alocacao` where (`alocacao`.`status` = 'liberar') */;

/*View structure for view vw_listaralocacao */

/*!50001 DROP TABLE IF EXISTS `vw_listaralocacao` */;
/*!50001 DROP VIEW IF EXISTS `vw_listaralocacao` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listaralocacao` AS select `alocacao`.`id_alocacao` AS `id_alocacao`,`alocacao`.`vaga` AS `vaga`,`alocacao`.`hora_entrada` AS `hora_entrada`,`alocacao`.`dataa` AS `dataa`,`alocacao`.`id_veiculo` AS `id_veiculo`,`alocacao`.`status` AS `status` from `alocacao` */;

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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listarveiculos` AS select `v`.`id_veiculo` AS `id_veiculo`,`v`.`placa` AS `placa`,`v`.`modelo` AS `modelo`,`c`.`nome` AS `nome` from (`veiculo` `v` join `cliente` `c` on((`c`.`id_cliente` = `v`.`id_cliente`))) where (`v`.`status` = 'A') */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
