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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idusuarios` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (9,'Irlanda','Ávila','$2y$10$CJffsdV2f3hHlEcVdi6C/eHpwVBMO8/dIRsQk45bmAKwnmMxWOhzK'),(10,'Grecia','Ávila','$2y$10$5PAO9F8bdKwg/ep7B8Lm5.rlzdKQeQkKLM3JSXdF9.OLWH5lsHxEC'),(11,'Yahir rrrrrr','Valdez Perú','$2y$10$AhB3HzoGs454TQbU8qQMKeufeY3RbHuh4WdBFEY7V3xvlPblb7092'),(13,'jason','ro','$2y$10$skZOpIc6OI7.NauW3J8vIuhomy7VDwbI4NU3ghL6Sz4EWUywh64VW'),(14,'jason','rodriguez','$2y$10$CWU4DUkRNBu85wNZBQxjRe7S4NB05Ha7QNvMPU/GW1GMmd4q2Y3.2');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
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
