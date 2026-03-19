<?php

require_once "conexion.php";

class ModeloCategorias{
    
    static public function mdlIngresarCategoria($tabla, $datos){    
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES (:categoria)");
        $stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }

        $stmt->closeCursor();
        $stmt = null;
        return $respuesta;
    }

    static public function mdlMostrarCategorias($tabla, $item, $valor){
        if ($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            $resultado = $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            $resultado = $stmt -> fetchAll();
        }

        $stmt -> closeCursor();
        $stmt = null;
        return $resultado;
    }

    static public function mdlEditarCategoria($tabla, $datos){  
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE IdCat = :IdCat");
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":IdCat", $datos["IdCat"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }

        $stmt->closeCursor();
        $stmt = null;
        return $respuesta;
    }

    static public function mdlBorrarCategoria($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IdCat = :IdCat");
        $stmt -> bindParam(":IdCat", $datos, PDO::PARAM_INT);

        if($stmt -> execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error"; 
        }

        $stmt -> closeCursor();
        $stmt = null;
        return $respuesta;
    }
}