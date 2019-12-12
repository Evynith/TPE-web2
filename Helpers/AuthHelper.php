<?php
//engloba toda la funcio0nalidad de sesiones para poder usarlas en cada controlador sin repetir codigo
class AuthHelper {

    public function __construct() {
       
    }

    public function login($usuario) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        //session_start();
        if (session_status() != PHP_SESSION_ACTIVE){ session_start();}
        $_SESSION['ID_USER'] = $usuario->id;
        $_SESSION['USERNAME'] = $usuario->email; 
        $_SESSION['PERMISSIONS'] = $usuario->nivel; //guarda por request en el servidor datos del
    }

    public function logout() {
        //session_start();
        if (session_status() != PHP_SESSION_ACTIVE){ session_start();}
        session_destroy();
    }

    public function checkLoggedIn() {
        //session_start();
        if (session_status() != PHP_SESSION_ACTIVE){ session_start();}
        if (!isset($_SESSION['ID_USER'])) {
            header("Location: " . URL_LOGIN);
            die();
    }   }

    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE){ session_start();}
        if (isset($_SESSION['USERNAME'])) {
            return  ($_SESSION['USERNAME']);
        }else {
            return null;
    }   }

    public function getLoggedUser(){
        if (session_status() != PHP_SESSION_ACTIVE){ session_start();}
        if (isset($_SESSION['PERMISSIONS'])) {
            return  ($_SESSION['PERMISSIONS']);
        }else {
            return null;
    }   }
}