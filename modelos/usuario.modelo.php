<?php

require_once "conexion.php";

class ModeloUsuarios
{
    /*=============================================
    MOSTRAR USUARIOS
    =============================================*/
    static public function mdlMostrarUsuarios($tabla, $item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        }

        $stmt->closeCursor();
        $stmt = null;

        return $resultado;
    }

    /*=============================================
    REGISTRO DE USUARIO
    =============================================*/
    static public function mdlIngresarUsuario($tabla, $datos)
    {
        // Se incluyen explícitamente 'estado' y 'ultimo_login' para evitar errores de modo estricto
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto, estado, ultimo_login) VALUES (:nombre, :usuario, :password, :perfil, :foto, :estado, :ultimo_login)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        
        // Definimos estado activo por defecto
        $estado = 1;
        $stmt->bindParam(":estado", $estado, PDO::PARAM_INT);

        // Enviamos NULL para evitar el error 'Incorrect datetime value' (0000-00-00)
        // RECUERDA: La columna 'ultimo_login' en phpMyAdmin debe permitir NULL
        $fechaInicial = null;
        $stmt->bindParam(":ultimo_login", $fechaInicial, PDO::PARAM_NULL);

        if ($stmt->execute()) {
            $respuesta = "ok";
        } else {
            $respuesta = "error";
        }

        $stmt->closeCursor();
        $stmt = null;

        return $respuesta;
    }

    /*=============================================
    EDITAR USUARIO
    =============================================*/
    static public function mdlEditarUsuario($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $respuesta = "ok";
        } else {
            $respuesta = "error";
        }

        $stmt->closeCursor();
        $stmt = null;

        return $respuesta;
    }

    /*=============================================
    ACTUALIZAR USUARIO (Estado y Último Login)
    =============================================*/
    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        // Usamos bindValue para permitir que PDO maneje dinámicamente si es String o Int
        $stmt->bindValue(":".$item1, $valor1);
        $stmt->bindValue(":".$item2, $valor2);

        if ($stmt->execute()) {
            $respuesta = "ok";
        } else {
            $respuesta = "error";
        }

        $stmt->closeCursor();
        $stmt = null;

        return $respuesta;
    }

    /*=============================================
    BORRAR USUARIO
    =============================================*/
    static public function mdlBorrarUsuario($tabla, $id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $respuesta = "ok";
        } else {
            $respuesta = "error";
        }

        $stmt->closeCursor();
        $stmt = null;

        return $respuesta;
    }
}