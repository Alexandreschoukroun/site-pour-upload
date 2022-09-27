-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 27 sep. 2022 à 11:40
-- Version du serveur : 5.7.36
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `donnee`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `IdPersonnel` int(255) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Tel` varchar(255) NOT NULL,
  `Fixe` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  PRIMARY KEY (`IdPersonnel`),
  UNIQUE KEY `Mail` (`Mail`)
) ENGINE=MyISAM AUTO_INCREMENT=8678 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`IdPersonnel`, `Nom`, `Prenom`, `Tel`, `Fixe`, `Mail`) VALUES
(8672, 'Duvi', 'Pascal', '0653524375', '05.53.55.44.33', 'Alexandresch01@hotmail.com'),
(8673, 'Sancho', 'George', '06.43.52.53.75', '05-53-55-44-33', 'PascalObispo@hotmail.com'),
(8674, 'Danne', 'Antoine', '06-43-52-53-75', '0549425363', 'Danne@orange.fr'),
(8675, 'Doe', 'Lucas', '06-43-52-53-75', '0556473629', 'Lucas@hotmail.com'),
(8677, 'bifbif', 'stewart', '06-43-52-53-75', '05.53.55.44.33', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
