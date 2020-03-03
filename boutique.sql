-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 03 mars 2020 à 18:21
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
--
CREATE DATABASE IF NOT EXISTS `boutique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `boutique`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `nomurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT DELAYED INTO `categorie` (`id`, `nom`, `nomurl`) VALUES
(1, 'PC Gamer', 'gamer'),
(2, 'PC Bureautique', 'bureautique'),
(3, 'PC Multimédia', 'multimedia');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produits` int(11) DEFAULT NULL,
  `chemin` varchar(255) DEFAULT NULL,
  `hauteur` int(11) NOT NULL,
  `largeur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT DELAYED INTO `images` (`id`, `id_produits`, `chemin`, `hauteur`, `largeur`) VALUES
(36, 39, '../img/BOrbQEBdeH.jpg', 200, 200),
(34, 37, '../img/zRccMFu8ea.jpg', 200, 200),
(35, 38, '../img/iZEhN5eufX.jpg', 200, 200);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_sous_categorie` int(11) NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT DELAYED INTO `produits` (`id`, `nom`, `id_categorie`, `id_sous_categorie`, `description`, `prix`) VALUES
(37, 'HP Pavillon Gaming', 1, 1, 'Equipé d\'un processeur AMD Ryzen™ 5 3550H (2,1 GHz / 3,7 GHz Boost - Quad-Core) et de 16 Go de mémoire vive DDR4-2400, le pc portable HP Pavilion Gaming 15 vous offre une puissance de traitement efficace pour une utilisation multimédia optimale. Son écran Full HD IPS 144Hz de 15,6 pouces à micro-bords (dalle mate) et sa carte graphique NVIDIA GeForce GTX 1650 4 Go vous délivrent un véritable confort visuel pour jouer à tous vos jeux vidéo préférés.', 700),
(38, 'HP Obelisk', 1, 1, 'Windows 10 Famille 64\r\nProcesseur Intel® Core™ i5-9400F\r\n8 Go de mémoire HyperX® SDRAM\r\n1 To de stockage + 128 Go SSD\r\nCarte graphique NVIDIA® GeForce® GTX 1650 (4 Go de mémoire GDDR5 dédiée)\r\nChassis vitré. Qualité audio DTS Studio Sound™. Solution de refroidissement par air pour processeur.', 950),
(39, 'HP Omen 15', 1, 1, 'Ecran : Full HD IPS anti-reflets micro-bords à rétroéclairage WLED de 39,6 cm (15,6\") de diagonale (1 920 x 1 080). Type d\'alimentation: Adaptateur secteur 150 W\r\nStockage et mémoire : 8 Go de RAM, Hybride (Disque Dur + SSD) 1000 Go + 128 Go\r\nProcesseur : Intel Core i5-8300H (2,3 GHz de fréquence de base, jusqu’à 4 GHz avec technologie Intel Turbo Boost, 8 Mo de mémoire cache, 4 cœurs)\r\nCarte Graphique : Carte NVIDIA GeForce GTX 1050 Ti (4 Go de mémoire GDDR5 dédiée)\r\nConnectivité : 1 port USB 3.1 Type-C ; 3 ports USB 3.1 Gen 1 ; 1 port HDMI\r\nLa vie de la batterie mixé utilisation: Jusqu\'à 6 heures et 15 minutes', 900);

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

DROP TABLE IF EXISTS `sous_categorie`;
CREATE TABLE IF NOT EXISTS `sous_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `chemin` varchar(50) NOT NULL,
  `hauteur` int(11) NOT NULL,
  `largeur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sous_categorie`
--

INSERT DELAYED INTO `sous_categorie` (`id`, `nom`, `chemin`, `hauteur`, `largeur`) VALUES
(1, 'hp', '../img/hp.jpg', 200, 200),
(2, 'asus', '../img/asus.jpg', 200, 200),
(3, 'msi', '../img/msi.jpg', 200, 200);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT DELAYED INTO `utilisateurs` (`id`, `login`, `nom`, `prenom`, `email`, `password`) VALUES
(12, 'Firefou', 'Gonzalez', 'Adrien', 'adrien1361@hotmail.fr', '$2y$12$R9bvoYGcnfMF49LCUuzD1.0DdvWkNRapF5HgecrmRhz0Ec0gYHHWO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
