-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: zoo_arcadia
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `race` varchar(50) NOT NULL,
  `habitat_id` int(11) NOT NULL,
  PRIMARY KEY (`animal_id`),
  KEY `habitat` (`habitat_id`),
  CONSTRAINT `animal_ibfk_3` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`habitat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` VALUES (1,'Liberty','Aigle royal',1),(2,'Rexou','Kangourous roux',1),(3,'Grispoil','Quokka',1),(4,'Fouisseur','Sanglier',2),(6,'Rusé','Renard roux',2),(7,'Giant','Elan',3),(8,'Ghost','Lynx',3),(9,'Hunter','Renard polaire',3),(10,'Cham','Chamois',4),(11,'Moufle','Mouflon',4),(12,'Poilu','Gypaète barbu',4),(13,'Majesté','Lion',5),(14,'Titan','Eléphant d\'Afrique',5),(15,'Grancou','Girafe',5);
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employe_report`
--

DROP TABLE IF EXISTS `employe_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employe_report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_meal` varchar(50) DEFAULT NULL,
  `last_passage` date DEFAULT NULL,
  `animal_id` int(11) NOT NULL,
  PRIMARY KEY (`report_id`),
  KEY `animal` (`animal_id`),
  CONSTRAINT `employe_report_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employe_report`
--

LOCK TABLES `employe_report` WRITE;
/*!40000 ALTER TABLE `employe_report` DISABLE KEYS */;
INSERT INTO `employe_report` VALUES (1,'50g de feuille d\'acacia.','2024-11-22',3),(2,'500g de lièvre.','2024-11-29',1),(10,NULL,'2024-11-05',2),(12,NULL,NULL,6),(13,NULL,NULL,8),(14,NULL,NULL,11);
/*!40000 ALTER TABLE `employe_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habitat`
--

DROP TABLE IF EXISTS `habitat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `habitat` (
  `habitat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`habitat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitat`
--

LOCK TABLES `habitat` WRITE;
/*!40000 ALTER TABLE `habitat` DISABLE KEYS */;
INSERT INTO `habitat` VALUES (1,'Désert Australien','Le désert Australien est conçu pour reproduire fidèlement les conditions arides et hostiles de l\'Outback australien. Les visiteurs y trouveront un paysage dominé par des dunes de sable rouge, des formations rocheuses spectaculaires et des plantes résistantes à la sécheresse comme les spinifex et les acacias.',''),(2,'Forêt Française','la fôret française recréer l\'atmosphère dense et verdoyante des forêts tempérées de France. Les visiteurs peuvent y observer une riche biodiversité, entourée d\'arbres majestueux, de sous-bois luxuriants et de cours d\'eau tranquilles.',''),(3,'Forêt Nordique','La fôret nordique est conçu pour reproduire l\'environnement frais et dense des forêts boréales et tempérées du nord de l\'Europe et de l\'Amérique du Nord. Les visiteurs y trouveront des conifères imposants, des sols moussus, des rivières claires et des sous-bois ombragés',''),(4,'Montagne','La montagne est conçu pour recréer les conditions escarpées et rocailleuses des chaînes montagneuses du monde entier, avec des pentes abruptes, des falaises, des prairies alpines et des forêts clairsemées. Les visiteurs peuvent observer une variété d\'espèces adaptées à ces environnements rigoureux et souvent inhospitaliers',''),(5,'Savane','La savane est conçu pour recréer les vastes étendues d\'herbes hautes, les arbres éparses et les prairies sèches typiques des régions de savane. Ce paysage ouvert et chaud abrite des animaux majestueux qui ont évolué pour s\'adapter à des conditions de chaleur extrême et à une vie au grand air.','');
/*!40000 ALTER TABLE `habitat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `isVisible` tinyint(1) NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,'Elodie','J&#039;ai adoré mon séjour a Arcadia. Le personnel est adorable et le bien être des animaux est parfaitement respecté ! Je recommande !',5,1),(8,'Didier','Un zoo incroyable ! Les animaux sont bien soignés et les enclos spacieux. Parfait pour une sortie en famille !',4,1),(9,'Marc','Superbe visite ! Le personnel est accueillant et les animaux semblent heureux. Une expérience à refaire !',5,1),(10,'Julie','Magnifique endroit, idéal pour les enfants. Beaucoup d’animaux et des informations intéressantes. On a adoré !',4,1);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Administrateur'),(2,'Vétérinaire'),(3,'Employé(e)');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'Visite guidée du parc','Venez découvrir notre parc, son histoire et nos animaux dans une visite guidé du parc par nos soigneur.'),(2,'Visite en petit train','Faite un tour du parc grace a notre petit train.'),(3,'Notre restaurant','Manger en compagnie de nos vedettes grâce a notre bais vitré qui donne sur le parc.');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `target_value`
--

DROP TABLE IF EXISTS `target_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `target_value` (
  `target_id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL DEFAULT 0,
  `animal_id` int(11) NOT NULL,
  PRIMARY KEY (`target_id`),
  KEY `Target value` (`animal_id`),
  CONSTRAINT `target_value_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `target_value`
--

LOCK TABLES `target_value` WRITE;
/*!40000 ALTER TABLE `target_value` DISABLE KEYS */;
INSERT INTO `target_value` VALUES (1,1,1),(3,0,2),(4,0,3),(5,0,4),(6,0,6),(7,0,7),(8,0,8),(9,0,9),(10,0,10),(11,0,11),(12,0,12),(13,0,13),(14,0,14),(15,0,15);
/*!40000 ALTER TABLE `target_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `role` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin@zoo-arcadia.fr','admin123','Arcadia','José',1),('employe1@zoo-arcadia.fr','employe123','Doe','John',3),('veto1@zoo-arcadia.fr','veto123','Marie','Elodie',2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veteninary_report`
--

DROP TABLE IF EXISTS `veteninary_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veteninary_report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `food` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `animal_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`report_id`),
  KEY `animal` (`animal_id`),
  KEY `username` (`username`),
  CONSTRAINT `veteninary_report_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `veteninary_report_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veteninary_report`
--

LOCK TABLES `veteninary_report` WRITE;
/*!40000 ALTER TABLE `veteninary_report` DISABLE KEYS */;
INSERT INTO `veteninary_report` VALUES (50,'2024-11-20','Bonne santé','Se retrouve souvent seul. A surveiller','souris','500g',1,'veto1@zoo-arcadia.fr'),(56,'2024-11-20','Agé','Boite a la jambe gauche',NULL,NULL,14,'veto1@zoo-arcadia.fr');
/*!40000 ALTER TABLE `veteninary_report` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-21 11:34:14
