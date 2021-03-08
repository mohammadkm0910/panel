<?php

namespace Model;
require_once "Database.php";

class CreateDb extends Database
{
    private $createTables = array(
        "CREATE TABLE IF NOT EXISTS `page_groups` (
          `id` int(11) NOT NULL AUTO_INCREMENT ,
          `title` varchar(200) COLLATE utf8_persian_ci NOT NULL,
          `parent_id` int(11) DEFAULT NULL,
          `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          FOREIGN KEY (`parent_id`) REFERENCES `page_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
        "CREATE TABLE IF NOT EXISTS `pages` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `title` varchar(200) COLLATE utf8_persian_ci NOT NULL,
          `summary` text COLLATE utf8_persian_ci NOT NULL,
          `body` text COLLATE utf8_persian_ci NOT NULL,
          `visit` int(11) NOT NULL DEFAULT '0',
          `user_id` int(11)  NOT NULL,
          `group_id` int(11)  NOT NULL,
          `image` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
          `status` enum('disable','enable') COLLATE utf8_persian_ci NOT NULL DEFAULT 'disable',
          `slider` boolean NOT NULL DEFAULT false,
          `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          FOREIGN KEY (`group_id`) REFERENCES `page_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
          FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
        "CREATE TABLE IF NOT EXISTS `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `username` varchar(100) COLLATE utf8_persian_ci NOT NULL,
            `email` varchar(150) COLLATE utf8_persian_ci NOT NULL,
            `password` varchar(100) COLLATE utf8_persian_ci NOT NULL,
            `permission` enum('user','admin') COLLATE utf8_persian_ci NOT NULL DEFAULT 'user',
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `email` (`email`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
        "CREATE TABLE IF NOT EXISTS `comments` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `user_id` int(11) NOT NULL,
            `comment` text COLLATE utf8_persian_ci NOT NULL,
            `group_id` int(11) NOT NULL,
            `status` enum('unseen','seen','approved') COLLATE utf8_persian_ci NOT NULL DEFAULT 'unseen',
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`group_id`) REFERENCES `page_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;"
    );

    public function run($isRun=false)
    {
        if ($isRun){
            foreach ($this->createTables as $createTable){
                $this->createTable($createTable);
            }
        }
    }
}