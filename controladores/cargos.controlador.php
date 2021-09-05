<?php

class ControladorCargos
{

    /*=============================================
    CREAR CARGOS
    =============================================*/

    public static function ctrCrearCargos()
    {

        if (isset($_POST["nuevoCargo"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCargo"])) {

                $tabla = "cargos";

                $datos = $_POST["nuevoCargo"];

                $respuesta = ModeloCargos::mdlIngresarCargos($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El cargo ha sido guardado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "cargos";

                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El cargo no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "cargos";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    MOSTRAR CARGOS
    =============================================*/

    public static function ctrMostrarCargos($item, $valor)
    {

        $tabla = "cargos";

        $respuesta = ModeloCargos::mdlMostrarCargos($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    EDITAR CARGO
    =============================================*/

    public static function ctrEditarCargo()
    {

        if (isset($_POST["editarCargo"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCargo"])) {

                $tabla = "cargos";

                $datos = array("cargo" => $_POST["editarCargo"],
                    "id"                   => $_POST["idCargo"]);

                $respuesta = ModeloCargos::mdlEditarCargo($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El cargo ha sido cambiado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "cargos";

                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El cargo no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "cargos";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    BORRAR CARGO
    =============================================*/

    public static function ctrEliminarCargo()
    {

        if (isset($_GET["idCargo"])) {

            $tabla = "cargos";
            $datos = $_GET["idCargo"];

            $respuesta = ModeloCargos::mdlBorrarCargo($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                    swal({
                          type: "success",
                          title: "El cargo ha sido borrado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "cargos";

                                    }
                                })

                    </script>';
            }
        }

    }
}
