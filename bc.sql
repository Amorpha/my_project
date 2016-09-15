-- MySQL dump 10.15  Distrib 10.0.20-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u492609671_roman
-- ------------------------------------------------------
-- Server version	10.0.20-MariaDB

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
-- Table structure for table `data`
--

DROP TABLE IF EXISTS `data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_car` int(2) NOT NULL,
  `num` int(8) NOT NULL,
  `date` varchar(255) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_car` (`id_car`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COMMENT='Данные о подвижном составе';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data`
--

/*!40000 ALTER TABLE `data` DISABLE KEYS */;
INSERT INTO `data` VALUES (12,3,12345678,'24.09.2016','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYOJRGvorOfysBjmqubhWHm7IKSoTqJ9G6FfCjijomxruZUe6jhQZSBSXb'),(32,1,12345678,'18.09.2016','http://www.tehnotrans.ru/upload/iblock/4df/504.png'),(43,1,12322323,'15.09.2016','http://fishki.net/picsw/022013/21/post/poezd/poezd-0027.jpg'),(44,2,22111111,'10.09.2016','http://megalogistika.ru/images/wagon/11-066.png'),(45,2,12222222,'15.09.2016','https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRNEatxZDkkMCwz94I8PBCtK2EkoRx9wdsN5y_T4-nsvQSu-9r2');
/*!40000 ALTER TABLE `data` ENABLE KEYS */;

--
-- Table structure for table `mydirectory`
--

DROP TABLE IF EXISTS `mydirectory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mydirectory` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Справочник родов вагонов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mydirectory`
--

/*!40000 ALTER TABLE `mydirectory` DISABLE KEYS */;
INSERT INTO `mydirectory` VALUES (1,'Полувагон'),(2,'Крытый вагон'),(3,'Платформа');
/*!40000 ALTER TABLE `mydirectory` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-15 13:07:28
