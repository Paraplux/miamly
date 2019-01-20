-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 20 jan. 2019 à 13:49
-- Version du serveur :  5.7.19
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
-- Base de données :  `miamly`
--
CREATE DATABASE IF NOT EXISTS `miamly` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `miamly`;

-- --------------------------------------------------------

--
-- Structure de la table `mly_ingredients`
--

CREATE TABLE `mly_ingredients` (
  `i_id` int(50) NOT NULL,
  `i_nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mly_ingredients`
--

INSERT INTO `mly_ingredients` (`i_id`, `i_nom`) VALUES
(1, 'chocolat'),
(2, 'oignon'),
(3, 'pomme de terre'),
(4, 'lardons'),
(5, 'ail'),
(6, 'sucre'),
(7, 'oeufs'),
(8, 'mayonnaise'),
(9, 'thon'),
(10, 'champignon'),
(11, 'crème'),
(12, 'pâtes');

-- --------------------------------------------------------

--
-- Structure de la table `mly_photos`
--

CREATE TABLE `mly_photos` (
  `p_id` int(50) NOT NULL,
  `p_link` varchar(255) NOT NULL DEFAULT '0',
  `p_recette_id` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mly_photos`
--

INSERT INTO `mly_photos` (`p_id`, `p_link`, `p_recette_id`) VALUES
(1, '../images/thumbs/recettes/brownie.jpg', 1),
(2, '../images/thumbs/recettes/fondant.jpg', 2),
(3, '../images/thumbs/recettes/oeuf.jpg', 3),
(4, '../images/thumbs/recettes/champ.jpg', 4),
(5, '../images/thumbs/recettes/pate.jpg', 5),
(6, '../images/thumbs/recettes/tartiflette.jpg', 6),
(7, '../images/thumbs/recettes/brownie.jpg', 1),
(8, '../images/thumbs/recettes/fondant.jpg', 2),
(9, '../images/thumbs/recettes/pate.jpg', 5),
(10, '../images/thumbs/recettes/brownie.jpg', 1),
(14, '../images/thumbs/recettes/thumb_a7304cc3d68a43c6159a061ccdcf194236602d88.jpg', 15),
(15, '../images/thumbs/recettes/thumb_160fb13c3bd09b860383c21ac4eb457a7c8a1b76.jpg', 15);

-- --------------------------------------------------------

--
-- Structure de la table `mly_recettes`
--

CREATE TABLE `mly_recettes` (
  `r_id` int(50) NOT NULL,
  `r_nom` varchar(255) DEFAULT NULL,
  `r_content` longtext,
  `r_type` varchar(255) DEFAULT NULL,
  `r_date` varchar(255) DEFAULT NULL,
  `r_difficulte` varchar(255) DEFAULT NULL,
  `r_duree` varchar(255) DEFAULT NULL,
  `r_createur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mly_recettes`
--

INSERT INTO `mly_recettes` (`r_id`, `r_nom`, `r_content`, `r_type`, `r_date`, `r_difficulte`, `r_duree`, `r_createur`) VALUES
(1, 'Brownie', 'Recette de brownie', 'Dessert', '2018-11-14', '5', 'Moyenne', 'Antoine'),
(2, 'Fondant au chocolat', 'Recette de fondant au chocolat', 'Dessert', '2018-11-15', '7', 'Longue', 'Marc'),
(3, 'Oeufs mimosa', 'Recette d\'oeufs mimosa', 'Entrée', '2018-11-16', '3', 'Rapide', 'Bryan'),
(4, 'Champignons à la crème', 'Recette de champignons à la crème', 'Entrée', '2018-11-17', '5', 'Moyenne', 'Micheline'),
(5, 'Pâtes bolognaise', 'Recette de pâtes à la sauce bolognaise', 'Plat', '2018-11-18', '7', 'Moyenne', 'Micheline'),
(6, 'Tartiflette', 'Recette de tartiflette', 'Plat', '2018-11-15', '7', 'Longue', 'Bryan'),
(7, 'Pizza Maison', '<li>Préchauffer le four</li><li>Faire la pâte</li><li>Etc</li><li>Et encore etc</li>', 'Plat', '2019-01-18', '6', 'Moyenne', 'Paraplux (vous)'),
(15, 'Omelette de pâtes', '<li>Cuire les pâtes dans une casserole d\'eau bouillante salée.</li><li>Faire revenir la pancetta dans une poêle.</li><li>Dans un saladier, battre les oeufs, ajouter les spaghetti, les fromages et la pancetta. Bien mélanger.</li><li>Faire cuire le mélange dans une poêle bien chaude avec l\'huile d\'olive.</li><li>Déguster bien chaud en plat ou coupé en morceaux comme antipasti.</li>', 'Plat', '2019-01-20', '3', 'Moyenne', 'Paraplux');

-- --------------------------------------------------------

--
-- Structure de la table `mly_recettes_ingredients`
--

CREATE TABLE `mly_recettes_ingredients` (
  `r_i_id` int(50) NOT NULL,
  `r_i_id_recette` int(50) NOT NULL,
  `r_i_id_ingredient` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mly_tags`
--

CREATE TABLE `mly_tags` (
  `t_id` int(50) NOT NULL,
  `t_nom` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mly_tags`
--

INSERT INTO `mly_tags` (`t_id`, `t_nom`) VALUES
(1, 'gras'),
(2, 'matin'),
(3, 'rapide'),
(4, 'chocolat'),
(5, 'sucré'),
(6, 'salé');

-- --------------------------------------------------------

--
-- Structure de la table `mly_utilisateurs`
--

CREATE TABLE `mly_utilisateurs` (
  `u_id` int(50) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_pseudo` varchar(255) NOT NULL,
  `u_avatar` varchar(255) DEFAULT NULL,
  `u_nom` varchar(255) DEFAULT NULL,
  `u_prenom` varchar(255) DEFAULT NULL,
  `u_age` varchar(255) DEFAULT NULL,
  `u_recettefavorite` varchar(255) DEFAULT NULL,
  `u_ingredientfavoris` varchar(255) DEFAULT NULL,
  `u_recettedereve` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `mly_utilisateurs`
--

INSERT INTO `mly_utilisateurs` (`u_id`, `u_email`, `u_password`, `u_pseudo`, `u_avatar`, `u_nom`, `u_prenom`, `u_age`, `u_recettefavorite`, `u_ingredientfavoris`, `u_recettedereve`) VALUES
(1, 'theparaplux@gmail.com', '$2y$10$G5o8qewoQvgUem58NZrqrukVNhi.vfNPXRLoXKMpSwJDz6/fVanni', 'Paraplux', NULL, 'Bouchez', 'Marc', '28', 'Couscous', '', ''),
(2, 'test@test.com', '$2y$10$T190riwpiiU8l5MOoBfQ8.VzjA0A5GJk3UHfpdOqYAH0S8ieSAPNq', 'Pollux', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `mly_ingredients`
--
ALTER TABLE `mly_ingredients`
  ADD PRIMARY KEY (`i_id`);

--
-- Index pour la table `mly_photos`
--
ALTER TABLE `mly_photos`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `Recettes->Photos` (`p_recette_id`);

--
-- Index pour la table `mly_recettes`
--
ALTER TABLE `mly_recettes`
  ADD PRIMARY KEY (`r_id`);

--
-- Index pour la table `mly_recettes_ingredients`
--
ALTER TABLE `mly_recettes_ingredients`
  ADD PRIMARY KEY (`r_i_id`),
  ADD KEY `Ingredients<->Recettes` (`r_i_id_ingredient`),
  ADD KEY `r_i_id_recette` (`r_i_id_recette`);

--
-- Index pour la table `mly_tags`
--
ALTER TABLE `mly_tags`
  ADD PRIMARY KEY (`t_id`);

--
-- Index pour la table `mly_utilisateurs`
--
ALTER TABLE `mly_utilisateurs`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `mly_ingredients`
--
ALTER TABLE `mly_ingredients`
  MODIFY `i_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `mly_photos`
--
ALTER TABLE `mly_photos`
  MODIFY `p_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `mly_recettes`
--
ALTER TABLE `mly_recettes`
  MODIFY `r_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `mly_recettes_ingredients`
--
ALTER TABLE `mly_recettes_ingredients`
  MODIFY `r_i_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mly_tags`
--
ALTER TABLE `mly_tags`
  MODIFY `t_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `mly_utilisateurs`
--
ALTER TABLE `mly_utilisateurs`
  MODIFY `u_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mly_photos`
--
ALTER TABLE `mly_photos`
  ADD CONSTRAINT `Recettes->Photos` FOREIGN KEY (`p_recette_id`) REFERENCES `mly_recettes` (`r_id`);

--
-- Contraintes pour la table `mly_recettes_ingredients`
--
ALTER TABLE `mly_recettes_ingredients`
  ADD CONSTRAINT `Ingredients<->Recettes` FOREIGN KEY (`r_i_id_ingredient`) REFERENCES `mly_ingredients` (`i_id`),
  ADD CONSTRAINT `mly_recettes_ingredients_ibfk_1` FOREIGN KEY (`r_i_id_recette`) REFERENCES `mly_recettes` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
