<?php
require_once('model/UserModel.php');
require_once('view/UserView.php');
require_once('./controller/LoginController.php');

class UserController{
    private $userModel;
    private $view;
    private $LogInController;

    public function __construct(){
        $this ->LogInController = new LogInController();
        $this ->userModel = new UserModel();
        $this ->view = new UserView();
    }

    public function showUsers(){
        // var_dump("lala"); die;
        $this ->LogInController ->checkLoggedIn();
        $this ->LogInController ->verifyAdmin();
        $users = $this ->userModel ->getUsers();
        $this ->view ->showUsers($users);
    }
    public function convertToAdminOrUser($params = null){
        $idUser = $params [':ID'];
        $this ->LogInController ->checkLoggedIn();
        $this ->LogInController ->verifyAdmin();
        $AdminOrUser = $this ->userModel ->convert($idUser);
        // var_dump($AdminOrUser);

        // var_dump("aca tambien");die;
        $users = $this ->userModel ->getUsers();
        $this ->view ->showUsers($users);

        // $this ->view ->showUsers($AdminOrUser);
        header("Location: " . BASE_URL . "users");
    }

    public function deleteUser(){
        $this ->LogInController ->checkLoggedIn();
        $this ->LogInController ->verifyAdmin();
        $userID = $_POST['userName'];
        $this->userModel->deleteUser($userID);
        header("Location: " . BASE_URL . "users");
    }

}


