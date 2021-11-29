<?php

class productsModel{

    private $db;

    function __construct(){
        $this-> db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
    }
    function getAllProductsList(){
        $consult = $this-> db-> prepare ('SELECT * FROM productos');
        $consult->execute();
        $response = $consult-> fetchAll(PDO::FETCH_OBJ);
        return $response;
    }

    function getProductByName($product){
        $consult = $this->db-> prepare ('SELECT * FROM productos WHERE producto= ?');
        $consult->execute(array($product));
        $response = $consult->fetch(PDO::FETCH_OBJ);
        return $response;
    }

    function getProduct($productId){
        $consult = $this-> db-> prepare ('SELECT * FROM productos WHERE producto_id=?');
        $consult->execute(array($productId));
        $response = $consult-> fetch(PDO::FETCH_OBJ);
        return $response;
    }
    function insertProduct($producto, $categoria, $precio, $descripcion){
        $consult = $this-> db-> prepare ('INSERT INTO productos (producto, categoria, precio, descripcion) VALUES (?,?,?,?)');
        $consult->execute(array($producto, $categoria, $precio, $descripcion));
    }
    function getProducByCategorie($categorie){
        $consult = $this-> db-> prepare ('SELECT * FROM productos WHERE categoria = ?');
        $consult->execute([$categorie]);
        $response = $consult-> fetchAll(PDO::FETCH_OBJ);
        return $response;
    }
    function deleteProductById($productToDelete){
        $consult = $this-> db-> prepare ('DELETE FROM productos WHERE producto_id = ?');
        $consult->execute([$productToDelete]);
    }
    function updateProductById($producto, $categoria, $precio, $id, $descripcion){
        $consult = $this-> db-> prepare ('UPDATE productos SET producto=?,categoria=? ,precio=?, descripcion=? WHERE producto_id=?');
        $consult->execute([$producto, $categoria, $precio, $descripcion, $id]);
    }
}