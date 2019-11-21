<?php
// MODELO PARA TOMAR LOS COMENTARIOS DE LA BBDD
class CommentsModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8', 'root', '');
    }

    public function getComments(){//obtengo TODOS los comentarios
        $query = $this ->db -> prepare("SELECT * FROM comentarios");
        $ok = $query-> execute();
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

}