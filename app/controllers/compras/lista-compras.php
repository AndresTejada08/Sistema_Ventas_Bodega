<?php
$sql_compras = "SELECT CP.*, CP.precio_compra AS compra_precio_compra, PD.*, PD.precio_compra AS producto_precio_compra, PV.*, US.nombres, CT.* FROM tb_compra CP 
                INNER JOIN tb_producto PD ON CP.id_producto = PD.id_producto
                INNER JOIN tb_proveedor PV ON CP.id_proveedor = PV.id_proveedor 
                INNER JOIN tb_usuario US ON CP.id_usuario = US.id_usuario
                INNER JOIN tb_categoria CT ON PD.id_categoria = CT.id_categoria";
$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$tabla_compras = $query_compras->fetchAll(PDO::FETCH_ASSOC);
?>