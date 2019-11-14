<?php
require_once('./model/GenderModel.php');
require_once('./model/SerieModel.php');
require_once('./view/GenderView.php');
require_once('./controller/LogInController.php');



class GenderController{
    private $model;
    private $modelSerie;
    private $view;
    private $LogInController;
    // private $seriesView;

    public function __construct(){
        session_start();//llamo al sesion start
        $this->model = new GenderModel();
        $this->modelSerie = new SerieModel();
        //paso la function al constructor por que siempre se van a mostrar los generos
        $this->view = new GenderView();
        // $this->seriesView = new SeriesView();
        $this->LogInController = new LoginController();

    }
    
    public function showIndex(){
        $genders = $this->model->getGenders();//obtengo los generos desde el model
        $series = $this ->modelSerie -> getSeries();
        
        $this ->view -> displayVisitante($genders, $series);
    }
    public function showIndexAdmin($existeGender = false, $existeSerie = false){//por defecto $existe es false
        $this ->LogInController-> checkLoggedIn();//chequep que esté logueado
        
        $genders = $this->model->getGenders();//obtengo los generos desde el model
        $series = $this ->modelSerie -> getSeries();
        
        $this ->view -> displayAdmin($genders, $series, $existeGender, $existeSerie);
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

// CHEQUEO DE LogIn  --->  REESCRIBIR
    // public function checkLoggedIn(){
    //     // session_destroy();
    //     // session_start();//Crea una sesión en el servidor, si ya existe trae la existente.
        
    //     // var_dump($_SESSION);
    //     // var_dump($_SESSION['ID_USER']); die();
    //     if(!isset($_SESSION['ID_USER'])){//si no está iniciada la sesion
    //         header('Location: '. LOGIN);
    //         die();//Luego de una redirección se suele llamar a la función
    //                 //die() para forzar terminar la ejecución del script.
    //     }
    //     else{
    //         // var_dump("entro");die();
    //     }
    // }

    public function addGender(){
        
        $this ->LogInController-> checkLoggedIn();//chequep que esté logueado
        //FALTA CHEQUEAR QUE SEA ADMIN
        $nameGender = $_POST['nameGenderAdd'];//guardo el nameGender en variable
        if(isset($_POST['nameGenderAdd'])){//si está seteado
            // busco en la BBDD un gender con el mismo name guardado en $nameGender
            $genderNameBBDD = $this->model->getGender($nameGender);
            // echo $nameGender; die;
            // var_dump($genderNameBBDD == null); die;
            if($genderNameBBDD == null){
                // var_dump("lala");die;
                // var_dump ($genderNameBBDD); die();
                $this->model->insertGender($nameGender);
                header("Location: " . BASE_URL. "enterSession");
            }
            else{
                $this -> showIndexAdmin($existeGender = true);
                // var_dump("ya existe");die;//hacer el fetch de la api para corroborar esto
                // header("Location: " . BASE_URL. "enterSession");
            }
        }
    }

    public function editGender(){//edit gender recibe el id del genero a editar mediante el string num 2 de la url
        // var_dump("hola");
        //         die();
        $this ->LogInController-> checkLoggedIn();
        if(isset($_POST['nameGenderEdit']) && isset($_POST['genderEdit'])){
            $nameGender = $_POST['nameGenderEdit'];
            $genderEdit = $_POST['genderEdit'];
            $this->model->editGender($nameGender, $genderEdit);
            header("Location: " . BASE_URL . "enterSession");
        }
    }

    public function deleteGender(){
        $this ->LogInController ->checkLoggedIn();
        // var_dump("HOL");
        // die();
        $genderID = $_POST['gender'];
        $this->model->deleteGender($genderID);
        header("Location: " . BASE_URL . "enterSession");
    }
    
    // public function getGender($gender){
    //     $genderFor = $this->model->getGender($gender);
    //     return $genderFor;   
    // }
}