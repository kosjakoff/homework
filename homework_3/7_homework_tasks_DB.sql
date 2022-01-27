/*
Создать таблицы: Пользователь, роли пользователя, у пользователя может быть более одной роли. 
Создать таблицу которая хранит даты авторизаций пользователей в системе. 
Создать таблицы стран и город и привязать к пользователю. Заполнить таблицы данными.
*/

CREATE TABLE `user` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`lastname` VARCHAR(50) NOT NULL,
	`is_active` TINYINT(4) NULL DEFAULT '1',
	PRIMARY KEY (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `role` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(50) NOT NULL,
	INDEX `Индекс 1` (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

 CREATE TABLE `role_user` (
	`role_id` INT(11) NOT NULL,
	`user_id` INT(11) NOT NULL,
	PRIMARY KEY (`role_id`, `user_id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `authorization` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`user_id` INT(11) NOT NULL,
	`date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `city` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`country_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `city_user` (
	`city_id` INT(11) NOT NULL,
	`user_id` INT(11) NOT NULL,
	PRIMARY KEY (`city_id`, `user_id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `country` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;
