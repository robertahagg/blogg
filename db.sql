-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `roberta_haggstrom_05_blogg` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `roberta_haggstrom_05_blogg`;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`id`, `name`) VALUES
(1,	'Travel'),
(2,	'Fashion'),
(3,	'General'),
(4,	'Inspiration');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `body` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image_url` varchar(150) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `posts` (`id`, `title`, `body`, `date`, `image_url`, `category`) VALUES
(1,	'EXAMPLE TITLE',	'Duis nec efficitur erat, in euismod quam. Integer quis metus quis velit sollicitudin bibendum ut eu justo. Nam a molestie velit. Suspendisse eget est elit. Quisque semper lacinia condimentum. Praesent eget elit rhoncus, elementum est at, ultricies eros. Etiam posuere est ut arcu iaculis aliquam. Cras accumsan elementum lorem ac bibendum. Mauris egestas purus sit amet convallis dapibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi ac pellentesque metus, ut pharetra mauris. Duis varius ullamcorper magna, ut lacinia eros vehicula a. Morbi consequat sollicitudin iaculis. Quisque sollicitudin sollicitudin nulla, vel pulvinar purus consequat sit amet. Donec in congue risus.',	'2017-11-16 20:46:51',	'https://images.unsplash.com/photo-1499862108517-53e3e86ff15a?auto=format&fit=crop&w=1052&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D',	1),
(2,	'EXAMPLE TITLE 2',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sodales at lorem a posuere. Phasellus sagittis ultrices sodales. Etiam justo velit, aliquam id porta vel, posuere ut ante. Nullam laoreet tincidunt sapien semper congue. Phasellus odio ipsum, iaculis sed condimentum vitae, posuere id mi. Donec at ultricies nisl, vitae aliquam tortor. Quisque hendrerit elementum consequat. Suspendisse justo nibh, consequat sed eros vel, blandit feugiat dui. Donec bibendum malesuada eros, id tincidunt nisi viverra nec.',	'2017-11-16 20:47:02',	'https://images.unsplash.com/photo-1499694324265-11b7cf0b27ca?auto=format&fit=crop&w=1052&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D',	2),
(3,	'EXAMPLE TITLE 3',	'DAliquam gravida elit sapien, id finibus massa fringilla in. Fusce bibendum diam vel quam fringilla, a sollicitudin ex facilisis. Donec iaculis nisi tincidunt enim tempus mattis.',	'2017-11-16 20:47:20',	'https://images.unsplash.com/photo-1505801066737-f25b349904b5?auto=format&fit=crop&w=1052&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D',	2),
(6,	'sdg',	'sdg',	'2017-11-20 20:10:39',	'',	1),
(7,	'jnjknjkn',	'mbpÃ¥owpekbp<kpÃ¥o',	'2018-01-02 15:34:13',	'',	3);

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tags` (`id`, `name`) VALUES
(8,	'BFF'),
(4,	'birthdaycake'),
(6,	'dressforsucess'),
(7,	'favouritePet'),
(5,	'foodie'),
(10,	'happiness'),
(3,	'holiday'),
(9,	'Inspo'),
(11,	'onfleek'),
(1,	'partyoutfit'),
(2,	'summer');

DROP TABLE IF EXISTS `tagsposts`;
CREATE TABLE `tagsposts` (
  `post_Id` int(11) NOT NULL,
  `tags_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tagsposts` (`post_Id`, `tags_Id`) VALUES
(21,	4),
(21,	6),
(21,	7),
(22,	10),
(22,	9),
(22,	11),
(7,	6),
(7,	7),
(7,	5);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `created_at`) VALUES
(19,	'Lynn',	'Dylan',	'ldyllan',	'test',	'test@test.com',	'2017-11-14 17:40:33');

-- 2018-05-09 09:53:58