<?php
require_once('libs/Smarty.class.php');

class GenderView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        //$this->smarty->assign('basehref', BASE_URL);copiado de github, no sé que es
    }
    public function displayIndex($error = null){
        // $error = null

        /*$html = "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
            <title>Document</title>
        </head>
        <body>
            <h1>HOLAAAA</h1>
        </body>
        </html>";
        
        echo $html;*/
        $this -> smarty -> assign ('error', $error);//si falla entonces que muestre "error"
        $this -> smarty -> display ('templates/header.tpl');
        $this -> smarty -> display ('templates/body.tpl');
        $this -> smarty -> display ('templates/footer.tpl');
        //assign pasa valores para el template
        
    }
}