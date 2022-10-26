<?php

class ControladorClientes{

	static public function ctrCrearCliente(){

		if (isset($_POST["nuevoCliente"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) && 
					preg_match('/^[0-9]+$/', $_POST["nuevoDocumentoID"]) && 
					preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',	$_POST["nuevoEmail"]) && 
					preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
				    preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])) {

				$tabla = "clientes";

			   	$datos = array("Nombre"=>$_POST["nuevoCliente"],
					           "Documento"=>$_POST["nuevoDocumentoID"],
					           "email"=>$_POST["nuevoEmail"],
					           "Telefono"=>$_POST["nuevoTelefono"],
					           "Direccion"=>$_POST["nuevaDireccion"],
					           "Fecha_nacimiento"=>$_POST["nuevaFechaNacimiento"]);

			   	$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';


			}
		}
	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function ctrEditarCliente(){

		if(isset($_POST["editarCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) && 
					preg_match('/^[0-9]+$/', $_POST["editarDocumentoID"]) && 
					preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',	$_POST["editarEmail"]) && 
					preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
				    preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])){

			   	$tabla = "clientes";

			   	$datos = array("IdCliente"=>$_POST["idCliente"],
			   				   "Nombre"=>$_POST["editarCliente"],
					           "Documento"=>$_POST["editarDocumentoID"],
					           "email"=>$_POST["editarEmail"],
					           "Telefono"=>$_POST["editarTelefono"],
					           "Direccion"=>$_POST["editarDireccion"],
					           "Fecha_nacimiento"=>$_POST["editarFechaNacimiento"]);

			   	$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="clientes";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El cliente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';

			}		

		}

	}


	static public function ctrDescargarReporte(){

		if(isset($_GET["reporte"])){

			// $tabla = "clientes";

			$item = null;
            $valor = null;

            $clientes = ControladorClientes::ctrMostrarClientes( $item, $valor);
			}


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'> 

					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>idCliente</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>nombre</td>
					<td style='font-weight:bold; border:1px solid #eee;'>documento</td>
					<td style='font-weight:bold; border:1px solid #eee;'>email</td>
					<td style='font-weight:bold; border:1px solid #eee;'>telefono</td>
					<td style='font-weight:bold; border:1px solid #eee;'>direccion</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Fecha_nacimiento</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>compras</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>ultima</td	
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>		
					</tr>");

			 $item = null;
                $valor = null;

                $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

                foreach ($clientes as $key => $value) {
                  
                     echo utf8_decode( "<tr>

                  <td style='border:1px solid #eee;'>".($key+1)."</td>
                  <td style='border:1px solid #eee;'>".$value["Nombre"]."</td>
                  <td style='border:1px solid #eee;'>".$value["Documento"]."</td>
                  <td style='border:1px solid #eee;'>".$value["email"]."</td>
                  <td style='border:1px solid #eee;'>".$value["Telefono"]."</td>
                  <td style='border:1px solid #eee;'>".$value["Direccion"]."</td>
                  <td style='border:1px solid #eee;'>".$value["Fecha_nacimiento"]."</td>
                  <td style='border:1px solid #eee;'>".$value["Compras"]."</td>
                  <td style='border:1px solid #eee;'>".$value["Ultima_compra"]."</td>
                  <td style='border:1px solid #eee;'>".$value["Fecha"]."</td>                  

                
                  
                </tr>");
			}



			echo "</table>";
		}
	}

	


			

