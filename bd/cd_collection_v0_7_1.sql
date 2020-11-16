-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 16 nov. 2020 à 23:28
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
-- Base de données :  `cd_collection_v0_7_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'AC/DC'),
(2, 'Aerosmith'),
(3, 'All Time Low'),
(4, 'Andy Black'),
(5, 'Asking Alexandria'),
(6, 'Beartooth'),
(7, 'Black Veil Brides'),
(8, 'Blé'),
(9, 'Blink-182'),
(10, 'Bon Jovi'),
(11, 'Bring Me The Horizon'),
(12, 'Bryan Adams'),
(13, 'Coldplay'),
(14, 'Les Colocs'),
(15, 'Demon In Me'),
(16, 'From Ashes To New'),
(17, 'Green Day'),
(18, 'I Prevail'),
(19, 'John Williams'),
(20, 'Kaïn'),
(21, 'Kylle Reece'),
(22, 'Nickelback'),
(23, 'Nirvana'),
(24, 'Nothing More'),
(25, 'Panic! At The Disco'),
(26, 'Ramones'),
(27, 'Saint Asonia'),
(28, 'Simple Plan'),
(29, 'Les Trois Accords'),
(30, 'U2'),
(31, 'Yellowcard'),
(32, 'Harry Styles'),
(33, 'Bullet For My Valentine'),
(34, 'Simple Creatures'),
(35, 'Muse'),
(36, 'Paramore'),
(37, 'We The Kings'),
(38, 'After The Burial');

-- --------------------------------------------------------

--
-- Structure de la table `cds`
--

CREATE TABLE `cds` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(191) NOT NULL,
  `released` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cds`
--

INSERT INTO `cds` (`id`, `user_id`, `title`, `slug`, `released`, `created`, `modified`, `artist_id`) VALUES
(1, 1, 'Panic', 'panic', '2020-08-28', '2020-09-08 10:57:14', '2020-11-11 19:30:58', 16),
(2, 1, 'The Resistance', 'the-resistance', '2009-09-11', '2020-09-08 00:00:00', '2020-09-08 00:00:00', 35),
(3, 1, 'Re-Stitch These Wounds', 'Re-Stitch-These-Wounds', '2020-07-31', '2020-09-08 20:05:44', '2020-10-08 16:05:06', 7),
(6, 2, 'Rareform', 'Rareform', '2008-07-22', '2020-09-09 21:03:37', '2020-10-12 17:10:29', 38),
(8, 3, 'The Shadow Side', 'The-Shadow-Side', '2016-05-06', '2020-09-10 00:44:11', '2020-10-12 17:10:40', 4),
(10, 1, 'The Future', 'The-Future', '2018-04-20', '2020-10-08 15:51:00', '2020-10-12 17:02:10', 16),
(11, 1, 'Wake Up, Sunshine', 'Wake-Up-Sunshine', '2020-04-03', '2020-10-12 16:58:46', '2020-10-12 16:58:46', 3),
(12, 1, 'Fine Line', 'Fine-Line', '2019-12-13', '2020-11-01 18:25:17', '2020-11-01 18:32:54', 32),
(13, 1, 'POST HUMAN : SURVIVAL HORROR', 'POST-HUMAN-SURVIVAL-HORROR', '2020-10-30', '2020-11-01 18:29:22', '2020-11-01 18:31:41', 11);

-- --------------------------------------------------------

--
-- Structure de la table `cds_covers`
--

