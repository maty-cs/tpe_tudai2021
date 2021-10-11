<?php
    require_once('./model/pageModel.php');
    require_once('./view/pageView.php');
    require_once('./helpers/authHelper.php');

    class pageController{
        private $model;
        private $view;
        private $authHelper;

        function __construct(){
            $this->model= new pageModel();
            $this->view = new pageView();
            $this->authHelper = new authHelper();
        }

        function showPage(){
            $defaultCategoria = 'Todas';
            $products = $this->model->getProducts($defaultCategoria);
            $categorias = $this->model->getCategorias();
            $users = $this->model->getUsers();
            $this->view->printPage($products, $categorias, $users);
        }

        function createProduct(){
            $this->authHelper->checkSession();

            if(!isset($_POST['gluten'])){
                $gluten = 0;
            }else{
                $gluten = 1;
            }
            $this->model->insertProduct($_POST['nombre'], $gluten, $_POST['precio'], $_POST['categoria']);
            $this->view->showHomeLocation();
        }
        
        function deleteProduct(){
            $this->authHelper->checkSession();

            $this->model->deleteProductFromDB($_POST['id']);
            $this->view->showHomeLocation();
        }

        function updateProduct(){
            $this->authHelper->checkSession();

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
            $user = $this->model->getUsers();
            $this->view->printPage($products, $categorias, $user);
        }

        function viewProduct($id){
            $product = $this->model->getDetail($id);
            $categorias = $this->model->getCategorias();
            $this->view->showDetail($product, $categorias);
        }
    }