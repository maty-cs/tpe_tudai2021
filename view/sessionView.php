<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class sessionView{

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showLogin($error = ""){
        $this->smarty->assign('mensaje', $error);      
        $this->smarty->display('templates/session_v1.tpl');
    }

    function showSignIn(){   
        $this->smarty->display('templates/registro.tpl');
    }

    function showHome(){
        header("Location: ".BASE_URL."home");
    }
}