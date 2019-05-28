<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 30/03/19
 * Time: 20:06
 */

class CommonController extends Controller
{

    protected $middleware = ["LocaleMiddleware"];

    public function logMe(){
        $lang = $this->localeMiddleware();

        $html = $this->templator->output( $lang."/guest/login", []);
        $this->templator->showPage($html);
    }

    public function regMe(){
        $lang = $this->localeMiddleware();

        $html = $this->templator->output( $lang."/guest/registration", []);
        $this->templator->showPage($html);
    }


    // home command
    public function home(){

        $lang = $this->localeMiddleware();

        session_start();
        $role = $_SESSION['user-role'];


        if ($role == "ADMIN"){
            $navbar = $this->templator->output( $lang."/admin/navbar", []);
        }elseif ($role == "STUDENT"){
            $navbar = $this->templator->output( $lang."/user/navbar", []);
        }else{
            $navbar = $this->templator->output( $lang."/guest/navbar", []);
        }

        $specialities = Speciality::getAllSpecialities();

        $landing = $this->templator->output( $lang."/common/landing", ["specialities" => $specialities]);
        $html = $this->templator->output( $lang."/index", ["landing" => $landing, "navbar"=>$navbar]);
        $this->templator->showPage($html);
    }


    // parametrized personal-cabinet command
    public function personalCabinet(){

        $lang = $this->localeMiddleware();

        session_start();
        $user = $_SESSION['user'];
        $role = $_SESSION['user-role'];

        $bars = $this->getIncludesByRole($lang);
        $sidebar = $bars[0];
        $navbar = $bars[1];

        if ($role == "ADMIN"){
            $html = $this->templator->output( $lang."/admin/adminbasis", ["sidebar"=>$sidebar, "navbar"=>$navbar, "user"=>$user]);
        }elseif ($role == "STUDENT"){
            $html = $this->templator->output( $lang."/user/userbasis", ["sidebar"=>$sidebar, "navbar"=>$navbar, "user"=>$user]);
        }else{
            $this->home();
        }

        $this->templator->showPage($html);
    }

}
