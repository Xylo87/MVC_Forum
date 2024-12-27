-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum_theo
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum`;

-- Listage de la structure de table forum_theo. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_theo.categorie : ~0 rows (environ)
DELETE FROM `categorie`;
INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
	(1, 'Discussions Générales'),
	(2, 'Support Technique & Matériel'),
	(3, 'Trading & Collection');

-- Listage de la structure de table forum_theo. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int NOT NULL,
  `texte` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dateMes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `utilisateur_id` int DEFAULT NULL,
  `sujet_id` int DEFAULT NULL,
  PRIMARY KEY (`id_message`),
  KEY `utilisateur_id` (`utilisateur_id`),
  KEY `sujet_id` (`sujet_id`),
  CONSTRAINT `FK_message_sujet` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id_sujet`),
  CONSTRAINT `FK_message_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_theo.message : ~0 rows (environ)
DELETE FROM `message`;
INSERT INTO `message` (`id_message`, `texte`, `dateMes`, `utilisateur_id`, `sujet_id`) VALUES
	(1, 'La Neo Geo AES reste pour moi la plus belle console jamais créée. Son design est intemporel. La qualité des matériaux est exceptionnelle. Les manettes sont parfaites. Je ne m\'en lasserai jamais.', '2023-12-24 14:30:00', 1, 1),
	(2, 'La Dreamcast est bien plus élégante ! Son design blanc épuré était en avance sur son temps. Le VMU était révolutionnaire. Et ce logo en spirale reste iconique.', '2023-12-24 14:45:00', 4, 1),
	(3, 'Sujet verrouillé pour cause de débat trop houleux. Merci de rester courtois dans vos échanges.', '2023-12-24 15:00:00', 2, 1),
	(4, 'Ma première partie était sur Super Mario Land sur Game Boy. Je revois encore la petite console grise. C\'était un cadeau de Noël 1990. J\'ai joué pendant des heures sans m\'arrêter.', '2023-12-23 10:15:00', 9, 2),
	(5, 'Pour moi c\'était Pac-Man sur une borne d\'arcade. Je me hissais sur la pointe des pieds pour atteindre les contrôles. L\'odeur de la salle d\'arcade est encore vivace dans ma mémoire.', '2023-12-23 10:30:00', 5, 2),
	(6, 'Duck Hunt sur NES avec le Zapper ! Quelle révolution à l\'époque. Je visais maladroitement les canards à l\'écran. Mon père était imbattable à ce jeu.', '2023-12-23 10:45:00', 3, 2),
	(7, 'Ma Master System affiche un écran noir. J\'ai déjà nettoyé les connecteurs. J\'ai vérifié l\'alimentation. Le voyant de power s\'allume normalement.', '2023-12-22 16:45:00', 7, 3),
	(8, 'As-tu essayé de vérifier le port cartouche ? Un coup de bombe à air comprimé peut aider. J\'ai eu le même souci récemment.', '2023-12-22 17:00:00', 8, 3),
	(9, 'Sujet verrouillé, solution trouvée en privé. Merci de votre aide.', '2023-12-22 17:15:00', 1, 3),
	(10, 'Je viens d\'acquérir une Neo Geo Pocket à restaurer. L\'écran a des pixels morts. Le son grésille un peu. Quelqu\'un a déjà fait ce type de restauration ?', '2023-12-21 09:30:00', 10, 4),
	(11, 'J\'ai un bon tutorial à te conseiller. La réparation n\'est pas si compliquée. Il faut surtout être méthodique.', '2023-12-21 09:45:00', 6, 4),
	(12, 'Je peux te fournir les références des pièces nécessaires. J\'ai un contact fiable pour les écrans de rechange. N\'hésite pas à me MP.', '2023-12-21 10:00:00', 2, 4),
	(13, 'J\'ai trouvé une PC Engine complète dans sa boîte pour 20€. Le vendeur ne connaissait pas la valeur. Tout fonctionne parfaitement.', '2023-12-20 15:20:00', 6, 5),
	(14, 'Une cartouche de Little Samson NES pour 5€. Je n\'en revenais pas. La grand-mère vidait le grenier de son petit-fils.', '2023-12-20 15:35:00', 3, 5),
	(15, 'Un lot de 5 jeux Saturn dont Panzer Dragoon Saga. Le vendeur pensait que c\'était des CD audio. J\'ai fait l\'innocent.', '2023-12-20 15:50:00', 4, 5),
	(16, 'Les prix des jeux Dreamcast explosent depuis 2 ans. Shenmue est devenu inabordable. Le marché devient fou.', '2023-12-19 11:10:00', 5, 6),
	(17, 'C\'est la spéculation qui monte. Les prix vont redescendre. Il faut être patient.', '2023-12-19 11:25:00', 7, 6),
	(18, 'Je conseille d\'acheter maintenant les jeux moins recherchés. Ils vont suivre la tendance rapidement.', '2023-12-19 11:40:00', 8, 6),
	(19, 'Question sur la conservation des cartouches N64. J\'ai remarqué des traces d\'oxydation. Quelle est la meilleure méthode de stockage ?', '2023-12-18 13:45:00', 10, 7),
	(20, 'Boîtes plastiques hermétiques avec sachets déshumidificateurs. Température constante conseillée. Éviter la lumière directe.', '2023-12-18 14:00:00', 1, 7),
	(21, 'Je recommande aussi les pochettes anti-statiques. Le nettoyage régulier des connecteurs est important. Un bon stockage prolonge vraiment la durée de vie.', '2023-12-18 14:15:00', 9, 7),
	(22, 'Je cherche un Sony Trinitron PVM. Le rendu est incomparable pour le rétrogaming. Les prix sont devenus fous.', '2023-12-17 08:30:00', 2, 8),
	(23, 'J\'en ai trouvé un dans une société audiovisuelle qui fermait. Il faut surveiller les fermetures d\'entreprises. Les hôpitaux aussi s\'en débarrassent.', '2023-12-17 08:45:00', 6, 8),
	(24, 'Les JVC TM-H sont une bonne alternative. La qualité est similaire. Le prix est plus abordable.', '2023-12-17 09:00:00', 7, 8),
	(25, 'Je démarre une collection Virtual Boy. Je recherche des conseils pour les jeux essentiels. Le marché japonais vaut-il le coup ?', '2023-12-16 19:20:00', 8, 9),
	(26, 'Wario Land est incontournable. Le marché japonais est plus intéressant. Les prix sont plus raisonnables.', '2023-12-16 19:35:00', 5, 9),
	(27, 'Attention aux exemplaires avec des problèmes d\'affichage. Les LED vieillissent mal. Red Alarm est aussi un must-have.', '2023-12-16 19:50:00', 3, 9),
	(28, 'Quelle est la meilleure méthode pour nettoyer les manettes Saturn ? Les boutons deviennent collants. Le caoutchouc se dégrade.', '2023-12-15 21:15:00', 4, 10),
	(29, 'Isopropanol à 90% pour les contacts. Eau savonneuse pour les coques. Démontage complet conseillé.', '2023-12-15 21:30:00', 10, 10),
	(30, 'N\'oubliez pas de lubrifier les axes des sticks analogiques. Un peu de graisse silicone fait des merveilles.', '2023-12-15 21:45:00', 1, 10);

-- Listage de la structure de table forum_theo. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lock` tinyint(1) NOT NULL DEFAULT '0',
  `dateSuj` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categorie_id` int DEFAULT NULL,
  `utilisateur_id` int DEFAULT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `categorie_id` (`categorie_id`),
  KEY `sujet_id` (`utilisateur_id`) USING BTREE,
  CONSTRAINT `FK_sujet_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `FK_sujet_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_theo.sujet : ~0 rows (environ)
DELETE FROM `sujet`;
INSERT INTO `sujet` (`id_sujet`, `titre`, `lock`, `dateSuj`, `categorie_id`, `utilisateur_id`) VALUES
	(1, 'La plus belle console rétro ?', 1, '2023-12-24 14:30:00', 1, 1),
	(2, 'Vos souvenirs de première partie', 0, '2023-12-23 10:15:00', 1, 9),
	(3, 'Problème avec ma Master System', 1, '2023-12-22 16:45:00', 2, 7),
	(4, 'Restauration Neo Geo Pocket', 0, '2023-12-21 09:30:00', 2, 10),
	(5, 'Votre meilleure trouvaille en brocante', 0, '2023-12-20 15:20:00', 3, 6),
	(6, 'Prix du marché Dreamcast', 0, '2023-12-19 11:10:00', 3, 5),
	(7, 'État de conservation des cartouches', 0, '2023-12-18 13:45:00', 3, 10),
	(8, 'Écrans CRT recherchés', 0, '2023-12-17 08:30:00', 3, 2),
	(9, 'Collection Virtual Boy', 0, '2023-12-16 19:20:00', 3, 8),
	(10, 'Nettoyage manettes anciennes', 0, '2023-12-15 21:15:00', 2, 4);

-- Listage de la structure de table forum_theo. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dateCrea` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_theo.utilisateur : ~0 rows (environ)
DELETE FROM `utilisateur`;
INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `password`, `role`, `mail`, `dateCrea`) VALUES
	(1, 'RetroKing88', 'Rk88#2023!', 'Administrateur', 'retroking88@gmail.com', '2023-01-12 00:00:00'),
	(2, 'PixelMaster', 'Px3lM@st3r', 'Modérateur', 'pixelmaster@yahoo.com', '2023-01-15 00:00:00'),
	(3, 'NintendoFan1985', 'SuperMario85!', 'Modérateur', 'nintenfan85@hotmail.com', '2023-01-20 00:00:00'),
	(4, 'SegaForever', 'SonicRules123', 'Membre', 'segaforever@outlook.com', '2023-01-25 00:00:00'),
	(5, 'ArcadeQueen', 'Pac#Man#1980', 'Membre', 'arcadequeen@gmail.com', '2023-02-01 00:00:00'),
	(6, 'RetroCollector', 'Collection2023!', 'Membre', 'retrocollector@yahoo.fr', '2023-02-05 00:00:00'),
	(7, 'PCEnginePro', 'TurboGrafx16!', 'Membre', 'pcengine@gmail.com', '2023-02-10 00:00:00'),
	(8, 'AtariLegend', 'Pong1972#', 'Modérateur', 'atarilegend@outlook.com', '2023-02-15 00:00:00'),
	(9, 'GameBoyMaster', 'Tetris1989!', 'Membre', 'gbmaster@gmail.com', '2023-02-20 00:00:00'),
	(10, 'VintageGamer', 'Vintage#2023', 'Membre', 'vintagegamer@yahoo.com', '2023-02-25 00:00:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
