<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 02/05/19
 * Time: 12:02
 */


//importing all model classes
define("APP", __DIR__ . "/..");
spl_autoload_register(/**
 * @param $class
 */
    function ($class) {
    $file = APP . "/$class.php";
    if (is_file($file)) {
        require_once $file;
    }
});


/**
 * Class Middleware
 */
class Middleware
{
    /**
     * @return bool
     */
    public function handle(){
        return true;
    }

    /**
     * @return bool
     */
    public function run(){
        return true;
    }
}