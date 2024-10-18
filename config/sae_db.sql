-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 oct. 2024 à 12:22
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(11) NOT NULL,
  `ad_mail_admin` varchar(255) NOT NULL,
  `mdp_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `id_carte` int(11) NOT NULL,
  `texte_carte` varchar(280) NOT NULL,
  `date_soumission` date NOT NULL,
  `ordre_soumission` int(11) NOT NULL,
  `choix1_population` int(11) NOT NULL,
  `choix1_finances` int(11) NOT NULL,
  `choix2_population` int(11) NOT NULL,
  `choix2_finances` int(11) NOT NULL,
  `id_deck` int(11) NOT NULL,
  `id_createur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`id_carte`, `texte_carte`, `date_soumission`, `ordre_soumission`, `choix1_population`, `choix1_finances`, `choix2_population`, `choix2_finances`, `id_deck`, `id_createur`) VALUES
(1, 'zadiuazdoiauhoih', '2024-10-14', 1, -4, 2, 2, -1, 1, 0),
(2, 'Une paysanne addict au fentanyl propose un coup d\'etat contre le menuisier', '2024-10-14', 2, -2, 2, -1, 2, 1, 0),
(3, 'Test creer une carte et tout la genre wow', '2024-10-14', 3, -100, 200, 200, -100, 1, 0),
(4, 'Lil young pandillas, empereur du venezuela viens proposer une alliance', '2024-10-14', 4, 8, 2, 1, 0, 1, 0),
(5, 'La météo est clémente, les récoltes sont très bonne mais il faut plus de gueux pour les récolter', '2024-10-14', 5, -2, 5, 1, 1, 1, 0),
(6, 'Le japon souhaite se venger de pearl harbor, on est carrément pas concernés mais askip peut importe le choix on va mourir', '2024-10-15', 6, -100, -100, -99, -99, 1, 0),
(7, 'Un homme se prétends ancien aventurier, il a mis fin a sa carrière suite a une flèche dans le genou. Il se dit désormais bac +4 spé trésorier', '2024-10-15', 7, 1, 5, 0, 1, 1, 0),
(8, 'HAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '2024-10-17', 8, -5, 2, 4, -3, 1, 0),
(9, 'Le H avait il raison?', '2024-10-18', 1946, 1000, 1000, -50, -60, 1, 0),
(10, 'MORT INFERNALE DU FEU DE LENFER CA BRULE AU PURGATOIRE QUE LES TRAITES LA BAS NOUS CEST ISLAMAUMAX', '2024-10-18', 0, -5, -2, 2, 3, 1, 1),
(11, 'Grosse poelée de poeles de pomme de patate douce la hmm j\'ai faim DE JUSTICE', '2024-10-18', 0, -4, -5, 2, 5, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `carte_aleatoire`
--

CREATE TABLE `carte_aleatoire` (
  `num_carte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `createur`
--

CREATE TABLE `createur` (
  `id_createur` int(11) NOT NULL,
  `nom_createur` varchar(100) NOT NULL,
  `ad_mail_createur` varchar(255) NOT NULL,
  `mdp_createur` varchar(255) NOT NULL,
  `genre` enum('Homme','Femme','Autre') NOT NULL,
  `ddn` date NOT NULL,
  `role_createur` enum('utilisateur','admin') DEFAULT 'utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `createur`
--

INSERT INTO `createur` (`id_createur`, `nom_createur`, `ad_mail_createur`, `mdp_createur`, `genre`, `ddn`, `role_createur`) VALUES
(1, 'José', 'jose@gmail.com', '$2y$10$3S48KL16AAlEVGGWC7v6sOz3wPhHfmtE4sz6zcL9lydsTWaRsJBTu', 'Homme', '1980-02-14', 'utilisateur'),
(2, 'admin', 'admin@admin.com', '$2y$10$Rvc/CWyTvVSp37H71HOL6.7dI81CY3dUKoKH2UHknY2L614Lbc9Hm', 'Homme', '1970-07-26', 'admin'),
(3, 'pussy', 'caca@proute.vagin', '$2y$10$bSIQUSx7hsE/.WlQVfpCVes9V3Rl4AdNo5Zo.1noty.kUaO/bvd9.', 'Autre', '1000-10-10', 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `deck`
--

CREATE TABLE `deck` (
  `id_deck` int(11) NOT NULL,
  `titre_deck` varchar(255) NOT NULL,
  `date_debut_deck` date NOT NULL,
  `date_fin_deck` date NOT NULL,
  `nb_cartes` int(11) NOT NULL,
  `nb_jaime` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `deck`
--

INSERT INTO `deck` (`id_deck`, `titre_deck`, `date_debut_deck`, `date_fin_deck`, `nb_cartes`, `nb_jaime`) VALUES
(1, 'mort infernale', '2024-10-16', '2024-10-26', 10, 0),
(2, 'Annihilation massive', '2024-10-17', '2024-10-27', 15, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `ad_mail_admin` (`ad_mail_admin`);

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`id_carte`),
  ADD KEY `fk_deck` (`id_deck`);

--
-- Index pour la table `carte_aleatoire`
--
ALTER TABLE `carte_aleatoire`
  ADD PRIMARY KEY (`num_carte`);

--
-- Index pour la table `createur`
--
ALTER TABLE `createur`
  ADD PRIMARY KEY (`id_createur`),
  ADD UNIQUE KEY `nom_createur` (`nom_createur`),
  ADD UNIQUE KEY `ad_mail_createur` (`ad_mail_createur`);

--
-- Index pour la table `deck`
--
ALTER TABLE `deck`
  ADD PRIMARY KEY (`id_deck`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `carte`
--
ALTER TABLE `carte`
  MODIFY `id_carte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `createur`
--
ALTER TABLE `createur`
  MODIFY `id_createur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `deck`
--
ALTER TABLE `deck`
  MODIFY `id_deck` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carte`
--
ALTER TABLE `carte`
  ADD CONSTRAINT `fk_deck` FOREIGN KEY (`id_deck`) REFERENCES `deck` (`id_deck`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
