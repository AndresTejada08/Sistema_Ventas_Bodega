<?php
include '../../config/conexion.php';

$id_producto = $_GET['id_producto'];
$stock_calculado = $_GET['stock_calculado'];


$sql = "UPDATE tb_producto SET stock = :stock WHERE id_producto = :id_producto";
$query = $pdo->prepare($sql);
$query->bindParam('id_producto', $id_producto);
$query->bindParam('stock', $stock_calculado);

if ($query->execute()) {
    echo('Stock actualizado correctamente');
} else {
    echo('Error al actualizar el Stock');
}
?>