<?php

class ControladorVentas{

	static public function ctrMostrarVentas($item, $valor){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

		return $respuesta;


	}


	static public function ctrCrearVenta(){

		if (isset($_POST["nuevaVenta"])) {
			
			/*-========================================================
                  ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCUIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
                  =======================================================-*/

                  $listaProductos = json_decode($_POST["listaProductos"], true);
                  var_dump($listaProductos);
		}
	}
}

