-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 22 oct. 2022 à 16:25
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `malki_business`
--

-- --------------------------------------------------------

--
-- Structure de la table `api_client`
--

CREATE TABLE `api_client` (
  `id` int(11) NOT NULL,
  `client_id` varchar(50) NOT NULL,
  `key_client` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `api_client`
--

INSERT INTO `api_client` (`id`, `client_id`, `key_client`) VALUES
(1, 'malekani_project', '20a3238259f91e579d10395baa8498e79c020ec7');

-- --------------------------------------------------------

--
-- Structure de la table `t_approvisionnement`
--

CREATE TABLE `t_approvisionnement` (
  `CodeApprov` int(11) NOT NULL,
  `CodeProduit` int(11) NOT NULL,
  `Cout` float NOT NULL,
  `Quantite` int(11) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_approvisionnement`
--

INSERT INTO `t_approvisionnement` (`CodeApprov`, `CodeProduit`, `Cout`, `Quantite`, `Created_On`) VALUES
(1, 8, 100, 10, '2022-10-22 13:16:35');

-- --------------------------------------------------------

--
-- Structure de la table `t_article`
--

CREATE TABLE `t_article` (
  `CodeArticle` int(11) NOT NULL,
  `Titre` text NOT NULL,
  `Contenue` text NOT NULL,
  `Image` text NOT NULL,
  `Created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CodeCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie_article`
--

CREATE TABLE `t_categorie_article` (
  `CodeCategorie` int(11) NOT NULL,
  `Categorie` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie_produit`
--

CREATE TABLE `t_categorie_produit` (
  `CodeCategorie` int(11) NOT NULL,
  `Categorie` varchar(200) NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_categorie_produit`
--

INSERT INTO `t_categorie_produit` (`CodeCategorie`, `Categorie`, `Image`) VALUES
(2, 'Electronique', 'themetidy-Bulb-Responsive-eCommerce-Electric-Shop-Free-Shopify-Theme-collection-image-2_1024x102406bf.jpg'),
(3, 'Alimentaire', 'téléchargement (2).jfif'),
(4, 'Habillement', 'premium-by-jack-jones-veste-homme-bleu.jpg'),
(5, 'Divers', 'divers-produits-de-beauté-25306126.jpg'),
(6, 'Livres', '07.jpg'),
(7, 'Cosmetique', 'Quelques-idées-reçues-sur-certains-produits-cosmétiques-Setalmaa.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `t_paiement`
--

CREATE TABLE `t_paiement` (
  `CodePaiement` int(11) NOT NULL,
  `CodeTransaction` text NOT NULL,
  `Client` int(11) NOT NULL,
  `Montant` float NOT NULL,
  `Created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_paiement`
--

INSERT INTO `t_paiement` (`CodePaiement`, `CodeTransaction`, `Client`, `Montant`, `Created_on`) VALUES
(1, 'tok_1KQIJlHLxZc21QVikrJoQKg3', 1, 100, '2022-02-06 21:30:48'),
(2, 'tok_1KQIR5HLxZc21QViOfAIGCz2', 1, 250, '2022-02-06 21:38:22'),
(3, 'tok_1KQITNHLxZc21QViNABJeaRG', 1, 250, '2022-02-06 21:40:45'),
(4, 'tok_1KQIfXHLxZc21QViE60Y98Qk', 1, 250, '2022-02-06 21:53:19'),
(5, 'tok_1KQIghHLxZc21QVi4nvbXy9f', 1, 250, '2022-02-06 21:54:31');

-- --------------------------------------------------------

--
-- Structure de la table `t_produit`
--

CREATE TABLE `t_produit` (
  `CodeProduit` int(11) NOT NULL,
  `Produit` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Photo` text NOT NULL,
  `Counter` int(11) NOT NULL,
  `Date_view` datetime NOT NULL,
  `Prix` float NOT NULL,
  `CodeCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_produit`
--

INSERT INTO `t_produit` (`CodeProduit`, `Produit`, `Description`, `Photo`, `Counter`, `Date_view`, `Prix`, `CodeCategorie`) VALUES
(2, 'Kuniokoa Turbo', 'The forced-draft Kuniokoa can burn dry or wet wood or non-carbonized briquettes', 'kuniokoa-turbo-by-burn.png', 0, '0000-00-00 00:00:00', 50, 2),
(3, 'Ecran desketop mac', 'Ecran desketop mac', 'themetidy-Bulb-Responsive-eCommerce-Electric-Shop-Free-Shopify-Theme-collection-image-2_1024x102406bf.jpg', 0, '0000-00-00 00:00:00', 100, 2),
(4, 'Imprimente EPSON', 'Epson Noir et blanc', 'themetidy-Bulb-Responsive-eCommerce-Electric-Shop-Free-Shopify-Theme-collection-image-5_1024x1024d753.jpg', 0, '0000-00-00 00:00:00', 150, 2),
(5, 'Clavier externe', 'Clavier sans fil', 'themetidy-Bulb-Responsive-eCommerce-Electric-Shop-Free-Shopify-Theme-collection-image-6_1024x1024dd8b.jpg', 0, '0000-00-00 00:00:00', 10, 2),
(6, 'Souris sans fil', 'Marque HP sans fil', 'themetidy-Bulb-Responsive-eCommerce-Electric-Shop-Free-Shopify-Theme-collection-image-3_1024x10247b3f.jpg', 0, '0000-00-00 00:00:00', 10, 2),
(7, 'Baffle sans fil', 'Baffle de bonne qualité', 'themetidy-Bulb-Responsive-eCommerce-Electric-Shop-Free-Shopify-Theme-collection-image-4_1024x10240718.jpg', 0, '0000-00-00 00:00:00', 150, 2),
(8, 'HP ENVY', 'Ecran tactile', 'HP-Spectre-300x238.jpg', 0, '0000-00-00 00:00:00', 500, 2),
(9, 'HP Pavillon 15-ooeg', 'Ecran tactile', 'c07961346_1750x1285.webp', 0, '0000-00-00 00:00:00', 400, 2),
(10, 'Veste homme hotellerie 2 boutons', '2 bouttons', 'veste-homme-hotellerie-2-boutons-lafont-kontir-veste-de-costume-pour-homme.jpg', 0, '0000-00-00 00:00:00', 150, 4),
(11, 'Costume veste homme deux poitrine', '2 poitrines. de marque italienne', 'costume-veste-homme-deux-poitrine-simple-revers-cl.jpg', 0, '0000-00-00 00:00:00', 120, 4),
(12, 'Veste Teddy noir et blanc', 'Marque nike', 'mtx_255225_TEDDY-497_BLACK-WHITE_20210309T164443_01.jpg', 0, '0000-00-00 00:00:00', 20, 4),
(13, 'Vestes mi-saison', 'Veste mi-saison de training', 'vestes-mi-saison.jpg', 0, '0000-00-00 00:00:00', 20, 4),
(14, 'Veste d\'hiver', 'Veste d\'hiver de bonne qualité', 'f759ccd64adb4a80bc578cdc35116f7c.jpg', 0, '0000-00-00 00:00:00', 30, 4),
(15, 'veste chauffante homme', 'Veste chauffante pour homme', 'veste-chauffante-homme.jpg', 0, '0000-00-00 00:00:00', 15, 4),
(16, 'Orange', 'Orange de masisi', '440px-Oranges_-_whole-halved-segment.jpg', 0, '0000-00-00 00:00:00', 1, 3),
(17, 'Maracouja', 'From masisi', '21393-21393-passion-fruit-711267.jpg', 0, '0000-00-00 00:00:00', 1, 3),
(18, 'Fraise', 'Fraise de bonne qualite', 'Fraise.jpg', 0, '0000-00-00 00:00:00', 1, 3),
(19, 'Avocat', 'Avocat mur', 'shutterstock_1058981363-260x195.jpg', 0, '0000-00-00 00:00:00', 1, 3),
(20, 'Papaye', 'Papaye de rutshuru', 'la-papaye.jpeg', 0, '0000-00-00 00:00:00', 1, 3),
(21, 'Ananas', 'Ananas d\'idjwi', 'photo-1550258987-190a2d41a8ba.jfif', 0, '0000-00-00 00:00:00', 2, 3),
(22, 'Day by day', 'L\'huile day by day', 'daybyday-creme-pot-a-la-amande.jpg', 0, '0000-00-00 00:00:00', 2, 7),
(23, 'Coco pulp', 'Huile de coco', 'image_1024.jfif', 0, '0000-00-00 00:00:00', 2, 7),
(24, 'Carolight', 'Huile carolight', 'Sans-titre-58.jpg', 0, '0000-00-00 00:00:00', 2, 7),
(25, 'Familia', 'Huile familia', 'CHFAM20.png', 0, '0000-00-00 00:00:00', 1, 7),
(26, 'Clere', 'Huile clere', 'téléchargement (3).jfif', 0, '0000-00-00 00:00:00', 3, 7),
(27, 'Glycerine eclaircissant', 'Glyce eclaircissant de kinshasa', 'glycerine-eclaircissante.jpg', 0, '0000-00-00 00:00:00', 2, 7),
(28, 'Savon medisoft', 'Savon de bonne qualite', 'medi-soft.jpg', 0, '0000-00-00 00:00:00', 1, 7),
(29, 'La république démocratique du Congo', 'Histoire de la RDC', 'Screenshot_20220202-185521_Phoenix_2.jpg', 0, '0000-00-00 00:00:00', 4, 6),
(30, 'Mini Manuel de Chimie organique', 'Apprenne la chimie avec ce livre', 'IMG_20220204_010623_360.jpg', 0, '0000-00-00 00:00:00', 2, 6),
(31, 'Chimie générale', 'Livre de chimie generale', 'IMG_20220204_011933_993.jpg', 0, '0000-00-00 00:00:00', 6, 6),
(33, 'Sciences Politiques', 'Livre de sciences politiques', 'IMG_20220204_015838_626.jpg', 0, '0000-00-00 00:00:00', 3, 6),
(34, 'Brosse a dent', 'Bonne qualite de brosse a dent', 'Cepillo_Duralon.jpg', 0, '0000-00-00 00:00:00', 1, 5),
(35, 'Parodontax', 'Dentifrice de bonne qualite', 'parodontax-dentifrice-blancheur-3-1554891857.png', 0, '0000-00-00 00:00:00', 1, 5),
(36, 'Cofam', 'Cadenat de meillere qualite', 'candado-de-laton-alargo-quality-plus-40mm-800x800.jpg', 0, '0000-00-00 00:00:00', 2, 5),
(37, 'Casque gaming casque gamer pour ps4', 'Jolie casquette', 'casque-gaming-casque-gamer-pour-ps4-xbox-one-ninte.jpg', 0, '0000-00-00 00:00:00', 20, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_publication`
--

CREATE TABLE `t_publication` (
  `CodePub` int(11) NOT NULL,
  `Titre` varchar(200) NOT NULL,
  `Detail` text NOT NULL,
  `Photo` text NOT NULL,
  `Created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_publication`
--

INSERT INTO `t_publication` (`CodePub`, `Titre`, `Detail`, `Photo`, `Created_on`) VALUES
(2, 'Macbook air dernier modèle chez nous. welcome', 'Macbook air dernier modèle chez nous. welcome', 'slider-3.jpg', '2022-10-10 08:41:42');

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `CodeUser` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Photo` text NOT NULL,
  `CodeCategorie` int(11) NOT NULL,
  `Created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`CodeUser`, `Username`, `Email`, `Password`, `Photo`, `CodeCategorie`, `Created_on`) VALUES
(1, 'Baraka', 'esbarakabigega@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 1, '2022-10-22 10:24:31'),
(2, 'Michael', 'micka@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 2, '2022-10-22 13:00:17'),
(4, 'Akili', 'akili@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 1, '2022-02-05 06:30:59'),
(6, 'Shekinah', 'shekinah@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 1, '2022-10-22 13:23:28'),
(9, 'Carin', 'carin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 2, '2022-10-22 14:05:27'),
(10, 'Shekinah', 'malekani@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 2, '2022-10-22 14:18:52');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `api_client`
--
ALTER TABLE `api_client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_approvisionnement`
--
ALTER TABLE `t_approvisionnement`
  ADD PRIMARY KEY (`CodeApprov`);

--
-- Index pour la table `t_article`
--
ALTER TABLE `t_article`
  ADD PRIMARY KEY (`CodeArticle`);

--
-- Index pour la table `t_categorie_article`
--
ALTER TABLE `t_categorie_article`
  ADD PRIMARY KEY (`CodeCategorie`);

--
-- Index pour la table `t_categorie_produit`
--
ALTER TABLE `t_categorie_produit`
  ADD PRIMARY KEY (`CodeCategorie`);

--
-- Index pour la table `t_paiement`
--
ALTER TABLE `t_paiement`
  ADD PRIMARY KEY (`CodePaiement`);

--
-- Index pour la table `t_produit`
--
ALTER TABLE `t_produit`
  ADD PRIMARY KEY (`CodeProduit`);

--
-- Index pour la table `t_publication`
--
ALTER TABLE `t_publication`
  ADD PRIMARY KEY (`CodePub`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`CodeUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `api_client`
--
ALTER TABLE `api_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_approvisionnement`
--
ALTER TABLE `t_approvisionnement`
  MODIFY `CodeApprov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_article`
--
ALTER TABLE `t_article`
  MODIFY `CodeArticle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_categorie_article`
--
ALTER TABLE `t_categorie_article`
  MODIFY `CodeCategorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_categorie_produit`
--
ALTER TABLE `t_categorie_produit`
  MODIFY `CodeCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `t_paiement`
--
ALTER TABLE `t_paiement`
  MODIFY `CodePaiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_produit`
--
ALTER TABLE `t_produit`
  MODIFY `CodeProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `t_publication`
--
ALTER TABLE `t_publication`
  MODIFY `CodePub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `CodeUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
