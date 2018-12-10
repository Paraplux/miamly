-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.19 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour miamly
DROP DATABASE IF EXISTS `miamly`;
CREATE DATABASE IF NOT EXISTS `miamly` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `miamly`;

-- Export de la structure de la table miamly. mly_ingredients
DROP TABLE IF EXISTS `mly_ingredients`;
CREATE TABLE IF NOT EXISTS `mly_ingredients` (
  `i_id` int(50) NOT NULL AUTO_INCREMENT,
  `i_nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Export de données de la table miamly.mly_ingredients : ~12 rows (environ)
/*!40000 ALTER TABLE `mly_ingredients` DISABLE KEYS */;
INSERT INTO `mly_ingredients` (`i_id`, `i_nom`) VALUES
	(1, 'chocolat'),
	(2, 'ognion'),
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
/*!40000 ALTER TABLE `mly_ingredients` ENABLE KEYS */;

-- Export de la structure de la table miamly. mly_photos
DROP TABLE IF EXISTS `mly_photos`;
CREATE TABLE IF NOT EXISTS `mly_photos` (
  `p_id` int(50) NOT NULL AUTO_INCREMENT,
  `p_link` varchar(255) NOT NULL DEFAULT '0',
  `p_recette_id` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table miamly.mly_photos : ~0 rows (environ)
/*!40000 ALTER TABLE `mly_photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `mly_photos` ENABLE KEYS */;

-- Export de la structure de la table miamly. mly_recettes
DROP TABLE IF EXISTS `mly_recettes`;
CREATE TABLE IF NOT EXISTS `mly_recettes` (
  `r_id` int(50) NOT NULL AUTO_INCREMENT,
  `r_nom` varchar(255) DEFAULT NULL,
  `r_content` varchar(255) DEFAULT NULL,
  `r_type` varchar(255) DEFAULT NULL,
  `r_date` varchar(255) DEFAULT NULL,
  `r_difficulte` varchar(255) DEFAULT NULL,
  `r_note` varchar(255) DEFAULT NULL,
  `r_duree` varchar(255) DEFAULT NULL,
  `r_createur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Export de données de la table miamly.mly_recettes : ~6 rows (environ)
/*!40000 ALTER TABLE `mly_recettes` DISABLE KEYS */;
INSERT INTO `mly_recettes` (`r_id`, `r_nom`, `r_content`, `r_type`, `r_date`, `r_difficulte`, `r_note`, `r_duree`, `r_createur`) VALUES
	(1, 'Brownie', 'Recette de brownie', 'Dessert', '2018-11-15', '5', '8', 'Moyenne', 'Antoine'),
	(2, 'Fondant au chocolat', 'Recette de fondant au chocolat', 'Dessert', '2018-11-15', '7', '9', 'Longue', 'Marc'),
	(3, 'Oeufs mimosa', 'Recette d\'oeufs mimosa', 'Entrée', '2018-11-15', '3', '5', 'Rapide', 'Bryan'),
	(4, 'Champignons à la crème', 'Recette de champignons à la crème', 'Entrée', '2018-11-15', '5', '7', 'Moyenne', 'Micheline'),
	(5, 'Pâtes bolognaise', 'Recette de pâtes à la sauce bolognaise', 'Plat', '2018-11-15', '7', '8', 'Moyenne', 'Micheline'),
	(6, 'Tartiflette', 'Recette de tartiflette', 'Plat', '2018-11-15', '7', '10', 'Longue', 'Bryan');
/*!40000 ALTER TABLE `mly_recettes` ENABLE KEYS */;

-- Export de la structure de la table miamly. mly_tags
DROP TABLE IF EXISTS `mly_tags`;
CREATE TABLE IF NOT EXISTS `mly_tags` (
  `t_id` int(50) NOT NULL AUTO_INCREMENT,
  `t_nom` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Export de données de la table miamly.mly_tags : ~6 rows (environ)
/*!40000 ALTER TABLE `mly_tags` DISABLE KEYS */;
INSERT INTO `mly_tags` (`t_id`, `t_nom`) VALUES
	(1, 'gras'),
	(2, 'matin'),
	(3, 'rapide'),
	(4, 'chocolat'),
	(5, 'sucré'),
	(6, 'salé');
/*!40000 ALTER TABLE `mly_tags` ENABLE KEYS */;

-- Export de la structure de la table miamly. mly_utilisateurs
DROP TABLE IF EXISTS `mly_utilisateurs`;
CREATE TABLE IF NOT EXISTS `mly_utilisateurs` (
  `u_id` int(50) NOT NULL AUTO_INCREMENT,
  `u_mail` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_pseudo` varchar(255) NOT NULL,
  `u_avatar` varchar(255) DEFAULT NULL,
  `u_nom` varchar(255) DEFAULT NULL,
  `u_prenom` varchar(255) DEFAULT NULL,
  `u_age` varchar(255) DEFAULT NULL,
  `u_recettefavorite` varchar(255) DEFAULT NULL,
  `u_ingredientfavoris` varchar(255) DEFAULT NULL,
  `u_recettedereve` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- Export de données de la table miamly.mly_utilisateurs : ~0 rows (environ)
/*!40000 ALTER TABLE `mly_utilisateurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `mly_utilisateurs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
