    <?php

class AlumnosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_academia_test_2;charset=utf8', 'root', '');
    }

	public function GetAlumnos(){
        $sentencia = $this->db->prepare( "select * from alumno");
        $sentencia->execute();
        $Alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $Alumnos;
    }
    
    public function GetAlumno($id){
        $sentencia = $this->db->prepare( "select * from alumno where id_alumno = ?");
        $sentencia->execute([$id]);
        $alumno = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $alumno;
    }

    public function InsertarAlumno($nombre,$apellido,$promedio,$edad,$habilidad,$telefono,$carrera_terminada,$id_curso){
        $sentencia = $this->db->prepare("INSERT INTO alumno(nombre,apellido,promedio,edad,habilidad,telefono,carrera_terminada,id_curso) VALUES(?,?,?,?,?,?,?,?)");
        $sentencia->execute(array($nombre,$apellido,$promedio,$edad,$habilidad,$telefono,$carrera_terminada,$id_curso));
    }

    public function ActualizarAlumno($nombre,$id){
        $sentencia = $this->db->prepare("UPDATE alumno SET nombre=? WHERE id_alumno=?");
        $sentencia->execute(array($nombre,$id));
    }


    public function BorrarAlumno($id){
        $sentencia = $this->db->prepare("DELETE FROM alumno WHERE id_alumno=?");
        $sentencia->execute(array($id));
    }
}

?>