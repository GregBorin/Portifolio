CREATE DATABASE portifolio;

USE portifolio;

CREATE TABLE seccoes (
 
id_seccao INT NOT NULL AUTO_INCREMENT,
nome_seccao VARCHAR( 20 ) NOT NULL,
CONSTRAINT pk_seccoes PRIMARY KEY (id_seccao)
 
) ENGINE = innodb;
 
CREATE TABLE conteudo (
 
id_conteudo INT NOT NULL AUTO_INCREMENT,
id_seccao INT NOT NULL,
titulo VARCHAR( 30 ) NOT NULL,
subtitulo VARCHAR( 30 ) NOT NULL,
descricao VARCHAR( 1200 ) NOT NULL,
CONSTRAINT pk_conteudo PRIMARY KEY (id_conteudo),
CONSTRAINT fk_conteudo FOREIGN KEY (id_seccao) REFERENCES seccoes(id_seccao)
 
) ENGINE = innodb;
 
CREATE TABLE perfil (
 
id_perfil INT NOT NULL AUTO_INCREMENT,
nome VARCHAR( 20 ) NOT NULL,
sobrenome VARCHAR (20) NOT NULL,
foto VARCHAR( 50 ) NOT NULL,
email VARCHAR( 100 ) NOT NULL,
endereco VARCHAR( 200 ) NOT NULL,
descricao VARCHAR( 1200 ) NOT NULL,
CONSTRAINT pk_perfil PRIMARY KEY (id_perfil)
 
) ENGINE = innodb;
 
CREATE TABLE redes (
 
id_rede INT NOT NULL AUTO_INCREMENT,
id_perfil INT NOT NULL,
nome_rede VARCHAR( 20 ) NOT NULL,
url VARCHAR( 200 ) NOT NULL,
CONSTRAINT pk_redes PRIMARY KEY (id_rede),
CONSTRAINT fk_redes FOREIGN KEY (id_perfil) REFERENCES perfil(id_perfil)

) ENGINE = innodb;