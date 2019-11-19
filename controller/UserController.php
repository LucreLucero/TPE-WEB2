<?php
require_once('model/UserModel.php');
require_once('view/UserView.php');
require_once('./controller/LogInController.php');

class UserController{
    private $userModel;
    private $view;
    private $LogInController;

    public function __construct(){
        $this ->userModel = new UserModel();
        $this ->view = new UserView();
        $this ->LogInController = new LogInController();
    }

    public function showUsers(){
        // var_dump("lala"); die;
        $this ->LogInController ->checkLoggedIn();
        $users = $this ->userModel ->getUsers();
        $this ->view ->showUsers($users);

    }
    public function deleteUser(){
        $this ->LogInController ->checkLoggedIn();
        // var_dump("HOL");
        // die();
        $userID = $_POST['userName'];
        $this->userModel->deleteUser($userID);
        header("Location: " . BASE_URL . "users");
    }

}


