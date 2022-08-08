<?php 

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

	/***********************
	 * Editar categoria
	 **********************/

	public $idCategoria;

	public function ajaxEditarCategoria(){

		$item = "id";
		$valor = $this->idCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		echo json_encode($respuesta);

	}
}

	/***********************
	 * Editar categoria
	 * * ********************/
if (isset($_POST["idCategoria"])) {

	$categorias = new AjaxCategorias();
	$categorias -> idCategoria = $_POST["idCategoria"];
	$categorias -> ajaxEditarCategoria();

}
