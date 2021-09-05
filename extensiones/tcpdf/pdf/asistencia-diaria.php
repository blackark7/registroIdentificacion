<?php

require_once "../../../controladores/asistencia.controlador.php";
require_once "../../../modelos/asistencia.modelo.php";

require_once "../../..//controladores/personal.controlador.php";
require_once "../../../modelos/personal.modelo.php";

require_once "../../../controladores/departamentos.controlador.php";
require_once "../../../modelos/departamentos.modelo.php";

extract($_POST);
$fecha = $_POST['fecha'];
$departamento = $_POST['departamento'];

//REQUERIMOS LA CLASE TCPDF

require_once 'tcpdf_include.php';

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>

		<tr>

			<td style="width:150px"><img style="width:50px; height:50px;" src="images/lopez.jpg"></td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">

					<br>

         
					<br>


				</div>

			</td>


			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">

					<br>


					<br>


				</div>

			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>FECHA: $fecha <br></td>
			

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

     <br>
	 <br>

	<table border="1" bordercolor="#000000" align="center" cellspacing="0">

	  <tr style="background-color:#09F; font-weight:bold">

         <td>CEDULA</td>
         <td>NOMBRE Y APELLIDO</td>
         <td>MAÑANA</td>
         <td>TARDE</td>


     </tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------
$item = "fecha";

$valor = $fecha;

$item2 = "id";

$valor2 = $departamento;

$asistencia = ControladorAsistencia::ctrMostrarAsistencia($item, $valor, $item2, $valor2);

foreach ($asistencia as $key => $value) {

    $itemPersonal = "id";

    $valorPersonal = $value["id_personal"];

    $respuestaPersonal = ControladorPersonal::ctrMostrarPersonal($itemPersonal, $valorPersonal);

    $i = 1;

    $bloque3 = <<<EOF

	<table border="1" bordercolor="#000000" align="center" cellspacing="0" style="font-size:12px;">

	  <tr>
	   <td> $respuestaPersonal[cedula] </td>
	   <td> $respuestaPersonal[nombres]  $respuestaPersonal[apellidos] </td>
	   <td> ENTRADA:  $value[3] <br> SALIDA:  $value[4]  </td>
	   <td> ENTRADA:  $value[5] <br> SALIDA:  $value[6]  </td>
	 </tr>

	</table>

EOF;

    $pdf->writeHTML($bloque3, false, false, false, false, '');
}

// ---------------------------------------------------------

// ---------------------------------------------------------
//SALIDA DEL ARCHIVO

$pdf->Output('asistencia.pdf');
