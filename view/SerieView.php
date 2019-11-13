<?php
require_once('libs/Smarty.class.php');

class SerieView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }
    
    // public function displaySeriesAdmin($series){       
    //     $this -> smarty -> assign ('series', $series);
    //     $this -> smarty -> display ('templates/seriesAdmin.tpl');
    //     $this -> smarty -> display ('templates/footer.tpl');
    // }

    public function showSerie($infoSerie, $genderName){
        $this -> smarty -> assign ('BASE_URL', BASE_URL);
        $this -> smarty -> assign ('genderName', $genderName);
        $this -> smarty -> assign ('serie', $infoSerie);
        
        $this -> smarty -> display ('templates/serieDescripcion.tpl');
        $this -> smarty -> display ('templates/footer.tpl');
        
        //assign pasa valores para el template   
    }
    public function ShowSeriesOfGender($seriesOfGender){
        // $this -> smarty -> assign ('error', $error);//si falla entonces que muestre "error"
        
        $this -> smarty -> assign ('BASE_URL', BASE_URL);
        // var_dump($seriesOfGender);
        // die();      

        $this -> smarty -> assign ('seriesOfGender', $seriesOfGender);
        $this->smarty->display('templates/seriesOfGender.tpl');  
    }
}