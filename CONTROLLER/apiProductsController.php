<?php

require_once './MODEL/productsModel.php';
require_once './VIEW/apiView.php';

class apiProductsController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new productsModel;
        $this->view = new apiView;
    }
    function getProductById($params = null){
        $productId = $params[':ID'];
        $product = $this->model->getProduct($productId);

        if($product){
            $this->view->response($product, 200);
        }
        else{
            $this->view->response('Su producto no existe', 404);
        }
    }

    function getProducts($params = null){
        if(empty($params)){
            $products = $this->model->getAllProductsList();
            $this->view->response($products, 200);
        }
    }
}