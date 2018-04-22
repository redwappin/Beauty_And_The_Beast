-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 22 avr. 2018 à 07:12
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `overwatch`
--

-- --------------------------------------------------------

--
-- Structure de la table `match`
--

DROP TABLE IF EXISTS `match`;
CREATE TABLE IF NOT EXISTS `match` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Winner_Team` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `player_Name` varchar(255) DEFAULT NULL,
  `number_of_Match` int(10) DEFAULT '0',
  `Points` int(10) DEFAULT '0',
  `number_of_Victory` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id`, `player_Name`, `number_of_Match`, `Points`, `number_of_Victory`) VALUES
(42, 'ADELINE', 2, 5, 1),
(43, 'ADAM', 1, 5, 1),
(44, 'JADE', 1, 0, 0),
(45, 'ERWAN', 1, 0, 0),
(46, 'NICOLAS', 1, 5, 1),
(47, 'ROMAIN', 1, 5, 1),
(48, 'MAXENCE', 1, 5, 1),
(49, 'HUGOL', 1, 5, 1),
(50, 'HUGOB', 1, 0, 0),
(51, 'CEDRIC', 1, 0, 0),
(52, 'THOMAS', 1, 0, 0),
(53, 'WW', 1, 0, 0),
(54, 'OK', 1, 0, 0),
(55, 'LM', 1, 0, 0),
(56, 'JULIENB', 1, 0, 0),
(57, 'JULIENS', 1, 5, 1),
(58, 'GABRIEL', 1, 5, 1),
(59, 'ADY', 1, 0, 0),
(60, 'PAULINE', 1, 5, 1),
(61, 'CELINE', 1, 5, 1),
(62, 'ANTINEA', 1, 5, 1),
(63, 'SEVERINE', 1, 0, 0),
(64, 'ANTHONY', 1, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
