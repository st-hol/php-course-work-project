<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 02/05/19
 * Time: 13:23
 */


require_once "Controller.php";
require_once "CommonController.php";
require_once __DIR__ . "/../middleware/StudentRightsMiddleware.php";

class StudentController extends Controller
{
    protected $middleware = ["StudentRightsMiddleware"];

    public function showAllEnrolled()
    {
        $bars = $this->getIncludesByRole();
        $sidebar = $bars[0];
        $navbar = $bars[1];


        //emulating join :)
        $usersOrm = new User("students S, application_for_admission A");
        $students = $usersOrm->select()
            ->where("S.id_student", "=", "A.id_student", " and ")
            ->where("A.is_enrolled", "=", "1")
            ->get();

        $html = $this->templator->output("user/enrolledlist", ["students" => $students, "sidebar" => $sidebar, "navbar" => $navbar]);
        $this->templator->showPage($html);
    }

    public function makeApplyForAdmission()
    {
        //check middleware
        if ($this->checkAllMiddleware()) {

            $bars = $this->getIncludesByRole();
            $sidebar = $bars[0];
            $navbar = $bars[1];

            $specialitiesOrm = new Speciality("specialities");
            $specialities = $specialitiesOrm->select()->get();

            $html = $this->templator->output("user/applyforadmission", ["specialities" => $specialities, "sidebar" => $sidebar, "navbar" => $navbar]);
            $this->templator->showPage($html);
        } else {
            $dir = new CommonController();
            $dir->home();
        }
    }

//todo notify
//todo 3exams need
    public function submitApplyForAdmission()
    {

        session_start();
        $user = $_SESSION['user'];

        //record creation.
        $app = new ApplicationForAdmission("application_for_admission");
        $app->id_student = $user->id_student;
        $app->id_speciality = $_POST['idSpeciality'];
        $app->save(["id_student" => $user->id_student]);

        echo "<br><script>alert('success!');</script>";
        $this->makeApplyForAdmission();
        //header( 'Location: /php_course_work_project/apply-admission', true, 303 );
    }

    public function makeRegForExam()
    {
        //check middleware
        if ($this->checkAllMiddleware()) {
            $bars = $this->getIncludesByRole();
            $sidebar = $bars[0];
            $navbar = $bars[1];

            $examsOrm = new ExamRegistration("exams");
            $exams = $examsOrm->select()->get();

            $html = $this->templator->output("user/regforexam", ["exams" => $exams, "sidebar" => $sidebar, "navbar" => $navbar]);
            $this->templator->showPage($html);
        } else {
            $dir = new CommonController();
            $dir->home();
        }
    }

    public function submitRegForExam()
    {
        session_start();
        $user = $_SESSION['user'];

        //record creation.
        $exam_reg = new ExamRegistration("students_has_exams");
        $exam_reg->id_student = $user->id_student;
        $exam_reg->id_subject = $_POST['examId'];
        $exam_reg->save();

        echo "<br><script>alert('success!');</script>";
        $this->makeRegForExam();
//        header( 'Location: /php_course_work_project/reg-exam', true, 303 );
    }

}






//$appOrm = new ApplicationForAdmission("application_for_admission");
//$apps = $appOrm->select()->where("is_enrolled", "=", "1")->get();
//
//
//$usersOrm = new User("students");
//$users = $usersOrm->select()->get();
//
//foreach ($users as $user){
//    foreach ($apps as $app){
//        if ($app->id_student = $user->id_student){
//
//        }
//    }
//
//}

