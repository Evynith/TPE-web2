<?php

require_once('libs/Smarty.class.php');


class AlumnosView {

    function __construct(){

    }

    public function DisplayAlumnos($Alumnos){

        $smarty = new Smarty();
        $smarty->assign('titulo',"Mostrar Alumnos");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('lista_Alumnos',$Alumnos);
        $smarty->display('templates/ver_alumnos.tpl');
    }
}

?>