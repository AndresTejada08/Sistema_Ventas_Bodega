<?php
$id_venta = $_GET['id'];

$sql_ventas = "SELECT * FROM tb_venta v INNER JOIN tb_cliente c ON v.id_cliente = c.id_cliente WHERE id_venta = '$id_venta'";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$tabla_ventas = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

foreach ($tabla_ventas as $tabla_venta) {
    $id_cliente = $tabla_venta['id_cliente'];
    $nro_venta = $tabla_venta['nro_venta'];
}
?>