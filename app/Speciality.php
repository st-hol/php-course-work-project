<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 19/05/19
 * Time: 14:52
 */

class Speciality extends ORM
{
    /**
     * @return mixed
     */
    public function getAllSpecialities()
    {
        $specialitiesOrm = new Speciality("specialities");
        $specialities = $specialitiesOrm->select()->get();
        return $specialities;
    }

    /**
     *
     */
    public function editSpeciality(){
        //record creation.
        $speciality = new Speciality("specialities");
        $speciality->id_speciality = $_POST['idSpeciality'];
        $speciality->name_speciality = $_POST['nameSpeciality'];
        $speciality->id_university = $_POST['idUniversity'];
        $speciality->save($composite_primary = ["id_speciality" => $_POST['idSpeciality']]);
    }

    /**
     * @param $id_speciality_to_delete
     */
    public function deleteSpeciality($id_speciality_to_delete){
        $usersOrm = new Speciality("specialities");
        $usersOrm->delete()->where("id_speciality", "=", $id_speciality_to_delete)->get();
    }
}