-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 juin 2023 à 17:39
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motpasse` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `email`, `motpasse`, `nom`) VALUES
(1, 'ihab.soufiane@admin.com', '6d297ae02757263a9d55abe664325ce5', 'ihab');//mtp:ihab

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `createur` int(255) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `createur`, `date_creation`, `date_modification`) VALUES
(1, 'homme', 'this is for men', 1, '0000-00-00', NULL),
(3, 'women', 'this article for women', 0, '2023-06-04', NULL),
(4, 'kids', 'this article for kids', 0, '2023-06-04', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` double NOT NULL,
  `panier` int(11) NOT NULL,
  `date_modification` date NOT NULL,
  `produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `date_creation`, `quantite`, `total`, `panier`, `date_modification`, `produit`) VALUES
(0, '2023-06-05', 2, 54000, 0, '2023-06-05', 2),
(0, '2023-06-05', 3, 81000, 0, '2023-06-05', 3);

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

CREATE TABLE `paniers` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `coleur` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `prix` double NOT NULL,
  `date_creation` date DEFAULT NULL,
  `createur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `coleur`, `size`, `image`, `categorie`, `prix`, `date_creation`, `createur`) VALUES
(1, 'pull', ' this pull coton', 'red', 'm', '2.jpg', '1', 10000, '2023-06-05', 1),
(2, 't-shirt', 'this is T-shirt for men', 'rouge', 'm', 'buy-1.jpg', '1', 27000, '2023-06-05', 1),
(3, 'chemise', 'chemise for men', 'blanc', '48', 'product2.jpg', '1', 45000, '2023-06-05', 1),
(4, 'tenu', 'tenu for kids', 'pink', 's', 'cat4.jpg', '4', 60000, '2023-06-05', 1),
(5, 'pull', 'pull for women', 'pink', 'L', 'f4.jpg', '3', 50000, '2023-06-05', 1);

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `createur` int(11) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `produit`, `quantite`, `createur`, `date_creation`) VALUES
(0, 4, 27, 1, '2023-06-05'),
(0, 5, 27, 1, '2023-06-05');

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `motpasse` varchar(255) NOT NULL,
  `etat` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `visiteurs`
--

INSERT INTO `visiteurs` (`id`, `nom`, `email`, `tel`, `motpasse`, `etat`) VALUES
(4, 'SOUFIANE', 'ihab@gmail.fr', '25523084', 'd41d8cd98f00b204e9800998ecf8427e', 1),//mtp:123
(5, '', 'ihab@gmail.fr', '', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(6, '', 'ihab.soufiane@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(7, '', 'ihab@gmail.fr', '', 'd41d8cd98f00b204e9800998ecf8427e', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
