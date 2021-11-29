<?php

require_once './VIEW/productsView.php';
require_once './MODEL/userModel.php';
require_once './VIEW/userView.php';
require_once './CONTROLLER/productsController.php';
require_once './MODEL/categoriesModel.php';
require_once './helper/AuthHelper.php';

class usersController{
    private $Usermodel;
    private $Userview;
    private $helper;
    

    function __construct(){
        $this->Userview = new UsersView;
        $this->Usermodel = new UsersModel;
        $this->view = new productsView;
        $this->model = new productsModel;
        $this->categoryModel = new categoriesModel;
        $this->helper= new AuthHelper;
    }

    function users(){
        session_start();
        $user = $_SESSION;
        return $user;
    }

    function askForRegister(){
        if(!empty($_POST['email'])&& !empty($_POST['password'])){
            $Newuser = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $user = $this->Usermodel->checkUSer($Newuser);
            if($user){
                $error = 3;
                $this->Userview->renderFormRegister($error);
            }
            else{
                $this->Usermodel->registerNewUser($Newuser, $password);
                $this->askForLogin();
                header('Location:home');
            }
            }
        }
    function askForLogin(){
        if(!empty($_POST['email'])&& !empty($_POST['password'])){
            $user = $_POST['email'];
            $password = $_POST['password'];

            $userLogged = $this->Usermodel->login($user);
            
            if($userLogged && password_verify($password, $userLogged->password)){
                    session_start(); 
                    $_SESSION['email'] = $user;
                    $_SESSION['rol'] = $userLogged->rol;
                    $_SESSION['user_id'] = $userLogged->user_id;
                    $_SESSION['start'] = true;
                    header('Location:home');
            }
            else{
                $error = 1;
                $this->Userview->renderFormLogIn($error);
            }
        }
    }
    function checkedLoginForAdminUsers(){
        $bolean = $this->helper->checkLoggedIn();
        if($bolean){
            if(isset($_SESSION['rol']) && ($_SESSION['rol'] =='admin')){
                $this->askForAllUsers();
            }else{
                $error = 2;
                $this->Userview->renderFormLogIn($error);
            }
        }else{
            header('Location:home');
        }
    }
    function logOut(){
        session_start();
        session_destroy();
        $bolean = $this->helper->checkLoggedIn();
        if ($bolean) {
            $rol = $_SESSION['rol'];
            $start = $_SESSION['start'];
            $this->Userview->renderLogOut($rol, $start);
        }else{
            $this->Userview->renderLogOut(null, null);
        }
    }
    function renderLogin(){
        $this->Userview->renderFormLogIn();
    }
    function renderRegister(){
        $this->Userview->renderFormRegister();
    }
    function askForAllUsers(){
        $users = $this->Usermodel->getAllUsers();
        $rol = $_SESSION['rol'];
        $start = $_SESSION['start'];
        $user_id = $_SESSION['user_id'];
        $this->Userview->renderListOfUsers($users, $rol, $start, $user_id);
        
    }
    function askForDeleteUser($param){
        if($this->helper->checkAdmin()){
            $user = $param;
            $this->Usermodel->deleteUser($user);
            header('Location:/tp2/adminUsers');
        }
        else{
            header('Location:/tp2/home');
        }
    }
    function turnOnPermitions($param){
        if(!empty($param)){
            $rol = 'admin';
            $this->Usermodel->takePermition($rol, $param);
            header('Location:/tp2/adminUsers');
        }
    }
    function turnOffPermitions($param){
        if(!empty($param)){
            $rol = 'No-admin';
            $this->Usermodel->takeOffPermition($rol, $param);
            header('Location:/tp2/adminUsers');
        }
    }
}

