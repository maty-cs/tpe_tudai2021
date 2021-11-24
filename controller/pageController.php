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

        function showPage($currentPage){
            if(empty($currentPage)){
                $currentPage = 0;
            }
            $categorias = $this->model->getCategorias();
            $users = $this->model->getUsers();
            $paginas = $this->countPaginas();
            $productToShow = $this->productsToShow($currentPage);
            $this->view->printPage($productToShow, $categorias, $users, $paginas, $currentPage);
        }

        function productsToShow($actualPage){
            $cantXPage = 3;
            $start = ($actualPage-1)*$cantXPage;

            $productsToShow = $this->model->getProductsPage($start, $cantXPage);

            return $productsToShow;
        }

        function countPaginas($categoria = null){
            if($categoria != null){
                $sentencia = $this->model->getProducts($categoria);
            }
            else{
                $sentencia = $this->model->getProducts('Todas');
            }
            $cantidadObjetos = count($sentencia);
            $cantXPage = 3;
            $paginas = ($cantidadObjetos/$cantXPage);
            $paginas = ceil($paginas);

            return $paginas;
        }

        function createProduct(){
            $this->authHelper->checkAdmin();

            if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"){
                if(!isset($_POST['gluten'])){
                    $gluten = 0;
                }else{
                    $gluten = 1;
                }

                $filePath = "./img/" . uniqid("", true).".".strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $filePath).$_FILES['imagen']['name'];


                $this->model->insertProduct($_POST['nombre'], $gluten, $_POST['precio'], $_POST['categoria'], $filePath);
                $this->view->showHomeLocation();
            }
        }
        
        function deleteProduct(){
            $this->authHelper->checkAdmin();

            $this->model->deleteProductFromDB($_POST['id']);
            $this->view->showHomeLocation();
        }

        function updateProduct(){
            $this->authHelper->checkAdmin();

            if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"){
                if(!isset($_POST['gluten'])){
                    $gluten = 0;
                }else{
                    $gluten = 1;
                }

                $filePath = "./img/" . uniqid("", true).".".strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $filePath).$_FILES['imagen']['name'];

                $this->model->updateProductFromDB($_POST['nombre'], $gluten, $_POST['precio'], $_POST['categoria'], $filePath, $_POST['id']);
                $this->view->showHomeLocation();
            }
        }

        function filtroProductos(){
            $products = $this->model->getProducts($_POST['categorias']);
            $categorias = $this->model->getCategorias();
            $user = $this->model->getUsers();
            $paginas = $this->countPaginas($_POST['categorias']);

            $this->view->printPage($products, $categorias, $user, $paginas);
        }

        function filtroAvanzado(){
            if(isset($_POST)){
                $execute = array();

                if($_POST['nombre'] != ""){
                    $nombre = $_POST['nombre'];
                    $nombreSentence = "nombre = ? AND ";
                    array_push($execute, $nombre);
                }
                else{
                    $nombreSentence = null;
                }

                if(isset($_POST['gluten'])){
                    $gluten = 1;
                }
                else{
                    $gluten = 0;
                }
                $glutenSentence = "gluten = ? AND ";
                array_push($execute, $gluten);

                if(isset($_POST['precio']) && $_POST['precio'] != null && $_POST['precio'] != ""){
                    $precio = $_POST['precio'];
                    $precioSentence = "precio = ? AND ";
                    array_push($execute, $precio);
                }
                else{
                    $precioSentence = null;
                }

                if(isset($_POST['categoria'])){
                    $categoria = $_POST['categoria'];
                    $categoriaSentence = "categoria = ?";
                    array_push($execute, $categoria);
                }
                else{
                    $categoriaSentence = null;
                }
                
                $sentence = "SELECT * FROM productos WHERE ".$nombreSentence.$glutenSentence.$precioSentence.$categoriaSentence;

                $products = $this->model->getProductsFilter($sentence, $execute);
                $categorias = $this->model->getCategorias();
                $user = $this->model->getUsers();
                $paginas = $this->countPaginas();

                $this->view->printPage($products, $categorias, $user, $paginas);
            }
        }

        function viewProduct($id){
            $product = $this->model->getDetail($id);
            $image = $this->model->getImage($id);
            $categorias = $this->model->getCategorias();
            $users = $this->model->getUsers();
            $this->view->showDetail($product, $categorias, $users, $image);
        }
    }