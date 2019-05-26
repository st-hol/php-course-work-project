select id_student, count(1) as cnt from students_has_exams group by id_student;

SELECT id_student FROM students_has_exams 
WHERE EXISTS (SELECT * from students_has_exams where id_student = 1 and id_subject=1) 
and exists (SELECT * from students_has_exams where id_student = 1 and id_subject=2)
and exists (SELECT * from students_has_exams where id_student = 1 and id_subject=3); 

SELECT id_student FROM students_has_exams
WHERE id_subject IN (1,2,3) 
# and id_student =1
GROUP BY id_student
having (COUNT(distinct id_subject)=3)
;
