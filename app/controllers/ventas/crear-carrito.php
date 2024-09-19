<?php
include '../../config/conexion.php';

$cantidad = $_GET['cantidad'];
$id_producto = $_GET['id_producto'];
$nro_venta = $_GET['nro_venta'];

$sql = "INSERT INTO tb_carrito (cantidad, fecha_creacion, nro_venta, id_producto)
        VALUES (:cantidad, :fecha_creacion, :nro_venta, :id_producto)";
$query = $pdo->prepare($sql);
$query->bindParam('cantidad', $cantidad);
$query->bindParam('fecha_creacion', $fecha_hora);
$query->bindParam('nro_venta', $nro_venta);
$query->bindParam('id_producto', $id_producto);

if ($query->execute()) {
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php";
    </script>
    <?php
} else {
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