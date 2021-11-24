<?php

    class apiModel{
        private $db;
        function __construct(){ 
            $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2;charset=utf8', 'root', '');
        }
        
        function getComentarios($idProduct = null){
            if($idProduct != null){
                $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_product = ?");
                $sentencia->execute(array($idProduct));
            }
            else{
                $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_product IS NULL");
                $sentencia->execute();
            }
            
            $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $comentarios;
        }

        function getComentariosByPuntaje($orden, $idProduct = null){
            if($idProduct != null){
                switch($orden){
                    case 'ASC':
                        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_product = ? ORDER BY `puntaje` ASC");
                    break;
                    case 'DESC':
                        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_product = ? ORDER BY `puntaje` DESC");
                    break;
                }
                $sentencia->execute(array($idProduct));
            }
            else{
                switch($orden){
                    case 'ASC':
                        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_product IS NULL ORDER BY `puntaje` ASC");
                    break;
                    case 'DESC':
                        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_product IS NULL ORDER BY `puntaje` DESC");
                    break;
                }
                $sentencia->execute();
            }
            
            $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $comentarios;
        }

        function getComentario($id){
            $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_comentario=?");
            $sentencia->execute(array($id));
            $comentario = $sentencia->fetch(PDO::FETCH_OBJ);
            return $comentario;
        }

        function deleteComentario($id){
            $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
            $sentencia->execute(array($id));
        }

        function insertComentario($usuario, $comentario, $id_product, $puntaje, $fecha){
            $sentencia = $this->db->prepare("INSERT INTO comentarios(usuario, comentario, id_product, puntaje, fecha) VALUES(?, ?, ?, ?, ?)");
            $sentencia->execute(array($usuario, $comentario, $id_product, $puntaje, $fecha));
            return $this->db->lastInsertId();
        }

        function updateComentario($id, $usuario, $comentario, $puntaje, $fecha){
            $sentencia = $this->db->prepare("UPDATE  comentarios  SET  usuario = ?, comentario = ?, puntaje = ?, fecha = ? WHERE id_comentario=?");
            $sentencia->execute(array($usuario, $comentario, $puntaje, $fecha, $id));
        }
    }