<?php
require_once "./Models/UsuariosModel.php";
require_once "./Views/Usuariosview.php";
require_once "./Helpers/AuthHelper.php";

class UsuariosController {

    private $model;
    private $view;
    private $AuthHelper;

	function __construct(){
        $this->AuthHelper = new AuthHelper();
        //$this->AuthHelper->checkLoggedIn();

        $this->model = new UsuariosModel();
        $this->view = new UsuariosView();
    }
    
    public function GetUsuarios(){
        $this->AuthHelper->checkLoggedIn();
        $usuarios = $this->model->GetUsuarios();
        $this->view->DisplayUsuarios($usuarios);
    }

    public function ActualizarUsuario(){
        $this->model->ActualizarUsuario($_POST['nivel'],$_POST['id_usuario']); //nivel - id
        header("Location: " . URL_USUARIOS);
    }

    public function BorrarUsuario($id){
        $this->model->BorrarUsuario($id);
        header("Location: " . URL_USUARIOS);
    }
}