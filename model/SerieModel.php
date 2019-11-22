<?php
class SerieModel{
    private $db;

    public function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpespecial;charset=utf8', 'root', '');
    }

    public function getSeries(){//obtener series LISTADO
        $serieImages = [];
        $query = $this->db -> prepare("SELECT * FROM series");//selecciono de la tabla generos
        $ok = $query -> execute();
        if(!$ok){
           var_dump($query->errorInfo());
           die();
        }
        $series = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($series as $serie){
            //$series tiene id_gender, id_serie, name, description, score
            $query_images = $this ->db ->prepare("SELECT * FROM imagenes WHERE id_serie = ?");
            $query_images -> execute(array($serie['id_serie']));
            $images = $query_images->fetchAll(PDO::FETCH_ASSOC);
            //images tiene [[id_imagen, ruta],[id_imagen, ruta], [id_imagen, ruta]]
            
            $serie['images'] = $images;
            //serie va a agregar la key 'images', entonces tiene
            //id_gender, id_serie, name, description, score, images(arreglo)
            $serieImages = $series;
        }
        // var_dump($serieImages); die();
        return $serieImages;
    }
    
    public function getSerieDescription($serie_id){//obtener descripcion de serie
        $query = $this-> db -> prepare("SELECT * FROM series WHERE name = ?");//selecciono de la tabla generos
        $ok = $query -> execute(array($serie_id));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
        $serie = $query->fetch(PDO::FETCH_OBJ);

        return $serie;
    }
    // TABLA BUSCO EN LA TABLA IMAGENES
    public function getImage($idImg){//busco las imagenes por id en la BBDD
        $query = $this ->db ->prepare("SELECT * FROM imagenes WHERE id_serie = ?");
        $ok = $query -> execute(array($idImg));
        if(!$ok){
           var_dump($query->errorInfo());
           die();
        }
        $image = $query->fetchAll(PDO::FETCH_OBJ);
        return $image;
    }
    
    public function getSeriesOfGender($ID){//obtener series de UN genero
        $query = $this-> db -> prepare("SELECT * FROM series WHERE id_gender = ?");
        //no me permite la conversion del array traido desde getGenders en string
        $ok = $query -> execute(array($ID));
        if(!$ok){   
            var_dump($query->errorInfo());
            die();
        }
        $seriesOfGender = $query->fetchAll(PDO::FETCH_OBJ);
        // var_dump($seriesOfGender);die();
        return $seriesOfGender;
    }
    // hago un arreglo (routes) de arreglos (image) con las imagenes y lo retorno  
    private function uploadImages($images, $id_serie){
        $query_images = $this ->db -> prepare("INSERT INTO imagenes(id_serie, path) VALUES (?,?)");
        $cantImages = count($images['name']);
        if($cantImages > 1){
            for ($i = 0; $i < $cantImages; $i++){
                // var_dump(pathinfo($images['name'][$i],PATHINFO_EXTENSION)); die;
                $final_route = 'imagenes/' . uniqid() . "." . strtolower(pathinfo($images['name'][$i],PATHINFO_EXTENSION));// preguntar como digo que pueden ser jpg, jpeg, png
                move_uploaded_file($images['tmp_name'][$i], $final_route);
                $query_images-> execute(array($id_serie, $final_route));
            }
        }
        else{
            $final_route = 'imagenes/' . uniqid() . "." . strtolower(pathinfo($images['name'][0],PATHINFO_EXTENSION));// preguntar como digo que pueden ser jpg, jpeg, png
            move_uploaded_file($images['tmp_name'][0], $final_route);
            $query_images-> execute(array($id_serie, $final_route));
            
        }
      }	 
// agrego la serie con la imagen (si es que tiene)
    public function insertSerie($nameSerie, $descriptionSerie, $scoreSerie, $gender, $images = null){
        // var_dump($nameSerie);
        // var_dump($images);die;
        $query = $this -> db-> prepare("INSERT INTO series(name, description, score, id_gender) VALUES (?, ?, ?, ?)");
        //preparo para inserta en la tabla de genero el nuevo genero
        $query -> execute(array($nameSerie, $descriptionSerie, $scoreSerie, $gender));
        if($images){ 
            $id_serie = $this->db->lastInsertId();
            $this->uploadImages($images, $id_serie);
        }

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

    public function deleteImages($serieID){ //borro las imagenes de la tabla
        // var_dump($serieName);
        // die();
        // var_dump("fe");die;
        $query = $this->db->prepare("DELETE FROM imagenes WHERE id_serie = ?");
        //preparo para inserta en la tabla de genero el nuevo genero
        $ok = $query->execute(array($serieID));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
    }
    public function deleteSerieByGender($ID){ //obtener un genero
        // var_dump($serieName);
        // die();
        // var_dump($genderID);die;

        $this -> deleteImages($ID);
        $query = $this->db->prepare("DELETE FROM series WHERE id_serie = ?");
        //preparo para inserta en la tabla de genero el nuevo genero
        $ok = $query->execute(array($ID));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
        // var_dump("fe");die;

    }
    
    public function deleteSerie($serieName){ //obtener un genero
        // var_dump($serieName);
        // die();
        $this -> deleteImages($serieName);
        $query = $this->db->prepare("DELETE FROM series WHERE id_serie = ?");
        //preparo para inserta en la tabla de genero el nuevo genero
        $ok = $query->execute(array($serieName));
        if(!$ok){
            var_dump($query->errorInfo());
            die();
        }
    }
}