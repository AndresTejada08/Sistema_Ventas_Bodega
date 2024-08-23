<?php
include '../../config/conexion.php';

$id_compra = $_GET['id_compra'];
$id_producto = $_GET['id_producto'];
$cantidad = $_GET['cantidad'];
$stock = $_GET['stock'];

$pdo->beginTransaction();

$sql = "DELETE FROM tb_compra WHERE id_compra = :id_compra";
$query = $pdo->prepare($sql);
$query->bindParam('id_compra', $id_compra);

if ($query->execute()) {
    // Actualizar el stock
    $stock = $stock - $cantidad;
    $sql_stock = "UPDATE tb_producto SET stock = :stock WHERE id_producto = :id_producto";
    $query_stock = $pdo->prepare($sql_stock);
    $query_stock->bindParam('stock', $stock);
    $query_stock->bindParam('id_producto', $id_producto);
    $query_stock->execute();

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Compra Eliminada Correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras";
    </script>
    <?php
} else {
    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo eliminar la Compra";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras";
    </script>
    <?php
}
?>