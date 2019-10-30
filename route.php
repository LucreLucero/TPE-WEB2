<?php
require_once ('controller/GenderController.php');
require_once ('controller/LogInController.php');
require_once ('controller/SerieController.php');

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", BASE_URL . 'login');
define("SIGNIN", BASE_URL . 'signIn');
define("URL_SERIE", BASE_URL . 'serie');

$action = $_GET['action'];//tomo el valor del action (accion que haga el usuario)
$genderController = new GenderController();
$controllerLogin = new LoginController();
//hago un objeto de la class GenderController
$serieController = new SerieController();
    if($action==''){//si action es nulo se muestra el index con la series
        $genderController -> showIndex();
        // $genderController -> getGenders();

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
            if($url[0]=='serie'){
                $serieController->showSerie($url[1]);
            }
            if($url[0]=='genders'){
                $serieController->showIndex();
            }
            if($url[0]=='genero'){
                $gender = $genderController->getGender($url[1]);
                // var_dump($gender);
                // die();
                $serieController->getSeriesOfGender($gender);
            }  

    }



