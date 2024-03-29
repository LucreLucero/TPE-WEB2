<?php
 class GenderModel{
    private $db;
     
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8', 'root', '');
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
    public function getGenderByID($genderID){//obtener ID de UN genero
        $query = $this-> db -> prepare("SELECT * FROM genero WHERE id_gender = ?");
        $ok = $query -> execute(array($genderID));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
        $genderName = $query->fetch(PDO::FETCH_OBJ);
        return $genderName;
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
        $query = $this->db->prepare("INSERT INTO genero(name) VALUE(?)");
        //preparo para inserta en la tabla de genero el nuevo genero
        $query->execute(array($nameGender));
        // var_dump($nameGender); die();
        //ejecuto la accion
    }
//EDITAR UN GENERO
    public function editGender($nameGender, $genderEdit){
        $query = $this->db->prepare("UPDATE genero SET name = ? WHERE name = ? ");
        //preparo para inserta en la tabla de genero el nuevo genero
        $ok = $query->execute(array($nameGender, $genderEdit));
        //ejecuto la accion
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
    }
//BORRAR UN GENERO
    public function deleteGender($genderID){ //obtener un genero
        $query = $this->db->prepare("DELETE FROM genero WHERE id_gender = ?");
        //preparo para inserta en la tabla de genero el nuevo genero
        $ok = $query->execute(array($genderID));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
    }
}