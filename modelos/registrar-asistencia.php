<?php

include_once 'conexion.php';

$cedula = $_POST['cedula'];
//buscamos si el numero de cedula esta registrado en la base de datos
$sql_usuario   = Conexion::conectar()->query("SELECT * from personal where cedula = '" . $cedula . "' ");
$array_usuario = $sql_usuario->fetch(PDO::FETCH_ASSOC);


//Si no esta registrado mostramos el siguiente mensaje (El numero de cedula no esta registrado)
if ($array_usuario['id'] == "") {
    
    $error[] = "COLABORADOR NO ACTIVO.";

    //Si esta registrado capturamos la id del empleado
}else{
    
    $usuario  = $array_usuario['id'];
    $empleado = $array_usuario['nombres'] . " " . $array_usuario['apellidos'];
    $sql_asistencia = Conexion::conectar()->query("INSERT INTO asistencia (id, id_personal, fecha, hora_entrada) values (NULL, '$usuario', now(), now())");
    
     $entrada[] = "COLABORADOR ACTIVO : $empleado";
}
	



//	MENSAJE CUANDO EL NUMERO DE CEDULA NO ESTÁ REGISTRADO
	
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
	if (isset($entrada)) {

?>
		<div class="alert alert-success" role="success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php
       foreach ($entrada as $entrada) {
       echo $entrada;
    }
    ?>
		</div>
	<?php
}



?>