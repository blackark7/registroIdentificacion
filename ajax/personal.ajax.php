<?php

require_once "../controladores/personal.controlador.php";
require_once "../modelos/personal.modelo.php";

class AjaxPersonal
{

    /*=============================================
    EDITAR PERSONAL
    =============================================*/

    public $idPersonal;

    public function ajaxEditarPersonal()
    {

        $item  = "id";
        $valor = $this->idPersonal;

        $respuesta = ControladorPersonal::ctrMostrarPersonal($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
EDITAR PERSONAL
=============================================*/

if (isset($_POST["idPersonal"])) {

    $personal             = new AjaxPersonal();
    $personal->idPersonal = $_POST["idPersonal"];
    $personal->ajaxEditarPersonal();

}
