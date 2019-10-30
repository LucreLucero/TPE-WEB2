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
    //mostrar index muestra header, index(nav), genders y series
    public function showIndex(){
        $genders = $this->model->getGenders();
        $this ->view -> displayGenders($genders);
        
        $series = $this ->modelSerie -> getSeries();
        $this ->view -> displaySeries($series);
    }
    public function getGenders(){
        $genders = $this->model->getGenders();
        $this ->view -> displayGenders($genders);
    }
    public function getGender($gender){
        $genderFor = $this->model->getGender($gender);
        return $genderFor;
        
    }
   
    public function addGender(){
        $this -> checkLoggedIn();
        if(isset($_POST['nameGender'])){
            $nameGender= $_POST['nameGender'];
            $this->model->insertGender($nameGender);
        }
    }
    


}