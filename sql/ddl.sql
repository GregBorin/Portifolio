CREATE DATABASE portifolio;

USE portifolio;

CREATE TABLE seccoes (
 
seccao_id INT NOT NULL AUTO_INCREMENT,
nome_seccao VARCHAR( 20 ) NOT NULL,
CONSTRAINT pk_seccoes PRIMARY KEY (seccao_id)
 
) ENGINE = innodb;
 
CREATE TABLE conteudo (
 
conteudo_id INT NOT NULL AUTO_INCREMENT,
id_seccao INT NOT NULL,
titulo VARCHAR( 30 ) NOT NULL,
subtitulo VARCHAR( 30 ) NOT NULL,
descricao VARCHAR( 1200 ) NOT NULL,
CONSTRAINT pk_conteudo PRIMARY KEY (conteudo_id),
CONSTRAINT fk_conteudo FOREIGN KEY (id_seccao) REFERENCES seccoes(seccao_id)
 
) ENGINE = innodb;
 
CREATE TABLE perfil (
 
perfil_id INT NOT NULL AUTO_INCREMENT,
id_seccao INT NOT NULL,
nome VARCHAR( 50 ) NOT NULL,
foto VARCHAR( 50 ) NOT NULL,
email VARCHAR( 100 ) NOT NULL,
endereco VARCHAR( 200 ) NOT NULL,
descricao VARCHAR( 100 ) NOT NULL,
CONSTRAINT pk_perfil PRIMARY KEY (perfil_id),
CONSTRAINT fk_perfil FOREIGN KEY (id_seccao) REFERENCES seccoes(seccao_id)
 
) ENGINE = innodb;
 
CREATE TABLE redes (
 
rede_id INT NOT NULL AUTO_INCREMENT,
id_perfil INT NOT NULL,
nome_rede VARCHAR( 20 ) NOT NULL,
url VARCHAR( 200 ) NOT NULL,
CONSTRAINT pk_redes PRIMARY KEY (rede_id),
CONSTRAINT fk_redes FOREIGN KEY (id_perfil) REFERENCES perfil(perfil_id)

) ENGINE = innodb;