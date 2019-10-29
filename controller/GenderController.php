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
        $genders = $this->model->getGenders();
        //paso la function al constructor por que siempre se van a mostrar los generos
        $this->view = new GenderView($genders);
        
    }
    public function showIndex(){
        $series = $this ->modelSerie -> getSeries();
        // var_dump($series);
        // die();
        $this ->view -> displaySeries($series);
    }

    // public function getGenders(){
    //     $genders = $this->model->getGenders();//obtengo los generos desde el model

    //     $this->view->showGenders($genders);

    // }
    public function addGender(){
        $this -> checkLoggedIn();
        if(isset($_POST['nameGender'])){
            $nameGender= $_POST['nameGender'];
            $this->model->insertGender($nameGender);
        }
    }
    


}