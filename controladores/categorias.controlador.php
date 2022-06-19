<?php

class ControladorCategorias{

	public function ctrCrearCategoria(){

		if (isset($_POST¨["nuevaCategoria"])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

				


			} else {

				echo '<script>


					swal({

						type: "error",
						title: "¡La categoria no puede ir vacía o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

						}).then((result)=>{

							if(result.value){


								window.location = "categorias";


							}


							})



				</script>';
			}

		}
	}

}