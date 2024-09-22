<?php
$sql_clientes = "SELECT * FROM tb_cliente WHERE id_cliente = '$id_cliente'";
$query_clientes = $pdo->prepare($sql_clientes);
$query_clientes->execute();
$tabla_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);

foreach ($tabla_clientes as $tabla_cliente) {
    $cliente = $tabla_cliente['cliente'];
    $dni = $tabla_cliente['dni'];
    $celular = $tabla_cliente['celular'];
    $correo = $tabla_cliente['correo'];
}
?>