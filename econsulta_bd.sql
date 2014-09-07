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
  `doctor` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `CITA (id_paciente) - > PACIENTE (id)_idx` (`id_paciente`),
  CONSTRAINT `CITA (id_paciente) - > PACIENTE (id)` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita`
--

LOCK TABLES `cita` WRITE;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` VALUES (7,5,'2014-09-24','15:03:00','Dr. Gonzales'),(8,5,'2014-09-03','01:04:00','Fulano'),(10,5,'2014-09-02','19:22:00','asda');
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hisitorial_clinico`
--

DROP TABLE IF EXISTS `hisitorial_clinico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hisitorial_clinico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `historial` varchar(85) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_paciente -> id_idx` (`id_paciente`),
  CONSTRAINT `id_paciente -> id` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hisitorial_clinico`
--

LOCK TABLES `hisitorial_clinico` WRITE;
/*!40000 ALTER TABLE `hisitorial_clinico` DISABLE KEYS */;
/*!40000 ALTER TABLE `hisitorial_clinico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_paciente`
--

DROP TABLE IF EXISTS `historial_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(52) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_paciente`
--

LOCK TABLES `historial_paciente` WRITE;
/*!40000 ALTER TABLE `historial_paciente` DISABLE KEYS */;
INSERT INTO `historial_paciente` VALUES (1,'Danna','asd','asd',0,'sdfsdf','fdfgd','0000-00-00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `historial_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` varchar(65) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_materno` varchar(65) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(14) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_UNIQUE` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (5,'012-0119008-7','Manuel','Gonzales','De Los Santos','1993-11-12','809-557-4536','Masculino','Av. Isabel Aguiar'),(7,'123','asd','sdf','sdf','0000-00-00','sdf','sdf','sdf'),(8,'12344','sda','asd','asd','0000-00-00','asdfasd','asd','asd'),(9,'334','asd','asd','asd','0000-00-00','asd','asd','asd'),(10,'12366','aasd','asdd','d','0000-00-00','dd','dfd','df'),(22,'012-0056558-4','David','Ortega','Moreno','1989-06-13','809-557-4536','Masculino','Av. Independencia');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-07  5:38:48
