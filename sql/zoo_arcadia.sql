-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 21 nov. 2024 à 10:26
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
-- Base de données : `zoo_arcadia`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `race` varchar(50) NOT NULL,
  `habitat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`animal_id`, `name`, `race`, `habitat_id`) VALUES
(1, 'Liberty', 'Aigle royal', 1),
(2, 'Rexou', 'Kangourous roux', 1),
(3, 'Grispoil', 'Quokka', 1),
(4, 'Fouisseur', 'Sanglier', 2),
(6, 'Rusé', 'Renard roux', 2),
(7, 'Giant', 'Elan', 3),
(8, 'Ghost', 'Lynx', 3),
(9, 'Hunter', 'Renard polaire', 3),
(10, 'Cham', 'Chamois', 4),
(11, 'Moufle', 'Mouflon', 4),
(12, 'Poilu', 'Gypaète barbu', 4),
(13, 'Majesté', 'Lion', 5),
(14, 'Titan', 'Eléphant d\'Afrique', 5),
(15, 'Grancou', 'Girafe', 5);

-- --------------------------------------------------------

--
-- Structure de la table `employe_report`
--

CREATE TABLE `employe_report` (
  `report_id` int(11) NOT NULL,
  `last_meal` varchar(50) DEFAULT NULL,
  `last_passage` date DEFAULT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employe_report`
--

