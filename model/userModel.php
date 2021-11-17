<?php

class userModel{

    private $db;
    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2;charset=utf8', 'root', '');
    }

    function getUser($email){
        $sentencia = $this->db->prepare('SELECT * FROM usertable WHERE email = ?');
        $sentencia->execute([$email]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function insertUser($email, $password){
        $hash = password_hash ($password , PASSWORD_BCRYPT);

        $sentencia = $this->db->prepare("INSERT INTO usertable(email, clave) VALUES(?, ?)");
        $sentencia->execute(array($email, $hash));
    }

    function getUsers(){
        $sentencia = $this->db->prepare('SELECT * FROM usertable');
        $sentencia->execute();
        $users = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    function setAdmin($id){
        $sentencia = $this->db->prepare("UPDATE usertable SET admin=1 WHERE id_user=?");
        $sentencia->execute(array($id));
    }

    function deleteAdmin($id){
        $sentencia = $this->db->prepare("UPDATE usertable SET  admin=0 WHERE id_user= ?");
        $sentencia->execute(array($id));
    }

    function deleteAccount($id){
        $sentencia = $this->db->prepare("DELETE FROM usertable WHERE id_user=?");
        $sentencia->execute(array($id));
    }
}