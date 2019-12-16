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
    public function GetAlumno($id, $mensaje = null){
        $this->AuthHelper->checkLoggedIn();
        $existe = $this->model->Alumno($id);

        if ($existe == true){
            $Alumno = $this->model->GetAlumno($id);
            $imagenes= $this->model->TraerImagenes($id);
            $this->view->DisplayAlumnoImg($Alumno,$imagenes,$mensaje);
        }else{
            header("Location: " . URL_ALUMNOS);
    }   }

    public function InsertarAlumno(){
        $this->model->InsertarAlumno($_POST['nombre'],$_POST['apellido'],$_POST['promedio'],$_POST['edad'],$_POST['habilidad'],$_POST['telefono'],$_POST['carrera_terminada'],$_POST['id_curso']);
        header("Location: " . URL_ALUMNOS);
    }

    public function ActualizarAlumno(){
        $seleccion = $_POST['seccion_u'];
        $valor = $_POST['valor_u'];
        $id = $_POST['id_alumno_u'];
        $this->model->ActualizarAlumnoTest($seleccion,$valor,$id);
        $this->GetAlumno($id);
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

    function subirImagen($id_alumno) {
        if($_FILES['input_name']['tmp_name']) {
            if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png") {
                $this->model->subirImagen($_FILES['input_name']['tmp_name'], $id_alumno);
                
                $this->GetAlumno($id_alumno, null);
            } else {
                $this->GetAlumno($id_alumno, "Formato de imagen incorrecto.");
            }
        }else {
                $this->GetAlumno($id_alumno, "Elija una imagen.");
    }   }

    /* public function MostrarImagenes($id) {
        $imagenes= $this->model->TraerImagenes($id);
        $this->view->MostrarImagenes($imagenes);
    } */
} 