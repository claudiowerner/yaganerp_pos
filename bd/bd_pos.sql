-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: webpos
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `anula_categoria`
--

DROP TABLE IF EXISTS `anula_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `id_categoria` int NOT NULL,
  `anulado_por` int NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_anula_categoria` (`id_cl`),
  CONSTRAINT `fk_anula_categoria` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_categoria`
--

LOCK TABLES `anula_categoria` WRITE;
/*!40000 ALTER TABLE `anula_categoria` DISABLE KEYS */;
INSERT INTO `anula_categoria` VALUES (1,1,1,0,'2023-06-26 14:26:35'),(2,1,1,0,'2023-06-26 14:26:39'),(3,1,1,0,'2023-12-20 17:14:45'),(4,1,1,0,'2023-12-20 17:14:49'),(5,1,1,0,'2023-12-20 18:05:29'),(6,1,1,0,'2023-12-20 18:06:52'),(7,1,2,0,'2024-01-12 18:12:30'),(8,1,3,0,'2024-01-12 18:12:36'),(9,1,4,0,'2024-01-12 18:12:41'),(10,1,5,0,'2024-01-12 18:12:47');
/*!40000 ALTER TABLE `anula_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anula_productos`
--

DROP TABLE IF EXISTS `anula_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `id_producto` int NOT NULL,
  `anulado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_anula_productos` (`id_cl`),
  CONSTRAINT `fk_anula_productos` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_productos`
--

LOCK TABLES `anula_productos` WRITE;
/*!40000 ALTER TABLE `anula_productos` DISABLE KEYS */;
INSERT INTO `anula_productos` VALUES (1,1,10,'Admin','2023-06-26 14:36:53'),(2,1,1,'Admin','2023-06-26 16:35:35'),(3,1,1,'Admin','2023-06-27 16:26:21');
/*!40000 ALTER TABLE `anula_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anula_proveedor`
--

DROP TABLE IF EXISTS `anula_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_proveedor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `id_proveedor` int NOT NULL,
  `anulado_por` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_anula_proveedor` (`id_cl`),
  CONSTRAINT `fk_anula_proveedor` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_proveedor`
--

