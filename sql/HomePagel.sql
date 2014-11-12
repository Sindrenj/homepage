-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Vert: localhost
-- Generert den: 06. Feb, 2014 23:40 PM
-- Tjenerversjon: 5.6.12-log
-- PHP-Versjon: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phalcondebate`
--
CREATE DATABASE IF NOT EXISTS `HomePage` DEFAULT CHARACTER SET utf8 COLLATE utf8_danish_ci;
USE `phalcondebate`;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `headline` varchar(400) COLLATE utf8_danish_ci NOT NULL,
  `content` text COLLATE utf8_danish_ci,
  `createdBy` tinyint(20) unsigned NOT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `createdBy` (`createdBy`),
  KEY `createdBy_2` (`createdBy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=6 ;

--
-- Dataark for tabell `post`
--

INSERT INTO `post` (`id`, `headline`, `content`, `createdBy`, `created`) VALUES
(1, 'Welcome to my page!', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentumpLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentump</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentumpLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentump</p>', 0, NULL),
(2, 'New project', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentumpLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentump</p>\n\n<p>\nvolutpat. Morbi interdum massa tempus, aliquet dolor id, laoreet quam. Duis felis elit, vehicula quis vestibulum vitae, posuere at nulla.</p>', 0, NULL),
(3, 'Some news..!', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentumpLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentump</p>', 0, NULL),
(4, 'Dette er en test', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentumpLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentump</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentumpLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentump</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentumpLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id consequat leo. Sed consequat luctus diam et fringilla. Mauris commodo turpis in adipiscing scelerisque. Quisque vestibulum fermentump</p>\n\n\n\n', 0, NULL),
(5, 'Enda en nyhet!.....!', '<p>sadasdpiujasdopijjasdoijasdoÃ¸ijsadoÃ¸ijasdoijasdoijsdaoijiasodiijasdoijasdoijasdoijasdoijjjjjjasdijoasidjoijoasdoijasdoijasdoijooiasdoijasdoijasdiojasdiojasidjoijoasdijoasdijoasdoijasdoijasdoijidasjoasidjojioasdijoadsijoasdijoasdijoasdijoijoasdijoasdijoasdijoasdijoaisdjoijoasdijoasdijoasdijoasdiojaisdjoiajosdijoasdijoasijoasijoasijo</p>', 0, NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` tinyint(20) unsigned NOT NULL DEFAULT '0',
  `firstname` varchar(60) COLLATE utf8_danish_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8_danish_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_danish_ci NOT NULL,
  `password` char(128) COLLATE utf8_danish_ci NOT NULL,
  `role` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dataark for tabell `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(0, 'Sindre', 'nj', 's@mail.com', 'jasdoijsaoij', 1);

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_user` FOREIGN KEY (`createdBy`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
