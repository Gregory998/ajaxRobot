-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 jan. 2024 à 16:29
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `robot`
--

-- --------------------------------------------------------

--
-- Structure de la table `robotic_core`
--

CREATE TABLE `robotic_core` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `power` int(11) NOT NULL,
  `factoryId` varchar(32) NOT NULL,
  `isValid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `robotic_core`
--

INSERT INTO `robotic_core` (`id`, `name`, `brand`, `power`, `factoryId`, `isValid`) VALUES
(8, 'Bidulon', 'Tulaissela', 21, 'a0eeed25efadb20cf883e002ada97996', 1),
(9, 'Gregorick', 'Deux Laure et Anne', 47, '56da7c992192309d3c41092c8f433675', 1);

-- --------------------------------------------------------

--
-- Structure de la table `robotic_parts`
--

CREATE TABLE `robotic_parts` (
  `id` int(11) NOT NULL,
  `id_core` int(11) DEFAULT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `robotic_parts`
--

INSERT INTO `robotic_parts` (`id`, `id_core`, `name`) VALUES
(1, NULL, 'Module de Résonance Quantum-Chrono-Nucléaire d\'Antimatière Catalytique'),
(2, NULL, 'Interface Nucléaro-Positronique de Commande Synthético-Rétro-Quantique'),
(3, NULL, 'Dispositif de Séparation Chrono-Positronique avec Rétro-Isolateurs Gamma'),
(5, NULL, 'Ressort pour movement pogo'),
(6, NULL, 'Système de Navigation Tachyonico-Stellaro-Quantique à Antenne Galactique'),
(7, NULL, 'Réacteur Électro-Fusionnel à Noyau Chrono-Stellaro-Quantique'),
(8, NULL, 'Porte-goblets'),
(9, NULL, 'Le bouton rouge');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `robotic_core`
--
ALTER TABLE `robotic_core`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `robotic_parts`
--
ALTER TABLE `robotic_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_core` (`id_core`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `robotic_core`
--
ALTER TABLE `robotic_core`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `robotic_parts`
--
ALTER TABLE `robotic_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `robotic_parts`
--
ALTER TABLE `robotic_parts`
  ADD CONSTRAINT `fk_parts_core` FOREIGN KEY (`id_core`) REFERENCES `robotic_core` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
