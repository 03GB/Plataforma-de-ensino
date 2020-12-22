CREATE DATABASE `registro`
  CHARACTER SET utf8
  COLLATE utf8_general_ci;
 
USE `registro`;
 
CREATE TABLE `usuarios` (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    dtRegistro DATETIME DEFAULT CURRENT_TIMESTAMP,
    idavatar INT(30)
)
ENGINE=InnoDB;
 
