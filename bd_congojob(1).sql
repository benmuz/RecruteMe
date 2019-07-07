-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 06 Septembre 2018 à 13:00
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bd_congojob`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE IF NOT EXISTS `annonces` (
`idAnnonce` int(11) NOT NULL,
  `idRecruteur` int(11) NOT NULL,
  `intitulePost` varchar(100) NOT NULL,
  `typeContrat` varchar(50) NOT NULL,
  `descriptionPost` varchar(500) NOT NULL,
  `experienceRequise` varchar(500) NOT NULL,
  `competences` varchar(500) NOT NULL,
  `CompetencesSecondaire` varchar(500) NOT NULL,
  `mission` varchar(500) NOT NULL,
  `sexeProfessionnel` varchar(20) NOT NULL,
  `lieuAffectation` varchar(150) NOT NULL,
  `dateCreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `certifications`
--

CREATE TABLE IF NOT EXISTS `certifications` (
`idCertification` int(11) NOT NULL,
  `idProfil` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
`idCompetence` int(11) NOT NULL,
  `idProfil` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `descriptions`
--

CREATE TABLE IF NOT EXISTS `descriptions` (
`idDescription` int(11) NOT NULL,
  `idProfil` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE IF NOT EXISTS `experiences` (
`idExperience` int(11) NOT NULL,
  `idProfil` int(11) NOT NULL,
  `typeExperience` varchar(50) NOT NULL,
  `dateDebut` varchar(50) NOT NULL,
  `dateFin` varchar(50) NOT NULL,
  `titrePost` varchar(50) NOT NULL,
  `nomEntreprise` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `nombreAnnee` int(11) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `experiences`
--

INSERT INTO `experiences` (`idExperience`, `idProfil`, `typeExperience`, `dateDebut`, `dateFin`, `titrePost`, `nomEntreprise`, `description`, `nombreAnnee`, `dateCreation`) VALUES
(1, 1, '', '2014', '2018', 'Directeur du dep. dev. web', 'Junior Recrutement', '-', 0, '2018-08-22 05:44:30'),
(2, 3, '', '2017', '2018', 'secretaire', 'Karango', 'sdlhkkfd', 0, '2018-08-23 13:35:26'),
(3, 4, '', '2017', '2018', 'Gestionnaire de base', 'Carango Cars', '-', 0, '2018-08-24 11:43:06'),
(4, 5, '', '2015', '2018', 'Directeur de planification', 'Easylife', '-', 0, '2018-08-24 13:05:00'),
(5, 7, '', '2016', '2018', 'directeur general', 'paul busness', '-', 0, '2018-08-26 15:35:10'),
(6, 8, '', '2010', '2018', 'developpeur java', 'Busness car', '-', 0, '2018-08-28 02:26:27');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE IF NOT EXISTS `formations` (
`idFormation` int(11) NOT NULL,
  `idProfil` int(11) NOT NULL,
  `niveauFormation` varchar(50) NOT NULL,
  `dateDebut` varchar(10) NOT NULL,
  `dateFin` varchar(10) NOT NULL,
  `ecoleUniversite` varchar(50) NOT NULL,
  `diplome` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
`idPays` int(11) NOT NULL,
  `nomPays` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`idPays`, `nomPays`) VALUES
(1, 'Afrique du Sud'),
(2, 'Algerie'),
(3, 'Angola'),
(4, 'Benin'),
(5, 'Botswana'),
(6, 'Burkina-Faso'),
(7, 'Burundi'),
(8, 'Cameroun'),
(9, 'Cap-Vert'),
(10, 'Congo-Kinsaha'),
(11, 'Congo-Brazza'),
(12, 'Cote d''ivoire'),
(13, 'Djibuti'),
(14, 'Egypte'),
(15, 'Erythrée'),
(16, 'Ethiopie'),
(17, 'Gabon'),
(18, 'Gambie'),
(19, 'Ghana'),
(20, 'Guinée-Bissau'),
(21, 'Guinée-Equatoriale'),
(22, 'Kenya'),
(23, 'Lesotho'),
(24, 'Libye'),
(25, 'Madagascar'),
(26, 'Malawi'),
(27, 'Mali'),
(28, 'Maroc'),
(29, 'Maurice'),
(30, 'Mozambique'),
(31, 'Namibie'),
(32, 'Niger'),
(33, 'Nigeria'),
(34, 'Ouganda'),
(35, 'Republique Centraficaine'),
(36, 'Rwanda'),
(37, 'Sao Tome-et-Principe'),
(38, 'Sénegal'),
(39, 'Seychelles'),
(40, 'Sierra Leone'),
(41, 'Somalie'),
(42, 'Somaliland'),
(43, 'Soudan'),
(44, 'Soudan du Sud'),
(45, 'Swaziland'),
(46, 'Tanzanie'),
(47, 'Tchad'),
(48, 'Togo'),
(49, 'Tunisie'),
(50, 'Zambie'),
(51, 'Zimbabwe'),
(52, 'Comores'),
(53, 'Liberia'),
(54, 'Mauritanie'),
(56, 'Guinée');

-- --------------------------------------------------------

--
-- Structure de la table `professionnels`
--

CREATE TABLE IF NOT EXISTS `professionnels` (
`idProfil` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `genre` enum('F','M') NOT NULL DEFAULT 'M',
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `situationProfessionnelle` varchar(255) NOT NULL,
  `etatEmploi` varchar(2) NOT NULL DEFAULT '0',
  `statutProfessionnel` enum('0','1') NOT NULL DEFAULT '0',
  `profil1` varchar(255) DEFAULT NULL,
  `profil2` varchar(255) DEFAULT NULL,
  `profil3` varchar(255) DEFAULT NULL,
  `lien1` varchar(255) DEFAULT NULL,
  `lien2` varchar(255) DEFAULT NULL,
  `lien3` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `professionnels`
--

INSERT INTO `professionnels` (`idProfil`, `idUtilisateur`, `nom`, `prenom`, `genre`, `adresse`, `ville`, `pays`, `telephone`, `situationProfessionnelle`, `etatEmploi`, `statutProfessionnel`, `profil1`, `profil2`, `profil3`, `lien1`, `lien2`, `lien3`, `avatar`, `dateCreation`) VALUES
(1, 1, 'Mbikayi Katayi', 'Junior', 'M', '49, rue kuango', 'Lubumbashi', 'Congo-Kinshasa', '0972299615', 'non salarier', '1', '0', 'Developpeur des applications web', NULL, NULL, NULL, NULL, NULL, '0738453087cd4d7a3b0d04218cebfe04.jpg', '2018-08-22 05:44:30'),
(2, 3, 'Mondoki', 'lagrace', 'F', '879, sdgjdsdsds', 'Lubumbashi', 'Congo-Kinshasa', '9785641238', 'salarier', '1', '0', 'Developpeur java', NULL, NULL, NULL, NULL, NULL, 'avatar_professionel.png', '2018-08-23 13:35:26'),
(3, 4, 'Yakin', 'Yakin', 'M', '798, street cardowms', 'Soweto', 'Afrique du Sud', '9874563217', 'non salarier', '1', '0', 'Developpeur c#', NULL, NULL, NULL, NULL, NULL, 'avatar_professionel.png', '2018-08-24 11:43:06'),
(4, 5, 'Kazad kapend', 'David', 'M', '98,sdgjgu skdgsdlihds', 'Huambo', 'Angola', '27154682396', 'salarier', '0', '0', 'directeur', NULL, NULL, NULL, NULL, NULL, 'avatar_professionel.png', '2018-08-24 13:05:00'),
(5, 7, 'seya', 'paul', 'M', 'dfghjklhgfdxszdfgh', 'Kinsaha', 'Congo-Kinshasa', '852963741123', 'salarier', '1', '0', 'administrateur de base de donnees', NULL, NULL, NULL, NULL, NULL, 'team-1.jpg', '2018-08-26 15:35:10'),
(6, 8, 'kazad', 'Aaron', 'M', '78, sdjhjsd', 'Luanda', 'Angola', '5689741320', 'salarier', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, 'avatar_professionel.png', '2018-08-28 02:26:27');

-- --------------------------------------------------------

--
-- Structure de la table `projet_recrutement`
--

CREATE TABLE IF NOT EXISTS `projet_recrutement` (
`idProjet` int(11) NOT NULL,
  `idRecruteur` int(11) NOT NULL,
  `descriptionProjet` varchar(200) NOT NULL,
  `dateCreation` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projet_recrutement`
--

INSERT INTO `projet_recrutement` (`idProjet`, `idRecruteur`, `descriptionProjet`, `dateCreation`) VALUES
(1, 6, 'developpeur', '2018-08-31'),
(2, 6, 'developpeur java', '2018-09-01'),
(3, 6, 'developpeur web', '2018-09-01'),
(4, 6, 'developpeur java', '2018-09-03');

-- --------------------------------------------------------

--
-- Structure de la table `recherche`
--

CREATE TABLE IF NOT EXISTS `recherche` (
`idRecherche` int(11) NOT NULL,
  `idProfil` int(11) NOT NULL,
  `monProfil` varchar(50) NOT NULL,
  `postRecherche` int(50) NOT NULL,
  `dateCreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `recruteurs`
--

CREATE TABLE IF NOT EXISTS `recruteurs` (
`idProfil` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `nomEntreprise` varchar(50) NOT NULL,
  `secteurActivite` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `telephone2` varchar(25) NOT NULL,
  `lien1` varchar(255) DEFAULT NULL,
  `lien2` varchar(255) DEFAULT NULL,
  `lien3` varchar(255) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='la table pour l''enregistrement des tous les recruteurs de notre site web';

--
-- Contenu de la table `recruteurs`
--

INSERT INTO `recruteurs` (`idProfil`, `idUtilisateur`, `nomEntreprise`, `secteurActivite`, `adresse`, `ville`, `pays`, `telephone`, `telephone2`, `lien1`, `lien2`, `lien3`, `description`, `avatar`, `nom`, `prenom`, `dateCreation`) VALUES
(1, 2, 'TravelOn', '', '789, rue des usines', 'Loanda3', 'Afrique du Sud', '9638527415', '9856321447', '-', '-', '-', '-', 'logo (3).png', 'Carles', 'Julia', '2018-08-22 06:00:58'),
(2, 6, 'Alcoa', 'Automobile', '97, asdkjhkssd', 'Dielfa', 'Algerie', '8529637418', '9638527419', '-', '-', '-', '-', 'Alcoa.jpg', 'Charles', 'Pattyson', '2018-08-25 12:56:40'),
(3, 11, 'weekend startup', 'Materiel informatique', 'rue 54 dshjhsdsdsd', 'Lubumbashi', 'Congo-Kinsaha', '852963741', '7418596', '-', '-', '-', 'sdkjshdksdjskdbskd', 'ga8.jpg', 'julie', 'kasongo', '2018-09-06 12:54:01');

-- --------------------------------------------------------

--
-- Structure de la table `secteurs`
--

CREATE TABLE IF NOT EXISTS `secteurs` (
`idSectereur` int(11) NOT NULL,
  `nomSecteur` varchar(75) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `secteurs`
--

INSERT INTO `secteurs` (`idSectereur`, `nomSecteur`) VALUES
(1, 'Materiel informatique'),
(2, 'Immobilier'),
(3, 'Immobilier commercial'),
(4, 'Import et export'),
(5, 'Imprimerie, reproduction'),
(6, 'Industrie automobile'),
(7, 'Industrie bois et papiers'),
(8, 'Industrie composant électriques/électroniques'),
(9, 'Industrie de cinéma'),
(10, 'Industrie pharmaceutique'),
(11, 'Industrie textile'),
(12, 'Industrie mécanique ou industrielle'),
(13, 'Institutions judiciares'),
(14, 'Institutions religieuses'),
(15, 'Internet'),
(16, 'Jeux d''argent et cacino'),
(17, 'Jeux électroniques'),
(18, 'Logiciels informatique'),
(19, 'Logistique'),
(20, 'Loisir, voyage et tourisme'),
(21, 'Activités associatives'),
(22, 'Aéronautique, navale'),
(23, 'Agroalimentaire'),
(24, 'Automobile'),
(25, 'BTP, construction'),
(26, 'Chimie, pétrochimie, matières premières'),
(27, 'Distribution, vente, commerce de gros'),
(28, 'Education, formation'),
(29, 'Environnement, recyclage'),
(30, ' Equipements mécaniques, machines '),
(31, 'Évènementiel, hôte(sse), accueil'),
(32, 'Immobilier, architecture, urbanisme '),
(33, 'Industrie pharmaceutique'),
(34, 'Intérim, recrutement '),
(35, 'Luxe, cosmétiques'),
(36, 'Manutention'),
(37, 'Métallurgie, sidérurgie'),
(38, 'Papier, bois, caoutchouc, plastique, verre, tabac'),
(39, 'Santé, pharmacie, hôpitaux, équipements médicaux'),
(40, 'Services aéroportuaires et maritimes ');

-- --------------------------------------------------------

--
-- Structure de la table `selection`
--

CREATE TABLE IF NOT EXISTS `selection` (
`idSelection` int(11) NOT NULL,
  `idRecruteur` int(11) NOT NULL,
  `idCandidat` int(11) NOT NULL,
  `idProjet` varchar(50) NOT NULL,
  `Fichier` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `selection`
--

INSERT INTO `selection` (`idSelection`, `idRecruteur`, `idCandidat`, `idProjet`, `Fichier`, `dateCreation`) VALUES
(1, 6, 1, '1', '', '2018-08-31 11:52:28'),
(2, 6, 1, '3', '', '2018-09-01 08:45:09');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`idUtilisateur` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `etat` enum('1','0') NOT NULL DEFAULT '0',
  `typeProfil` varchar(255) NOT NULL,
  `typeCompte` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `pseudo`, `password`, `email`, `etat`, `typeProfil`, `typeCompte`, `dateCreation`) VALUES
(1, 'junior', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mkj.mbikayi@gmail.com', '1', '', 'professionnel', '2018-08-22 05:32:20'),
(2, 'travelon', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'travelon@gmail.com', '1', '', 'recruteur', '2018-08-22 05:56:48'),
(3, 'lagrace', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mondokilagrace@gmail.com', '1', '', 'professionnel', '2018-08-22 06:13:55'),
(4, 'yakin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yakin@gmail.com', '1', '', 'professionnel', '2018-08-24 10:53:19'),
(5, 'david', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kazadkapend@gmail.com', '1', '', 'professionnel', '2018-08-24 12:59:22'),
(6, 'alcoa', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'alcoa@gmail.com', '1', '', 'recruteur', '2018-08-25 04:24:22'),
(7, 'paul', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'paul@gmail.com', '1', '', 'professionnel', '2018-08-26 15:28:46'),
(8, 'aaron', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kazadAaron@gmail.com', '1', '', 'professionnel', '2018-08-28 02:24:37'),
(9, 'patrick', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'patrickilufia@gmail.com', '1', '', 'professionnel', '2018-08-28 13:13:53'),
(10, 'katty', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'rupas@gmail.com', '1', '', 'professionnel', '2018-09-05 12:25:30'),
(11, 'weekend', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'weekend@gmail.com', '1', '', 'recruteur', '2018-09-06 12:51:13');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE IF NOT EXISTS `villes` (
`idVille` int(11) NOT NULL,
  `nomVille` varchar(50) NOT NULL,
  `idPays` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `villes`
--

INSERT INTO `villes` (`idVille`, `nomVille`, `idPays`) VALUES
(1, 'Le Cap', 1),
(2, 'Durban', 1),
(3, 'Johannesburg', 1),
(4, 'Soweto', 1),
(5, 'Pretoria', 1),
(6, 'Port Elizabeth', 1),
(7, 'Pietermaritzburg', 1),
(8, 'Benoni', 1),
(9, 'Bloemfontein', 1),
(10, 'Welkom', 1),
(11, 'Tembisa', 1),
(12, 'Vereeniging', 1),
(13, 'Boksburg', 1),
(14, 'East London', 1),
(15, 'Sihlangu', 1),
(16, 'Ekangala', 1),
(17, 'Krugersdorp', 1),
(18, 'Botshabelo', 1),
(19, 'Brakpan', 1),
(20, 'Richards Bay', 1),
(21, 'Emalahleni', 1),
(22, 'Uitenhage', 1),
(23, 'Verwoerdburg', 1),
(24, 'Vanderbijlpark', 1),
(25, 'Mdantsane', 1),
(26, 'Alberton', 1),
(27, 'George', 1),
(28, 'Somerset West', 1),
(29, 'Paarl', 1),
(30, 'Kimberley', 1),
(31, 'Embalenhle', 1),
(32, 'Vryheid', 1),
(33, 'Carltonville', 1),
(34, 'Middelburg', 1),
(35, 'Springs', 1),
(36, 'Klerksdorp', 1),
(37, 'Midstream', 1),
(38, 'Virginia', 1),
(39, 'Epumalanga', 1),
(40, 'Orkney', 1),
(41, 'Bhisho', 1),
(42, 'Nigel', 1),
(43, 'Worcester', 1),
(44, 'Polokwane', 1),
(45, 'Randfontein', 1),
(46, 'Queenstown', 1),
(47, 'Emnambithi', 1),
(48, 'Bethal', 1),
(49, 'Kutlwanong', 1),
(50, 'Kinshasa', 10),
(51, 'Lubumbashi', 10),
(52, 'Mbuji-Mayi', 10),
(53, 'Kolwezi', 10),
(54, 'Kananga', 10),
(55, 'Kisangani', 10),
(56, 'Likasi', 10),
(57, 'Boma', 10),
(58, 'Tshikapa', 10),
(59, 'Bukavu', 10),
(60, 'Matadi', 10),
(61, 'Kikwit', 10),
(62, 'Mbandaka', 10),
(63, 'Mwene-Ditu', 10),
(64, 'Uvira', 10),
(65, 'Butembo', 10),
(66, 'Goma', 10),
(67, 'Isiro', 10),
(68, 'Bunia', 10),
(69, 'Gemena', 10),
(70, 'Kindu', 10),
(71, 'Bandundu', 10),
(72, 'Kalemie', 10),
(73, 'Ilebo', 10),
(74, 'Brazzaville', 11),
(75, 'Point Noir', 11),
(76, 'Alger', 2),
(77, 'Oran', 2),
(78, 'Constantine', 2),
(79, 'Batna', 2),
(80, 'Annaba', 2),
(81, 'Setif', 2),
(82, 'Sidi bel Abbes', 2),
(83, 'Biskra', 2),
(84, 'Dielfa', 2),
(85, 'Tebessa', 2),
(86, 'Blida', 2),
(87, 'Skikda', 2),
(88, 'Bejaia', 2),
(89, 'Tiaret', 2),
(90, 'Ech Cheliff', 2),
(91, 'Tizi Ouzou', 2),
(92, 'Bechar', 2),
(93, 'Bordj Bou Arreridj', 2),
(94, 'Mostaganem', 2),
(95, 'Medea', 2),
(96, 'Tlemcen', 2),
(97, 'Ouargla', 2),
(98, 'Souq Ahras', 2),
(99, 'Saida', 2),
(100, 'Guelma', 2),
(101, 'Bab Ezzouar', 2),
(102, 'Khenchela', 2),
(103, 'Jijel', 2),
(104, 'El Eulma', 2),
(105, 'El Oued', 2),
(106, 'Relizane', 2),
(107, 'M''Sila', 2),
(108, 'Borj el Kiffan', 2),
(109, 'Bou Saada', 2),
(110, 'Laghouat', 2),
(111, 'Luanda', 3),
(112, 'Huambo', 3),
(113, 'Lobito', 3),
(114, 'Benguela', 3),
(115, 'Namibe', 3),
(116, 'Abidjan', 12),
(117, 'Bouake', 12),
(118, 'Daloa', 12),
(119, 'Yamoussoukro', 12),
(120, 'Korhogo', 12),
(121, 'Gagnoa', 12),
(122, 'Man', 12),
(123, 'Divo', 12),
(124, 'San-Pedro', 12),
(125, 'Anyama', 12);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
 ADD PRIMARY KEY (`idAnnonce`);

--
-- Index pour la table `certifications`
--
ALTER TABLE `certifications`
 ADD PRIMARY KEY (`idCertification`), ADD KEY `idProfil` (`idProfil`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
 ADD PRIMARY KEY (`idCompetence`), ADD KEY `idProfil` (`idProfil`);

--
-- Index pour la table `descriptions`
--
ALTER TABLE `descriptions`
 ADD PRIMARY KEY (`idDescription`), ADD KEY `idProfil` (`idProfil`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
 ADD PRIMARY KEY (`idExperience`), ADD KEY `idProfil` (`idProfil`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
 ADD PRIMARY KEY (`idFormation`), ADD KEY `idProfil` (`idProfil`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
 ADD PRIMARY KEY (`idPays`);

--
-- Index pour la table `professionnels`
--
ALTER TABLE `professionnels`
 ADD PRIMARY KEY (`idProfil`), ADD UNIQUE KEY `telephone` (`telephone`), ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `projet_recrutement`
--
ALTER TABLE `projet_recrutement`
 ADD PRIMARY KEY (`idProjet`);

--
-- Index pour la table `recherche`
--
ALTER TABLE `recherche`
 ADD PRIMARY KEY (`idRecherche`);

--
-- Index pour la table `recruteurs`
--
ALTER TABLE `recruteurs`
 ADD PRIMARY KEY (`idProfil`), ADD UNIQUE KEY `telephone` (`telephone`), ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `secteurs`
--
ALTER TABLE `secteurs`
 ADD PRIMARY KEY (`idSectereur`);

--
-- Index pour la table `selection`
--
ALTER TABLE `selection`
 ADD PRIMARY KEY (`idSelection`), ADD KEY `idRecruteur` (`idRecruteur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`idUtilisateur`), ADD UNIQUE KEY `pseudo` (`pseudo`,`password`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
 ADD PRIMARY KEY (`idVille`), ADD KEY `idPays` (`idPays`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
MODIFY `idAnnonce` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `certifications`
--
ALTER TABLE `certifications`
MODIFY `idCertification` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
MODIFY `idCompetence` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `descriptions`
--
ALTER TABLE `descriptions`
MODIFY `idDescription` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
MODIFY `idExperience` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
MODIFY `idFormation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
MODIFY `idPays` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT pour la table `professionnels`
--
ALTER TABLE `professionnels`
MODIFY `idProfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `projet_recrutement`
--
ALTER TABLE `projet_recrutement`
MODIFY `idProjet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `recherche`
--
ALTER TABLE `recherche`
MODIFY `idRecherche` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `recruteurs`
--
ALTER TABLE `recruteurs`
MODIFY `idProfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `secteurs`
--
ALTER TABLE `secteurs`
MODIFY `idSectereur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `selection`
--
ALTER TABLE `selection`
MODIFY `idSelection` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
MODIFY `idVille` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=126;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
