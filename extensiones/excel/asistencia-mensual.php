<?php

ob_start();

require_once "../../controladores/asistencia.controlador.php";
require_once "../../modelos/asistencia.modelo.php";

require_once "../..//controladores/personal.controlador.php";
require_once "../../modelos/personal.modelo.php";

require_once "../../controladores/departamentos.controlador.php";
require_once "../../modelos/departamentos.modelo.php";

//Incluimos librería y archivo de conexión
require 'Classes/PHPExcel.php';
//Extraemos los post
extract($_POST);
$mes      = $_POST['mes'];
$quincena = $_POST['quincena'];
$anio     = $_POST['anio'];
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('America/Los_Angeles');
$fecha = date("Y-m-d");

//Consulta

$item = "mes";

$valor = $mes;

$item2 = "anio";

$valor2 = $anio;

$asistencia = ControladorAsistencia::ctrMostrarAsistenciaGeneral($item, $valor, $item2, $valor2);

$fila = 3; //Establecemos en que fila inciara a imprimir los datos

//$gdImage = imagecreatefrompng('images/logo.png');//Logotipo

//Objeto de PHPExcel
$objPHPExcel = new PHPExcel();

//Propiedades de Documento
$objPHPExcel->getProperties()->setCreator("Ing.Luis E.Salazar")->setDescription("Asistencia quincenal");

//Establecemos la pestaña activa y nombre a la pestaña
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Asistencia quincenal");

//$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
//$objDrawing->setName('Logotipo');
//$objDrawing->setDescription('Logotipo');
//$objDrawing->setImageResource($gdImage);
//$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
//$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
//$objDrawing->setHeight(100);
//$objDrawing->setCoordinates('A1');
//$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

$estiloTituloReporte = array(
    'font'      => array(
        'name'   => 'Liberation Sans',
        'bold'   => true,
        'italic' => false,
        'strike' => false,
        'size'   => 18,

    ),
    'fill'      => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'FFFF00'),
    ),
    'borders'   => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_NONE,
        ),
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    ),
);

$estiloTituloColumnas = array(
    'font'      => array(
        'name'  => 'Liberation Sans',
        'bold'  => true,
        'size'  => 13,
        'color' => array(
            'rgb' => 'FFFFFF',
        ),
    ),
    'fill'      => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'FF0000'),
    ),
    'borders'   => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    ),
);

$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray(array(
    'font'      => array(
        'name'  => 'Liberation Sans',
        'size'  => 12,
        'color' => array(
            'rgb' => '000000',
        ),
    ),
    'fill'      => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
    ),
    'borders'   => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    ),
));


    $objPHPExcel->getActiveSheet()->getStyle('A1:AH2')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A2:AH2')->applyFromArray($estiloTituloColumnas);

    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'ASISTENCIA' . " " . $quincena . " " .  "MES" . " " . $mes . " " . $anio);
    $objPHPExcel->getActiveSheet()->mergeCells('B1:AH1');
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(44.25);
    $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(54.75);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(19.75);
    $objPHPExcel->getActiveSheet()->setCellValue('A2', 'N°');
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(21.71);
    $objPHPExcel->getActiveSheet()->setCellValue('B2', 'CEDULA');
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30.75);
    $objPHPExcel->getActiveSheet()->setCellValue('C2', 'NOMBRES Y APELLIDOS');
    $objPHPExcel->getActiveSheet()->getStyle('D5')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10.57);
    $objPHPExcel->getActiveSheet()->setCellValue('D2', '01');
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10.57);
    $objPHPExcel->getActiveSheet()->setCellValue('E2', '02');
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('F2', '03');
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('G2', '04');
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('H2', '05');
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('I2', '06');
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('J2', '07');
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('K2', '08');
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('L2', '09');
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('M2', '10');
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('N2', '11');
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('O2', '12');
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('P2', '13');
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('Q2', '14');
    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('R2', '15');
	$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('S2', '16');
	$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('T2', '17');
	$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('U2', '18');
	$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('V2', '19');
	$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('W2', '20');
	$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('X2', '21');
	$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('Y2', '22');
	$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('Z2', '23');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('AA2', '24');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('AB2', '25');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('AC2', '26');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('AD2', '27');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('AE2', '28');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('AF2', '29');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('AG2', '30');
	$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(10.25);
    $objPHPExcel->getActiveSheet()->setCellValue('AH2', '31');

