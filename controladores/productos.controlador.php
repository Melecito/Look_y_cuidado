<?php 

class ControladorProductos{

	static public function ctrMostrarProductos($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

		return $respuesta;


	}  


	static public function ctrCrearProducto(){

		if (isset($_POST["nuevaDescripcion"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) && 
				preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) && 
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

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

				

				$tabla = "productos";

				$datos = array("IdCat" => $_POST["nuevaCategoria"],
							   "Codigo" => $_POST["nuevoCodigo"],
							   "Descripcion" => $_POST["nuevaDescripcion"],
							   "Stock" => $_POST["nuevoStock"],
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


	static public function ctrEditarProducto(){

		if (isset($_POST["editarDescripcion"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarDescripcion"]) && 
				preg_match('/^[0-9]+$/', $_POST["editarStock"]) && 
				preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) && 
				preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])) {

		/******************************
		*Validar imagen
		******************************/
				$ruta = $_POST["imagenActual"];

				if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

		/*************************************
		 * editar directorio para guardar foto
		 * ***************************/


				$directorio = "vistas/img/productos/".$_POST["editarCodigo"];

		/*************************************
		 * Preguntar si existe la imagen
		 * ***************************/

				if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/monello.jpeg") {
					
					unlink($_POST["imagenActual"]);

				}else{


					mkdir($directorio, 0755);

				}


				

		/********************************
		 * de acuerdo a tipo de formato *
		 * *****************************/

					if ($_FILES["editarImagen"]["type"] == "image/jpeg") {

		/********************************
		 * guardar imagen en directorio *
		 * *****************************/



						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);


						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);				


						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);


					}

					if ($_FILES["editarImagen"]["type"] == "image/png") {

		/********************************
		 * guardar imagen en directorio *
		 * *****************************/



						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);


						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						


						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

						




					}

				}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

				

				$tabla = "productos";

				$datos = array("IdCat" => $_POST["editarCategoria"],
							   "Codigo" => $_POST["editarCodigo"],
							   "Descripcion" => $_POST["editarDescripcion"],
							   "Stock" => $_POST["editarStock"],
							   "PrecioCompra" => $_POST["editarPrecioCompra"],
							   "PrecioVenta" => $_POST["editarPrecioVenta"],
							   "Imagen" => $ruta);

				$respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>


					swal({

						type: "success",
						title: "¡El producto ha sido editado correctamente!",
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


	/*=============================================
	ELIMINAR PRODUCTO
	=============================================*/


	static public function ctrEliminarProducto(){

		if (isset($_GET["idProducto"])) {
			
			$tabla = "productos";

			$datos = $_GET["idProducto"];

			if ($_GET["Imagen"] != "" && $_GET["Imagen"] != "vistas/img/productos/monello.jpeg") {
				
				unlink($_GET["Imagen"]);
				rmdir("vistas/img/productos/".$_GET["Codigo"]);

			}

			$respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

			if ($respuesta == "ok") {

					echo '<script>


					swal({

						type: "success",
						title: "¡El producto ha sido borrado correctamente!",
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