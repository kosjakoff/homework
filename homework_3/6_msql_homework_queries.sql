/* Написать следующие SQL запросы: */

/*
Посчитать сколько пользователей живет в каждой стране и каждом городе
*/

SELECT `city`.`id`, `city`.`name`, COUNT(*) AS `total_user`  
FROM `city` 
    INNER JOIN `city_user` ON (`city`.`id` = `city_user`.`city_id`)
GROUP BY `city_user`.`city_id`; 

SELECT `country`.`id`, `country`.`name`, COUNT(*) AS `total_user`  
FROM `city` 
    INNER JOIN `city_user` ON (`city`.`id` = `city_user`.`city_id`)
    INNER JOIN `country` ON (`city`.`country_id` = `country`.`id`)
GROUP BY `country`.`id`; 

/*
Посчитать сколько пользователей живет в каждой стране и в каждом городе которые авторизовались за последние трое суток.
*/

SELECT `city`.`id`, `city`.`name`, COUNT(*) AS `total_user`  
FROM `city` 
    INNER JOIN `city_user` ON (`city`.`id` = `city_user`.`city_id`)
    INNER JOIN `authorization` ON (`authorization`.`user_id` = `city_user`.`user_id`)
    WHERE (TO_DAYS(NOW( )) - TO_DAYS(`date`)) <= 3
GROUP BY `city_user`.`city_id`; 

SELECT `country`.`id`, `country`.`name`, COUNT(*) AS `total_user`  
FROM `city` 
    INNER JOIN `city_user` ON (`city`.`id` = `city_user`.`city_id`)
    INNER JOIN `country` ON (`city`.`country_id` = `country`.`id`)
    INNER JOIN `authorization` ON (`authorization`.`user_id` = `city_user`.`user_id`)
    WHERE (TO_DAYS(NOW( )) - TO_DAYS(`date`)) <= 3
GROUP BY `country`.`id`; 

/*
Найти ту страну и тот город с которого максимальное количество авторизаций за (все время/за последние три дня/за последний месяц/квартал/год)
*/

SELECT `city_user_authorization`.`city_id`, `city_user_authorization`.`name`, MAX(`total_user`) 
FROM (
	SELECT `city_user`.`city_id`, `city`.`name`, COUNT(*) AS `total_user` 
    FROM `city` 
        INNER JOIN `city_user` ON (`city`.`id` = `city_user`.`city_id`)
        INNER JOIN `authorization` ON (`city_user`.`user_id` = `authorization`.`user_id`)
    WHERE (MONTH(NOW( )) = MONTH(`date`)) AND (YEAR(NOW( )) = YEAR(`date`))
    GROUP BY `city`.`id`
) `city_user_authorization`;

SELECT `country_user_authorization`.`id`, `country_user_authorization`.`name`, MAX(`total_user`) 
FROM (
    SELECT `country`.`id`, `country`.`name`, COUNT(*) AS `total_user`  
    FROM `city` 
        INNER JOIN `city_user` ON (`city`.`id` = `city_user`.`city_id`)
        INNER JOIN `country` ON (`city`.`country_id` = `country`.`id`)
        INNER JOIN `authorization` ON (`authorization`.`user_id` = `city_user`.`user_id`)
    WHERE (QUARTER(NOW( )) = QUARTER(`date`)) AND (YEAR(NOW( )) = YEAR(`date`))
    GROUP BY `country`.`id`
) `country_user_authorization`;

/*
Вывести список стран по возрастанию количества пользователей в стране. (Аналогично сделать для городов)
*/

SELECT `city`.`id`, `city`.`name`, COUNT(*) AS `total_user` 
FROM `city` 
    INNER JOIN `city_user` ON (`city`.`id` = `city_user`.`city_id`)
GROUP BY `city`.`id`
ORDER BY `total_user` ASC;

SELECT `country`.`id`, `country`.`name`, COUNT(*) AS `total_user` 
FROM `city` 
    INNER JOIN `city_user` ON (`city`.`id` = `city_user`.`city_id`)
    INNER JOIN `country` ON (`city`.`country_id` = `country`.`id`)
GROUP BY `country`.`id`
ORDER BY `total_user` ASC;

/*
Посчитать сколько проживает пользователей по ролям в каждом городе/каждой стране
*/

SELECT `city_user`.`city_id`, `city`.`name`, `role_user`.`role_id`, `role`.`title`, COUNT(*) AS `total_user`
FROM `city_user` 
    INNER JOIN (`city` ON `city`.`id` = `city_user`.`city_id`) 
    INNER JOIN (`role_user` ON `role_user`.`user_id` = `city_user`.`user_id`) 
    INNER JOIN (`role` ON `role`.`id` = `role_user`.`role_id`) 
