<?php

$query = rtrim($_GET['route'] = substr($_SERVER["REQUEST_URI"], strlen("php_course_work_project") + 2), '/'); // to cut "\php_course_work_project\" out
//echo "get:<br>".$query;

require_once 'core/Route.php';
require_once 'core/utility/util_functions.php';
require_once 'app/routes_web/web.php';


//echo "<a href=http://localhost/php_course_work_project/login.php>Click to log in.</a>";

define("APP", __DIR__ . "/app");
spl_autoload_register(function ($class) {
    $file = APP . "/controllers/$class.php";
    if (is_file($file)) {
        require_once $file;
    }
});


if (Route::getMethod() == "POST") {
    Route::dispatch($_POST);
} else if (Route::getMethod() == "GET") {
    Route::dispatch($query); //run
}
