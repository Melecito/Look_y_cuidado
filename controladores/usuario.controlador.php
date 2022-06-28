<?php

class ControladorUsuarios{

	static public function ctrIngresoUsuario(){

		if (isset($_POST["ingUsuario"])) {

			if (preg_match('/^[-a-zA-Z0-9]+$/', $_POST["ingUsuario"]) && 
				preg_match('/^[-a-zA-Z0-9]+$/',$_POST["ingPassword"])){

					$encriptar = crypt($_POST["ingPassword"], '$2a$07$usesomesillystringforsalt$');


					$tabla = "usuarios";

					$item  = "usuario";
					$valor = $_POST["ingUsuario"];

					$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);


					if ($respuesta ["usuario"] == $_POST["ingUsuario"] && $respuesta ["password"] == $encriptar){

						if ($respuesta["estado"] == 1) {
							
						$_SESSION ['iniciarSesion'] = "ok";
						$_SESSION ['id'] = $respuesta ["id"];
						$_SESSION ['nombre'] = $respuesta ["nombre"];
						$_SESSION ['usuario'] = $respuesta ["usuario"];
						$_SESSION ['foto'] = $respuesta ["foto"];
						$_SESSION ['perfil'] = $respuesta ["perfil"];

						/******************************
						*Registrar ultimo login
						******************************/


						date_default_timezone_set('America/Bogota');
						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;


						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];


						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);


						if ($ultimoLogin == "ok") {


							echo '<script>

							window.location = "inicio";

						</script>';


						}



						

					}else{

						echo '<div class= "alert alert-danger">El usuario no esta activado</div>';

					}
						
					}else{

						echo '<div class= "alert alert-danger">Error al ingresar, vuelva a intentarlo</div>';

					}

			}
		}
	}


	public function ctrCrearUsuario(){

		if(isset($_POST["nuevousuario"])){


			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevonombre"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevousuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevopassword"])){


				/******************************
				*Validar imagen
				******************************/
				$ruta = "";

				if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*************************************
					 * Crear directorio para guardar foto
					 * ***************************/


					$directorio = "vistas/img/usuarios/".$_POST["nuevousuario"];

					mkdir($directorio, 0777);

					/********************************
					 * de acuerdo a tipo de formato *
					 * *****************************/

					if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

					/********************************
					 * guardar imagen en directorio *
					 * *****************************/



						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);


						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						


						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

						




					}

					if ($_FILES["nuevaFoto"]["type"] == "image/png") {

					/********************************
					 * guardar imagen en directorio *
					 * *****************************/



						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);


						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						


						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

						




					}

				}



				$tabla = "usuarios";


				$encriptar = crypt($_POST["nuevopassword"], '$2a$07$usesomesillystringforsalt$');

				$datos = array("nombre" => $_POST["nuevonombre"],
								"usuario" => $_POST["nuevousuario"],
								"password" => $encriptar,
								"perfil" => $_POST["nuevoPerfil"],
								"foto" => $ruta);



				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>


					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

						}).then((result)=>{

							if(result.value){


								window.location = "usuario";


							}


							});



				</script>';
				}




				
			}else{

				echo '<script>




					swal({

						type: "error",
						title: "¡El usuario no puede ir vacio o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

						}).then((result)=>{

							if(result.value){


								window.location = "usuario";


							}


							});



				</script>';
				


			
			}

		}
	}

	/**************************
	 * metodo mostrar usuario *
	 * ************************/


	static public function ctrMostrarUsuarios($item, $valor){

		$tabla ="usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;

	}

	/**************************
	 * metodo editar usuario *
	 * ************************/

	public function ctrEditarUsuario(){

		if (isset($_POST["editarUsuario"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/******************************
				*Validar imagen
				******************************/
				$ruta = $_POST["fotoActual"];


				if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*************************************
					 * Crear directorio para guardar foto
					 * ***************************/


					$directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];

					/*************************************
					 * Primero preguntamos si hay foto   *
					 * **********************************/

					if (!empty($_POST["fotoActual"])) {


						unlink($_POST["fotoActual"]);

					}else{


						mkdir($directorio, 0777);

					}

					

					/********************************
					 * de acuerdo a tipo de formato *
					 * *****************************/

					if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

					/********************************
					 * guardar imagen en directorio *
					 * *****************************/



						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpeg";

						$origen = imagecreatefromjpg($_FILES["editarFoto"]["tmp_name"]);


						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						


						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

						




					}

					if ($_FILES["editarFoto"]["type"] == "image/png") {

					/********************************
					 * guardar imagen en directorio *
					 * *****************************/



						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);


						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						


						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);


					}

				}

				$tabla = "usuarios";


				if ($_POST["editarPassword"] != "") {


					if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$usesomesillystringforsalt$');

					}else{

						echo '<script>




					swal({

						type: "error",
						title: "¡La contraseña no puede ir vacia o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

						}).then((result)=>{

							if(result.value){


								window.location = "usuario";


							}


							});



			 	</script>';

					}

				}else{

					$encriptar = $passwordActual;

				}


				$datos = array("nombre" => $_POST["editarNombre"],
								"usuario" => $_POST["editarUsuario"],
								"password" => $encriptar,
								"perfil" => $_POST["editarPerfil"],
								"foto" => $ruta);

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>


					swal({

						type: "success",
						title: "¡El usuario ha sido editado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

						}).then((result)=>{

							if(result.value){


								window.location = "usuario";


							}


							});



				</script>';

				}

			}else{

				echo '<script>




					swal({

						type: "error",
						title: "¡El nombre no puede ir vacio o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

						}).then((result)=>{

							if(result.value){


								window.location = "usuario";


							}


							});



				</script>';

			}



		}
	}

	/********************************
	* Borrar usuario *
	* *****************************/

	public function ctrBorrarUsuario(){


		if (isset($_GET['idUsuario'])) {

			$tabla = "usuarios";
			$datos = $_GET['idUsuario'];

			if ($_GET['fotoUsuario'] != "") {

				unlink($_GET['foto']);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);


			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if ($respuesta == "ok") {

					echo '<script>


					swal({

						type: "success",
						title: "¡El usuario ha sido borrado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{
							if(result.value){

								window.location = "usuario";


							}


							});



				</script>';

			}	


		}

	} 


	

}



