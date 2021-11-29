<?php
require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class categoriesView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function renderListOfCategories($categories, $rol, $start, $user_id){
        $this->smarty->assign("start", $start);
        $this->smarty->assign("user_rol", $rol);
        $this->smarty->assign("id_usuario", $user_id);
        $this->smarty->assign('categories', $categories);
        $this->smarty->display("../templates/listCategories.tpl");
    }
}
