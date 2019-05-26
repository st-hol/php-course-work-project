<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 02/05/19
 * Time: 13:23
 */


require_once "Controller.php";
require_once "CommonController.php";
require_once __DIR__ . "/../middleware/AdminRightsMiddleware.php";
require_once __DIR__ . "/../validators/NumberValidator.php";

class AdminController extends Controller
{

    protected $middleware = ["AdminRightsMiddleware"];

    public function makeRate()
    {
        //check middleware
        if ($this->checkAllMiddleware()) {

            $bars = $this->getIncludesByRole();
            $sidebar = $bars[0];
            $navbar = $bars[1];

            $usersOrm = new User("students");
            $students = $usersOrm->select()->get();

            $examsOrm = new ExamRegistration("exams");
            $exams = $examsOrm->select()->get();

            $html = $this->templator->output( "admin/putmarks", ["students"=>$students, "exams"=>$exams, "sidebar"=>$sidebar, "navbar"=>$navbar]);
            $this->templator->showPage($html);
        } else {
            $dir = new CommonController();
            $dir->home();
        }
    }


    public function submitRate()
    {

        //validation input by regexp
        if (!(NumberValidator::validateExamScore($_POST['examScore']))) {
            echo "<br><script>alert('Bad input.');</script>";
            $this->makeRate();
            return;
        }


        //record creation.
        $exam_reg = new ExamRegistration("students_has_exams");
        $exam_reg->id_student = $_POST['idStudent'];
        $exam_reg->id_subject = $_POST['idSubject'];
        $exam_reg->exam_score = $_POST['examScore'];
        $exam_reg->save($composite_primary = ["id_student" => $_POST['idStudent'], "id_subject" => $_POST['idSubject']]);

        echo "<br><script>alert('success');</script>";
        $this->makeRate();
        //header( 'Location: /php_course_work_project/rate', true, 303 );


    }

}
