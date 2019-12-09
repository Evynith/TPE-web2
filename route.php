<?php

require_once "./Controllers/AlumnosController.php";
require_once "./Controllers/CursosController.php";
require_once "./Controllers/LoginController.php";
require_once "./Controllers/IndexController.php";
require_once "./Controllers/RegistroController.php";
require_once "./Controllers/UsuariosController.php";

$action = $_GET['action']; 
//constantes
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_ALUMNOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/alumnos');
define("URL_CURSOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/cursos');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("URL_USUARIOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

$Alumnoscontroller = new AlumnosController();
$CursosController = new CursosController();
$LoginController = new LoginController();
$IndexController = new IndexController();
$RegistroController = new RegistroController();
$UsuariosController = new UsuariosController();

    
if ($_GET['action'] == ''){
    $_GET['action'] = 'index';
}
    
$partesURL = explode('/', $action);

    switch ($partesURL[0]) { 
        
        case 'alumnos' :
            $Alumnoscontroller->GetAlumnos();
            break;
        case 'insertar' :
            $Alumnoscontroller->InsertarAlumno();
            break;
        case 'alumno' :
            $Alumnoscontroller->getAlumno($partesURL[1]);
            break;
        case 'borrar':
            $Alumnoscontroller->BorrarAlumno($partesURL[1]);
            break;
        case 'actualizar':
            $Alumnoscontroller->ActualizarAlumno();
            break;
        case 'MostrarCursoAlumnos':
            $Alumnoscontroller->MostrarCursoAlumnos();
            break;
        case 'cursos':
            $CursosController->GetCursos();
            break;
        case 'insertarcurso':
            $CursosController->InsertarCurso();
            break;
        case 'curso':
            $CursosController->GetCurso($partesURL[1]);
            break;
        case 'borrarcurso':
            $CursosController->BorrarCurso($partesURL[1]);
            break;
        case 'actualizarcurso':
            $CursosController->ActualizarCurso();
            break;
        case 'login':
            $LoginController->login();
            break;
        case 'iniciarSesion':
            $LoginController->iniciarSesion();
            break;
        case 'logout':
            $LoginController->logout();
            break;
        case 'registro':
            $RegistroController->MostrarRegistro();
            break;
        case 'registrarse':
            $RegistroController->Registrar();
            break;
        case 'usuarios':
            $UsuariosController->GetUsuarios();
            break;
        case 'borrarUsuario':
            $UsuariosController->BorrarUsuario($partesURL[1]);
            break;
        case 'privilegio':
            $UsuariosController->ActualizarUsuario();
            break;
       case 'actualizarUsuario':
            $UsuariosController->ActualizarUsuario();
            break;
       case 'subirImagen':
            $Alumnoscontroller->subirImagen($partesURL[1]); 
            break;
       // case 'contraseña':
        //    $LoginController->ActualizarPass();
        //    break;
        default:
            $IndexController->MostrarIndex();
            break;
}