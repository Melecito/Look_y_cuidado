<?php

require_once "conexion.php";

class ModeloVentas
{
    /*=============================================
    MOSTRAR VENTAS
    =============================================*/
    public static function mdlMostrarVentas($tabla, $item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idVenta ASC");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idVenta ASC");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        }

        $stmt->closeCursor();
        $stmt = null;

        return $resultado;
    }

    /*=============================================
    REGISTRO DE VENTA
    =============================================*/
    public static function mdlIngresarVenta($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, idCliente, id_vendedor, productos, impuesto, neto, total, metodo_pago) VALUES (:codigo, :idCliente, :id_vendedor, :productos, :impuesto, :neto, :total, :metodo_pago)");

        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);
        $stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
        $stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
        $stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
        $stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
        $stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
        $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $resultado = "ok";
        } else {
            $resultado = "error";
        }

        $stmt->closeCursor();
        $stmt = null;

        return $resultado;
    }

    /*=============================================
    EDITAR VENTA
    =============================================*/
    public static function mdlEditarVenta($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idCliente = :idCliente, id_vendedor = :id_vendedor, productos = :productos, impuesto = :impuesto, neto = :neto, total = :total, metodo_pago = :metodo_pago WHERE codigo = :codigo");

        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);
        $stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
        $stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
        $stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
        $stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
        $stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
        $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $resultado = "ok";
        } else {
            $resultado = "error";
        }

        $stmt->closeCursor();
        $stmt = null;

        return $resultado;
    }

    /*=============================================
    ELIMINAR VENTA
    =============================================*/
    public static function mdlEliminarVenta($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idVenta = :idVenta");
        $stmt->bindParam(":idVenta", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $resultado = "ok";
        } else {
            $resultado = "error";
        }

        $stmt->closeCursor();
        $stmt = null;

        return $resultado;
    }

    /*=============================================
    RANGO FECHAS
    =============================================*/
    public static function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal)
    {
        if ($fechaInicial == null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idVenta ASC");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        } else if ($fechaInicial == $fechaFinal) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha LIKE :fecha");
            $busqueda = "%" . $fechaFinal . "%";
            $stmt->bindParam(":fecha", $busqueda, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        } else {
            // Lógica de fechas
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN :fechaInicial AND :fechaFinal");
            $stmt->bindParam(":fechaInicial", $fechaInicial, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFinal", $fechaFinal, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        }

        if (isset($stmt)) {
            $stmt->closeCursor();
            $stmt = null;
        }

        return $resultado;
    }

    /*=============================================
    SUMAR TOTAL VENTAS
    =============================================*/
    public static function mdlSumaTotalVentas($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT SUM(neto) as total FROM $tabla");
        $stmt->execute();
        $resultado = $stmt->fetch();

        $stmt->closeCursor();
        $stmt = null;

        return $resultado;
    }
}