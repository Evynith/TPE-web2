<?php
require_once './Views/juegoview.php';

class JuegoController {
    private $view;

	function __construct(){
        $this->view = new juegoview();
    }
    function mostrarJuego(){
        $this->view->DisplayJuego();
    }
}