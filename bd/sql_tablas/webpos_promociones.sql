-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: webpos
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `promociones`
--

DROP TABLE IF EXISTS `promociones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promociones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `nombre_promocion` varchar(250) NOT NULL,
  `id_prod` int(30) NOT NULL,
  `unidades` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promociones`
--

LOCK TABLES `promociones` WRITE;
/*!40000 ALTER TABLE `promociones` DISABLE KEYS */;
INSERT INTO `promociones` VALUES (1,1,'Cheetos 2x1500',3,2,1500,'S',1,'2025-01-20'),(2,1,'',0,0,0,'S',1,'2025-01-20'),(3,1,'Sprite 2x2000',4,2,2500,'S',1,'2025-01-23'),(4,1,'Canada Dry',0,0,0,'S',1,'2025-01-23'),(5,1,'Canada Dry 2x2500',127,2,2500,'S',1,'2025-01-23'),(6,1,'Coca cola 350cc',6,2,2500,'N',1,'2025-01-27'),(7,1,'',0,0,0,'S',1,'2025-09-21'),(8,1,'Coca cola lata 3x2',6,3,3000,'N',1,'2025-09-23'),(9,1,'Coca cola 3x2000',6,3,2000,'N',1,'2025-09-23'),(10,1,'Coca cola 2x2500',6,2,2500,'N',1,'2025-09-23'),(11,1,'Coca cola 2x2500',4,2,2800,'S',1,'2025-09-23'),(12,1,'',0,0,0,'S',1,'2025-09-23'),(13,1,'',6,0,0,'N',1,'2025-09-23'),(14,1,'Coca cola 2x2500',6,3,2500,'S',1,'2025-09-23'),(15,1,'Coca Cola Zero 591ml 3x3000',49,3,3000,'S',1,'2025-09-25');
/*!40000 ALTER TABLE `promociones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-25 15:23:06
