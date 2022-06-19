<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuario.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/citas.controlador.php";

require_once "modelos/usuario.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/citas.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();