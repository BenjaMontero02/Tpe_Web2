<?php

class comentsModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 
                                'root', '');
    }
    function getAllComents($id_product){
        $consult = $this-> db-> prepare ('SELECT * FROM comentarios WHERE id_producto=?');
        $consult->execute(array($id_product));
        $response = $consult-> fetchAll(PDO::FETCH_OBJ);
        return $response;
    }
    function getComent($comentId){
        $consult = $this-> db-> prepare ('SELECT * FROM comentarios WHERE id_comentario=?');
        $consult->execute(array($comentId));
        $response = $consult-> fetch(PDO::FETCH_OBJ);
        return $response;
    }
    function insertComent($comentario, $puntuacion, $id_usuario, $id_producto, $categoria){
        $consult = $this -> db -> prepare('INSERT into comentarios (comentario, puntuacion, id_user, id_producto, categoria) VALUES (?,?,?,?,?)');
        $consult->execute(array($comentario, $puntuacion, $id_usuario, $id_producto, $categoria));
        return $this->db->lastInsertId();
    }

    function deleteComentById($comentId){
        $consult = $this -> db -> prepare('DELETE FROM comentarios WHERE id_comentario=?');
        $consult->execute(array($comentId));
    }

    function deleteComments($categoryToDelete){
        $consult = $this -> db -> prepare('DELETE FROM comentarios WHERE categoria=?');
        $consult->execute(array($categoryToDelete));
    }

    function deleteCommentByIdProduct($id){
        $consult = $this -> db -> prepare('DELETE FROM comentarios WHERE id_producto=?');
        $consult->execute(array($id));
    }
}