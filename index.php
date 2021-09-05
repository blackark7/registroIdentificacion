<?php

//CONTROLADORES

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/cargos.controlador.php";
require_once "controladores/departamentos.controlador.php";
require_once "controladores/areas.controlador.php";
require_once "controladores/personal.controlador.php";
require_once "controladores/asistencia.controlador.php";

//MODELOS

require_once "modelos/usuarios.modelo.php";
require_once "modelos/cargos.modelo.php";
require_once "modelos/departamentos.modelo.php";
require_once "modelos/areas.modelo.php";
require_once "modelos/personal.modelo.php";
require_once "modelos/asistencia.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
