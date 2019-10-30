<?php
require_once('libs/Smarty.class.php');

class LoginView{ 
    private $smarty;
    
    public function __construct(){
        $this -> smarty = new Smarty();
    }
    public function showLogin($error = null){
        // $this -> smarty -> display('templates/header.tpl');
        
        //creo una instancia de la clase smarty
        $this -> smarty -> assign('titulo','Iniciar Sesión');
        $this -> smarty -> assign('error', $error); 
        //le paso por medio de assign el nombre de la variable (titulo) y el contenido
        $this -> smarty -> display('templates/login.tpl');
        //llamo a la funcion display en el template login
        $this -> smarty -> display('templates/footer.tpl');
    }

//ES DE REGISTRARSE - NO ES PARA PRIMER ENTREGA
    public function showSignIn($error = null){
        
        //creo una instancia de la clase smarty
        $this -> smarty -> assign('titulo','Iniciar Sesión');
        $this -> smarty -> assign('error', $error); 
        //le paso por medio de assign el nombre de la variable (titulo) y el contenido
        $this -> smarty -> display('templates/signIn.tpl');
        //llamo a la funcion display en el template login
        $this -> smarty -> display('templates/footer.tpl');
    }
}