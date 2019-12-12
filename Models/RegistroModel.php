<?php

class RegistroModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_academia;charset=utf8', 'root', '');
    }

    function InsertarRegistro($username,$password,$pregunta,$respuesta){
        $sentencia = $this->db->prepare("INSERT INTO usuario(email,password,pregunta,respuesta,nivel) VALUES(?,?,?,?,?)");
        $sentencia->execute(array($username,$password,$pregunta,$respuesta,2)); //nivel 1 es para administradores, nivel 2 es para usuarios comunes
    }
    function User($username){
        $sentencia = $this->db->prepare( "SELECT email FROM usuario WHERE email = ?");
        $sentencia->execute(array($username));

        return !!$sentencia->fetch(PDO::FETCH_ASSOC);
    }
    function UserPass($username){
        $sentencia = $this->db->prepare( "SELECT email,id,pregunta,respuesta FROM usuario WHERE email = ?");
        $sentencia->execute(array($username));

        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}