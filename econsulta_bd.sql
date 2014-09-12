CREATE DATABASE  IF NOT EXISTS `econsulta` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `econsulta`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: econsulta
-- ------------------------------------------------------
-- Server version	5.6.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cita`
--

DROP TABLE IF EXISTS `cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `CITA (id_paciente) - > PACIENTE (id)_idx` (`id_paciente`),
  CONSTRAINT `CITA (id_paciente) - > PACIENTE (id)` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita`
--

LOCK TABLES `cita` WRITE;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` VALUES (7,5,'2014-09-24','15:03:00'),(16,5,'2014-10-01','01:44:00'),(17,28,'2014-09-23','01:00:00'),(18,5,'2014-09-09','10:01:00'),(20,34,'2014-09-10','00:00:00'),(21,28,'2014-09-10','01:00:00'),(22,35,'2014-09-11','01:00:00'),(23,36,'2014-09-12','01:03:00');
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `nota_medica` text COLLATE utf8_spanish_ci NOT NULL,
  `diagnostico` text COLLATE utf8_spanish_ci NOT NULL,
  `tratamiento` text COLLATE utf8_spanish_ci,
  `medicamento` text COLLATE utf8_spanish_ci,
  `observaciones` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`),
  KEY `id_paciente -> id_idx` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (5,39,'2014-09-19','11:34:35','asd','afasdfas','asdf','asdfasdf',NULL),(7,39,'2014-09-11','11:37:54','El paciente presenta dificultades para respirar al igual que una pequeÃ±a congestion nasal al llegar la tanda vespertina de los fines de semana','Fiebre amarilla','asd ','acetaminofen',NULL),(8,39,'2014-09-11','19:27:04','Esta es la cita mÃ©dicaa','diagnostico','tratamiento','medicamento','Este paciente estÃ¡ super enfermo x.x xD'),(9,39,'2014-09-11','13:32:23','Tu sabe','asd','as','ads','asd');
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diagnostico`
--

