-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 06 mars 2020 à 17:56
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
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT DELAYED INTO `images` (`id`, `id_produits`, `chemin`, `hauteur`, `largeur`) VALUES
(41, 44, '../img/UvLTIBDP4m.jpg', 200, 200),
(42, 45, '../img/ETUy6WVeNH.jpg', 200, 200),
(43, 46, '../img/f49Qoh7Xnc.jpg', 200, 200);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_produits` int(11) NOT NULL,
  `quantité` int(11) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT DELAYED INTO `panier` (`id`, `id_utilisateur`, `id_produits`, `quantité`, `prix`) VALUES
(17, 12, 45, 1, 835),
(16, 12, 46, 2, 1500);

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
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT DELAYED INTO `produits` (`id`, `nom`, `id_categorie`, `id_sous_categorie`, `description`, `prix`) VALUES
(46, 'HP Obelisk', 1, 1, 'Le PC de HP est équipé d’un processeur Intel Core i7-9700F et de 16 Go de RAM SSDRAM DDR4. D’un point de vue stockage, il est équipé d\'un disque dur de 1 To et d\'un SSD de 128 Go . Vous pouvez aisément sauvegarder des fichiers lourds sans vous demander s’il y a assez de place dans le PC. L’ordinateur de HP vous procure une connectivité WiFi  mais il possède également un port Ethernet pour une connexion filaire. En toute situation, pour répondre à vos besoins divers, il est équipé de 8 x USB 3.1 afin de pouvoir connecter vos périphériques externes.', 1500),
(45, 'HP Pavillon Gaming', 1, 1, 'Ecran FHD IPS anti-reflets micro-bords à rétroéclairage WLED (1920 x 1080px)\r\nProcesseur Intel Core i5-9300H 4 cœurs\r\nMémoire vive 8 Go SDRAM DDR4\r\nHDD 1 To + SSD 128 Go\r\nNvidia GeForce GTX 1650\r\nSystème d\'exploitation Windows 10\r\nClavier AZERTY avec pavé numérique\r\nWebcam avec microphone\r\nJusqu\'à 10h30 d\'autonomie', 835),
(44, 'HP Omen 15', 1, 1, 'Ecran : Full HD IPS anti-reflets micro-bords à rétroéclairage WLED de 39,6 cm (15,6\") de diagonale (1 920 x 1 080). Type d\'alimentation: Adaptateur secteur 150 W\r\nStockage et mémoire : 8 Go de RAM, Hybride (Disque Dur + SSD) 1000 Go + 128 Go\r\nProcesseur : Intel Core i5-8300H (2,3 GHz de fréquence de base, jusqu’à 4 GHz avec technologie Intel Turbo Boost, 8 Mo de mémoire cache, 4 cœurs)\r\nCarte Graphique : Carte NVIDIA GeForce GTX 1050 Ti (4 Go de mémoire GDDR5 dédiée)\r\nConnectivité : 1 port USB 3.1 Type-C ; 3 ports USB 3.1 Gen 1 ; 1 port HDMI\r\nLa vie de la batterie mixé utilisation: Jusqu\'à 6 heures et 15 minutes', 750);

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
  `grade` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT DELAYED INTO `utilisateurs` (`id`, `login`, `nom`, `prenom`, `email`, `password`, `grade`) VALUES
(12, 'Firefou', 'Gonzalez', 'Adrien', 'adrien1361@hotmail.fr', '$2y$12$R9bvoYGcnfMF49LCUuzD1.0DdvWkNRapF5HgecrmRhz0Ec0gYHHWO', 'utilisateur'),
(15, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$12$ihiKI19eh6qc.jIXzhb.G.nNa6R3FyGEGv6ooDVyM30ucW0ZMtl/W', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
