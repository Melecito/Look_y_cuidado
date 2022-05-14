<?php

require_once "../controladores/usuario.controlador.php";
require_once "../modelos/usuario.modelo.php";

class AjaxUsuarios{

	/***********************
	 * Editar usuario
	 * ********************/
	public $idUsuario;

	public function ajaxEditarUsuario(){

		$item = "id";
		$valor = $this->idUsuario;

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