INSERT INTO `employe_report` (`report_id`, `last_meal`, `last_passage`, `animal_id`) VALUES
(1, '50g de feuille d\'acacia.', '2024-11-22', 3),
(2, '500g de lièvre.', '2024-11-29', 1),
(10, NULL, '2024-11-05', 2),
(12, NULL, NULL, 6),
(13, NULL, NULL, 8),
(14, NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Structure de la table `habitat`
--

CREATE TABLE `habitat` (
  `habitat_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `habitat`
--

INSERT INTO `habitat` (`habitat_id`, `name`, `description`, `comment`) VALUES
(1, 'Désert Australien', 'Le désert Australien est conçu pour reproduire fidèlement les conditions arides et hostiles de l\'Outback australien. Les visiteurs y trouveront un paysage dominé par des dunes de sable rouge, des formations rocheuses spectaculaires et des plantes résistantes à la sécheresse comme les spinifex et les acacias.', ''),
(2, 'Forêt Française', 'la fôret française recréer l\'atmosphère dense et verdoyante des forêts tempérées de France. Les visiteurs peuvent y observer une riche biodiversité, entourée d\'arbres majestueux, de sous-bois luxuriants et de cours d\'eau tranquilles.', ''),
(3, 'Forêt Nordique', 'La fôret nordique est conçu pour reproduire l\'environnement frais et dense des forêts boréales et tempérées du nord de l\'Europe et de l\'Amérique du Nord. Les visiteurs y trouveront des conifères imposants, des sols moussus, des rivières claires et des sous-bois ombragés', ''),
(4, 'Montagne', 'La montagne est conçu pour recréer les conditions escarpées et rocailleuses des chaînes montagneuses du monde entier, avec des pentes abruptes, des falaises, des prairies alpines et des forêts clairsemées. Les visiteurs peuvent observer une variété d\'espèces adaptées à ces environnements rigoureux et souvent inhospitaliers', ''),
(5, 'Savane', 'La savane est conçu pour recréer les vastes étendues d\'herbes hautes, les arbres éparses et les prairies sèches typiques des régions de savane. Ce paysage ouvert et chaud abrite des animaux majestueux qui ont évolué pour s\'adapter à des conditions de chaleur extrême et à une vie au grand air.', '');

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `isVisible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `review`
--

INSERT INTO `review` (`review_id`, `pseudo`, `review`, `rating`, `isVisible`) VALUES
(1, 'Elodie', 'J&#039;ai adoré mon séjour a Arcadia. Le personnel est adorable et le bien être des animaux est parfaitement respecté ! Je recommande !', 5, 1),
(8, 'Didier', 'Un zoo incroyable ! Les animaux sont bien soignés et les enclos spacieux. Parfait pour une sortie en famille !', 4, 1),
(9, 'Marc', 'Superbe visite ! Le personnel est accueillant et les animaux semblent heureux. Une expérience à refaire !', 5, 1),
(10, 'Julie', 'Magnifique endroit, idéal pour les enfants. Beaucoup d’animaux et des informations intéressantes. On a adoré !', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`role_id`, `label`) VALUES
(1, 'Administrateur'),
(2, 'Vétérinaire'),
(3, 'Employé(e)');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`service_id`, `name`, `description`) VALUES
(1, 'Visite guidée du parc', 'Venez découvrir notre parc, son histoire et nos animaux dans une visite guidé du parc par nos soigneur.'),
(2, 'Visite en petit train', 'Faite un tour du parc grace a notre petit train.'),
(3, 'Notre restaurant', 'Manger en compagnie de nos vedettes grâce a notre bais vitré qui donne sur le parc.');

-- --------------------------------------------------------

--
-- Structure de la table `target_value`
--

CREATE TABLE `target_value` (
  `target_id` int(11) NOT NULL,
  `value` int(11) NOT NULL DEFAULT 0,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `target_value`
--

INSERT INTO `target_value` (`target_id`, `value`, `animal_id`) VALUES
(1, 1, 1),
(3, 0, 2),
(4, 0, 3),
(5, 0, 4),
(6, 0, 6),
(7, 0, 7),
(8, 0, 8),
(9, 0, 9),
(10, 0, 10),
(11, 0, 11),
(12, 0, 12),
(13, 0, 13),
(14, 0, 14),
(15, 0, 15);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `firstname`, `role_id`) VALUES
('admin@zoo-arcadia.fr', 'admin123', 'Arcadia', 'José', 1),
('employe1@zoo-arcadia.fr', 'employe123', 'Doe', 'John', 3),
('veto1@zoo-arcadia.fr', 'veto123', 'Marie', 'Elodie', 2);

-- --------------------------------------------------------

--
-- Structure de la table `veteninary_report`
--

CREATE TABLE `veteninary_report` (
  `report_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `food` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `animal_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `veteninary_report`
--

INSERT INTO `veteninary_report` (`report_id`, `date`, `etat`, `detail`, `food`, `weight`, `animal_id`, `username`) VALUES
(50, '2024-11-20', 'Bonne santé', 'Se retrouve souvent seul. A surveiller', 'souris', '500g', 1, 'veto1@zoo-arcadia.fr'),
(56, '2024-11-20', 'Agé', 'Boite a la jambe gauche', NULL, NULL, 14, 'veto1@zoo-arcadia.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `habitat` (`habitat_id`);

--
-- Index pour la table `employe_report`
--
ALTER TABLE `employe_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `animal` (`animal_id`);

--
-- Index pour la table `habitat`
--
ALTER TABLE `habitat`
  ADD PRIMARY KEY (`habitat_id`);

--
-- Index pour la table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Index pour la table `target_value`
--
ALTER TABLE `target_value`
  ADD PRIMARY KEY (`target_id`),
  ADD KEY `Target value` (`animal_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `role` (`role_id`);

--
-- Index pour la table `veteninary_report`
--
ALTER TABLE `veteninary_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `animal` (`animal_id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `employe_report`
--
ALTER TABLE `employe_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `habitat`
--
ALTER TABLE `habitat`
  MODIFY `habitat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `target_value`
--
ALTER TABLE `target_value`
  MODIFY `target_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `veteninary_report`
--
ALTER TABLE `veteninary_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_3` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`habitat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `employe_report`
--
ALTER TABLE `employe_report`
  ADD CONSTRAINT `employe_report_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `target_value`
--
ALTER TABLE `target_value`
  ADD CONSTRAINT `target_value_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `veteninary_report`
--
ALTER TABLE `veteninary_report`
  ADD CONSTRAINT `veteninary_report_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `veteninary_report_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
