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
    public function signIn($userEmailSignIn, $hash, $userNameSignIn){
        //hago envio de name, email y password a la BBDD
        $query = $this -> db -> prepare('INSERT INTO checkuser(email, pass, name) VALUES(?,?,?)');
        $query ->execute(array($userEmailSignIn, $hash, $userNameSignIn));
    }
    // 
    public function getByUserID($id_user){
        //obtengo el mail de la BBDD igual al mail ingresado por el usuario
        $query = $this -> db -> prepare('SELECT * FROM checkuser WHERE id_user = ?');
        $query -> execute(array($id_user));
        $user = $query -> fetch(PDO::FETCH_OBJ);
        return $user;
        }
}