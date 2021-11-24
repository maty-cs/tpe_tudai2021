<?php
require_once 'libs/Router.php';
require_once 'api/apiController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comentarios', 'GET', 'apiController', 'obtenerComentarios');
$router->addRoute('comentarios', 'POST', 'apiController', 'crearComentario');
$router->addRoute('comentarios/:ID', 'GET', 'apiController', 'obtenerComentario');
$router->addRoute('comentarios/:ID', 'DELETE', 'apiController', 'eliminarComentario');
$router->addRoute('comentarios/:ID', 'PUT', 'apiController', 'modificarComentario');
$router->addRoute('comentarios/detail/:ID', 'GET', 'apiController', 'obtenerComentariosDetail');
$router->addRoute('comentarios/order/0', 'GET', 'apiController', 'orderComentariosByPuntaje');
$router->addRoute('comentarios/order/:ID', 'GET', 'apiController', 'orderComentariosByPuntaje');


// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);