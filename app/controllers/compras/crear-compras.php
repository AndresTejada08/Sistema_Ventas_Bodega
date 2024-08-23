<?php
include '../../config/conexion.php';

$nro_compra = $_GET['nro_compra'];
$fecha_compra = $_GET['fecha_compra'];
$comprobante = $_GET['comprobante'];
$precio_compra = $_GET['precio_compra'];
$cantidad = $_GET['cantidad'];
$id_producto = $_GET['id_producto'];
$id_proveedor = $_GET['id_proveedor'];
$id_usuario = $_GET['id_usuario'];
$stock_total = $_GET['stock_total'];

$pdo->beginTransaction();

$sql = "INSERT INTO tb_compra (nro_compra, fecha_compra, comprobante, precio_compra, cantidad, fecha_creacion, id_producto, id_proveedor, id_usuario)
        VALUES (:nro_compra, :fecha_compra, :comprobante, :precio_compra, :cantidad, :fecha_creacion, :id_producto, :id_proveedor, :id_usuario)";
$query = $pdo->prepare($sql);
$query->bindParam('nro_compra', $nro_compra);
$query->bindParam('fecha_compra', $fecha_compra);
$query->bindParam('comprobante', $comprobante);
$query->bindParam('precio_compra', $precio_compra);
$query->bindParam('cantidad', $cantidad);
$query->bindParam('fecha_creacion', $fecha_hora);
$query->bindParam('id_producto', $id_producto);
$query->bindParam('id_proveedor', $id_proveedor);
$query->bindParam('id_usuario', $id_usuario);

if ($query->execute()) {
    // Actualizar el stock
    $sql_stock = "UPDATE tb_producto SET stock = :stock WHERE id_producto = :id_producto";
    $query_stock = $pdo->prepare($sql_stock);
    $query_stock->bindParam('stock', $stock_total);
    $query_stock->bindParam('id_producto', $id_producto);
    $query_stock->execute();

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Compra Registrada Correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras";
    </script>
    <?php
} else {
    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar la Compra";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras/create.php";
    </script>
    <?php
}
?>