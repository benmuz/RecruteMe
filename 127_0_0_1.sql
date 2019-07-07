-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 19 Septembre 2018 à 13:17
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

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
  `idAnnonce` int(11) NOT NULL AUTO_INCREMENT,
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
  `dateCreation` date NOT NULL,
  PRIMARY KEY (`idAnnonce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `certifications`
--

CREATE TABLE IF NOT EXISTS `certifications` (
  `idCertification` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `lieuCertification` varchar(255) NOT NULL,
  `titreCertification` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idCertification`),
  KEY `idProfil` (`idProfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `certifications`
--

INSERT INTO `certifications` (`idCertification`, `idProfil`, `description`, `lieuCertification`, `titreCertification`, `dateCreation`) VALUES
(1, 2, 'des', 'ESIS', 'Programmation android', '2018-09-15 07:17:51');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
  `idCompetence` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idCompetence`),
  KEY `idProfil` (`idProfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `descriptions`
--

CREATE TABLE IF NOT EXISTS `descriptions` (
  `idDescription` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idDescription`),
  KEY `idProfil` (`idProfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE IF NOT EXISTS `experiences` (
  `idExperience` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) NOT NULL,
  `typeExperience` varchar(50) NOT NULL,
  `dateDebut` varchar(50) NOT NULL,
  `dateFin` varchar(50) NOT NULL,
  `titrePost` varchar(50) NOT NULL,
  `nomEntreprise` varchar(50) NOT NULL,
  `secteurActivite` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `nombreAnnee` int(11) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idExperience`),
  KEY `idProfil` (`idProfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `experiences`
--

INSERT INTO `experiences` (`idExperience`, `idProfil`, `typeExperience`, `dateDebut`, `dateFin`, `titrePost`, `nomEntreprise`, `secteurActivite`, `description`, `nombreAnnee`, `dateCreation`) VALUES
(1, 1, '', '2014', '2018', 'Directeur general', 'Jun''s Recrutement', 'Intï¿½rim, recrutement ', 'description', 0, '2018-09-15 07:00:58'),
(2, 2, '', '2015', '2018', 'Directeur de la planification', 'EspacEsis', 'Logiciels informatique', 'des', 0, '2018-09-15 07:18:54');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE IF NOT EXISTS `formations` (
  `idFormation` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) NOT NULL,
  `niveauFormation` varchar(50) NOT NULL,
  `dateDebut` varchar(10) NOT NULL,
  `dateFin` varchar(10) NOT NULL,
  `ecoleUniversite` varchar(50) NOT NULL,
  `diplome` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idFormation`),
  KEY `idProfil` (`idProfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`idFormation`, `idProfil`, `niveauFormation`, `dateDebut`, `dateFin`, `ecoleUniversite`, `diplome`, `description`, `dateCreation`) VALUES
(1, 1, '', '2014', '2018', 'ESIS', 'Ingenieur Technicien en Systeme informatique', 'description', '2018-09-15 06:59:09'),
(2, 2, '', '2014', '2018', 'ESIS', 'Ingenieur technicien en systeme informatique', 'des', '2018-09-15 07:17:06'),
(3, 3, '', '2013', '2018', 'ESIS', 'Ingenieur technicien en Gestion informatique', 'desc', '2018-09-15 07:24:52'),
(4, 5, '', '2014', '2018', 'ESIS Salama', 'Ingenieur technicien en systeme informatique', 'description', '2018-09-15 07:36:37');

-- --------------------------------------------------------

--
-- Structure de la table `langues`
--

CREATE TABLE IF NOT EXISTS `langues` (
  `idLangue` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) NOT NULL,
  `langue` varchar(255) NOT NULL,
  `niveau` varchar(50) NOT NULL,
  `dateCreation` date NOT NULL,
  PRIMARY KEY (`idLangue`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `langues`
--

INSERT INTO `langues` (`idLangue`, `idProfil`, `langue`, `niveau`, `dateCreation`) VALUES
(1, 1, 'Anglais', 'Moyenne', '2018-09-15'),
(2, 1, 'FranÃ§ais', 'Bon', '2018-09-15'),
(3, 1, 'Swahili', 'Bon', '2018-09-15');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `idPays` int(11) NOT NULL AUTO_INCREMENT,
  `nomPays` varchar(50) NOT NULL,
  PRIMARY KEY (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

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
  `idProfil` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `genre` enum('F','M') NOT NULL DEFAULT 'M',
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `situationProfessionnelle` varchar(255) NOT NULL,
  `etatEmploi` enum('1','0') NOT NULL DEFAULT '1',
  `lien1` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idProfil`),
  UNIQUE KEY `telephone` (`telephone`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `professionnels`
--

INSERT INTO `professionnels` (`idProfil`, `idUtilisateur`, `nom`, `prenom`, `genre`, `adresse`, `ville`, `pays`, `telephone`, `situationProfessionnelle`, `etatEmploi`, `lien1`, `avatar`, `dateCreation`) VALUES
(1, 1, 'Mbikayi', 'Junior', 'M', '49, rue Kwango, Katuba 2, c/lubumbashi', 'Lubumbashi', 'Congo-Kinsaha', '0972299615', 'salarier', '1', NULL, '0738453087cd4d7a3b0d04218cebfe04.jpg', '2018-09-15 01:33:39'),
(2, 3, 'Shikumulie', 'Jonathan', 'M', '79, barabara', 'Kisangani', 'Congo-Kinsaha', '9328719382', 'salarier', '1', NULL, 'IMG-20180913-WA0034.jpg', '2018-09-15 07:15:26'),
(3, 4, 'Mondoki', 'Lagrace', 'M', '875, avenue des ecole', 'Lubumbashi', 'Congo-Kinsaha', '8527419632', 'salarier', '1', NULL, 'IMG_20180903_064205.jpg', '2018-09-15 07:23:10'),
(4, 6, 'Katolo', 'Axel', 'M', 'banguela street 85', 'Benguela', 'Angola', '3216549871', 'salarier', '1', NULL, 'IMG_5522.JPG', '2018-09-15 07:33:04'),
(5, 7, 'Kialupata', 'Heritier', 'M', 'burkal 9856', 'Point Noir', 'Congo-Brazza', '9996587412', 'salarier', '1', NULL, 'Collg Heritier Kialupata 20180812_155800.jpg', '2018-09-15 07:35:02'),
(6, 8, 'fghjkl', 'dfghjk', 'M', 'hjklhjkl', 'Embalenhle', 'Afrique du Sud', '789456789654', 'salarier', '1', NULL, 'avatar_professionel.png', '2018-09-15 12:11:00');

-- --------------------------------------------------------

--
-- Structure de la table `projet_recrutement`
--

CREATE TABLE IF NOT EXISTS `projet_recrutement` (
  `idProjet` int(11) NOT NULL AUTO_INCREMENT,
  `idRecruteur` int(11) NOT NULL,
  `descriptionProjet` varchar(200) NOT NULL,
  `dateCreation` date NOT NULL,
  PRIMARY KEY (`idProjet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `projet_recrutement`
--

INSERT INTO `projet_recrutement` (`idProjet`, `idRecruteur`, `descriptionProjet`, `dateCreation`) VALUES
(1, 1, 'sdfghjkdfghjkl', '2018-09-15');

-- --------------------------------------------------------

--
-- Structure de la table `recruteurs`
--

CREATE TABLE IF NOT EXISTS `recruteurs` (
  `idProfil` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `nomEntreprise` varchar(50) NOT NULL,
  `secteurActivite` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `telephone2` varchar(25) NOT NULL,
  `lien1` varchar(255) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idProfil`),
  UNIQUE KEY `telephone` (`telephone`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='la table pour l''enregistrement des tous les recruteurs de notre site web' AUTO_INCREMENT=3 ;

--
-- Contenu de la table `recruteurs`
--

INSERT INTO `recruteurs` (`idProfil`, `idUtilisateur`, `nomEntreprise`, `secteurActivite`, `adresse`, `ville`, `pays`, `telephone`, `telephone2`, `lien1`, `description`, `avatar`, `dateCreation`) VALUES
(1, 2, 'TravelOn', ' Equipements mï¿½caniques, machines ', '64, street', 'Constantine', 'Algerie', '3113131331', '4664313125', '-', 'des', 'logo (3).png', '2018-09-15 06:45:23'),
(2, 5, 'Alcoa', 'Automobile', '978, avenue kibale', 'Constantine', 'Algerie', '7897897897', '7897894561', '-', 'des', 'Alcoa.jpg', '2018-09-15 07:29:51');

-- --------------------------------------------------------

--
-- Structure de la table `secteurs`
--

CREATE TABLE IF NOT EXISTS `secteurs` (
  `idSectereur` int(11) NOT NULL AUTO_INCREMENT,
  `nomSecteur` varchar(75) NOT NULL,
  PRIMARY KEY (`idSectereur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

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
  `idSelection` int(11) NOT NULL AUTO_INCREMENT,
  `idRecruteur` int(11) NOT NULL,
  `idCandidat` int(11) NOT NULL,
  `idProjet` varchar(50) NOT NULL,
  `Fichier` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL,
  PRIMARY KEY (`idSelection`),
  KEY `idRecruteur` (`idRecruteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `etat` enum('1','0') NOT NULL DEFAULT '0',
  `typeProfil` varchar(255) NOT NULL,
  `typeCompte` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE KEY `pseudo` (`pseudo`,`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `pseudo`, `password`, `email`, `etat`, `typeProfil`, `typeCompte`, `dateCreation`) VALUES
(1, 'junior', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mkj.mbikayi@gmail.com', '1', '', 'professionnel', '2018-09-15 01:32:22'),
(2, 'travelon', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'travelon@gmail.com', '1', '', 'recruteur', '2018-09-15 01:42:44'),
(3, 'jonathan', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'shikumulie@gmail.com', '1', '', 'professionnel', '2018-09-15 07:14:10'),
(4, 'lagrace', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mondoki@gmail.com', '1', '', 'professionnel', '2018-09-15 07:20:44'),
(5, 'alcoa', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Infos.alcoa@gmail.com', '1', '', 'recruteur', '2018-09-15 07:28:49'),
(6, 'axel', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'katolo@gmail.com', '1', '', 'professionnel', '2018-09-15 07:32:23'),
(7, 'heritier', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kialupata@gmail.com', '1', '', 'professionnel', '2018-09-15 07:34:18'),
(8, 'jun', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'abigael@yahoo.fr', '1', '', 'professionnel', '2018-09-15 12:09:49');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE IF NOT EXISTS `villes` (
  `idVille` int(11) NOT NULL AUTO_INCREMENT,
  `nomVille` varchar(50) NOT NULL,
  `idPays` int(11) NOT NULL,
  PRIMARY KEY (`idVille`),
  KEY `idPays` (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

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
-- Base de données :  `bd_gcm_attribution_equipements_informatique`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `idAgent` int(11) NOT NULL AUTO_INCREMENT,
  `nomAgent` varchar(255) NOT NULL,
  `postnomAgent` varchar(255) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dateSortie` date DEFAULT NULL,
  PRIMARY KEY (`idAgent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `agent`
--

INSERT INTO `agent` (`idAgent`, `nomAgent`, `postnomAgent`, `matricule`, `telephone`, `division`, `departement`, `service`, `site`, `email`, `dateSortie`) VALUES
(1, 'MANDE', 'MPASA', 'SSU0000', '', 'SSU', 'DIF', 'DIR', 'Lubumbashi', '', NULL),
(2, 'MAKOSA', 'MAKOSA', 'CS0000', '', 'SSU', 'DIF', 'EXPLOITATION', 'Lubumbashi', '', NULL),
(3, 'NYONGA', 'NYONGA', 'E0000', '', 'SSU', 'DIF', 'EXPLOITATION', 'Lubumbashi', '', NULL),
(4, 'MATALATALA', '', 'M0000', '', 'SSU', 'DIF', 'ADMINITRATION', 'Lubumbashi', '', NULL),
(5, 'VALERIEN', '', 'D0000', '', 'DIR', 'DIF', 'DIR', 'Lubumbashi', '', NULL),
(6, 'NGOIE', 'NGOIE', 'GOIIE', '', 'RESEAU', 'DIF', 'SECRETAIRE', 'Lubumbashi', '', NULL),
(7, 'KALENGA', 'KALENGA', 'KALENGA', '', 'DTA', '', '', 'Lubumbashi', '', NULL),
(8, 'MANDE2', 'MPASA2', 'KSSU0000', '', 'SSU', 'DIF', 'DIR', 'Kipushi', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `approbateur`
--

CREATE TABLE IF NOT EXISTS `approbateur` (
  `idapprobateur` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idapprobateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `approbation`
--

CREATE TABLE IF NOT EXISTS `approbation` (
  `idApprobation` int(11) NOT NULL AUTO_INCREMENT,
  `idMateriel` int(11) NOT NULL,
  `idAgent` int(11) NOT NULL,
  `justification` varchar(125) NOT NULL,
  `acceptation` varchar(125) NOT NULL DEFAULT 'NON',
  `dateApprobation` date NOT NULL,
  `dateAttribution` date NOT NULL,
  `idApprobateur` int(11) NOT NULL,
  PRIMARY KEY (`idApprobation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `approbation`
--

INSERT INTO `approbation` (`idApprobation`, `idMateriel`, `idAgent`, `justification`, `acceptation`, `dateApprobation`, `dateAttribution`, `idApprobateur`) VALUES
(1, 1, 6, 'sous autorisation du ssu dir', 'OUI', '2018-07-03', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `attribution`
--

CREATE TABLE IF NOT EXISTS `attribution` (
  `idAttribution` int(11) NOT NULL AUTO_INCREMENT,
  `idConfiguration` int(11) NOT NULL,
  `idapp` int(11) NOT NULL,
  PRIMARY KEY (`idAttribution`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `attribution_site`
--

CREATE TABLE IF NOT EXISTS `attribution_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMateriel` int(11) NOT NULL,
  `idApprobateur` int(11) NOT NULL,
  `idSite` int(11) NOT NULL,
  `acceptation` varchar(3) NOT NULL DEFAULT 'NON',
  `justification` text NOT NULL,
  `date_attribution` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `attribution_site`
--

INSERT INTO `attribution_site` (`id`, `idMateriel`, `idApprobateur`, `idSite`, `acceptation`, `justification`, `date_attribution`) VALUES
(1, 1, 0, 1, 'OUI', 'pour les agents de lubumbashi', '2018-07-03');

-- --------------------------------------------------------

--
-- Structure de la table `edition`
--

CREATE TABLE IF NOT EXISTS `edition` (
  `idEdition` int(11) NOT NULL AUTO_INCREMENT,
  `idApprobation` int(11) NOT NULL,
  `dateEdition` datetime NOT NULL,
  `adresseMac` varchar(255) NOT NULL,
  `nomCompteUtilisateur` varchar(255) NOT NULL,
  `nouveauSysteme` varchar(255) NOT NULL,
  `nombreBits` varchar(100) NOT NULL,
  PRIMARY KEY (`idEdition`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `edition`
--

INSERT INTO `edition` (`idEdition`, `idApprobation`, `dateEdition`, `adresseMac`, `nomCompteUtilisateur`, `nouveauSysteme`, `nombreBits`) VALUES
(1, 1, '2018-07-03 05:58:46', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `fournisseur` (
  `idFournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nomFournisseur` varchar(255) NOT NULL,
  `telFournisseur` varchar(255) NOT NULL,
  `adresseFournisseur` varchar(255) NOT NULL,
  `emailFournisseur` varchar(255) NOT NULL,
  `site` varchar(233) NOT NULL,
  PRIMARY KEY (`idFournisseur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`idFournisseur`, `nomFournisseur`, `telFournisseur`, `adresseFournisseur`, `emailFournisseur`, `site`) VALUES
(1, 'JAMBO MARKET', '963852741', '852, MAMAN EMO', 'jambomarket@gmail.com', 'Lubumbashi'),
(2, 'BEST BY', '789456132', '987, chausse desire kabila', 'bestby@gmail.com', 'Lubumbashi');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `idgroupe` int(11) NOT NULL AUTO_INCREMENT,
  `nomGroupe` varchar(11) NOT NULL,
  PRIMARY KEY (`idgroupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`idgroupe`, `nomGroupe`) VALUES
(1, 'SUD'),
(2, 'OUEST'),
(3, 'CENTRE'),
(4, 'KINSHASA');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE IF NOT EXISTS `materiel` (
  `idMateriel` int(11) NOT NULL AUTO_INCREMENT,
  `typeCategorie` varchar(255) NOT NULL,
  `designation` varchar(125) DEFAULT NULL,
  `numSerie` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `idFournisseur` int(11) NOT NULL,
  `clavier` varchar(255) NOT NULL,
  `ram` int(11) NOT NULL,
  `capaciteHdd` int(11) NOT NULL,
  `carteGraphique` varchar(255) NOT NULL,
  `systemeInstalle` varchar(255) NOT NULL,
  `bitSysteme` int(11) NOT NULL,
  `frequenceCpu` int(11) NOT NULL,
  `modelCpu` varchar(255) NOT NULL,
  `nombreCoeurCpu` int(11) NOT NULL,
  `nombreUsb` int(11) NOT NULL,
  `nombreVdi` int(11) NOT NULL,
  `nombreVga` int(11) NOT NULL,
  `nombreHdmi` int(11) NOT NULL,
  `nombrePouce` int(11) NOT NULL,
  `typeEcran` varchar(255) NOT NULL,
  `nombreRj45` int(11) NOT NULL,
  `connectivite` varchar(125) NOT NULL,
  `styleEcran` varchar(125) NOT NULL,
  PRIMARY KEY (`idMateriel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `materiel`
--

INSERT INTO `materiel` (`idMateriel`, `typeCategorie`, `designation`, `numSerie`, `marque`, `modele`, `idFournisseur`, `clavier`, `ram`, `capaciteHdd`, `carteGraphique`, `systemeInstalle`, `bitSysteme`, `frequenceCpu`, `modelCpu`, `nombreCoeurCpu`, `nombreUsb`, `nombreVdi`, `nombreVga`, `nombreHdmi`, `nombrePouce`, `typeEcran`, `nombreRj45`, `connectivite`, `styleEcran`) VALUES
(1, 'IMPRIMANTE-SCANNER', 'IMPRIMANTE', 'FD987HY652', 'HP', 'HP', 1, '', 0, 0, '', '', 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, '', ''),
(2, 'IMPRIMANTE-SCANNER', 'SCANNER', 'DFK68765146JJVH', 'HP', 'KIOSERA 676', 1, '', 0, 0, '', '', 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, '', ''),
(3, 'ACCESSOIRES', NULL, 'SDS7979', 'HP', 'HP', 2, '', 0, 0, '', '', 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE IF NOT EXISTS `parametre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `connectedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logoutAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nomApplication` char(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reception`
--

CREATE TABLE IF NOT EXISTS `reception` (
  `idreception` int(11) NOT NULL AUTO_INCREMENT,
  `idMateriel` int(11) NOT NULL,
  `datereception` datetime NOT NULL,
  PRIMARY KEY (`idreception`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `idSite` int(11) NOT NULL AUTO_INCREMENT,
  `nomSite` varchar(50) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  PRIMARY KEY (`idSite`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `site`
--

INSERT INTO `site` (`idSite`, `nomSite`, `idGroupe`) VALUES
(1, 'Lubumbashi', 1),
(2, 'Kipushi', 1),
(3, 'Kinshasa', 4),
(4, 'Kolwezi', 2),
(5, 'Likasi', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(255) NOT NULL,
  `Pwd` varchar(255) NOT NULL,
  `typeCompte` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL,
  `idAgent` int(11) NOT NULL,
  `avatar` varchar(1234) NOT NULL,
  `Tocken` varchar(255) NOT NULL,
  `dateModification` datetime NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `dateModifPwd` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomAgent` varchar(255) NOT NULL,
  `connectedAt` datetime NOT NULL,
  `etat` int(11) NOT NULL,
  `logoutAt` datetime NOT NULL,
  `site` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `matricule`, `Pwd`, `typeCompte`, `dateCreation`, `idAgent`, `avatar`, `Tocken`, `dateModification`, `remember_token`, `dateModifPwd`, `email`, `nomAgent`, `connectedAt`, `etat`, `logoutAt`, `site`) VALUES
(1, 'SSU0000', 'e10adc3949ba59abbe56e057f20f883e', 'ssu_dir', '2018-07-02 00:00:00', 1, '69edf07b-626b-4cdf-a361-6cb42805cb9c.jpg', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'MANDE', '2018-07-20 03:49:25', 0, '2018-07-20 04:01:58', 'Lubumbashi'),
(2, 'CS0000', 'e10adc3949ba59abbe56e057f20f883e', 'chef de service', '2018-07-03 03:57:30', 2, 'Android OS_48px.png', '7w1xIF', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'MAKOSA', '2018-07-03 06:06:54', 1, '0000-00-00 00:00:00', 'Lubumbashi'),
(3, 'E0000', 'e10adc3949ba59abbe56e057f20f883e', 'editeur', '2018-07-03 04:21:49', 3, 'Android OS_48px.png', 'uUE5yZ', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'NYONGA', '2018-07-03 05:58:13', 1, '0000-00-00 00:00:00', 'Lubumbashi'),
(4, 'M0000', 'e10adc3949ba59abbe56e057f20f883e', 'magasinier', '2018-07-03 04:22:30', 4, 'Android OS_48px.png', 'HW8nxh', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'MATALATALA', '2018-07-20 04:02:09', 0, '2018-07-20 04:42:15', 'Lubumbashi'),
(6, 'D0000', 'e10adc3949ba59abbe56e057f20f883e', 'dif_dir', '2018-07-03 04:24:00', 5, 'Android OS_48px.png', 'aN1AHL', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'VALERIEN', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Lubumbashi'),
(7, 'KSSU0000', 'e10adc3949ba59abbe56e057f20f883e', 'ssu_dir', '2018-07-03 04:44:23', 8, 'Android OS_48px.png', '3EytKm', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'MANDE2', '2018-07-03 07:29:04', 1, '0000-00-00 00:00:00', 'Kipushi');
--
-- Base de données :  `bd_recrutement`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire`
--

CREATE TABLE IF NOT EXISTS `t_commentaire` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `designationCommentaire` varchar(255) NOT NULL,
  `descriptionCommentaire` varchar(255) NOT NULL,
  `idPublication` int(11) NOT NULL,
  `datecommentaire` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idProfil` int(11) NOT NULL,
  PRIMARY KEY (`idCommentaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `t_commentaire`
--

INSERT INTO `t_commentaire` (`idCommentaire`, `designationCommentaire`, `descriptionCommentaire`, `idPublication`, `datecommentaire`, `idProfil`) VALUES
(1, 'commentaire', 'sdddw', 1, '2018-07-11 04:32:46', 1),
(2, 'j commente moi katayi tresor', 'merci', 1, '2018-07-11 05:26:11', 1),
(3, 'commentaire', 'sdhghgsadhgyfwefkuhusdfhwekg', 2, '2018-07-11 07:52:32', 2),
(4, 'commentaire', 'rtyuikjhgfdtyjvfscjsgdjsgds', 2, '2018-07-11 08:00:41', 1),
(5, 'commentaire', 'La base indispensable est de possÃ©der de bonnes notions en HTML et CSS. Vous avez des lacunes ? Comblez-les avec\r\nle cours de Mathieu Nebra.\r\nPour comprendre la mise en oeuvre des plugins jQuery, vous aurez besoin des quelques bases dans ce domaine. Il v', 2, '2018-07-11 21:46:06', 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_cv`
--

CREATE TABLE IF NOT EXISTS `t_cv` (
  `idCv` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) NOT NULL,
  `competences` varchar(255) NOT NULL,
  `formations` varchar(255) NOT NULL,
  `recommendation` varchar(255) NOT NULL,
  `descriptionFormation` varchar(255) NOT NULL,
  `descriptionCompetence` varchar(255) NOT NULL,
  PRIMARY KEY (`idCv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_experieces`
--

CREATE TABLE IF NOT EXISTS `t_experieces` (
  `idExperience` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) NOT NULL,
  `dateDebut` varchar(20) NOT NULL,
  `dateFin` varchar(20) NOT NULL,
  `titrePost` varchar(255) NOT NULL,
  `nomEntreprise` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dateAjoutExperience` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idExperience`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_formation`
--

CREATE TABLE IF NOT EXISTS `t_formation` (
  `idFormation` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) NOT NULL,
  `dateDebut` varchar(20) NOT NULL,
  `DateFin` varchar(20) NOT NULL,
  `titreFormation` varchar(255) NOT NULL,
  `nomUniversite_Ecole` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dateAjoutFormation` date NOT NULL,
  PRIMARY KEY (`idFormation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_profil`
--

CREATE TABLE IF NOT EXISTS `t_profil` (
  `idProfil` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `sexe` varchar(10) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `lienWeb` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `statut` enum('0','1') NOT NULL DEFAULT '1',
  `avatar` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nomEntreprise` varchar(255) NOT NULL,
  `secteurActivite` varchar(255) NOT NULL,
  `siteWeb` varchar(255) NOT NULL,
  PRIMARY KEY (`idProfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `t_profil`
--

INSERT INTO `t_profil` (`idProfil`, `idUser`, `nom`, `prenom`, `sexe`, `adresse`, `ville`, `pays`, `telephone`, `lienWeb`, `profil`, `statut`, `avatar`, `dateCreation`, `nomEntreprise`, `secteurActivite`, `siteWeb`) VALUES
(1, 1, 'mbikayi', 'junior', 'M', '49 rue kwango', 'Lubumbashi', 'congo Kinshasa', '0972299615', '', 'developpeur des applications web', '0', 'img1.jpg', '2018-07-10 12:38:26', '', '', ''),
(2, 2, 'katayi', 'junior', 'M', '85 rue kasai', 'yakosh', 'maroc', '978546123', '', 'developpeur des applications web', '0', '1b6eef16-85f7-41b1-a292-fbe8d82d2b0e.jpg', '2018-07-10 15:44:28', '', '', ''),
(3, 4, 'aguero', 'mak', 'M', '27 av colonnel lenge', 'kinshasa', 'congo', '7894561231', '', 'developpeur des applications web', '0', 'image2.jpg', '2018-07-10 17:10:15', '', '', ''),
(4, 5, 'kapinga', 'julie', 'F', '78945 abrico street', 'durban', 'afrique du sud', '789654123', 'http://www.juliework.org', 'developpeur des applications web', '0', 'visu_1432208786.jpg', '2018-07-11 01:03:17', '', '', ''),
(5, 7, 'Alexandrino', 'juditho', 'F', '8796 karlos capv', 'portoco', 'bresil', '123456789', 'http://www.judithbusness.com', 'developpeur des applications web', '0', '240408-1509120R53018.jpg', '2018-07-11 01:17:13', '', '', ''),
(6, 8, '', NULL, '', '789, sdfhfsd', 'Lubumbashi', 'congo Kinshasa', '789456123', '', '', '1', 'list-img1.jpg', '2018-07-13 09:23:09', 'tenke foungouroume', 'Mining', ''),
(7, 10, 'patrick', 'marco', 'M', '8798, street jumlah', 'mogas', 'maroc', '+100876545613', '', 'developpeur des applications web', '1', 'img3.jpg', '2018-07-14 02:39:57', '', '', ''),
(8, 12, '', NULL, '', '7845, rotation coshkak', 'jeffersonville', 'usa', '8756942315', '', '', '1', 'banner.jpg', '2018-07-15 14:58:51', 'stars hotel', '', 'http://www.starthotel.org'),
(9, 13, '', NULL, '', '75, system cardison', 'bukavu', 'congo Kinshasa', '9874562589', 'thhp:travelon', '', '1', 'logo (3).png', '2018-07-15 17:35:35', 'trevelon voyage', '', 'http://www.travelon-voyage.org'),
(10, 15, 'yavson', 'hibrahim', 'M', '789, desparados', 'madrid', 'espagn', '2471632436', '', 'designer', '0', 'about-img6.jpg', '2018-07-15 17:59:46', 'http://www.dev-hibrahim.net', '', ''),
(11, 16, 'nsenga', 'israel', 'M', '86 , avenue 4 katuba kangana', 'Lubumbashi', 'congo Kinshasa', '0976630004', '', 'designer photographe', '0', 'img2.jpg', '2018-07-16 07:49:50', '', '', ''),
(12, 9, '', NULL, '', '879, avenue de sapinier', 'Lubumbashi', 'congo Kinshasa', '8795462317', '', '', '1', 'ga8.jpg', '2018-07-16 09:57:43', 'rwashi mining', 'Mining', 'http://www.rwashimining.org'),
(13, 17, 'yougour', 'christel', 'F', '879, street unold', 'bunia', 'congo Kinshasa', '0852848285', '', '', '0', 'efa5cf51c0711fafc61e73f90e05bc12-s-.png', '2018-07-16 10:17:26', '', '', ''),
(14, 18, 'nday', 'migael', 'F', '8579, avenue de sapinier', 'banguel', 'afganistan', '', '', '', '0', 'ab2.png', '2018-07-16 12:51:08', '', '', ''),
(15, 24, '', NULL, '', 'CONGO', 'Lubumbashi', 'RDC', '+243844652256', '', '', '1', '', '2018-09-03 00:37:47', 'trick SA', 'management et logistic', ''),
(16, 25, '', NULL, '', '27 av. colonnel lenge', 'lubumbashi', 'RDC', '848456465', 'http://lindsay.org', '', '1', '', '2018-09-06 12:57:45', 'linda', 'media et publicite', 'http://linds.org');

-- --------------------------------------------------------

--
-- Structure de la table `t_publication`
--

CREATE TABLE IF NOT EXISTS `t_publication` (
  `datePublication` datetime NOT NULL,
  `idPublication` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) NOT NULL,
  `titrePublication` varchar(255) NOT NULL,
  `designationPublication` varchar(255) NOT NULL,
  `descriptionPublication` text NOT NULL,
  PRIMARY KEY (`idPublication`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `t_publication`
--

INSERT INTO `t_publication` (`datePublication`, `idPublication`, `idProfil`, `titrePublication`, `designationPublication`, `descriptionPublication`) VALUES
('2018-07-11 03:40:02', 1, 5, 'fhgjkdshgh', 'article', 'gb'),
('2018-07-11 05:29:35', 2, 5, 'c encore moi et je vous salu', 'article', 'hvchgsjcfshvsajasfjasb ashsa'),
('2018-07-11 22:02:30', 3, 1, 'Vous crÃ©ez des pages web et vous passez beaucoup (trop) de temps avec le CSS?', 'article', 'La base indispensable est de possÃ©der de bonnes notions en HTML et CSS. Vous avez des lacunes ? Comblez-les avec\r\nle cours de Mathieu Nebra.\r\nPour comprendre la mise en oeuvre des plugins jQuery, vous aurez besoin des quelques bases dans ce domaine. Il vous\r\nen manque ? Alors vous pouvez rÃ©parer Ã§a en lisant le cours de Michel Martin.\r\nSi vous voulez modifier Bootstrap pour l''adapter Ã  vos besoins il vous faudra connaÃ®tre LESS. LÃ  aussi vous avez besoin\r\nd''un coup de main ? Il existe Ã©galement un cours'),
('2018-07-15 18:13:58', 4, 1, 'tout va bien', 'article', 'dsgfjvoulez modifier Bootstrap pour l''adapter Ã  vos besoins il vous faudra connaÃ®tre LESS. LÃ  aussi vous avez besoin d''un coup de main ? Il existe Ã©galement un cours');

-- --------------------------------------------------------

--
-- Structure de la table `t_relations`
--

CREATE TABLE IF NOT EXISTS `t_relations` (
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `statut` enum('0','1','2') NOT NULL DEFAULT '0',
  `datecreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_relations`
--

INSERT INTO `t_relations` (`id_user1`, `id_user2`, `statut`, `datecreation`) VALUES
(4, 2, '0', '2018-07-10 17:14:32'),
(1, 7, '0', '2018-07-12 05:31:13'),
(1, 7, '0', '2018-07-12 05:33:01');

-- --------------------------------------------------------

--
-- Structure de la table `t_users`
--

CREATE TABLE IF NOT EXISTS `t_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `datecreation` datetime NOT NULL,
  `typecompte` varchar(125) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `t_users`
--

INSERT INTO `t_users` (`id`, `pseudo`, `password`, `email`, `datecreation`, `typecompte`) VALUES
(1, 'junior', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'junior@gmail.com', '2018-07-10 09:32:56', 'professionel'),
(2, 'junior1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'junior1@gmail.com', '2018-07-10 15:43:26', 'professionel'),
(4, 'tresor', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tresor@gmail.com', '2018-07-10 17:09:04', 'professionel'),
(5, 'julie', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'julie@gmail.com', '2018-07-11 01:01:29', 'professionel'),
(7, 'judith', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'judith@gmail.com', '2018-07-11 01:12:29', 'professionel'),
(8, 'tenke', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tenke@gmail.com', '2018-07-12 05:46:08', 'pourvoyeur'),
(9, 'rwashi', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'rwashi@gmail.com', '2018-07-12 08:14:30', 'pourvoyeur'),
(10, 'jun', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jun@gmail.com', '2018-07-14 02:03:04', 'professionel'),
(12, 'shotel', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'shotel@gmail.com', '2018-07-15 14:55:41', 'pourvoyeur'),
(13, 'travelon', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'trevelon@gmail.com', '2018-07-15 17:33:25', 'pourvoyeur'),
(14, 'yves', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yves@gmail.com', '2018-07-15 17:37:47', 'pourvoyeur'),
(15, 'yav', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yav@gmail.com', '2018-07-15 17:39:29', 'professionel'),
(16, 'isra', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'isra@gmail.com', '2018-07-16 07:47:32', 'professionel'),
(17, 'yaya', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yaya@gmail.com', '2018-07-16 10:03:29', 'professionel'),
(18, 'mimi', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mimi@gmail.com', '2018-07-16 12:00:13', 'professionel'),
(19, 'jude', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jude@gmail.com', '2018-07-16 15:37:01', 'professionel'),
(20, 'paulo', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'paulo@gmail.com', '2018-07-16 16:51:57', 'professionel'),
(21, 'abigael', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'abigael@yahoo.fr', '2018-07-18 07:30:19', 'professionel'),
(22, 'lindsy', 'cbb7353e6d953ef360baf960c122346276c6e320', 'lindmukole@gmail.com', '2018-08-12 18:19:32', 'professionel'),
(23, 'gfghjh', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'limdy@gmail.com', '2018-08-12 18:23:54', 'pourvoyeur'),
(24, 'ggj', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'fff@gmail.com', '2018-09-03 00:35:49', 'pourvoyeur'),
(25, 'lindsay', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lind@gmail.com', '2018-09-06 12:54:44', 'pourvoyeur');
--
-- Base de données :  `test`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
