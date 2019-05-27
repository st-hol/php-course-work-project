<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 02/05/19
 * Time: 13:23
 */


require_once "CommonController.php";
require_once __DIR__ . "/../middleware/AuthMiddleware.php";

require_once __DIR__ . "/../validators/UserValidator.php";

class AccountController extends Controller
{

    protected $middleware = ["AuthMiddleware"];

    public function login()
    {
        //check middleware
        if ($this->checkAllMiddleware()) {
            echo "<br><script>alert('Successful login.');</script>";
            //redirecting to reload personal-cabinet
            $dir = new CommonController();
            $dir->personalCabinet();
        } else {
            echo "<br><script>alert('User not found. Try again.');</script>";
            $dir = new CommonController();
            $dir->logMe();
        }

    }


    public function logout()
    {

        session_start();
//        $_SESSION['user-role'] = "UNKNOWN";
        session_unset();
        session_destroy();

        $dir = new CommonController();
        $dir->home();
    }


    public function register()
    {
        $dir = new CommonController();

        //validation fields by regex
        if (!(UserValidator::validateEmail($_POST['email']) and UserValidator::validatePassword($_POST['password']))) {
            echo "<br><script>alert('Bad input.');</script>";
            $dir->regMe();
            return;
        }

        // check already existing
        if (User::emailAlreadyTaken($_POST['email'], "students")) {
            echo "<br><script>alert('already existing record.');</script>";
            $dir->regMe();
            return;
        }


        User::registerUser();

        //redirecting to reload reg page
//        echo "<br><script>alert('account successfully created.');</script>";
        TemplateEngine::popUpMessageViaAlert('account successfully created.');
        $dir->regMe();
    }

}








//        header( 'Location: /php_course_work_project/reg-me', true, 303 ); // с помощью 303 редиректа переадресовать на внутреннюю страницу сайта.
//        $direction = new CommonController();
//        $direction->regMe();


//header('Location: /php_course_work_project/log-me', true, 303);

//$dir = new CommonController();
//$dir->personalCabinet();