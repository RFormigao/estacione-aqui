CREATE TABLE menu (
  id_menu INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descritivo VARCHAR(50) NULL,
  link VARCHAR(30) NULL,
  PRIMARY KEY(id_menu)
);

CREATE TABLE periodo (
  id_periodo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  periodo TIME NULL,
  valor FLOAT NULL,
  PRIMARY KEY(id_periodo)
);

CREATE TABLE tipo (
  id_tipo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descritivo VARCHAR(15) NULL,
  PRIMARY KEY(id_tipo)
);

CREATE TABLE cliente (
  id_cliente INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NULL,
  cpf  CHAR(13) NULL,
  telefone VARCHAR(14) NULL,
  PRIMARY KEY(id_cliente)
);

CREATE TABLE veiculo (
  id_veiculo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  placa CHAR(8) NULL,
  modelo VARCHAR(20) NULL,
  id_cliente INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_veiculo),
  INDEX veiculo_FKCliente(id_cliente),
  FOREIGN KEY(id_cliente)
    REFERENCES cliente(id_cliente)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE pessoa (
  id_pessoa INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NULL,
  cpf CHAR(13) NULL,
  cel CHAR(14) NULL,
  tel CHAR(13) NULL,
  logradouro VARCHAR(50) NULL,
  bairro VARCHAR(50) NULL,
  cep CHAR(9) NULL,
  cidade VARCHAR(30) NULL,
  uf CHAR(2) NULL,
  usuario VARCHAR(10) NULL,
  senha VARCHAR(8) NULL,
  id_tipo INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_pessoa),
  INDEX pessoa_FKTipo(id_tipo),
  FOREIGN KEY(id_tipo)
    REFERENCES tipo(id_tipo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE alocacao (
  id_alocacao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  vaga INTEGER UNSIGNED ZEROFILL NULL,
  hora_entrada TIME NULL,
  hora_saida TIME NULL,
  dataa DATE NULL,
  valor FLOAT NULL,
  id_periodo INTEGER UNSIGNED NULL,
  id_veiculo INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_alocacao),
  INDEX locacao_FKPeriodo(id_periodo),
  INDEX locacao_FKVeiculo(id_veiculo),
  FOREIGN KEY(id_periodo)
    REFERENCES periodo(id_periodo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_veiculo)
    REFERENCES veiculo(id_veiculo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE acesso (
  id_acesso INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_menu INTEGER UNSIGNED NULL,
  id_tipo INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_acesso),
  INDEX acesso_FKTipo(id_tipo),
  INDEX acesso_FKMenu(id_menu),
  FOREIGN KEY(id_tipo)
    REFERENCES tipo(id_tipo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_menu)
    REFERENCES menu(id_menu)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


