<?php
// MODELO PARA TOMAR LOS COMENTARIOS DE LA BBDD
class CommentsModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8', 'root', '');
    }

    public function getComments($id_serie){//obtengo TODOS los comentarios
        $query = $this ->db -> prepare("SELECT * FROM comentarios WHERE id_serie = ?");
        $ok = $query-> execute(array($id_serie));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }   
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }
    public function getComment($idComment){
        $query = $this ->db ->prepare("SELECT * FROM comentarios WHERE id_comment = ?");
        $ok = $query ->execute(array($idComment));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
        $comment = $query ->fetch(PDO::FETCH_OBJ);
        return $comment; 
    } 
    public function saveComment($comment, $score, $id_serie, $id_user){
        $query = $this ->db ->prepare("INSERT INTO comentarios(comment, score, id_serie, id_user) VALUES(?,?,?,?)");
        $query->execute(array($comment, $score, $id_serie, $id_user));
        return $this ->db ->lastInsertId();
    }

    public function promedio($id_serie){
        $query = $this ->db ->prepare("SELECT ROUND(AVG(comentarios.score),2) AS promedio FROM comentarios WHERE id_serie = ?");
        $query->execute(array($id_serie));
        $prom = $query ->fetchAll(PDO::FETCH_OBJ);
        return $prom;
    }
   
    public function  delete($id){ //obtener un genero
        $query = $this->db->prepare("DELETE FROM comentarios WHERE id_comment = ?");
        //preparo para inserta en la tabla de genero el nuevo genero
        $ok = $query->execute(array($id));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
    }

}