<?php
require_once('./model/SerieModel.php');
require_once('./model/GenderModel.php');
require_once('./model/CommentsModel.php');
require_once('./view/SerieView.php');
require_once('./controller/LogInController.php');


class SerieController{
    private $LogInController;
    private $serieModel;
    // private $commentsModel;
    private $serieView;
    private $GenderModel;


    public function __construct(){
        // session_start();
        $this->LogInController = new LoginController();
        $this->serieModel = new SerieModel();
        // $this->commentsModel = new CommentsModel();
        $this->GenderModel = new GenderModel();    
        $isAdmin = $this ->LogInController ->isAdmin();    
        $this->serieView = new SerieView($isAdmin);

    }
    // public function showSeries( $existeSerie = false){//por defecto $existe es false
    //     $genders = $this->model->getGenders();
    //     $series = $this ->modelSerie -> getSeries();
    //     $this ->view -> displaySeries($genders, $series, $existeSerie);
    // }

// ----------------------------------------------------------
    public function showDescripcionSeries($params = null){
        $userDates = $this ->LogInController -> getUser();
        // var_dump($userDates); die;
        $idserieQueQuiero = $params[':ID'];
        $serie = $this ->getSerieEspecifica($idserieQueQuiero);
        $genderID = $serie ->id_gender;
        $genero = $this ->GenderModel ->getGenderByID($genderID);
        $images = $this->serieModel-> getImage($serie->id_serie);
        // $comments = $this->commentsModel->getAllComments($serie->id_serie);
        // var_dump($images); die();
        // var_dump($userDates->name);
        $this->serieView->showSerie($serie, $genero, $images, $userDates);
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
    public function addSerie(){//recibo las imagenes con el tipo checkeado
        $this ->LogInController ->checkLoggedIn();
        $this ->LogInController ->verifyAdmin();
        if(($_POST['nameSerieAdd'])!='' && ($_POST['descriptionSerieAdd']) !='' 
        && ($_POST['scoreSerieAdd']) !='' && ($_POST['gender'])){
            
            $nameSerie = $_POST['nameSerieAdd'];
            $descriptionSerie = $_POST['descriptionSerieAdd'];
            $scoreSerie = $_POST['scoreSerieAdd'];
            $gender = $_POST['gender'];
            // $_FILES[“input_name”][“name”]

            $images = $_FILES['images'];
            // var_dump($images);die();

            $TemporalImageRoute = $_FILES['images']['tmp_name'];
            $isImage = $this ->isImage($images);
            $SerieNameBBDD = $this ->getSerie($nameSerie);// corroboro de que el name ingresado no exista  en la BBDD
            if($SerieNameBBDD == null){  //&& $isImage == true ){
                if ($isImage == true ){ 
                    // var_dump( $images);die;
                    
                    $this ->serieModel -> insertSerie($nameSerie, $descriptionSerie, $scoreSerie, $gender, $images);
                    header("Location: " . BASE_URL. "series");
                }
                else{                
                    var_dump("formato no aceptado");die;
                }
            }
            else{
                var_dump("ya existe");die;
                $this ->GenderController ->showIndexAdmin($existeSerie = true);
                
            }
        }   
    }
    private function isImage($images){ //compruebo las imagenes y las retorno a addSerie
        $cantImages = count([$images['type']]);
        // var_dump($cantImages);die(+);
        $areImg = true;
        if($cantImages > 1){
            for ($i=0;$i<$cantImages;$i++){
                $imageClass = $images['type'][$i];
                if($imageClass == "image/jpeg" || $imageClass == "image/jpg" || $imageClass == "image/png"){
                    $areImg = true;
                }
                else{
                    $areImg = false;
                }
            }
        }
        else{
            // var_dump($areImg . "aqui");die;

            // var_dump($images['type']); die;
            $imgType = $images["type"][0];
            // var_dump($imgType[0]);die;

            if($imgType == "image/jpeg" || $imgType == "image/jpg" || $imgType == "image/png"){
                $areImg = true;
            }
            else{
                $areImg = false;
            }
        }
        // var_dump($areImg);die;
        return $areImg;
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
            // var_dump($serieName);die;
            // $imageID = $this->serieModel-> getImage($serie->id_serie);
            $this->serieModel->deleteSerie($serieName);
            header("Location: " . BASE_URL . "series");

        }
    }
}
