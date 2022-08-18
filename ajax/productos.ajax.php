<?php 

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{	
     /*========================================
	  GENERAR CODIGO A PARTIR DE ID CATEGORIA
	=========================================*/
	public $idCategoria;

	public function ajaxCrearCodigoProducto(){

		$item = "IdCat";
		$valor = $this->idCategoria;

		$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);


		
		echo json_encode($respuesta);


	}

	/*=======================
	 * Editar Producto
	 ======================*/
	public $idProducto;

 	public function ajaxEditarProducto(){

		$item = "IdProduc";
		$valor = $this->idProducto;

		$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

		echo json_encode($respuesta);

	 }

}

/*========================================
	  GENERAR CODIGO A PARTIR DE ID CATEGORIA
	=========================================*/

if (isset($_POST["idCategoria"])) {
	
	$codigoProducto = new AjaxProductos();
	$codigoProducto -> idCategoria = $_POST["idCategoria"];
	$codigoProducto -> ajaxCrearCodigoProducto();
}

	/*====================
 	*Editar usuario
 	=====================*/
if (isset($_POST["idProducto"])) {

	$editarProducto = new AjaxProductos();
	$editarProducto -> idProducto = $_POST["idProducto"];
	$editarProducto -> ajaxEditarProducto();

}