LOCK TABLES `anula_proveedor` WRITE;
/*!40000 ALTER TABLE `anula_proveedor` DISABLE KEYS */;
INSERT INTO `anula_proveedor` VALUES (1,1,1,'1','2023-07-29 00:00:00'),(2,1,1,'1','2023-07-29 18:48:50'),(3,1,1,'1','2023-07-29 18:49:42'),(4,1,1,'1','2023-07-29 18:52:25'),(5,1,4,'1','2023-07-29 18:52:30');
/*!40000 ALTER TABLE `anula_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anula_turnos`
--

DROP TABLE IF EXISTS `anula_turnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_turnos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `id_turno` int NOT NULL,
  `anulado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_anula_turnos` (`id_cl`),
  CONSTRAINT `fk_anula_turnos` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_turnos`
--

LOCK TABLES `anula_turnos` WRITE;
/*!40000 ALTER TABLE `anula_turnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `anula_turnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anula_ventas`
--

DROP TABLE IF EXISTS `anula_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_ventas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `id_venta` int NOT NULL,
  `anulado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_anula_ventas` (`id_cl`),
  CONSTRAINT `fk_anula_ventas` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_ventas`
--

LOCK TABLES `anula_ventas` WRITE;
/*!40000 ALTER TABLE `anula_ventas` DISABLE KEYS */;
INSERT INTO `anula_ventas` VALUES (1,1,4,'Admin','2023-08-14 15:27:59'),(2,1,8,'Admin','2023-08-14 15:59:48'),(3,1,11,'Admin','2023-08-14 16:55:23'),(4,1,4,'Admin','2023-12-31 00:36:02'),(5,1,1,'Admin','2024-01-01 12:06:57'),(6,1,18,'Admin','2024-01-01 19:14:46'),(7,1,39,'Admin','2024-01-12 18:09:17');
/*!40000 ALTER TABLE `anula_ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autorizacion`
--

DROP TABLE IF EXISTS `autorizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autorizacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `clave` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cl` (`id_cl`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autorizacion`
--

LOCK TABLES `autorizacion` WRITE;
/*!40000 ALTER TABLE `autorizacion` DISABLE KEYS */;
INSERT INTO `autorizacion` VALUES (1,'1','123456','N');
/*!40000 ALTER TABLE `autorizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cajas`
--

DROP TABLE IF EXISTS `cajas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cajas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `nom_caja` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_reg` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cajas` (`id_cl`),
  CONSTRAINT `fk_cajas` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cajas`
--

LOCK TABLES `cajas` WRITE;
/*!40000 ALTER TABLE `cajas` DISABLE KEYS */;
INSERT INTO `cajas` VALUES (1,1,'KIOSCO','A','1','2023-12-20');
/*!40000 ALTER TABLE `cajas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `nombre_cat` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_reg` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorias` (`id_cl`),
  CONSTRAINT `fk_categorias` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,1,'Galletas','S','Admin','2023-06-15'),(2,1,'CD','N','Admin','2023-06-15'),(3,1,'Vinilo','N','Admin','2023-06-15'),(4,1,'Cassette','N','Admin','2023-06-15'),(5,1,'Pan','N','Admin','2023-06-20'),(6,1,'Golosinas','S','Admin','2023-06-26'),(7,1,'Te','S','Admin','2023-12-20'),(8,1,'Bebidas','S','Admin','2023-12-20'),(9,1,'Bebestibles','S','Admin','2023-12-22'),(10,1,'Barras de cereal','S','Admin','2023-12-22'),(11,1,'Carbón parrillero','S','Admin','2023-12-22'),(12,1,'Helados','S','Admin','2023-12-25'),(13,1,'Cocina y abarrotes','S','Admin','2024-01-12');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cierre_caja`
--

DROP TABLE IF EXISTS `cierre_caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cierre_caja` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `nombre` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `desde` datetime NOT NULL,
  `hasta` datetime DEFAULT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor_total` varchar(145) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_reg` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cierre_caja` (`id_cl`),
  CONSTRAINT `fk_cierre_caja` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cierre_caja`
--

LOCK TABLES `cierre_caja` WRITE;
/*!40000 ALTER TABLE `cierre_caja` DISABLE KEYS */;
INSERT INTO `cierre_caja` VALUES (1,1,'Caja 1-01-2024 ','1','2024-01-01 12:01:44','2024-01-10 16:09:59','C','7200','2024-01-01 12:01:44'),(2,1,'caja de testeo','1','2024-01-10 13:10:09','0000-00-00 00:00:00','A','','2024-01-10 13:10:09');
/*!40000 ALTER TABLE `cierre_caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rut` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(5) COLLATE utf8mb3_spanish_ci NOT NULL,
  `nom_fantasia` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `razon_social` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `giro` int NOT NULL,
  `direccion` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefono` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `plan_comprado` int NOT NULL,
  `fecha_pago` date NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Claudio Werner','19150634-0','S','Supermercado de prueba','Camping Playa Werner',521112,'Camping Playa Werner 0000','claudiowernern@hotmail.com','978841411',2,'2023-08-21','2023-08-21'),(2,'Maria Cecilia Neira Gomez','7367889-7','N','Camping Playa Werner','CAMPING WERNER',0,'Camping Playa Werner S/N','playawerner@gmail.com','978841411',1,'2023-08-21','2023-08-21'),(4,'Claudio Francisco Werner Neira','4494605-k','N','10','10',0,'Camping Playa Werner S/N','claudiowernern@hotmail.com','652242114',1,'2023-08-21','2023-08-21'),(5,'','','S','','',0,'','','',1,'0000-00-00','2023-08-21'),(6,'','','S','','',0,'','','',1,'0000-00-00','2023-08-21'),(7,'Claudio Francisco ','19150634-0','S','fantasia','fantasia',0,'Camping Playa Werner S/N','correo','978841411',1,'2023-08-22','2023-08-21'),(8,'Constanza Werner','19.150.634-0','S','9789625','9875665',0,'Camping Playa Werner S/N','playawerner@gmail.com','978841411',1,'2023-08-22','2023-08-21'),(9,'Claudio Francisco Werner Neira','19150634-0','S','521112','Camping Playa Werner',0,'Camping Playa Werner','Camping Playa Werner S/N','978841411',1,'0000-00-00','2023-12-20'),(10,'Claudio Francisco Werner Neira','19150634-0','S','521112','Camping Playa Werner',0,'Camping Playa Werner','Camping Playa Werner S/N','978841411',1,'0000-00-00','2023-12-20'),(11,'Claudio Francisco Werner Neira','19150634-0','S','521112','Camping Playa Werner',0,'Camping Playa Werner','Camping Playa Werner S/N','978841411',1,'0000-00-00','2023-12-20');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes_negocio`
--

DROP TABLE IF EXISTS `clientes_negocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes_negocio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `rut` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creado_por` int NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clientes_negocio` (`id_cl`),
  CONSTRAINT `fk_clientes_negocio` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes_negocio`
--

LOCK TABLES `clientes_negocio` WRITE;
/*!40000 ALTER TABLE `clientes_negocio` DISABLE KEYS */;
INSERT INTO `clientes_negocio` VALUES (1,1,'19150634-0','Claudio Francisco','Werner Neira','S',1,'2023-07-25'),(2,1,'7367889-7','María Cecilia','Neira Gomez','S',1,'2023-07-25'),(3,1,'18752880-1','Constanza Sabina','Werner Neira','S',1,'2023-07-25'),(4,1,'987','','','S',1,'2023-07-26'),(5,1,'4494605-k','Claudio Federico','Werner Hornig','S',1,'2023-07-26'),(6,1,'\"; DROP TA','123','123','S',1,'2023-08-23');
/*!40000 ALTER TABLE `clientes_negocio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `correlativo`
--

DROP TABLE IF EXISTS `correlativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `correlativo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `correlativo` int NOT NULL,
  `id_cl` int NOT NULL,
  `caja` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nom_caja` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usuario` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `boleta` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `forma_pago` int NOT NULL,
  `id_cierre` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_correlativo` (`id_cl`),
  CONSTRAINT `fk_correlativo` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correlativo`
--

LOCK TABLES `correlativo` WRITE;
/*!40000 ALTER TABLE `correlativo` DISABLE KEYS */;
INSERT INTO `correlativo` VALUES (1,1,1,'1','KIOSCO','1','2400','10',1,'1','C','2024-01-01 12:04:52','2024-01-10 13:13:46'),(2,2,1,'1','KIOSCO','1','2000','10',1,'1','C','2024-01-01 12:06:57','2024-01-10 13:16:13'),(3,3,1,'1','KIOSCO','1','2000','10',1,'1','C','2024-01-01 12:07:31','2024-01-10 13:16:53'),(4,4,1,'1','KIOSCO','1','1200','10',1,'1','C','2024-01-01 12:07:33','2024-01-10 13:18:10'),(5,5,1,'1','KIOSCO','1','2400','10',1,'1','C','2024-01-01 12:07:34','2024-01-12 18:08:08'),(6,6,1,'1','KIOSCO','1','3000','3',1,'1','C','2024-01-01 12:07:34','2024-01-01 12:09:32'),(7,7,1,'1','KIOSCO','1','4000','4',1,'1','C','2024-01-01 12:07:35','2024-01-01 12:16:54'),(8,8,1,'1','KIOSCO','1','2000','5',4,'1','C','2024-01-01 12:09:40','2024-01-01 12:19:39'),(9,9,1,'1','KIOSCO','1','300','6',1,'1','C','2024-01-01 12:09:43','2024-01-01 13:44:49'),(10,10,1,'1','KIOSCO','1','2400','7',1,'1','C','2024-01-01 12:17:59','2024-01-01 18:11:31'),(11,11,1,'1','KIOSCO','1','2500','8',1,'1','C','2024-01-01 12:18:05','2024-01-01 18:12:26'),(12,12,1,'1','KIOSCO','1','700','9',1,'1','C','2024-01-01 13:44:25','2024-01-01 18:23:17'),(13,13,1,'1','KIOSCO','1','1100','10',1,'1','C','2024-01-01 13:44:27','2024-01-01 18:27:26'),(14,14,1,'1','KIOSCO','1','2100','10',1,'1','C','2024-01-01 18:05:20','2024-01-01 18:31:54'),(15,15,1,'1','KIOSCO','1','3100','10',1,'1','C','2024-01-01 18:05:24','2024-01-01 18:56:04'),(16,16,1,'1','KIOSCO','1','1700','10',1,'1','C','2024-01-01 18:11:38','2024-01-01 18:57:04'),(17,17,1,'1','KIOSCO','1','1151','10',1,'1','C','2024-01-01 18:11:43','2024-01-01 19:07:04'),(18,18,1,'1','KIOSCO','1','5000','10',1,'1','C','2024-01-01 18:22:20','2024-01-01 19:16:52'),(19,19,1,'1','KIOSCO','1','2500','10',1,'1','C','2024-01-01 18:22:23','2024-01-01 19:22:27'),(20,20,1,'1','KIOSCO','1','1800','10',1,'1','C','2024-01-01 18:23:23','2024-01-01 19:24:41'),(21,21,1,'1','KIOSCO','1','5200','10',1,'1','C','2024-01-01 18:23:26','2024-01-01 19:33:30'),(22,22,1,'1','KIOSCO','1','2251','10',1,'1','C','2024-01-01 18:27:37','2024-01-01 19:36:47'),(23,23,1,'1','KIOSCO','1','2300','10',1,'1','C','2024-01-01 18:27:40','2024-01-02 18:45:33'),(24,24,1,'1','KIOSCO','1','800','10',1,'1','C','2024-01-01 18:34:23','2024-01-09 11:32:50'),(25,25,1,'1','KIOSCO','1','800','10',1,'1','C','2024-01-01 18:34:28','2024-01-09 11:34:42'),(26,26,1,'1','KIOSCO','1','800','10',1,'1','C','2024-01-01 18:56:17','2024-01-09 11:35:05'),(27,27,1,'1','KIOSCO','1','3200','10',1,'1','C','2024-01-01 18:56:19','2024-01-09 11:38:12'),(28,28,1,'1','KIOSCO','1','4000','10',1,'1','C','2024-01-01 18:57:12','2024-01-09 11:44:41'),(29,29,1,'1','KIOSCO','1','1600','10',1,'1','C','2024-01-01 18:57:20','2024-01-09 11:46:47'),(30,30,1,'1','KIOSCO','1','2400','10',2,'1','C','2024-01-01 19:11:30','2024-01-09 11:59:17'),(31,31,1,'1','KIOSCO','1','1600','10',2,'1','C','2024-01-01 19:11:31','2024-01-09 12:01:08'),(32,32,1,'1','KIOSCO','1','1200','10',1,'1','C','2024-01-01 19:14:46','2024-01-09 15:29:21'),(33,33,1,'1','KIOSCO','1','1200','10',1,'1','C','2024-01-01 19:21:07','2024-01-09 16:35:06'),(34,34,1,'1','KIOSCO','1','1800','10',1,'1','C','2024-01-01 19:23:17','2024-01-09 23:17:21'),(35,35,1,'1','KIOSCO','1','1000','10',1,'1','C','2024-01-01 19:23:19','2024-01-09 23:29:02'),(36,36,1,'1','KIOSCO','1','2800','10',1,'1','C','2024-01-01 19:24:47','2024-01-09 23:29:46'),(37,37,1,'1','KIOSCO','1','4000','10',2,'1','C','2024-01-01 19:24:48','2024-01-09 23:40:08'),(38,38,1,'1','KIOSCO','1','7200','10',1,'1','C','2024-01-01 19:33:43','2024-01-10 13:03:48'),(39,39,1,'1','KIOSCO','1','0','9',0,'1','N','2024-01-01 19:33:44','2024-01-12 18:09:17'),(40,40,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-01 20:29:19','2024-01-10 16:09:59'),(41,41,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-01 20:29:20','2024-01-10 16:09:59'),(42,42,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-02 18:45:40','2024-01-10 16:09:59'),(43,43,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-02 18:45:42','2024-01-10 16:09:59'),(44,44,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 11:33:20','2024-01-10 16:09:59'),(45,45,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 11:33:24','2024-01-10 16:09:59'),(46,46,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 11:34:50','2024-01-10 16:09:59'),(47,47,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 11:34:51','2024-01-10 16:09:59'),(48,48,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 11:37:29','2024-01-10 16:09:59'),(49,49,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 11:37:30','2024-01-10 16:09:59'),(50,50,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 11:44:10','2024-01-10 16:09:59'),(51,51,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 11:44:11','2024-01-10 16:09:59'),(52,52,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 11:46:06','2024-01-10 16:09:59'),(53,53,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 11:46:07','2024-01-10 16:09:59'),(54,54,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 11:58:59','2024-01-10 16:09:59'),(55,55,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 11:59:00','2024-01-10 16:09:59'),(56,56,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 12:00:04','2024-01-10 16:09:59'),(57,57,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 12:00:06','2024-01-10 16:09:59'),(58,58,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 15:28:44','2024-01-10 16:09:59'),(59,59,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 15:28:45','2024-01-10 16:09:59'),(60,60,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 16:34:40','2024-01-10 16:09:59'),(61,61,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 16:34:42','2024-01-10 16:09:59'),(62,62,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 16:35:14','2024-01-10 16:09:59'),(63,63,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-09 16:35:15','2024-01-10 16:09:59'),(64,64,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-10 23:25:09','2024-01-10 16:09:59'),(65,65,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-10 23:25:10','2024-01-10 16:09:59'),(66,66,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-10 23:29:10','2024-01-10 16:09:59'),(67,67,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-10 23:29:12','2024-01-10 16:09:59'),(68,68,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-10 23:39:42','2024-01-10 16:09:59'),(69,69,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-10 23:39:43','2024-01-10 16:09:59'),(70,70,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-10 23:40:16','2024-01-10 16:09:59'),(71,71,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-10 23:40:17','2024-01-10 16:09:59'),(72,72,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-10 13:03:58','2024-01-10 16:09:59'),(73,73,1,'1','KIOSCO','1','0','9',0,'1','C','2024-01-10 13:03:59','2024-01-10 16:09:59'),(74,74,1,'1','KIOSCO','1','0','9',0,'2','C','2024-01-10 13:10:57','0000-00-00 00:00:00'),(75,75,1,'1','KIOSCO','1','0','9',0,'2','C','2024-01-10 13:14:54','0000-00-00 00:00:00'),(76,76,1,'1','KIOSCO','1','0','9',0,'2','C','2024-01-10 13:16:39','0000-00-00 00:00:00'),(77,77,1,'1','KIOSCO','1','0','9',0,'2','C','2024-01-10 13:18:01','0000-00-00 00:00:00'),(78,78,1,'1','KIOSCO','1','0','9',0,'2','C','2024-01-10 13:20:12','0000-00-00 00:00:00'),(79,79,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:07:51','0000-00-00 00:00:00'),(80,80,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:07:58','0000-00-00 00:00:00'),(81,81,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:07:59','0000-00-00 00:00:00'),(82,82,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:00','0000-00-00 00:00:00'),(83,83,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:01','0000-00-00 00:00:00'),(84,84,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:16','0000-00-00 00:00:00'),(85,85,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:17','0000-00-00 00:00:00'),(86,86,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:17','0000-00-00 00:00:00'),(87,87,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:18','0000-00-00 00:00:00'),(88,88,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:19','0000-00-00 00:00:00'),(89,89,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:20','0000-00-00 00:00:00'),(90,90,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:21','0000-00-00 00:00:00'),(91,91,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:21','0000-00-00 00:00:00'),(92,92,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:22','0000-00-00 00:00:00'),(93,93,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:23','0000-00-00 00:00:00'),(94,94,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:23','0000-00-00 00:00:00'),(95,95,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:24','0000-00-00 00:00:00'),(96,96,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:24','0000-00-00 00:00:00'),(97,97,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:25','0000-00-00 00:00:00'),(98,98,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:26','0000-00-00 00:00:00'),(99,99,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:26','0000-00-00 00:00:00'),(100,100,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:26','0000-00-00 00:00:00'),(101,101,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:27','0000-00-00 00:00:00'),(102,102,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:27','0000-00-00 00:00:00'),(103,103,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:27','0000-00-00 00:00:00'),(104,104,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:27','0000-00-00 00:00:00'),(105,105,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:28','0000-00-00 00:00:00'),(106,106,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:28','0000-00-00 00:00:00'),(107,107,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:28','0000-00-00 00:00:00'),(108,108,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:28','0000-00-00 00:00:00'),(109,109,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:29','0000-00-00 00:00:00'),(110,110,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:29','0000-00-00 00:00:00'),(111,111,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:29','0000-00-00 00:00:00'),(112,112,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:29','0000-00-00 00:00:00'),(113,113,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:29','0000-00-00 00:00:00'),(114,114,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:30','0000-00-00 00:00:00'),(115,115,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:30','0000-00-00 00:00:00'),(116,116,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:30','0000-00-00 00:00:00'),(117,117,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:08:30','0000-00-00 00:00:00'),(118,118,1,'1','KIOSCO','1','0','9',0,'2','A','2024-01-12 18:09:17','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `correlativo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta_corriente`
--

DROP TABLE IF EXISTS `cuenta_corriente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuenta_corriente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `rut` varchar(45) NOT NULL,
  `id_venta` int NOT NULL,
  `estado` varchar(4) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta_corriente`
--

LOCK TABLES `cuenta_corriente` WRITE;
/*!40000 ALTER TABLE `cuenta_corriente` DISABLE KEYS */;
INSERT INTO `cuenta_corriente` VALUES (1,1,'19150634-0',4,'C','2023-12-31');
/*!40000 ALTER TABLE `cuenta_corriente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas_corrientes`
--

DROP TABLE IF EXISTS `cuentas_corrientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentas_corrientes` (
  `id` int NOT NULL,
  `id_cl` int NOT NULL,
  `rut` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_venta` int NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `cuentas_corrientescol` varchar(45) COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cuentas_corrientes` (`id_cl`),
  CONSTRAINT `fk_cuentas_corrientes` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas_corrientes`
--

LOCK TABLES `cuentas_corrientes` WRITE;
/*!40000 ALTER TABLE `cuentas_corrientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuentas_corrientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giros`
--

DROP TABLE IF EXISTS `giros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giros` (
  `id` int NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `iva` int DEFAULT NULL,
  `tributa` int DEFAULT NULL,
  `net` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giros`
--

LOCK TABLES `giros` WRITE;
/*!40000 ALTER TABLE `giros` DISABLE KEYS */;
INSERT INTO `giros` VALUES (11111,'CULTIVO DE TRIGO',1,1,1),(11112,'CULTIVO DE MAIZ',1,1,1),(11113,'CULTIVO DE AVENA',1,1,1),(11114,'CULTIVO DE ARROZ',1,1,1),(11115,'CULTIVO DE CEBADA',1,1,1),(11119,'CULTIVO DE OTROS CEREALES',1,1,1),(11121,'CULTIVO FORRAJEROS EN PRADERAS NATURALES',1,1,1),(11122,'CULTIVO FORRAJEROS EN PRADERAS MEJORADAS O SEMBRADAS',1,1,1),(11131,'CULTIVO DE POROTOS O FRIJOL',1,1,1),(11132,'CULTIVO, PRODUCCIÓN DE LUPINO',1,1,1),(11139,'CULTIVO DE OTRAS LEGUMBRES',1,1,1),(11141,'CULTIVO DE PAPAS',1,1,1),(11142,'CULTIVO DE CAMOTES O BATATAS',1,1,1),(11149,'CULTIVO DE OTROS TUBÉRCULOS N.C.P',1,1,1),(11151,'CULTIVO DE RAPS',1,1,1),(11152,'CULTIVO DE MARAVILLA',1,1,1),(11159,'CULTIVO DE OTRAS OLEAGINOSAS N.C.P.',1,1,1),(11160,'PRODUCCIÓN DE SEMILLAS DE CEREALES, LEGUMBRES, OLEAGINOSAS',1,1,1),(11191,'CULTIVO DE REMOLACHA',1,1,1),(11192,'CULTIVO DE TABACO',1,1,1),(11193,'CULTIVO DE FIBRAS VEGETALES INDUSTRIALES',1,1,1),(11194,'CULTIVO DE PLANTAS AROMÁTICAS O MEDICINALES',1,1,1),(11199,'OTROS CULTIVOS N.C.P.',1,1,1),(11211,'CULTIVO TRADICIONAL DE HORTALIZAS FRESCAS',1,1,1),(11212,'CULTIVO DE HORTALIZAS EN INVERNADEROS Y CULTIVOS HIDROPONICOS',1,1,1),(11213,'CULTIVO ORGÁNICO DE HORTALIZAS',1,1,1),(11220,'CULTIVO DE PLANTAS VIVAS Y PRODUCTOS DE LA FLORICULTURA',1,1,1),(11230,'PRODUCCIÓN DE SEMILLAS DE FLORES, PRADOS, FRUTAS Y HORTALIZAS',1,1,1),(11240,'PRODUCCIÓN EN VIVEROS; EXCEPTO ESPECIES FORESTALES',1,1,1),(11250,'CULTIVO Y RECOLECCIÓN DE HONGOS, TRUFAS Y SAVIA; PRODUCCIÓN DE JARABE DE ARCE DE AZÚCAR Y AZÚCAR',1,1,1),(11311,'CULTIVO DE UVA DESTINADA A PRODUCCIÓN DE PISCO Y AGUARDIENTE',1,1,1),(11312,'CULTIVO DE UVA DESTINADA A PRODUCCIÓN DE VINO',1,1,1),(11313,'CULTIVO DE UVA DE MESA',1,1,1),(11321,'CULTIVO DE FRUTALES EN ÁRBOLES O ARBUSTOS CON CICLO DE VIDA MAYOR A UNA TEMPORADA',1,1,1),(11322,'CULTIVO DE FRUTALES MENORES EN PLANTAS CON CICLO DE VIDA DE UNA TEMPORADA',1,1,1),(11330,'CULTIVO DE PLANTAS CUYAS HOJAS O FRUTAS SE UTILIZAN PARA PREPARAR BEBIDAS',1,1,1),(11340,'CULTIVO DE ESPECIAS',1,1,1),(12111,'CRÍA DE GANADO BOVINO PARA LA PRODUCCIÓN LECHERA',1,1,1),(12112,'CRÍA DE GANADO PARA PRODUCCIÓN DE CARNE, O COMO GANADO REPRODUCTOR',1,1,1),(12120,'CRÍA DE GANADO OVINO Y/O EXPLOTACIÓN LANERA',1,1,1),(12130,'CRÍA DE EQUINOS (CABALLARES, MULARES)',1,1,1),(12210,'CRÍA DE PORCINOS',1,1,1),(12221,'CRÍA DE AVES DE CORRAL PARA LA PRODUCCIÓN DE CARNE',1,1,1),(12222,'CRÍA DE AVES DE CORRAL PARA LA PRODUCCIÓN DE HUEVOS',1,1,1),(12223,'CRÍA DE AVES FINAS O NO TRADICIONALES',1,1,1),(12230,'CRÍA DE ANIMALES DOMÉSTICOS; PERROS Y GATOS',1,1,1),(12240,'APICULTURA',1,1,1),(12250,'RANICULTURA, HELICICULTURA U OTRA ACTIVIDAD CON ANIMALES MENORES O INSECTOS',1,1,1),(12290,'OTRAS EXPLOTACIONES DE ANIMALES NO CLASIFICADOS EN OTRA PARTE, INCLUIDO SUS SUBPRODUCTOS',1,1,1),(13000,'EXPLOTACIÓN MIXTA',1,1,1),(14011,'SERVICIO DE CORTE Y ENFARDADO DE FORRAJE',1,1,1),(14012,'SERVICIO DE RECOLECCIÓN, EMPACADO, TRILLA, DESCASCARAMIENTO Y DESGRANE; Y SIMILARES',1,1,1),(14013,'SERVICIO DE ROTURACIÓN SIEMBRA Y SIMILARES',1,1,1),(14014,'DESTRUCCIÓN DE PLAGAS; PULVERIZACIONES, FUMIGACIONES U OTRAS',1,1,1),(14015,'COSECHA, PODA, AMARRE Y LABORES DE ADECUACIÓN DE LA PLANTA U OTRAS',1,1,1),(14019,'OTROS SERVICIOS AGRÍCOLAS N.C.P.',1,1,1),(14021,'SERVICIOS DE ADIESTRAMIENTO, GUARDERÍA Y CUIDADOS DE MASCOTAS; EXCEPTO ACTIVIDADES VETERINARIAS',1,1,1),(14022,'SERVICIOS GANADEROS, EXCEPTO ACTIVIDADES VETERINARIAS',1,1,1),(15010,'CAZA DE MAMÍFEROS MARINOS; EXCEPTO BALLENAS',1,1,1),(15090,'CAZA ORDINARIA Y MEDIANTE TRAMPAS, Y ACTIVIDADES DE SERVICIOS CONEXAS',1,1,1),(20010,'EXPLOTACIÓN DE BOSQUES',1,1,1),(20020,'RECOLECCIÓN DE PRODUCTOS FORESTALES SILVESTRES',1,1,1),(20030,'EXPLOTACIÓN DE VIVEROS DE ESPECIES FORESTALES',1,1,1),(20041,'SERVICIOS DE FORESTACIÓN',1,1,1),(20042,'SERVICIOS DE CORTA DE MADERA',1,1,1),(20043,'SERVICIOS DE CONTROL DE INCENDIOS FORESTALES',1,1,1),(20049,'OTRAS ACTIVIDADES DE SERVICIOS CONEXAS A LA SILVICULTURA N.C.P.',1,1,1),(51010,'CULTIVO DE ESPECIES ACUÁTICAS EN CUERPO DE AGUA DULCE',1,1,1),(51020,'REPRODUCCIÓN Y CRIANZAS DE PECES MARINOS',1,1,1),(51030,'CULTIVO, REPRODUCCIÓN Y CRECIMIENTOS DE VEGETALES ACUÁTICOS',1,1,1),(51040,'REPRODUCCIÓN Y CRÍA DE MOLUSCOS Y CRUSTACEOS.',1,1,1),(51090,'SERVICIOS RELACIONADOS CON LA ACUICULTURA, NO INCLUYE SERVICIOS PROFESIONALES Y DE EXTRACCIÓN',1,1,1),(52010,'PESCA INDUSTRIAL',1,1,1),(52020,'ACTIVIDAD PESQUERA DE BARCOS FACTORÍAS',1,1,1),(52030,'PESCA ARTESANAL. EXTRACCIÓN DE RECURSOS ACUÁTICOS EN GENERAL; INCLUYE BALLENAS',1,1,1),(52040,'RECOLECCIÓN DE PRODUCTOS MARINOS, COMO PERLAS NATURALES, ESPONJAS, CORALES Y ALGAS.',1,1,1),(52050,'SERVICIOS RELACIONADOS CON LA PESCA, NO INCLUYE SERVICIOS PROFESIONALES',1,1,1),(100000,'EXTRACCIÓN, AGLOMERACIÓN DE CARBÓN DE PIEDRA, LIGNITO Y TURBA',1,1,1),(111000,'EXTRACCIÓN DE PETRÓLEO CRUDO Y GAS NATURAL',1,1,1),(112000,'ACTIVIDADES DE SERVICIOS RELACIONADAS CON LA EXTRACCIÓN DE PETRÓLEO Y GAS',1,1,1),(120000,'EXTRACCIÓN DE MINERALES DE URANIO Y TORIO',1,1,1),(131000,'EXTRACCIÓN DE MINERALES DE HIERRO',1,1,1),(132010,'EXTRACCIÓN DE ORO Y PLATA',1,1,1),(132020,'EXTRACCIÓN DE ZINC Y PLOMO',1,1,1),(132030,'EXTRACCIÓN DE MANGANESO',1,1,1),(132090,'EXTRACCIÓN DE OTROS MINERALES METALÍFEROS N.C.P.',1,1,1),(133000,'EXTRACCIÓN DE COBRE',1,1,1),(141000,'EXTRACCIÓN DE PIEDRA, ARENA Y ARCILLA',1,1,1),(142100,'EXTRACCIÓN DE NITRATOS Y YODO',1,1,1),(142200,'EXTRACCIÓN DE SAL',1,1,1),(142300,'EXTRACCIÓN DE LITIO Y CLORUROS, EXCEPTO SAL',1,1,1),(142900,'EXPLOTACIÓN DE OTRAS MINAS Y CANTERAS N.C.P.',1,1,1),(151110,'PRODUCCIÓN, PROCESAMIENTO DE CARNES ROJAS Y PRODUCTOS CÁRNICOS',1,1,1),(151120,'CONSERVACIÓN DE CARNES ROJAS (FRIGORÍFICOS)',1,1,1),(151130,'PRODUCCIÓN, PROCESAMIENTO Y CONSERVACIÓN DE CARNES DE AVE Y OTRAS CARNES DISTINTAS A LAS ROJAS',1,1,1),(151140,'ELABORACIÓN DE CECINAS, EMBUTIDOS Y CARNES EN CONSERVA.',1,1,1),(151210,'PRODUCCIÓN DE HARINA DE PESCADO',1,1,1),(151221,'FABRICACIÓN DE PRODUCTOS ENLATADOS DE PESCADO Y MARISCOS',1,1,1),(151222,'ELABORACIÓN DE CONGELADOS DE PESCADOS Y MARISCOS',1,1,1),(151223,'ELABORACIÓN DE PRODUCTOS AHUMADOS, SALADOS, DESHIDRATADOS Y OTROS PROCESOS SIMILARES',1,1,1),(151230,'ELABORACIÓN DE PRODUCTOS EN BASE A VEGETALES ACUÁTICOS',1,1,1),(151300,'ELABORACIÓN Y CONSERVACIÓN DE FRUTAS, LEGUMBRES Y HORTALIZAS',1,1,1),(151410,'ELABORACIÓN DE ACEITES Y GRASAS DE ORIGEN VEGETAL',1,1,1),(151420,'ELABORACIÓN DE ACEITES Y GRASAS DE ORIGEN ANIMAL, EXCEPTO LAS MANTEQUILLAS',1,1,1),(151430,'ELABORACIÓN DE ACEITES Y GRASAS DE ORIGEN MARINO',1,1,1),(152010,'ELABORACIÓN DE LECHE, MANTEQUILLA, PRODUCTOS LÁCTEOS Y DERIVADOS',1,1,1),(152020,'ELABORACIÓN DE QUESOS',1,1,1),(152030,'FABRICACIÓN DE POSTRES A BASE DE LECHE (HELADOS, SORBETES Y OTROS SIMILARES)',1,1,1),(153110,'ELABORACIÓN DE HARINAS DE TRIGO',1,1,1),(153120,'ACTIVIDADES DE MOLIENDA DE ARROZ',1,1,1),(153190,'ELABORACIÓN DE OTRAS MOLINERAS Y ALIMENTOS A BASE DE CEREALES',1,1,1),(153210,'ELABORACIÓN DE ALMIDONES Y PRODUCTOS DERIVADOS DEL ALMIDÓN',1,1,1),(153220,'ELABORACIÓN DE GLUCOSA Y OTROS AZÚCARES DIFERENTES DE LA REMOLACHA',1,1,1),(153300,'ELABORACIÓN DE ALIMENTOS PREPARADOS PARA ANIMALES',1,1,1),(154110,'FABRICACIÓN DE PAN, PRODUCTOS DE PANADERÍA Y PASTELERÍA',1,1,1),(154120,'FABRICACIÓN DE GALLETAS',1,1,1),(154200,'ELABORACIÓN DE AZÚCAR DE REMOLACHA O CANA',1,1,1),(154310,'ELABORACIÓN DE CACAO Y CHOCOLATES',1,1,1),(154320,'FABRICACIÓN DE PRODUCTOS DE CONFITERÍA',1,1,1),(154400,'ELABORACIÓN DE MACARRONES, FIDEOS, ALCUZCUZ Y PRODUCTOS FARINACEOS SIMILARES',1,1,1),(154910,'ELABORACIÓN DE TE, CAFÉ, INFUSIONES',1,1,1),(154920,'ELABORACIÓN DE LEVADURAS NATURALES O ARTIFICIALES',1,1,1),(154930,'ELABORACIÓN DE VINAGRES, MOSTAZAS, MAYONESAS Y CONDIMENTOS EN GENERAL',1,1,1),(154990,'ELABORACIÓN DE OTROS PRODUCTOS ALIMENTICIOS NO CLASIFICADOS EN OTRA PARTE',1,1,1),(155110,'ELABORACIÓN DE PISCOS (INDUSTRIAS PISQUERAS)',1,1,1),(155120,'ELABORACIÓN DE BEBIDAS ALCOHÓLICAS Y DE ALCOHOL ETÍLICO A PARTIR DE SUSTANCIAS FERMENTADAS Y OTROS',1,1,1),(155200,'ELABORACIÓN DE VINOS',1,1,1),(155300,'ELABORACIÓN DE BEBIDAS MALTEADAS, CERVEZAS Y MALTAS',1,1,1),(155410,'ELABORACIÓN DE BEBIDAS NO ALCOHÓLICAS',1,1,1),(155420,'ENVASADO DE AGUA MINERAL NATURAL, DE MANANTIAL Y POTABLE PREPARADA',1,1,1),(155430,'ELABORACIÓN DE HIELO',1,1,1),(160010,'FABRICACIÓN DE CIGARROS Y CIGARRILLOS',1,1,1),(160090,'FABRICACIÓN DE OTROS PRODUCTOS DEL TABACO',1,1,1),(171100,'PREPARACIÓN DE HILATURA DE FIBRAS TEXTILES; TEJEDURA PROD. TEXTILES',1,1,1),(171200,'ACABADO DE PRODUCTOS TEXTIL',1,1,1),(172100,'FABRICACIÓN DE ARTÍCULOS CONFECCIONADOS DE MATERIAS TEXTILES, EXCEPTO PRENDAS DE VESTIR',1,1,1),(172200,'FABRICACIÓN DE TAPICES Y ALFOMBRA',1,1,1),(172300,'FABRICACIÓN DE CUERDAS, CORDELES, BRAMANTES Y REDES',1,1,1),(172910,'FABRICACIÓN DE TEJIDOS DE USO INDUSTRIAL COMO TEJIDOS IMPREGNADOS, MOLTOPRENE, BATISTA, ETC.',1,1,1),(172990,'FABRICACIÓN DE OTROS PRODUCTOS TEXTILES N.C.P.',1,1,1),(173000,'FABRICACIÓN DE TEJIDOS DE PUNTO',1,1,1),(181010,'FABRICACIÓN DE PRENDAS DE VESTIR TEXTILES Y SIMILARES',1,1,1),(181020,'FABRICACIÓN DE PRENDAS DE VESTIR DE CUERO NATURAL, ARTIFICIAL, PLÁSTICO',1,1,1),(181030,'FABRICACIÓN DE ACCESORIOS DE VESTIR',1,1,1),(181040,'FABRICACIÓN DE ROPA DE TRABAJO',1,1,1),(182000,'ADOBO Y TENIDOS DE PIELES; FABRICACIÓN DE ARTÍCULOS DE PIEL',1,1,1),(191100,'CURTIDO Y ADOBO DE CUEROS',1,1,1),(191200,'FABRICACIÓN DE MALETAS, BOLSOS DE MANO Y SIMILARES; ARTÍCULOS DE TALABARTERÍA Y GUARNICIONERÍA',1,1,1),(192000,'FABRICACIÓN DE CALZADO',1,1,1),(201000,'ASERRADO Y ACEPILLADURA DE MADERAS',1,1,1),(202100,'FABRICACIÓN DE TABLEROS, PANELES Y HOJAS DE MADERA PARA ENCHAPADO',1,1,1),(202200,'FABRICACIÓN DE PARTES Y PIEZAS DE CARPINTERÍA PARA EDIFICIOS Y CONSTRUCCIONES',1,1,1),(202300,'FABRICACIÓN DE RECIPIENTES DE MADERA',1,1,1),(202900,'FABRICACIÓN DE OTROS PRODUCTOS DE MADERA; ARTÍCULOS DE CORCHO, PAJA Y MATERIALES TRENZABLES',1,1,1),(210110,'FABRICACIÓN DE CELULOSA Y OTRAS PASTAS DE MADERA',1,1,1),(210121,'FABRICACIÓN DE PAPEL DE PERIÓDICO',1,1,1),(210129,'FABRICACIÓN DE PAPEL Y CARTÓN N.C.P.',1,1,1),(210200,'FABRICACIÓN DE PAPEL Y CARTÓN ONDULADO Y DE ENVASES DE PAPEL Y CARTÓN',1,1,1),(210900,'FABRICACIÓN DE OTROS ARTÍCULOS DE PAPEL Y CARTÓN',1,1,1),(221101,'EDICIÓN PRINCIPALMENTE DE LIBROS',1,1,1),(221109,'EDICIÓN DE FOLLETOS, PARTITURAS Y OTRAS PUBLICACIONES',1,1,1),(221200,'EDICIÓN DE PERIÓDICOS, REVISTAS Y PUBLICACIONES PERIÓDICAS',1,1,1),(221300,'EDICIÓN DE GRABACIONES',1,1,1),(221900,'OTRAS ACTIVIDADES DE EDICIÓN',1,1,1),(222101,'IMPRESIÓN PRINCIPALMENTE DE LIBROS',1,1,1),(222109,'OTRAS ACTIVIDADES DE IMPRESIÓN N.C.P.',1,1,1),(222200,'ACTIVIDADES DE SERVICIO RELACIONADA CON LA IMPRESIÓN',1,1,1),(223000,'REPRODUCCIÓN DE GRABACIONES',1,1,1),(231000,'FABRICACIÓN DE PRODUCTOS DE HORNOS COQUE',1,1,1),(232000,'FABRICACIÓN DE PRODUCTOS DE REFINACIÓN DE PETRÓLEO',1,1,1),(233000,'ELABORACIÓN DE COMBUSTIBLE NUCLEAR',1,1,1),(241110,'FABRICACIÓN DE CARBÓN VEGETAL, Y BRIQUETAS DE CARBÓN VEGETAL',1,1,1),(241190,'FABRICACIÓN DE SUSTANCIAS QUÍMICAS BÁSICAS, EXCEPTO ABONOS Y COMPUESTOS DE NITRÓGENO',1,1,1),(241200,'FABRICACIÓN DE ABONOS Y COMPUESTOS DE NITRÓGENO',1,1,1),(241300,'FABRICACIÓN DE PLÁSTICOS EN FORMAS PRIMARIAS Y DE CAUCHO SINTÉTICO',1,1,1),(242100,'FABRICACIÓN DE PLAGUICIDAS Y OTROS PRODUCTOS QUÍMICOS DE USO AGROPECUARIO',1,1,1),(242200,'FABRICACIÓN DE PINTURAS, BARNICES Y PRODUCTOS DE REVESTIMIENTO SIMILARES',1,1,1),(242300,'FABRICACIÓN DE PRODUCTOS FARMACEUTICOS, SUSTANCIAS QUÍMICAS MEDICINALES Y PRODUCTOS BOTÁNICOS',1,1,1),(242400,'FABRICACIONES DE JABONES Y DETERGENTES, PREPARADOS PARA LIMPIAR, PERFUMES Y PREPARADOS DE TOCADOR',1,1,1),(242910,'FABRICACIÓN DE EXPLOSIVOS Y PRODUCTOS DE PIROTECNIA',1,1,1),(242990,'FABRICACIÓN DE OTROS PRODUCTOS QUÍMICOS N.C.P.',1,1,1),(243000,'FABRICACIÓN DE FIBRAS MANUFACTURADAS',1,1,1),(251110,'FABRICACIÓN DE CUBIERTAS Y CÁMARAS DE CAUCHO',1,1,1),(251120,'RECAUCHADO Y RENOVACIÓN DE CUBIERTAS DE CAUCHO',1,1,1),(251900,'FABRICACIÓN DE OTROS PRODUCTOS DE CAUCHO',1,1,1),(252010,'FABRICACIÓN DE PLANCHAS, LÁMINAS, CINTAS, TIRAS DE PLÁSTICO',1,1,1),(252020,'FABRICACIÓN DE TUBOS, MANGUERAS PARA LA CONSTRUCCIÓN',1,1,1),(252090,'FABRICACIÓN DE OTROS ARTÍCULOS DE PLÁSTICO',1,1,1),(261010,'FABRICACIÓN, MANIPULADO Y TRANSFORMACIÓN DE VIDRIO PLANO',1,1,1),(261020,'FABRICACIÓN DE VIDRIO HUECO',1,1,1),(261030,'FABRICACIÓN DE FIBRAS DE VIDRIO',1,1,1),(261090,'FABRICACIÓN DE ARTÍCULOS DE VIDRIO N.C.P.',1,1,1),(269101,'FABRICACIÓN DE PRODUCTOS DE CERÁMICA NO REFRACTARIA PARA USO NO ESTRUCTURAL CON FINES ORNAMENTALES',1,1,1),(269109,'FABRICACIÓN DE PRODUCTOS DE CERÁMICA NO REFRACTARIA PARA USO NO ESTRUCTURAL N.C.P.',1,1,1),(269200,'FABRICACIÓN DE PRODUCTOS DE CERÁMICAS REFRACTARIA',1,1,1),(269300,'FABRICACIÓN DE PRODUCTOS DE ARCILLA Y CERÁMICAS NO REFRACTARIAS PARA USO ESTRUCTURAL',1,1,1),(269400,'FABRICACIÓN DE CEMENTO, CAL Y YESO',1,1,1),(269510,'ELABORACIÓN DE HORMIGÓN, ARTÍCULOS DE HORMIGÓN Y MORTERO (MEZCLA PARA CONSTRUCCIÓN)',1,1,1),(269520,'FABRICACIÓN DE PRODUCTOS DE FIBROCEMENTO Y ASBESTOCEMENTO',1,1,1),(269530,'FABRICACIÓN DE PANELES DE YESO PARA LA CONSTRUCCIÓN',1,1,1),(269590,'FABRICACIÓN DE ARTÍCULOS DE CEMENTO Y YESO N.C.P.',1,1,1),(269600,'CORTE, TALLADO Y ACABADO DE LA PIEDRA',1,1,1),(269910,'FABRICACIÓN DE MEZCLAS BITUMINOSAS A BASE DE ASFALTO, DE BETUNES NATURALES, Y PRODUCTOS SIMILARES',1,1,1),(269990,'FABRICACIÓN DE OTROS PRODUCTOS MINERALES NO METÁLICOS N.C.P',1,1,1),(271000,'INDUSTRIAS BASICAS DE HIERRO Y ACERO',1,1,1),(272010,'ELABORACIÓN DE PRODUCTOS DE COBRE EN FORMAS PRIMARIAS.',1,1,1),(272020,'ELABORACIÓN DE PRODUCTOS DE ALUMINIO EN FORMAS PRIMARIAS',1,1,1),(272090,'FABRICACIÓN DE PRODUCTOS PRIMARIOS DE METALES PRECIOSOS Y DE OTROS METALES NO FERROSOS N.C.P.',1,1,1),(273100,'FUNDICIÓN DE HIERRO Y ACERO',1,1,1),(273200,'FUNDICIÓN DE METALES NO FERROSOS',1,1,1),(281100,'FABRICACIÓN DE PRODUCTOS METÁLICOS DE USO ESTRUCTURAL',1,1,1),(281211,'FABRICACIÓN DE RECIPIENTES DE GAS COMPRIMIDO O LICUADO',1,1,1),(281219,'FABRICACIÓN DE TANQUES, DEPÓSITOS Y RECIPIENTES DE METAL N.C.P.',1,1,1),(281280,'REPARACIÓN DE TANQUES, DEPÓSITOS Y RECIPIENTES DE METAL',1,1,1),(281310,'FABRICACIÓN DE GENERADORES DE VAPOR, EXCEPTO CALDERAS DE AGUA CALIENTE PARA CALEFACCIÓN',1,1,1),(281380,'REPARACIÓN DE GENERADORES DE VAPOR, EXCEPTO CALDERAS DE AGUA CALIENTE PARA CALEFACCIÓN CENTRAL',1,1,1),(289100,'FORJA, PRENSADO, ESTAMPADO Y LAMINADO DE METAL; INCLUYE PULVIMETALURGIA',1,1,1),(289200,'TRATAMIENTOS Y REVESTIMIENTOS DE METALES; OBRAS DE INGENIERÍA MECÁNICA EN GENERAL',1,1,1),(289310,'FABRICACIÓN DE ARTÍCULOS DE CUCHILLERÍA',1,1,1),(289320,'FABRICACIÓN DE HERRAMIENTAS DE MANO Y ARTÍCULOS DE FERRETERÍA',1,1,1),(289910,'FABRICACIÓN DE CABLES, ALAMBRES Y PRODUCTOS DE ALAMBRE',1,1,1),(289990,'FABRICACIÓN DE OTROS PRODUCTOS ELABORADOS DE METAL N.C.P.',1,1,1),(291110,'FABRICACIÓN DE MOTORES Y TURBINAS, EXCEPTO PARA AERONAVES, VEHÍCULOS AUTOMOTORES Y MOTOCICLETAS',1,1,1),(291180,'REPARACIÓN DE MOTORES Y TURBINAS, EXCEPTO PARA AERONAVES, VEHÍCULOS AUTOMOTORES Y MOTOCICLETAS',1,1,1),(291210,'FABRICACIÓN DE BOMBAS, GRIFOS, VÁLVULAS, COMPRESORES, SISTEMAS HIDRÁULICOS',1,1,1),(291280,'REPARACIÓN DE BOMBAS, COMPRESORES, SISTEMAS HIDRÁULICOS, VÁLVULAS Y ARTÍCULOS DE GRIFERÍA',1,1,1),(291310,'FABRICACIÓN DE COJINETES, ENGRANAJES, TRENES DE ENGRANAJES Y PIEZAS DE TRANSMISIÓN',1,1,1),(291380,'REPARACIÓN DE COJINETES, ENGRANAJES, TRENES DE ENGRANAJES Y PIEZAS DE TRANSMISIÓN',1,1,1),(291410,'FABRICACIÓN DE HORNOS, HOGARES Y QUEMADORES',1,1,1),(291480,'REPARACIÓN DE HORNOS, HOGARES Y QUEMADORES',1,1,1),(291510,'FABRICACIÓN DE EQUIPO DE ELEVACIÓN Y MANIPULACIÓN',1,1,1),(291580,'REPARACIÓN DE EQUIPO DE ELEVACIÓN Y MANIPULACIÓN',1,1,1),(291910,'FABRICACIÓN DE OTRO TIPO DE MAQUINARIAS DE USO GENERAL',1,1,1),(291980,'REPARACIÓN OTROS TIPOS DE MAQUINARIA Y EQUIPOS DE USO GENERAL',1,1,1),(292110,'FABRICACIÓN DE MAQUINARIA AGROPECUARIA Y FORESTAL',1,1,1),(292180,'REPARACIÓN DE MAQUINARIA AGROPECUARIA Y FORESTAL',1,1,1),(292210,'FABRICACIÓN DE MÁQUINAS HERRAMIENTAS',1,1,1),(292280,'REPARACIÓN DE MÁQUINAS HERRAMIENTAS',1,1,1),(292310,'FABRICACIÓN DE MAQUINARIA METALÚRGICA',1,1,1),(292380,'REPARACIÓN DE MAQUINARIA PARA LA INDUSTRIA METALÚRGICA',1,1,1),(292411,'FABRICACIÓN DE MAQUINARIA PARA MINAS Y CANTERAS Y PARA OBRAS DE CONSTRUCCIÓN',1,1,1),(292412,'FABRICACIÓN DE PARTES PARA MÁQUINAS DE SONDEO O PERFORACIÓN',1,1,1),(292480,'REPARACIÓN DE MAQUINARIA PARA LA EXPLOTACIÓN DE PETRÓLEO, MINAS, CANTERAS, Y OBRAS DE CONSTRUCCIÓN',1,1,1),(292510,'FABRICACIÓN DE MAQUINARIA PARA LA ELABORACIÓN DE ALIMENTOS, BEBIDAS Y TABACOS',1,1,1),(292580,'REPARACIÓN DE MAQUINARIA PARA LA ELABORACIÓN DE ALIMENTOS, BEBIDAS Y TABACOS',1,1,1),(292610,'FABRICACIÓN DE MAQUINARIA PARA LA ELABORACIÓN DE PRENDAS TEXTILES, PRENDAS DE VESTIR Y CUEROS',1,1,1),(292680,'REPARACIÓN DE MAQUINARIA PARA LA INDUSTRIA TEXTIL, DE LA CONFECCIÓN, DEL CUERO Y DEL CALZADO',1,1,1),(292710,'FABRICACIÓN DE ARMAS Y MUNICIONES',1,1,1),(292780,'REPARACIÓN DE ARMAS',1,1,1),(292910,'FABRICACIÓN DE OTROS TIPOS DE MAQUINARIAS DE USO ESPECIAL',1,1,1),(292980,'REPARACIÓN DE OTROS TIPOS DE MAQUINARIA DE USO ESPECIAL',1,1,1),(293000,'FABRICACIÓN DE APARATOS DE USO DOMÉSTICO N.C.P.',1,1,1),(300010,'FABRICACIÓN Y ARMADO DE COMPUTADORES Y HARDWARE EN GENERAL',1,1,1),(300020,'FABRICACIÓN DE MAQUINARIA DE OFICINA, CONTABILIDAD, N.C.P.',1,1,1),(311010,'FABRICACIÓN DE MOTORES, GENERADORES Y TRANSFORMADORES ELÉCTRICOS',1,1,1),(311080,'REPARACIÓN DE MOTORES, GENERADORES Y TRANSFORMADORES ELÉCTRICOS',1,1,1),(312010,'FABRICACIÓN DE APARATOS DE DISTRIBUCIÓN Y CONTROL',1,1,1),(312080,'REPARACIÓN DE APARATOS DE DISTRIBUCIÓN Y CONTROL',1,1,1),(313000,'FABRICACIÓN DE HILOS Y CABLES AISLADOS',1,1,1),(314000,'FABRICACIÓN DE ACUMULADORES DE PILAS Y BATERÍAS PRIMARIAS',1,1,1),(315010,'FABRICACIÓN DE LÁMPARAS Y EQUIPO DE ILUMINACIÓN',1,1,1),(315080,'REPARACIÓN DE EQUIPO DE ILUMINACIÓN',1,1,1),(319010,'FABRICACIÓN DE OTROS TIPOS DE EQUIPO ELÉCTRICO N.C.P.',1,1,1),(319080,'REPARACIÓN DE OTROS TIPOS DE EQUIPO ELÉCTRICO N.C.P.',1,1,1),(321010,'FABRICACIÓN DE COMPONENTES ELECTRÓNICOS',1,1,1),(321080,'REPARACIÓN DE COMPONENTES ELECTRÓNICOS',1,1,1),(322010,'FABRICACIÓN DE TRANSMISORES DE RADIO Y TELEVISIÓN, APARATOS PARA TELEFONÍA Y TELEGRAFÍA CON HILOS',1,1,1),(322080,'REPARACIÓN DE TRANSMISORES DE RADIO Y TELEVISIÓN, APARATOS PARA TELEFONÍA Y TELEGRAFÍA CON HILOS',1,1,1),(323000,'FABRICACIÓN DE RECEPTORES (RADIO Y TV); APARATOS DE GRABACIÓN Y REPRODUCCIÓN (AUDIO Y VIDEO)',1,1,1),(331110,'FABRICACIÓN DE EQUIPO MÉDICO Y QUIRÚRGICO, Y DE APARATOS ORTOPÉDICOS',1,1,1),(331120,'LABORATORIOS DENTALES',1,1,1),(331180,'REPARACIÓN DE EQUIPO MÉDICO Y QUIRÚRGICO, Y DE APARATOS ORTOPÉDICOS',1,1,1),(331210,'FABRICACIÓN DE INSTRUMENTOS Y APARATOS PARA MEDIR, VERIFICAR, ENSAYAR, NAVEGAR Y OTROS FINES',1,1,1),(331280,'REPARACIÓN DE INSTRUMENTOS Y APARATOS PARA MEDIR, VERIFICAR, ENSAYAR, NAVEGAR Y OTROS FINES',1,1,1),(331310,'FABRICACIÓN DE EQUIPOS DE CONTROL DE PROCESOS INDUSTRIALES',1,1,1),(331380,'REPARACIÓN DE EQUIPOS DE CONTROL DE PROCESOS INDUSTRIALES',1,1,1),(332010,'FABRICACIÓN Y/O REPARACIÓN DE LENTES Y ARTÍCULOS OFTALMOLÓGICOS',1,1,1),(332020,'FABRICACIÓN DE INSTRUMENTOS DE OPTICA N.C.P. Y EQUIPOS FOTOGRÁFICOS',1,1,1),(332080,'REPARACIÓN DE INSTRUMENTOS DE OPTICA N.C.P Y EQUIPO FOTOGRÁFICOS',1,1,1),(333000,'FABRICACIÓN DE RELOJES',1,1,1),(341000,'FABRICACIÓN DE VEHÍCULOS AUTOMOTORES',1,1,1),(342000,'FABRICACIÓN DE CARROCERÍAS PARA VEHÍCULOS AUTOMOTORES; FABRICACIÓN DE REMOLQUES Y SEMI REMOLQUES',1,1,1),(343000,'FABRICACIÓN DE PARTES Y ACCESORIOS PARA VEHÍCULOS AUTOMOTORES Y SUS MOTORES',1,1,1),(351110,'CONSTRUCCIÓN Y REPARACIÓN DE BUQUES; ASTILLEROS',1,1,1),(351120,'CONSTRUCCIÓN DE EMBARCACIONES MENORES',1,1,1),(351180,'REPARACIÓN DE EMBARCACIONES MENORES',1,1,1),(351210,'CONSTRUCCIÓN DE EMBARCACIONES DE RECREO Y DEPORTE',1,1,1),(351280,'REPARACIÓN DE EMBARCACIONES DE RECREO Y DEPORTES',1,1,1),(352000,'FABRICACIÓN DE LOCOMOTORAS Y DE MATERIAL RODANTE PARA FERROCARRILES Y TRANVÍAS',1,1,1),(353010,'FABRICACIÓN DE AERONAVES Y NAVES ESPACIALES',1,1,1),(353080,'REPARACIÓN DE AERONAVES Y NAVES ESPACIALES',1,1,1),(359100,'FABRICACIÓN DE MOTOCICLETAS',1,1,1),(359200,'FABRICACIÓN DE BICICLETAS Y DE SILLONES DE RUEDAS PARA INVALIDOS',1,1,1),(359900,'FABRICACIÓN DE OTROS EQUIPOS DE TRANSPORTE N.C.P.',1,1,1),(361010,'FABRICACIÓN DE MUEBLES PRINCIPALMENTE DE MADERA',1,1,1),(361020,'FABRICACIÓN DE OTROS MUEBLES N.C.P., INCLUSO COLCHONES',1,1,1),(369100,'FABRICACIÓN DE JOYAS Y PRODUCTOS CONEXOS',1,1,1),(369200,'FABRICACIÓN DE INSTRUMENTOS DE MÚSICA',1,1,1),(369300,'FABRICACIÓN DE ARTÍCULOS DE DEPORTE',1,1,1),(369400,'FABRICACIÓN DE JUEGOS Y JUGUETES',1,1,1),(369910,'FABRICACIÓN DE PLUMAS Y LÁPICES DE TODA CLASE Y ARTÍCULOS DE ESCRITORIO EN GENERAL',1,1,1),(369920,'FABRICACIÓN DE BROCHAS, ESCOBAS Y CEPILLOS',1,1,1),(369930,'FABRICACIÓN DE FÓSFOROS',1,1,1),(369990,'FABRICACIÓN DE ARTÍCULOS DE OTRAS INDUSTRIAS N.C.P.',1,1,1),(371000,'RECICLAMIENTO DE DESPERDICIOS Y DESECHOS METÁLICOS',1,1,1),(372010,'RECICLAMIENTO DE PAPEL',1,1,1),(372020,'RECICLAMIENTO DE VIDRIO',1,1,1),(372090,'RECICLAMIENTO DE OTROS DESPERDICIOS Y DESECHOS N.C.P.',1,1,1),(401011,'GENERACIÓN HIDROELÉCTRICA',1,1,1),(401012,'GENERACIÓN EN CENTRALES TERMOELÉCTRICA DE CICLOS COMBINADOS',1,1,1),(401013,'GENERACIÓN EN OTRAS CENTRALES TERMOELÉCTRICAS',1,1,1),(401019,'GENERACIÓN EN OTRAS CENTRALES N.C.P.',1,1,1),(401020,'TRANSMISIÓN DE ENERGÍA ELÉCTRICA',1,1,1),(401030,'DISTRIBUCIÓN DE ENERGIA ELÉCTRICA',1,1,1),(402000,'FABRICACIÓN DE GAS; DISTRIBUCIÓN DE COMBUSTIBLES GASEOSOS POR TUBERÍAS',1,1,1),(403000,'SUMINISTRO DE VAPOR Y AGUA CALIENTE',1,1,1),(410000,'CAPTACIÓN, DEPURACIÓN Y DISTRIBUCIÓN DE AGUA',NULL,1,1),(451010,'PREPARACIÓN DEL TERRENO, EXCAVACIONES Y MOVIMIENTOS DE TIERRAS',1,1,1),(451020,'SERVICIOS DE DEMOLICIÓN Y EL DERRIBO DE EDIFICIOS Y OTRAS ESTRUCTURAS',1,1,1),(452010,'CONSTRUCCIÓN DE EDIFICIOS COMPLETOS O DE PARTES DE EDIFICIOS',1,1,1),(452020,'OBRAS DE INGENIERÍA',1,1,1),(453000,'ACONDICIONAMIENTO DE EDIFICIOS',1,1,1),(454000,'OBRAS MENORES EN CONSTRUCCIÓN (CONTRATISTAS, ALBANILES, CARPINTEROS)',1,1,1),(455000,'ALQUILER DE EQUIPO DE CONSTRUCCIÓN O DEMOLICIÓN DOTADO DE OPERARIOS',1,1,1),(501010,'VENTA AL POR MAYOR DE VEHÍCULOS AUTOMOTORES (IMPORTACIÓN, DISTRIBUCIÓN) EXCEPTO MOTOCICLETAS',1,1,1),(501020,'VENTA O COMPRAVENTA AL POR MENOR DE VEHÍCULOS AUTOMOTORES NUEVOS O USADOS; EXCEPTO MOTOCICLETAS',1,1,1),(502010,'SERVICIO DE LAVADO DE VEHÍCULOS AUTOMOTORES',NULL,1,1),(502020,'SERVICIOS DE REMOLQUE DE VEHÍCULOS (GRUAS)',1,1,1),(502080,'MANTENIMIENTO Y REPARACIÓN DE VEHÍCULOS AUTOMOTORES',NULL,1,1),(503000,'VENTA DE PARTES, PIEZAS Y ACCESORIOS DE VEHÍCULOS AUTOMOTORES',1,1,1),(504010,'VENTA DE MOTOCICLETAS',1,1,1),(504020,'VENTA DE PIEZAS Y ACCESORIOS DE MOTOCICLETAS',1,1,1),(504080,'REPARACIÓN DE MOTOCICLETAS',NULL,1,1),(505000,'VENTA AL POR MENOR DE COMBUSTIBLE PARA AUTOMOTORES',1,1,1),(511010,'CORRETAJE DE PRODUCTOS AGRÍCOLAS',1,1,1),(511020,'CORRETAJE DE GANADO (FERIAS DE GANADO)',1,1,1),(511030,'OTROS TIPOS DE CORRETAJES O REMATES N.C.P. (NO INCLUYE SERVICIOS DE MARTILLERO)',1,1,1),(512110,'VENTA AL POR MAYOR DE ANIMALES VIVOS',1,1,1),(512120,'VENTA AL POR MAYOR DE PRODUCTOS PECUARIOS (LANAS, PIELES, CUEROS SIN PROCESAR); EXCEPTO ALIMENTOS',1,1,1),(512130,'VENTA AL POR MAYOR DE MATERIAS PRIMAS AGRÍCOLAS',1,1,1),(512210,'MAYORISTA DE FRUTAS Y VERDURAS',1,1,1),(512220,'MAYORISTAS DE CARNES',1,1,1),(512230,'MAYORISTAS DE PRODUCTOS DEL MAR (PESCADO, MARISCOS, ALGAS)',1,1,1),(512240,'MAYORISTAS DE VINOS Y BEBIDAS ALCOHÓLICAS Y DE FANTASÍA',1,1,1),(512250,'VENTA AL POR MAYOR DE CONFITES',1,1,1),(512260,'VENTA AL POR MAYOR DE TABACO Y PRODUCTOS DERIVADOS',1,1,1),(512290,'VENTA AL POR MAYOR DE HUEVOS, LECHE, ABARROTES, Y OTROS ALIMENTOS N.C.P.',1,1,1),(513100,'VENTA AL POR MAYOR DE PRODUCTOS TEXTILES, PRENDAS DE VESTIR Y CALZADO',1,1,1),(513910,'VENTA AL POR MAYOR DE MUEBLES',1,1,1),(513920,'VENTA AL POR MAYOR DE ARTÍCULOS ELÉCTRICOS Y ELECTRÓNICOS PARA EL HOGAR',1,1,1),(513930,'VENTA AL POR MAYOR DE ARTÍCULOS DE PERFUMERÍA, COSMÉTICOS, JABONES Y PRODUCTOS DE LIMPIEZA',1,1,1),(513940,'VENTA AL POR MAYOR DE PAPEL Y CARTÓN',1,1,1),(513951,'VENTA AL POR MAYOR DE LIBROS',1,1,1),(513952,'VENTA AL POR MAYOR DE REVISTAS Y PERIÓDICOS',1,1,1),(513960,'VENTA AL POR MAYOR DE PRODUCTOS FARMACEUTICOS',1,1,1),(513970,'VENTA AL POR MAYOR DE INSTRUMENTOS CIENTÍFICOS Y QUIRÚRGICOS',1,1,1),(513990,'VENTA AL POR MAYOR DE OTROS ENSERES DOMÉSTICOS N.C.P.',1,1,1),(514110,'VENTA AL POR MAYOR DE COMBUSTIBLES LÍQUIDOS',1,1,1),(514120,'VENTA AL POR MAYOR DE COMBUSTIBLES SÓLIDOS',1,1,1),(514130,'VENTA AL POR MAYOR DE COMBUSTIBLES GASEOSOS',1,1,1),(514140,'VENTA AL POR MAYOR DE PRODUCTOS CONEXOS A LOS COMBUSTIBLES',1,1,1),(514200,'VENTA AL POR MAYOR DE METALES Y MINERALES METALÍFEROS',1,1,1),(514310,'VENTA AL POR MAYOR DE MADERA NO TRABAJADA Y PRODUCTOS RESULTANTES DE SU ELABORACIÓN PRIMARIA',1,1,1),(514320,'VENTA AL POR MAYOR DE MATERIALES DE CONSTRUCCIÓN, ARTÍCULOS DE FERRETERÍA Y RELACIONADOS',1,1,1),(514910,'VENTA AL POR MAYOR DE PRODUCTOS QUÍMICOS',1,1,1),(514920,'VENTA AL POR MAYOR DE DESECHOS METÁLICOS (CHATARRA)',1,1,1),(514930,'VENTA AL POR MAYOR DE INSUMOS VETERINARIOS',1,1,1),(514990,'VENTA AL POR MAYOR DE OTROS PRODUCTOS INTERMEDIOS, DESPERDICIOS Y DESECHOS N.C.P.',1,1,0),(515001,'VENTA AL POR MAYOR DE MAQUINARIA AGRÍCOLA Y FORESTAL',1,1,1),(515002,'VENTA AL POR MAYOR DE MAQUINARIA METALÚRGICA',1,1,1),(515003,'VENTA AL POR MAYOR DE MAQUINARIA PARA LA MINERÍA',1,1,1),(515004,'VENTA AL POR MAYOR DE MAQUINARIA PARA LA CONSTRUCCIÓN',1,1,1),(515005,'VENTA AL POR MAYOR DE MAQUINARIA PARA LA ELABORACIÓN DE ALIMENTOS, BEBIDAS Y TABACO',1,1,1),(515006,'VENTA AL POR MAYOR DE MAQUINARIA PARA TEXTILES Y CUEROS',1,1,1),(515007,'VENTA AL POR MAYOR DE MÁQUINAS Y EQUIPOS DE OFICINA; INCLUYE MATERIALES CONEXOS',1,1,1),(515008,'VENTA AL POR MAYOR DE MAQUINARIA Y EQUIPO DE TRANSPORTE EXCEPTO VEHÍCULOS AUTOMOTORES',1,1,1),(515009,'VENTA AL POR MAYOR DE MAQUINARIA, HERRAMIENTAS, EQUIPO Y MATERIALES N.C.P.',1,1,1),(519000,'VENTA AL POR MAYOR DE OTROS PRODUCTOS N.C.P.',1,1,0),(521111,'GRANDES ESTABLECIMIENTOS (VENTA DE ALIMENTOS); HIPERMERCADOS',1,1,1),(521112,'ALMACENES MEDIANOS (VENTA DE ALIMENTOS); SUPERMERCADOS, MINIMARKETS',1,1,1),(521120,'ALMACENES PEQUENOS (VENTA DE ALIMENTOS)',1,1,1),(521200,'GRANDES TIENDAS - PRODUCTOS DE FERRETERÍA Y PARA EL HOGAR',1,1,1),(521300,'GRANDES TIENDAS - VESTUARIO Y PRODUCTOS PARA EL HOGAR',1,1,1),(521900,'VENTA AL POR MENOR DE OTROS PRODUCTOS EN PEQUENOS ALMACENES NO ESPECIALIZADOS',1,1,1),(522010,'VENTA AL POR MENOR DE BEBIDAS Y LICORES (BOTILLERÍAS)',1,1,1),(522020,'VENTA AL POR MENOR DE CARNES (ROJAS, BLANCAS, OTRAS) PRODUCTOS CÁRNICOS Y SIMILARES',1,1,1),(522030,'COMERCIO AL POR MENOR DE VERDURAS Y FRUTAS (VERDULERÍA)',1,1,1),(522040,'VENTA AL POR MENOR DE PESCADOS, MARISCOS Y PRODUCTOS CONEXOS',1,1,1),(522050,'VENTA AL POR MENOR DE PRODUCTOS DE PANADERÍA Y PASTELERÍA',1,1,1),(522060,'VENTA AL POR MENOR DE ALIMENTOS PARA MASCOTAS Y ANIMALES EN GENERAL',1,1,1),(522070,'VENTA AL POR MENOR DE AVES Y HUEVOS',1,1,1),(522090,'VENTA AL POR MENOR DE PRODUCTOS DE CONFITERÍAS, CIGARRILLOS, Y OTROS',1,1,1),(523111,'FARMACIAS - PERTENECIENTES A CADENA DE ESTABLECIMIENTOS',1,1,1),(523112,'FARMACIAS INDEPENDIENTES',1,1,1),(523120,'VENTA AL POR MENOR DE PRODUCTOS MEDICINALES',1,1,1),(523130,'VENTA AL POR MENOR DE ARTÍCULOS ORTOPÉDICOS',1,1,1),(523140,'VENTA AL POR MENOR DE ARTÍCULOS DE TOCADOR Y COSMÉTICOS',1,1,1),(523210,'VENTA AL POR MENOR DE CALZADO',1,1,1),(523220,'VENTA AL POR MENOR DE PRENDAS DE VESTIR EN GENERAL, INCLUYE ACCESORIOS',1,1,1),(523230,'VENTA AL POR MENOR DE LANAS, HILOS Y SIMILARES',1,1,1),(523240,'VENTA AL POR MENOR DE MALETERÍAS, TALABARTERÍAS Y ARTÍCULOS DE CUERO',1,1,1),(523250,'VENTA AL POR MENOR DE ROPA INTERIOR Y PRENDAS DE USO PERSONAL',1,1,1),(523290,'COMERCIO AL POR MENOR DE TEXTILES PARA EL HOGAR Y OTROS PRODUCTOS TEXTILES N.C.P.',1,1,1),(523310,'VENTA AL POR MENOR DE ARTÍCULOS ELECTRODOMÉSTICOS Y ELECTRÓNICOS PARA EL HOGAR',1,1,1),(523320,'VENTA AL POR MENOR DE CRISTALES, LOZAS, PORCELANA, MENAJE (CRISTALERÍAS)',1,1,1),(523330,'VENTA AL POR MENOR DE MUEBLES; INCLUYE COLCHONES',1,1,1),(523340,'VENTA AL POR MENOR DE INSTRUMENTOS MUSICALES (CASA DE MÚSICA)',1,1,1),(523350,'VENTA AL POR MENOR DE DISCOS, CASSETTES, DVD Y VIDEOS',1,1,1),(523360,'VENTA AL POR MENOR DE LÁMPARAS, APLIQUÉS Y SIMILARES',1,1,1),(523390,'VENTA AL POR MENOR DE APARATOS, ARTÍCULOS, EQUIPO DE USO DOMÉSTICO N.C.P.',1,1,1),(523410,'VENTA AL POR MENOR DE ARTÍCULOS DE FERRETERÍA Y MATERIALES DE CONSTRUCCIÓN',1,1,1),(523420,'VENTA AL POR MENOR DE PINTURAS, BARNICES Y LACAS',1,1,1),(523430,'COMERCIO AL POR MENOR DE PRODUCTOS DE VIDRIO',1,1,1),(523911,'COMERCIO AL POR MENOR DE ARTÍCULOS FOTOGRÁFICOS',1,1,1),(523912,'COMERCIO AL POR MENOR DE ARTÍCULOS ÓPTICOS',1,1,1),(523921,'COMERCIO POR MENOR DE JUGUETES',1,1,1),(523922,'COMERCIO AL POR MENOR DE LIBROS',1,1,1),(523923,'COMERCIO AL POR MENOR DE REVISTAS Y DIARIOS',1,1,1),(523924,'COMERCIO DE ARTÍCULOS DE SUMINISTROS DE OFICINAS Y ARTÍCULOS DE ESCRITORIO EN GENERAL',1,1,1),(523930,'COMERCIO AL POR MENOR DE COMPUTADORAS, SOFTWARES Y SUMINISTROS',1,1,1),(523941,'COMERCIO AL POR MENOR DE ARMERÍAS, ARTÍCULOS DE CAZA Y PESCA',1,1,1),(523942,'COMERCIO AL POR MENOR DE BICICLETAS Y SUS REPUESTOS',1,1,1),(523943,'COMERCIO AL POR MENOR DE ARTÍCULOS DEPORTIVOS',1,1,1),(523950,'COMERCIO AL POR MENOR DE ARTÍCULOS DE JOYERÍA, FANTASÍAS Y RELOJERÍAS',1,1,1),(523961,'VENTA AL POR MENOR DE GAS LICUADO EN BOMBONAS',1,1,1),(523969,'VENTA AL POR MENOR DE CARBÓN, LENA Y OTROS COMBUSTIBLES DE USO DOMÉSTICO',1,1,1),(523991,'COMERCIO AL POR MENOR DE ARTÍCULOS TÍPICOS (ARTESANÍAS)',1,1,1),(523992,'VENTA AL POR MENOR DE FLORES, PLANTAS, ÁRBOLES, SEMILLAS, ABONOS',1,1,1),(523993,'VENTA AL POR MENOR DE MASCOTAS Y ACCESORIOS',1,1,1),(523999,'VENTAS AL POR MENOR DE OTROS PRODUCTOS EN ALMACENES ESPECIALIZADOS N.C.P.',1,1,1),(524010,'COMERCIO AL POR MENOR DE ANTIGUEDADES',1,1,1),(524020,'COMERCIO AL POR MENOR DE ROPA USADA',1,1,1),(524090,'COMERCIO AL POR MENOR DE ARTÍCULOS Y ARTEFACTOS USADOS N.C.P.',1,1,1),(525110,'VENTA AL POR MENOR EN EMPRESAS DE VENTA A DISTANCIA POR CORREO',1,1,1),(525120,'VENTA AL POR MENOR EN EMPRESAS DE VENTA A DISTANCIA VÍA TELEFÓNICA',1,1,1),(525130,'VENTA AL POR MENOR EN EMPRESAS DE VENTA A DISTANCIA VÍA INTERNET; COMERCIO ELECTRÓNICO',1,1,1),(525200,'VENTA AL POR MENOR EN PUESTOS DE VENTA Y MERCADOS',1,1,1),(525911,'VENTA AL POR MENOR REALIZADA POR INDEPENDIENTES EN TRANSPORTE PÚBLICO (LEY 20.388)',1,1,1),(525919,'VENTA AL POR MENOR NO REALIZADA EN ALMACENES DE PRODUCTOS PROPIOS N.C.P.',1,1,1),(525920,'MÁQUINAS EXPENDEDORAS',1,1,1),(525930,'VENTA AL POR MENOR A CAMBIO DE UNA RETRIBUCIÓN O POR CONTRATA',1,1,1),(525990,'OTROS TIPOS DE VENTA AL POR MENOR NO REALIZADA EN ALMACENES N.C.P.',1,1,1),(526010,'REPARACIÓN DE CALZADO Y OTROS ARTÍCULOS DE CUERO',NULL,1,1),(526020,'REPARACIONES ELÉCTRICAS Y ELECTRÓNICAS',NULL,1,1),(526030,'REPARACIÓN DE RELOJES Y JOYAS',NULL,1,1),(526090,'OTRAS REPARACIONES DE EFECTOS PERSONALES Y ENSERES DOMÉSTICOS N.C.P.',NULL,1,1),(551010,'HOTELES',1,1,1),(551020,'MOTELES',1,1,1),(551030,'RESIDENCIALES',1,1,1),(551090,'OTROS TIPOS DE HOSPEDAJE TEMPORAL COMO CAMPING, ALBERGUES, POSADAS, REFUGIOS Y SIMILARES',1,1,1),(552010,'RESTAURANTES',1,1,1),(552020,'ESTABLECIMIENTOS DE COMIDA RÁPIDA (BARES, FUENTES DE SODA, GELATERÍAS, PIZZERÍAS Y SIMILARES)',1,1,1),(552030,'CASINOS Y CLUBES SOCIALES',1,1,1),(552040,'SERVICIOS DE COMIDA PREPARADA EN FORMA INDUSTRIAL',1,1,1),(552050,'SERVICIOS DE BANQUETES, BODAS Y OTRAS CELEBRACIONES',1,1,1),(552090,'SERVICIOS DE OTROS ESTABLECIMIENTOS QUE EXPENDEN COMIDAS Y BEBIDAS',1,1,1),(601001,'TRANSPORTE INTERURBANO DE PASAJEROS POR FERROCARRILES',1,1,1),(601002,'TRANSPORTE DE CARGA POR FERROCARRILES',1,1,1),(602110,'TRANSPORTE URBANO DE PASAJEROS VÍA FERROCARRIL (INCLUYE METRO)',0,1,1),(602120,'TRANSPORTE URBANO DE PASAJEROS VÍA AUTOBUS (LOCOMOCIÓN COLECTIVA)',0,1,1),(602130,'TRANSPORTE INTERURBANO DE PASAJEROS VÍA AUTOBUS',0,1,1),(602140,'TRANSPORTE URBANO DE PASAJEROS VÍA TAXI COLECTIVO',0,1,1),(602150,'SERVICIOS DE TRANSPORTE ESCOLAR',0,1,1),(602160,'SERVICIOS DE TRANSPORTE DE TRABAJADORES',0,1,1),(602190,'OTROS TIPOS DE TRANSPORTE REGULAR DE PASAJEROS POR VÍA TERRESTRE N.C.P.',0,1,1),(602210,'TRANSPORTES POR TAXIS LIBRES Y RADIOTAXIS',0,1,1),(602220,'SERVICIOS DE TRANSPORTE A TURISTAS',0,1,1),(602230,'TRANSPORTE DE PASAJEROS EN VEHÍCULOS DE TRACCIÓN HUMANA Y ANIMAL',0,1,1),(602290,'OTROS TIPOS DE TRANSPORTE NO REGULAR DE PASAJEROS N.C.P.',0,1,1),(602300,'TRANSPORTE DE CARGA POR CARRETERA',1,1,1),(603000,'TRANSPORTE POR TUBERÍAS',1,1,1),(611001,'TRANSPORTE MARÍTIMO Y DE CABOTAJE DE PASAJEROS',1,1,1),(611002,'TRANSPORTE MARÍTIMO Y DE CABOTAJE DE CARGA',1,1,1),(612001,'TRANSPORTE DE PASAJEROS POR VÍAS DE NAVEGACIÓN INTERIORES',1,1,1),(612002,'TRANSPORTE DE CARGA POR VÍAS DE NAVEGACIÓN INTERIORES',1,1,1),(621010,'TRANSPORTE REGULAR POR VÍA AÉREA DE PASAJEROS',1,1,1),(621020,'TRANSPORTE REGULAR POR VÍA AÉREA DE CARGA',1,1,1),(622001,'TRANSPORTE NO REGULAR POR VÍA AÉREA DE PASAJEROS',1,1,1),(622002,'TRANSPORTE NO REGULAR POR VÍA AÉREA DE CARGA',1,1,1),(630100,'MANIPULACIÓN DE LA CARGA',1,1,1),(630200,'SERVICIOS DE ALMACENAMIENTO Y DEPÓSITO',1,1,1),(630310,'TERMINALES TERRESTRES DE PASAJEROS',1,1,1),(630320,'ESTACIONAMIENTO DE VEHÍCULOS Y PARQUÍMETROS',1,1,1),(630330,'PUERTOS Y AEROPUERTOS',1,1,1),(630340,'SERVICIOS PRESTADOS POR CONCESIONARIOS DE CARRETERAS',1,1,1),(630390,'OTRAS ACTIVIDADES CONEXAS AL TRANSPORTE N.C.P.',1,1,1),(630400,'AGENCIAS Y ORGANIZADORES DE VIAJES; ACTIVIDADES DE ASISTENCIA A TURISTAS N.C.P.',1,1,1),(630910,'AGENCIAS DE ADUANAS',NULL,1,1),(630920,'AGENCIAS DE TRANSPORTE',NULL,1,1),(641100,'ACTIVIDADES POSTALES NACIONALES',NULL,1,1),(641200,'ACTIVIDADES DE CORREO DISTINTAS DE LAS ACTIVIDADES POSTALES NACIONALES',NULL,1,1),(642010,'SERVICIOS DE TELEFONÍA FIJA',1,1,1),(642020,'SERVICIOS DE TELEFONÍA MÓVIL',1,1,1),(642030,'PORTADORES TELEFÓNICOS (LARGA DISTANCIA NACIONAL E INTERNACIONAL)',1,1,1),(642040,'SERVICIOS DE TELEVISIÓN NO ABIERTA',1,1,1),(642050,'PROVEEDORES DE INTERNET',1,1,1),(642061,'CENTROS DE LLAMADOS; INCLUYE ENVÍO DE FAX',1,1,1),(642062,'CENTROS DE ACCESO A INTERNET',1,1,1),(642090,'OTROS SERVICIOS DE TELECOMUNICACIONES N.C.P.',1,1,1),(651100,'BANCA CENTRAL',1,1,0),(651910,'BANCOS',1,1,0),(651920,'FINANCIERAS',1,1,1),(651990,'OTROS TIPOS DE INTERMEDIACIÓN MONETARIA N.C.P.',1,1,1),(659110,'LEASING FINANCIERO',1,1,1),(659120,'LEASING HABITACIONAL',1,1,1),(659210,'FINANCIAMIENTO DEL FOMENTO DE LA PRODUCCIÓN',1,1,0),(659220,'ACTIVIDADES DE CRÉDITO PRENDARIO',1,1,1),(659231,'FACTORING',1,1,1),(659232,'SECURITIZADORAS',1,1,0),(659290,'OTROS INSTITUCIONES FINANCIERAS N.C.P.',1,1,1),(659911,'ADMINISTRADORAS DE FONDOS DE INVERSIÓN',1,1,1),(659912,'ADMINISTRADORAS DE FONDOS MUTUOS',1,1,1),(659913,'ADMINISTRADORAS DE FICES (FONDOS DE INVERSIÓN DE CAPITAL EXTRANJERO)',1,1,1),(659914,'ADMINISTRADORAS DE FONDOS PARA LA VIVIENDA',1,1,1),(659915,'ADMINISTRADORAS DE FONDOS PARA OTROS FINES Y/O GENERALES',1,1,1),(659920,'SOCIEDADES DE INVERSIÓN Y RENTISTAS DE CAPITALES MOBILIARIOS EN GENERAL',0,1,1),(660101,'PLANES DE SEGURO DE VIDA',1,1,0),(660102,'PLANES DE REASEGUROS DE VIDA',1,1,0),(660200,'ADMINISTRADORAS DE FONDOS DE PENSIONES (AFP)',1,1,0),(660301,'PLANES DE SEGUROS GENERALES',1,1,0),(660302,'PLANES DE REASEGUROS GENERALES',1,1,0),(660400,'ISAPRES',1,1,0),(671100,'ADMINISTRACIÓN DE MERCADOS FINANCIEROS',1,1,1),(671210,'CORREDORES DE BOLSA',1,1,1),(671220,'AGENTES DE VALORES',1,1,1),(671290,'OTROS SERVICIOS DE CORRETAJE',1,1,1),(671910,'CÁMARA DE COMPENSACIÓN',1,1,1),(671921,'ADMINISTRADORA DE TARJETAS DE CRÉDITO',1,1,1),(671929,'EMPRESAS DE ASESORÍA, CONSULTORÍA FINANCIERA Y DE APOYO AL GIRO',NULL,1,1),(671930,'CLASIFICADORES DE RIESGOS',1,1,1),(671940,'CASAS DE CAMBIO Y OPERADORES DE DIVISA',NULL,1,1),(671990,'OTRAS ACTIVIDADES AUXILIARES DE LA INTERMEDIACIÓN FINANCIERA N.C.P.',1,1,1),(672010,'CORREDORES DE SEGUROS',NULL,1,1),(672020,'AGENTES Y LIQUIDADORES DE SEGUROS',0,2,1),(672090,'OTRAS ACTIVIDADES AUXILIARES DE LA FINANCIACIÓN DE PLANES DE SEGUROS Y DE PENSIONES N.C.P.',NULL,NULL,1),(701001,'ARRIENDO DE INMUEBLES AMOBLADOS O CON EQUIPOS Y MAQUINARIAS',1,1,1),(701009,'COMPRA, VENTA Y ALQUILER (EXCEPTO AMOBLADOS) DE INMUEBLES PROPIOS O ARRENDADOS',0,1,1),(702000,'CORREDORES DE PROPIEDADES',NULL,NULL,1),(711101,'ALQUILER DE AUTOS Y CAMIONETAS SIN CHOFER',1,1,1),(711102,'ALQUILER DE OTROS EQUIPOS DE TRANSPORTE POR VÍA TERRESTRE SIN OPERARIOS',1,1,1),(711200,'ALQUILER DE TRANSPORTE POR VÍA ACUÁTICA SIN TRIPULACIÓN',1,1,1),(711300,'ALQUILER DE EQUIPO DE TRANSPORTE POR VÍA AÉREA SIN TRIPULANTES',1,1,1),(712100,'ALQUILER DE MAQUINARIA Y EQUIPO AGROPECUARIO',1,1,1),(712200,'ALQUILER DE MAQUINARIA Y EQUIPO DE CONSTRUCCIÓN E INGENIERÍA CIVIL',1,1,1),(712300,'ALQUILER DE MAQUINARIA Y EQUIPO DE OFICINA (SIN OPERARIOS NI SERVICIO ADMINISTRATIVO)',1,1,1),(712900,'ALQUILER DE OTROS TIPOS DE MAQUINARIAS Y EQUIPOS N.C.P.',1,1,1),(713010,'ALQUILER DE BICICLETAS Y ARTÍCULOS PARA DEPORTES',1,1,1),(713020,'ARRIENDO DE VIDEOS, JUEGOS DE VIDEO, Y EQUIPOS REPRODUCTORES DE VIDEO, MÚSICA Y SIMILARES',1,1,1),(713030,'ALQUILER DE MOBILIARIO PARA EVENTOS (SILLAS, MESAS, MESONES, VAJILLAS, TOLDOS Y RELACIONADOS)',1,1,1),(713090,'ALQUILER DE OTROS EFECTOS PERSONALES Y ENSERES DOMÉSTICOS N.C.P.',1,1,1),(722000,'ASESORES Y CONSULTORES EN INFORMÁTICA (SOFTWARE)',0,2,1),(724000,'PROCESAMIENTO DE DATOS Y ACTIVIDADES RELACIONADAS CON BASES DE DATOS',NULL,1,1),(725000,'MANTENIMIENTO Y REPARACIÓN DE MAQUINARIA DE OFICINA, CONTABILIDAD E INFORMÁTICA',1,1,1),(726000,'EMPRESAS DE SERVICIOS INTEGRALES DE INFORMÁTICA',NULL,1,1),(731000,'INVESTIGACIONES Y DESARROLLO EXPERIMENTAL EN EL CAMPO DE LAS CIENCIAS NATURALES Y LA INGENIERÍA',NULL,1,1),(732000,'INVESTIGACIONES Y DESARROLLO EXPERIMENTAL EN EL CAMPO DE LAS CIENCIAS SOCIALES Y LAS HUMANIDADES',NULL,1,1),(741110,'SERVICIOS JURÍDICOS',0,2,1),(741120,'SERVICIO NOTARIAL',0,2,0),(741130,'CONSERVADOR DE BIENES RAICES',0,2,0),(741140,'RECEPTORES JUDICIALES',0,2,1),(741190,'ARBITRAJES, SÍNDICOS, PERITOS Y OTROS',0,2,1),(741200,'ACTIVIDADES DE CONTABILIDAD, TENEDURÍA DE LIBROS Y AUDITORÍA; ASESORAMIENTOS TRIBUTARIOS',0,2,1),(741300,'INVESTIGACIÓN DE MERCADOS Y REALIZACIÓN DE ENCUESTAS DE OPINIÓN PÚBLICA',NULL,NULL,1),(741400,'ACTIVIDADES DE ASESORAMIENTO EMPRESARIAL Y EN MATERIA DE GESTIÓN',0,NULL,1),(742110,'SERVICIOS DE ARQUITECTURA Y TÉCNICO RELACIONADO',0,2,1),(742121,'EMPRESAS DE SERVICIOS GEOLÓGICOS Y DE PROSPECCIÓN',1,1,1),(742122,'SERVICIOS PROFESIONALES EN GEOLOGÍA Y PROSPECCIÓN',0,2,1),(742131,'EMPRESAS DE SERVICIOS DE TOPOGRAFÍA Y AGRIMENSURA',1,1,1),(742132,'SERVICIOS PROFESIONALES DE TOPOGRAFÍA Y AGRIMENSURA',0,2,1),(742141,'SERVICIOS DE INGENIERÍA PRESTADOS POR EMPRESAS N.C.P.',1,1,1),(742142,'SERVICIOS DE INGENIERÍA PRESTADOS POR PROFESIONALES N.C.P.',0,2,1),(742190,'OTROS SERVICIOS DESARROLLADOS POR PROFESIONALES',0,2,1),(742210,'SERVICIO DE REVISIÓN TÉCNICA DE VEHÍCULOS AUTOMOTORES',1,1,1),(742290,'OTROS SERVICIOS DE ENSAYOS Y ANALISIS TÉCNICOS',NULL,1,1),(743001,'EMPRESAS DE PUBLICIDAD',1,1,1),(743002,'SERVICIOS PERSONALES EN PUBLICIDAD',0,2,1),(749110,'SERVICIOS SUMINISTRO DE PERSONAL; EMPRESAS SERVICIOS TRANSITORIOS',1,1,1),(749190,'SERVICIOS DE RECLUTAMIENTO DE PERSONAL',1,1,1),(749210,'ACTIVIDADES DE INVESTIGACIÓN',NULL,NULL,1),(749221,'SERVICIOS INTEGRALES DE SEGURIDAD',NULL,1,1),(749222,'TRANSPORTE DE VALORES',1,1,1),(749229,'SERVICIOS PERSONALES RELACIONADOS CON SEGURIDAD',0,2,1),(749310,'EMPRESAS DE LIMPIEZA DE EDIFICIOS RESIDENCIALES Y NO RESIDENCIALES',1,1,1),(749320,'DESRATIZACIÓN Y FUMIGACIÓN NO AGRÍCOLA',NULL,1,1),(749401,'SERVICIOS DE REVELADO, IMPRESIÓN, AMPLIACIÓN DE FOTOGRAFÍAS',1,1,1),(749402,'ACTIVIDADES DE FOTOGRAFÍA PUBLICITARIA',NULL,NULL,1),(749409,'SERVICIOS PERSONALES DE FOTOGRAFÍA',0,2,1),(749500,'SERVICIOS DE ENVASADO Y EMPAQUE',1,1,1),(749911,'SERVICIOS DE COBRANZA DE CUENTAS',NULL,1,1),(749912,'EVALUACIÓN Y CALIFICACIÓN DEL GRADO DE SOLVENCIA',NULL,1,1),(749913,'ASESORÍAS EN LA GESTIÓN DE LA COMPRA O VENTA DE PEQUENAS Y MEDIANAS EMPRESAS',NULL,1,1),(749921,'DISENADORES DE VESTUARIO',NULL,NULL,1),(749922,'DISENADORES DE INTERIORES',NULL,NULL,1),(749929,'OTROS DISENADORES N.C.P.',NULL,NULL,1),(749931,'EMPRESAS DE TAQUIGRAFÍA, REPRODUCCIÓN, DESPACHO DE CORRESPONDENCIA, Y OTRAS LABORES DE OFICINA',1,1,1),(749932,'SERVICIOS PERSONALES DE TRADUCCIÓN, INTERPRETACIÓN Y LABORES DE OFICINA',0,2,1),(749933,'EMPRESAS DE TRADUCCIÓN E INTERPRETACIÓN',1,1,1),(749934,'SERVICIOS DE FOTOCOPIAS',1,1,1),(749940,'AGENCIAS DE CONTRATACIÓN DE ACTORES',1,1,1),(749950,'ACTIVIDADES DE SUBASTA (MARTILLEROS)',1,1,1),(749961,'GALERÍAS DE ARTE',1,1,1),(749962,'FERIAS DE EXPOSICIONES CON FINES EMPRESARIALES',NULL,1,1),(749970,'SERVICIOS DE CONTESTACIÓN DE LLAMADAS (CALL CENTER)',1,1,1),(749990,'OTRAS ACTIVIDADES EMPRESARIALES N.C.P.',1,1,1),(751110,'GOBIERNO CENTRAL',NULL,1,0),(751120,'MUNICIPALIDADES',NULL,1,0),(751200,'ACTIVIDADES DEL PODER JUDICIAL',NULL,1,0),(751300,'ACTIVIDADES DEL PODER LEGISLATIVO',NULL,1,0),(752100,'RELACIONES EXTERIORES',NULL,1,0),(752200,'ACTIVIDADES DE DEFENSA',NULL,1,0),(752300,'ACTIVIDADES DE MANTENIMIENTO DEL ORDEN PÚBLICO Y DE SEGURIDAD',NULL,1,1),(753010,'ACTIVIDADES DE PLANES DE SEGURIDAD SOCIAL DE AFILIACIÓN OBLIGATORIA RELACIONADOS CON SALUD',NULL,1,0),(753020,'CAJAS DE COMPENSACIÓN',NULL,1,1),(753090,'OTRAS ACTIVIDADES DE PLANES DE SEGURIDAD SOCIAL DE AFILIACIÓN OBLIGATORIA',NULL,1,0),(801010,'ESTABLECIMIENTOS DE ENSEÑANZA PREESCOLAR',1,1,1),(801020,'ESTABLECIMIENTOS DE ENSEÑANZA PRIMARIA',1,1,1),(802100,'ESTABLECIMIENTOS DE ENSEÑANZA SECUNDARIA DE FORMACIÓN GENERAL',1,1,1),(802200,'ESTABLECIMIENTOS DE ENSEÑANZA SECUNDARIA DE FORMACIÓN TÉCNICA Y PROFESIONAL',1,1,1),(803010,'UNIVERSIDADES',1,1,0),(803020,'INSTITUTOS PROFESIONALES',1,1,0),(803030,'CENTROS DE FORMACIÓN TÉCNICA',1,1,1),(809010,'ESTABLECIMIENTOS DE ENSEÑANZA PRIMARIA Y SECUNDARIA PARA ADULTOS',1,1,1),(809020,'ESTABLECIMIENTOS DE ENSEÑANZA PREUNIVERSITARIA',1,1,1),(809030,'EDUCACIÓN EXTRAESCOLAR (ESCUELA DE CONDUCCIÓN, MÚSICA, MODELAJE, ETC.)',1,1,1),(809041,'EDUCACIÓN A DISTANCIA (INTERNET, CORRESPONDENCIA, OTRAS)',0,1,1),(809049,'SERVICIOS PERSONALES DE EDUCACIÓN',0,2,1),(851110,'HOSPITALES Y CLÍNICAS',1,1,0),(851120,'CLÍNICAS PSIQUIATRICAS, CENTROS DE REHABILITACIÓN, ASILOS Y CLÍNICAS DE REPOSO',1,1,1),(851211,'SERVICIOS DE MÉDICOS EN FORMA INDEPENDIENTE',0,2,1),(851212,'ESTABLECIMIENTOS MÉDICOS DE ATENCIÓN AMBULATORIA (CENTROS MÉDICOS)',NULL,1,1),(851221,'SERVICIOS DE ODONTÓLOGOS EN FORMA INDEPENDIENTE',0,2,1),(851222,'CENTROS DE ATENCIÓN ODONTOLÓGICA',NULL,1,1),(851910,'LABORATORIOS CLÍNICOS; INCLUYE BANCOS DE SANGRE',NULL,1,1),(851920,'OTROS PROFESIONALES DE LA SALUD',0,2,1),(851990,'OTRAS ACTIVIDADES EMPRESARIALES RELACIONADAS CON LA SALUD HUMANA',NULL,1,1),(852010,'ACTIVIDADES DE CLÍNICAS VETERINARIAS',NULL,1,1),(852021,'SERVICIOS DE MÉDICOS VETERINARIOS EN FORMA INDEPENDIENTE',0,2,1),(852029,'SERVICIOS DE OTROS PROFESIONALES INDEPENDIENTES EN EL ÁREA VETERINARIA',0,2,1),(853100,'SERVICIOS SOCIALES CON ALOJAMIENTO',NULL,1,1),(853200,'SERVICIOS SOCIALES SIN ALOJAMIENTO',NULL,1,1),(900010,'SERVICIOS DE VERTEDEROS',1,1,1),(900020,'BARRIDO DE EXTERIORES',1,1,1),(900030,'RECOGIDA Y ELIMINACIÓN DE DESECHOS',1,1,1),(900040,'SERVICIOS DE EVACUACIÓN DE RILES Y AGUAS SERVIDAS',1,1,1),(900050,'SERVICIOS DE TRATAMIENTO DE RILES Y AGUAS SERVIDAS',1,1,1),(900090,'OTRAS ACTIVIDADES DE MANEJO DE DESPERDICIOS',1,1,1),(911100,'ACTIVIDADES DE ORGANIZACIONES EMPRESARIALES Y DE EMPLEADORES',NULL,1,1),(911210,'COLEGIOS PROFESIONALES',NULL,1,0),(911290,'ACTIVIDADES DE OTRAS ORGANIZACIONES PROFESIONALES',NULL,1,1),(912000,'ACTIVIDADES DE SINDICATOS',NULL,1,1),(919100,'ACTIVIDADES DE ORGANIZACIONES RELIGIOSAS',NULL,1,0),(919200,'ACTIVIDADES DE ORGANIZACIONES POLÍTICAS',NULL,1,1),(919910,'CENTROS DE MADRES Y UNIDADES VECINALES Y COMUNALES',NULL,1,0),(919920,'CLUBES SOCIALES',NULL,1,0),(919930,'SERVICIOS DE INSTITUTOS DE ESTUDIOS, FUNDACIONES, CORPORACIONES DE DESARROLLO (EDUCACIÓN, SALUD)',NULL,1,0),(919990,'ACTIVIDADES DE OTRAS ASOCIACIONES N.C.P.',NULL,1,1),(921110,'PRODUCCIÓN DE PELÍCULAS CINEMATOGRÁFICAS',NULL,1,1),(921120,'DISTRIBUIDORA CINEMATOGRÁFICAS',1,1,1),(921200,'EXHIBICIÓN DE FILMES Y VIDEOCINTAS',1,1,1),(921310,'ACTIVIDADES DE TELEVISIÓN',NULL,1,1),(921320,'ACTIVIDADES DE RADIO',NULL,1,1),(921411,'SERVICIOS DE PRODUCCIÓN DE RECITALES Y OTROS EVENTOS MUSICALES MASIVOS',NULL,1,1),(921419,'SERVICIOS DE PRODUCCIÓN TEATRAL Y OTROS N.C.P.',NULL,1,1),(921420,'ACTIVIDADES EMPRESARIALES DE ARTISTAS',1,1,1),(921430,'ACTIVIDADES ARTÍSTICAS; FUNCIONES DE ARTISTAS, ACTORES, MÚSICOS, CONFERENCISTAS, OTROS',0,2,1),(921490,'AGENCIAS DE VENTA DE BILLETES DE TEATRO, SALAS DE CONCIERTO Y DE TEATRO',NULL,1,1),(921911,'INSTRUCTORES DE DANZA',0,2,1),(921912,'ACTIVIDADES DE DISCOTECAS, CABARET, SALAS DE BAILE Y SIMILARES',1,1,1),(921920,'ACTIVIDADES DE PARQUES DE ATRACCIONES Y CENTROS SIMILARES',1,1,1),(921930,'ESPECTÁCULOS CIRCENSES, DE TÍTERES U OTROS SIMILARES',1,1,1),(921990,'OTRAS ACTIVIDADES DE ENTRETENIMIENTO N.C.P.',NULL,NULL,1),(922001,'AGENCIAS DE NOTICIAS',NULL,1,1),(922002,'SERVICIOS PERIODÍSTICOS PRESTADO POR PROFESIONALES',0,2,1),(923100,'ACTIVIDADES DE BIBLIOTECAS Y ARCHIVOS',NULL,1,1),(923200,'ACTIVIDADES DE MUSEOS Y PRESERVACIÓN DE LUGARES Y EDIFICIOS HISTÓRICOS',NULL,1,1),(923300,'ACTIVIDADES DE JARDINES BOTÁNICOS Y ZOOLÓGICOS Y DE PARQUES NACIONALES',NULL,1,1),(924110,'EXPLOTACIÓN DE INSTALACIONES ESPECIALIZADAS PARA LAS PRACTICAS DEPORTIVAS',NULL,1,1),(924120,'ACTIVIDADES DE CLUBES DE DEPORTES Y ESTADIOS',NULL,1,1),(924131,'FUTBOL PROFESIONAL',NULL,1,1),(924132,'FUTBOL AMATEUR',NULL,1,1),(924140,'HIPÓDROMOS',1,1,1),(924150,'PROMOCIÓN Y ORGANIZACIÓN DE ESPECTÁCULOS DEPORTIVOS',NULL,1,1),(924160,'ESCUELAS PARA DEPORTES',1,1,1),(924190,'OTRAS ACTIVIDADES RELACIONADAS AL DEPORTE N.C.P.',NULL,1,1),(924910,'SISTEMAS DE JUEGOS DE AZAR MASIVOS.',1,1,0),(924920,'ACTIVIDADES DE CASINO DE JUEGOS',1,1,0),(924930,'SALAS DE BILLAR, BOWLING, POOL Y JUEGOS ELECTRÓNICOS',1,1,1),(924940,'CONTRATACIÓN DE ACTORES PARA CINE, TV, Y TEATRO',1,1,1),(924990,'OTROS SERVICIOS DE DIVERSIÓN Y ESPARCIMIENTOS N.C.P.',NULL,NULL,1),(930100,'LAVADO Y LIMPIEZA DE PRENDAS DE TELA Y DE PIEL, INCLUSO LAS LIMPIEZAS EN SECO',1,1,1),(930200,'PELUQUERÍAS Y SALONES DE BELLEZA',NULL,NULL,1),(930310,'SERVICIOS FUNERARIOS',1,1,1),(930320,'SERVICIOS EN CEMENTERIOS',1,1,1),(930330,'SERVICIOS DE CARROZAS FÚNEBRES (TRANSPORTE DE CADÁVERES)',1,1,1),(930390,'OTRAS ACTIVIDADES DE SERVICIOS FUNERARIOS Y OTRAS ACTIVIDADES CONEXAS',1,1,1),(930910,'ACTIVIDADES DE MANTENIMIENTO FÍSICO CORPORAL (BAÑOS, TURCOS, SAUNAS)',1,1,1),(930990,'OTRAS ACTIVIDADES DE SERVICIOS PERSONALES N.C.P.',0,2,1),(950001,'HOGARES PRIVADOS INDIVIDUALES CON SERVICIO DOMÉSTICO',0,NULL,0),(950002,'CONSEJO DE ADMINISTRACIÓN DE EDIFICIOS Y CONDOMINIOS',0,1,0),(990000,'ORGANIZACIONES Y ÓRGANOS EXTRATERRITORIALES',NULL,1,0);
/*!40000 ALTER TABLE `giros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metodo_pago`
--

DROP TABLE IF EXISTS `metodo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `metodo_pago` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `nombre_metodo_pago` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metodo_pago`
--

LOCK TABLES `metodo_pago` WRITE;
/*!40000 ALTER TABLE `metodo_pago` DISABLE KEYS */;
INSERT INTO `metodo_pago` VALUES (1,0,'Efectivo','S'),(2,0,'Tarj. Crédito','S'),(3,0,'Tarj. Débito','S'),(4,0,'Transferencia',NULL);
/*!40000 ALTER TABLE `metodo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_cliente`
--

DROP TABLE IF EXISTS `pago_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pago_cliente` (
  `id` int NOT NULL,
  `id_cl` int DEFAULT NULL,
  `plan` int NOT NULL,
  `metodo_pago` int NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `estado` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_cliente`
--

LOCK TABLES `pago_cliente` WRITE;
/*!40000 ALTER TABLE `pago_cliente` DISABLE KEYS */;
INSERT INTO `pago_cliente` VALUES (1,1,2,1,'2023-12-20','2023-12-20','');
/*!40000 ALTER TABLE `pago_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pass_provisoria`
--

DROP TABLE IF EXISTS `pass_provisoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pass_provisoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int DEFAULT NULL,
  `pass` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pass_provisoria`
--

LOCK TABLES `pass_provisoria` WRITE;
/*!40000 ALTER TABLE `pass_provisoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `pass_provisoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `id_proveedor` int NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado_pago` varchar(5) COLLATE utf8mb3_spanish_ci NOT NULL,
  `fac_con_iva` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `creado_por` int NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedidos_detalle` (`id_cl`),
  CONSTRAINT `fk_pedidos_detalle` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,1,1,'C','A','N',1,'2023-12-20'),(3,1,2,'C','A','S',1,'2023-12-20'),(4,1,3,'C','A','N',1,'2023-12-31'),(5,1,4,'C','A','S',1,'2024-01-12'),(6,1,6,'C','A','',1,'2024-01-12');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos_detalle`
--

DROP TABLE IF EXISTS `pedidos_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos_detalle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `id_pedido` int NOT NULL,
  `producto` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cantidad` int NOT NULL,
  `valor` int NOT NULL,
  `fecha_reg` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos_detalle`
--

LOCK TABLES `pedidos_detalle` WRITE;
/*!40000 ALTER TABLE `pedidos_detalle` DISABLE KEYS */;
INSERT INTO `pedidos_detalle` VALUES (1,1,1,'		centella',2,5148,'2023-12-20'),(2,1,1,'		cola',2,9464,'2023-12-20'),(3,1,1,'		trululu',1,9464,'2023-12-20'),(4,1,1,'		bilz',1,13916,'2023-12-20'),(5,1,1,'		crocanty',1,11780,'2023-12-20'),(6,1,1,'		chocolito',2,11780,'2023-12-20'),(7,1,1,'		Lolly-Pop',2,9940,'2023-12-20'),(8,1,1,'		pura fruta frambuesa chocolate',2,19650,'2023-12-20'),(10,1,3,'\r\n		Agua-minera-2.5lts-limonada',3,1550,'2023-12-20'),(11,1,3,'\r\n		agua-mineral-600ml',3,689,'2023-12-20'),(12,1,3,'\r\n		schwepper-tonica',2,1379,'2023-12-20'),(13,1,3,'\r\n		coca-cola',4,1379,'2023-12-20'),(14,1,3,'\r\n		Oblea-gullón',2,1000,'2023-12-20'),(15,1,3,'\r\n		display-10-chokita',2,2764,'2023-12-20'),(16,1,3,'\r\n		galleta-maravilla',6,560,'2023-12-20'),(17,1,3,'\r\n		ramitas-saladas',10,386,'2023-12-20'),(18,1,3,'\r\n		galletas-limon',6,560,'2023-12-20'),(19,1,3,'\r\n		dindon-pack',2,1336,'2023-12-20'),(20,1,3,'\r\n		galleta-mantequilla',7,311,'2023-12-20'),(21,1,3,'\r\n		criollitas',4,840,'2023-12-20'),(22,1,3,'\r\n		fanta',5,770,'2023-12-20'),(23,1,3,'\r\n		kryzpo-queso',3,1723,'2023-12-20'),(24,1,3,'\r\n		yogu-yogu',12,335,'2023-12-20'),(25,1,3,'\r\n		snack-mix',5,462,'2023-12-20'),(26,1,3,'\r\n		kryzpo',3,1723,'2023-12-20'),(27,1,3,'\r\n		galletas-alteza',10,1252,'2023-12-20'),(28,1,3,'\r\n		galleta-gretel',5,866,'2023-12-20'),(29,1,3,'\r\n		crunchis',6,454,'2023-12-20'),(30,1,3,'\r\n		galleta',20,311,'2023-12-20'),(31,1,3,'\r\n		te-verde-premium',2,1336,'2023-12-20'),(32,1,3,'\r\n		barra-chocolate',2,1756,'2023-12-20'),(33,1,3,'\r\n		leche-milo',12,496,'2023-12-20'),(34,1,3,'\r\n		bolsa-plastica',2,1420,'2023-12-20'),(35,1,3,'\r\n		bitritvai',3,840,'2023-12-20'),(36,1,3,'\r\n		bitritchoc',3,840,'2023-12-20'),(37,1,3,'\r\n		barra-manzana',1,1756,'2023-12-20'),(38,1,3,'\r\n		barra-cranberries',2,1756,'2023-12-20'),(39,1,4,'\r\n		Six-pack-fanta-zero-lata',1,4782,'2023-12-31'),(40,1,4,'\r\n		Six-pack-sprite-zero-lata',1,4782,'2023-12-31'),(41,1,4,'\r\n		Six-pack-lata-schweppes',1,4281,'2023-12-31'),(42,1,4,'\r\n		Six-pack-cocacola-normal-lata',2,4782,'2023-12-31'),(43,1,4,'\r\n		Crush-light',2,1924,'2023-12-31'),(44,1,4,'\r\n		Vital-c/gas-600cc',6,671,'2023-12-31'),(45,1,4,'\r\n		Agua-manantial',2,1168,'2023-12-31'),(46,1,5,'\r\n		Grosso',2,6540,'2024-01-12'),(47,1,5,'		Bon-o-Bon',2,4160,'2024-01-12'),(48,1,5,'\r\n		Cachantun-500cc',1,3950,'2024-01-12'),(49,1,5,'\r\n		Cachantun-1600cc',1,5300,'2024-01-12'),(50,1,5,'\r\n		Snack-Mix',2,5450,'2024-01-12'),(51,1,5,'		Doritos',2,5450,'2024-01-12'),(52,1,5,'\r\n		Ramitas-Fruna',4,2580,'2024-01-12'),(53,1,6,'\r\n		Chip-chipers',5,1107,'2024-01-12'),(54,1,6,'\r\n		Mini-limon-triton',10,302,'2024-01-12'),(55,1,6,'\r\n		Kuky-Clásico',10,768,'2024-01-12'),(56,1,6,'\r\n		McCay-Niza',10,632,'2024-01-12'),(57,1,6,'\r\n		Mini-niza',10,194,'2024-01-12'),(58,1,6,'\r\n		Trencito',2,6622,'2024-01-12'),(59,1,6,'\r\n		Super8',2,4604,'2024-01-12'),(60,1,6,'\r\n		Gall-limón',10,559,'2024-01-12'),(61,1,6,'\r\n		ChipChipers-blanco',5,1107,'2024-01-12'),(62,1,6,'\r\n		Chokita',2,3918,'2024-01-12');
/*!40000 ALTER TABLE `pedidos_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planes`
--

DROP TABLE IF EXISTS `planes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `planes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(5) COLLATE utf8mb3_spanish_ci NOT NULL,
  `usuarios` int NOT NULL,
  `cajas` int NOT NULL,
  `valor` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planes`
--

LOCK TABLES `planes` WRITE;
/*!40000 ALTER TABLE `planes` DISABLE KEYS */;
INSERT INTO `planes` VALUES (1,'Plan 1 usuarios + 1 cajas','S',5,5,19990),(2,'Plan 2 usuario + 2 cajas','S',1,5,20990),(3,'Plan 3 usuarios + 3 cajas','S',3,3,30000),(4,'Plan 4 usuarios + 4 cajas','S',4,4,21500),(5,'Plan 5 usuarios + 5 cajas','S',5,5,30000),(6,'Plan 6 usuarios + 6 cajas','S',6,6,20000);
/*!40000 ALTER TABLE `planes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id_prod` int NOT NULL AUTO_INCREMENT,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `codigo_barra` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `nombre_prod` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `proveedor` varchar(45) COLLATE utf8mb3_spanish_ci NOT NULL,
  `categoria` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cantidad` int NOT NULL,
  `pesaje` varchar(5) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `unidad_medida` int DEFAULT NULL,
  `valor_neto` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `margen_ganancia` int NOT NULL,
  `monto_ganancia` int NOT NULL,
  `valor_venta` varchar(7) CHARACTER SET latin2 COLLATE latin2_general_ci NOT NULL,
  `descuento` int NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `fecha_reg` date NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'1','8445290912336','Criollitas','2','1',2,'N',1,'840',43,360,'1200',0,'S','1','2023-12-22'),(2,'1','7801620009700','Agua mineral 600ml','2','9',0,'N',1,'689',45,311,'1000',0,'S','1','2023-12-22'),(3,'1','7801610382028','Agua tónica schweppes','2','9',1,'N',1,'1379',45,621,'2000',0,'S','1','2023-12-22'),(4,'1','7801610001622','Coca - Cola 1.5lts','2','9',12,'N',1,'1379',45,621,'2000',0,'S','1','2023-12-22'),(5,'1','7613287755810','Chokita','2','1',10,'N',1,'138',81,112,'250',0,'S','1','2023-12-22'),(6,'1','7613039496275','Galleta maravilla 120g','2','1',6,'N',1,'560',79,440,'1000',0,'S','1','2023-12-22'),(7,'1','7802420127663','Ramitas Marco-Polo','2','6',8,'N',1,'386',81,314,'700',0,'S','1','2023-12-22'),(8,'1','7613039257333','Galleta limón Mckay','2','1',6,'N',1,'560',79,440,'1000',0,'S','1','2023-12-22'),(9,'1','8445290793348','Galleta Tritón Pack x2','2','1',1,'N',1,'1000',100,1000,'2000',0,'S','1','2023-12-22'),(10,'1','7802215503535','Galleta din-don mini','2','1',0,'N',1,'334',50,166,'500',0,'S','1','2023-12-22'),(11,'1','7613031651412','Galleta mini mantequilla','2','1',7,'N',1,'311',29,89,'400',0,'S','1','2023-12-22'),(12,'1','7801610591123','Fanta 591ml','2','9',5,'N',1,'770',30,230,'1000',0,'S','1','2023-12-22'),(13,'1','7802800533572','Kryzpo queso','2','6',-1,'N',1,'1723',45,777,'2500',0,'S','1','2023-12-22'),(14,'1','7802230082503','Alteza bocado','2','1',4,'N',1,'1252',36,448,'1700',0,'S','1','2023-12-22'),(15,'1','7802230082527','Alteza frutilla','2','1',0,'N',1,'1252',36,448,'1700',0,'S','1','2023-12-22'),(16,'1','7802215515019','Galletas gretel','2','1',4,'N',1,'866',73,634,'1500',0,'S','1','2023-12-22'),(17,'1','7802420003875','Crunchis Marco Polo','2','6',9998,'N',1,'454',54,246,'700',0,'S','1','2023-12-22'),(18,'1','7613031651443','Galleta mini Niza','2','1',10,'N',1,'311',29,89,'400',0,'S','1','2023-12-22'),(19,'1','7801875000583','Te Supremo Verde','2','9',2,'N',1,'1336',50,664,'2000',0,'S','1','2023-12-22'),(20,'1','7613031651474','Galleta mini Coco','2','1',10,'N',1,'311',29,89,'400',0,'S','1','2023-12-22'),(21,'1','7804000001691','Pack 5 Barr manzana','2','1',1,'N',1,'1756',42,744,'2500',0,'S','1','2023-12-22'),(22,'1','7804000001684','Barra manzana En Linea','2','10',5,'N',1,'351',42,149,'500',0,'S','1','2023-12-22'),(23,'1','7802420001574','Snack Mix Marco Polo','2','6',5,'N',1,'462',52,238,'700',0,'S','1','2023-12-22'),(24,'1','7804000002223','Pack 5 Barr Cranberries','2','10',1,'N',1,'1756',42,744,'2500',0,'S','1','2023-12-22'),(25,'1','7804000002216','Barra cranberries En Linea','2','10',5,'N',1,'351',42,149,'500',0,'S','1','2023-12-22'),(26,'1','7804624850033','Carbón Lider 2.5KG','2','11',10,'N',1,'3200',56,1800,'5000',0,'S','1','2023-12-22'),(27,'1','7802910306202','Yogu-Yogu 200ml','2','9',12,'N',1,'335',49,165,'500',0,'S','1','2023-12-22'),(28,'1','7802950006209','Milo 200ml','2','9',12,'N',1,'496',41,204,'700',0,'S','1','2023-12-22'),(29,'1','7802800533589','Kryzpo Crema Cebolla','2','6',1,'N',1,'1723',45,777,'2500',0,'S','1','2023-12-25'),(30,'1','7613033495335','Cola de tigre','1','12',8,'N',1,'433',62,267,'700',0,'S','1','2023-12-25'),(31,'1','7613032180096','Trululú','1','12',46,'N',1,'433',62,267,'700',0,'S','1','2023-12-25'),(32,'1','78006027','LollyPop','1','12',4,'N',1,'591',18,109,'700',0,'S','1','2023-12-25'),(33,'1','7613032180157','Centella','1','12',9924,'N',1,'235',28,65,'300',0,'S','1','2023-12-25'),(34,'1','7613032186852','Helado Chocolito','1','12',-29,'N',1,'589',36,211,'800',0,'S','1','2023-12-30'),(35,'1','8445290729156','Pura fruta chocolate','1','12',60,'N',1,'655',37,245,'900',0,'S','1','2023-12-30'),(36,'1','7613035737754','Helado Bilz y Pap','1','12',16,'N',1,'497',81,403,'900',0,'S','1','2023-12-30'),(37,'1','78006140','Helado Crocanty','1','12',20,'N',1,'589',36,211,'800',0,'S','1','2023-12-30'),(38,'1','7801610676356','Six pack Fanta Zero 350cc','3','9',1,'N',1,'4782',44,2118,'6900',0,'S','1','2023-12-31'),(39,'1','7801610671016','Fanta Zero Lata 350cc','3','9',6,'N',1,'797',44,353,'1150',0,'S','1','2023-12-31'),(40,'1','7801610001196','Coca Cola lata 350cc','3','8',10,'N',1,'797',44,353,'1150',0,'S','1','2023-12-31'),(41,'1','7801610001202','Six pack Coca Cola 350cc','1','8',2,'N',1,'4782',44,2118,'6900',0,'S','1','2023-12-31'),(42,'1','7801610223192','Sprite Zero lata 350cc','3','8',6,'N',1,'797',44,353,'1150',0,'S','1','2023-12-31'),(43,'1','7801610223208','Six pack Sprite 350cc','1','8',1,'N',1,'4782',44,2118,'6900',0,'S','1','2023-12-31'),(44,'1','7801610484661','Schweppes lata 350cc','3','8',1,'N',1,'4782',44,2118,'6900',0,'S','1','2023-12-31'),(45,'1','7801610483602','Schweppes lata 350cc 2','3','8',6,'N',1,'797',44,353,'1150',0,'S','1','2023-12-31'),(46,'1','7802820600100','Vital 600cc','3','8',0,'N',1,'671',49,329,'1000',0,'S','1','2023-12-31'),(47,'1','7801620853204','Crush Zero 1.5lts','3','8',0,'N',1,'1924',46,876,'2800',0,'S','1','2023-12-31'),(48,'1','Quitasoles','Quitasol ','1','12',99983,'N',1,'1000',100,1000,'2000',0,'S','1','2024-01-01'),(49,'1','78023994','Bon o bon amarillo','1','1',-49,'N',1,'125',100,125,'250',0,'S','1','2024-01-01'),(50,'1','78024106','Bon o bon blanco','2','1',20,'N',1,'125',100,125,'250',0,'S','1','2024-01-01'),(51,'1','7802215515590','Donuts blanca bolsa 130grs','2','1',0,'N',1,'800',88,700,'1500',0,'S','1','2024-01-01'),(52,'1','7622201693114','Galleta Oreo','1','1',1,'N',1,'700',71,500,'1200',0,'S','1','2024-01-01'),(53,'1','7802215515019','Galleta Gretel','2','1',4,'N',1,'990',21,210,'1200',0,'S','1','2024-01-01'),(54,'1','7802215502569','Gall Sunny','1','1',4,'N',1,'750',60,450,'1200',0,'S','1','2024-01-01'),(55,'1','7802000015120','De Todito Evercrisp','1','6',19,'N',1,'545',47,255,'800',0,'S','1','2024-01-12'),(56,'1','7802000017476','Doritos Queso','4','6',20,'N',1,'545',47,255,'800',0,'S','1','2024-01-12'),(57,'1','7802408007239','Ramitas Normales Fruna','4','6',20,'N',1,'258',94,242,'500',0,'S','1','2024-01-12'),(58,'1','gr-tutti-frutti','Grosso tutti-frutti','4','6',100,'N',1,'55',82,45,'100',0,'S','1','2024-01-12'),(59,'1','gr-menta','Grosso menta','1','6',100,'N',1,'55',82,45,'100',0,'S','1','2024-01-12'),(60,'1','7806500221128','Servilleta Elite','5','13',4,'N',1,'610',64,390,'1000',0,'S','1','2024-01-12'),(61,'1','confort','Confort /unidad','5','13',4,'N',1,'548',82,452,'1000',0,'S','1','2024-01-12'),(62,'1','fosforos','Fosforos','5','13',10,'N',1,'250',100,250,'500',0,'S','1','2024-01-12'),(63,'1','7613030612339','Super8 Normal','6','6',48,'N',1,'192',108,208,'400',0,'S','1','2024-01-13'),(64,'1','7613033567773','Svelty Huesos','6','8',2,'N',1,'5576',43,2424,'8000',0,'S','1','2024-01-13'),(65,'1','7613035835986','Kuky Chipchipers Blanco','6','1',5,'N',1,'1107',81,893,'2000',0,'S','1','2024-01-13'),(66,'1','7802950012316','Salsa tomate Tuco','6','13',4,'N',1,'1176',70,824,'2000',0,'S','1','2024-01-13'),(67,'1','7613039589069','Tritón Mini Limón','6','1',10,'N',1,'302',32,98,'400',0,'S','1','2024-01-13'),(68,'1','7802230081162','Kuky Clásica','6','1',10,'N',1,'768',30,232,'1000',0,'S','1','2024-01-13'),(69,'1','7613032425616','Svelty Move+','6','13',2,'N',1,'5450',47,2550,'8000',0,'S','1','2024-01-13'),(70,'1','7613032590369','Galleta Niza Normal','6','1',10,'N',1,'632',58,368,'1000',0,'S','1','2024-01-13'),(71,'1','7802950072679','Trencito impulsivo','6','6',20,'N',1,'166',51,84,'250',0,'S','1','2024-01-13'),(72,'1','7613034891730','ChipChipers Chocolate','6','1',5,'N',1,'1107',81,893,'2000',0,'S','1','2024-01-13'),(73,'1','8445290262646','Leche Nido Polvo','6','13',2,'N',1,'6067',48,2933,'9000',0,'S','1','2024-01-13');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int DEFAULT NULL,
  `nombre_proveedor` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rut` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proveedores` (`id_cl`),
  CONSTRAINT `fk_proveedores` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,1,'Savory','19150634-0','S','2023-07-28'),(2,1,'Supermercados Lider','19150634-0','S','2023-12-20'),(3,1,'Supermercado El Trebol','19150634-0','S','2023-12-31'),(4,1,'Fruna','19150634-0','S','2024-01-12'),(5,1,'UNIMARC','81537600-5','S','2024-01-12'),(6,1,'Distribuidora HN Disvet','76683980-0','S','2024-01-13');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_minimo_producto`
--

DROP TABLE IF EXISTS `stock_minimo_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_minimo_producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cl` int DEFAULT NULL,
  `estado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stock_minimo` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stock_minimo_producto` (`id_cl`),
  CONSTRAINT `fk_stock_minimo_producto` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_minimo_producto`
--

LOCK TABLES `stock_minimo_producto` WRITE;
/*!40000 ALTER TABLE `stock_minimo_producto` DISABLE KEYS */;
INSERT INTO `stock_minimo_producto` VALUES (2,1,'S',5);
/*!40000 ALTER TABLE `stock_minimo_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_pago_cliente`
--

DROP TABLE IF EXISTS `tipo_pago_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_pago_cliente` (
  `id` int NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_pago_cliente`
--

LOCK TABLES `tipo_pago_cliente` WRITE;
/*!40000 ALTER TABLE `tipo_pago_cliente` DISABLE KEYS */;
INSERT INTO `tipo_pago_cliente` VALUES (1,'EFECTIVO'),(2,'TRANSFERENCIA'),(3,'TARJ. DÉBITO'),(4,'TARJ. CRÉDITO'),(5,'OTROS');
/*!40000 ALTER TABLE `tipo_pago_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades_medida`
--

DROP TABLE IF EXISTS `unidades_medida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unidades_medida` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_medida` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidades_medida`
--

LOCK TABLES `unidades_medida` WRITE;
/*!40000 ALTER TABLE `unidades_medida` DISABLE KEYS */;
INSERT INTO `unidades_medida` VALUES (1,'Unid'),(2,'KG'),(3,'mms'),(4,'cms'),(5,'mts');
/*!40000 ALTER TABLE `unidades_medida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N',
  `user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_usuario` int NOT NULL,
  `id_cl` int NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `permisos` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios` (`id_cl`),
  CONSTRAINT `fk_usuarios` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Admin','admin1','$2y$10$BDwobPiBjGcGs5auygqi8.th4g5kOOj2zEPv7pccXOfmHzvMZ/ZqC',1,1,'S','1'),(2,'Cajero','cajero1','$2y$10$ZdYQFbA09stj6TFNuQiyjODB2wybCJOEoLUdEntP/h00WfvosMQki',2,1,'S','2,3,4'),(4,'Admin','admin7','admin7',1,7,'S','1,2,3,4'),(5,'Admin','admin8','173ec534506a18e83256',1,8,'S','1,2,3,4');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_venta` int NOT NULL,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_caja` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nom_caja` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usuario` int NOT NULL,
  `producto` int NOT NULL,
  `cantidad` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `forma_pago` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `des` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci COMMENT='								';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (68,6,'1','1','KIOSCO',1,33,'1','300','C','2024-01-01 12:09:18','2024-01-01 12:09:32','1','0'),(69,6,'1','1','KIOSCO',1,33,'1','300','C','2024-01-01 12:09:18','2024-01-01 12:09:32','1','0'),(70,6,'1','1','KIOSCO',1,33,'1','300','C','2024-01-01 12:09:19','2024-01-01 12:09:32','1','0'),(71,6,'1','1','KIOSCO',1,33,'1','300','C','2024-01-01 12:09:20','2024-01-01 12:09:32','1','0'),(72,6,'1','1','KIOSCO',1,33,'1','300','C','2024-01-01 12:09:20','2024-01-01 12:09:32','1','0'),(73,6,'1','1','KIOSCO',1,33,'1','300','C','2024-01-01 12:09:21','2024-01-01 12:09:32','1','0'),(74,6,'1','1','KIOSCO',1,33,'1','300','C','2024-01-01 12:09:22','2024-01-01 12:09:32','1','0'),(75,6,'1','1','KIOSCO',1,33,'1','300','C','2024-01-01 12:09:22','2024-01-01 12:09:32','1','0'),(76,6,'1','1','KIOSCO',1,33,'1','300','C','2024-01-01 12:09:23','2024-01-01 12:09:32','1','0'),(77,6,'1','1','KIOSCO',1,33,'1','300','C','2024-01-01 12:09:23','2024-01-01 12:09:32','1','0'),(78,7,'1','1','KIOSCO',1,48,'1','2000','C','2024-01-01 12:16:47','2024-01-01 12:16:54','1','0'),(79,7,'1','1','KIOSCO',1,48,'1','2000','C','2024-01-01 12:16:47','2024-01-01 12:16:54','1','0'),(80,8,'1','1','KIOSCO',1,48,'1','2000','C','2024-01-01 12:18:26','2024-01-01 12:19:39','4','0'),(81,9,'1','1','KIOSCO',1,33,'1','300','C','2024-01-01 13:44:38','2024-01-01 13:44:49','1','0'),(82,8,'1','1','KIOSCO',1,34,'1','800','N','2024-01-01 18:05:11','0000-00-00 00:00:00','0','0'),(83,10,'1','1','KIOSCO',1,34,'1','800','C','2024-01-01 18:05:50','2024-01-01 18:11:31','1','0'),(84,10,'1','1','KIOSCO',1,34,'1','800','C','2024-01-01 18:05:51','2024-01-01 18:11:31','1','0'),(85,10,'1','1','KIOSCO',1,34,'1','800','C','2024-01-01 18:05:52','2024-01-01 18:11:31','1','0'),(86,11,'1','1','KIOSCO',1,29,'1','2500','C','2024-01-01 18:12:01','2024-01-01 18:12:26','1','0'),(87,12,'1','1','KIOSCO',1,31,'1','700','C','2024-01-01 18:22:34','2024-01-01 18:23:17','1','0'),(88,13,'1','1','KIOSCO',1,33,'1','300','C','2024-01-01 18:26:11','2024-01-01 18:27:26','1','0'),(89,13,'1','1','KIOSCO',1,34,'1','800','C','2024-01-01 18:26:18','2024-01-01 18:27:26','1','0'),(91,14,'1','1','KIOSCO',1,17,'1','700','C','2024-01-01 18:30:54','2024-01-01 18:31:54','1','0'),(92,14,'1','1','KIOSCO',1,17,'1','700','C','2024-01-01 18:31:09','2024-01-01 18:31:54','1','0'),(93,14,'1','1','KIOSCO',1,17,'1','700','C','2024-01-01 18:31:10','2024-01-01 18:31:54','1','0'),(94,15,'1','1','KIOSCO',1,15,'1','1700','C','2024-01-01 18:42:01','2024-01-01 18:56:04','1','0'),(95,15,'1','1','KIOSCO',1,7,'1','700','C','2024-01-01 18:42:18','2024-01-01 18:56:04','1','0'),(96,15,'1','1','KIOSCO',1,17,'1','700','C','2024-01-01 18:42:54','2024-01-01 18:56:04','1','0'),(97,16,'1','1','KIOSCO',1,15,'1','1700','C','2024-01-01 18:56:28','2024-01-01 18:57:04','1','0'),(98,17,'1','1','KIOSCO',1,40,'1','1150','C','2024-01-01 19:06:44','2024-01-01 19:07:04','1','0'),(99,18,'1','1','KIOSCO',1,13,'1','2500','C','2024-01-01 19:11:49','2024-01-01 19:16:52','1','0'),(100,18,'1','1','KIOSCO',1,36,'1','900','C','2024-01-01 19:13:35','2024-01-01 19:16:52','1','0'),(101,18,'1','1','KIOSCO',1,36,'2','1800','C','2024-01-01 19:15:03','2024-01-01 19:16:52','1','0'),(102,18,'1','1','KIOSCO',1,31,'1','700','C','2024-01-01 19:15:13','2024-01-01 19:16:52','1','0'),(103,18,'1','1','KIOSCO',1,13,'1','2500','C','2024-01-01 19:15:27','2024-01-01 19:16:52','1','0'),(104,19,'1','1','KIOSCO',1,13,'1','2500','C','2024-01-01 19:21:55','2024-01-01 19:22:27','1','0'),(105,20,'1','1','KIOSCO',1,36,'1','900','C','2024-01-01 19:23:33','2024-01-01 19:24:41','1','0'),(106,20,'1','1','KIOSCO',1,36,'1','900','C','2024-01-01 19:23:33','2024-01-01 19:24:41','1','0'),(107,21,'1','1','KIOSCO',1,49,'1','250','C','2024-01-01 19:25:03','2024-01-01 19:33:30','1','0'),(108,21,'1','1','KIOSCO',1,49,'1','250','C','2024-01-01 19:25:03','2024-01-01 19:33:30','1','0'),(109,21,'1','1','KIOSCO',1,49,'1','250','C','2024-01-01 19:25:04','2024-01-01 19:33:30','1','0'),(110,21,'1','1','KIOSCO',1,49,'1','250','C','2024-01-01 19:25:04','2024-01-01 19:33:30','1','0'),(111,21,'1','1','KIOSCO',1,49,'1','250','C','2024-01-01 19:25:07','2024-01-01 19:33:30','1','0'),(112,21,'1','1','KIOSCO',1,49,'1','250','C','2024-01-01 19:25:13','2024-01-01 19:33:30','1','0'),(113,21,'1','1','KIOSCO',1,5,'1','250','C','2024-01-01 19:26:31','2024-01-01 19:33:30','1','0'),(114,21,'1','1','KIOSCO',1,5,'1','250','C','2024-01-01 19:26:32','2024-01-01 19:33:30','1','0'),(115,21,'1','1','KIOSCO',1,5,'1','250','C','2024-01-01 19:26:33','2024-01-01 19:33:30','1','0'),(116,21,'1','1','KIOSCO',1,5,'1','250','C','2024-01-01 19:26:34','2024-01-01 19:33:30','1','0'),(117,21,'1','1','KIOSCO',1,51,'1','1500','C','2024-01-01 19:32:28','2024-01-01 19:33:30','1','0'),(118,21,'1','1','KIOSCO',1,52,'1','1200','C','2024-01-01 19:32:56','2024-01-01 19:33:30','1','0'),(119,21,'1','1','KIOSCO',1,1653,'1','0','C','2024-01-01 19:33:08','2024-01-01 19:33:30','1','0'),(120,22,'1','1','KIOSCO',1,10,'1','500','C','2024-01-01 19:33:54','2024-01-01 19:36:47','1','0'),(121,22,'1','1','KIOSCO',1,5,'1','250','C','2024-01-01 19:35:27','2024-01-01 19:36:47','1','0'),(122,22,'1','1','KIOSCO',1,1653,'1','0','C','2024-01-01 19:35:36','2024-01-01 19:36:47','1','0'),(123,22,'1','1','KIOSCO',1,1653,'1','0','C','2024-01-01 19:35:40','2024-01-01 19:36:47','1','0'),(124,22,'1','1','KIOSCO',1,1653,'1','0','C','2024-01-01 19:35:44','2024-01-01 19:36:47','1','0'),(125,22,'1','1','KIOSCO',1,1653,'1','0','C','2024-01-01 19:35:47','2024-01-01 19:36:47','1','0'),(126,22,'1','1','KIOSCO',1,1653,'1','0','C','2024-01-01 19:35:48','2024-01-01 19:36:47','1','0'),(127,22,'1','1','KIOSCO',1,16,'1','1500','C','2024-01-01 19:36:35','2024-01-01 19:36:47','1','0'),(128,23,'1','1','KIOSCO',1,36,'1','900','C','2024-01-01 20:29:52','2024-01-02 18:45:33','1','0'),(129,23,'1','1','KIOSCO',1,31,'1','700','C','2024-01-01 20:30:56','2024-01-02 18:45:33','1','0'),(130,23,'1','1','KIOSCO',1,30,'1','700','C','2024-01-01 20:31:00','2024-01-02 18:45:33','1','0'),(131,24,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:32:30','2024-01-09 11:32:50','1','0'),(132,25,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:33:31','2024-01-09 11:34:42','1','0'),(133,26,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:34:57','2024-01-09 11:35:05','1','0'),(134,27,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:37:40','2024-01-09 11:38:12','1','0'),(135,27,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:37:40','2024-01-09 11:38:12','1','0'),(136,27,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:37:43','2024-01-09 11:38:12','1','0'),(137,27,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:37:45','2024-01-09 11:38:12','1','0'),(138,28,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:44:17','2024-01-09 11:44:41','1','0'),(139,28,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:44:19','2024-01-09 11:44:41','1','0'),(140,28,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:44:20','2024-01-09 11:44:41','1','0'),(141,28,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:44:22','2024-01-09 11:44:41','1','0'),(142,28,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:44:23','2024-01-09 11:44:41','1','0'),(143,29,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:46:12','2024-01-09 11:46:47','1','0'),(144,29,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:46:13','2024-01-09 11:46:47','1','0'),(145,30,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:59:07','2024-01-09 11:59:17','2','0'),(146,30,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:59:08','2024-01-09 11:59:17','2','0'),(147,30,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 11:59:09','2024-01-09 11:59:17','2','0'),(148,31,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 12:00:14','2024-01-09 12:01:08','2','0'),(149,31,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 12:00:50','2024-01-09 12:01:08','2','0'),(150,32,'1','1','KIOSCO',1,1,'1','1200','C','2024-01-09 15:29:07','2024-01-09 15:29:21','1','0'),(151,33,'1','1','KIOSCO',1,1,'1','1200','C','2024-01-09 16:34:52','2024-01-09 16:35:06','1','0'),(152,34,'1','1','KIOSCO',1,34,'1','800','C','2024-01-09 16:38:03','2024-01-09 23:17:21','1','0'),(153,34,'1','1','KIOSCO',1,2,'1','1000','C','2024-01-10 23:16:58','2024-01-09 23:17:21','1','0'),(154,35,'1','1','KIOSCO',1,2,'1','1000','C','2024-01-10 23:25:17','2024-01-09 23:29:02','1','0'),(155,36,'1','1','KIOSCO',1,3,'1','2000','C','2024-01-10 23:29:25','2024-01-09 23:29:46','1','0'),(156,36,'1','1','KIOSCO',1,34,'1','800','C','2024-01-10 23:29:31','2024-01-09 23:29:46','1','0'),(157,37,'1','1','KIOSCO',1,4,'1','2000','C','2024-01-10 23:39:49','2024-01-09 23:40:08','2','0'),(158,37,'1','1','KIOSCO',1,4,'1','2000','C','2024-01-10 23:39:58','2024-01-09 23:40:08','2','0'),(159,38,'1','1','KIOSCO',1,34,'1','800','C','2024-01-10 00:00:48','2024-01-10 13:03:48','1','0'),(160,38,'1','1','KIOSCO',1,34,'1','800','C','2024-01-10 00:00:51','2024-01-10 13:03:48','1','0'),(161,38,'1','1','KIOSCO',1,34,'1','800','C','2024-01-10 00:00:52','2024-01-10 13:03:48','1','0'),(162,38,'1','1','KIOSCO',1,34,'1','800','C','2024-01-10 00:00:53','2024-01-10 13:03:48','1','0'),(163,38,'1','1','KIOSCO',1,34,'1','800','C','2024-01-10 00:00:54','2024-01-10 13:03:48','1','0'),(164,38,'1','1','KIOSCO',1,34,'1','800','C','2024-01-10 00:01:07','2024-01-10 13:03:48','1','0'),(165,38,'1','1','KIOSCO',1,34,'1','800','C','2024-01-10 00:01:07','2024-01-10 13:03:48','1','0'),(166,38,'1','1','KIOSCO',1,34,'1','800','C','2024-01-10 00:01:08','2024-01-10 13:03:48','1','0'),(167,38,'1','1','KIOSCO',1,34,'1','800','C','2024-01-10 00:01:09','2024-01-10 13:03:48','1','0'),(168,1,'1','1','KIOSCO',1,1,'1','1200','C','2024-01-10 13:11:26','2024-01-10 13:13:46','1','0'),(169,1,'1','1','KIOSCO',1,1,'1','1200','C','2024-01-10 13:11:29','2024-01-10 13:13:46','1','0'),(170,2,'1','1','KIOSCO',1,3,'1','2000','C','2024-01-10 13:15:04','2024-01-10 13:16:13','1','0'),(171,3,'1','1','KIOSCO',1,3,'1','2000','C','2024-01-10 13:16:44','2024-01-10 13:16:53','1','0'),(172,4,'1','1','KIOSCO',1,1,'1','1200','C','2024-01-10 13:18:04','2024-01-10 13:18:10','1','0'),(173,5,'1','1','KIOSCO',1,1,'1','1200','C','2024-01-10 13:20:17','2024-01-12 18:08:08','1','0'),(174,5,'1','1','KIOSCO',1,1,'1','1200','C','2024-01-10 13:20:55','2024-01-12 18:08:08','1','0'),(175,5,'1','1','KIOSCO',1,1,'1','1200','C','2024-01-10 13:33:38','2024-01-12 18:08:08','1','0'),(176,39,'1','1','KIOSCO',1,48,'1','2000','N','2024-01-12 18:08:35','2024-01-12 18:09:17','0','0'),(177,39,'1','1','KIOSCO',1,58,'1','100','N','2024-01-12 18:08:58','2024-01-12 18:09:17','0','0'),(178,39,'1','1','KIOSCO',1,58,'1','100','N','2024-01-12 18:08:59','2024-01-12 18:09:17','0','0'),(179,39,'1','1','KIOSCO',1,58,'1','100','N','2024-01-12 18:09:01','2024-01-12 18:09:17','0','0'),(180,39,'1','1','KIOSCO',1,58,'1','100','N','2024-01-12 18:09:03','2024-01-12 18:09:17','0','0'),(181,39,'1','1','KIOSCO',1,58,'1','100','N','2024-01-12 18:09:05','2024-01-12 18:09:17','0','0'),(182,39,'1','1','KIOSCO',1,58,'1','100','N','2024-01-12 18:09:06','2024-01-12 18:09:17','0','0');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-12 22:38:01
