-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 28 Janvier 2020 à 18:59
-- Version du serveur :  5.7.11
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cake_sondage`
--

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(60) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `medias`
--

INSERT INTO `medias` (`id`, `titre`, `url`, `type`, `created`, `modified`) VALUES
(1, 'Couleur', 'img/colors.png', 'image', '2020-01-28 20:15:00', NULL),
(2, 'Culture', 'docs/culture.pdf', 'document', '2020-02-01 21:15:00', NULL),
(3, 'Calendrier', 'img/calendar.png', 'image', '2020-02-01 21:20:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `responses`
--

CREATE TABLE `responses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(255) CHARACTER SET latin1 NOT NULL,
  `count` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `responses`
--

INSERT INTO `responses` (`id`, `title`, `count`, `created`, `modified`) VALUES
(1, 'Bleu', 5, '2015-06-11 20:15:00', NULL),
(2, 'Noir', 1, '2015-06-11 20:15:00', NULL),
(3, 'Jaune', 2, '2015-06-11 20:15:00', NULL),
(4, 'Lundi', 0, '2015-06-11 20:15:00', NULL),
(5, 'Samedi', 6, '2015-06-11 20:15:00', NULL),
(6, 'Dimanche', 10, '2015-06-11 20:15:00', NULL),
(7, '10 ans', 25, '2015-06-11 20:15:00', NULL),
(8, '25 ans', 0, '2015-06-11 20:15:00', NULL),
(9, '100 ans', 2, '2015-06-11 20:15:00', NULL),
(10, 'Sucré', 1, '2015-06-11 20:15:00', NULL),
(11, 'Salé', 0, '2015-06-11 20:15:00', NULL),
(12, '1515', 0, '2015-06-11 20:15:00', NULL),
(13, '1789', 12, '2015-06-11 20:15:00', NULL),
(14, '1999', 1, '2015-06-11 20:15:00', NULL),
(93, 'mai', 1, '2015-06-11 20:15:00', NULL),
(94, 'juin', 2, '2015-06-11 20:15:00', NULL),
(95, 'juillet', 3, '2015-06-11 20:15:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `responses_surveys`
--

CREATE TABLE `responses_surveys` (
  `response_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `responses_surveys`
--

INSERT INTO `responses_surveys` (`response_id`, `survey_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 2),
(7, 3),
(8, 3),
(9, 3),
(10, 4),
(11, 4),
(12, 5),
(13, 5),
(14, 5),
(93, 13),
(94, 13),
(95, 13);

-- --------------------------------------------------------

--
-- Structure de la table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` char(255) CHARACTER SET latin1 NOT NULL,
  `media_id` int(10) UNSIGNED DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `surveys`
--

INSERT INTO `surveys` (`id`, `user_id`, `question`, `media_id`, `picture`, `created`, `modified`) VALUES
(1, 1, 'Quelle est votre couleur préférée?', 1, 'img/colors.png', '2015-06-11 20:15:00', NULL),
(2, 1, 'Quel est votre jour de la semaine préféré?', 3, 'img/calendar.png', '2015-06-11 20:15:00', NULL),
(3, 2, 'Combien d\'années représentent une décennie?', 2, NULL, '2015-06-11 20:15:00', NULL),
(4, 1, 'Vous préférez sucré ou salé?', NULL, NULL, '2015-06-11 20:15:00', NULL),
(5, 2, 'Quel est l\'année de la Révolution française?', NULL, NULL, '2015-06-11 20:15:00', NULL),
(13, 1, 'Quel mois partez-vous en vacances?', NULL, NULL, '2015-06-11 20:15:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(60) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `password`, `email`, `created`, `modified`) VALUES
(1, 'marc', '$2y$10$gwt8adVNXsBZFIBOGGE7DOmitTOO4UM9gDwGAustSmfBoCmg2icfO', 'marc@sull.com', '2015-06-11 20:15:00', '2017-11-25 12:07:02'),
(2, 'paul', '$2y$10$m5r8IQdIUfbzBGD9Dck6XOtPe4VohuTCylUgT1UbuqC5zMUyFwCD.', 'paul@sull.com', '2015-06-11 20:15:00', '2017-11-25 12:07:18'),
(3, 'andré', '$2y$10$3zizIDyujnjRAo6LatXF.OEjkwbetl1/Y6eg29N4EPkAesg42TeZG', 'andre@sull.com', '2015-06-11 20:15:00', '2017-11-25 12:08:11'),
(4, 'bruno', '$2y$10$XcxiExLA.CTqwrThgbsYR.H99DQ1ULlQJPSplaEqZ1Bc3pMnP9vLW', 'bruno@sull.com', '2015-06-11 20:15:00', '2017-11-25 12:07:35'),
(5, 'fred', '$2y$10$9JbLKEpmGNoPAR5pasoJZ.gP.u9BMNXvG2PTMizHIpuUGhtfPOtCO', 'fred@sull.com', '2015-06-11 20:15:00', '2017-11-25 12:07:49'),
(6, 'clement', '$2y$10$/f5.lsog53yb/WO1lP.rQuHtSFtDZZZZoNppoTePL5HmM/L5gwETO', 'clem@sull.com', '2015-12-12 13:36:41', '2017-11-25 12:07:57'),
(7, 'jim', '$2y$10$BKnFG4eGYB1CiwSWoJbSyuaILUdQXjCJPIQSHK/qJ168tt/aPcxUe', 'jim@sull.com', '2020-01-17 17:09:20', '2020-01-17 17:09:20');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `responses_surveys`
--
ALTER TABLE `responses_surveys`
  ADD PRIMARY KEY (`response_id`,`survey_id`),
  ADD KEY `survey_key` (`survey_id`);

--
-- Index pour la table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `question` (`question`),
  ADD KEY `user_key` (`user_id`),
  ADD KEY `category_id` (`media_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT pour la table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `surveys_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `medias` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
