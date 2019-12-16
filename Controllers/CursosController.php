<?php
require_once "./Models/CursosModel.php";
require_once "./Views/CursosView.php";
require_once "./Helpers/AuthHelper.php";

class CursosController {

    private $model;
    private $view;
    private $AuthHelper;

	function __construct(){
        $this->AuthHelper = new AuthHelper();
        //$this->AuthHelper->checkLoggedIn();

        $this->model = new CursosModel();
        $this->view = new CursosView();
    }
    
    public function GetCursos(){
        $this->AuthHelper->checkLoggedIn();
        $Cursos = $this->model->GetCursos();
        $this->view->DisplayCursos($Cursos);
    }

    public function GetCurso($id){
        $this->AuthHelper->checkLoggedIn();
        $existe = $this->model->Curso($id);

        if ($existe == true){
            $curso = $this->model->GetCurso($id);
            $alumnos = $this->model->mostrarAlumnosCurso($id);
            $this->view->DisplayCurso($curso,$alumnos);
        } else {
            header("Location: " . URL_CURSOS);
    }   }

    public function InsertarCurso(){
        $this->model->InsertarCurso($_POST['nombre'],$_POST['profesor'],$_POST['agno_correspondiente'],$_POST['descripcion']);
        $test = $_POST["nombre_u"];
        //var_dump($test);
        header("Location: " . URL_CURSOS);
    }

    public function ActualizarCurso(){
        $seleccion = $_POST['seccion_u'];
        $dato = $_POST['dato_u'];
        $id = $_POST['id_curso_u'];
        $this->model->ActualizarCurso($seleccion,$dato,$id);
        //$test = $_POST["nombre_u"];
        //var_dump($test);
        $this->GetCurso($id);
    }

    public function BorrarCurso($id){
        $this->model->BorrarCurso($id);
        header("Location: " . URL_CURSOS);
    }
}