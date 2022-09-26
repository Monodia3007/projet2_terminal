-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 05 Juin 2022 à 11:10
-- Version du serveur :  5.6.20-log
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nom_de_la_base_de_donnees`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(255) NOT NULL,
  `titre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `texte` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `theme` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`, `theme`) VALUES
(1, 'Projet acadÃ©mique', 'wqzse(drtfhyujoikjgyutfryed-Ã¨tfhujoiputhngfbykud,gnfbd\r\n;j,hgsbfdvsVEHRQESYTKDU?HGFNB\r\nU?T GRBFQVDBSTRYTKDDGNFBDNYKTUYUY?HGFNDVS\r\nHTER FC?LKH7BG V?C.', 'TRUC');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` char(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mdp`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845'),
(2, 'redrock', '60e633d1f6c383c122082f9572f0da3d'),
(3, 'daniela', 'c3b7e9e48b61227b04ca1db8ab3c77c6'),
(4, 'lecteur', 'd4d3aa99e4163c43f50cf4e974094af4');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
