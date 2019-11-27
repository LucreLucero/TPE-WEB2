<?php
require_once('Router.php');
require_once('./api/CommentsApiController.php');

// CONSTANTES PARA RUTEO
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$router = new Router();

// rutas
// $router->addRoute("comments/", "GET", "CommentsApiController", "getComments");
$router->addRoute("serie/:ID/comments/", "GET", "CommentsApiController", "getCommentsOfSerie");
$router->addRoute("comments", "POST", "CommentsApiController", "addComment");
$router->addRoute("comments/:ID", "DELETE", "CommentsApiController", "deleteComment");
$router->addRoute("/serie/:ID/promedio", "GET", "CommentsApiController", "promedio");
// $router->addRoute("/comments/:ID", "PUT", "CommentsApiController", "updateTask");

//Ruta por defecto.
//$r->setDefaultRoute("CommentsApiController", "getComments");

//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
