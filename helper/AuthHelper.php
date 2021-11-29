<?php

class AuthHelper{

    function __construct(){
    }

    function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION["start"])){
            return false;
        }else{
            return true;
        }
    }
    function checkAdmin(){
        if($this->checkLoggedIn()){
            if(isset($_SESSION) && $_SESSION['rol']=='admin'){
                return true;
            }
            else{
                return false;
            }
        }else{
            return false;
        }
    }
}