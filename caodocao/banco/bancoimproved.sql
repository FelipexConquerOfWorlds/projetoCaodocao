-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE statusdoacao (
cod_status int,
descricao varchar(20),
CONSTRAINT statusdoacao_cod_status_pk PRIMARY KEY(cod_status)
);

CREATE TABLE estado (
cod_esta int,
nome varchar(20),
sigla varchar(2),
CONSTRAINT estado_cod_esta_pk PRIMARY KEY(cod_esta)
);

CREATE TABLE cidade (
cod_cida int,
nome varchar(20),
cod_esta int,
CONSTRAINT cidade_cod_cida_pk PRIMARY KEY(cod_cida),
CONSTRAINT cidade_cod_cida_fk FOREIGN KEY(cod_esta) REFERENCES estado (cod_esta)
);

CREATE TABLE porte (
cod_porte int,
descricacao varchar(30),
CONSTRAINT porte_cod_porte_pk PRIMARY KEY(cod_porte)
);

CREATE TABLE animal (
nome varchar(20),
datanascimento date,
cod_animal int,
foto_perfil blob,
cod_raca int,
cod_doacao int,
cod_usu int,
CONSTRAINT animal_cod_animal_pk PRIMARY KEY(cod_animal)
);

CREATE TABLE fotosanimal (
cod_foto int,
legenda varchar(40),
foto blob,
cod_animal int,
CONSTRAINT fotosanimal_cod_foto_pk PRIMARY KEY(cod_foto),
CONSTRAINT fotosanimal_cod_foto_fk FOREIGN KEY(cod_animal) REFERENCES animal (cod_animal)
);

CREATE TABLE raca (
descricao varchar(20),
cod_raca int,
cod_porte int,
CONSTRAINT raca_cod_raca_pk PRIMARY KEY(cod_raca),
CONSTRAINT raca_cod_raca_fk FOREIGN KEY(cod_porte) REFERENCES porte (cod_porte)
);

CREATE TABLE usuario (
nome varchar(40),
email varchar(30),
telefone varchar(20),
senha varchar(20),
cod_usu int,
cnpj int,
cod_cida int,
CONSTRAINT usuario_cod_usu_pk PRIMARY KEY(cod_usu),
CONSTRAINT usuario_cod_usu_fk FOREIGN KEY(cod_cida) REFERENCES cidade (cod_cida)
);

CREATE TABLE doacao (
cod_doacao int,
data_cadastro date,
data_doacao date,
cod_status int,
cod_usu int,
CONSTRAINT doacao_cod_doacao_pk PRIMARY KEY(cod_doacao),
CONSTRAINT doacao_cod_doacao_fk FOREIGN KEY(cod_status) REFERENCES statusdoacao (cod_status),
CONSTRAINT doacao_cod_doacao_fu FOREIGN KEY(cod_usu) REFERENCES usuario (cod_usu)
);

CREATE TABLE comentario (
cod_comentario int,
texto varchar(400),
data_hora datetime,
cod_usu int,
cod_doacao int,
CONSTRAINT comentario_cod_comentario_pk PRIMARY KEY(cod_comentario),
CONSTRAINT comentario_cod_comentario_fu FOREIGN KEY(cod_usu) REFERENCES usuario (cod_usu),
CONSTRAINT comentario_cod_comentario_fk FOREIGN KEY(cod_doacao) REFERENCES doacao (cod_doacao)
);

ALTER TABLE animal ADD CONSTRAINT animal_cod_animal_fa FOREIGN KEY(cod_raca) REFERENCES raca (cod_raca);
ALTER TABLE animal ADD CONSTRAINT animal_cod_animal_fb FOREIGN KEY(cod_doacao) REFERENCES doacao (cod_doacao);
ALTER TABLE animal ADD CONSTRAINT animal_cod_animal_fc FOREIGN KEY(cod_usu) REFERENCES usuario (cod_usu);
