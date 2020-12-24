SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+03:00";

CREATE DATABASE `registro`
  CHARACTER SET utf8
  COLLATE utf8_general_ci;
 
USE `registro`;
 
CREATE TABLE `usuarios` (
    `id` int(11) NOT NULL,
    `nome` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `nickname` VARCHAR(50),
    `dtRegistro` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `idavatar` INT(20),
    `telefone` VARCHAR(12)
)
ENGINE=InnoDB;

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `post` (
  `id_P` int(6) UNSIGNED NOT NULL,
  `id_U` int(6) NOT NULL,
  `publicacao` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `post`
  ADD PRIMARY KEY (`id_P`);

ALTER TABLE `post`
  MODIFY `id_P` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

