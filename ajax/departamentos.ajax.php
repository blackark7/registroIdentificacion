<?php

require_once "../controladores/departamentos.controlador.php";
require_once "../modelos/departamentos.modelo.php";

class AjaxDepartamentos
{

    /*=============================================
    EDITAR DEPARTAMENTOS
    =============================================*/

    public $idDepartamento;

    public function ajaxEditarDepartamento()
    {

        $item  = "id";
        $valor = $this->idDepartamento;

        $respuesta = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

        echo json_encode($respuesta);

    }
}

/*=============================================
EDITAR DEPARTAMENTOS
=============================================*/
if (isset($_POST["idDepartamento"])) {

    $departamento                 = new AjaxDepartamentos();
    $departamento->idDepartamento = $_POST["idDepartamento"];
    $departamento->ajaxEditarDepartamento();
}
