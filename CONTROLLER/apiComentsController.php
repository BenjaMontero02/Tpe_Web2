<?php

require_once './MODEL/comentsModel.php';

class apiComentsController{
    private $comentsModel;
    private $view;

    function __construct(){
        $this->comentsModel = new comentsModel;
        $this->view = new apiView;
    }
    function getComents($params = null){
        $id_product = $params[':ID'];
        if($id_product){
            $coments = $this->comentsModel->getAllComents($id_product);
            if($coments){
                $this->view->response($coments, 200);
            }else{
                $this->view->response("no hay comentarios sobre este producto", 404);
            }
        }
    }

    function deleteComent($params = null){
        $comentId = $params[':ID'];
        $coment = $this->comentsModel->getComent($comentId);

        if($coment){
            $this->comentsModel->deleteComentById($comentId);
            $this->view->response("Se eliminó al comentario con id:$comentId", 200);
        }
        else{
            $this->view->response("No se puedo eliminar el comentario", 404);
        }
    }

    function insertComents(){
        $body = $this->getBody();
        $id = $this ->comentsModel-> insertComent($body->comentario, $body->puntuacion, $body->id_user, $body->id_producto, $body->categoria);

        if($id != 0){
            $this->view->response("El comentatio se insertó con el id=$id comentario:$body->comentario", 200);
        } else {
            $this->view->response("No es posible publicar su comentario", 500);
        }
    }
    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
}