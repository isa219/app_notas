CREATE DATABASE app_notas;

USE app_notas;

CREATE TABLE usuario (
id_usu INT AUTO_INCREMENT PRIMARY KEY,
nam_usu VARCHAR(50),
ema_usu VARCHAR(70) UNIQUE,
pas_usu VARCHAR(60)
);

CREATE TABLE categoria (
id_cat INT AUTO_INCREMENT PRIMARY KEY,
tit_cat VARCHAR(25)
);

CREATE TABLE nota (
id_not INT AUTO_INCREMENT,
fec_not DATETIME,
tit_not VARCHAR(20),
tex_not VARCHAR(255),
id_usu INT REFERENCES usuario,
id_cat INT REFERENCES categoria,
PRIMARY KEY (id_not,id_usu,id_cat)
);