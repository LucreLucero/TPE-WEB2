<?php
require_once('libs/Smarty.class.php');

class GenderView {

    private $smarty;

    public function __construct($genders){
        $this->smarty = new Smarty();
        // var_dump($URL_SERIE);
        $this -> smarty -> assign ('genders', $genders);
        $this -> smarty -> display ('templates/header.tpl');
        $this -> smarty -> display ('templates/index.tpl');
        $this -> smarty -> display ('templates/genders.tpl');
        //estas lineas estan en el construct por que siempre se van a mostrar
    }
    // public function displayIndex($error = null){
    //     $this -> smarty -> assign ('error', $error);//si falla entonces que muestre "error"
    //     $this -> smarty -> display ('templates/header.tpl');
    //     $this -> smarty -> display ('templates/index.tpl');
    //     $this -> smarty -> display ('templates/footer.tpl');
    // }

        //assign pasa valores para el template   
    public function displaySeries($series){
        // $this -> smarty -> assign ('error', $error);//si falla entonces que muestre "error"
        $this -> smarty -> assign ('BASE_URL', BASE_URL);
        $this -> smarty -> assign ('series', $series);
        $this -> smarty -> display ('templates/series.tpl');
        $this -> smarty -> display ('templates/footer.tpl');
        
        //assign pasa valores para el template   
    }
}