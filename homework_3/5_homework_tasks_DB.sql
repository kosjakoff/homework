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

INSERT INTO `user` (`id`, `name`, `lastname`, `is_active`) VALUES 
(NULL, `John`, `Smith`, 1),
(NULL, `John`, `Doe`, 1),
(NULL, `John`, `Lennon`, 1),
(NULL, `Jonathan`, `Seagull`, 1),
(NULL, `Jeremy`, `Clarkson`, 0),
(NULL, `Johann`, `Bach`, 1),
(NULL, `Janek`, `Kowalski`, 0),
(NULL, `Jack`, `Sparrow`, 1),
(NULL, `Johney`, `B.Good`, 1);

CREATE TABLE `role` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(50) NOT NULL,
	INDEX `Индекс 1` (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `title`) VALUES 
(NULL, `admin`),
(NULL, `user`),
(NULL, `author`),
(NULL, `singer`),
(NULL, `painter`);

 CREATE TABLE `role_user` (
	`role_id` INT(11) NOT NULL,
	`user_id` INT(11) NOT NULL,
	PRIMARY KEY (`role_id`, `user_id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES 
(1, 1),
(1, 5),
(1, 9),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 8),
(3, 1),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 3);

CREATE TABLE `authorization` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`user_id` INT(11) NOT NULL,
	`date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

INSERT INTO `authorization` (`id`, `user_id`, `date`) VALUES 
(1, 1, '2021-01-20 03:07:16'),
(2, 2, '2022-01-21 03:07:21'),
(3, 1, '2022-01-22 03:07:21'),
(4, 3, '2022-01-23 03:07:21'),
(5, 2, '2022-01-24 03:07:16'),
(6, 4, '2022-01-25 03:07:16'),
(7, 1, '2022-01-26 03:07:16'),
(8, 5, '2022-01-27 03:07:16'),
(9, 3, '2022-01-28 03:07:16'),
(10, 6, '2022-01-29 03:07:16'),
(11, 5, '2022-01-30 03:07:16');

CREATE TABLE `city` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`country_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

INSERT INTO `city` (`id`, `name`, `country_id`) VALUES 
(1, 'Liverpool', 1),
(2, 'Kyiv', 2),
(3, 'Berlin', 3),
(4, 'Kharkiv', 2),
(5, 'Krakov', 4);

CREATE TABLE `city_user` (
	`city_id` INT(11) NOT NULL,
	`user_id` INT(11) NOT NULL,
	PRIMARY KEY (`city_id`, `user_id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

INSERT INTO `city_user` (`city_id`, `user_id`) VALUES 
(1, 1),
(1, 2),
(1, 3),
(4, 4),
(2, 5),
(3, 6),
(5, 7),
(2, 8),
(2, 9);

CREATE TABLE `country` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE = INNODB DEFAULT CHARSET=utf8;

INSERT INTO `country` (`id`, `name`) VALUES 
(1, 'UK'),
(2, 'UA'),
(3, 'D'),
(4, 'PL');
