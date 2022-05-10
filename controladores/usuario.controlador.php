<?php

class ControladorUsuarios{


	static public function ctrIngresoUsuario(){

		if (isset($_POST["ingUsuario"])) {

			if (preg_match('/^[-a-zA-Z0-9]+$/', $_POST["ingUsuario"]) && 
				preg_match('/^[-a-zA-Z0-9]+$/',$_POST["ingPassword"])){


					$tabla ='usuarios';

					$item  = 'usuario';
					$valor = $_POST["ingUsuario"];

					$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

					if ($respuesta ["usuario"] == $_POST["ingUsuario"] && $respuesta ["password"] == $_POST["ingPassword"]){

						$_SESSION ['iniciarSesion'] = "ok";

						echo '<script>

							window.location = "inicio";

						</script>';
						
					}else{

						echo '<div class= "alert alert-danger">Error al ingresar, vuelva a intentarlo</div>';

					}

			}
		}
	}


	static public function ctrCrearUsuario(){

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

					mkdir($directorio, 0755);

					/********************************
					 * de acuerdo a tipo de formato *
					 * *****************************/

					if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

					/********************************
					 * guardar imagen en directorio *
					 * *****************************/



						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".jpeg";

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

				$datos = array("nombre" => $_POST["nuevonombre"],
								"usuario" => $_POST["nuevousuario"],
								"password" => $_POST["nuevopassword"],
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

}
