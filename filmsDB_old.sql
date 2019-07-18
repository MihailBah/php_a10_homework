-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: filmsDB
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

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
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL DEFAULT '',
  `year` year(4) NOT NULL DEFAULT '1901',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films`
--

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;
INSERT INTO `films` VALUES (1,'Alien',1979),(2,'Aliens',1986),(3,'Alien3',1992),(4,'Alien Resurrection',1997),(5,'A Nightmare on Elm Street',1984),(6,'A Nightmare on Elm Street 2: Freddys Revenge',1985);
/*!40000 ALTER TABLE `films` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films_persons`
--

DROP TABLE IF EXISTS `films_persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `films_persons` (
  `film_id` int(11) NOT NULL DEFAULT '0',
  `person_id` int(11) NOT NULL DEFAULT '0',
  `person_profile` enum('director','producer','screenwriter','operator','actor') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films_persons`
--

LOCK TABLES `films_persons` WRITE;
/*!40000 ALTER TABLE `films_persons` DISABLE KEYS */;
INSERT INTO `films_persons` VALUES (1,1,'director'),(1,2,'producer'),(1,3,'producer'),(1,4,'producer'),(1,5,'screenwriter'),(1,6,'screenwriter'),(1,7,'operator'),(1,8,'actor'),(1,9,'actor'),(2,10,'director'),(2,11,'actor'),(2,12,'operator'),(2,2,'producer'),(2,3,'producer'),(2,4,'producer'),(2,10,'screenwriter'),(2,3,'screenwriter'),(2,4,'screenwriter'),(2,9,'actor'),(3,13,'director'),(3,14,'screenwriter'),(3,15,'actor'),(3,16,'operator'),(3,2,'producer'),(3,3,'producer'),(3,4,'producer'),(3,3,'screenwriter'),(3,4,'screenwriter'),(3,9,'actor'),(4,17,'director'),(4,18,'screenwriter'),(4,19,'actor'),(4,20,'actor'),(4,21,'operator'),(4,2,'producer'),(4,3,'producer'),(4,4,'producer'),(4,9,'actor'),(5,22,'director'),(5,23,'producer'),(5,24,'actor'),(5,25,'actor'),(5,26,'actor'),(5,27,'operator'),(5,22,'screenwriter'),(6,28,'director'),(6,29,'actor'),(6,30,'actor'),(6,27,'operator'),(6,23,'producer'),(6,22,'screenwriter'),(6,26,'actor');
/*!40000 ALTER TABLE `films_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films_series`
--

DROP TABLE IF EXISTS `films_series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `films_series` (
  `film_id` int(11) NOT NULL DEFAULT '0',
  `series_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films_series`
--

LOCK TABLES `films_series` WRITE;
/*!40000 ALTER TABLE `films_series` DISABLE KEYS */;
INSERT INTO `films_series` VALUES (1,1),(2,1),(3,1),(4,1),(5,2),(6,2);
/*!40000 ALTER TABLE `films_series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(150) NOT NULL DEFAULT 'noname',
  `born_year` year(4) NOT NULL DEFAULT '1901',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UC_persons` (`full_name`,`born_year`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` VALUES (12,'Adrian Biddle',1952),(16,'Alex Thomson',1929),(5,'Dan OBannon',1946),(21,'Darius Khondji',1955),(13,'David Andrew Leo Fincher',1962),(3,'David Giler',1930),(7,'Derek Vanlint',1932),(2,'Gordon Carroll',1928),(28,'Jack Sholder',1945),(27,'Jacques Haitkin',1950),(10,'James Francis Cameron',1954),(17,'Jean-Pierre Jeunet',1953),(24,'John Saxon',1935),(25,'Johnny Depp',1963),(18,'Joseph Hill Joss Whedon',1964),(30,'Kim Myers',1966),(15,'Lance Henriksen',1940),(14,'Larry Ferguson',1940),(29,'Mark Patton',1958),(11,'Michael Connell Biehn',1956),(1,'Ridley Scott',1937),(26,'Robert Englund',1947),(23,'Robert Shaye',1939),(20,'Ronald Francis \"Ron\" Perlman',1950),(6,'Ronald Shusett',1935),(9,'Sigourney Weaver',1949),(8,'Thomas Roy \"Tom\" Skerritt',1933),(4,'Walter Wesley Hill',1942),(22,'Wesley Earl Craven',1939),(19,'Winona Ryder',1971);
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `series`
--

LOCK TABLES `series` WRITE;
/*!40000 ALTER TABLE `series` DISABLE KEYS */;
INSERT INTO `series` VALUES (1,'Alien'),(2,'A Nightmare on Elm Street');
/*!40000 ALTER TABLE `series` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-18 22:41:43
