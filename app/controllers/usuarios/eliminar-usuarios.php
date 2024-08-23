<?php
include '../../config/conexion.php';

$id_usuario = $_POST['id_usuario'];

$sql = "DELETE FROM tb_usuario WHERE id_usuario = :id_usuario";
$query = $pdo->prepare($sql);
$query->bindParam('id_usuario', $id_usuario);
$query->execute();

session_start();
$_SESSION['mensaje'] = "Usuario Eliminado Correctamente";
$_SESSION['icono'] = "success";
header('Location: '.$URL.'/usuarios');
?>