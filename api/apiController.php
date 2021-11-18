<?php
    require_once('./model/pageModel.php');
    require_once('./api/apiView.php');

    class apiController{
        private $model;
        private $view;

        function __construct(){
            $this->model= new pageModel();
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
                $id = $this->model->insertComentario($body->usuario, $body->comentario, $body->puntaje, $body->fecha);
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