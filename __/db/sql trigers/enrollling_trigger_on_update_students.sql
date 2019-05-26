
#drop trigger enrollling_trigger_on_update_students;

delimiter //
CREATE TRIGGER enrollling_trigger_on_update_students
after update ON `introductory_campaign`.`students`
FOR EACH ROW
begin
IF (SELECT rating FROM students where id_student = NEW.id_student) > 140 THEN
  UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '1' WHERE (`id_student` = new.id_student);
ELSE
	UPDATE `introductory_campaign`.`application_for_admission` SET `is_enrolled` = '0' WHERE (`id_student` = new.id_student);
END IF;
END