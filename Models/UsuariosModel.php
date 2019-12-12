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

    public function GetUsuario($id_usuario){
        $sentencia = $this->db->prepare( "SELECT * from usuario WHERE id_usuario = ? ");
        $sentencia->execute(array($id_usuario));
        $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $usuario;
    }
    
    public function GetUsuarioNombre($usuario){
        $sentencia = $this->db->prepare( "SELECT * from usuario WHERE email = ? ");
        $sentencia->execute(array($usuario));
        $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $usuario;
    }

    public function ActualizarUsuario($nivel,$id){ // 1 o 2
        $sentencia = $this->db->prepare("UPDATE usuario SET nivel=? WHERE id=?");
        $sentencia->execute(array($nivel,$id));
    }

    public function ActualizarUsuarioPass($pass,$id){
        $sentencia = $this->db->prepare("UPDATE usuario SET password=? WHERE id=?");
        $sentencia->execute(array($pass,$id));
    }

    public function BorrarUsuario($id){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id=?");
        $sentencia->execute(array($id));
    }
}