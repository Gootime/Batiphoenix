-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 11 mars 2018 à 18:38
-- Version du serveur :  10.1.25-MariaDB
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db675106822`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`, `description`) VALUES
(4, 'Plomberie', 'La catégorie plomberie'),
(5, 'Sanitaire', 'La catégorie des toilettes'),
(6, 'Menuiserie Int', 'La catégorie menuiserie intérieure'),
(7, 'Menuiserie Ext', 'La catégorie Menuiserie Extérieur'),
(8, 'Gros oeuvre', 'La  catégorie des briques'),
(10, 'Electricité', 'La catégorie électrique'),
(11, 'Revêtement de sol', 'La catégorie sols'),
(12, 'Peinture', 'La catégorie peinture'),
(13, 'Cloison/Doublage', 'La catégorie cloison/doublage'),
(14, 'Etanchéité', 'La catégorie étanchéité'),
(15, 'VRD', 'La catégorie Voirie réseaux divers');

-- --------------------------------------------------------

--
-- Structure de la table `chantier`
--

CREATE TABLE `chantier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `adresse` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `entreprise` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `permis` varchar(13) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date_entry` date NOT NULL,
  `date_out` date NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `onMap` varchar(3) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `chantier`
--

INSERT INTO `chantier` (`id`, `name`, `adresse`, `entreprise`, `permis`, `status`, `date_entry`, `date_out`, `id_user_fk`, `onMap`) VALUES
(12, 'Chantier pilote', 'Paris', 'Batiphoenix', '2252522525225', 'pending', '2017-03-27', '0000-00-00', 11, 'Oui'),
(13, 'chantier pilote 2', 'Bagneux (92)', 'Batiphoenix', '6352227257241', 'pending', '2017-03-27', '0000-00-00', 11, 'Oui'),
(14, 'Chantier de Melvin LEROY', 'Rungis (94)', 'Aucunes', '54874968465', 'pending', '2017-03-29', '0000-00-00', 22, '');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `num_commande` varchar(255) NOT NULL,
  `produts_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `map` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `name`, `adresse`, `map`) VALUES
(7, 'Kevin CHERUEL', '4 Place du Berry 92390 Villeneuve-la-garenne', 'Oui'),
(10, 'Ecole 42', '96 Boulevard Bessières 75017 Paris', 'Oui'),
(11, 'Melvin Leroy', '43 Rue Richelieu 92230 Genneviliers', 'Oui'),
(12, 'So\'ouest', '38 Rue d\'Alsace  92300  Levallois-Perret', 'Oui');

-- --------------------------------------------------------

--
-- Structure de la table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `address` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(33, 'Kevin CHERUEL', '4 Place du Berry 92390 Villeneuve-la-garenne', 48.933937, 2.330560, ''),
(37, 'Ecole 42', '96 Boulevard Bessières 75017 Paris', 48.896683, 2.318376, ''),
(39, 'Melvin Leroy', '43 Rue Richelieu 92230 Genneviliers', 48.929455, 2.293117, ''),
(42, 'Test_user test_user', '1 Avenue de la paix 75001 Paris', 48.868572, 2.330261, ''),
(44, 'So\'ouest', '38 Rue d\'Alsace  92300  Levallois-Perret', 48.892342, 2.298438, '');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(255) NOT NULL,
  `nom_du_produit` text NOT NULL,
  `description` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `id_provider` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Dimension` varchar(255) NOT NULL,
  `Date_entry` date NOT NULL,
  `Date_out` date NOT NULL,
  `Prix` int(11) NOT NULL,
  `idChantier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nom_du_produit`, `description`, `cat_id`, `picture`, `id_provider`, `status`, `Stock`, `Dimension`, `Date_entry`, `Date_out`, `Prix`, `idChantier`) VALUES
