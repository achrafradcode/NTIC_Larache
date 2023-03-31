-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 31 mars 2023 à 21:44
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gamesdb`
--
CREATE DATABASE IF NOT EXISTS `gamesdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gamesdb`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cat_links`
--

CREATE TABLE `cat_links` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `gameid` smallint(5) UNSIGNED NOT NULL,
  `categoryid` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `createddate` date NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` mediumtext CHARACTER SET utf8 NOT NULL,
  `instructions` mediumtext CHARACTER SET utf8 NOT NULL,
  `category` text CHARACTER SET utf8 NOT NULL,
  `source` text NOT NULL,
  `thumb_1` text NOT NULL,
  `thumb_2` text NOT NULL,
  `url` text NOT NULL,
  `width` text NOT NULL,
  `height` text NOT NULL,
  `tags` text NOT NULL,
  `views` int(11) NOT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL,
  `slug` varchar(30) NOT NULL,
  `data` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `loginlogs`
--

CREATE TABLE `loginlogs` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `IpAddress` varbinary(16) NOT NULL,
  `TryTime` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `createddate` date NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` mediumtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'root', '$2y$10$b4mRBfcbwEkuIiZK7lQ6NenS42BYxPOLnYeNfC9R.1HZ5tQ3AS1om', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cat_links`
--
ALTER TABLE `cat_links`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `loginlogs`
--
ALTER TABLE `loginlogs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cat_links`
--
ALTER TABLE `cat_links`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `loginlogs`
--
ALTER TABLE `loginlogs`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Base de données : `gestionproduit_v2`
--
CREATE DATABASE IF NOT EXISTS `gestionproduit_v2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gestionproduit_v2`;
--
-- Base de données : `gesto_immo`
--
CREATE DATABASE IF NOT EXISTS `gesto_immo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gesto_immo`;

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `ID_COMMUNE` int(11) NOT NULL,
  `NOM_COMMUNE` varchar(55) DEFAULT NULL,
  `DISTANCE_AGENCE` varchar(55) DEFAULT NULL,
  `NOMBRE_D_HASTANTS` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `individu`
--

CREATE TABLE `individu` (
  `N_IDENTIFICATION` int(11) NOT NULL,
  `N__LOGEMENT` int(11) DEFAULT NULL,
  `NOM` varchar(55) DEFAULT NULL,
  `PRENOM` varchar(55) DEFAULT NULL,
  `DATE_DE_NAISSANCE` date DEFAULT NULL,
  `N_TELEPHONE` varchar(55) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `N__LOGEMENT` int(11) NOT NULL,
  `TYPE_LOGEMENT` int(11) DEFAULT NULL,
  `ID_QUARTIER` int(11) DEFAULT NULL,
  `No` varchar(55) DEFAULT NULL,
  `RUE` varchar(55) DEFAULT NULL,
  `SUPERFICIE` varchar(55) DEFAULT NULL,
  `LOYER` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `quartier`
--

CREATE TABLE `quartier` (
  `ID_QUARTIER` int(11) NOT NULL,
  `ID_COMMUNE` int(11) DEFAULT NULL,
  `LIBELLE_QUARTER` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `type_de_logement`
--

CREATE TABLE `type_de_logement` (
  `TYPE_LOGEMENT` int(11) NOT NULL,
  `CHARGES_FORFAUTRES` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`ID_COMMUNE`);

--
-- Index pour la table `individu`
--
ALTER TABLE `individu`
  ADD PRIMARY KEY (`N_IDENTIFICATION`),
  ADD KEY `pk_LOGEMENT` (`N__LOGEMENT`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`N__LOGEMENT`),
  ADD KEY `pk_TYPE_LOGEMENT` (`TYPE_LOGEMENT`),
  ADD KEY `pk_ID_QUARTIER` (`ID_QUARTIER`);

--
-- Index pour la table `quartier`
--
ALTER TABLE `quartier`
  ADD PRIMARY KEY (`ID_QUARTIER`),
  ADD KEY `pk_ID_COMMUNE` (`ID_COMMUNE`);

--
-- Index pour la table `type_de_logement`
--
ALTER TABLE `type_de_logement`
  ADD PRIMARY KEY (`TYPE_LOGEMENT`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `individu`
--
ALTER TABLE `individu`
  ADD CONSTRAINT `pk_LOGEMENT` FOREIGN KEY (`N__LOGEMENT`) REFERENCES `logement` (`N__LOGEMENT`);

--
-- Contraintes pour la table `logement`
--
ALTER TABLE `logement`
  ADD CONSTRAINT `pk_ID_QUARTIER` FOREIGN KEY (`ID_QUARTIER`) REFERENCES `quartier` (`ID_QUARTIER`),
  ADD CONSTRAINT `pk_TYPE_LOGEMENT` FOREIGN KEY (`TYPE_LOGEMENT`) REFERENCES `type_de_logement` (`TYPE_LOGEMENT`);

--
-- Contraintes pour la table `quartier`
--
ALTER TABLE `quartier`
  ADD CONSTRAINT `pk_ID_COMMUNE` FOREIGN KEY (`ID_COMMUNE`) REFERENCES `commune` (`ID_COMMUNE`);
--
-- Base de données : `infoshop`
--
CREATE DATABASE IF NOT EXISTS `infoshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `infoshop`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` varchar(4) NOT NULL,
  `denomination` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `denomination`, `description`) VALUES
('cat1', 'ordinateur portable', 'Chez InfoShop Des ordinateurs 9 pouces à 17 pouces, tous les utilisateurs d\'ordinateurs portables seront ravis par les différents modèles Windows, Linux ou Macintosh, proposés par InfoShop'),
('cat2', 'ordinateur bureau', 'Il y en a pour tous les goûts, les gamers y trouveront leur bonheur avec les Desktop Gamer, les familles seront ravies d\'utiliser des ordinateurs de bureau All in One et les professionnels du graphisme, de l\'architecture, du montage vidéo seront satisfaits de leur iMac'),
('cat3', 'Accessoires', '');

-- --------------------------------------------------------

--
-- Structure de la table `compteproprietaire`
--

CREATE TABLE `compteproprietaire` (
  `loginProp` varchar(10) NOT NULL,
  `motPasse` varchar(10) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compteproprietaire`
