<?php
require_once "./Models/CursosModel.php";
require_once "./Views/CursosView.php";

class CursosController {

    private $model;
    private $view;

	function __construct(){
        
        $this->model = new CursosModel();
        $this->view = new CursosView();
    }
    
    public function GetCursos(){
        $Cursos = $this->model->GetCursos();
        $this->view->DisplayCursos($Cursos);
    }
    public function GetCurso($id){
        $Curso = $this->model->GetCurso($id);
        $this->view->DisplayCursos($Curso);
    }

    public function InsertarCurso(){
        $this->model->InsertarCurso($_POST['nombre'],$_POST['profesor'],$_POST['agno_correspondiente'],$_POST['id_curso']);
        header("Location: " . BASE_URL);
    }
    public function ActualizarCurso(){
        $this->model->ActualizarCurso($_POST['nombre_u'],$_POST['id_curso_u']);
       $test = $_POST["nombre_u"];
       var_dump($test);
    }

    public function BorrarCurso($id){
        $this->model->BorrarCurso($id);
        header("Location: " . BASE_URL);
    }
}


?>