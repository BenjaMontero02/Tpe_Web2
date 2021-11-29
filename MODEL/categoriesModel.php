<?php

class categoriesModel{

    private $db;

    function __construct(){
        $this-> db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 
                                'root', '');
    }
    function deleteAllCategory($categoryToDelete){
        $consult = $this-> db-> prepare ('DELETE FROM productos WHERE categoria = ?');
        $consult->execute([$categoryToDelete]);
    }

    function deleteCategory($categoryToDelete){
        $this->deleteAllCategory($categoryToDelete);
        $consult = $this-> db-> prepare ('DELETE FROM categorias WHERE categorias = ?');
        $consult->execute([$categoryToDelete]);
    }

    function insertCategory($category){
        $consult = $this-> db-> prepare ('INSERT INTO categorias (categorias) VALUES (?)');
        $consult->execute(array($category));
    }

    function getAllCategoriesList(){
        $consult = $this-> db-> prepare ('SELECT * FROM categorias');
        $consult->execute();
        $response = $consult-> fetchAll(PDO::FETCH_OBJ);
        return $response;
    }
}