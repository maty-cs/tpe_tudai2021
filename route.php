<?php
  require_once('controller/pageController.php');

  define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

  //Toma la acción
  if(!empty($_GET['action'])){
    $action = $_GET['action'];
  }  
  else{
    $action = 'home';
  }

  //Crea el parámetro
  $params = explode('/', $action); 
  
  $pageController = new pageController();

  //camino de la acción
  switch($params[0]){
    case 'home':
      $pageController->showPage($params[0]);
    break;
    case 'insertProduct':
      $pageController->createProduct();
    break;
    case 'deleteProduct':
      $pageController->deleteProduct();
    break;
    case 'updateProduct':
      $pageController->updateProduct();
    default:
        echo("404 Page Not Found");
    break;
  }

