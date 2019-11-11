<?php
require_once('./model/GenderModel.php');
require_once('./model/SerieModel.php');
require_once('./view/GenderView.php');


class GenderController{
    private $model;
    private $modelSerie;
    private $view;

    public function __construct(){
        session_start();//llamo al sesion start
        $this->model = new GenderModel();
        $this->modelSerie = new SerieModel();
        //paso la function al constructor por que siempre se van a mostrar los generos
        $this->view = new GenderView();
        
    }
    
    public function showIndex(){
        $genders = $this->model->getGenders();//obtengo los generos desde el model
        $series = $this ->modelSerie -> getSeries();

        $this ->view -> displayVisitante($genders, $series);
        // $this->view->displayGenders($genders);
        // $this ->view -> displaySeries($series);
    }

    public function getGender($genderName){
        $gender = $this->model->getGender($genderName);  
        return  $gender; 
        // $this ->view -> displayGenders($genders);
    }

    public function getGenderByID($infoSerie){
        $genderID = $infoSerie ->id_gender;
        $genderName = $this->model->getGenderByID($genderID);  
        return  $genderName; 
        // $this ->view -> displayGenders($genders);
    }

    // PARA HACER EL ORDENAMIENTO POR GENERO-----------
    public function getGenders(){
        $genders = $this->model->getGenders();
        $this ->view -> displayGenders($genders);
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
        }
    }

    public function editGender(){//edit gender recibe el id del genero a editar mediante el string num 2 de la url
        // var_dump("hola");
        //         die();
        $this -> checkLoggedIn();
        if(isset($_POST['nameGenderEdit']) && isset($_POST['genderEdit'])){
            $nameGender = $_POST['nameGenderEdit'];
            $genderEdit = $_POST['genderEdit'];
            $this->model->editGender($nameGender, $genderEdit);
            header("Location: " . BASE_URL . "enterSession");
        }
    }

    public function deleteGender(){
        $this -> checkLoggedIn();
        $genderID = $_post['gender'];
        // var_dump($genderID);
        // die();
        $this->model->deleteGender($genderID);
        header("Location: " . BASE_URL . "enterSession");
    }
    
    // public function getGender($gender){
    //     $genderFor = $this->model->getGender($gender);
    //     return $genderFor;   
    // }
}