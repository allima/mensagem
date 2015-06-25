CREATE TABLE usuario (
cod       INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nome      VARCHAR( 20 ) NOT NULL ,
sobrenome VARCHAR( 40 ) NOT NULL ,
email     VARCHAR( 200 ) NOT NULL ,
login     VARCHAR( 30 ) NOT NULL ,
senha     VARCHAR( 50 ) NOT NULL ,
data      DATETIME NOT NULL ,
);


CREATE TABLE mensagem (
cod         INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
cod_usuario INT NOT NULL,
titulo      VARCHAR(30) NOT NULL,
texto       TEXT NOT NULL,
data        DATETIME NOT NULL, 
);