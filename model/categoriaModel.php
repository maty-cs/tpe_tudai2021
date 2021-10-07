<?php
    class categoriaModel{
        private $db;
        function __construct(){ 
            $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2;charset=utf8', 'root', '');
        }

        function getCategorias(){
            $sentencia = $this->db->prepare( "SELECT * FROM categorias");
            $sentencia->execute();
            $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $categorias;
        }

        function insertCategoria($categoria, $descripcion, $conservacion, $tiempoPreparacion){
            $sentencia = $this->db->prepare("INSERT INTO categorias(categoria, descripcion, conservacion, tiempo_preparacion) VALUES(?, ?, ?, ?)");
            $sentencia->execute(array($categoria, $descripcion, $conservacion, $tiempoPreparacion));
        }

        function deleteCategoriaFromDB($categoria){
            $sentencia = $this->db->prepare("DELETE FROM categorias WHERE categoria=?");
            $sentencia->execute(array($categoria));
        }

        function updateCategoriaFromDB($categoria, $descripcion, $conservacion, $tiempoPreparacion){
            $sentencia = $this->db->prepare("UPDATE  categorias  SET  descripcion = ?, conservacion = ?, tiempo_preparacion = ? WHERE categoria=?");
            $sentencia->execute(array($descripcion, $conservacion, $tiempoPreparacion, $categoria));
        }

    }