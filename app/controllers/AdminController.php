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
require_once __DIR__ . "/../validators/NumberValidator.php";

class AdminController extends Controller
{

    protected $middleware = ["AdminRightsMiddleware", "LocaleMiddleware"];

    public function makeRate()
    {
        $lang = $this->localeMiddleware();

        //check middleware
        if ($this->checkAllMiddleware()) {

            $bars = $this->getIncludesByRole($lang);
            $sidebar = $bars[0];
            $navbar = $bars[1];

            $usersOrm = new User("students");
            $students = $usersOrm->select()->get();

            $examsOrm = new ExamRegistration("exams");
            $exams = $examsOrm->select()->get();

            $html = $this->templator->output( $lang."/admin/putmarks", ["students"=>$students, "exams"=>$exams, "sidebar"=>$sidebar, "navbar"=>$navbar]);
            $this->templator->showPage($html);
        } else {
            $dir = new ErrorController();
            $dir->error403forbidden();
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


        ExamRegistration::rateExam();


        echo "<br><script>alert('success');</script>";
        $this->makeRate();
        //header( 'Location: /php_course_work_project/rate', true, 303 );


    }

}
