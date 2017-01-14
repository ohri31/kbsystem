-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Računalo: localhost
-- Vrijeme generiranja: Sij 14, 2017 u 05:24 PM
-- Verzija poslužitelja: 5.5.52-0ubuntu0.14.04.1
-- PHP verzija: 5.6.23-1+deprecated+dontuse+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza podataka: `vrocket`
--
CREATE DATABASE IF NOT EXISTS `vrocket` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `vrocket`;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_bin NOT NULL,
  `description` varchar(1024) COLLATE utf8_bin NOT NULL,
  `kb` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `autor` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  KEY `kb` (`kb`),
  KEY `category` (`category`),
  KEY `autor` (`autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Izbacivanje podataka za tablicu `article`
--

INSERT INTO `article` (`_id`, `title`, `description`, `kb`, `category`, `content`, `autor`) VALUES
(1, 'Treći', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pretium, dolor non faucibus placerat, risus augue consequat tortor, eu mattis urna felis eu mauris. Suspendisse mattis bibendum pretium. Pellentesque molestie justo sagittis ligula semper, et consequat nulla porttitor. Nullam in imperdiet eros. In cursus eros a ipsum auctor vestibulum. Quisque sit amet sagittis velit. Nunc quis velit sit amet metus eleifend laoreet.', 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pretium, dolor non faucibus placerat, risus augue consequat tortor, eu mattis urna felis eu mauris. Suspendisse mattis bibendum pretium. Pellentesque molestie justo sagittis ligula semper, et consequat nulla porttitor. Nullam in imperdiet eros. In cursus eros a ipsum auctor vestibulum. Quisque sit amet sagittis velit. Nunc quis velit sit amet metus eleifend laoreet.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pretium, dolor non faucibus placerat, risus augue consequat tortor, eu mattis urna felis eu mauris. Suspendisse mattis bibendum pretium. Pellentesque molestie justo sagittis ligula semper, et consequat nulla porttitor. Nullam in imperdiet eros. In cursus eros a ipsum auctor vestibulum. Quisque sit amet sagittis velit. Nunc quis velit sit amet metus eleifend laoreet.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pretium, dolor non faucibus placerat, risus augue consequat tortor, eu mattis urna felis eu mauris. Suspendisse mattis bibendum pretium. Pellentesque molestie justo sagittis ligula semper, et consequat nulla porttitor. Nullam in imperdiet eros. In cursus eros a ipsum auctor vestibulum. Quisque sit amet sagittis velit. Nunc quis velit sit amet metus eleifend laoreet.', 1),
(2, 'Proba', 'sdamlka mdlkam lkdmasm web web', 2, 2, 'lkamlks mdam dkam lkd', 1),
(4, 'Probni artical sa search', 'Pretražuje po title-u i po descriptionu s tim da description oznaci crnom kada nadje', 2, 2, 'Pretražuje po title-u i po descriptionu s tim da description oznaci crnom kada nadjePretražuje po title-u i po descriptionu s tim da description oznaci crnom kada nadjePretražuje po title-u i po descriptionu s tim da description oznaci crnom kada nadjePretražuje po title-u i po descriptionu s tim da description oznaci crnom kada nadje', 1),
(9, 'Vidi sda ovo da li radi', 'dalksmd ansd kjnasd ', 2, 2, 'ačldkms llakd na', 1);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Izbacivanje podataka za tablicu `category`
--

INSERT INTO `category` (`_id`, `name`) VALUES
(1, 'Web Development'),
(2, 'Java Development');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `knowledgebase`
--

CREATE TABLE IF NOT EXISTS `knowledgebase` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Izbacivanje podataka za tablicu `knowledgebase`
--

INSERT INTO `knowledgebase` (`_id`, `name`) VALUES
(1, 'Public Library'),
(2, 'IT Library');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) COLLATE utf8_bin NOT NULL,
  `password` varchar(128) COLLATE utf8_bin NOT NULL,
  `organisation` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Izbacivanje podataka za tablicu `user`
--

INSERT INTO `user` (`_id`, `email`, `password`, `organisation`) VALUES
(1, 'mirza.ohranovic@gmail.com', '40b70b88539a46e9898e43ecbf8e63a5:ffeb4053ebbcdc26bebd3842c278f544', 'VRocket'),
(2, 'reg@proba.com', '26251d08e5caed01847b0ba32b65d13b:76f883a7bad170a372938f1528cdfabc', 'EESTEC');

--
-- Ograničenja za izbačene tablice
--

--
-- Ograničenja za tablicu `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`autor`) REFERENCES `user` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`kb`) REFERENCES `knowledgebase` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
