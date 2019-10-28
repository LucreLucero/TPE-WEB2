<?php

require_once('./view/loginView.php');
require_once('./model/LoginModel.php');

class LoginController{
    private $view;
    private $model;

    public function __construct(){
        $this-> view = new LoginView();
        $this-> model = new LoginModel();
    }
    public function showLogin(){
        $this-> view-> showLogin();
        }
    public function verifyUser(){
        $userEmail = $_POST['userEmail'];//obtengo el username del input
        $password = $_POST['password'];//obtengo la pass del input
        $true = "entro";
        if(!empty($userEmail) && !empty($password)){
            $emailBD = $this-> model-> getByUserEmail($userEmail);
            //obtengo el email de la BBDD igual al ingresado por el usuario
            if((!empty($emailBD) && password_verify($password, $emailBD->pass))){
                // var_dump($emailBD);
                // die();
                            
                //si usuario no esta vacio y la password ingresada es igual a la
                //correspondiente del usuario en la tabla en la BBDD
                session_start();
                 //crea una sesion en el servidor, si ya existe trae la existente
                //llamar siempre antes de acceder/almacenar un dato
                $_SESSION['ID_USER'] = $userBD->id; 
                $_SESSION['USERNAME'] = $userBD->username; 
                //con el array $_SESSION accedo a los datos guardados en la sesion
                header('Location: ', BASE_URL);
                die();//Luego de una redirección se suele llamar a la función die() para forzar terminar la ejecución del script.
            }
        }
        else{
            $incorrecto = "no entro";
            var_dump ($incorrecto);
            die();
            $this->view->showLogin("Login incorrecto");
        } 
    }
    public function showSignIn(){
        $this-> view-> showSignIn();
    }
    public function signIn(){
        $userNameSignIn = $_POST['userName'];//tomo los valores de los inputs
        $userEmailSigIn = $_POST['userEmail'];
        $passwordSigIn = $_POST['password'];
        //transformo la pass a hash 
        $hash = password_hash($passwordSigIn, PASSWORD_DEFAULT);//hash a la password
        $this -> model -> signIn($userNameSignIn, $userEmailSigIn, $hash);//lo envio al model
        session_start();
        header('Location: ' . BASE_URL);//redirecciono al home
        //acá redirecciono a el home con accesso a las series

    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . LOGIN);
    }



}