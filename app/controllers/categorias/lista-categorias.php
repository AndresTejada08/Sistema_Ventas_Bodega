<?php
$sql_categorias = "SELECT * FROM tb_categoria";
$query_categorias = $pdo->prepare($sql_categorias);
$query_categorias->execute();
$tabla_categorias = $query_categorias->fetchAll(PDO::FETCH_ASSOC);
?>