<?php
$sql_ventas = "SELECT * FROM tb_venta v INNER JOIN tb_cliente c ON v.id_cliente = c.id_cliente";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$tabla_ventas = $query_ventas->fetchAll(PDO::FETCH_ASSOC);
?>