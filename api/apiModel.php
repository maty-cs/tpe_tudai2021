<?php

    class apiModel{
        private $db;
        function __construct(){ 
            $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2;charset=utf8', 'root', '');
        }
        
        function getComentarios(){
            $sentencia = $this->db->prepare( "SELECT * FROM comentarios");
            $sentencia->execute();
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

        function insertComentario($usuario, $comentario, $puntaje, $fecha){
            $sentencia = $this->db->prepare("INSERT INTO comentarios(usuario, comentario, puntaje, fecha) VALUES(?, ?, ?, ?)");
            $sentencia->execute(array($usuario, $comentario, $puntaje, $fecha));
            return $this->db->lastInsertId();
        }

        function updateComentario($id, $usuario, $comentario, $puntaje, $fecha){
            $sentencia = $this->db->prepare("UPDATE  comentarios  SET  usuario = ?, comentario = ?, puntaje = ?, fecha = ? WHERE id_comentario=?");
            $sentencia->execute(array($usuario, $comentario, $puntaje, $fecha, $id));
        }
    }