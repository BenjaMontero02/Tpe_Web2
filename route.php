<?php

require_once './CONTROLLER/productsController.php';
require_once './CONTROLLER/userController.php';
require_once './CONTROLLER/categoriesController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if(!empty($_GET['action'])){
    $action = $_GET['action'];
}
else{
    $action = 'home';
}

$controller = new productsController;
$userController = new usersController;
$categoryController = new categoriesController;

$params = explode('/', $action);

switch ($params[0]) {
    case 'getAllProducts':
        $controller -> getAllProducts();
        break;
    case 'home':
            $controller -> callHome();
        break;
    case 'insertProduct':
        $controller -> askForInsert();
        break;
    case 'insertCategory':
        $categoryController -> askForInsertCategory();
        break;
    case 'deleteCategory':
        $categoryController -> askForDeleteCategory();
        break;
    case 'getAllCategories':
        $categoryController -> getAllCategories();
        break;
    case 'ProductByCategorie':
        $controller -> ProductByCategorie();
        break;
    case 'delete':
        $controller -> askForDelete();
        break; 
    case 'login':
        $userController -> askForLogin();
        break;
    case 'logout':
        $userController -> logOut();
        break;   
    case 'confirmUpdate':
        $controller -> confirmUpdate();
        break; 
    case 'register':
        $userController -> askForRegister();
        break;
    case 'user':
        $userController -> renderLogin();
        break;
    case 'newUser':
        $userController -> renderRegister();
        break;
    case 'adminUsers':
        $userController -> checkedLoginForAdminUsers();
        break;
    case 'deleteUser':
        $userController -> askForDeleteUser($params[1]);
        break;
    case 'contact':
        $controller -> contact();
        break;
    case 'adminOn':
        $userController -> turnOnPermitions($params[1]);
        break;
    case 'adminOff':
        $userController -> turnOffPermitions($params[1]);
        break;
    case 'producto':
        $controller->renderProduct($params[1]);
        break;

    default:
        # code...
        break;
}