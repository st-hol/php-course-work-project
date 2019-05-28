<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 19/05/19
 * Time: 15:15
 */

class ExamRegistration extends ORM
{
    /**
     *
     */
    public function rateExam()
    {
        //record update.
        $exam_reg = new ExamRegistration("students_has_exams");
        $exam_reg->id_student = $_POST['idStudent'];
        $exam_reg->id_subject = $_POST['idSubject'];
        $exam_reg->exam_score = $_POST['examScore'];
        $exam_reg->save($composite_primary = ["id_student" => $_POST['idStudent'], "id_subject" => $_POST['idSubject']]);
    }

    /**
     *
     */
    public function createExam(){
        //record creation.
        $exam = new ExamRegistration("exams");
        $exam->id_subject = $_POST['idSubject'];
        $exam->name_subject = $_POST['nameSubject'];
        $exam->save($composite_primary = ["id_subject" => $_POST['idSubject']]);
    }

    /**
     * @param $id_exam_to_delete
     */
    public function deleteExam($id_exam_to_delete){
        $examOrm = new ExamRegistration("exams");
        $examOrm->delete()->where("id_subject", "=", $id_exam_to_delete)->get();
    }

    /**
     * @param $user
     */
    public function registerForExam($user){
        //record creation.
        $exam_reg = new ExamRegistration("students_has_exams");
        $exam_reg->id_student = $user->id_student;
        $exam_reg->id_subject = $_POST['examId'];
        $exam_reg->save();
    }

    /**
     * @return mixed
     */
    public function getAllExams()
    {
        $examsOrm = new ExamRegistration("exams");
        $exams = $examsOrm->select()->get();
        return $exams;
    }


    /**
     * @return mixed
     */
    public function getAllExamsQuantity()
    {
        $examOrm = new ExamRegistration("exams");
        $all_exams_quantity = $examOrm->select("count(*) as cnt")->get()[0]->cnt;
        return $all_exams_quantity;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStudentPassedExamsQuantity($user)
    {
        $examOrm = new ExamRegistration("students_has_exams");
        $student_exams_quantity = $examOrm->select("count(*) as cnt")->where("id_student", "=", $user->id_student)->get()[0]->cnt;
        return $student_exams_quantity;
    }
}