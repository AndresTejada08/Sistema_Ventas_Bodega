<?php
session_start();

if (isset($_SESSION['session_correo'])) {
    //echo 'Si existe sesion de ' . $_SESSION['session_correo'];
    $session_correo = $_SESSION['session_correo'];

    //$sql = "SELECT * FROM tb_usuario WHERE correo = '$session_correo'";
    $sql = "SELECT U.id_usuario, U.nombres, U.correo, R.rol FROM tb_usuario U INNER JOIN tb_rol R ON U.id_rol = R.id_rol WHERE correo = '$session_correo'";
    $query = $pdo->prepare($sql);
    $query->execute();

    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $sesion_id_usuario = $usuario['id_usuario'];
        $sesion_nombre = $usuario['nombres'];
        $sesion_rol = $usuario['rol'];
    }
} else {
    echo 'no existe sesion';
    header('Location: ' . $URL . '/login');
}
?>