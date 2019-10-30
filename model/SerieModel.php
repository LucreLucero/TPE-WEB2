<?php
class SerieModel{
    private $db;

    public function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8', 'root', '');
    }

    public function getSeries(){//obtener series LISTADO
        $query = $this->db -> prepare("SELECT * FROM series");//selecciono de la tabla generos
        $ok = $query -> execute();
        if(!$ok){
           var_dump($query->errorInfo());
           die();
        }
        $series = $query->fetchAll(PDO::FETCH_OBJ);
        return $series; 
    }
     
    public function getSerieDescription($serieNom){//obtener descripcion de serie
        $query = $this-> db -> prepare("SELECT * FROM series WHERE name = ?");//selecciono de la tabla generos
        $ok = $query -> execute(array($serieNom));
        
        if(!$ok){
           var_dump($query->errorInfo());
           die();
        }
        $serie = $query->fetch(PDO::FETCH_OBJ);

        return $serie;
    }
}
