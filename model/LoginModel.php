<?php
class LoginModel{
     private $db;
     
    public function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8', 'root', '');
     }

    public function getByUserEmail($userEmail){
        //obtengo el mail de la BBDD igual al mail ingresado por el usuario
        $query = $this -> db -> prepare('SELECT * FROM checkuser WHERE email= ?');
        $query -> execute(array($userEmail));
        $emailBD = $query -> fetch(PDO::FETCH_OBJ);
        return $emailBD;
        }
//PERTENECE A REGISTRARSE - NO ES PARA PRIMER ENTREGA    
    public function signIn($userNameSignIn, $userEmailSigIn, $hash){
        //hago envio de name, email y password a la BBDD
        $query = $this -> db -> prepare('INSERT INTO checkuser(email, pass) VALUES(?,?)');
        $query ->execute(array($userNameSignIn, $userEmailSigIn, $hash));
    }
}