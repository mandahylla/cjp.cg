-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 04 juil. 2021 à 21:35
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
-- Structure de la table `admin_verity`
--

DROP TABLE IF EXISTS `admin_verity`;
CREATE TABLE IF NOT EXISTS `admin_verity` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `categorie` int(1) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `id_departement` int(11) NOT NULL,
  `id_centre` int(11) NOT NULL,
  `etat_connexion` int(1) NOT NULL,
  `ip_admin` varchar(45) NOT NULL,
  `online` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin_verity`
--

INSERT INTO `admin_verity` (`id_admin`, `userid`, `password`, `email`, `gender`, `name`, `categorie`, `image`, `id_departement`, `id_centre`, `etat_connexion`, `ip_admin`, `online`) VALUES
(3, NULL, 'b89f7a5ff3e3a225d572dac38b2a67f7', 'email@email.com', NULL, 'Junior BANSEVILA', 0, NULL, 75, 13, 1, '127.0.0.1', NULL),
(17, 89015471839882223, 'b89f7a5ff3e3a225d572dac38b2a67f7', 'junior@gmail.com', 'Female', 'Test compte', 1, NULL, 80, 8, 0, '', NULL),
(18, 4948785, 'b89f7a5ff3e3a225d572dac38b2a67f7', 'test@test.com', 'Male', 'Compte Test', 1, NULL, 78, 29, 0, '', NULL),
(19, NULL, 'top', 'top@topmail.com', NULL, 'top1', 1, NULL, 86, 24, 1, '127.0.0.1', NULL),
(20, NULL, 'top', 'top2@topmail.com', NULL, 'top2', 1, NULL, 79, 10, 1, '127.0.0.1', NULL),
(21, NULL, 'top', 'top3@topmail.com', NULL, 'top3', 1, NULL, 77, 1, 1, '127.0.0.1', NULL),
(22, 239152703, '5f4dcc3b5aa765d61d8327deb882cf99', 'eathorne@yahoo.com', 'Male', 'Eathorne', 1, 'uploads/afro-beautiful-black-women-fashion-Favim.com-3980589.jpg', 0, 80, 0, '127.0.0.1', 0),
(23, 89701890839882223, 'password', 'mary@yahoo.com', 'Female', 'Mary', 1, NULL, 0, 78, 0, '127.0.0.1', 0),
(24, 1148711, '5f4dcc3b5aa765d61d8327deb882cf99', 'john@yahoo.com', 'Male', 'John', 1, 'uploads/handsome-adult-black-man-successful-business-african-person-117063782.jpg', 0, 86, 0, '127.0.0.1', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
