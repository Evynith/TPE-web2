<?php

require_once('libs/Smarty.class.php');


class CursosView {

    function __construct(){

    }

    public function DisplayCursos($Cursos){

        $smarty = new Smarty();
        $smarty->assign('titulo',"Mostrar Cursos");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('lista_Cursos',$Cursos);
        $smarty->display('templates/ver_cursos.tpl');
    }
}

?>