-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gestor_permisos
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
  `nombre` varchar(100) COLLATE utf8_estonian_ci DEFAULT NULL,
  `tabla` varchar(100) COLLATE utf8_estonian_ci DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_estonian_ci DEFAULT NULL,
  `asignable` tinyint DEFAULT '0',
  PRIMARY KEY (`idAmbitos`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ambitos`
--

LOCK TABLES `ambitos` WRITE;
/*!40000 ALTER TABLE `ambitos` DISABLE KEYS */;
INSERT INTO `ambitos` VALUES (1,'Centros','idCentro','Centres',1),(2,'Estudios','idEstudio','Estudis',1),(3,'Asignaturas','idAsignaturas','Assignatures',0),(4,'Departamentos','idDepartamentos','Departaments',1),(5,'Grupo','idGrupo','Grups',0),(6,'Profesores','niu','Professors',0),(7,'Universidad',NULL,'Universitat',1),(8,'Estudiante',NULL,'Estudiant',0);
/*!40000 ALTER TABLE `ambitos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anio`
--

DROP TABLE IF EXISTS `anio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anio` (
  `inicio` int NOT NULL,
  PRIMARY KEY (`inicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anio`
--

LOCK TABLES `anio` WRITE;
/*!40000 ALTER TABLE `anio` DISABLE KEYS */;
INSERT INTO `anio` VALUES (2020);
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
  `nombre` varchar(100) COLLATE utf8_estonian_ci NOT NULL,
  PRIMARY KEY (`idAsignaturas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaturas`
--

LOCK TABLES `asignaturas` WRITE;
/*!40000 ALTER TABLE `asignaturas` DISABLE KEYS */;
INSERT INTO `asignaturas` VALUES (102740,'Sistemes Distribuïts'),(102741,'Gest.Adm.Bases de Dades'),(102742,'Tecnologies Desenv. Internet i Web'),(102743,'Enginyeria del Software'),(102744,'Bases de Dades'),(102745,'Legislació'),(102746,'Xarxes'),(102747,'Sistemes Operatius'),(102748,'Treball de Final de Grau'),(102749,'Tecnologies Avançades d\'Internet'),(102750,'Sistemes i Tecnologies Web'),(102751,'Infraest.Tecnologia i Xarxes'),(102752,'Sistemes d\'Informació'),(102753,'Visualització Gràfica Interactiva'),(102754,'Sistemes Multimèdia'),(102757,'Garant.Inform.Seguretat'),(102758,'Test i Qualitat del Software'),(102759,'Disseny de Software'),(102760,'Gestió de Projectes'),(102761,'Anglès Professional II'),(102762,'Anglès Professional I'),(102763,'Requisits del Software'),(102764,'Metodologia de la Programació'),(102765,'Fonaments Dels Computadors'),(102767,'Laboratori de Programació'),(102768,'Intel·ligència Artificial'),(102769,'Informació i Seguretat'),(102770,'Tendències Actuals'),(102771,'Electricitat i Electrònica'),(102772,'Matemàtica Discreta'),(102773,'Fonam.Tecnol.D.Informació'),(102774,'Estructura de Computadors'),(102775,'Arquitectura de Computadors'),(102776,'Gestió i Administració de Xarxes'),(102777,'Computació d\'Altes Prestacions'),(102778,'Arquitectures Avançades'),(102781,'Mod.Qualit.Gestió de TIC'),(102782,'Compiladors'),(102783,'Anàlisi i Disseny d\'Algorismes'),(102784,'Visió per Computador'),(102785,'Robòtica, Llenguatge i Planificació'),(102786,'Coneixement, Raonament i Incertesa'),(102787,'Aprenentatge Computacional'),(102788,'Laboratori Integrat de Software'),(102789,'Gesti.Desenv.Software'),(102790,'Arquitect.Tecnolog.Software'),(102791,'Sistemes Encastats'),(102792,'Prototipatge de Sistemes Encastats'),(102793,'Microprocessadors i Perifèrics'),(102794,'Integració Hardware/software'),(103801,'Àlgebra'),(103802,'Càlcul'),(103803,'Estadística'),(103804,'Ètica per a l\'Enginyeria'),(103805,'Fonaments d\'Enginyeria'),(103806,'Fonaments d\'Informàtica'),(103807,'Organització i Gestió d\'Empreses'),(103983,'Pràctiques Externes'),(105072,'Tecnologia Blockchain i Criptomoned'),(105073,'Tecnologies Compressió de la Inform'),(105074,'Aplicacions de la Teoria de Codis'),(105075,'Internet de les Coses');
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
  `Estudio_Centros_idCentros` int NOT NULL,
  PRIMARY KEY (`Asignaturas_idAsignaturas`,`Estudios_idEstudios`,`Estudio_Centros_idCentros`),
  KEY `fk_Asignaturas_has_Grados_Grados1_idx` (`Estudios_idEstudios`,`Estudio_Centros_idCentros`),
  KEY `fk_Asignaturas_has_Grados_Asignaturas1_idx` (`Asignaturas_idAsignaturas`),
  CONSTRAINT `fk_Asignaturas_has_Grados_Asignaturas1` FOREIGN KEY (`Asignaturas_idAsignaturas`) REFERENCES `asignaturas` (`idAsignaturas`),
  CONSTRAINT `fk_Asignaturas_has_Grados_Grados1` FOREIGN KEY (`Estudios_idEstudios`, `Estudio_Centros_idCentros`) REFERENCES `estudios` (`idEstudio`, `Centros_idCentros`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaturas_has_estudios`
--

LOCK TABLES `asignaturas_has_estudios` WRITE;
/*!40000 ALTER TABLE `asignaturas_has_estudios` DISABLE KEYS */;
INSERT INTO `asignaturas_has_estudios` VALUES (102740,958,115),(102741,958,115),(102742,958,115),(102743,958,115),(102744,958,115),(102745,958,115),(102746,958,115),(102747,958,115),(102748,958,115),(102749,958,115),(102750,958,115),(102751,958,115),(102752,958,115),(102753,958,115),(102754,958,115),(102757,958,115),(102758,958,115),(102759,958,115),(102760,958,115),(102761,958,115),(102762,958,115),(102763,958,115),(102764,958,115),(102765,958,115),(102767,958,115),(102768,958,115),(102769,958,115),(102770,958,115),(102771,958,115),(102772,958,115),(102773,958,115),(102774,958,115),(102775,958,115),(102776,958,115),(102777,958,115),(102778,958,115),(102781,958,115),(102782,958,115),(102783,958,115),(102784,958,115),(102785,958,115),(102786,958,115),(102787,958,115),(102788,958,115),(102789,958,115),(102790,958,115),(102791,958,115),(102792,958,115),(102793,958,115),(102794,958,115),(103801,958,115),(103802,958,115),(103803,958,115),(103804,958,115),(103805,958,115),(103806,958,115),(103807,958,115),(103983,958,115),(105072,958,115),(105073,958,115),(105074,958,115),(105075,958,115);
/*!40000 ALTER TABLE `asignaturas_has_estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargos` (
  `idCargos` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(300) COLLATE utf8_estonian_ci DEFAULT NULL,
  `idEnAmbito` int DEFAULT NULL,
  `Ambitos_idAmbitos` int NOT NULL,
  PRIMARY KEY (`idCargos`,`Ambitos_idAmbitos`),
  KEY `fk_Cargos_Ambitos1_idx` (`Ambitos_idAmbitos`),
  CONSTRAINT `fk_Cargos_Ambitos1` FOREIGN KEY (`Ambitos_idAmbitos`) REFERENCES `ambitos` (`idAmbitos`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Test i qualitat',102758,3),(2,'prueba2',115,1),(4,'Director',115,1),(5,'Test-Porfidio Director',1001048,6),(6,'Prueba de grupo',415,5),(7,'Prueba Departamento',472,4);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos_has_profesores`
--

LOCK TABLES `cargos_has_profesores` WRITE;
/*!40000 ALTER TABLE `cargos_has_profesores` DISABLE KEYS */;
INSERT INTO `cargos_has_profesores` VALUES (4,1000587),(5,1001048);
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
  `nombre` varchar(100) COLLATE utf8_estonian_ci NOT NULL,
  `acronimo` varchar(100) COLLATE utf8_estonian_ci DEFAULT NULL,
  PRIMARY KEY (`idCentro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centros`
--

LOCK TABLES `centros` WRITE;
/*!40000 ALTER TABLE `centros` DISABLE KEYS */;
INSERT INTO `centros` VALUES (101,'Facultat de Filosofia i Lletres','FFiL'),(102,'Facultat de Medicina','FM'),(103,'Facultat de Ciències','FC'),(105,'Facultat de Ciències de la Comunicació','FCC'),(106,'Facultat de Dret','FD'),(107,'Facultat de Veterinària','FV'),(108,'Facultat de Ciències Polítiques i de Sociologia','FCPS'),(109,'Facultat de Psicologia','FP'),(110,'Facultat de Traducció i d\'Interpretació','FTI'),(111,'Facultat de Ciències de l\'Educació','FCE'),(113,'Facultat de Biociències','FB'),(114,'Facultat d\'Economia i Empresa','FEE'),(115,'Escola d\'Enginyeria','EE');
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
  `nombre` varchar(100) COLLATE utf8_estonian_ci NOT NULL,
  `acronimo` varchar(100) COLLATE utf8_estonian_ci DEFAULT NULL,
  PRIMARY KEY (`idDepartamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (402,'Departament de Matemàtiques','DM'),(403,'Departament de Química','DQ'),(404,'Departament de Física','DF'),(429,'Departament de Filologia Anglesa i de Germanística','DFAG'),(431,'Departament de Geografia','DG'),(433,'Departament de Ciència Política i de Dret Públic','DCPiDP'),(438,'Departament de Dret Privat','DDP'),(461,'Departament de Telecomunicació i d\'Enginyeria de Sistemes','DTES'),(463,'Departament d\'Enginyeria Electrònica','DEE'),(469,'Departament d\'Arquitectura de Computadors i Sistemes Operatius','DACSO'),(470,'Departament de Microelectrónica i de Sistemes Electrònics','DMSE'),(471,'Departament de Ciències de la Computació','DCC'),(472,'Departament d\'Enginyeria de la Informació i de les Comunicacions','DEIC'),(485,'Departament d\'Empresa','DE'),(2634,'Departament d\'Enginyeria Química, Biològica i Ambiental','DEQBA');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos_has_profesores`
--

LOCK TABLES `departamentos_has_profesores` WRITE;
/*!40000 ALTER TABLE `departamentos_has_profesores` DISABLE KEYS */;
INSERT INTO `departamentos_has_profesores` VALUES (402,1000365),(402,1000460),(402,1001143),(402,1001691);
/*!40000 ALTER TABLE `departamentos_has_profesores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudios`
--

DROP TABLE IF EXISTS `estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudios` (
  `idEstudio` int NOT NULL,
  `nombre` varchar(150) COLLATE utf8_estonian_ci NOT NULL,
  `acronimo` varchar(300) COLLATE utf8_estonian_ci DEFAULT NULL,
  `Centros_idCentros` int NOT NULL,
  `activo` tinyint DEFAULT NULL,
  `tipo` enum('Grau','Màster') COLLATE utf8_estonian_ci DEFAULT NULL,
  PRIMARY KEY (`idEstudio`,`Centros_idCentros`),
  KEY `fk_Grados_Facultades1_idx` (`Centros_idCentros`),
  CONSTRAINT `fk_Grados_Facultades1` FOREIGN KEY (`Centros_idCentros`) REFERENCES `centros` (`idCentro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudios`
--

LOCK TABLES `estudios` WRITE;
/*!40000 ALTER TABLE `estudios` DISABLE KEYS */;
INSERT INTO `estudios` VALUES (951,'Grau en Enginyeria Química','GEQ',115,1,'Grau'),(956,'Grau en Enginyeria de Sistemes de Telecomunicació','GEST',115,1,'Grau'),(957,'Grau en Enginyeria Electrònica de Telecomunicació','GEET',115,1,'Grau'),(958,'Grau en Enginyeria Informàtica','GEI',115,1,'Grau'),(1170,'Màster en Enginyeria de Telecomunicació','MET',115,1,'Màster'),(1206,'Grau en Enginyeria Informàtica (Menció en Enginyeria de Computadors) i Grau en Enginyeria Electrònica de Telecomunicació','GEI+GEET',115,1,'Grau'),(1207,'Grau en Enginyeria Informàtica (Menció en Tecnologies de la Informació) i Grau en Enginyeria de Sistemes de Telecomunicació','GEI+GEST',115,1,'Grau'),(1365,'Grau en Enginyeria Electrònica de Telecomunicació i Grau en Enginyeria de Sistemes de Telecomunicació','GEET+GEST',115,1,'Grau'),(1394,'Grau en Enginyeria de Dades','GED',115,1,'Grau'),(1395,'Grau en Gestió de Ciutats Intel·ligents i Sostenibles','GGCIS',115,1,'Grau');
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
  `Anio_inicio` int NOT NULL,
  PRIMARY KEY (`idGrupo`,`Anio_inicio`),
  KEY `fk_Grupo_Anio1_idx` (`Anio_inicio`),
  CONSTRAINT `fk_Grupo_Anio1` FOREIGN KEY (`Anio_inicio`) REFERENCES `anio` (`inicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (41,2020),(42,2020),(43,2020),(44,2020),(45,2020),(47,2020),(90,2020),(410,2020),(411,2020),(412,2020),(413,2020),(415,2020),(417,2020),(418,2020),(419,2020),(420,2020),(421,2020),(422,2020),(430,2020),(431,2020),(432,2020),(440,2020),(441,2020),(450,2020),(451,2020),(452,2020),(453,2020),(471,2020),(472,2020),(999,2020);
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
  `ocupacion` int DEFAULT NULL,
  PRIMARY KEY (`Grupo_idGrupo`,`Asignaturas_idAsignaturas`),
  KEY `fk_Grupo_has_Asignaturas_Asignaturas1_idx` (`Asignaturas_idAsignaturas`),
  KEY `fk_Grupo_has_Asignaturas_Grupo1_idx` (`Grupo_idGrupo`),
  CONSTRAINT `fk_Grupo_has_Asignaturas_Asignaturas1` FOREIGN KEY (`Asignaturas_idAsignaturas`) REFERENCES `asignaturas` (`idAsignaturas`),
  CONSTRAINT `fk_Grupo_has_Asignaturas_Grupo1` FOREIGN KEY (`Grupo_idGrupo`) REFERENCES `grupo` (`idGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_has_asignaturas`
--

LOCK TABLES `grupo_has_asignaturas` WRITE;
/*!40000 ALTER TABLE `grupo_has_asignaturas` DISABLE KEYS */;
INSERT INTO `grupo_has_asignaturas` VALUES (41,102746,82),(41,102747,104),(41,102768,81),(41,102769,82),(41,102771,80),(41,102772,76),(41,102774,63),(41,102775,96),(41,103801,77),(41,103802,85),(41,103803,62),(41,103805,42),(41,103806,75),(41,103807,93),(42,103805,40),(43,102746,81),(43,102747,103),(43,102768,80),(43,102769,82),(43,102771,82),(43,102772,76),(43,102774,63),(43,102775,96),(43,103801,77),(43,103802,85),(43,103803,62),(43,103805,39),(43,103806,76),(43,103807,93),(44,103805,39),(45,102746,43),(45,102747,67),(45,102768,53),(45,102769,46),(45,102771,91),(45,102772,72),(45,102774,57),(45,102775,55),(45,103801,83),(45,103802,67),(45,103803,47),(45,103805,41),(45,103806,80),(45,103807,79),(47,102746,75),(47,102772,18),(47,103801,26),(47,103805,38),(47,103806,30),(90,102752,3),(410,102742,88),(410,102745,105),(410,102760,79),(410,103804,70),(411,102743,37),(411,102744,42),(411,102764,43),(411,102765,45),(411,102767,49),(412,102743,32),(412,102744,40),(412,102764,41),(412,102765,44),(412,102767,47),(413,102767,1),(415,102742,86),(415,102745,98),(415,102760,80),(415,103804,54),(417,102742,40),(417,103804,70),(418,102761,31),(418,102762,31),(418,102770,29),(418,105075,20),(419,102742,80),(420,102758,97),(420,102759,85),(420,102763,94),(420,102781,74),(420,102788,82),(420,102789,86),(420,102790,84),(421,102741,46),(422,102741,43),(430,102740,55),(430,102776,49),(430,102777,39),(430,102778,38),(430,102791,73),(430,102792,40),(430,102793,40),(430,102794,40),(431,102743,38),(431,102744,42),(431,102764,41),(431,102765,45),(431,102767,44),(432,102743,37),(432,102744,40),(432,102764,41),(432,102765,45),(432,102767,46),(440,102753,44),(440,102754,90),(440,102782,42),(440,102783,40),(440,102784,73),(440,102785,80),(440,102786,74),(440,102787,86),(441,102753,38),(441,102782,41),(441,102783,38),(450,102740,61),(450,102749,67),(450,102750,79),(450,102751,93),(450,102752,76),(450,102757,76),(450,102759,68),(450,102773,75),(450,105072,19),(450,105073,17),(450,105074,6),(451,102743,35),(451,102744,20),(451,102764,41),(451,102765,45),(451,102767,25),(452,102743,1),(452,102744,21),(452,102764,40),(452,102767,23),(453,102767,41),(471,102764,1),(471,102765,44),(472,102764,32),(999,102748,0),(999,103983,0);
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
  `nombre` varchar(100) COLLATE utf8_estonian_ci NOT NULL,
  PRIMARY KEY (`idObjeto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objeto`
--

LOCK TABLES `objeto` WRITE;
/*!40000 ALTER TABLE `objeto` DISABLE KEYS */;
INSERT INTO `objeto` VALUES (1,'test'),(3,'Enquesta 25');
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
  `nivel` enum('ninguno','basico','total') COLLATE utf8_estonian_ci DEFAULT 'ninguno',
  `Objeto_idObjeto` int NOT NULL,
  `Ambitos_idAmbitos` int NOT NULL,
  PRIMARY KEY (`idPermisos`,`Objeto_idObjeto`,`Ambitos_idAmbitos`),
  KEY `fk_Permisos_Objeto1_idx` (`Objeto_idObjeto`),
  KEY `fk_Permisos_Ambitos1_idx` (`Ambitos_idAmbitos`),
  CONSTRAINT `fk_Permisos_Ambitos1` FOREIGN KEY (`Ambitos_idAmbitos`) REFERENCES `ambitos` (`idAmbitos`),
  CONSTRAINT `fk_Permisos_Objeto1` FOREIGN KEY (`Objeto_idObjeto`) REFERENCES `objeto` (`idObjeto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
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
  `nombre` varchar(100) COLLATE utf8_estonian_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_estonian_ci NOT NULL,
  PRIMARY KEY (`niu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesores`
--

LOCK TABLES `profesores` WRITE;
/*!40000 ALTER TABLE `profesores` DISABLE KEYS */;
INSERT INTO `profesores` VALUES (1000210,'Ramon','Baldrich Caselles'),(1000327,'Joaquin','Borges Ayats'),(1000365,'Josep Maria','Burgues Badia'),(1000460,'Jordi','Carrabina Bordoll'),(1000587,'Ana','Cortes Fite'),(1000786,'Carles','Ferrer Ramis'),(1001048,'Porfidio','Hernandez Bude'),(1001143,'Josep','Llados Canet'),(1001185,'Antonio Manuel','Lopez Peña'),(1001207,'Felipe','Lumbreras Ruiz'),(1001243,'Tomás Manuel','Margalef Burrull'),(1001260,'Enric','Marti Godia'),(1001475,'Merce','Mur Effing'),(1001549,'Xavier','Oriols Pladevall'),(1001550,'Joan','Orobitg Huguet'),(1001691,'Jordi','Pons Aróztegui'),(1001727,'Marta','Prim Sabria'),(1001803,'Dolores Isabel','Rexachs del Rosario'),(1001816,'Lluis','Ribas Xirgo'),(1001830,'Josep','Rifà Coma'),(1001851,'Francesc Xavier','Roca Marva'),(1001997,'Francisco Javier','Sanchez Pujadas'),(1002030,'Laia','Saumell Ariño'),(1002042,'Miquel Àngel','Senar Rosell'),(1002055,'Joan','Serra Sagrista'),(1002063,'Joan','Serrat Gual'),(1002107,'Joan','Sorribes Gomis'),(1002124,'Jorge Francisco','Suñé Tarruella'),(1002245,'Ernest','Valveny Llobet'),(1002248,'Maria Isabel','Vanrell Martorell'),(1002260,'Antonio Jose','Velasco Gonzalez'),(1002272,'Joan Manuel','Verdera Melenchon'),(1002313,'Juan Jose','Villanueva Pipaon'),(1002914,'Gema','Sanchez Albaladejo'),(1003042,'Juan Carlos','Moure Lopez'),(1003281,'Daniel','Franco Puntes'),(1003394,'Francesc','Perera Domenech'),(1003453,'Eduardo','Cesar Galobardes'),(1003546,'Vicente','Soler Ruiz'),(1003712,'Lluis Antoni','Teres Teres'),(1004099,'Remo Lucio','Suppi Boldrito'),(1004129,'Joan','Porti Pique'),(1104294,'Fernando Luis','Vilariño Freire'),(1104296,'Xavier','Otazu Porter'),(1105319,'Oger','Malet Munté'),(1112621,'Joan','Bartrina Rapesta'),(1113408,'Diego Javier','Mostaccio  '),(1136085,'Alicia','Fornes Bisquerra'),(1139100,'Ramon','Grau Sala'),(1145445,'Patricia','Marquez Valle'),(1148029,'Marc','Tallo Sendra'),(1156667,'Ruben','Martinez Vidal'),(1161496,'Ramon','Marti Escale'),(1181452,'Victor','Garcia Font'),(1197444,'Joan','Giner Miguelez'),(1206147,'Dimosthenis','Karatzas  '),(1207845,'Carlos Alejandro','Parraga  '),(1215500,'Jorge','Bernal del Nozal'),(1259088,'Miguel','Hernández Cabronero'),(1313564,'Maria Isabel','Guitart Hormigo'),(1340045,'Katerine','Diaz Chito'),(1378913,'Ignacio','Izaga Martinez'),(1400442,'Raimon','Casanova Mohr'),(1410521,'Helena','Bolta Torrell'),(1430896,'Yael','Tudela Barroso'),(1497073,'Dion Eustathios Olivier','Tzamarias  '),(1521598,'Diego Mauricio','Freire Bastidas'),(1532072,'Aaron','Blanco Esteban'),(1545507,'Mario','Yelamos Rebolledo'),(1574280,'Maria del Carmen','Gonzalez Barreno'),(1574282,'Cristina','Romero Tris'),(1585479,'Cristian','Da Silva Campello'),(1596544,'Santiago','Rivas Contreras'),(2014362,'Oriol','Jaumandreu Sellares'),(2015999,'Jordi','Herrera Joancomarti'),(2016279,'Maria Merce','Villanueva Gay'),(2016570,'David','Castells Rufas'),(2016699,'Antonio Miguel','Espinosa Morales'),(2017133,'David','Megias Jimenez'),(2017311,'Andres','Perez Martinez'),(2017417,'Sergi','Robles Martinez'),(2017538,'Jordi','Serra Ruiz'),(2033583,'Xavier','Cartoixa Soler'),(2033648,'Marc','Porti Pujal'),(2034122,'Ramon','Musach Pi'),(2040232,'Yolanda','Benitez Fernandez'),(2040797,'Daniel','Ponsa Mussarra'),(2044386,'Jordi','Gonzalez Sabate'),(2044435,'Roberto','Benavente Vidal'),(2047573,'Estrella Maria','Abril Gutierrez'),(2051455,'David','Jimenez Jimenez'),(2052641,'Guillermo','Navarro Arribas'),(2057360,'Marius','Monton Macian'),(2058008,'Josep Maria','Basart Muñoz'),(2059673,'Cristina','Fernandez Cordoba'),(2066956,'Juan-Carlos','Sebastian Perez'),(2067513,'Marcel','Matencio Miret'),(2068875,'Aura','Hernandez Sabate'),(2073294,'Debora','Gil Resina'),(2075963,'Jordi','Casas Roma'),(2077232,'Oriol','Ramos Terrades'),(2077472,'Mireia','Bellot Garcia'),(2079609,'Francesc','Auli Llinas'),(2085222,'Aitor','Alsina Rodriguez'),(2090361,'Enric','Vergara Carreras'),(2090712,'Raul','Aragones Ortiz'),(2102478,'Anna Barbara','Sikora  '),(2131799,'Ian','Blanes Garcia'),(2132203,'Carlos','Sanchez Ramos'),(2141099,'Juan Francisco','Protasio Ramirez');
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
  `Grupo_Anio_inicio` int NOT NULL,
  PRIMARY KEY (`Profesores_niu`,`Grupo_idGrupo`,`Grupo_Anio_inicio`),
  KEY `fk_Profesores_has_Grupo_Profesores1_idx` (`Profesores_niu`),
  KEY `fk_Profesores_has_Grupo_Grupo1_idx` (`Grupo_idGrupo`,`Grupo_Anio_inicio`),
  CONSTRAINT `fk_Profesores_has_Grupo_Grupo1` FOREIGN KEY (`Grupo_idGrupo`, `Grupo_Anio_inicio`) REFERENCES `grupo` (`idGrupo`, `Anio_inicio`),
  CONSTRAINT `fk_Profesores_has_Grupo_Profesores1` FOREIGN KEY (`Profesores_niu`) REFERENCES `profesores` (`niu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesores_has_grupo`
--

LOCK TABLES `profesores_has_grupo` WRITE;
/*!40000 ALTER TABLE `profesores_has_grupo` DISABLE KEYS */;
INSERT INTO `profesores_has_grupo` VALUES (1000210,440,2020),(1000210,999,2020),(1000327,47,2020),(1000327,450,2020),(1000365,43,2020),(1000460,418,2020),(1000460,999,2020),(1000587,41,2020),(1000587,42,2020),(1000587,43,2020),(1000587,44,2020),(1000587,45,2020),(1000587,47,2020),(1000587,999,2020),(1000786,430,2020),(1001048,41,2020),(1001048,43,2020),(1001048,45,2020),(1001048,430,2020),(1001048,450,2020),(1001048,999,2020),(1001143,432,2020),(1001143,999,2020),(1001185,420,2020),(1001185,999,2020),(1001207,440,2020),(1001207,999,2020),(1001243,41,2020),(1001243,43,2020),(1001243,45,2020),(1001260,440,2020),(1001260,441,2020),(1001260,999,2020),(1001475,418,2020),(1001549,41,2020),(1001549,43,2020),(1001549,45,2020),(1001550,41,2020),(1001691,418,2020),(1001691,450,2020),(1001691,999,2020),(1001727,999,2020),(1001803,430,2020),(1001803,999,2020),(1001816,430,2020),(1001816,999,2020),(1001830,41,2020),(1001830,43,2020),(1001830,450,2020),(1001851,41,2020),(1001851,45,2020),(1001851,999,2020),(1001997,440,2020),(1001997,441,2020),(1001997,999,2020),(1002030,41,2020),(1002030,45,2020),(1002042,41,2020),(1002042,999,2020),(1002055,450,2020),(1002055,999,2020),(1002063,420,2020),(1002063,450,2020),(1002063,999,2020),(1002107,41,2020),(1002107,43,2020),(1002107,45,2020),(1002124,41,2020),(1002124,43,2020),(1002124,45,2020),(1002245,999,2020),(1002248,41,2020),(1002248,43,2020),(1002248,45,2020),(1002248,999,2020),(1002260,430,2020),(1002272,45,2020),(1002313,999,2020),(1002914,411,2020),(1002914,412,2020),(1002914,413,2020),(1002914,431,2020),(1002914,432,2020),(1002914,451,2020),(1002914,452,2020),(1002914,453,2020),(1002914,999,2020),(1003042,43,2020),(1003042,45,2020),(1003042,430,2020),(1003042,999,2020),(1003281,999,2020),(1003394,47,2020),(1003453,999,2020),(1003546,999,2020),(1003712,999,2020),(1004099,430,2020),(1004099,999,2020),(1004129,41,2020),(1004129,43,2020),(1004129,45,2020),(1104294,440,2020),(1104294,999,2020),(1104296,420,2020),(1104296,999,2020),(1105319,999,2020),(1112621,41,2020),(1112621,43,2020),(1112621,450,2020),(1112621,999,2020),(1113408,999,2020),(1136085,431,2020),(1136085,999,2020),(1139100,999,2020),(1145445,411,2020),(1148029,410,2020),(1148029,415,2020),(1148029,420,2020),(1148029,999,2020),(1156667,999,2020),(1161496,999,2020),(1181452,999,2020),(1197444,451,2020),(1206147,999,2020),(1207845,999,2020),(1215500,431,2020),(1215500,432,2020),(1215500,440,2020),(1215500,441,2020),(1215500,999,2020),(1259088,999,2020),(1313564,90,2020),(1313564,450,2020),(1340045,451,2020),(1340045,999,2020),(1378913,420,2020),(1400442,999,2020),(1410521,420,2020),(1410521,999,2020),(1430896,413,2020),(1430896,432,2020),(1497073,999,2020),(1521598,999,2020),(1532072,43,2020),(1532072,999,2020),(1545507,420,2020),(1574280,452,2020),(1574282,999,2020),(1585479,411,2020),(1585479,413,2020),(1585479,431,2020),(1596544,420,2020),(2014362,452,2020),(2015999,450,2020),(2015999,999,2020),(2016279,43,2020),(2016279,45,2020),(2016279,450,2020),(2016279,999,2020),(2016570,999,2020),(2016699,41,2020),(2016699,45,2020),(2017133,999,2020),(2017311,999,2020),(2017417,41,2020),(2017417,450,2020),(2017417,999,2020),(2017538,440,2020),(2017538,999,2020),(2033583,41,2020),(2033583,43,2020),(2033583,45,2020),(2033648,41,2020),(2033648,43,2020),(2033648,45,2020),(2034122,999,2020),(2040232,999,2020),(2040797,420,2020),(2040797,999,2020),(2044386,440,2020),(2044386,999,2020),(2044435,43,2020),(2044435,47,2020),(2044435,999,2020),(2047573,452,2020),(2047573,453,2020),(2051455,41,2020),(2051455,43,2020),(2051455,45,2020),(2052641,450,2020),(2052641,999,2020),(2057360,430,2020),(2057360,999,2020),(2058008,410,2020),(2058008,415,2020),(2058008,417,2020),(2058008,999,2020),(2059673,43,2020),(2059673,45,2020),(2059673,450,2020),(2059673,999,2020),(2066956,999,2020),(2067513,420,2020),(2068875,440,2020),(2068875,441,2020),(2068875,999,2020),(2073294,411,2020),(2073294,412,2020),(2073294,431,2020),(2073294,432,2020),(2073294,451,2020),(2073294,452,2020),(2073294,999,2020),(2075963,999,2020),(2077232,421,2020),(2077232,422,2020),(2077232,451,2020),(2077232,999,2020),(2077472,431,2020),(2079609,410,2020),(2079609,415,2020),(2079609,417,2020),(2079609,419,2020),(2085222,999,2020),(2090361,452,2020),(2090361,472,2020),(2090361,999,2020),(2090712,999,2020),(2102478,41,2020),(2102478,42,2020),(2102478,43,2020),(2102478,44,2020),(2102478,45,2020),(2102478,47,2020),(2102478,430,2020),(2102478,999,2020),(2131799,450,2020),(2131799,999,2020),(2132203,412,2020),(2132203,422,2020),(2141099,999,2020);
/*!40000 ALTER TABLE `profesores_has_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'gestor_permisos'
--

--
-- Dumping routines for database 'gestor_permisos'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-05 13:48:06
