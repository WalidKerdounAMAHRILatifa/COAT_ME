-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 25 avr. 2020 à 03:23
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `coat_me`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_Categorie` int(11) NOT NULL,
  `nom_Categorie` varchar(100) NOT NULL,
  `id_Produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_Commande` int(11) NOT NULL,
  `num_Commande` varchar(100) NOT NULL,
  `date_Commande` date NOT NULL,
  `id_Client` int(11) DEFAULT NULL,
  `id_Produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_Panier` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  `total` double NOT NULL,
  `quantite_Panier` int(11) NOT NULL,
  `id_Produit` int(11) DEFAULT NULL,
  `couleur` enum('Rouge','Vert','Blanc','Jaune','bleu','Gris','Marron','Noir') NOT NULL,
  `taille` enum('S','M','L','XL') NOT NULL,
  `id_Client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_Panier`, `sub_total`, `total`, `quantite_Panier`, `id_Produit`, `couleur`, `taille`, `id_Client`) VALUES
(15, 420, 420, 1, 15, 'Blanc', 'L', 2),
(18, 355, 710, 2, 4, 'Rouge', 'M', 19),
(19, 320, 320, 1, 3, 'Gris', 'XL', 19),
(20, 399, 798, 2, 6, 'Jaune', 'S', 1),
(21, 700, 1400, 2, 2, 'Noir', 'M', 1);

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE `payement` (
  `id_Payement` int(11) NOT NULL,
  `date_Payement` date NOT NULL,
  `tele` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `paye` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `zipCode` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `id_Commande` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_Personne` int(11) NOT NULL,
  `nom_Personne` varchar(100) DEFAULT NULL,
  `prenom_Personne` varchar(100) DEFAULT NULL,
  `email_Personne` varchar(100) NOT NULL,
  `tele_Personne` int(11) DEFAULT NULL,
  `psw_Personne` varchar(100) NOT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `role` enum('Admin','Client') NOT NULL DEFAULT 'Client',
  `nickname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_Personne`, `nom_Personne`, `prenom_Personne`, `email_Personne`, `tele_Personne`, `psw_Personne`, `adresse`, `pays`, `role`, `nickname`) VALUES
(18, 'kerdoun', 'walid', 'walid1@gmail.com', 123456789, '12345', 'agadir', 'maroc', 'Client', 'walid');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_Produit` int(11) NOT NULL,
  `nom_Produit` varchar(100) NOT NULL,
  `image_Produit` longtext NOT NULL,
  `prix_Produit` double NOT NULL,
  `size_Produit` set('S','M','L','XL') NOT NULL,
  `Quantite_Produit` int(11) NOT NULL,
  `description_Produit` varchar(100) NOT NULL,
  `gender` enum('men','women') DEFAULT 'women',
  `couleur` set('Noir','Rouge','Vert','Blanc','Jaune','bleu','Gris','Marron') NOT NULL DEFAULT 'Noir',
  `materiels` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_Produit`, `nom_Produit`, `image_Produit`, `prix_Produit`, `size_Produit`, `Quantite_Produit`, `description_Produit`, `gender`, `couleur`, `materiels`) VALUES
