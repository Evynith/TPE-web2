<?php

class JSONView {
// esta vista es comun para todos los servicios
 
    public function response($data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($data); //transforma los datos en JSON
    }

    private function _requestStatus($code){ //segun el codigo recibido retorna un error
        $status = array(
          200 => "OK",
          404 => "Not found",
          500 => "Internal Server Error"
        );
        return (isset($status[$code]))? $status[$code] : $status[500];
      }
}