<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 02/05/19
 * Time: 13:23
 */


require_once "Controller.php";
require_once "CommonController.php";
require_once "ErrorController.php";
require_once __DIR__ . "/../middleware/AdminRightsMiddleware.php";
require_once __DIR__ . "/../validators/UserValidator.php";


class CmsController extends Controller
{
    protected $middleware = ["AdminRightsMiddleware"];


    //users
    public function editUsers()
    {
        //check middleware
        if ($this->checkAllMiddleware()) {

            $students = User::getAllUsers();

            $html = $this->templator->output("cms/edit_users", ["students" => $students]);
            $this->templator->showPage($html);
        } else {
            $dir = new ErrorController();
            $dir->error403forbidden();
        }
    }


    public function submitEditUser()
    {
        User::createUser();

        //redirecting to reload reg page
        echo "<br><script>alert('success.');</script>";
        $this->editUsers();
    }


    public function deleteUser($id_student_to_delete)
    {
        //check middleware
        if ($this->checkAllMiddleware()) {

            User::deleteUser($id_student_to_delete);

            echo "<br><script>alert('deleted.');</script>";
            $this->editUsers();
        } else {
            $dir = new ErrorController();
            $dir->error403forbidden();
        }
    }


    //exams
    public function editExams()
    {
        //check middleware
        if ($this->checkAllMiddleware()) {
            $exams = ExamRegistration::getAllExams();

            $html = $this->templator->output("cms/edit_exams", ["exams" => $exams]);
            $this->templator->showPage($html);
        } else {
            $dir = new ErrorController();
            $dir->error403forbidden();
        }
    }


    public function submitEditExam()
    {
        ExamRegistration::createExam();

        //redirecting to reload reg page
        echo "<br><script>alert('success.');</script>";
        $this->editExams();
    }


    public function deleteExam($id_exam_to_delete)
    {
        //check middleware
        if ($this->checkAllMiddleware()) {
            ExamRegistration::deleteExam($id_exam_to_delete);

            echo "<br><script>alert('deleted.');</script>";
            $this->editExams();
        } else {
            $dir = new ErrorController();
            $dir->error403forbidden();
        }
    }


    //specialities
    public function editSpecialities()
    {
        //check middleware
        if ($this->checkAllMiddleware()) {
            $specialities = Speciality::getAllSpecialities();

            $html = $this->templator->output("cms/edit_specialities", ["specialities" => $specialities]);
            $this->templator->showPage($html);
        } else {
            $dir = new ErrorController();
            $dir->error403forbidden();
        }
    }


    public function submitEditSpeciality()
    {
        Speciality::editSpeciality();

        //redirecting to reload reg page
        echo "<br><script>alert('success.');</script>";
        $this->editSpecialities();
    }


    public function deleteSpeciality($id_speciality_to_delete)
    {
        //check middleware
        if ($this->checkAllMiddleware()) {
            Speciality::deleteSpeciality($id_speciality_to_delete);

            echo "<br><script>alert('deleted.');</script>";
            $this->editSpecialities();
        } else {
            $dir = new ErrorController();
            $dir->error403forbidden();
        }
    }

}








//        header( 'Location: /php_course_work_project/reg-me', true, 303 ); // с помощью 303 редиректа переадресовать на внутреннюю страницу сайта.
//        $direction = new CommonController();
//        $direction->regMe();


//header('Location: /php_course_work_project/log-me', true, 303);

//$dir = new CommonController();
//$dir->personalCabinet();