<?php
require_once('./model/SerieModel.php');
require_once('./view/SerieView.php');

class SerieController{
    private $serieModel;
    private $serieView;

    public function __construct(){
        $this->serieModel = new SerieModel();
        // var_dump($serieModel);
        // die();
        $this->serieView = new SerieView();
    }

    public function getSerie($serieNombre){
        $serie = $this->serieModel->getSerieDescription($serieNombre);
        // $ID = $serie->id_gender;
        // $this->serieView->showSerie($serie,);
        return $serie;
    }
    public function showSerie($infoSerie, $genderName){
        // $serie = $this->serieModel->getSerieDescription($serieNombre);
        // $ID = $serie->id_gender;
        $this->serieView->showSerie($infoSerie, $genderName);
    }
    // // CHEQUEO DE LogIn
    public function checkLoggedIn(){
        // var_dump("hey!");
        //     die();
        session_start();//Crea una sesión en el servidor, si ya existe trae la existente.
        if(!isset($_SESSION['ID_USER'])){//si no está iniciada la sesion
            // var_dump("hey!");
            // die();//Luego de una redirección se suele llamar a la función

            header('Location: '. LOGIN);
            die();//Luego de una redirección se suele llamar a la función
                    //die() para forzar terminar la ejecución del script.
        }
    }
    
    public function getSeriesOfGender($gender){ 
        $ID= $gender->id_gender;
        // var_dump($ID);
        // die(); 
        $seriesOfGender =  $this ->serieModel ->getSeriesOfGender($ID);
        // var_dump($seriesOfGender);//tengo el problema que traigo un objeto entonces no le puedo hacer el get
        // die();

        $this ->serieView ->ShowSeriesOfGender($seriesOfGender);

    }
    public function addSerie(){
        // var_dump("hey!");
        //     die();
        // $this -> checkLoggedIn();
        if(($_POST['nameSerieAdd'])!='' && ($_POST['descriptionSerieAdd']) !='' 
        && ($_POST['scoreSerieAdd']) !='' && ($_POST['gender'])){
            $nameSerie = $_POST['nameSerieAdd'];
            $descriptionSerie = $_POST['descriptionSerieAdd'];
            $scoreSerie = $_POST['scoreSerieAdd'];
            $gender = $_POST['gender'];
            $this ->serieModel -> insertSerie($nameSerie, $descriptionSerie, $scoreSerie, $gender);
            
        }
        header("Location: " . BASE_URL. "enterSession");
        
    }
    public function editSerie(){
        $this -> checkLoggedIn();
        if(($_POST['nameSerieEdit'])!='' && ($_POST['descriptionSerieEdit']) !='' 
        && ($_POST['scoreSerieEdit']) !='' && ($_POST['genderEdit'])!='' && ($_POST['serieEdit'])!=''){
            $nameSerie = $_POST['nameSerieEdit'];
            $descriptionSerie = $_POST['descriptionSerieEdit'];
            $scoreSerie = $_POST['scoreSerieEdit'];
            $gender = $_POST['genderEdit'];
            $recibido = $_POST['serieEdit'];
            $this->serieModel->editSerie($recibido, $nameSerie, $descriptionSerie, $scoreSerie, $gender);
            header("Location: " . BASE_URL . "enterSession");
        }
    }
    public function deleteSerie(){
        $this -> checkLoggedIn();
        if(($_POST['serieDelete'])!=''){
            // var_dump($serieName);
            // die();
            $serieName = $_POST['serieDelete'];
            $this->serieModel->deleteSerie($serieName);
            header("Location: " . BASE_URL . "enterSession");

        }
    }
}
