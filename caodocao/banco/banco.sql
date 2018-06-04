
CREATE TABLE statusdoacao (
cod_status varchar(20) PRIMARY KEY,
descricao varchar(20)
);

CREATE TABLE estado (
cod_esta varchar(20) PRIMARY KEY,
nome varchar(20),
sigla varchar(20)
);

CREATE TABLE cidade (
cod_cida varchar(20) PRIMARY KEY,
nome varchar(20),
cod_esta varchar(20),
FOREIGN KEY(cod_esta) REFERENCES estado (cod_esta)
);

CREATE TABLE porte (
cod_porte varchar(20) PRIMARY KEY,
descricacao varchar(20)
);

CREATE TABLE animal (
nome varchar(20),
datanascimento varchar(20),
cod_animal varchar(20) PRIMARY KEY,
foto_perfil varchar(20),
cod_raca varchar(20),
cod_doacao varchar(20),
cod_usu varchar(20)
);

CREATE TABLE fotosanimal (
cod_foto varchar(20) PRIMARY KEY,
legenda varchar(20),
foto varchar(20),
cod_animal varchar(20),
FOREIGN KEY(cod_animal) REFERENCES animal (cod_animal)
);

CREATE TABLE raca (
descricao varchar(20),
cod_raca varchar(20) PRIMARY KEY,
cod_porte varchar(20),
FOREIGN KEY(cod_porte) REFERENCES porte (cod_porte)
);

CREATE TABLE ong (
cnpj varchar(20),
cod_usu varchar(20),
);

CREATE TABLE usuario (
nome varchar(20),
email varchar(20),
telefone varchar(20),
senha varchar(20),
cod_usu varchar(20) PRIMARY KEY,
cod_cida varchar(20),
FOREIGN KEY(cod_cida) REFERENCES cidade (cod_cida)
);

CREATE TABLE doacao (
cod_doacao varchar(20) PRIMARY KEY,
data_cadastro varchar(20),
data_doacao varchar(20),
cod_status varchar(20),
cod_usu varchar(20),

FOREIGN KEY(cod_status) REFERENCES statusdoacao (cod_status),
FOREIGN KEY(cod_usu) REFERENCES usuario (cod_usu),
FOREIGN KEY(cod_usu) REFERENCES usuario (cod_usu)
);

CREATE TABLE comentario (
cod_comentario varchar(20) PRIMARY KEY,
texto varchar(20),
data_hora varchar(20),
cod_usu varchar(20),
cod_doacao varchar(20),
FOREIGN KEY(cod_usu) REFERENCES usuario (cod_usu),
FOREIGN KEY(cod_doacao) REFERENCES doacao (cod_doacao)
);

ALTER TABLE animal ADD FOREIGN KEY(cod_raca) REFERENCES raca (cod_raca);
ALTER TABLE animal ADD FOREIGN KEY(cod_doacao) REFERENCES doacao (cod_doacao);
ALTER TABLE animal ADD FOREIGN KEY(cod_usu) REFERENCES usuario (cod_usu);
ALTER TABLE ong ADD FOREIGN KEY(cod_usu) REFERENCES usuario (cod_usu);
