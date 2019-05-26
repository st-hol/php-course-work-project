

drop trigger rating_calculator;

DELIMITER $$
CREATE TRIGGER rating_calculator AFTER update ON students_has_exams
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
END $$



#DELIMITER $$
#CREATE TRIGGER rating_calculator AFTER update ON students_has_exams
 # FOR EACH ROW begin

# checks if student passed ALL THREE exams (exams id_subject=1, id_subject=2, id_subject=3)
#if EXISTS (SELECT id_student FROM students_has_exams
#	WHERE id_subject IN (1,2,3) 
 #   and id_student = NEW.id_student
	#GROUP BY id_student
	#having (COUNT(distinct id_subject)=3)) THEN
#		UPDATE students SET rating = (SELECT AVG(exam_score) FROM students_has_exams WHERE id_student = NEW.id_student)
#        WHERE (id_student = NEW.id_student);
	
	#checks student rating: if > 140 - enrolled = true, else - false
#    IF (SELECT rating FROM students where id_student = NEW.id_student) > 140 THEN
#       UPDATE application_for_admission SET is_enrolled = 1 WHERE (id_student = new.id_student);
#	ELSE
#		UPDATE application_for_admission SET is_enrolled = 0 WHERE (id_student = new.id_student);
#	END IF;    
    
# if student haven't passed ALL THREE exams: make rating = 0, enrolled=false 
#else
# 	UPDATE students SET rating = 0 WHERE (id_student = NEW.id_student);
 #   UPDATE application_for_admission SET is_enrolled = 0 WHERE (id_student = NEW.id_student);
#End if;
#END $$
