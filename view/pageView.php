<?php
    require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

    class pageView{
        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();
        }

        function printPage($products, $categorias, $users, $pages, $index=null){
            $this->smarty->assign('products', $products);
            $this->smarty->assign('categorias', $categorias);
            $this->smarty->assign('users', $users);
            $this->smarty->assign('pages', $pages);
            if($index){
                $this->smarty->assign('index', $index);
            }

            if (!empty($_SESSION["email"])) {
                $this->smarty->assign('currentUser', $_SESSION["email"]);
            }
            
            $this->smarty->assign('titulo', "Home");
            $this->smarty->display('./templates/bodyProductos.tpl');
        }

        function showDetail($producto, $categorias, $users, $image){
            $this->smarty->assign('producto', $producto);
            $this->smarty->assign('categorias', $categorias);
            $this->smarty->assign('imagen', $image);
            $this->smarty->assign('users', $users);
            if(isset($_SESSION["email"])){
                $this->smarty->assign('currentUser', $_SESSION["email"]);
            }
            $this->smarty->assign('titulo', $producto->nombre);
            $this->smarty->display('templates/productDetail.tpl');
        }

        function showHomeLocation(){
            header("Location: ".BASE_URL."home/1");
        }

        function showLoginLocation(){
            header("Location: ".BASE_URL."login");
        }
    }