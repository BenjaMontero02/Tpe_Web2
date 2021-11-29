<?php

require_once './MODEL/userModel.php';
require_once './VIEW/apiView.php';

class apiUsersController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new UsersModel;
        $this->view = new APIView;
    }
    function getUsers($params = null){
        $user = $this -> model -> getAllUsers();

        if($user){
            $this->view->response($user, 200);
        }
        else{
            $this->view->response('El usuario no pudo ser encontrado', 404);
        }
    }
}