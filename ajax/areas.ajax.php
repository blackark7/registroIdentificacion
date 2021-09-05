<?php

require_once "../controladores/areas.controlador.php";
require_once "../modelos/areas.modelo.php";

class AjaxAreas
{

    /*=============================================
    EDITAR AREAS
    =============================================*/

    public $idArea;

    public function ajaxEditarArea()
    {

        $item  = "id";
        $valor = $this->idArea;

        $respuesta = ControladorAreas::ctrMostrarAreas($item, $valor);

        echo json_encode($respuesta);

    }
}

/*=============================================
EDITAR AREAS
=============================================*/
if (isset($_POST["idArea"])) {

    $area                = new AjaxAreas();
    $area->idArea = $_POST["idArea"];
    $area->ajaxEditarArea();
}

