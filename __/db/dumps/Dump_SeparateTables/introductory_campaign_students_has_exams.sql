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
-- Table structure for table `students_has_exams`
--

DROP TABLE IF EXISTS `students_has_exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students_has_exams` (
  `id_student` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `exam_score` double DEFAULT '0',
  PRIMARY KEY (`id_student`,`id_subject`),
  KEY `fk_students_has_exams_exams1_idx` (`id_subject`),
  KEY `fk_students_has_exams_students1_idx` (`id_student`),
  CONSTRAINT `fk_students_has_exams_exams1` FOREIGN KEY (`id_subject`) REFERENCES `exams` (`id_subject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_has_exams_students1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students_has_exams`
--

LOCK TABLES `students_has_exams` WRITE;
/*!40000 ALTER TABLE `students_has_exams` DISABLE KEYS */;
INSERT INTO `students_has_exams` VALUES (1,1,200),(1,2,200),(1,3,180),(2,1,128),(2,2,120),(2,3,200),(4,1,143),(4,2,147),(4,3,147),(23,1,1),(23,2,170),(23,3,200),(24,1,124),(24,2,173.314),(24,3,169),(25,1,101),(26,1,0),(26,2,0),(26,3,0),(27,1,0),(27,2,0),(28,1,0),(28,2,0);
/*!40000 ALTER TABLE `students_has_exams` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER rating_calculator AFTER update ON students_has_exams
 FOR EACH ROW begin
 
# checks if student passed ALL THREE exams (exams id_subject=1, id_subject=2, id_subject=3)
if EXISTS (SELECT id_student FROM students_has_exams
	WHERE id_subject IN (1,2,3) 
   and id_student = NEW.id_student
	GROUP BY id_student
	having (COUNT(distinct id_subject)=3)) THEN
		UPDATE students SET rating = (SELECT AVG(exam_score) FROM students_has_exams WHERE id_student = NEW.id_student)
       WHERE (id_student = NEW.id_student);
	  
# if student haven't passed ALL THREE exams: make rating = 0, enrolled=false 
else
	UPDATE students SET rating = 0 WHERE (id_student = NEW.id_student);
    UPDATE application_for_admission SET is_enrolled = 0 WHERE (id_student = NEW.id_student);
End if;
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
