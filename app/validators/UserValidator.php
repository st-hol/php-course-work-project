<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 25/05/19
 * Time: 16:16
 */

class UserValidator
{

    private static $EMAIL_REGEXP = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    private static $PASSWORD_REGEXP = "/^[a-zA-Z0-9_-]*$/";

    public static function validateEmail($email_value)
    {
        return $email_value != null && preg_match(self::$EMAIL_REGEXP, $email_value) == true;
    }

    public static function validatePassword($password_value)
    {
        return $password_value != null && preg_match(self::$PASSWORD_REGEXP, $password_value) == true;
    }

}

//tests
//echo UserValidator::validateEmail("safds@gmaik.com") ? 1 : 0;
//echo UserValidator::validatePassword("1") ? 1 : 0;