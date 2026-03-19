<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";


class TablaProductosVentas{

	/*================================
	Activar tabla de productos
	=================================*/

	public function mostrarTablaProductosVentas(){ 

		$item = null;
		$valor = null;
		$orden = "IdProduc";

		$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

		
		$datosJson = '{
				"data": [';

				for ($i=0; $i < count($productos); $i++) { 

					

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

					$botones = "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$productos[$i]["IdProduc"]."'>Agregar</button>";
					

					$datosJson.='[
						"'.($i+1).'",
						"'.$imagen.'",
						"'.$productos[$i]["Codigo"].'",
						"'.$productos[$i]["Descripcion"].'",
						"'.$stock.'",
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

$activarProductosVentas = new TablaProductosVentas();
$activarProductosVentas -> mostrarTablaProductosVentas();
