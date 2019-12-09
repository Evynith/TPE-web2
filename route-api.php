<?php
require_once("Router.php");
require_once("./api/ComentariosApiController.php");

 //constantes de ruteo
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// creo el router
$router = new Router();

//tabla de ruteo
//URL - verbo - controller - metodo
//$router->addRoute("comentarioss", "GET", "ComentariosApiController", "getComentarioss");
$router->addRoute("comentarios/:ID", "GET", "ComentariosApiController", "getComentarios");
$router->addRoute("comentarios/:ID", "DELETE", "ComentariosApiController", "deleteComment");
$router->addRoute("comentarios", "POST", "ComentariosApiController", "addComment");
$router->addRoute("comentarios/:ID", "PUT", "ComentariosApiController", "updateComment");

// ruteo
// recurso solicitado
$resource = $_GET["resource"];
// metodo utilizado
$method = $_SERVER["REQUEST_METHOD"];

$router->route($resource, $method);