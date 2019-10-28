<?php
require_once('./model/GenderModel.php');
require_once('./view/GenderView.php');
require_once('libs/Smarty.class.php');


class GenderController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new GenderModel();
        $this->view = new GenderView();
        
    }
    public function showIndex(){
        $this->view->displayIndex();
    }
    public function checkLoggedIn(){
        session_start();//Crea una sesión en el servidor, si ya existe trae la existente.
        if(!isset($_SESSION['ID_USER'])){//si no está iniciada la sesion
            header('Location: '. LOGIN);
            die();//Luego de una redirección se suele llamar a la función
                  //die() para forzar terminar la ejecución del script.
        }
    }
    public function getGenders(){
        $this -> checkLoggedIn();
        $genders = $this->model->getGenders();//obtengo los generos desde el model
        $this->view->showGenders($genders);

    }
    public function addGender(){
        $this -> checkLoggedIn();
        if(isset($_POST['nameGender'])){
            $nameGender= $_POST['nameGender'];
            $this->model->insertGender($nameGender);
        }
    }
    


}