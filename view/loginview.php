<?php
require_once('libs/Smarty.class.php');

class LoginView{ 
    private $smarty;
    
    public function __construct(){
        $this -> smarty = new Smarty();
        // $this -> smarty -> assign ('BASE_URL', BASE_URL);
        // $this -> smarty -> display('templates/header.tpl');
    }
    public function showLogin($noEntro = false){
        $this -> smarty -> assign ('BASE_URL', BASE_URL);
        $this -> smarty -> display('templates/header.tpl');
        //creo una instancia de la clase smarty
        $this -> smarty -> assign('titulo','Iniciar Sesión');
        $this -> smarty -> assign('noEntro', $noEntro); 
        //le paso por medio de assign el nombre de la variable (titulo) y el contenido
        $this -> smarty -> display('templates/login.tpl');
        //llamo a la funcion display en el template login
        $this -> smarty -> display('templates/footer.tpl');
    }

//ES DE REGISTRARSE - NO ES PARA PRIMER ENTREGA
    public function showSignIn($yaExisteEmail = false, $faltanDatos = false){
        $this -> smarty -> assign ('BASE_URL', BASE_URL);
        $this -> smarty -> display('templates/header.tpl');
        //creo una instancia de la clase smarty
        $this -> smarty -> assign('titulo','Iniciar Sesión');
        $this -> smarty -> assign('yaExisteEmail', $yaExisteEmail); 
        $this -> smarty -> assign('faltanDatos', $faltanDatos); 
        //le paso por medio de assign el nombre de la variable (titulo) y el contenido
        $this -> smarty -> display('templates/signIn.tpl');
        //llamo a la funcion display en el template login
        $this -> smarty -> display('templates/footer.tpl');
    }
    
}