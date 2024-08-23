<?php
$id_producto = $_GET['id'];

$sql_productos = "SELECT PR.*, CA.categoria, US.correo, US.id_usuario FROM tb_producto PR 
                    INNER JOIN tb_categoria CA ON PR.id_categoria = CA.id_categoria 
                    INNER JOIN tb_usuario US ON PR.id_usuario = US.id_usuario
                    WHERE PR.id_producto = '$id_producto'";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$datos_productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos_productos as $dato_producto) {
    $codigo = $dato_producto['codigo'];
    $producto = $dato_producto['producto'];
    $descripcion = $dato_producto['descripcion'];
    $stock = $dato_producto['stock'];
    $stock_min = $dato_producto['stock_min'];
    $stock_max = $dato_producto['stock_max'];
    $precio_compra = $dato_producto['precio_compra'];
    $precio_venta = $dato_producto['precio_venta'];
    $fecha_ingreso = $dato_producto['fecha_ingreso'];
    $imagen = $dato_producto['imagen'];
    $categoria = $dato_producto['categoria'];
    $correo = $dato_producto['correo'];
    $id_usuario = $dato_producto['id_usuario'];
}
?>