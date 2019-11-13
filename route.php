<?php
require_once ('controller/GenderController.php');
require_once ('controller/LogInController.php');
require_once ('controller/SerieController.php');
require_once ('Router.php');

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
// define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", BASE_URL . 'login');
define("SIGNIN", BASE_URL . 'signIn');
define("URL_SERIE", BASE_URL . 'serie');

$r = new Router();// Router se encarga de 

//rutas
$r->addRoute("login", "GET", "LoginController", "showLogin");//anda
$r->addRoute("enterSession", "POST", "GenderController", "showIndexAdmin");//cambiar enterSession por Home
$r->addRoute("verifyLog", "POST", "LoginController", "verifyUser");//se activa al loguearse ANDA
$r->addRoute("add", "POST", "GenderController", "addGender");
// $r->addRoute("edit", "POST", "GenderController", "editGender");
// $r->addRoute("delete", "POST", "GenderController", "deleteGender");
// $r->addRoute("addSerie", "POST", "SerieController", "addSerie");
// $r->addRoute("editSerie", "POST", "SerieController", "editSerie");
// $r->addRoute("deleteSerie", "POST", "SerieController", "deleteSerie");




//Ruta por defecto.
$r->setDefaultRoute("GenderController", "showIndex");

//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 










// $action = $_GET['action'];//tomo el valor del action (accion que haga el usuario)
// $genderController = new GenderController();
// $controllerLogin = new LoginController();
// $serieController = new SerieController();
    
//     if($action==''){//si action es nulo se muestra el index con la series
//         $genderController -> showIndex();
//     }
//     elseif(isset($action)){
//         //si el action está seteado
//         $url = explode("/", $action);//divido con el explode un string en un array de strings
//             if($url[0] == 'login'){
//                 $controllerLogin -> showLogin();
//             }
//             if(isset($url[1]) && $url[1] == 'add'){
//                 $genderController -> addGender();
//                 die();
//             }
//             if(isset($url[1]) && $url[1] == 'edit'){
//                 $genderController -> editGender();
//                 die();
//             }
//             if(isset($url[1]) && $url[1] == 'delete'){
//                 $genderController -> deleteGender();
//                 die();
//             }
//             if(isset($url[1]) && $url[1] == 'addSerie'){
//                 $serieController -> addSerie();
//                 die();
//             }
//             if(isset($url[1]) && $url[1] == 'editSerie'){
//                 $serieController -> editSerie();
//                 die();
//             }
//             if(isset($url[1]) && $url[1] == 'deleteSerie'){
//                 $serieController -> deleteSerie();
//                 die();
//             }
//                 // ----------------------------------
//             if($url[0] == 'enterSession'){
//                 // $controllerLogin -> verifyUser();
//                 $genderController -> showIndexAdmin();
//             }
//             if($url[0] == 'verifyLog'){
//                 $controllerLogin -> verifyUser();
//                 $genderController -> showIndexAdmin();
//             }
//             if($url[0] == 'logout'){
//                 $controller = new LoginController();
//                 $controller -> logout();
//             }
//             // ------agregar/editar/borrar generos ----
//             if($url[0]=='insertGender'){
//                 $genderController->addGender();
//             }
//             if($url[0]=='serie'){
//                 $infoSerie = $serieController->getSerie($url[1]);
//                 $genderName = $genderController -> getGenderByID($infoSerie);
//                 $serieController->showSerie($infoSerie, $genderName);
//             }  
         
//             if($url[0]=='genero'){
//                 $gender = $genderController->getGender($url[1]);
//                 $serieController->getSeriesOfGender($gender);
//             }
            


