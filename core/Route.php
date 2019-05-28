<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 30/03/19
 * Time: 12:37
 */

require_once __DIR__ . "/../app/middleware/AuthMiddleware.php";


/**
 * Class Route
 */
class Route
{
    /**
     * @var null
     */
    protected static $instance = null;
    /**
     * @var array
     */
    protected static $routes = [];
    /**
     * @var array
     */
    protected static $routesPost = [];
    /**
     * @var array
     */
    protected static $route = [];

    /**
     * Route constructor.
     */
    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    /**
     * @return null|Route
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }


//    public static function add($regexp, $route = []){
//        self::$routes[$regexp] = $route;
//    }
    /**
     * @param $regexp
     * @param $stringData_controllerMethod
     */
    public static function add($regexp, $stringData_controllerMethod)
    {
        $data = explode('@', $stringData_controllerMethod);
        $route = [];
        $route['controller'] = $data[0];
        $route['action'] = $data[1];

        self::$routes[$regexp] = $route;
    }

    /**
     * @param $regexp
     * @param $stringData_controllerMethod
     */
    public static function addPost($regexp, $stringData_controllerMethod)
    {
        $data = explode('@', $stringData_controllerMethod);
        $route = [];
        $route['controller'] = $data[0];
        $route['action'] = $data[1];

        self::$routesPost[$regexp] = $route;
    }

    /**
     * @param $url
     */
    public static function dispatch($url)
    {
        $matcher_response = self::matchRoute($url);

        if ($matcher_response['is_matched']) {

            $controller = self::$route['controller'];


            if (class_exists($controller)) {
                $controllerObj = new $controller; // create controller
                $action = self::$route['action']; // access method


                if (method_exists($controllerObj, $action)) {

//                    echo "<p style='color: darkblue'><br>trying to execute <strong>$action</strong>" .
//                        " of <strong>$controller</strong></p>";

                    call_user_func_array([$controllerObj, $action], $matcher_response['var_param']);
                   // echo "<br><p style='color: green'>executed</p>";

                } else {
                    echo "<p style='color: orangered'>method <strong>$action</strong>" .
                        " in controller <strong>$controller</strong>  not found</p>";
                }

            } else {
                echo "<p style='color: red'>controller <strong>$controller</strong> not exist</p>";
            }
            //debug(Route::getRoute());
        } else {
            require __DIR__ . "/../view/error/404._blade.php";
            http_response_code(404);
        }
    }


    /**
     * @param $url
     * @return array
     */
    public static function matchRoute($url)
    {
        $url_is_equal = false;

        //echo "<span style='color: seagreen;'>used method: </span>" . self::getMethod() . "\n<br>";

        //1.check method
        if (self::getMethod() == "POST") {
            $incoming_url_query_parts = array_values($url);//in case $url is an array $_POST[]
            $appropriate_routes = self::$routesPost;
        } elseif (self::getMethod() == "GET") {
            $incoming_url_query_parts = explode('/', $url);
            $appropriate_routes = self::$routes;
        }
//        echo "<p style='color: blueviolet'> URL PARTS: </p>";
//        debug($incoming_url_query_parts);

        foreach ($appropriate_routes as $pattern => $route) {
            $noted_url_query_parts = explode('/', $pattern); //example: "posts/add" --- [posts, add]

            //2.check N
            if (count($incoming_url_query_parts) != count($noted_url_query_parts)) {
                continue; // if elements quantity are not equal --- don't check it
            }

            $var_param = []; // reset before cycle
            for ($i = 0; $i < count($noted_url_query_parts); $i++) { // for each word in query. example: [posts, add] as 1)posts...2)add
                $part_of_noted_pattern = $noted_url_query_parts[$i];
                $part_of_incoming_pattern = $incoming_url_query_parts[$i];

                $url_is_equal = false; // reset the logical counter
                //3.check if "{" is in
                if ($part_of_noted_pattern[0] == '{') {
                    $var_param[] = $incoming_url_query_parts[$i]; // remembering variable param
                    self::$route = $route;
                    $url_is_equal = true;
                    continue; // if it is {variable} param --- it always matches
                }

                $url_is_equal = false; // reset the logical counter
                if ($part_of_noted_pattern == $part_of_incoming_pattern) {
                    self::$route = $route;
                    $url_is_equal = true;
                } else {
                    break;
                    //$url_is_equal = false;
                }
            }
            if ($url_is_equal) {
//                ECHO "<BR><p style='color: crimson'>THE MATCHED ROUTE IS :</p>";
//                debug(self::$route);
//                ECHO "<br>";
                return ['is_matched' => true, 'var_param' => $var_param]; //if matched - return true, param - array
            }
        }
        return ['is_matched' => false, 'var_param' => null]; //if not found - return false, param - null
    }


    //    public static function matchRoute($url){
    //        //echo $url;
    //        foreach (self::$routes as $pattern => $route){
    //            if ($url == $pattern){
    //                self::$route = $route;
    //                return true;
    //            }
    //        }
    //        return false;
    //    }

    /**
     * @return array
     */
    public static function getRoutes(): array
    {
        return self::$routes;
    }

    /**
     * @return array
     */
    public static function getRoute(): array
    {
        return self::$route;
    }

    /**
     * @return array
     */
    public static function getRoutesPost(): array
    {
        return self::$routesPost;
    }


    /**
     * @return mixed
     */
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}































