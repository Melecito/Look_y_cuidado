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
	public $traerProductos;
	public $nombreProducto;

 	public function ajaxEditarProducto(){

 		if ($this->traerProductos == "ok") {

 			$item = null;
			$valor = null;

			$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

			echo json_encode($respuesta);


 		}else if($this->nombreProducto != ""){

		$item = "Descripcion";
		$valor = $this->nombreProducto;

		$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

		echo json_encode($respuesta);

		}else{


		$item = "IdProduc";
		$valor = $this->idProducto;

		$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

		echo json_encode($respuesta);


		}

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
 	*Editar producto
 	=====================*/
if (isset($_POST["idProducto"])) {

	$editarProducto = new AjaxProductos();
	$editarProducto -> idProducto = $_POST["idProducto"];
	$editarProducto -> ajaxEditarProducto();

}

/*====================
 	Traer producto
 	=====================*/
if (isset($_POST["traerProductos"])) {

	$traerProductos = new AjaxProductos();
	$traerProductos -> traerProductos = $_POST["traerProductos"];
	$traerProductos -> ajaxEditarProducto();

}

/*====================
 	Traer producto
 	=====================*/
if (isset($_POST["nombreProducto"])) {

	$nombreProducto = new AjaxProductos();
	$nombreProducto -> nombreProducto = $_POST["nombreProducto"];
	$nombreProducto -> ajaxEditarProducto();

}
