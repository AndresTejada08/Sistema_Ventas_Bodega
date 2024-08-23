<?php
include '../../config/conexion.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$repite_contrasena = $_POST['repite_contrasena'];
$id_usuario = $_POST['id_usuario'];
$rol = $_POST['rol'];

if ($contrasena == null) {
    if ($contrasena == $repite_contrasena) {
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    
        $sql = "UPDATE tb_usuario SET nombres = :nombres, correo = :correo, fecha_actualizacion = :fecha_actualizacion, id_rol = :id_rol WHERE id_usuario = :id_usuario";
        $query = $pdo->prepare($sql);
        $query->bindParam('nombres', $nombre);
        $query->bindParam('correo', $correo);
        $query->bindParam('fecha_actualizacion', $fecha_hora);
        $query->bindParam('id_rol', $rol);
        $query->bindParam('id_usuario', $id_usuario);
        $query->execute();
    
        session_start();
        $_SESSION['mensaje'] = "Usuario Actualizado Correctamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/usuarios');
    } else {
        //echo "Error, las contraseñas no son iguales";
    
        session_start();
        $_SESSION['mensaje'] = "Error, las contraseñas no son iguales";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/usuarios/update.php?id='.$id_usuario);
    }
} else {
    if ($contrasena == $repite_contrasena) {
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        $sql = "UPDATE tb_usuario SET nombres = :nombres, correo = :correo, contrasena = :contrasena, fecha_actualizacion = :fecha_actualizacion, id_rol = :id_rol WHERE id_usuario = :id_usuario";
        $query = $pdo->prepare($sql);
        $query->bindParam('nombres', $nombre);
        $query->bindParam('correo', $correo);
        $query->bindParam('contrasena', $contrasena);
        $query->bindParam('fecha_actualizacion', $fecha_hora);
        $query->bindParam('id_rol', $rol);
        $query->bindParam('id_usuario', $id_usuario);
        $query->execute();

        session_start();
        $_SESSION['mensaje'] = "Usuario Actualizado Correctamente";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/usuarios');
    } else {
        //echo "Error, las contraseñas no son iguales";

        session_start();
        $_SESSION['mensaje'] = "Error, las contraseñas no son iguales";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/usuarios/update.php?id='.$id_usuario);
    }
}
?>