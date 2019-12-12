<?php

class LoginModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_academia;charset=utf8', 'root', '');
    }

    public function GetPassword($username){
        $sentencia = $this->db->prepare( 'SELECT * FROM usuario WHERE email = ?');
        $sentencia->execute(array($username));
        
        $password = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $password;
    }
    
    public function ActualizarUsuario($password,$user){ 
        $sentencia = $this->db->prepare("UPDATE usuario SET password=? WHERE id=?");
        $sentencia->execute(array($password,$user));
    }
}
