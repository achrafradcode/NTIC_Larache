-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 fév. 2023 à 03:54
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE database istadb;
use istadb; 


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `istadb`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `idAnnonces` int(11) NOT NULL,
  `titre_Annonces` varchar(45) DEFAULT NULL,
  `date_de_publication` varchar(45) DEFAULT NULL,
  `Membre_IdMembres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `annonces_has_photo`
--

CREATE TABLE `annonces_has_photo` (
  `Annonces_idAnnonces` int(11) NOT NULL,
  `Photo_IdPhoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `articles_d'actualité`
--

CREATE TABLE `articles_d'actualité` (
  `IdArticle` int(11) NOT NULL,
  `titre_de_l'actualité` varchar(45) DEFAULT NULL,
  `contenu` varchar(45) DEFAULT NULL,
  `date_de_publication` varchar(45) DEFAULT NULL,
  `nom_de_l'éditeur` varchar(45) DEFAULT NULL,
  `Membre_IdMembres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `attaché`
--

CREATE TABLE `attaché` (
  `Articles_d'actualité_IdArticle` int(11) NOT NULL,
  `Fichier_idFichier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

CREATE TABLE `authentification` (
  `idAuthentification` int(11) NOT NULL,
  `mot_de_pass` varchar(45) DEFAULT NULL,
  `Membre_IdMembres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE `avoir` (
  `Articles_d'actualité_IdArticle` int(11) NOT NULL,
  `Photo_IdPhoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `champ_horaire`
--

CREATE TABLE `champ_horaire` (
  `IdChampHoraire` int(11) NOT NULL,
  `nom_de_la_matière` varchar(45) DEFAULT NULL,
  `type_de_séance` varchar(45) DEFAULT NULL,
  `Groupe_Stagiaires_code_groupe_Groupe` varchar(11) NOT NULL,
  `Salle_pédagogiquez_IdSalle` int(11) NOT NULL,
  `Membre_IdMembres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `directeur`
--

CREATE TABLE `directeur` (
  `idDirecteur` int(11) NOT NULL,
  `mot_de_pass` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

CREATE TABLE `enseigner` (
  `Membre_IdMembres` int(11) NOT NULL,
  `Groupe_Stagiaires_code_groupe_Groupe` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE `fichier` (
  `idFichier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `groupe_stagiaires`
--

CREATE TABLE `groupe_stagiaires` (
  `code_groupe_Groupe` varchar(11) NOT NULL,
  `symbole_de_groupe` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `IdMembres` int(11) PRIMARY KEY AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `type_d'adhésion` varchar(45) DEFAULT NULL,
  `nom_personnel` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `date_de_naissance` varchar(45) DEFAULT NULL,
  `date_d'inscription` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `numéro_de_téléphone` varchar(45) DEFAULT NULL,
  `nationalité` varchar(45) DEFAULT NULL,
  `sexe` varchar(45) DEFAULT NULL,
  `numéro_de_carte` varchar(45) DEFAULT NULL,
  `CodePostal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`IdMembres`, `password`, `type_d'adhésion`, `nom_personnel`, `date_de_naissance`, `date_d'inscription`, `email`, `adresse`, `numéro_de_téléphone`, `nationalité`, `sexe`, `numéro_de_carte`,`CodePostal`) VALUES
(-1, 'ADMIN', '-1', 'ADMIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--






CREATE TABLE `message` (
  `IdMembres` int(11) NOT NULL,
  `titre_du_message` varchar(45) DEFAULT NULL,
  `mail_de_l'expéditeur` varchar(45) DEFAULT NULL,
  `contenu` varchar(45) DEFAULT NULL,
  `type_du_message` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idNote` int(11) NOT NULL,
  `Unité_de_formation_IdFormation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `IdPhoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `salle_pédagogiquez`
--

CREATE TABLE `salle_pédagogiquez` (
  `IdSalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tableau_des_points`
--

CREATE TABLE `tableau_des_points` (
  `IdTableau_tableau` int(11) NOT NULL,
  `Membre_IdMembres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `unité_de_formation`
--

CREATE TABLE `unité_de_formation` (
  `IdFormation` int(11) NOT NULL,
  `nom_Unité_de_formation` varchar(45) DEFAULT NULL,
  `Tableau_des_points_IdTableau_tableau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`idAnnonces`,`Membre_IdMembres`),
  ADD KEY `fk_Annonces_Membre1_idx` (`Membre_IdMembres`);

--
-- Index pour la table `annonces_has_photo`
--
ALTER TABLE `annonces_has_photo`
  ADD PRIMARY KEY (`Annonces_idAnnonces`,`Photo_IdPhoto`),
  ADD KEY `fk_Annonces_has_Photo_Photo1_idx` (`Photo_IdPhoto`),
  ADD KEY `fk_Annonces_has_Photo_Annonces1_idx` (`Annonces_idAnnonces`);

--
-- Index pour la table `articles_d'actualité`
--
ALTER TABLE `articles_d'actualité`
  ADD PRIMARY KEY (`IdArticle`,`Membre_IdMembres`),
  ADD KEY `fk_Articles_d'actualité_Membre1_idx` (`Membre_IdMembres`);

--
-- Index pour la table `attaché`
--
ALTER TABLE `attaché`
  ADD PRIMARY KEY (`Articles_d'actualité_IdArticle`,`Fichier_idFichier`),
  ADD KEY `fk_attaché_Fichier1_idx` (`Fichier_idFichier`);

--
-- Index pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD PRIMARY KEY (`idAuthentification`,`Membre_IdMembres`),
  ADD KEY `fk_Authentification_Membre1_idx` (`Membre_IdMembres`);

--
-- Index pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD PRIMARY KEY (`Articles_d'actualité_IdArticle`,`Photo_IdPhoto`),
  ADD KEY `fk_avoir_Photo1_idx` (`Photo_IdPhoto`);

--
-- Index pour la table `champ_horaire`
--
ALTER TABLE `champ_horaire`
  ADD PRIMARY KEY (`IdChampHoraire`,`Groupe_Stagiaires_code_groupe_Groupe`,`Salle_pédagogiquez_IdSalle`,`Membre_IdMembres`),
  ADD KEY `fk_Champ_Horaire_Groupe_Stagiaires1_idx` (`Groupe_Stagiaires_code_groupe_Groupe`),
  ADD KEY `fk_Champ_Horaire_Salle_pédagogiquez1_idx` (`Salle_pédagogiquez_IdSalle`),
  ADD KEY `fk_Champ_Horaire_Membre1_idx` (`Membre_IdMembres`);

--
-- Index pour la table `directeur`
--
ALTER TABLE `directeur`
  ADD PRIMARY KEY (`idDirecteur`);

--
-- Index pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD PRIMARY KEY (`Membre_IdMembres`,`Groupe_Stagiaires_code_groupe_Groupe`),
  ADD KEY `fk_enseigner_Membre1_idx` (`Membre_IdMembres`),
  ADD KEY `fk_enseigner_Groupe_Stagiaires1_idx` (`Groupe_Stagiaires_code_groupe_Groupe`);

--
-- Index pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD PRIMARY KEY (`idFichier`);

--
-- Index pour la table `groupe_stagiaires`
--
ALTER TABLE `groupe_stagiaires`
  ADD PRIMARY KEY (`code_groupe_Groupe`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`IdMembres`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`IdMembres`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idNote`,`Unité_de_formation_IdFormation`),
  ADD KEY `fk_Note_Unité_de_formation1_idx` (`Unité_de_formation_IdFormation`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`IdPhoto`);

--
-- Index pour la table `salle_pédagogiquez`
--
ALTER TABLE `salle_pédagogiquez`
  ADD PRIMARY KEY (`IdSalle`);

--
-- Index pour la table `tableau_des_points`
--
ALTER TABLE `tableau_des_points`
  ADD PRIMARY KEY (`IdTableau_tableau`,`Membre_IdMembres`),
  ADD KEY `fk_Tableau_des_points_Membre1_idx` (`Membre_IdMembres`);

--
-- Index pour la table `unité_de_formation`
--
ALTER TABLE `unité_de_formation`
  ADD PRIMARY KEY (`IdFormation`,`Tableau_des_points_IdTableau_tableau`),
  ADD KEY `fk_Unité_de_formation_Tableau_des_points1_idx` (`Tableau_des_points_IdTableau_tableau`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `fk_Annonces_Membre1` FOREIGN KEY (`Membre_IdMembres`) REFERENCES `membre` (`IdMembres`);

--
-- Contraintes pour la table `annonces_has_photo`
--
ALTER TABLE `annonces_has_photo`
  ADD CONSTRAINT `fk_Annonces_has_Photo_Annonces1` FOREIGN KEY (`Annonces_idAnnonces`) REFERENCES `annonces` (`idAnnonces`),
  ADD CONSTRAINT `fk_Annonces_has_Photo_Photo1` FOREIGN KEY (`Photo_IdPhoto`) REFERENCES `photo` (`IdPhoto`);

--
-- Contraintes pour la table `articles_d'actualité`
--
ALTER TABLE `articles_d'actualité`
  ADD CONSTRAINT `fk_Articles_d'actualité_Membre1` FOREIGN KEY (`Membre_IdMembres`) REFERENCES `membre` (`IdMembres`);

--
-- Contraintes pour la table `attaché`
--
ALTER TABLE `attaché`
  ADD CONSTRAINT `fk_attaché_Articles_d'actualité1` FOREIGN KEY (`Articles_d'actualité_IdArticle`) REFERENCES `articles_d'actualité` (`IdArticle`),
  ADD CONSTRAINT `fk_attaché_Fichier1` FOREIGN KEY (`Fichier_idFichier`) REFERENCES `fichier` (`idFichier`);

--
-- Contraintes pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD CONSTRAINT `fk_Authentification_Membre1` FOREIGN KEY (`Membre_IdMembres`) REFERENCES `membre` (`IdMembres`);

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `fk_avoir_Articles_d'actualité1` FOREIGN KEY (`Articles_d'actualité_IdArticle`) REFERENCES `articles_d'actualité` (`IdArticle`),
  ADD CONSTRAINT `fk_avoir_Photo1` FOREIGN KEY (`Photo_IdPhoto`) REFERENCES `photo` (`IdPhoto`);

--
-- Contraintes pour la table `champ_horaire`
--
ALTER TABLE `champ_horaire`
  ADD CONSTRAINT `fk_Champ_Horaire_Groupe_Stagiaires1` FOREIGN KEY (`Groupe_Stagiaires_code_groupe_Groupe`) REFERENCES `groupe_stagiaires` (`code_groupe_Groupe`),
  ADD CONSTRAINT `fk_Champ_Horaire_Membre1` FOREIGN KEY (`Membre_IdMembres`) REFERENCES `membre` (`IdMembres`),
  ADD CONSTRAINT `fk_Champ_Horaire_Salle_pédagogiquez1` FOREIGN KEY (`Salle_pédagogiquez_IdSalle`) REFERENCES `salle_pédagogiquez` (`IdSalle`);

--
-- Contraintes pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD CONSTRAINT `fk_enseigner_Groupe_Stagiaires1` FOREIGN KEY (`Groupe_Stagiaires_code_groupe_Groupe`) REFERENCES `groupe_stagiaires` (`code_groupe_Groupe`),
  ADD CONSTRAINT `fk_enseigner_Membre1` FOREIGN KEY (`Membre_IdMembres`) REFERENCES `membre` (`IdMembres`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_Note_Unité_de_formation1` FOREIGN KEY (`Unité_de_formation_IdFormation`) REFERENCES `unité_de_formation` (`IdFormation`);

--
-- Contraintes pour la table `tableau_des_points`
--
ALTER TABLE `tableau_des_points`
  ADD CONSTRAINT `fk_Tableau_des_points_Membre1` FOREIGN KEY (`Membre_IdMembres`) REFERENCES `membre` (`IdMembres`);

--
-- Contraintes pour la table `unité_de_formation`
--
ALTER TABLE `unité_de_formation`
  ADD CONSTRAINT `fk_Unité_de_formation_Tableau_des_points1` FOREIGN KEY (`Tableau_des_points_IdTableau_tableau`) REFERENCES `tableau_des_points` (`IdTableau_tableau`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
