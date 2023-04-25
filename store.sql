-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 avr. 2023 à 14:28
-- Version du serveur : 10.4.10-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `store`
--

-- --------------------------------------------------------

--
-- Structure de la table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `row_total` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carts`
--

INSERT INTO `carts` (`id`, `cart_id`, `product_id`, `product_name`, `price`, `quantity`, `row_total`) VALUES
(23, 1682430986, 1, 'Clé USB', '12.99', 4, '51.96'),
(24, 1682430988, 2, 'Casque Gamer RGB', '99.99', 5, '499.95');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Clé USB', 'Une superbe clé USB rose fushia fluo de 32 Go, rapide et sécurisée qui plaira aux petits comme aux grands', 12.99),
(2, 'Casque Gamer RGB', 'Un magnifique casque Gamer au son cristallin, avec un micro à réduction des bruits ambiants, et surtout un éclarage LED paramétrable, car un bon casque Gamer sans lumières qui changent, ben c\'est pas un casque gamer...', 99.99),
(3, 'Souris filaire', 'Une superbe souris filaire USB, précise, ambidextre et silenciause. Un indispensable !', 13.99),
(4, 'Clavier filaire USB', 'Ce clavier totalement silencieux a été pensé pour la paix du foyer, parceque votre maman n\'a pas besoin d\'entendre des tap tap tap toute la nuit ... ', 15.99);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
