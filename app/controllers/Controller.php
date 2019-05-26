<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 30/03/19
 * Time: 12:14
 */

require_once __DIR__ . "/../../core/TemplateEngine.php";


class Controller
{
    protected $templator;
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


    public function checkAllMiddleware(){
        $can_continue = false;
        if ( ! empty($this->middleware)) {
            foreach ($this->middleware as $middleware_class_name) {
                $mdw = new $middleware_class_name;
                //echo "<br><i>trying to process middleware</i>";
                if ($mdw->handle()){
                    $can_continue = true;
                } else {
                    $can_continue = false;
                    break;
                }
            }
        }
        return $can_continue;
    }

    public function callAction($method, $parameters=[]){
        return call_user_func_array(array($this, $method), $parameters);
    }

    public  function __call($method, $parameters=[])
    {
        print ("<br>Controller: Method [{$method}] does not exist");
    }



    //utility
    public function getIncludesByRole(){
        session_start();
        $role = $_SESSION['user-role'];

        if ($role == "ADMIN"){
            $sidebar = $this->templator->output( "admin/sidebar", []);
            $navbar = $this->templator->output( "admin/navbar", []);
        }elseif ($role == "STUDENT"){
            $sidebar = $this->templator->output( "user/sidebar", []);
            $navbar = $this->templator->output( "user/navbar", []);
        }else{
            $sidebar = $this->templator->output( "guest/sidebar", []);
            $navbar = $this->templator->output( "guest/navbar", []);
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