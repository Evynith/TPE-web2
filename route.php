<?php

require_once "./Controllers/AlumnosController.php";
require_once "./Controllers/CursosController.php";
require_once "./Controllers/LoginController.php";
require_once "./Controllers/IndexController.php";
require_once "./Controllers/RegistroController.php";
require_once "./Controllers/UsuariosController.php";
require_once "./Controllers/JuegoController.php";

$action = $_GET['action']; 
//constantes
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_ALUMNOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/alumnos');
define("URL_CURSOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/cursos');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("URL_USUARIOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

$AlumnosController = new AlumnosController();
$CursosController = new CursosController();
$LoginController = new LoginController();
$IndexController = new IndexController();
$RegistroController = new RegistroController();
$UsuariosController = new UsuariosController();
$JuegoController = new JuegoController();

    
if ($_GET['action'] == ''){
    $_GET['action'] = 'index';
}
    
$partesURL = explode('/', $action);

    switch ($partesURL[0]) { 
        
        case 'alumnos' :
            $AlumnosController->GetAlumnos();
            break;
        case 'insertar' :
            $AlumnosController->InsertarAlumno();
            break;
        case 'alumno' :
            $AlumnosController->getAlumno($partesURL[1]);
            //$AlumnosController->MostrarImagenes($partesURL[1]);
            break;
        case 'borrar':
            $AlumnosController->BorrarAlumno($partesURL[1]);
            break;
        case 'actualizarAlumno':
            $AlumnosController->ActualizarAlumno();
            break;
        case 'MostrarCursoAlumnos':
            $AlumnosController->MostrarCursoAlumnos();
            break;
        case 'mostrarAlumnosCurso':
            $CursosController->GetAlumnosCurso($partesURL[1]);
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
        case 'actualizarCurso':
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
            $AlumnosController->subirImagen($partesURL[1]); 
            break;
       case 'contraseña':
            $LoginController->mostrarPass();
            break;
       case 'actualizarPass':
            $LoginController->ActualizarPass();
            break;
       case 'juego':
            $JuegoController->mostrarJuego();
                break;
        default:
            $IndexController->MostrarIndex();
            break;
}