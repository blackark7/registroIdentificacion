<?php

class ControladorAsistencia
{

    /*=============================================
    MOSTRAR ASISTENCIA
    =============================================*/

    public static function ctrMostrarAsistencia($item, $valor)
    {

        $tabla = "registroidentificacion";

        $respuesta = ModeloAsistencias::mdlMostrarAsistencias($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    MOSTRAR ASISTENCIA GENERAL
    =============================================*/

    public static function ctrMostrarAsistenciaGeneral($item, $valor)
    {

        $tabla = "asistencia_mensual";

        $respuesta = ModeloAsistencias::mdlMostrarAsistenciaGeneral($tabla, $item, $valor);

        return $respuesta;

    }

}
