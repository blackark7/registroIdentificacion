<?php

require_once "conexion.php";

class ModeloDepartamentos
{

    /*=============================================
    CREAR DEPARTAMENTOS
    =============================================*/

    public static function mdlIngresarDepartamento($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(departamento) VALUES (:departamento)");

        $stmt->bindParam(":departamento", $datos, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
    MOSTRAR DEPARTAMENTOS
    =============================================*/

    public static function mdlMostrarDepartamentos($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    EDITAR DEPARTAMENTO
    =============================================*/

    public static function mdlEditarDepartamento($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET departamento = :departamento WHERE id = :id");

        $stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
    BORRAR DEPARTAMENTO
    =============================================*/

    public static function mdlBorrarDepartamento($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

}
