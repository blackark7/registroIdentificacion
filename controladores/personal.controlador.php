<?php

class ControladorPersonal
{

    /*=============================================
    CREAR PERSONAL
    =============================================*/

    public static function ctrCrearPersonal()
    {

        if (isset($_POST["cedula"])) {

            if (preg_match('/^[0-9]+$/', $_POST["cedula"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombres"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidos"]) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST["telefono"]) &&
                preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["direccion"])) {

                $tabla = "personal";

                $datos = array("cedula" => $_POST["cedula"],
                    "nombres"               => $_POST["nombres"],
                    "apellidos"             => $_POST["apellidos"],
                    "fecha_nacimiento"      => $_POST["fecha_nacimiento"],
                    "telefono"              => $_POST["telefono"],
                    "direccion"             => $_POST["direccion"],
                    "cargo"                 => $_POST["cargo"],
                    "area"                 => $_POST["area"],
                    "departamento"          => $_POST["departamento"]);

                $respuesta = ModeloPersonal::mdlIngresarPersonal($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El trabajador ha sido guardado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "personal";

                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El trabajador no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "personal";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    MOSTRAR PERSONAL
    =============================================*/

    public static function ctrMostrarPersonal($item, $valor)
    {

        $tabla = "personal";

        $respuesta = ModeloPersonal::mdlMostrarPersonal($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    EDITAR PERSONAL
    =============================================*/

    public static function ctrEditarPersonal()
    {

        if (isset($_POST["editarCedula"])) {

            if (preg_match('/^[0-9]+$/', $_POST["editarCedula"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarApellido"]) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) &&
                preg_match('/^[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDireccion"])) {

                $tabla = "personal";

                $datos = array("id" => $_POST["idPersonal"],
                    "cedula"            => $_POST["editarCedula"],
                    "nombre"            => $_POST["editarNombre"],
                    "apellido"          => $_POST["editarApellido"],
                    "fecha_nacimiento"  => $_POST["editarFechaNacimiento"],
                    "telefono"          => $_POST["editarTelefono"],
                    "direccion"         => $_POST["editarDireccion"],
                    "cargo"             => $_POST["editarCargo"],
                    "area"             => $_POST["editarArea"],
                    "departamento"      => $_POST["editarDepartamento"]);

                $respuesta = ModeloPersonal::mdlEditarPersonal($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El trabajador ha sido cambiado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "personal";

                                    }
                                })

                    </script>';

                }

            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El personal no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "personal";

                            }
                        })

                </script>';

            }

        }

    }

    /*=============================================
    ELIMINAR PERSONAL
    =============================================*/

    public static function ctrEliminarPersonal()
    {

        if (isset($_GET["idPersonal"])) {

            $tabla = "personal";
            $datos = $_GET["idPersonal"];

            $respuesta = ModeloPersonal::mdlEliminarPersonal($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "El trabajador ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                      }).then(function(result){
                                if (result.value) {

                                window.location = "personal";

                                }
                            })

                </script>';

            }

        }

    }

}
