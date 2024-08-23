<?php
include '../../config/conexion.php';

$id_producto = $_POST['id_producto'];
$codigo = $_POST['codigo'];
$producto = $_POST['producto'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_min = $_POST['stock_min'];
$stock_max = $_POST['stock_max'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$imagen = $_POST['nombre_imagen'];
$id_categoria = $_POST['id_categoria'];
$id_usuario = $_POST['id_usuario'];

if ($_FILES['imagen']['name'] != null) {
    $nombre_archivo = date("Y-m-d-h-i-s");
    $imagen = $nombre_archivo."_".$_FILES['imagen']['name'];
    $location = "../../../almacen/img_productos/".$imagen;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $location);
}

$sql = "UPDATE tb_producto SET producto = :producto, descripcion = :descripcion, stock = :stock, stock_min = :stock_min, 
stock_max = :stock_max, precio_compra = :precio_compra, precio_venta = :precio_venta, fecha_ingreso = :fecha_ingreso, imagen = :imagen,
fecha_actualizacion = :fecha_actualizacion, id_categoria = :id_categoria, id_usuario = :id_usuario WHERE id_producto = :id_producto";
$query = $pdo->prepare($sql);
$query->bindParam('producto', $producto);
$query->bindParam('descripcion', $descripcion);
$query->bindParam('stock', $stock);
$query->bindParam('stock_min', $stock_min);
$query->bindParam('stock_max', $stock_max);
$query->bindParam('precio_compra', $precio_compra);
$query->bindParam('precio_venta', $precio_venta);
$query->bindParam('fecha_ingreso', $fecha_ingreso);
$query->bindParam('imagen', $imagen);
$query->bindParam('fecha_actualizacion', $fecha_hora);
$query->bindParam('id_categoria', $id_categoria);
$query->bindParam('id_usuario', $id_usuario);
$query->bindParam('id_producto', $id_producto);
    
if ($query->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Producto Actualizado Correctamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/almacen');
} else {
    //echo "Error, las contraseñas no son iguales";

    session_start();
    $_SESSION['mensaje'] = "Error, el Producto no fue actualizado";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/almacen/update.php?id='.$id_producto);
}
?>