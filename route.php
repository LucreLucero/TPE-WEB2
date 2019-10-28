<?php
require_once ('controller/GenderController.php');
require_once ('controller/LogInController.php');
require_once ('controller/SerieController.php');

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", BASE_URL . 'login');
define("SIGNIN", BASE_URL . 'signIn');

$action = $_GET['action'];//tomo el valor del action (accion que haga el usuario)
$genderController = new GenderController();
$controllerLogin = new LoginController();
//hago un objeto de la class GenderController
//$serieController = new SerieController();
    if($action==''){//si action es nulo se muestra el index por defecto
        $genderController -> showIndex();
    }
    elseif(isset($action)){
        //si el action está seteado
        $url = explode("/", $action);//divido con el explode un string en un array de strings
            if($url[0] == 'login'){
                $controllerLogin -> showLogin();
            }
            if($url[0] == 'signIn'){
                $controllerLogin -> showSignIn();
            }
            if($url[0] == 'signInEnter'){
                $controllerLogin -> signIn();
            }
            if($url[0] == 'enterSession'){
                $controllerLogin -> verifyUser();
            }

            if($url[0] == 'logout'){
                $controller = new LoginController();
                $controller -> logout();
            }
        if($url[0]=='insertGender'){
            $genderController->addGender();
        }
        

    }



