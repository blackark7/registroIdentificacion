<?php
include_once 'modelos/conexion.php';

$entrada = 'ENTRADA';
$salida = 'SALIDA';
$usuario = 'root';
$contraseña = '';
$host = 'localhost';
$base = 'registroidentificacion';

try {
    $conexion = new PDO('mysql:host=' . $host . ';dbname=' . $base, $usuario, $contraseña);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Marcaciones

        </h1>



    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">


            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            
                            <th>Nombres</th>
                            <th>Apellidos</th>                           
                            <th>Entradas</th>                       
                            <th>Salidas</th>                            
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
//                                        PARTE DE ENTRADA------>
                        $item = null;
                        $valor = null;

                        $clientes = ControladorPersonal::ctrMostrarPersonal($item, $valor);

                        foreach ($clientes as $key => $value) {

                            $query = "SELECT personal.cedula, personal.nombres, personal.apellidos, 
                                                asistencia.fecha, asistencia.hora_entrada, 
                                                asistencia_salida.fecha2, asistencia_salida.hora_salida 
                                                FROM asistencia 
                                                INNER JOIN personal ON asistencia.id_personal = personal.id 
                                                INNER JOIN asistencia_salida ON asistencia.id_personal = asistencia_salida.id_personal  ";
                            
                            $consulta = $conexion -> query($query);
                            
                            while ($fila = $consulta -> fetch(PDO::FETCH_ASSOC)) {

                                echo ' <tr>
                                                
						<td>' . $fila['cedula'] . '</td>
						<td>' . $fila['nombres'] . '</td>
						<td>' . $fila['apellidos'] . '</td>						
						<td>' . $fila['hora_entrada'] . " - " . $fila['fecha'] . '</td>
						<td>' . $fila['hora_salida'] . " - " . $fila['fecha2'] . '</td>		
						                                                
                                         				                     
                        
                    <td>


                        
                        

                            <button class="btn btn-warning btnEditarPersonal" data-toggle="modal" data-target="#modalEditarPersonal" idPersonal="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>
                             <button class="btn btn-danger btnEliminarPersonal" idPersonal="' . $value["id"] . '"><i class="fa fa-times"></i></button> ';
                            }
                        }
                        ?>







                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>






<!--=====================================
MODAL AGREGAR PERSONAL
======================================-->

<div id="modalAgregarPersonal" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar personal</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA LA CEDULA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control input-lg" name="cedula" placeholder="Ingresar cedula" required autocomplete="off">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text"  class="form-control input-lg" name="nombres" placeholder="Nombres" required autocomplete="off">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL APELLIDO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lg" name="apellidos" placeholder="Apellidos" required autocomplete="off">

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input type="text" class="form-control input-lg" name="fecha_nacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL TELEFONO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-lg" name="telefono" placeholder="Telefono" data-inputmask="'mask':'(999) 999-9999'" data-mask >

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA DIRECCIÓN -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                <input type="text" class="form-control input-lg" name="direccion" placeholder="Ingresar dirección" required autocomplete="off">

                            </div>

                        </div>

                        <legend class="text-bold">Información Laboral</legend>

                        <!-- ENTRADA PARA SELECCIONAR CARGO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg" id="cargo" name="cargo" required>

                                    <option value="">Selecionar cargo</option>

<?php
$item = null;
$valor = null;

$cargos = ControladorCargos::ctrMostrarCargos($item, $valor);

foreach ($cargos as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["cargo"] . '</option>';
}
?>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR AREA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg" id="area" name="area" required>

                                    <option value="">Selecionar Área</option>

<?php
$item = null;
$valor = null;

$areas = ControladorAreas::ctrMostrarAreas($item, $valor);

foreach ($areas as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["area"] . '</option>';
}
?>






                                </select>

                            </div>

                        </div>

                    </div>

                </div>



            </form>

<?php
$crearPersonal = new ControladorPersonal();
$crearPersonal->ctrCrearPersonal();
?>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR PERSONAL
======================================-->

<div id="modalEditarPersonal" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar personal</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA LA CEDULA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control input-lg" name="editarCedula" id="editarCedula" required>

                                <input type="hidden" name="idPersonal" id="idPersonal" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text"  class="form-control input-lg" name="editarNombre" id="editarNombre" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL APELLIDO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lg" name="editarApellido" id="editarApellido" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL TELEFONO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask >

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA DIRECCIÓN -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>

                            </div>

                        </div>

                        <legend class="text-bold">Información Laboral</legend>

                        <!-- ENTRADA PARA SELECCIONAR CARGO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg"  name="editarCargo" required>

                                    <option id="editarCargo"></option>

<?php
$item = null;
$valor = null;

$cargos = ControladorCargos::ctrMostrarCargos($item, $valor);

foreach ($cargos as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["cargo"] . '</option>';
}
?>

                                </select>

                            </div>

                        </div>


                        <!-- ENTRADA PARA SELECCIONAR AREA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg"  name="editarArea" required>

                                    <option id="editarArea"></option>

<?php
$item = null;
$valor = null;

$areas = ControladorAreas::ctrMostrarAreas($item, $valor);

foreach ($areas as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["area"] . '</option>';
}
?>

                                </select>

                            </div>

                        </div>



                        <!-- ENTRADA PARA SELECCIONAR DEPARTAMENTO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg"  name="editarDepartamento" required>

                                    <option id="editarDepartamento"></option>

<?php
$item = null;
$valor = null;

$departamentos = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

foreach ($departamentos as $key => $value) {

    echo '<option value="' . $value["id"] . '">' . $value["departamento"] . '</option>';
}
?>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>

                </div>

            </form>

<?php
$editarPersonal = new ControladorPersonal();
$editarPersonal->ctrEditarPersonal();
?>

        </div>

    </div>

</div>


<?php
$eliminarPersonal = new ControladorPersonal();
$eliminarPersonal->ctrEliminarPersonal();
?>


<!-- ESTO ES PARA LLAMAR EL CARGO DEL PERSONAL
<td>' . $respuestaCargo['cargo'] . '</td> -->

<!--$query = "SELECT personal.cedula, personal.nombres, personal.apellidos, 
                                                asistencia.fecha, asistencia.hora_entrada, 
                                                asistencia_salida.fecha2, asistencia_salida.hora_salida 
                                                FROM personal 
                                                INNER JOIN asistencia ON personal.id = asistencia.id_personal 
                                                INNER JOIN asistencia_salida ON asistencia.id = asistencia_salida.id  ";
                            $query2 ="SELECT asistencia_salida.fecha2, asistencia_salida.hora_salida 
                                             FROM asistencia_salida";-->