GROUP BY `role_user`.`role_id`, `city_user`.`city_id`;

SELECT `city`.`country_id`, `country`.`name`, `role_user`.`role_id`, `role`.`title`, COUNT(*) AS `total_user`
FROM `city_user` 
    INNER JOIN `city` ON (`city`.`id` = `city_user`.`city_id`) 
    INNER JOIN `role_user` ON (`role_user`.`user_id` = `city_user`.`user_id`) 
    INNER JOIN `country` ON (`city`.`country_id` = `country`.`id`)
    INNER JOIN `role` ON (`role`.`id` = `role_user`.`role_id`) 
GROUP BY `role_user`.`role_id`, `city`.`country_id`;

/*
Посчитать сколько раз заходили пользователи с ролью админ за последний месяц в разрезе каждой страны и города
*/

SELECT `city_user`.`city_id`, `city`.`name`, `authorization`.`user_id`, COUNT(*) AS `total_user`
FROM `city_user` 
    INNER JOIN `city` ON (`city`.`id` = `city_user`.`city_id`) 
    INNER JOIN `role_user` ON (`role_user`.`user_id` = `city_user`.`user_id`) 
    INNER JOIN `role` ON (`role`.`id` = `role_user`.`role_id`) 
    INNER JOIN `authorization` ON (`city_user`.`user_id` = `authorization`.`user_id`)
WHERE `role`.`title` = 'admin' 
AND  (TO_DAYS(NOW( )) - TO_DAYS(`date`)) <= 30 
GROUP BY `city_user`.`city_id`, `authorization`.`user_id`;

SELECT `city`.`country_id`, `country`.`name`, `authorization`.`user_id`, COUNT(*) AS `total_user`
FROM `city_user` 
    INNER JOIN `city` ON (`city`.`id` = `city_user`.`city_id`) 
    INNER JOIN `role_user` ON (`role_user`.`user_id` = `city_user`.`user_id`) 
    INNER JOIN `country` ON (`city`.`country_id` = `country`.`id`)
    INNER JOIN `role` ON (`role`.`id` = `role_user`.`role_id`) 
    INNER JOIN `authorization` ON (`city_user`.`user_id` = `authorization`.`user_id`)
WHERE `role`.`title` = 'admin'
AND (MONTH(NOW( )) = MONTH(`date`)) AND (YEAR(NOW( )) = YEAR(`date`))
GROUP BY `city`.`country_id`, `authorization`.`user_id`;

/*
Найти всех пользователей у которых нет ни одной роли
*/

SELECT `user`.`id`, `user`.`name`, `user`.`lastname`
FROM `user` 
    LEFT JOIN `role_user` ON (`user`.`id` = `role_user`.`user_id`)
WHERE `role_user`.`role_id` IS NULL;

/*
Посчитать сколько проживает в каждой стране и в каждом городе пользователей по всем существующим ролям
*/

SELECT `role`.`id` AS `role_id`, `role`.`title`, `city_user`.`city_id`,  `city`.`name`, COUNT(*) AS `total_user`
FROM `role` 
    LEFT JOIN `role_user` ON (`role`.`id` = `role_user`.`role_id`)
    LEFT JOIN `city_user` ON (`city_user`.`user_id` = `role_user`.`user_id`)
    LEFT JOIN `city` ON (`city`.`id` = `city_user`.`city_id`)
WHERE `role_user`.`role_id` IS NOT NULL
GROUP BY `role`.`id`, `city_user`.`city_id`;

SELECT `role`.`id` AS `role_id`, `role`.`title`, `city`.`country_id`,  `country`.`name`, COUNT(*) AS `total_user`
FROM `role` 
    LEFT JOIN `role_user` ON (`role`.`id` = `role_user`.`role_id`)
    LEFT JOIN `city_user` ON (`city_user`.`user_id` = `role_user`.`user_id`)
    LEFT JOIN `city` ON (`city`.`id` = `city_user`.`city_id`)
    LEFT JOIN `country` ON (`country`.`id` = `city`.`country_id`)
WHERE `role_user`.`role_id` IS NOT NULL
GROUP BY `role`.`id`, `country`.`id`;

/*
* Все SQL запросы реализовать с учетом активных и неактивных пользователей
* Для обозначения активности пользователей  в таблице `user`  используется  атрибут  `is_active`. Условие проверки этого атрибута
* можно использовать во всех запросах:
*/

WHERE `user`.`is_active` = 1;  


