<?php
require_once('./model/SerieModel.php');
require_once('./model/GenderModel.php');
require_once('./view/SerieView.php');
// require_once('./controller/GenderController.php');
require_once('./controller/LogInController.php');


class SerieController{
    private $LogInController;
    private $serieModel;
    private $serieView;
    private $GenderModel;


    public function __construct(){
        // session_start();
        $this->LogInController = new LoginController();
        $this->serieModel = new SerieModel();
        $this->GenderModel = new GenderModel();        
        $this->serieView = new SerieView();

    }
    // public function showSeries( $existeSerie = false){//por defecto $existe es false
    //     $genders = $this->model->getGenders();
    //     $series = $this ->modelSerie -> getSeries();
    //     $this ->view -> displaySeries($genders, $series, $existeSerie);
    // }

// ----------------------------------------------------------
    public function showDescripcionSeries($params = null){
        $idserieQueQuiero = $params[':ID'];
        $serie = $this ->getSerieEspecifica($idserieQueQuiero);
        $genderID = $serie ->id_gender;
        $genero = $this ->GenderModel ->getGenderByID($genderID);
        // var_dump($genero); die();

        $this->serieView->showSerie($serie, $genero);
    }
    public function getSerieEspecifica($idserieQueQuiero){
        $serie = $this->serieModel->getSerieDescription($idserieQueQuiero);
        return $serie;
    }
// ----------------------------------------------------------

    public function getSerie($serieNombre){
        $serie = $this->serieModel->getSerieDescription($serieNombre);
        // $ID = $serie->id_gender;
        // $this->serieView->showSerie($serie,);
        return $serie;
    }
    
    public function showSeriesOfGender($params=null){ 
        $ID = $params[':ID'];
        $seriesOfGender =  $this ->serieModel ->getSeriesOfGender($ID);
        $this ->serieView ->ShowSeriesOfGender($seriesOfGender);
    }


// MODIFICAR SERIES
    public function addSerie(){
        $this ->LogInController ->checkLoggedIn();
        $this ->LogInController ->verifyAdmin();
        if(($_POST['nameSerieAdd'])!='' && ($_POST['descriptionSerieAdd']) !='' 
        && ($_POST['scoreSerieAdd']) !='' && ($_POST['gender'])){
            
            $nameSerie = $_POST['nameSerieAdd'];
            $descriptionSerie = $_POST['descriptionSerieAdd'];
            $scoreSerie = $_POST['scoreSerieAdd'];
            $gender = $_POST['gender'];
            $imagen = $_FILES['imagen'];
            $SerieNameBBDD = $this ->getSerie($nameSerie);// corroboro de que el name ingresado no exista  en la BBDD
            if($imagen){
                if ($imagen['type'] == "image/jpeg" || $imagen['type'] == "image/jpg" || $imagen['type'] == "image/png") {
                
                    
                }
                else {
                    $this->view->showError("Formato no aceptado");
                    die();
                }
    
            }

            if($SerieNameBBDD == null){
                $this ->serieModel -> insertSerie($nameSerie, $descriptionSerie, $scoreSerie, $gender, $imagen);
                header("Location: " . BASE_URL. "series");
            }
            else{
                var_dump("ya existe");die;
                $this ->GenderController ->showIndexAdmin($existeSerie = true);

            }
        }
        
    }
    public function editSerie(){
        $this ->LogInController ->checkLoggedIn();
        $this ->LogInController ->verifyAdmin();
        if(($_POST['nameSerieEdit'])!='' && ($_POST['descriptionSerieEdit']) !='' 
        && ($_POST['scoreSerieEdit']) !='' && ($_POST['genderEdit'])!='' && ($_POST['serieEdit'])!=''){
            $nameSerie = $_POST['nameSerieEdit'];
            $descriptionSerie = $_POST['descriptionSerieEdit'];
            $scoreSerie = $_POST['scoreSerieEdit'];
            $gender = $_POST['genderEdit'];
            $recibido = $_POST['serieEdit'];
            // var_dump($scoreSerie); die;
            $this->serieModel->editSerie($recibido, $nameSerie, $descriptionSerie, $scoreSerie, $gender);
            header("Location: " . BASE_URL . "series");
        }
    }
    public function deleteSerie(){
        $this ->LogInController ->checkLoggedIn();
        $this ->LogInController ->verifyAdmin();
        if(($_POST['serieDelete'])!=''){
            // var_dump($serieName);
            // die();
            $serieName = $_POST['serieDelete'];
            $this->serieModel->deleteSerie($serieName);
            header("Location: " . BASE_URL . "series");

        }
    }
}
