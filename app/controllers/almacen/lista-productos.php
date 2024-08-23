<?php
$sql_productos = "SELECT PR.*, CA.categoria, US.nombres, US.correo FROM tb_producto PR 
                    INNER JOIN tb_categoria CA ON PR.id_categoria = CA.id_categoria 
                    INNER JOIN tb_usuario US ON PR.id_usuario = US.id_usuario";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$tabla_productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);
?>