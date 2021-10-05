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
}