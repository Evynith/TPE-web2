<?php

class IndexModel {
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_academia;charset=utf8', 'root', '');
    }
}