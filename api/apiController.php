<?php
    require_once('./api/apiModel.php');
    require_once('./api/apiView.php');

    class apiController{
        private $model;
        private $view;

        function __construct(){
            $this->model= new apiModel();
            $this->view = new apiView();
        }

        function obtenerComentarios(){
            $sentence = "SELECT * FROM comentarios WHERE id_product IS ?";
            $execute = NULL;

            $comentarios = $this->model->getComentarios($sentence, $execute);
            if($comentarios){
                return $this->view->response($comentarios, 200);
            }
            else{
                return $this->view->response(null, 404);
            }
        }

        function obtenerComentariosDetail($params){
            $id = $params[':ID'];
            if($id != null){
                $sentence = "SELECT * FROM comentarios WHERE id_product = ?";
                $execute = $id;

                $comentarios = $this->model->getComentarios($sentence, $execute);
                if($comentarios){
                    return $this->view->response($comentarios, 200);
                }
                else{
                    return $this->view->response(null, 404);
                }
            }
            else{
                return $this->view->response(null, 404);
            }
        }
        
        function obtenerComentariosByPuntos($params = null){
            if(!empty($params[':puntos'])){
                $puntos = $params[':puntos'];
                if(!empty($params[':ID'])){
                    $id = $params[':ID'];
                }
                else{
                    $id = 0;
                }
                if($id != 0){
                    $sentence = "SELECT * FROM comentarios WHERE puntaje = ? AND id_product = ?";
                    $execute = $id;

                    $comentarios = $this->model->getComentariosByPuntos($sentence, $execute, $puntos);
                    if($comentarios){
                        return $this->view->response($comentarios, 200);
                    }
                    else{
                        return $this->view->response(null, 404);
                    }
                }
                else{
                    $sentence = "SELECT * FROM comentarios WHERE puntaje = ? AND id_product IS ?";
                    $execute = NULL;

                    $comentarios = $this->model->getComentariosByPuntos($sentence, $execute, $puntos);
                    if($comentarios){
                        return $this->view->response($comentarios, 200);
                    }
                    else{
                        return $this->view->response(null, 404);
                    }          
                }
            }
            else{
                return $this->view->response(null, 404);
            }
        }

        function obtenerComentariosByPuntaje($params = null){
            if(!empty($params[':order'])){
                $orden = $params[':order'];
            }
            else{
                $orden = 'DESC';
            }
            
            if(!empty($params[':ID']) || !isset($params[':ID']) || $params[':ID'] != NULL){
                $id = $params[':ID'];
            }
            else{
                $id = 0;
            }
            if($id != 0){
                switch($orden){
                    case 'ASC':
                        $sentence = "SELECT * FROM comentarios WHERE id_product = ? ORDER BY `puntaje` ASC";
                    break;
                    case 'DESC':
                        $sentence =  "SELECT * FROM comentarios WHERE id_product = ? ORDER BY `puntaje` DESC";
                    break;
                }
                $execute = $id;
                $comentarios = $this->model->orderComentariosByPuntaje($sentence, $execute);
                if($comentarios){
                    return $this->view->response($comentarios, 200);
                }
                else{
                    return $this->view->response(null, 404);
                }
            }
            else{
                switch($orden){
                    case 'ASC':
                        $sentence = "SELECT * FROM comentarios WHERE id_product IS ? ORDER BY `puntaje` ASC";
                    break;
                    case 'DESC':
                        $sentence = "SELECT * FROM comentarios WHERE id_product IS ? ORDER BY `puntaje` DESC";
                    break;
                }
                $execute = NULL;
                $comentarios = $this->model->orderComentariosByPuntaje($sentence, $execute);
                if($comentarios){
                    return $this->view->response($comentarios, 200);
                }
                else{
                    return $this->view->response(null, 404);
                }          
            }
        }

        function obtenerComentario($params = null){
            if(isset($params[':ID'])){
                $id = $params[':ID'];
                $comentario = $this->model->getComentario($id);
                if($comentario){
                    return $this->view->response($comentario, 200);
                }
                else{
                    return $this->view->response(null, 404);
                }
            }
            else{
                return $this->view->response(null, 400);
            }
        }

        function eliminarComentario($params = null){
            if(isset($params[':ID'])){
                $id = $params[':ID'];
                $comentario = $this->model->getComentario($id);
                $this->model->deleteComentario($id);
                if($comentario != null && $comentario != ""){
                    return $this->view->response("comentario borrado correctamente", 200);
                }
                else{
                    return $this->view->response(null, 404);
                }        
            }
            else{
                return $this->view->response(null, 400); 
            }
        }

        function crearComentario($params = null){
            $body = $this->getBody();

            if($body != null && $body != []){
                $id = $this->model->insertComentario($body->usuario, $body->comentario, $body->id_product, $body->puntaje, $body->fecha);
                if($id != 0 && $id != null){
                    return $this->view->response("comentario creado correctamente", 200);
                }
                else{
                    return $this->view->response("comentario no creado", 400); 
                }
            }
            else{
                return $this->view->response("comentario no creado", 400); 
            }
        }

        private function getBody(){
            $body = file_get_contents("php://input");
            return json_decode($body);
        }

        function modificarComentario($params = null){
            $id = $params[':ID'];
            $body = $this->getBody();

            if($body != null && $body != []){
                if($id != 0 && $id != null && $id != ""){
                    $this->model->updateComentario($id, $body->usuario, $body->comentario, $body->puntaje, $body->fecha);
                    return $this->view->response("comentario modificado correctamente", 200);
                }
                else{
                    return $this->view->response("comentario no modificado", 400); 
                }
            }
            else{
                return $this->view->response("comentario no modificado", 400); 
            }
        }

    }