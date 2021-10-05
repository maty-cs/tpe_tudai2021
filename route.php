<?php
  require_once('controller/pageController.php');
  require_once('controller/sessionController.php');

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
  $sessionController = new sessionController();


  //camino de la acción
  switch($params[0]){
    case 'signIn':
      $sessionController->createSession();
      break;
    case 'createUser':
      $sessionController->createUser();
      break;
    case 'login': 
      $sessionController->sessionLogin(); 
      break;
  case 'logout': 
      $sessionController->sessionLogout(); 
      break;
  case 'verify': 
      $sessionController->verifySession(); 
      break;
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
    break;
    case 'filtrarResultados':
      $pageController->filtroProductos();
    break;
    default:
        echo("404 Page Not Found");
    break;
  }