(7, 'Polystyrène 2500x1200x200', 'Panneaux de polystyrène 2500x1200x200mm pour réhausses, réservations, Joint de Dilatation.\r\nFabricant : KNAUF\r\n\r\n\r\n\r\nPour télécharger la fiche produit veuillez vous inscrire\r\n', 15, 'img/articles/knauf.jpg', 7, 'valide', 200, '225x255x300', '2017-03-27', '0000-00-00', 0, 14),
(8, 'Tuyaux en grès Ø300', 'Système de canalisation en grès\r\n\r\nQuantité : 120 ml\r\ndiamètre : 300\r\n\r\nPour télécharger la fiche produit veuillez vous inscrire', 15, 'img/articles/tuyaux.jpg', 15, 'valide', 1, '300', '2017-03-27', '0000-00-00', 0, 14),
(9, 'Laine de verre ep:4.5cm', 'Pour télécharger la fiche produit veuillez vous inscrire\r\n', 13, 'img/articles/isolant.jpg', 7, 'valide', 162, '300x150x120', '2017-03-28', '0000-00-00', 0, 13),
(10, 'Clôtures vertes grillagées', 'Pour télécharger la fiche produit veuillez vous inscrire', 15, '../img/articles/cloture.png', 7, 'valide', 630, '193x200', '2017-03-28', '0000-00-00', 0, 13),
(11, 'Plancher technique', 'Pour télécharger la fiche produit veuillez vous inscrire', 11, '../img/articles/plancher.png', 7, 'valide', 2100, '300x120x150', '2017-03-28', '0000-00-00', 0, 13),
(12, 'Parquet flottant en chêne', 'Pour télécharger la fiche produit veuillez vous inscrire', 11, '../img/articles/parquet.jpg', 7, 'valide', 35, '300x120x150', '2017-03-28', '0000-00-00', 0, 12),
(13, 'Portes en bois à âme pleine', 'Description non disponible, veuillez vous inscrire', 10, '../img/articles/portebois.png', 6, 'valide', 50, '300x120x150', '2017-03-28', '0000-00-00', 0, 12),
(16, 'Peinture bois microporeux', 'Pour accéder à la fiche produit, veuillez vous inscrire', 12, '../img/articles/peinture.png', 7, 'valide', 15000, '100x100x100', '2017-03-28', '0000-00-00', 0, 12),
(19, 'Chemins de cable', 'Pour télécharger la fiche produit veuillez vous inscrire', 10, '../img/articles/chemincable.png', 7, 'valide', 145, '10x10x10', '2017-03-28', '0000-00-00', 0, 13),
(24, 'Bastaing en chêne 10x10', 'Pour télécharger la fiche produit veuillez vous inscrire', 8, '../img/articles/bastaing.png', 7, 'valide', 110, '225x255x300', '2017-03-27', '0000-00-00', 0, 12),
(25, 'Radiateur en fonte', 'Pour télécharger la fiche produit veuillez vous inscrire', 5, '../img/articles/radiateur.jpg', 10, 'valide', 4, '300x120x150', '2017-03-28', '0000-00-00', 0, 12);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `telephone` int(25) NOT NULL,
  `date_inscription` date NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `power_rank` int(1) NOT NULL,
  `color` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Societe` varchar(255) NOT NULL,
  `Fonction` varchar(255) NOT NULL,
  `nbr_chantier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `adresse`, `telephone`, `date_inscription`, `pseudo`, `password`, `power_rank`, `color`, `status`, `Societe`, `Fonction`, `nbr_chantier`) VALUES
