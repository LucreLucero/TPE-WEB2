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

    public function showSerie($serieNombre){
        $serie = $this->serieModel->getSerieDescription($serieNombre);
        // var_dump($serie);
        // die();
        $this->serieView->showSerie($serie);
    }
    public function getSeriesOfGender($gender){ 
        // var_dump($gender);
        // die(); 
        $ID= $gender->id_gender;
        $seriesOfGender =  $this ->serieModel ->getSeriesOfGender($ID);
        // var_dump($seriesOfGender);//tengo el problema que traigo un objeto entonces no le puedo hacer el get
        // die();

        $this ->serieView ->ShowSeriesOfGender($seriesOfGender);

    }
}