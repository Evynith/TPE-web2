<?php
require_once 'libs/Smarty.class.php';
require_once "./Helpers/AuthHelper.php";

class Loginview {

    private $smarty;
    private $userName;

    function __construct(){
        $authHelper = new AuthHelper();
        $this->userName = $authHelper->getLoggedUserName();
        
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('userName', $this->userName);
    }

    public function DisplayLogin($error = null){
        $this->smarty->assign('titulo',"Login");
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');
    }
    
    public function DisplayPass($mensaje = null){
        $this->smarty->assign('titulo',"Login");
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('templates/pass.tpl');
    }
}