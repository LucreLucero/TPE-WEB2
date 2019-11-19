<?php
require_once('libs/Smarty.class.php');

class UserView{

    private $smarty;

    public function __construct(){
        $this ->smarty = new Smarty();
        $this ->smarty -> assign ('BASE_URL', BASE_URL);
        $this ->smarty -> display ('templates/header.tpl');
        $this ->smarty -> display ('templates/index.tpl');
    }
    public function showUsers($users){
        $this -> smarty -> assign ('users', $users);
        $this -> smarty -> display ('templates/users.tpl'); 
        $this -> smarty -> display ('templates/footer.tpl');

    }

}