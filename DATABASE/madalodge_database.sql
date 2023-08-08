-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 08 août 2023 à 11:09
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `madalodge_database`
--

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Antananarivo'),
(2, 'Toamasina'),
(3, 'Mahajanga'),
(4, 'Antsirabe'),
(5, 'Fianarantsoa');

-- --------------------------------------------------------

--
-- Structure de la table `conference_room`
--

DROP TABLE IF EXISTS `conference_room`;
CREATE TABLE IF NOT EXISTS `conference_room` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `capacity` int NOT NULL,
  `price_per_hour` decimal(10,0) NOT NULL,
  `id_hotel` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `conference_room`
--

INSERT INTO `conference_room` (`id`, `capacity`, `price_per_hour`, `id_hotel`) VALUES
(1, 50, '100', 1),
(2, 30, '80', 2),
(3, 20, '60', 3),
(4, 40, '90', 4),
(5, 25, '70', 5);

-- --------------------------------------------------------

--
-- Structure de la table `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE IF NOT EXISTS `discount` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `rate` float NOT NULL,
  `start_time` timestamp NOT NULL,
  `end_time` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `discount`
--

INSERT INTO `discount` (`id`, `name`, `rate`, `start_time`, `end_time`) VALUES
(1, 'Offre sp�ciale �t�', 0.15, '2023-05-31 21:00:00', '2023-08-30 21:00:00'),
(2, 'Promotion de printemps', 0.1, '2023-03-14 21:00:00', '2023-04-14 21:00:00'),
(3, 'R�duction de derni�re minute', 0.2, '2023-06-30 21:00:00', '2023-07-06 21:00:00'),
(4, 'Offre de r�servation anticip�e', 0.25, '2023-08-31 21:00:00', '2023-12-30 21:00:00'),
(5, 'R�duction pour les membres', 0.12, '2022-12-31 21:00:00', '2023-12-30 21:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `have_reduced_price`
--

DROP TABLE IF EXISTS `have_reduced_price`;
CREATE TABLE IF NOT EXISTS `have_reduced_price` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_discount` int NOT NULL,
  `id_room_type` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `have_reduced_price`
--

