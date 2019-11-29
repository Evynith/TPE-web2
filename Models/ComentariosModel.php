<?php

class ComentariosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_academia_test_2;charset=utf8', 'root', '');
    }

    public function GetComentarios($id){
        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_alumno = ?");
        $sentencia->execute(array($id));
        $ComentariosAlumno = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $ComentariosAlumno;
    }
/*     public function GetComentarioss(){
        $sentencia = $this->db->prepare( "select * from comentarios");
        $sentencia->execute();
        $Alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $Alumnos;
    } */
    public function BorrarComentario($id){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
        $sentencia->execute(array($id));
    }
    public function GetComentario($id){
        $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_comentario = ?");
        $sentencia->execute(array($id));
        $Comentario = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $Comentario;
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

}