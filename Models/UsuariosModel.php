<?php

class UsuariosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_academia;charset=utf8', 'root', '');
    }

	public function GetUsuarios(){
        $sentencia = $this->db->prepare( "SELECT * from usuario");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $usuarios;
    }

    public function ActualizarUsuario($nivel,$id){ // 1 o 2
        $sentencia = $this->db->prepare("UPDATE usuario SET nivel=? WHERE id=?");
        $sentencia->execute(array($nivel,$id));
    }

    public function BorrarUsuario($id){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id=?");
        $sentencia->execute(array($id));
    }
}