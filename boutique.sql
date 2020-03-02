-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 02 mars 2020 à 12:26
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
  `id_categorie` int(11) DEFAULT NULL,
  `id_sous_categorie` int(11) DEFAULT NULL,
  `hauteur` int(11) NOT NULL,
  `largeur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT DELAYED INTO `images` (`id`, `id_produits`, `chemin`, `id_categorie`, `id_sous_categorie`, `hauteur`, `largeur`) VALUES
(5, 2, '../img/hpomen_pg.png', 1, 1, 200, 200),
(4, 1, '../img/hpomen_fg.png', 1, 1, 200, 200),
(6, 3, '../img/hppavillon_fg', 1, 1, 200, 230);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT DELAYED INTO `produits` (`id`, `nom`, `id_categorie`, `id_sous_categorie`, `description`, `prix`) VALUES
(1, 'HP Omen Obelisk', 1, 1, 'Processeur AMD Ryzen 7 3700U (2,3 GHz de fréquence de base, jusqu\'à 4 GHz de fréquence de rafale, 4 Mo de mémoire cache, 4 cœurs)\r\n\r\n8 Go de mémoire HyperX SDRAM DDR4-2666\r\nCarte graphique NVIDIA GeForce GTX 1660\r\n\r\nStockage : 1 To SATA + 256 Go SSD PCIe NVMe. Demarrage en quelques secondes, transfert de données et éxperience plus rapide à chaque utilisation.\r\n\r\nAvant : 2 ports USB 3.1; 1 prise combinée casque/microphone.\r\n\r\nArrière : 1 port USB 3.1 Type-C; 4 ports USB 3.1 Gen 1; 1 port USB 3.1 Gen 2, 1 entrée audio; 1 sortie audio; 1 entrée microphone', 960),
(2, 'HP Omen 15', 1, 1, 'Puissant et performant, l\'ordinateur portable HP OMEN 15-dc1056nf dispose de composants de grande qualité qui rendront vos jeux plus immersifs, réels et fluides.\r\n\r\nLes points clés\r\n15,6\" Full HD (39,6 cm) - 2,4 kg\r\nIntel Core i5-9300H : 2,4 GHz ; Turbo 4,1 GHz / 4 coeurs / 8 Mo de mémoire cache\r\nSSD 256 Go\r\nMémoire vive 16 Go\r\nLe + : NVIDIA GeForce RTX2060 avec 6 Go', 950),
(3, 'HP Pavilion Gaming 690-0117nf', 1, 1, 'Le PC de HP est équipé d’un processeur Intel Core i5-9400F avec 8 Go de RAM DDR4. D’un point de vue stockage, il est équipé d\'un HDD de 1 To + SSD 128 Go ainsi que 1 To de Disque Dur. Vous pouvez aisément sauvegarder des fichiers lourds sans vous demander s’il y a assez de place dans le PC. L’ordinateur de HP vous procure une connectivité WiFi et Bluetooth 4.2 mais il possède également un port Ethernet pour une connexion filaire. En toute situation, pour répondre à vos besoins divers, il est équipé de 2 x USB 3.1 type C; 3 x USB 3.1 type A afin de pouvoir connecter vos périphériques externes.\r\nCarte graphique : 1660 gtx', 800);

-- --------------------------------------------------------

--
-- Structure de la table `sous-categorie`
--

DROP TABLE IF EXISTS `sous-categorie`;
CREATE TABLE IF NOT EXISTS `sous-categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `chemin` varchar(50) NOT NULL,
  `hauteur` int(11) NOT NULL,
  `largeur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sous-categorie`
--

INSERT DELAYED INTO `sous-categorie` (`id`, `nom`, `chemin`, `hauteur`, `largeur`) VALUES
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
