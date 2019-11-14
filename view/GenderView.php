<?php
require_once('libs/Smarty.class.php');

class GenderView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this -> smarty -> assign ('BASE_URL', BASE_URL);
        $this -> smarty -> display ('templates/header.tpl');
        $this -> smarty -> display ('templates/index.tpl');
    }
    
    public function displayVisitante($genders, $series){
        $this -> smarty -> assign ('genders', $genders);
        $this -> smarty -> display ('templates/genders.tpl'); 
        $this -> smarty -> assign ('series', $series);
        $this -> smarty -> display ('templates/series.tpl');
        $this -> smarty -> display ('templates/footer.tpl');
    }

    public function displayAdmin($genders, $series, $existeGender, $existeSerie){       
        
        $this -> smarty -> assign ('existeGender', $existeGender);
        $this -> smarty -> assign ('existeSerie', $existeSerie);
        $this -> smarty -> assign ('genders', $genders);
        $this -> smarty -> display ('templates/gendersAdmin.tpl');    
        $this -> smarty -> assign ('series', $series);
        $this -> smarty -> display ('templates/seriesAdmin.tpl');
        $this -> smarty -> display ('templates/footer.tpl');
    }
}