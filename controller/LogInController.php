<?php

require_once('./view/loginView.php');
//require_once('./model/userModel');

class LoginController{
    private $view;

    public function __construct(){
        $this->view = new LoginView();
    }
    public function showLogin(){
        $this->view->showLogin();
    }
    public function verifyUser(){
        $username = $_POST['username'];//obtengo el username del input
        $password = $_POST['password'];//obtengo la pass del input

        $user = $this->model->getByUserName($username);
        var_dump($user);
        //obtengo el usuario de la BBDD con el mismo nombre de usuario ingresado en el input
        if(!empty($user) && password_verify($password, $user->password)){
            //si usuario no esta vacio y la password ingresada es igual a la
            //correspondiente del usuario en la tabla en la BBDD
            session_start();//crea una sesion en el servidor, si ya existe trae la existente
            //llamar siempre antes de acceder/almacenar un dato
            $_SESSION['ID_USER'] = $user->id; 
            $_SESSION['USERNAME'] = $user->username; 
            //con el array $_SESSION accedo a los datos guardados en la sesion
            header('Location: ver');
            die();//Luego de una redirección se suele llamar a la función die() para forzar terminar la ejecución del script.
        }
        else{
            $this->view->showLogin("Login incorrecto");
        }
        
    }
            public function logout() {
                session_start();
                session_destroy();
                header('Location: ' . LOGIN);
            }



}