(17, 'Kesia', 'VASCO', 'kesia.vasconcelos@hec.edu', '', 627366070, '2017-03-15', 'kesia.vasconcelos', '$1$vfzAKNvx$pWcP7.kWtF0LdpQrzgPQk0', 10, '#214761', 'valide', 'BATIPHOENIX', 'Co-founder', 150),
(18, 'Lucile', 'Hamon', 'lucile.hamon@hec.edu', '', 658634431, '2017-03-15', 'lucile.hamon', '$1$qDdQ0uYi$JVb9AX5pjybQ7ouZvE5621', 10, '#214761', 'valide', 'BATIPHOENIX', 'Reine du royaume des chats ', 250),
(20, '', '', '', '', 0, '2017-03-25', '', '$1$FOs1eN99$KKDLS89GFf5G220Qi4KYB/', 0, '#214761', 'no-valide', '', '', 0),
(22, 'Leroy', 'Melvin', 'melvinleroy92@gmail.com', '', 678141396, '2017-03-27', 'melvinleroy92', '$1$1L8YV.Qa$NopKJ8fPnQ8tTnuzrdBBa.', 10, '#214761', 'valide', 'Aucunes', 'Freelance', 1),
(24, 'CHERUEL', 'Kevin', 'kevin.cheruel.dev@gmail.com', '4 place du Berry 92390 Villeneuve-la-Garenne', 785826547, '2017-03-29', 'kevin.cheruel.dev', 'tarasse', 10, '#406110', 'valide', 'Aucunes', 'Développeur Back-End', 0),
(25, 'Binet', 'Maxime', 'mbinet@student.42.fr', '', 604436830, '2017-06-05', 'mbinet', 'aca4544c6fbe4df1a04da7487e85c2dc', 0, '#214761', 'no-valide', 'mbinet', '', 0),
(26, 'VASCONCELOS', 'Kesia', 'contact@batiphoenix.com', '', 627366071, '2017-06-14', 'contact', 'aca4544c6fbe4df1a04da7487e85c2dc', 0, '#214761', 'valide', 'Batiphoenix', 'CEO', 0),
(28, 'HAMON', 'LULU', 'lucile.hmn@gmail.com', '', 0, '2017-06-15', 'lucile.hmn', 'aca4544c6fbe4df1a04da7487e85c2dc', 0, '#214761', 'no-valide', 'PANCAKE FACTORY', '', 0),
(33, 'parquier', 'adrien', 'adrien_parquier@hotmail.com', '', 2147483647, '2017-06-27', 'adrien_parquier', 'aca4544c6fbe4df1a04da7487e85c2dc', 0, '#214761', 'no-valide', 'UMB-FFB', 'Responsable technique', 0),
(34, 'test', 'test', 'test@h', '', 122556644, '2017-07-10', 'test', 'aca4544c6fbe4df1a04da7487e85c2dc', 0, '#214761', 'no-valide', 'test', 'test', 0),
(35, 'Soucksengphet', 'Souriya', 'Soucksouck@hotmail.com', '', 620805001, '2017-07-26', 'Soucksouck', 'aca4544c6fbe4df1a04da7487e85c2dc', 0, '#214761', 'no-valide', '', '', 0),
(36, 'Bourrut Lacouture', 'Thibaud', 't.bourrutlacouture@brezillon.fr', '', 760499071, '2017-08-08', 't.bourrutlacouture', 'aca4544c6fbe4df1a04da7487e85c2dc', 0, '#214761', 'no-valide', 'BREZILLON', 'Conducteur de travaux Principal', 0),
(37, 'Santos', 'Cristovao ', 'Tophe_s94@hotmail.com', '', 0, '2017-09-01', 'Tophe_s94', 'aca4544c6fbe4df1a04da7487e85c2dc', 0, '#214761', 'no-valide', 'Les 4s immobilier', 'Gerant', 0),
(38, 'test', 'test', 'test@test.fr', '', 606060606, '2017-09-05', 'test', 'aca4544c6fbe4df1a04da7487e85c2dc', 0, '#214761', 'no-valide', 'test', 'test', 0),
(39, 't', 'teste', 'test', '', 0, '2017-09-06', '', 'aca4544c6fbe4df1a04da7487e85c2dc', 0, '#214761', 'no-valide', 'tes', 'test', 0),
(40, 'Gérard', 'Lumière', 'tarasse@tarasse.fr', '', 785826547, '2017-09-06', 'tarasse', '21a3d7bf8fdb8c4fce65466d5a7b7a02', 0, '#214761', 'no-valide', 'indépendant', 'tarasse', 0),
(41, 'Cheruel', 'Kevin', 'test@teeesssstttt.fr', '', 785826547, '2017-09-11', 'test', 'cc03e747a6afbbcbf8be7668acfebee5', 0, '#214761', 'no-valide', 'TEST', 'test', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `chantier`
--
ALTER TABLE `chantier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD UNIQUE KEY `idProduit` (`idProduit`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail / pseudo` (`mail`,`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `chantier`
--
ALTER TABLE `chantier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
