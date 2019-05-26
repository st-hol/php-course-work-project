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
require_once __DIR__ . "/../validators/UserValidator.php";


class CmsController extends Controller
{
    protected $middleware = ["AdminRightsMiddleware"];


    //users
    public function editUsers()
    {
        //check middleware
        if ($this->checkAllMiddleware()) {

            $usersOrm = new User("students");
            $students = $usersOrm->select()->get();

            $html = $this->templator->output("cms/edit_users", ["students" => $students]);
            $this->templator->showPage($html);
        } else {
            $dir = new CommonController();
            $dir->home();
        }
    }


    public function submitEditUser()
    {
        //record creation.
        $user = new User("students");
        $user->id_student = $_POST['idStudent'];
        $user->first_name = $_POST['firstName'];
        $user->last_name = $_POST['lastName'];
        $user->rating = $_POST['rating'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        //$id_role = $user->getIdRoleByValue($_POST['role']);
        $user->id_role = $_POST['idRole'];
        $user->save($composite_primary = ["id_student" => $_POST['idStudent']]);

        //redirecting to reload reg page
        echo "<br><script>alert('success.');</script>";
        $this->editUsers();
    }


    public function deleteUser($id_student_to_delete)
    {
        //check middleware
        if ($this->checkAllMiddleware()) {
            $usersOrm = new User("students");
            $usersOrm->delete()->where("id_student", "=", $id_student_to_delete)->get();

            echo "<br><script>alert('deleted.');</script>";
            $this->editUsers();
        } else {
            $dir = new CommonController();
            $dir->home();
        }
    }


    //exams
    public function editExams()
    {
        //check middleware
        if ($this->checkAllMiddleware()) {
            $examOrm = new ExamRegistration("exams");
            $exams = $examOrm->select()->get();

            $html = $this->templator->output("cms/edit_exams", ["exams" => $exams]);
            $this->templator->showPage($html);
        } else {
            $dir = new CommonController();
            $dir->home();
        }
    }


    public function submitEditExam()
    {
        //record creation.
        $exam = new ExamRegistration("exams");
        $exam->id_subject = $_POST['idSubject'];
        $exam->name_subject = $_POST['nameSubject'];
        $exam->save($composite_primary = ["id_subject" => $_POST['idSubject']]);

        //redirecting to reload reg page
        echo "<br><script>alert('success.');</script>";
        $this->editExams();
    }


    public function deleteExam($id_exam_to_delete)
    {
        //check middleware
        if ($this->checkAllMiddleware()) {
            $examOrm = new ExamRegistration("exams");
            $examOrm->delete()->where("id_subject", "=", $id_exam_to_delete)->get();

            echo "<br><script>alert('deleted.');</script>";
            $this->editExams();
        } else {
            $dir = new CommonController();
            $dir->home();
        }
    }


    //specialities
    public function editSpecialities()
    {
        //check middleware
        if ($this->checkAllMiddleware()) {
            $specialityOrm = new Speciality("specialities");
            $specialities = $specialityOrm->select()->get();

            $html = $this->templator->output("cms/edit_specialities", ["specialities" => $specialities]);
            $this->templator->showPage($html);
        } else {
            $dir = new CommonController();
            $dir->home();
        }
    }


    public function submitEditSpeciality()
    {
        //record creation.
        $speciality = new Speciality("specialities");
        $speciality->id_speciality = $_POST['idSpeciality'];
        $speciality->name_speciality = $_POST['nameSpeciality'];
        $speciality->id_university = $_POST['idUniversity'];
        $speciality->save($composite_primary = ["id_speciality" => $_POST['idSpeciality']]);

        //redirecting to reload reg page
        echo "<br><script>alert('success.');</script>";
        $this->editSpecialities();
    }


    public function deleteSpeciality($id_speciality_to_delete)
    {
        //check middleware
        if ($this->checkAllMiddleware()) {
            $usersOrm = new Speciality("specialities");
            $usersOrm->delete()->where("id_speciality", "=", $id_speciality_to_delete)->get();

            echo "<br><script>alert('deleted.');</script>";
            $this->editSpecialities();
        } else {
            $dir = new CommonController();
            $dir->home();
        }
    }

}








//        header( 'Location: /php_course_work_project/reg-me', true, 303 ); // с помощью 303 редиректа переадресовать на внутреннюю страницу сайта.
//        $direction = new CommonController();
//        $direction->regMe();


//header('Location: /php_course_work_project/log-me', true, 303);

//$dir = new CommonController();
//$dir->personalCabinet();