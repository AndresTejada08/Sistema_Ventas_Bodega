<?php
$sql_usuarios = "SELECT U.id_usuario, U.nombres, U.correo, R.rol FROM tb_usuario U INNER JOIN tb_rol R ON U.id_rol = R.id_rol";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$tabla_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
?>