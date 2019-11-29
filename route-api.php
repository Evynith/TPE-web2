<?php
require_once("Router.php");
require_once("./api/ComentariosApiController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
//$router->addRoute("comentarioss", "GET", "ComentariosApiController", "getComentarioss");
$router->addRoute("comentarios/:ID", "GET", "ComentariosApiController", "getComentarios");
$router->addRoute("comentarios/:ID", "DELETE", "ComentariosApiController", "deleteComment");
$router->addRoute("comentarios", "POST", "ComentariosApiController", "addComment");
$router->addRoute("comentarios/:ID", "PUT", "ComentariosApiController", "updateComment");

// rutea
$router->route($resource, $method);

