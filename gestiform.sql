-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2017 at 04:39 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gestiform`
--

-- --------------------------------------------------------

--
-- Table structure for table `formations`
--

CREATE TABLE IF NOT EXISTS `formations` (
  `id_formation` int(11) NOT NULL AUTO_INCREMENT,
  `short_name` varchar(10) NOT NULL,
  `long_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `level_down` int(11) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `mode` tinyint(1) NOT NULL,
  `id_image` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `formations`
--

INSERT INTO `formations` (`id_formation`, `short_name`, `long_name`, `description`, `level_down`, `date_in`, `date_out`, `mode`, `id_image`) VALUES
(1, 'DC&C++', 'Développeur en langage C et C++', 'le programmeur C & C++ est chargé de programmer de nombreux logiciels informatiques afin que ces derniers répondent précisément aux attentes de ses clients.', 1, '2017-10-10', '2017-07-21', 0, 0),
(2, 'AD', 'Analyste Développeur', 'Le rôle de l’analyste-programmeur est de mettre au point et d’améliorer des programmes informatiques ou encore d’adapter des standards à des spécificités client.', 1, '2017-10-10', '2017-09-14', 0, 0),
(3, 'DISSI', 'Développeur de solution internet/intranet', 'Développeur de sites web (Intranet ou Internet), Webdesigner, Technicien réseau, (spécialisé hébergement), Webmaster, …', 1, '2016-10-24', '2017-07-06', 1, 0),
(4, 'MSI', 'Manager de Systèmes d''Information', 'Former des acteurs clés capables de définir les priorités dans les projets informatiques', 1, '2017-07-01', '2019-07-01', 1, 0),
(5, 'SIO', 'Services Informatiques aux Organisations', 'Participer à la production et à la fourniture de services informatiques aux organisations', 1, '2017-02-24', '2017-12-06', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(25) NOT NULL,
  `thumbnail_name` varchar(25) NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id_image`, `file_name`, `thumbnail_name`) VALUES
(2, 'capucine-piot.jpg', 'capucine-piot_thumb.jpg'),
(3, 'capucine-piot.jpg', 'capucine-piot_thumb.jpg'),
(5, 'identiteex.jpg', 'identiteex_thumb.jpg'),
(6, 'identiteex.jpg', 'identiteex_thumb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `level_diplome`
--

CREATE TABLE IF NOT EXISTS `level_diplome` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `level_diplome`
--

INSERT INTO `level_diplome` (`id_level`, `level_name`) VALUES
(1, 'Bac +2'),
(2, 'Bac +3'),
(3, 'Bac +5');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE IF NOT EXISTS `periode` (
  `id_user` varchar(6) NOT NULL,
  `id_formation` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_formation`),
  KEY `FK_periode_id_formation` (`id_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` varchar(6) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse_1` varchar(38) DEFAULT NULL,
  `adresse_2` varchar(38) DEFAULT NULL,
  `adresse_3` varchar(38) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `telephone` int(11) NOT NULL,
  `level_diplom` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL,
  `id_image` int(11) DEFAULT NULL,
  `full_profile` tinyint(1) NOT NULL,
  `power` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `name`, `first_name`, `email`, `date_naissance`, `adresse_1`, `adresse_2`, `adresse_3`, `code_postal`, `ville`, `telephone`, `level_diplom`, `id_formation`, `id_image`, `full_profile`, `power`) VALUES
('amBtuh', 'marnaud', '=smOntdlEIzPRRDxyNSeGHXg56XOZfiqP918AG5aYehN', 'Arnaud', 'MarilÃ¨ne', 'marilene@test.tld', '2011-09-16', '', 'test', '', 36110, 'levroux', 656566312, 2, 2, 2, 1, 2),
('cmJa98', 'mcaillou', '=wmbTsa/Z3mPuCpRuvI24MVlk5NW/ezq3z85HDXdOrq2', 'Caillou', 'Marion', 'caillou@lol.tld', '1991-09-16', '', 'test', '', 36110, 'Lvrtoux', 664518431, 1, 3, NULL, 1, 2),
('dpod7b', 'pdubois', '=sEbplTwWE2FO2dp35qXxNhYIKmmFUUNZaFvE06zEYwr', 'Dubois', 'Pierre', 'dubois@test.tld', '1991-09-16', '', 'test', '', 36110, 'Chateauroux', 668461654, 3, 3, NULL, 1, 2),
('jfK0mf', 'fjocelyne', '=4kNSzxJV4mjQhBOCWwEWC4ovvhLNTvm3gvn2+Evjms7', 'Jocelyne', 'Fabrice', 'Fabrice@test.tld', '1991-09-16', '', 'danscette rue', '', 36110, 'Levroux', 658165168, 3, 2, 5, 1, 2),
('mn91nK', 'nmetivier', '=gCTp4bLBGfRaYNciyYMWkwMfTJEPjdv2Njw5qeV2E0w', 'MÃ©tivier', 'Nicolas', 'contact@mnlaugh.com', '0000-00-00', NULL, NULL, '', 0, '', 0, 2, 0, NULL, 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `periode`
--
ALTER TABLE `periode`
  ADD CONSTRAINT `FK_periode_id_formation` FOREIGN KEY (`id_formation`) REFERENCES `formations` (`id_formation`),
  ADD CONSTRAINT `FK_periode_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
