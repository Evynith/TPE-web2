<?php
require_once "libs/Smarty.class.php";
require_once "./Helpers/AuthHelper.php";

class AlumnosView {

    private $smarty;
    private $userName;
    
    public function __construct() {
        $authHelper = new AuthHelper();
        $this->userName = $authHelper->getLoggedUserName();
        $this->userLevel = $authHelper->getLoggedUser();
        
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('userName', $this->userName);
        $this->smarty->assign('userLevel', $this->userLevel); 
    }

    public function DisplayAlumnos($Alumnos, $mensaje = null){
        $this->smarty->assign('titulo',"Mostrar Alumnos");
        $this->smarty->assign('lista_Alumnos',$Alumnos);
        $this->smarty->assign('mensaje',$mensaje);

        $this->smarty->display('templates/alumnos.tpl');
    }

    public function DisplayAlumnoImg($Alumno, $imagenes = null, $mensaje = null){
        $this->smarty->assign('titulo','Alumno');
        $this->smarty->assign('lista_imagenes',$imagenes);
        $this->smarty->assign('lista_Alumnos',$Alumno);
        $this->smarty->assign('mensaje',$mensaje);

        $this->smarty->display('templates/alumno.tpl');
    }
    
    public function MostrarAlumnosCursos($Alumnos){
        $this->smarty->assign('titulo',"Alumnos con su curso");
        $this->smarty->assign('lista_Alumnos',$Alumnos);
        
        $this->smarty->display('templates/alumnosCurso.tpl');
    }
    
    /*  public function DisplayAlumno($Alumno){
         $this->smarty->assign('titulo','Alumno');
         $this->smarty->assign('lista_Alumnos',$Alumno);
 
         $this->smarty->display('templates/alumno.tpl');
     } */
     
    /* public function MostrarImagenes($imagenes){
        $this->smarty->assign('lista_imagenes',$imagenes);

        $this->smarty->display('templates/ver_imagenes.tpl');
    } */
    
    /*     
    function mostrarNoEncontrado($id_alumno, $error = "") {
        $this->Smarty->assign("titulo", "Error");
        // $this->Smarty->assign("inicio", "Volver al Inicio");
        $this->Smarty->assign("volver", "Volver a: " . $id_alumno);
        $this->Smarty->assign("url", "artista/" . $id_alumno);
        $this->Smarty->assign("error", $error);

        $this->Smarty->display("templates/noEncontrado.tpl");
    } 
    */
}
