<?php
require_once './model/userModel.php';

class authHelper{

    private $model;

    function __construct(){
        $this->model = new userModel();
    }

    function checkSession(){
        session_start();
        if(!isset($_SESSION["email"])){
            header("Location: ".BASE_URL."login");
        }
    }

    function checkAdmin(){
        session_start();
        if(!isset($_SESSION["email"])){
            header("Location: ".BASE_URL."login");
        }
        else{
            $user = $this->model->getUser($_SESSION["email"]);
            if($user->admin != 1){
                header("Location: ".BASE_URL."home");
            }
        }
    }

}