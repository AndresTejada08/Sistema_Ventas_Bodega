<?php
$sql_ventas = "SELECT * FROM tb_vente";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$tabla_ventas = $query_ventas->fetchAll(PDO::FETCH_ASSOC);
?>