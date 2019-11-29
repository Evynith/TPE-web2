<?php
require_once "./Models/AlumnosModel.php";
require_once "./Views/AlumnosView.php";
require_once "./Helpers/AuthHelper.php";

class AlumnosController {

    private $model;
    private $view;
    private $AuthHelper;

	function __construct(){
        $this->AuthHelper = new AuthHelper();
        //$this->AuthHelper->checkLoggedIn();

        $this->model = new AlumnosModel();
        $this->view = new AlumnosView();
    }
    
    public function GetAlumnos(){
        $this->AuthHelper->checkLoggedIn();
        $Alumnos = $this->model->GetAlumnos();
        $this->view->DisplayAlumnos($Alumnos);
    }
    public function GetAlumno($id){
        $this->AuthHelper->checkLoggedIn();
        $Alumno = $this->model->GetAlumno($id);
        $this->view->DisplayAlumnos($Alumno);
    }

    public function InsertarAlumno(){
        $this->model->InsertarAlumno($_POST['nombre'],$_POST['apellido'],$_POST['promedio'],$_POST['edad'],$_POST['habilidad'],$_POST['telefono'],$_POST['carrera_terminada'],$_POST['id_curso']);
        header("Location: " . URL_ALUMNOS);
    }
    public function ActualizarAlumno(){
        $this->model->ActualizarAlumno($_POST['nombre_u'],$_POST['id_alumno_u']);
        $test = $_POST["nombre_u"];
        header("Location: " . URL_ALUMNOS);

    }
    public function BorrarAlumno($id){
        $this->model->BorrarAlumno($id);
        header("Location: " . URL_ALUMNOS);
    }

    public function MostrarCursoAlumnos(){
        $this->AuthHelper->checkLoggedIn();
        $Alumnos = $this->model->MostrarCursoAlumnos();
        $this->view->MostrarAlumnosCursos($Alumnos);
    }
     /*   function subirImagen($id_alumno) {
     if($_FILES['input_name']['tmp_name']) {
        if($_FILES['input_name']['type'] == "image/jpg"  $_FILES['input_name']['type'] == "image/jpeg"  $_FILES['input_name']['type'] == "image/png") {
            $this->model->subirImagen($_FILES['input_name']['tmp_name'], $id_alumno);
            header("Location: " . URL_BASE);
        } else {
            $this->view->DisplayAlumno($id_alumno, "Formato de imagen incorrecto.");
        }
    } else {
        $this->view->DisplayAlumno($id_alumno, "Elija una imagen.");
    }
} */
}