<?php
require_once('libs/Smarty.class.php');

class GenderView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        // var_dump($URL_SERIE);
        //estas lineas estan en el construct por que siempre se van a mostrar
        $this -> smarty -> display ('templates/header.tpl');
        $this -> smarty -> display ('templates/index.tpl');
    }
    
    public function displayGenders($genders){
        $this -> smarty -> assign ('genders', $genders);
        $this -> smarty -> display ('templates/genders.tpl');   
    }

        //assign pasa valores para el template   
    public function displaySeries($series){
        // $this -> smarty -> assign ('error', $error);//si falla entonces que muestre "error"
        $this -> smarty -> assign ('BASE_URL', BASE_URL);
        $this -> smarty -> assign ('series', $series);
        $this -> smarty -> display ('templates/series.tpl');
        $this -> smarty -> display ('templates/footer.tpl');
        
        //assign pasa valores para el template   
    }

    public function displayAdmin($genders, $series){
        // para los generos
        $this -> smarty -> assign ('BASE_URL', BASE_URL);
        
        $this -> smarty -> assign ('genders', $genders);
        // $this -> smarty -> display ('templates/genders.tpl');
        $this -> smarty -> display ('templates/gendersAdd.tpl');
        // para las series
        $this -> smarty -> assign ('series', $series);
        $this -> smarty -> display ('templates/series.tpl');
        $this -> smarty -> display ('templates/footer.tpl');

    }
}