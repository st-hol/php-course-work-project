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

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exams` (
  `id_subject` int(11) NOT NULL AUTO_INCREMENT,
  `name_subject` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_subject`),
  UNIQUE KEY `name_subject_UNIQUE` (`id_subject`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exams`
--

LOCK TABLES `exams` WRITE;
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
INSERT INTO `exams` VALUES (1,'math'),(2,'physics'),(3,'english');
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id_role` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_role` varchar(5) NOT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `id` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialities`
--

DROP TABLE IF EXISTS `specialities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialities` (
  `id_speciality` int(11) NOT NULL AUTO_INCREMENT,
  `name_speciality` varchar(45) DEFAULT NULL,
  `id_university` int(11) NOT NULL,
  PRIMARY KEY (`id_speciality`),
  UNIQUE KEY `id_speciality_UNIQUE` (`id_speciality`),
  KEY `fk_specialities_universities1_idx` (`id_university`),
  CONSTRAINT `fk_specialities_universities1` FOREIGN KEY (`id_university`) REFERENCES `universities` (`id_university`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialities`
--

LOCK TABLES `specialities` WRITE;
/*!40000 ALTER TABLE `specialities` DISABLE KEYS */;
INSERT INTO `specialities` VALUES (1,'Computer Science',1),(2,'Software Engineering',1),(3,'Infrormation Technologies',1),(4,'Cybersecurity',1),(5,'Computer Engineering',1);
/*!40000 ALTER TABLE `specialities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id_student` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `rating` double DEFAULT '0',
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `id_role` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_student`),
  UNIQUE KEY `idstudent_UNIQUE` (`id_student`),
  KEY `fk_students_roles1_idx` (`id_role`),
  CONSTRAINT `fk_students_roles1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Stanislav','Holovachuk',193.33333333333334,'admin@gmail.com','1',1),(2,'Alex','Doroshenko',149.33333333333334,'user','1',2),(3,'James','Bond',0,'a','1',1),(4,'Petro ','Sagaydachnyi',145.66666666666666,'sdaf12fds21@gmail.com','1',2),(5,'eggor','egorka',0,'Egor','123',2),(6,'Maxxxim','Maximus',0,'max','321',2),(19,'stas','stasss',174,'st','1',2),(22,'ad','ad',0,'ad@gmail.com','1',1),(23,'123','123',123.66666666666667,'stanislav.holovachuk@gmail.com','123',2),(24,'stas','stas',155.438,'s@gmail.com','s',2),(25,'test','test',0,'test','1',1),(26,'vovan','vovan',0,'vova@gmail.com','1',2),(27,'Toha','Kartoha',0,'anton@gmail.com','1',2),(28,'alex','xXx',0,'alex@gmail.com','1',2),(29,'John','Snow',0,'oleksandr.kpi.tef@gmail.com','paasword',2);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER enrollling_trigger_on_update_students
after update ON `introductory_campaign`.`students`
FOR EACH ROW
begin
IF (SELECT rating FROM students where id_student = NEW.id_student) > 140 THEN
  UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '1' WHERE (`id_student` = new.id_student);
		#SET NEW.is_enrolled = 1;
ELSE
		#SET NEW.is_enrolled = 0;
	UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '0' WHERE (`id_student` = new.id_student);
END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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

--
-- Table structure for table `universities`
--

DROP TABLE IF EXISTS `universities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `universities` (
  `id_university` int(11) NOT NULL AUTO_INCREMENT,
  `name_university` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_university`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universities`
--

LOCK TABLES `universities` WRITE;
/*!40000 ALTER TABLE `universities` DISABLE KEYS */;
INSERT INTO `universities` VALUES (1,'KPI');
/*!40000 ALTER TABLE `universities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'introductory_campaign'
--

--
-- Dumping routines for database 'introductory_campaign'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-21 21:35:48
