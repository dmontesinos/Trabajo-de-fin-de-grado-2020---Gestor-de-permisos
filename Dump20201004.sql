-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gestor_de_permisos
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `ambitos`
--

DROP TABLE IF EXISTS `ambitos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ambitos` (
  `idAmbitos` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `tabla` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idAmbitos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ambitos`
--

LOCK TABLES `ambitos` WRITE;
/*!40000 ALTER TABLE `ambitos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ambitos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anio`
--

DROP TABLE IF EXISTS `anio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anio` (
  `idCurso` int NOT NULL AUTO_INCREMENT,
  `inicio` year DEFAULT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anio`
--

LOCK TABLES `anio` WRITE;
/*!40000 ALTER TABLE `anio` DISABLE KEYS */;
/*!40000 ALTER TABLE `anio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignaturas` (
  `idAsignaturas` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idAsignaturas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaturas`
--

LOCK TABLES `asignaturas` WRITE;
/*!40000 ALTER TABLE `asignaturas` DISABLE KEYS */;
INSERT INTO `asignaturas` VALUES (102740,'Sistemes Distribuïts'),(102741,'Gest.Adm.Bases de Dades'),(102742,'Tecnologies Desenv. Internet i Web'),(102743,'Enginyeria del Software'),(102744,'Bases de Dades'),(102745,'Legislació'),(102746,'Xarxes'),(102747,'Sistemes Operatius'),(102748,'Treball de Final de Grau'),(102749,'Tecnologies Avançades d\'Internet'),(102750,'Sistemes i Tecnologies Web'),(102751,'Infraest.Tecnologia i Xarxes'),(102752,'Sistemes d\'Informació'),(102753,'Visualització Gràfica Interactiva'),(102754,'Sistemes Multimèdia'),(102757,'Garant.Inform.Seguretat'),(102758,'Test i Qualitat del Software'),(102759,'Disseny de Software'),(102760,'Gestió de Projectes'),(102761,'Anglès Professional II'),(102762,'Anglès Professional I'),(102763,'Requisits del Software'),(102764,'Metodologia de la Programació'),(102765,'Fonaments Dels Computadors'),(102767,'Laboratori de Programació'),(102768,'Intel·ligència Artificial'),(102769,'Informació i Seguretat'),(102770,'Tendències Actuals'),(102771,'Electricitat i Electrònica'),(102772,'Matemàtica Discreta'),(102773,'Fonam.Tecnol.D.Informació'),(102774,'Estructura de Computadors'),(102775,'Arquitectura de Computadors'),(102776,'Gestió i Administració de Xarxes'),(102777,'Computació d\'Altes Prestacions'),(102778,'Arquitectures Avançades'),(102781,'Mod.Qualit.Gestió de TIC'),(102782,'Compiladors'),(102783,'Anàlisi i Disseny d\'Algorismes'),(102784,'Visió per Computador'),(102785,'Robòtica'),(102786,'Coneixement'),(102787,'Aprenentatge Computacional'),(102788,'Laboratori Integrat de Software'),(102789,'Gesti.Desenv.Software'),(102790,'Arquitect.Tecnolog.Software'),(102791,'Sistemes Encastats'),(102792,'Prototipatge de Sistemes Encastats'),(102793,'Microprocessadors i Perifèrics'),(102794,'Integració Hardware/software'),(103801,'Àlgebra'),(103802,'Càlcul'),(103803,'Estadística'),(103804,'Ètica per a l\'Enginyeria'),(103805,'Fonaments d\'Enginyeria'),(103806,'Fonaments d\'Informàtica'),(103807,'Organització i Gestió d\'Empreses'),(103983,'Pràctiques Externes'),(105072,'Tecnologia Blockchain i Criptomoned'),(105073,'Tecnologies Compressió de la Inform'),(105074,'Aplicacions de la Teoria de Codis'),(105075,'Internet de les Coses');
/*!40000 ALTER TABLE `asignaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignaturas_has_estudios`
--

DROP TABLE IF EXISTS `asignaturas_has_estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignaturas_has_estudios` (
  `Asignaturas_idAsignaturas` int NOT NULL,
  `Estudios_idEstudios` int NOT NULL,
  `Grados_Centros_idCentros` int NOT NULL,
  PRIMARY KEY (`Asignaturas_idAsignaturas`,`Estudios_idEstudios`,`Grados_Centros_idCentros`),
  KEY `fk_Asignaturas_has_Grados_Grados1_idx` (`Estudios_idEstudios`,`Grados_Centros_idCentros`),
  KEY `fk_Asignaturas_has_Grados_Asignaturas1_idx` (`Asignaturas_idAsignaturas`),
  CONSTRAINT `fk_Asignaturas_has_Grados_Asignaturas1` FOREIGN KEY (`Asignaturas_idAsignaturas`) REFERENCES `asignaturas` (`idAsignaturas`),
  CONSTRAINT `fk_Asignaturas_has_Grados_Grados1` FOREIGN KEY (`Estudios_idEstudios`, `Grados_Centros_idCentros`) REFERENCES `estudios` (`idGrado`, `Centros_idCentros`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaturas_has_estudios`
--

LOCK TABLES `asignaturas_has_estudios` WRITE;
/*!40000 ALTER TABLE `asignaturas_has_estudios` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignaturas_has_estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargos` (
  `idCargos` int NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `idEnAmbito` int DEFAULT NULL,
  `Ambitos_idAmbitos` int NOT NULL,
  PRIMARY KEY (`idCargos`,`Ambitos_idAmbitos`),
  KEY `fk_Cargos_Ambitos1_idx` (`Ambitos_idAmbitos`),
  CONSTRAINT `fk_Cargos_Ambitos1` FOREIGN KEY (`Ambitos_idAmbitos`) REFERENCES `ambitos` (`idAmbitos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos_has_profesores`
--

DROP TABLE IF EXISTS `cargos_has_profesores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargos_has_profesores` (
  `Cargos_idCargos` int NOT NULL,
  `Profesores_niu` int NOT NULL,
  PRIMARY KEY (`Cargos_idCargos`,`Profesores_niu`),
  KEY `fk_Cargos_has_Profesores_Profesores1_idx` (`Profesores_niu`),
  KEY `fk_Cargos_has_Profesores_Cargos1_idx` (`Cargos_idCargos`),
  CONSTRAINT `fk_Cargos_has_Profesores_Cargos1` FOREIGN KEY (`Cargos_idCargos`) REFERENCES `cargos` (`idCargos`),
  CONSTRAINT `fk_Cargos_has_Profesores_Profesores1` FOREIGN KEY (`Profesores_niu`) REFERENCES `profesores` (`niu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos_has_profesores`
--

LOCK TABLES `cargos_has_profesores` WRITE;
/*!40000 ALTER TABLE `cargos_has_profesores` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargos_has_profesores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centros`
--

DROP TABLE IF EXISTS `centros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `centros` (
  `idCentro` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `acronimo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCentro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centros`
--

LOCK TABLES `centros` WRITE;
/*!40000 ALTER TABLE `centros` DISABLE KEYS */;
INSERT INTO `centros` VALUES (0,'Escola d\'Enginyeria','eng'),(1,'Facultat d\'Economia i Empresa','eco'),(2,'Facultat de Biociències','bio'),(3,'Facultat de Ciències','cie'),(4,'Facultat de Ciències Polítiques i de Sociologia','ciepol'),(5,'Facultat de Ciències de l\'Educació','cieedu'),(6,'Facultat de Ciències de la Comunicació','ciecomu'),(7,'Facultat de Dret','dret'),(8,'Facultat de Filosofia i Lletres','filo'),(9,'Facultat de Medicina','med'),(10,'Facultat de Psicologia','psic'),(11,'Facultat de Traducció i d\'Interpretació','trad'),(12,'Facultat de Veterinària','vet');
/*!40000 ALTER TABLE `centros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamentos` (
  `idDepartamentos` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idDepartamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos_has_profesores`
--

DROP TABLE IF EXISTS `departamentos_has_profesores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamentos_has_profesores` (
  `Departamentos_idDepartamentos` int NOT NULL,
  `Profesores_niu` int NOT NULL,
  PRIMARY KEY (`Departamentos_idDepartamentos`,`Profesores_niu`),
  KEY `fk_Departamentos_has_Profesores_Profesores1_idx` (`Profesores_niu`),
  KEY `fk_Departamentos_has_Profesores_Departamentos1_idx` (`Departamentos_idDepartamentos`),
  CONSTRAINT `fk_Departamentos_has_Profesores_Departamentos1` FOREIGN KEY (`Departamentos_idDepartamentos`) REFERENCES `departamentos` (`idDepartamentos`),
  CONSTRAINT `fk_Departamentos_has_Profesores_Profesores1` FOREIGN KEY (`Profesores_niu`) REFERENCES `profesores` (`niu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos_has_profesores`
--

LOCK TABLES `departamentos_has_profesores` WRITE;
/*!40000 ALTER TABLE `departamentos_has_profesores` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamentos_has_profesores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudios`
--

DROP TABLE IF EXISTS `estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudios` (
  `idGrado` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `acronimo` varchar(300) DEFAULT NULL,
  `Centros_idCentros` int NOT NULL,
  `activo` tinyint DEFAULT NULL,
  `tipo` enum('Grado','Master') DEFAULT NULL,
  PRIMARY KEY (`idGrado`,`Centros_idCentros`),
  KEY `fk_Grados_Facultades1_idx` (`Centros_idCentros`),
  CONSTRAINT `fk_Grados_Facultades1` FOREIGN KEY (`Centros_idCentros`) REFERENCES `centros` (`idCentro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudios`
--

LOCK TABLES `estudios` WRITE;
/*!40000 ALTER TABLE `estudios` DISABLE KEYS */;
INSERT INTO `estudios` VALUES (0,'Enginyeria Informàtica','Eng. Inf.',0,1,'Grado'),(1,'Enginyeria Telecomunicacions','Eng. Teleco.',0,1,'Grado');
/*!40000 ALTER TABLE `estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupo` (
  `idGrupo` int NOT NULL,
  `Curso_idCurso` int NOT NULL,
  `ocupacion` int DEFAULT NULL,
  PRIMARY KEY (`idGrupo`,`Curso_idCurso`),
  KEY `fk_Grupo_Curso1_idx` (`Curso_idCurso`),
  CONSTRAINT `fk_Grupo_Curso1` FOREIGN KEY (`Curso_idCurso`) REFERENCES `anio` (`idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_has_asignaturas`
--

DROP TABLE IF EXISTS `grupo_has_asignaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupo_has_asignaturas` (
  `Grupo_idGrupo` int NOT NULL,
  `Asignaturas_idAsignaturas` int NOT NULL,
  PRIMARY KEY (`Grupo_idGrupo`,`Asignaturas_idAsignaturas`),
  KEY `fk_Grupo_has_Asignaturas_Asignaturas1_idx` (`Asignaturas_idAsignaturas`),
  KEY `fk_Grupo_has_Asignaturas_Grupo1_idx` (`Grupo_idGrupo`),
  CONSTRAINT `fk_Grupo_has_Asignaturas_Asignaturas1` FOREIGN KEY (`Asignaturas_idAsignaturas`) REFERENCES `asignaturas` (`idAsignaturas`),
  CONSTRAINT `fk_Grupo_has_Asignaturas_Grupo1` FOREIGN KEY (`Grupo_idGrupo`) REFERENCES `grupo` (`idGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_has_asignaturas`
--

LOCK TABLES `grupo_has_asignaturas` WRITE;
/*!40000 ALTER TABLE `grupo_has_asignaturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo_has_asignaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objeto`
--

DROP TABLE IF EXISTS `objeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `objeto` (
  `idObjeto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idObjeto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objeto`
--

LOCK TABLES `objeto` WRITE;
/*!40000 ALTER TABLE `objeto` DISABLE KEYS */;
/*!40000 ALTER TABLE `objeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permisos` (
  `idPermisos` int NOT NULL,
  `nivel` enum('ninguno','basico','total') DEFAULT 'ninguno',
  `Objeto_idObjeto` int NOT NULL,
  `Cargos_idCargos` int NOT NULL,
  PRIMARY KEY (`idPermisos`,`Objeto_idObjeto`,`Cargos_idCargos`),
  KEY `fk_Permisos_Objeto1_idx` (`Objeto_idObjeto`),
  KEY `fk_Permisos_Cargos1_idx` (`Cargos_idCargos`),
  CONSTRAINT `fk_Permisos_Cargos1` FOREIGN KEY (`Cargos_idCargos`) REFERENCES `cargos` (`idCargos`),
  CONSTRAINT `fk_Permisos_Objeto1` FOREIGN KEY (`Objeto_idObjeto`) REFERENCES `objeto` (`idObjeto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesores`
--

DROP TABLE IF EXISTS `profesores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profesores` (
  `niu` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido1` varchar(100) NOT NULL,
  `apellido2` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`niu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesores`
--

LOCK TABLES `profesores` WRITE;
/*!40000 ALTER TABLE `profesores` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesores_has_grupo`
--

DROP TABLE IF EXISTS `profesores_has_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profesores_has_grupo` (
  `Profesores_niu` int NOT NULL,
  `Grupo_idGrupo` int NOT NULL,
  `Grupo_Curso_idCurso` int NOT NULL,
  PRIMARY KEY (`Profesores_niu`,`Grupo_idGrupo`,`Grupo_Curso_idCurso`),
  KEY `fk_Profesores_has_Grupo_Grupo1_idx` (`Grupo_idGrupo`,`Grupo_Curso_idCurso`),
  KEY `fk_Profesores_has_Grupo_Profesores1_idx` (`Profesores_niu`),
  CONSTRAINT `fk_Profesores_has_Grupo_Grupo1` FOREIGN KEY (`Grupo_idGrupo`, `Grupo_Curso_idCurso`) REFERENCES `grupo` (`idGrupo`, `Curso_idCurso`),
  CONSTRAINT `fk_Profesores_has_Grupo_Profesores1` FOREIGN KEY (`Profesores_niu`) REFERENCES `profesores` (`niu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesores_has_grupo`
--

LOCK TABLES `profesores_has_grupo` WRITE;
/*!40000 ALTER TABLE `profesores_has_grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesores_has_grupo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-04 17:42:27