DROP TABLE IF EXISTS `diagnostico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diagnostico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diagnostico` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diagnostico`
--

LOCK TABLES `diagnostico` WRITE;
/*!40000 ALTER TABLE `diagnostico` DISABLE KEYS */;
INSERT INTO `diagnostico` VALUES (1,'asdasda sda '),(3,'`Segun las easd adsdlaskdjf a;lskdjfl askdjf;'),(4,'Lorem ipsum dolor sit amet, consectetur adipi'),(5,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
/*!40000 ALTER TABLE `diagnostico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diagnostico_detalle`
--

DROP TABLE IF EXISTS `diagnostico_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diagnostico_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `id_diagnostico` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diagnostico_detalle`
--

LOCK TABLES `diagnostico_detalle` WRITE;
/*!40000 ALTER TABLE `diagnostico_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `diagnostico_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_comercial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_generico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `contraindicaciones` text COLLATE utf8_spanish_ci,
  `presentacion` text COLLATE utf8_spanish_ci,
  `laboratorio` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamento`
--

LOCK TABLES `medicamento` WRITE;
/*!40000 ALTER TABLE `medicamento` DISABLE KEYS */;
INSERT INTO `medicamento` VALUES (3,'Suprofen','Gold Suprofen','Quita la tos','Aspirina','40 mil','Bayer'),(5,'asd','asd','Este medicamento se aplica cuando el paciente presenta deficiencias respiratorias','asd','asd','asd'),(8,'Albendazol (Oral)','Albendazol (Oral)','Its Work','Aspirina','10 mil','Bayer'),(9,'bbb','bbb','bb','bb','bb','bbb');
/*!40000 ALTER TABLE `medicamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(13) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` varchar(65) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_materno` varchar(65) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_civil` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(14) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_UNIQUE` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (5,'012-0119008-7','Manuel','Gonzales','De Los Santos','','1993-11-12','809-557-4536','Masculino','Av. Isabel Aguiar',NULL),(28,'012-0119808-7','Danny','Feliz','De Los Santos','','1993-08-10','829-705-8510','Masculino','Av. Isabel Aguiar',NULL),(29,'011-55698948-','Samuel','Rodriguez','','','1987-02-17','809-996-4548','Masculino','Av. Romulo',NULL),(30,'014-99655584-','Candy','GarcÃ­a','','','1994-07-13','809-996-4598','Femenino','Lejos',NULL),(34,'0120026546','Danger','Orzco','piÃ±a','Casado','2014-09-10','809557','Masculino','Av. CircunvalaciÃ³n Este #45','Este paciente presenta problemas de respiracion cuando '),(35,'123123','aasd','asd','asf','Casado','2014-09-07','234','Masculino','sdf','asa'),(36,'014-0056236-8','Octavio','Martinez','Orozco','Soltero','1987-06-18','809-665-5524','Masculino','Av. Independencia #24','Trabaja en una planta de Plomo');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prueba_laboratorio`
--

DROP TABLE IF EXISTS `prueba_laboratorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prueba_laboratorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prueba` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_tipo_prueba` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pruebaLaboratorio->tipoPrueba_idx` (`id_tipo_prueba`),
  CONSTRAINT `pruebaLaboratorio->tipoPrueba` FOREIGN KEY (`id_tipo_prueba`) REFERENCES `tipo_prueba` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prueba_laboratorio`
--

LOCK TABLES `prueba_laboratorio` WRITE;
/*!40000 ALTER TABLE `prueba_laboratorio` DISABLE KEYS */;
INSERT INTO `prueba_laboratorio` VALUES (19,'Cosaaa',12),(23,'tal',13),(24,'Coolllll',14);
/*!40000 ALTER TABLE `prueba_laboratorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pruebas_indicadas`
--

DROP TABLE IF EXISTS `pruebas_indicadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pruebas_indicadas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prueba` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pruebas_indicadas`
--

LOCK TABLES `pruebas_indicadas` WRITE;
/*!40000 ALTER TABLE `pruebas_indicadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `pruebas_indicadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultados_pruebas_indicadas`
--

DROP TABLE IF EXISTS `resultados_pruebas_indicadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultados_pruebas_indicadas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prueba` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `resultados` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultados_pruebas_indicadas`
--

LOCK TABLES `resultados_pruebas_indicadas` WRITE;
/*!40000 ALTER TABLE `resultados_pruebas_indicadas` DISABLE KEYS */;
INSERT INTO `resultados_pruebas_indicadas` VALUES (1,2,2,'asd','2014-08-15','12:12:12'),(2,12,30,'asdasd','2014-08-16','12:15:50'),(4,11,34,'asdasd','2014-09-12','01:00:00');
/*!40000 ALTER TABLE `resultados_pruebas_indicadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sintoma`
--

DROP TABLE IF EXISTS `sintoma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sintoma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sintoma` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sintoma`
--

LOCK TABLES `sintoma` WRITE;
/*!40000 ALTER TABLE `sintoma` DISABLE KEYS */;
INSERT INTO `sintoma` VALUES (6,'Cefalea','Dolor de cabeza intenso'),(7,'Bronquitis','Presenta Dificultad para poder respirar con normalidad');
/*!40000 ALTER TABLE `sintoma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sintoma_detalle`
--

DROP TABLE IF EXISTS `sintoma_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sintoma_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `id_sintoma` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sintoma_detalle`
--

LOCK TABLES `sintoma_detalle` WRITE;
/*!40000 ALTER TABLE `sintoma_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `sintoma_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_prueba`
--

DROP TABLE IF EXISTS `tipo_prueba`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_prueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_prueba` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_prueba`
--

LOCK TABLES `tipo_prueba` WRITE;
/*!40000 ALTER TABLE `tipo_prueba` DISABLE KEYS */;
INSERT INTO `tipo_prueba` VALUES (11,'Radiografia'),(12,'Sonografia'),(13,'Hidrografia'),(14,'Prueba rara'),(15,'Prueba nueva'),(16,'Estropacea');
/*!40000 ALTER TABLE `tipo_prueba` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tratamiento`
--

DROP TABLE IF EXISTS `tratamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tratamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tratamiento` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tratamiento`
--

LOCK TABLES `tratamiento` WRITE;
/*!40000 ALTER TABLE `tratamiento` DISABLE KEYS */;
INSERT INTO `tratamiento` VALUES (1,''),(3,'asdaaa'),(4,'tiene que tomarse tal y tal pastilla porque al final y al cabo del dÃ­a lo que se harÃ¡ serÃ¡ tal cosa\r\n');
/*!40000 ALTER TABLE `tratamiento` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-12 17:57:39
