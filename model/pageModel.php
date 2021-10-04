<?php
    class pageModel{
        private $db;
        function __construct(){ 
            $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2;charset=utf8', 'root', '');
        }

        function getProducts(){
            $sentencia = $this->db->prepare( "select * from productos");
            $sentencia->execute();
            $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $productos;
        } 

        function insertTask($nombre, $gluten, $precio, $categoria){
            $sentencia = $this->db->prepare("INSERT INTO productos(nombre, gluten, precio, categoria) VALUES(?, ?, ?, ?)");
            $sentencia->execute(array($nombre, $gluten, $precio, $categoria));
        }

        function deleteProductFromDB($id){
            $sentencia = $this->db->prepare("DELETE FROM productos WHERE id_product=?");
            $sentencia->execute(array($id));
        }

        function updateProductFromDB($nombre, $gluten, $precio, $categoria, $id){
            $sentencia = $this->db->prepare("UPDATE  productos  SET  nombre = ?, gluten = ?, precio = ?, categoria = ? WHERE id_product=?");
            $sentencia->execute(array($nombre, $gluten, $precio, $categoria, $id));
        }

    }