-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2021 at 10:03 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cjp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_chats`
--

DROP TABLE IF EXISTS `admin_chats`;
CREATE TABLE IF NOT EXISTS `admin_chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_message` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_chats`
--

INSERT INTO `admin_chats` (`id`, `id_admin`, `message`, `date_message`) VALUES
(1, 3, 'Earum nihil blanditiis quia nihil ut vel dolor dicta qui vel quidem sapiente consectetur explicabo est numquam doloremque quis.', '2021-05-17 10:43:48'),
(2, 3, 'Bonjour à tous', '2021-05-17 10:46:50'),
(3, 3, 'Bonjour à tous', '2021-05-17 10:47:04'),
(4, 3, 'Est odio animi et voluptatem voluptas et et nobis beatae laborum tempora quia aliquid cum aut aperiam exercitationem', '2021-05-17 10:47:05'),
(5, 3, 'Aspernatur molestiae impedit consequatur aut quia debitis molestiae ratione veniam dolorem molestiae optio debitis neque aut maiores aut quasi atque.', '2021-05-17 10:48:16'),
(6, 3, 'Pointe-Noire Congo Brazzaville', '2021-05-17 11:00:41'),
(7, 3, 'Pointe-Noire Congo Brazzaville', '2021-05-17 11:00:44'),
(8, 18, 'Salut à tous', '2021-05-17 11:33:43'),
(9, 18, 'Je suis ravie de participer', '2021-05-17 11:34:01'),
(10, 17, 'Hello ! quelle nouvelle tous ?', '2021-05-17 11:35:29'),
(11, 3, 'Bon nous avons une mission d\'envergure.', '2021-05-17 11:36:06'),
(12, 17, 'la quelle', '2021-05-17 11:36:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
