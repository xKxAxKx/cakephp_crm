CREATE DATABASE `cakephp_crm`;

use cakephp_crm;

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `family_name` varchar(255) NOT NULL,
  `given_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `company_id` int(11),
  `post_id` int(11)
) ENGINE=InnoDB;
ALTER TABLE `customers` ADD UNIQUE (`email`);

CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `url` varchar(255),
  `address` varchar(255),
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(255) DEFAULT "" NOT NULL,
  `password` varchar(255) DEFAULT "" NOT NULL,
  `reset_password_token` varchar(20),
  `reset_password_sent_at` datetime,
  `remember_created_at` datetime,
  `sign_in_count` int(11) DEFAULT 0 NOT NULL,
  `current_sign_in_at` datetime,
  `last_sign_in_at` datetime,
  `current_sign_in_ip` varchar(20),
  `last_sign_in_ip` varchar(20),
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `family_name` varchar(20),
  `given_name` varchar(20),
  `image_url` varchar(255)
) ENGINE=InnoDB;
ALTER TABLE `users` ADD UNIQUE (`email`);
ALTER TABLE `users` ADD UNIQUE (`reset_password_token`);

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `position_name` varchar(255),
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `body` text(255),
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `customer_id` int(11),
  `user_id` int(11)
) ENGINE=InnoDB;
