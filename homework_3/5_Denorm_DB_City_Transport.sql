/*DROP DATABASE `sity_transport`;*/

CREATE DATABASE IF NOT EXISTS `sity_transport`;

CREATE TABLE `transport_type` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` CHAR(50) NOT NULL,
    PRIMARY KEY (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8; 

INSERT INTO `transport_type` (`id`, `title`) VALUES 
(NULL, 'bus'),
(NULL, 'tram'),
(NULL, 'trolleybus');

CREATE TABLE `model` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`type_id` INT(11) NOT NULL,
	`description` CHAR(50) NOT NULL,
	`title` CHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

INSERT INTO `model` (`id`, `type_id`, `description`, `title`) VALUES 
(NULL, '1', 'Model 1', 'ZAZ'),
(NULL, '1', 'Model 2', 'Etalon'),
(NULL, '3', 'Troll_Model 1', 'ZIU'),
(NULL, '3', 'Troll_Model 2', 'TROLZA'),
(NULL, '2', 'Tram_Model 1', 'TATRA'),
(NULL, '2', 'Tram_Model 2', 'KTM');

CREATE TABLE `transport_item` (
	`reg_id` INT(11) NOT NULL,
	`type_id` INT(11) NOT NULL,
	`model_id` INT(11) NOT NULL,
	`description` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`reg_id`, `type_id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

INSERT INTO `transport_item` (`reg_id`, `type_id`, `model_id`, `description`) VALUES 
('2122', '1', '1', 'some description'),
('2124', '1', '2', 'some description'),
('2', '2', '5', 'some description'),
('3', '2', '6', 'some description'),
('1', '3', '3', 'some description'),
('2', '3', '4', 'some description');

CREATE TABLE `driver` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`lastname` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

INSERT INTO `driver` (`id`, `name`, `lastname`) VALUES 
(NULL, 'First', 'Driver'),
(NULL, 'Second', 'Driver'),
(NULL, 'Third', 'Driver'),
(NULL, 'Fourth', 'Driver');

CREATE TABLE `driver_transport_type` (
	`driver_id` INT(11) NOT NULL,
	`type_id` INT(11) NOT NULL
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

INSERT INTO `driver_transport_type` (`driver_id`, `type_id`) VALUES 
('1', '1'),
('2', '3'),
('3', '2'),
('2', '1'),
('4', '3');

CREATE TABLE `tour` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`transport_reg_id` INT(11) NOT NULL,
	`type_id` INT(11) NOT NULL,
	`driver_id` INT(11) NOT NULL,
	`date_start` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`date_end` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

INSERT INTO `tour` (`id`, `transport_reg_id`, `type_id`, `driver_id`, `date_start`, `date_end`) VALUES 
(NULL, '2124', '1', '2', current_timestamp(), NULL),
(NULL, '2122', '1', '1', current_timestamp(), NULL),
(NULL, '3', '2', '3', current_timestamp(), NULL),
(NULL, '1', '3', '4', current_timestamp(), NULL);

