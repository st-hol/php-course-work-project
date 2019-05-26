
drop trigger enrolling_trigger_on_update;

delimiter //
CREATE TRIGGER enrolling_trigger_on_update
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
END




