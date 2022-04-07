-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 07 Avril 2022 à 07:52
-- Version du serveur :  5.7.11
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `cat_code` int(11) NOT NULL,
  `cat_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`cat_code`, `cat_nom`) VALUES
(1, 'Tablette'),
(2, 'Ordinateur'),
(3, 'Imprimante');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `emp_date` date DEFAULT NULL,
  `emp_produit` int(11) NOT NULL,
  `emp_dateRetour` date NOT NULL,
  `VIS_MATRICULE` char(10) NOT NULL,
  `statut` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `emprunt`
--

INSERT INTO `emprunt` (`emp_date`, `emp_produit`, `emp_dateRetour`, `VIS_MATRICULE`, `statut`) VALUES
('2022-12-01', 40, '2022-04-07', 'COH', 'rendu'),
('2022-04-07', 60, '2007-04-22', 'ABK', 'rendu'),
('2022-04-07', 63, '2007-04-22', 'ABK', 'rendu'),
('2022-04-07', 61, '2007-04-22', 'ABK', 'rendu'),
('2022-04-07', 40, '2022-04-07', 'ABK', 'rendu'),
('2022-04-07', 41, '2022-04-07', 'ABK', 'rendu'),
('2022-04-07', 57, '2022-04-07', 'ABK', 'rendu'),
('2022-04-07', 57, '2022-04-07', 'ABK', 'rendu'),
('2022-04-07', 40, '2022-04-07', 'ABK', 'rendu');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `prod_code` int(11) NOT NULL,
  `prod_libelle` varchar(255) NOT NULL,
  `prod_prix` float NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `prod_categorie` int(11) NOT NULL,
  `prod_statut` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`prod_code`, `prod_libelle`, `prod_prix`, `prod_image`, `prod_categorie`, `prod_statut`) VALUES
(40, 'Dell Latitude 4400', 1800, '', 1, 'Disponible'),
(41, 'Dell Inspiron 16 Plus\r\n', 918.5, '', 2, 'Disponible'),
(42, 'Dell Inspiron 15\r\n', 887.6, '', 2, 'Disponible'),
(43, 'Dell XPS 13 9305', 898.99, '', 2, 'Disponible'),
(54, 'Dell XPS 13 9310', 1399, '', 2, 'Disponible'),
(55, 'Dell XPS 15 9510', 1749, '', 2, 'Disponible'),
(56, 'Samsung Galaxy Tab S8 Ultra 5G', 1699, '', 1, 'Disponible'),
(57, 'Xiaomi Pad 5', 365, '', 1, 'Disponible'),
(58, 'Samsung Galaxy Tab S7 FE SM-T733N', 459.99, '', 1, 'Disponible'),
(59, 'Lenovo Tab P11 Pro 4G LTE', 509.99, '', 1, 'Disponible'),
(60, 'Lenovo Yoga Tab 11 11', 349.9, '', 1, 'Disponible'),
(61, 'EcoTank ET-2815', 249.99, '', 3, 'Disponible'),
(62, 'EcoTank ET-2850', 349.99, '', 3, 'Disponible'),
(63, 'Hp Color LaserJet Pro 178nw', 259.9, '', 3, 'Disponible');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `VIS_MATRICULE` char(10) NOT NULL,
  `VIS_NOM` char(25) DEFAULT NULL,
  `VIS_PRENOM` char(50) DEFAULT NULL,
  `VIS_ADRESSE` char(50) DEFAULT NULL,
  `VIS_CP` char(10) DEFAULT NULL,
  `VIS_VILLE` char(30) DEFAULT NULL,
  `VIS_DATEEMBAUCHE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `visiteur`
--

INSERT INTO `visiteur` (`VIS_MATRICULE`, `VIS_NOM`, `VIS_PRENOM`, `VIS_ADRESSE`, `VIS_CP`, `VIS_VILLE`, `VIS_DATEEMBAUCHE`) VALUES
('ABK', 'Abecassis', 'orel', '12 rue des cocotiers', '94000', 'Creteil', '2022-02-22'),
('COH', 'cohen', 'raphael', '31 rue des rosiers', '94000', 'Creteil', '2022-02-22'),
('YAT', 'Taieb', 'Yaakov', '31 rue Raspail', '93100', 'Montreuil', '2022-02-22');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`cat_code`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD KEY `emp_produit` (`emp_produit`),
  ADD KEY `VIS_MATRICULE` (`VIS_MATRICULE`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`prod_code`),
  ADD KEY `prod_categorie` (`prod_categorie`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`VIS_MATRICULE`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `cat_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `prod_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emp_produit` FOREIGN KEY (`emp_produit`) REFERENCES `produit` (`prod_code`),
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`VIS_MATRICULE`) REFERENCES `visiteur` (`VIS_MATRICULE`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`prod_categorie`) REFERENCES `categorie` (`cat_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
