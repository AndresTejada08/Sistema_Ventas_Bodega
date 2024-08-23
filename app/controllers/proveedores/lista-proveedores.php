<?php
$sql_proveedores = "SELECT * FROM tb_proveedor";
$query_proveedores = $pdo->prepare($sql_proveedores);
$query_proveedores->execute();
$tabla_proveedores = $query_proveedores->fetchAll(PDO::FETCH_ASSOC);
?>