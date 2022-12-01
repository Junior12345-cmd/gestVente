-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 29 nov. 2022 à 17:23
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
-- Base de données : `gestvente`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `nomGerant` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`id`, `libelle`, `nomGerant`) VALUES
(3, 'Parakou Gah', 'Moussa'),
(4, 'Nikki', ''),
(5, 'N’Dali', ''),
(6, 'Gamia', ''),
(7, 'Kandi', ''),
(8, 'Malanville', ''),
(9, 'Wassa', ''),
(10, 'Banikora', ''),
(11, 'Kérou', '');

-- --------------------------------------------------------

--
-- Structure de la table `pointvente`
--

CREATE TABLE `pointvente` (
  `id` int(11) NOT NULL,
  `idAgence` int(11) NOT NULL,
  `date` date NOT NULL,
  `montantVendu` double NOT NULL,
  `montantComplement` double NOT NULL,
  `montantRetire` double NOT NULL,
  `montantRestant` double NOT NULL,
  `depenses` double NOT NULL,
  `montantVerse` double NOT NULL,
  `sommeVentes` double NOT NULL,
  `typePoint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `idAgence` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `password` text NOT NULL,
  `poste` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `idAgence`, `email`, `telephone`, `password`, `poste`, `etat`, `created_at`, `updated_at`) VALUES
(3, NULL, 'juniorsanni527@gmail.com ', 91672213, '91672213', 'Admin', 'Actif', '2022-11-28 09:07:11', '2022-11-28 09:07:11'),
(4, 3, 'gerant@gmail.com', 123456, '123456', 'Gerant', 'Actif', '2022-11-28 12:25:20', '2022-11-28 12:25:20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pointvente`
--
ALTER TABLE `pointvente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAgence` (`idAgence`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `pointvente`
--
ALTER TABLE `pointvente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pointvente`
--
ALTER TABLE `pointvente`
  ADD CONSTRAINT `pointvente_ibfk_1` FOREIGN KEY (`idAgence`) REFERENCES `agence` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
