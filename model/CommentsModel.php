<?php
// MODELO PARA TOMAR LOS COMENTARIOS DE LA BBDD
class CommentsModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8', 'root', '');
    }

    public function getAllComments(){//obtengo TODOS los comentarios
        $query = $this ->db -> prepare("SELECT * FROM comentarios");
        $ok = $query-> execute();
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }   
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }
    public function getComment ($params = null){
        $query = $this ->db ->prepare("SELECT*FROM comentario WHERE id_comment = ?");
        $ok = $query ->execute(array($idComment));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
        $comment = $query ->fetch(PDO::FETCH_OBJ);
        return $comment; 
    } 
    public function saveComment($description){
        $query = $this ->db ->prepare("INSERT INTO comentarios(text) VALUES(?)");
        $query = execute(array($description));
        return $this ->db ->lastInsertId();
    }

}