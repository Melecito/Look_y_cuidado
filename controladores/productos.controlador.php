<?php


class ControladorProductos{


	/******************************
	Mostrar Product
	******************************/

	static public function ctrMostrarProductos($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

		return $respuesta;


	}

	

	static public function ctrCrearProducto(){

		if (isset($_POST["nuevaDescripcion"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) && 
				preg_match('/^[0-9]+$/', $_POST["nuevStock"]) && 
				preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) && 
				preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])) {

				

				/******************************
				*Validar imagen
				******************************/
				$ruta = "vistas/img/productos/monello.jpeg";

				if (isset($_FILES["nuevaImagen"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*************************************
					 * Crear directorio para guardar foto
					 * ***************************/


					$directorio = "vistas/img/productos/".$_POST["nuevoCodigo"];

					mkdir($directorio, 0755);

					/********************************
					 * de acuerdo a tipo de formato *
					 * *****************************/

					if ($_FILES["nuevaImagen"]["type"] == "image/jpeg") {

					/********************************
					 * guardar imagen en directorio *
					 * *****************************/



						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);


						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						


						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

						




					}

					if ($_FILES["nuevaImagen"]["type"] == "image/png") {

					/********************************
					 * guardar imagen en directorio *
					 * *****************************/



						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);


						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						


						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

						




					}

				}

				/********************************
				 * CREAR PRODUCTO *
				 * *****************************/

				

				$tabla = "productos";

				$datos = array("IdCat" => $_POST["nuevaCategoria"],
							   "Codigo" => $_POST["nuevoCodigo"],
							   "Descripcion" => $_POST["nuevaDescripcion"],
							   "Stock" => $_POST["nuevStock"],
							   "PrecioCompra" => $_POST["nuevoPrecioCompra"],
							   "PrecioVenta" => $_POST["nuevoPrecioVenta"],
							   "Imagen" => $ruta);

				$respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>


					swal({

						type: "success",
						title: "¡El producto ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

						}).then((result)=>{

							if(result.value){


								window.location = "productos";


							}


							});



				</script>';

				}


				
			}else{

				echo '<script>


					swal({

						type: "error",
						title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

						}).then((result)=>{

							if(result.value){


								window.location = "productos";


							}


							});


				</script>';
			}
		}


	}

}

