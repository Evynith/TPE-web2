<?php

require_once('libs/Smarty.class.php');
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

    public function DisplayCursos($Cursos){
        $this->smarty->assign('titulo',"Mostrar Cursos");
        $this->smarty->assign('lista_Cursos',$Cursos);
        $this->smarty->display('templates/ver_cursos.tpl');
    }
}