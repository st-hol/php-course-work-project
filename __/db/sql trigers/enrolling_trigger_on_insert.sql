
drop trigger enrolling_trigger_on_insert;



delimiter //
CREATE TRIGGER enrolling_trigger_on_insert
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
END







#delimiter //
#CREATE TRIGGER enrolling_trigger AFTER insert
# ON application_for_admission
# FOR EACH ROW begin
#IF (SELECT rating FROM students where id_student = NEW.id_student) > 140 THEN
#  UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '1' WHERE (`id_student` = new.id_student);
#ELSE
#	UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '0' WHERE (`id_student` = new.id_student);
#END IF;
#END //








#  delimiter //
#CREATE TRIGGER enrolling_trigger AFTER update ON students
 # FOR EACH ROW begin
             
	#IF NEW.rating > 140 THEN
     #  UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '1' WHERE (`id_student` = new.id_student);
	#ELSE
	#	UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '0' WHERE (`id_student` = new.id_student);
	#END IF;
#END //

#ELSEIF NEW.rating < 140 THEN

















#  delimiter //
#CREATE TRIGGER enrolling_trigger AFTER update ON students
#  FOR EACH ROW 
#  
 # if EXISTS (SELECT id_student FROM students_has_exams
#	WHERE id_subject IN (1,2,3) 
  #  and id_student = NEW.id_student
	#GROUP BY id_student
	#having (COUNT(distinct id_subject)=3)) THEN
               
	#	IF NEW.rating > 140 THEN
     #          UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '1' WHERE (`id_student` = new.id_student);
		#END IF;
        #   ELSEIF NEW.rating < 140 THEN
         #       UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '0' WHERE (`id_student` = new.id_student);
		#END IF;
#END if;
#END //
