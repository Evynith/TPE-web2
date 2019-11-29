<?php
require_once './Views/Registroview.php';
require_once './Models/RegistroModel.php';
require_once './Controllers/LoginController.php';

class RegistroController {

    private $model;
    private $view;
    private $login;

	function __construct(){
        $this->model = new RegistroModel();
        $this->view = new Registroview();
        $this->login = new LoginController();
    }
    
    public function MostrarRegistro(){
        $this->view->DisplayRegistro();
    }
    public function Registrar(){
        $username = $_POST['registro_username'];
        $password = $_POST['registro_password'];
        $pregunta = $_POST['select'];
        $respuesta = $_POST['respuesta'];

        if (($username) && ($password) && ($pregunta) && ($respuesta)){
            $usuarioRegistrado = $this->model->User($username);

            if($usuarioRegistrado == false){
                //primero giardo mi usuario y seguido lo loguo con los mismos daos que junté
                $this->model->InsertarRegistro($username,$password,$pregunta,$respuesta);
                //$this->view->DisplayRegistro("Registro con exito");
                $this->login->IniciarSesion($username,$password);
            }else {
                $this->view->DisplayRegistro("Ya se encuentra registrado");
            }
        }else{
        $this->view->DisplayRegistro("Falta llenar el formulario");
    }   }
}