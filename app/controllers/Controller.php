<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 30/03/19
 * Time: 12:14
 */

require_once __DIR__ . "/../../core/TemplateEngine.php";
require_once __DIR__ . "/../middleware/LocaleMiddleware.php";

/**
 * Class Controller
 */
class Controller
{
    /**
     * @var TemplateEngine
     */
    protected $templator;
    /**
     * @var array
     */
    protected $middleware = [];

    /**
     * Controller constructor.
     * @param $templator
     */
    public function __construct()
    {
        $this->templator = new TemplateEngine();


    }

    /**
     * @return array
     */
    public function getMiddleware(): array
    {
        return $this->middleware;
    }


    /**
     * @return bool
     */
    public function checkAllMiddleware()
    {
        $can_continue = false;
        if (!empty($this->middleware)) {
            foreach ($this->middleware as $middleware_class_name) {
                $mdw = new $middleware_class_name;
                //echo "<br><i>trying to process middleware</i>";
                if ($mdw->handle()) {
                    $can_continue = true;
                } else {
                    $can_continue = false;
                    break;
                }
            }
        }
        return $can_continue;
    }

    public function localeMiddleware()
    {
        if (in_array("LocaleMiddleware", $this->middleware)) {
            $mdw = new LocaleMiddleware();
            $lang = $mdw->handle();
            return $lang;
        }
        else {
            return "ua"; //by default
        }
    }

    /**
     * @param $method
     * @param array $parameters
     * @return mixed
     */
    public function callAction($method, $parameters = [])
    {
        return call_user_func_array(array($this, $method), $parameters);
    }

    /**
     * @param $method
     * @param array $parameters
     */
    public function __call($method, $parameters = [])
    {
        print ("<br>Controller: Method [{$method}] does not exist");
    }



    //utility

    /**
     * @return array
     */
    public function getIncludesByRole($lang)
    {
       // $lang = $this->localeMiddleware();

        session_start();
        $role = $_SESSION['user-role'];

        if ($role == "ADMIN") {
            $sidebar = $this->templator->output($lang."/admin/sidebar", []);
            $navbar = $this->templator->output($lang."/admin/navbar", []);
        } elseif ($role == "STUDENT") {
            $sidebar = $this->templator->output($lang."/user/sidebar", []);
            $navbar = $this->templator->output($lang."/user/navbar", []);
        } else {
            $sidebar = $this->templator->output($lang."/guest/sidebar", []);
            $navbar = $this->templator->output($lang."/guest/navbar", []);
        }

        return [$sidebar, $navbar];
    }

}













////check middleware
//if( ! empty($this->middleware)) {
//    if ($this->checkAllMiddleware()) {
//        //echo "<br>MiddleWare passed";
//        // echo "<br><script>alert('MiddleWare passed.');</script>";
//    } else {
//        //echo "<br><script>alert('Middleware not passed.');</script>";
//        //todo header("invalid_route.php");
//    }
//}