<?php
    require_once('./model/categoriaModel.php');
    require_once('./view/pageView.php');
    require_once('./helpers/authHelper.php');

class categoriaController{
    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this->model= new categoriaModel();
        $this->view = new pageView();
        $this->authHelper = new authHelper();
    }

    function createCategoria(){
        $this->authHelper->checkAdmin();

        $this->model->insertCategoria($_POST['categoria'], $_POST['descripcion'], $_POST['conservacion'], $_POST['tiempoPreparacion']);
        $this->view->showHomeLocation();
    }
    
    function deleteCategoria(){
        $this->authHelper->checkAdmin();

        $this->model->deleteCategoriaFromDB($_POST['categoria']);
        $this->view->showHomeLocation();
    }

    function updateCategoria(){
        $this->authHelper->checkAdmin();
        $this->model->updateCategoriaFromDB($_POST['categoria'], $_POST['descripcion'], $_POST['conservacion'], $_POST['tiempoPreparacion']);
        $this->view->showHomeLocation();
    }
}