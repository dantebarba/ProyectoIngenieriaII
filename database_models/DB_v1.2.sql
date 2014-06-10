
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: cookbooks_database_v1.2
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `autores`
--

DROP TABLE IF EXISTS `autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autores` (
  `idAutor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `isAsoc` tinyint(1) NOT NULL DEFAULT '0',
  `DNI` int(11) NOT NULL,
  PRIMARY KEY (`idAutor`,`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autores`
--

LOCK TABLES `autores` WRITE;
/*!40000 ALTER TABLE `autores` DISABLE KEYS */;
/*!40000 ALTER TABLE `autores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `precio` decimal(4,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `envio` varchar(64) NOT NULL,
  `estado` varchar(32) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras_has_libros`
--

DROP TABLE IF EXISTS `compras_has_libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras_has_libros` (
  `Compras_idCompra` int(11) NOT NULL,
  `Libros_ISBN` int(11) NOT NULL,
  PRIMARY KEY (`Compras_idCompra`,`Libros_ISBN`),
  KEY `fk_Compras_has_Libros_Libros1_idx` (`Libros_ISBN`),
  KEY `fk_Compras_has_Libros_Compras1_idx` (`Compras_idCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras_has_libros`
--

LOCK TABLES `compras_has_libros` WRITE;
/*!40000 ALTER TABLE `compras_has_libros` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras_has_libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL AUTO_INCREMENT,
  `calle` varchar(64) DEFAULT NULL,
  `localidad` varchar(64) DEFAULT NULL,
  `numero` int(10) unsigned DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `departamento` tinyint(1) DEFAULT NULL,
  `numDpto` varchar(8) DEFAULT NULL,
  `Usuarios_DNI` int(10) unsigned NOT NULL,
  `Usuarios_username` varchar(50) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idDireccion`),
  KEY `fk_Direcciones_Usuarios1_idx` (`Usuarios_DNI`,`Usuarios_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion`
--

LOCK TABLES `direccion` WRITE;
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editoriales`
--

DROP TABLE IF EXISTS `editoriales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editoriales` (
  `idEditorial` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `isAsoc` tinyint(1) NOT NULL DEFAULT '0',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idEditorial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editoriales`
--

LOCK TABLES `editoriales` WRITE;
/*!40000 ALTER TABLE `editoriales` DISABLE KEYS */;
/*!40000 ALTER TABLE `editoriales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiquetas`
--

DROP TABLE IF EXISTS `etiquetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etiquetas` (
  `idEtiquetas` int(11) NOT NULL AUTO_INCREMENT,
  `isAsoc` tinyint(1) NOT NULL DEFAULT '0',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `nombre` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idEtiquetas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiquetas`
--

LOCK TABLES `etiquetas` WRITE;
/*!40000 ALTER TABLE `etiquetas` DISABLE KEYS */;
/*!40000 ALTER TABLE `etiquetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiquetas_has_libros`
--

DROP TABLE IF EXISTS `etiquetas_has_libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etiquetas_has_libros` (
  `Etiquetas_idEtiquetas` varchar(16) NOT NULL,
  `Libros_ISBN` int(11) NOT NULL,
  PRIMARY KEY (`Etiquetas_idEtiquetas`,`Libros_ISBN`),
  KEY `fk_Etiquetas_has_Libros_Libros1_idx` (`Libros_ISBN`),
  KEY `fk_Etiquetas_has_Libros_Etiquetas1_idx` (`Etiquetas_idEtiquetas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiquetas_has_libros`
--

LOCK TABLES `etiquetas_has_libros` WRITE;
/*!40000 ALTER TABLE `etiquetas_has_libros` DISABLE KEYS */;
/*!40000 ALTER TABLE `etiquetas_has_libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros`
--

DROP TABLE IF EXISTS `libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libros` (
  `ISBN` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `paginas` int(11) DEFAULT NULL,
  `precio` decimal(4,2) DEFAULT NULL,
  `idioma` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `isAsoc` tinyint(1) NOT NULL DEFAULT '0',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros`
--

LOCK TABLES `libros` WRITE;
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros_has_autores`
--

DROP TABLE IF EXISTS `libros_has_autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libros_has_autores` (
  `Libros_ISBN` int(11) NOT NULL,
  `Autores_idAutor` int(11) NOT NULL,
  PRIMARY KEY (`Libros_ISBN`,`Autores_idAutor`),
  KEY `fk_Libros_has_Autores_Autores1_idx` (`Autores_idAutor`),
  KEY `fk_Libros_has_Autores_Libros1_idx` (`Libros_ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros_has_autores`
--

LOCK TABLES `libros_has_autores` WRITE;
/*!40000 ALTER TABLE `libros_has_autores` DISABLE KEYS */;
/*!40000 ALTER TABLE `libros_has_autores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros_has_editoriales`
--

DROP TABLE IF EXISTS `libros_has_editoriales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libros_has_editoriales` (
  `Libros_ISBN` int(11) NOT NULL,
  `Editoriales_idEditorial` int(11) NOT NULL,
  PRIMARY KEY (`Libros_ISBN`,`Editoriales_idEditorial`),
  KEY `fk_Libros_has_Editoriales_Editoriales1_idx` (`Editoriales_idEditorial`),
  KEY `fk_Libros_has_Editoriales_Libros1_idx` (`Libros_ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros_has_editoriales`
--

LOCK TABLES `libros_has_editoriales` WRITE;
/*!40000 ALTER TABLE `libros_has_editoriales` DISABLE KEYS */;
/*!40000 ALTER TABLE `libros_has_editoriales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarjetascredito`
--

DROP TABLE IF EXISTS `tarjetascredito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarjetascredito` (
  `numero` int(11) NOT NULL,
  `titular` varchar(45) DEFAULT NULL,
  `Compras_idCompra` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`numero`),
  KEY `fk_TarjetasCredito_Compras1_idx` (`Compras_idCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjetascredito`
--

LOCK TABLES `tarjetascredito` WRITE;
/*!40000 ALTER TABLE `tarjetascredito` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarjetascredito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `DNI` int(10) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `tel_fijo` int(11) DEFAULT NULL,
  `tel_cel` int(11) DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `fecha_nac` datetime DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `isAsoc` tinyint(1) NOT NULL DEFAULT '0',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`DNI`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_has_compras`
--

DROP TABLE IF EXISTS `usuarios_has_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_has_compras` (
  `Usuarios_DNI` int(10) unsigned NOT NULL,
  `Usuarios_username` varchar(50) NOT NULL,
  `Compras_idCompra` int(11) NOT NULL,
  PRIMARY KEY (`Usuarios_DNI`,`Usuarios_username`,`Compras_idCompra`),
  KEY `fk_Usuarios_has_Compras_Compras1_idx` (`Compras_idCompra`),
  KEY `fk_Usuarios_has_Compras_Usuarios1_idx` (`Usuarios_DNI`,`Usuarios_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_has_compras`
--

LOCK TABLES `usuarios_has_compras` WRITE;
/*!40000 ALTER TABLE `usuarios_has_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_has_compras` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-10  0:28:47
