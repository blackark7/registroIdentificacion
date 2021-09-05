<?php
require_once "conexion.php";


$sql = Conexion::conectar()->query("select * from personal where cedula = '".@$_GET['cedula']."' limit 1 ");
$numer = $sql->rowCount();
if(@$numer == 1){
	 $array = $sql->fetch();
	
	echo $arrray['nombres'].".:H:.".$arrray['apellidos'];
}

else {
	echo "".".:H:."."";
	
}
?>