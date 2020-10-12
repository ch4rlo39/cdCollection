-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 14 sep. 2020 à 19:40
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cd_collection_v0_2_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `cds`
--

CREATE TABLE `cds` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(191) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cds`
--

INSERT INTO `cds` (`id`, `user_id`, `title`, `slug`, `artist`, `created`, `modified`) VALUES
(1, 1, 'Panic', 'panic', 'From Ashes To New', '2020-09-08 10:57:14', '2020-09-08 10:57:14'),
(2, 1, 'The Resistance', 'the-resistance', 'Muse', '2020-09-08 00:00:00', '2020-09-08 00:00:00'),
(3, 1, 'Re-Stitch These Wounds', 'Re-Stitch-These-Wounds', 'Black Veil Brides', '2020-09-08 20:05:44', '2020-09-08 20:05:44'),
(6, 2, 'Rareform', 'Rareform', 'After The Burial', '2020-09-09 21:03:37', '2020-09-09 21:03:37'),
(7, 1, 'À effacer', 'A-effacer', 'To Delete', '2020-09-10 00:22:03', '2020-09-10 00:22:03'),
(8, 3, 'The Shadow Side', 'The-Shadow-Side', 'Andy Black', '2020-09-10 00:44:11', '2020-09-10 00:44:11');

-- --------------------------------------------------------

--
-- Structure de la table `cds_genres`
--

CREATE TABLE `cds_genres` (
  `id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'Punk'),
(3, 'Metal'),
(4, 'Jazz'),
(5, 'Pop punk'),
(6, 'Hard rock'),
(7, 'Alternative'),
(8, 'Pop'),
(9, 'Hip hop');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `review` text COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `cd_id`, `name`, `review`, `created`, `modified`) VALUES
(1, 1, 'Excellent wow', 'Ceci est très bon', '2020-09-10 18:45:59', '2020-09-10 19:59:25');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrateur'),
(2, 'vendor', 'Vendeur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `password`, `created`, `modified`) VALUES
(1, 1, 'charlo', 'charlo@hotmail.com', '$2y$10$pmxBggQj.L0.hTV5OjQqPe4Ka2MyTGD987AIOCxfw7HHbITHGj1gy', '2020-09-08 00:00:00', '2020-09-09 20:10:41'),
(2, 1, 'LeTest99', 'test@test.com', '$2y$10$NkUo4gcvhagBFRnL3R00PuC/DNdwhP3gpX5zuhMC1PQdyW3W3dZ.a', '2020-09-09 20:12:55', '2020-09-09 20:12:55'),
(3, 2, 'Bob', 'vendorbob@email.com', '$2y$10$m.ZwYdOI6tchbItzS4p5NeH0sD0wccAInGF3PMIId5iKfVUsnJNw.', '2020-09-10 00:37:03', '2020-09-10 00:37:03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `cds_genres`
--
ALTER TABLE `cds_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `cd_id` (`cd_id`) USING BTREE;

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cd_id` (`cd_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cds`
--
ALTER TABLE `cds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `cds_genres`
--
ALTER TABLE `cds_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cds`
--
ALTER TABLE `cds`
  ADD CONSTRAINT `cds_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `cds_genres`
--
ALTER TABLE `cds_genres`
  ADD CONSTRAINT `cds_genres_ibfk_1` FOREIGN KEY (`cd_id`) REFERENCES `cds` (`id`),
  ADD CONSTRAINT `cds_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`cd_id`) REFERENCES `cds` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
