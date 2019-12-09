-- ----------------------
-- Dump de la base lebonracoin au 09-Dec-2019
-- ----------------------


-- -----------------------------
-- Structure de la table annonce
-- -----------------------------
CREATE TABLE `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `photos` text,
  `prix` double NOT NULL,
  `dateannonce` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_id` (`utilisateur_id`),
  CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- -----------------------------
-- Structure de la table utilisateur
-- -----------------------------
CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codepostal` varchar(5) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- -----------------------------
-- Contenu de la table annonce
-- -----------------------------
INSERT INTO annonce VALUES(1, "Fiat multipla 1998 - CT OK", "Fiat multipla 1998 - CT OK

Faire proposition", "1.jpg,1b.jpg", 12000, "2019-12-08 15:15:28", 1);
INSERT INTO annonce VALUES(2, "Vaisseau d'albator", "Vaisseau d'albator tout neuf
En bon état
Venir chercher sur place", "2.jpg", 1200, "2019-12-08 16:01:55", 2);
INSERT INTO annonce VALUES(3, "Crème minceur Dulcolax", "Je vends ma crème minceur Dulcolax car ça ne marche pas avec moi", "3.jpg", 12, "2019-12-08 16:03:16", 3);

-- -----------------------------
-- Contenu de la table utilisateur
-- -----------------------------
INSERT INTO utilisateur VALUES(1, "jeantalu59", "jeantalu@gmail.com", "fiatmultipla", "108 Rue Turgot", 59000, "Lille", "");
INSERT INTO utilisateur VALUES(2, "albator", "katypenneflamme@gmail.com", "azerty12", "18 rue de la galaxie", 75000, "Paris", "");
INSERT INTO utilisateur VALUES(3, "sandytroforte", "richard.jouire@gmail.com", "decaunes", "24 rue du Canal", 75000, "Paris", "");
INSERT INTO utilisateur VALUES(4, "jmtuba", "jm.tuba@gmail.com", "tubatuba", "23 rue du Tuba", 21000, "Dijon", "");

