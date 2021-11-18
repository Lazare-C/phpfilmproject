-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 07 oct. 2021 à 20:01
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phpdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE `acteurs` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `acteurs`
--

INSERT INTO `acteurs` (`id`, `nom`, `prenom`) VALUES
(1, 'Leonardo', 'DiCaprio'),
(2, 'Rami', 'Malek'),
(3, 'Besson', 'Luc'),
(4, '', ''),
(5, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `Casting`
--

CREATE TABLE `Casting` (
  `film_id` int NOT NULL,
  `acteur_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Casting`
--

INSERT INTO `Casting` (`film_id`, `acteur_id`) VALUES
(13, 1),
(25, 1),
(13, 3);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int NOT NULL,
  `nom` varchar(200) NOT NULL,
  `annee` int NOT NULL,
  `score` float NOT NULL,
  `nbVotants` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `nom`, `annee`, `score`, `nbVotants`) VALUES
(1, 'Star Wars', 1977, 8.9, 14182),
(2, 'Pulp Fiction', 1994, 8.4, 11693),
(3, 'Blade Runner', 1982, 8.6, 8665),
(4, 'Titanic', 1997, 9.2, 8129),
(5, 'Braveheart', 1995, 8.4, 8074),
(6, 'Empire Strikes Back, The', 1980, 8.5, 8050),
(7, 'Shawshank Redemption, The', 1994, 8.8, 7850),
(8, 'Independence Day', 1996, 7, 7138),
(9, 'Usual Suspects, The', 1995, 8.7, 6981),
(10, 'Raiders of the Lost Ark', 1981, 8.4, 6488),
(11, '2001: A Space Odyssey', 1968, 8.4, 6413),
(12, 'Forrest Gump', 1994, 7.8, 6269),
(13, 'Aliens', 1986, 8.3, 5811),
(14, 'Silence of the Lambs, The', 1991, 8.3, 5715),
(15, 'Princess Bride, The', 1987, 8.4, 5522),
(16, 'Terminator 2: Judgment Day', 1991, 8, 5513),
(17, 'Casablanca', 1942, 8.7, 5489),
(18, 'Monty Python and the Holy Grail', 1974, 8.4, 5319),
(19, 'Star Trek: First Contact', 1996, 8.2, 5298),
(20, 'Fargo', 1996, 8.2, 5293),
(21, 'Twelve Monkeys', 1995, 8, 5287),
(22, 'Trainspotting', 1996, 8.1, 5233),
(23, 'Godfather, The', 1972, 8.7, 5211),
(24, 'Se7en', 1995, 8.1, 5107),
(25, 'Back to the Future', 1985, 7.8, 5103),
(26, 'Rock, The', 1996, 8, 4938),
(27, 'Reservoir Dogs', 1992, 8.3, 4861),
(28, 'Apocalypse Now', 1979, 8.3, 4860),
(30, 'Apollo 13', 1995, 7.8, 4778),
(31, 'Clockwork Orange, A', 1971, 8.4, 4767),
(32, 'Jurassic Park', 1993, 7.4, 4707),
(33, 'English Patient, The', 1996, 8.1, 4689),
(34, 'One Flew Over the Cuckoo\'s Nest', 1975, 8.5, 4545),
(35, 'Dr. Strangelove or: How I Learned to Stop Worrying and Love the Bomb', 1963, 8.6, 4451),
(39, 'Terminator, The', 1984, 7.8, 4225),
(48, 'True Lies', 1994, 7.3, 3601),
(94, 'Total Recall', 1990, 7.1, 2305),
(180, 'Predator', 1987, 7.2, 1604),
(263, 'Conan the Barbarian', 1981, 6.9, 1271),
(321, 'Twins', 1988, 6.3, 1126),
(334, 'Last Action Hero', 1993, 5.9, 1107),
(410, 'Dave', 1993, 7.4, 962),
(440, 'Kindergarten Cop', 1990, 6.2, 894),
(471, 'Running Man, The', 1987, 6.3, 856),
(629, 'Commando', 1985, 6.1, 673),
(746, 'Conan the Destroyer', 1984, 5.4, 542),
(793, 'Money Pit, The', 1986, 5.8, 482),
(910, 'Brady Bunch Movie, The', 1995, 6.3, 412),
(932, 'Red Heat', 1988, 5.8, 402),
(960, 'Terminator 2: 3-D', 1996, 8.7, 384),
(975, 'Night Shift', 1982, 6.6, 377),
(1106, 'Junior', 1994, 5.9, 329),
(1339, 'Jingle All the Way', 1996, 6, 262),
(1353, 'Outrageous Fortune', 1987, 6.1, 258),
(1551, 'Raw Deal', 1986, 5, 215),
(1622, 'Batman and Robin', 1997, 3.9, 1925),
(1644, 'Red Sonja', 1985, 4.6, 404),
(1645, 'SharkNado', 2003, 0.3, 1234);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteurs`
--
ALTER TABLE `acteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Casting`
--
ALTER TABLE `Casting`
  ADD PRIMARY KEY (`film_id`,`acteur_id`),
  ADD KEY `acteur_id` (`acteur_id`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acteurs`
--
ALTER TABLE `acteurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1646;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Casting`
--
ALTER TABLE `Casting`
  ADD CONSTRAINT `acteur_id` FOREIGN KEY (`acteur_id`) REFERENCES `acteurs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `film_id` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
