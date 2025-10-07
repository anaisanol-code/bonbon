-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 oct. 2025 à 18:16
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sweetshopcandy`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `date_order` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `date_order`) VALUES
(1, 4, 1.30, '2025-10-06 06:38:22'),
(2, 1, 3.00, '2025-10-06 10:26:10'),
(3, 4, 3.80, '2025-10-06 14:15:51'),
(4, 4, 2.00, '2025-10-06 14:50:02');

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1, 1, 0.50),
(2, 1, 2, 1, 0.80),
(3, 2, 3, 1, 1.00),
(4, 2, 4, 1, 2.00),
(5, 3, 3, 1, 1.00),
(6, 3, 4, 1, 2.00),
(7, 3, 23, 1, 0.80),
(8, 4, 3, 1, 1.00),
(9, 4, 16, 1, 1.00);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(6,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'bonbon fraise', 'petit bonbon assidulé ', 0.50, 'image'),
(2, 'Caramel Doux', 'Un caramel fondant et sucré 🍬', 0.80, ''),
(3, 'Bonbons fruités', 'Des bonbons aux saveurs de fruits : fraise, citron, pomme, orange...', 1.00, NULL),
(4, 'Caramels', 'Des caramels fondants et doux, parfaits pour les gourmands.', 2.00, NULL),
(5, 'Sucettes', 'Sucettes colorées et parfumées à savourer lentement.', 0.20, NULL),
(6, 'Réglisse', 'Pour les amateurs de bonbons à la réglisse au goût intense.', 0.50, NULL),
(7, 'Bonbons acidulés', 'Des bonbons qui piquent, pour les fans de sensations fortes !', 0.10, NULL),
(8, 'Chocolats', 'Petits chocolats, truffes et confiseries au cacao.', 0.50, NULL),
(9, 'Gommes', 'Bonbons moelleux et fruités à base de gélatine ou pectine.', 0.35, NULL),
(10, 'Classiques', 'Les bonbons traditionnels qui rappellent l’enfance.', 0.45, NULL),
(11, 'Bonbons gélifiés', 'Des bonbons moelleux et élastiques en forme d’oursons, serpents ou fruits.', 1.00, NULL),
(12, 'Bonbons durs', 'Des bonbons croquants qui fondent lentement dans la bouche.', 0.75, NULL),
(13, 'Sucres d’orge', 'Les célèbres bâtons rayés à déguster pendant les fêtes.', 0.95, NULL),
(14, 'Bonbons au miel', 'Des douceurs naturelles à base de miel et d’arômes floraux.', 0.99, NULL),
(15, 'Pastilles mentholées', 'Des bonbons rafraîchissants à la menthe, eucalyptus ou citron.', 0.80, NULL),
(16, 'Bonbons sans sucre', 'Des bonbons gourmands adaptés aux régimes sans sucre ajouté.', 1.00, NULL),
(17, 'Bonbons rétro', 'Les bonbons de notre enfance, aux goûts authentiques et nostalgiques.', 0.25, NULL),
(18, 'Guimauves', 'De la guimauve moelleuse, nature, vanillée ou enrobée de chocolat.', 0.55, NULL),
(19, 'Bonbons au cola', 'Des bonbons pétillants et acidulés au goût unique de cola.', 0.50, NULL),
(20, 'Bonbons à la violette', 'Des bonbons délicatement parfumés à la fleur de violette.', 0.10, NULL),
(21, 'Bonbons personnalisés', 'Des bonbons à message, parfaits pour offrir ou décorer.', 0.50, NULL),
(22, 'Bonbons arc-en-ciel', 'Des friandises colorées pour voir la vie en couleurs !', 0.95, NULL),
(23, 'Bonbons piquants extrêmes', 'Pour les amateurs de sensations très fortes et acidulées.', 0.80, NULL),
(24, 'Bonbons artisanaux', 'Des douceurs fabriquées à la main, au goût authentique.', 0.55, NULL),
(25, 'Sucettes géantes', 'De grandes sucettes gourmandes pour petits et grands.', 5.00, NULL),
(26, 'Bonbons exotiques', 'Aux saveurs venues d’ailleurs : mangue, noix de coco, passion...', 1.00, NULL),
(27, 'Bonbons glacés', 'Des bonbons rafraîchissants à conserver au frais pour l’été.', 0.40, NULL),
(28, 'Bonbons fourrés', 'Des bonbons avec un cœur fondant ou liquide.', 0.50, NULL),
(29, 'Bonbons bio', 'Des bonbons faits avec des ingrédients naturels et biologiques.', 0.70, NULL),
(30, 'Bonbons spéciaux fêtes', 'Des assortiments pour Noël, Halloween, Pâques ou Saint-Valentin.', 0.60, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `is_admin`) VALUES
(1, 'anais.anol@laposte.net', '$2y$10$SIYaHm4.zwpQjbMxTBhmNO6XUbCRX3ATTTWuEjwUDAgOBT2DHEOyW', 'Anol', 1),
(2, 'test@laposte.net', '$2y$10$pEG3ya2EAS8uAluzeCS58upsePFpUT6d11A4CSU7KDHQp83Om6ilW', 'Anais', 0),
(3, 'lol@laposte.net', '$2y$10$OEKtQvzTgD4jItQ35tPj/OGXohZ6RrJLYKzXUV2sSxDI3GMgQ1Ofm', 'Anais', 0),
(4, 'lol2@laposte.net', '$2y$10$iDeZk6xI13lX4q8FemlIW.ascJIE4PCcq1gQFV.zE4qo5EGxBM4.O', 'Anais', 0),
(5, 'anais.anol@laposte.ny', '$2y$10$4i.gbLbv/YKAuz3TOSXxi.c3q0DKbuMgAZxW6Z7LlCC8f2ITbwRYy', 'Anol', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
