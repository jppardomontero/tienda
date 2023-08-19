<?php
require_once ("conexion.php");
class ModeloExamen{
    public static function mdlGuardarProductos($tabla, $data)
    {
        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (nombre, cantidad, stock, proveedor)
        VALUES(:nombre, :cantidad, :stock, :proveedor)");
        $stm->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stm->bindParam(':cantidad', $data['cantidad'], PDO::PARAM_STR);
        $stm->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $stm->bindParam(':proveedor', $data['proveedor'], PDO::PARAM_STR);
        if($stm->execute())
            return "ok";
        else
            return "error";
    }

    
    public static function mdlCargarProdutos($tabla, $parametro, $id){
        if($parametro == null)
        {
            $stm = conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stm->execute();
            $datos = $stm->fetchAll();
            return $datos;
        }else{
            $stm = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_producto=:id_producto");
            $stm->bindParam(':id_producto', $id, PDO::PARAM_INT);
            $stm->execute();
            $datos = $stm->fetch();
            return $datos;
        }
    }
    public static function mdlActualizarCliente($tabla, $data){
        $stm = conexion::conectar()->prepare("UPDATE $tabla SET cedula=:cedula, nombre=:nombre, apellidos=:apellidos, direccion=:direccion, telefono=:telefono, email=:email WHERE id_cliente=:id_cliente");
        $stm->bindParam(':cedula', $data['cedula'], PDO::PARAM_STR);
        $stm->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stm->bindParam(':apellidos', $data['apellidos'], PDO::PARAM_STR);
        $stm->bindParam(':direccion', $data['direccion'], PDO::PARAM_STR);
        $stm->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $stm->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stm->bindParam(':id_cliente', $data['id_cliente'], PDO::PARAM_INT);
        if($stm->execute())
            return "ok";
        else
            return "error";

    }

        
    public static function mdlEliminarCliente($tabla, $id)  {
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cliente = :id_cliente");
        $stm->bindParam(':id_cliente', $id, PDO::PARAM_INT);
        if($stm->execute())
            return 1;
        else
            return 0;
    }
}