CREATE TABLE `cds_covers` (
  `id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `cover_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cds_covers`
--

INSERT INTO `cds_covers` (`id`, `cd_id`, `cover_id`) VALUES
(2, 2, 4),
(3, 11, 6),
(4, 10, 5),
(5, 3, 8),
(6, 6, 9),
(7, 8, 10),
(9, 1, 3),
(10, 13, 11),
(11, 12, 12);

-- --------------------------------------------------------

--
-- Structure de la table `cds_genres`
--

CREATE TABLE `cds_genres` (
  `id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cds_genres`
--

INSERT INTO `cds_genres` (`id`, `cd_id`, `genre_id`) VALUES
(1, 1, 1),
(4, 1, 6),
(5, 1, 9),
(6, 10, 1),
(7, 10, 3),
(8, 10, 10),
(9, 3, 1),
(10, 3, 3),
(11, 3, 6),
(12, 11, 5),
(13, 6, 3),
(14, 8, 7),
(15, 8, 6),
(16, 12, 6),
(17, 13, 1),
(18, 13, 2),
(19, 13, 3);

-- --------------------------------------------------------

--
-- Structure de la table `covers`
--

CREATE TABLE `covers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `covers`
--

INSERT INTO `covers` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(3, 'fatn-panic.jpg', 'covers/add/', '2020-10-09 04:51:04', '2020-10-09 05:20:47', 1),
(4, 'Theresistance.jpg', 'covers/add/', '2020-10-12 16:53:27', '2020-10-12 16:54:21', 1),
(5, 'fatnfuture.jpg', 'covers/add/', '2020-10-12 16:56:47', '2020-10-12 16:56:47', 1),
(6, 'Wake-Up-Sunshine.jpg', 'covers/add/', '2020-10-12 16:57:29', '2020-10-12 16:57:29', 1),
(8, 'Black-Veil-Brides-Restitch-These-Wounds-cover.jpg', 'covers/add/', '2020-10-12 17:08:16', '2020-10-12 17:08:23', 1),
(9, 'Rareform.jpg', 'covers/add/', '2020-10-12 17:10:10', '2020-10-12 17:10:10', 1),
(10, 'theshadowside.jpg', 'covers/add/', '2020-10-12 17:10:17', '2020-10-12 17:10:17', 1),
(11, 'bmth_posthuman_survivalhorror.jpg', 'covers/add/', '2020-11-01 18:31:24', '2020-11-01 18:31:24', 1),
(12, 'fine_line.jpg', 'covers/add/', '2020-11-01 18:32:44', '2020-11-01 18:32:44', 1);

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `genre_family_id` int(11) NOT NULL,
  `genre_subfamily_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `name`, `genre_family_id`, `genre_subfamily_id`) VALUES
(1, 'Hard Rock', 2, 3),
(2, 'Punk', 2, 3),
(3, 'Heavy Metal', 2, 4),
(4, 'Acid Jazz', 1, 1),
(5, 'Pop punk', 2, 3),
(6, 'Pop Rock', 2, 3),
(7, 'Alternative', 2, 3),
(9, 'Old-school Hip Hop', 3, 5),
(10, 'Rap', 3, 5),
(12, 'Progressive Metal', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `genre_families`
--

CREATE TABLE `genre_families` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genre_families`
--

INSERT INTO `genre_families` (`id`, `name`) VALUES
(1, 'Acoustic'),
(2, 'Electric'),
(3, 'Electronic'),
(4, 'Symphonic'),
(12, 'Test TP2');

-- --------------------------------------------------------

--
-- Structure de la table `genre_subfamilies`
--

CREATE TABLE `genre_subfamilies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genre_family_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genre_subfamilies`
--

INSERT INTO `genre_subfamilies` (`id`, `name`, `genre_family_id`) VALUES
(1, 'Jazz', 1),
(2, 'Blues', 1),
(3, 'Rock', 2),
(4, 'Metal', 2),
(5, 'Hip hop', 3),
(6, 'House', 3),
(7, 'Classical', 4),
(8, 'Baroque', 4);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'fr_CA', 'Reviews', 1, 'review', 'Ceci est très bon'),
(2, 'fr_CA', 'Reviews', 4, 'name', 'Bien'),
(3, 'fr_CA', 'Reviews', 4, 'review', 'J\'ai passé un très bon moment à écouter celà!'),
(4, 'es_ES', 'Reviews', 1, 'name', 'Excelente wow'),
(5, 'es_ES', 'Reviews', 1, 'review', 'Esto es realmente bueno'),
(6, 'es_ES', 'Reviews', 4, 'name', 'Bonito'),
(7, 'es_ES', 'Reviews', 4, 'review', '¡Me lo pasé muy bien escuchando esto!'),
(8, 'fr_CA', 'Reviews', 1, 'name', 'Remarquable wow');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `cd_id`, `name`, `review`, `created`, `modified`) VALUES
(1, 1, 'Excellent wow', 'This is really good', '2020-09-10 18:45:59', '2020-10-13 17:25:23'),
(4, 1, 'Nice', 'I had a very nice time listening to this!', '2020-09-15 16:14:29', '2020-09-21 18:01:33');

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
  `modified` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `password`, `created`, `modified`, `uuid`, `confirmed`) VALUES
