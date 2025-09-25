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
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `nombre_pedido` varchar(250) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado_pago` varchar(5) NOT NULL,
  `fac_con_iva` varchar(5) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,1,'Pedido sin nombre',1,'N','A','A',1,'2024-10-16'),(2,1,'Pedido sin nombre',1,'N','A','A',1,'2024-10-16'),(3,1,'Pedido de helados n1',1,'N','A','S',1,'2024-10-16'),(4,1,'Pedido sin nombre',1,'N','A','A',1,'2024-10-16'),(5,1,'Pedido de helados',1,'N','C','S',1,'2024-10-16'),(6,1,'Pedido Kiosco',4,'N','A','S',1,'2024-12-04'),(7,1,'Pedido Kiosco 1',4,'C','C','N',1,'2024-12-04'),(8,1,'Pedido Savory Diciembre',7,'C','C','S',1,'2024-12-07'),(9,1,'Pedido Fruna',8,'N','A','S',1,'2024-12-14'),(10,1,'Pedido sin nombre',1,'N','A','A',1,'2024-12-14'),(11,1,'Pedido Fruna',8,'C','C','N',1,'2024-12-14'),(12,1,'Pedido Jumbo 21-12-2024',9,'C','C','A',1,'2024-12-21'),(13,1,'Pedido Alvi 2',4,'C','C','N',1,'2024-12-28'),(14,1,'Pedido sin nombre',1,'N','A','A',1,'2024-12-28'),(15,1,'Pedido Binder',10,'C','C','A',1,'2024-12-31'),(16,1,'Pedido Super portales',1,'N','A','A',1,'2025-01-04'),(17,1,'Pedido sin nombre',1,'N','A','A',1,'2025-01-04'),(18,1,'Pedido 2 Super Portales',1,'C','C','S',1,'2025-01-04'),(19,1,'Pedido Unimarc',4,'C','C','S',1,'2025-01-04'),(20,1,'Carbón',1,'C','C','A',1,'2025-01-11'),(21,1,'Pedido sin nombre',1,'N','A','A',1,'2025-01-11'),(22,1,'Pedido el trebol Plata mamá',5,'C','C','A',1,'2025-01-11'),(23,1,'Pedido sin nombre',1,'N','A','A',1,'2025-01-11'),(24,1,'Pedido El Trebol 2',5,'N','A','A',1,'2025-01-11'),(25,1,'Pedido Coca cola Pagado con plata mamá',1,'N','A','S',1,'2025-01-17'),(26,1,'Pedido Coca cola Pagado con plata mamá 428',12,'C','C','N',1,'2025-01-17'),(27,1,'Pedido Alvi pagado con plata del camping',4,'N','A','A',1,'2025-01-18'),(28,1,'Pedido binder pagado con plata camping',10,'C','C','S',1,'2025-01-18'),(29,1,'Alvi 3 camping',4,'C','C','N',1,'2025-01-22'),(30,1,'Pedido sin nombre',1,'N','A','A',1,'2025-01-28'),(31,1,'Pedido Coca cola Pagado con plata camping',12,'C','C','A',1,'2025-01-28'),(32,1,'Alvi 4',4,'N','A','A',1,'2025-02-01'),(33,1,'Alvi 4',4,'N','A','A',1,'2025-02-01'),(34,1,'Alvi 4 pagado con plata camping',4,'C','C','N',1,'2025-02-01'),(35,1,'Pedido Binder pagado con plata camping 2',1,'C','C','N',1,'2025-02-07'),(36,1,'Pedido marzo 2025',1,'N','C','S',1,'2025-08-28'),(37,1,'Pedido sin nombre',1,'N','A','A',1,'2025-08-28'),(38,1,'Pedido sin nombre',1,'N','A','A',1,'2025-08-28'),(39,1,'Pedido sin nombre',1,'N','A','A',1,'2025-08-28'),(40,1,'Pedido sin nombre',1,'N','C','S',1,'2025-08-28'),(41,1,'Pedido sin nombre',1,'A','A','A',1,'2025-08-28'),(42,1,'Pedido sin nombre',1,'A','A','A',1,'2025-08-28'),(43,1,'Pedido sin nombre',1,'A','A','A',1,'2025-08-28'),(44,1,'Pedido sin nombre',5,'N','A','N',1,'2025-08-28'),(45,1,'Pedido CD Plaza Música ',5,'A','A','S',1,'2025-08-28'),(46,1,'Pedido Alvi',4,'A','A','A',1,'2025-09-24'),(47,1,'Pedido sin nombre',1,'A','A','A',1,'2025-09-24'),(48,1,'Pedido sin nombre',1,'A','A','A',1,'2025-09-24');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
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
