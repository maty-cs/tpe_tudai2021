<?php
    require_once('./model/pageModel.php');
    require_once('./view/pageView.php');

    class pageController{
        private $model;
        private $view;
        function __construct(){
            $this->model= new pageModel();
            $this->view = new pageView();
        }

        function showPage(){
            $products = $this->model->getProducts();    
            $this->view->printPage($products);
            //$this->view->showHomeLocation();
        }

        function createProduct(){
            if(!isset($_POST['gluten'])){
                $gluten = 0;
            }else{
                $gluten = 1;
            }
            $this->model->insertTask($_POST['nombre'], $gluten, $_POST['precio'], $_POST['categoria']);
            $this->view->showHomeLocation();
        }
        
        function deleteProduct($id){
            $this->model->deleteProductFromDB($id);
            $this->view->showHomeLocation();
        }

        function updateProduct(){
            if(!isset($_POST['gluten'])){
                $gluten = 0;
            }else{
                $gluten = 1;
            }
            $this->model->updateProductFromDB($_POST['id'], $_POST['nombre'], $gluten, $_POST['precio'], $_POST['categoria']);
            $this->view->showHomeLocation();
        }
    }