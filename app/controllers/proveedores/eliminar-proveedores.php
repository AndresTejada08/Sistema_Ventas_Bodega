<?php
include '../../config/conexion.php';

$id_proveedor = $_GET['id_proveedor'];

$sql = "DELETE FROM tb_proveedor WHERE id_proveedor = :id_proveedor";
$query = $pdo->prepare($sql);
$query->bindParam('id_proveedor', $id_proveedor);

if ($query->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Proveedor Eliminado Correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo eliminar al Proveedor";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
}
?>