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
-- Table structure for table `anula_ventas`
--

DROP TABLE IF EXISTS `anula_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `anulado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_ventas`
--

LOCK TABLES `anula_ventas` WRITE;
/*!40000 ALTER TABLE `anula_ventas` DISABLE KEYS */;
INSERT INTO `anula_ventas` VALUES (1,1,2,'Admin','2024-12-04 23:25:28'),(2,1,7,'Admin','2024-12-07 18:28:17'),(3,1,28,'Admin','2024-12-22 19:15:35'),(4,1,127,'Admin','2025-01-05 14:30:49'),(5,1,200,'Admin','2025-01-11 21:46:46'),(6,1,236,'Admin','2025-01-22 23:22:25'),(7,1,237,'Admin','2025-01-22 23:22:32'),(8,1,293,'Admin','2025-01-30 16:12:50'),(9,1,410,'Admin','2025-08-17 00:50:44'),(10,1,411,'Admin','2025-08-18 21:16:43'),(11,1,416,'Admin','2025-09-18 00:24:24'),(12,1,428,'Claudio','2025-09-21 17:46:48'),(13,1,4,'Admin','2025-09-22 15:28:09'),(14,1,5,'Admin','2025-09-22 15:29:06');
/*!40000 ALTER TABLE `anula_ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-25 15:23:13
