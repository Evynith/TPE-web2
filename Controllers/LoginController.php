<?php
require_once "./Views/Loginview.php";
require_once "./Models/LoginModel.php";
require_once "./Helpers/AuthHelper.php";

class LoginController {

    private $model;
    private $view;
    private $authHelper;

	function __construct(){
        $this->model = new LoginModel();
        $this->view = new Loginview();
        $this->authHelper = new AuthHelper();
    }
    public function ActualizarPass(){
        $this->model->ActualizarUsuario($_POST['nuevaPass'],$_POST['usuarioPerdido']); 
        header("Location: " . BASE_URL);
    }

    public function IniciarSesion($usuario = null,$password = null){
        if ($usuario && $password){
            //nada
        }else {
            $password = $_POST['password'];
            $usuario = $_POST['username'];
        }
        $user = $this->model->GetPassword($usuario);
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if (isset($usuario) && (password_verify($user->password, $hash))){     //$password === $usuario->password){
            
            $this->authHelper->login($user);
            
            header("Location: " . BASE_URL);
        }else{
            $this->view->DisplayLogin("No ha podido loguearse");
    }   }

    public function Login(){
        $this->view->DisplayLogin();
    }

    public function Logout(){
        $this->authHelper->logout();
        header("Location: " . URL_LOGIN);
    }
}