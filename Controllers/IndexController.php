<?php
require_once './Views/indexview.php';
require_once './Models/IndexModel.php';

class IndexController {
    private $model;
    private $view;

	function __construct(){
        $this->model = new IndexModel();
        $this->view = new indexview();
    }
    function mostrarIndex(){
        $this->view->DisplayIndex();
    }
}