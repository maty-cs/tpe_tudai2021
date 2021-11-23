<?php
    class pageModel{
        private $db;
        function __construct(){ 
            $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2;charset=utf8', 'root', '');
        }

        function getProducts($categoria){
            switch($categoria){
                case 'Todas':
                    $sentencia = $this->db->prepare( "SELECT * FROM productos");
                break;
                case 'Tortas':
                    $sentencia = $this->db->prepare("SELECT * FROM `productos` WHERE `categoria`='Tortas'");
                break;
                case 'Postres':
                    $sentencia = $this->db->prepare("SELECT * FROM `productos` WHERE `categoria`='Postres'");
                break;
                case 'Tartas':
                    $sentencia = $this->db->prepare("SELECT * FROM `productos` WHERE `categoria`='Tartas'");
                break;
                default:
                    echo ("Error al cargar productos de la base de datos SQL");
                break;
            }
            $sentencia->execute();
            $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $productos;
        }

        function getProductsPage($inicio, $fin){
            $sentencia = $this->db->prepare( 'SELECT * FROM productos LIMIT :iniciar, :finalizar');
            $sentencia->bindParam('iniciar', $inicio, PDO::PARAM_INT);
            $sentencia->bindParam('finalizar', $fin, PDO::PARAM_INT);
            $sentencia->execute();
            $products = $sentencia->fetchAll(PDO::FETCH_OBJ);

            return $products;
        }
        
        function getCategorias(){
            $sentencia = $this->db->prepare( "SELECT * FROM categorias");
            $sentencia->execute();
            $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $categorias;
        }

        function getUsers(){
            session_start(['read_and_close'  => true]);
            if(!isset($_SESSION["email"])){
                $users = null;
            }
            else{
                $email = $_SESSION["email"];
                $sentencia = $this->db->prepare( "SELECT * FROM usertable WHERE email=? ");
                $sentencia->execute(array($email));
                $users = $sentencia->fetchAll(PDO::FETCH_OBJ);
            }
            return $users;
        }

        function insertProduct($nombre, $gluten, $precio, $categoria, $img){
            $sentencia = $this->db->prepare("INSERT INTO productos(nombre, gluten, precio, categoria) VALUES(?, ?, ?, ?)");
            $sentencia->execute(array($nombre, $gluten, $precio, $categoria));
            $id = $this->db->lastInsertId();
            
            $sentenciaIMG = $this->db->prepare("INSERT INTO images(id_product, path) VALUES(?, ?)");
            $sentenciaIMG->execute(array($id, $img));
        }

        function deleteProductFromDB($id){
            $sentencia = $this->db->prepare("DELETE FROM productos WHERE id_product=?");
            $sentencia->execute(array($id));

            $sentenciaIMG = $this->db->prepare("DELETE FROM images WHERE id_product=?");
            $sentenciaIMG->execute(array($id));
        }

        function updateProductFromDB($nombre, $gluten, $precio, $categoria, $image, $id){
            $sentencia = $this->db->prepare("UPDATE  productos  SET  nombre = ?, gluten = ?, precio = ?, categoria = ? WHERE id_product=?");
            $sentencia->execute(array($nombre, $gluten, $precio, $categoria, $id));

            $sentenciaIMG = $this->db->prepare("UPDATE  images  SET  path = ? WHERE id_product=?");
            $sentenciaIMG->execute(array($image, $id));
        }

        function getDetail($id){
            $sentencia = $this->db->prepare("SELECT * FROM productos WHERE id_product=?");
            $sentencia->execute(array($id));
            $product = $sentencia->fetch(PDO::FETCH_OBJ);
            return $product;
        }

        function getImage($id){
            $sentencia = $this->db->prepare("SELECT * FROM images WHERE id_product=?");
            $sentencia->execute(array($id));
            $image = $sentencia->fetch(PDO::FETCH_OBJ);
            return $image;
        }

    }