<?php
require_once("./api/ApiController.php");

class ComentariosApiController extends ApiController{ //aca ya estan creados mi model, view y data. Los heredo
  
/* 
    public function getComentarioss($params = null) { 
        $tareas = $this->model->GetComentarioss();
        $this->view->response($tareas, 200);
    }
 */
     public function getComentarios($params = null) { 
        $id = $params[':ID']; // obtiene el parametro de la ruta
        
        $tarea = $this->model->GetComentarios($id);
        
        if ($tarea) {
            $this->view->response($tarea, 200);   
        } else {
            $this->view->response("No existe(n) comentarios para el usuario id={$id}", 404);
    }   }
   /*  public function getComentarios($alumno_id, $params = []) {  //una o varias
        if (empty($params)){
            $comentario_id = $params[':ID']; // obtiene el parametro de la ruta
            
            $comentarios = $this->model->GetComentarios($alumno_id);
            $this->view->response($comentarios, 200);  
        }else{
            $comentario =  $this->model->GetComentario($comentario_id);
            if (!empty($comentario)) {    // si no esta vacio...
                $this->view->response($comentario, 200);  
            }else{
                $this->view->response("No existe(n) comentarios para el usuario id={$alumno_id}", 404);
    }   }   } */

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

   public function addComment($params = []) {     
        $comentario = $this->getData(); // la obtengo del body

        // inserta la tarea
        $id_comentario = $this->model->InsertarComentario($comentario->id_alumno, $comentario->estrellas,$comentario->comentario);

        // obtengo la recien creada
        $comentarioNuevo = $this->model->GetComentario($id_comentario);
        
        if ($comentarioNuevo)
            $this->view->response($comentarioNuevo , 200);
        else
            $this->view->response("Error al insertar comentario", 500);

    }

     public function updateComment($params = []) {
        $id_comentario = $params[':ID'];
        $comment = $this->model->GetComentario($id_comentario);

        if ($comment) {
            $body = $this->getData();
            $id_alumno = $body->id_alumno;
            $estrellas = $body->estrellas;
            $comentario = $body->comentario;
            $tarea = $this->model->ActualizarComentario( $id_alumno, $estrellas, $comentario, $id_comentario);
            $this->view->response("Comentario id=$id_comentario actualizada con exito", 200);
        }
        else 
            $this->view->response("Comentario id=$id_comentario not found", 404);
    }  
  

}