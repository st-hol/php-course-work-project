


UPDATE students SET rating =
(SELECT AVG(exam_score)
FROM students_has_exams
 WHERE id_student = 1) 
 WHERE (id_student = 1);