INSERT INTO `have_reduced_price` (`id`, `id_discount`, `id_room_type`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `have_reduced_price_conference_room`
--

DROP TABLE IF EXISTS `have_reduced_price_conference_room`;
CREATE TABLE IF NOT EXISTS `have_reduced_price_conference_room` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_discount` int NOT NULL,
  `id_conference_room` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `have_reduced_price_conference_room`
--

INSERT INTO `have_reduced_price_conference_room` (`id`, `id_discount`, `id_conference_room`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `have_room_option`
--

DROP TABLE IF EXISTS `have_room_option`;
CREATE TABLE IF NOT EXISTS `have_room_option` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` int NOT NULL,
  `option_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `have_room_option`
--

INSERT INTO `have_room_option` (`id`, `room_id`, `option_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 3, 3),
(5, 4, 4),
(6, 4, 5),
(7, 5, 5),
(8, 6, 3),
(9, 7, 5),
(10, 8, 2),
(11, 15, 5),
(12, 15, 3),
(13, 15, 5),
(14, 15, 2);

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `id_city` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `address`, `is_active`, `id_city`, `photo`) VALUES
(1, 'Hôtel A', 'Adresse A', 1, 1, 'luxury-pool-villa-spectacular-contemporary-design-digital-art-real-estate-home-house-property-ge.jpg'),
(2, 'Hôtel B', 'Adresse B', 1, 1, 'DSCN0091.JPG'),
(3, 'Hôtel C', 'Adresse C', 1, 2, 'DSCN0155.JPG'),
(4, 'Hôtel D', 'Adresse D', 1, 2, 'DSCN0187.JPG'),
(5, 'Hôtel E', 'Adresse E', 1, 3, 'DSCN0679.JPG'),
(6, 'Hôtel F', 'Adresse F', 1, 3, 'FaceApp_1589833299159.jpg'),
(7, 'Hôtel G', 'Adresse G', 1, 4, 'FaceApp_1589834408899.jpg'),
(8, 'Hôtel H', 'Adresse H', 1, 4, 'FB_IMG_15034129550977240.jpg'),
(9, 'Hôtel I', 'Adresse I', 1, 5, 'FB_IMG_15034253753163997.jpg'),
(10, 'Hôtel J', 'Adresse J', 1, 5, 'FB_IMG_15877123249152801.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`) VALUES
(1, 'Cash'),
(2, 'Mobile money');

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `rate` int NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_hotel` int NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rating`
--

INSERT INTO `rating` (`id`, `rate`, `comment`, `id_hotel`, `id_users`) VALUES
(1, 4, 'Tr�s bon s�jour, personnel amical et serviable.', 1, 1),
(2, 5, 'Excellent h�tel, chambre spacieuse et propre.', 2, 2),
(3, 3, 'D�cevant, probl�me avec le service de restauration.', 3, 3),
(4, 4, 'Belle vue depuis la chambre, recommand�.', 4, 4),
(5, 5, 'Superbe exp�rience, rien � redire.', 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `creation_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `start_timestamp` timestamp NOT NULL,
  `end_timestamp` timestamp NOT NULL,
  `special_requests` text COLLATE utf8mb4_general_ci,
  `is_paid` tinyint(1) DEFAULT '0',
  `is_cancelled` tinyint(1) DEFAULT NULL,
  `penalty_rate` float DEFAULT NULL,
  `handler_id` int DEFAULT NULL,
  `id_room` int DEFAULT NULL,
  `id_conference_room` int DEFAULT NULL,
  `id_payment_method` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `creation_timestamp`, `start_timestamp`, `end_timestamp`, `special_requests`, `is_paid`, `is_cancelled`, `penalty_rate`, `handler_id`, `id_room`, `id_conference_room`, `id_payment_method`, `id_user`) VALUES
(35, '2023-08-07 07:17:33', '2024-02-06 21:00:00', '2024-02-09 21:00:00', '', 0, NULL, NULL, NULL, NULL, NULL, 2, 4),
(34, '2023-08-07 07:15:28', '2024-02-06 21:00:00', '2024-02-09 21:00:00', '', 0, NULL, NULL, NULL, NULL, NULL, 2, 4),
(33, '2023-08-07 07:14:05', '2023-04-30 21:00:00', '2023-05-02 21:00:00', 'Jacuzzi, Wi-Fi haut débit, ', 0, NULL, NULL, NULL, NULL, NULL, 2, 4),
(31, '2023-08-07 07:04:51', '2023-08-02 21:00:00', '2023-08-17 21:00:00', ', , , ', 0, NULL, NULL, NULL, NULL, NULL, 1, 4),
(32, '2023-08-07 07:12:45', '2023-08-24 21:00:00', '2023-08-26 21:00:00', 'Jacuzzi, Petit-déjeuner inclus, ', 0, NULL, NULL, NULL, NULL, NULL, 1, 4),
(29, '2023-08-07 06:43:00', '2023-12-06 21:00:00', '2023-12-21 21:00:00', 'Jacuzzi, Vue sur la mer, , , , ', 0, NULL, NULL, NULL, NULL, NULL, 2, 4),
(30, '2023-08-07 06:59:41', '2023-08-03 21:00:00', '2023-08-17 21:00:00', ', , , , , ', 0, 0, NULL, 2, NULL, NULL, 1, 4),
(28, '2023-08-07 06:42:11', '2023-08-18 21:00:00', '2023-08-25 21:00:00', 'Jacuzzi, Vue sur la mer, Service de chambre 24h/24, Wi-Fi haut débit, Petit-déjeuner inclus, ', 0, 0, NULL, 2, NULL, NULL, 1, 4),
(36, '2023-08-07 13:48:53', '2023-11-14 21:00:00', '2023-11-16 21:00:00', 'ROOM_TYPE : Simple; OPTIONS : Vue sur la mer, Wi-Fi haut débit, ', 0, NULL, NULL, NULL, NULL, NULL, 2, 4),
(37, '2023-08-07 14:11:25', '2023-10-06 21:00:00', '2023-10-11 21:00:00', 'ROOM_TYPE : VIP; OPTIONS : Vue sur la mer, Wi-Fi haut débit, ', 0, NULL, NULL, NULL, NULL, NULL, 1, 4),
(39, '2023-08-08 08:23:11', '2023-05-30 21:00:00', '2023-06-01 21:00:00', 'ROOM_TYPE : Simple; OPTIONS : Vue sur la mer, Service de chambre 24h/24, ', 0, 0, NULL, 2, NULL, NULL, 2, 6),
(38, '2023-08-08 08:14:06', '2023-08-21 21:00:00', '2023-08-23 21:00:00', 'ROOM_TYPE : Simple; OPTIONS : Vue sur la mer, ', 0, NULL, NULL, NULL, NULL, NULL, 1, 6),
(41, '2023-08-08 10:20:17', '2023-08-08 21:00:00', '2023-08-16 21:00:00', 'ROOM_TYPE : Simple; OPTIONS : Vue sur la mer, ', 0, NULL, NULL, NULL, 1, NULL, 1, 6),
(42, '2023-08-08 10:22:05', '2023-08-22 21:00:00', '2023-08-30 21:00:00', 'ROOM_TYPE : Double; OPTIONS : Vue sur la mer, Service de chambre 24h/24, ', 0, NULL, NULL, NULL, 3, NULL, 2, 6),
(43, '2023-08-08 10:38:28', '2023-08-06 21:00:00', '2023-08-30 21:00:00', 'ROOM_TYPE : Double; OPTIONS : Jacuzzi, Vue sur la mer, ', 0, NULL, NULL, NULL, 3, NULL, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_id` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Receptionist'),
(3, 'Cleaning staff'),
(4, 'Client'),
(5, 'Visitor');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_hotel` int NOT NULL,
  `id_room_type` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id`, `id_hotel`, `id_room_type`, `photo`) VALUES
(1, 1, 1, NULL),
(2, 1, 1, NULL),
(3, 1, 2, NULL),
(4, 2, 2, NULL),
(5, 2, 2, NULL),
(6, 2, 3, NULL),
(7, 3, 3, NULL),
(8, 3, 3, NULL),
(9, 3, 3, NULL),
(10, 4, 4, NULL),
(11, 4, 4, NULL),
(12, 5, 4, NULL),
(13, 5, 4, NULL),
(14, 5, 4, NULL),
(15, 5, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `room_option`
--

DROP TABLE IF EXISTS `room_option`;
CREATE TABLE IF NOT EXISTS `room_option` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `room_option`
--

INSERT INTO `room_option` (`id`, `name`, `description`, `price`) VALUES
(1, 'Jacuzzi', 'Profitez du jacuzzi priv� dans votre chambre pour une d�tente ultime.', '50'),
(2, 'Vue sur la mer', 'Admirez une vue magnifique sur la mer depuis votre chambre.', '20'),
(3, 'Service de chambre 24h/24', 'Profitez du service de chambre disponible 24h/24 pour satisfaire vos besoins.', '15'),
(4, 'Wi-Fi haut débit', 'Restez connecté avec un accès Wi-Fi haut débit dans votre chambre.', '10'),
(5, 'Petit-déjeuner inclus', 'Commencez votre journée avec un délicieux petit-déjeuner inclus dans votre séjour.', '25');

-- --------------------------------------------------------

--
-- Structure de la table `room_type`
--

DROP TABLE IF EXISTS `room_type`;
CREATE TABLE IF NOT EXISTS `room_type` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `base_price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `room_type`
--

INSERT INTO `room_type` (`id`, `name`, `base_price`) VALUES
(1, 'Simple', '100'),
(2, 'Double', '150'),
(3, 'Familial', '200'),
(4, 'VIP', '250');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `cin` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `society_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `secondary_number` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `birthdate` date NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `cin`, `society_name`, `number`, `email`, `secondary_number`, `gender`, `birthdate`, `role_id`) VALUES
(1, 'johnDoe', 'password123', 'John', 'Doe', '123456789', 'ABC Company', '1234567890', 'john.doe@example.com', '9876543210', 'M', '1990-01-01', 1),
(2, 'janeSmith', 'password456', 'Jane', 'Smith', '987654321', 'XYZ Corporation', '0987654321', 'jane.smith@example.com', '0123456789', 'F', '1992-05-10', 2),
(3, 'bobJohnson', 'password789', 'Bob', 'Johnson', '543216789', '123 Industries', '4567890123', 'bob.johnson@example.com', '7890123456', 'M', '1985-11-15', 3),
(4, 'aliceWilliams', 'passwordabc', 'Alice', 'Williams', '876543210', 'ABC Corporation', '7890123456', 'alice.williams@example.com', '2345678901', 'F', '1988-07-20', 4),
(5, 'samBrown', 'passworddef', 'Sam', 'Brown', '345678912', 'XYZ Company', '5678901234', 'sam.brown@example.com', '9012345678', 'M', '1994-03-25', 5),
(6, 'TsinjoKwely', 'tsinjo', 'Tsinjo', 'Robinary', '101235165159', 'HEI schoom', '0342598751', 'hei.tsinjo@gmail.com', '0334551565', 'F', '2015-07-09', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
