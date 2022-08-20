<?php


class ControladorCitas{

/********************************
	* Borrar usuario *
	* *****************************/

	static public function ctrBorrarUsuario(){


		if (isset($_GET['idUsuario'])) {

			$tabla = "usuarios";
			$datos = $_GET['idUsuario'];

			if ($_GET['fotoUsuario'] != "") {

				unlink($_GET['foto']);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);


			}

			$respuesta = ModeloCitas::mdlBorrarCita($tabla, $datos);

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

								window.location = "citas";


							}


							});



				</script>';

			}	


		}

	} 

}    