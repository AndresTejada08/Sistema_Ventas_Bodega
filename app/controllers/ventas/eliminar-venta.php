<?php
include '../../config/conexion.php';

$id_venta = $_GET['id_venta'];
$nro_venta = $_GET['nro_venta'];

$pdo->beginTransaction();

$sql = "DELETE FROM tb_venta WHERE id_venta = :id_venta";
$query = $pdo->prepare($sql);
$query->bindParam('id_venta', $id_venta);

if ($query->execute()) {
    // Eliminar el carrito
    $sql_carrito = "DELETE FROM tb_carrito WHERE nro_venta = :nro_venta";
    $query_carrito = $pdo->prepare($sql_carrito);
    $query_carrito->bindParam('nro_venta', $nro_venta);
    $query_carrito->execute();

    $pdo->commit();

    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas";
    </script>
    <?php
} else {
    echo 'Error al Anular la Venta';
    $pdo->rollBack();
}
?>