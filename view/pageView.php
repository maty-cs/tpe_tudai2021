<?php
    require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

    class pageView{
        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();
            //$this->smarty->compileAllTemplates('.tpl',true);
        }

        function printPage($products){
            $this->smarty->assign('products', $products);
            $this->smarty->display('./templates/bodyProductos.tpl');
        }

        function showHomeLocation(){
            header("Location: ".BASE_URL."home");
        }
    }