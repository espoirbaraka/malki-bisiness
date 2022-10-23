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
-- Base de données :  `ecommerce`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_card` (IN `produit` INT, IN `code_user` INT, IN `qte` INT)  BEGIN
DECLARE val1 float;
DECLARE val2 float;
DECLARE val3 float;
DECLARE val4 float;
DECLARE val5 float;

SET val1 = (SELECT prix_prod FROM produit WHERE id_prod = produit);
SET val2 = val1 * qte;
SET val3 = (SELECT card_montant FROM user WHERE id_user = code_user);
SET val4 = val3 + val2;

INSERT INTO ligne_commande( code_produit, code_user, prix_achat, qte_lignecommende, montant_lingecommande, statut_lingecommande, date_lingecommande) VALUES (produit,code_user,val1,qte,val2,1,NOW()); 
UPDATE user SET card_montant = val4 WHERE id_user = code_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_categorie` (IN `designation` VARCHAR(100))  BEGIN
insert into categorie (designation_categorie, statut_categorie) VALUES (designation,1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_client` (IN `nom` TEXT, IN `prenom` TEXT, IN `email` VARCHAR(200), IN `tel` INT, IN `name` TEXT, IN `pays` INT(100), IN `city` VARCHAR(100), IN `state` TEXT, IN `adresse` TEXT, IN `province` VARCHAR(100), IN `code_user` INT)  BEGIN 
DECLARE val1 float;
DECLARE val2 float;


INSERT INTO client(nom_client, prenom_client, email_client, phone, compagny_name, compagny_adresse, pays, Adresse, ville, province,code_user) VALUES (nom,prenom,email,tel,name,state,pays,adresse,city,province,code_user);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_fournisseur` (IN `nom` VARCHAR(100), IN `adresse` TEXT, IN `email` TEXT, IN `tel` INT, IN `addby` INT)  BEGIN
INSERT INTO fournisseur(nom_fournisseur, adresss_fournisseur, email_fournisseur, tel_fournisseur, statut_fournisseur, Addby) VALUES (nom,adresse,email,tel,1,addby);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_mode_paiement` (IN `designation` VARCHAR(100))  BEGIN
INSERT INTO mode_paiement(designation_modepaiement, statut_modepaiement) VALUES(designation,1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_paiement` (IN `id_` INT, IN `montant` FLOAT)  BEGIN
DECLARE val1 int;
DECLARE val2 int;
DECLARE val3 int;
DECLARE val4 int;

SET val1 = (SELECT qte_lignecommende FROM ligne_commande WHERE id_lingecommande = id_);
SET val2 = (SELECT code_produit FROM ligne_commande WHERE code_user = id_);
SET val3 = (SELECT quantite_prod FROM produit WHERE id_prod = val2);
SET val4 = val1 - val3;

UPDATE produit SET quantite_prod = val4 WHERE id_prod = val2;
UPDATE ligne_commande SET statut_lingecommande = 1 WHERE id_lingecommande = id_;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_produit` (IN `prix` FLOAT, IN `qte` INT, IN `addby` INT, IN `code_produit` INT, IN `code_fournisseur` INT)  BEGIN
DECLARE val1 int;
DECLARE val2 int;
DECLARE val3 int;
DECLARE val4 float;

SET val1 = (SELECT quantite_prod FROM produit WHERE id_prod = code_produit);
SET val2 = val1 + qte;
SET val4 = prix * qte;

insert into ligne_entre ( prix_ligneentre, qte_ligneentre, montant_ligneentre, code_produit, code_fournisseur, date_entre, statut_entre, Addby) VALUES (prix,qte,val4,code_produit,code_fournisseur,NOW(),1,addby);
UPDATE produit SET quantite_prod = val2 WHERE id_prod = code_produit;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_user` (IN `username` TEXT, IN `email` VARCHAR(100), IN `pass` TEXT)  BEGIN
INSERT INTO user( username, email_user, password, card_montant, livraison) VALUES(username,email,pass,0,0);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `api_client`
--

CREATE TABLE `api_client` (
  `id_api` int(11) NOT NULL,
  `client_id` text NOT NULL,
  `key_client` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `api_client`
--

INSERT INTO `api_client` (`id_api`, `client_id`, `key_client`) VALUES
(1, 'malekani_project', '20a3238259f91e579d10395baa8498e79c020ec7');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `designation_categorie` varchar(50) NOT NULL,
  `statut_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `designation_categorie`, `statut_categorie`) VALUES
(1, 'Vegetable', 1),
(2, 'Milk', 1),
(3, 'Fruit', 1),
(4, 'Boisson', 1),
(5, 'Brut', 1);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom_client` text NOT NULL,
  `prenom_client` text NOT NULL,
  `email_client` text NOT NULL,
  `phone` int(11) NOT NULL,
  `compagny_name` text NOT NULL,
  `compagny_adresse` text NOT NULL,
  `pays` varchar(100) NOT NULL,
  `Adresse` text NOT NULL,
  `ville` int(11) NOT NULL,
  `province` varchar(100) NOT NULL,
  `code_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `email_client`, `phone`, `compagny_name`, `compagny_adresse`, `pays`, `Adresse`, `ville`, `province`, `code_user`) VALUES
(1, 'alpha', '', '', 0, '', '', '', '', 0, '', 2),
(2, 'Gaetan Abio', 'Gaetan', 'g.a.bamongoyo@gmail.com', 817675404, 'between', 'Goma', '2', '35, Avenue Munigi, Q/ Virunga, C/Karisimbi', 0, '35, Avenue Munigi, Q/ Virunga, C/Karisimbi', 1),
(3, '', '', '', 0, '', '', '0', '', 0, '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_comd` int(11) NOT NULL,
  `date_comd` date NOT NULL,
  `montant_comd` float NOT NULL,
  `etat_comd` int(11) NOT NULL,
  `lieulivreson_comd` varchar(50) NOT NULL,
  `prixtotal_comd` float NOT NULL,
  `code_commande` int(11) NOT NULL,
  `statut_comd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `devise`
--

CREATE TABLE `devise` (
  `id_devise` int(11) NOT NULL,
  `devise` varchar(100) NOT NULL,
  `montant` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `nom_fournisseur` varchar(500) NOT NULL,
  `adresss_fournisseur` text NOT NULL,
  `email_fournisseur` varchar(50) NOT NULL,
  `tel_fournisseur` int(100) NOT NULL,
  `statut_fournisseur` int(11) NOT NULL,
  `Addby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom_fournisseur`, `adresss_fournisseur`, `email_fournisseur`, `tel_fournisseur`, `statut_fournisseur`, `Addby`) VALUES
(1, 'Help me', '35, Avenue Munigi, Q/ Virunga, C/Karisimbi', 'g.a.bamongoyo@gmail.com', 817675404, 1, 1),
(2, 'Between', '35, Avenue Munigi, Q/ Virunga, C/Karisimbi', 'g.a.bamongoyo@gmail.com', 817675404, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id_lingecommande` int(11) NOT NULL,
  `code_produit` int(11) NOT NULL,
  `code_user` int(11) NOT NULL,
  `prix_achat` float NOT NULL,
  `qte_lignecommende` int(11) NOT NULL,
  `montant_lingecommande` float NOT NULL,
  `statut_lingecommande` int(11) NOT NULL,
  `date_lingecommande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id_lingecommande`, `code_produit`, `code_user`, `prix_achat`, `qte_lignecommende`, `montant_lingecommande`, `statut_lingecommande`, `date_lingecommande`) VALUES
(1, 7, 1, 12, 8, 96, 1, '2022-09-26'),
(2, 8, 1, 13, 6, 78, 1, '2022-09-26'),
(3, 10, 1, 12, 4, 48, 1, '2022-10-04'),
(4, 7, 2, 12, 4, 48, 1, '2022-10-04');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_entre`
--

CREATE TABLE `ligne_entre` (
  `id_ligneentre` int(11) NOT NULL,
  `prix_ligneentre` float NOT NULL,
  `qte_ligneentre` int(11) NOT NULL,
  `montant_ligneentre` float NOT NULL,
  `code_produit` int(11) NOT NULL,
  `code_fournisseur` int(11) NOT NULL,
  `date_entre` date NOT NULL,
  `statut_entre` int(11) NOT NULL,
  `Addby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ligne_entre`
--

INSERT INTO `ligne_entre` (`id_ligneentre`, `prix_ligneentre`, `qte_ligneentre`, `montant_ligneentre`, `code_produit`, `code_fournisseur`, `date_entre`, `statut_entre`, `Addby`) VALUES
(1, 17, 100, 1700, 7, 1, '2022-09-24', 1, 1),
(2, 130, 120, 15600, 8, 1, '2022-09-24', 1, 1),
(3, 10, 120, 1200, 9, 2, '2022-09-24', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mode_paiement`
--

CREATE TABLE `mode_paiement` (
  `id_modepaiement` int(11) NOT NULL,
  `designation_modepaiement` text NOT NULL,
  `statut_modepaiement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int(11) NOT NULL,
  `montant_paiement` float NOT NULL,
  `code_commende` float NOT NULL,
  `code_modepaiement` float NOT NULL,
  `date_paiement` date NOT NULL,
  `statut_paiement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_prod` int(11) NOT NULL,
  `designation_prod` varchar(100) NOT NULL,
  `prix_prod` float NOT NULL,
  `solde_prod` float NOT NULL,
  `quantite_prod` int(11) NOT NULL,
  `code_categorie` int(11) NOT NULL,
  `image_prod` text NOT NULL,
  `dateajout_prod` date NOT NULL,
  `statut_prod` int(11) NOT NULL,
  `Addby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_prod`, `designation_prod`, `prix_prod`, `solde_prod`, `quantite_prod`, `code_categorie`, `image_prod`, `dateajout_prod`, `statut_prod`, `Addby`) VALUES
(7, 'Fraise', 12, 0.05, 100, 1, '3.png', '2024-09-22', 1, 1),
(8, 'Papaye', 13, 0.05, 120, 1, '2.png', '2024-09-22', 1, 1),
(9, 'Avocat', 12, 0.05, 120, 1, '4.png', '2024-09-22', 1, 1),
(10, 'Gingembre', 12, 0.05, 0, 1, '8.png', '2024-09-22', 1, 1),
(11, 'Jus', 12, 1, 0, 5, 'IMG_3244.JPG', '2022-10-22', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `email_user` text NOT NULL,
  `password` text NOT NULL,
  `card_montant` float NOT NULL,
  `livraison` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email_user`, `password`, `card_montant`, `livraison`) VALUES
(1, 'gaetan', 'g.a.bamongoyo@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 222, 0),
(2, 'celestin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 48, 0),
(3, 'shekinah', 'shekinah@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id_ville` int(11) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `montant_frais` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `api_client`
--
ALTER TABLE `api_client`
  ADD PRIMARY KEY (`id_api`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_comd`);

--
-- Index pour la table `devise`
--
ALTER TABLE `devise`
  ADD PRIMARY KEY (`id_devise`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id_lingecommande`);

--
-- Index pour la table `ligne_entre`
--
ALTER TABLE `ligne_entre`
  ADD PRIMARY KEY (`id_ligneentre`);

--
-- Index pour la table `mode_paiement`
--
ALTER TABLE `mode_paiement`
  ADD PRIMARY KEY (`id_modepaiement`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_prod`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `api_client`
--
ALTER TABLE `api_client`
  MODIFY `id_api` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_comd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devise`
--
ALTER TABLE `devise`
  MODIFY `id_devise` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id_lingecommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `ligne_entre`
--
ALTER TABLE `ligne_entre`
  MODIFY `id_ligneentre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
