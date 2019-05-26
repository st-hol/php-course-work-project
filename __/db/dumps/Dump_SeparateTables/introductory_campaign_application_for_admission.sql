-- MySQL dump 10.13  Distrib 5.7.23, for Win64 (x86_64)
--
-- Host: localhost    Database: introductory_campaign
-- ------------------------------------------------------
-- Server version	5.7.23

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
-- Table structure for table `application_for_admission`
--

DROP TABLE IF EXISTS `application_for_admission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_for_admission` (
  `id_application` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) NOT NULL,
  `id_speciality` int(11) NOT NULL,
  `is_enrolled` tinyint(1) unsigned zerofill DEFAULT '0',
  PRIMARY KEY (`id_application`),
  UNIQUE KEY `id_application_UNIQUE` (`id_application`),
  UNIQUE KEY `id_student_UNIQUE` (`id_student`),
  KEY `fk_application_foк_admission_specialities1_idx` (`id_speciality`),
  KEY `fk_application_for_admission_students1_idx` (`id_student`),
  CONSTRAINT `fk_application_for_admission_students1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_application_foк_admission_specialities1` FOREIGN KEY (`id_speciality`) REFERENCES `specialities` (`id_speciality`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_for_admission`
--

LOCK TABLES `application_for_admission` WRITE;
/*!40000 ALTER TABLE `application_for_admission` DISABLE KEYS */;
INSERT INTO `application_for_admission` VALUES (1,1,1,1),(7,2,1,1),(12,3,2,0),(28,4,3,1),(31,23,4,0),(32,24,5,1),(33,25,1,0),(34,26,2,0),(35,27,1,0);
/*!40000 ALTER TABLE `application_for_admission` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER enrolling_trigger_on_insert
BEFORE INSERT ON `introductory_campaign`.`application_for_admission`
FOR EACH ROW
begin
IF (SELECT rating FROM students where id_student = NEW.id_student) > 140 THEN
  #UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '1' WHERE (`id_student` = new.id_student);
		SET NEW.is_enrolled = 1;
ELSE
		SET NEW.is_enrolled = 0;
	#UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '0' WHERE (`id_student` = new.id_student);
END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER enrolling_trigger_on_update
BEFORE update ON `introductory_campaign`.`application_for_admission`
FOR EACH ROW
begin
IF (SELECT rating FROM students where id_student = NEW.id_student) > 140 THEN
  #UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '1' WHERE (`id_student` = new.id_student);
		SET NEW.is_enrolled = 1;
ELSE
		SET NEW.is_enrolled = 0;
	#UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '0' WHERE (`id_student` = new.id_student);
END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-21 21:33:21
