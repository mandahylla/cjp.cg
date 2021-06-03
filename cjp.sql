-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 03 juin 2021 à 16:58
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cjp`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_chats`
--

DROP TABLE IF EXISTS `admin_chats`;
CREATE TABLE IF NOT EXISTS `admin_chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_message` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin_chats`
--

INSERT INTO `admin_chats` (`id`, `id_admin`, `message`, `date_message`) VALUES
(1, 3, 'Facebook', '2021-05-17 10:43:48'),
(2, 3, 'Bonjour à tous', '2021-05-17 10:46:50'),
(3, 3, 'Bonjour à tous', '2021-05-17 10:47:04'),
(4, 3, '', '2021-05-17 10:47:05'),
(5, 3, '', '2021-05-17 10:48:16'),
(6, 3, 'Pointe-Noire Congo Brazzaville', '2021-05-17 11:00:41'),
(7, 3, 'Pointe-Noire Congo Brazzaville', '2021-05-17 11:00:44'),
(8, 18, 'Salut à tous', '2021-05-17 11:33:43'),
(9, 18, 'Je suis ravie de participer', '2021-05-17 11:34:01'),
(10, 17, 'Hello ! quelle nouvelle tous ?', '2021-05-17 11:35:29'),
(11, 3, 'Bon nous avons une mission d\'envergure.', '2021-05-17 11:36:06'),
(12, 17, 'la quelle', '2021-05-17 11:36:31'),
(13, 3, 'Salut à tous', '2021-05-19 17:02:20'),
(14, 18, 'Salut à tous', '2021-06-02 19:23:38');

-- --------------------------------------------------------

--
-- Structure de la table `admin_verity`
--

DROP TABLE IF EXISTS `admin_verity`;
CREATE TABLE IF NOT EXISTS `admin_verity` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `categorie` int(1) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `id_centre` int(11) NOT NULL,
  `etat_connexion` int(1) NOT NULL,
  `ip_admin` varchar(45) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin_verity`
--

INSERT INTO `admin_verity` (`id_admin`, `password`, `email`, `name`, `categorie`, `id_departement`, `id_centre`, `etat_connexion`, `ip_admin`) VALUES
(3, 'b89f7a5ff3e3a225d572dac38b2a67f7', 'email@email.com', 'Junior BANSEVILA', 0, 75, 13, 1, '127.0.0.1'),
(17, 'b89f7a5ff3e3a225d572dac38b2a67f7', 'junior@gmail.com', 'Test compte', 1, 80, 8, 0, ''),
(18, 'b89f7a5ff3e3a225d572dac38b2a67f7', 'test@test.com', 'Compte Test', 1, 78, 29, 0, ''),
(19, 'top', 'top@topmail.com', 'top1', 1, 86, 24, 1, '127.0.0.1'),
(20, 'top', 'top2@topmail.com', 'top2', 1, 79, 10, 1, '127.0.0.1'),
(21, 'top', 'top3@topmail.com', 'top3', 1, 77, 1, 1, '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `stats_connectes`
--

DROP TABLE IF EXISTS `stats_connectes`;
CREATE TABLE IF NOT EXISTS `stats_connectes` (
  `ip` varchar(15) NOT NULL DEFAULT '',
  `last_activity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stats_connectes`
--

INSERT INTO `stats_connectes` (`ip`, `last_activity`) VALUES
('127.0.0.1', 1622737717);

-- --------------------------------------------------------

--
-- Structure de la table `stats_visites`
--

DROP TABLE IF EXISTS `stats_visites`;
CREATE TABLE IF NOT EXISTS `stats_visites` (
  `ip` varchar(30) NOT NULL,
  `date_visite` date NOT NULL,
  `pages_vues` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`ip`,`date_visite`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stats_visites`
--

INSERT INTO `stats_visites` (`ip`, `date_visite`, `pages_vues`) VALUES
('127.0.0.1', '2021-06-02', 7),
('127.0.0.1', '2021-06-03', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
