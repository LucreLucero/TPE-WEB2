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


}