(1, 1, 'charlo', 'charlo@hotmail.com', '$2y$10$pmxBggQj.L0.hTV5OjQqPe4Ka2MyTGD987AIOCxfw7HHbITHGj1gy', '2020-09-08 00:00:00', '2020-10-12 19:15:31', 'a2e009e2-9262-46c8-96d0-92b91103f4a1', 1),
(2, 1, 'LeTest99', 'test@test.com', '$2y$10$NkUo4gcvhagBFRnL3R00PuC/DNdwhP3gpX5zuhMC1PQdyW3W3dZ.a', '2020-09-09 20:12:55', '2020-10-12 19:15:39', '0e8518fd-e296-4350-82a6-967243846458', 1),
(3, 2, 'Bob', 'vendorbob@email.com', '$2y$10$m.ZwYdOI6tchbItzS4p5NeH0sD0wccAInGF3PMIId5iKfVUsnJNw.', '2020-09-10 00:37:03', '2020-10-12 19:15:42', '2b85946c-147f-407c-a597-bff43a87f3fb', 0),
(7, 2, 'TrueCharlo', 'artemis2713@hotmail.com', '$2y$10$Pun.a5r.0EkUQ6g07.Ma.OfUikHMRg389mwP0inLJHYGnUfwukyIK', '2020-10-13 00:45:13', '2020-10-13 01:23:31', 'ca28af95-55f2-4955-bf3e-658a0d6e85c6', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_artist_id` (`artist_id`);

--
-- Index pour la table `cds_covers`
--
ALTER TABLE `cds_covers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cover_id` (`cover_id`),
  ADD KEY `cd_id` (`cd_id`) USING BTREE;

--
-- Index pour la table `cds_genres`
--
ALTER TABLE `cds_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `cd_id` (`cd_id`) USING BTREE;

--
-- Index pour la table `covers`
--
ALTER TABLE `covers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_genre_family` (`genre_family_id`),
  ADD KEY `fk_genre_subfamily` (`genre_subfamily_id`);

--
-- Index pour la table `genre_families`
--
ALTER TABLE `genre_families`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genre_subfamilies`
--
ALTER TABLE `genre_subfamilies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_family_id` (`genre_family_id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

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
-- AUTO_INCREMENT pour la table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `cds`
--
ALTER TABLE `cds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `cds_covers`
--
ALTER TABLE `cds_covers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `cds_genres`
--
ALTER TABLE `cds_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `covers`
--
ALTER TABLE `covers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `genre_families`
--
ALTER TABLE `genre_families`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `genre_subfamilies`
--
ALTER TABLE `genre_subfamilies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cds`
--
ALTER TABLE `cds`
  ADD CONSTRAINT `cds_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cds_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cds_covers`
--
ALTER TABLE `cds_covers`
  ADD CONSTRAINT `cds_covers_ibfk_1` FOREIGN KEY (`cd_id`) REFERENCES `cds` (`id`),
  ADD CONSTRAINT `cds_covers_ibfk_2` FOREIGN KEY (`cover_id`) REFERENCES `covers` (`id`);

--
-- Contraintes pour la table `cds_genres`
--
ALTER TABLE `cds_genres`
  ADD CONSTRAINT `cds_genres_ibfk_1` FOREIGN KEY (`cd_id`) REFERENCES `cds` (`id`),
  ADD CONSTRAINT `cds_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Contraintes pour la table `genres`
--
ALTER TABLE `genres`
  ADD CONSTRAINT `genres_ibfk_1` FOREIGN KEY (`genre_family_id`) REFERENCES `genre_families` (`id`),
  ADD CONSTRAINT `genres_ibfk_2` FOREIGN KEY (`genre_subfamily_id`) REFERENCES `genre_subfamilies` (`id`);

--
-- Contraintes pour la table `genre_subfamilies`
--
ALTER TABLE `genre_subfamilies`
  ADD CONSTRAINT `genre_subfamilies_ibfk_1` FOREIGN KEY (`genre_family_id`) REFERENCES `genre_families` (`id`);

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
