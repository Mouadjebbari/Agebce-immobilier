-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 fév. 2023 à 15:18
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agence_immob`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id_annonce` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `date_publication` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `categorie` varchar(10) DEFAULT NULL,
  `type_annonce` varchar(20) DEFAULT NULL,
  `url_image_principal` varchar(200) DEFAULT NULL,
  `url_image1` varchar(200) DEFAULT NULL,
  `url_image2` varchar(200) DEFAULT NULL,
  `url_image3` varchar(200) DEFAULT NULL,
  `url_image4` varchar(200) DEFAULT NULL,
  `url_image5` varchar(200) DEFAULT NULL,
  `url_image6` varchar(200) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `titre`, `prix`, `date_publication`, `date_modification`, `adresse`, `ville`, `categorie`, `type_annonce`, `url_image_principal`, `url_image1`, `url_image2`, `url_image3`, `url_image4`, `url_image5`, `url_image6`, `id_client`) VALUES
(1, 'maison vue sur la terre', '2000000.00', '2023-02-16', '2023-02-16', 'bni ouriaghel 199', 'tanger', 'vente', 'villa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Appartement moderne', '4500.00', '2023-02-16', '2023-02-16', 'Tanger Centre ville', 'Tanger', 'louer', 'Appartement', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Villa vue sur la mer', '1000000.00', '2023-02-16', '2023-02-16', '3 DU CLOS DE MALEVART', 'Marrakesh', 'vente', 'maison', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `id_client` (`id_client`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
