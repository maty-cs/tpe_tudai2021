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

            if (!empty($_SESSION["email"])) {
                $this->smarty->assign('currentUser', $_SESSION["email"]);
            }
            
                $this->smarty->assign('titulo', "Home");
                $this->smarty->display('./templates/bodyProductos.tpl');
        }

        function showDetail($producto, $categorias){
            $this->smarty->assign('producto', $producto);
            $this->smarty->assign('categorias', $categorias);
            $this->smarty->assign('titulo', $producto->nombre);
            $this->smarty->display('templates/productDetail.tpl');
         }

        function showHomeLocation(){
            header("Location: ".BASE_URL."home");
        }

        function showLoginLocation(){
            header("Location: ".BASE_URL."login");
        }
    }