-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 07 fév. 2019 à 08:09
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

-- --------------------------------------------------------

--
-- Structure de la table `mly_commentaires`
--

CREATE TABLE `mly_commentaires` (
  `c_id` int(51) NOT NULL,
  `c_corpus` longtext NOT NULL,
  `c_date` date NOT NULL,
  `c_recette_id` int(11) NOT NULL,
  `c_utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mly_commentaires`
--

INSERT INTO `mly_commentaires` (`c_id`, `c_corpus`, `c_date`, `c_recette_id`, `c_utilisateur_id`) VALUES
(2, 'Cette recette est géniale!', '2019-02-04', 16, 1),
(3, 'Commentaire test ', '2019-02-04', 16, 1),
(4, 'Cette recette de pâtes bolognaise est géniale, les enfants ont adoré !', '2019-02-04', 5, 1),
(5, 'Cette recette est parfaite !', '2019-02-04', 15, 1),
(6, 'Cette recette est parfaite pour les invités', '2019-02-04', 18, 1),
(7, 'Ceci est un commentaire ', '2019-02-04', 18, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mly_newsletter`
--

CREATE TABLE `mly_newsletter` (
  `n_id` int(51) NOT NULL,
  `n_email` varchar(255) NOT NULL,
  `n_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mly_newsletter`
--

INSERT INTO `mly_newsletter` (`n_id`, `n_email`, `n_date`) VALUES
(1, 'theparaplux@gmail.com', '2019-01-30'),
(2, 'test@gmail.com', '2019-01-30');

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
(15, '../images/thumbs/recettes/thumb_160fb13c3bd09b860383c21ac4eb457a7c8a1b76.jpg', 15),
(16, '../images/thumbs/recettes/thumb_223c20d359449da3ca115e377a96e72fde2c9b59.jpg', 16),
(17, '../images/thumbs/recettes/thumb_076d6668a8a849c55cb91b274007d7d84aacef44.jpg', 18),
(18, '../images/thumbs/recettes/thumb_6a55acf4909b9cd9c94e39f87c4dbde175ad622d.jpg', 28);

-- --------------------------------------------------------

--
-- Structure de la table `mly_recettes`
--

CREATE TABLE `mly_recettes` (
  `r_id` int(50) NOT NULL,
  `r_nom` varchar(255) DEFAULT NULL,
  `r_ingredients` longtext NOT NULL,
  `r_content` longtext,
  `r_type` varchar(255) DEFAULT NULL,
  `r_date` varchar(255) DEFAULT NULL,
  `r_difficulte` varchar(255) DEFAULT NULL,
  `r_duree` varchar(255) DEFAULT NULL,
  `r_createur` varchar(255) DEFAULT NULL,
  `r_officielle` varchar(255) NOT NULL DEFAULT 'false',
  `r_votes` int(11) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mly_recettes`
--

INSERT INTO `mly_recettes` (`r_id`, `r_nom`, `r_ingredients`, `r_content`, `r_type`, `r_date`, `r_difficulte`, `r_duree`, `r_createur`, `r_officielle`, `r_votes`) VALUES
(1, 'Brownie', '', '<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li>', 'Dessert', '2018-11-14', '5', 'Moyenne', 'Antoine', 'true', 100),
(2, 'Fondant au chocolat', '', '<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li>', 'Dessert', '2018-11-15', '7', 'Longue', 'Marc', 'true', 100),
(3, 'Oeufs mimosa', '', '<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li>', 'Entrée', '2018-11-16', '3', 'Rapide', 'Bryan', 'true', 100),
(4, 'Champignons à la crème', '', '<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li>', 'Entrée', '2018-11-17', '5', 'Moyenne', 'Micheline', 'true', 100),
(5, 'Pâtes bolognaise', '', '<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li>', 'Plat', '2018-11-18', '7', 'Moyenne', 'Micheline', 'true', 100),
(6, 'Tartiflette', '', '<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li>', 'Plat', '2018-11-15', '7', 'Longue', 'Bryan', 'true', 100),
(15, 'Omelette de pâtes', '', '<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li>', 'Plat', '2019-01-20', '3', 'Moyenne', 'Paraplux', 'true', 100),
(16, 'Fondue Savoyarde', '', '<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li>', 'Plat', '2019-01-28', '4', 'Moyenne', 'Paraplux', 'true', 100),
(18, 'Boeuf bourguignon', '', '<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li><li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus maiores reprehenderit laborum doloremque recusandae nobis molestiae nesciunt nostrum pariatur voluptas corrupti veniam facilis at deserunt qui molestias unde, delectus est.</li>', 'Plat', '2019-01-28', '7', 'Longue', 'Paraplux', 'true', 100),
(28, 'Le Giga Tacos', '<li> 1 kilos de viande haché pur bœuf </li> <li> 1 kilos de poulet / pané de poulet </li> <li> 500g de fromage râpé gruyère/comté/ cheddar</li> <li> 4 briques de crème liquide</li> <li> 2 paquets de fromage en tranche gruyère/comté/ cheddar/mozzarella</li> <li> Du curry environ 15g</li> <li> Du sel</li> <li> Du poivre</li> <li> Des épices bbq pour la viande haché</li> <li> Des oignion</li> <li> De la sauce, beaucoup de sauce</li> <li> 12 crêpes de grande taille, très grande taille, vous pouvez les trouvés à Action pour 1.50 les 6 en grand format ou alors les crêpes fajitas font l’affaire</li> <li> 2 paquets de bacon</li> <li> Du gras pour mettre sur le gracos</li> <li> Des frites</li>', '<li>Prendre une grande poêle type wok, mettre du beurre et les oignions, parsemer les oignions d’épice bbq et mélanger.</li><li>Couper en petit morceaux le poulet.</li><li>Mettre la viande hachée dans le wok et mélanger les oignions et dans une autre poêle mettre le poulet.</li><li>Saupoudrer la viande hachée d’épice bbq, mélanger, faite un petit volcan dans le wok et remettre des oignions avec des épices.</li><li>Prendre une casserole suffisamment grande pour verser les 4 briques de crème liquide. La faire chauffer à feu doux quelques minutes. Puis mettre au fur et à mesure le fromage râpé que vous avez pris en mélangeant bien avec la crème, pour rajouter du gout vous pouvez mettre du curry ou du paprika.</li><li>Commencer à préparer les frites.</li><li>Une fois les viandes bien cuites et la sauce fromagère prête vous allez pouvoir commencer à préparer les tacos.</li><li>Disposer deux crêpes à moitié coller, mettre la sauce que vous voulez, beaucoup de sauce, mettre 4 tranches de fromages. Disposer de la viande hachée sur les 2 crêpes puis au-dessus le poulet. Mettre les frites sur le poulet, parsemer la sauce fromagère sur toute la zone. Fermer les crêpes, commencer par les extrémités puis les côtés. Une fois fermer ajouter 3 tranches de fromages sur le dessus et des petits copeaux de bacon que vous aurez fait griller. Passer au grill.</li><li>Pour la présentation vous pouvez couper le tacos en 2 pour ne pas le faire déborder de l’assiette. Rajouter de la sauce fromagère sur le dessus avec des frites et le reste de viande.</li><li>Déguster avec un coca light pour garder une alimentation saine et équilibré.</li>', 'Plat', '2019-01-31', '7', 'Longue', 'Paraplux', 'false', 53);

-- --------------------------------------------------------

--
-- Structure de la table `mly_tags`
--

CREATE TABLE `mly_tags` (
  `t_id` int(50) NOT NULL,
  `t_nom` varchar(255) NOT NULL DEFAULT '0',
  `t_recette_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mly_tags`
--

INSERT INTO `mly_tags` (`t_id`, `t_nom`, `t_recette_id`) VALUES
(1, 'gras', 4),
(2, 'matin', 0),
(3, 'rapide', 0),
(4, 'chocolat', 0),
(5, 'sucré', 0),
(6, 'salé', 0),
(7, 'test', 29),
(8, 'tag', 29),
(9, 'test', 29);

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
  `u_recettedereve` varchar(255) DEFAULT NULL,
  `u_votes_history` longtext NOT NULL,
  `u_fav` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `mly_utilisateurs`
--

INSERT INTO `mly_utilisateurs` (`u_id`, `u_email`, `u_password`, `u_pseudo`, `u_avatar`, `u_nom`, `u_prenom`, `u_age`, `u_recettefavorite`, `u_ingredientfavoris`, `u_recettedereve`, `u_votes_history`, `u_fav`) VALUES
(1, 'theparaplux@gmail.com', '$2y$10$jq/W0enK6QPMRTiSAzRQNuCM4PXeWSPcYI1kEpeued6/Lq1CrfA7u', 'Paraplux', '../images/avatars/avatar_559974d69958f47e13c90e431eb208722252f9c9.jpg', 'Bouchez', 'Marc', '28', 'Couscous', 'Poulet', 'Le royal', '28', '16,3,4,6,1'),
(2, 'test@test.com', '$2y$10$T190riwpiiU8l5MOoBfQ8.VzjA0A5GJk3UHfpdOqYAH0S8ieSAPNq', 'Pollux', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(3, 'test2@test.com', '$2y$10$t6QylQCaHIjjRpXQ2ub8aeX.CRsi/Ibt8RGGZ.8e4RKfCeUsQv4MC', 'Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `mly_commentaires`
--
ALTER TABLE `mly_commentaires`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `Recettes->Commentaires` (`c_recette_id`),
  ADD KEY `Utilisateurs->Commentaires` (`c_utilisateur_id`);

--
-- Index pour la table `mly_newsletter`
--
ALTER TABLE `mly_newsletter`
  ADD PRIMARY KEY (`n_id`);

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
-- AUTO_INCREMENT pour la table `mly_commentaires`
--
ALTER TABLE `mly_commentaires`
  MODIFY `c_id` int(51) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `mly_newsletter`
--
ALTER TABLE `mly_newsletter`
  MODIFY `n_id` int(51) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `mly_photos`
--
ALTER TABLE `mly_photos`
  MODIFY `p_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `mly_recettes`
--
ALTER TABLE `mly_recettes`
  MODIFY `r_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `mly_tags`
--
ALTER TABLE `mly_tags`
  MODIFY `t_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `mly_utilisateurs`
--
ALTER TABLE `mly_utilisateurs`
  MODIFY `u_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mly_commentaires`
--
ALTER TABLE `mly_commentaires`
  ADD CONSTRAINT `Recettes->Commentaires` FOREIGN KEY (`c_recette_id`) REFERENCES `mly_recettes` (`r_id`),
  ADD CONSTRAINT `Utilisateurs->Commentaires` FOREIGN KEY (`c_utilisateur_id`) REFERENCES `mly_utilisateurs` (`u_id`);

--
-- Contraintes pour la table `mly_photos`
--
ALTER TABLE `mly_photos`
  ADD CONSTRAINT `Recettes->Photos` FOREIGN KEY (`p_recette_id`) REFERENCES `mly_recettes` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
