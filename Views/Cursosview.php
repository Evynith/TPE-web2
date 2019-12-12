<?php
require_once "libs/Smarty.class.php";
require_once "./Helpers/AuthHelper.php";

class CursosView {
    
    private $smarty;
    private $userName;

    function __construct(){
        $authHelper = new AuthHelper();
        $this->userName = $authHelper->getLoggedUserName();
        $this->userLevel = $authHelper->getLoggedUser();
        
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('userName', $this->userName);
        $this->smarty->assign('userLevel', $this->userLevel); 
    }

    public function DisplayCursos($cursos){
        $this->smarty->assign('titulo',"Cursos");
        $this->smarty->assign('lista_Cursos',$cursos);
        $this->smarty->display('templates/cursos.tpl');
    }

    public function DisplayCurso($curso,$alumnos){
        $this->smarty->assign('titulo',"Curso");
        $this->smarty->assign('info_curso',$curso);
        $this->smarty->assign('lista_AlumnosCurso',$alumnos);
        $this->smarty->display('templates/curso.tpl');
    }
}