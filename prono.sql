DROP DATABASE IF EXISTS `pronos`;
CREATE DATABASE `prono` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

GRANT ALL PRIVILEGES ON `pronos`.* TO 'pronos'@'localhost' IDENTIFIED BY 'We Love SQL API!';

USE `prono`;




CREATE TABLE `pronostics` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `timestamp` TIMESTAMP NOT NULL,
    `prono`TEXT NOT NULL 
);