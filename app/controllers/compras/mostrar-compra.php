<?php
global $pdo;

$id_compra = $_GET['id'];

$sql_compras = "SELECT CP.*, CP.precio_compra AS compra_precio_compra, PD.*, PD.precio_compra AS producto_precio_compra, PV.*, US.nombres, CT.* FROM tb_compra CP 
                INNER JOIN tb_producto PD ON CP.id_producto = PD.id_producto
                INNER JOIN tb_proveedor PV ON CP.id_proveedor = PV.id_proveedor 
                INNER JOIN tb_usuario US ON CP.id_usuario = US.id_usuario
                INNER JOIN tb_categoria CT ON PD.id_categoria = CT.id_categoria
                WHERE CP.id_compra = '$id_compra'";
$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$tabla_compras = $query_compras->fetchAll(PDO::FETCH_ASSOC);

$nro_compra = "hola";
foreach ($tabla_compras as $tabla_compra) {
    $nro_compra = $tabla_compra['nro_compra'];
    $codigo = $tabla_compra['codigo'];
    $categoria = $tabla_compra['categoria'];
    $producto = $tabla_compra['producto'];
    $stock = $tabla_compra['stock'];
    $stock_min = $tabla_compra['stock_min'];
    $stock_max = $tabla_compra['stock_max'];
    $fecha_ingreso = $tabla_compra['fecha_ingreso'];
    $usuario = $tabla_compra['nombres'];
    $producto_precio_compra = $tabla_compra['producto_precio_compra'];
    $precio_venta = $tabla_compra['precio_venta'];
    $descripcion = $tabla_compra['descripcion'];
    $imagen = $tabla_compra['imagen'];
    $nombre_proveedor = $tabla_compra['proveedor'];
    $celular = $tabla_compra['celular'];
    $empresa = $tabla_compra['empresa'];
    $telefono = $tabla_compra['telefono'];
    $correo = $tabla_compra['correo'];
    $direccion = $tabla_compra['direccion'];
    $fecha_compra = $tabla_compra['fecha_compra'];
    $comprobante = $tabla_compra['comprobante'];
    $compra_precio_compra = $tabla_compra['compra_precio_compra'];
    $cantidad = $tabla_compra['cantidad'];
    
    $id_producto2 = $tabla_compra['id_producto'];
    $id_proveedor2 = $tabla_compra['id_proveedor'];
}
?>