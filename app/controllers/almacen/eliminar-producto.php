<?php
include '../../config/conexion.php';

$id_producto = $_POST['id_producto'];

$sql = "DELETE FROM tb_producto WHERE id_producto = :id_producto";
$query = $pdo->prepare($sql);
$query->bindParam('id_producto', $id_producto);

if ($query->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Producto Eliminado Correctamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/almacen');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo eliminar el producto";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/almacen/delete.php?id='.$id_producto);
}
?>