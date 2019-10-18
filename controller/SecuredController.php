<?php
//controller copiado    --> M O D I F I C A R
define('LOGIN', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/login');
define('LOGOUT', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/logout');

class SecuredController {

    public function __construct() {
        session_start();

        // verifica que este logueado
        if(!isset($_SESSION['username'])){
          header('Location: login');
          die();
        if(isset($_SESSION['USERNAME'])){ // si esta logueado
            if (time() - $_SESSION['LAST_ACTIVITY'] > 10) { // expiro el timeout
                header('Location: '.LOGOUT);
                die();
            }

            $_SESSION['LAST_ACTIVITY'] = time();
        }
        else {
            header('Location: '. LOGIN);
            die();
          }
    }
}
