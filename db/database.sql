-- Active: 1753105799790@@127.0.0.1@3306@garden
CREATE DATABASE IF NOT EXISTS `garden`;

USE `garden`;

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `plantas`;
DROP TABLE IF EXISTS `riego`

CREATE TABLE `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
);

CREATE TABLE `plantas` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    `familia` varchar(100) NOT NULL,
    `categoria` varchar(100) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `nombre` (`nombre`)
);

CREATE TABLE `riego` (
    `categoria` varchar(100) NOT NULL,
    `frecuencia_riego` int(100) NOT NULL,
    `ex_familias` varchar(100) NOT NULL,
    PRIMARY KEY (`categoria`)
);

INSERT INTO
    `users` (`name`, `email`, `password`)
VALUES ('adrian','adrian@gmail.com',SHA2('h3ll0.', 512)),
       ('ana','ana@gmail.com', SHA2('h3llo.',512));

INSERT INTO
    `plantas` (`nombre`, `familia`, `categoria`)
VALUES ('Aloe Vera','Asphodelaceae','cactus'),
        ('Lavanda','Lamiaceae','ornamental');



SELECT * FROM plantas;

SELECT * FROM users;