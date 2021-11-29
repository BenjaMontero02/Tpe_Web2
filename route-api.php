<?php

require_once 'libs/Router.php';
require_once 'CONTROLLER/apiProductsController.php';
require_once 'CONTROLLER/apiComentsController.php';
require_once 'CONTROLLER/apiUsersController.php';
$router = new Router();

$router->addRoute('productos/:ID', 'GET', 'apiProductsController', 'getProductById');
$router->addRoute('comentarios/:ID', 'GET', 'apiComentsController', 'getComents');
$router->addRoute('comentarios/:ID', 'DELETE', 'apiComentsController', 'deleteComent');
$router->addRoute('comentarios', 'POST', 'apiComentsController', 'insertComents');
$router->addRoute('productos', 'GET', 'apiProductsController', 'getProducts');
$router->addRoute('usuarios', 'GET', 'apiUsersController', 'getUsers');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);