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
            $comentarios = $this->model->getComentarios();
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
                $comentarios = $this->model->getComentarios($id);
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

        function orderComentariosByPuntaje($params = null){
            if(!empty($params[':order'])){
                $orden = $params[':order'];
            }
            else{
                $orden = 'ASC';
            }
            
            if(!empty($params[':ID']) && !isset($params[':ID']) && $params[':ID'] == NULL){
                $id = $params[':ID'];
            }
            else{
                $id = 0;
            }
            if($id != 0 && !isset($id)){
                $comentarios = $this->model->getComentariosByPuntaje($orden, $id);
                if($comentarios){
                    return $this->view->response($comentarios, 200);
                }
                else{
                    return $this->view->response(null, 404);
                }
            }
            else{
                $comentarios = $this->model->getComentariosByPuntaje($orden);
                if($comentarios){
                    return $this->view->response($comentarios, 200);
                }
                else{
                    return $this->view->response(null, 404);
                }          
            }
        }

        function obtenerComentario($params = null){
            $id = $params[':ID'];
            $comentario = $this->model->getComentario($id);
            if($comentario){
                return $this->view->response($comentario, 200);
            }
            else{
                return $this->view->response(null, 404);
            }
        }

        function eliminarComentario($params = null){
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