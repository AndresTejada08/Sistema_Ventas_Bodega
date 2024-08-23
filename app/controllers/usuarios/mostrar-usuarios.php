<?php
$id_usuario = $_GET['id'];

$sql = "SELECT U.id_usuario, U.nombres, U.correo, U.contrasena, U.token, U.fecha_creacion, U.fecha_actualizacion, R.rol 
        FROM tb_usuario U INNER JOIN tb_rol R ON U.id_rol = R.id_rol WHERE id_usuario = '$id_usuario'";
$query = $pdo->prepare($sql);
$query->execute();

$datos_usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($datos_usuarios as $dato_usuario) {
    $nombre = $dato_usuario['nombres'];
    $correo = $dato_usuario['correo'];
    $rol = $dato_usuario['rol'];
}
?>