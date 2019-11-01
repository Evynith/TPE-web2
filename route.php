<?php


require_once "Controllers/AlumnosController.php";
require_once "Controllers/CursosController.php";

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_Alumnos", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/Alumnos');
define("URL_Cursos", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/Cursos');

$Alumnoscontroller = new AlumnosController();
$CursosController = new CursosController();

if($action == ''){
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "alumnos"){
            $Alumnoscontroller->GetAlumnos();
        }elseif($partesURL[0] == "insertar") {
            $Alumnoscontroller->InsertarAlumno();
        }elseif($partesURL[0] == "alumno") {
            $Alumnoscontroller->getAlumno($partesURL[1]);
        }elseif($partesURL[0] == "borrar") {
            $Alumnoscontroller->BorrarAlumno($partesURL[1]);
        }elseif($partesURL[0] == "actualizar") {
            $Alumnoscontroller->ActualizarAlumno();
        }
        elseif($partesURL[0] == "Cursos"){
            $CursosController->GetCursos();
        }elseif($partesURL[0] == "insertarcurso") {
            $CursosController->InsertarCurso();
        }elseif($partesURL[0] == "curso") {
            $CursosController->GetCurso($partesURL[1]);
        }elseif($partesURL[0] == "borrarcurso") {
            $CursosController->BorrarCurso($partesURL[1]);
        }elseif($partesURL[0] == "actualizarcurso") {
            $CursosController->ActualizarCurso();
        }
    }
}

?>