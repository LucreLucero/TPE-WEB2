<?php
require_once('./model/SerieModel.php');
require_once('./view/SerieView.php');
require_once('./controller/GenderController.php');
require_once('./controller/LogInController.php');


class SerieController{
    private $serieModel;
    private $serieView;
    private $GenderController;
    private $LogInController;


    public function __construct(){
        session_start();
        $this->serieModel = new SerieModel();
        $this->GenderController = new GenderController();        
        $this->serieView = new SerieView();
        $this->LogInController = new LoginController();

    }
// ----------------------------------------------------------
    public function showDescripcionSeries($params=null){
        $idserieQueQuiero = $params[':ID'];
        $serie = $this->getSerieEspecifica($idserieQueQuiero);
        $genero = $this->GenderController->getGenderByID($serie);
        // var_dump($genero); die();

        $this->serieView->showSerie($serie, $genero);
    }
    public function getSerieEspecifica($idserieQueQuiero){
        $serie = $this->serieModel->getSerieDescription($idserieQueQuiero);
        return $serie;
    }
// ----------------------------------------------------------

    // public function getSerie($serieNombre){
    //     $serie = $this->serieModel->getSerieDescription($serieNombre);
    //     // $ID = $serie->id_gender;
    //     // $this->serieView->showSerie($serie,);
    //     return $serie;
    // }
    // public function showSerie($infoSerie, $genderName){
    //     // $serie = $this->serieModel->getSerieDescription($serieNombre);
    //     // $ID = $serie->id_gender;
    //     $this->serieView->showSerie($infoSerie, $genderName);
    // }
    
    public function showSeriesOfGender($params=null){ 
        $ID = $params[':ID'];
        // var_dump($ID); die();
        $seriesOfGender =  $this ->serieModel ->getSeriesOfGender($ID);
        

        $this ->serieView ->ShowSeriesOfGender($seriesOfGender);
    }

    public function addSerie(){
        $this ->LogInController ->checkLoggedIn();
        if(($_POST['nameSerieAdd'])!='' && ($_POST['descriptionSerieAdd']) !='' 
        && ($_POST['scoreSerieAdd']) !='' && ($_POST['gender'])){
            
            $nameSerie = $_POST['nameSerieAdd'];
            $descriptionSerie = $_POST['descriptionSerieAdd'];
            $scoreSerie = $_POST['scoreSerieAdd'];
            $gender = $_POST['gender'];
            $SerieNameBBDD = $this ->getSerie($nameSerie);
            // var_dump($SerieNameBBDD);    die();
            if($SerieNameBBDD == null){
                $this ->serieModel -> insertSerie($nameSerie, $descriptionSerie, $scoreSerie, $gender);
                header("Location: " . BASE_URL. "enterSession");
            }
            else{
                var_dump("ya existe");die;
                $this ->GenderController ->showIndexAdmin($existeSerie = true);

            }
        }
        
    }
    public function editSerie(){
        $this ->LogInController ->checkLoggedIn();
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
        $this ->LogInController ->checkLoggedIn();
        if(($_POST['serieDelete'])!=''){
            // var_dump($serieName);
            // die();
            $serieName = $_POST['serieDelete'];
            $this->serieModel->deleteSerie($serieName);
            header("Location: " . BASE_URL . "enterSession");

        }
    }
}
