    <?php

class CursosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_academia;charset=utf8', 'root', '');
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

    public function InsertarCurso($nombre,$profesor,$agno_correspondiente,$descripcion){
        $sentencia = $this->db->prepare("INSERT INTO curso(nombre,profesor,agno_correspondiente,descripcion) VALUES(?,?,?,?)");
        var_dump($nombre);
        $sentencia->execute(array($nombre,$profesor,$agno_correspondiente,$descripcion));
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