<?php
require_once "libs/Smarty.class.php";
require_once "./Helpers/AuthHelper.php";

class UsuariosView {

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

    public function DisplayUsuarios($usuario){
        $this->smarty->assign('titulo',"Usuarios");
        $this->smarty->assign('usuarios',$usuario);
        $this->smarty->display('templates/usuarios.tpl');
    }
}