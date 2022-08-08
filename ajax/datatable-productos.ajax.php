<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaProductos{

	/*================================
	Activar tabla de productos
	=================================*/

	public function mostrarTablaProductos(){

		$item = null;
		$valor = null;

		$productos = ControladorProductos::ctrMostrarProductos($item, $valor);

		
		$datosJson = '{
				"data": [';

				for ($i=0; $i < count($productos); $i++) { 

					/*=============================================
		 	 		TRAEMOS LA CATEGORÍA
		  			=============================================*/ 

					$item = "id";
					$valor = $productos[$i]["IdCat"];

					$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

					/*=============================================
		 	 		STOCK
		  			=============================================*/ 

		  			if($productos[$i]["Stock"] <= 10){

		  				$stock = "<button class='btn btn-danger'>".$productos[$i]["Stock"]."</button>";

		  			}else if($productos[$i]["Stock"] > 11 && $productos[$i]["Stock"] <= 15){

		  				$stock = "<button class='btn btn-warning'>".$productos[$i]["Stock"]."</button>";

		  			}else{

		  				$stock = "<button class='btn btn-success'>".$productos[$i]["Stock"]."</button>";

		  			}

		  			/*=============================================
		 	 		TRAEMOS LA IMAGEN
		  			=============================================*/ 

					$imagen = "<img src='".$productos[$i]["Imagen"]."' width='40px'>";

					/*=============================================
		 	 		TRAEMOS LAS ACCIONES
		  			=============================================*/ 

					$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["Codigo"]."' imagen='".$productos[$i]["Imagen"]."'><i class='fa fa-times'></i></button></div>";
					

					$datosJson.='[
						"'.($i+1).'",
						"'.$imagen.'",
						"'.$productos[$i]["Codigo"].'",
						"'.$productos[$i]["Descripcion"].'",
						"'.$categorias["categoria"].'",
						"'.$stock.'",
						"$ '.$productos[$i]["PrecioCompra"].'",
						"$ '.$productos[$i]["PrecioVenta"].'",
						"'.$productos[$i]["Fecha"].'",
						"'.$botones.'"
						],';


				}

				$datosJson = substr($datosJson, 0, -1);

			$datosJson.= ']
		}';

		echo $datosJson;			

	}

}

/*================================
Activar tabla de productos
=================================*/

$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();

