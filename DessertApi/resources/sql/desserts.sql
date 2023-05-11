-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 11 mai 2023 à 19:17
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `desserts`
--
CREATE DATABASE IF NOT EXISTS `desserts` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `desserts`;

-- --------------------------------------------------------

--
-- Structure de la table `desserts`
--

CREATE TABLE `desserts` (
  `id` int NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `desserts`
--

INSERT INTO `desserts` (`id`, `nom`, `description`) VALUES
(1, 'Boite de biscuits', 'Une boite de biscuits achetés a l\'épicerie'),
(2, 'Mug Cake', 'Un gâteau simple, préparé dans une tasse.'),
(3, 'Gateau a la Vanille', 'Un gateau a la vanille'),
(6, 'Brownie', 'Un gateau au chocolat'),
(7, 'Tarte aux pommes', 'Une tarte faite avec amour(et des pommes)'),
(8, 'Tire d\'erable', 'Un classique Quebecois');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cle_api` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `mot_de_passe`, `cle_api`) VALUES
(1, 'Admin', 'Admin', '12345'),
(2, 'user1', '$2y$10$91Txkj1pIGGvQjJzGi81BuIvIrRI5T7JqCg4u466iz86bsuXAe4XS', '45678'),
(3, 'marco', '$2y$10$Z1BYNttgIqbMOMAlsdy45emZSoqo0yGswTcUBLSOGQP1EPjAyUeoG', '98765');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `desserts`
--
ALTER TABLE `desserts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `desserts`
--
ALTER TABLE `desserts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
