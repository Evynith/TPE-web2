<?php

require_once "libs/Smarty.class.php";
require_once "./Helpers/AuthHelper.php";

class indexView {

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

    public function DisplayIndex(){
        $this->smarty->assign('titulo',"Inicio");
        $this->smarty->display('templates/index.tpl');
    }
}