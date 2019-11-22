<?php
require_once('libs/Smarty.class.php');

class SerieView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this -> smarty -> assign ('BASE_URL', BASE_URL);
        $this -> smarty -> display ('templates/header.tpl');
        $this -> smarty -> display ('templates/index.tpl');        

    }
    
    // public function displaySeriesAdmin($series){       
    //     $this -> smarty -> assign ('series', $series);
    //     $this -> smarty -> display ('templates/seriesAdmin.tpl');
    //     $this -> smarty -> display ('templates/footer.tpl');
    // }

    public function showSerie($serie, $genero, $images ){
    // public function showSerie($serie, $genero){
        // $this -> smarty -> assign ('BASE_URL', BASE_URL);
        $this -> smarty -> assign ('genderName', $genero);
        $this -> smarty -> assign ('serie', $serie);
        $this -> smarty -> assign ('images', $images);

        // $this -> smarty -> assign ('comments', $comments);        
        
        $this -> smarty -> display ('templates/serieDescripcion.tpl');
        $this -> smarty -> display ('templates/footer.tpl');
        
        //assign pasa valores para el template   
    }
    public function ShowSeriesOfGender($seriesOfGender){
        // var_dump($seriesOfGender); die();      
        // $this -> smarty -> assign ('error', $error);//si falla entonces que muestre "error"
        
        $this -> smarty -> assign ('BASE_URL', BASE_URL);

        $this -> smarty -> assign ('series', $seriesOfGender);
        $this->smarty->display('templates/seriesOfGender.tpl');  
    }
    // public function displaySeries($genders, $series, $existeSerie){
    //     // $this -> smarty -> assign ('existeGender', $existeGender);
    //     $this -> smarty -> assign ('existeSerie', $existeSerie);
    //     $this -> smarty -> assign ('genders', $genders);
    //     $this -> smarty -> assign ('series', $series);
    //     // $this -> smarty -> display ('templates/gendersAdmin.tpl');    
    //     $this -> smarty -> display ('templates/seriesAdmin.tpl');
    //     $this -> smarty -> display ('templates/footer.tpl');
    // }

}