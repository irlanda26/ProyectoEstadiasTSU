-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: consultorio
-- ------------------------------------------------------
-- Server version	8.4.0

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
-- Table structure for table `expediente`
--

DROP TABLE IF EXISTS `expediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expediente` (
  `ID_expediente` int NOT NULL AUTO_INCREMENT,
  `nombre_paciente` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `edad` int DEFAULT NULL,
  `lu_nacimiento` varchar(45) DEFAULT NULL,
  `lu_residencia` varchar(45) DEFAULT NULL,
  `no_hermano` int DEFAULT NULL,
  `motivo_consulta` varchar(255) DEFAULT NULL,
  `calle` varchar(200) DEFAULT NULL,
  `tel_casa` varchar(16) DEFAULT NULL,
  `celular` varchar(16) DEFAULT NULL,
  `celular_2` varchar(16) DEFAULT NULL,
  `nombre_m` varchar(45) DEFAULT NULL,
  `nombre_p` varchar(45) DEFAULT NULL,
  `ocupacion_m` varchar(45) DEFAULT NULL,
  `ocupacion_p` varchar(45) DEFAULT NULL,
  `no_calle` int DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `f_nacimiento` varchar(45) DEFAULT NULL,
  `vacunacion` varchar(45) DEFAULT NULL,
  `habitos` varchar(100) DEFAULT NULL,
  `n_lavado` int DEFAULT NULL,
  `quien` varchar(45) DEFAULT NULL,
  `escuela` varchar(45) DEFAULT NULL,
  `grado` varchar(45) DEFAULT NULL,
  `experiencias` varchar(45) DEFAULT NULL,
  `recomendacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_expediente`),
  UNIQUE KEY `idexpediente_UNIQUE` (`ID_expediente`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expediente`
--

LOCK TABLES `expediente` WRITE;
/*!40000 ALTER TABLE `expediente` DISABLE KEYS */;
INSERT INTO `expediente` VALUES (159,'Irlanda Ávila Cobos','2024-05-28',20,'nuevo casas grandes','nuevo casas grandes',2,'dolor de muelas','plan almena','','6361373287','6361031951','patty cobos','','docente','',2104,'obrera','2004-07-26','completo','no',0,'ella misma','utpaquime','6to cuatri','nop','familia'),(160,'Yahir Valdez Perú',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(161,'Danna Aguirre Cobos','2024-09-03',16,'','',2,'queso','plan almena','','6361373287','4','','','','',2104,'obrera','2024-09-03','completo','',0,'','','','','');
/*!40000 ALTER TABLE `expediente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-07 18:13:57
