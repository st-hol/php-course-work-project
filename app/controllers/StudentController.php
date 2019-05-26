<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 02/05/19
 * Time: 13:23
 */


require_once __DIR__ . "/../mail/EmailSender.php";
require_once "Controller.php";
require_once "ErrorController.php";
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
            $dir = new ErrorController();
            $dir->error403forbidden();
        }
    }


    public function submitApplyForAdmission()
    {
        session_start();
        $user = $_SESSION['user'];

        $examOrm = new ExamRegistration("exams");
        $all_exams_quantity = $examOrm->select("count(*) as cnt")->get()[0]->cnt;
        $examOrm = new ExamRegistration("students_has_exams");
        $student_exams_quantity = $examOrm->select("count(*) as cnt")->where("id_student", "=", $user->id_student)->get()[0]->cnt;

        if ($all_exams_quantity == $student_exams_quantity) {

            //record creation.
            $app = new ApplicationForAdmission("application_for_admission");
            $app->id_student = $user->id_student;
            $app->id_speciality = $_POST['idSpeciality'];
            $app->save(["id_student" => $user->id_student]);


            $enrolled = $app->select()->where("id_student","=", $user->id_student)->get()[0]->is_enrolled;
            $enrolled = $enrolled == 1 ? true : false;

            //send email
            $notifier = new EmailSender();
            $notifier->notifyStudentByEmail($enrolled, $user->email);

            echo "<br><script>alert('successful apply!');</script>";
        } else {
            echo "<br><script>alert('you should pass all exams before apply!');</script>";
        }
        $this->makeApplyForAdmission();
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
            $dir = new ErrorController();
            $dir->error403forbidden();
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

