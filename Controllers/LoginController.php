<?php
require_once "./Views/Loginview.php";
require_once "./Models/LoginModel.php";
require_once "./Models/RegistroModel.php";
require_once "./Helpers/AuthHelper.php";

class LoginController {

    private $model;
    private $modelUser;
    private $view;
    private $authHelper;

	function __construct(){
        $this->model = new LoginModel();
        $this->modelUser = new RegistroModel();
        $this->view = new Loginview();
        $this->authHelper = new AuthHelper();
    }

    public function ActualizarPass(){
        $usuario = $_POST['usuarioPerdido'];
        $pregunta = $_POST['selectPass'];
        $respuesta = $_POST['respuestaPass'];
        $nueva = $_POST['nuevaPass'];

        $userExist = $this->modelUser->User($usuario);
        $usuarioRegistrado = $this->modelUser->UserPass($usuario);

        if($userExist == true){ 
            if(($usuarioRegistrado->pregunta == $pregunta) && ($usuarioRegistrado->respuesta == $respuesta)){
                $this->model->ActualizarUsuario($_POST['nuevaPass'],$usuarioRegistrado->id); 
                $this->view->displayPass('hecho!');
            }else{
                $this->view->displayPass('datos no cohinciden, intente nuevamente');
            }
        }else{
            $this->view->displayPass('usuario no exite');
    }   }

    public function IniciarSesion($usuario = null,$password = null){
        if ($usuario && $password){
            //nada
        }else {
            $password = $_POST['password'];
            $usuario = $_POST['username'];
        }
        $userExist = $this->modelUser->User($usuario);
        
        if ($userExist == true){
            $user = $this->model->GetPassword($usuario);
            //$hash = password_hash($password, PASSWORD_DEFAULT);

            if ((isset($usuario) && isset($password)) && ($password === $user->password)){ //(password_verify($user->password, $hash))){  
                
                $this->authHelper->login($user);
                
                header("Location: " . BASE_URL);
            }else{
                $this->view->DisplayLogin("No ha podido loguearse");
            } 
        } else{
            $this->view->DisplayLogin("Este usuario no existe");
    }   }

    public function Login(){
        $this->view->DisplayLogin();
    }

    public function mostrarPass(){
        $this->view->displayPass();
    }

    public function Logout(){
        $this->authHelper->logout();
        header("Location: " . URL_LOGIN);
    }
}