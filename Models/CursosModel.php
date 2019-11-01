    <?php

class CursosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_academia_test_2;charset=utf8', 'root', '');
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

    public function InsertarCurso($nombre,$profesor,$agno_correspondiente,$id_curso){
        $sentencia = $this->db->prepare("INSERT INTO curso(nombre,profesor,agno_correspondiente,id_curso) VALUES(?,?,?,?)");
        $sentencia->execute(array($nombre,$profesor,$agno_correspondiente,$id_curso));
    }

    public function ActualizarCurso($nombre,$id){
        $sentencia = $this->db->prepare("UPDATE curso SET nombre=? WHERE id_curso=?");
        $sentencia->execute(array($nombre,$id));
    }


    public function BorrarCurso($id){
        $sentencia = $this->db->prepare("DELETE FROM curso WHERE id_curso=?");
        $sentencia->execute(array($id));
    }
}

?>