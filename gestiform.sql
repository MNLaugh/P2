-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 07 Février 2017 à 15:54
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestiform`
--

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id_formation` int(11) NOT NULL,
  `short_name` varchar(10) NOT NULL,
  `long_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `level_down` int(11) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `mode` tinyint(1) NOT NULL,
  `id_image` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id_formation`, `short_name`, `long_name`, `description`, `level_down`, `date_in`, `date_out`, `mode`, `id_image`) VALUES
(1, 'DC&C++', 'Développeur en langage C et C++', 'le programmeur C & C++ est chargé de programmer de nombreux logiciels informatiques afin que ces derniers répondent précisément aux attentes de ses clients.', 1, '2017-10-10', '2017-07-21', 0, 0),
(2, 'AD', 'Analyste Développeur', 'Le rôle de l’analyste-programmeur est de mettre au point et d’améliorer des programmes informatiques ou encore d’adapter des standards à des spécificités client.', 1, '2017-10-10', '2017-09-14', 0, 0),
(3, 'DISSI', 'Développeur de solution internet/intranet', 'Développeur de sites web (Intranet ou Internet), Webdesigner, Technicien réseau, (spécialisé hébergement), Webmaster, …', 1, '2016-10-24', '2017-07-06', 1, 0),
(4, 'MSI', 'Manager de Systèmes d''Information', 'Former des acteurs clés capables de définir les priorités dans les projets informatiques', 1, '2017-07-01', '2019-07-01', 1, 0),
(5, 'SIO', 'Services Informatiques aux Organisations', 'Participer à la production et à la fourniture de services informatiques aux organisations', 1, '2016-10-24', '2017-07-06', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `file_name` varchar(25) NOT NULL,
  `thumbnail_name` varchar(25) NOT NULL,
  `alt_text` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `level_diplome`
--

CREATE TABLE `level_diplome` (
  `id_level` int(11) NOT NULL,
  `level_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

CREATE TABLE `periode` (
  `id_user` varchar(6) NOT NULL,
  `id_formation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(6) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
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
  `power` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `level_diplome`
--
ALTER TABLE `level_diplome`
  ADD PRIMARY KEY (`id_level`);

--
-- Index pour la table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_user`,`id_formation`),
  ADD KEY `FK_periode_id_formation` (`id_formation`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `level_diplome`
--
ALTER TABLE `level_diplome`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `periode`
--
ALTER TABLE `periode`
  ADD CONSTRAINT `FK_periode_id_formation` FOREIGN KEY (`id_formation`) REFERENCES `formations` (`id_formation`),
  ADD CONSTRAINT `FK_periode_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