//Recorremos los resultados de la consulta y los imprimimos

    foreach ($asistencia as $key => $value) {
        $itemPersonal = "cedula";

        $valorPersonal = $value["cedula"];

        $respuestaPersonal = ControladorPersonal::ctrMostrarPersonal($itemPersonal, $valorPersonal);

        $objPHPExcel->getActiveSheet()->getRowDimension($fila)->setRowHeight(44.25);
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $fila, $i++);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $fila, $respuestaPersonal[cedula]);
        $objPHPExcel->getActiveSheet()->setCellValue('C' . $fila, $respuestaPersonal[nombres] . " " . $respuestaPersonal[apellidos]);

        if ($value[d1] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('D' . $fila, A);} else {if ($fecha < "$anio-$mes-01") {$objPHPExcel->getActiveSheet()->setCellValue('D' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('D' . $fila, I);}}
        if ($value[d2] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('E' . $fila, A);} else {if ($fecha < "$anio-$mes-02") {$objPHPExcel->getActiveSheet()->setCellValue('E' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('E' . $fila, I);}}

        if ($value[d3] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('F' . $fila, A);} else {if ($fecha < "$anio-$mes-03") {$objPHPExcel->getActiveSheet()->setCellValue('F' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('F' . $fila, I);}}

        if ($value[d4] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('G' . $fila, A);} else {if ($fecha < "$anio-$mes-04") {$objPHPExcel->getActiveSheet()->setCellValue('G' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('G' . $fila, I);}}

        if ($value[d5] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('H' . $fila, A);} else {if ($fecha < "$anio-$mes-05") {$objPHPExcel->getActiveSheet()->setCellValue('H' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('H' . $fila, I);}}

        if ($value[d6] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('I' . $fila, A);} else {if ($fecha < "$anio-$mes-06") {$objPHPExcel->getActiveSheet()->setCellValue('I' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('I' . $fila, I);}}

        if ($value[d7] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('J' . $fila, A);} else {if ($fecha < "$anio-$mes-07") {$objPHPExcel->getActiveSheet()->setCellValue('J' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('J' . $fila, I);}}

        if ($value[d8] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('K' . $fila, A);} else {if ($fecha < "$anio-$mes-08") {$objPHPExcel->getActiveSheet()->setCellValue('K' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('K' . $fila, I);}}

        if ($value[d9] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('L' . $fila, A);} else {if ($fecha < "$anio-$mes-09") {$objPHPExcel->getActiveSheet()->setCellValue('L' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('L' . $fila, I);}}
        if ($value[d10] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('M' . $fila, A);} else {if ($fecha < "$anio-$mes-10") {$objPHPExcel->getActiveSheet()->setCellValue('M' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('M' . $fila, I);}}

        if ($value[d11] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('N' . $fila, A);} else {if ($fecha < "$anio-$mes-11") {$objPHPExcel->getActiveSheet()->setCellValue('N' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('N' . $fila, I);}}

        if ($value[d12] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('O' . $fila, A);} else {if ($fecha < "$anio-$mes-12") {$objPHPExcel->getActiveSheet()->setCellValue('O' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('O' . $fila, I);}}
        if ($value[d13] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('P' . $fila, A);} else {if ($fecha < "$anio-$mes-13") {$objPHPExcel->getActiveSheet()->setCellValue('P' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('P' . $fila, I);}}
        if ($value[d14] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('Q' . $fila, A);} else {if ($fecha < "$anio-$mes-14") {$objPHPExcel->getActiveSheet()->setCellValue('Q' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('Q' . $fila, I);}}

        if ($value[d15] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('R' . $fila, A);} else {if ($fecha < "$anio-$mes-15") {$objPHPExcel->getActiveSheet()->setCellValue('R' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('R' . $fila, I);}}
		
		if ($value[d16] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('S' . $fila, A);} else {if ($fecha < "$anio-$mes-16") {$objPHPExcel->getActiveSheet()->setCellValue('S' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('S' . $fila, I);}}
		  
		if ($value[d17] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('T' . $fila, A);} else {if ($fecha < "$anio-$mes-17") {$objPHPExcel->getActiveSheet()->setCellValue('T' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('T' . $fila, I);}}
			
	    if ($value[d18] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('U' . $fila, A);} else {if ($fecha < "$anio-$mes-18") {$objPHPExcel->getActiveSheet()->setCellValue('U' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('U' . $fila, I);}}
			  
	   if ($value[d19] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('V' . $fila, A);} else {if ($fecha < "$anio-$mes-19") {$objPHPExcel->getActiveSheet()->setCellValue('V' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('V' . $fila, I);}}
				
	  if ($value[d20] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('W' . $fila, A);} else {if ($fecha < "$anio-$mes-20") {$objPHPExcel->getActiveSheet()->setCellValue('W' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('W' . $fila, I);}}
	  
	  if ($value[d21] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('X' . $fila, A);} else {if ($fecha < "$anio-$mes-21") {$objPHPExcel->getActiveSheet()->setCellValue('X' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('X' . $fila, I);}}
	  
	  if ($value[d22] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('Y' . $fila, A);} else {if ($fecha < "$anio-$mes-22") {$objPHPExcel->getActiveSheet()->setCellValue('Y' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('Y' . $fila, I);}}
	  
	  if ($value[d23] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('Z' . $fila, A);} else {if ($fecha < "$anio-$mes-23") {$objPHPExcel->getActiveSheet()->setCellValue('Z' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('Z' . $fila, I);}}
	   
	  if ($value[d24] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('AA' . $fila, A);} else {if ($fecha < "$anio-$mes-24") {$objPHPExcel->getActiveSheet()->setCellValue('AA' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('AA' . $fila, I);}}
	  
	  if ($value[d25] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('AB' . $fila, A);} else {if ($fecha < "$anio-$mes-25") {$objPHPExcel->getActiveSheet()->setCellValue('AB' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('AB' . $fila, I);}}
	  
	  if ($value[d26] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('AC' . $fila, A);} else {if ($fecha < "$anio-$mes-26") {$objPHPExcel->getActiveSheet()->setCellValue('AC' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('AC' . $fila, I);}}
	  
	  if ($value[d27] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('AD' . $fila, A);} else {if ($fecha < "$anio-$mes-27") {$objPHPExcel->getActiveSheet()->setCellValue('AD' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('AD' . $fila, I);}}
	  
	  if ($value[d28] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('AE' . $fila, A);} else {if ($fecha < "$anio-$mes-28") {$objPHPExcel->getActiveSheet()->setCellValue('AE' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('AE' . $fila, I);}}
	  
	  if ($value[d29] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('AF' . $fila, A);} else {if ($fecha < "$anio-$mes-29") {$objPHPExcel->getActiveSheet()->setCellValue('AF' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('AF' . $fila, I);}}
	  
	if ($value[d30] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('AG' . $fila, A);} else {if ($fecha < "$anio-$mes-30") {$objPHPExcel->getActiveSheet()->setCellValue('AG' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('AG' . $fila, I);}}
	
  if ($value[d31] == 1) {$objPHPExcel->getActiveSheet()->setCellValue('AH' . $fila, A);} else {if ($fecha < "$anio-$mes-31") {$objPHPExcel->getActiveSheet()->setCellValue('AH' . $fila, "");} else { $objPHPExcel->getActiveSheet()->setCellValue('AH' . $fila, I);}}


        $fila++; //Sumamos 1 para pasar a la siguiente fila

    }

    $fila = $fila - 1;

    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A3:AH" . $fila);

    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Asistencia mensual.xlsx"');
    header('Cache-Control: max-age=0');
    ob_end_clean();
    $writer->save('php://output');
