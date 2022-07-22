<?php

require_once "conexion.php";

class ModeloProductos{

/******************************
  Mostrar Productos
******************************/

	static public function mdlMostrarProductos($tabla, $item, $valor){


			if ($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();


			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

				$stmt->execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}

		/******************************
		REGISTRAR PRODUCT
		******************************/

	static public function mdlIngresarProducto($tabla, $datos){	


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(IdCat, Codigo, Descripcion, Imagen, Stock, PrecioCompra, PrecioVenta) VALUES (:IdCat, :Codigo, :Descripcion, :Imagen, :Stock, :PrecioCompra, :PrecioVenta)");

		$stmt ->bindParam(":IdCat", $datos["IdCat"], PDO::PARAM_STR);
		$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
		$stmt ->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Imagen", $datos["Imagen"], PDO::PARAM_STR);
		$stmt ->bindParam(":Stock", $datos["Stock"], PDO::PARAM_STR);
		$stmt ->bindParam(":PrecioCompra", $datos["PrecioCompra"], PDO::PARAM_STR);
		$stmt ->bindParam(":PrecioVenta", $datos["PrecioVenta"], PDO::PARAM_STR);


		if ($stmt->execute()) {


			return "ok";


		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;


	}



}
