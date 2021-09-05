<?php

class ControladorAreas
{

    /*=============================================
    CREAR AREAS
    =============================================*/

    public static function ctrCrearAreas()
    {

        if (isset($_POST["nuevoArea"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoArea"])) {

                $tabla = "area";

                $datos = $_POST["nuevoArea"];

                $respuesta = ModeloAreas::mdlIngresarAreas($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El área ha sido guardada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "areas";

                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El área no puede ir vacio o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "areas";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    MOSTRAR AREAS
    =============================================*/

    public static function ctrMostrarAreas($item, $valor)
    {

        $tabla = "area";

        $respuesta = ModeloAreas::mdlMostrarAreas($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    EDITAR AREA
    =============================================*/

    public static function ctrEditarArea()
    {

        if (isset($_POST["editarArea"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarArea"])) {

                $tabla = "area";

                $datos = array("area" => $_POST["editarArea"],
                    "id"                          => $_POST["idArea"]);

                $respuesta = ModeloAreas::mdlEditarArea($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El área ha sido cambiada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "areas";

                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El área no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "areas";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    BORRAR AREA
    =============================================*/

    public static function ctrBorrarArea()
    {

        if (isset($_GET["idArea"])) {

            $tabla = "area";
            $datos = $_GET["idArea"];

            $respuesta = ModeloAreas::mdlBorrarArea($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                    swal({
                          type: "success",
                          title: "El área sido borrado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "areas";

                                    }
                                })

                    </script>';
            }
        }

    }
}

