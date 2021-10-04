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
            $defaultCategoria = 'Todas';
            $products = $this->model->getProducts($defaultCategoria);
            $categorias = $this->model->getCategorias();
            $this->view->printPage($products, $categorias);
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
        
        function deleteProduct(){
            $this->model->deleteProductFromDB($_POST['id']);
            $this->view->showHomeLocation();
        }

        function updateProduct(){
            if(!isset($_POST['gluten'])){
                $gluten = 0;
            }else{
                $gluten = 1;
            }
            $this->model->updateProductFromDB($_POST['nombre'], $gluten, $_POST['precio'], $_POST['categoria'], $_POST['id']);
            $this->view->showHomeLocation();
        }

        function filtroProductos(){
            $products = $this->model->getProducts($_POST['categorias']);
            $categorias = $this->model->getCategorias();
            $this->view->printPage($products, $categorias);
        }
    }