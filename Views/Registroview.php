<?php
require_once 'libs/Smarty.class.php';
require_once "./Helpers/AuthHelper.php";

class Registroview {

    private $smarty;
    private $userName;

    function __construct(){
        $authHelper = new AuthHelper();
        $this->userName = $authHelper->getLoggedUserName();
        
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('userName', $this->userName);
    }
    
    public function DisplayRegistro($mensaje = null){
        $this->smarty->assign('titulo',"Registro");
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('templates/registro.tpl');
    }
}