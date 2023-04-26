<?php

require_once "conexion.php";

class ModeloVentas{

	static public function mdlMostrarVentas($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idVenta ASC");

			$stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idVenta ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		

		$stmt -> close();

		$stmt = null;
	}

	/***********************
	 * registro de venta *
	 * *********************/
	static public function mdlIngresarVenta($tabla, $datos){
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, idCliente, id_vendedor, productos, impuesto, neto, total, metodo_pago) VALUES (:codigo, :idCliente, :id_vendedor, :productos, :impuesto, :neto, :total, :metodo_pago)");

		$stmt ->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt ->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);
		$stmt ->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
		$stmt ->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt ->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$stmt ->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
		$stmt ->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt ->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);


		if ($stmt->execute()) {


			return "ok";


		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;

	}

	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function mdlEditarVenta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  idCliente = :idCliente, id_vendedor = :id_vendedor, productos = :productos, impuesto = :impuesto, neto = :neto, total= :total, metodo_pago = :metodo_pago WHERE codigo = :codigo");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR VENTA
	=============================================*/

	static public function mdlEliminarVenta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idVenta = :idVenta");

		$stmt -> bindParam(":idVenta", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	
}