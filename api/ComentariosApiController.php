<?php
require_once("./Models/ComentariosModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class ComentariosApiController extends ApiController{
  

    public function getComentarioss($params = null) {
        $tareas = $this->model->GetComentarioss();
        $this->view->response($tareas, 200);
    }

    /**
     * Obtiene una tarea dado un ID
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */
     public function getComentarios($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $tarea = $this->model->GetComentarios($id);
        
        if ($tarea) {
            $this->view->response($tarea, 200);   
        } else {
            $this->view->response("No existe(n) comentarios para el usuario id={$id}", 404);
        }
    }

    // TareasApiController.php
     public function deleteComment($params = []) {
        $comment_id = $params[':ID'];
        $comment = $this->model->GetComentario($comment_id);

        if ($comment) {
            $this->model->BorrarComentario($comment_id);
            $this->view->response("Tarea id=$comment_id eliminada con éxito", 200);
        }
        else 
            $this->view->response("Task id=$comment_id not found", 404);
    }

    // TareaApiController.php
   public function addComment($params = []) {     
        $tarea = $this->getData(); // la obtengo del body

        // inserta la tarea
        $comentarioId = $this->model->InsertarComentario($tarea->id_alumno, $tarea->estrellas,$tarea->comentario);

        // obtengo la recien creada
        $comentarioNuevo = $this->model->GetComentario($comentarioId);
        
        if ($comentarioNuevo)
            $this->view->response($comentarioNuevo , 200);
        else
            $this->view->response("Error al insertar comentario", 500);

    }

    // TaskApiController.php
     public function updateComment($params = []) {
        $comment_id = $params[':ID'];
        $comment = $this->model->GetComentario($comment_id);

        if ($comment) {
            $body = $this->getData();
            $id_alumno = $body->id_alumno;
            $estrellas = $body->estrellas;
            $comentario = $body->comentario;
            $tarea = $this->model->ActualizarComentario( $id_alumno, $estrellas, $comentario, $comment_id);
            $this->view->response("Comentario id=$comment_id actualizada con exito", 200);
        }
        else 
            $this->view->response("Comentario id=$comment_id not found", 404);
    }  
  

}