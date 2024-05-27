CREATE TABLE `usuarios` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45),
  `apellidos` varchar(45),
  `email` varchar(155),
  `clave` varchar(255),
  `rol` varchar(45)
);

CREATE TABLE `reuniones` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `fecha` date,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `dia` varchar(45) NOT NULL,
  `invitados` int NOT NULL,
  `estado` bit(1) DEFAULT 1
);

CREATE TABLE `actas` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `id_reunion` int NOT NULL,
  `dia` varchar(45) NOT NULL,
  `acontecimientos` text,
  `contenido` text,
  `estado` varchar(45)
);

CREATE TABLE `documentos` (
  `id` int PRIMARY KEY NOT NULL,
  `path` varchar(255),
  `id_acta` int NOT NULL
);

CREATE TABLE `compromisos` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_acta` int NOT NULL,
  `id_responsable` int NOT NULL,
  `estado` varchar(45)
);

ALTER TABLE `compromisos` ADD FOREIGN KEY (`id_responsable`) REFERENCES `usuarios` (`id`);

ALTER TABLE `compromisos` ADD FOREIGN KEY (`id_acta`) REFERENCES `actas` (`id`);

ALTER TABLE `documentos` ADD FOREIGN KEY (`id`) REFERENCES `actas` (`id`);

ALTER TABLE `actas` ADD FOREIGN KEY (`id_reunion`) REFERENCES `reuniones` (`id`);
