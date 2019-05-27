<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 19/05/19
 * Time: 14:52
 */

class ApplicationForAdmission extends ORM
{
    public function registerApplication($user)
    {
        //record creation.
        $app = new ApplicationForAdmission("application_for_admission");
        $app->id_student = $user->id_student;
        $app->id_speciality = $_POST['idSpeciality'];
        $app->save(["id_student" => $user->id_student]);
    }


    public function isEnrolledStudent($user)
    {
        $app = new ApplicationForAdmission("application_for_admission");
        $enrolled = $app->select()->where("id_student", "=", $user->id_student)->get()[0]->is_enrolled;
        $enrolled = $enrolled == 1 ? true : false;
        return $enrolled;
    }
}