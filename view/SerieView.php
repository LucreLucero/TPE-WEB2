<?php
require_once('libs/Smarty.class.php');

class SerieView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }
  

    public function showSerie($serie){
        // $this -> smarty -> assign ('error', $error);//si falla entonces que muestre "error"
        $this -> smarty -> assign ('BASE_URL', BASE_URL);
        $this -> smarty -> assign ('serie', $serie);
        
        $this->smarty->display('templates/header.tpl');
        $this -> smarty -> display ('templates/serieDescripcion.tpl');
        $this -> smarty -> display ('templates/footer.tpl');
        
        //assign pasa valores para el template   
    }
}