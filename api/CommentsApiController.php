<?php 
include_once('model/CommentsModel.php');
include_once('api/json.view.php');

class CommentsApiController{
    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
        $this->model = new CommentsModel();
    }
    function getData(){ 
        return json_decode($this->data);
    }  
    // ----------------------------

    public function getComment($params = null){
        $idComment = $params[':ID'];

        $comment = $this ->model ->getComment($idComment);
        if($comment){
            $this ->view ->response($comment, 200);
        } else{
            $this ->view ->response("Comentario no encontrado", 404);
        }
    }
    // traigo todos los comentarios que tiene una serie
   public function getCommentsOfSerie ($params = null){
        $id_serie = $params[':ID'];
        $comments = $this ->model ->getComments($id_serie);
        if($comments){
            $this ->view ->response($comments, 200);
        } else{
            $this ->view ->response([], 200);  
        } 

        
   } 
   public function addComment($params = null){
        // $id_serie = $params[':ID'];
        // var_dump($id_serie);die();

           $data = $this->getData();
           $idComment = $this ->model ->saveComment($data->comment,$data ->score, $data ->id_serie, $data ->id_user, $data ->userName);
           $comment = $this ->model ->getComment($idComment);
           if($comment){
               $this ->view ->response($comment, 200);
           } else{
               $this ->view ->response("El comentario no fue creado", 500);
           }
   }    

    public function deleteComment($params = null){
        $id = $params[':ID'];
        $comment = $this ->model -> getComment($id);
        if($comment){
            $this ->model ->delete($id);
            $this ->view ->response ("El comentario fue borrada con exito", 200);
        } else{
            $this ->view ->response ("El comentario con el id={$id} no existe", 404);
        }
    }
    public function promedio($params = null){
        $id = $params[':ID'];
        // $comment = $this ->model -> getComment($id);
        if($id){
            $prom = $this ->model ->promedio($id);
            // var_dump ($prom);die;
            $this ->view ->response ($prom, 200);
        } else{
            $this ->view ->response ("No se ha podido realizar el promedio", 404);
        }
    }
    

}