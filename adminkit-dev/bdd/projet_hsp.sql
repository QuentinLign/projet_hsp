-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 16 déc. 2021 à 17:54
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
-- Base de données :  `projet_hsp`
--

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

DROP TABLE IF EXISTS `conges`;
CREATE TABLE IF NOT EXISTS `conges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `diagnostic`
--

DROP TABLE IF EXISTS `diagnostic`;
CREATE TABLE IF NOT EXISTS `diagnostic` (
  `id` int(10) NOT NULL,
  `id_utilisateurs` int(10) NOT NULL,
  `symptomes` longtext COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `niveau_urgence` varchar(10) COLLATE utf8_bin NOT NULL,
  `id_medec` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ut_diagnostic` (`id_utilisateurs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `doctorspecilization`
--

DROP TABLE IF EXISTS `doctorspecilization`;
CREATE TABLE IF NOT EXISTS `doctorspecilization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist/Obstetrician', '2016-12-28 06:37:25', '0000-00-00 00:00:00'),
(2, 'General Physician', '2016-12-28 06:38:12', '0000-00-00 00:00:00'),
(3, 'Dermatologist', '2016-12-28 06:38:48', '0000-00-00 00:00:00'),
(4, 'Homeopath', '2016-12-28 06:39:26', '0000-00-00 00:00:00'),
(5, 'Ayurveda', '2016-12-28 06:39:51', '0000-00-00 00:00:00'),
(6, 'Dentist', '2016-12-28 06:40:08', '0000-00-00 00:00:00'),
(7, 'Ear-Nose-Throat (Ent) Specialist', '2016-12-28 06:41:18', '0000-00-00 00:00:00'),
(9, 'Demo test', '2016-12-28 07:37:39', '0000-00-00 00:00:00'),
(10, 'Bones Specialist demo', '2017-01-07 08:07:53', '0000-00-00 00:00:00'),
(11, 'Test', '2019-06-23 17:51:06', '2019-06-23 17:55:06'),
(12, 'Dermatologist', '2019-11-10 18:36:36', '2019-11-10 18:36:50');

-- --------------------------------------------------------

--
-- Structure de la table `dossier_admission`
--

DROP TABLE IF EXISTS `dossier_admission`;
CREATE TABLE IF NOT EXISTS `dossier_admission` (
  `id` int(10) NOT NULL,
  `id_utilisateurs` int(10) NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse_postale` varchar(40) COLLATE utf8_bin NOT NULL,
  `mutuelle` varchar(40) COLLATE utf8_bin NOT NULL,
  `numero_secu` int(40) NOT NULL,
  `option` varchar(40) COLLATE utf8_bin NOT NULL,
  `regime_specifique` varchar(40) COLLATE utf8_bin NOT NULL,
  `id_medecins` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateurs` (`id_utilisateurs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `doctor`, `start_event`, `end_event`) VALUES
(9, 'ob', 'rty', '2021-12-13 00:00:00', '2021-12-15 00:00:00'),
(10, 'jh', 'jhg', '2021-12-19 00:00:00', '2021-12-23 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

DROP TABLE IF EXISTS `rendezvous`;
CREATE TABLE IF NOT EXISTS `rendezvous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8_bin NOT NULL,
  `prenom` text COLLATE utf8_bin NOT NULL,
  `doctorSpecilization` varchar(255) COLLATE utf8_bin NOT NULL,
  `doctor` varchar(255) COLLATE utf8_bin NOT NULL,
  `RDVdate` varchar(255) COLLATE utf8_bin NOT NULL,
  `RDVheure` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`id`, `nom`, `prenom`, `doctorSpecilization`, `doctor`, `RDVdate`, `RDVheure`) VALUES
(1, 'jam', 'jam', 'Gynecologist/Obstetrician', 'ty', '2021-12-02', '19:16'),
(2, 'yo', 'man', 'Homeopath', 'ty', '2021-12-01', '21:03'),
(3, 'yo', 'man', 'Homeopath', 'ty', '2021-12-01', '21:03'),
(4, 'tr', 'tr', 'Ayurveda', 'ty', '2021-12-01', '21:08'),
(5, 'tr', 'tan', 'Homeopath', 'az', '2021-12-05', '13:11'),
(6, 'za', 'tan', 'Ayurveda', 'az', '2021-12-05', '13:14'),
(7, 'thanos', 'op', 'Ayurveda', 'az', '', ''),
(8, 'thanos', 'er', 'Dermatologist', 'az', '2021-12-05', '13:36'),
(9, 'tr', 'er', 'Dermatologist', 'az', '2021-12-05', '16:53'),
(10, 'défdezfz', 'fezsfezf', 'Dermatologist', 'ze', '0048-08-04', '03:21'),
(11, 'dzezces', 'efcezsd', 'Demo test', 'ze', '2021-12-07', '15:11'),
(12, 'ferfer', 'defefef', 'Ayurveda', 'ze', '0099-08-04', '23:01'),
(13, 'thanos', 'tr', 'Homeopath', 'ze', '2021-12-09', '11:39'),
(14, 'aezdfd', 'zasdef', 'Gynecologist/Obstetrician', 'ze', '2021-12-09', '14:52'),
(15, 'za', 'az', 'Homeopath', 'ze', '2021-12-15', '11:02'),
(16, 'jam', 'za', 'Homeopath', 'ze', '2021-12-16', '18:56');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(40) COLLATE utf8_bin NOT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(40) COLLATE utf8_bin NOT NULL,
  `specialite` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `date_connexion` date DEFAULT NULL,
  `role` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `verif` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `specialite`, `date_connexion`, `role`, `verif`) VALUES
(35, 'ty', 'ty', 'ty@gmail.com', '32ad247f77b8a066ef05467ce49a5a63e193c3a3', NULL, '2021-12-16', 'ADMIN', 1),
(53, 'az', 'az', 'q.lignani@lprs.fr', '90283840d90de49b8e7984bd99b47fee0d4bd50d', NULL, '2021-12-16', 'PAT', 1),
(57, 'ze', 'ze', 'ze@gmail.com', '2a30b5bdc3f31b44f61058b96e9994e1e4f7fbfe', NULL, '2021-12-16', 'MED', 1),
(58, 'ae', 'az', 'ibrayoman02@gmail.com', '90283840d90de49b8e7984bd99b47fee0d4bd50d', NULL, NULL, 'PAT', 1),
(59, 'ae', 'az', 'tr@gmail.com', 'eb4ac3033e8ab3591e0fcefa8c26ce3fd36d5a0f', NULL, NULL, 'PAT', 1),
(65, 'azedfg', 'azsdfv', 'sf@gmail.com', '90283840d90de49b8e7984bd99b47fee0d4bd50d', NULL, NULL, 'PAT', 1),
(66, 'az', 'az', 'az@az.gmail.com', '90283840d90de49b8e7984bd99b47fee0d4bd50d', NULL, '2021-12-09', 'PAT', 1),
(67, 'az', 'az', 'az@az2.gmail.com', '90283840d90de49b8e7984bd99b47fee0d4bd50d', NULL, NULL, 'PAT', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
