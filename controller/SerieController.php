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
}