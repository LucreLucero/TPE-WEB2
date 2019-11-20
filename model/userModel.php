<?php

class UserModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8', 'root', '');
    }
    // obtengo los usuarios de la BBDD
    public function getUsers(){
        $query = $this-> db -> prepare("SELECT * FROM checkuser");
        $ok = $query -> execute();
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
        $user = $query->fetchAll(PDO::FETCH_OBJ);
        return $user;
    }
    //corroboro en la BBDD los usuarios que sean admin - boolean true
    public function getAdmin($admin){
        $query = $this-> db -> prepare("SELECT * FROM checkuser WHERE isAdmin = ?");
        $ok = $query -> execute(array($admin));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
        $admin = $query->fetchAll(PDO::FETCH_OBJ);
        return $admin;
    }
    //BORRAR UN USUARIO
    public function deleteUser($userID){ 
        $query = $this->db->prepare("DELETE FROM checkuser WHERE id_user = ?");
        $ok = $query->execute(array($userID));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
    }

    public function convert($userID){ 
        $query = $this->db->prepare("UPDATE checkuser SET isAdmin = IF(isAdmin = 1,0,1) WHERE id_user = ? ");
        //preparo para inserta en la tabla de genero el nuevo genero
        $ok = $query->execute(array($userID));
        //ejecuto la accion
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
    }
}