--

INSERT INTO `compteproprietaire` (`loginProp`, `motPasse`, `nom`, `prenom`) VALUES
('prop', '123', 'KADIRI', 'ALI');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `reference` int(11) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL,
  `prixUnitaire` decimal(10,0) DEFAULT NULL,
  `dateAchat` date DEFAULT NULL,
  `photoProduit` text DEFAULT NULL,
  `idCategorie` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `compteproprietaire`
--
ALTER TABLE `compteproprietaire`
  ADD PRIMARY KEY (`loginProp`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`reference`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `reference` int(11) NOT NULL AUTO_INCREMENT;
--
-- Base de données : `istadb`
--
CREATE DATABASE IF NOT EXISTS `istadb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `istadb`;

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

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`idAnnonces`, `titre_Annonces`, `date_de_publication`, `Membre_IdMembres`) VALUES
(0, ' dddddddddddddddddddddddddddddddddddddddddddd', '2023-02-25', -1),
(2, ' dazdazd', '2023-02-08', -1);

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
  `Description` varchar(255) NOT NULL,
  `contenu` text DEFAULT NULL,
  `date_de_publication` varchar(45) DEFAULT NULL,
  `IdPhoto` int(45) DEFAULT NULL,
  `Membre_IdMembres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles_d'actualité`
--

INSERT INTO `articles_d'actualité` (`IdArticle`, `titre_de_l'actualité`, `Description`, `contenu`, `date_de_publication`, `IdPhoto`, `Membre_IdMembres`) VALUES
(15, 'Article 1', 'adadadadadadad', '', '2023-03-20', 37, -1);

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

--
-- Déchargement des données de la table `enseigner`
--

INSERT INTO `enseigner` (`Membre_IdMembres`, `Groupe_Stagiaires_code_groupe_Groupe`) VALUES
(6, 'DWFS-201'),
(7, '');

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE `fichier` (
  `idFichier` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichier`
--

INSERT INTO `fichier` (`idFichier`, `url`) VALUES
(24, 'uploads%2F1-NOTIONS-DE-MATHEMATIQUES-APPLIQUEES-A-LINFORMATIQUE.pdf'),
(25, 'uploads%2F2019-02-AMEP-Instructional-Strategies-Wempe-FR.pdf'),
(32, 'uploads%2Farchipc_ancien.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `groupe_stagiaires`
--

CREATE TABLE `groupe_stagiaires` (
  `code_groupe_Groupe` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe_stagiaires`
--

INSERT INTO `groupe_stagiaires` (`code_groupe_Groupe`) VALUES
('DWFS-201'),
('DWFS-202'),
('GWS-101');

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `idlog` int(11) NOT NULL,
  `Time` date NOT NULL,
  `Category` varchar(255) NOT NULL,
  `MembreId` int(11) NOT NULL,
  `Event` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logs`
--

INSERT INTO `logs` (`idlog`, `Time`, `Category`, `MembreId`, `Event`) VALUES
(1, '2023-03-31', 'Membres', -1, 'le membre <b>ijazid</b> a été mis à jour'),
(2, '2023-03-31', 'Tablau des Notes', -1, 'le emploi de temp de group stagiaires <b>{DWFS-201}</b> a été ajouter'),
(3, '2023-03-31', 'Tablau des Notes', -1, 'le emploi de temp de group stagiaires <b>{DWFS-201}</b> a été ajouter'),
(4, '2023-03-31', 'Tablau des Notes', -1, 'le emploi de temp de group stagiaires <b>{DWFS-201}</b> a été ajouter'),
(5, '2023-03-31', 'Tablau des Notes', -1, 'le emploi de temp de group stagiaires <b>{DWFS-201}</b> a été ajouter'),
(6, '2023-03-31', 'Tablau des Notes', -1, 'le emploi de temp de group stagiaires <b>{DWFS-201}</b> a été ajouter'),
(7, '2023-03-31', 'Tablau des Notes', -1, 'le emploi de temp de group stagiaires <b>{GWS-101}</b> a été ajouter'),
(8, '2023-03-31', 'Tablau des Notes', -1, 'le emploi de temp de group stagiaires <b>{DWFS-201}</b> a été channger');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `IdMembres` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type_d'adhésion` varchar(45) DEFAULT NULL,
  `SecteurProfessionnel` int(11) NOT NULL,
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

INSERT INTO `membre` (`IdMembres`, `password`, `type_d'adhésion`, `SecteurProfessionnel`, `nom_personnel`, `prenom`, `date_de_naissance`, `date_d'inscription`, `email`, `adresse`, `numéro_de_téléphone`, `nationalité`, `sexe`, `numéro_de_carte`, `CodePostal`) VALUES
(-1, 'ADMIN', '-1', 0, 'ADMIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'cr7JlPjx', '1', 0, 'EE', 'Soufian', '2010-04-19', '84992-02-01', 'ajdaojd@adjaidja', 'E', '0187788', 'Angola', 'H', 'OJOAJ', 'E'),
(7, '5F0jYDU0', '2', 1, 'ijazid', 'direct', '0123-04-12', '49821-08-21', 'Ojaoj@oajzeijza', 'aizdiazj', '00880', 'Select Country', 'H', 'aozdoaj1', 'izadjaiz');

--
-- Déclencheurs `membre`
--
DELIMITER $$
CREATE TRIGGER `InsertTableDesNotes` AFTER INSERT ON `membre` FOR EACH ROW INSERT INTO tableau_des_points (Membre_IdMembres) VALUES (NEW.IdMembres)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `IdMessage` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `type_du_message` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`IdMessage`, `nom`, `mail`, `contenu`, `type_du_message`) VALUES
(8, 'Achraf', 'achrafe@hotmail.fr', 'dadazdazdada', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idNote` int(11) NOT NULL,
  `nomber` float NOT NULL,
  `index` int(11) NOT NULL,
  `Unité_de_formation_IdFormation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`idNote`, `nomber`, `index`, `Unité_de_formation_IdFormation`) VALUES
(8, 14, 0, 8),
(9, 12, 0, 8),
(10, 15, 0, 8),
(11, 18, 0, 9),
(12, 17, 0, 9);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `IdPhoto` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`IdPhoto`, `url`) VALUES
(10, 'G%3A%5COFPPT%5CPFE%5CNTIC_Larache%5Cinc%5Cuploads%2F1601++++420663031.jpg'),
(14, 'G%3A%5COFPPT%5CPFE%5CNTIC_Larache%5Cinc%5Cuploads%2FAL.png'),
(15, 'G%3A%5COFPPT%5CPFE%5CNTIC_Larache%5Cinc%5Cuploads%2FAluminium.jpg'),
(37, 'uploads%2FPhoto_AI_Cat_Surfing.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `salle_pédagogiquez`
--

CREATE TABLE `salle_pédagogiquez` (
  `IdSalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tablaux_pdf`
--

CREATE TABLE `tablaux_pdf` (
  `idTablaux` int(11) NOT NULL,
  `GroupStagiaire` varchar(255) NOT NULL,
  `IdFichierPDF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tablaux_pdf`
--

INSERT INTO `tablaux_pdf` (`idTablaux`, `GroupStagiaire`, `IdFichierPDF`) VALUES
(5, 'DWFS-201', 25),
(6, 'GWS-101', 32);

-- --------------------------------------------------------

--
-- Structure de la table `tableau_des_points`
--

CREATE TABLE `tableau_des_points` (
  `IdTableau_tableau` int(11) NOT NULL,
  `Membre_IdMembres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tableau_des_points`
--

INSERT INTO `tableau_des_points` (`IdTableau_tableau`, `Membre_IdMembres`) VALUES
(8, 6);

-- --------------------------------------------------------

--
-- Structure de la table `unité_de_formation`
--

CREATE TABLE `unité_de_formation` (
  `IdFormation` int(11) NOT NULL,
  `nom_Unité_de_formation` varchar(45) DEFAULT NULL,
  `Tableau_des_points_IdTableau_tableau` int(11) NOT NULL,
  `index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `unité_de_formation`
--

INSERT INTO `unité_de_formation` (`IdFormation`, `nom_Unité_de_formation`, `Tableau_des_points_IdTableau_tableau`, `index`) VALUES
(8, 'TDI_2', 8, 0),
(9, 'TDI_3', 8, 0);

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
  ADD PRIMARY KEY (`idFichier`),
  ADD UNIQUE KEY `ck_unique` (`url`);

--
-- Index pour la table `groupe_stagiaires`
--
ALTER TABLE `groupe_stagiaires`
  ADD PRIMARY KEY (`code_groupe_Groupe`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`idlog`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`IdMembres`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`IdMessage`);

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
  ADD PRIMARY KEY (`IdPhoto`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Index pour la table `salle_pédagogiquez`
--
ALTER TABLE `salle_pédagogiquez`
  ADD PRIMARY KEY (`IdSalle`);

--
-- Index pour la table `tablaux_pdf`
--
ALTER TABLE `tablaux_pdf`
  ADD PRIMARY KEY (`idTablaux`);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `idAnnonces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `annonces_has_photo`
--
ALTER TABLE `annonces_has_photo`
  MODIFY `Annonces_idAnnonces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `articles_d'actualité`
--
ALTER TABLE `articles_d'actualité`
  MODIFY `IdArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `attaché`
--
ALTER TABLE `attaché`
  MODIFY `Articles_d'actualité_IdArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `authentification`
--
ALTER TABLE `authentification`
  MODIFY `idAuthentification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `avoir`
--
ALTER TABLE `avoir`
  MODIFY `Articles_d'actualité_IdArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `champ_horaire`
--
ALTER TABLE `champ_horaire`
  MODIFY `IdChampHoraire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `directeur`
--
ALTER TABLE `directeur`
  MODIFY `idDirecteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `enseigner`
--
ALTER TABLE `enseigner`
  MODIFY `Membre_IdMembres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `fichier`
--
ALTER TABLE `fichier`
  MODIFY `idFichier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `IdMembres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `IdMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `IdPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `salle_pédagogiquez`
--
ALTER TABLE `salle_pédagogiquez`
  MODIFY `IdSalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tablaux_pdf`
--
ALTER TABLE `tablaux_pdf`
  MODIFY `idTablaux` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tableau_des_points`
--
ALTER TABLE `tableau_des_points`
  MODIFY `IdTableau_tableau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `unité_de_formation`
--
ALTER TABLE `unité_de_formation`
  MODIFY `IdFormation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Base de données : `lilyadelices`
--
CREATE DATABASE IF NOT EXISTS `lilyadelices` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lilyadelices`;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `contactId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `nationality` varchar(11) DEFAULT NULL,
  `shippingId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`customerId`, `firstname`, `lastname`, `nationality`, `shippingId`) VALUES
(4, 'Raddah ', 'Achraf', 'AF', 10),
(5, 'c', 'a', 'AF', 21),
(6, 'qsd', 'qsdq', 'AF', 22),
(7, 'Raddah ', 'a', 'DO', 23),
(8, 'Achraf', 'Raddah', 'MA', 24);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `countity` int(10) DEFAULT NULL,
  `initiateDate` date DEFAULT NULL,
  `shippingId` int(11) DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`OrderId`, `productId`, `countity`, `initiateDate`, `shippingId`, `customerId`) VALUES
(4, 2, 1, '2022-06-20', 10, 4),
(5, 2, 1, '2022-06-20', 17, -1),
(6, 2, 1, '2022-06-20', 18, -1),
(7, 2, 1, '2022-06-20', 19, -1),
(8, 2, 1, '2022-06-20', 20, -1),
(9, 2, 1, '2022-06-20', 21, 5),
(10, 2, 1, '2022-06-20', 22, 6),
(11, 1, 1, '2022-06-20', 23, 7),
(12, 10, 2, '2022-06-20', 24, 8),
(13, 3, 2, '2022-06-20', 24, 8),
(14, 25, 5, '2022-06-20', 24, 8);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `imgLink` varchar(255) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `cost` float NOT NULL DEFAULT 0,
  `stockCount` int(11) NOT NULL DEFAULT 0,
  `mass` float DEFAULT NULL,
  `tempreture` float DEFAULT NULL,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`productId`, `imgLink`, `name`, `cost`, `stockCount`, `mass`, `tempreture`, `category`) VALUES
(1, 'img/Patissrie/pat01.jpg', 'Barry Red Cake', 25, 216, 1230, -18, 0),
(2, 'img/Patissrie/pat02.jpg', 'Carrot Cake', 30, 215, 2350, -18, 0),
(3, 'img/Patissrie/pat03.jpg', 'Berry White Cake', 25, 215, 1250, -18, 0),
(4, 'img/Patissrie/pat04.jpg', 'Red Valvet Cake', 25, 215, 1900, -18, 0),
(5, 'img/Patissrie/pat05.jpg', 'Mango Passion Cake', 30, 215, 1320, -18, 0),
(6, 'img/Patissrie/pat06.jpg', 'Honey Cake', 25, 215, 1700, -18, 0),
(7, 'img/Patissrie/pat07.jpg', 'Yuzu Cake', 25, 215, 1500, -18, 0),
(8, 'img/Patissrie/pat08.jpg', 'Matcha Tea Cake', 25, 215, 1250, -18, 0),
(9, 'img/Patissrie/pat09.jpg', 'Chales Grey Cake', 25, 215, 1450, -18, 0),
(10, 'img/Patissrie/pat28.jpg', 'White Chocolate Cheesecake Prague', 10, 288, 1200, -18, 1),
(11, 'img/Patissrie/pat29.jpg', 'Dark Cheesecake', 15, 260, 1600, -18, 1),
(12, 'img/Patissrie/pat30.jpg', 'Strawberry Marble Cheesecake', 15, 52, 1600, -18, 1),
(13, 'img/Patissrie/pat31.jpg', 'Salted Caramel Marble Cheesecake', 10, 288, 1600, -18, 1),
(14, 'img/Patissrie/pat32.jpg', 'Lemon Marble Cheesecake', 15, 52, 1600, -18, 1),
(15, 'img/Patissrie/pat33.jpg', 'Blueberry Marble Cheesecake', 15, 260, 1600, -18, 1),
(16, 'img/Patissrie/pat34.jpg', 'Choco Marble Cheesecake', 10, 52, 1600, -18, 1),
(17, 'img/Patissrie/pat35.jpg', 'Raspberry Marble Cheesecake', 15, 288, 1600, -18, 1),
(18, 'img/Patissrie/pat36.jpg', 'Target Cappuccino Choco Cheesecake', 15, 215, 1800, -18, 1),
(19, 'img/Patissrie/pat57.jpg', 'Apple Cinnamon Muffin', 2.5, 512, 130, -18, 2),
(20, 'img/Patissrie/pat58.jpg', 'Blueberry Muffin', 2.5, 451, 130, -18, 2),
(21, 'img/Patissrie/pat59.jpg', 'Cherry Almond Muffin', 2.5, 252, 130, -18, 2),
(22, 'img/Patissrie/pat60.jpg', 'Chocolate Muffin', 2.5, 525, 130, -18, 2),
(23, 'img/Patissrie/pat61.jpg', 'Vanilla Muffin', 2.5, 42, 130, -18, 2),
(24, 'img/Patissrie/pat62.jpg', 'Caramel Muffin', 2.5, 215, 130, -18, 2),
(25, 'img/Patissrie/pat63.jpg', 'Spice & Raisins Muffin', 2.5, 521, 130, -18, 2),
(26, 'img/Patissrie/pat64.jpg', 'Red Valvet Muffin', 2.5, 215, 130, -18, 2);

-- --------------------------------------------------------

--
-- Structure de la table `productsreviews`
--

CREATE TABLE `productsreviews` (
  `reviewId` int(11) NOT NULL,
  `starRange` int(11) DEFAULT NULL,
  `reviewDesc` varchar(250) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `productsreviews`
--

INSERT INTO `productsreviews` (`reviewId`, `starRange`, `reviewDesc`, `productId`) VALUES
(1, 3, 'Comment_1', 1),
(2, 4, 'Comment_1', 2),
(3, 5, 'Comment_1', 3),
(4, 5, 'Comment_1', 4),
(5, 5, 'Comment_1', 5),
(6, 5, 'Comment_1', 6),
(7, 4, 'Comment_1', 7),
(8, 4, 'Comment_1', 8),
(9, 4, 'Comment_1', 9),
(10, 3, 'Comment_1', 10),
(11, 3, 'Comment_1', 11),
(12, 3, 'Comment_1', 12),
(13, 3, 'Comment_1', 13),
(14, 3, 'Comment_1', 14),
(15, 3, 'Comment_1', 15),
(16, 3, 'Comment_1', 16),
(17, 3, 'Comment_1', 17),
(18, 3, 'Comment_1', 18),
(19, 3, 'Comment_1', 19),
(20, 3, 'Comment_1', 20),
(21, 3, 'Comment_1', 21),
(22, 3, 'Comment_1', 22),
(23, 3, 'Comment_1', 23),
(24, 4, 'Comment_1', 24),
(25, 4, 'Comment_1', 25),
(26, 4, 'Comment_1', 26),
(27, 3, 'Comment_2', 1),
(28, 7, 'Comment_2', 2),
(29, 7, 'Comment_2', 3),
(30, 7, 'Comment_2', 4),
(31, 7, 'Comment_2', 5),
(32, 7, 'Comment_2', 6),
(33, 4, 'Comment_2', 7),
(34, 4, 'Comment_2', 8),
(35, 4, 'Comment_2', 9),
(36, 3, 'Comment_2', 10),
(37, 3, 'Comment_2', 11),
(38, 3, 'Comment_2', 12),
(39, 4, 'Comment_2', 13),
(40, 4, 'Comment_2', 14),
(41, 4, 'Comment_2', 15),
(42, 4, 'Comment_2', 16),
(43, 4, 'Comment_2', 17),
(44, 4, 'Comment_2', 18),
(45, 4, 'Comment_2', 19),
(46, 4, 'Comment_2', 20),
(47, 4, 'Comment_2', 21),
(48, 4, 'Comment_2', 22),
(49, 3, 'Comment_2', 23),
(50, 4, 'Comment_2', 24),
(51, 4, 'Comment_2', 25),
(52, 4, 'Comment_2', 26),
(53, 3, 'Comment_3', 1),
(54, 4, 'Comment_3', 2),
(55, 5, 'Comment_3', 3),
(56, 5, 'Comment_3', 4),
(57, 5, 'Comment_3', 5),
(58, 5, 'Comment_3', 6),
(59, 4, 'Comment_3', 7),
(60, 4, 'Comment_3', 8),
(61, 4, 'Comment_3', 9),
(62, 3, 'Comment_3', 10),
(63, 5, 'Comment_3', 11),
(64, 5, 'Comment_3', 12),
(65, 5, 'Comment_3', 13),
(66, 5, 'Comment_3', 14),
(67, 5, 'Comment_3', 15),
(68, 5, 'Comment_3', 16),
(69, 5, 'Comment_3', 17),
(70, 5, 'Comment_3', 18),
(71, 5, 'Comment_3', 19),
(72, 5, 'Comment_3', 20),
(73, 5, 'Comment_3', 21),
(74, 5, 'Comment_3', 22),
(75, 5, 'Comment_3', 23),
(76, 5, 'Comment_3', 24),
(77, 5, 'Comment_3', 25),
(78, 5, 'Comment_3', 26);

-- --------------------------------------------------------

--
-- Structure de la table `shippingadresses`
--

CREATE TABLE `shippingadresses` (
  `shippingId` int(11) NOT NULL,
  `country` int(11) DEFAULT NULL,
  `shippingAddress` varchar(255) DEFAULT NULL,
  `codePostal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `shippingadresses`
--

INSERT INTO `shippingadresses` (`shippingId`, `country`, `shippingAddress`, `codePostal`) VALUES
(10, 0, 'HEY', 42),
(11, 0, 'HEY', 24),
(12, 0, 'HEY', 24),
(13, 0, 'HEY', 24),
(14, 0, 'HEY', 24),
(15, 0, 'HEY', 24),
(16, 0, 'HEY', 24),
(17, 0, 'HEY', 24),
(18, 0, 'HEY', 24),
(19, 0, 'HEY', 24),
(20, 0, 'HEY', 24),
(21, 0, 'dq', 312),
(22, 0, 'HEY', 123),
(23, 0, 'HEY', 421),
(24, 0, 'hay marche verte', 92150);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contactId`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Index pour la table `productsreviews`
--
ALTER TABLE `productsreviews`
  ADD PRIMARY KEY (`reviewId`);

--
-- Index pour la table `shippingadresses`
--
ALTER TABLE `shippingadresses`
  ADD PRIMARY KEY (`shippingId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `productsreviews`
--
ALTER TABLE `productsreviews`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `shippingadresses`
--
ALTER TABLE `shippingadresses`
  MODIFY `shippingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Base de données : `ouazdb`
--
CREATE DATABASE IF NOT EXISTS `ouazdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ouazdb`;

-- --------------------------------------------------------

--
-- Structure de la table `gameinfo`
--

CREATE TABLE `gameinfo` (
  `gameId` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `videourl` varchar(255) DEFAULT NULL,
  `imgurl` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `gameinfo`
--

INSERT INTO `gameinfo` (`gameId`, `name`, `videourl`, `imgurl`, `url`) VALUES
(1, 'Adventure Miner', '/images/Games/adventureMiner.mp4', '/images/Games/adventureMiner.jpg', 'https://www.crazygames.fr/embed/adventure-miner'),
(2, 'Weave', '/images/Games/Weave.mp4', '/images/Games/Weave.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/weave/index.html'),
(3, 'Drive Space', '/images/Games/DriveSpace.mp4', '/images/Games/DriveSpace.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/drive-space/index.html'),
(4, 'Cross That Road', '/images/Games/CrossThatRoad.mp4', '/images/Games/CrossRoad.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/cross-that-road/index.html'),
(5, 'Tower Boxer', '/images/Games/TowerBox.mp4', '/images/Games/TowerBox.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/tower-boxer/index.html'),
(6, 'Factory Rush', '/images/Games/FactoryRush.mp4', '/images/Games/FactoryRush.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/factory-rush/index.html'),
(7, 'WormBird', '/images/Games/WormBird.mp4', '/images/Games/WormBird.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/worm-bird/index.html'),
(8, 'Parking Tight', '/images/Games/ParkinTighte.mp4', '/images/Games/ParkingTightt.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/parking-tight/index.html'),
(9, 'Burnin Rubber Crash Burn', '/images/Games/BurninRubberCrashBurn.mp4', '/images/Games/BurninRubberCrashBurn.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/burnin-rubber-crash-n-burn/index.html'),
(10, 'Sand Ball', '/images/Games/SandBall.mp4', '/images/Games/SandBall.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/sand-ball/index.html'),
(11, 'Space Knife', '/images/Games/SpaceKnife.mp4', '/images/Games/SpaceKnife.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/space-knife/index.html'),
(12, 'Mr Slice', '/images/Games/Mrslice.mp4', '/images/Games/Mrslice.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/mr-slice/index.html'),
(13, 'Destroy Pixel', '/images/Games/Destroypixel.mp4', '/images/Games/Destroypixel.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/destroy-pixel/index.html'),
(14, 'The Endless Tap', '/images/Games/Theendlesstape.mp4', '/images/Games/Theendlesstap.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/the-endless-tap/index.html'),
(15, 'Traffic Controller', '/images/Games/trafficcontrole.mp4', '/images/Games/Trafficcontrole.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/traffic-control/index.html'),
(16, 'Pipe Rush', '/images/Games/PIPERUSH.mp4', '/images/Games/PIPERUSH.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/pipe-rush/index.html'),
(17, 'Cube Killer', '/images/Games/Cubekiller.mp4', '/images/Games/Cubekiller.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/cube-killer/index.html'),
(18, 'Snow Rally', '/images/Games/Snowrally .mp4', '/images/Games/Snowrally.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/snow-rally/index.html'),
(19, 'Hexanaut.io', '/images/Games/hexanautio.mp4', '/images/Games/hexanautio.jpg', 'https://hexanaut.io/'),
(20, 'Tiny Cars', '/images/Games/tinycars.mp4', '/images/Games/tinycars.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/tiny-cars/index.html'),
(21, 'Twist Maze', '/images/Games/twistmaze.mp4', '/images/Games/twistmaze.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/twist-maze/index.html'),
(22, 'Gigga.io', '/images/Games/giggaio.mp4', '/images/Games/giggaio.jpg', 'https://gigga.io'),
(23, 'Rotate', '/images/Games/rotate.mp4', '/images/Games/rotate.jpg', 'https://cdn2.addictinggames.com/cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/rotate/index.html'),
(24, 'Flip Cube', '/images/Games/flipCube.mp4', '/images/Games/flipCube.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/flip-cube/index.html'),
(25, 'Fruit Maniac', '/images/Games/fruitManiac.mp4', '/images/Games/fruitManiac.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/fruit-maniac/index.html'),
(26, 'Merge Jawels', '/images/Games/mergeJewels.mp4', '/images/Games/mergeJewels.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/merge-jewels/index.html'),
(27, 'Pushout', '/images/Games/pushout.mp4', '/images/Games/pushout.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/pushout/index.html'),
(28, 'Balloons', '/images/Games/balloons.mp4', '/images/Games/balloons.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/balloons-castello/index.html'),
(29, 'Unstack Balls', '/images/Games/unstackballs.mp4', '/images/Games/unstackballs.jpg', 'https://cdn2.addictinggames.com/addictinggames-content/ag-assets/content-items/html5-games/unstack-balls/index.html'),
(30, 'Craftmine', '/images/Games/craftmine.mp4', '/images/Games/craftmine.jpg', 'https://gamaverse.com/c/f/g/craftmine/?gd_sdk_referrer_url=https://gamaverse.com/craftmine-game/'),
(31, 'Hole.io', '/images/Games/holeio.mp4', '/images/Games/Holeio.jpg', 'https://hole-io.com/index-gd.php?gd_sdk_referrer_url=https://html5.gamedistribution.com/bf10577cd0644646a2a0152fe3b4d586/?gd_sdk_referrer_url=https://gamaverse.com/hole-io-game/'),
(32, 'Think to Escape', '/images/Games/ThinktoEscape.mp4', '/images/Games/ThinktoEscape.jpg', 'https://www.crazygames.com/embed/think-to-escape'),
(33, 'Draw Bridges', '', '/images/Games/DrawBridges.jpg', 'https://www.crazygames.com/embed/draw-bridges'),
(34, 'Tomb Of The Mask Neon', '/images/Games/tombOfTheMaskNeon.mp4', '/images/Games/tombOfTheMaskNeon.jpg', 'https://gamaverse.com/c/f/g/tomb-of-the-mask-neon/?gd_sdk_referrer_url=https://gamaverse.com/tomb-of-the-mask-neon-game/'),
(35, 'Time Shooter 2', '/images/Games/TimeShooter2.mp4', '/images/Games/TimeShooter2.jpg', 'https://gamaverse.com/c/f/g/time-shooter-2/?gd_sdk_referrer_url=https://gamaverse.com/time-shooter-2-game/'),
(36, 'Russian Kamaz Truck Driver 2', '/images/Games/russianKamazTruckDriver2.mp4', '/images/Games/russianKamazTruckDriver2.jpg', 'https://www.crazygames.com/embed/russian-kamaz-truck-driver-2'),
(37, 'Wheeler Truck Parking', '', '/images/Games/WheelerTruckParking.jpg', 'https://html5.gamedistribution.com/rvvASMiM/501659cc749544b98c4530f8ebbd1d63/?gd_sdk_referrer_url=https://gamaverse.com/18-wheeler-truck-parking-game/'),
(38, 'Scrap Metal 2', '/images/Games/ScrapMetal2.mp4', '/images/Games/ScrapMetal2.jpg', 'https://www.pacogames.com/webgl/scrap-metal-2/index.php'),
(39, 'Stickman Hook', '/images/Games/stickmanHook.mp4', '/images/Games/stickmanHook.jpg', 'https://5dd30ab4-015f-11ea-ad56-9cb6d0d995f7.poki-gdn.com/7b568edf-b682-477d-a179-48160fcadd80/index.html?country=MA&url_referrer=https%3A%2F%2Fpoki.com%2F&tag=pg-v3.14.0&categories=3%2C4%2C9%2C37%2C927%2C929%2C1103%2C1137%2C1140%2C1143%2C1159%2C1160&site'),
(40, 'Brain Test 2: Tricky Stories', '', '/images/Games/brainTest2TrickyStories.jpg', 'https://df221093-aae9-4c0d-b458-efb16ae8e3ab.poki-gdn.com/c6f9e294-7aa1-42ab-8507-b7b3c66c9113/index.html?country=MA&url_referrer=https%3A%2F%2Fpoki.com%2F&tag=pg-v3.14.0&categories=4%2C7%2C16%2C37%2C72%2C96%2C400%2C843%2C929%2C1109%2C1140%2C1141%2C1150%2'),
(41, 'Appel', '/images/Games/Appel.mp4', '/images/Games/Appel.jpg', 'https://turbowarp.org/60917032/embed?autoplay&addons=remove-curved-stage-border'),
(42, 'Getting Over It', '', '/images/Games/GettingOverIt.jpg', 'https://turbowarp.org/389464290/embed?autoplay&addons=remove-curved-stage-border,pause,gamepad'),
(43, 'HelixJump', '/images/Games/HelixJump.mp4', '/images/Games/hexanautio.jpg', 'https://html5.gamedistribution.com/rvvASMiM/630d7b91a96145949f86128ce8f1c4eb/?gd_sdk_referrer_url=https%3A%2F%2Fhelixjump2.com%2Fhelix-jump.embed&gd_zone_config=eyJwYXJlbnRVUkwiOiJodHRwczovL2hlbGl4anVtcDIuY29tL2hlbGl4LWp1bXAuZW1iZWQiLCJwYXJlbnREb21haW4iOi'),
(44, 'Evoworld', '/images/Games/Evoworld.mp4', '/images/Games/Evoworld.jpg', 'https://www.crazygames.fr/embed/flyordieio'),
(45, 'Stacky Bird', '/images/Games/stackyBird.mp4', '/images/Games/StackyBird.jpg', 'https://www.crazygames.fr/embed/stacky-bird');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `gameinfo`
--
ALTER TABLE `gameinfo`
  ADD PRIMARY KEY (`gameId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `gameinfo`
--
ALTER TABLE `gameinfo`
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- Base de données : `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Structure de la table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Structure de la table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Structure de la table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Structure de la table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Structure de la table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Structure de la table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Structure de la table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Structure de la table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Structure de la table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Structure de la table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Déchargement des données de la table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"lilyadelices\",\"table\":\"orders\"},{\"db\":\"lilyadelices\",\"table\":\"customer\"},{\"db\":\"lilyadelices\",\"table\":\"shippingadresses\"},{\"db\":\"lilyadelices\",\"table\":\"productsreviews\"},{\"db\":\"lilyadelices\",\"table\":\"products\"}]');

-- --------------------------------------------------------

--
-- Structure de la table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Structure de la table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Structure de la table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Structure de la table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Structure de la table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Structure de la table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Structure de la table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Déchargement des données de la table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-06-20 16:11:24', '{\"Console\\/Mode\":\"show\",\"lang\":\"fr\",\"Console\\/Height\":425.98638,\"NavigationWidth\":122}');

-- --------------------------------------------------------

--
-- Structure de la table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Structure de la table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Index pour la table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Index pour la table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Index pour la table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Index pour la table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Index pour la table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Index pour la table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Index pour la table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Index pour la table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Index pour la table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Index pour la table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Index pour la table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Index pour la table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Index pour la table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de données : `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Base de données : `tp`
--
CREATE DATABASE IF NOT EXISTS `tp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tp`;

-- --------------------------------------------------------

--
-- Structure de la table `bonus`
--

CREATE TABLE `bonus` (
  `cle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `pseudo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`cle`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
