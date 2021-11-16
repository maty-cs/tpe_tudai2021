<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class sessionView{

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showLogin($error = ""){
        $this->smarty->assign('mensaje', $error);      
        $this->smarty->assign('titulo', "Login");
        $this->smarty->display('templates/session_v1.tpl');
    }

    function showSignIn(){   
        $this->smarty->assign('titulo', "Sign In");
        $this->smarty->display('templates/registro.tpl');
    }

    function showHome(){
        header("Location: ".BASE_URL."home");
    }

    function showSessions($users){
        $this->smarty->assign('users', $users);
        $this->smarty->assign('titulo', "Administrador");
        $this->smarty->display('templates/adminSession.tpl');
    }
}