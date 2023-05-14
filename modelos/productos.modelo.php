<?php 

require_once "conexion.php";

class ModeloProductos{

	static public function mdlMostrarProductos($tabla, $item, $valor, $orden){

		if ($item != null) {
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY IdProduc DESC");
			$stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();

		}else{


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

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


	/******************************
		EDITAR PRODUCT
		******************************/

	static public function mdlEditarProducto($tabla, $datos){	


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET IdCat = :IdCat, Descripcion = :Descripcion, Imagen = :Imagen, Stock = :Stock, PrecioCompra = :PrecioCompra, PrecioVenta = :PrecioVenta WHERE Codigo = :Codigo");

		$stmt ->bindParam(":IdCat", $datos["IdCat"], PDO::PARAM_INT);
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


	/*=============================================
	ELIMINAR PRDUCTO
	=============================================*/

	static public function mdlEliminarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IdProduc = :IdProduc");

		$stmt -> bindParam(":IdProduc", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/***********************
	 * Actualizar producto *
	 * *********************/

	 static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor){


		$stmt = Conexion::conectar()->prepare("UPDATE  $tabla SET $item1 = :$item1 WHERE IdProduc = :IdProduc");


		$stmt ->bindParam(":".$item1, $valor1, PDO::PARAM_STR);		
		$stmt ->bindParam(":IdProduc", $valor, PDO::PARAM_STR);

		if ($stmt -> execute()) {


			return "ok";

		}else{


			return "error";

		}

		$stmt -> close();

		$stmt = null;

	

	}

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/	

	static public function mdlMostrarSumaVentas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}



}