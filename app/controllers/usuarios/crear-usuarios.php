<?php
include '../../config/conexion.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$id_rol = $_POST['rol'];
$contrasena = $_POST['contrasena'];
$repite_contrasena = $_POST['repite_contrasena'];

if ($contrasena == $repite_contrasena) {
    $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_usuario (nombres, correo, contrasena, fecha_creacion, id_rol) VALUES (:nombres, :correo, :contrasena, :fecha_creacion, :id_rol)";
    $query = $pdo->prepare($sql);
    $query->bindParam('nombres', $nombre);
    $query->bindParam('correo', $correo);
    $query->bindParam('contrasena', $contrasena);
    $query->bindParam('fecha_creacion', $fecha_hora);
    $query->bindParam('id_rol', $id_rol);
    $query->execute();

    session_start();
    $_SESSION['mensaje'] = "Usuario Registrado Correctamente";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/usuarios');
} else {
    //echo "Error, las contraseñas no son iguales";

    session_start();
    $_SESSION['mensaje'] = "Error, las contraseñas no son iguales";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/usuarios/create.php');
}
?>