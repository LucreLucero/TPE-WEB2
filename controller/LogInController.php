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
        
        // var_dump('entro aca');
        // die();
    }
    
     //VERIFICACION DE USUARIO
    public function verifyUser(){
        $userEmail = $_POST['userEmail'];//obtengo el username del input
        $password = $_POST['password'];//obtengo la pass del input
        $true = "entro";
        if(!empty($userEmail) && !empty($password)){
            $emailBD = $this-> model-> getByUserEmail($userEmail);
            //obtengo el email de la BBDD igual al ingresado por el usuario
            if((!empty($emailBD) && password_verify($password, $emailBD->pass))){
                session_start();
                if($emailBD->isAdmin == true){
                    
                 $_SESSION['ID_USER'] = $emailBD ->id_user; 
                 $_SESSION['USERNAME'] = $emailBD ->name;
                 //con el array $_SESSION accedo a los datos guardados en la sesion
                 header('Location: '. BASE_URL . "homeAdmin");
                 die();
                }
             else{
                 //si usuario no esta vacio y la password ingresada es igual a la
                 //correspondiente del usuario en la tabla en la BBDD
                 //crea una sesion en el servidor, si ya existe trae la existente
                 //llamar siempre antes de acceder/almacenar un dato
                 // PARA QUE GUARDAR ESTOS DATOS?
                 
                 $_SESSION['ID_USER'] = $emailBD ->id_user; 
                 $_SESSION['USERNAME'] = $emailBD ->name;
                 //con el array $_SESSION accedo a los datos guardados en la sesion
                 header('Location: '. BASE_URL . "home");
                 die();//Luego de una redirección se suele llamar a la función die() para forzar terminar la ejecución del script.
             }
            }
            else{
                $incorrecto = "no entro";
                $this ->view ->showLogin($noEntro = true);
                // echo "Login incorrecto";
                die();
            } 
        }
        else{
            $incorrecto = "no entro";
            $this ->view ->showLogin($noEntro = true);
            // echo "Login incorrecto";
            die();
        } 
    }
    public function checkLoggedIn(){
        // session_destroy();
        // session_start();//Crea una sesión en el servidor, si ya existe trae la existente.
        
        // var_dump($_SESSION);
        // var_dump($_SESSION['ID_USER']); die();
        if(!isset($_SESSION['ID_USER'])){//si no está iniciada la sesion
            header('Location: '. LOGIN);
            die();//Luego de una redirección se suele llamar a la función
                    //die() para forzar terminar la ejecución del script.
        }
        else{
            // var_dump("entro");die();
        }
    }
    public function logout() {
        session_start();

        // foreach ($_SESSION as $key =>$value){
        //     $_SESSION[$key]= NULL;
        // }

        session_destroy();
        header('Location: ' . BASE_URL);
    }

//REGISTRARSE - NO ES PARA PRIMER ENTREGA
    public function showSignIn(){
        $this-> view-> showSignIn();
    }
//REGISTRARSE - NO ES PARA PRIMER ENTREGA
    public function signIn(){
        $userNameSignIn = $_POST['userName'];//tomo los valores de los inputs
        $userEmailSignIn = $_POST['userEmail'];
        $passwordSignIn = $_POST['password'];
        // $yaExisteEmail = false;
        if(!empty($userNameSignIn) && !empty($userEmailSignIn) && !empty($passwordSignIn)){
            $emailBBDD = $this-> model-> getByUserEmail($userEmailSignIn);//busco que si existe en la BBDD un usuario con ese email
            if($emailBBDD == null){//sino existe
                //transformo la pass a hash 
                $hash = password_hash($passwordSignIn, PASSWORD_DEFAULT);//hash a la password
                $this -> model -> signIn($userEmailSignIn, $hash, $userNameSignIn);//lo envio al model
                //hasta acá anda
                $emailBD = $this-> model-> getByUserEmail($userEmailSignIn);
                //obtengo el email de la BBDD igual al ingresado por el usuario
                if((!empty($emailBD) && password_verify($passwordSignIn, $emailBD->pass))){
                    session_start();
                 
                    //si usuario no esta vacio y la password ingresada es igual a la
                    //correspondiente del usuario en la tabla en la BBDD
                    //crea una sesion en el servidor, si ya existe trae la existente
                    //llamar siempre antes de acceder/almacenar un dato
                    // PARA QUE GUARDAR ESTOS DATOS?
                    
                    $_SESSION['ID_USER'] = $emailBD ->id_user; 
                    $_SESSION['USERNAME'] = $emailBD ->name;
                    //con el array $_SESSION accedo a los datos guardados en la sesion
                    header('Location: '. BASE_URL . "home");
                    die();//Luego de una redirección se suele llamar a la función die() para forzar terminar la ejecución del script.
                   
                }
                else{
                    // var_dump("acá"); die;
                    $incorrecto = "no entro";
                    $this ->view ->showSignIn($yaExisteEmail = true, $faltanDatos = false);
                    // echo "Login incorrecto";
                    die();
                }
            }
        }
        else{
            // $incorrecto = "faltaron completar campos obligatorios";
            $this ->view ->showSignIn($yaExisteEmail = false, $faltanDatos = true);                        // echo "Login incorrecto";
            die();
        }
    }

}