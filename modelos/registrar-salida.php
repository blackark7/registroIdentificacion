<?php
include_once 'conexion.php';

$cedula = $_POST['cedula'];
//buscamos si el numero de cedula esta registrado en la base de datos
$sql_usuario = Conexion::conectar()->query("SELECT * from personal where cedula = '" . $cedula . "' ");
$array_usuario = $sql_usuario->fetch(PDO::FETCH_ASSOC);




//Si no esta registrado mostramos el siguiente mensaje (El numero de cedula no esta registrado)
if ($array_usuario['id'] == "") {

    $error[] = "Usted no se encuentra registrado.";

    
    //Si está registrado capturamos la id del empleado
} else {

    $usuario = $array_usuario['id'];
    $empleado = $array_usuario['nombres'] . " " . $array_usuario['apellidos'];
    $sql_asistencia = Conexion::conectar()->query("INSERT into asistencia_salida (id, id_personal, fecha2, hora_salida) values (NULL, '$usuario', now(), now())");

    $salida[] = "SALIDA registrada correctamente: $empleado";
}




//MENSAJE CUANDO EL NUMERO DE CEDULA NO ESTÁ REGISTRADO

if (isset($error)) {
    ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php
        foreach ($error as $error) {
            echo $error;
        }
        ?>
    </div>
    <?php
}
?>


<!--//MENSAJE CUANDO EL PERSONAL MARQUE ENTRADA-->

<?php
if (isset($salida)) {
    ?>
    <div class="alert alert-success" role="success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php
        foreach ($salida as $salida) {
            echo $salida;
        }
        ?>
    </div>
    <?php
}
?>

<!--//MENSAJE CUANDO EL PERSONAL MARQUE SALIDA SIN UNA ENTRADA-->

<?php
if (isset($error2)) {
    ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php
        foreach ($error2 as $error2) {
            echo $error2;
        }
        ?>
    </div>
    <?php
}
?>