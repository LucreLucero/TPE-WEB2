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
    public function getGender($gender){//obtener UN genero
        $query = $this-> db -> prepare("SELECT * FROM genero WHERE name = ?");
        $ok = $query -> execute(array($gender));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
        $gender = $query->fetch(PDO::FETCH_OBJ);
        return $gender;
    }
    public function insertGender($nameGender){//INSERTAR UN NUEVO GENERO
        $query = $this->db->prepare("INSERT INTO genero(name) VALUE(?)");
        //preparo para inserta en la tabla de genero el nuevo genero
        $querry->execute(array($nameGender));
        //ejecuto la accion
        header("Location: " . BASE_URL);
    }
}