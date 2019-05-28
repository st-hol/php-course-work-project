<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 19/05/19
 * Time: 14:52
 */

class User extends ORM
{

    /**
     * @return mixed
     */
    public function getAllUsers(){
        $usersOrm = new User("students");
        $students = $usersOrm->select()->get();
        return $students;
    }


    /**
     *
     */
    public function createUser(){
        //record creation.
        $user = new User("students");
        $user->id_student = $_POST['idStudent'];
        $user->first_name = $_POST['firstName'];
        $user->last_name = $_POST['lastName'];
        $user->rating = $_POST['rating'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->id_role = $_POST['idRole'];
        $user->save($composite_primary = ["id_student" => $_POST['idStudent']]);
    }

    /**
     * @param $id_student_to_delete
     */
    public function deleteUser($id_student_to_delete){
        $usersOrm = new User("students");
        $usersOrm->delete()->where("id_student", "=", $id_student_to_delete)->get();
    }


    /**
     * @param $role_value
     * @return int
     */
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


    /**
     *
     */
    public function registerUser(){

        //record creation.
        $user = new User("students");
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];

        $id_role = $user->getIdRoleByValue($_POST['role']);
        $user->id_role = $id_role;

        $user->first_name = $_POST['firstName'];
        $user->last_name = $_POST['lastName'];

        $user->save();
    }


    /**
     * @return mixed
     */
    public function getEnrolled(){
        //emulating join :)
        $usersOrm = new User("students S, application_for_admission A");
        $students = $usersOrm->select()
            ->where("S.id_student", "=", "A.id_student", " and ")
            ->where("A.is_enrolled", "=", "1")
            ->get();
        return $students;
    }


    /**
     * @param $role_id
     * @return string
     */
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

    /**
     * @param $email
     * @param string $table
     * @return bool
     */
    public static function emailAlreadyTaken($email, $table = ""){
        $userOrm = new self($table);
        $res = $userOrm->select()->where("email", "=", "'$email'")->get();
        if (count($res) != 0){
            return true;
        }
        return false;
    }



}




