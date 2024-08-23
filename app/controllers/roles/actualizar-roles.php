<?php
include '../../config/conexion.php';

$rol = $_POST['rol'];
$id_rol = $_POST['id_rol'];

$sql = "UPDATE tb_rol SET rol = :rol, fecha_actualizacion = :fecha_actualizacion WHERE id_rol = :id_rol";
$query = $pdo->prepare($sql);
$query->bindParam('rol', $rol);
$query->bindParam('fecha_actualizacion', $fecha_hora);
$query->bindParam('id_rol', $id_rol);
    
if ($query->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Rol Actualizado Correctamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/roles');
} else {
    //echo "Error, las contraseñas no son iguales";

    session_start();
    $_SESSION['mensaje'] = "Error, el rol no fue actualizado";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/roles/update.php?id='.$id_rol);
}
?>