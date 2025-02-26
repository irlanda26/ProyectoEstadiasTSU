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
-- Table structure for table `antecedentes_heredofa`
--

DROP TABLE IF EXISTS `antecedentes_heredofa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `antecedentes_heredofa` (
  `ID_antecedente` int NOT NULL AUTO_INCREMENT,
  `antecedente` varchar(45) DEFAULT NULL,
  `quienes` varchar(90) DEFAULT NULL,
  `ID_expediente` int DEFAULT NULL,
  PRIMARY KEY (`ID_antecedente`),
  UNIQUE KEY `ID_antecedente_UNIQUE` (`ID_antecedente`),
  KEY `ID_expediente_idx` (`ID_expediente`),
  CONSTRAINT `ID_expediente` FOREIGN KEY (`ID_expediente`) REFERENCES `expediente` (`ID_expediente`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `antecedentes_heredofa`
--

LOCK TABLES `antecedentes_heredofa` WRITE;
/*!40000 ALTER TABLE `antecedentes_heredofa` DISABLE KEYS */;
INSERT INTO `antecedentes_heredofa` VALUES (81,'Diabetes','familiar',159),(82,'Presión alta','familiar2',159),(83,'Asma','familiarX',159),(84,'Diabetes','ll',161);
/*!40000 ALTER TABLE `antecedentes_heredofa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-07 18:13:56
