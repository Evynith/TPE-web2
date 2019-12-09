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
        $Curso = $this->model->GetCurso($id);
        $this->view->DisplayCursos($Curso);
    }

    public function InsertarCurso(){
        $this->model->InsertarCurso($_POST['nombre'],$_POST['profesor'],$_POST['agno_correspondiente'],$_POST['descripcion']);
        $test = $_POST["nombre_u"];
        var_dump($test);
        header("Location: " . URL_CURSOS);
    }
    public function ActualizarCurso(){
        $this->model->ActualizarCurso($_POST['nombre_u'],$_POST['id_curso_u']);
       $test = $_POST["nombre_u"];
       var_dump($test);
    }

    public function BorrarCurso($id){
        $this->model->BorrarCurso($id);
        header("Location: " . URL_CURSOS);
    }
}