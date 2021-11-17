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
$router->addRoute('comentarios', 'POST', 'apiController', 'crearComentario');
$router->addRoute('comentarios/:ID', 'PUT', 'apiController', 'modificarComentario');


// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);