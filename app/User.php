<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 19/05/19
 * Time: 14:52
 */

class User extends ORM
{

    public static function getIdRoleByValue($role_value){
        if($role_value == "ADMIN"){
            return 1;
        }
        else if ($role_value == "STUDENT") {
            return 2;
        }
        else {
            return 0;
        }
    }

    public static function getRoleValueById($role_id){
        if($role_id == 1){
            return "ADMIN";
        }
        else if ($role_id == 2) {
            return "STUDENT";
        }
        else {
            return "UNKNOWN";
        }
    }

    public static function emailAlreadyTaken($email, $table = ""){
        $userOrm = new self($table);
        $res = $userOrm->select()->where("email", "=", "'$email'")->get();
        if (count($res) != 0){
            return true;
        }
        return false;
    }

}




