    <?php

class CursosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_academia;charset=utf8', 'root', '');
    }

    function Curso($id){
        $sentencia = $this->db->prepare( "SELECT id_curso FROM curso WHERE id_curso = ?");
        $sentencia->execute(array($id));

        return !!$sentencia->fetch(PDO::FETCH_ASSOC);
    }

	public function GetCursos(){
        $sentencia = $this->db->prepare( "select * from curso");
        $sentencia->execute();
        $Cursos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $Cursos;
    }
    
    public function GetCurso($id){
        $sentencia = $this->db->prepare( "select * from curso where id_curso = ?");
        $sentencia->execute([$id]);
        $curso = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $curso;
    }

    public function MostrarAlumnosCurso($id_curso){
        $sentencia = $this->db->prepare("SELECT curso.nombre as curso, alumno.nombre as alumno_nombre, alumno.apellido as alumno_apellido, alumno.id_alumno as alumno_id FROM alumno JOIN curso ON curso.id_curso = alumno.id_curso WHERE curso.id_curso = ?");
        $sentencia->execute(array($id_curso));
        $Alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $Alumnos;
    }

    public function InsertarCurso($nombre,$profesor,$agno_correspondiente,$descripcion){
        $sentencia = $this->db->prepare("INSERT INTO curso(nombre,profesor,agno_correspondiente,descripcion) VALUES(?,?,?,?)");
        var_dump($nombre);
        $sentencia->execute(array($nombre,$profesor,$agno_correspondiente,$descripcion));
    }

    public function ActualizarCurso($seleccion,$dato,$id){
        $sentencia = $this->db->prepare("UPDATE curso SET $seleccion =? WHERE id_curso=?");
        $sentencia->execute(array($dato,$id));
    }


    public function BorrarCurso($id){
        $sentencia = $this->db->prepare("DELETE FROM curso WHERE id_curso=?");
        $sentencia->execute(array($id));
    }
}