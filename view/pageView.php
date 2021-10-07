<?php
    require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

    class pageView{
        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();
        }

        function printPage($products, $categorias, $users){
            $this->smarty->assign('products', $products);
            $this->smarty->assign('categorias', $categorias);
            $this->smarty->assign('users', $users);
            $this->smarty->display('./templates/bodyProductos.tpl');
        }

        function showHomeLocation(){
            header("Location: ".BASE_URL."home");
        }

        function showLoginLocation(){
            header("Location: ".BASE_URL."login");
        }
    }