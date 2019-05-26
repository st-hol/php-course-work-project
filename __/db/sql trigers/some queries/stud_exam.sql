select * from exam_scores left join students_has_exam_scores 
on exam_scores.id_subject = students_has_exam_scores.id_subject 
left join students
on students_has_exam_scores.id_student = students.id