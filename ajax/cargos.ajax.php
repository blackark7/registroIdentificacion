<?php

require_once "../controladores/cargos.controlador.php";
require_once "../modelos/cargos.modelo.php";

class AjaxCargos
{

    /*=============================================
    EDITAR CARGOS
    =============================================*/

    public $idCargo;

    public function ajaxEditarCargo()
    {

        $item  = "id";
        $valor = $this->idCargo;

        $respuesta = ControladorCargos::ctrMostrarCargos($item, $valor);

        echo json_encode($respuesta);

    }
}

/*=============================================
EDITAR CARGOS
=============================================*/
if (isset($_POST["idCargo"])) {

    $cargo          = new AjaxCargos();
    $cargo->idCargo = $_POST["idCargo"];
    $cargo->ajaxEditarCargo();
}
