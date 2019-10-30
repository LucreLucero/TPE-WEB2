<?php
require_once('./model/SerieModel.php');
require_once('./view/SerieView.php');

class SerieController{
    private $serieModel;
    private $serieView;

    public function __construct(){
        $this->serieModel = new SerieModel();
        // var_dump($serieModel);
        // die();
        $this->serieView = new SerieView();
    }

    public function showSerie($serieNombre){
        $serie = $this->serieModel->getSerieDescription($serieNombre);
        // var_dump($serie);
        // die();
        $this->serieView->showSerie($serie);
    }

    // // CHEQUEO DE LogIn
    // public function checkLoggedIn(){
    //     session_start();//Crea una sesión en el servidor, si ya existe trae la existente.
    //     if(!isset($_SESSION['ID_USER'])){//si no está iniciada la sesion
    //         header('Location: '. LOGIN);
    //         die();//Luego de una redirección se suele llamar a la función
    //                   //die() para forzar terminar la ejecución del script.
    //     }
    // }
}