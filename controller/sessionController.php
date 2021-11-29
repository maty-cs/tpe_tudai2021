<?php
require_once "./model/userModel.php";
require_once "./view/sessionView.php";
require_once "./helpers/authHelper.php";

class sessionController {

    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this->model = new userModel();
        $this->view = new sessionView();
        $this->authHelper = new authHelper();
    }

    function createSession(){
        $this->view->showSignIn();
    }

    function createUser(){
        if(!empty($_POST['email'] && $_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->model->insertUser($email, $password);

            $user = $this->model->getUser($email);
            if($user && password_verify($password, $user->clave)){
                session_start();
                $_SESSION["email"] = $email;
                
                $this->view->showHome();
            }
            else{
                $this->view->showLogin("Error de verificación, pruebe de nuevo.");
            }
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
     
            if($user && password_verify($password, $user->clave)){

                session_start();
                $_SESSION["email"] = $email;
                
                $this->view->showHome();
            } 
            else{
                $this->view->showLogin("Error de verificación, pruebe de nuevo.");
            }
        }
    }

    function adminSessions(){
        $this->authHelper->checkAdmin();
        $users = $this->model->getUsers();
        $this->view->showSessions($users);
    }

    function giveRol(){
        $this->authHelper->checkAdmin();

        if(!empty($_POST['id'])){
            $id = $_POST['id'];

            $this->model->setAdmin($id);

            $users = $this->model->getUsers();
            $this->view->showSessions($users);
        }
        else{
            $users = $this->model->getUsers();
            $this->view->showSessions($users);
        }
    }

    function deleteRol(){
        $this->authHelper->checkAdmin();
        if(isset($_POST['id'])){
            $id = $_POST['id'];

            $this->model->deleteAdmin($id);
            
            $users = $this->model->getUsers();
            $this->view->showSessions($users);
        }
        else{
            $users = $this->model->getUsers();
            $this->view->showSessions($users);
        }
    }

    function deleteUser(){
        $this->authHelper->checkSession();
        if(isset($_POST['id'])){
            $id = $_POST['id'];

            $this->model->deleteAccount($id);
            
            $users = $this->model->getUsers();
            $this->view->showSessions($users);
        }
        else{
            $users = $this->model->getUsers();
            $this->view->showSessions($users);
        }
    }
}