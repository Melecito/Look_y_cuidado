<?php

require_once "../controladores/usuario.controlador.php";
require_once "../modelos/usuario.modelo.php";

class AjaxUsuarios{

	/***********************
	 * Editar usuario
	 * ********************/
	public $idUsuario;

	static public function ajaxEditarUsuario(){

		$item = "id";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}


	/***********************
	 * Activar usuario
	 * * ********************/
	public $activarId;
	public $activarUsuario;


	static public function ajaxActivarUsuario(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id";
		$valor2 = $this->activarId;


		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);



	}


	/*****************************
	 * No repetir usuario         *
	 *****************************/

	public $validarUsuario;

	static public function ajaxValidarUsuario(){


		$item = "usuario";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}


}

/***********************
 * Editar usuario
 * * ********************/
if (isset($_POST['idUsuario'])) {

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST['idUsuario'];
	$editar -> ajaxEditarUsuario();

}

/***********************
 * Activar usuario
 * * ********************/


if (isset($_POST["activarUsuario"])) {

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST['activarUsuario'];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*****************************
 * No repetir usuario         *
 *****************************/

if (isset($_POST["validarUsuario"])) {
	
	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();
}





