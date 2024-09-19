<?php
include '../../config/conexion.php';

$cliente = $_POST['cliente'];
$dni = $_POST['dni'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];

$sql = "INSERT INTO tb_cliente (cliente, dni, celular, correo, fecha_creacion)
        VALUES (:cliente, :dni, :celular, :correo, :fecha_creacion)";
$query = $pdo->prepare($sql);
$query->bindParam('cliente', $cliente);
$query->bindParam('dni', $dni);
$query->bindParam('celular', $celular);
$query->bindParam('correo', $correo);
$query->bindParam('fecha_creacion', $fecha_hora);

if ($query->execute()) {
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar al Cliente";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php";
    </script>
    <?php
}
?>