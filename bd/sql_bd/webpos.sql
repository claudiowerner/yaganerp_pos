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
-- Table structure for table `anula_cajas`
--

DROP TABLE IF EXISTS `anula_cajas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_cajas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `anulado_por` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_cajas`
--

LOCK TABLES `anula_cajas` WRITE;
/*!40000 ALTER TABLE `anula_cajas` DISABLE KEYS */;
INSERT INTO `anula_cajas` VALUES (1,1,1,1,'2024-10-16 15:31:21');
/*!40000 ALTER TABLE `anula_cajas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anula_categoria`
--

DROP TABLE IF EXISTS `anula_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `anulado_por` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_categoria`
--

LOCK TABLES `anula_categoria` WRITE;
/*!40000 ALTER TABLE `anula_categoria` DISABLE KEYS */;
INSERT INTO `anula_categoria` VALUES (1,1,1,1,'2024-12-04 20:55:35'),(2,1,7,1,'2024-12-04 22:09:25'),(3,1,10,1,'2025-08-28 17:56:30');
/*!40000 ALTER TABLE `anula_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anula_clientes`
--

DROP TABLE IF EXISTS `anula_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `anulado_por` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_clientes`
--

LOCK TABLES `anula_clientes` WRITE;
/*!40000 ALTER TABLE `anula_clientes` DISABLE KEYS */;
INSERT INTO `anula_clientes` VALUES (1,1,1,1,'2024-10-16 15:34:09'),(2,1,5,1,'2025-10-14 21:37:24'),(3,1,0,1,'2025-10-14 21:37:27'),(4,1,4,1,'2025-10-14 21:37:30'),(5,1,3,1,'2025-10-14 21:37:33'),(6,1,2,1,'2025-10-14 21:37:37');
/*!40000 ALTER TABLE `anula_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anula_pedidos`
--

DROP TABLE IF EXISTS `anula_pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `anulado_por` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_pedidos`
--

LOCK TABLES `anula_pedidos` WRITE;
/*!40000 ALTER TABLE `anula_pedidos` DISABLE KEYS */;
INSERT INTO `anula_pedidos` VALUES (1,1,1,1,'2024-10-16 15:36:45'),(2,1,2,1,'2024-10-16 15:36:48'),(3,1,3,1,'2024-10-16 15:39:33'),(4,1,4,1,'2024-10-16 15:40:37'),(5,1,5,1,'2024-12-04 20:06:33'),(6,1,6,1,'2024-12-04 20:10:34'),(7,1,9,1,'2024-12-14 15:02:42'),(8,1,10,1,'2024-12-14 15:02:48'),(9,1,14,1,'2024-12-28 21:21:39'),(10,1,16,1,'2025-01-04 19:03:53'),(11,1,17,1,'2025-01-04 19:05:00'),(12,1,21,1,'2025-01-11 20:21:34'),(13,1,23,1,'2025-01-11 21:16:52'),(14,1,24,1,'2025-01-11 21:17:06'),(15,1,25,1,'2025-01-17 13:45:06'),(16,1,27,1,'2025-01-22 18:26:28'),(17,1,30,1,'2025-01-28 23:37:11'),(18,1,32,1,'2025-02-01 19:10:33'),(19,1,33,1,'2025-02-01 19:46:11'),(20,1,40,1,'2025-08-28 17:45:05'),(21,1,36,1,'2025-08-28 17:45:21'),(22,1,37,1,'2025-08-28 17:45:25'),(23,1,38,1,'2025-08-28 17:45:28'),(24,1,39,1,'2025-08-28 17:45:33'),(25,1,44,1,'2025-08-28 17:55:07');
/*!40000 ALTER TABLE `anula_pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anula_productos`
--

DROP TABLE IF EXISTS `anula_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `anulado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_productos`
--

LOCK TABLES `anula_productos` WRITE;
/*!40000 ALTER TABLE `anula_productos` DISABLE KEYS */;
INSERT INTO `anula_productos` VALUES (1,1,1,'1','2024-10-16 15:47:43'),(2,1,2,'1','2024-12-04 20:55:23'),(3,1,100,'1','2025-01-08 18:13:59');
/*!40000 ALTER TABLE `anula_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anula_promociones`
--

DROP TABLE IF EXISTS `anula_promociones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_promociones` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_cl` int(5) NOT NULL,
  `id_promo` int(5) NOT NULL,
  `anulado_por` int(5) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_promociones`
--

LOCK TABLES `anula_promociones` WRITE;
/*!40000 ALTER TABLE `anula_promociones` DISABLE KEYS */;
/*!40000 ALTER TABLE `anula_promociones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anula_proveedor`
--

DROP TABLE IF EXISTS `anula_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `anulado_por` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_proveedor`
--

LOCK TABLES `anula_proveedor` WRITE;
/*!40000 ALTER TABLE `anula_proveedor` DISABLE KEYS */;
INSERT INTO `anula_proveedor` VALUES (1,1,1,'1','2024-10-16 15:39:20'),(2,1,3,'1','2024-12-04 19:57:51'),(3,1,2,'1','2024-12-04 19:57:54');
/*!40000 ALTER TABLE `anula_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anula_turnos`
--

DROP TABLE IF EXISTS `anula_turnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `anulado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_turnos`
--

LOCK TABLES `anula_turnos` WRITE;
/*!40000 ALTER TABLE `anula_turnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `anula_turnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anula_usuario`
--

DROP TABLE IF EXISTS `anula_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anula_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `anulado_por` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_usuario`
--

LOCK TABLES `anula_usuario` WRITE;
/*!40000 ALTER TABLE `anula_usuario` DISABLE KEYS */;
INSERT INTO `anula_usuario` VALUES (1,1,2,1,'2025-10-14'),(2,1,15,1,'2025-10-14'),(3,1,14,1,'2025-10-14'),(4,1,13,1,'2025-10-14'),(5,1,12,1,'2025-10-14'),(6,1,11,1,'2025-10-14'),(7,1,10,1,'2025-10-14'),(8,1,8,1,'2025-10-14'),(9,1,9,1,'2025-10-14');
/*!40000 ALTER TABLE `anula_usuario` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anula_ventas`
--

LOCK TABLES `anula_ventas` WRITE;
/*!40000 ALTER TABLE `anula_ventas` DISABLE KEYS */;
INSERT INTO `anula_ventas` VALUES (1,1,2,'Admin','2024-12-04 23:25:28'),(2,1,7,'Admin','2024-12-07 18:28:17'),(3,1,28,'Admin','2024-12-22 19:15:35'),(4,1,127,'Admin','2025-01-05 14:30:49'),(5,1,200,'Admin','2025-01-11 21:46:46'),(6,1,236,'Admin','2025-01-22 23:22:25'),(7,1,237,'Admin','2025-01-22 23:22:32'),(8,1,293,'Admin','2025-01-30 16:12:50'),(9,1,410,'Admin','2025-08-17 00:50:44'),(10,1,411,'Admin','2025-08-18 21:16:43'),(11,1,421,'Claudio Werner','2025-10-14 21:32:38'),(12,1,425,'Admin','2025-10-15 00:09:46');
/*!40000 ALTER TABLE `anula_ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autorizacion`
--

DROP TABLE IF EXISTS `autorizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autorizacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `clave` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cl` (`id_cl`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autorizacion`
--

LOCK TABLES `autorizacion` WRITE;
/*!40000 ALTER TABLE `autorizacion` DISABLE KEYS */;
INSERT INTO `autorizacion` VALUES (1,'1','12345','S');
/*!40000 ALTER TABLE `autorizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cajas`
--

DROP TABLE IF EXISTS `cajas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cajas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `nom_caja` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_reg` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cajas`
--

LOCK TABLES `cajas` WRITE;
/*!40000 ALTER TABLE `cajas` DISABLE KEYS */;
INSERT INTO `cajas` VALUES (1,1,'Caja de prueba EDITADA','N','1','2024-10-16'),(2,1,'Caja 01','A','1','2024-10-16'),(3,4,'Caja 01','A','4','2025-08-20'),(4,1,'Caja 2 de prueba','S','1','2025-10-14');
/*!40000 ALTER TABLE `cajas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cambio_periodo`
--

DROP TABLE IF EXISTS `cambio_periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cambio_periodo` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_cl` int(5) NOT NULL,
  `plazo_antiguo` int(5) NOT NULL,
  `plazo_nuevo` int(5) NOT NULL,
  `estado_cambio` varchar(5) NOT NULL,
  `fecha_cambio` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cambio_periodo`
--

LOCK TABLES `cambio_periodo` WRITE;
/*!40000 ALTER TABLE `cambio_periodo` DISABLE KEYS */;
INSERT INTO `cambio_periodo` VALUES (1,14,1,2,'S','2025-08-21');
/*!40000 ALTER TABLE `cambio_periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cambio_plan`
--

DROP TABLE IF EXISTS `cambio_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cambio_plan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_cl` int(5) NOT NULL,
  `plan_antiguo` int(5) NOT NULL,
  `plan_nuevo` int(5) NOT NULL,
  `estado_cambio` varchar(5) NOT NULL,
  `fecha_cambio` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cambio_plan`
--

LOCK TABLES `cambio_plan` WRITE;
/*!40000 ALTER TABLE `cambio_plan` DISABLE KEYS */;
INSERT INTO `cambio_plan` VALUES (1,14,1,2,'S','2025-08-21');
/*!40000 ALTER TABLE `cambio_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `nombre_cat` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_reg` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,1,'CD','N','1','2024-10-16'),(2,1,'Galletas','S','1','2024-12-04'),(3,1,'Golosinas','S','1','2024-12-04'),(4,1,'Chicles','S','1','2024-12-04'),(5,1,'Bebestibles','S','1','2024-12-04'),(6,1,'Abarrotes','S','1','2024-12-04'),(7,1,'SIN PROVEEDOR','N','1','2024-12-04'),(8,1,'Helados','S','1','2024-12-07'),(9,1,'Parrilla','S','1','2024-12-07'),(10,1,'CD','N','1','2025-08-28');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cierre_caja`
--

DROP TABLE IF EXISTS `cierre_caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cierre_caja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `nombre` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `desde` datetime NOT NULL,
  `hasta` datetime DEFAULT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor_total` varchar(145) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_reg` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cierre_caja`
--

LOCK TABLES `cierre_caja` WRITE;
/*!40000 ALTER TABLE `cierre_caja` DISABLE KEYS */;
INSERT INTO `cierre_caja` VALUES (1,1,'Caja de prueba EDITADA','1','2024-10-16 15:49:29','2024-12-05 03:26:51','C','0','2024-10-16 15:49:29'),(2,1,'Caja 07-12-2024','1','2024-12-07 15:16:42','2024-12-14 16:23:22','C','5000','2024-12-07 15:16:42'),(3,1,'Caja 14-12-2024','1','2024-12-14 12:23:40','2024-12-15 04:09:13','C','900','2024-12-14 12:23:40'),(4,1,'Caja 21-12-2024','1','2024-12-21 15:07:30','2024-12-25 17:51:07','C','3000','2024-12-21 15:07:30'),(5,1,'Caja 25-12-2024','1','2024-12-25 13:51:24','2024-12-26 03:27:05','C','18350','2024-12-25 13:51:24'),(6,1,'Caja 28-12-2024','1','2024-12-28 12:53:05','2024-12-29 02:36:18','C','150','2024-12-28 12:53:05'),(7,1,'Caja 29-12-2024','1','2024-12-29 16:31:05','2025-01-01 00:51:12','C','200','2024-12-29 16:31:05'),(8,1,'Caja 01-01-2025','1','2024-12-31 20:51:45','2025-01-03 23:53:35','C','1200','2024-12-31 20:51:45'),(9,1,'Caja 03-01-2025','1','2025-01-03 19:53:49','2025-01-04 04:35:08','C','2500','2025-01-03 19:53:49'),(10,1,'Caja 04-01-2025','1','2025-01-04 00:35:44','2025-01-05 18:09:28','C','3200','2025-01-04 00:35:44'),(11,1,'Caja 05-01-2024','1','2025-01-05 14:09:37','2025-01-06 20:25:20','C','1200','2025-01-05 14:09:37'),(12,1,'Caja 06-01-2025','1','2025-01-06 16:31:11','2025-01-10 17:45:36','C','0','2025-01-06 16:31:11'),(13,1,'Caja 10-01-2025','1','2025-01-10 13:45:48','2025-01-11 18:16:38','C','4100','2025-01-10 13:45:48'),(14,1,'Caja 11-01-2025','1','2025-01-11 15:18:02','2025-01-12 16:01:48','C','4000','2025-01-11 15:18:02'),(15,1,'Caja 12-01-2025','1','2025-01-12 12:02:20','2025-01-13 15:48:22','C','2000','2025-01-12 12:02:20'),(16,1,'Caja 13-01-2025','1','2025-01-13 11:48:42','2025-01-18 18:56:47','C','2000','2025-01-13 11:48:42'),(18,1,'Caja 18-01-2025','1','2025-01-18 14:57:03','2025-01-19 17:28:32','C','900','2025-01-18 14:57:03'),(19,1,'Caja 19-01-2025','1','2025-01-19 13:28:46','2025-01-25 17:54:48','C','1850','2025-01-19 13:28:46'),(20,1,'Caja 25-01-2025','1','2025-01-25 13:55:07','2025-01-26 16:29:32','C','350','2025-01-25 13:55:07'),(21,1,'Caja 26-01-2025','1','2025-01-26 12:29:48','2025-01-27 22:32:50','C','6000','2025-01-26 12:29:48'),(22,1,'Caja de prueba','1','2025-01-27 22:42:36','2025-01-29 22:40:22','C','3150','2025-01-27 22:42:36'),(23,1,'caja 29-01-2025','1','2025-01-29 18:40:36','2025-01-29 22:40:47','C','0','2025-01-29 18:40:36'),(24,1,'caja 29-01-2025','1','2025-01-29 18:40:56','2025-02-01 17:16:10','C','1000','2025-01-29 18:40:56'),(25,1,'Caja 01-02-2025','1','2025-02-01 13:16:59','2025-02-02 20:00:31','C','21000','2025-02-01 13:16:59'),(26,1,'caja 02-02-2025','1','2025-02-02 16:00:41','2025-02-07 20:28:27','C','1200','2025-02-02 16:00:41'),(27,1,'Caja 07-02-2025','1','2025-02-07 16:28:39','2025-02-08 21:22:57','C','1500','2025-02-07 16:28:39'),(28,1,'Caja 08-02-2025','1','2025-02-08 17:23:23','2025-02-09 04:35:23','C','3000','2025-02-08 17:23:23'),(29,1,'Caja 09-02-2025','1','2025-02-09 13:54:50','2025-02-10 23:17:29','C','300','2025-02-09 13:54:50'),(30,1,'Caja 10-02-2025','1','2025-02-10 19:17:39','2025-10-14 02:49:30','C','4150','2025-02-10 19:17:39'),(31,4,'Caja de prueba Admin4','4','2025-08-20 21:53:19','0000-00-00 00:00:00','A','0','2025-08-20 21:53:19'),(32,1,'Caja de prueba VendeloPOS','1','2025-10-13 21:49:47','2025-10-14 02:51:29','C','0','2025-10-13 21:49:47'),(33,1,'Caja de prueba VendeloPOS','1','2025-10-13 21:51:58','0000-00-00 00:00:00','A','7500','2025-10-13 21:51:58');
/*!40000 ALTER TABLE `cierre_caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rut` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(5) NOT NULL,
  `nom_fantasia` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `razon_social` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `giro` int(11) NOT NULL,
  `direccion` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefono` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `plan_comprado` int(11) NOT NULL,
  `plazo_pago` int(10) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Claudio Francisco Werner Neira EDITADO','19150634-0','S','Camping Playa Werner','Camping Playa Werner',11111,'Camping Playa Werner','claudiowernern@hotmail.com','+56978841411',1,1,'2024-10-16'),(11,'Claudio Francisco Werner Neira','7367889-7','N','123','Procesamiento de datos',724000,'Camping Playa Werner','claudiowernern@hotmail.com','978841411',1,0,'2025-08-21'),(12,'Claudio Francisco Werner Neira','7367889-7','N','123','Procesamiento de datos',11111,'Camping Playa Werner','claudiowernern@hotmail.com','978841411',1,0,'2025-08-21'),(13,'Constanza Werner Neira','18752880-1','N','123','Procesamiento de datos',11111,'Camping Playa Werner','claudiowernern@hotmail.com','978841411',1,0,'2025-08-21'),(14,'Claudio Francisco Werner Neira','7367889-7','S','123','Procesamiento de datos',11111,'Camping Playa Werner','claudiowernern@hotmail.com','978841411',2,3,'2025-08-21'),(15,'Claudio Francisco Werner Neira','7367889-7','S','123','Procesamiento de datos',11111,'Camping Playa Werner','claudiowernern@hotmail.com','978841411',1,0,'2025-08-21'),(16,'Claudio Francisco Werner Neira','7367889-7','S','123','Procesamiento de datos',11111,'Camping Playa Werner','claudiowernern@hotmail.com','978841411',1,0,'2025-08-21'),(17,'Claudio Francisco Werner Neira','7367889-7','S','123','Procesamiento de datos',11111,'Camping Playa Werner','claudiowernern@hotmail.com','978841411',1,0,'2025-08-21'),(18,'Claudio Francisco Werner Neira','7367889-7','S','123','Procesamiento de datos',11111,'Camping Playa Werner','claudiowernern@hotmail.com','978841411',1,0,'2025-08-21'),(19,'Claudio Francisco Werner Neira','7367889-7','S','123','Procesamiento de datos',11111,'Camping Playa Werner','claudiowernern@hotmail.com','978841411',1,0,'2025-08-21'),(20,'Claudio Francisco Werner Neira','7367889-7','S','123','Procesamiento de datos',11111,'Camping Playa Werner','claudiowernern@hotmail.com','978841411',1,0,'2025-08-21'),(21,'Claudio Francisco Werner Neira','7367889-7','S','123','Procesamiento de datos',11111,'Camping Playa Werner','claudiowernern@hotmail.com','978841411',1,0,'2025-08-21'),(22,'Claudio Francisco Werner Neira','7367889-7','S','123','Procesamiento de datos',11111,'Camping Playa Werner','claudiowernern@hotmail.com','978841411',1,0,'2025-08-21');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes_negocio`
--

DROP TABLE IF EXISTS `clientes_negocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes_negocio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `rut` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creado_por` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes_negocio`
--

LOCK TABLES `clientes_negocio` WRITE;
/*!40000 ALTER TABLE `clientes_negocio` DISABLE KEYS */;
INSERT INTO `clientes_negocio` VALUES (1,1,'19150634-0','Claudio Francisco','Werner','+56978841411','N',1,'2024-10-16'),(2,1,'19150634-0','Claudio','Werner','+56978841411','N',1,'2024-10-16'),(3,1,'18752880-1','Constanza','Werner','+56978841411','N',1,'2024-12-04'),(4,1,'4531159-7','Graciela ','Gómez','+56978841411','N',1,'2024-12-14'),(5,1,'7367889-7','María Cecilia','Neira Gómez','+56978841411','N',1,'2025-01-27'),(6,1,'4494605-k','Claudio Federico','Werner Neira','+56652242114','S',1,'2025-10-14');
/*!40000 ALTER TABLE `clientes_negocio` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprobantes`
--

LOCK TABLES `comprobantes` WRITE;
/*!40000 ALTER TABLE `comprobantes` DISABLE KEYS */;
INSERT INTO `comprobantes` VALUES (1,1,1,'Comprobante 1','../../files/comprobantes/Compr_16-10-2024-14-39-4.pdf','2024-10-16'),(2,1,2,'Comprobante 2','../../files/comprobantes/Compr_16-10-2024-14-39-29.pdf','2024-10-16'),(3,1,3,'Comprobante 3','../../files/comprobantes/Compr_6-11-2024-22-22-18.JPG','2024-11-06'),(4,1,4,'Comprobante 4','../../files/comprobantes/Compr_6-11-2024-22-22-40.JPG','2024-11-06'),(5,1,5,'Comprobante 5','../../files/comprobantes/Compr_6-8-2025-16-53-45.jpg','2025-08-06'),(6,1,6,'Comprobante 6','../../files/comprobantes/Compr_6-8-2025-16-53-50.jpg','2025-08-06'),(7,1,7,'Comprobante 7','../../files/comprobantes/Compr_6-8-2025-16-53-54.jpg','2025-08-06'),(8,1,8,'Comprobante 8','../../files/comprobantes/Compr_6-8-2025-16-53-57.jpg','2025-08-06'),(9,1,9,'Comprobante 9','../../files/comprobantes/Compr_6-8-2025-16-54-1.jpg','2025-08-06'),(10,1,10,'Comprobante 10','../../files/comprobantes/Compr_6-8-2025-16-54-4.jpg','2025-08-06'),(11,3,4,'Comprobante 1','../../files/comprobantes/Compr_20-8-2025-19-36-17.jpg','2025-08-20'),(12,4,9,'Comprobante 1','../../files/comprobantes/Compr_20-8-2025-21-49-29.jpg','2025-08-20'),(13,13,10,'Comprobante 1','../../files/comprobantes/Compr_21-8-2025-15-32-58.jpg','2025-08-21'),(14,13,11,'Comprobante 2','../../files/comprobantes/Compr_21-8-2025-15-33-3.jpg','2025-08-21'),(15,14,15,'Comprobante 1','../../files/comprobantes/Compr_21-8-2025-15-40-33.jpg','2025-08-21'),(16,14,16,'Comprobante 2','../../files/comprobantes/Compr_21-8-2025-15-42-17.jpg','2025-08-21'),(17,14,17,'Comprobante 3','../../files/comprobantes/Compr_21-8-2025-16-4-27.jpg','2025-08-21'),(18,14,18,'Comprobante 4','../../files/comprobantes/Compr_21-8-2025-16-4-31.jpg','2025-08-21'),(19,1,1,'Comprobante 11','../../files/comprobantes/Compr_13-10-2025-16-4-54.jpg','2025-10-13'),(20,1,2,'Comprobante 12','../../files/comprobantes/Compr_13-10-2025-16-4-58.jpg','2025-10-13'),(21,1,19,'Comprobante 13','../../files/comprobantes/Compr_13-10-2025-16-5-35.jpg','2025-10-13');
/*!40000 ALTER TABLE `comprobantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_promociones`
--

DROP TABLE IF EXISTS `config_promociones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `config_promociones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `estado` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_promociones`
--

LOCK TABLES `config_promociones` WRITE;
/*!40000 ALTER TABLE `config_promociones` DISABLE KEYS */;
INSERT INTO `config_promociones` VALUES (1,1,'S');
/*!40000 ALTER TABLE `config_promociones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `correlativo`
--

DROP TABLE IF EXISTS `correlativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `correlativo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correlativo` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `caja` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usuario` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `boleta` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `descuento` int(5) NOT NULL,
  `forma_pago` int(11) NOT NULL,
  `id_cierre` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=432 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correlativo`
--

LOCK TABLES `correlativo` WRITE;
/*!40000 ALTER TABLE `correlativo` DISABLE KEYS */;
INSERT INTO `correlativo` VALUES (1,1,1,'2','1','1',1000,0,4,'33','C','2024-12-04 21:02:10','2025-10-14 21:34:53'),(2,2,1,'2','1','1',0,0,0,'1','C','2024-12-04 00:00:00','2024-12-05 03:26:51'),(3,3,1,'2','1','1',0,0,0,'1','C','2024-12-04 23:25:28','2024-12-05 03:26:51'),(4,4,1,'2','1','2',0,0,1,'2','C','2024-12-07 15:29:18','2024-12-14 16:23:22'),(5,5,1,'2','1','3',0,0,1,'2','C','2024-12-07 16:42:41','2024-12-14 16:23:22'),(6,6,1,'2','1','4',0,0,1,'2','C','2024-12-07 17:54:41','2024-12-14 16:23:22'),(7,7,1,'2','1','4',0,0,0,'2','C','2024-12-07 18:27:41','2024-12-14 16:23:22'),(8,8,1,'2','1','4',1200,0,4,'33','C','2024-12-07 18:28:18','2025-10-14 21:34:53'),(9,9,1,'2','1','5',0,0,1,'2','C','2024-12-07 18:36:28','2024-12-14 16:23:22'),(10,10,1,'2','1','6',0,0,1,'2','C','2024-12-07 19:16:44','2024-12-14 16:23:22'),(11,11,1,'2','1','6',10000,0,3,'33','C','2024-12-14 13:42:10','2025-10-14 21:35:50'),(12,12,1,'2','1','6',11000,0,4,'33','C','2024-12-14 13:44:13','2025-10-14 21:34:53'),(13,13,1,'2','1','7',0,0,1,'3','C','2024-12-14 14:02:45','2024-12-15 04:09:13'),(14,14,1,'2','1','8',0,0,1,'3','C','2024-12-14 14:06:28','2024-12-15 04:09:13'),(15,15,1,'2','1','9',0,0,1,'3','C','2024-12-14 14:14:39','2024-12-15 04:09:13'),(16,16,1,'2','1','10',0,0,1,'3','C','2024-12-14 14:15:06','2024-12-15 04:09:13'),(17,17,1,'2','1','10',0,0,1,'3','C','2024-12-14 14:17:36','2024-12-15 04:09:13'),(18,18,1,'2','1','10',0,0,1,'3','C','2024-12-14 14:21:35','2024-12-15 04:09:13'),(19,19,1,'2','1','10',0,0,1,'3','C','2024-12-14 14:25:00','2024-12-15 04:09:13'),(20,20,1,'2','1','10',0,0,1,'3','C','2024-12-14 18:07:10','2024-12-15 04:09:13'),(21,21,1,'2','1','10',0,0,1,'3','C','2024-12-14 18:10:33','2024-12-15 04:09:13'),(22,22,1,'2','1','11',0,0,1,'3','C','2024-12-14 18:13:04','2024-12-15 04:09:13'),(23,23,1,'2','1','10',0,0,1,'3','C','2024-12-14 18:44:44','2024-12-15 04:09:13'),(24,24,1,'2','1','10',0,0,1,'3','C','2024-12-14 18:50:15','2024-12-15 04:09:13'),(25,25,1,'2','1','10',0,0,1,'3','C','2024-12-14 19:01:49','2024-12-15 04:09:13'),(26,26,1,'2','1','9',0,0,0,'3','C','2024-12-14 19:06:32','2024-12-15 04:09:13'),(27,27,1,'2','1','10',0,0,1,'4','C','2024-12-21 15:08:35','2024-12-25 17:51:07'),(28,28,1,'2','1','9',0,0,0,'4','C','2024-12-21 15:10:07','2024-12-25 17:51:07'),(29,29,1,'2','1','9',0,0,0,'4','C','2024-12-22 19:15:35','2024-12-25 17:51:07'),(30,30,1,'2','1','10',0,0,1,'5','C','2024-12-25 13:51:58','2024-12-26 03:27:05'),(31,31,1,'2','1','11',0,0,1,'5','C','2024-12-25 21:12:03','2024-12-26 03:27:05'),(32,32,1,'2','1','9',0,0,0,'','C','2024-12-27 13:13:29','0000-00-00 00:00:00'),(33,33,1,'2','1','10',0,0,1,'6','C','2024-12-28 12:53:22','2024-12-29 02:36:18'),(34,34,1,'2','1','10',0,0,1,'6','C','2024-12-28 15:16:57','2024-12-29 02:36:18'),(35,35,1,'2','1','10',0,0,1,'6','C','2024-12-28 15:23:23','2024-12-29 02:36:18'),(36,36,1,'2','1','10',0,0,1,'6','C','2024-12-28 15:46:00','2024-12-29 02:36:18'),(37,37,1,'2','1','10',0,0,1,'6','C','2024-12-28 15:48:17','2024-12-29 02:36:18'),(38,38,1,'2','1','10',0,0,1,'6','C','2024-12-28 17:49:51','2024-12-29 02:36:18'),(39,39,1,'2','1','10',0,0,1,'6','C','2024-12-28 17:52:01','2024-12-29 02:36:18'),(40,40,1,'2','1','10',0,0,1,'6','C','2024-12-28 18:03:00','2024-12-29 02:36:18'),(41,41,1,'2','1','10',0,0,1,'6','C','2024-12-28 18:05:52','2024-12-29 02:36:18'),(42,42,1,'2','1','10',0,0,1,'6','C','2024-12-28 18:13:20','2024-12-29 02:36:18'),(43,43,1,'2','1','11',0,0,1,'6','C','2024-12-28 18:15:46','2024-12-29 02:36:18'),(44,44,1,'2','1','10',0,0,1,'6','C','2024-12-28 19:56:08','2024-12-29 02:36:18'),(45,45,1,'2','1','10',0,0,1,'6','C','2024-12-28 19:58:37','2024-12-29 02:36:18'),(46,46,1,'2','1','9',0,0,0,'','C','2024-12-28 21:56:20','0000-00-00 00:00:00'),(47,47,1,'2','1','10',0,0,1,'6','C','2024-12-28 21:58:18','2024-12-29 02:36:18'),(48,48,1,'2','1','10',0,0,1,'6','C','2024-12-28 22:00:25','2024-12-29 02:36:18'),(49,49,1,'2','1','10',0,0,2,'7','C','2024-12-29 16:31:20','2025-01-01 00:51:12'),(50,50,1,'2','1','10',0,0,1,'7','C','2024-12-29 16:43:51','2025-01-01 00:51:12'),(51,51,1,'2','1','10',0,0,2,'7','C','2024-12-29 16:50:16','2025-01-01 00:51:12'),(52,52,1,'2','1','10',0,0,1,'7','C','2024-12-29 16:55:57','2025-01-01 00:51:12'),(53,53,1,'2','1','10',0,0,1,'7','C','2024-12-29 17:10:38','2025-01-01 00:51:12'),(54,54,1,'2','1','10',0,0,2,'7','C','2024-12-29 17:14:54','2025-01-01 00:51:12'),(55,55,1,'2','1','10',0,0,1,'7','C','2024-12-29 17:15:22','2025-01-01 00:51:12'),(56,56,1,'2','1','10',0,0,1,'8','C','2025-01-01 13:44:45','2025-01-03 23:53:35'),(57,57,1,'2','1','10',0,0,1,'8','C','2025-01-01 14:05:14','2025-01-03 23:53:35'),(58,58,1,'2','1','11',0,0,1,'8','C','2025-01-01 14:09:51','2025-01-03 23:53:35'),(59,59,1,'2','1','10',0,0,1,'8','C','2025-01-01 14:12:29','2025-01-03 23:53:35'),(60,60,1,'2','1','10',0,0,1,'8','C','2025-01-01 14:17:14','2025-01-03 23:53:35'),(61,61,1,'2','1','10',0,0,1,'8','C','2025-01-01 14:19:55','2025-01-03 23:53:35'),(62,62,1,'2','1','10',0,0,1,'8','C','2025-01-01 14:35:24','2025-01-03 23:53:35'),(63,63,1,'2','1','10',0,0,1,'8','C','2025-01-01 14:52:16','2025-01-03 23:53:35'),(64,64,1,'2','1','10',0,0,1,'8','C','2025-01-01 14:53:26','2025-01-03 23:53:35'),(65,65,1,'2','1','10',0,0,1,'8','C','2025-01-01 15:31:55','2025-01-03 23:53:35'),(66,66,1,'2','1','10',0,0,2,'8','C','2025-01-01 17:52:15','2025-01-03 23:53:35'),(67,67,1,'2','1','10',0,0,1,'8','C','2025-01-01 17:57:56','2025-01-03 23:53:35'),(68,68,1,'2','1','10',0,0,1,'8','C','2025-01-01 18:00:44','2025-01-03 23:53:35'),(69,69,1,'2','1','10',0,0,1,'8','C','2025-01-01 18:20:12','2025-01-03 23:53:35'),(70,70,1,'2','1','10',0,0,1,'8','C','2025-01-01 18:26:46','2025-01-03 23:53:35'),(71,71,1,'2','1','10',0,0,1,'8','C','2025-01-01 18:35:03','2025-01-03 23:53:35'),(72,72,1,'2','1','10',0,0,1,'8','C','2025-01-01 20:45:41','2025-01-03 23:53:35'),(73,73,1,'2','1','9',0,0,0,'8','C','2025-01-03 19:53:14','2025-01-03 23:53:35'),(74,74,1,'2','1','10',0,0,1,'9','C','2025-01-03 19:53:54','2025-01-04 04:35:08'),(75,75,1,'2','1','10',0,0,1,'9','C','2025-01-03 19:56:39','2025-01-04 04:35:08'),(76,76,1,'2','1','10',0,0,1,'9','C','2025-01-03 20:00:04','2025-01-04 04:35:08'),(77,77,1,'2','1','10',0,0,1,'9','C','2025-01-03 20:01:31','2025-01-04 04:35:08'),(78,78,1,'2','1','10',0,0,2,'9','C','2025-01-03 20:04:20','2025-01-04 04:35:08'),(79,79,1,'2','1','10',0,0,2,'9','C','2025-01-03 20:06:25','2025-01-04 04:35:08'),(80,80,1,'2','1','10',0,0,1,'9','C','2025-01-03 21:55:25','2025-01-04 04:35:08'),(81,81,1,'2','1','10',0,0,1,'9','C','2025-01-03 22:26:02','2025-01-04 04:35:08'),(82,82,1,'2','1','10',0,0,1,'9','C','2025-01-03 22:27:57','2025-01-04 04:35:08'),(83,83,1,'2','1','10',0,0,1,'9','C','2025-01-03 22:50:22','2025-01-04 04:35:08'),(84,84,1,'2','1','9',0,0,0,'9','C','2025-01-03 22:53:20','2025-01-04 04:35:08'),(85,85,1,'2','1','10',0,0,1,'10','C','2025-01-04 14:46:41','2025-01-05 18:09:28'),(86,86,1,'2','1','9',0,0,0,'10','C','2025-01-04 16:26:42','2025-01-05 18:09:28'),(87,87,1,'2','1','10',0,0,1,'10','C','2025-01-04 16:26:42','2025-01-05 18:09:28'),(88,88,1,'2','1','10',0,0,2,'10','C','2025-01-04 16:28:28','2025-01-05 18:09:28'),(89,89,1,'2','1','10',0,0,1,'10','C','2025-01-04 16:44:52','2025-01-05 18:09:28'),(90,90,1,'2','1','10',0,0,2,'10','C','2025-01-04 16:45:49','2025-01-05 18:09:28'),(91,91,1,'2','1','10',0,0,1,'10','C','2025-01-04 16:51:00','2025-01-05 18:09:28'),(92,92,1,'2','1','10',0,0,1,'10','C','2025-01-04 17:20:18','2025-01-05 18:09:28'),(93,93,1,'2','1','10',0,0,1,'10','C','2025-01-04 17:25:13','2025-01-05 18:09:28'),(94,94,1,'2','1','10',0,0,1,'10','C','2025-01-04 17:26:31','2025-01-05 18:09:28'),(95,95,1,'2','1','10',0,0,1,'10','C','2025-01-04 17:27:45','2025-01-05 18:09:28'),(96,96,1,'2','1','10',0,0,1,'10','C','2025-01-04 18:16:59','2025-01-05 18:09:28'),(97,97,1,'2','1','10',0,0,1,'10','C','2025-01-04 18:19:58','2025-01-05 18:09:28'),(98,98,1,'2','1','10',0,0,1,'10','C','2025-01-04 18:20:38','2025-01-05 18:09:28'),(99,99,1,'2','1','10',0,0,1,'10','C','2025-01-04 18:26:07','2025-01-05 18:09:28'),(100,100,1,'2','1','10',0,0,1,'10','C','2025-01-04 18:27:53','2025-01-05 18:09:28'),(101,101,1,'2','1','10',0,0,1,'10','C','2025-01-04 18:36:53','2025-01-05 18:09:28'),(102,102,1,'2','1','10',0,0,1,'10','C','2025-01-04 18:39:08','2025-01-05 18:09:28'),(103,103,1,'2','1','10',0,0,1,'10','C','2025-01-04 18:40:27','2025-01-05 18:09:28'),(104,104,1,'2','1','11',0,0,1,'10','C','2025-01-04 18:44:40','2025-01-05 18:09:28'),(105,105,1,'2','1','10',0,0,1,'10','C','2025-01-04 18:46:31','2025-01-05 18:09:28'),(106,106,1,'2','1','10',0,0,1,'10','C','2025-01-04 19:07:36','2025-01-05 18:09:28'),(107,107,1,'2','1','10',0,0,1,'10','C','2025-01-04 19:08:55','2025-01-05 18:09:28'),(108,108,1,'2','1','10',0,0,1,'10','C','2025-01-04 19:12:39','2025-01-05 18:09:28'),(109,109,1,'2','1','10',0,0,1,'10','C','2025-01-04 19:19:53','2025-01-05 18:09:28'),(110,110,1,'2','1','10',0,0,1,'10','C','2025-01-04 19:31:23','2025-01-05 18:09:28'),(111,111,1,'2','1','10',0,0,1,'10','C','2025-01-04 19:34:05','2025-01-05 18:09:28'),(112,112,1,'2','1','10',0,0,1,'10','C','2025-01-04 20:01:06','2025-01-05 18:09:28'),(113,113,1,'2','1','10',0,0,1,'10','C','2025-01-04 20:06:29','2025-01-05 18:09:28'),(114,114,1,'2','1','10',0,0,1,'10','C','2025-01-04 21:28:48','2025-01-05 18:09:28'),(115,115,1,'2','1','10',0,0,1,'10','C','2025-01-04 21:30:31','2025-01-05 18:09:28'),(116,116,1,'2','1','10',0,0,1,'10','C','2025-01-04 21:36:53','2025-01-05 18:09:28'),(117,117,1,'2','1','10',0,0,1,'10','C','2025-01-04 21:42:24','2025-01-05 18:09:28'),(118,118,1,'2','1','10',0,0,1,'10','C','2025-01-04 21:48:09','2025-01-05 18:09:28'),(119,119,1,'2','1','10',0,0,2,'10','C','2025-01-04 21:50:47','2025-01-05 18:09:28'),(120,120,1,'2','1','10',0,0,1,'10','C','2025-01-04 21:58:57','2025-01-05 18:09:28'),(121,121,1,'2','1','10',0,0,1,'10','C','2025-01-04 22:00:35','2025-01-05 18:09:28'),(122,122,1,'2','1','10',0,0,1,'10','C','2025-01-04 22:01:57','2025-01-05 18:09:28'),(123,123,1,'2','1','10',0,0,1,'10','C','2025-01-05 11:35:00','2025-01-05 18:09:28'),(124,124,1,'2','1','10',0,0,1,'11','C','2025-01-05 14:09:41','2025-01-06 20:25:20'),(125,125,1,'2','1','10',0,0,1,'11','C','2025-01-05 14:11:50','2025-01-06 20:25:20'),(126,126,1,'2','1','10',0,0,1,'11','C','2025-01-05 14:18:27','2025-01-06 20:25:20'),(127,127,1,'2','1','9',0,0,0,'11','C','2025-01-05 14:18:53','2025-01-06 20:25:20'),(128,128,1,'2','1','10',0,0,1,'11','C','2025-01-05 14:30:50','2025-01-06 20:25:20'),(129,129,1,'2','1','10',0,0,1,'11','C','2025-01-05 14:32:34','2025-01-06 20:25:20'),(130,130,1,'2','1','10',0,0,1,'11','C','2025-01-05 14:33:34','2025-01-06 20:25:20'),(131,131,1,'2','1','10',0,0,1,'11','C','2025-01-05 14:40:24','2025-01-06 20:25:20'),(132,132,1,'2','1','10',0,0,1,'11','C','2025-01-05 14:41:17','2025-01-06 20:25:20'),(133,133,1,'2','1','10',0,0,1,'11','C','2025-01-05 14:52:41','2025-01-06 20:25:20'),(134,134,1,'2','1','10',0,0,1,'11','C','2025-01-05 17:08:09','2025-01-06 20:25:20'),(135,135,1,'2','1','10',0,0,1,'11','C','2025-01-05 17:10:38','2025-01-06 20:25:20'),(136,136,1,'2','1','10',0,0,1,'11','C','2025-01-05 17:29:35','2025-01-06 20:25:20'),(137,137,1,'2','1','10',0,0,1,'11','C','2025-01-05 17:48:55','2025-01-06 20:25:20'),(138,138,1,'2','1','10',0,0,1,'11','C','2025-01-05 17:52:46','2025-01-06 20:25:20'),(139,139,1,'2','1','10',0,0,1,'11','C','2025-01-05 17:55:23','2025-01-06 20:25:20'),(140,140,1,'2','1','10',0,0,1,'11','C','2025-01-05 18:55:19','2025-01-06 20:25:20'),(141,141,1,'2','1','10',0,0,1,'11','C','2025-01-05 19:00:27','2025-01-06 20:25:20'),(142,142,1,'2','1','10',0,0,1,'11','C','2025-01-05 19:01:48','2025-01-06 20:25:20'),(143,143,1,'2','1','10',0,0,1,'11','C','2025-01-05 19:10:09','2025-01-06 20:25:20'),(144,144,1,'2','1','9',0,0,0,'11','C','2025-01-05 19:11:31','2025-01-06 20:25:20'),(145,145,1,'2','1','9',0,0,0,'12','C','2025-01-10 13:43:49','2025-01-10 17:45:36'),(146,146,1,'2','1','10',0,0,1,'13','C','2025-01-10 13:46:18','2025-01-11 18:16:38'),(147,147,1,'2','1','10',0,0,1,'13','C','2025-01-10 15:54:39','2025-01-11 18:16:38'),(148,148,1,'2','1','10',0,0,1,'13','C','2025-01-10 16:02:37','2025-01-11 18:16:38'),(149,149,1,'2','1','10',0,0,1,'13','C','2025-01-10 17:15:49','2025-01-11 18:16:38'),(150,150,1,'2','1','10',0,0,1,'13','C','2025-01-10 17:23:36','2025-01-11 18:16:38'),(151,151,1,'2','1','10',0,0,1,'13','C','2025-01-10 19:25:24','2025-01-11 18:16:38'),(152,152,1,'2','1','10',0,0,1,'13','C','2025-01-10 19:30:07','2025-01-11 18:16:38'),(153,153,1,'2','1','10',0,0,1,'13','C','2025-01-10 19:33:44','2025-01-11 18:16:38'),(154,154,1,'2','1','10',0,0,2,'13','C','2025-01-10 19:34:20','2025-01-11 18:16:38'),(155,155,1,'2','1','10',0,0,1,'13','C','2025-01-10 20:54:36','2025-01-11 18:16:38'),(156,156,1,'2','1','9',0,0,0,'13','C','2025-01-10 21:29:48','2025-01-11 18:16:38'),(157,157,1,'2','1','10',0,0,1,'14','C','2025-01-11 15:18:10','2025-01-12 16:01:48'),(158,158,1,'2','1','10',0,0,1,'14','C','2025-01-11 15:38:42','2025-01-12 16:01:48'),(159,159,1,'2','1','10',0,0,1,'14','C','2025-01-11 15:41:56','2025-01-12 16:01:48'),(160,160,1,'2','1','10',0,0,1,'14','C','2025-01-11 16:03:03','2025-01-12 16:01:48'),(161,161,1,'2','1','10',0,0,1,'14','C','2025-01-11 16:10:26','2025-01-12 16:01:48'),(162,162,1,'2','1','10',0,0,1,'14','C','2025-01-11 16:13:29','2025-01-12 16:01:48'),(163,163,1,'2','1','10',0,0,2,'14','C','2025-01-11 16:19:05','2025-01-12 16:01:48'),(164,164,1,'2','1','10',0,0,1,'14','C','2025-01-11 16:23:01','2025-01-12 16:01:48'),(165,165,1,'2','1','10',0,0,1,'14','C','2025-01-11 16:26:46','2025-01-12 16:01:48'),(166,166,1,'2','1','10',0,0,1,'14','C','2025-01-11 16:29:13','2025-01-12 16:01:48'),(167,167,1,'2','1','10',0,0,1,'14','C','2025-01-11 16:31:31','2025-01-12 16:01:48'),(168,168,1,'2','1','10',0,0,1,'14','C','2025-01-11 16:34:16','2025-01-12 16:01:48'),(169,169,1,'2','1','10',0,0,2,'14','C','2025-01-11 16:35:39','2025-01-12 16:01:48'),(170,170,1,'2','1','10',0,0,2,'14','C','2025-01-11 16:40:19','2025-01-12 16:01:48'),(171,171,1,'2','1','10',0,0,1,'14','C','2025-01-11 16:40:55','2025-01-12 16:01:48'),(172,172,1,'2','1','10',0,0,1,'14','C','2025-01-11 17:38:32','2025-01-12 16:01:48'),(173,173,1,'2','1','10',0,0,1,'14','C','2025-01-11 17:44:01','2025-01-12 16:01:48'),(174,174,1,'2','1','10',0,0,1,'14','C','2025-01-11 17:46:50','2025-01-12 16:01:48'),(175,175,1,'2','1','10',0,0,1,'14','C','2025-01-11 17:56:02','2025-01-12 16:01:48'),(176,176,1,'2','1','10',0,0,1,'14','C','2025-01-11 18:00:21','2025-01-12 16:01:48'),(177,177,1,'2','1','10',0,0,1,'14','C','2025-01-11 18:50:52','2025-01-12 16:01:48'),(178,178,1,'2','1','10',0,0,1,'14','C','2025-01-11 18:52:18','2025-01-12 16:01:48'),(179,179,1,'2','1','10',0,0,1,'14','C','2025-01-11 18:57:15','2025-01-12 16:01:48'),(180,180,1,'2','1','10',0,0,1,'14','C','2025-01-11 18:59:37','2025-01-12 16:01:48'),(181,181,1,'2','1','10',0,0,1,'14','C','2025-01-11 19:06:56','2025-01-12 16:01:48'),(182,182,1,'2','1','10',0,0,1,'14','C','2025-01-11 19:12:30','2025-01-12 16:01:48'),(183,183,1,'2','1','10',0,0,1,'14','C','2025-01-11 19:16:08','2025-01-12 16:01:48'),(184,184,1,'2','1','10',0,0,1,'14','C','2025-01-11 19:19:37','2025-01-12 16:01:48'),(185,185,1,'2','1','10',0,0,1,'14','C','2025-01-11 19:26:54','2025-01-12 16:01:48'),(186,186,1,'2','1','10',0,0,1,'14','C','2025-01-11 19:30:37','2025-01-12 16:01:48'),(187,187,1,'2','1','10',0,0,1,'14','C','2025-01-11 19:31:36','2025-01-12 16:01:48'),(188,188,1,'2','1','10',0,0,1,'14','C','2025-01-11 20:02:35','2025-01-12 16:01:48'),(189,189,1,'2','1','10',0,0,1,'14','C','2025-01-11 20:09:05','2025-01-12 16:01:48'),(190,190,1,'2','1','10',0,0,1,'14','C','2025-01-11 20:16:27','2025-01-12 16:01:48'),(191,191,1,'2','1','10',0,0,1,'14','C','2025-01-11 20:18:12','2025-01-12 16:01:48'),(192,192,1,'2','1','10',0,0,1,'14','C','2025-01-11 20:25:05','2025-01-12 16:01:48'),(193,193,1,'2','1','10',0,0,1,'14','C','2025-01-11 20:32:00','2025-01-12 16:01:48'),(194,194,1,'2','1','10',0,0,1,'14','C','2025-01-11 20:34:18','2025-01-12 16:01:48'),(195,195,1,'2','1','10',0,0,1,'14','C','2025-01-11 20:34:59','2025-01-12 16:01:48'),(196,196,1,'2','1','10',0,0,2,'14','C','2025-01-11 20:36:51','2025-01-12 16:01:48'),(197,197,1,'2','1','10',0,0,1,'14','C','2025-01-11 20:41:57','2025-01-12 16:01:48'),(198,198,1,'2','1','10',0,0,1,'14','C','2025-01-11 21:03:54','2025-01-12 16:01:48'),(199,199,1,'2','1','10',0,0,1,'14','C','2025-01-11 21:05:30','2025-01-12 16:01:48'),(200,200,1,'2','1','9',0,0,0,'14','C','2025-01-11 21:44:23','2025-01-12 16:01:48'),(201,201,1,'2','1','10',0,0,1,'14','C','2025-01-11 21:46:46','2025-01-12 16:01:48'),(202,202,1,'2','1','10',0,0,1,'14','C','2025-01-11 21:48:05','2025-01-12 16:01:48'),(203,203,1,'2','1','10',0,0,1,'14','C','2025-01-11 22:04:06','2025-01-12 16:01:48'),(204,204,1,'2','1','10',0,0,1,'14','C','2025-01-11 22:16:49','2025-01-12 16:01:48'),(205,205,1,'2','1','10',0,0,1,'14','C','2025-01-11 22:48:56','2025-01-12 16:01:48'),(206,206,1,'2','1','10',0,0,1,'15','C','2025-01-12 12:02:24','2025-01-13 15:48:22'),(207,207,1,'2','1','10',0,0,1,'15','C','2025-01-12 14:52:31','2025-01-13 15:48:22'),(208,208,1,'2','1','10',0,0,1,'15','C','2025-01-12 14:53:13','2025-01-13 15:48:22'),(209,209,1,'2','1','10',0,0,1,'15','C','2025-01-12 15:24:19','2025-01-13 15:48:22'),(210,210,1,'2','1','10',0,0,1,'16','C','2025-01-13 11:48:49','2025-01-18 18:56:47'),(211,211,1,'2','1','10',0,0,1,'16','C','2025-01-13 11:49:41','2025-01-18 18:56:47'),(212,212,1,'2','1','9',0,0,0,'16','C','2025-01-13 13:30:57','2025-01-18 18:56:47'),(213,213,1,'2','1','10',0,0,1,'16','C','2025-01-16 16:08:00','2025-01-18 18:56:47'),(214,214,1,'2','1','10',0,0,1,'16','C','2025-01-16 16:11:09','2025-01-18 18:56:47'),(215,215,1,'2','1','9',0,0,0,'16','C','2025-01-16 16:28:13','2025-01-18 18:56:47'),(216,216,1,'2','1','10',0,0,1,'18','C','2025-01-18 14:57:07','2025-01-19 17:28:32'),(217,217,1,'2','1','10',0,0,1,'18','C','2025-01-18 15:02:06','2025-01-19 17:28:32'),(218,218,1,'2','1','10',0,0,1,'18','C','2025-01-18 17:07:24','2025-01-19 17:28:32'),(219,219,1,'2','1','10',0,0,1,'18','C','2025-01-18 18:26:16','2025-01-19 17:28:32'),(220,220,1,'2','1','10',0,0,1,'18','C','2025-01-18 18:29:05','2025-01-19 17:28:32'),(221,221,1,'2','1','10',0,0,1,'18','C','2025-01-18 18:46:43','2025-01-19 17:28:32'),(222,222,1,'2','1','10',0,0,1,'18','C','2025-01-18 18:51:09','2025-01-19 17:28:32'),(223,223,1,'2','1','10',0,0,1,'18','C','2025-01-18 19:20:56','2025-01-19 17:28:32'),(224,224,1,'2','1','10',0,0,1,'18','C','2025-01-18 19:36:57','2025-01-19 17:28:32'),(225,225,1,'2','1','10',0,0,2,'18','C','2025-01-18 19:56:03','2025-01-19 17:28:32'),(226,226,1,'2','1','10',0,0,2,'18','C','2025-01-18 21:29:41','2025-01-19 17:28:32'),(227,227,1,'2','1','10',0,0,1,'18','C','2025-01-18 21:41:34','2025-01-19 17:28:32'),(228,228,1,'2','1','9',0,0,0,'18','C','2025-01-19 12:10:46','2025-01-19 17:28:32'),(229,229,1,'2','1','10',0,0,2,'19','C','2025-01-19 13:28:52','2025-01-25 17:54:48'),(230,230,1,'2','1','10',0,0,2,'19','C','2025-01-19 17:14:06','2025-01-25 17:54:48'),(231,231,1,'2','1','10',0,0,2,'19','C','2025-01-19 17:22:04','2025-01-25 17:54:48'),(232,232,1,'2','1','10',0,0,1,'19','C','2025-01-19 17:23:13','2025-01-25 17:54:48'),(233,233,1,'2','1','10',0,0,1,'19','C','2025-01-19 17:31:08','2025-01-25 17:54:48'),(234,234,1,'2','1','10',0,0,1,'19','C','2025-01-19 18:10:56','2025-01-25 17:54:48'),(235,235,1,'2','1','9',0,0,0,'19','C','2025-01-22 23:09:28','2025-01-25 17:54:48'),(236,236,1,'2','1','9',0,0,0,'19','C','2025-01-22 23:22:21','2025-01-25 17:54:48'),(237,237,1,'2','1','9',0,0,0,'19','C','2025-01-22 23:22:25','2025-01-25 17:54:48'),(238,238,1,'2','1','10',0,0,1,'19','C','2025-01-22 23:22:32','2025-01-25 17:54:48'),(239,239,1,'2','1','10',0,0,1,'19','C','2025-01-24 16:20:18','2025-01-25 17:54:48'),(240,240,1,'2','1','10',0,0,1,'19','C','2025-01-24 19:19:56','2025-01-25 17:54:48'),(241,241,1,'2','1','9',0,0,0,'19','C','2025-01-24 19:25:43','2025-01-25 17:54:48'),(242,242,1,'2','1','11',0,0,1,'20','C','2025-01-25 14:21:28','2025-01-26 16:29:32'),(243,243,1,'2','1','10',0,0,1,'20','C','2025-01-25 17:28:45','2025-01-26 16:29:32'),(244,244,1,'2','1','10',0,0,1,'20','C','2025-01-25 18:32:32','2025-01-26 16:29:32'),(245,245,1,'2','1','10',0,0,2,'20','C','2025-01-25 18:44:57','2025-01-26 16:29:32'),(246,246,1,'2','1','10',0,0,1,'20','C','2025-01-25 18:55:32','2025-01-26 16:29:32'),(247,247,1,'2','1','10',0,0,1,'20','C','2025-01-25 19:20:14','2025-01-26 16:29:32'),(248,248,1,'2','1','10',0,0,1,'20','C','2025-01-25 19:21:03','2025-01-26 16:29:32'),(249,249,1,'2','1','10',0,0,1,'20','C','2025-01-25 19:24:51','2025-01-26 16:29:32'),(250,250,1,'2','1','10',0,0,1,'20','C','2025-01-25 19:25:40','2025-01-26 16:29:32'),(251,251,1,'2','1','10',0,0,1,'20','C','2025-01-25 19:47:47','2025-01-26 16:29:32'),(252,252,1,'2','1','10',0,0,1,'20','C','2025-01-25 19:49:25','2025-01-26 16:29:32'),(253,253,1,'2','1','10',0,0,1,'20','C','2025-01-25 19:54:19','2025-01-26 16:29:32'),(254,254,1,'2','1','10',0,0,1,'20','C','2025-01-25 21:09:03','2025-01-26 16:29:32'),(255,255,1,'2','1','10',0,0,1,'20','C','2025-01-25 21:11:55','2025-01-26 16:29:32'),(256,256,1,'2','1','10',0,0,1,'20','C','2025-01-25 21:15:45','2025-01-26 16:29:32'),(257,257,1,'2','1','10',0,0,1,'20','C','2025-01-25 21:16:23','2025-01-26 16:29:32'),(258,258,1,'2','1','10',0,0,1,'20','C','2025-01-25 21:31:50','2025-01-26 16:29:32'),(259,259,1,'2','1','10',0,0,1,'20','C','2025-01-25 21:55:08','2025-01-26 16:29:32'),(260,260,1,'2','1','10',0,0,1,'20','C','2025-01-25 22:00:10','2025-01-26 16:29:32'),(261,261,1,'2','1','10',0,0,1,'20','C','2025-01-25 22:00:25','2025-01-26 16:29:32'),(262,262,1,'2','1','10',0,0,1,'20','C','2025-01-25 22:17:03','2025-01-26 16:29:32'),(263,263,1,'2','1','10',0,0,1,'20','C','2025-01-25 22:18:20','2025-01-26 16:29:32'),(264,264,1,'2','1','10',0,0,1,'20','C','2025-01-25 22:19:39','2025-01-26 16:29:32'),(265,265,1,'2','1','10',0,0,1,'20','C','2025-01-25 22:39:07','2025-01-26 16:29:32'),(266,266,1,'2','1','11',0,0,1,'20','C','2025-01-25 23:08:32','2025-01-26 16:29:32'),(267,267,1,'2','1','10',0,0,1,'20','C','2025-01-25 23:09:45','2025-01-26 16:29:32'),(268,268,1,'2','1','10',0,0,1,'20','C','2025-01-25 23:27:22','2025-01-26 16:29:32'),(269,269,1,'2','1','10',0,0,1,'20','C','2025-01-25 23:27:40','2025-01-26 16:29:32'),(270,270,1,'2','1','10',0,0,1,'20','C','2025-01-25 23:28:37','2025-01-26 16:29:32'),(271,271,1,'2','1','10',0,0,1,'20','C','2025-01-25 23:31:04','2025-01-26 16:29:32'),(272,272,1,'2','1','10',0,0,1,'20','C','2025-01-26 00:20:51','2025-01-26 16:29:32'),(273,273,1,'2','1','10',0,0,1,'21','C','2025-01-26 12:29:53','2025-01-27 22:32:50'),(274,274,1,'2','1','10',0,0,1,'21','C','2025-01-26 12:32:49','2025-01-27 22:32:50'),(275,275,1,'2','1','9',28000,0,1,'21','C','2025-01-26 12:38:37','2025-01-26 17:31:43'),(276,276,1,'2','1','10',0,0,1,'21','C','2025-01-26 13:59:14','2025-01-27 22:32:50'),(277,277,1,'2','1','10',0,0,1,'21','C','2025-01-26 14:22:32','2025-01-27 22:32:50'),(278,278,1,'2','1','10',0,0,1,'21','C','2025-01-26 14:24:42','2025-01-27 22:32:50'),(279,279,1,'2','1','10',0,0,1,'21','C','2025-01-26 15:28:20','2025-01-27 22:32:50'),(280,280,1,'2','1','10',0,0,1,'21','C','2025-01-26 17:35:15','2025-01-27 22:32:50'),(281,281,1,'2','1','10',0,0,1,'21','C','2025-01-26 18:10:04','2025-01-27 22:32:50'),(282,282,1,'2','1','10',0,0,1,'21','C','2025-01-26 18:45:42','2025-01-27 22:32:50'),(283,283,1,'2','1','10',0,0,1,'21','C','2025-01-26 19:08:10','2025-01-27 22:32:50'),(284,284,1,'2','1','9',11000,0,1,'21','C','2025-01-26 19:08:22','2025-01-27 18:22:37'),(285,285,1,'2','1','9',0,0,0,'21','C','2025-01-27 18:22:14','2025-01-27 22:32:50'),(286,286,1,'2','1','10',0,0,1,'22','C','2025-01-27 22:42:11','2025-01-29 22:40:22'),(287,287,1,'2','1','10',0,0,1,'22','C','2025-01-28 00:33:48','2025-01-29 22:40:22'),(288,288,1,'2','1','10',0,0,1,'22','C','2025-01-28 00:38:22','2025-01-29 22:40:22'),(289,289,1,'2','1','10',0,0,1,'22','C','2025-01-28 19:19:06','2025-01-29 22:40:22'),(290,290,1,'2','1','10',0,0,1,'22','C','2025-01-28 19:21:09','2025-01-29 22:40:22'),(291,291,1,'2','1','10',0,0,1,'22','C','2025-01-28 19:25:05','2025-01-29 22:40:22'),(292,292,1,'2','1','10',0,0,1,'22','C','2025-01-28 19:28:01','2025-01-29 22:40:22'),(293,293,1,'2','1','10',0,0,1,'24','C','2025-01-29 19:01:44','2025-02-01 17:16:10'),(294,294,1,'2','1','9',0,0,0,'24','C','2025-01-30 16:12:51','2025-02-01 17:16:10'),(295,295,1,'2','1','11',0,0,1,'24','C','2025-01-30 16:13:30','2025-02-01 17:16:10'),(296,296,1,'2','1','10',0,0,1,'24','C','2025-01-30 16:15:09','2025-02-01 17:16:10'),(297,297,1,'2','1','10',0,0,1,'24','C','2025-01-30 16:32:34','2025-02-01 17:16:10'),(298,298,1,'2','1','10',0,0,2,'24','C','2025-01-30 17:07:39','2025-02-01 17:16:10'),(299,299,1,'2','1','10',0,0,1,'24','C','2025-01-30 17:26:45','2025-02-01 17:16:10'),(300,300,1,'2','1','10',0,0,1,'24','C','2025-01-30 17:30:00','2025-02-01 17:16:10'),(301,301,1,'2','1','10',0,0,2,'24','C','2025-01-30 18:02:51','2025-02-01 17:16:10'),(302,302,1,'2','1','10',0,0,1,'24','C','2025-01-30 18:28:56','2025-02-01 17:16:10'),(303,303,1,'2','1','10',0,0,1,'25','C','2025-02-01 13:17:15','2025-02-02 20:00:31'),(304,304,1,'2','1','10',0,0,1,'25','C','2025-02-01 13:17:47','2025-02-02 20:00:31'),(305,305,1,'2','1','10',0,0,1,'25','C','2025-02-01 16:47:53','2025-02-02 20:00:31'),(306,306,1,'2','1','10',0,0,1,'25','C','2025-02-01 16:53:00','2025-02-02 20:00:31'),(307,307,1,'2','1','10',0,0,1,'25','C','2025-02-01 16:59:20','2025-02-02 20:00:31'),(308,308,1,'2','1','10',0,0,1,'25','C','2025-02-01 16:59:58','2025-02-02 20:00:31'),(309,309,1,'2','1','10',0,0,1,'25','C','2025-02-01 17:03:51','2025-02-02 20:00:31'),(310,310,1,'2','1','11',0,0,1,'25','C','2025-02-01 18:57:40','2025-02-02 20:00:31'),(311,311,1,'2','1','10',0,0,1,'25','C','2025-02-01 19:07:36','2025-02-02 20:00:31'),(312,312,1,'2','1','10',0,0,1,'25','C','2025-02-01 19:12:44','2025-02-02 20:00:31'),(313,313,1,'2','1','10',0,0,1,'25','C','2025-02-01 19:16:37','2025-02-02 20:00:31'),(314,314,1,'2','1','10',0,0,1,'25','C','2025-02-01 19:17:59','2025-02-02 20:00:31'),(315,315,1,'2','1','10',0,0,1,'25','C','2025-02-01 19:19:26','2025-02-02 20:00:31'),(316,316,1,'2','1','10',0,0,1,'25','C','2025-02-01 19:22:12','2025-02-02 20:00:31'),(317,317,1,'2','1','10',0,0,1,'25','C','2025-02-01 19:41:28','2025-02-02 20:00:31'),(318,318,1,'2','1','10',0,0,1,'25','C','2025-02-01 19:52:40','2025-02-02 20:00:31'),(319,319,1,'2','1','10',0,0,1,'25','C','2025-02-01 19:54:13','2025-02-02 20:00:31'),(320,320,1,'2','1','10',0,0,2,'25','C','2025-02-01 19:55:42','2025-02-02 20:00:31'),(321,321,1,'2','1','10',0,0,1,'25','C','2025-02-01 20:03:10','2025-02-02 20:00:31'),(322,322,1,'2','1','10',0,0,2,'25','C','2025-02-01 20:04:56','2025-02-02 20:00:31'),(323,323,1,'2','1','10',0,0,1,'25','C','2025-02-01 20:16:09','2025-02-02 20:00:31'),(324,324,1,'2','1','10',0,0,1,'25','C','2025-02-01 20:16:41','2025-02-02 20:00:31'),(325,325,1,'2','1','10',0,0,1,'25','C','2025-02-01 20:20:53','2025-02-02 20:00:31'),(326,326,1,'2','1','10',0,0,1,'25','C','2025-02-01 20:23:09','2025-02-02 20:00:31'),(327,327,1,'2','1','10',0,0,1,'25','C','2025-02-01 20:30:45','2025-02-02 20:00:31'),(328,328,1,'2','1','10',0,0,1,'25','C','2025-02-01 21:29:04','2025-02-02 20:00:31'),(329,329,1,'2','1','10',0,0,2,'25','C','2025-02-01 21:46:32','2025-02-02 20:00:31'),(330,330,1,'2','1','10',0,0,1,'25','C','2025-02-01 22:26:59','2025-02-02 20:00:31'),(331,331,1,'2','1','10',0,0,1,'25','C','2025-02-01 22:31:21','2025-02-02 20:00:31'),(332,332,1,'2','1','10',0,0,1,'25','C','2025-02-01 22:43:54','2025-02-02 20:00:31'),(333,333,1,'2','1','10',0,0,2,'25','C','2025-02-01 22:53:07','2025-02-02 20:00:31'),(334,334,1,'2','1','9',0,0,0,'25','C','2025-02-01 23:12:54','2025-02-02 20:00:31'),(335,335,1,'2','1','10',0,0,1,'26','C','2025-02-02 16:01:22','2025-02-07 20:28:27'),(336,336,1,'2','1','10',0,0,1,'26','C','2025-02-02 16:25:04','2025-02-07 20:28:27'),(337,337,1,'2','1','9',0,0,0,'26','C','2025-02-07 16:27:43','2025-02-07 20:28:27'),(338,338,1,'2','1','10',0,0,1,'27','C','2025-02-07 16:30:14','2025-02-08 21:22:57'),(339,339,1,'2','1','10',0,0,1,'27','C','2025-02-07 16:41:45','2025-02-08 21:22:57'),(340,340,1,'2','1','10',0,0,1,'27','C','2025-02-07 16:48:50','2025-02-08 21:22:57'),(341,341,1,'2','1','10',0,0,1,'27','C','2025-02-07 16:50:25','2025-02-08 21:22:57'),(342,342,1,'2','1','10',0,0,1,'27','C','2025-02-07 16:55:57','2025-02-08 21:22:57'),(343,343,1,'2','1','10',0,0,1,'27','C','2025-02-07 17:10:24','2025-02-08 21:22:57'),(344,344,1,'2','1','10',0,0,1,'27','C','2025-02-07 17:11:42','2025-02-08 21:22:57'),(345,345,1,'2','1','10',0,0,1,'27','C','2025-02-07 17:57:55','2025-02-08 21:22:57'),(346,346,1,'2','1','10',0,0,1,'27','C','2025-02-07 18:37:57','2025-02-08 21:22:57'),(347,347,1,'2','1','10',0,0,1,'27','C','2025-02-07 19:55:29','2025-02-08 21:22:57'),(348,348,1,'2','1','10',0,0,1,'27','C','2025-02-07 20:05:45','2025-02-08 21:22:57'),(349,349,1,'2','1','10',0,0,1,'27','C','2025-02-07 20:08:55','2025-02-08 21:22:57'),(350,350,1,'2','1','10',0,0,1,'27','C','2025-02-07 20:14:36','2025-02-08 21:22:57'),(351,351,1,'2','1','10',0,0,1,'27','C','2025-02-07 21:22:36','2025-02-08 21:22:57'),(352,352,1,'2','1','10',0,0,1,'27','C','2025-02-07 21:28:37','2025-02-08 21:22:57'),(353,353,1,'2','1','10',0,0,1,'27','C','2025-02-07 21:29:19','2025-02-08 21:22:57'),(354,354,1,'2','1','10',0,0,1,'27','C','2025-02-07 21:39:37','2025-02-08 21:22:57'),(355,355,1,'2','1','10',0,0,1,'27','C','2025-02-07 22:00:36','2025-02-08 21:22:57'),(356,356,1,'2','1','10',0,0,1,'27','C','2025-02-07 22:11:41','2025-02-08 21:22:57'),(357,357,1,'2','1','9',0,0,0,'27','C','2025-02-07 22:12:20','2025-02-08 21:22:57'),(358,358,1,'2','1','10',0,0,2,'28','C','2025-02-08 17:23:57','2025-02-09 04:35:23'),(359,359,1,'2','1','10',0,0,1,'28','C','2025-02-08 17:25:17','2025-02-09 04:35:23'),(360,360,1,'2','1','9',10000,0,3,'33','C','2025-02-08 17:48:14','2025-10-14 21:35:50'),(361,361,1,'2','1','10',0,0,1,'28','C','2025-02-08 17:48:54','2025-02-09 04:35:23'),(362,362,1,'2','1','10',0,0,2,'28','C','2025-02-08 18:58:05','2025-02-09 04:35:23'),(363,363,1,'2','1','10',0,0,1,'28','C','2025-02-08 19:02:39','2025-02-09 04:35:23'),(364,364,1,'2','1','10',0,0,1,'28','C','2025-02-08 19:05:15','2025-02-09 04:35:23'),(365,365,1,'2','1','10',0,0,1,'28','C','2025-02-08 20:18:29','2025-02-09 04:35:23'),(366,366,1,'2','1','10',0,0,1,'28','C','2025-02-08 20:29:01','2025-02-09 04:35:23'),(367,367,1,'2','1','10',0,0,1,'28','C','2025-02-08 20:52:31','2025-02-09 04:35:23'),(368,368,1,'2','1','10',0,0,1,'28','C','2025-02-08 21:04:11','2025-02-09 04:35:23'),(369,369,1,'2','1','10',0,0,1,'28','C','2025-02-08 21:05:58','2025-02-09 04:35:23'),(370,370,1,'2','1','10',0,0,1,'28','C','2025-02-08 21:11:16','2025-02-09 04:35:23'),(371,371,1,'2','1','10',0,0,1,'28','C','2025-02-08 21:14:51','2025-02-09 04:35:23'),(372,372,1,'2','1','10',0,0,1,'28','C','2025-02-08 21:29:10','2025-02-09 04:35:23'),(373,373,1,'2','1','10',0,0,1,'28','C','2025-02-08 21:35:10','2025-02-09 04:35:23'),(374,374,1,'2','1','10',0,0,1,'28','C','2025-02-08 21:52:33','2025-02-09 04:35:23'),(375,375,1,'2','1','11',0,0,1,'28','C','2025-02-08 21:53:33','2025-02-09 04:35:23'),(376,376,1,'2','1','10',0,0,1,'28','C','2025-02-08 21:56:31','2025-02-09 04:35:23'),(377,377,1,'2','1','10',0,0,1,'28','C','2025-02-08 21:57:13','2025-02-09 04:35:23'),(378,378,1,'2','1','10',0,0,1,'28','C','2025-02-08 21:59:13','2025-02-09 04:35:23'),(379,379,1,'2','1','10',0,0,1,'28','C','2025-02-08 22:21:32','2025-02-09 04:35:23'),(380,380,1,'2','1','10',0,0,1,'28','C','2025-02-08 22:22:58','2025-02-09 04:35:23'),(381,381,1,'2','1','10',0,0,1,'28','C','2025-02-08 22:24:56','2025-02-09 04:35:23'),(382,382,1,'2','1','10',0,0,2,'28','C','2025-02-08 22:33:11','2025-02-09 04:35:23'),(383,383,1,'2','1','10',0,0,1,'28','C','2025-02-08 22:39:40','2025-02-09 04:35:23'),(384,384,1,'2','1','10',0,0,1,'28','C','2025-02-08 22:44:07','2025-02-09 04:35:23'),(385,385,1,'2','1','11',0,0,1,'28','C','2025-02-08 22:59:41','2025-02-09 04:35:23'),(386,386,1,'2','1','9',0,0,0,'28','C','2025-02-09 00:14:05','2025-02-09 04:35:23'),(387,387,1,'2','1','10',0,0,1,'29','C','2025-02-09 13:54:59','2025-02-10 23:17:29'),(388,388,1,'2','1','10',0,0,2,'29','C','2025-02-09 14:00:42','2025-02-10 23:17:29'),(389,389,1,'2','1','10',0,0,1,'29','C','2025-02-09 14:31:26','2025-02-10 23:17:29'),(390,390,1,'2','1','10',0,0,1,'29','C','2025-02-09 17:07:33','2025-02-10 23:17:29'),(391,391,1,'2','1','10',0,0,1,'29','C','2025-02-09 17:08:43','2025-02-10 23:17:29'),(392,392,1,'2','1','10',0,0,2,'29','C','2025-02-09 17:09:54','2025-02-10 23:17:29'),(393,393,1,'2','1','10',0,0,1,'29','C','2025-02-09 17:29:41','2025-02-10 23:17:29'),(394,394,1,'2','1','10',0,0,1,'29','C','2025-02-09 17:33:44','2025-02-10 23:17:29'),(395,395,1,'2','1','10',0,0,1,'29','C','2025-02-09 17:34:34','2025-02-10 23:17:29'),(396,396,1,'2','1','10',0,0,1,'29','C','2025-02-09 17:36:40','2025-02-10 23:17:29'),(397,397,1,'2','1','10',0,0,1,'29','C','2025-02-09 17:47:25','2025-02-10 23:17:29'),(398,398,1,'2','1','10',0,0,2,'29','C','2025-02-09 17:51:05','2025-02-10 23:17:29'),(399,399,1,'2','1','10',0,0,1,'29','C','2025-02-09 17:53:42','2025-02-10 23:17:29'),(400,400,1,'2','1','10',0,0,1,'29','C','2025-02-09 17:54:41','2025-02-10 23:17:29'),(401,401,1,'2','1','10',0,0,1,'29','C','2025-02-09 17:59:32','2025-02-10 23:17:29'),(402,402,1,'2','1','10',0,0,1,'29','C','2025-02-09 18:20:48','2025-02-10 23:17:29'),(403,403,1,'2','1','10',0,0,1,'29','C','2025-02-09 19:33:42','2025-02-10 23:17:29'),(404,404,1,'2','1','10',0,0,1,'29','C','2025-02-09 19:36:30','2025-02-10 23:17:29'),(405,405,1,'2','1','10',0,0,1,'29','C','2025-02-09 19:55:22','2025-02-10 23:17:29'),(406,406,1,'2','1','10',0,0,1,'29','C','2025-02-09 19:57:52','2025-02-10 23:17:29'),(407,407,1,'2','1','10',0,0,1,'29','C','2025-02-09 20:10:30','2025-02-10 23:17:29'),(408,408,1,'2','1','10',0,0,1,'30','C','2025-02-10 19:17:42','2025-10-14 02:49:30'),(409,409,1,'2','1','10',0,0,1,'30','C','2025-08-16 22:49:18','2025-10-14 02:49:30'),(410,410,1,'2','1','9',0,0,0,'30','C','2025-08-17 00:48:34','2025-10-14 02:49:30'),(411,411,1,'2','1','10',0,0,1,'30','C','2025-08-17 00:50:44','2025-10-14 02:49:30'),(412,412,1,'2','1','10',0,0,1,'30','C','2025-08-18 21:16:43','2025-10-14 02:49:30'),(413,413,1,'2','1','10',0,0,1,'30','C','2025-08-18 22:19:21','2025-10-14 02:49:30'),(414,414,1,'2','1','10',0,0,1,'30','C','2025-08-18 22:25:56','2025-10-14 02:49:30'),(415,415,1,'2','1','11',0,0,1,'30','C','2025-08-18 22:29:39','2025-10-14 02:49:30'),(416,1,4,'3','4','1',0,0,0,'31','A','2025-08-20 21:53:28','0000-00-00 00:00:00'),(417,416,1,'2','1','9',0,0,0,'30','C','2025-08-23 14:04:58','2025-10-14 02:49:30'),(418,417,1,'4','1','10',0,0,2,'33','C','2025-10-14 16:24:31','2025-10-14 16:25:10'),(419,418,1,'2','7','9',0,0,0,'33','C','2025-10-14 19:41:46','0000-00-00 00:00:00'),(420,419,1,'2','7','10',0,0,1,'33','C','2025-10-14 19:42:17','2025-10-14 19:45:51'),(421,420,1,'2','7','10',0,0,3,'33','C','2025-10-14 19:46:31','2025-10-14 21:25:26'),(422,421,1,'2','7','9',0,0,0,'33','C','2025-10-14 21:32:00','2025-10-14 21:32:38'),(423,422,1,'2','7','9',3000,0,0,'33','C','2025-10-14 21:32:38','0000-00-00 00:00:00'),(424,423,1,'2','1','9',0,30,0,'33','C','2025-10-14 21:40:54','0000-00-00 00:00:00'),(425,424,1,'2','1','9',0,0,0,'33','C','2025-10-14 22:48:00','0000-00-00 00:00:00'),(426,425,1,'2','1','9',0,0,0,'33','C','2025-10-14 22:48:27','2025-10-15 00:09:46'),(427,426,1,'2','1','10',0,0,1,'33','C','2025-10-15 00:09:47','2025-10-15 00:19:14'),(428,427,1,'2','1','10',0,0,1,'33','C','2025-10-15 13:40:55','2025-10-15 13:45:53'),(429,428,1,'2','1','9',0,0,0,'33','C','2025-10-15 13:46:18','0000-00-00 00:00:00'),(430,429,1,'2','1','9',0,0,0,'33','C','2025-10-15 14:05:40','0000-00-00 00:00:00'),(431,430,1,'2','1','9',0,0,0,'33','A','2025-10-22 16:52:55','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `correlativo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta_corriente`
--

DROP TABLE IF EXISTS `cuenta_corriente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuenta_corriente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `rut` varchar(45) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `estado` varchar(4) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta_corriente`
--

LOCK TABLES `cuenta_corriente` WRITE;
/*!40000 ALTER TABLE `cuenta_corriente` DISABLE KEYS */;
INSERT INTO `cuenta_corriente` VALUES (1,1,'18752880-1',1,'N','2024-12-04'),(2,1,'18752880-1',8,'N','2024-12-07'),(3,1,'4531159-7',11,'N','2024-12-14'),(4,1,'18752880-1',12,'N','2024-12-14'),(5,1,'4531159-7',275,'N','2025-01-26'),(6,1,'7367889-7',284,'N','2025-01-27'),(7,1,'4531159-7',360,'N','2025-02-08'),(8,1,'4494605-k',422,'A','2025-10-14');
/*!40000 ALTER TABLE `cuenta_corriente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diferencia_pago`
--

DROP TABLE IF EXISTS `diferencia_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `diferencia_pago` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_cl` int(5) DEFAULT NULL,
  `cambio_plan` varchar(5) DEFAULT NULL,
  `cambio_periodo` varchar(5) DEFAULT NULL,
  `estado` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diferencia_pago`
--

LOCK TABLES `diferencia_pago` WRITE;
/*!40000 ALTER TABLE `diferencia_pago` DISABLE KEYS */;
INSERT INTO `diferencia_pago` VALUES (1,14,'S','S','S');
/*!40000 ALTER TABLE `diferencia_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giros`
--

DROP TABLE IF EXISTS `giros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `tributa` int(11) DEFAULT NULL,
  `net` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
-- Table structure for table `historial_planes`
--

DROP TABLE IF EXISTS `historial_planes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historial_planes` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_cl` int(5) DEFAULT NULL,
  `id_plan` int(5) DEFAULT NULL,
  `estado` varchar(5) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_planes`
--

LOCK TABLES `historial_planes` WRITE;
/*!40000 ALTER TABLE `historial_planes` DISABLE KEYS */;
/*!40000 ALTER TABLE `historial_planes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `margen_ganancia`
--

DROP TABLE IF EXISTS `margen_ganancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `margen_ganancia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `margen_ganancia`
--

LOCK TABLES `margen_ganancia` WRITE;
/*!40000 ALTER TABLE `margen_ganancia` DISABLE KEYS */;
INSERT INTO `margen_ganancia` VALUES (1,1,1);
/*!40000 ALTER TABLE `margen_ganancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metodo_pago`
--

DROP TABLE IF EXISTS `metodo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `metodo_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `nombre_metodo_pago` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metodo_pago`
--

LOCK TABLES `metodo_pago` WRITE;
/*!40000 ALTER TABLE `metodo_pago` DISABLE KEYS */;
INSERT INTO `metodo_pago` VALUES (1,1,'EFECTIVO','S'),(2,1,'TRANSFERENCIA','S'),(3,1,'DÉBITO','S'),(4,1,'CRÉDITO','S');
/*!40000 ALTER TABLE `metodo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monto_caja`
--

DROP TABLE IF EXISTS `monto_caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `monto_caja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `id_cierre` int(11) NOT NULL,
  `motivo` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monto_caja`
--

LOCK TABLES `monto_caja` WRITE;
/*!40000 ALTER TABLE `monto_caja` DISABLE KEYS */;
INSERT INTO `monto_caja` VALUES (1,1,2,1,1,20000),(2,1,2,2,1,15000),(3,1,2,3,1,15000),(4,1,2,4,1,15000),(5,1,2,5,1,15000),(6,1,2,5,3,10000),(7,1,2,5,3,-10000),(8,1,2,6,1,15000),(9,1,2,7,1,15000),(10,1,2,8,1,20000),(11,1,2,9,1,15000),(12,1,2,10,1,15000),(13,1,2,11,1,20000),(14,1,2,12,1,15000),(15,1,2,13,1,15000),(16,1,2,14,1,20000),(17,1,2,15,1,15000),(18,1,2,16,1,15000),(19,1,2,17,1,15000),(20,1,2,18,1,20000),(21,1,2,19,1,10000),(22,1,2,20,1,20000),(23,1,2,21,1,15000),(24,1,2,21,4,28000),(25,1,2,21,4,11000),(26,1,2,22,1,5000),(27,1,2,24,1,20000),(28,1,2,25,1,20000),(29,1,2,26,1,15000),(30,1,2,27,1,15000),(31,1,2,28,1,20000),(32,1,2,29,1,15000),(33,1,2,30,1,15000),(34,1,2,30,2,1200),(35,1,2,30,2,1750),(36,1,2,30,2,2000),(37,1,2,30,2,1500),(38,1,2,30,2,3250),(39,1,2,30,2,4150),(40,1,2,30,2,4150),(41,1,2,30,2,4150),(42,4,3,31,1,20000),(43,4,3,31,3,-1000),(44,4,3,31,3,1000),(45,4,3,31,3,1000),(46,4,3,31,3,250000),(47,4,3,31,3,-250000),(48,4,3,31,3,-21000),(49,4,3,31,3,21000),(50,4,3,31,3,-1000),(51,1,4,33,1,20000),(52,1,2,33,1,20000),(53,1,2,33,2,3250),(54,1,2,33,3,10000),(55,1,2,33,3,-20000),(56,1,2,33,3,5000),(57,1,2,33,2,1000),(58,1,2,33,2,7500);
/*!40000 ALTER TABLE `monto_caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motivo_mov_monto_caja`
--

DROP TABLE IF EXISTS `motivo_mov_monto_caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `motivo_mov_monto_caja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motivo_mov_monto_caja`
--

LOCK TABLES `motivo_mov_monto_caja` WRITE;
/*!40000 ALTER TABLE `motivo_mov_monto_caja` DISABLE KEYS */;
INSERT INTO `motivo_mov_monto_caja` VALUES (1,'MONTO INICIAL'),(2,'PAGO EN EFECTIVO'),(3,'RETIRO O INGRESO DE DINERO'),(4,'INGRESO DE DINERO');
/*!40000 ALTER TABLE `motivo_mov_monto_caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_cliente`
--

DROP TABLE IF EXISTS `pago_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pago_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) DEFAULT NULL,
  `plan` int(11) NOT NULL,
  `metodo_pago` int(11) NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `periodo_actual` varchar(45) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `comprobante` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_cliente`
--

LOCK TABLES `pago_cliente` WRITE;
/*!40000 ALTER TABLE `pago_cliente` DISABLE KEYS */;
INSERT INTO `pago_cliente` VALUES (1,1,1,5,'2025-08-20','2025-09-02','N','S','S'),(2,1,1,5,'2025-08-20','2025-09-02','N','S','S'),(3,9,0,5,'2025-08-20','2025-09-02','N','N','N'),(4,9,1,5,'2025-08-20','2025-09-02','N','S','N'),(5,9,1,5,'2025-08-20','2025-09-02','N','S','N'),(6,9,1,5,'2025-08-20','2025-08-19','S','S','N'),(7,4,1,5,'2025-08-21','2025-08-20','N','S','N'),(8,4,0,5,'2025-08-21','2026-08-20','S','N','N'),(9,11,1,5,'2025-08-21','2025-08-20','S','S','N'),(10,13,1,5,'2025-08-21','2025-08-20','N','S','S'),(11,13,1,5,'2025-08-21','2025-08-20','S','S','S'),(12,12,1,5,'2025-08-21','2025-08-20','N','S','N'),(13,12,1,5,'2025-08-21','2025-08-20','S','S','N'),(14,14,1,0,'2025-08-21','2025-09-04','N','N','N'),(15,14,1,5,'2025-08-21','2025-09-04','N','S','S'),(16,14,1,1,'2025-09-05','2025-09-04','N','S','S'),(17,14,2,1,'2025-09-05','2025-12-04','N','S','S'),(18,14,3,1,'2025-12-05','2026-03-04','S','S','S'),(19,1,2,1,'2025-09-03','2026-09-02','S','S','S');
/*!40000 ALTER TABLE `pago_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pass_provisoria`
--

DROP TABLE IF EXISTS `pass_provisoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pass_provisoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pass_provisoria`
--

LOCK TABLES `pass_provisoria` WRITE;
/*!40000 ALTER TABLE `pass_provisoria` DISABLE KEYS */;
INSERT INTO `pass_provisoria` VALUES (3,2,'5287a564576896561509235','2025-08-20 19:24:21'),(4,4,'828403972916a7587e8266a','2025-08-20 21:46:54'),(5,9,'a706c32886809475346187e','2025-08-21 14:57:08'),(6,14,'ab654986a09687616327ae7','2025-08-21 15:42:49');
/*!40000 ALTER TABLE `pass_provisoria` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,1,'Pedido sin nombre',1,'N','A','A',1,'2024-10-16'),(2,1,'Pedido sin nombre',1,'N','A','A',1,'2024-10-16'),(3,1,'Pedido de helados n1',1,'N','A','S',1,'2024-10-16'),(4,1,'Pedido sin nombre',1,'N','A','A',1,'2024-10-16'),(5,1,'Pedido de helados',1,'N','C','S',1,'2024-10-16'),(6,1,'Pedido Kiosco',4,'N','A','S',1,'2024-12-04'),(7,1,'Pedido Kiosco 1',4,'C','C','N',1,'2024-12-04'),(8,1,'Pedido Savory Diciembre',7,'C','C','S',1,'2024-12-07'),(9,1,'Pedido Fruna',8,'N','A','S',1,'2024-12-14'),(10,1,'Pedido sin nombre',1,'N','A','A',1,'2024-12-14'),(11,1,'Pedido Fruna',8,'C','C','N',1,'2024-12-14'),(12,1,'Pedido Jumbo 21-12-2024',9,'C','C','A',1,'2024-12-21'),(13,1,'Pedido Alvi 2',4,'C','C','N',1,'2024-12-28'),(14,1,'Pedido sin nombre',1,'N','A','A',1,'2024-12-28'),(15,1,'Pedido Binder',10,'C','C','A',1,'2024-12-31'),(16,1,'Pedido Super portales',1,'N','A','A',1,'2025-01-04'),(17,1,'Pedido sin nombre',1,'N','A','A',1,'2025-01-04'),(18,1,'Pedido 2 Super Portales',1,'C','C','S',1,'2025-01-04'),(19,1,'Pedido Unimarc',4,'C','C','S',1,'2025-01-04'),(20,1,'Carbón',1,'C','C','A',1,'2025-01-11'),(21,1,'Pedido sin nombre',1,'N','A','A',1,'2025-01-11'),(22,1,'Pedido el trebol Plata mamá',5,'C','C','A',1,'2025-01-11'),(23,1,'Pedido sin nombre',1,'N','A','A',1,'2025-01-11'),(24,1,'Pedido El Trebol 2',5,'N','A','A',1,'2025-01-11'),(25,1,'Pedido Coca cola Pagado con plata mamá',1,'N','A','S',1,'2025-01-17'),(26,1,'Pedido Coca cola Pagado con plata mamá 428',12,'C','C','N',1,'2025-01-17'),(27,1,'Pedido Alvi pagado con plata del camping',4,'N','A','A',1,'2025-01-18'),(28,1,'Pedido binder pagado con plata camping',10,'C','C','S',1,'2025-01-18'),(29,1,'Alvi 3 camping',4,'C','C','N',1,'2025-01-22'),(30,1,'Pedido sin nombre',1,'N','A','A',1,'2025-01-28'),(31,1,'Pedido Coca cola Pagado con plata camping',12,'C','C','A',1,'2025-01-28'),(32,1,'Alvi 4',4,'N','A','A',1,'2025-02-01'),(33,1,'Alvi 4',4,'N','A','A',1,'2025-02-01'),(34,1,'Alvi 4 pagado con plata camping',4,'C','C','N',1,'2025-02-01'),(35,1,'Pedido Binder pagado con plata camping 2',1,'C','C','N',1,'2025-02-07'),(36,1,'Pedido marzo 2025',1,'N','C','S',1,'2025-08-28'),(37,1,'Pedido sin nombre',1,'N','A','A',1,'2025-08-28'),(38,1,'Pedido sin nombre',1,'N','A','A',1,'2025-08-28'),(39,1,'Pedido sin nombre',1,'N','A','A',1,'2025-08-28'),(40,1,'Pedido sin nombre',1,'N','C','S',1,'2025-08-28'),(41,1,'Pedido sin nombre',1,'A','A','A',1,'2025-08-28'),(42,1,'Pedido sin nombre',1,'A','A','A',1,'2025-08-28'),(43,1,'Pedido sin nombre',1,'A','A','A',1,'2025-08-28'),(44,1,'Pedido sin nombre',5,'N','A','N',1,'2025-08-28'),(45,1,'Pedido CD Plaza Música ',5,'A','A','S',1,'2025-08-28');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos_detalle`
--

DROP TABLE IF EXISTS `pedidos_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `producto` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `fecha_reg` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos_detalle`
--

LOCK TABLES `pedidos_detalle` WRITE;
/*!40000 ALTER TABLE `pedidos_detalle` DISABLE KEYS */;
INSERT INTO `pedidos_detalle` VALUES (12,1,7,'Cheetos',1,10580,'N','2024-12-04'),(13,1,7,'Galleta mini mckay',1,2700,'S','2024-12-04'),(14,1,7,'Galleta mini',1,2700,'S','2024-12-04'),(15,1,7,'Galleta Mini',1,2700,'S','2024-12-04'),(16,1,7,'Ramitas Evercrisp',1,9780,'S','2024-12-04'),(17,1,7,'Galletas mini Mckay',1,2700,'S','2024-12-04'),(18,1,7,'Papas fritas',1,11180,'S','2024-12-04'),(19,1,7,'Super 8',1,11900,'S','2024-12-04'),(20,1,7,'Doblón ',1,6280,'S','2024-12-04'),(21,1,7,'Bom Bom Bum',1,3180,'S','2024-12-04'),(22,1,7,'Sprite lata',1,8160,'S','2024-12-04'),(23,1,7,'Coca Cola',1,8160,'S','2024-12-04'),(24,1,7,'Chicle Grosso',1,1520,'S','2024-12-04'),(25,1,7,'Chicle Grosso',1,1520,'S','2024-12-04'),(26,1,7,'Kryzpo',1,3420,'S','2024-12-04'),(27,1,7,'Agua Mineral',1,8880,'S','2024-12-04'),(28,1,7,'Galleta Bañada',1,11380,'S','2024-12-04'),(29,1,7,'Kryzpo 2',1,3420,'S','2024-12-04'),(30,0,0,'',0,0,'','0000-00-00'),(31,1,8,'Crazy Chirimoya',1,11040,'S','2024-12-07'),(32,1,8,'Crazy Flocos',1,11040,'S','2024-12-07'),(33,1,8,'Crazy Frambuesa',1,11040,'S','2024-12-07'),(34,1,8,'Xplori',1,9528,'S','2024-12-07'),(35,1,8,'Centella',1,10296,'S','2024-12-07'),(36,1,8,'Egocéntrico',1,11780,'S','2024-12-07'),(37,1,8,'Crocanty',1,11780,'S','2024-12-07'),(38,1,8,'Chocolito',1,11780,'S','2024-12-07'),(39,1,8,'Lolly Pop',1,9940,'S','2024-12-07'),(40,1,9,'Cachantún Más',1,9900,'S','2024-12-14'),(41,1,9,'Bachata',1,6120,'S','2024-12-14'),(42,1,9,'Mentitas',1,3840,'S','2024-12-14'),(43,1,9,'Bon o Bon',1,20580,'S','2024-12-14'),(44,1,9,'Inkat',1,10800,'S','2024-12-14'),(45,1,9,'Mekano',1,15600,'S','2024-12-14'),(46,1,9,'Loly Choc',1,5120,'S','2024-12-14'),(47,1,9,'Golpe ',1,11400,'S','2024-12-14'),(48,1,10,'',0,0,'S','2024-12-14'),(49,1,9,'',0,0,'N','2024-12-14'),(50,1,11,'Cachantun',1,9900,'S','2024-12-14'),(51,1,11,'Bachata',1,6120,'S','2024-12-14'),(52,1,11,'Mentitas',1,3840,'S','2024-12-14'),(53,1,11,'Bon o bon',1,20580,'S','2024-12-14'),(54,1,11,'Inkat',1,10800,'S','2024-12-14'),(55,1,11,'Mekano',1,15600,'S','2024-12-14'),(56,1,11,'Loly choc',1,5120,'S','2024-12-14'),(57,1,11,'Golpe',1,11400,'S','2024-12-14'),(58,1,12,'Pepsi lata',1,5590,'S','2024-12-21'),(59,1,12,'Sprite lata',1,5890,'S','2024-12-21'),(60,1,12,'Coca lata',1,5890,'S','2024-12-21'),(61,1,12,'Ginger ale',1,4300,'S','2024-12-21'),(62,1,12,'Seven Up',1,5590,'S','2024-12-21'),(63,1,12,'',0,0,'N','2024-12-21'),(64,1,13,'Agua vital',1,3900,'S','2024-12-28'),(65,1,13,'Sahnenuss',1,9380,'S','2024-12-28'),(66,1,13,'Chocolate',1,13380,'S','2024-12-28'),(67,1,13,'Cereal bar fruta',1,3220,'S','2024-12-28'),(68,1,13,'Cereal bar Chocolate',1,3130,'S','2024-12-28'),(69,1,13,'Cereal Bar Miel',1,3220,'S','2024-12-28'),(70,1,13,'Coca cola zero',1,5600,'S','2024-12-28'),(71,1,13,'Papas Fritas Stax',1,11340,'S','2024-12-28'),(72,1,14,'',0,0,'S','2024-12-28'),(73,1,13,'Chocolate Trencito',1,8600,'S','2024-12-28'),(74,1,13,'Ramitas queso',1,10580,'S','2024-12-28'),(75,1,13,'Ramitas original',1,5690,'S','2024-12-28'),(76,1,13,'Galleta Toddy',1,10800,'S','2024-12-28'),(77,1,13,'Galleta Tuareg',1,5200,'S','2024-12-28'),(78,1,13,'Galleta Din Don',1,2750,'S','2024-12-28'),(79,1,13,'Galleta Mini Palmerita',1,1890,'S','2024-12-28'),(80,1,13,'Galleta Mantequilla',1,5440,'S','2024-12-28'),(81,1,13,'Lays Stax',1,6720,'S','2024-12-28'),(82,1,15,'KeGol',2,2710,'S','2024-12-31'),(83,1,15,'Alfajor Bon o Bon',2,13436,'S','2024-12-31'),(84,1,15,'Galleta Bon o Bon',2,6544,'S','2024-12-31'),(85,1,15,'Galleta Coco Costa',10,625,'S','2024-12-31'),(86,1,16,'',0,0,'S','2025-01-04'),(87,1,17,'',0,0,'S','2025-01-04'),(88,1,18,'Cachantún Citrus',1,2606,'S','2025-01-04'),(89,1,18,'Coca cola Oreo',1,4622,'S','2025-01-04'),(90,1,18,'Fanta lata 350',1,4622,'S','2025-01-04'),(91,1,18,'Sprite Ice 350',1,6471,'S','2025-01-04'),(92,1,19,'Mini Mega Sahnenuss',1,8655,'S','2025-01-04'),(93,1,19,'Mini Crocanty',1,11346,'S','2025-01-04'),(94,1,19,'Mini Trululú',1,4025,'S','2025-01-04'),(95,1,19,'Centella',1,3697,'S','2025-01-04'),(96,1,19,'Carbon',1,20806,'S','2025-01-04'),(97,1,19,'',0,0,'S','2025-01-04'),(98,1,20,'Carbon',1,20000,'S','2025-01-11'),(99,1,21,'',0,0,'S','2025-01-11'),(100,1,22,'Frac',2,2517,'S','2025-01-11'),(101,1,23,'',0,0,'S','2025-01-11'),(102,1,24,'Galleta dindon',1,2933,'S','2025-01-11'),(103,1,24,'Galleta Frac',2,2517,'S','2025-01-11'),(104,1,24,'Alfi',1,1341,'S','2025-01-11'),(105,1,22,'Din don',1,2933,'S','2025-01-11'),(106,1,22,'Alfi',1,6689,'S','2025-01-11'),(107,1,22,'',0,0,'N','2025-01-11'),(108,1,25,'Vital Sin Gas',1,6837,'S','2025-01-17'),(109,1,25,'Vital Con Gass',1,6837,'S','2025-01-17'),(110,1,25,'Coca cola en lata',1,7588,'S','2025-01-17'),(111,1,25,'Coca Cola Zero',1,7980,'S','2025-01-17'),(112,1,25,'Sprite',1,3390,'S','2025-01-17'),(113,1,26,'Vital Sin Gas',1,8564,'S','2025-01-17'),(114,1,26,'Vital Con Gas',1,8564,'S','2025-01-17'),(115,1,26,'Coca cola lata',1,9458,'S','2025-01-17'),(116,1,26,'Coca Cola Sin azucar',1,9924,'S','2025-01-17'),(117,1,26,'Sprite',1,5176,'S','2025-01-17'),(118,1,27,'',0,0,'S','2025-01-18'),(119,1,28,'Galleta Bon o BON',10,1002,'S','2025-01-18'),(120,1,28,'Galleta Bon o Bon Blanca',10,1002,'S','2025-01-18'),(121,1,28,'Donuts',10,960,'S','2025-01-18'),(122,1,28,'Koyak',2,1528,'S','2025-01-18'),(123,1,28,'Dulces Arbolito',2,3113,'S','2025-01-18'),(124,1,28,'Golazo',2,3830,'S','2025-01-18'),(125,1,28,'Galleta Niza',10,727,'S','2025-01-18'),(126,1,28,'Galleta Mantequilla',10,727,'S','2025-01-18'),(127,1,28,'Jugo Refreskids',1,3385,'S','2025-01-18'),(128,1,28,'Jugo Refreskids Manzana',1,3385,'S','2025-01-18'),(129,1,29,'Chocman',1,5760,'S','2025-01-22'),(130,1,29,'Chocman Black',1,6080,'S','2025-01-22'),(131,1,29,'Marshmallow Maximo',1,8060,'S','2025-01-22'),(132,1,29,'Bon o Bon',1,12100,'S','2025-01-22'),(133,1,29,'Marshmallows',1,3540,'S','2025-01-22'),(134,1,29,'Alfi alfajores',1,4380,'S','2025-01-22'),(135,1,29,'Gomitas Ambrosito',1,3770,'S','2025-01-22'),(136,1,29,'Gomitas Flipy',1,3770,'S','2025-01-22'),(137,1,29,'Kryzpo',1,6720,'S','2025-01-22'),(138,1,29,'Kryzpo',1,6720,'S','2025-01-22'),(139,1,29,'Galleta',1,7380,'S','2025-01-22'),(140,1,30,'',0,0,'S','2025-01-28'),(141,1,31,'Coca cola lata',1,9167,'S','2025-01-28'),(142,1,31,'Sprite lata',1,9167,'S','2025-01-28'),(143,1,31,'Fanta lata',1,9167,'S','2025-01-28'),(144,1,31,'Coca cola 1lt',1,9167,'S','2025-01-28'),(145,1,32,'',0,0,'S','2025-02-01'),(146,1,33,'',0,0,'S','2025-02-01'),(147,1,34,'Galletón Quaker',1,3700,'S','2025-02-01'),(148,1,34,'Galleton Quaker',1,3700,'S','2025-02-01'),(149,1,34,'De Todito Queso',1,11420,'S','2025-02-01'),(150,1,34,'Cheetos',1,10580,'S','2025-02-01'),(151,1,34,'Papas Fritas',1,9980,'S','2025-02-01'),(152,1,34,'Doritos Queso',1,5650,'S','2025-02-01'),(153,1,35,'Golazo',1,7660,'S','2025-02-07'),(154,1,35,'Galleta niza',1,7270,'S','2025-02-07'),(155,1,35,'Bonobon',1,5087,'S','2025-02-07'),(156,1,35,'Bonobon',1,5087,'S','2025-02-07'),(157,1,35,'Galleta Bon o bon',1,10020,'S','2025-02-07'),(158,1,35,'cocaditas',1,5645,'S','2025-02-07'),(159,1,36,'Bon o bon Blanco galleta',5,10000,'S','2025-08-28'),(160,1,37,'',0,0,'S','2025-08-28'),(161,1,38,'',0,0,'S','2025-08-28'),(162,1,39,'',0,0,'S','2025-08-28'),(163,1,40,'',0,0,'S','2025-08-28'),(164,1,40,'',0,0,'S','2025-08-28'),(165,1,41,'',0,0,'S','2025-08-28'),(166,1,42,'',0,0,'S','2025-08-28'),(167,1,42,'',0,0,'N','2025-08-28'),(168,1,43,'',0,0,'S','2025-08-28'),(169,1,44,'',0,0,'N','2025-08-28'),(170,1,45,'',0,0,'N','2025-08-28'),(171,1,45,'',0,0,'N','2025-08-28'),(172,1,45,'',0,0,'N','2025-08-28'),(173,1,45,'',0,0,'N','2025-08-28'),(174,1,45,'',0,0,'N','2025-08-28'),(175,1,45,'',0,0,'N','2025-08-28'),(176,1,44,'CD Los Bunkers',20,1200,'S','2025-08-28'),(177,1,44,'',0,0,'S','2025-08-28');
/*!40000 ALTER TABLE `pedidos_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planes`
--

DROP TABLE IF EXISTS `planes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `planes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(5) NOT NULL,
  `tipo_plan` varchar(5) NOT NULL,
  `duracion` varchar(5) NOT NULL,
  `usuarios` int(11) NOT NULL,
  `cajas` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planes`
--

LOCK TABLES `planes` WRITE;
/*!40000 ALTER TABLE `planes` DISABLE KEYS */;
INSERT INTO `planes` VALUES (1,'Plan de prueba','S','1','',10,10,0),(2,'Plan 1 usuario + 1 caja','S','2','',2,2,9990),(3,'Plan 2 usuarios + 2 cajas','S','2','',2,2,15990),(4,'Plan 2 usuarios + 2 cajas','S','2','',2,2,15990),(5,'','N','1','',3,3,20000);
/*!40000 ALTER TABLE `planes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plazos_pago`
--

DROP TABLE IF EXISTS `plazos_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plazos_pago` (
  `meses` int(3) NOT NULL,
  `nombre_plazo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`meses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plazos_pago`
--

LOCK TABLES `plazos_pago` WRITE;
/*!40000 ALTER TABLE `plazos_pago` DISABLE KEYS */;
INSERT INTO `plazos_pago` VALUES (0,'14 DIAS'),(1,'PAGO MENSUAL'),(3,'PAGO TRIMESTRAL'),(6,'PAGO SEMESTRAL'),(12,'PAGO ANUAL');
/*!40000 ALTER TABLE `plazos_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `codigo_barra` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `nombre_prod` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `proveedor` varchar(45) NOT NULL,
  `categoria` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `pesaje` varchar(5) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `unidad_medida` int(11) DEFAULT NULL,
  `valor_neto` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `margen_ganancia` int(11) NOT NULL,
  `monto_ganancia` int(11) NOT NULL,
  `valor_venta` varchar(7) CHARACTER SET latin2 COLLATE latin2_general_ci NOT NULL,
  `descuento` int(11) NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `fecha_reg` date NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'1','077779875849','Los Prisioneros - La Cultura de La Basura','3','1',10,'N',1,'8500',18,1500,'10000',0,'N','1','2024-10-16'),(2,'1','639842928823','Luis Miguel','3','1',10,'N',1,'8500',18,1500,'10000',0,'N','1','2024-10-16'),(3,'1','7802000017544','Cheetos','4','3',14,'N',1,'529',89,471,'1000',0,'S','1','2024-12-04'),(4,'1','7801610005194','Sprite Lata 350cc','4','5',4,'N',1,'680',121,820,'1500',0,'S','1','2024-12-04'),(5,'1','7613030612339','Super8 Normal','4','3',20,'N',1,'247',62,153,'400',0,'S','1','2024-12-04'),(6,'1','7801610001196','Coca Cola lata 350cc','4','5',11,'N',1,'680',121,820,'1500',0,'S','1','2024-12-04'),(7,'1','7802800535583','Kryzpo Crema Cebolla','4','3',6,'N',1,'570',75,430,'1000',0,'S','1','2024-12-04'),(8,'1','7802000002526','Papas Fritas Lays ','4','3',20,'N',1,'559',79,441,'1000',0,'S','1','2024-12-04'),(9,'1','7802000013737','Ramitas Evercrisp','4','3',20,'N',1,'489',64,311,'800',0,'S','1','2024-12-04'),(10,'1','koyak','Koyak','1','3',48,'N',1,'66',52,34,'100',0,'S','1','2024-12-04'),(11,'1','7613031649815','McKay Mini Vino','1','3',10,'N',1,'270',85,230,'500',0,'S','1','2024-12-04'),(12,'1','7613031651474','McKay Mini Coco','4','3',10,'N',1,'270',85,230,'500',0,'S','1','2024-12-04'),(13,'1','7613031650729','McKay Mini Limón','4','3',9,'N',1,'270',85,230,'500',0,'S','1','2024-12-04'),(14,'1','7613031651412','McKay Mini Mantequilla','4','3',9,'N',1,'270',85,230,'500',0,'S','1','2024-12-04'),(15,'1','7806500241416','Servilleta Nova','4','6',6,'N',1,'440',82,360,'800',0,'S','1','2024-12-04'),(16,'1','7613287755810','Chokita','4','3',20,'N',1,'285',75,215,'500',0,'S','1','2024-12-04'),(17,'1','7802215303036','Doblón','4','3',19,'N',1,'104',92,96,'200',0,'S','1','2024-12-04'),(18,'1','kayak simple 0.5 hora','Kayak Simple 1/2 hora','6','6',1000,'N',1,'1',399900,3999,'4000',0,'S','1','2024-12-04'),(19,'1','kayak simple 1 hora','Kayak Simple 1 hora','6','6',1000,'N',1,'1',599900,5999,'6000',0,'S','1','2024-12-04'),(20,'1','kayak doble 0.5 hora','Kayak doble 1/2 hora','6','6',1000,'N',1,'1',599900,5999,'6000',0,'S','1','2024-12-04'),(21,'1','kayak doble 1 hora','Kayak doble 1 hora','6','6',1000,'N',1,'1',799900,7999,'8000',0,'S','1','2024-12-04'),(22,'1','chicle','Chicle grosso','4','4',200,'N',1,'89',69,61,'150',0,'S','1','2024-12-04'),(23,'1','7802820600100',' Vital c Gas 600ml','4','5',14,'N',1,'370',170,630,'1000',0,'S','1','2024-12-04'),(24,'1','8445291145832','Centella','7','8',100,'N',1,'300',0,0,'300',0,'S','1','2024-12-07'),(25,'1','78006027','Lolly Pop','7','8',1000,'N',1,'750',0,0,'750',0,'S','1','2024-12-07'),(26,'1','7613032186852','Chocolito','7','8',1000,'N',1,'850',6,50,'900',0,'S','1','2024-12-07'),(27,'1','8445290971371','Xplori Helado','7','8',100,'N',1,'900',0,0,'900',0,'S','1','2024-12-07'),(28,'1','78006140','Crocanty','7','8',98,'N',1,'850',6,50,'900',0,'S','1','2024-12-07'),(29,'1','78006164','Egocéntrico','7','8',100,'N',1,'890',1,10,'900',0,'S','1','2024-12-07'),(30,'1','crazy','Crazy','7','8',99,'N',1,'1390',8,110,'1500',0,'S','1','2024-12-07'),(31,'1','carbon','Carbón','6','9',100,'N',1,'2500',140,3500,'6000',0,'S','1','2024-12-07'),(32,'1','7802200132696','Mentitas Ambrosoli','1','3',24,'N',1,'145',107,155,'300',0,'S','1','2024-12-14'),(33,'1','7802225588508','Golpe','7','3',30,'N',1,'190',58,110,'300',0,'S','1','2024-12-14'),(34,'1','confort','Confort /unidad','1','6',10,'N',1,'500',100,500,'1000',0,'S','1','2024-12-21'),(35,'1','7801620007508','Ginger Ale 1.75Lts','9','5',2,'N',1,'2150',44,950,'3100',0,'S','1','2024-12-21'),(36,'1','7801620000240','6 Pack 7 Up','9','5',1,'N',1,'5590',50,2790,'8380',0,'S','1','2024-12-21'),(37,'1','7801620852702','Seven Up Lata 350cc','1','5',6,'N',1,'932',61,568,'1500',0,'S','1','2024-12-21'),(38,'1','7801620006938','Six Pack Pepsi Zero','9','5',1,'N',1,'5590',50,2810,'8400',0,'S','1','2024-12-21'),(39,'1','7801620006846','Pepsi Zero Lata 350cc','9','5',6,'N',1,'932',61,568,'1500',0,'S','1','2024-12-21'),(40,'1','7802215502514','Din don ','9','2',5,'N',1,'500',100,500,'1000',0,'S','1','2024-12-22'),(41,'1','7500478008780','Toddy','9','2',10,'N',1,'1500',0,0,'1500',0,'S','1','2024-12-25'),(42,'1','7802950072358','Sahne-nuss impulsivo','8','3',20,'N',1,'100',400,400,'500',0,'S','1','2024-12-25'),(43,'1','7802230975324','Prestigio Impulsivo','9','3',20,'N',1,'200',150,300,'500',0,'S','1','2024-12-25'),(44,'1','7802215502262','Golpe','4','2',10,'N',1,'600',67,400,'1000',0,'S','1','2024-12-25'),(45,'1','7506195148686','Shampoo Head&Shoulders','8','6',3,'N',1,'1300',54,700,'2000',0,'S','1','2024-12-25'),(46,'1','7802000013607','Lays Stax 134 gr','1','3',6,'N',1,'1000',100,1000,'2000',0,'S','1','2024-12-25'),(47,'1','lolichoc','Loly Choc','1','3',10,'N',1,'100',50,50,'150',0,'S','1','2024-12-25'),(48,'1','bachata','Bachata','1','2',10,'N',1,'500',60,300,'800',0,'S','1','2024-12-25'),(49,'1','7801610000601','Coca Cola Zero 591ml','9','5',10,'N',1,'1000',50,500,'1500',0,'S','1','2024-12-28'),(50,'1','7801610350409','Coca Cola Zero 1.5lts','9','5',10,'N',1,'1000',100,1000,'2000',0,'S','1','2024-12-28'),(51,'1','7801610005262','Sprite 1.5 lts','9','5',10,'N',1,'1000',100,1000,'2000',0,'S','1','2024-12-28'),(52,'1','7801610002261','Fanta 1.5 lts','8','5',10,'N',1,'1000',100,1000,'2000',0,'S','1','2024-12-28'),(53,'1','78024106','Bon o bon blanco','1','3',20,'N',1,'200',0,0,'200',0,'S','1','2024-12-28'),(54,'1','78023994','Bon o Bon normal','1','3',20,'N',1,'200',0,0,'200',0,'S','1','2024-12-28'),(55,'1','hielo','Hielo','9','5',10,'N',1,'1000',100,1000,'2000',0,'S','1','2024-12-29'),(56,'1','7802220140602','In kat','8','3',10,'N',1,'300',33,100,'400',0,'S','1','2024-12-29'),(57,'1','7790040613706','Alfajor Bon o Bon','10','3',40,'N',1,'400',50,200,'600',0,'S','1','2024-12-31'),(58,'1','7790040613607','Alfajor Blanco Bon o Bon','10','3',40,'N',1,'400',50,200,'600',0,'S','1','2024-12-31'),(59,'1','7802225640770','Galletas Bon o Bon blanco','10','3',10,'N',1,'1192',26,308,'1500',0,'S','1','2024-12-31'),(60,'1','7802225640848','Galleta Bon o Bon Blanco','10','2',9,'N',1,'1192',26,308,'1500',0,'S','1','2024-12-31'),(61,'1','7802225625005','Scones Arcor','10','2',10,'N',1,'1698',18,302,'2000',0,'S','1','2024-12-31'),(62,'1','esponja','Esponja','9','2',10,'N',1,'1',49900,499,'500',0,'S','1','2025-01-01'),(63,'1','7801505231912','Azucar Iansa 1KG','9','6',10,'N',1,'1890',11,210,'2100',0,'S','1','2025-01-01'),(64,'1','78098152','Sal Lobos 125g','9','6',3,'N',1,'500',60,300,'800',0,'S','1','2025-01-01'),(65,'1','7791290794054','CIF lavalozas limón','1','6',30,'N',1,'1026',95,974,'2000',0,'S','1','2025-01-01'),(66,'1','7802810002105','Aceite Chef','9','6',3,'N',1,'1600',56,900,'2500',0,'S','1','2025-01-01'),(67,'1','kegol','KeGol','10','3',80,'N',1,'70',114,80,'150',0,'S','1','2025-01-01'),(68,'1','leña','leña','6','9',5000,'N',1,'5000',20,1000,'6000',0,'S','1','2025-01-03'),(69,'1','barra-cereal','barra cereal','1','3',10,'N',1,'800',0,0,'800',0,'S','1','2025-01-03'),(70,'1','7802575001030','Cabellos de Angel','4','6',3,'N',1,'1200',0,0,'1200',0,'S','1','2025-01-03'),(71,'1','8912510416375','Toallitas Húmedas','4','6',2,'N',1,'2000',0,0,'2000',0,'S','1','2025-01-03'),(72,'1','7806500506829','Paquete confort 4 unid','4','6',3,'N',1,'3194',41,1306,'4500',0,'S','1','2025-01-03'),(73,'1','7891024131909','Colgate mini','4','6',6,'N',1,'532',88,468,'1000',0,'S','1','2025-01-03'),(74,'1','7802810012531','Aceite Vegetal','4','6',3,'N',1,'1067',50,533,'1600',0,'S','1','2025-01-03'),(75,'1','7802950072679','Trencito','1','3',20,'N',1,'250',100,250,'500',0,'S','1','2025-01-03'),(76,'1','fosforos','Fosforos','4','6',20,'N',1,'190',216,410,'600',0,'S','1','2025-01-03'),(77,'1','7800120716644','Arroz Miraflores','1','6',10,'N',1,'941',59,559,'1500',0,'S','1','2025-01-03'),(78,'1','7702026177669','Paños diarios Nosotras','4','6',3,'N',1,'2150',49,1050,'3200',0,'S','1','2025-01-03'),(79,'1','7802337801014','Jugo de limón ','4','6',3,'N',1,'495',52,255,'750',0,'S','1','2025-01-03'),(80,'1','7806800004285','Esponja metálica','1','6',3,'N',1,'1386',80,1114,'2500',0,'S','1','2025-01-03'),(81,'1','7802000017865','Avena Quaker','4','6',3,'N',1,'1722',80,1378,'3100',0,'S','1','2025-01-03'),(82,'1','7802920000091','Leche Colun Semidescremada ','4','6',2,'N',1,'1100',82,900,'2000',0,'S','1','2025-01-03'),(83,'1','7805000301484','Mayonesa Hellmanns','4','6',3,'N',1,'546',83,454,'1000',0,'S','1','2025-01-03'),(84,'1','7802950002119','Nescafé','4','5',3,'N',1,'2400',46,1100,'3500',0,'S','1','2025-01-03'),(85,'1','7801875058065','Te Manzanilla Té Supremo','1','6',3,'N',1,'1597',75,1203,'2800',0,'S','1','2025-01-03'),(86,'1','7801875055101','Te surtido Te Supremo','4','6',1,'N',1,'1597',75,1203,'2800',0,'S','1','2025-01-03'),(87,'1','7801875001597','Te Chai Supremo','4','6',10,'N',1,'2000',40,800,'2800',0,'S','1','2025-01-03'),(88,'1','7801875061010','Te Supremo Surtido','1','6',3,'N',1,'1597',75,1203,'2800',0,'S','1','2025-01-03'),(89,'1','7802351314606','Mostaza Don Juan','4','6',3,'N',1,'900',89,800,'1700',0,'S','1','2025-01-03'),(90,'1','7802640720637','Ají JB','4','6',2,'N',1,'1690',60,1010,'2700',0,'S','1','2025-01-03'),(91,'1','7802640400270','Ají Chileno JB','4','6',10,'N',1,'1790',56,1010,'2800',0,'S','1','2025-01-03'),(92,'1','7801505000228','Azucar Iansa 400g','4','6',10,'N',1,'639',88,561,'1200',0,'S','1','2025-01-03'),(93,'1','8445290262646','Leche Nido Polvo','4','6',10,'N',1,'7200',39,2800,'10000',0,'S','1','2025-01-03'),(94,'1','7613032180096','Trululú','1','8',15,'N',1,'500',50,250,'750',0,'S','1','2025-01-04'),(95,'1','7802225630900','bocaditos arcor','1','2',3,'N',1,'1200',67,800,'2000',0,'S','1','2025-01-04'),(96,'1','7613035407176','Danky nogatonga','1','8',10,'N',1,'1990',1,10,'2000',0,'S','1','2025-01-04'),(97,'1','7613035407145','Danky 21','1','8',-1,'N',1,'2000',0,0,'2000',0,'S','1','2025-01-04'),(98,'1','7801620852580','Kem piña','1','5',10,'N',1,'1500',0,0,'1500',0,'S','1','2025-01-04'),(99,'1','hielo-grande','Hielo grande','1','8',10,'N',1,'3500',0,0,'3500',0,'S','1','2025-01-05'),(100,'1','21','21','1','3',10,'N',1,'10',30,3,'13',0,'N','1','2025-01-08'),(101,'1','7802000016448','De todito Evercrisp 120gr','11','3',10,'N',1,'1339',42,561,'1900',0,'S','1','2025-01-10'),(102,'1','7802200809178','Golazo','9','3',10,'N',1,'300',67,200,'500',0,'S','1','2025-01-10'),(103,'1','7802215508523','Donuts normal','1','3',10,'N',1,'1350',11,150,'1500',0,'S','1','2025-01-10'),(104,'1','7802215512377','Frac Bi Frutilla','1','2',10,'N',1,'500',60,300,'800',0,'S','1','2025-01-11'),(105,'1','7801610002193','Fanta 350cc','9','5',10,'N',1,'900',67,600,'1500',0,'S','1','2025-01-11'),(106,'1','dulces','Dulces 3x100','10','3',100,'N',1,'14',614,86,'100',0,'S','1','2025-01-11'),(107,'1','7802225682930','Selz','1','2',10,'N',1,'400',25,100,'500',0,'S','1','2025-01-11'),(108,'1','1dulce','1 Dulce','1','3',50,'N',1,'50',0,0,'50',0,'S','1','2025-01-11'),(109,'1','7803473004673','Alfajor Alfi','1','3',40,'N',1,'167',80,133,'300',0,'S','1','2025-01-11'),(110,'1','7802215230424','Refreskids Piña','10','5',10,'N',1,'250',100,250,'500',0,'S','1','2025-01-13'),(111,'1','7802215230479','Refreskids Manzana','10','5',10,'N',1,'250',100,250,'500',0,'S','1','2025-01-13'),(112,'1','quitasol','Quitasol ','6','9',1000,'N',1,'2000',0,0,'2000',0,'S','1','2025-01-13'),(113,'1','pañuelos','Pañuelos Elite','5','6',10,'N',1,'500',0,0,'500',0,'S','1','2025-01-18'),(114,'1','7802200135734','Gomitas Flipy','4','3',20,'N',1,'188',86,162,'350',0,'S','1','2025-01-18'),(115,'1','7802200135765','Ambrosito','4','3',20,'N',1,'188',86,162,'350',0,'S','1','2025-01-18'),(116,'1','7802215503535','Din don mini','5','2',10,'N',1,'250',100,250,'500',0,'S','1','2025-01-18'),(117,'1','8445290193193','Leche Nido Buen Dia','4','6',3,'N',1,'1250',44,550,'1800',0,'S','1','2025-01-18'),(118,'1','7802229001232','Marshmallows','4','3',3,'N',1,'1990',26,510,'2500',0,'S','1','2025-01-18'),(119,'1','7802215512414','Frac Naranja','1','2',10,'N',1,'800',0,0,'800',0,'S','1','2025-01-18'),(120,'1','78023215','Bon o Bon Chocolate','4','3',20,'N',1,'200',0,0,'200',0,'S','1','2025-01-19'),(121,'1','7801610350355','Coca Zero lata','12','5',10,'N',1,'1500',0,0,'1500',0,'S','1','2025-01-19'),(122,'1','7802215303401','Chocman normal','1','3',32,'N',1,'180',178,320,'500',0,'S','1','2025-01-22'),(123,'1','7802215303937','Chocman Black','1','3',33,'N',1,'190',163,310,'500',0,'S','1','2025-01-22'),(124,'1','7807910041221','Stevia Cuisine & Co','1','6',1,'N',1,'3000',0,0,'3000',0,'S','1','2025-01-22'),(125,'1','8445290855329','Sopa Maggi Pollo 12gr','4','6',10,'N',1,'450',100,450,'900',0,'S','1','2025-01-22'),(126,'1','7613033609992','Sopa Espárragos Maggi 12gr','4','6',10,'N',1,'450',100,450,'900',0,'S','1','2025-01-22'),(127,'1','7801620360153','Canada Dry Ginger Ale 350cc','1','5',10,'N',1,'1500',0,0,'1500',0,'S','1','2025-01-23'),(128,'1','7802225280655','Marshmallows Morf Mogul','1','3',2,'N',1,'800',88,700,'1500',0,'S','1','2025-01-24'),(129,'1','7613032590369','Galleta Niza Normal','4','2',8,'N',1,'1500',0,0,'1500',0,'S','1','2025-01-25'),(130,'1','7802820020953','Agua Vital c Gas','4','5',10,'N',1,'741',102,759,'1500',0,'S','1','2025-01-25'),(131,'1','7802800535569','Kryzpo 37g','4','3',12,'N',1,'1000',0,0,'1000',0,'S','1','2025-01-25'),(132,'1','7501086494262','Cepillo OralB','1','6',1,'N',1,'990',52,510,'1500',0,'S','1','2025-01-25'),(133,'1','7803480001405','Pan Fuchs','1','6',1,'N',1,'1990',51,1010,'3000',0,'S','1','2025-01-25'),(134,'1','7790990003657','Magistral lavaloza 300ml','4','6',1,'N',1,'2050',46,950,'3000',0,'S','1','2025-01-26'),(135,'1','7802230083951','Galleta McKay Mantequilla','4','2',7,'N',1,'650',131,850,'1500',0,'S','1','2025-01-26'),(136,'1','7802215505409','Galleta Coco Costa','1','2',10,'N',1,'1500',0,0,'1500',0,'S','1','2025-01-26'),(137,'1','1220369','Galletón Quaker','9','2',0,'N',1,'550',45,250,'800',0,'S','1','2025-01-27'),(138,'1','7802000015120','De Todito 50g','4','3',10,'N',1,'750',60,450,'1200',0,'S','1','2025-01-30'),(139,'1','7802820600209','Agua sin gas','4','5',10,'N',1,'390',156,610,'1000',0,'S','1','2025-01-30'),(140,'1','7802000017476','Doritos','4','3',10,'N',1,'1000',0,0,'1000',0,'S','1','2025-02-01'),(141,'1','7804945017405','Toallia Simond','1','6',1,'N',1,'1495',34,505,'2000',0,'S','1','2025-02-07'),(142,'1','7801420000617','Aceite de Oliva Banquete','4','6',1,'N',1,'2790',43,1210,'4000',0,'S','1','2025-02-08'),(143,'1','7613035421592','Danky Sahne-nuss','1','8',10,'N',1,'2000',0,0,'2000',0,'S','1','2025-02-08'),(144,'1','7801620370107','Agua Tonica','4','5',10,'N',1,'2200',36,800,'3000',0,'S','1','2025-02-08'),(145,'1','7802225280822','Marshmallow Mogul','1','3',10,'N',1,'1650',21,350,'2000',0,'S','1','2025-02-08'),(146,'1','7702367000558','Atún Van Camps','4','6',2,'N',1,'3290',37,1210,'4500',0,'S','1','2025-02-09'),(147,'1','agua-hervida','Agua Hervida','6','6',100000,'N',1,'1000',0,0,'1000',0,'S','1','2025-02-09'),(148,'1','7801610002858','Fanta lata','12','5',10,'N',1,'1500',0,0,'1500',0,'S','1','2025-02-09'),(149,'1','7613031299119','Chocolito Mini','2','8',1,'N',1,'4090',47,1910,'6000',0,'S','1','2025-02-09'),(150,'1','8445291307513','Trululu','1','8',10,'N',1,'4050',48,1950,'6000',0,'S','1','2025-02-09'),(151,'1','7802420151019','Papas Marco Polo 18g','4','3',10,'N',1,'211',137,289,'500',0,'S','1','2025-02-10');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promociones`
--

LOCK TABLES `promociones` WRITE;
/*!40000 ALTER TABLE `promociones` DISABLE KEYS */;
INSERT INTO `promociones` VALUES (1,1,'Cheetos 2x1500',3,2,1500,'S',1,'2025-01-20'),(2,1,'',0,0,0,'S',1,'2025-01-20'),(3,1,'Sprite 2x2000',4,2,2500,'S',1,'2025-01-23'),(4,1,'Canada Dry',0,0,0,'S',1,'2025-01-23'),(5,1,'Canada Dry 2x2500',127,2,2500,'S',1,'2025-01-23'),(6,1,'Coca cola 350cc',6,2,2500,'S',1,'2025-01-27');
/*!40000 ALTER TABLE `promociones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) DEFAULT NULL,
  `nombre_proveedor` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rut` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,1,'Helados Savory S.A.','19150634-0','N','2024-10-16'),(2,1,'Helados Savory S.A.','19150634-0','N','2024-10-16'),(3,1,'EMI Music','7367889-7','N','2024-10-16'),(4,1,'Alvi S.A.','96608540-1','S','2024-12-05'),(5,1,'Supermercados El Trébol','77349320-0','S','2024-12-05'),(6,1,'CAMPING o SIN PROVEEDOR','19150634-0','S','2024-12-05'),(7,1,'Savory','90703000-8','S','2024-12-07'),(8,1,'Fruna','84156500-2','S','2024-12-14'),(9,1,'Jumbo','81201000-k','S','2024-12-21'),(10,1,'Comercial Binder','77644820-6','S','2025-01-01'),(11,1,'Supermercado Portales','76574601-9','S','2025-01-04'),(12,1,'Coca Cola Embonor','93281000-k','S','2025-01-17'),(13,1,'TURISMO, AGRÍCOLA Y ALIMENTACIÓN CONSTANZA WE','77990068-1','S','2025-08-28');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_errores`
--

DROP TABLE IF EXISTS `registro_errores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro_errores` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_cl` int(5) NOT NULL,
  `tipo_error` int(100) NOT NULL,
  `mensaje` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_errores`
--

LOCK TABLES `registro_errores` WRITE;
/*!40000 ALTER TABLE `registro_errores` DISABLE KEYS */;
INSERT INTO `registro_errores` VALUES (1,1,2,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1'),(2,1,2,'QUERY SQL: SELECT year(fecha) as ano FROM correlativo WHERE id_cl = 1 GROUP BY year(fecha<br>\r\n        UBICACIÓN DEL SCRIPT PHP: sys/users/admin/graficos/php/read_ano_venta.php<br>\r\n        MENSAJE:<br>You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1'),(3,1,2,'QUERY SQL: SELECT year(fecha) as ano FROM correlativo WHERE id_cl = 1 GROUP BY year(fecha<br>\r\n        UBICACIÓN DEL SCRIPT PHP: sys/users/admin/graficos/php/read_ano_venta.php<br>\r\n        MENSAJE:<br>You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1'),(4,2,2,'QUERY SQL: SELECT year(fecha) as ano FROM correlativo WHERE id_cl = 2 GROUP BY year(fecha<br>\r\n        UBICACIÓN DEL SCRIPT PHP: sys/users/admin/graficos/php/read_ano_venta.php<br>\r\n        MENSAJE:<br>You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1');
/*!40000 ALTER TABLE `registro_errores` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `solicitud_usuario` VALUES (1,1,1,1,'X','X','2025-08-05 14:02:17'),(2,1,1,1,'X','X','2025-08-06 14:08:21'),(3,1,1,1,'X','S','2025-08-06 14:31:47'),(4,1,1,1,'X','N','2025-08-06 14:36:33'),(5,1,1,1,'X','S','2025-08-06 14:42:43'),(6,1,1,1,'X','S','2025-08-06 14:43:19'),(7,1,1,1,'X','N','2025-08-06 14:43:46'),(8,1,1,1,'X','N','2025-08-06 14:47:19'),(9,1,2,1,'X','N','2025-08-06 14:50:40'),(10,1,2,1,'X','N','2025-08-06 14:55:39'),(11,1,2,1,'X','N','2025-08-06 14:58:00'),(12,1,2,1,'X','N','2025-08-06 15:00:26'),(13,1,2,1,'X','N','2025-08-06 15:02:20'),(14,1,2,1,'A','S','2025-08-06 16:33:40');
/*!40000 ALTER TABLE `solicitud_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_minimo_producto`
--

DROP TABLE IF EXISTS `stock_minimo_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_minimo_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) DEFAULT NULL,
  `estado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_minimo_producto`
--

LOCK TABLES `stock_minimo_producto` WRITE;
/*!40000 ALTER TABLE `stock_minimo_producto` DISABLE KEYS */;
INSERT INTO `stock_minimo_producto` VALUES (1,1,'S',6),(2,2,'N',0),(3,3,'N',0),(4,4,'N',0),(5,4,'N',0),(6,4,'N',0),(7,4,'N',0),(8,4,'N',0),(9,9,'N',0),(10,9,'N',0),(11,4,'N',0),(12,11,'N',0),(13,13,'N',0),(14,12,'N',0),(15,14,'N',0),(16,14,'N',0),(17,14,'N',0),(18,14,'N',0),(19,14,'N',0),(20,14,'N',0),(21,14,'N',0),(22,14,'N',0);
/*!40000 ALTER TABLE `stock_minimo_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sugerencias`
--

DROP TABLE IF EXISTS `sugerencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sugerencias` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_cl` int(5) NOT NULL,
  `fecha_sugerencia` datetime NOT NULL,
  `sugerencia` varchar(2000) NOT NULL,
  `estado` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sugerencias`
--

LOCK TABLES `sugerencias` WRITE;
/*!40000 ALTER TABLE `sugerencias` DISABLE KEYS */;
INSERT INTO `sugerencias` VALUES (1,1,'2025-09-15 19:38:29','oijoiu','N'),(2,1,'2025-09-15 19:38:40','oijoiu','N'),(3,1,'2025-09-15 19:39:52','123','C'),(4,1,'2025-09-15 19:40:14','123','C'),(5,1,'2025-09-15 19:41:43','123','C'),(6,1,'2025-09-15 19:44:14','qwe','C'),(7,1,'2025-09-15 20:06:29','ASD','C'),(8,1,'2025-09-16 19:38:34','ASD','C'),(9,1,'2025-09-16 19:39:22','0\\\'\\\'\\\'\\\'\\\'','C'),(10,1,'2025-09-16 19:40:14','===!\\\"#$%&/()=?','N'),(11,1,'2025-09-17 19:42:10','asw2','N'),(12,1,'2025-10-14 19:37:21','Sugerencia de prueba\\nRecordar que no se pueden enviar sugerencias con caracteres especiales ','A');
/*!40000 ALTER TABLE `sugerencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporada_pedidos`
--

DROP TABLE IF EXISTS `temporada_pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temporada_pedidos` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `nombre_temporada` varchar(250) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `creado_por` int(5) NOT NULL,
  `estado` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporada_pedidos`
--

LOCK TABLES `temporada_pedidos` WRITE;
/*!40000 ALTER TABLE `temporada_pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `temporada_pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_error`
--

DROP TABLE IF EXISTS `tipo_error`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_error` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre_error` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_error`
--

LOCK TABLES `tipo_error` WRITE;
/*!40000 ALTER TABLE `tipo_error` DISABLE KEYS */;
INSERT INTO `tipo_error` VALUES (1,'CONEXIÓN A LA BASE DE DATOS');
/*!40000 ALTER TABLE `tipo_error` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_pago_cliente`
--

DROP TABLE IF EXISTS `tipo_pago_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_pago_cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_pago_cliente`
--

LOCK TABLES `tipo_pago_cliente` WRITE;
/*!40000 ALTER TABLE `tipo_pago_cliente` DISABLE KEYS */;
INSERT INTO `tipo_pago_cliente` VALUES (1,'EFECTIVO'),(2,'DEBITO'),(3,'CREDITO'),(4,'TRANSFERENCIA'),(5,'GRATIS');
/*!40000 ALTER TABLE `tipo_pago_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_solicitud_usuario`
--

DROP TABLE IF EXISTS `tipo_solicitud_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_solicitud_usuario` (
  `id` int(5) NOT NULL,
  `nombre_solicitud` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_solicitud_usuario`
--

LOCK TABLES `tipo_solicitud_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_solicitud_usuario` DISABLE KEYS */;
INSERT INTO `tipo_solicitud_usuario` VALUES (1,'CAMBIO DE CONTRASEÑA');
/*!40000 ALTER TABLE `tipo_solicitud_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades_medida`
--

DROP TABLE IF EXISTS `unidades_medida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unidades_medida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_medida` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidades_medida`
--

LOCK TABLES `unidades_medida` WRITE;
/*!40000 ALTER TABLE `unidades_medida` DISABLE KEYS */;
INSERT INTO `unidades_medida` VALUES (1,'UNID'),(2,'KG'),(3,'CM'),(4,'MT');
/*!40000 ALTER TABLE `unidades_medida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N',
  `user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `permisos` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Admin','admin1','$2y$10$DNwaoVGXDO7Wu83ENwruGOWdSXm.dajQ5IVIFxOPyQpOg0LvhOOz6',1,1,'S','1,2','2024-10-16 14:39:43'),(2,'Claudio Werner','claudioventas1','$2y$10$6lM9DtVMUi01gxylUoiq0.Ii4fyQY9LoqnW9ElVCJSDcxzxfIhzOq',2,1,'N','2','2025-08-06 14:49:12'),(3,'Admin','admin2','5287a564576896561509235',1,2,'S','1,2','2025-08-20 19:24:21'),(4,'Admin','admin4','828403972916a7587e8266a',1,4,'S','1,2','2025-08-20 21:46:54'),(5,'Admin','admin9','a706c32886809475346187e',1,9,'S','1,2','2025-08-21 14:57:08'),(6,'Admin','admin14','ab654986a09687616327ae7',1,14,'S','1,2','2025-08-21 15:42:49'),(7,'Claudio Werner','claudioventas11','$2y$10$sBaPXR3YeyEbwTb5Ol7V8eFanUVKhsZpQr2sWbPb0rY1cTo1XTfvy',2,1,'S','2','2025-10-14 15:55:20'),(8,'Claudio Werner','constanza1','$2y$10$q3Cb883zclEx/s4Sn5Sldu9v0dBz61fOdgpFYaa7o59P6yasIcYhq',2,1,'N','2','2025-10-14 15:56:41'),(9,'Claudio Werner','cecilia1','$2y$10$scLVVwS.kcS0wrfIWJatpOn3gQLHPizjxr/3M26xwqo8zGcZgRrui',2,1,'N','2','2025-10-14 15:56:48'),(10,'Claudio Werner','martin1','$2y$10$czPF2La3S1pdrrooi91CSOOqbBSS6Gn3ek0lj.jRHR38XjvXIDtZu',2,1,'N','2','2025-10-14 15:56:58'),(11,'Claudio Werner','Celso1','$2y$10$gW4hOWbiIv0/bmzeAMHFeOZ.4cGZw4gwyF40xNSasYFYxVJBYqSZq',2,1,'N','2','2025-10-14 15:57:06'),(12,'Claudio Werner','macarena1','$2y$10$8fTTIF4prcKiBBM9WrMqWeDeMU/cam4VCDZNWWiHl3mTkfkDEWIhC',2,1,'N','2','2025-10-14 15:57:17'),(13,'tonka','tonka1','$2y$10$SK0H.P6OAvo4D7idJL.PJ./kqDe8rV2IHfCFVqssBAQbOBGhQo6nq',2,1,'N','2','2025-10-14 15:57:33'),(14,'Catalina','catalina1','$2y$10$Hih4gP1nOB0.dE0c4cfJVu8VccNGFulw9MKai73orXH6YHjP53zIG',2,1,'N','2','2025-10-14 15:57:45'),(15,'Fernanda','fernanda1','$2y$10$vus2ZKUTcUyxOtvTCoz2cez8.UC1aL1rdJSjG/lN8w4BmRAiGRIhW',2,1,'N','2','2025-10-14 15:57:58');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_caja` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usuario` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descto` int(11) NOT NULL,
  `valorDescto` int(11) NOT NULL,
  `estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `forma_pago` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='								';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
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

-- Dump completed on 2025-12-05 19:41:32
