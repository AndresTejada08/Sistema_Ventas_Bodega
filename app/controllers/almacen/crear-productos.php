<?php
include '../../config/conexion.php';

$codigo = $_POST['codigo'];
$producto = $_POST['producto'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_min = $_POST['stock_min'];
$stock_max = $_POST['stock_max'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];
//$imagen = $_POST['imagen'];
$id_categoria = $_POST['id_categoria'];
$id_usuario = $_POST['id_usuario'];

$nombre_archivo = date("Y-m-d-h-i-s");
$file = $nombre_archivo."_".$_FILES['imagen']['name'];
$location = "../../../almacen/img_productos/".$file;
move_uploaded_file($_FILES['imagen']['tmp_name'], $location);

$sql = "INSERT INTO tb_producto (codigo, producto, descripcion, stock, stock_min, stock_max, precio_compra, precio_venta, fecha_ingreso, imagen, fecha_creacion, id_categoria, id_usuario)
VALUES (:codigo, :producto, :descripcion, :stock, :stock_min, :stock_max, :precio_compra, :precio_venta, :fecha_ingreso, :imagen, :fecha_creacion, :id_categoria, :id_usuario);";
$query = $pdo->prepare($sql);
$query->bindParam('codigo', $codigo);
$query->bindParam('producto', $producto);
$query->bindParam('descripcion', $descripcion);
$query->bindParam('stock', $stock);
$query->bindParam('stock_min', $stock_min);
$query->bindParam('stock_max', $stock_max);
$query->bindParam('precio_compra', $precio_compra);
$query->bindParam('precio_venta', $precio_venta);
$query->bindParam('fecha_ingreso', $fecha_ingreso);
$query->bindParam('imagen', $file);
$query->bindParam('fecha_creacion', $fecha_hora);
$query->bindParam('id_categoria', $id_categoria);
$query->bindParam('id_usuario', $id_usuario);

if ($query->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Producto Registrado Correctamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/almacen');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar el Producto";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/almacen/create.php');
}
?>