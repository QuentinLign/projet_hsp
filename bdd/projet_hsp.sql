-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 02 nov. 2021 à 12:25
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_hsp`
--

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
-- Structure de la table `rendez-vous`
--

DROP TABLE IF EXISTS `rendez-vous`;
CREATE TABLE IF NOT EXISTS `rendez-vous` (
  `id` int(10) NOT NULL,
  `id_utilisateurs` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `heure` int(10) NOT NULL,
  `salle` varchar(10) COLLATE utf8_bin NOT NULL,
  `id_medecins` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ut` (`id_utilisateurs`),
  KEY `id_medecin` (`id_medecins`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `urgentiste`
--

DROP TABLE IF EXISTS `urgentiste`;
CREATE TABLE IF NOT EXISTS `urgentiste` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `specialite` varchar(30) NOT NULL,
  `etat_compte` int(1) NOT NULL,
  `derniere_connexion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `specialite`, `date_connexion`, `role`, `verif`) VALUES
(19, 'lignani', 'quentin', 'qlignani@gmail.com', '9b183a6a84378eafd2d748a179a7d5db0198f407', NULL, NULL, NULL, 0),
(21, 'lignani', 'quentin', 'q.l@lprs.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL, NULL, 1),
(22, 'qq', 'qqqqqq', 'qqqqq@qq.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL, NULL, 1),
(23, 'qq', 'qq', 'qll@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL, NULL, 1),
(24, 'qq', 'qq', 'qqqqqq@qq.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL, NULL, 1),
(25, 'qq', 'qq', 'qqql@gg.coom', '7b52009b64fd0a2a49e6d8a939753077792b0554', NULL, NULL, NULL, 1),
(26, 'qqq', 'qq', 'qqqqp@qq.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL, NULL, 1),
(30, 'qq', 'qqq', 'qq@qq.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL, NULL, 1),
(31, 'LIGNANI', 'Quentin', 'q.lignani@lprs.fr', '7de5598d66ec38e16a93845a47e8dec369fd42bc', NULL, NULL, 'ADMIN', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rendez-vous`
--
ALTER TABLE `rendez-vous`
  ADD CONSTRAINT `id_medecin` FOREIGN KEY (`id_medecins`) REFERENCES `medecin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
