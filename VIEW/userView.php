<?php

class UsersView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function header(){
        $this->smarty->display("../templates/header.tpl");
    }

    function footer(){
        $this->smarty->display("../templates/footer.tpl");
    }

    function renderFormRegister($error = null){
            $this->smarty->assign('error', $error);
            $this->smarty->display("../templates/register.tpl");
    }

    function renderErrorlog(){
        $this->smarty->display("../templates/error.tpl");
    }

    function renderFormLogIn($error = null){
            $this->smarty->assign('error', $error);
            $this->smarty->display("../templates/logIn.tpl");
    }

    function renderLogOut($user){
        if(isset($user)){
            $this->smarty->assign("start", $user['start']);
            $this->smarty->assign("id_usuario", $user['user_id']);
            $this->smarty->assign("user_rol", $user['rol']);
        }
        $this->smarty->display("../templates/logOut.tpl");
    }

    function renderListOfUsers($users, $rol, $start, $user_id){
        $this->smarty->assign("start", $start);
        $this->smarty->assign("user_rol", $rol);
        $this->smarty->assign("id_usuario", $user_id);
        $this->smarty->assign('users', $users);
        $this->smarty->display("../templates/listOfUsers.tpl");
        $this->footer();
    }
}