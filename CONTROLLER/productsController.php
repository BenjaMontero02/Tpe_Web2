<?php

require_once './VIEW/productsView.php';
require_once './MODEL/productsModel.php';
require_once './VIEW/userView.php';
require_once './MODEL/userModel.php';
require_once './CONTROLLER/userController.php';
require_once './helper/AuthHelper.php';
require_once './MODEL/categoriesModel.php';
require_once './MODEL/comentsModel.php';


class productsController{
    private $view;
    private $model;
    private $helper;
    private $categoriesModel;
    private $comentsModel;

    function __construct() {
        $this->view= new productsView;
        $this->model= new productsModel;
        $this->userController= new usersController;
        $this->helper= new AuthHelper;
        $this->categoriesModel = new categoriesModel;
        $this->comentsModel = new comentsModel;
    }

    function renderProduct($product){
        $producto = $this->model->getProductByName($product);
        $bolean = $this->helper->checkLoggedIn();

        if($producto){
            if ($bolean) {
                $rol = $_SESSION['rol'];
                $start = $_SESSION['start'];
                $user_id = $_SESSION['user_id'];
                $id = $producto->producto_id;
                $categoria = $producto->categoria;
                $this->view->showProduct($producto, $rol, $start, $user_id, $id, $categoria);
                }else{
                $id = $producto->producto_id;
                $categoria = $producto->categoria;
                $this->view->showProduct($producto, null , null, null, $id, $categoria);
                }
        }else{
            $this->view->errorUnexpected($product);
        }
    }

    function callHome(){
        $bolean = $this->helper->checkLoggedIn();
        if ($bolean) {
            $rol = $_SESSION['rol'];
            $start = $_SESSION['start'];
            $this->view->publicAccess($rol, $start);
        }else{
            $this->view->publicAccess(null, null);
        }
    }
    function getAllProducts(){
        $products = $this->model->getAllProductsList();
        $category = $this->categoriesModel->getAllCategoriesList();
        $bolean = $this->helper->checkLoggedIn();
        if ($bolean) {
            $rol = $_SESSION['rol'];
            $start = $_SESSION['start'];
            $user_id = $_SESSION['user_id'];
            $this->view->renderTableOfProducts($products, $rol, $start, $user_id, $category);
        }else{
            $this->view->renderTableOfProducts($products, null, null, null, $category);
        }
        
    }

    function askForInsert(){
        $bolean = $this->helper->checkAdmin();
        if($bolean){
        if(isset($_POST['producto'], $_POST['categoria'], $_POST['precio'], $_POST['descripcion'])){
            $producto = $_POST['producto'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];

            $this->model->insertProduct($producto, $categoria, $precio, $descripcion);
            header('Location:/tp2/getAllProducts');
        }
    }
    }

    function ProductByCategorie(){
        $bolean = $this->helper->checkLoggedIn();
            if ($bolean && isset($_POST['categoria'])) {
                $rol = $_SESSION['rol'];
                $start = $_SESSION['start'];
                $user_id = $_SESSION['user_id'];
                $category = $_POST['categoria'];
                $productos = $this->model->getProducByCategorie($category);
                $this->view->renderByCategorie($productos,$category, $rol, $start, $user_id);
        }
            else{
                $category = $_POST['categoria'];
                $productos = $this->model->getProducByCategorie($category);
                $this->view->renderByCategorie($productos,$category, null, null, null);
            }
    }
    function askForDelete(){
        $bolean = $this->helper->checkAdmin();
        if($bolean){
        if(isset($_POST['producto_id'])){
            $productToDelete = $_POST['producto_id'];
            $this->model->deleteProductById($productToDelete);
            $this->comentsModel->deleteCommentByIdProduct($productToDelete);
            header('Location:/tp2/getAllProducts');
        }
    }
    }
    function confirmUpdate(){
        $bolean = $this->helper->checkAdmin();
        if($bolean){
        if(isset($_POST['producto'], $_POST['categoria'], $_POST['precio'], $_POST['id'], $_POST['descripcion'])){
            $producto = $_POST['producto'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $id = $_POST['id'];
            $descripcion = $_POST['descripcion'];

            $this->model->updateProductById($producto, $categoria, $precio, $id, $descripcion);
            header('Location:/tp2/getAllProducts');
        }}
    }

    function contact(){
        $bolean = $this->helper->checkLoggedIn();
        if ($bolean) {
            $rol = $_SESSION['rol'];
            $start = $_SESSION['start'];
            $user_id = $_SESSION['user_id'];
            $this->view->renderContact( $rol, $start, $user_id);
        }else{
            $this->view->renderContact(null, null, null);
        }
    }
}
