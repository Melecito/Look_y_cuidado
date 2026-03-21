<?php

require_once "conexion.php";

class ModeloProductos
{
    /*=============================================
    MOSTRAR PRODUCTOS
    =============================================*/
    static public function mdlMostrarProductos($tabla, $item, $valor, $orden)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY IdProduc DESC");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        }

        $stmt->closeCursor();
        $stmt = null;

        return $resultado;
    }

    /*=============================================
    REGISTRO DE PRODUCTO
    =============================================*/
    static public function mdlIngresarProducto($tabla, $datos)
    {
        // 1. Definimos la consulta (8 tokens: IdCat, Codigo, Descripcion, Imagen, Stock, PrecioCompra, PrecioVenta, Ventas)
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(IdCat, Codigo, Descripcion, Imagen, Stock, PrecioCompra, PrecioVenta, Ventas) VALUES (:IdCat, :Codigo, :Descripcion, :Imagen, :Stock, :PrecioCompra, :PrecioVenta, :Ventas)");

        // 2. Vinculamos cada token (Asegúrate de que los nombres coincidan exactamente)
        $stmt->bindParam(":IdCat", $datos["IdCat"], PDO::PARAM_INT);
        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":Imagen", $datos["Imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":Stock", $datos["Stock"], PDO::PARAM_STR);
        $stmt->bindParam(":PrecioCompra", $datos["PrecioCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":PrecioVenta", $datos["PrecioVenta"], PDO::PARAM_STR);
        
        // 3. Para las Ventas, como es un producto nuevo, forzamos el 0
        $ventasIniciales = 0;
        $stmt->bindParam(":Ventas", $ventasIniciales, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->closeCursor();
        $stmt = null;
    }

    /*=============================================
    EDITAR PRODUCTO
    =============================================*/
    static public function mdlEditarProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET IdCat = :IdCat, Descripcion = :Descripcion, Imagen = :Imagen, Stock = :Stock, PrecioCompra = :PrecioCompra, PrecioVenta = :PrecioVenta WHERE Codigo = :Codigo");

        $stmt->bindParam(":IdCat", $datos["IdCat"], PDO::PARAM_INT);
        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":Imagen", $datos["Imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":Stock", $datos["Stock"], PDO::PARAM_STR);
        $stmt->bindParam(":PrecioCompra", $datos["PrecioCompra"], PDO::PARAM_STR);
        $stmt->bindParam(":PrecioVenta", $datos["PrecioVenta"], PDO::PARAM_STR);

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
    ELIMINAR PRODUCTO
    =============================================*/
    static public function mdlEliminarProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IdProduc = :IdProduc");
        $stmt->bindParam(":IdProduc", $datos, PDO::PARAM_INT);

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
    ACTUALIZAR PRODUCTO
    =============================================*/
    static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE IdProduc = :IdProduc");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":IdProduc", $valor, PDO::PARAM_STR);

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
    MOSTRAR SUMA VENTAS
    =============================================*/
    static public function mdlMostrarSumaVentas($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");
        $stmt->execute();
        $resultado = $stmt->fetch();

        $stmt->closeCursor();
        $stmt = null;

        return $resultado;
    }
}