<?php

require_once "conexion.php";


class ModeloCategorias{
	
	/******************************
	Crear Categorias
	******************************/

	static public function mdlIngresarCategoria($tabla, $datos){	


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES (:categoria)");

		$stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);


		if($stmt->execute()){


			return "ok";


		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;

	}

	/******************************
	Mostrar Categorias
	******************************/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

		if ($item != null){
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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
	Editar Categorias
	******************************/

	static public function mdlEditarCategoria($tabla, $datos){	


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE IdCat = :IdCat");

		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":IdCat", $datos["IdCat"], PDO::PARAM_STR);


		if($stmt->execute()){


			return "ok";


		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;

	}

	/******************************
	Editar Categorias
	******************************/

	static public function mdlBorrarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IdCat = :IdCat");


		$stmt -> bindParam(":IdCat", $datos, PDO::PARAM_STR);


		if ($stmt -> execute()) {


			return "ok";


		}else{

			return "error";


		}


		$stmt -> close();

		$stmt = null;

		
	}


}