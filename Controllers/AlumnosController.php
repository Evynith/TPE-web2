<?php
require_once "./Models/AlumnosModel.php";
require_once "./Views/AlumnosView.php";

class AlumnosController {

    private $model;
    private $view;

	function __construct(){
        
        $this->model = new AlumnosModel();
        $this->view = new AlumnosView();
    }
    
    public function GetAlumnos(){
        $Alumnos = $this->model->GetAlumnos();
        $this->view->DisplayAlumnos($Alumnos);
    }
    public function GetAlumno($id){
        $Alumno = $this->model->GetAlumno($id);
        $this->view->DisplayAlumnos($Alumno);
    }

    public function InsertarAlumno(){
        $this->model->InsertarAlumno($_POST['nombre'],$_POST['apellido'],$_POST['promedio'],$_POST['edad'],$_POST['habilidad'],$_POST['telefono'],$_POST['carrera_terminada'],$_POST['id_curso']);
        header("Location: " . BASE_URL);
    }
    public function ActualizarAlumno(){
        $this->model->ActualizarAlumno($_POST['nombre_u'],$_POST['id_alumno_u']);
       $test = $_POST["nombre_u"];
       var_dump($test);
    }

    public function BorrarAlumno($id){
        $this->model->BorrarAlumno($id);
        header("Location: " . BASE_URL);
    }
}


?>