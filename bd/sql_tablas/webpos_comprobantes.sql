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
-- Table structure for table `comprobantes`
--

DROP TABLE IF EXISTS `comprobantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comprobantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `id_pago` int(5) NOT NULL,
  `nombre_archivo` varchar(250) NOT NULL,
  `dir_archivo` varchar(1000) NOT NULL,
  `fecha_carga` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprobantes`
--

LOCK TABLES `comprobantes` WRITE;
/*!40000 ALTER TABLE `comprobantes` DISABLE KEYS */;
INSERT INTO `comprobantes` VALUES (1,1,1,'Comprobante 1','../../files/comprobantes/Compr_16-10-2024-14-39-4.pdf','2024-10-16'),(2,1,2,'Comprobante 2','../../files/comprobantes/Compr_16-10-2024-14-39-29.pdf','2024-10-16'),(3,1,3,'Comprobante 3','../../files/comprobantes/Compr_6-11-2024-22-22-18.JPG','2024-11-06'),(4,1,4,'Comprobante 4','../../files/comprobantes/Compr_6-11-2024-22-22-40.JPG','2024-11-06'),(5,1,5,'Comprobante 5','../../files/comprobantes/Compr_6-8-2025-16-53-45.jpg','2025-08-06'),(6,1,6,'Comprobante 6','../../files/comprobantes/Compr_6-8-2025-16-53-50.jpg','2025-08-06'),(7,1,7,'Comprobante 7','../../files/comprobantes/Compr_6-8-2025-16-53-54.jpg','2025-08-06'),(8,1,8,'Comprobante 8','../../files/comprobantes/Compr_6-8-2025-16-53-57.jpg','2025-08-06'),(9,1,9,'Comprobante 9','../../files/comprobantes/Compr_6-8-2025-16-54-1.jpg','2025-08-06'),(10,1,10,'Comprobante 10','../../files/comprobantes/Compr_6-8-2025-16-54-4.jpg','2025-08-06'),(11,3,4,'Comprobante 1','../../files/comprobantes/Compr_20-8-2025-19-36-17.jpg','2025-08-20'),(12,4,9,'Comprobante 1','../../files/comprobantes/Compr_20-8-2025-21-49-29.jpg','2025-08-20'),(13,13,10,'Comprobante 1','../../files/comprobantes/Compr_21-8-2025-15-32-58.jpg','2025-08-21'),(14,13,11,'Comprobante 2','../../files/comprobantes/Compr_21-8-2025-15-33-3.jpg','2025-08-21'),(15,14,15,'Comprobante 1','../../files/comprobantes/Compr_21-8-2025-15-40-33.jpg','2025-08-21'),(16,14,16,'Comprobante 2','../../files/comprobantes/Compr_21-8-2025-15-42-17.jpg','2025-08-21'),(17,14,17,'Comprobante 3','../../files/comprobantes/Compr_21-8-2025-16-4-27.jpg','2025-08-21'),(18,14,18,'Comprobante 4','../../files/comprobantes/Compr_21-8-2025-16-4-31.jpg','2025-08-21'),(19,14,19,'Comprobante 5','../../files/comprobantes/Compr_10-9-2025-22-19-3.jpg','2025-09-10'),(20,14,20,'Comprobante 6','../../files/comprobantes/Compr_10-9-2025-22-19-8.jpg','2025-09-10'),(21,14,21,'Comprobante 7','../../files/comprobantes/Compr_10-9-2025-22-19-11.jpg','2025-09-10'),(22,1,1,'Comprobante 11','../../files/comprobantes/Compr_10-9-2025-22-19-44.jpg','2025-09-10'),(23,1,2,'Comprobante 12','../../files/comprobantes/Compr_10-9-2025-22-19-48.jpg','2025-09-10'),(24,1,22,'Comprobante 13','../../files/comprobantes/Compr_10-9-2025-22-20-29.jpg','2025-09-10');
/*!40000 ALTER TABLE `comprobantes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-25 15:23:11
