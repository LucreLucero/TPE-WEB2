<?php 
include_once('model/CommentsModel.php');
include_once('api/json.view.php');

class CommentsApiController{
    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model = new CommentsModel();
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
    }
    private function getData() {
        return json_decode($this->data);
    }
    public function getComments($params = null){
        $comments = $this ->model ->getAllComments();
        $this->view->response($comments, 200);
    }
    public function getComment($params = null){
        $idComment = $params['ID'];
        $comment = $this ->model ->getComment($idComment);
        if($comment){
            $this ->view ->response($comment, 200);
        } else{
            $this ->view ->response("Comentario no encontrado", 404);
        }
    }
    public funtion deleteComment($params = null){
        $id = $params[':ID'];
        $comment = $this ->model -> getComment($id);
        if($comment){
            $this ->model ->delete($id);
            $this ->view ->response ("La tarea fue borrada con exito", 200);
        } else{
            $this ->view ->response ("La tarea con el id={$id} no existe", 404);
        }
        //OBTENER COMENTARIO
        //si el comentario existe-> model-> borrar;
        //sino, tarea no encontrada 
    }
    public function addComment($params = null){
            $data = $this ->getData();
            $idComment = $this ->model ->save($data ->description);
            $comment = $this ->model ->getComment($idComment);
            if($comment){
                $this ->view ->response($comment, 200);
            } else{
                $this ->view ->response("El comentario no fue creado", 500);
            }
    }    
}