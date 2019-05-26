<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 30/03/19
 * Time: 20:06
 */

class ErrorController extends Controller
{

    public function error403forbidden(){
        $html = $this->templator->output( "error/403", []);
        $this->templator->showPage($html);
    }


    public function error404notfound(){
        $html = $this->templator->output( "error/404", []);
        $this->templator->showPage($html);
    }

}
