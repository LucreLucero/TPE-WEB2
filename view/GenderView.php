<?php
require_once('libs/Smarty.class.php');

class GenderView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        //$this->smarty->assign('basehref', BASE_URL);copiado de github, no sé que es
    }
    public function displayIndex($error = null){
        $this -> smarty -> assign ('error', $error);//si falla entonces que muestre "error"
        $this -> smarty -> display ('templates/header.tpl');
        $this -> smarty -> display ('templates/body.tpl');
        $this -> smarty -> display ('templates/footer.tpl');
        //assign pasa valores para el template
        
    }
}