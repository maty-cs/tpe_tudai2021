<?php
  require_once('controller/pageController.php');
  require_once('controller/sessionController.php');
  require_once('controller/categoriaController.php');


  define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

  //Toma la acción
  if(!empty($_GET['action'])){
    $action = $_GET['action'];
  }  
  else{
    $action = 'home/1';
  }

  //Crea el parámetro
  $params = explode('/', $action); 
  
  $pageController = new pageController();
  $sessionController = new sessionController();
  $categoriaController = new categoriaController();


  //Camino de la acción
  switch($params[0]){

    //Sesión
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

    //Acciones de administrador
    case 'adminSessions':
      $sessionController->adminSessions();
      break;
    case 'giveRol':
      $sessionController->giveRol();
      break;
    case 'quitarAdmin':
      $sessionController->deleteRol();
      break;
    case 'quitarUser':
      $sessionController->deleteUser();
      break;

    //Tabla Productos
    case 'home':
      $pageController->showPage($params[1]);  
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
    case 'filtroAvanzado':
      $pageController->filtroAvanzado();
    break;
    case 'viewDetail': 
      $pageController->viewProduct($params[1]); 
    break;
    
    //Tabla Categorías
    case 'insertCategoria':
      $categoriaController->createCategoria();
    break;
    case 'deleteCategoria':
      $categoriaController->deleteCategoria();
    break;
    case 'updateCategoria':
      $categoriaController->updateCategoria();
    break;

    default:
        echo("404 Page Not Found");
    break;
  }

