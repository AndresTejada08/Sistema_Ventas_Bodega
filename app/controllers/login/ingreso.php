<?php
include '../../config/conexion.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$contador = 0;

$sql = "SELECT * FROM tb_usuario WHERE correo = '$correo'";
$query = $pdo->prepare($sql);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    $contador += 1;
    $correo_tabla = $usuario['correo'];
    $nombre_tabla = $usuario['nombres'];
    $contrasena_tabla = $usuario['contrasena'];
}


if (($contador > 0) && (password_verify($contrasena, $contrasena_tabla))) {
    echo "Datos correctos";
    session_start();
    $_SESSION['session_correo'] = $correo;

    header('Location: '.$URL);
} else {
    echo "Datos incorrectos";

    session_start();
    $_SESSION['mensaje'] = "Error, datos incorrectos";

    header('Location: '.$URL.'/login');
}
?>