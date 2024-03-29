<?php
require_once('libs/Smarty.class.php');

class GenderView {

    private $smarty;

    public function __construct($isAdmin = false){
        $this->smarty = new Smarty();
        // var_dump($isAdmin);
        $this -> smarty -> assign ('BASE_URL', BASE_URL); 
        $this -> smarty -> assign ('isAdmin', $isAdmin);
        $this -> smarty -> display ('templates/header.tpl');
        $this -> smarty -> display ('templates/index.tpl');

    }
    
    public function displayVisitante($genders, $series, $images){
        $this -> smarty -> assign ('genders', $genders);
        $this -> smarty -> display ('templates/genders.tpl'); 
        $this -> smarty -> assign ('series', $series);
        $this -> smarty -> assign ('images', $images);

        $this -> smarty -> display ('templates/series.tpl');
        $this -> smarty -> display ('templates/footer.tpl');
    }
    public function displayAdmin(){
        $this -> smarty -> display ('templates/homeAdmin.tpl');  
        // $this -> smarty -> display ('templates/footer.tpl');
  
    }
    // <img src="{$serie['route']}" alt="Imagen de la serie {$serie->name}">

    public function displayGenders($genders, $series, $existeGender, $existeSerie){
        $this -> smarty -> assign ('existeGender', $existeGender);
        $this -> smarty -> assign ('existeSerie', $existeSerie);
        $this -> smarty -> assign ('genders', $genders);
        $this -> smarty -> assign ('series', $series);
        $this -> smarty -> display ('templates/gendersAdmin.tpl');    
        // $this -> smarty -> display ('templates/seriesAdmin.tpl');
        $this -> smarty -> display ('templates/footer.tpl');
    }
    public function displaySeries($genders, $series, $existeSerie){
        // $this -> smarty -> assign ('existeGender', $existeGender);
        $this -> smarty -> assign ('existeSerie', $existeSerie);
        $this -> smarty -> assign ('genders', $genders);
        $this -> smarty -> assign ('series', $series);
        // $this -> smarty -> display ('templates/gendersAdmin.tpl');    
        $this -> smarty -> display ('templates/seriesAdmin.tpl');
        $this -> smarty -> display ('templates/footer.tpl');
    }

    // public function displayAdmin($genders, $series, $existeGender, $existeSerie){       
        
    //     $this -> smarty -> assign ('existeGender', $existeGender);
    //     $this -> smarty -> assign ('existeSerie', $existeSerie);
    //     $this -> smarty -> assign ('genders', $genders);
    //     $this -> smarty -> display ('templates/gendersAdmin.tpl');    
    //     $this -> smarty -> assign ('series', $series);
    //     $this -> smarty -> display ('templates/seriesAdmin.tpl');
    //     $this -> smarty -> display ('templates/footer.tpl');
    // }
}