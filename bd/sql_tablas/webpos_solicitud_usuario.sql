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
-- Table structure for table `solicitud_usuario`
--

DROP TABLE IF EXISTS `solicitud_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud_usuario` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `usuario` int(5) NOT NULL,
  `solicitud` int(5) NOT NULL,
  `estado_reg_solicitud` varchar(5) NOT NULL,
  `autorizacion` varchar(5) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_usuario`
--

LOCK TABLES `solicitud_usuario` WRITE;
/*!40000 ALTER TABLE `solicitud_usuario` DISABLE KEYS */;
INSERT INTO `solicitud_usuario` VALUES (1,1,1,1,'X','X','2025-08-05 14:02:17'),(2,1,1,1,'X','X','2025-08-06 14:08:21'),(3,1,1,1,'X','S','2025-08-06 14:31:47'),(4,1,1,1,'X','N','2025-08-06 14:36:33'),(5,1,1,1,'X','S','2025-08-06 14:42:43'),(6,1,1,1,'X','S','2025-08-06 14:43:19'),(7,1,1,1,'X','N','2025-08-06 14:43:46'),(8,1,1,1,'X','N','2025-08-06 14:47:19'),(9,1,2,1,'X','N','2025-08-06 14:50:40'),(10,1,2,1,'X','N','2025-08-06 14:55:39'),(11,1,2,1,'X','N','2025-08-06 14:58:00'),(12,1,2,1,'X','N','2025-08-06 15:00:26'),(13,1,2,1,'X','N','2025-08-06 15:02:20'),(14,1,2,1,'A','S','2025-08-06 16:33:40'),(15,1,2,1,'A','S','2025-09-21 17:31:28');
/*!40000 ALTER TABLE `solicitud_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-25 15:23:05
