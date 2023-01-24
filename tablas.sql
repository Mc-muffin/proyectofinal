CREATE DATABASE IF NOT EXISTS `taller_final`;

USE `taller_final`;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `nombres` VARCHAR(200) NOT NULL,
  `apellidos` VARCHAR(200) NOT NULL,
  `tipo_id` INT NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `actas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `creador_id` INT NOT NULL,
  `asunto` VARCHAR(200) NOT NULL,
  `fecha_creacion` VARCHAR(45) NOT NULL,
  `hora_inicio` TIME NOT NULL,
  `hora_final` TIME NOT NULL,
  `responsable_id` INT NOT NULL,
  `orden_del_dia` TEXT NOT NULL,
  `descripcion_hechos` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creador_id` (`creador_id`),
  CONSTRAINT `creador_id` FOREIGN KEY (`creador_id`) REFERENCES `usuarios` (`id`)
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `asistentes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `acta_id` INT NOT NULL,
  `asistente_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  KEY `acta_id` (`acta_id`),
  CONSTRAINT `acta_id` FOREIGN KEY (`acta_id`) REFERENCES `actas` (`id`),
  KEY `asistente_id` (`asistente_id`),
  CONSTRAINT `asistente_id` FOREIGN KEY (`asistente_id`) REFERENCES `usuarios` (`id`)
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `compromisos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `acta_id` INT NOT NULL,
  `responsable_id` INT NOT NULL,
  `descripcion` TEXT NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_final` DATE NOT NULL,
  PRIMARY KEY (`id`),
  KEY `acta_id` (`acta_id`),
  CONSTRAINT `acta_id` FOREIGN KEY (`acta_id`) REFERENCES `actas` (`id`),
  KEY `responsable_id` (`responsable_id`),
  CONSTRAINT `responsable_id` FOREIGN KEY (`responsable_id`) REFERENCES `usuarios` (`id`)
) DEFAULT CHARSET=utf8mb4;