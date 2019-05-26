<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 30/03/19
 * Time: 20:06
 */

class CommonController extends Controller
{


    public function logMe(){
        $html = $this->templator->output( "guest/login", []);
        $this->templator->showPage($html);
    }

    public function regMe(){
        $html = $this->templator->output( "guest/registration", []);
        $this->templator->showPage($html);
    }


    // parametrized home command
    public function home(){
        session_start();
        $role = $_SESSION['user-role'];


        if ($role == "ADMIN"){
            $navbar = $this->templator->output( "admin/navbar", []);
        }elseif ($role == "STUDENT"){
            $navbar = $this->templator->output( "user/navbar", []);
        }else{
            $navbar = $this->templator->output( "guest/navbar", []);
        }

        $specialitiesOrm = new Speciality("specialities");
        $specialities = $specialitiesOrm->select()->get();

        $landing = $this->templator->output( "common/landing", ["specialities" => $specialities]);
        $html = $this->templator->output( "index", ["landing" => $landing, "navbar"=>$navbar]);
        $this->templator->showPage($html);
    }


    // parametrized personal-cabinet command
    public function personalCabinet(){
        session_start();
        $user = $_SESSION['user'];
        $role = $_SESSION['user-role'];

        if ($role == "ADMIN"){
            $sidebar = $this->templator->output( "admin/sidebar", []);
            $navbar = $this->templator->output( "admin/navbar", []);
            //$defaultcontent = $this->templator->output( "admin/defaultcontent", ["user"=>$user]);
            $html = $this->templator->output( "admin/adminbasis", ["sidebar"=>$sidebar, "navbar"=>$navbar, "user"=>$user]);
        }elseif ($role == "STUDENT"){
            $sidebar = $this->templator->output( "user/sidebar", []);
            $navbar = $this->templator->output( "user/navbar", []);
            //$defaultcontent = $this->templator->output( "user/defaultcontent", ["user"=>$user]);
            $html = $this->templator->output( "user/userbasis", ["sidebar"=>$sidebar, "navbar"=>$navbar, "user"=>$user]);
        }else{
            $this->home();
        }

        $this->templator->showPage($html);
    }

}
