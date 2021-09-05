<?php

require_once "conexion.php";

class ModeloAsistencias
{

    /*=============================================
    MOSTRAR ASISTENCIAS
    =============================================*/
    

    public static function mdlMostrarAsistencias($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla a inner join personal p on a.id_personal = p.id inner join departamento d on p.id_departamento = d.id WHERE a.$item = :$item"  );

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
           

            $stmt->execute();

            return $stmt->fetchAll();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    MOSTRAR ASISTENCIA GENERAL
    =============================================*/

    public static function mdlMostrarAsistenciaGeneral($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

           

            $stmt->execute();

            return $stmt->fetchAll();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;

    }

}
