<?php
require_once('libs/Smarty.class.php');

class GenderView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        // var_dump($URL_SERIE);
        $this -> smarty -> display ('templates/header.tpl');
        $this -> smarty -> display ('templates/index.tpl');
        //estas lineas estan en el construct por que siempre se van a mostrar
    }
    public function displayGenders($genders, $error = null){
        $this -> smarty -> assign ('error', $error);
        $this -> smarty -> assign ('genders', $genders);//si falla entonces que muestre "error"
        $this -> smarty -> assign ('BASE_URL', BASE_URL);
        $this -> smarty -> display ('templates/genders.tpl');
    }
    public function displaySeries($series){
        // $this -> smarty -> assign ('error', $error);//si falla entonces que muestre "error"
        //assign pasa valores para el template   
        $this -> smarty -> assign ('BASE_URL', BASE_URL);
        $this -> smarty -> assign ('series', $series);
        $this -> smarty -> display ('templates/series.tpl');
        // $this -> smarty -> display ('templates/footer.tpl');
        
    }
}