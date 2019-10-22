<?php
class LoginModel{
     private $db;
     
     public function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8', 'root', '');
     }
     public function getByUserEmail($userEmail){
        $query = $this -> db -> prepare('SELECT * FROM checkuser WHERE email= ?');
        $query -> execute(array($userEmail));
        $emailBD = $query -> fetch(PDO::FETCH_OBJ);
        return $emailBD;
        }
    }