(1, 'Mantau Classique', 'class1.jpg', 664, 'S,M,L,XL', 40, 'Mantau Classique Pour les Femmes', 'women', 'Noir,Rouge,Vert,Blanc,bleu', '60% cotton'),
(2, 'Mantau Classique', '1.jpg', 700, 'S,M,L', 40, 'Mantau Classique Pour les Hommes', 'men', 'Noir,Rouge,Blanc', '45% Polyester, 55% Coton'),
(3, 'Mantau Casual', 'casual1.jpg', 320, 'S,XL', 40, 'Mantau Casual Pour les Femmes', 'women', 'bleu,Gris,Marron', '25% nylon, 75% Polyester.'),
(4, 'Mantau Casual', 'ca1.jpg', 355, 'S,M,L,XL', 40, 'Mantau Casual Pour les Hommes', 'men', 'Noir,Rouge,Vert,bleu,Marron', '75% nylon, 25% Polyester.'),
(5, 'Mantau Sportif', 'w1.jpg', 400, 'S,L,XL', 40, 'Mantau Sportif Pour les Hommes', 'men', 'Rouge,Blanc,bleu,Gris', '25% nylon, 65% Polyester,10% Rayon.'),
(6, 'Veste Sportif', 'sport1.jpg', 399, 'S,M,XL', 40, 'Veste Sportif Pour les Femmes', 'women', 'Blanc,Jaune,bleu,Gris', '60% Rayon, 10% Soy, 30%cotton.'),
(7, 'Mantau Classique', '2.jpg', 586, 'S,M,L', 40, 'Mantau Classique Pour les Hommes', 'men', 'Noir,Rouge,Jaune,bleu', '14% Soy, 100%cotton.'),
(8, 'Mantau Classique', 'class2.jpg', 555, 'S,M,L,XL', 40, 'Mantau Classique Pour les Femmes', 'women', 'Noir,Rouge,Vert,Blanc,Jaune,bleu,Gris,Marron', '25% Combed Cotton, 75% Ecosil polyester.'),
(9, 'Mantau Casual', 'casual2.jpg', 270, 'S,L,XL', 40, 'Mantau Casual Pour les Femmes', 'women', 'Noir,Vert,Jaune,Gris', '100 polyester.'),
(10, 'Veste Casual', 'ca2.jpg', 330, 'S,M,XL', 40, 'Veste Casual Pour les Hommes', 'men', 'Noir,Vert,Blanc,bleu,Gris', '100% cotton.'),
(11, 'Veste Sportif', 'sport2.jpg', 280, 'S,M,L', 40, 'Mantau Sportif Pour les Femmes', 'women', 'Rouge,Vert,Blanc,Gris,Marron', '95% cotton, 5% Damask.'),
(12, 'Mantau Sportif', 'w2.jpg', 290, 'S,L,XL', 40, 'Mantau Sportif Pour les Hommes', 'men', 'Vert,Blanc,Jaune,Gris,Marron', '35% linen , 65 Cotton Lisle.'),
(13, 'Mantau Classique', '3.jpg', 389, 'S,M,XL', 40, 'Mantau Classique Pour les Hommes', 'men', 'Noir,Vert,bleu,Gris,Marron', '100% polyester.'),
(14, 'Mantau Classique', 'class3.jpg', 379, 'S,L', 40, 'Mantau Classique Pour les Femmes', 'women', 'Noir,Vert,Blanc', '95% polyester, 5% cotton.'),
(15, 'Veste Casual', 'ca3.jpg', 420, 'M,L', 40, 'Veste Casual Pour les Hommes', 'men', 'Blanc,bleu,Gris', '62% cotton, 15% polyester, 33% Eyelet.'),
(16, 'Mantau Casual', 'casual3.jpg', 500, 'S,XL', 40, 'Mantau Casual Pour les Femmes', 'women', 'Noir,Vert,Jaune,Gris', '23% French terry, 10% Gaberdine, 3% Lining, 50% cotton.'),
(17, 'Mantau Sportif', 'sport3.jpg', 600, 'S,M,L', 40, 'Mantau Sportif Pour les Femmes', 'women', 'Vert,Blanc,bleu,Gris,Marron', '25% Microfiber, 75% Nylon.'),
(18, 'Mantau Sportif', 'w3.jpg', 450, 'M,L,XL', 40, 'Mantau Sportif Pour les Hommes', 'men', 'Rouge,Vert,bleu,Gris', '55% cotton , 12% Nylon, 32% Soy.'),
(19, 'Mantau Classique', 'class4.jpg', 550, 'M,L,XL', 40, 'Mantau Classique Pour les Femmes', 'women', 'Noir,Vert,bleu,Marron', '75% Polyester, 20% Tactel.'),
(20, 'Mantau Classique', '4.jpg', 499, 'M,L', 40, 'Mantau Classique Pour les Homme', 'men', 'Noir,Blanc,bleu', '14% Tactel, 50% cotton.'),
(21, 'Mantau Casual', 'ca4.jpg', 380, 'S,M,L,XL', 40, 'Mantau Casual Pour les Hommes', 'men', 'Noir,Rouge,Vert,Jaune,bleu,Gris', '15% Hydrophilic Fabric, 90% cotton .'),
(22, 'Mantau Casual', 'casual4.jpg', 375, 'S,M,L', 40, 'Mantau Casual Pour les Femmes', 'women', 'Vert,Blanc,Jaune,bleu,Marron', '100% cotton.'),
(23, 'Mantau Sportif', 'w4.jpg', 288, 'S,L,XL', 40, 'Mantau Sportif Pour les Hommes', 'men', 'Noir,Rouge,Jaune,bleu,Gris', '20% Fiberfill,35% Elastane, 20% cotton.'),
(24, 'Mantau Sportif', 'sport4.jpg', 435, 'S,M,L,XL', 40, 'Mantau Sportif Pour les Femmes', 'women', 'Vert,Blanc,Gris,Marron', '100% polyester.'),
(1501, 'walid', 'logo.png', 1500, 'S,M,L,XL', 50, 'ddddd', 'women', 'Jaune,bleu', 'ddd');

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

CREATE TABLE `review` (
  `id_Review` int(11) NOT NULL,
  `date_Review` date DEFAULT NULL,
  `stars` int(11) NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  `id_Produit` int(11) DEFAULT NULL,
  `Nom` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `review`
--

INSERT INTO `review` (`id_Review`, `date_Review`, `stars`, `commentaire`, `id_Produit`, `Nom`, `Email`) VALUES
(1, '2020-03-09', 3, 'J\'aime bien ce Mantau Classique, c\'est une pièce efficace pour la protection du froid.', 2, 'Ahmed', 'Ahmed@gmail.com'),
(4, '2020-03-09', 4, 'Tous mes conseils pour ce manteau classique , c\'est extraordinaire.', 2, 'Nabil', 'Nabil@gmail.com'),
(5, '2020-03-09', 1, 'c\'est vraiment très agréable !!!', 1, 'Asmae', 'Asmae@gmail.com'),
(6, '2020-03-09', 3, ' c\'est vraiment très bien, c\'est super, c\'est top ....!!\r\n', 1, 'Nadia', 'Nadia@gmail.com'),
(13, '2020-03-16', 2, 'pas mal', 2, 'lamia', 'lamia@gmail.com'),
(14, '2020-03-16', 1, 'Je le deteste !!!', 4, 'omar', 'omar@gmail.com'),
(15, '2020-03-16', 5, 'Tres comfortable ', 6, 'laila', 'laila@gmail.com'),
(16, '2020-03-16', 3, 'good one', 4, 'adam', 'adam@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_Categorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_Commande`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_Panier`);

--
-- Index pour la table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`id_Payement`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_Personne`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_Produit`);

--
-- Index pour la table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_Review`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_Panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_Personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_Produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1502;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `id_Review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
