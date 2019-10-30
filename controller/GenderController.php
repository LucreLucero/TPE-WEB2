<?php
require_once('./model/GenderModel.php');
require_once('./model/SerieModel.php');
require_once('./view/GenderView.php');


class GenderController{
    private $model;
    private $modelSerie;
    private $view;

    public function __construct(){
        $this->model = new GenderModel();
        $this->modelSerie = new SerieModel();
        //paso la function al constructor por que siempre se van a mostrar los generos
        $this->view = new GenderView();
        
    }
    
    public function getGender(){
        $genders = $this->model->getGenders();    
        $this ->view -> displayGenders($genders);
    }

    public function showIndex(){
        $genders = $this->model->getGenders();//obtengo los generos desde el model
        $this->view->displayGenders($genders);

        $series = $this ->modelSerie -> getSeries();
        // var_dump($series);
        // die();
        $this ->view -> displaySeries($series);
    }

// -------COSAS DE ADMINS QUE SE LOGUEAN----------

// CHEQUEO DE LogIn
public function checkLoggedIn(){
    session_start();//Crea una sesión en el servidor, si ya existe trae la existente.
    if(!isset($_SESSION['ID_USER'])){//si no está iniciada la sesion
        header('Location: '. LOGIN);
        die();//Luego de una redirección se suele llamar a la función
                  //die() para forzar terminar la ejecución del script.
    }
}
public function showIndexAdmin(){
    $genders = $this->model->getGenders();//obtengo los generos desde el model
    // $this->view->displayGenders($genders);
    // var_dump($genders);
    // die();

    $series = $this ->modelSerie -> getSeries();
    // var_dump($series);
    // die();
    $this ->view -> displayAdmin($genders, $series);
}

public function addGender(){
    $this -> checkLoggedIn();
    if(isset($_POST['nameGenderAdd'])){
        $nameGender = $_POST['nameGenderAdd'];
        $this->model->insertGender($nameGender);
        header("Location: " . BASE_URL. "enterSession");
        // $this->view->displayAdmin($nameGender,null);
    }
}

    public function editGender($recibido){
        $this -> checkLoggedIn();
        if(isset($_POST['nameGenderEdit'])){
            $nameGender = $_POST['nameGenderEdit'];
            $this->model->editGender($recibido, $nameGender);
            header("Location: " . BASE_URL . "enterSession");
        // $this->view->displayAdmin($nameGender,null);
    }
    }

    public function deleteGender($genderID){
        $this -> checkLoggedIn();

        // var_dump($genderID);
        // die();
        $this->model->deleteGender($genderID);
        // $this->view->displayGenders();
        header("Location: " . BASE_URL . "enterSession");

    }


}