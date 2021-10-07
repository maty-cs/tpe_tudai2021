<?php
require_once "./model/userModel.php";
require_once "./view/sessionView.php";

class sessionController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new userModel();
        $this->view = new sessionView();
    }

    function createSession(){
        $this->view->showSignIn();
    }

    function createUser(){
        if(!empty($_POST['email'] && $_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $this->model->insertUser($email, $password);
            $this->view->showLogin();
        }
    }

    function sessionLogout(){
        session_start();
        session_destroy();
        $this->view->showHome();
    }

    function sessionLogin(){
        $this->view->showLogin();
    }

    function verifySession(){
        if (!empty($_POST['email'] && $_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
     
            $user = $this->model->getUser($email);
     
            if ($user && password_verify($password, $user->clave)) {

                session_start();
                $_SESSION["email"] = $email;
                
                $this->view->showHome();
            } else {
                $this->view->showLogin("Error de verificación, pruebe de nuevo.");
            }
        }
    }

}