<?php
 class GenderModel{
    private $db;
     
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8', 'root', '');
    }

    public function getGenders(){//obtener generos
        $query = $this-> db -> prepare("SELECT * FROM genero");//selecciono de la tabla generos
        $ok = $query -> execute();
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
        $genders = $query->fetchAll(PDO::FETCH_OBJ);
        return $genders;
    }
//INSERTAR UN NUEVO GENERO
    public function insertGender($nameGender){
        // var_dump($nameGender);
        $query = $this->db->prepare("INSERT INTO genero(name) VALUE(?)");
        //preparo para inserta en la tabla de genero el nuevo genero
        $query->execute(array($nameGender));
        //ejecuto la accion
    }
//BORRAR UN GENERO
    public function deleteGender($genderID){ //obtener un genero
        $query = $this->db->prepare("DELETE FROM genero WHERE name = ?");
        //preparo para inserta en la tabla de genero el nuevo genero
        $ok = $query->execute(array($genderID));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
    }
}