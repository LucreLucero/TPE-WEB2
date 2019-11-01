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
    
    public function getSeriesOfGender($ID){//obtener series de UN genero
        // var_dump($ID);
        // die();
        $query = $this-> db -> prepare("SELECT * FROM series WHERE id_gender = ?");
        //no me permite la conversion del array traido desde getGenders en string
        $ok = $query -> execute(array($ID));
        if(!$ok){   
           var_dump($query->errorInfo());
           die();
        }
        $seriesOfGender = $query->fetchAll(PDO::FETCH_OBJ);
        return $seriesOfGender;
    }
    public function insertSerie($nameSerie, $descriptionSerie, $scoreSerie, $gender){
        $query = $this -> db-> prepare("INSERT INTO series(name, description, score, id_gender) VALUES (?, ?, ?, ?)");
        //preparo para inserta en la tabla de genero el nuevo genero
        $query -> execute(array($nameSerie, $descriptionSerie, $scoreSerie, $gender));
        //ejecuto la accion
    }
    //EDITAR UNA SERIE
    public function editSerie($recibido, $nameSerie, $descriptionSerie, $scoreSerie, $gender){
        $query = $this->db->prepare("UPDATE series 
        SET name = ?, description = ?, score = ?, id_gender = ? WHERE name = ?");
        //preparo para inserta en la tabla de genero el nuevo genero
        $ok = $query->execute(array($nameSerie, $descriptionSerie, $scoreSerie, $gender, $recibido));
        //ejecuto la accion
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
    }
    public function deleteSerie($serieName){ //obtener un genero
        // var_dump($serieName);
        // die();
        $query = $this->db->prepare("DELETE FROM series WHERE name = ?");
        //preparo para inserta en la tabla de genero el nuevo genero
        $ok = $query->execute(array($serieName));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
    }
}