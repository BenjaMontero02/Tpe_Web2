<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class productsView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function header(){
        $this->smarty->display("../templates/header.tpl");
    }

    function publicAccess($rol, $start) {
            $this->smarty->assign("start", $start);
            $this->smarty->assign("user_rol", $rol);
            $this->smarty->display("../templates/home.tpl");
    }  

    function footer(){
        $this->smarty->display("../templates/footer.tpl");
    }

    function showProduct($product, $rol, $start, $user_id, $id, $categoria){
        $this->smarty->assign("start", $start);
        $this->smarty->assign("user_rol", $rol);
        $this->smarty->assign("id_usuario", $user_id);
        $this->smarty->assign("product", $product);
        $this->smarty->assign("id", $id);
        $this->smarty->assign("categoria", $categoria);
        $this->smarty->display("../templates/renderProduct.tpl");
    }

    function renderTableOfProducts($products, $rol, $start, $user_id, $category){
        $this->smarty->assign("start", $start);
        $this->smarty->assign("user_rol", $rol);
        $this->smarty->assign("id_usuario", $user_id);
        $this->smarty->assign("products", $products);
        $this->smarty->assign("categories", $category);
        $this->smarty->display("../templates/tableProducts.tpl");
    }

    function errorUnexpected($product){
        $this->smarty->assign("product", $product);
        $this->smarty->display("../templates/errorUnexpected.tpl");
    }

    function renderByCategorie($products, $category, $rol, $start, $user_id){
        $this->smarty->assign("start", $start);
        $this->smarty->assign("user_rol", $rol);
        $this->smarty->assign("id_usuario", $user_id);
        $this->smarty->assign('titulo', $category);
        $this->smarty->assign('products', $products);
        $this->smarty->display("../templates/selectCategorie.tpl");
    }

    function renderContact($rol, $start, $user_id){
        $this->smarty->assign("start", $start);
        $this->smarty->assign("user_rol", $rol);
        $this->smarty->assign("id_usuario", $user_id);
        $this->smarty->display("../templates/contact.tpl");
        $this->footer();
    }
}