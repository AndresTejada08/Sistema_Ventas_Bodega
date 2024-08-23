<?php
include '../../config/conexion.php';

$rol = $_POST['rol'];

$sql = "INSERT INTO tb_rol (rol, fecha_creacion) VALUES (:rol, :fecha_creacion)";
$query = $pdo->prepare($sql);
$query->bindParam('rol', $rol);
$query->bindParam('fecha_creacion', $fecha_hora);

if ($query->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Rol Registrado Correctamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/roles');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/roles/create.php');
}
?>