<?php

require_once "conexion.php";

class ModeloClientes{

	static public function mdlIngresarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nombre, Documento, email, Telefono, Direccion, Fecha_nacimiento) VALUES (:Nombre, :Documento, :email, :Telefono, :Direccion, :Fecha_nacimiento)");

		$stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Documento", $datos["Documento"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":Fecha_nacimiento", $datos["Fecha_nacimiento"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre = :Nombre, Documento = :Documento, email = :email, Telefono = :Telefono, Direccion = :Direccion, Fecha_nacimiento = :Fecha_nacimiento WHERE IdCliente = :IdCliente");

		$stmt->bindParam(":IdCliente", $datos["IdCliente"], PDO::PARAM_INT);
		$stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Documento", $datos["Documento"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":Fecha_nacimiento", $datos["Fecha_nacimiento"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		
		$stmt = null;
	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function mdlEliminarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IdCliente = :IdCliente");

		$stmt -> bindParam(":IdCliente", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/***********************
	 * Actualizar cliente *
	 * *********************/

	 static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){


		$stmt = Conexion::conectar()->prepare("UPDATE  $tabla SET $item1 = :$item1 WHERE IdCliente = :IdCliente");


		$stmt ->bindParam(":".$item1, $valor1, PDO::PARAM_STR);		
		$stmt ->bindParam(":IdCliente", $valor, PDO::PARAM_STR);

		if ($stmt -> execute()) {


			return "ok";

		}else{


			return "error";

		}

		$stmt -> close();

		$stmt = null;

	

	}

	
}