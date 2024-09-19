<?php
$sql_clientes = "SELECT * FROM tb_cliente";
$query_clientes = $pdo->prepare($sql_clientes);
$query_clientes->execute();
$tabla_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
?>