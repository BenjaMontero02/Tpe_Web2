<?php

require_once './MODEL/categoriesModel.php';
require_once './VIEW/categoriesView.php';
require_once './CONTROLLER/userController.php';
require_once './helper/AuthHelper.php';
require_once './MODEL/comentsModel.php';

class categoriesController{

    private $model;
    private $view;
    private $helper;
    private $comentsModel;

    function __construct(){
        $this->model= new categoriesModel;
        $this->view = new categoriesView; 
        $this->userController= new usersController;
        $this->helper= new AuthHelper;
        $this->comentsModel = new comentsModel;
    }

    function getAllCategories(){
        $categories = $this->model->getAllCategoriesList();
        $bolean = $this->helper->checkLoggedIn();
        if ($bolean) {
            $rol = $_SESSION['rol'];
            $start = $_SESSION['start'];
            $user_id = $_SESSION['user_id'];
            $this->view->renderListOfCategories($categories, $rol, $start, $user_id);
        }else{
            $this->view->renderListOfCategories($categories, null, null, null);
        }
    }
    function askForInsertCategory(){
        $bolean = $this->helper->checkAdmin();
        if($bolean){
        if(isset($_POST['categorias'])){
            $category = $_POST['categorias'];
            $this->model->insertCategory($category);
            header('Location:getAllCategories');
        }
    }}

    function askForDeleteCategory(){
        $bolean = $this->helper->checkAdmin();
        if($bolean){
        if(isset($_POST['categorias'])){
            $categoryToDelete = $_POST['categorias'];
            $this->model->deleteCategory($categoryToDelete);
            $this->comentsModel->deleteComments($categoryToDelete);
            header('Location:getAllCategories');
        }
    }
}
}