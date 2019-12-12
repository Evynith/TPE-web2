<?php

class ComentariosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_academia;charset=utf8', 'root', '');
    }

    public function GetComentarios($id_alumno){ 
        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_alumno = ?");
        $sentencia->execute(array($id_alumno));
        $ComentariosAlumno = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $ComentariosAlumno;
    }

    public function GetComentario($id_comentario){
        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_comentario = ?");
        $sentencia->execute(array($id_comentario));
        $comentario = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $comentario;
    }

    public function BorrarComentario($id_comentario){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
        $sentencia->execute(array($id_comentario));
    }

    public function InsertarComentario($id_alumno,$estrellas,$comentario){
        $sentencia = $this->db->prepare("INSERT INTO comentarios(id_alumno,estrellas,comentario) VALUES(?,?,?)");
        $sentencia->execute(array($id_alumno,$estrellas,$comentario));

        return $this->db->lastInsertId();
    }
    
    public function ActualizarComentario($id_alumno,$estrellas,$comentario, $id){
        $sentencia = $this->db->prepare("UPDATE comentarios SET id_alumno=?, estrellas=?, comentario=? WHERE id_comentario=?");
        $sentencia->execute(array($id_alumno,$estrellas,$comentario,$id));
    }

    /*     public function GetComentarioss(){
        $sentencia = $this->db->prepare( "select * from comentarios");
        $sentencia->execute();
        $Alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $Alumnos;
    } */
}