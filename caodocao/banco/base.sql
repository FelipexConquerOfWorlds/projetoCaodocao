-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE statusdoacao (
cod_status int PRIMARY KEY,
descricao varchar(300)
);

CREATE TABLE cidade (
cod_cida int PRIMARY KEY,
nome varchar(20),
cod_esta int
);

CREATE TABLE especie (
descricao varchar(300),
cod_especie int PRIMARY KEY
);

CREATE TABLE fotosanimal (
cod_foto int auto_increment PRIMARY KEY,
legenda varchar(300),
foto Text(200),
cod_animal int
);

CREATE TABLE raca (
descricao varchar(300),
cod_raca int PRIMARY KEY,
cod_especie int
);

CREATE TABLE tip_user (
desc_tipuser varchar(80),
cd_tipuser int PRIMARY KEY
);

CREATE TABLE usuario (
nome varchar(20),
email varchar(80),
cod_usu int auto_increment PRIMARY KEY,
cnpj varchar(20),
senha varchar(20),
telefone varchar(11),
cod_cida int,
cd_tipuser int
);

CREATE TABLE sessao (
idsessao int auto_increment PRIMARY KEY,
dti date,
dtf date,
cod_usu int
);

CREATE TABLE estado (
cod_esta int PRIMARY KEY,
nome varchar(20),
sigla varchar(11)
);

CREATE TABLE doacao (
cod_doacao int auto_increment PRIMARY KEY,
data_cadastro date,
data_doacao date,
cod_status int,
cod_usu int
);

CREATE TABLE animal (
nome varchar(20),
datanascimento date,
cod_animal int auto_increment PRIMARY KEY,
foto_perfil Text(200),
cod_doacao int,
cod_raca int
);

CREATE TABLE comentario (
cod_doacao int,
cod_usu int,
texto varchar(300),
dt_coment varchar(300)
);

CREATE TABLE chat (
idsessao int,
cod_usuE int,
texto varchar(300),
dth date,
cod_usuR int
);

ALTER TABLE cidade ADD FOREIGN KEY(cod_esta) REFERENCES estado (cod_esta);
ALTER TABLE fotosanimal ADD FOREIGN KEY(cod_animal) REFERENCES animal (cod_animal);
ALTER TABLE raca ADD FOREIGN KEY(cod_especie) REFERENCES especie (cod_especie);
ALTER TABLE usuario ADD FOREIGN KEY(cod_cida) REFERENCES cidade (cod_cida);
ALTER TABLE usuario ADD FOREIGN KEY(cd_tipuser) REFERENCES tip_user (cd_tipuser);
ALTER TABLE sessao ADD FOREIGN KEY(cod_usu) REFERENCES usuario (cod_usu);
ALTER TABLE doacao ADD FOREIGN KEY(cod_status) REFERENCES statusdoacao (cod_status);
ALTER TABLE doacao ADD FOREIGN KEY(cod_usu) REFERENCES usuario (cod_usu);
ALTER TABLE animal ADD FOREIGN KEY(cod_doacao) REFERENCES doacao (cod_doacao);
ALTER TABLE animal ADD FOREIGN KEY(cod_raca) REFERENCES raca (cod_raca);
ALTER TABLE comentario ADD FOREIGN KEY(cod_doacao) REFERENCES doacao (cod_doacao);
ALTER TABLE comentario ADD FOREIGN KEY(cod_usu) REFERENCES usuario (cod_usu);
ALTER TABLE chat ADD FOREIGN KEY(idsessao) REFERENCES sessao (idsessao);
ALTER TABLE chat ADD FOREIGN KEY(cod_usuE) REFERENCES usuario (cod_usu);
ALTER TABLE chat ADD FOREIGN KEY(cod_usuR) REFERENCES usuario (cod_usu);
