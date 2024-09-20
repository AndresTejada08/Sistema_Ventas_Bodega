<?php
include '../../config/conexion.php';

$total = $_GET['total_cancelar'];
$nro_venta = $_GET['nro_venta'];
$id_cliente = $_GET['id_cliente'];

$pdo->beginTransaction();

$sql = "INSERT INTO tb_venta (total, fecha_creacion, nro_venta, id_cliente)
        VALUES (:total, :fecha_creacion, :nro_venta, :id_cliente)";
$query = $pdo->prepare($sql);
$query->bindParam('total', $total);
$query->bindParam('fecha_creacion', $fecha_hora);
$query->bindParam('nro_venta', $nro_venta);
$query->bindParam('id_cliente', $id_cliente);

if ($query->execute()) {
    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Venta Registrada Correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas";
    </script>
    <?php
} else {
    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar la Venta";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php";
    </script>
    <?php
}
?>